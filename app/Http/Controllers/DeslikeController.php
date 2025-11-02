<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deslike;
use App\Models\Like;
use Illuminate\Support\Facades\Session;

class DeslikeController extends Controller
{
    public function store(Request $request)
    {
        $usuarioId = Session::get('usuario_id');
        $publicacaoId = $request->publicacao_id;

        Like::where('usuario_id', $usuarioId)->where('publicacao_id', $publicacaoId)->delete();

        $existe = Deslike::where('usuario_id', $usuarioId)
            ->where('publicacao_id', $publicacaoId)
            ->first();

        if ($existe) {
            $existe->delete();
        } else {
            Deslike::create(['usuario_id' => $usuarioId, 'publicacao_id' => $publicacaoId]);
        }

        return redirect()->back();
    }
}
