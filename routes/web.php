<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\DeslikeController;

// Página inicial
Route::get('/', function () {
    return redirect()->route('login');
});

// Autenticação
Route::get('/login', [UserAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [UserAuthController::class, 'login'])->name('login.post');
Route::get('/register', [UserAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [UserAuthController::class, 'register'])->name('register.post');
Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');

// Área protegida
Route::middleware(\App\Http\Middleware\CheckLogin::class)->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/likes', [LikeController::class, 'store'])->name('likes.store');
    Route::post('/deslikes', [DeslikeController::class, 'store'])->name('deslikes.store');
    Route::post('/comentarios', [ComentarioController::class, 'store'])->name('comentarios.store');
});
