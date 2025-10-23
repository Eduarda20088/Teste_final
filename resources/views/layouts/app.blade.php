<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Sabor do Brasil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; }
  </style>
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark" style="background:#D97014;">
  <div class="container">
    <a class="navbar-brand" href="{{ route('publicacoes.index') }}">🍽️ Sabor do Brasil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="nav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('usuarios.index') }}">Usuários</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('empresas.index') }}">Empresas</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('publicacoes.index') }}">Publicações</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('comentarios.index') }}">Comentários</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container py-4">
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
