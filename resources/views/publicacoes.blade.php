<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Sabor do Brasil</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background:#fafafa; font-family: Inter, system-ui, Arial; }
    .topbar { background: #fff; border-bottom: 1px solid #eee; }
    .brand { font-weight: 800; color: #c0392b; font-size: 20px; display: flex; align-items:center; gap:10px; }
    .brand img { width:44px; height:44px; border-radius:10px; object-fit:cover; }
    .feed { max-width:900px; margin: 28px auto; }
    .post { background:#fff; border-radius:12px; padding:18px; margin-bottom:18px; box-shadow:0 6px 18px rgba(0,0,0,0.04); }
    .post .header img { width:56px;height:56px;border-radius:50%;object-fit:cover;margin-right:12px; }
    .post .actions button { border:0;background:transparent; cursor:pointer; font-size:15px; }
    .like-count, .deslike-count { font-weight:600; margin-left:6px; }
    .comment { background:#f6f6f6; padding:10px; border-radius:8px; margin-bottom:8px; }
    .new-post { margin-bottom: 22px; }
    .logo-text { color:#b03a2e; font-weight:700; font-size:18px; }
  </style>
</head>
<body>
  <nav class="topbar">
    <div class="container d-flex align-items-center justify-content-between py-3">
      <div class="d-flex align-items-center">
        <div class="brand">
          <img src="{{ asset('images/logo.png') }}" alt="logo">
          <span class="logo-text">Sabor do Brasil</span>
        </div>
      </div>

      <div class="d-flex align-items-center">
        <!-- foto de exemplo / fixa -->
        <img src="{{ asset('images/default-user.png') }}" width="44" height="44" class="rounded-circle me-2" alt="user">
        <div class="text-muted">Bem-vindo</div>
      </div>
    </div>
  </nav>

  <main class="feed">
    <div class="container">

      <!-- novo post -->
      <div class="post new-post">
        <form action="{{ route('publicar') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="mb-2">
            <textarea name="conteudo" class="form-control" rows="3" placeholder="Compartilhe uma receita, dica ou foto..." required></textarea>
          </div>
          <div class="d-flex gap-2 align-items-center">
            <input type="file" name="imagem" accept="image/*">
            <button class="btn btn-danger ms-auto" type="submit">Publicar</button>
          </div>
        </form>
      </div>

      <!-- lista de posts -->
      @foreach($publicacoes as $pub)
        <article class="post">
          <div class="d-flex header mb-2">
            <img src="{{ $pub->usuario && $pub->usuario->foto ? asset('storage/'.$pub->usuario->foto) : asset('images/default-user.png') }}" alt="user">
            <div>
              <div class="fw-bold">{{ $pub->usuario->nome ?? 'Usuário' }}</div>
              <small class="text-muted">{{ $pub->created_at ? $pub->created_at->format('d/m/Y H:i') : '' }}</small>
            </div>
          </div>

          <div class="content mb-3">
            <p style="white-space:pre-wrap;">{{ $pub->conteudo }}</p>
            @if($pub->imagem)
              <img src="{{ asset('storage/publicacoes/'.$pub->imagem) }}" class="img-fluid rounded mb-2" alt="publicacao">
            @endif
          </div>

          <div class="d-flex align-items-center actions mb-3">
            <form action="{{ route('like') }}" method="POST" class="me-3">
              @csrf
              <input type="hidden" name="publicacao_id" value="{{ $pub->id }}">
              <button type="submit">👍 <span class="like-count">{{ $pub->likes ?? 0 }}</span></button>
            </form>

            <form action="{{ route('deslike') }}" method="POST" class="me-3">
              @csrf
              <input type="hidden" name="publicacao_id" value="{{ $pub->id }}">
              <button type="submit">👎 <span class="deslike-count">{{ $pub->deslikes ?? 0 }}</span></button>
            </form>

            <div class="ms-auto text-muted">{{ $pub->comentarios->count() }} comentários</div>
          </div>

          <div class="comments">
            @foreach($pub->comentarios as $coment)
              <div class="comment">
                <strong>{{ $coment->usuario->nome ?? 'Anon' }}</strong><br>
                <span>{{ $coment->conteudo }}</span>
              </div>
            @endforeach

            <form action="{{ route('comentar') }}" method="POST" class="mt-2">
              @csrf
              <input type="hidden" name="publicacao_id" value="{{ $pub->id }}">
              <div class="d-flex gap-2">
                <input name="conteudo" class="form-control" placeholder="Escreva um comentário..." required>
                <button class="btn btn-outline-secondary">Comentar</button>
              </div>
            </form>
          </div>
        </article>
      @endforeach

    </div>
  </main>
</body>
</html>
