<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sabor do Brasil 🍃</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/857/857681.png">
</head>
<body class="bg-gradient-to-b from-green-50 to-yellow-50 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav class="bg-green-700 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('dashboard') }}" class="text-2xl font-bold tracking-wide">🍃 Sabor do Brasil</a>
            <div class="flex gap-4">
                <a href="{{ route('dashboard') }}" class="hover:text-yellow-300">Dashboard</a>
                <a href="{{ route('empresas.index') }}" class="hover:text-yellow-300">Empresas</a>
                <a href="{{ route('publicacoes.index') }}" class="hover:text-yellow-300">Publicações</a>
                <a href="{{ route('avaliacoes.index') }}" class="hover:text-yellow-300">Avaliações</a>
                <a href="{{ route('usuarios.index') }}" class="hover:text-yellow-300">Usuários</a>
                <a href="{{ route('logout') }}" class="bg-yellow-400 text-green-900 font-semibold px-3 py-1 rounded-lg hover:bg-yellow-500">Sair</a>
            </div>
        </div>
    </nav>

    <!-- Conteúdo -->
    <main class="flex-grow max-w-6xl mx-auto w-full p-6">
        @yield('content')
    </main>

    <!-- Rodapé -->
    <footer class="bg-green-800 text-white py-4 text-center mt-8">
        <p class="text-sm">© {{ date('Y') }} Sabor do Brasil — Projeto Laravel SENAI</p>
    </footer>

</body>
</html>
