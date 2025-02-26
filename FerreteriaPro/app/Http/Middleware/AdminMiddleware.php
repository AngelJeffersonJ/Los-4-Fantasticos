<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, \Closure $next)
    {
        // Verifica si el usuario está autenticado y tiene el email de admin
        if (Auth::check() && optional(Auth::user())->email === 'admin@example.com') {
            return $next($request);
        }

        // Verifica si la ruta 'errors.access_denied' existe antes de redirigir
        if (\Route::has('errors.access_denied')) {
            return redirect()->route('errors.access_denied');
        }

        // Si no existe la ruta, lanza un error 403
        return abort(403, 'No tienes permisos para acceder.');
    }
}
