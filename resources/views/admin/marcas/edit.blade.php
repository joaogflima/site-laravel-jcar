@extends('layouts.template_admin.index')

@section('titulo', 'Editar Marca')
@section('conteudo')
<h1>Editar Marca</h1>

<form action="{{ route('marcas.update', $marca->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nome" class="form-label">Nome da Marca:</label>
        <input type="text" name="nome" id="nome" 
               class="form-control @error('nome') is-invalid @enderror"
               value="{{ old('nome', $marca->nome) }}" required>
        @error('nome')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('marcas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
