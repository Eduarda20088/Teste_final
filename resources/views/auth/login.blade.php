@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-5">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="text-center mb-4">Entrar</h3>
                <form method="POST" action="{{ route('login.post') }}">
                    @csrf
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control" required>
                    </div>
                    <button class="btn btn-success w-100">Entrar</button>
                </form>

                <p class="text-center mt-3">
                    Não tem conta? <a href="{{ route('register') }}">Cadastre-se</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
