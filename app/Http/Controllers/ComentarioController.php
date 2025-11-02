<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use Illuminate\Support\Facades\Session;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['conteudo' => 'required']);
        Comentario::create([
            'usuario_id' => Session::get('usuario_id'),
            'publicacao_id' => $request->publicacao_id,
            'conteudo' => $request->conteudo,
        ]);
        return redirect()->back();
    }
}
