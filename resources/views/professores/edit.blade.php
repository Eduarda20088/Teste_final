@extends('layouts.app')

@section('content')
<h1>Editar Professor</h1>

<form action="{{ route('professores.update', $professor->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <!-- Dados do Professor -->
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control" value="{{ $professor->nome }}" required>
    </div>

    <div class="mb-3">
        <label>Disciplina</label>
        <input type="text" name="disciplina" class="form-control" value="{{ $professor->disciplina }}" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $professor->email }}" required>
    </div>

    <div class="mb-3">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">
        @if($professor->foto)
            <img src="{{ asset('storage/' . $professor->foto) }}" width="80" class="mt-2">
        @endif
    </div>

    <!-- Contatos existentes -->
    <h4 class="mt-4">Contatos</h4>
    @foreach($professor->contatos as $contato)
        <div class="mb-3">
            <label>Email do Contato</label>
            <input type="email" name="contatos[{{ $contato->id }}][email]" class="form-control" value="{{ $contato->email }}" required>
        </div>
        <div class="mb-3">
            <label>Telefone</label>
            <input type="text" name="contatos[{{ $contato->id }}][telefone]" class="form-control" value="{{ $contato->telefone }}" required>
        </div>
    @endforeach

    <!-- Novo contato -->
    <h5 class="mt-3">Adicionar novo contato</h5>
    <div class="mb-3">
        <label>Email do Contato</label>
        <input type="email" name="novo_contato_email" class="form-control">
    </div>
    <div class="mb-3">
        <label>Telefone</label>
        <input type="text" name="novo_contato_telefone" class="form-control">
    </div>

    <button class="btn btn-success">Atualizar</button>
    <a href="{{ route('professores.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
