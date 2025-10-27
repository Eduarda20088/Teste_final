@extends('layouts.app')
@section('title', 'Editar Deslike')
@section('content')
<h2>Editar Deslike</h2>
<form action="{{ route('deslikes.update', $deslike->id) }}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label class="form-label">Usuário</label>
    <select name="usuario_id" class="form-select">
      @foreach($usuarios as $u)
        <option value="{{ $u->id }}" @if($deslike->usuario_id == $u->id) selected @endif>{{ $u->nome }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Publicação</label>
    <select name="publicacao_id" class="form-select">
      @foreach($publicacoes as $p)
        <option value="{{ $p->id }}" @if($deslike->publicacao_id == $p->id) selected @endif>{{ $p->titulo }}</option>
      @endforeach
    </select>
  </div>
  <button class="btn btn-primary">Atualizar</button>
  <a href="{{ route('deslikes.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
