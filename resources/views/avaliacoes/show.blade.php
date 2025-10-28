@extends('layouts.app')
@section('title','Detalhes da Avaliação')
@section('content')
<div class="card p-4">
  <h4>Empresa: {{ $avaliacao->empresa->nome ?? 'N/A' }}</h4>
  <p><strong>Usuário:</strong> {{ $avaliacao->usuario->nome ?? 'N/A' }}</p>
  <p><strong>Nota:</strong> {{ $avaliacao->nota }}/5</p>
  <p><strong>Comentário:</strong></p>
  <p>{{ $avaliacao->comentario }}</p>
  <a href="{{ route('avaliacoes.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection

