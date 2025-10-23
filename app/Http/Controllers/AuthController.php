<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

   class AuthController extends Controller{

            public function showRegister(){ return view('auth.register'); }
            public function register(Request $r){
            $r->validate(['nome'=>'required','email'=>'required|email|unique:usuarios,email','senha'=>'required|min:6']);$usuario = Usuario::create(['nome'=>$r->nome,'email'=>$r->email,'senha'=>$r->senha]);
            Session::put('usuario_id',$usuario->id);

            return redirect()->route('home');
        }
         public function showLogin(){ return view('auth.login'); }
         public function login(Request $r){
         $r->validate(['email'=>'required|email','senha'=>'required']);
         $u = Usuario::where('email',$r->email)->first();
        if(!$u || !Hash::check($r->senha,$u->senha)){
          return back()->withErrors(['msg'=>'Credenciais inválidas'])->withInput();
      }
            Session::put('usuario_id',$u->id);
          return redirect()->route('home');
}
       public function logout(){ Session::forget('usuario_id'); return
      redirect()->route('home'); }
}
