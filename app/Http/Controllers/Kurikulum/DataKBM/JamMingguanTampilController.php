<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\JadwalMingguan;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;

class JamMingguanTampilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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

        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();

        return view('pages.kurikulum.datakbm.jadwal-mingguan-tampil', [
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
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
    public function simpanJadwal(Request $request)
    {
        $request->validate([
            'kode_rombel' => 'required',
            'tahunajaran' => 'required',
            'semester' => 'required',
            'jam_ke' => 'required|integer',
            'hari' => 'required|string',
            'id_personil' => 'required|exists:personil_sekolahs,id_personil',
            'kode_mapel_rombel' => 'required|string|max:100',
        ]);

        $jadwal = JadwalMingguan::updateOrCreate(
            [
                'kode_rombel' => $request->kode_rombel,
                'tahunajaran' => $request->tahunajaran,
                'semester' => $request->semester,
                'jam_ke' => $request->jam_ke,
                'hari' => $request->hari,
            ],
            [
                'id_personil' => $request->id_personil,
                'mata_pelajaran' => $request->kode_mapel_rombel,
            ]
        );

        return redirect()->back()->with('success', 'Jadwal berhasil disimpan.');
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
