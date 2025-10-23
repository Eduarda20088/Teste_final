@extends('layouts.app')
@section('left')@endsection
@section('content')
   <div class="card">
    <h3>Login</h3>
 <form method="POST" action="{{ route('login') }}">
@csrf
   <div><input name="email" placeholder="Email" required style="width: 100%"></div>
   <div><input name="senha" type="password" placeholder="Senha" required style="width:100%"></div>
  <div style="margin-top:8px"><button class="btn btn-primary">Entrar</button></div>
 </form>
 </div>
@endsection
@section('right')@endsection

