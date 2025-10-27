@extends('layouts.app')
@section('title', 'Nova Publicação')

@section('content')
<div class="container">
    <h2>Nova Publicação</h2>
    <form action="{{ route('publicacoes.store') }}" method="POST" enctype="multipart/form-data">
     @csrf
      <div class="mb-3"><label>Título</label><input name="titulo" class="form-control" required></div>
        <div class="mb-3"><label>Imagem</label><input type="file" name="imagem" class="form-control"></div>
        <div class="mb-3"><label>Local</label><input name="local" class="form-control"></div>
        <div class="mb-3"><label>Cidade</label><input name="cidade" class="form-control"></div>
        <div class="mb-3">
            
        <label>Empresa</label>
            <select name="empresa_id" class="form-control">
            <option value="">Selecione</option>
            @foreach($empresas as $empresa)
                <option value="{{ $empresa->id }}">{{ $empresa->nome }}</option>
            @endforeach
            </select>
        </div>
        <button class="btn btn-success">Salvar</button>
        <a href="{{ route('publicacoes.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>
@endsection
