@extends('layouts.app')

@section('content')
<h3 class="text-success fw-bold mb-3">👤 Lista de Usuários</h3>

<a href="{{ route('usuarios.create') }}" class="btn btn-success mb-3">Novo Usuário</a>

<table class="table table-striped">
    <thead class="table-success">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nome }}</td>
                <td>{{ $usuario->email }}</td>
                <td>
                    <a href="{{ route('usuarios.show', $usuario->id) }}" class="btn btn-sm btn-outline-success">Ver</a>
                    <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Excluir usuário?')">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

