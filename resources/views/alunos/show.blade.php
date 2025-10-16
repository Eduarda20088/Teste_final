@extends('layouts.app')

@section('title', 'Detalhes do Aluno')

@section('content')
<div class="container mt-4">
    <h1>Detalhes do Aluno</h1>

    <div class="card mb-3" style="max-width: 540px;">
        <div class="row no-gutters">
            @if($aluno->foto)
            <div class="col-md-4">
                <img src="{{ asset('imagens/alunos/' . $aluno->foto) }}" class="card-img" alt="Foto do Aluno">
            </div>
            @endif
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $aluno->nome }}</h5>
                    <p class="card-text">
                        <strong>Matrícula:</strong>
