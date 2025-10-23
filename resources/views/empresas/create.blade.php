@extends('layouts.app')
@section('content')
<h3>Nova Empresa</h3>
<form action="{{ route('empresas.store') }}" method="POST">
  @csrf
  <div class="mb-3"><label>Nome</label><input name="nome" class="form-control" required></div>
  <div class="mb-3"><label>CNPJ</label><input name="cnpj" class="form-control"></div>
  <div class="mb-3"><label>Descrição</label><textarea name="descricao" class="form-control"></textarea></div>
  <div class="mb-3"><label>Logo (URL)</label><input name="logo" class="form-control"></div>
  <button class="btn btn-success">Salvar</button>
  <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Voltar</a>
</form>
@endsection
