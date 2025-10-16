@extends('layouts.app')

@section('title', 'Editar Aluno')

@section('content')
<div class="container mt-4">
    <h1>Editar Aluno</h1>

    <form action="{{ route('alunos.update', $aluno->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $aluno->nome }}" required>
        </div>
        <div class="form-group">
            <label>Matrícula</label>
            <input type="text" name="matricula" class="form-control" value="{{ $aluno->matricula }}" required>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $aluno->email }}" required>
        </div>
        <div class="form-group">
            <label>Data de Nascimento</label>
            <input type="date" name="data_nascimento" class="form-control" value="{{ $aluno->data_nascimento }}" required>
        </div>
        <div class="form-group">
            <label>Foto</label>
            <input type="file" name="foto" class="form-control-file">
            @if($aluno->foto)
                <p>Foto atual: <img src="{{ asset('imagens/alunos/' . $aluno->foto) }}" width="80"></p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary mt-2">Atualizar</button>
    </form>
</div>
@endsection

