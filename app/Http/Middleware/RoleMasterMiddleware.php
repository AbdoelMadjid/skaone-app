<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class RoleMasterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna memiliki role 'master'
        if (!Auth::check() || !Auth::user()->hasRole('master')) {
            // Jika tidak, arahkan ke halaman 404
            return response()->view('error.auth-404-basic', [], 404);
        }

        return $next($request);
    }
}
