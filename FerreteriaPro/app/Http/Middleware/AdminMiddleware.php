<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->email === 'admin@example.com') {
            return $next($request);
        }
        return redirect()->route('errors.access_denied');
    }
}
