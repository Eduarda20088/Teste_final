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
         $usuarios = Usuario::all(); $publicacoes = Publicacao::all(); 
         return view('comentarios.create', compact('usuarios','publicacoes'));
    }

    public function store(Request $request) {
        
        $data = $request->validate([ 'comentario'=>'required|string','usuario_id'=>'required|exists:usuarios,id','publicacao_id'=>'required|exists:publicacoes,id' ]);

        Comentario::create($data);
      return redirect()->route('comentarios.index')->with('success','Comentário criado.');
    }

    public function show(Comentario $comentario) {
        return view('comentarios.show', compact('comentario'));
    }

    public function edit(Comentario $comentario) {
        $usuarios = Usuario::all(); $publicacoes = Publicacao::all(); 
        return view('comentarios.edit', compact('comentario','usuarios','publicacoes')); 
    }

    public function update(Request $request, Comentario $comentario) {
        
        $data = $request->validate([ 'comentario'=>'required|string','usuario_id'=>'required|exists:usuarios,id','publicacao_id'=>'required|exists:publicacoes,id' ]);

        $comentario->update($data);
      return redirect()->route('comentarios.index')->with('success','Comentário atualizado.');

    }

    public function destroy(Comentario $comentario) {
      $comentario->delete(); return
      redirect()->route('comentarios.index')->with('success','Comentário deletado.');
    }
}
