<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicacaoController;

Route::get('/', [PublicacaoController::class, 'index'])->name('home');
Route::post('/publicar', [PublicacaoController::class, 'store'])->name('publicar');
Route::post('/like', [PublicacaoController::class, 'like'])->name('like');
Route::post('/deslike', [PublicacaoController::class, 'deslike'])->name('deslike');
Route::post('/comentar', [PublicacaoController::class, 'comentar'])->name('comentar');
