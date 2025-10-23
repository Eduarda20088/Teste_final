@extends('layouts.app')
@section('content')
<div class="d-flex justify-content-between mb-3">
  <h3>Empresas</h3>
  <a href="{{ route('empresas.create') }}" class="btn btn-primary">Nova Empresa</a>
</div>

<table class="table table-striped">
  <thead><tr><th>Nome</th><th>CNPJ</th><th>Ações</th></tr></thead>
  <tbody>
  @foreach($empresas as $e)
    <tr>
      <td>{{ $e->nome }}</td>
      <td>{{ $e->cnpj }}</td>
      <td>
        <a class="btn btn-sm btn-info" href="{{ route('empresas.show',$e) }}">Ver</a>
        <a class="btn btn-sm btn-warning" href="{{ route('empresas.edit',$e) }}">Editar</a>
        <form action="{{ route('empresas.destroy',$e) }}" method="POST" class="d-inline">@csrf @method('DELETE')
          <button class="btn btn-sm btn-danger" onclick="return confirm('Excluir?')">Excluir</button>
        </form>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
{{ $empresas->links() }}
@endsection
