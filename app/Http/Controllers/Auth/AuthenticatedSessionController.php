<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\ManajemenPengguna\LoginRecord;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Tambahkan pembaruan waktu login terakhir
        $request->user()->update(['last_login_at' => $localLoginTime ?? now()]);

        $user = User::find(Auth::id());

        // Cek apakah sudah ada catatan login di `login_records` untuk hari ini
        $loginRecord = LoginRecord::where('user_id', $user->id)
            ->whereDate('login_at', now()->toDateString())
            ->first();

        if ($loginRecord) {
            // Update waktu login di catatan yang ada
            $loginRecord->update(['login_at' => now()]);
        } else {
            // Buat catatan login baru jika belum ada untuk hari ini
            LoginRecord::create([
                'user_id' => $user->id,
                'login_at' => now(),
            ]);

            // Tambahkan 1 ke `login_count` karena ini adalah login pertama hari ini
            $user->login_count = $user->login_count + 1;
            $user->save();
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        // Optional: Invalidate the user's session
        $request->session()->invalidate();

        // Optional: Regenerate the session token to prevent session fixation
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Logged out successfully.'); // Redirect to home or login page
    }
}
