<?php

namespace App\Http\Controllers\Kurikulum\PerangkatUjian;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\PerangkatUjian\IdentitasUjian;
use App\Models\Kurikulum\PerangkatUjian\PesertaUjian;
use App\Models\Kurikulum\PerangkatUjian\RuangUjian;
use App\Models\ManajemenSekolah\RombonganBelajar;
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

        return view('pages.kurikulum.perangkatujian.administrasi-ujian', [
            'identitasUjian' => $identitasUjian,
            'ruangs' => $ruangs,
            'pesertaUjians' => $pesertaUjians,
            'rombels' => $rombels,
            'dataRuang' => $dataRuang,
            'pesertaUjianTable' => $pesertaUjianTable,
            'rekapKelas' => $rekapKelas,
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

        /* $mejaList = [];
        for ($i = 0; $i < $totalMeja; $i++) {
            $mejaList[] = [
                'kiri' => $kiri[$i] ?? null,
                'kanan' => $kanan[$i] ?? null,
            ];
        } */

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
}
