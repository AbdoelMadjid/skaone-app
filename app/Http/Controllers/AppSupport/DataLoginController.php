<?php

namespace App\Http\Controllers\AppSupport;

use App\Http\Controllers\Controller;
use App\Models\ManajemenPengguna\LoginRecord;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $date = $request->input('date', Carbon::today()->toDateString());

        // Ambil login records berdasarkan tanggal
        $loginRecords = LoginRecord::whereDate('login_at', $date)
            ->with('user')
            ->get();

        return view('pages.appsupport.data-login', compact('loginRecords', 'date'));
    }
}
