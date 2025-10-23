@extends('layouts.app')
@section('left')@endsection
@section('content')
   <div class="card">
    <h3>Registrar</h3>
 <form method="POST" action="{{ route('register') }}">
@csrf
    <div><input name="nome" placeholder="Nome" required style="width: 100%"></div>
 <div><input name="email" placeholder="Email" required style="width:100%"></div>
   <div><input name="senha" type="password" placeholder="Senha" required style="width:100%"></div>
 <div style="margin-top:8px"><button class="btn btn-primary">Registrar</button></div>
   </form>
       </div>
@endsection
@section('right')@endsection