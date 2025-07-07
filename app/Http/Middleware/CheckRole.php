<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed  ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!$user) {
            // Belum login, redirect ke login
            return redirect()->route('login');
        }

        /**
         * @var user $user
         */
        // Cek apakah user punya salah satu role yang diijinkan
        if (!$user->hasAnyRole($roles)) {
            // Jika tidak punya role, kirim response dengan session flash untuk notif Swal
            return redirect()->route('dashboard')->with('warningRole', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
