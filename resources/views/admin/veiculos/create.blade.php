@extends('layouts.template_admin.index')

@section('title', 'Novo Veículo')

@section('conteudo')
    <h1 class="mt-4">Adicionar Veículo</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('veiculos.index') }}">Veículos</a></li>
        <li class="breadcrumb-item active">Novo</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            @include('admin.veiculos.form', ['modelos' => $modelos, 'cores' => $cores])
        </div>
    </div>
@endsection

