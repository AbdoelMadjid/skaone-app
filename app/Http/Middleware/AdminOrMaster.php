<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminOrMaster
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::user();
        /**
         * @var user $user
         */
        if (!$user || !$user->hasAnyRole(['master', 'admin'])) {
            if ($request->expectsJson()) {
                return response()->json(['status' => 'error', 'message' => 'Anda tidak memiliki akses.'], 403);
            }

            return redirect()->route('dashboard')->with('warningRole', 'Anda tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}
