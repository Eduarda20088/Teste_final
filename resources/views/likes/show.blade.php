@extends('layouts.app')
@section('title', 'Detalhes do Like')
@section('content')
<div class="card p-4">
  <h4>Detalhes do Like</h4>
  <p><strong>Usuário:</strong> {{ $like->usuario->nome ?? 'N/A' }}</p>
  <p><strong>Publicação:</strong> {{ $like->publicacao->titulo ?? 'N/A' }}</p>
  <p><strong>Data:</strong> {{ $like->created_at->format('d/m/Y H:i') }}</p>
  <a href="{{ route('likes.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
