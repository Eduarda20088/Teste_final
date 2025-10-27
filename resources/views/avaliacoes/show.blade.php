@extends('layouts.app')
@section('title','Detalhes Avaliacoes')
@section('content')
<div class='container mt-4'>
<h2>Avaliacoes - detalhes</h2>
<ul class='list-group'>
<li class='list-group-item'><strong>Usuario:</strong> {{ $avaliacoe->usuario->nome ?? '' }}</li>
<li class='list-group-item'><strong>Empresa:</strong> {{ $avaliacoe->empresa->nome ?? '' }}</li>
<li class='list-group-item'><strong>Nota:</strong> {{ $avaliacoe->nota }}</li>
<li class='list-group-item'><strong>Comentario:</strong> {{ $avaliacoe->comentario }}</li>
</ul><a class='btn btn-secondary mt-3' href='{{ route('avaliacoes.index') }}'>Voltar</a></div>@endsection