@extends('layouts.app')
@section('title', 'Lista de Cursos')
@section('content')
<div class="container mt-4">
    <h1>Cursos</h1>
    <a href="{{ route('curso.create') }}" class="btn btn-success mb-2">Novo Curso</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cursos as $curso)
            <tr>
                <td>{{ $curso->nome }}</td>
                <td>
                    <a href="{{ route('curso.show', $curso->id) }}" class="btn btn-info btn-sm">Visualizar</a>
                    <a href="{{ route('curso.edit', $curso->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('curso.destroy', $curso->id) }}" method="POST" style="display:inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
