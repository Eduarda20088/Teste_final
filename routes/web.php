<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\PublicacaoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\DeslikeController;

Route::get('/', [PublicacaoController::class,'index'])->name('home');
// auth
Route::get('register',[AuthController::class,'showRegister'])->name('register.form');
Route::post('register',[AuthController::class,'register'])->name('register');
Route::get('login',[AuthController::class,'showLogin'])->name('login.form');
Route::post('login',[AuthController::class,'login'])->name('login');
Route::post('logout',[AuthController::class,'logout'])->name('logout');
// empresas CRUD
Route::resource('empresas', EmpresaController::class)->except(['show']);
// publicações
Route::get('publicacoes/create',[PublicacaoController::class,'create'])->name('publicacoes.create');
Route::post('publicacoes',[PublicacaoController::class,'store'])->name('publicacoes.store');
Route::get('publicacoes/{publicacao}',[PublicacaoController::class,'show'])->name('publicacoes.show');
Route::delete('publicacoes/{publicacao}',
[PublicacaoController::class,'destroy'])->name('publicacoes.destroy');
// interações
Route::post('publicacoes/{publicacao}/like',
[LikeController::class,'toggle'])->name('publicacoes.like');
Route::post('publicacoes/{publicacao}/deslike',
[DeslikeController::class,'toggle'])->name('publicacoes.deslike');
// comentários
Route::post('comentarios',[ComentarioController::class,'store'])->name('comentarios.store');
Route::put('comentarios/{comentario}',
[ComentarioController::class,'update'])->name('comentarios.update');
Route::delete('comentarios/{comentario}',
[ComentarioController::class,'destroy'])->name('comentarios.destroy');