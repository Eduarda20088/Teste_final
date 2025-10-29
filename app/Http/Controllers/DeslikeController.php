<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deslike;
use Illuminate\Support\Facades\Session;

class DeslikeController extends Controller
{
    public function store(Request $request)
    {
        $usuario = Session::get('usuario');
        $jaTem = Deslike::where('usuario_id', $usuario->id)
                        ->where('publicacao_id', $request->publicacao_id)
                        ->first();

        if (!$jaTem) {
            Deslike::create([
                'usuario_id' => $usuario->id,
                'publicacao_id' => $request->publicacao_id
            ]);
        }

        return response()->json(['sucesso' => true]);
    }
}
