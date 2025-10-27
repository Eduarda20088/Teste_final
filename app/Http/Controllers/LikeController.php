<?php
namespace App\Http\Controllers;
use App\Models\Like;
use App\Models\Deslike;
use App\Models\Usuario;
use App\Models\Publicacao;
use Illuminate\Http\Request;

 class LikeController extends Controller {

      public function index() { 
        $likes = Like::with(['usuario','publicacao'])->paginate(50); 
        return view('likes.index', compact('likes')); 
    }

      public function create() { 
        $usuarios = Usuario::all(); 
        $publicacoes = Publicacao::all();
         return view('likes.create', compact('usuarios','publicacoes')); 

        }

      public function store(Request $request) {
         $data = $request->validate(['usuario_id'=>'required|exists:usuarios,id','publicacao_id'=>'required|exists:publicacoes,id' ]);
         Deslike::where($data)->delete();
         Like::firstOrCreate($data);
         return redirect()->route('likes.index')->with('success','Like adicionado.');
   }

      public function show(Like $like) { 
        return view('likes.show', compact('like'));
     }

      public function destroy(Like $like) { 
        $like->delete(); 
        return redirect()->route('likes.index')->with('success','Like removido.'); 
    }
}
