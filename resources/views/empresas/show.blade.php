@extends('layouts.app')
@section('content')
<h3>{{ $empresa->nome }}</h3>
@if($empresa->logo)<img src="{{ $empresa->logo }}" style="max-width:200px">@endif
<p><strong>CNPJ:</strong> {{ $empresa->cnpj }}</p>
<p>{{ $empresa->descricao }}</p>
<a href="{{ route('empresas.edit',$empresa) }}" class="btn btn-warning">Editar</a>
<a href="{{ route('empresas.index') }}" class="btn btn-secondary">Voltar</a>
@endsection
