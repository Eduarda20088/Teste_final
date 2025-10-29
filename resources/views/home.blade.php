@extends('layouts.app')
@section('title', 'Página Inicial')
@section('content')

<div class="text-center">
    <h1 class="fw-bold mb-4 text-primary">Bem-vindo ao <span class="text-dark">AvaliaMais</span></h1>
    <p class="lead text-muted mb-5">
        Explore usuários, empresas e publicações — avalie, curta e descubra os melhores lugares!
    </p>

    <div class="row justify-content-center g-4">
        <div class="col-md-3">
            <a href="{{ route('usuarios.index') }}" class="btn btn-outline-primary btn-lg w-100 btn-custom">
                👤 Usuários
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('empresas.index') }}" class="btn btn-outline-success btn-lg w-100 btn-custom">
                🏢 Empresas
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('publicacoes.index') }}" class="btn btn-outline-warning btn-lg w-100 btn-custom">
                📝 Publicações
            </a>
        </div>
        <div class="col-md-3">
            <a href="{{ route('avaliacoes.index') }}" class="btn btn-outline-info btn-lg w-100 btn-custom">
                ⭐ Avaliações
            </a>
        </div>
    </div>

    <div class="mt-5">
        <img src="https://cdn-icons-png.flaticon.com/512/3595/3595455.png" width="120" alt="logo">
    </div>
</div>

@endsection
