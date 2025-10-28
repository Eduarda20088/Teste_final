<?php

namespace App\Http\Controllers;
use App\Models\Deslike;
use App\Models\Like;
use App\Models\Usuario;
use App\Models\Publicacao;
use Illuminate\Http\Request;

class DeslikeController extends Controller 
{

   public function index() { 
    $deslikes = Deslike::with(['usuario','publicacao'])->paginate(50); 
    return view('deslikes.index', compact('deslikes')); 
 }
   public function create() { 
    $usuarios = Usuario::all(); 
    $publicacoes = Publicacao::all(); 
    return view('deslikes.create',compact('usuarios','publicacoes')); 
}
   public function store(Request $request) {
    $data = $request->validate(['usuario_id'=>'required|exists:usuarios,id','publicacao_id'=>'required|exists:publicacoes,id' ]);
    Like::where($data)->delete();
    Deslike::firstOrCreate($data);
    return redirect()->route('deslikes.index')->with('success','Deslike adicionado.');
  }
   public function show(Deslike $deslike) { 
    return view('deslikes.show', compact('deslike')); 
 }
   public function destroy(Deslike $deslike) { 
    $deslike->delete(); 
    return redirect()->route('deslikes.index')->with('success','Deslike removido.'); 
}
}
