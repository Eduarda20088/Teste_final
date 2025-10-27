@extends('layouts.app')
@section('title','Editar Empresa')
@section('content')
   <h2>Editar Empresa</h2>
    <form action="{{ route('empresas.update',$empresa->id) }}" method="POST" enctype="multipart/form-data">@csrf @method('PUT')
      <div class="mb-3">
        <label>Nome</label>
        <input name="nome" class="form-control" value="{{ $empresa->nome }}">
    </div>
      <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control">{{ $empresa->descricao }}</textarea>
    </div>
    <div class="mb-3">
        <label>Imagem</label>
        <input type="file" name="imagem" class="form-control">
    </div>
@if($empresa->imagem)<img src="{{ asset('storage/'.$empresa->imagem) }}" width="120">@endif
<button class="btn btn-primary">Atualizar</button>
<a href="{{ route('empresas.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
