<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabor do Brasil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f5f5f5; }
        .navbar { background-color: #f8f9fa; border-bottom: 2px solid #ddd; }
        .navbar-brand { font-weight: bold; color: #28a745 !important; }
        .post-card { background: white; border-radius: 10px; padding: 15px; margin-bottom: 20px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">🍽️ Sabor do Brasil</a>
        <div class="ms-auto d-flex align-items-center">
            @if(Session::has('usuario'))
                <span class="me-2">{{ Session::get('usuario')->nome }}</span>
                <img src="{{ asset('storage/' . Session::get('usuario')->foto) }}" width="40" height="40" class="rounded-circle me-3">
                <a href="{{ route('logout') }}" class="btn btn-outline-danger btn-sm">Sair</a>
            @endif
        </div>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>
</body>
</html>
