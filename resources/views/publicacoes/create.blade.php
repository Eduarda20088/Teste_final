@extends('layouts.app')
@section('title','Nova Publicação')
@section('content')
<h2>Nova Publicação</h2>
<form action="{{ route('publicacoes.store') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="titulo" class="form-control" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Conteúdo</label>
    <textarea name="conteudo" class="form-control" rows="4" required></textarea>
  </div>
  <div class="mb-3">
    <label class="form-label">Imagem (opcional)</label>
    <input type="file" name="imagem" class="form-control">
  </div>
  <button class="btn btn-success">Salvar</button>
  <a href="{{ route('publicacoes.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
