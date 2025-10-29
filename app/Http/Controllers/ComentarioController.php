<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use Illuminate\Support\Facades\Session;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['texto' => 'required']);
        $usuario = Session::get('usuario');

        Comentario::create([
            'texto' => $request->texto,
            'usuario_id' => $usuario->id,
            'publicacao_id' => $request->publicacao_id
        ]);

        return response()->json(['sucesso' => true]);
    }
}
