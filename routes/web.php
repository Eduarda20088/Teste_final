<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PublicacaoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\DeslikeController;
use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Rotas Públicas (sem login)
|--------------------------------------------------------------------------
*/

// Página inicial redireciona pro login
Route::get('/', function () {
    return redirect()->route('login');
})->name('home');

// Autenticação
Route::get('/login', [UserAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [UserAuthController::class, 'login'])->name('login.post');
Route::get('/register', [UserAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [UserAuthController::class, 'register'])->name('register.post');
Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Rotas Protegidas (somente logado)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // Dashboard principal
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // CRUDs protegidos
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('empresas', EmpresaController::class);
    Route::resource('publicacoes', PublicacaoController::class);
    Route::resource('comentarios', ComentarioController::class);
    Route::resource('likes', LikeController::class);
    Route::resource('deslikes', DeslikeController::class);
    Route::resource('avaliacoes', AvaliacaoController::class);
});
