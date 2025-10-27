@extends('layouts.app')
@section('title','Usuários')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Lista de Usuários</h2>
    <a href="{{ route('usuarios.create') }}" class="btn btn-success">+ Novo Usuário</a>
</div>

<div class="row">
@foreach($usuarios as $usuario)
  <div class="col-md-3 mb-4">
    <div class="card">
      @if($usuario->foto)
        <img src="{{ asset('storage/'.$usuario->foto) }}" class="card-img-top" alt="foto">
      @endif
      <div class="card-body">
        <h5 class="card-title">{{ $usuario->nome }}</h5>
        <p class="card-text">{{ $usuario->email }}</p>
        <a href="{{ route('usuarios.show',$usuario->id) }}" class="btn btn-warning btn-sm">Ver</a>
        <a href="{{ route('usuarios.edit',$usuario->id) }}" class="btn btn-primary btn-sm">Editar</a>
        <form action="{{ route('usuarios.destroy',$usuario->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')
          <button class="btn btn-danger btn-sm">Excluir</button>
        </form>
      </div>
    </div>
  </div>
@endforeach
</div>
@endsection
