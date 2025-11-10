@extends('layouts.template_home.index')

@section('hero')

@endsection

@section('conteudo')
<div class="register-page position-relative">
    <div class="overlay"></div>
    <div class="container py-5">
        <div class="mx-auto register-card p-4" style="max-width: 420px;">
            <h2 class="mb-4 text-center text-dark">Registrar-se</h2>
            <form action="{{ route('register') }}" method="POST">
                @csrf

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <div class="form-floating flex-grow-1">
                        <input type="text" 
                               class="form-control @error('name') is-invalid @enderror" 
                               id="name" name="name" placeholder="Nome" 
                               value="{{ old('name') }}" required autofocus>
                        <label for="name">Nome</label>
                    </div>
                </div>
                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                    <div class="form-floating flex-grow-1">
                        <input type="email" 
                               class="form-control @error('email') is-invalid @enderror" 
                               id="email" name="email" placeholder="E-mail" 
                               value="{{ old('email') }}" required>
                        <label for="email">E-mail</label>
                    </div>
                </div>
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <div class="form-floating flex-grow-1">
                        <input type="password" 
                               class="form-control @error('password') is-invalid @enderror" 
                               id="password" name="password" placeholder="Senha" required>
                        <label for="password">Senha</label>
                    </div>
                    <span class="input-group-text password-toggle" data-target="password">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror

                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="fas fa-shield-alt"></i></span>
                    <div class="form-floating flex-grow-1">
                        <input type="password" 
                               class="form-control @error('password_confirmation') is-invalid @enderror" 
                               id="password_confirmation" name="password_confirmation" 
                               placeholder="Confirmar Senha" required>
                        <label for="password_confirmation">Confirmar Senha</label>
                    </div>
                    <span class="input-group-text password-toggle" data-target="password_confirmation">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                @error('password_confirmation')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror

                <button type="submit" class="btn btn-primary w-100">
                    Registrar
                </button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .register-page {
        background: url('/images/hero-car.jpg') no-repeat center center;
        background-size: cover;
    }
    .register-page .overlay {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 1;
    }
    .register-card {
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(8px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        border-radius: 0.8rem;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        z-index: 2;
    }
    .input-group-text {
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
    }
    .input-group-text .fas {
        font-size: 1.1rem;
    }
</style>
@endpush

@push('scripts')
<script>
    document.querySelectorAll('.password-toggle').forEach(toggle => {
        toggle.addEventListener('click', () => {
            const targetId = toggle.getAttribute('data-target');
            const input = document.getElementById(targetId);
            if (!input) return;
            if (input.type === 'password') {
                input.type = 'text';
                toggle.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                input.type = 'password';
                toggle.innerHTML = '<i class="fas fa-eye"></i>';
            }
        });
    });

    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        const submitBtn = form.querySelector('button[type=submit]');
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Registrando...';
        }
    });
</script>
@endpush
