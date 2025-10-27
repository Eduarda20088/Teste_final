<?php
namespace App\Http\Controllers;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

  class UsuarioController extends Controller {

     public function index() { 
        $usuarios = Usuario::paginate(15); 
        return view('usuarios.index', compact('usuarios')); 
    }

     public function create() {
        return view('usuarios.create'); 
    }

     public function store(Request $request) {
        $data = $request->validate([ 'nome'=>'required|string|max:100','email'=>'required|email|unique:usuarios,email','senha'=>'required|string|min:4','foto'=>'nullable|image|max:4096' ]);
        $data['senha'] = bcrypt($data['senha']);
        if ($request->hasFile('foto')) { $data['foto'] = $request->file('foto')->store('usuarios','public'); 
        }
      Usuario::create($data);
       return redirect()->route('usuarios.index')->with('success','Usuário criado.');
 }

      public function show(Usuario $usuario) { 
        return view('usuarios.show', compact('usuario')); 
    }

     public function edit(Usuario $usuario) { 
        return view('usuarios.edit', compact('usuario')); 
    }

     public function update(Request $request, Usuario $usuario) {
       $data = $request->validate([ 'nome'=>'required|string|max:100','email'=>"required|email|unique:usuarios,email,{$usuario->id}",'senha'=>'nullable|string|min:4','foto'=>'nullable|image|max:4096' ]);
       if (!empty($data['senha'])) { 
        $data['senha'] = bcrypt($data['senha']); 
    } else { unset($data['senha']); 
    }
      if ($request->hasFile('foto')) { 
        if ($usuario->foto) Storage::disk('public')->delete($usuario->foto); $data['foto']= $request->file('foto')->store('usuarios','public'); 
    }
      $usuario->update($data);
      return redirect()->route('usuarios.show',$usuario)->with('success','Usuário atualizado.');
 }

     public function destroy(Usuario $usuario) { 
        if ($usuario->foto) Storage::disk('public')->delete($usuario->foto);
        $usuario->delete(); 
        return redirect()->route('usuarios.index')->with('success','Usuário deletado.'); 
    }
}
