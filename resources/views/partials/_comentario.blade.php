<div class="comentario-box">
    <strong>{{ $comentario->usuario->nome }}</strong><br>
    <small>{{ $comentario->created_at->diffForHumans() }}</small>
    <p class="mb-0">{{ $comentario->conteudo }}</p>
</div>
