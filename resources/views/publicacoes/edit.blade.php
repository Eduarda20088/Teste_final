@extends('layouts.app')
@section('title','Editar Publicação')
@section('content')
<h2>Editar Publicação</h2>
<form action="{{ route('publicacoes.update', $publicacao->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="titulo" class="form-control" value="{{ $publicacao->titulo }}" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Conteúdo</label>
    <textarea name="conteudo" class="form-control" rows="4">{{ $publicacao->conteudo }}</textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Imagem</label>
    <input type="file" name="imagem" class="form-control">
    @if($publicacao->imagem)
      <img src="{{ asset('storage/'.$publicacao->imagem) }}" width="150" class="mt-2 rounded">
    @endif
  </div>
  <button class="btn btn-primary">Atualizar</button>
  <a href="{{ route('publicacoes.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
