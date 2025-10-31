<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sabor do Brasil')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    {{-- Navbar simples --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">Sabor do Brasil</a>
            <div class="d-flex">
                <a href="{{ route('logout') }}" class="btn btn-outline-light btn-sm">Sair</a>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

</body>
</html>
