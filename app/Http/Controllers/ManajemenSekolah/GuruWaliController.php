<?php

namespace App\Http\Controllers\ManajemenSekolah;

use App\DataTables\ManajemenSekolah\GuruWaliSiswaDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenSekolah\GuruWaliSiswaRequest;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\GuruWaliSiswa;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;

class GuruWaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GuruWaliSiswaDataTable $guruWaliSiswaDataTable)
    {
        return $guruWaliSiswaDataTable->render('pages.manajemensekolah.guruwali.data-guru-wali');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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

        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        // Ambil semua NIS yang sudah punya wali
        $existingNis = GuruWaliSiswa::pluck('nis')->toArray();

        // Ambil siswa berdasarkan tahun ajaran aktif di tabel PesertaDidikRombel
        $siswaGuruWaliOptions = PesertaDidikRombel::query()
            ->where('peserta_didik_rombels.tahun_ajaran', $tahunAjaranAktif->tahunajaran)
            ->whereNotIn('peserta_didik_rombels.nis', $existingNis)
            ->join('peserta_didiks as pd', 'peserta_didik_rombels.nis', '=', 'pd.nis')
            ->join('kompetensi_keahlians as kk', 'peserta_didik_rombels.kode_kk', '=', 'kk.idkk')
            ->orderBy('kk.nama_kk') // urut berdasarkan nama kompetensi keahlian
            ->orderBy('peserta_didik_rombels.rombel_nama')
            ->orderBy('pd.nama_lengkap')
            ->get([
                'peserta_didik_rombels.nis',
                'pd.jenis_kelamin',
                'pd.nama_lengkap',
                'peserta_didik_rombels.rombel_nama',
                'kk.nama_kk'
            ])
            ->groupBy('nama_kk')
            ->map(function ($group) {
                return $group->mapWithKeys(function ($item) {
                    return [
                        $item->nis => "{$item->nis} - {$item->nama_lengkap} ({$item->rombel_nama}) - {$item->jenis_kelamin}"
                    ];
                });
            })
            ->toArray();

        $personilOption = PersonilSekolah::where('jenispersonil', 'Guru')->where('aktif', 'Aktif')->orderBy('namalengkap')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        return view('pages.manajemensekolah.guruwali.data-guru-wali-form', [
            'data' => new GuruWaliSiswa(),
            'siswaGuruWaliOptions' => $siswaGuruWaliOptions,
            'personilOption' => $personilOption,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'tahunAjaranAktif' => $tahunAjaranAktif->tahunajaran,
            'action' => route('manajemensekolah.data-guru-wali.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GuruWaliSiswaRequest $request)
    {
        $validated = $request->validated();

        foreach ($validated['nis'] as $nis) {
            GuruWaliSiswa::create([
                'tahunajaran' => $validated['tahunajaran'],
                'id_personil' => $validated['id_personil'],
                'nis'         => $nis,
                'status'      => $validated['status'],
            ]);
        }

        return responseSuccess('Data siswa guru wali berhasil disimpan.');
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
    public function destroy(GuruWaliSiswa $data_guru_wali)
    {
        $data_guru_wali->delete();

        return responseSuccessDelete();
    }

    public function getPesertaDidik(Request $request)
    {
        $tahunajaran = $request->tahun_ajaran;

        // Ambil NIS yang sudah punya wali
        $existingNis = GuruWaliSiswa::pluck('nis')->toArray();

        // Ambil siswa lengkap dengan rombel dan nama
        $siswa = PesertaDidikRombel::query()
            ->join('rombongan_belajars as rb', function ($join) {
                $join->on('peserta_didik_rombels.rombel_kode', '=', 'rb.kode_rombel')
                    ->on('peserta_didik_rombels.tahun_ajaran', '=', 'rb.tahunajaran');
            })
            ->join('peserta_didiks as pd', 'peserta_didik_rombels.nis', '=', 'pd.nis')
            ->where('peserta_didik_rombels.tahun_ajaran', $tahunajaran)
            ->whereNotIn('peserta_didik_rombels.nis', $existingNis)
            ->orderBy('rb.kode_kk')
            ->orderBy('pd.nama_lengkap')
            ->get([
                'rb.kode_kk',
                'peserta_didik_rombels.nis',
                'pd.nama_lengkap',
                'peserta_didik_rombels.rombel_nama'
            ])
            ->groupBy('kode_kk');

        return response()->json($siswa);
    }
}
