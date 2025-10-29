@extends('layout.app')

@section('content')
<div class="row">
    <!-- COLUNA 1: PERFIL -->
    <div class="col-md-3 coluna">
        @if(Session::has('usuario'))
            <div class="text-center">
                <img src="{{ asset('img/perfil.png') }}" width="100" class="rounded-circle mb-2">
                <h5>{{ Session::get('usuario')->nome }}</h5>
                <p class="text-muted">{{ Session::get('usuario')->email }}</p>
            </div>
        @else
            <h5 class="text-center">Faça login para interagir</h5>
            <div class="text-center mt-3">
                <a href="{{ route('login') }}" class="btn btn-danger btn-sm">Entrar</a>
                <a href="{{ route('register') }}" class="btn btn-secondary btn-sm">Cadastrar</a>
            </div>
        @endif
    </div>

    <!-- COLUNA 2: PUBLICAÇÕES -->
    <div class="col-md-6 coluna">
        <h4 class="mb-3 text-center fw-bold text-danger">Publicações</h4>
        @foreach($publicacoes as $pub)
        <div class="card mb-3">
            <div class="card-body">
                <h5>{{ $pub->titulo }}</h5>
                @if($pub->imagem)
                    <img src="{{ asset('storage/'.$pub->imagem) }}" class="img-fluid rounded mb-2">
                @endif
                <p><small>{{ $pub->cidade }} - {{ $pub->local }}</small></p>
                <div class="d-flex align-items-center mb-2">
                    <button class="btn btn-sm btn-outline-success me-2 btn-like" data-id="{{ $pub->id }}">👍 {{ $pub->likes->count() }}</button>
                    <button class="btn btn-sm btn-outline-danger me-2 btn-deslike" data-id="{{ $pub->id }}">👎 {{ $pub->deslikes->count() }}</button>
                </div>
                <div class="comentarios mb-2">
                    @foreach($pub->comentarios as $com)
                        <p><strong>{{ $com->usuario->nome }}:</strong> {{ $com->texto }}</p>
                    @endforeach
                </div>
                @if(Session::has('usuario'))
                <form class="form-comentario" data-id="{{ $pub->id }}">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Escreva um comentário...">
                        <button class="btn btn-danger">Enviar</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
        @endforeach
    </div>

    <!-- COLUNA 3: EMPRESAS -->
    <div class="col-md-3 coluna">
        <h5 class="text-center fw-bold text-danger">Empresas Parceiras</h5>
        <ul class="list-group list-group-flush">
            @foreach(\App\Models\Empresa::all() as $empresa)
                <li class="list-group-item">
                    <strong>{{ $empresa->nome }}</strong>
                    <p>{{ $empresa->descricao }}</p>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(function(){
    $('.btn-like').click(function(e){
        e.preventDefault();
        let id = $(this).data('id');
        $.post('{{ route("likes.store") }}', { publicacao_id: id, _token: '{{ csrf_token() }}' }, () => location.reload());
    });

    $('.btn-deslike').click(function(e){
        e.preventDefault();
        let id = $(this).data('id');
        $.post('{{ route("deslikes.store") }}', { publicacao_id: id, _token: '{{ csrf_token() }}' }, () => location.reload());
    });

    $('.form-comentario').submit(function(e){
        e.preventDefault();
        let id = $(this).data('id');
        let texto = $(this).find('input').val();
        $.post('{{ route("comentarios.store") }}', { publicacao_id: id, texto: texto, _token: '{{ csrf_token() }}' }, () => location.reload());
    });
});
</script>
@endpush
