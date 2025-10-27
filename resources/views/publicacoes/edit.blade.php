@extends('layouts.app')
@section('title', 'Editar Publicação')

@section('content')
<div class="container">
    <h2>Editar Publicação</h2>
    <form action="{{ route('publicacoes.update', $publicacao->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <div class="mb-3"><label>Título</label><input name="titulo" value="{{ $publicacao->titulo }}" class="form-control" required></div>
        <div class="mb-3">
            <label>Imagem</label>
            <input type="file" name="imagem" class="form-control">
            @if($publicacao->imagem)
                <img src="{{ asset('storage/'.$publicacao->imagem) }}" width="100" class="rounded mt-2">
            @endif
        </div>
        <div class="mb-3"><label>Local</label><input name="local" class="form-control" value="{{ $publicacao->local }}"></div>
        <div class="mb-3"><label>Cidade</label><input name="cidade" class="form-control" value="{{ $publicacao->cidade }}"></div>
        <div class="mb-3">
            <label>Empresa</label>
            <select name="empresa_id" class="form-control">
                @foreach($empresas as $empresa)
                    <option value="{{ $empresa->id }}" {{ $empresa->id == $publicacao->empresa_id ? 'selected' : '' }}>
                        {{ $empresa->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Atualizar</button>
        <a href="{{ route('publicacoes.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
