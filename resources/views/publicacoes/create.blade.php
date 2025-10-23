@extends('layouts.app')
@section('content')
<h3>Nova Publicação</h3>
<form action="{{ route('publicacoes.store') }}" method="POST">
  @csrf
  <div class="mb-3"><label>Título</label><input name="titulo" class="form-control" required></div>
  <div class="mb-3"><label>Conteúdo</label><textarea name="conteudo" class="form-control"></textarea></div>
  <div class="mb-3"><label>Imagem (URL)</label><input name="imagem" class="form-control"></div>
  <div class="mb-3"><label>Local</label><input name="local" class="form-control"></div>
  <div class="mb-3"><label>Cidade</label><input name="cidade" class="form-control"></div>
  <div class="mb-3"><label>Usuário</label>
    <select name="usuario_id" class="form-control" required>
      <option value="">Selecione...</option>
      @foreach($usuarios as $u)<option value="{{ $u->id }}">{{ $u->nome }}</option>@endforeach
    </select>
  </div>
  <div class="mb-3"><label>Empresa (opcional)</label>
    <select name="empresa_id" class="form-control">
      <option value="">Nenhuma</option>
      @foreach($empresas as $e)<option value="{{ $e->id }}">{{ $e->nome }}</option>@endforeach
    </select>
  </div>
  <button class="btn btn-success">Salvar</button>
  <a href="{{ route('publicacoes.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
