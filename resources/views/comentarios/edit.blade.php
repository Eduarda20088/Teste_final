@extends('layouts.app')
@section('title','Editar Comentarios')
@section('content')
<div class='container mt-4'>
<h2>Editar Comentarios</h2>
<form action='{{ route('comentarios.update', $comentario) }}' method='POST' >
@csrf @method('PUT')
<div class='mb-3'><label>Publicacao</label><select name='publicacao_id' class='form-control'>@foreach($publicacaos as
$publicacao)<option value='{{ $publicacao->id }}' {{ $publicacao->id == $comentario->publicacao_id ? 'selected' : '' }}>{{
$publicacao->nome }}</option>@endforeach</select></div>
<div class='mb-3'><label>Usuario</label><select name='usuario_id' class='form-control'>@foreach($usuarios as
$usuario)<option value='{{ $usuario->id }}' {{ $usuario->id == $comentario->usuario_id ? 'selected' : '' }}>{{
$usuario->nome }}</option>@endforeach</select></div>
<div class='mb-3'><label>Comentario</label><textarea name='comentario' class='form-control'>{{ $comentario->comentario
}}</textarea></div>
<button class='btn btn-warning'>Atualizar</button> <a class='btn btn-secondary' href='{{ route('comentarios.index')
}}'>Voltar</a></form></div>@endsection
