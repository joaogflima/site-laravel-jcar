<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use App\Models\Modelo;
use App\Models\Cor;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $veiculos = Veiculo::with(['modelo.marca','cor'])->orderBy('id', 'DESC')->get();
        return view('admin.veiculos.index', compact('veiculos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $modelos = Modelo::with('marca')->orderBy('nome')->get();
        $cores = Cor::orderBy('nome')->get();
        return view('admin.veiculos.create', compact('modelos','cores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação dos campos do veículo
        $dados = $request->validate([
            'modelo_id'      => 'required|exists:modelos,id',
            'cor_id'         => 'required|exists:cores,id',
            'ano'            => 'required|integer',
            'quilometragem'  => 'required|integer',
            'valor'          => 'required|numeric',
            'detalhes'       => 'nullable|string',
            'imagem1'        => 'required|url',
            'imagem2'        => 'required|url',
            'imagem3'        => 'required|url',
        ]);
        Veiculo::create($dados);
        return redirect()->route('veiculos.index')->with('sucesso', 'Veículo cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Veiculo $veiculo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Veiculo $veiculo)
    {
        $modelos = Modelo::with('marca')->orderBy('nome')->get();
        $cores = Cor::orderBy('nome')->get();
        return view('admin.veiculos.edit', compact('veiculo','modelos','cores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Veiculo $veiculo)
    {
        $dados = $request->validate([
            'modelo_id'      => 'required|exists:modelos,id',
            'cor_id'         => 'required|exists:cores,id',
            'ano'            => 'required|integer',
            'quilometragem'  => 'required|integer',
            'valor'          => 'required|numeric',
            'detalhes'       => 'nullable|string',
            'imagem1'        => 'required|url',
            'imagem2'        => 'required|url',
            'imagem3'        => 'required|url',
        ]);
        $veiculo->update($dados);
        return redirect()->route('veiculos.index')->with('sucesso', 'Veículo atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Veiculo $veiculo)
    {
        $veiculo->delete();
        return redirect()->route('veiculos.index')->with('sucesso', 'Veículo removido.');
    }
}
