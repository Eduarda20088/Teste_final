<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email|unique:usuarios',
            'senha' => 'required|confirmed|min:6',
            'foto' => 'nullable|image|max:2048',
        ]);

        $fotoPath = $request->hasFile('foto') ? $request->file('foto')->store('usuarios', 'public') : null;

        $usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
            'foto' => $fotoPath,
        ]);

        Session::put('usuario_id', $usuario->id);
        return redirect()->route('dashboard');
    }

    public function login(Request $request)
    {
        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->senha, $usuario->senha)) {
            return back()->with('erro', 'Credenciais inválidas');
        }

        Session::put('usuario_id', $usuario->id);
        return redirect()->route('dashboard');
    }

    public function logout()
    {
        Session::forget('usuario_id');
        return redirect()->route('login');
    }
}
