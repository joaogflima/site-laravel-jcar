@php
    $isEdit = isset($veiculo);
    $action = $isEdit ? route('veiculos.update', $veiculo->id) : route('veiculos.store');
@endphp

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Verifique os campos abaixo.</strong>
        <ul class="mb-0 mt-2">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ $action }}" method="POST" novalidate>
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif

    <div class="row g-3">
        <div class="col-md-6">
            <div class="form-floating">
                <select name="modelo_id" id="modelo_id" class="form-select" required>
                    <option value="">-- Selecione --</option>
                    @foreach ($modelos as $modelo)
                        <option value="{{ $modelo->id }}"
                            {{ (string)old('modelo_id', $veiculo->modelo_id ?? '') === (string)$modelo->id ? 'selected' : '' }}>
                            {{ $modelo->marca->nome }} — {{ $modelo->nome }}
                        </option>
                    @endforeach
                </select>
                <label for="modelo_id">Modelo</label>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-floating">
                <select name="cor_id" id="cor_id" class="form-select" required>
                    <option value="">-- Selecione --</option>
                    @foreach ($cores as $cor)
                        <option value="{{ $cor->id }}"
                            {{ (string)old('cor_id', $veiculo->cor_id ?? '') === (string)$cor->id ? 'selected' : '' }}>
                            {{ $cor->nome }}
                        </option>
                    @endforeach
                </select>
                <label for="cor_id">Cor</label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-floating">
                <input type="number" name="ano" id="ano" class="form-control" 
                       placeholder=" " value="{{ old('ano', $veiculo->ano ?? '') }}"
                       min="1900" max="{{ date('Y') + 1 }}" required>
                <label for="ano">Ano</label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-floating">
                <input type="number" name="quilometragem" id="quilometragem" class="form-control" 
                       placeholder=" " value="{{ old('quilometragem', $veiculo->quilometragem ?? '') }}"
                       min="0" step="1" required>
                <label for="quilometragem">Quilometragem</label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-floating">
                <input type="number" name="valor" id="valor" class="form-control" 
                       placeholder=" " value="{{ old('valor', $veiculo->valor ?? '') }}"
                       min="0" step="0.01" required>
                <label for="valor">Valor (R$)</label>
            </div>
        </div>

        <div class="col-12">
            <div class="form-floating">
                <textarea name="detalhes" id="detalhes" class="form-control" placeholder=" " style="height: 120px;">{{ old('detalhes', $veiculo->detalhes ?? '') }}</textarea>
                <label for="detalhes">Detalhes</label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-floating">
                <input type="url" name="imagem1" id="imagem1" class="form-control" 
                       placeholder=" " value="{{ old('imagem1', $veiculo->imagem1 ?? '') }}" required>
                <label for="imagem1">Foto 1 (URL)</label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-floating">
                <input type="url" name="imagem2" id="imagem2" class="form-control" 
                       placeholder=" " value="{{ old('imagem2', $veiculo->imagem2 ?? '') }}" required>
                <label for="imagem2">Foto 2 (URL)</label>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-floating">
                <input type="url" name="imagem3" id="imagem3" class="form-control" 
                       placeholder=" " value="{{ old('imagem3', $veiculo->imagem3 ?? '') }}" required>
                <label for="imagem3">Foto 3 (URL)</label>
            </div>
        </div>
    </div>

    <div class="d-flex gap-2 mt-4">
        <button type="submit" class="btn btn-gradient-primary rounded-pill">{{ $isEdit ? 'Atualizar' : 'Salvar' }}</button>
        <a href="{{ route('veiculos.index') }}" class="btn btn-outline-secondary rounded-pill">Cancelar</a>
    </div>
</form>
