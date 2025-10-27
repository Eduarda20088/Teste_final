<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PublicacaoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\DeslikeController;
use App\Http\Controllers\AvaliacaoController;

// 🏠 Página inicial
Route::get('/', function () {
    return view('layouts.home');
})->name('home');

// 👤 Usuários
Route::resource('usuarios', UsuarioController::class);

// 🏢 Empresas
Route::resource('empresas', EmpresaController::class);

// 📰 Publicações
Route::resource('publicacoes', PublicacaoController::class);

// 💬 Comentários
Route::resource('comentarios', ComentarioController::class)->except(['create']);

// 👍 Likes
Route::resource('likes', LikeController::class)->only(['index','create','store','show','destroy']);

// 👎 Deslikes
Route::resource('deslikes', DeslikeController::class)->only(['index','create','store','show','destroy']);

// ⭐ Avaliações
Route::resource('avaliacoes', AvaliacaoController::class);
