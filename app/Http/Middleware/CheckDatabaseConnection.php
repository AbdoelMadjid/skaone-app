<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class CheckDatabaseConnection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            // Mencoba melakukan query sederhana untuk memeriksa koneksi ke database
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            // Jika terjadi error koneksi, arahkan ke halaman peringatan
            return redirect()->route('db.error');
        }

        return $next($request);
    }
}
