<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sabor do Brasil')</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/a2b5f6f21d.js" crossorigin="anonymous"></script>
</head>
<body class="antialiased bg-gray-50 text-gray-900">
    @yield('content')
</body>
</html>
