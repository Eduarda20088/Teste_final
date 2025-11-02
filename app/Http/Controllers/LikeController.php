<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Like;
use App\Models\Deslike;
use Illuminate\Support\Facades\Session;

class LikeController extends Controller
{
    public function store(Request $request)
    {
        $usuarioId = Session::get('usuario_id');
        $publicacaoId = $request->publicacao_id;

        Deslike::where('usuario_id', $usuarioId)->where('publicacao_id', $publicacaoId)->delete();

        $existe = Like::where('usuario_id', $usuarioId)
            ->where('publicacao_id', $publicacaoId)
            ->first();

        if ($existe) {
            $existe->delete();
        } else {
            Like::create(['usuario_id' => $usuarioId, 'publicacao_id' => $publicacaoId]);
        }

        return redirect()->back();
    }
}

