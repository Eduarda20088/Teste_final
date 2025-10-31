<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use App\Models\Publicacao;

class DashboardController extends Controller
{
    public function index()
    {
        $publicacoes = Publicacao::with(['empresa', 'likes', 'deslikes', 'comentarios'])->latest()->get();
        return view('dashboard', compact('publicacoes'));
    }
}
