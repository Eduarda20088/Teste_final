@extends('layouts.app')
@section('title','Comentarios')
@section('content')
<div class='container mt-4'>
<div class='d-flex justify-content-between mb-3'><h2>Comentarios</h2><a class='btn btn-success' href='{
route("comentarios.create") }'>Novo</a></div>
<table class='table table-bordered'><thead><tr>
<th>Publicacao id</th>
<th>Usuario id</th>
<th>Comentario</th>
<th>Ações</th></tr></thead><tbody>
@foreach($comentarios as $item)
<tr>
<td>{{ $item->publicacao->nome ?? '' }}</td>
<td>{{ $item->usuario->nome ?? '' }}</td>
<td>{{ $item->comentario }}</td>
<td><a class='btn btn-primary btn-sm' href='{{ route("comentarios.show", $item) }}'>Ver</a> <a class='btn btn-warning btnsm' href='{{ route("comentarios.edit", $item) }}'>Editar</a> <form action='{{ route("comentarios.destroy", $item) }}'
method='POST' style='display:inline-block'>@csrf @method('DELETE')<button class='btn btn-danger btn-sm' onclick='return
confirm("Confirmar exclusão?")'>Excluir</button></form></td>
</tr>@endforeach</tbody></table></div>@endsection
