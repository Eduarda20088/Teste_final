@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h3>Usuários</h3>
  <a href="{{ route('usuarios.create') }}" class="btn btn-primary">Novo Usuário</a>
</div>

<table class="table table-striped">
  <thead><tr><th>Nome</th><th>Email</th><th>Ações</th></tr></thead>
  <tbody>
  @foreach($usuarios as $u)
    <tr>
      <td>{{ $u->nome }}</td>
      <td>{{ $u->email }}</td>
      <td>
        <a class="btn btn-sm btn-info" href="{{ route('usuarios.show',$u) }}">Ver</a>
        <a class="btn btn-sm btn-warning" href="{{ route('usuarios.edit',$u) }}">Editar</a>
        <form action="{{ route('usuarios.destroy',$u) }}" method="POST" class="d-inline">
          @csrf @method('DELETE')
          <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir usuário?')">Excluir</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

{{ $usuarios->links() }}
@endsection
