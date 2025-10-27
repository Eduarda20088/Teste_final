@extends('layouts.app')
@section('title', 'Novo Deslike')
@section('content')
<h2>Novo Deslike</h2>
<form action="{{ route('deslikes.store') }}" method="POST">
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
    <label class="form-label">Publicação</label>
    <select name="publicacao_id" class="form-select" required>
      <option value="">Selecione...</option>
      @foreach($publicacoes as $p)
        <option value="{{ $p->id }}">{{ $p->titulo }}</option>
      @endforeach
    </select>
  </div>
  <button class="btn btn-success">Salvar</button>
  <a href="{{ route('deslikes.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
