<?php

namespace App\Http\Controllers\Kurikulum\DokumenSiswa;

use App\DataTables\Kurikulum\DokumenSiswa\RaporPklDataTable;
use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RaporPklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RaporPklDataTable $raportPklDataTable)
    {
        $angkaSemester = [];
        for ($i = 1; $i <= 6; $i++) {
            $angkaSemester[$i] = (string) $i;
        }

        // Ambil tahun ajaran yang aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')
            ->with(['semesters' => function ($query) {
                $query->where('status', 'Aktif');
            }])
            ->first();

        // Pastikan tahun ajaran aktif ada sebelum melanjutkan
        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();

        return $raportPklDataTable->render('pages.kurikulum.dokumensiswa.rapor-pkl', [
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'angkaSemester' => $angkaSemester,
            'tahunAjaranAktif' => $tahunAjaranAktif->tahunajaran,
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
    public function show(string $nis)
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

    public function showRaporPKL($nis)
    {
        $data = DB::table('penempatan_prakerins')
            ->select(
                'penempatan_prakerins.tahunajaran',
                'penempatan_prakerins.kode_kk',
                'kompetensi_keahlians.nama_kk',
                'program_keahlians.nama_pk',
                'peserta_didiks.nis',
                'peserta_didiks.nisn',
                'peserta_didiks.nama_lengkap',
                'peserta_didik_rombels.rombel_nama AS rombel',

                // Perusahaan tempat PKL
                'perusahaans.nama AS nama_perusahaan',
                'perusahaans.alamat AS alamat_perusahaan',
                'perusahaans.jabatan AS jabatan_pembimbing',
                'perusahaans.nama_pembimbing AS nama_pembimbing',
                'perusahaans.nip AS nip_pembimbing',
                'perusahaans.nidn AS nidn_pembimbing',

                // Pembimbing dari sekolah
                'personil_sekolahs.nip',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang',

                // Tambahan: Wali Kelas
                'personil_wali.nip AS wali_nip',
                'personil_wali.gelardepan AS wali_gelardepan',
                'personil_wali.namalengkap AS wali_namalengkap',
                'personil_wali.gelarbelakang AS wali_gelarbelakang'
            )
            ->join('kompetensi_keahlians', 'penempatan_prakerins.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->join('program_keahlians', 'kompetensi_keahlians.id_pk', '=', 'program_keahlians.idpk')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->join('pembimbing_prakerins', 'penempatan_prakerins.id', '=', 'pembimbing_prakerins.id_penempatan')
            ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')

            // Tambahan untuk relasi wali kelas
            ->leftJoin('wali_kelas', function ($join) {
                $join->on('peserta_didik_rombels.rombel_kode', '=', 'wali_kelas.kode_rombel')
                    ->on('penempatan_prakerins.tahunajaran', '=', 'wali_kelas.tahunajaran');
            })
            ->leftJoin('personil_sekolahs as personil_wali', 'wali_kelas.wali_kelas', '=', 'personil_wali.id_personil')

            ->where('peserta_didiks.nis', $nis)
            ->first();

        $nilaiPrakerin = DB::table('nilai_prakerin')
            ->where('nis', $nis)
            ->first();

        $kehadiran = DB::table('absensi_siswa_pkls')
            ->select('status', DB::raw('count(*) as total'))
            ->where('nis', $nis)
            ->whereIn('status', ['SAKIT', 'IZIN', 'TANPA KETERANGAN'])
            ->groupBy('status')
            ->pluck('total', 'status');

        return view('pages.kurikulum.dokumensiswa.rapor-pkl-tampil', [
            'data' => $data,
            'nilaiPrakerin' => $nilaiPrakerin,
            'kehadiran' => $kehadiran,
        ]);
        //return view('pages.kurikulum.dokumensiswa.rapor-pkl-tampil', compact('data', 'nilaiPrakerin'));
    }
}
