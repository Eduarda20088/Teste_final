@extends('layouts.app')
@section('content')
<h3>Editar Publicação</h3>
<form action="{{ route('publicacoes.update',$publicacao) }}" method="POST">
  @csrf @method('PUT')
  <div class="mb-3"><label>Título</label><input name="titulo" class="form-control" value="{{ $publicacao->titulo }}" required></div>
  <div class="mb-3"><label>Conteúdo</label><textarea name="conteudo" class="form-control">{{ $publicacao->conteudo }}</textarea></div>
  <div class="mb-3"><label>Imagem (URL)</label><input name="imagem" class="form-control" value="{{ $publicacao->imagem }}"></div>
  <div class="mb-3"><label>Local</label><input name="local" class="form-control" value="{{ $publicacao->local }}"></div>
  <div class="mb-3"><label>Cidade</label><input name="cidade" class="form-control" value="{{ $publicacao->cidade }}"></div>

  <div class="mb-3"><label>Usuário</label>
    <select name="usuario_id" class="form-control" required>
      @foreach($usuarios as $u)
        <option value="{{ $u->id }}" {{ $u->id == $publicacao->usuario_id ? 'selected' : '' }}>{{ $u->nome }}</option>
      @endforeach
    </select>
  </div>

  <div class="mb-3"><label>Empresa</label>
    <select name="empresa_id" class="form-control">
      <option value="">Nenhuma</option>
      @foreach($empresas as $e)
        <option value="{{ $e->id }}" {{ $e->id == $publicacao->empresa_id ? 'selected' : '' }}>{{ $e->nome }}</option>
      @endforeach
    </select>
  </div>

  <button class="btn btn-warning">Atualizar</button>
  <a href="{{ route('publicacoes.show',$publicacao) }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
