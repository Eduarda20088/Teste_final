@extends('layouts.app')
@section('title', 'Visualizar Curso')
@section('content')
<div class="container mt-4">
    <h1>Detalhes do Curso</h1>
    <p><strong>Nome:</strong> {{ $curso->nome }}</p>
    <a href="{{ route('curso.index') }}" class="btn btn-primary mt-3">Voltar</a>
</div>
@endsection
