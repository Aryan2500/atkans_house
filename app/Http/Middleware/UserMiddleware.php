<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(auth()->user()->user_type);
        if (auth()->check() && (auth()->user()->user_type === 'user' || auth()->user()->user_type === 'model')) {
            return $next($request);
        }
        abort(403); // Forbidden
    }
}
