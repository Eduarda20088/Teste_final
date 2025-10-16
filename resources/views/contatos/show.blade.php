@extends('layouts.app')

@section('content')
<h1>Detalhes do Contato</h1>

<p><strong>Professor:</strong> {{ $contato->professor->nome }}</p>
<p><strong>Email:</strong> {{ $contato->email }}</p>
<p><strong>Telefone:</strong> {{ $contato->telefone }}</p>

<a href="{{ route('contatos.edit', $contato->id) }}" class="btn btn-warning">Editar</a>
<form action="{{ route('contatos.destroy', $contato->id) }}" method="POST" style="display:inline-block">
    @csrf
    @method('DELETE')
    <button class="btn btn-danger" onclick="return confirm('Deseja excluir?')">Excluir</button>
</form>
<a href="{{ route('professores.show', $contato->professor_id) }}" class="btn btn-secondary">Voltar ao Professor</a>
@endsection
