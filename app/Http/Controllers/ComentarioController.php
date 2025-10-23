<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Publicacao;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index() {
        $comentarios = Comentario::with(['usuario','publicacao'])->paginate(20);
        return view('comentarios.index', compact('comentarios'));
    }

    public function create() {
        // se quiser criar manualmente
        return view('comentarios.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'publicacao_id' => 'required|exists:publicacoes,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'comentario' => 'required|string'
        ]);

        Comentario::create($data);
        return redirect()->route('publicacoes.show', $data['publicacao_id'])->with('success','Comentário adicionado.');
    }

    public function show(Comentario $comentario) {
        return view('comentarios.show', compact('comentario'));
    }

    public function edit(Comentario $comentario) {
        return view('comentarios.edit', compact('comentario'));
    }

    public function update(Request $request, Comentario $comentario) {
        $data = $request->validate([
            'comentario' => 'required|string'
        ]);

        $comentario->update($data);
        return redirect()->route('publicacoes.show', $comentario->publicacao_id)->with('success','Comentário atualizado.');
    }

    public function destroy(Comentario $comentario) {
        $pid = $comentario->publicacao_id;
        $comentario->delete();
        return redirect()->route('publicacoes.show', $pid)->with('success','Comentário removido.');
    }
}
