<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class UserAuthController extends Controller
{
public function showLogin(){ return view('auth.login'); }
public function showRegister(){ return view('auth.register'); }
public function register(Request $r){
$r->validate(['nome'=>'required','email'=>'required|email|unique:usuarios','senha'=>'required|confirmed','foto'=>
'nullable|image']);
$foto = $r->hasFile('foto') ? $r->file('foto')->store('usuarios','public') : null;
$u = Usuario::create(['nome'=>$r->nome,'email'=>$r->email,'senha'=>Hash::make($r->senha),'foto'=>$foto]);
Session::put('usuario_id',$u->id);
Session::put('usuario_nome',$u->nome);
Session::put('usuario_foto',$u->foto);
return redirect()->route('dashboard');
}
public function login(Request $r){
$r->validate(['email'=>'required|email','senha'=>'required']);
$u = Usuario::where('email',$r->email)->first();
if(!$u || !Hash::check($r->senha,$u->senha)) return back()->with('erro','Credenciais inválidas');
Session::put('usuario_id',$u->id);
Session::put('usuario_nome',$u->nome);
Session::put('usuario_foto',$u->foto);
return redirect()->route('dashboard');
}
public function logout(){ Session::forget(['usuario_id','usuario_nome','usuario_foto']); return
redirect()->route('login'); }
}
