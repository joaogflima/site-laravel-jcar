<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use App\Models\Marca;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $modelos = Modelo::orderBy('nome')->get();
        return view('admin.modelos.index', compact('modelos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        $marcas = Marca::all();
        return view('admin.modelos.create', compact('marcas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string',
            'marca_id' => 'required|exists:marcas,id'
        ]);
        Modelo::create($dados);
        return redirect()->route('modelos.index')->with('sucesso', 'Modelo cadastrado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Modelo $modelo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $modelo = Modelo::findOrFail($id);
        $marcas = Marca::all();
        return view('admin.modelos.edit', compact('modelo', 'marcas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Modelo $modelo)
    {
        $dados = $request->validate([
            'nome' => 'required|string',
            'marca_id' => 'required|exists:marcas,id'
        ]);
        $modelo->update($dados);
        return redirect()->route('modelos.index')->with('sucesso', 'Modelo atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Modelo $modelo)
    {
        $modelo->delete();
        return redirect()->route('modelos.index')->with('sucesso', 'Modelo excluído.');
    }
}
