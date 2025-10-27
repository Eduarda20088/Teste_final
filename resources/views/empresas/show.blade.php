@extends('layouts.app')
@section('title', 'Detalhes da Empresa')

@section('content')
<div class="container">
    <h2>Detalhes da Empresa</h2>
    <p><strong>ID:</strong> {{ $empresa->id }}</p>
    <p><strong>Nome:</strong> {{ $empresa->nome }}</p>
    <p><strong>Descrição:</strong> {{ $empresa->descricao }}</p>
    @if($empresa->imagem)
        <p><img src="{{ asset('storage/'.$empresa->imagem) }}" width="200" class="rounded"></p>
    @endif
    <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
