@extends('layouts.app')
@section('title','Novo Usuário')
@section('content')
 <h2>Novo Usuário</h2>
  <form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
@csrf
  <div class="mb-3">
    <label>Nome</label>
    <input name="nome" class="form-control" required>
</div>
  <div class="mb-3">
    <label>Email</label>
    <input name="email" class="form-control" type="email" required>
</div>
  <div class="mb-3">
    <label>Senha</label>
    <input name="senha" class="form-control" type="password" required>
</div>
  <div class="mb-3">
    <label>Foto</label>
    <input type="file" name="foto" class="form-control"></div>
<button class="btn btn-success">Salvar</button>
<a class="btn btn-secondary" href="{{ route('usuarios.index') }}">Voltar</a>
</form>
@endsection
