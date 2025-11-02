@extends('layouts.app')
@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
<h3 class="text-xl font-bold mb-3">Entrar</h3>
@if(session('erro'))<div class="bg-red-100 p-2 text-red-700 mb-2">{{ session('erro') }}</div>@endif
<form action="{{ route('login.post') }}" method="POST">@csrf
<input type="email" name="email" class="w-full border p-2 mb-2" placeholder="Email" required>
<input type="password" name="senha" class="w-full border p-2 mb-2" placeholder="Senha" required>
<button class="bg-red-600 text-white px-4 py-2 rounded">Entrar</button>
</form>
<p class="mt-3 text-sm">Não tem conta? <a href="{{ route('register') }}" class="text-red-600">Cadastrar</a></p>
</div>
@endsection