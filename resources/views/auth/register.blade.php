@extends('layout.app')

@section('content')
<div class="col-md-4 mx-auto coluna">
    <h4 class="text-center fw-bold text-danger">Cadastrar</h4>
    <form method="POST" action="{{ route('register.post') }}">
        @csrf
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>Senha</label>
            <input type="password" name="senha" class="form-control">
        </div>
        <div class="mb-3">
            <label>Confirmar Senha</label>
            <input type="password" name="senha_confirmation" class="form-control">
        </div>
        <button type="submit" class="btn btn-danger w-100">Cadastrar</button>
    </form>
</div>
@endsection
