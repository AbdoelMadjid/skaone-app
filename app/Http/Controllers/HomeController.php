<?php

namespace App\Http\Controllers;

use App\Models\WebSite\Polling;
use App\Models\WebSite\Response;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\Kurikulum\PerangkatKurikulum\Pengumuman;
use App\Models\ManajemenPengguna\LoginRecord;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\PengumumanJudul;
use App\Models\PengumumanTerkini;
use App\Models\Pkl\PesertaDidikPkl\AbsensiSiswaPkl;
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

        $data = $loginsPerDay->map(function ($item) {
            return [
                'x' => $item->date, // Tanggal dalam format datetime
                'y' => $item->count // Jumlah login
            ];
        });

        //$mesharini = Carbon::today()->toDateString();
        //$message = DB::table('daily_messages')->where('date', $mesharini)->value('message');


        $todayDay = Carbon::today()->day;

        $message = DB::table('daily_messages')
            ->whereRaw('DAY(date) = ?', [$todayDay])
            ->value('message');

        // Jika pesan tidak ditemukan, gunakan pesan default
        if (!$message) {
            $message = 'Start your day with gratitude and watch how it transforms.';
        }

        $pengumumanHariIni = Pengumuman::where('tanggal', now()->toDateString())->get();
        $pengumumanAll = DB::table('pengumuman')
            ->whereDate('tanggal', '<', now()->toDateString()) // Hanya tanggal sebelum hari ini
            ->orderBy('tanggal', 'desc')
            ->get();

        $nis = $aingPengguna->nis;

        $dataRombel = PesertaDidikRombel::where('nis', $nis)->first();


        $judulUtama = PengumumanJudul::where('status', 'Y')->with(['pengumumanTerkiniAktif' => function ($query) {
            $query->with('poin')
                ->orderBy('urutan');
        }])->get();

        return view('dashboard', [
            'activeUsers' => $activeUsers,
            'activeUsersCount' => $activeUsersCount,
            'loginTodayCount' => $loginTodayCount,
            'jumlahPersonil' => $jumlahPersonil,
            'jumlahPD' => $jumlahPD,
            'loginCount' => $loginCount,
            'aingPengguna' => $aingPengguna,
            'userLoginHariiniPersonil' => $userLoginHariiniPersonil,
            'userLoginHariiniSiswa' => $userLoginHariiniSiswa,
            'totalHadir' => $totalHadir,
            'totalSakit' => $totalSakit,
            'totalIzin' => $totalIzin,
            'sudahHadir' => $sudahHadir,
            'sudahSakit' => $sudahSakit,
            'sudahIzin' => $sudahIzin,
            'ulangTahun' => $ulangTahun,
            // Semua variabel lainnya
            'chartData' => $data, // Tambahkan di sini
            'message' => $message, // Tambahkan di sini
            'pengumumanHariIni' => $pengumumanHariIni,
            'pengumumanAll' => $pengumumanAll,
            'dataRombel' => $dataRombel,
            'judulUtama' => $judulUtama,
        ]);
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
