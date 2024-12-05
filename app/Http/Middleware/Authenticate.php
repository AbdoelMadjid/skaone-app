<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Jika request bukan format JSON, arahkan ke halaman login atau home
        return $request->expectsJson() ? null : url('/'); // Atau bisa pakai route('home') jika ada
    }
}
