@extends('layouts.app')

@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-4">
        <h2 class="text-2xl font-bold">Bem-vindo, {{ Auth::user()->name }}</h2>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="bg-gray-700 text-white px-3 py-2 rounded">Sair</button>
        </form>
    </div>

    {{-- Aqui entra o conteúdo do dashboard (publicações, etc.) --}}
    <div>
        <h3 class="text-xl font-semibold mb-2">Publicações</h3>
        @foreach($publicacoes as $pub)
            <div class="border p-3 mb-3 rounded bg-white shadow">
                <h4 class="font-bold">{{ $pub->titulo }}</h4>
                <p>{{ $pub->descricao }}</p>
            </div>
        @endforeach
    </div>
</div>
@endsection
