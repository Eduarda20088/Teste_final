@extends('layouts.app')
@section('title', 'Lista de Publicações')

@section('content')
<div class="container">
    <h2>Publicações</h2>
    <a href="{{ route('publicacoes.create') }}" class="btn btn-success mb-3">Nova Publicação</a>

    <table class="table table-bordered table-striped">
     <thead>
        <tr>
            <th>ID</th><th>Título</th><th>Imagem</th><th>Local</th><th>Cidade</th><th>Empresa</th><th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($publicacoes as $publicacao)
    <tr>
        <td>{{ $publicacao->id }}</td>
        <td>{{ $publicacao->titulo }}</td>
        <td>
             @if($publicacao->imagem)
                <img src="{{ asset('storage/'.$publicacao->imagem) }}" width="70" class="rounded">
            @endif
            </td>
            <td>{{ $publicacao->local }}</td>
            <td>{{ $publicacao->cidade }}</td>
            <td>{{ $publicacao->empresa->nome ?? '—' }}</td>
            <td>
                <a href="{{ route('publicacoes.show', $publicacao->id) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('publicacoes.edit', $publicacao->id) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('publicacoes.destroy', $publicacao->id) }}" method="POST" style="display:inline">
            @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Excluir esta publicação?')">Excluir</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
