@extends('layouts.template_admin.index')

@section('titulo', 'Nova Marca')
@section('conteudo')
<h1>Cadastrar Nova Marca</h1>

<form action="{{ route('marcas.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome da Marca:</label>
        <input type="text" name="nome" id="nome" 
               class="form-control @error('nome') is-invalid @enderror"
               value="{{ old('nome') }}" required>
        @error('nome')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('marcas.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
