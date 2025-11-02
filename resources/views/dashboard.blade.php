@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-7">
        @foreach($publicacoes as $publicacao)
        <div class="card mb-4 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('storage/' . $publicacao->usuario->foto) }}" 
                         class="rounded-circle me-2" width="50" height="50">
                    <div>
                        <strong>{{ $publicacao->usuario->nome }}</strong><br>
                        <small>{{ $publicacao->created_at->diffForHumans() }}</small>
                    </div>
                </div>

                <p>{{ $publicacao->conteudo }}</p>

                @if($publicacao->imagem)
                    <img src="{{ asset('storage/' . $publicacao->imagem) }}" 
                         class="img-fluid rounded mb-3">
                @endif

                <div class="d-flex align-items-center mb-2">
                    <form method="POST" action="{{ route('likes.store') }}" class="me-2">
                        @csrf
                        <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
                        <button type="submit" class="btn btn-outline-success btn-sm">
                            👍 {{ $publicacao->likes->count() }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('deslikes.store') }}">
                        @csrf
                        <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            👎 {{ $publicacao->deslikes->count() }}
                        </button>
                    </form>
                </div>

                <div class="mt-3">
                    @foreach($publicacao->comentarios as $comentario)
                        @include('partials._comentario', ['comentario' => $comentario])
                    @endforeach

                    <form method="POST" action="{{ route('comentarios.store') }}" class="mt-2">
                        @csrf
                        <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
                        <textarea name="conteudo" class="form-control mb-2" placeholder="Escreva um comentário..." required></textarea>
                        <button type="submit" class="btn btn-primary btn-sm">Comentar</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
