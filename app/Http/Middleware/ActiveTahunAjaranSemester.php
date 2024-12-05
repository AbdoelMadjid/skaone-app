<?php

namespace App\Http\Middleware;

use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ActiveTahunAjaranSemester
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $activeTahunAjaran = TahunAjaran::where('status', 'Aktif')->first();
        $activeSemester = Semester::where('status', 'Aktif')->first();

        // Share with all views
        view()->share('activeTahunAjaran', $activeTahunAjaran);
        view()->share('activeSemester', $activeSemester);

        return $next($request);
    }
}
