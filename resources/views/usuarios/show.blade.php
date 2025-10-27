@extends('layouts.app')
@section('title','Detalhes do Usuário')
@section('content')
   <div class="card p-3">
      <h3>{{ $usuario->nome }}</h3>
      <p><b>Email:</b> {{ $usuario->email }}</p>
 @if($usuario->foto)
    <img src="{{ asset('storage/'.$usuario->foto) }}" width="200" class="rounded shadow">
  @endif
  <div class="mt-3">
    <a href="{{ route('usuarios.edit',$usuario->id) }}" class="btn btn-primary">Editar</a>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Voltar</a>
  </div>
</div>
@endsection
