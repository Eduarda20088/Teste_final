@extends('layouts.app')
@section('title', 'Detalhes do Deslike')
@section('content')
<div class="card p-4">
  <h4>Detalhes do Deslike</h4>
  <p><strong>Usuário:</strong> {{ $deslike->usuario->nome ?? 'N/A' }}</p>
  <p><strong>Publicação:</strong> {{ $deslike->publicacao->titulo ?? 'N/A' }}</p>
  <p><strong>Data:</strong> {{ $deslike->created_at->format('d/m/Y H:i') }}</p>
  <a href="{{ route('deslikes.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
