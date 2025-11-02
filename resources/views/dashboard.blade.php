@extends('layouts.app')
@section('content')
<div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
<aside class="lg:col-span-3 hidden lg:block">
<div class="bg-white p-4 rounded shadow">
<div class="flex items-center gap-3">
<img src="{{ session('usuario_foto') ? asset('storage/'.session('usuario_foto')) :
asset('images/default-user.png') }}" class="w-16 h-16 rounded-full">
<div>
<div class="font-bold">{{ session('usuario_nome') }}</div>
<div class="text-sm text-gray-500">Membro</div>
</div>
</div>
</div>
</aside>
<section class="lg:col-span-6">
<h2 class="text-xl font-semibold mb-4">Publicações</h2>
@foreach($publicacoes as $pub)
<article id="pub-{{ $pub->id }}" class="bg-white rounded shadow mb-6 overflow-hidden">
@if($pub->imagem)
<img src="{{ asset('storage/'.$pub->imagem) }}" class="w-full h-56 object-cover">
@endif
<div class="p-4">
<div class="flex justify-between items-start">
<div>
<h3 class="font-bold">{{ $pub->titulo }}</h3>
<div class="text-sm text-gray-600">{{ $pub->local }} — {{ $pub->cidade }}</div>
</div>
<div class="text-xs text-gray-400">{{ $pub->created_at->format('d/m/Y H:i') }}</div>
</div>
<div class="flex items-center gap-3 mt-4">
<button class="like-btn px-3 py-1 rounded bg-green-50" data-id="{{ $pub->id }}">■ <span class="like-count">{{
$pub->likes->count() }}</span></button>
<button class="deslike-btn px-3 py-1 rounded bg-red-50" data-id="{{ $pub->id }}">■ <span class="deslike-count">{{
$pub->deslikes->count() }}</span></button>
<button class="toggle-coment-btn px-3 py-1 rounded bg-blue-50" data-id="{{ $pub->id }}">■ <span
class="coment-count">{{ $pub->comentarios->count() }}</span></button>
</div>
<div class="coment-area mt-4 hidden" id="coment-area-{{ $pub->id }}">
<div class="existing-comments">
@foreach($pub->comentarios as $com)
<div class="mb-2 text-sm">
<strong>{{ $com->usuario->nome ?? 'Usuário' }}:</strong> {{ $com->texto }}
<div class="text-xs text-gray-400">{{ $com->criado_em }}</div>
</div>
@endforeach
</div>
@if(session('usuario_id'))
<form class="coment-form mt-2" data-id="{{ $pub->id }}">
@csrf
<textarea name="texto" rows="2" class="w-full border rounded p-2" placeholder="Escreva um
comentário..."></textarea>
<div class="flex justify-end mt-2">
<button class="bg-green-700 text-white px-3 py-1 rounded">Comentar</button>
</div>
</form>
@else
<div class="text-sm text-gray-600">Faça login para comentar.</div>
@endif
</div>
</div>
</article>
@endforeach
</section>
<aside class="lg:col-span-3 hidden lg:block">
<div class="bg-white p-4 rounded shadow">
<h4 class="font-semibold">Sobre</h4>
<p class="text-sm text-gray-600 mt-2">Sabor do Brasil — compartilhe pratos e avaliações.</p>
</div>
</aside>
</div>
@endsection

