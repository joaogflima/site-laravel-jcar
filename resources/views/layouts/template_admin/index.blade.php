<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Painel Administrativo — JCar')</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ asset('assets_admin/css/styles.css') }}" rel="stylesheet" />
    <style>
        html, body {
            height: 100%;
            overflow-x: hidden;
        }
        #wrapper {
            display: flex;
            min-height: 100vh;
        }
        #sidebar-wrapper {
            min-width: 260px;
            max-width: 260px;
            background-color: #0d1b2a;
            color: #fff;
            flex-shrink: 0;
            transition: all 0.3s ease;
        }
        #sidebar-wrapper .sidebar-heading {
            padding: 2.5rem 1rem 2rem;
            background-color: #0a1521;
        }
        #sidebar-wrapper .sidebar-heading img {
            max-height: 100px;
        }
        #sidebar-wrapper .list-group-item {
            background-color: transparent;
            color: #ffffffb3;
            border: none;
            padding: 1rem 1.25rem;
            font-weight: 500;
        }
        #sidebar-wrapper .list-group-item:hover,
        #sidebar-wrapper .list-group-item.active {
            background-color: rgba(255,255,255,.1);
            color: #fff;
        }
        #page-content-wrapper {
            flex: 1;
            background-color: #f8f9fa;
        }
        .jcar-navbar {
            background: linear-gradient(90deg,#5cc6ff,#7b9dff);
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        }
        .jcar-navbar .btn {
            font-weight: 500;
        }
        main.container-fluid {
            padding: 2rem;
        }
        @media (max-width: 768px) {
            #sidebar-wrapper {
                margin-left: -260px;
            }
            #wrapper.toggled #sidebar-wrapper {
                margin-left: 0;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
<div id="wrapper">
    <div id="sidebar-wrapper">
        <div class="sidebar-heading text-center">
            <img src="{{ asset('images/logo-jcar.png') }}" alt="JCar Logo">
        </div>
        <div class="list-group list-group-flush">
            <a class="list-group-item {{ request()->routeIs('veiculos.index') ? 'active' : '' }}" href="{{ route('veiculos.index') }}">
                <i class="bi-car-front-fill me-2"></i> Veículos
            </a>
            <a class="list-group-item {{ request()->routeIs('marcas.index') ? 'active' : '' }}" href="{{ route('marcas.index') }}">
                <i class="bi-tags me-2"></i> Marcas
            </a>
            <a class="list-group-item {{ request()->routeIs('modelos.index') ? 'active' : '' }}" href="{{ route('modelos.index') }}">
                <i class="bi-layers me-2"></i> Modelos
            </a>
            <a class="list-group-item {{ request()->routeIs('cores.index') ? 'active' : '' }}" href="{{ route('cores.index') }}">
                <i class="bi-palette me-2"></i> Cores
            </a>
        </div>
    </div>
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-dark jcar-navbar px-4 py-2">
            <div class="container-fluid">
                <div class="ms-auto d-flex gap-2">
                    <a href="{{ route('site.home') }}" class="btn btn-outline-light">
                        <i class="bi-house-door me-1"></i> Voltar ao site
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm rounded-pill"><i class="bi-box-arrow-right me-1"></i> Sair</button>
                    </form>
                </div>
            </div>
        </nav>

        <main class="container-fluid">
            @yield('conteudo')
        </main>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@stack('scripts')
</body>
</html>