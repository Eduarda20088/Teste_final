@extends('layouts.app')
@section('title','Detalhes da Empresa')
@section('content')
<div class="card p-3">
  <h3>{{ $empresa->nome }}</h3>
  <p>{{ $empresa->descricao }}</p>
  @if($empresa->imagem)<img src="{{ asset('storage/'.$empresa->imagem) }}" width="200">@endif
  <a href="{{ route('empresas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection
