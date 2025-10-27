@extends('layouts.app')
@section('title','Novo Avaliacoes')
@section('content')
<div class='container mt-4'>
<h2>Novo Avaliacoes</h2>
<form action='{{ route('avaliacoes.store') }}' method='POST' >
@csrf
<div class='mb-3'><label>Usuario</label><select name='usuario_id' class='form-control'>@foreach($usuarios as
$usuario)<option value='{{ $usuario->id }}'>{{ $usuario->nome }}</option>@endforeach</select></div>
<div class='mb-3'><label>Empresa</label><select name='empresa_id' class='form-control'>@foreach($empresas as
$empresa)<option value='{{ $empresa->id }}'>{{ $empresa->nome }}</option>@endforeach</select></div>
<div class='mb-3'><label>Nota</label><input name='nota' class='form-control'></div>
<div class='mb-3'><label>Comentario</label><textarea name='comentario' class='form-control'></textarea></div>
<button class='btn btn-success'>Salvar</button> <a class='btn btn-secondary' href='{{ route('avaliacoes.index')
}}'>Voltar</a></form></div>@endsection