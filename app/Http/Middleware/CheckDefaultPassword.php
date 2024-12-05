<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class CheckDefaultPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil user yang sedang login
        $user = Auth::user();

        // Cek apakah password masih default 'Siliwangi30'
        if (Auth::check() && (Hash::check('Siliwangi30', $user->password) || Hash::check('siswaSKAONE30', $user->password))) {
            // Redirect ke halaman ganti password
            return redirect()->route('profilpengguna.password-pengguna.index')->with('default_password', true);
        }
        // Jika password sudah berubah, lanjutkan ke halaman yang diminta
        return $next($request);
    }
}
