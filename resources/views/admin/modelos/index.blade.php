@extends('layouts.template_admin.index')

@section('titulo', 'Listagem de Modelos')
@section('conteudo')
<h1>Modelos Cadastrados</h1>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<a href="{{ route('modelos.create') }}" class="btn btn-primary mb-3">Novo Modelo</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Modelo</th>
            <th>Marca Associada</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($modelos as $modelo)
            <tr>
                <td>{{ $modelo->id }}</td>
                <td>{{ $modelo->nome }}</td>
                <td>{{ $modelo->marca->nome ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('modelos.edit', $modelo->id) }}" class="btn btn-sm btn-secondary">Editar</a>
                    <form action="{{ route('modelos.destroy', $modelo->id) }}" method="POST" class="d-inline" 
                          onsubmit="return confirm('Tem certeza que deseja excluir o modelo {{ $modelo->nome }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Nenhum modelo cadastrado.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
