@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Publicações</h3>
  <a href="{{ route('publicacoes.create') }}" class="btn btn-primary">Nova Publicação</a>
</div>

<div class="row">
  @foreach($publicacoes as $p)
    <div class="col-md-4 mb-3">
      <div class="card h-100">
        @if($p->imagem)<img src="{{ $p->imagem }}" class="card-img-top" style="height:180px;object-fit:cover">@endif
        <div class="card-body">
          <h5 class="card-title">{{ $p->titulo }}</h5>
          <p class="card-text text-muted">{{ $p->local }} — {{ $p->cidade }}</p>
          <p><small>Por: {{ $p->usuario->nome ?? '—' }} | Empresa: {{ $p->empresa->nome ?? '—' }}</small></p>
          <div class="d-flex justify-content-between">
            <a class="btn btn-sm btn-info" href="{{ route('publicacoes.show',$p) }}">Ver</a>
            <div>
              <span class="me-2">👍 {{ $p->likes->count() }}</span>
              <span>👎 {{ $p->deslikes->count() }}</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach
</div>

{{ $publicacoes->links() }}
@endsection
