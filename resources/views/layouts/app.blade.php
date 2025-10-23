<!doctype html>
    <html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Sabor do Brasil</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
   <style>
   body{ font-family: Inter, Arial; background:#f8f8f8; color:#222; }
   .container{ max-width:1100px; margin:20px auto; display:grid; gridtemplate-columns:260px 1fr 260px; gap:16px; }
  .card{ background:#fff;padding:12px;border-radius:8px; border:1px solid #e9e9e9; }
    .btn{ padding:6px 10px; border-radius:6px; border:none; cursor:pointer; }
    .btn-primary{ background:#D97014; color:white; }
   .small{ font-size:12px;color:#666; }
  </style>
 </head>
 <body>
 <header style="background:#fff;padding:12px;border-bottom:1px solid #eee;">
 <div style="max-width:1100px;margin:0 auto; display:flex; justifycontent:space-between; align-items:center;">
 <div style="display:flex;align-items:center;gap:10px;">
 <img src="{{ asset('anexos/logo_sabor_do_brasil.png') }}" alt="logo"
style="height:48px;">
 <h2 style="margin:0">Sabor do Brasil</h2>
 </div>

   <div>
     @if(session('usuario_id'))
     @php $u = \App\Models\Usuario::find(session('usuario_id')); @endphp
   <span class="small">Olá, {{ $u->nome }}</span>
   <form action="{{ route('logout') }}" method="POST"
   style="display:inline">@csrf<button class="btn">Sair</button></form>
  @else
   <a href="{{ route('login.form') }}" class="btn btnprimary">Entrar</a>
   <a href="{{ route('register.form') }}" class="btn">Registrar</a>
  @endif
  </div>
  </div>
   </header>
    <main class="container">
        @yield('left')
        @yield('content')
        @yield('right')
    </main>
    <footer style="margin-top:20px;padding: 0px;background:#111;color:#fff;text-align:center;">Sabor do Brasil • © 2025
   </footer>
    <script>
     const token = document.querySelector('meta[name="csrftoken"]').getAttribute('content');
     async function postJson(url, data){
    const res = await fetch(url, { method:'POST', headers: {'ContentType':'application/json','X-CSRF-TOKEN': token}, body:JSON.stringify(data) });
    return res;
    }
    </script>
       @stack('scripts')
</body>
</html>
