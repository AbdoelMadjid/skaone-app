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
            ->where('last_login_at', '>=', now()->subMinutes(59)) // Contoh, pengguna yang login dalam 5 menit terakhir
            ->get(); // Ambil pengguna aktif

        $activeUsersCount = $activeUsers->count();

        $today = Carbon::today(); // Mengambil tanggal hari ini

        $userLoginHariiniPersonil = User::whereDate('last_login_at', $today)
            ->whereNotNull('personal_id')->orderBy('last_login_at')
            ->get();

        $userLoginHariiniSiswa = User::whereDate('last_login_at', $today)
            ->whereNotNull('nis')->orderBy('last_login_at')
            ->get();

        $loginTodayCount = LoginRecord::whereDate('login_at', $today)->count();

        $jumlahPersonil = DB::table('personil_sekolahs')
            ->count();

        $jumlahPD = DB::table('peserta_didiks')
            ->count();

        $loginCount = DB::table('users')
            ->select('login_count')
            ->sum('login_count');

        // ABSENSI SISWA PKL ================================
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

        // ULANG TAHUN =============================
        $bulanIni = Carbon::now()->format('m'); // Ambil bulan saat ini
        $ulangTahun = DB::table('personil_sekolahs')
            ->whereMonth('tanggallahir', $bulanIni)
            ->orderBy(DB::raw('DAY(tanggallahir)'), 'asc') // Urutkan berdasarkan hari dalam bulan
            ->get();

        $loginsPerDay = DB::table('login_records')
            ->select(DB::raw('DATE(login_at) as date'), DB::raw('COUNT(*) as count'))
            ->groupBy('date')
            ->orderBy('date', 'asc')
            ->get();

        $dates = $loginsPerDay->pluck('date')->toArray();
        $counts = $loginsPerDay->pluck('count')->toArray();

        return view('dashboard', compact(
            'activeUsers',
            'activeUsersCount',
            'loginTodayCount',
            'jumlahPersonil',
            'jumlahPD',
            'loginCount',
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
            'loginsPerDay',
            'dates',
            'counts',
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
