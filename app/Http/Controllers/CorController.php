<?php

namespace App\Http\Controllers;

use App\Models\Cor;
use Illuminate\Http\Request;

class CorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cores = Cor::orderBy('nome')->get();
        return view('admin.cores.index', compact('cores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.cores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|unique:cores,nome'
        ]);
        Cor::create($dados);
        return redirect()->route('cores.index')->with('sucesso', 'Cor cadastrada!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cor $cor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $cor = Cor::findOrFail($id);
        return view('admin.cores.edit', compact('cor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $dados = $request->validate([
            'nome' => 'required|string|unique:cores,nome,'
        ]);
        $cor = Cor::findOrFail($id);
        $cor->update($dados);
        return redirect()->route('cores.index')->with('sucesso', 'Cor atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        $cor = Cor::findOrFail($id);
        $cor->delete();
        return redirect()->route('cores.index')->with('success', 'Cor excluída!');
    }
}
