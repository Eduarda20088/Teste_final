<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PublicacaoController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\DeslikeController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\EmpresaController;

Route::get('/', function(){ return redirect()->route('login'); })->name('home');
Route::get('/login', [UserAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [UserAuthController::class, 'login'])->name('login.post');
Route::get('/register', [UserAuthController::class, 'showRegister'])->name('register');
Route::post('/register', [UserAuthController::class, 'register'])->name('register.post');
Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');

Route::middleware('checklogin')->group(function ()
 {
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::resource('publicacoes', PublicacaoController::class);
Route::post('/publicacoes/{id}/like', [LikeController::class,'store'])->name('publicacoes.like');
Route::post('/publicacoes/{id}/deslike', [DeslikeController::class,'store'])->name('publicacoes.deslike');
Route::post('/publicacoes/{id}/comentarios',
[ComentarioController::class,'store'])->name('publicacoes.comentarios.store');
Route::resource('usuarios', UsuarioController::class);
Route::resource('empresas', EmpresaController::class);
});
