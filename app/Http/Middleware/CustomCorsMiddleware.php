<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CustomCorsMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request)
                ->header('Access-Control-Allow-Origin', '*') // Or specify your frontend's domain here (e.g., 'http://localhost:3000')
                ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization, X-Requested-With');
    }
}
