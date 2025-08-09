<?php

namespace App\Http\Middleware;

use App\Helpers\Fitures;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckMaintenanceLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek jika maintenance aktif dan user bukan master
        if (
            Fitures::isFiturAktif('sedang-perbaikan') &&
            !$request->user()->hasRole(['master', 'admin'])
        ) {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('sedangperbaikan')->with('error', 'sedang perbaikan');
        }

        return $next($request);
    }
}
