@extends('layouts.app')

@section('content')
<h1>Adicionar Contato para {{ $professor->nome }}</h1>

<form action="{{ route('contatos.store', $professor->id) }}" method="POST">
    @csrf

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
    </div>

    <div class="mb-3">
        <label>Telefone</label>
        <input type="text" name="telefone" class="form-control" value="{{ old('telefone') }}" required>
    </div>

    <button class="btn btn-success">Salvar</button>
    <a href="{{ route('professores.show', $professor->id) }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
