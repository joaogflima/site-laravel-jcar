@extends('layouts.template_admin.index')

@section('titulo', 'Listagem de Cores')
@section('conteudo')
<h1>Cores Cadastradas</h1>

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

<a href="{{ route('cores.create') }}" class="btn btn-outline-primary btn-sm rounded-pil">Nova Cor</a>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Cor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @forelse($cores as $cor)
            <tr>
                <td>{{ $cor->id }}</td>
                <td>{{ $cor->nome }}</td>
                <td>
                    <a href="{{ route('cores.edit', $cor->id) }}" class="btn btn-outline-secondary rounded-pill">Editar</a>
                    <form action="{{ route('cores.destroy', $cor->id) }}" method="POST" class="d-inline" 
                          onsubmit="return confirm('Tem certeza que deseja excluir a cor {{ $cor->nome }}?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm rounded-pill">Excluir</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="3">Nenhuma cor cadastrada.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection
