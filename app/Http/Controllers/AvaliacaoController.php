<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Avaliacao;
use Illuminate\Support\Facades\Session;

class AvaliacaoController extends Controller
{
    public function store(Request $request)
    {
        $usuario = Session::get('usuario');

        Avaliacao::create([
            'usuario_id' => $usuario->id,
            'empresa_id' => $request->empresa_id,
            'nota' => $request->nota,
            'comentario' => $request->comentario,
        ]);

        return redirect()->back();
    }
}
