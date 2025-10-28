@extends('layouts.app')
@section('title','Avaliações')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Avaliações</h2>
  <a href="{{ route('avaliacoes.create') }}" class="btn btn-success">+ Nova Avaliação</a>
</div>

<table class="table table-striped align-middle">
  <thead class="table-warning">
    <tr>
      <th>Usuário</th>
      <th>Empresa</th>
      <th>Nota</th>
      <th>Comentário</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($avaliacoes as $avaliacao)
    <tr>
      <td>{{ $avaliacao->usuario->nome ?? 'N/A' }}</td>
      <td>{{ $avaliacao->empresa->nome ?? 'N/A' }}</td>
      <td><span class="fw-bold">{{ $avaliacao->nota }}</span>/5</td>
      <td>{{ Str::limit($avaliacao->comentario, 60) }}</td>
      <td>
        <a href="{{ route('avaliacoes.show', $avaliacao->id) }}" class="btn btn-warning btn-sm">Ver</a>
        <a href="{{ route('avaliacoes.edit', $avaliacao->id) }}" class="btn btn-primary btn-sm">Editar</a>
        <form action="{{ route('avaliacoes.destroy', $avaliacao->id) }}" method="POST" class="d-inline">
          @csrf @method('DELETE')
          <button class="btn btn-danger btn-sm">Excluir</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
