<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //dd('11111111111');        
        //return $next($request);
        if (!auth()->check() || auth()->user()->role !== 1) {
            abort(403);
        }
        return $next($request);
    }
}
