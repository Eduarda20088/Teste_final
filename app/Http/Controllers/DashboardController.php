<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacao;
use App\Models\Comentario;
use App\Models\Like;
use App\Models\Deslike;

class DashboardController extends Controller
{
    public function index()
    {
        $publicacoes = Publicacao::with(['empresa', 'comentarios.usuario', 'likes', 'deslikes'])->latest()->get();
        return view('dashboard', compact('publicacoes'));
    }
}
