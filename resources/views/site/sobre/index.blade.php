@extends('layouts.template_home.index')
@section('title', 'Sobre a JCar')

@section('hero')
<section
    class="hero-jcar position-relative text-white overflow-hidden"
    style="--hero-bg: url('{{ asset('images/hero/showroom.png') }}');"
    aria-label="Sobre a JCar"
>
    <div class="hero-overlay"></div>
    <div class="hero-shape hero-shape-1"></div>
    <div class="hero-shape hero-shape-2"></div>

    <div class="container position-relative">
        <div class="row align-items-center min-vh-60 py-5">
            <div class="col-lg-8">
                <div class="glass p-4 p-md-5 rounded-4 shadow-lg">
                    <span class="badge bg-primary-subtle text-primary-emphasis mb-3 px-3 py-2 rounded-pill">
                        Transparência • Tecnologia • Confiança
                    </span>
                    <h1 class="display-4 fw-extrabold lh-1 mb-3">
                        Sobre a <span class="text-gradient">JCar</span>
                    </h1>
                    <p class="lead text-white-75 mb-4">
                        A gente conecta você ao carro certo: curadoria rigorosa, inspeção completa
                        e uma jornada de compra leve — online ou na loja.
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#historia" class="btn btn-light btn-lg fw-semibold"><i class="bi-clock-history me-2"></i>Nossa história</a>
                        <a href="#valores"  class="btn btn-outline-light btn-lg fw-semibold"><i class="bi-stars me-2"></i>Missão & Valores</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('conteudo')
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-7">
                    <h2 class="fw-bold mb-3">Quem somos</h2>
                    <p class="lead text-muted">
                        Nascemos para simplificar a compra e venda de seminovos no Brasil. Unimos dados, perícia técnica
                        e atendimento humano para oferecer carros selecionados e um pós-venda sem dor de cabeça.
                    </p>
                    <div class="d-flex flex-wrap gap-3 mt-3">
                        <span class="badge bg-primary-subtle text-primary-emphasis px-3 py-2"><i class="bi-shield-check me-2"></i>Laudo cautelar</span>
                        <span class="badge bg-primary-subtle text-primary-emphasis px-3 py-2"><i class="bi-wrench-adjustable-circle me-2"></i>120+ itens inspecionados</span>
                        <span class="badge bg-primary-subtle text-primary-emphasis px-3 py-2"><i class="bi-emoji-smile me-2"></i>98% satisfação</span>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div id="carouselSobre" class="carousel slide rounded-4 shadow overflow-hidden" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselSobre" data-bs-slide-to="0" class="active" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselSobre" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselSobre" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('images/sobre/carrossel_1.png') }}" class="d-block w-100" alt="Showroom JCar">
                                <div class="carousel-caption d-none d-md-block">
                                    <span class="badge bg-dark bg-opacity-50 rounded-pill">Showroom</span>
                                    <h5 class="fw-semibold mt-2">Seleção com curadoria</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/sobre/carrossel_2.png') }}" class="d-block w-100" alt="Equipe técnica">
                                <div class="carousel-caption d-none d-md-block">
                                    <span class="badge bg-dark bg-opacity-50 rounded-pill">Perícia</span>
                                    <h5 class="fw-semibold mt-2">Inspeção em 120+ itens</h5>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('images/sobre/carrossel_3.png') }}" class="d-block w-100" alt="Entrega JCar">
                                <div class="carousel-caption d-none d-md-block">
                                    <span class="badge bg-dark bg-opacity-50 rounded-pill">Entrega</span>
                                    <h5 class="fw-semibold mt-2">Documentação sem stress</h5>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselSobre" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselSobre" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Próximo</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-4">
        <div class="container">
            <div class="row g-4">
                @php $stats = [
                    ['n' => '10k+', 't' => 'Clientes atendidos'],
                    ['n' => '1.200+', 't' => 'Veículos/ano'],
                    ['n' => '98%',  't' => 'Satisfação'],
                    ['n' => '15',   't' => 'Anos no mercado'],
                ]; @endphp
                @foreach ($stats as $s)
                    <div class="col-6 col-md-3">
                        <div class="card h-100 border-0 shadow-sm text-center">
                            <div class="card-body py-4">
                                <div class="display-6 fw-bold text-gradient">{{ $s['n'] }}</div>
                                <div class="mt-2 text-muted">{{ $s['t'] }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="historia" class="py-5 bg-light border-top border-bottom">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold">Nossa história</h2>
                    <p class="text-muted">Da garagem ao digital.</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <ul class="list-unstyled timeline m-0">
                        <li class="timeline-item">
                            <div class="timeline-dot bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1 text-primary">2010 • O começo</h6>
                                <p class="mb-0 text-muted">Fundada em Bauru por entusiastas automotivos, com foco em seminovos revisados.</p>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-dot bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1 text-primary">2016 • Expansão</h6>
                                <p class="mb-0 text-muted">Parcerias com concessionárias e laudos de procedência elevaram o padrão.</p>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-dot bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1 text-primary">2020 • Digital</h6>
                                <p class="mb-0 text-muted">E-commerce próprio e jornada 100% online.</p>
                            </div>
                        </li>
                        <li class="timeline-item">
                            <div class="timeline-dot bg-primary"></div>
                            <div class="timeline-content">
                                <h6 class="mb-1 text-primary">2024+ • Experiência JCar</h6>
                                <p class="mb-0 text-muted">Entrega em domicílio, assinatura de veículos e garantia estendida.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section id="valores" class="py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold mb-2"><i class="bi-bullseye me-2"></i>Missão</h5>
                            <p class="text-muted mb-0">Oferecer a melhor experiência de compra/venda com transparência e agilidade.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold mb-2"><i class="bi-eye me-2"></i>Visão</h5>
                            <p class="text-muted mb-0">Ser referência nacional em qualidade e inovação em seminovos.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="card-body">
                            <h5 class="fw-bold mb-2"><i class="bi-heart me-2"></i>Valores</h5>
                            <ul class="text-muted mb-0 ps-3">
                                <li>Transparência e ética</li>
                                <li>Foco no cliente</li>
                                <li>Excelência técnica</li>
                                <li>Inovação contínua</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-1">
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="ratio ratio-16x9 bg-light">
                            <img src="{{ asset('images/sobre/oficina.png') }}" class="object-fit-cover" alt="Oficina JCar">
                        </div>
                        <div class="card-body">
                            <h5 class="fw-semibold">Padrão de inspeção</h5>
                            <p class="text-muted mb-0">Checklist de 120+ itens, histórico verificado e diagnóstico computadorizado.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="ratio ratio-16x9 bg-light">
                            <img src="{{ asset('images/sobre/entrega.png') }}" class="object-fit-cover" alt="Entrega ao cliente">
                        </div>
                        <div class="card-body">
                            <h5 class="fw-semibold">Entrega sem estresse</h5>
                            <p class="text-muted mb-0">Documentação, transferência e garantia estendida com as melhores condições.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light border-top">
        <div class="container">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8 text-center">
                    <h2 class="fw-bold">Perguntas frequentes</h2>
                    <p class="text-muted">Algumas dúvidas comuns sobre a JCar.</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="accordion" id="faqJcar">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="q1">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#a1" aria-expanded="true" aria-controls="a1">
                                    Como funcionam a avaliação e a garantia?
                                </button>
                            </h2>
                            <div id="a1" class="accordion-collapse collapse show" aria-labelledby="q1" data-bs-parent="#faqJcar">
                                <div class="accordion-body">
                                    Todos os carros passam por laudo cautelar e revisão completa. Oferecemos garantia mecânica com planos flexíveis.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="q2">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a2" aria-expanded="false" aria-controls="a2">
                                    Posso vender meu carro para a JCar?
                                </button>
                            </h2>
                            <div id="a2" class="accordion-collapse collapse" aria-labelledby="q2" data-bs-parent="#faqJcar">
                                <div class="accordion-body">
                                    Sim. Fazemos proposta em até 24h após avaliação técnica e documental; pagamento seguro e transferência imediata.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="q3">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#a3" aria-expanded="false" aria-controls="a3">
                                    Trabalham com financiamento?
                                </button>
                            </h2>
                            <div id="a3" class="accordion-collapse collapse" aria-labelledby="q3" data-bs-parent="#faqJcar">
                                <div class="accordion-body">
                                    Sim. Parcerias com bancos e financeiras para a melhor taxa e prazo conforme seu perfil.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        @php
                            $msg = rawurlencode("Olá, gostaria de falar com um atendente.");
                            $whats = 'https://wa.me/5514999999999?text='.$msg;
                        @endphp
                        <a href="{{ $whats }}" class="btn btn-primary btn-lg fw-semibold"><i class="bi-chat-dots me-2"></i>Falar com a JCar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="rounded-4 p-4 p-md-5 bg-primary text-white d-flex flex-column flex-lg-row align-items-lg-center justify-content-between">
                <div class="mb-3 mb-lg-0">
                    <h3 class="fw-bold mb-1">Pronto para encontrar seu próximo carro?</h3>
                    <p class="mb-0 opacity-75">Conheça nosso catálogo completo.</p>
                </div>
                <a href="{{ route('site.home') }}" class="btn btn-light btn-lg fw-semibold">Ver veículos</a>
            </div>
        </div>
    </section>
@endsection
