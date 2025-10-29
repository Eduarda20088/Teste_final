<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publicacao;
use App\Models\Empresa;

class PublicacaoController extends Controller
{
    public function index()
    {
        $publicacoes = Publicacao::with('empresa')->get();
        return view('publicacoes.index', compact('publicacoes'));
    }

    public function create()
    {
        $empresas = Empresa::all();
        return view('publicacoes.create', compact('empresas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'imagem' => 'nullable|image',
            'local' => 'nullable|string',
            'cidade' => 'nullable|string',
            'empresa_id' => 'required'
        ]);

        $data = $request->all();
        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('publicacoes', 'public');
        }

        Publicacao::create($data);
        return redirect()->route('dashboard')->with('sucesso', 'Publicação criada!');
    }

    public function destroy($id)
    {
        Publicacao::destroy($id);
        return redirect()->back();
    }
}
