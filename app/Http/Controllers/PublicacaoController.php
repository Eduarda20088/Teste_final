<?php

namespace App\Http\Controllers;
use App\Models\Publicacao;
use App\Models\Usuario;
use App\Models\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

 class PublicacaoController extends Controller {

     public function index() { 
        $publicacoes = Publicacao::with(['usuario','empresa','likes','deslikes'])->paginate(12);
        return view('publicacoes.index', compact('publicacoes')); 
    }

     public function create() { 
        $usuarios = Usuario::all(); 
        $empresas = Empresa::all(); 
        return view('publicacoes.create', compact('usuarios','empresas')); 
    }

     public function store(Request $request) {
          $data = $request->validate([ 'titulo'=>'required|string|max:150','conteudo'=>'nullable|string','imagem'=>'nullable|image|max:5120','local'=>'nullable|string|max:150','cidade'=>'nullable|string|max:100','usuario_id'=>'required|exists:usuarios,id','empresa_id'=>'nullable|exists:empresas,id' ]);
          if ($request->hasFile('imagem')) { $data['imagem'] = $request->file('imagem')->store('publicacoes','public'); 
        }

     Publicacao::create($data);
        return redirect()->route('publicacoes.index')->with('success','Publicação criada.');

 }
       public function show(Publicacao $publicacao) {
          $publicacao->load(['empresa','usuario','comentarios.usuario','likes','deslikes']); 
          return view('publicacoes.show', compact('publicacao')); 
        }

      public function edit(Publicacao $publicacao) { 
        $usuarios = Usuario::all(); 
        $empresas = Empresa::all(); 
        return view('publicacoes.edit', compact('publicacao','usuarios','empresas')); 
    }

      public function update(Request $request, Publicacao $publicacao) {
          $data = $request->validate([ 'titulo'=>'required|string|max:150','conteudo'=>'nullable|string','imagem'=>'nullable|image|max:5120','local'=>'nullable|string|max:150','cidade'=>'nullable|string|max:100','usuario_id'=>'required|exists:usuarios,id','empresa_id'=>'nullable|exists:empresas,id' ]);
          if ($request->hasFile('imagem')) {
             if ($publicacao->imagem) Storage::disk('public')->delete($publicacao->imagem);
         $data['imagem'] = $request->file('imagem')->store('publicacoes','public');
         }
         $publicacao->update($data);
         return redirect()->route('publicacoes.show',$publicacao)->with('success','Publicação atualizada.');
 }

        public function destroy(Publicacao $publicacao) { 
            if ($publicacao->imagem) Storage::disk('public')->delete($publicacao->imagem); 
            $publicacao->delete(); 
            return redirect()->route('publicacoes.index')->with('success','Publicação removida.');
         }
}
