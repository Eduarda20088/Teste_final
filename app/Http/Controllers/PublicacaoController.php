<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacao;
use App\Models\Comentario;
use App\Models\Usuario;
use Illuminate\Support\Str;

class PublicacaoController extends Controller
{
    public function index()
    {
        // traz publicações com usuário e comentários + contador de likes/deslikes
        $publicacoes = Publicacao::with(['usuario', 'comentarios.usuario'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('publicacoes', compact('publicacoes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'conteudo' => 'required|string',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $imagemNome = null;
        if ($request->hasFile('imagem')) {
            // salva em storage/app/public/publicacoes
            $file = $request->file('imagem');
            $imagemNome = time() . '_' . Str::random(6) . '.' . $file->extension();
            $file->storeAs('public/publicacoes', $imagemNome);
        }

        // usuario_id fixo 1 (sem autenticação). Se quiser outro id, ajuste.
        Publicacao::create([
            'usuario_id' => 1,
            'conteudo' => $request->conteudo,
            'imagem' => $imagemNome,
            'likes' => 0,
            'deslikes' => 0,
        ]);

        return back();
    }

    public function like(Request $request)
    {
        $request->validate(['publicacao_id' => 'required|exists:publicacoes,id']);
        $p = Publicacao::find($request->publicacao_id);
        $p->increment('likes');
        return back();
    }

    public function deslike(Request $request)
    {
        $request->validate(['publicacao_id' => 'required|exists:publicacoes,id']);
        $p = Publicacao::find($request->publicacao_id);
        $p->increment('deslikes');
        return back();
    }

    public function comentar(Request $request)
    {
        $request->validate([
            'publicacao_id' => 'required|exists:publicacoes,id',
            'conteudo' => 'required|string',
        ]);

        Comentario::create([
            'publicacao_id' => $request->publicacao_id,
            'usuario_id' => 1, // usuário fixo temporariamente
            'conteudo' => $request->conteudo,
        ]);

        return back();
    }
}
