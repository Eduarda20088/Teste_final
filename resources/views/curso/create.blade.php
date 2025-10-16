@extends('layouts.app')
@section('title', 'Novo Curso')
@section('content')
<div class="container mt-4">
    <h1>Novo Curso</h1>
    <form action="{{ route('curso.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nome do Curso</label>
            <input type="text" name="nome" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success mt-2">Salvar</button>
        <a href="{{ route('curso.index') }}" class="btn btn-secondary mt-2">Cancelar</a>
    </form>
</div>
@endsection
