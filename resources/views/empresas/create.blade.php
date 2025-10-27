@extends('layouts.app')
@section('title','Nova Empresa')
@section('content')
  <h2>Nova Empresa</h2>
   <form action="{{ route('empresas.store') }}" method="POST" enctype="multipart/form-data">@csrf
     <div class="mb-3">
      <label>Nome</label>
      <input name="nome" class="form-control" required>
    </div>
     <div class="mb-3">
      <label>Descrição</label>
      <textarea name="descricao" class="form-control"></textarea>
    </div>
     <div class="mb-3">
      <label>Imagem</label>
      <input type="file" name="imagem" class="form-control">
    </div>
     <button class="btn btn-success">Salvar</button>
     <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
