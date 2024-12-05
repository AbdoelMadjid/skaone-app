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
        //MENGHITUNG JENIS PERSONIL BERDASARKAN JENIS KELAMIN ===================================?
        // Contoh: Mengambil data dari database
        $dataPersonil = PersonilSekolah::select('jenispersonil', DB::raw('count(*) as total'))
            ->groupBy('jenispersonil')
            ->pluck('total', 'jenispersonil');


        $totalGuruLakiLaki = PersonilSekolah::where('jenispersonil', 'Guru')
            ->where('jeniskelamin', 'Laki-laki')
            ->count();

        $totalGuruPerempuan = PersonilSekolah::where('jenispersonil', 'Guru')
            ->where('jeniskelamin', 'Perempuan')
            ->count();

        $totalTataUsahaLakiLaki = PersonilSekolah::where('jenispersonil', 'Tata Usaha')
            ->where('jeniskelamin', 'Laki-laki')
            ->count();

        $totalTataUsahaPerempuan = PersonilSekolah::where('jenispersonil', 'Tata Usaha')
            ->where('jeniskelamin', 'Perempuan')
            ->count();

        // HITUNG UMUR PERSONIL ==============================================>
        // Mengambil semua data personil
        $personil = PersonilSekolah::all();

        // Menghitung umur setiap personil dan mengelompokkan berdasarkan rentang usia
        $dataUsia = [
            '<25' => 0,
            '25-35' => 0,
            '35-45' => 0,
            '45-55' => 0,
            '55+' => 0
        ];

        foreach ($personil as $p) {
            $umur = Carbon::parse($p->tanggallahir)->age;

            // Mengelompokkan berdasarkan rentang usia
            if ($umur < 25) {
                $dataUsia['<25']++;
            } elseif ($umur >= 25 && $umur <= 35) {
                $dataUsia['25-35']++;
            } elseif ($umur > 35 && $umur <= 45) {
                $dataUsia['35-45']++;
            } elseif ($umur > 45 && $umur <= 55) {
                $dataUsia['45-55']++;
            } else {
                $dataUsia['55+']++;
            }
        }

        // Kalkulasi total personil untuk total di radial bar
        $totalPersonil = array_sum($dataUsia);


        // hitung siswa berdasarkan kompetensi keahlian
        $PDKKresults = DB::table('peserta_didiks')
            ->select('kode_kk', 'thnajaran_masuk', DB::raw('count(*) as total'))
            ->groupBy('kode_kk', 'thnajaran_masuk')
            ->get();

        // Siapkan data untuk chart
        $thnajaranMasuk = [];
        $dataByKodeKK = [];

        foreach ($PDKKresults as $result) {
            // Kumpulkan tahun ajaran jika belum ada
            if (!in_array($result->thnajaran_masuk, $thnajaranMasuk)) {
                $thnajaranMasuk[] = $result->thnajaran_masuk;
            }

            // Kumpulkan data berdasarkan kode_kk
            $dataByKodeKK[$result->kode_kk][] = $result->total;
        }




        // Hitung jumlah siswa per rombel_tingkat dan tahun_ajaran
        $dataPesertaDidik = DB::table('peserta_didik_rombels')
            ->select('tahun_ajaran', 'rombel_tingkat', DB::raw('count(*) as total'))
            ->groupBy('tahun_ajaran', 'rombel_tingkat')
            ->get();

        // Siapkan data untuk grafik
        $pesertaDidikCategories = [];
        $pesertaDidikSeries = [];

        foreach ($dataPesertaDidik as $result) {
            // Buat kategori dengan format "Tahun Ajaran - Rombel Tingkat"
            $pesertaDidikCategories[] = "{$result->tahun_ajaran} - {$result->rombel_tingkat}";
            $pesertaDidikSeries[] = $result->total;
        }

        $activeUsers = User::whereNotNull('last_login_at') // Atau sesuaikan kondisi sesuai kebutuhan Anda
            ->where('last_login_at', '>=', now()->subMinutes(45)) // Contoh, pengguna yang login dalam 5 menit terakhir
            ->get(); // Ambil pengguna aktif


        $today = Carbon::today(); // Mengambil tanggal hari ini
        $userLoginHariini = User::whereDate('last_login_at', $today)->get();

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
            'dataPersonil',
            'totalGuruLakiLaki',
            'totalGuruPerempuan',
            'totalTataUsahaLakiLaki',
            'totalTataUsahaPerempuan',
            'dataUsia',
            'totalPersonil',
            'thnajaranMasuk',
            'dataByKodeKK',
            'pesertaDidikCategories',
            'pesertaDidikSeries',
            'activeUsers',
            'personil',
            'aingPengguna',
            'userLoginHariini',
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
