@extends('layout.app')

@section('content')
<h3 class="text-success fw-bold mb-3">✏️ Editar Usuário</h3>

<form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
    @csrf @method('PUT')
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $usuario->nome }}" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" value="{{ $usuario->email }}" required>
    </div>
    <button type="submit" class="btn btn-success">Atualizar</button>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
