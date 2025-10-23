@extends('layouts.app')
@section('content')
<h3>Editar Usuário</h3>
<form action="{{ route('usuarios.update',$usuario) }}" method="POST">
  @csrf @method('PUT')
  <div class="mb-3"><label>Nome</label><input name="nome" class="form-control" value="{{ $usuario->nome }}" required></div>
  <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" value="{{ $usuario->email }}" required></div>
  <div class="mb-3"><label>Nova senha (deixe vazio p/ manter)</label><input type="password" name="senha" class="form-control"></div>
  <div class="mb-3"><label>Foto (URL)</label><input name="foto" class="form-control" value="{{ $usuario->foto }}"></div>
  <button class="btn btn-warning">Atualizar</button>
  <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
