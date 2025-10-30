<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserAuthController extends Controller
{
    // Exibe tela de login
    public function showLogin()
    {
        return view('auth.login');
    }

    // Exibe tela de cadastro
    public function showRegister()
    {
        return view('auth.register');
    }

    // Cadastro de usuário
    public function register(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'senha' => 'required|min:6|confirmed',
        ]);

        $usuario = Usuario::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'senha' => Hash::make($request->senha),
        ]);

        // Guarda o usuário na sessão
        Session::put('usuario_id', $usuario->id);
        Session::put('usuario_nome', $usuario->nome);

        // Redireciona pro dashboard
        return redirect()->route('dashboard');
    }

    // Login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'senha' => 'required',
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->senha, $usuario->senha)) {
            return back()->with('erro', 'Credenciais inválidas');
        }

        // Guarda dados na sessão
        Session::put('usuario_id', $usuario->id);
        Session::put('usuario_nome', $usuario->nome);

        // Vai pro dashboard
        return redirect()->route('dashboard');
    }

    // Logout
    public function logout()
    {
        Session::forget(['usuario_id', 'usuario_nome']);
        return redirect()->route('login');
    }
}
