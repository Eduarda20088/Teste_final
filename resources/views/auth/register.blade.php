@extends('layouts.app')

@section('content')
<div class="container mx-auto max-w-md mt-10">
    <h2 class="text-2xl font-bold text-center mb-6">Cadastrar</h2>

    <form method="POST" action="{{ route('register.post') }}">
        @csrf
        <div class="mb-4">
            <label>Nome:</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label>Email:</label>
            <input type="email" name="email" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label>Senha:</label>
            <input type="password" name="password" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label>Confirmar Senha:</label>
            <input type="password" name="password_confirmation" class="w-full border p-2 rounded" required>
        </div>

        <button class="bg-orange-600 text-white px-4 py-2 rounded w-full">Registrar</button>

        <p class="text-center mt-4">Já tem conta?
            <a href="{{ route('login') }}" class="text-blue-500">Entre aqui</a>
        </p>
    </form>
</div>
@endsection
