<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Deslike;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function store(Request $request) {
        $data = $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'publicacao_id' => 'required|exists:publicacoes,id',
        ]);

        // se houver deslike do mesmo usuário, remover
        Deslike::where($data)->delete();

        // create unique (unique key na migration já impede duplicar)
        Like::firstOrCreate($data);

        return back();
    }

    public function destroy($id) {
        $like = Like::findOrFail($id);
        $like->delete();
        return back();
    }
}
