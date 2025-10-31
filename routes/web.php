<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PublicacaoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\DeslikeController;
use App\Http\Controllers\AvaliacaoController;

// Página inicial
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// Login e Registro
Route::get('/login', [UserAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [UserAuthController::class, 'login'])->name('login.post');
Route::get('/register', [UserAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [UserAuthController::class, 'register'])->name('register.post');
Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');

// Dashboard e CRUDs — sem middleware por enquanto
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('usuarios', UsuarioController::class);
Route::resource('empresas', EmpresaController::class);
Route::resource('publicacoes', PublicacaoController::class);
Route::resource('comentarios', ComentarioController::class);
Route::resource('likes', LikeController::class);
Route::resource('deslikes', DeslikeController::class);
Route::resource('avaliacoes', AvaliacaoController::class);
