@extends('layouts.template_admin.index')

@section('titulo', 'Editar Cor')
@section('conteudo')
<h1>Editar Cor</h1>

<form action="{{ route('cores.update', $cor->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nome" class="form-label">Nome da Cor:</label>
        <input type="text" name="nome" id="nome" 
               class="form-control @error('nome') is-invalid @enderror"
               value="{{ old('nome', $cor->nome) }}" required>
        @error('nome')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('cores.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
