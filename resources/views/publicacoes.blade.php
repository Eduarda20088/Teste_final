<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Feed de Publicações</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5f5f5;
        }
        .post-card {
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 25px;
        }
        .navbar {
            background-color: #0d6efd;
        }
        .navbar-brand {
            color: #fff !important;
            font-weight: bold;
        }
        .img-preview {
            max-width: 100%;
            margin-top: 10px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg mb-4">
        <div class="container">
            <a class="navbar-brand" href="#">MinhaRede</a>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">

                {{-- FORMULÁRIO DE NOVA PUBLICAÇÃO --}}
                <div class="post-card mb-4">
                    <h5>Criar nova publicação</h5>
                    <form method="POST" action="{{ route('publicar') }}" enctype="multipart/form-data">
                        @csrf
                        <textarea name="conteudo" class="form-control mb-2" placeholder="O que você está pensando?" required></textarea>
                        <input type="file" name="imagem" class="form-control mb-2">
                        <button type="submit" class="btn btn-primary w-100">Publicar</button>
                    </form>
                </div>

                {{-- LISTA DE PUBLICAÇÕES --}}
                @foreach($publicacoes as $publicacao)
                <div class="post-card">
                    <div class="d-flex align-items-center mb-3">
                        <img src="{{ asset('storage/fotos/' . ($publicacao->usuario->foto ?? 'default.png')) }}" class="rounded-circle me-2" width="50" height="50" alt="Usuário">
                        <div>
                            <strong>{{ $publicacao->usuario->nome }}</strong><br>
                            <small>{{ $publicacao->created_at->diffForHumans() }}</small>
                        </div>
                    </div>

                    <p>{{ $publicacao->conteudo }}</p>

                    @if($publicacao->imagem)
                        <img src="{{ asset('storage/public/publicacoes/' . $publicacao->imagem) }}" class="img-fluid rounded mb-3" alt="Imagem da publicação">
                    @endif

                    <div class="d-flex mb-2">
                        <form method="POST" action="{{ route('like') }}" class="me-2">
                            @csrf
                            <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
                            <button type="submit" class="btn btn-sm btn-outline-success">
                                👍 {{ $publicacao->likes }}
                            </button>
                        </form>

                        <form method="POST" action="{{ route('deslike') }}">
                            @csrf
                            <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                👎 {{ $publicacao->deslikes }}
                            </button>
                        </form>
                    </div>

                    <div class="mt-3">
                        <h6>Comentários</h6>
                        @foreach($publicacao->comentarios as $comentario)
                            <div class="border p-2 rounded mb-2">
                                <strong>{{ $comentario->usuario->nome }}</strong><br>
                                {{ $comentario->conteudo }}
                            </div>
                        @endforeach

                        <form method="POST" action="{{ route('comentar') }}">
                            @csrf
                            <input type="hidden" name="publicacao_id" value="{{ $publicacao->id }}">
                            <textarea name="conteudo" class="form-control mb-2" placeholder="Escreva um comentário..." required></textarea>
                            <button type="submit" class="btn btn-primary btn-sm">Comentar</button>
                        </form>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</body>
</html>
