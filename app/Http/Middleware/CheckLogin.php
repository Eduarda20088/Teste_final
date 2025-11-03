<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckLogin
{
    public function handle($request, Closure $next)
    {
        if (!Session::has('usuario_id')) {
            return redirect()->route('login')->with('erro', 'Faça login primeiro.');
        }

        return $next($request);
    }
}
