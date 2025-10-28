@extends('layouts.app')
@section('title','Publicações')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Publicações</h2>
  <a href="{{ route('publicacoes.create') }}" class="btn btn-success">+ Nova Publicação</a>
</div>

<div class="row">
  @foreach($publicacoes as $pub)
  <div class="col-md-4 mb-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">{{ $pub->titulo }}</h5>
        <p class="card-text">{{ Str::limit($pub->conteudo, 100) }}</p>
        <p class="text-muted"><small>Autor: {{ $pub->usuario->nome ?? 'Desconhecido' }}</small></p>
        <a href="{{ route('publicacoes.show',$pub->id) }}" class="btn btn-warning btn-sm">Ver</a>
        <a href="{{ route('publicacoes.edit',$pub->id) }}" class="btn btn-primary btn-sm">Editar</a>
        <form action="{{ route('publicacoes.destroy',$pub->id) }}" method="POST" class="d-inline">
          @csrf @method('DELETE')
          <button class="btn btn-danger btn-sm">Excluir</button>
        </form>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
