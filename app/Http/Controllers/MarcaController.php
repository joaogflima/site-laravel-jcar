<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::orderBy('nome')->get();
        return view('admin.marcas.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação obrigatório e único
        $dados = $request->validate([
            'nome' => 'required|string|unique:marcas,nome'
        ]);
        Marca::create($dados);  // Cria
        return redirect()->route('marcas.index')->with('sucesso', 'Marca cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Marca $marca)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $marca = Marca::findOrFail($id);
        return view('admin.marcas.edit', compact('marca'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        $dados = $request->validate([
            'nome' => 'required|string|max:255'
        ]);
        $marca = Marca::findOrFail($id);
        $marca->update($dados);
        return redirect()->route('marcas.index')->with('success', 'Marca atualizada!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $marca = Marca::findOrFail($id);
        $marca->delete();
        return redirect()->route('marcas.index')->with('success', 'Marca excluída!');
    }
}
