<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabor do Brasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            background-color: #fff8f0;
        }
        .navbar {
            background-color: #b22222;
        }
        .navbar-brand, .nav-link, .text-brand {
            color: white !important;
        }
        .card {
            border-radius: 15px;
        }
        .coluna {
            background: #fff;
            border-radius: 15px;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">🍛 Sabor do Brasil</a>
        <div class="d-flex">
            @if(Session::has('usuario'))
                <span class="text-white me-3">Olá, {{ Session::get('usuario')->nome }}</span>
                <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm">Sair</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-sm me-2">Entrar</a>
                <a href="{{ route('register') }}" class="btn btn-light btn-sm">Cadastrar</a>
            @endif
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
@stack('scripts')
</body>
</html>
