<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;
use App\Models\Marca;
use App\Models\Cor;

class VeiculoPublicoController extends Controller
{
    public function index(Request $r)
    {
        $q = Veiculo::query()
            ->with(['modelo.marca','cor'])
            ->when($r->filled('q'), function($qq) use ($r){
                $busca = trim($r->q);
                $qq->where(function($w) use ($busca){
                    $w->whereHas('modelo.marca', fn($m)=>$m->where('nome','like',"%{$busca}%"))
                    ->orWhereHas('modelo', fn($m)=>$m->where('nome','like',"%{$busca}%"))
                    ->orWhere('ano','like',"%{$busca}%");
                });
            })
            ->when($r->filled('marca'), fn($qq)=>$qq->whereHas('modelo.marca', fn($m)=>$m->where('id', request('marca'))))
            ->when($r->filled('cor'),   fn($qq)=>$qq->where('cor_id', request('cor')))
            ->when($r->filled('ano_min'), fn($qq)=>$qq->where('ano','>=', (int)request('ano_min')))
            ->when($r->filled('ano_max'), fn($qq)=>$qq->where('ano','<=', (int)request('ano_max')));

        // ordenação
        switch ($r->get('sort')) {
            case 'preco_asc':  $q->orderBy('valor','asc'); break;
            case 'preco_desc': $q->orderBy('valor','desc'); break;
            case 'ano_desc':   $q->orderBy('ano','desc'); break;
            case 'ano_asc':    $q->orderBy('ano','asc'); break;
            default:           $q->latest('id');
        }

        return view('site.veiculos.index', [
            'veiculos' => $q->paginate(12)->withQueryString(),
            'marcas'   => Marca::orderBy('nome')->get(),
            'cores'    => Cor::orderBy('nome')->get(),
        ]);
    }

    public function show($id)
    {
        $veiculo = Veiculo::with(['modelo.marca','cor'])->findOrFail($id);
        return view('site.veiculos.show', compact('veiculo'));
    }
}
