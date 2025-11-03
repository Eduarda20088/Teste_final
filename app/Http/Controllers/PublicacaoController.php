<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacao;
use App\Models\Comentario;
use App\Models\Usuario;

class PublicacaoController extends Controller
{
    public function index()
    {
        $publicacoes = Publicacao::with(['usuario', 'comentarios.usuario'])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('publicacoes', compact('publicacoes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'conteudo' => 'required|string',
            'imagem' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagemNome = null;
        if ($request->hasFile('imagem')) {
            $imagemNome = time() . '.' . $request->imagem->extension();
            $request->imagem->storeAs('public/publicacoes', $imagemNome);
        }

        Publicacao::create([
            'usuario_id' => 1, // Usuário fixo por enquanto
            'conteudo' => $request->conteudo,
            'imagem' => $imagemNome,
            'likes' => 0,
            'deslikes' => 0,
        ]);

        return back();
    }

    public function like(Request $request)
    {
        $publicacao = Publicacao::find($request->publicacao_id);
        if ($publicacao) {
            $publicacao->likes++;
            $publicacao->save();
        }
        return back();
    }

    public function deslike(Request $request)
    {
        $publicacao = Publicacao::find($request->publicacao_id);
        if ($publicacao) {
            $publicacao->deslikes++;
            $publicacao->save();
        }
        return back();
    }

    public function comentar(Request $request)
    {
        $request->validate([
            'publicacao_id' => 'required|exists:publicacoes,id',
            'conteudo' => 'required|string'
        ]);

        Comentario::create([
            'publicacao_id' => $request->publicacao_id,
            'usuario_id' => 1, // usuário fixo por enquanto
            'conteudo' => $request->conteudo
        ]);

        return back();
    }
}
