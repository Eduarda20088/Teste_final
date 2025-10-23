<?php

namespace App\Http\Controllers;

use App\Models\Publicacao;
use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PublicacaoController extends Controller
{
    public function index() {
        $publicacoes = Publicacao::with(['empresa','usuario','likes','deslikes'])->paginate(12);
        return view('publicacoes.index', compact('publicacoes'));
    }

    public function create() {
        $empresas = Empresa::all();
        $usuarios = Usuario::all();
        return view('publicacoes.create', compact('empresas','usuarios'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'titulo' => 'required|string|max:150',
            'conteudo' => 'nullable|string',
            'imagem' => 'nullable|string',
            'local' => 'nullable|string|max:100',
            'cidade' => 'nullable|string|max:100',
            'usuario_id' => 'required|exists:usuarios,id',
            'empresa_id' => 'nullable|exists:empresas,id'
        ]);

        Publicacao::create($data);
        return redirect()->route('publicacoes.index')->with('success','Publicação criada.');
    }

    public function show(Publicacao $publicacao) {
        $publicacao->load(['empresa','usuario','comentarios.usuario','likes','deslikes']);
        return view('publicacoes.show', compact('publicacao'));
    }

    public function edit(Publicacao $publicacao) {
        $empresas = Empresa::all();
        $usuarios = Usuario::all();
        return view('publicacoes.edit', compact('publicacao','empresas','usuarios'));
    }

    public function update(Request $request, Publicacao $publicacao) {
        $data = $request->validate([
            'titulo' => 'required|string|max:150',
            'conteudo' => 'nullable|string',
            'imagem' => 'nullable|string',
            'local' => 'nullable|string|max:100',
            'cidade' => 'nullable|string|max:100',
            'usuario_id' => 'required|exists:usuarios,id',
            'empresa_id' => 'nullable|exists:empresas,id'
        ]);

        $publicacao->update($data);
        return redirect()->route('publicacoes.show',$publicacao)->with('success','Publicação atualizada.');
    }

    public function destroy(Publicacao $publicacao) {
        $publicacao->delete();
        return redirect()->route('publicacoes.index')->with('success','Publicação removida.');
    }
}
