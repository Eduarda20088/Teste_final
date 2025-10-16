@extends('layouts.app')

@section('content')
<h1>Cadastrar Professor</h1>

<form action="{{ route('professores.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <!-- Dados do Professor -->
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Disciplina</label>
        <input type="text" name="disciplina" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <!-- Dados do Contato -->
    <h4 class="mt-4">Contato</h4>
    <div class="mb-3">
        <label>Email do Contato</label>
        <input type="email" name="contato_email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Telefone</label>
        <input type="text" name="contato_telefone" class="form-control" required>
    </div>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('professores.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
