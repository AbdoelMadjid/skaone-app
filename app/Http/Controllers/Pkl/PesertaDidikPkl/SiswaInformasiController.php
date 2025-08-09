<?php

namespace App\Http\Controllers\Pkl\PesertaDidikPkl;

use App\Http\Controllers\Controller;
use App\Models\Pkl\PesertaDidikPkl\AbsensiSiswaPkl;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiswaInformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nis = Auth::user()->nis;

        $data = DB::table('pembimbing_prakerins')
            ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')
            ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', function ($join) {
                $join->on('penempatan_prakerins.tahunajaran', '=', 'peserta_didik_rombels.tahun_ajaran')
                    ->on('penempatan_prakerins.nis', '=', 'peserta_didik_rombels.nis');
            })
            ->select(
                'pembimbing_prakerins.id_personil',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang',
                'personil_sekolahs.kontak_hp',
                'personil_sekolahs.photo',
                'pembimbing_prakerins.id_penempatan',
                'penempatan_prakerins.id_dudi',
                'perusahaans.nama',
                'perusahaans.alamat',
                'penempatan_prakerins.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didiks.foto',
                'peserta_didik_rombels.rombel_nama',
            )
            ->where('penempatan_prakerins.nis', $nis)
            ->get();

        $jurnalSiswa = DB::table('pembimbing_prakerins')
            ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')
            ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', function ($join) {
                $join->on('penempatan_prakerins.tahunajaran', '=', 'peserta_didik_rombels.tahun_ajaran')
                    ->on('penempatan_prakerins.nis', '=', 'peserta_didik_rombels.nis');
            })
            ->join('jurnal_pkls', 'penempatan_prakerins.id', '=', 'jurnal_pkls.id_penempatan')
            ->join('capaian_pembelajarans', 'jurnal_pkls.element', '=', 'capaian_pembelajarans.kode_cp')
            ->join('modul_ajars', 'jurnal_pkls.id_tp', '=', 'modul_ajars.id')
            ->select(
                'pembimbing_prakerins.id_penempatan',
                'jurnal_pkls.validasi',
                'jurnal_pkls.tanggal_kirim',
                'capaian_pembelajarans.element',
                'modul_ajars.isi_tp',
            )
            ->where('penempatan_prakerins.nis', $nis)
            ->get();

        // Tentukan tanggal mulai (2 Desember 2024) dan tanggal target (31 Maret 2025)
        $startDate = Carbon::create(2024, 12, 2, 0, 0, 0);
        $endDate = Carbon::create(2025, 3, 31, 0, 0, 0);

        // Ambil waktu sekarang
        $now = Carbon::now();

        // Cek jika waktu sekarang sudah melewati tanggal mulai
        if ($now->lessThan($startDate)) {
            $diff = $startDate->diff($now);  // Waktu yang tersisa sampai 2 Desember 2024
        } else {
            // Hitung selisih waktu dari sekarang sampai tanggal target
            $diff = $now->diff($endDate);
        }

        // Total kehadiran
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


        $rekapJurnal = DB::table('jurnal_pkls')
            ->select(
                DB::raw('YEAR(tanggal_kirim) as tahun'),
                DB::raw('MONTH(tanggal_kirim) as bulan'),
                DB::raw('COUNT(CASE WHEN validasi = "sudah" THEN 1 END) as sudah'),
                DB::raw('COUNT(CASE WHEN validasi = "belum" THEN 1 END) as belum'),
                DB::raw('COUNT(CASE WHEN validasi = "tolak" THEN 1 END) as tolak')
            )
            ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
            ->where('penempatan_prakerins.nis', $nis)
            ->groupBy(DB::raw('YEAR(tanggal_kirim), MONTH(tanggal_kirim)'))
            ->orderBy(DB::raw('YEAR(tanggal_kirim)'))
            ->orderBy(DB::raw('MONTH(tanggal_kirim)'))
            ->get();

        return view('pages.pkl.pesertadidikpkl.siswa-informasi', compact(
            'data',
            'diff',
            'jurnalSiswa',
            'totalHadir',
            'totalSakit',
            'totalIzin',
            'rekapJurnal',
        ));
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
}
