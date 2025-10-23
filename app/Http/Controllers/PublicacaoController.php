<?php

namespace App\Http\Controllers;

use App\Models\Publicacao;
use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Usuario;
use App\Models\Like;
use App\Models\Deslike;
use Illuminate\Support\Facades\Session;

class PublicacaoController extends Controller
{
    
    public function index()
    {
        $publicacoes =
        Publicacao::with(['empresa','usuario','comentarios.usuario'])->orderByDesc('created_at')->get();
        $empresa = Empresa::first();
        $usuario = Session::get('usuario_id') ?
        Usuario::find(Session::get('usuario_id')) : null;
        return view('publicacoes.index',compact('publicacoes','empresa','usuario'));
    }

    
    public function create()
    {
        $empresas = Empresa::all(); 
        return view('publicacoes.create', compact('empresas'));
    }

    
    public function store(Request $request)
    {
        $r->validate(['titulo'=>'required','conteudo'=>'required','empresa_id'=>'required']);
        $imagem = null;
        if($r->hasFile('imagem')) $imagem = 'storage/'.$r->file('imagem')->store('publicacoes','public');
        Publicacao::create([ 'titulo'=>$r->titulo, 'conteudo'=>$r->conteudo,'empresa_id'=>$r->empresa_id, 'usuario_id'=>Session::get('usuario_id'),'imagem'=>$imagem ]);
        return redirect()->route('home');

    }

    
    public function show(Publicacao $publicacao)
    {
        $publicacao->load(['comentarios.usuario','empresa','usuario']); 
        return view('publicacoes.show', compact('publicacao')); 
    }

    
    public function edit(Publicacao $publicacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Publicacao $publicacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publicacao $publicacao)
    {
        $publicacao->delete();
         return redirect()->route('home'); 
    }
}
