<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index() {
        $usuarios = Usuario::paginate(15);
        return view('usuarios.index', compact('usuarios'));
    }

    public function create() {
        return view('usuarios.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|string|min:6',
            'foto' => 'nullable|string'
        ]);

        $data['senha'] = bcrypt($data['senha']);
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
        $data = $request->validate([
            'nome' => 'required|string|max:100',
            'email' => "required|email|unique:usuarios,email,{$usuario->id}",
            'senha' => 'nullable|string|min:6',
            'foto' => 'nullable|string'
        ]);

        if(!empty($data['senha'])) {
            $data['senha'] = bcrypt($data['senha']);
        } else {
            unset($data['senha']);
        }

        $usuario->update($data);
        return redirect()->route('usuarios.show',$usuario)->with('success','Usuário atualizado.');
    }

    public function destroy(Usuario $usuario) {
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success','Usuário deletado.');
    }
}
