<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use Illuminate\Support\Facades\Session;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $usuario = Session::get('usuario');
        $jaTem = Like::where('usuario_id', $usuario->id)
                     ->where('publicacao_id', $request->publicacao_id)
                     ->first();

        if (!$jaTem) {
            Like::create([
                'usuario_id' => $usuario->id,
                'publicacao_id' => $request->publicacao_id
            ]);
        }

        return response()->json(['sucesso' => true]);
    }
}
