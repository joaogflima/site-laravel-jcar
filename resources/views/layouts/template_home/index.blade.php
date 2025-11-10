<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'JCar - Homepage')</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo-jcar.png') }}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet"/>

    <link href="{{ asset('assets_homepage/css/styles.css') }}" rel="stylesheet" />
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark jcar-navbar sticky-top">
        <div class="container px-4 px-lg-5">
            <a class="navbar-brand d-flex align-items-center gap-2 fw-bold" href="{{ route('site.home') }}">
                <img src="{{ asset('images/logo-jcar.png') }}" alt="JCar" height="80">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Alternar navegação">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-lg-4 me-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link jcar-link {{ request()->routeIs('site.home') ? 'active' : '' }}"
                        href="{{ route('site.home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link jcar-link {{ request()->routeIs('site.sobre') ? 'active' : '' }}"
                        href="{{ route('site.sobre') }}">Sobre</a>
                    </li>
                </ul>

                <div class="d-flex gap-2">
                    @auth
                        <a class="btn btn-ghost-light" href="{{ url('/admin') }}">
                            <i class="bi-speedometer2 me-1"></i> Admin
                        </a>
                        <form action="{{ route('logout') }}" method="POST">@csrf
                            <button class="btn btn-primary">
                                <i class="bi-box-arrow-right me-1"></i> Sair
                            </button>
                        </form>
                    @endauth

                    @guest
                        <a class="btn btn-primary" href="{{ route('login') }}">
                            <i class="bi-person me-1"></i> Entrar
                        </a>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    @hasSection('hero')
        @yield('hero')
    @else
        <section
            class="hero-jcar position-relative text-white overflow-hidden"
            style="--hero-bg: url('{{ asset('images/hero/showroom.png') }}');"
            aria-label="Destaque JCar"
        >
            <div class="hero-overlay"></div>

            <div class="hero-shape hero-shape-1"></div>
            <div class="hero-shape hero-shape-2"></div>

            <div class="container position-relative">
                <div class="row align-items-center min-vh-60 py-5">
                    <div class="col-lg-7">
                        <div class="glass p-4 p-md-5 rounded-4 shadow-lg">
                            <span class="badge bg-primary-subtle text-primary-emphasis mb-3 px-3 py-2 rounded-pill">
                                Qualidade e confiança desde 2010
                            </span>
                            <h1 class="display-4 fw-extrabold lh-1 mb-3">
                                Encontre seu <span class="text-gradient">próximo carro</span>
                            </h1>
                            <p class="lead text-white-75 mb-4">
                                Seminovos periciados, financiamento facilitado e entrega sem dor de cabeça.
                            </p>
                            <div class="d-flex flex-wrap gap-4 mt-4 text-white-75 small">
                                <div><i class="fas fa-shield-check me-2"></i>Laudo cautelar</div>
                                <div><i class="fas fa-screwdriver-wrench me-2"></i>120+ itens inspecionados</div>
                                <div><i class="fas fa-face-smile me-2"></i>98% clientes satisfeitos</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif


    <main class="py-5">
        <div class="container px-4 px-lg-5">
            @yield('conteudo')
        </div>
    </main>

    <footer class="jcar-footer mt-auto position-relative text-white">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-4">

                    <p class="text-white-75">
                        Seminovos periciados, transparência e tecnologia para você encontrar seu próximo carro.
                    </p>
                    <div class="d-flex gap-3 fs-5">
                        <a class="text-white-75 hover-bright" href="#" aria-label="Instagram"><i class="bi-instagram"></i></a>
                        <a class="text-white-75 hover-bright" href="#" aria-label="Facebook"><i class="bi-facebook"></i></a>
                        <a class="text-white-75 hover-bright" href="#" aria-label="WhatsApp"><i class="bi-whatsapp"></i></a>
                    </div>
                </div>

                <div class="col-6 col-md-2">
                    <h6 class="text-white fw-semibold mb-3">Páginas</h6>
                    <ul class="list-unstyled m-0">
                        <li><a href="{{ route('site.home') }}" class="footer-link">Home</a></li>
                        <li><a href="{{ route('site.sobre') }}" class="footer-link">Sobre</a></li>
                        <li><a href="{{ url('/veiculos') }}" class="footer-link">Veículos</a></li>
                        <li><a href="{{ url('/contato') }}" class="footer-link">Contato</a></li>
                    </ul>
                </div>

                <div class="col-6 col-md-3">
                    <h6 class="text-white fw-semibold mb-3">Contato</h6>
                    <ul class="list-unstyled m-0">
                        <li class="text-white-75">Av. Fictícia, 123 — Bauru/SP</li>
                        <li class="text-white-75">Seg a Sex, 9h–18h</li>
                        <li><a href="tel:+5514999999999" class="footer-link">+55 (14) 99999-9999</a></li>
                        <li><a href="mailto:contato@jcar.com.br" class="footer-link">contato@jcar.com.br</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h6 class="text-white fw-semibold mb-3">Receba novidades</h6>
                    <form class="footer-newsletter" action="#" method="POST">
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Seu e-mail" aria-label="Seu e-mail">
                            <button class="btn btn-primary" type="submit">Assinar</button>
                        </div>
                        <small class="d-block mt-2 text-white-50">Sem spam. Cancelamento a qualquer momento.</small>
                    </form>
                </div>
            </div>

            <hr class="footer-hr my-4"/>

            <p class="m-0 text-center text-white-75">
                © {{ date('Y') }} JCar — Todos os direitos reservados.
            </p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets_homepage/js/scripts.js') }}"></script>
    @stack('scripts')
</body>
</html>
