<?php

namespace App\Http\Controllers;

use App\Models\WebSite\Galery;
use App\Models\WebSite\PhotoJurusan;
use App\Models\WebSite\PhotoSlide;
use App\Models\WebSite\TeamPengembang;
use App\Models\AppSupport\Referensi;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\Kurikulum\PerangkatUjian\ExamSchedule;
use App\Models\ManajemenPengguna\LoginRecord;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\ManajemenSekolah\WakilKepalaSekolah;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function index()
    {
        // Mengambil data photo slide yang aktif
        $photoSlides = PhotoSlide::where('is_active', true)->get();

        $teamPengembang = TeamPengembang::all();
        $photoJurusan = PhotoJurusan::all();

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
            ->where('last_login_at', '>=', now()->subMinutes(59)) // Contoh, pengguna yang login dalam 5 menit terakhir
            ->get(); // Ambil pengguna aktif

        $activeUsersCount = $activeUsers->count();

        $today = Carbon::today(); // Mengambil tanggal hari ini
        $userLoginHariini = User::whereDate('last_login_at', $today)->get();

        $loginTodayCount = LoginRecord::whereDate('login_at', $today)->count();

        /// Query untuk menghitung total login dari tabel LoginRecord
        $totalLogin = LoginRecord::count();

        $categoryGalery = Referensi::where('jenis', 'KategoriGalery')->pluck('data', 'data')->toArray();
        $galleries = Galery::all();

        // Ambil tahun ajaran yang aktif
        $tahunAjaran = TahunAjaran::where('status', 'Aktif')->first();

        // Periksa jika tidak ada tahun ajaran aktif
        if (!$tahunAjaran) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Ambil semester yang aktif berdasarkan tahun ajaran
        $semester = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaran->id)
            ->first();

        // Periksa jika tidak ada semester aktif
        if (!$semester) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        // Menghitung jumlah siswa per kode_kk dan per tingkat (rombel_tingkat)
        $dataSiswa = PesertaDidikRombel::where('tahun_ajaran', $tahunAjaran->tahunajaran)
            ->select('kode_kk', 'rombel_tingkat', DB::raw('count(*) as jumlah_siswa'))
            ->groupBy('kode_kk', 'rombel_tingkat')
            ->orderBy('kode_kk')
            ->get();

        // Buat variabel untuk menyimpan data berdasarkan kode_kk
        $jumlahSiswaPerKK = [
            '411' => [],
            '421' => [],
            '811' => [],
            '821' => [],
            '833' => [],
        ];

        // Mengisi data berdasarkan kode_kk
        foreach ($dataSiswa as $data) {
            if (array_key_exists($data->kode_kk, $jumlahSiswaPerKK)) {
                $jumlahSiswaPerKK[$data->kode_kk][] = $data;
            }
        }

        // Menghitung total siswa per kode_kk
        $totalSiswaPerKK = [];
        foreach ($jumlahSiswaPerKK as $kodeKK => $data) {
            $totalSiswaPerKK[$kodeKK] = array_sum(array_column($data, 'jumlah_siswa'));
        }


        $jumlahPersonil = DB::table('personil_sekolahs')
            ->count();

        $jumlahPD = DB::table('peserta_didiks')
            ->count();

        $jumlahKelas = DB::table('rombongan_belajars')
            ->where('tahunajaran', $tahunAjaran->tahunajaran)
            ->count();

        $loginCount = DB::table('users')
            ->select('login_count')
            ->sum('login_count');


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


        /* $now = Carbon::now();

        $jadwals = ExamSchedule::orderBy('tanggal_mulai')
            ->orderBy('jam_mulai')
            ->get()
            ->map(function ($jadwal) use ($now) {
                $startDate = Carbon::parse($jadwal->tanggal_mulai);
                $endDate = Carbon::parse($jadwal->tanggal_selesai ?? $jadwal->tanggal_mulai);

                $isSameDate = $startDate->isSameDay($endDate);
                $canAccess = false;
                $status = 'Belum tersedia';

                if ($now->lt($startDate)) {
                    $status = 'Belum tersedia';
                } elseif ($now->gt($endDate->endOfDay())) {
                    $status = 'Ujian selesai';
                } else {
                    if ($isSameDate) {
                        if ($now->isSameDay($startDate)) {
                            $startTime = Carbon::parse($startDate->toDateString() . ' ' . $jadwal->jam_mulai);
                            $endTime = Carbon::parse($startDate->toDateString() . ' ' . $jadwal->jam_selesai);

                            if ($now->between($startTime, $endTime)) {
                                $canAccess = true;
                                $status = 'Bisa diakses';
                            } else {
                                $status = 'Diluar jam';
                            }
                        }
                    } else {
                        if ($now->between($startDate->startOfDay(), $endDate->endOfDay())) {
                            $startTime = Carbon::parse($now->toDateString() . ' ' . $jadwal->jam_mulai);
                            $endTime = Carbon::parse($now->toDateString() . ' ' . $jadwal->jam_selesai);

                            if ($now->between($startTime, $endTime)) {
                                $canAccess = true;
                                $status = 'Bisa diakses';
                            } else {
                                $status = 'Diluar jam';
                            }
                        }
                    }
                }

                $jadwal->can_access = $canAccess;
                $jadwal->status_ujian = $status;

                return $jadwal;
            }); */

        //Tampilkan Wakil Kepala Sekolah
        $tampilWakasek = WakilKepalaSekolah::select(
            'wakil_kepala_sekolahs.id',
            'wakil_kepala_sekolahs.jabatan',
            'wakil_kepala_sekolahs.id_personil',
            'wakil_kepala_sekolahs.motto',
            'photo_personils.photo',
            'personil_sekolahs.gelardepan',
            'personil_sekolahs.namalengkap',
            'personil_sekolahs.gelarbelakang'
        )
            ->join('personil_sekolahs', 'personil_sekolahs.id_personil', '=', 'wakil_kepala_sekolahs.id_personil')
            ->join('photo_personils', 'photo_personils.id_personil', '=', 'wakil_kepala_sekolahs.id_personil')
            ->orderByRaw('CAST(wakil_kepala_sekolahs.id AS UNSIGNED)')
            ->get();


        return view(
            'welcome',
            [
                'photoSlides' => $photoSlides,
                'photoJurusan' => $photoJurusan,
                'teamPengembang' => $teamPengembang,
                'dataPersonil' => $dataPersonil,
                'totalGuruLakiLaki' => $totalGuruLakiLaki,
                'totalGuruPerempuan' => $totalGuruPerempuan,
                'totalTataUsahaLakiLaki' => $totalTataUsahaLakiLaki,
                'totalTataUsahaPerempuan' => $totalTataUsahaPerempuan,
                'dataUsia' => $dataUsia,
                'totalPersonil' => $totalPersonil,
                'thnajaranMasuk' => $thnajaranMasuk,
                'dataByKodeKK' => $dataByKodeKK,
                'pesertaDidikCategories' => $pesertaDidikCategories,
                'pesertaDidikSeries' => $pesertaDidikSeries,
                'activeUsers' => $activeUsers,
                'userLoginHariini' => $userLoginHariini,
                'loginTodayCount' => $loginTodayCount,
                'totalLogin' => $totalLogin,
                'categoryGalery' => $categoryGalery,
                'galleries' => $galleries,
                'tahunAjaran' => $tahunAjaran,
                'semester' => $semester,
                'jumlahSiswaPerKK' => $jumlahSiswaPerKK,
                'totalSiswaPerKK' => $totalSiswaPerKK,
                'jumlahPersonil' => $jumlahPersonil,
                'jumlahPD' => $jumlahPD,
                'jumlahKelas' => $jumlahKelas,
                'loginCount' => $loginCount,
                'activeUsersCount' => $activeUsersCount,
                'chartData' => $data,
                'tampilWakasek' => $tampilWakasek,
                /* 'jadwals' => $jadwals, */
            ]
        );
    }
}
