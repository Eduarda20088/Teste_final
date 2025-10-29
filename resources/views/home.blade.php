@extends('layout.app')

@section('content')
<div class="text-center">
    <h1 class="fw-bold text-danger">Bem-vindo ao Sabor do Brasil 🍛</h1>
    <p>Descubra, avalie e compartilhe experiências gastronômicas pelo país!</p>
    <a href="{{ route('dashboard') }}" class="btn btn-danger">Acessar Plataforma</a>
</div>
@endsection
