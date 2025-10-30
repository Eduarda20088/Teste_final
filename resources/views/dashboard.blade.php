@extends('layout.app')

@section('content')
<div class="container-fluid mt-3">

    {{-- Título topo --}}
    <div class="text-center mb-4">
        <h1 class="fw-bold text-success">🍽️ Sabor do Brasil</h1>
        <hr>
    </div>

    <div class="row">

        {{-- COLUNA ESQUERDA - PERFIL DO USUÁRIO --}}
        <div class="col-md-3">
            <div class="card shadow-sm p-3">
                <div class="text-center">
                    @php
                        $usuarioNome = session('usuario_nome');
                        $usuario = \App\Models\Usuario::find(session('usuario_id'));
                    @endphp

                    @if ($usuario && $usuario->foto)
                        <img src="{{ asset('storage/'.$usuario->foto) }}" class="rounded-circle mb-3" width="120" height="120">
                    @else
                        <img src="https://via.placeholder.com/120" class="rounded-circle mb-3">
                    @endif

                    <h4 class="fw-bold">{{ $usuarioNome }}</h4>
                </div>
                <hr>
                <a href="{{ route('logout') }}" class="btn btn-outline-danger w-100">Sair</a>
            </div>
        </div>

        {{-- COLUNA CENTRAL - PUBLICAÇÕES --}}
        <div class="col-md-6">
            <h4 class="text-center mb-3 fw-semibold">Publicações recentes</h4>

            @php
                $publicacoes = \App\Models\Publicacao::with('empresa')->orderBy('created_at', 'desc')->get();
            @endphp

            @foreach ($publicacoes as $pub)
                <div class="card mb-4 shadow-sm">
                    @if ($pub->imagem)
                        <img src="{{ asset('storage/'.$pub->imagem) }}" class="card-img-top" alt="{{ $pub->titulo }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title fw-bold">{{ $pub->titulo }}</h5>
                        <p class="card-text mb-1">
                            <strong>Empresa:</strong> {{ $pub->empresa->nome ?? 'N/A' }}<br>
                            <strong>Local:</strong> {{ $pub->local }} - {{ $pub->cidade }}
                        </p>

                        {{-- Botões de interação --}}
                        <div class="d-flex align-items-center mt-3">
                            <form method="POST" action="{{ route('likes.store') }}" class="me-2">
                                @csrf
                                <input type="hidden" name="publicacao_id" value="{{ $pub->id }}">
                                <button class="btn btn-sm btn-outline-success">👍 Curtir</button>
                            </form>

                            <form method="POST" action="{{ route('deslikes.store') }}" class="me-2">
                                @csrf
                                <input type="hidden" name="publicacao_id" value="{{ $pub->id }}">
                                <button class="btn btn-sm btn-outline-danger">👎 Descurtir</button>
                            </form>

                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#comentarios-{{ $pub->id }}">
                                💬 Comentar
                            </button>
                        </div>

                        {{-- Área de comentários --}}
                        <div class="collapse mt-3" id="comentarios-{{ $pub->id }}">
                            <form method="POST" action="{{ route('comentarios.store') }}">
                                @csrf
                                <input type="hidden" name="publicacao_id" value="{{ $pub->id }}">
                                <textarea name="texto" class="form-control mb-2" placeholder="Escreva um comentário..." required></textarea>
                                <button class="btn btn-sm btn-primary">Enviar</button>
                            </form>

                            <hr>
                            @php
                                $comentarios = \App\Models\Comentario::where('publicacao_id', $pub->id)
                                    ->with('usuario')
                                    ->orderBy('criado_em', 'desc')
                                    ->get();
                            @endphp

                            @foreach ($comentarios as $coment)
                                <div class="mb-2">
                                    <strong>{{ $coment->usuario->nome ?? 'Usuário' }}:</strong>
                                    <span>{{ $coment->texto }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- COLUNA DIREITA - EMPRESAS E AVALIAÇÕES --}}
        <div class="col-md-3">
            <div class="card shadow-sm p-3">
                <h5 class="fw-bold mb-3 text-center">Empresas</h5>
                @php
                    $empresas = \App\Models\Empresa::orderBy('nome')->get();
                @endphp
                @foreach ($empresas as $empresa)
                    <div class="mb-3">
                        <h6 class="fw-semibold">{{ $empresa->nome }}</h6>
                        @if ($empresa->imagem)
                            <img src="{{ asset('storage/'.$empresa->imagem) }}" class="img-fluid rounded mb-2">
                        @endif
                        <p class="small">{{ $empresa->descricao }}</p>

                        {{-- Avaliações --}}
                        <form method="POST" action="{{ route('avaliacoes.store') }}">
                            @csrf
                            <input type="hidden" name="empresa_id" value="{{ $empresa->id }}">
                            <select name="nota" class="form-select form-select-sm mb-2" required>
                                <option value="">Nota</option>
                                <option value="1">⭐ 1</option>
                                <option value="2">⭐⭐ 2</option>
                                <option value="3">⭐⭐⭐ 3</option>
                                <option value="4">⭐⭐⭐⭐ 4</option>
                                <option value="5">⭐⭐⭐⭐⭐ 5</option>
                            </select>
                            <textarea name="comentario" class="form-control form-control-sm mb-2" placeholder="Comentário opcional"></textarea>
                            <button class="btn btn-sm btn-success w-100">Avaliar</button>
                        </form>
                        <hr>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>
@endsection
