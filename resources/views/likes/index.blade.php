@extends('layouts.app')
@section('title', 'Likes')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Likes</h2>
  <a href="{{ route('likes.create') }}" class="btn btn-success">+ Novo Like</a>
</div>

<table class="table table-striped align-middle">
  <thead class="table-success">
    <tr>
      <th>ID</th>
      <th>Usuário</th>
      <th>Publicação</th>
      <th>Criado em</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($likes as $like)
    <tr>
      <td>{{ $like->id }}</td>
      <td>{{ $like->usuario->nome ?? 'N/A' }}</td>
      <td>{{ $like->publicacao->titulo ?? 'N/A' }}</td>
      <td>{{ $like->created_at->format('d/m/Y H:i') }}</td>
      <td>
        <a href="{{ route('likes.show', $like->id) }}" class="btn btn-warning btn-sm">Ver</a>
        <form action="{{ route('likes.destroy', $like->id) }}" method="POST" class="d-inline">
          @csrf @method('DELETE')
          <button class="btn btn-danger btn-sm">Remover</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
