@extends('layouts.app')
@section('title','Detalhes da Publicação')
@section('content')
<div class="card p-4">
  <h3>{{ $publicacao->titulo }}</h3>
  <p>{{ $publicacao->conteudo }}</p>
  @if($publicacao->imagem)
    <img src="{{ asset('storage/'.$publicacao->imagem) }}" width="250" class="rounded mb-3">
  @endif
  <p><strong>Autor:</strong> {{ $publicacao->usuario->nome ?? 'Desconhecido' }}</p>
  <a href="{{ route('publicacoes.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
