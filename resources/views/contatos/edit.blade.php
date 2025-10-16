@extends('layouts.app')

@section('content')
<h1>Editar Contato do Professor {{ $contato->professor->nome }}</h1>

<form action="{{ route('contatos.update', $contato->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email', $contato->email) }}" required>
    </div>

    <div class="mb-3">
        <label>Telefone</label>
        <input type="text" name="telefone" class="form-control" value="{{ old('telefone', $contato->telefone) }}" required>
    </div>

    <button class="btn btn-success">Atualizar</button>
    <a href="{{ route('professores.show', $contato->professor_id) }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
