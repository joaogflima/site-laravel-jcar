@extends('layouts.template_admin.index')

@section('title', 'Editar Veículo')

@section('conteudo')
    <h1 class="mt-4">Editar Veículo #{{ $veiculo->id }}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('veiculos.index') }}">Veículos</a></li>
        <li class="breadcrumb-item active">Editar</li>
    </ol>

    <div class="card mb-4">
        <div class="card-body">
            @include('admin.veiculos.form', [
                'veiculo' => $veiculo,
                'modelos' => $modelos,
                'cores'   => $cores
            ])
        </div>
    </div>
@endsection
