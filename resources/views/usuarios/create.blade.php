@extends('layouts.app')
@section('content')
<h3>Novo Usuário</h3>
<form action="{{ route('usuarios.store') }}" method="POST">
  @csrf
  <div class="mb-3"><label>Nome</label><input name="nome" class="form-control" required></div>
  <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
  <div class="mb-3"><label>Senha</label><input type="password" name="senha" class="form-control" required></div>
  <div class="mb-3"><label>Foto (URL)</label><input name="foto" class="form-control"></div>
  <button class="btn btn-success">Salvar</button>
  <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
