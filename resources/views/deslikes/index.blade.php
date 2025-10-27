@extends('layouts.app')
@section('title', 'Deslikes')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Deslikes</h2>
  <a href="{{ route('deslikes.create') }}" class="btn btn-success">+ Novo Deslike</a>
</div>

<table class="table table-striped align-middle">
  <thead class="table-danger">
    <tr>
      <th>ID</th>
      <th>Usuário</th>
      <th>Publicação</th>
      <th>Criado em</th>
      <th>Ações</th>
    </tr>
  </thead>
  <tbody>
    @foreach($deslikes as $deslike)
    <tr>
      <td>{{ $deslike->id }}</td>
      <td>{{ $deslike->usuario->nome ?? 'N/A' }}</td>
      <td>{{ $deslike->publicacao->titulo ?? 'N/A' }}</td>
      <td>{{ $deslike->created_at->format('d/m/Y H:i') }}</td>
      <td>
        <a href="{{ route('deslikes.show', $deslike->id) }}" class="btn btn-warning btn-sm">Ver</a>
        <form action="{{ route('deslikes.destroy', $deslike->id) }}" method="POST" class="d-inline">
          @csrf @method('DELETE')
          <button class="btn btn-danger btn-sm">Remover</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection
