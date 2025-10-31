<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Sabor do Brasil</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 flex justify-center items-center min-h-screen">

    <div class="bg-white p-8 rounded-2xl shadow-lg w-full max-w-md border border-green-200">
        <h1 class="text-3xl font-bold text-center text-green-800 mb-6">🍃 Sabor do Brasil</h1>
        <h2 class="text-lg font-semibold text-center text-gray-600 mb-6">Criar nova conta</h2>

        <form action="{{ route('register.post') }}" method="POST">
            @csrf

            <label class="block mb-2 font-semibold">Nome</label>
            <input type="text" name="nome" class="w-full border border-green-300 rounded-lg p-2 mb-4" required>

            <label class="block mb-2 font-semibold">Email</label>
            <input type="email" name="email" class="w-full border border-green-300 rounded-lg p-2 mb-4" required>

            <label class="block mb-2 font-semibold">Senha</label>
            <input type="password" name="senha" class="w-full border border-green-300 rounded-lg p-2 mb-4" required>

            <label class="block mb-2 font-semibold">Confirmar Senha</label>
            <input type="password" name="senha_confirmation" class="w-full border border-green-300 rounded-lg p-2 mb-6" required>

            <button class="bg-green-700 hover:bg-green-800 text-white w-full py-2 rounded-lg font-semibold">Cadastrar</button>
        </form>

        <p class="text-center text-sm text-gray-500 mt-4">
            Já tem conta?
            <a href="{{ route('login') }}" class="text-green-700 font-semibold hover:underline">Entrar</a>
        </p>
    </div>

</body>
</html>
