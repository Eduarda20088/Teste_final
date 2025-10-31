@extends('layouts.app')

@section('title', 'Sabor do Brasil')

@section('content')
<div class="min-h-screen bg-gray-100 flex flex-col">

    <!-- Header -->
    <header class="bg-white shadow-md py-4">
        <div class="container mx-auto flex justify-between items-center px-4">
            <h1 class="text-2xl font-bold text-red-700 flex items-center gap-2">
                🍲 Sabor do Brasil
            </h1>
            <a href="{{ route('login') }}"
               class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                Entrar
            </a>
        </div>
    </header>

    <!-- Conteúdo Principal -->
    <main class="flex-grow container mx-auto py-8 px-4">
        <h2 class="text-xl font-semibold mb-6 text-gray-800">Publicações</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

            <!-- Card 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="C:\Users\ALUNO_18\Downloads\Feijoada.jpg"
                     alt="Prato 01" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">Título do prato 01</h3>
                    <p class="text-sm text-gray-600 mb-2">Local 01 - Maceió/AL</p>
                    <div class="flex items-center justify-between text-gray-700 text-sm mt-3">
                        <div class="flex items-center gap-3">
                            <span>👍 9</span>
                            <span>👎 12</span>
                            <span>💬 2</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://cdn.pixabay.com/photo/2017/04/04/17/56/brazilian-food-2202053_1280.jpg"
                     alt="Prato 02" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">Título do prato 02</h3>
                    <p class="text-sm text-gray-600 mb-2">Local 02 - Recife/PE</p>
                    <div class="flex items-center justify-between text-gray-700 text-sm mt-3">
                        <div class="flex items-center gap-3">
                            <span>👍 6</span>
                            <span>👎 1</span>
                            <span>💬 10</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <img src="https://cdn.pixabay.com/photo/2017/03/10/12/44/food-2130180_1280.jpg"
                     alt="Prato 03" class="w-full h-48 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-bold mb-2">Título do prato 03</h3>
                    <p class="text-sm text-gray-600 mb-2">Local 03 - Salvador/BA</p>
                    <div class="flex items-center justify-between text-gray-700 text-sm mt-3">
                        <div class="flex items-center gap-3">
                            <span>👍 12</span>
                            <span>👎 2</span>
                            <span>💬 2</span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Rodapé -->
    <footer class="bg-gray-900 text-white py-4 mt-8">
        <div class="container mx-auto text-center text-sm">
            <div class="flex justify-center gap-4 mb-2 text-lg">
                <a href="#" class="hover:text-red-400"><i class="fa-brands fa-facebook"></i></a>
                <a href="#" class="hover:text-red-400"><i class="fa-brands fa-instagram"></i></a>
                <a href="#" class="hover:text-red-400"><i class="fa-brands fa-twitter"></i></a>
                <a href="#" class="hover:text-red-400"><i class="fa-brands fa-youtube"></i></a>
            </div>
            <p>Sabor do Brasil — Copyright © 2024</p>
        </div>
    </footer>
</div>
@endsection
