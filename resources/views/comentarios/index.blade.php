@extends('layouts.app')
@section('content')
<h3>Comentários</h3>
<table class="table">
  <thead><tr><th>Publicação</th><th>Usuário</th><th>Comentário</th><th>Ações</th></tr></thead>
  <tbody>
  @foreach($comentarios as $c)
    <tr>
      <td>{{ $c->publicacao->titulo }}</td>
      <td>{{ $c->usuario->nome }}</td>
      <td>{{ $c->comentario }}</td>
      <td>
        <a class="btn btn-sm btn-info" href="{{ route('publicacoes.show',$c->publicacao) }}">Ver publicação</a>
        <a class="btn btn-sm btn-warning" href="{{ route('comentarios.edit',$c) }}">Editar</a>
        <form action="{{ route('comentarios.destroy',$c) }}" method="POST" class="d-inline">@csrf @method('DELETE')
          <button class="btn btn-sm btn-danger">Excluir</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>

{{ $comentarios->links() }}
@endsection
