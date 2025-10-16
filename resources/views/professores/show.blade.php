@extends('layouts.app')

@section('content')
<h1>Detalhes do Professor</h1>

<div class="mb-3">
    @if($professor->foto)
        <img src="{{ asset('storage/'.$professor->foto) }}" width="100">
    @endif
    <p><strong>Nome:</strong> {{ $professor->nome }}</p>
    <p><strong>Disciplina:</strong> {{ $professor->disciplina }}</p>
    <p><strong>Email:</strong> {{ $professor->email }}</p>
</div>

<hr>
<h3>Contatos</h3>
<a href="{{ route('contatos.create', $professor->id) }}" class="btn btn-primary mb-2">Adicionar Contato</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contatos as $contato)
        <tr>
            <td>{{ $contato->email }}</td>
            <td>{{ $contato->telefone }}</td>
            <td>
                <a href="{{ route('contatos.edit', $contato->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('contatos.destroy', $contato->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Deseja excluir?')">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('professores.index') }}" class="btn btn-secondary mt-3">Voltar</a>
@endsection

