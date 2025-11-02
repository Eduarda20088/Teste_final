@extends('layouts.app')
@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
<h3 class="text-xl font-bold mb-3">Cadastrar</h3>
@if($errors->any())<div class="bg-red-100 p-2 text-red-700 mb-2"><ul>@foreach($errors->all() as $e)<li>{{$e}}</li>@endforeach</ul></div>@endif
<form action="{{ route('register.post') }}" method="POST" enctype="multipart/form-data">
    @csrf
<input type="text" name="nome" class="w-full border p-2 mb-2" placeholder="Nome" required>
<input type="email" name="email" class="w-full border p-2 mb-2" placeholder="Email" required>
<input type="password" name="senha" class="w-full border p-2 mb-2" placeholder="Senha" required>
<input type="password" name="senha_confirmation" class="w-full border p-2 mb-2" placeholder="Confirmar senha"
required>
<label class="block mb-2">Foto de perfil (opcional)</label>
<input type="file" name="foto" class="w-full mb-3">
<button class="bg-red-600 text-white px-4 py-2 rounded">Cadastrar</button>
</form>
<p class="mt-3 text-sm">Já tem conta? <a href="{{ route('login') }}" class="text-red-600">Entrar</a></p>
</div>
@endsection
