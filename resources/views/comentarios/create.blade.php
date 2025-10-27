@extends('layouts.app')
@section('title','Novo Comentarios')
@section('content')
<div class='container mt-4'>
<h2>Novo Comentarios</h2>
<form action='{{ route('comentarios.store') }}' method='POST' >
@csrf
<div class='mb-3'><label>Publicacao</label><select name='publicacao_id' class='form-control'>@foreach($publicacaos as
$publicacao)<option value='{{ $publicacao->id }}'>{{ $publicacao->nome }}</option>@endforeach</select></div>
<div class='mb-3'><label>Usuario</label><select name='usuario_id' class='form-control'>@foreach($usuarios as
$usuario)<option value='{{ $usuario->id }}'>{{ $usuario->nome }}</option>@endforeach</select></div>
<div class='mb-3'><label>Comentario</label><textarea name='comentario' class='form-control'></textarea></div>
<button class='btn btn-success'>Salvar</button> <a class='btn btn-secondary' href='{{ route('comentarios.index')
}}'>Voltar</a></form></div>@endsection
