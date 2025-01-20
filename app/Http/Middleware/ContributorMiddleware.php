<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContributorMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check() || !Auth::user()->is_contributor) {
            return redirect()->route('home')->with('error', 'Acesso não autorizado.');
        }

        return $next($request);
    }
}