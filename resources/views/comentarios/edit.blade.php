@extends('layouts.app')
@section('content')
<h3>Editar Comentário</h3>
<form action="{{ route('comentarios.update',$comentario) }}" method="POST">
  @csrf @method('PUT')
  <div class="mb-3"><textarea name="comentario" class="form-control" rows="4" required>{{ $comentario->comentario }}</textarea></div>
  <button class="btn btn-warning">Atualizar</button>
  <a href="{{ route('publicacoes.show',$comentario->publicacao_id) }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
