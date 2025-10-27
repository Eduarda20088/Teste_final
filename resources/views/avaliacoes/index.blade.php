@extends('layouts.app')
@section('title','Avaliacoes')
@section('content')
<div class='container mt-4'>
<div class='d-flex justify-content-between mb-3'><h2>Avaliacoes</h2><a class='btn btn-success' href='{
route("avaliacoes.create") }'>Novo</a></div>
<table class='table table-bordered'><thead><tr>
<th>Usuario id</th>
<th>Empresa id</th>
<th>Nota</th>
<th>Comentario</th>
<th>Ações</th></tr></thead><tbody>
@foreach($avaliacoes as $item)
<tr>
<td>{{ $item->usuario->nome ?? '' }}</td>
<td>{{ $item->empresa->nome ?? '' }}</td>
<td>{{ $item->nota }}</td>
<td>{{ $item->comentario }}</td>
<td><a class='btn btn-primary btn-sm' href='{{ route("avaliacoes.show", $item) }}'>Ver</a> <a class='btn btn-warning btnsm' href='{{ route("avaliacoes.edit", $item) }}'>Editar</a> <form action='{{ route("avaliacoes.destroy", $item) }}'
method='POST' style='display:inline-block'>@csrf @method('DELETE')<button class='btn btn-danger btn-sm' onclick='return
confirm("Confirmar exclusão?")'>Excluir</button></form></td>
</tr>@endforeach</tbody></table></div>@endsection
