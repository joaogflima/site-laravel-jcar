@extends('layouts.template_home.index')
@section('title', $veiculo->modelo->marca->nome.' '.$veiculo->modelo->nome.' — JCar')
@php $placeholder = asset('images/placeholder-car-16x9.png'); @endphp

@section('conteudo')
    <section class="mb-3">
        <div class="d-flex flex-wrap align-items-center justify-content-between gap-2">
            <div>
                <h1 class="h3 mb-1">
                    {{ $veiculo->modelo->marca->nome }} {{ $veiculo->modelo->nome }}
                </h1>
                <div class="text-muted small">
                    Código: #{{ $veiculo->id }}
                </div>
            </div>
            <div class="text-end">
                <div class="text-muted small">Preço</div>
                <div class="display-6 m-0 text-gradient">
                    R$ {{ number_format($veiculo->valor, 2, ',', '.') }}
                </div>
            </div>
        </div>
    </section>

    <div class="row g-4">
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div id="galeriaVeiculo" class="carousel slide" data-bs-ride="true">
                        <div class="carousel-inner rounded-3 overflow-hidden">
                            @php
                                $imgs = array_filter([
                                    $veiculo->imagem1, $veiculo->imagem2, $veiculo->imagem3
                                ]);
                            @endphp

                            @foreach($imgs as $i => $img)
                              <div class="carousel-item @if($i===0) active @endif">
                                <div class="ratio ratio-16x9 bg-light">
                                  <img
                                    src="{{ $img }}"
                                    class="d-block w-100 h-100 object-fit-cover"
                                    alt="Foto {{ $i+1 }}"
                                    loading="{{ $i ? 'lazy' : 'eager' }}"
                                    fetchpriority="{{ $i ? 'low' : 'high' }}"
                                    decoding="async"
                                    onerror="this.onerror=null;this.src='{{ $placeholder }}';"
                                  >
                                </div>
                              </div>
                            @endforeach
                        </div>

                        <button class="carousel-control-prev" type="button" data-bs-target="#galeriaVeiculo" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Anterior</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#galeriaVeiculo" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Próximo</span>
                        </button>
                        @if(count($imgs) > 1)
                            <div class="d-flex gap-2 mt-3">
                                @foreach($imgs as $i => $img)
                                    <button class="btn p-0 border-0" type="button" data-bs-target="#galeriaVeiculo" data-bs-slide-to="{{ $i }}">
                                      <div class="ratio ratio-16x9" style="width: 96px;">
                                        <img
                                          src="{{ $img }}"
                                          class="rounded object-fit-cover w-100 h-100"
                                          alt="Thumb {{ $i+1 }}"
                                          loading="lazy"
                                          decoding="async"
                                          oonerror="this.onerror=null;this.src='{{ $placeholder }}';"
                                        >
                                      </div>
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <div class="small text-muted">Ano</div>
                            <div class="fw-semibold">{{ $veiculo->ano }}</div>
                        </div>
                        <div class="col-6">
                            <div class="small text-muted">Cor</div>
                            <div class="fw-semibold">{{ $veiculo->cor->nome }}</div>
                        </div>
                        <div class="col-6">
                            <div class="small text-muted">Quilometragem</div>
                            <div class="fw-semibold">{{ number_format($veiculo->quilometragem ?? 0, 0, ',', '.') }} km</div>
                        </div>
                        <div class="col-6">
                            <div class="small text-muted">Laudo</div>
                            <div class="fw-semibold text-success"><i class="bi-check-circle me-1"></i>Aprovado</div>
                        </div>
                    </div>

                    @if($veiculo->detalhes)
                        <div class="mb-3">
                            <h6 class="fw-bold">Descrição</h6>
                            <p class="text-muted mb-0">{{ $veiculo->detalhes }}</p>
                        </div>
                    @endif

                    <div class="d-grid gap-2">
                        <a href="{{ route('site.home') }}" class="btn btn-ghost-light">
                            ← Voltar à listagem
                        </a>

                        @php
                            $msg = rawurlencode("Olá, tenho interesse no ".$veiculo->modelo->marca->nome." ".$veiculo->modelo->nome." (".$veiculo->ano."). Ainda está disponível?");
                            $whats = 'https://wa.me/5514999999999?text='.$msg;
                        @endphp
                        <a href="{{ $whats }}" target="_blank" rel="noopener" class="btn btn-primary btn-lg fw-semibold">
                            <i class="bi-whatsapp me-2"></i>Falar no WhatsApp
                        </a>
                    </div>

                    <div class="d-flex flex-wrap gap-3 mt-4 text-muted small">
                        <span><i class="bi-shield-check me-1"></i>Garantia</span>
                        <span><i class="bi-tools me-1"></i>Revisado</span>
                        <span><i class="bi-ev-front me-1"></i>Inspeção 120+</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
