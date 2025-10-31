@extends('layouts.app')

@section('content')
<h3 class="text-success fw-bold mb-3">👤 Detalhes do Usuário</h3>

<div class="card shadow-sm">
    <div class="card-body">
        <p><strong>Nome:</strong> {{ $usuario->nome }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Voltar</a>
    </div>
</div>
@endsection
