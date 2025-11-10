@extends('layouts.template_admin.index')

@section('titulo', 'Novo Modelo')
@section('conteudo')
<h1>Cadastrar Novo Modelo</h1>

<form action="{{ route('modelos.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nome" class="form-label">Nome do Modelo:</label>
        <input type="text" name="nome" id="nome" 
               class="form-control @error('nome') is-invalid @enderror"
               value="{{ old('nome') }}" required>
        @error('nome')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="marca_id" class="form-label">Marca:</label>
        <select name="marca_id" id="marca_id" 
                class="form-select @error('marca_id') is-invalid @enderror" required>
            <option value="">-- Selecione a Marca --</option>
            @foreach($marcas as $marca)
                <option value="{{ $marca->id }}" 
                        {{ old('marca_id') == $marca->id ? 'selected' : '' }}>
                    {{ $marca->nome }}
                </option>
            @endforeach
        </select>
        @error('marca_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('modelos.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
