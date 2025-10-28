<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PublicacaoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\DeslikeController;
use App\Http\Controllers\AvaliacaoController;

// Página inicial
Route::get('/', function () {
    return view('layouts.home');
})->name('home');

// Rotas de recursos
Route::resource('usuarios', UsuarioController::class);
Route::resource('empresas', EmpresaController::class);
Route::resource('publicacoes', PublicacaoController::class);
Route::resource('comentarios', ComentarioController::class);
Route::resource('likes', LikeController::class);
Route::resource('deslikes', DeslikeController::class);
Route::resource('avaliacoes', AvaliacaoController::class);
