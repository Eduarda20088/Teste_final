@extends('layouts.app')

@section('title', 'Cadastrar Aluno')

@section('content')
<div class="container mt-4">
    <h1>Cadastrar Aluno</h1>

    <form action="{{ route('alunos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Matrícula</label>
            <input type="text" name="matricula" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control-file">
        </div>
        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
    </form>
</div>
@endsection
