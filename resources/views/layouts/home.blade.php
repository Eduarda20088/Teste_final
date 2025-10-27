@extends('layouts.app')

@section('title', 'Início')

@section('content')
<div class="container mt-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">🍽️ Sistema de Avaliações de Restaurantes</h1>
        <p class="text-muted fs-5">Gerencie usuários, empresas, publicações e avaliações com facilidade!</p>
    </div>

    <div class="row justify-content-center g-4">

        {{-- Usuários --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <img src="{{ asset('storage/imagens/usuarios.jpg') }}" class="card-img-top" alt="Usuários">
                <div class="card-body text-center">
                    <h5 class="card-title">👤 Usuários</h5>
                    <p class="card-text text-muted">Gerencie os usuários cadastrados no sistema.</p>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-primary w-100">Acessar</a>
                </div>
            </div>
        </div>

        {{-- Empresas --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <img src="{{ asset('storage/imagens/empresas.jpg') }}" class="card-img-top" alt="Empresas">
                <div class="card-body text-center">
                    <h5 class="card-title">🏢 Empresas</h5>
                    <p class="card-text text-muted">Cadastre e visualize os restaurantes disponíveis.</p>
                    <a href="{{ route('empresas.index') }}" class="btn btn-success w-100">Acessar</a>
                </div>
            </div>
        </div>

        {{-- Publicações --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <img src="{{ asset('storage/imagens/publicacoes.jpg') }}" class="card-img-top" alt="Publicações">
                <div class="card-body text-center">
                    <h5 class="card-title">📰 Publicações</h5>
                    <p class="card-text text-muted">Veja e crie publicações sobre restaurantes e pratos.</p>
                    <a href="{{ route('publicacoes.index') }}" class="btn btn-info text-white w-100">Acessar</a>
                </div>
            </div>
        </div>

        {{-- Comentários --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <img src="{{ asset('storage/imagens/comentarios.jpg') }}" class="card-img-top" alt="Comentários">
                <div class="card-body text-center">
                    <h5 class="card-title">💬 Comentários</h5>
                    <p class="card-text text-muted">Veja os comentários deixados pelos usuários.</p>
                    <a href="{{ route('comentarios.index') }}" class="btn btn-secondary w-100">Acessar</a>
                </div>
            </div>
        </div>

        {{-- Likes --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <img src="{{ asset('storage/imagens/likes.jpg') }}" class="card-img-top" alt="Likes">
                <div class="card-body text-center">
                    <h5 class="card-title">👍 Likes</h5>
                    <p class="card-text text-muted">Veja as curtidas nas publicações.</p>
                    <a href="{{ route('likes.index') }}" class="btn btn-outline-success w-100">Acessar</a>
                </div>
            </div>
        </div>

        {{-- Deslikes --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <img src="{{ asset('storage/imagens/deslikes.jpg') }}" class="card-img-top" alt="Deslikes">
                <div class="card-body text-center">
                    <h5 class="card-title">👎 Deslikes</h5>
                    <p class="card-text text-muted">Veja as reações negativas dos usuários.</p>
                    <a href="{{ route('deslikes.index') }}" class="btn btn-outline-danger w-100">Acessar</a>
                </div>
            </div>
        </div>

        {{-- Avaliações --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 h-100">
                <img src="{{ asset('storage/imagens/avaliacoes.jpg') }}" class="card-img-top" alt="Avaliações">
                <div class="card-body text-center">
                    <h5 class="card-title">⭐ Avaliações</h5>
                    <p class="card-text text-muted">Gerencie e visualize avaliações dos usuários.</p>
                    <a href="{{ route('avaliacoes.index') }}" class="btn btn-warning w-100">Acessar</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
