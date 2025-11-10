<!-- resources/views/auth/forgot-password.blade.php -->
@extends('layouts.template_home.index')

@section('titulo', 'Recuperar Senha')
@section('conteudo')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <h2 class="mb-4 text-center">Recuperar Senha</h2>

            @if(session('status'))
                <div class="alert alert-success text-center">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Seu e-mail de cadastro:</label>
                    <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary w-100">Enviar Link de Recuperação</button>
            </form>

            <div class="text-center mt-3">
                <a href="{{ route('login') }}">Voltar ao Login</a>
            </div>
        </div>
    </div>
</div>
@endsection

