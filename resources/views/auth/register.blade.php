@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-body">
                <h3 class="text-center mb-4">Criar Conta</h3>
                <form method="POST" action="{{ route('register.post') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Nome</label>
                        <input type="text" name="nome" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Senha</label>
                        <input type="password" name="senha" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Confirmar Senha</label>
                        <input type="password" name="senha_confirmation" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label>Foto de Perfil</label>
                        <input type="file" name="foto" class="form-control">
                    </div>
                    <button class="btn btn-primary w-100">Cadastrar</button>
                </form>

                <p class="text-center mt-3">
                    Já tem conta? <a href="{{ route('login') }}">Entrar</a>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
