<?php

namespace App\Http\Controllers;

use App\Models\ManajemenPengguna\LoginRecord;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\PesertaDidikPkl\AbsensiSiswaPkl;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $aingPengguna = User::find(Auth::user()->id);

        $activeUsers = User::whereNotNull('last_login_at') // Atau sesuaikan kondisi sesuai kebutuhan Anda
            ->where('last_login_at', '>=', now()->subMinutes(45)) // Contoh, pengguna yang login dalam 5 menit terakhir
            ->get(); // Ambil pengguna aktif


        $today = Carbon::today(); // Mengambil tanggal hari ini

        $userLoginHariiniPersonil = User::whereDate('last_login_at', $today)
            ->whereNotNull('personal_id')->orderBy('last_login_at')
            ->get();

        $userLoginHariiniSiswa = User::whereDate('last_login_at', $today)
            ->whereNotNull('nis')->orderBy('last_login_at')
            ->get();

        $nis = auth()->user()->nis;
        $totalHadir = AbsensiSiswaPkl::where('nis', $nis)
            ->where('status', 'HADIR')
            ->count();

        // Total sakit
        $totalSakit = AbsensiSiswaPkl::where('nis', $nis)
            ->where('status', 'SAKIT')
            ->count();

        // Total izin
        $totalIzin = AbsensiSiswaPkl::where('nis', $nis)
            ->where('status', 'IZIN')
            ->count();

        // Periksa apakah sudah absen hari ini
        $sudahHadir = AbsensiSiswaPkl::where('nis', $nis)
            ->whereDate('tanggal', Carbon::today())
            ->where('status', 'HADIR')
            ->exists();

        $sudahSakit = AbsensiSiswaPkl::where('nis', $nis)
            ->whereDate('tanggal', Carbon::today())
            ->where('status', 'SAKIT')
            ->exists();

        $sudahIzin = AbsensiSiswaPkl::where('nis', $nis)
            ->whereDate('tanggal', Carbon::today())
            ->where('status', 'IZIN')
            ->exists();

        $bulanIni = Carbon::now()->format('m'); // Ambil bulan saat ini
        $ulangTahun = DB::table('personil_sekolahs')
            ->whereMonth('tanggallahir', $bulanIni)
            ->orderBy(DB::raw('DAY(tanggallahir)'), 'asc') // Urutkan berdasarkan hari dalam bulan
            ->get();

        return view('dashboard', compact(
            'activeUsers',
            'aingPengguna',
            'userLoginHariiniPersonil',
            'userLoginHariiniSiswa',
            'totalHadir',
            'totalSakit',
            'totalIzin',
            'sudahHadir',
            'sudahSakit',
            'sudahIzin',
            'ulangTahun',
        ));
    }

    // HomeController.php
    public function fetchActiveUsers()
    {
        // Ambil data terbaru untuk pengguna yang sedang login
        $activeUsers = User::whereNotNull('last_login_at')
            ->where('last_login_at', '>=', now()->subMinutes(15))
            ->get();

        $userLoginHariini = User::whereDate('last_login_at', Carbon::today())->get();

        $totalLogin = LoginRecord::count();
        $loginTodayCount = LoginRecord::whereDate('login_at', Carbon::today())->count();

        return response()->json([
            'activeUsers' => $activeUsers,
            'userLoginHariini' => $userLoginHariini,
            'totalLogin' => $totalLogin,
            'loginTodayCount' => $loginTodayCount,
        ]);
    }
}
