@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-md mt-10">
    <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

    @if ($errors->any())
        <div class="bg-red-100 p-3 mb-4 text-red-700 rounded">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div class="mb-4">
            <label>Email:</label>
            <input type="email" name="email" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label>Senha:</label>
            <input type="password" name="password" class="w-full border p-2 rounded" required>
        </div>

        <button class="bg-orange-600 text-white px-4 py-2 rounded w-full">Entrar</button>

        <p class="text-center mt-4">Não tem conta?
            <a href="{{ route('register') }}" class="text-blue-500">Cadastre-se</a>
        </p>
    </form>
</div>
@endsection
