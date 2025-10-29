@extends('layout.app')

@section('content')
<div class="col-md-4 mx-auto coluna">
    <h4 class="text-center fw-bold text-danger">Entrar</h4>
    @if(session('erro'))
        <div class="alert alert-danger">{{ session('erro') }}</div>
    @endif
    <form method="POST" action="{{ route('login.post') }}">
        @csrf
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control">
        </div>
        <button type="submit" class="btn btn-danger w-100">Entrar</button>
        <p class="mt-3 text-center">Não tem conta? <a href="{{ route('register') }}">Cadastre-se</a></p>
    </form>
</div>
@endsection
