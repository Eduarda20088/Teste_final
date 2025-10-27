@extends('layouts.app')
@section('title','Empresas')
@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
  <h2>Empresas</h2>
  <a href="{{ route('empresas.create') }}" class="btn btn-success">+ Nova Empresa</a>
</div>

<div class="row">
  @foreach($empresas as $empresa)
  <div class="col-md-3 mb-4">
    <div class="card">
      @if($empresa->imagem)
      <img src="{{ asset('storage/'.$empresa->imagem) }}" class="card-img-top">
      @endif
      <div class="card-body">
        <h5 class="card-title">{{ $empresa->nome }}</h5>
        <p class="card-text">{{ $empresa->descricao }}</p>
        <a href="{{ route('empresas.show',$empresa->id) }}" class="btn btn-warning btn-sm">Ver</a>
        <a href="{{ route('empresas.edit',$empresa->id) }}" class="btn btn-primary btn-sm">Editar</a>
        <form action="{{ route('empresas.destroy',$empresa->id) }}" method="POST" class="d-inline">@csrf @method('DELETE')
          <button class="btn btn-danger btn-sm">Excluir</button>
        </form>
      </div>
    </div>
  </div>
  @endforeach
</div>
@endsection
