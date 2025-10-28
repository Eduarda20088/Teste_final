@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')
<div class="container mt-4">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold text-primary">Bem-vindo ao Sistema!</h1>
        <p class="lead">Escolha uma das seções abaixo para começar a navegar.</p>
    </div>

    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Usuários</h5>
                    <p class="card-text">Gerencie os usuários cadastrados.</p>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Ver Usuários</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Empresas</h5>
                    <p class="card-text">Acesse as empresas cadastradas no sistema.</p>
                    <a href="{{ route('empresas.index') }}" class="btn btn-primary">Ver Empresas</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Publicações</h5>
                    <p class="card-text">Confira as publicações recentes.</p>
                    <a href="{{ route('publicacoes.index') }}" class="btn btn-primary">Ver Publicações</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-4">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Comentários</h5>
                    <p class="card-text">Visualize e modere os comentários.</p>
                    <a href="{{ route('comentarios.index') }}" class="btn btn-primary">Ver Comentários</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Likes & Deslikes</h5>
                    <p class="card-text">Veja quem curtiu ou não as publicações.</p>
                    <a href="{{ route('likes.index') }}" class="btn btn-success me-2">Likes</a>
                    <a href="{{ route('deslikes.index') }}" class="btn btn-danger">Deslikes</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Avaliações</h5>
                    <p class="card-text">Gerencie as avaliações das publicações.</p>
                    <a href="{{ route('avaliacoes.index') }}" class="btn btn-primary">Ver Avaliações</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
