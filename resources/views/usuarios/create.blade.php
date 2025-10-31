@extends('layouts.app')

@section('content')
<h3 class="text-success fw-bold mb-3">➕ Novo Usuário</h3>

<form action="{{ route('usuarios.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Senha</label>
        <input type="password" name="senha" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-success">Salvar</button>
    <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
