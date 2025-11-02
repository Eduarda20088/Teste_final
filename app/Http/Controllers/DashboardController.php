<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Publicacao;

class DashboardController extends Controller
{
    public function index()
    {
        $publicacoes = Publicacao::with(['usuario', 'comentarios.usuario', 'likes', 'deslikes'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard', compact('publicacoes'));
    }
}
