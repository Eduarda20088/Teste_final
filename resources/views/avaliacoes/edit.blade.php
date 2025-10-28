@extends('layouts.app')
@section('title','Editar Avaliação')
@section('content')
<h2>Editar Avaliação</h2>
<form action="{{ route('avaliacoes.update', $avaliacao->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label class="form-label">Usuário</label>
    <select name="usuario_id" class="form-select">
      @foreach($usuarios as $u)
        <option value="{{ $u->id }}" @if($avaliacao->usuario_id == $u->id) selected @endif>{{ $u->nome }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Empresa</label>
    <select name="empresa_id" class="form-select">
      @foreach($empresas as $e)
        <option value="{{ $e->id }}" @if($avaliacao->empresa_id == $e->id) selected @endif>{{ $e->nome }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Nota</label>
    <input type="number" name="nota" class="form-control" min="1" max="5" value="{{ $avaliacao->nota }}">
  </div>
  <div class="mb-3">
    <label class="form-label">Comentário</label>
    <textarea name="comentario" class="form-control" rows="3">{{ $avaliacao->comentario }}</textarea>
  </div>
  <button class="btn btn-primary">Atualizar</button>
  <a href="{{ route('avaliacoes.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
