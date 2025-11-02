<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>@yield('title','Sabor do Brasil')</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
<nav class="bg-white shadow-sm">
<div class="max-w-6xl mx-auto px-4 py-3 flex items-center justify-between">
<div class="flex items-center gap-4">
<img src="{{ asset('images/logo.png') }}" class="w-12 h-12 rounded-full" alt="logo">
<span class="font-bold text-xl text-red-600">Sabor do Brasil</span>
</div>
<div>
@if(session('usuario_nome'))
<div class="flex items-center gap-3">
<img src="{{ session('usuario_foto') ? asset('storage/'.session('usuario_foto')) :
asset('images/default-user.png') }}" class="w-10 h-10 rounded-full object-cover">
<span class="text-gray-700">{{ session('usuario_nome') }}</span>
<a href="{{ route('logout') }}" class="ml-3 bg-red-600 text-white px-3 py-1 rounded">Sair</a>
</div>
@else
<a href="{{ route('login') }}" class="bg-red-600 text-white px-3 py-1 rounded">Entrar</a>
@endif
</div>
</div>
</nav>
<main class="max-w-6xl mx-auto px-4 py-6">@yield('content')</main>
<footer class="bg-gray-900 text-white py-4 mt-8">
<div class="max-w-6xl mx-auto text-center">Sabor do Brasil — Copyright 2024</div>
</footer>
@stack('scripts')
</body>
</html>
