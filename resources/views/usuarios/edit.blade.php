@extends('layouts.app')
@section('title','Editar Usuário')
@section('content')
  <h2>Editar Usuário</h2>
   <form action="{{ route('usuarios.update',$usuario->id) }}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')
    <div class="mb-3">
      <label>Nome</label>
      <input name="nome" class="form-control" value="{{ $usuario->nome }}">
    </div>
    <div class="mb-3">
      <label>Email</label>
      <input name="email" class="form-control" value="{{ $usuario->email }}">
    </div>
    <div class="mb-3">
      <label>Foto</label>
      <input type="file" name="foto" class="form-control">
    </div>
@if($usuario->foto)
    <img src="{{ asset('storage/'.$usuario->foto) }}" width="120" class="rounded mt-2">
@endif
     <button class="btn btn-primary">Atualizar</button>
    <a class="btn btn-secondary" href="{{ route('usuarios.index') }}">Voltar</a>
</form>
@endsection
