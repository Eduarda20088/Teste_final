<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Site de Avaliações')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fffaf1; }
        nav.navbar { background-color: #ff9800; }
        footer {
            background-color: #ff9800;
            color: white;
            padding: 15px 0;
            text-align: center;
            position: fixed;
            bottom: 0; left: 0; width: 100%;
        }
        .card { border-radius: 15px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ url('/') }}">🍽️ FoodReview</a>
    <div>
      <a class="nav-link d-inline text-white" href="{{ route('usuarios.index') }}">Usuários</a>
      <a class="nav-link d-inline text-white" href="{{ route('empresas.index') }}">Empresas</a>
      <a class="nav-link d-inline text-white" href="{{ route('publicacoes.index') }}">Publicações</a>
      <a class="nav-link d-inline text-white" href="{{ route('avaliacoes.index') }}">Avaliações</a>
    </div>
  </div>
</nav>

<div class="container mt-5 mb-5">
    @yield('content')
</div>

<footer>© {{ date('Y') }} FoodReview - Todos os direitos reservados.</footer>
</body>
</html>
