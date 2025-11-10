@extends('layouts.template_home.index')

@section('title', 'Login — JCar')

@section('hero')
<!-- Mantém uma seção hero mínima para preservar espaçamento, sem imagem de fundo -->
<section class="py-3"></section>
@endsection

@section('conteudo')
<section class="auth-hero auth-light position-relative overflow-hidden" style="--auth-bg: none;" aria-label="Login JCar">
    <!-- Removido overlay, já que não há imagem de fundo -->
    <!--<div class="auth-overlay"></div>-->
    <div class="container position-relative">
        <div class="row justify-content-center align-items-center min-vh-75 py-5">
            <div class="col-12 col-md-8 col-lg-5">
                <div class="glass border-0 rounded-4 shadow-lg p-4 p-md-5 bg-white text-dark">
                    <!-- Cabeçalho do formulário -->
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/logo-jcar.png') }}" alt="JCar" height="75" class="mb-2">
                        <h1 class="h4 fw-bold m-0">Bem-vindo(a) de volta</h1>
                        <p class="text-muted small mb-0">Acesse sua conta para gerenciar o catálogo</p>
                    </div>

                    @if(session('status'))
                        <div class="alert alert-success text-center mb-3">{{ session('status') }}</div>
                    @endif

                    <!-- Formulário de login -->
                    <form id="form-login" method="POST" action="{{ route('login') }}" novalidate>
                        @csrf
                        <div class="form-floating mb-3 position-relative">
                            <input 
                                type="email" 
                                name="email" 
                                id="email" 
                                class="form-control auth-control @error('email') is-invalid @enderror" 
                                value="{{ old('email') }}" 
                                placeholder="voce@exemplo.com" 
                                required 
                                autocomplete="username" 
                            />
                            <label for="email" class="text-muted">E-mail</label>
                            <span class="input-icon"><i class="bi bi-envelope"></i></span>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3 position-relative">
                            <input 
                                type="password" 
                                name="password" 
                                id="password" 
                                class="form-control auth-control @error('password') is-invalid @enderror" 
                                placeholder="••••••••" 
                                required 
                                autocomplete="current-password" 
                            />
                            <label for="password" class="text-muted">Senha</label>
                            <span class="input-icon"><i class="bi bi-lock"></i></span>
                            <button class="btn toggle-pass" type="button" id="togglePass" aria-label="Mostrar/ocultar senha">
                                <i class="bi bi-eye"></i>
                            </button>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">Lembrar-me</label>
                            </div>
                            <a class="small link-underline" href="{{ route('password.request') }}">Esqueceu a senha?</a>
                        </div>

                        <button id="btn-login" type="submit" class="btn btn-primary btn-lg w-100">
                            Entrar
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        <span>Não tem conta?</span>
                        <a class="link-underline" href="{{ route('register') }}">Registre-se</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
/* Estilos do tema claro aplicados apenas nesta página de login */
.auth-light .glass {
    background: #fff !important;
    color: #212529;
    border: 1px solid rgba(0,0,0,.08);
    box-shadow: 0 20px 60px rgba(16,26,58,.08);
}
.auth-light .auth-control {
    background: #fff;
    color: #212529;
    border: 1px solid rgba(0,0,0,.12);
}
.auth-light .auth-control::placeholder {
    color: #6c757d;
}
.auth-light .form-floating > .form-control:focus {
    background: #fff;
    border-color: #7b9dff;
    box-shadow: 0 0 0 .2rem rgba(123,157,255,.15);
    color: #212529;
}
.auth-light .form-floating > label {
    color: #6c757d;
}
/* Ícones de input e botão toggle no tema claro */
.auth-light .input-icon {
    color: #6c757d;
    opacity: 1;
}
.auth-light .toggle-pass {
    color: #6c757d;
}
.auth-light .toggle-pass:hover {
    background: rgba(13,110,253,.06);
}
/* Links sublinhados no tema claro */
.auth-light .link-underline {
    color: #0d6efd;
    text-decoration: underline;
}
.auth-light .link-underline:hover {
    color: #0b5ed7;
}
/* Botão primário com gradiente personalizado (cores da identidade visual JCar) */
.btn-primary {
    background: linear-gradient(90deg, #5cc6ff, #7b9dff 50%, #a07bff);
    border: 0;
}
.btn-primary:hover {
    filter: brightness(1.05);
}
</style>
@endpush

@push('scripts')
<script>
    // Toggle de visualização da senha
    const passwordInput = document.getElementById('password');
    const toggleBtn = document.getElementById('togglePass');
    if (toggleBtn && passwordInput) {
        toggleBtn.addEventListener('click', () => {
            const isPwd = passwordInput.type === 'password';
            passwordInput.type = isPwd ? 'text' : 'password';
            const icon = toggleBtn.querySelector('i');
            icon.classList.toggle('bi-eye');
            icon.classList.toggle('bi-eye-slash');
        });
    }

    // Desabilitar botão e mostrar spinner no submit para evitar duplo envio
    const loginForm = document.getElementById('form-login');
    const submitBtn = document.getElementById('btn-login');
    if (loginForm && submitBtn) {
        loginForm.addEventListener('submit', () => {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>Entrando...';
        });
    }
</script>
@endpush
