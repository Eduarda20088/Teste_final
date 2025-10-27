@extends('layouts.app')
@section('title','Detalhes Comentarios')
@section('content')
<div class='container mt-4'>
<h2>Comentarios - detalhes</h2>
<ul class='list-group'>
<li class='list-group-item'><strong>Publicacao:</strong> {{ $comentario->publicacao->nome ?? '' }}</li>
<li class='list-group-item'><strong>Usuario:</strong> {{ $comentario->usuario->nome ?? '' }}</li>
<li class='list-group-item'><strong>Comentario:</strong> {{ $comentario->comentario }}</li>
</ul>
<a class='btn btn-secondary mt-3' href='{{ route('comentarios.index') }}'>Voltar</a></div>@endsection
