@extends('layouts.template_home.index')

@section('conteudo')
    <section class="mb-4">
      <form id="filtros-veiculos" method="GET" action="{{ route('site.home') }}" class="card border-0 shadow-sm">
        <div class="card-body">
          <div class="row g-3 align-items-end">
            <div class="col-12 col-md-4">
              <label class="form-label">Buscar</label>
              <div class="input-group">
                <span class="input-group-text bg-white border-0"><i class="bi-search"></i></span>
                <input type="text" name="q" value="{{ request('q') }}" class="form-control border-0"
                      placeholder="Marca, modelo, ano...">
              </div>
            </div>

            <div class="col-6 col-md-2">
              <label class="form-label">Marca</label>
              <select name="marca" class="form-select">
                <option value="">Todas</option>
                @foreach($marcas ?? [] as $m)
                  <option value="{{ $m->id }}" @selected(request('marca') == $m->id)>{{ $m->nome }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-6 col-md-2">
              <label class="form-label">Cor</label>
              <select name="cor" class="form-select">
                <option value="">Todas</option>
                @foreach($cores ?? [] as $c)
                  <option value="{{ $c->id }}" @selected(request('cor') == $c->id)>{{ $c->nome }}</option>
                @endforeach
              </select>
            </div>

            <div class="col-6 col-md-2">
              <label class="form-label">Ano mín.</label>
              <input type="number" name="ano_min" value="{{ request('ano_min') }}" class="form-control" min="1970" max="{{ now()->year+1 }}">
            </div>

            <div class="col-6 col-md-2">
              <label class="form-label">Ano máx.</label>
              <input type="number" name="ano_max" value="{{ request('ano_max') }}" class="form-control" min="1970" max="{{ now()->year+1 }}">
            </div>

            <div class="col-6 col-md-2">
              <label class="form-label">Ordenar por</label>
              <select name="sort" class="form-select">
                <option value="">Relevância</option>
                <option value="preco_asc"  @selected(request('sort')==='preco_asc')>Preço: menor → maior</option>
                <option value="preco_desc" @selected(request('sort')==='preco_desc')>Preço: maior → menor</option>
                <option value="ano_desc"   @selected(request('sort')==='ano_desc')>Ano: mais novo</option>
                <option value="ano_asc"    @selected(request('sort')==='ano_asc')>Ano: mais antigo</option>
              </select>
            </div>

            <div class="col-12 col-md-auto ms-auto">
              <button class="btn btn-primary px-4"><i class="bi-funnel me-2"></i>Filtrar</button>
              <a href="{{ route('site.home') }}" class="btn btn-ghost-light">Limpar</a>
            </div>
          </div>
        </div>
      </form>
    </section>

    @push('scripts')
    <script>
      const form = document.getElementById('filtros-veiculos');
      const autos = form.querySelectorAll('select, input[type="number"]');
      autos.forEach(el => el.addEventListener('change', () => form.submit()));
    </script>
    @endpush
    <section>
        <div class="row g-4">
            @forelse($veiculos as $veiculo)
                <div class="col-12 col-sm-6 col-lg-4">
                    <div class="card h-100 border-0 shadow-sm">
                        <div class="position-relative">
                            <div class="ratio ratio-16x9 bg-light">
                                <img
                                    src="{{ $veiculo->imagem1 }}"
                                    class="w-100 h-100 rounded-top object-fit-cover" 
                                    class="card-img-top object-fit-cover"
                                    alt="Imagem do {{ $veiculo->modelo->nome }}"
                                >
                            </div>
                            <div class="position-absolute top-0 start-0 p-2 d-flex gap-2">
                                @if(($veiculo->destaque ?? false))
                                    <span class="badge bg-warning text-dark fw-semibold">Destaque</span>
                                @endif
                                <span class="badge bg-dark bg-opacity-50">Laudo aprovado</span>
                            </div>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title mb-1">
                                {{ $veiculo->modelo->marca->nome }} {{ $veiculo->modelo->nome }}
                            </h5>
                            <div class="text-muted small mb-2">
                                <i class="bi-speedometer2 me-1"></i>{{ number_format($veiculo->quilometragem ?? 0, 0, ',', '.') }} km ·
                                <i class="bi-calendar3 me-1 ms-2"></i>{{ $veiculo->ano }} ·
                                <i class="bi-palette me-1 ms-2"></i>{{ $veiculo->cor->nome }}
                            </div>

                            <div class="d-flex align-items-baseline justify-content-between">
                                <div>
                                    <div class="text-muted small">Preço</div>
                                    <div class="h4 m-0 text-gradient">
                                        R$ {{ number_format($veiculo->valor, 2, ',', '.') }}
                                    </div>
                                </div>
                                <a href="{{ route('site.veiculo', $veiculo->id) }}" class="btn btn-primary">
                                    Ver detalhes
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="card border-0 shadow-sm text-center p-5">
                        <h5 class="mb-2">Não encontramos veículos com esses filtros.</h5>
                        <p class="text-muted mb-4">Tente remover alguns filtros ou voltar mais tarde.</p>
                        <a href="{{ route('site.home') }}" class="btn btn-primary">
                            Limpar filtros
                        </a>
                    </div>
                </div>
            @endforelse
        </div>
        @if(method_exists($veiculos, 'links'))
            <div class="mt-4">
                {{ $veiculos->withQueryString()->links() }}
            </div>
        @endif
    </section>
@endsection
