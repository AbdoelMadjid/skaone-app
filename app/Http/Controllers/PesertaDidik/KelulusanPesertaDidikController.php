<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\PesertaDidik\IdentitasPesertaDidik;
use App\Models\PesertaDidik\KelulusanPesertaDidik;
use App\Models\PesertaDidik\TranskripDataSiswa;
use App\Models\PesertaDidik\TranskripMapel;
use App\Models\PesertaDidik\TranskripNilai;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KelulusanPesertaDidikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Tentukan tanggal mulai (2 Desember 2024) dan tanggal target (31 Maret 2025)
        $startDate = Carbon::create(2025, 5, 5, 16, 0, 0);
        $endDate = Carbon::create(2025, 5, 19, 16, 0, 0);

        // Ambil waktu sekarang
        $now = Carbon::now();

        // Cek jika waktu sekarang sudah melewati tanggal mulai
        if ($now->lessThan($startDate)) {
            $diff = $startDate->diff($now);  // Waktu yang tersisa sampai 2 Desember 2024
        } else {
            // Hitung selisih waktu dari sekarang sampai tanggal target
            $diff = $now->diff($endDate);
        }

        $aingPengguna = User::find(Auth::user()->id);

        $nis = $aingPengguna->nis;

        $kelulusan = KelulusanPesertaDidik::where('nis', $nis)->first();

        $dataRombel = PesertaDidikRombel::where('nis', $nis)->first();

        $identsiswa = IdentitasPesertaDidik::where('nis', $nis)->first();

        $datasiswa = TranskripDataSiswa::where('nis', $nis)->first();

        if (!$identsiswa || !$dataRombel) {
            abort(404, 'Data siswa tidak ditemukan.');
        }

        // Kelompok A (MPN1-MPN6, ML1)
        $kelompokA = DB::table('transkrip_nilai as tn')
            ->join('transkrip_mapel as tm', 'tn.tahun_ajaran', '=', 'tm.tahun_ajaran')
            ->join('peserta_didik_rombels as pd', 'tm.kode_kk', '=', 'pd.kode_kk')
            ->join('peserta_didik_rombels as pd', 'tn.nis', '=', 'pd.nis')
            ->where('tn.nis', $nis)
            ->whereIn('tm.kode_mapel', ['MPN1', 'MPN2', 'MPN3', 'MPN4', 'MPN5', 'MPN6', 'ML1'])
            ->select(
                'tm.kode_mapel',
                'tm.nama_mapel',
                'tm.no_urut_mapel',
                'tm.inisial_mapel',
                'tn.semester',
                DB::raw("
            CASE tm.kode_mapel
                WHEN 'MPN1' THEN tn.MPN1
                WHEN 'MPN2' THEN tn.MPN2
                WHEN 'MPN3' THEN tn.MPN3
                WHEN 'MPN4' THEN tn.MPN4
                WHEN 'MPN5' THEN tn.MPN5
                WHEN 'MPN6' THEN tn.MPN6
                WHEN 'ML1' THEN tn.ML1
            END as nilai
        ")
            )
            ->orderBy('tm.no_urut_mapel')
            ->orderBy('tn.semester')
            ->get();

        // Kelompok B (K1-K5)
        $kelompokB = DB::table('transkrip_nilai as tn')
            ->join('transkrip_mapel as tm', 'tn.tahun_ajaran', '=', 'tm.tahun_ajaran')
            ->where('tn.nis', $nis)
            ->whereIn('tm.kode_mapel', ['K1', 'K2', 'K3', 'K4', 'K5'])
            ->select(
                'tm.kode_mapel',
                'tm.nama_mapel',
                'tm.inisial_mapel',
                'tn.semester',
                DB::raw("
            CASE tm.kode_mapel
                WHEN 'K1' THEN tn.K1
                WHEN 'K2' THEN tn.K2
                WHEN 'K3' THEN tn.K3
                WHEN 'K4' THEN tn.K4
                WHEN 'K5' THEN tn.K5
            END as nilai
        ")
            )
            ->orderBy('tm.kode_mapel')
            ->orderBy('tn.semester')
            ->get();

        // Kelompok Konsentrasi Keahlian (KK1 - KK10)
        $kkData = DB::table('transkrip_nilai')
            ->where('nis', $nis)
            ->selectRaw("
        ROUND((
            NULLIF(KK1,0)+NULLIF(KK2,0)+NULLIF(KK3,0)+NULLIF(KK4,0)+
            NULLIF(KK5,0)+NULLIF(KK6,0)+NULLIF(KK7,0)+NULLIF(KK8,0)+
            NULLIF(KK9,0)+NULLIF(KK10,0)
        ) /
        NULLIF(
            (KK1!=0)+(KK2!=0)+(KK3!=0)+(KK4!=0)+(KK5!=0)+
            (KK6!=0)+(KK7!=0)+(KK8!=0)+(KK9!=0)+(KK10!=0), 0), 1) as nilai
    ")
            ->first();

        // KWU1
        $kwu = DB::table('transkrip_nilai')
            ->where('nis', $nis)
            ->select('KWU1 as nilai')
            ->first();

        // PKL1, diset di semester 6
        $pkl = DB::table('transkrip_nilai')
            ->where('nis', $nis)
            ->select(DB::raw('PKL1 as nilai'), DB::raw('6 as semester'))
            ->first();

        // MP1-MP3
        $kelompokMP = DB::table('transkrip_nilai as tn')
            ->join('transkrip_mapel as tm', 'tn.tahun_ajaran', '=', 'tm.tahun_ajaran')
            ->where('tn.nis', $nis)
            ->whereIn('tm.kode_mapel', ['MP1', 'MP2', 'MP3'])
            ->select(
                'tm.kode_mapel',
                'tm.nama_mapel',
                'tm.inisial_mapel',
                'tn.semester',
                DB::raw("
            CASE tm.kode_mapel
                WHEN 'MP1' THEN tn.MP1
                WHEN 'MP2' THEN tn.MP2
                WHEN 'MP3' THEN tn.MP3
            END as nilai
        ")
            )
            ->orderBy('tm.kode_mapel')
            ->orderBy('tn.semester')
            ->get();

        return view('pages.pesertadidik.kelulusan-peserta-didik', [
            'diff' => $diff,
            'dataRombel' => $dataRombel,
            'identsiswa' => $identsiswa,
            'datasiswa' => $datasiswa,
            'kelulusan' => $kelulusan,
            'kelompokA' => $kelompokA,
            'kelompokB' => $kelompokB,
            'kelompokKK' => $kkData,
            'kelompokKWU' => $kwu,
            'kelompokPKL' => $pkl,
            'kelompokMP' => $kelompokMP,
        ]);

        //return view('pages.pesertadidik.kelulusan-peserta-didik');
    }
    /**
     * Show the form for creating the resource.
     */
    public function create(): never
    {
        abort(404);
    }

    /**
     * Store the newly created resource in storage.
     */
    public function store(Request $request): never
    {
        abort(404);
    }

    /**
     * Display the resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the resource in storage.
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the resource from storage.
     */
    public function destroy(): never
    {
        abort(404);
    }
}
