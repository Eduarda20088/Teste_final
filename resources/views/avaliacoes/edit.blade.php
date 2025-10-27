@extends('layouts.app')
@section('title','Editar Avaliacoes')
@section('content')
<div class='container mt-4'>
<h2>Editar Avaliacoes</h2>
<form action='{{ route('avaliacoes.update', $avaliacoe) }}' method='POST' >
@csrf @method('PUT')
<div class='mb-3'><label>Usuario</label><select name='usuario_id' class='form-control'>@foreach($usuarios as
$usuario)<option value='{{ $usuario->id }}' {{ $usuario->id == $avaliacoe->usuario_id ? 'selected' : '' }}>{{
$usuario->nome }}</option>@endforeach</select></div>
<div class='mb-3'><label>Empresa</label><select name='empresa_id' class='form-control'>@foreach($empresas as
$empresa)<option value='{{ $empresa->id }}' {{ $empresa->id == $avaliacoe->empresa_id ? 'selected' : '' }}>{{
$empresa->nome }}</option>@endforeach</select></div>
<div class='mb-3'><label>Nota</label><input name='nota' class='form-control' value='{{ $avaliacoe->nota }}'></div>
<div class='mb-3'><label>Comentario</label><textarea name='comentario' class='form-control'>{{ $avaliacoe->comentario
}}</textarea></div>
<button class='btn btn-warning'>Atualizar</button> <a class='btn btn-secondary' href='{{ route('avaliacoes.index')
}}'>Voltar</a></form></div>@endsection