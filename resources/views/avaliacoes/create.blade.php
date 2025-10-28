@extends('layouts.app')
@section('title','Nova Avaliação')
@section('content')
<h2>Nova Avaliação</h2>
<form action="{{ route('avaliacoes.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label class="form-label">Usuário</label>
    <select name="usuario_id" class="form-select" required>
      <option value="">Selecione...</option>
      @foreach($usuarios as $u)
        <option value="{{ $u->id }}">{{ $u->nome }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Empresa</label>
    <select name="empresa_id" class="form-select" required>
      <option value="">Selecione...</option>
      @foreach($empresas as $e)
        <option value="{{ $e->id }}">{{ $e->nome }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Nota</label>
    <input type="number" name="nota" class="form-control" min="1" max="5" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Comentário</label>
    <textarea name="comentario" class="form-control" rows="3"></textarea>
  </div>
  <button class="btn btn-success">Salvar</button>
  <a href="{{ route('avaliacoes.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
