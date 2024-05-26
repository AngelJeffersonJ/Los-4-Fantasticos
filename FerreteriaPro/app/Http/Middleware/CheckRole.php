<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        if (in_array($user->role->name, $roles)) {
            return $next($request);
        }

        return redirect('home')->with('error', 'No tienes permiso para acceder a esta página.');
    }
}
