@extends('layouts.app')
@section('content')
<h3>Usuário: {{ $usuario->nome }}</h3>
<p><strong>Email:</strong> {{ $usuario->email }}</p>
@if($usuario->foto)
  <p><img src="{{ $usuario->foto }}" alt="foto" style="max-width:200px"></p>
@endif

<a href="{{ route('usuarios.edit',$usuario) }}" class="btn btn-warning">Editar</a>
<a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
