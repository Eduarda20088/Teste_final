@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card mb-3">
      @if($publicacao->imagem)<img src="{{ $publicacao->imagem }}" class="card-img-top" style="max-height:400px;object-fit:cover">@endif
      <div class="card-body">
        <h3>{{ $publicacao->titulo }}</h3>
        <p class="text-muted">{{ $publicacao->local }} — {{ $publicacao->cidade }}</p>
        <p>{!! nl2br(e($publicacao->conteudo)) !!}</p>
        <p><small>Por {{ $publicacao->usuario->nome ?? '—' }} @if($publicacao->empresa) | Empresa: {{ $publicacao->empresa->nome }}@endif</small></p>

        <div class="d-flex align-items-center gap-2">
          <form action="{{ route('likes.store') }}" method="POST" class="d-inline">
            @csrf
            <input type="hidden" name="usuario_id" value="{{ $publicacao->usuario_id }}"> <!-- troque se quiser usuário logado -->
            <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
            <button class="btn btn-outline-success btn-sm">👍 {{ $publicacao->likes->count() }}</button>
          </form>

          <form action="{{ route('deslikes.store') }}" method="POST" class="d-inline">
            @csrf
            <input type="hidden" name="usuario_id" value="{{ $publicacao->usuario_id }}">
            <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
            <button class="btn btn-outline-danger btn-sm">👎 {{ $publicacao->deslikes->count() }}</button>
          </form>
        </div>

      </div>
    </div>

    <h5>Comentários ({{ $publicacao->comentarios->count() }})</h5>
    @foreach($publicacao->comentarios as $c)
      <div class="card mb-2">
        <div class="card-body">
          <p><strong>{{ $c->usuario->nome }}</strong> <small class="text-muted">{{ $c->created_at->diffForHumans() }}</small></p>
          <p>{{ $c->comentario }}</p>
          <div>
            <a href="{{ route('comentarios.edit', $c) }}" class="btn btn-sm btn-warning">Editar</a>
            <form action="{{ route('comentarios.destroy', $c) }}" method="POST" class="d-inline">@csrf @method('DELETE')
              <button class="btn btn-sm btn-danger">Excluir</button>
            </form>
          </div>
        </div>
      </div>
    @endforeach

    <h6 class="mt-3">Adicionar comentário</h6>
    <form action="{{ route('comentarios.store') }}" method="POST">
      @csrf
      <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
      <div class="mb-2"><label>Usuário</label>
        <select name="usuario_id" class="form-control">
          @foreach(\App\Models\Usuario::all() as $u)
            <option value="{{ $u->id }}">{{ $u->nome }}</option>
          @endforeach
        </select>
      </div>
      <div class="mb-2"><textarea name="comentario" class="form-control" rows="3" required></textarea></div>
      <button class="btn btn-primary">Comentar</button>
    </form>

  </div>

  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h5>Sobre</h5>
        <p><strong>Empresa:</strong> {{ $publicacao->empresa->nome ?? '—' }}</p>
        <p><strong>Postado em:</strong> {{ $publicacao->created_at->format('d/m/Y H:i') }}</p>
        <a href="{{ route('publicacoes.edit', $publicacao) }}" class="btn btn-warning">Editar</a>
        <form action="{{ route('publicacoes.destroy', $publicacao) }}" method="POST" class="d-inline">@csrf @method('DELETE')
          <button class="btn btn-danger">Excluir</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
