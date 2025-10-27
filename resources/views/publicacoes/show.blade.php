@extends('layouts.app')
@section('title', 'Detalhes da Publicação')

@section('content')
<div class="container">
    <h2>Detalhes da Publicação</h2>
    <p><strong>Título:</strong> {{ $publicacao->titulo }}</p>
    <p><strong>Local:</strong> {{ $publicacao->local }}</p>
    <p><strong>Cidade:</strong> {{ $publicacao->cidade }}</p>
    <p><strong>Empresa:</strong> {{ $publicacao->empresa->nome ?? '—' }}</p>
    @if($publicacao->imagem)
        <p><img src="{{ asset('storage/'.$publicacao->imagem) }}" width="250" class="rounded"></p>
    @endif
    <a href="{{ route('publicacoes.index') }}" class="btn btn-secondary">Voltar</a>
</div>
@endsection
