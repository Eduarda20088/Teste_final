@extends('layout.app')

@section('content')
<div class="flex justify-center items-center min-h-[70vh]">
    <div class="bg-white shadow-lg rounded-2xl w-full max-w-md p-8 border border-green-200">
        <h2 class="text-2xl font-bold text-center text-green-800 mb-6">🍃 Bem-vindo ao Sabor do Brasil</h2>

        @if(session('erro'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm text-center">
                {{ session('erro') }}
            </div>
        @endif

        <form action="{{ route('login.post') }}" method="POST" class="space-y-5">
            @csrf
            <div>
                <label class="block text-green-800 font-semibold mb-1">E-mail</label>
                <input type="email" name="email" class="w-full border border-green-300 rounded-lg p-2 focus:ring-2 focus:ring-green-500" required>
            </div>
            <div>
                <label class="block text-green-800 font-semibold mb-1">Senha</label>
                <input type="password" name="senha" class="w-full border border-green-300 rounded-lg p-2 focus:ring-2 focus:ring-green-500" required>
            </div>

            <button type="submit" class="w-full bg-green-700 hover:bg-green-800 text-white py-2 rounded-lg font-semibold">Entrar</button>
        </form>

        <p class="text-center text-sm mt-6 text-gray-700">
            Não tem uma conta?
            <a href="{{ route('register') }}" class="text-green-700 font-semibold hover:underline">Cadastre-se aqui</a>
        </p>
    </div>
</div>
@endsection
