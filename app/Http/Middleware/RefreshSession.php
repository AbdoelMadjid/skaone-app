<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RefreshSession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika user sudah login
        if (auth()->check()) {
            // Regenerate session ID untuk mencegah session fixation
            Session::regenerate();
            // Regenerate CSRF token
            Session::regenerateToken();
            // Redirect ke dashboard jika request sebelumnya adalah login
            if ($request->is('login')) {
                return Redirect::to('/dashboard');
            }
        }
        return $next($request);
    }
}
