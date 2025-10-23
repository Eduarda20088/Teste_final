<?php

namespace App\Http\Controllers;

use App\Models\Deslike;
use App\Models\Like;
use Illuminate\Http\Request;

class DeslikeController extends Controller
{
    public function store(Request $request) {
        $data = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'publicacao_id' => 'required|exists:publicacoes,id',
        ]);

        // se houver like do mesmo usuário, remover
        Like::where($data)->delete();

        Deslike::firstOrCreate($data);

        return back();
    }

    public function destroy($id) {
        $des = Deslike::findOrFail($id);
        $des->delete();
        return back();
    }
}
