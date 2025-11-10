@extends('layouts.template_admin.index')

@section('title', 'Gerenciar Veículos')

@section('conteudo')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="m-0">Gerenciar Veículos</h1>
        <a href="{{ route('veiculos.create') }}" class="btn btn-gradient-primary rounded-pill">+ Novo Veículo</a>
    </div>

    @if(session('sucesso'))
        <div class="alert alert-success mb-3">{{ session('sucesso') }}</div>
    @endif

    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Cor</th>
                            <th>Ano</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($veiculos as $v)
                            <tr>
                                <td>{{ $v->id }}</td>
                                <td>
                                    <img src="{{ $v->imagem1 }}" alt="Foto de {{ $v->modelo->nome }}" 
                                         class="img-thumbnail" style="width: 100px;">
                                </td>
                                <td>{{ $v->modelo->nome }}</td>
                                <td>{{ $v->modelo->marca->nome }}</td>
                                <td>{{ $v->cor->nome }}</td>
                                <td>{{ $v->ano }}</td>
                                <td>R$ {{ number_format($v->valor, 2, ',', '.') }}</td>
                                <td>
                                    <a href="{{ route('veiculos.edit', $v->id) }}" class="btn btn-outline-primary btn-sm rounded-pil">Editar</a>
                                    <form action="{{ route('veiculos.destroy', $v->id) }}" method="POST" class="d-inline"
                                          onsubmit="return confirm('Tem certeza que deseja excluir este veículo?')">
                                        @csrf 
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm rounded-pill">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
