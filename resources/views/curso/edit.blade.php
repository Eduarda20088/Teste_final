@extends('layouts.app')
@section('title', 'Editar Curso')
@section('content')
<div class="container mt-4">
    <h1>Editar Curso</h1>
    <form action="{{ route('curso.update', $curso->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nome do Curso</label>
            <input type="text" name="nome" class="form-control" value="{{ $curso->nome }}" required>
        </div>
        <button type="submit" class="btn btn-warning mt-2">Atualizar</button>
        <a href="{{ route('curso.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection
