<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Se o usuário não estiver logado, redireciona para login
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Você precisa estar logado.');
        }

        // Se o usuário não for administrador, redireciona para home com erro
        if (!Auth::user()->is_admin) {
            return redirect('/')->with('error', 'Acesso negado! Apenas administradores podem acessar.');
        }

        return $next($request);
    }
}


