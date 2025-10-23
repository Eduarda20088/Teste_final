@extends('layouts.app')
@section('content')
<h3>Editar Empresa</h3>
<form action="{{ route('empresas.update',$empresa) }}" method="POST">
  @csrf @method('PUT')
  <div class="mb-3"><label>Nome</label><input name="nome" class="form-control" value="{{ $empresa->nome }}" required></div>
  <div class="mb-3"><label>CNPJ</label><input name="cnpj" class="form-control" value="{{ $empresa->cnpj }}"></div>
  <div class="mb-3"><label>Descrição</label><textarea name="descricao" class="form-control">{{ $empresa->descricao }}</textarea></div>
  <div class="mb-3"><label>Logo (URL)</label><input name="logo" class="form-control" value="{{ $empresa->logo }}"></div>
  <button class="btn btn-warning">Atualizar</button>
  <a href="{{ route('empresas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
