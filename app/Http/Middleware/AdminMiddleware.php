<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user() && $request->user()->permisos !== 'admin') {
            abort(403, 'No tienes permisos para acceder a esta página.');
        }
        return $next($request);
    }
}

