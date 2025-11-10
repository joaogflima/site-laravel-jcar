<!-- resources/views/auth/reset-password.blade.php -->
@extends('layouts.template_home.index')

@section('titulo', 'Redefinir Senha')
@section('conteudo')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h2 class="mb-4 text-center">Redefinir Senha</h2>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <!-- Token de reset obrigatório (fornecido na URL) -->
                <input type="hidden" name="token" value="{{ $token }}">
                
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email', request()->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Nova Senha:</label>
                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror"
                           required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmar Nova Senha:</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror"
                           required>
                    @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success w-100">Redefinir Senha</button>
            </form>
        </div>
    </div>
</div>
@endsection
