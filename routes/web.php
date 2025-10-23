<?php

use App\Http\Controllers\{
    UsuarioController,
    EmpresaController,
    PublicacaoController,
    ComentarioController,
    LikeController,
    DeslikeController
};

Route::get('/', fn() => redirect()->route('publicacoes.index'));

Route::resource('usuarios', UsuarioController::class);
Route::resource('empresas', EmpresaController::class);
Route::resource('publicacoes', PublicacaoController::class);
Route::resource('comentarios', ComentarioController::class)->except(['create']); // create opcional

// likes / deslikes (store e destroy)
Route::post('likes', [LikeController::class,'store'])->name('likes.store');
Route::delete('likes/{id}', [LikeController::class,'destroy'])->name('likes.destroy');

Route::post('deslikes', [DeslikeController::class,'store'])->name('deslikes.store');
Route::delete('deslikes/{id}', [DeslikeController::class,'destroy'])->name('deslikes.destroy');
