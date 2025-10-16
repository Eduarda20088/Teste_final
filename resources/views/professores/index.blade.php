@extends('layouts.app')

@section('content')
<h1>Professores</h1>
<a href="{{ route('professores.create') }}" class="btn btn-primary mb-3">Novo Professor</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Foto</th>
            <th>Nome</th>
            <th>Disciplina</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($professores as $professor)
        <tr>
            <td>
                @if($professor->foto)
                    <img src="{{ asset('storage/'.$professor->foto) }}" width="50">
                @endif
            </td>
            <td>{{ $professor->nome }}</td>
            <td>{{ $professor->disciplina }}</td>
            <td>{{ $professor->email }}</td>
            <td>
                <a href="{{ route('professores.show', $professor->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('professores.edit', $professor->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('professores.destroy', $professor->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
