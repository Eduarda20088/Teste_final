@extends('layouts.app')

@section('content')
<h1>Todos os Contatos</h1>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Professor</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contatos as $contato)
        <tr>
            <td>{{ $contato->professor->nome }}</td>
            <td>{{ $contato->email }}</td>
            <td>{{ $contato->telefone }}</td>
            <td>
                <a href="{{ route('contatos.edit', $contato->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('contatos.destroy', $contato->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir?')">Excluir</button>
                </form>
                <a href="{{ route('professores.show', $contato->professor_id) }}" class="btn btn-info btn-sm">Ver Professor</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('professores.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection
