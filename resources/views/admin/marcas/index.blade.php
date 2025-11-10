@extends('layouts.template_admin.index')

@section('titulo', 'Listagem de Marcas')
@section('conteudo')
<h1>Marcas Cadastradas</h1>

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

<a href="{{ route('marcas.create') }}" class="btn btn-primary mb-3">Nova Marca</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome da Marca</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($marcas as $marca)
            <tr>
                <td>{{ $marca->id }}</td>
                <td>{{ $marca->nome }}</td>
                <td>
                    <a href="{{ route('marcas.edit', $marca->id) }}" class="btn btn-sm btn-secondary">Editar</a>
                    <form action="{{ route('marcas.destroy', $marca->id) }}" method="POST" class="d-inline" 
                          onsubmit="return confirm('Tem certeza que deseja excluir a marca {{ $marca->nome }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Nenhuma marca cadastrada.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
