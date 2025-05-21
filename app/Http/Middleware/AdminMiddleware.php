<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role_id === 'admin') {
            return $next($request);
        }

        // If not admin, return 403 or redirect
        abort(403, 'Unauthorized access.');
        
    }
}