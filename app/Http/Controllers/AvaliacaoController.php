<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Empresa;
use App\Models\Usuario;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public function index()
    {
        $avaliacoes = Avaliacao::with(['usuario', 'empresa'])->get();
        return view('avaliacoes.index', compact('avaliacoes'));
    }

    public function create()
    {
        $usuarios = Usuario::all();
        $empresas = Empresa::all();
        return view('avaliacoes.create', compact('usuarios', 'empresas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'empresa_id' => 'required|exists:empresas,id',
            'nota' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable|string',
        ]);

        Avaliacao::create($request->all());
        return redirect()->route('avaliacoes.index')->with('success', 'Avaliação criada com sucesso!');
    }

    public function show(Avaliacao $avaliacao)
    {
        return view('avaliacoes.show', compact('avaliacao'));
    }

    public function edit(Avaliacao $avaliacao)
    {
        $usuarios = Usuario::all();
        $empresas = Empresa::all();
        return view('avaliacoes.edit', compact('avaliacao', 'usuarios', 'empresas'));
    }

    public function update(Request $request, Avaliacao $avaliacao)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'empresa_id' => 'required|exists:empresas,id',
            'nota' => 'required|integer|min:1|max:5',
            'comentario' => 'nullable|string',
        ]);

        $avaliacao->update($request->all());
        return redirect()->route('avaliacoes.index')->with('success', 'Avaliação atualizada!');
    }

    public function destroy(Avaliacao $avaliacao)
    {
        $avaliacao->delete();
        return redirect()->route('avaliacoes.index')->with('success', 'Avaliação excluída!');
    }
}
