<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMasterRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user yang sedang login memiliki role 'master'
        if (!$request->user()->hasRole('master')) {
            return redirect()->back()->with('error', 'unauthorized_access');
            //return redirect()->back()->with('error', 'Link ini tidak bisa di akses.');
        }

        return $next($request);
    }
}
