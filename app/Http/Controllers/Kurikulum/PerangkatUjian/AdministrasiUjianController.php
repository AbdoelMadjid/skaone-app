<?php

namespace App\Http\Controllers\Kurikulum\PerangkatUjian;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\PerangkatUjian\DaftarPengawasUjian;
use App\Models\Kurikulum\PerangkatUjian\IdentitasUjian;
use App\Models\Kurikulum\PerangkatUjian\JadwalUjian;
use App\Models\Kurikulum\PerangkatUjian\PengawasUjian;
use App\Models\Kurikulum\PerangkatUjian\PesertaUjian;
use App\Models\Kurikulum\PerangkatUjian\RuangUjian;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\RombonganBelajar;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministrasiUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $identitasUjian = IdentitasUjian::where('status', 'Aktif')->first(); // Ambil 1 data aktif

        $ruangs = RuangUjian::select('nomor_ruang')->distinct()->pluck('nomor_ruang');

        $rombels = DB::table('rombongan_belajars')->pluck('rombel', 'kode_rombel');

        $pesertaUjians = [];


        if ($identitasUjian) {
            $pesertaUjians = DB::table('peserta_ujians')
                ->join('peserta_didiks', 'peserta_ujians.nis', '=', 'peserta_didiks.nis')
                ->join('rombongan_belajars', 'peserta_ujians.kelas', '=', 'rombongan_belajars.kode_rombel')
                ->where('peserta_ujians.kode_ujian', $identitasUjian->kode_ujian)
                ->select(
                    'peserta_ujians.kode_ujian',
                    'peserta_ujians.nis',
                    'peserta_didiks.nama_lengkap',
                    'rombongan_belajars.rombel',
                    'peserta_ujians.nomor_peserta',
                    'peserta_ujians.nomor_ruang',
                    'peserta_ujians.kode_posisi_kelas',
                    'peserta_ujians.posisi_duduk'
                )
                ->get();
        }

        $ujianAktif = IdentitasUjian::where('status', 'aktif')->first();

        $dataRuang = RuangUjian::where('kode_ujian', $ujianAktif->kode_ujian)->get()->map(function ($item) use ($ujianAktif) {
            $kelasKiri = RombonganBelajar::where('kode_rombel', $item->kelas_kiri)
                ->where('tahunajaran', $ujianAktif->tahun_ajaran)->first();
            $kelasKanan = RombonganBelajar::where('kode_rombel', $item->kelas_kanan)
                ->where('tahunajaran', $ujianAktif->tahun_ajaran)->first();

            // Hitung siswa posisi_duduk 'kiri' di kelas kiri
            $jumlahSiswaKiri = DB::table('peserta_ujians')
                ->where('kode_ujian', $ujianAktif->kode_ujian)
                ->where('kode_posisi_kelas', $item->kode_kelas_kiri)
                ->where('posisi_duduk', 'kiri')
                ->count();

            // Hitung siswa posisi_duduk 'kanan' di kelas kanan
            $jumlahSiswaKanan = DB::table('peserta_ujians')
                ->where('kode_ujian', $ujianAktif->kode_ujian)
                ->where('kode_posisi_kelas', $item->kode_kelas_kanan)
                ->where('posisi_duduk', 'kanan')
                ->count();

            $item->kelas_kiri_nama = $kelasKiri->rombel ?? '-';
            $item->kelas_kanan_nama = $kelasKanan->rombel ?? '-';
            $item->jumlah_siswa_kiri = $jumlahSiswaKiri;
            $item->jumlah_siswa_kanan = $jumlahSiswaKanan;
            $item->jumlah_total = ($jumlahSiswaKanan + $jumlahSiswaKiri);
            return $item;
        });

        $pesertaUjianTable = DB::table('peserta_ujians')
            ->join('peserta_didiks', 'peserta_ujians.nis', '=', 'peserta_didiks.nis')
            ->join('rombongan_belajars', 'peserta_ujians.kelas', '=', 'rombongan_belajars.kode_rombel')
            ->where('peserta_ujians.kode_ujian', $ujianAktif->kode_ujian)
            ->select(
                'peserta_ujians.kode_ujian',
                'peserta_ujians.nis',
                'peserta_ujians.kelas',
                'peserta_didiks.nama_lengkap',
                'rombongan_belajars.rombel',
                'peserta_ujians.nomor_peserta',
                'peserta_ujians.nomor_ruang',
                'peserta_ujians.kode_posisi_kelas',
                'peserta_ujians.posisi_duduk'
            )
            ->get();

        $rekapKelas = collect($pesertaUjianTable)
            ->groupBy('rombel')
            ->sortKeys()
            ->map(function ($group, $rombel) {
                $jumlahKiri = $group->where('posisi_duduk', 'kiri')->count();
                $jumlahKanan = $group->where('posisi_duduk', 'kanan')->count();
                $ruang = $group->pluck('nomor_ruang')->unique()->sort()->implode(', ');
                $kelas = $group->first()->kelas; // ambil nilai kelas dari item pertama

                return [
                    'rombel' => $rombel,
                    'kelas' => $kelas, // ← tambahkan ini
                    'jumlah_kiri' => $jumlahKiri,
                    'jumlah_kanan' => $jumlahKanan,
                    'ruang' => $ruang,
                    'total' => $group->count(),
                ];
            })->values();

        // Ambil semua ruang ujian yang ada, diurutkan berdasarkan nomor ruang
        $ruangUjian = RuangUjian::orderByRaw('CAST(nomor_ruang AS UNSIGNED) ASC')->get();
        $ujianYangAktif = IdentitasUjian::where('status', 'aktif')->first();

        $tanggalUjian = collect();
        $tanggalUjianOption = [];

        if ($ujianYangAktif) {
            $tanggalUjian = collect(CarbonPeriod::create($ujianYangAktif->tgl_ujian_awal, $ujianYangAktif->tgl_ujian_akhir))
                ->map(fn($date) => $date->toDateString());

            $tanggalUjianOption = $tanggalUjian->mapWithKeys(function ($date) {
                return [$date => Carbon::parse($date)->translatedFormat('l, d M Y')];
            })->toArray();
        }

        $pengawas = PengawasUjian::all()->groupBy(function ($item) {
            return $item->nomor_ruang . '_' . $item->tanggal_ujian . '_' . $item->jam_ke;
        });

        $daftarPengawas = DaftarPengawasUjian::where('kode_ujian', $ujianYangAktif->kode_ujian)
            ->orderByRaw('CAST(kode_pengawas AS UNSIGNED) ASC')
            ->get();

        return view('pages.kurikulum.perangkatujian.administrasi-ujian', [
            'identitasUjian' => $identitasUjian,
            'ruangs' => $ruangs,
            'pesertaUjians' => $pesertaUjians,
            'rombels' => $rombels,
            'dataRuang' => $dataRuang,
            'pesertaUjianTable' => $pesertaUjianTable,
            'rekapKelas' => $rekapKelas,
            'ruangUjian' => $ruangUjian,
            'tanggalUjian' => $tanggalUjian,
            'tanggalUjianOption' => $tanggalUjianOption,
            'pengawas' => $pengawas,
            'daftarPengawas' => $daftarPengawas,
            //tampildata kelas
            /* 'jadwalByTanggal' => $jadwalByTanggal,
            'tanggalUjianOption' => $tanggalUjianOption,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'kompetensiKeahlianOption' => $kompetensiKeahlianOption,
            'kodeKKList' => $kodeKKList,
            'singkatanKK' => $singkatanKK,
            'tingkat' => $tingkat, */
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function singkatNama($nama)
    {
        $parts = explode(' ', trim($nama));
        $jumlah = count($parts);

        if ($jumlah === 0) {
            return '';
        }

        $singkat = $parts[0]; // Kata pertama utuh

        for ($i = 1; $i < $jumlah; $i++) {
            $singkat .= ' ' . strtoupper(substr($parts[$i], 0, 1)) . '.';
        }

        return $singkat;
    }

    public function getDenahData(Request $request)
    {
        $request->validate([
            'nomor_ruang' => 'required',
            'layout' => 'required|in:4x5,5x4',
        ]);

        $data = PesertaUjian::with('pesertaDidik')
            ->where('nomor_ruang', $request->nomor_ruang)
            ->get();



        // Bagi berdasarkan posisi_duduk dan reset index (agar bisa diakses via indeks)
        $kiri = $data->where('posisi_duduk', 'kiri')->values();
        $kanan = $data->where('posisi_duduk', 'kanan')->values();

        // Maksimum jumlah meja (selalu 20 untuk 4x5 atau 5x4)
        $totalMeja = 20;

        $mejaList = [];
        for ($i = 0; $i < $totalMeja; $i++) {
            $kiriData = $kiri[$i] ?? null;
            $kananData = $kanan[$i] ?? null;

            $mejaList[] = [
                'kiri' => $kiriData ? [
                    'nomor_peserta' => $kiriData->nomor_peserta,
                    'nis' => $kiriData->nis,
                    'nama_lengkap' => $this->singkatNama($kiriData->pesertaDidik->nama_lengkap ?? ''),
                ] : null,
                'kanan' => $kananData ? [
                    'nomor_peserta' => $kananData->nomor_peserta,
                    'nis' => $kananData->nis,
                    'nama_lengkap' => $this->singkatNama($kananData->pesertaDidik->nama_lengkap ?? ''),
                ] : null,
            ];
        }

        return response()->json([
            'layout' => $request->layout,
            'mejaList' => $mejaList,
        ]);
    }

    public function getKartuPeserta(Request $request)
    {
        $kelas = $request->kelas;
        $identitasUjian = IdentitasUjian::where('status', 'Aktif')->first();

        $pesertaUjians = DB::table('peserta_ujians')
            ->join('peserta_didiks', 'peserta_ujians.nis', '=', 'peserta_didiks.nis')
            ->join('rombongan_belajars', 'peserta_ujians.kelas', '=', 'rombongan_belajars.kode_rombel')
            ->where('peserta_ujians.kode_ujian', $identitasUjian->kode_ujian)
            ->where('peserta_ujians.kelas', $kelas)
            ->select(
                'peserta_ujians.*',
                'peserta_didiks.nama_lengkap',
                'peserta_didiks.nisn',
                'rombongan_belajars.rombel'
            )
            ->orderBy('peserta_didiks.nama_lengkap') // atau orderBy('id'), tergantung kebutuhan urutan
            ->get();

        $html = view('pages.kurikulum.perangkatujian.halamanadmin.kartu-ujian-tampil', [
            'pesertaUjians' => $pesertaUjians,
            'identitasUjian' => $identitasUjian
        ])->render();

        return response()->json(['html' => $html]);
    }

    /* public function getKartuPeserta(Request $request)
    {
        $kelas = $request->kelas;
        $identitasUjian = IdentitasUjian::where('status', 'aktif')->first();

        $pesertaUjians = PesertaUjian::with(['pesertaDidik', 'rombel'])
            ->where('kelas', $kelas)
            ->where('kode_ujian', $identitasUjian->kode_ujian)
            ->get();

        return view('pages.kurikulum.perangkatujian.halamanadmin.kartu-ujian-tampil', compact('pesertaUjians', 'identitasUjian'))->render();
    } */

    public function loadJadwalTingkat(Request $request)
    {
        $tingkat = $request->get('tingkat');


        $ujianAktif = IdentitasUjian::where('status', 1)->first();
        $tanggalUjian = collect(\Carbon\CarbonPeriod::create($ujianAktif->tgl_ujian_awal, $ujianAktif->tgl_ujian_akhir))
            ->map(fn($date) => $date->toDateString());

        $kodeKKList = JadwalUjian::where('tingkat', $tingkat)
            ->pluck('kode_kk')->unique()->values()->toArray();

        $singkatanKK = KompetensiKeahlian::whereIn('idkk', $kodeKKList)
            ->pluck('singkatan', 'idkk')->toArray();

        $jadwalList = JadwalUjian::where('tingkat', $tingkat)
            ->whereIn('tanggal', $tanggalUjian)
            ->orderBy('tanggal')
            ->orderBy('jam_ke')
            ->get();

        $jadwalByTanggal = [];

        foreach ($jadwalList as $jadwal) {
            $tanggal = $jadwal->tanggal;
            $jamKe = $jadwal->jam_ke;
            $kodeKK = $jadwal->kode_kk;
            $jamUjian = $jadwal->jam_ujian;
            $mapel = $jadwal->mata_pelajaran;

            $jadwalByTanggal[$tanggal][$jamKe]['pukul'] = $jamUjian;
            $jadwalByTanggal[$tanggal][$jamKe][$kodeKK] = $mapel;
        }

        $identitasUjian = IdentitasUjian::where('status', 'Aktif')->first();

        return view('pages.kurikulum.perangkatujian.halamanadmin.jadwal-ujian-tampil', compact(
            'kodeKKList',
            'singkatanKK',
            'jadwalByTanggal',
            'tingkat',
            'identitasUjian',
        ));
    }

    public function cetakKartuUjianByKelas($kelas)
    {
        $identitasUjian = IdentitasUjian::where('status', 'Aktif')->first();

        $pesertaUjians = DB::table('peserta_ujians')
            ->join('peserta_didiks', 'peserta_ujians.nis', '=', 'peserta_didiks.nis')
            ->join('rombongan_belajars', 'peserta_ujians.kelas', '=', 'rombongan_belajars.kode_rombel')
            ->where('peserta_ujians.kode_ujian', $identitasUjian->kode_ujian)
            ->where('peserta_ujians.kelas', $kelas)
            ->select(
                'peserta_ujians.*',
                'peserta_didiks.nama_lengkap',
                'peserta_didiks.nisn',
                'rombongan_belajars.rombel'
            )
            ->orderBy('peserta_didiks.nama_lengkap') // atau orderBy('id'), tergantung kebutuhan urutan
            ->get();

        $html = view('pages.kurikulum.perangkatujian.halamanadmin.kartu-ujian-tampil', [
            'pesertaUjians' => $pesertaUjians,
            'identitasUjian' => $identitasUjian
        ])->render();

        return response()->json(['html' => $html]);
    }


    private function singkatNama2($nama)
    {
        $parts = explode(' ', trim($nama));
        $jumlah = count($parts);

        if ($jumlah === 0) {
            return '';
        }

        // Ambil 2 kata pertama utuh
        $singkat = $parts[0] ?? '';
        if ($jumlah > 1) {
            $singkat .= ' ' . $parts[1];
        }

        // Sisanya dijadikan inisial
        for ($i = 2; $i < $jumlah; $i++) {
            $singkat .= ' ' . strtoupper(substr($parts[$i], 0, 1)) . '.';
        }

        return $singkat;
    }

    public function daftarSiswaPerRuang($nomorRuang)
    {
        $ujianAktif = IdentitasUjian::where('status', 'aktif')->first();

        if (!$ujianAktif) {
            return response()->json(['error' => 'Ujian aktif tidak ditemukan.'], 404);
        }

        $peserta = DB::table('peserta_ujians')
            ->join('peserta_didiks', 'peserta_ujians.nis', '=', 'peserta_didiks.nis')
            ->join('rombongan_belajars', 'peserta_ujians.kelas', '=', 'rombongan_belajars.kode_rombel')
            ->where('peserta_ujians.kode_ujian', $ujianAktif->kode_ujian)
            ->where('peserta_ujians.nomor_ruang', $nomorRuang)
            ->select(
                'peserta_ujians.nomor_peserta',
                'peserta_didiks.nama_lengkap',
                'rombongan_belajars.rombel',
                'peserta_ujians.posisi_duduk'
            )
            ->orderBy('peserta_ujians.id')
            ->get();

        // Bagi berdasarkan posisi duduk
        $kiriList = $peserta->where('posisi_duduk', 'kiri')->values();
        $kananList = $peserta->where('posisi_duduk', 'kanan')->values();
        $max = max($kiriList->count(), $kananList->count());

        $rows = [];

        for ($i = 0; $i < $max; $i++) {
            $kiri = $kiriList[$i] ?? null;
            $kanan = $kananList[$i] ?? null;

            if ($kiri) {
                $kiri->nama_lengkap = $this->singkatNama2($kiri->nama_lengkap);
            }

            if ($kanan) {
                $kanan->nama_lengkap = $this->singkatNama2($kanan->nama_lengkap);
            }

            $rows[] = [
                'no' => $i + 1,
                'kiri' => $kiri,
                'kanan' => $kanan,
            ];
        }

        return view('pages.kurikulum.perangkatujian.halamanadmin.denah-ujian-daftar-peserta-tampil', compact('rows'))->render();
    }

    public function getTempelanPesertaByRuang(Request $request)
    {
        $data = PesertaUjian::with('pesertaDidik')
            ->where('nomor_ruang', $request->nomor_ruang)
            ->get()
            ->groupBy('posisi_duduk');

        return response()->json([
            'kiri' => $data->get('kiri', collect()),
            'kanan' => $data->get('kanan', collect())
        ]);
    }
}
