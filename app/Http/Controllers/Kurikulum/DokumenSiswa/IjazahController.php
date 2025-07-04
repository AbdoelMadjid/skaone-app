<?php

namespace App\Http\Controllers\Kurikulum\DokumenSiswa;

use App\DataTables\Kurikulum\DokumenSiswa\IjazahDataTable;
use App\Http\Controllers\Controller;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\PesertaDidik\KelulusanPesertaDidik;
use Illuminate\Http\Request;

class IjazahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IjazahDataTable $ijazahDataTable)
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

        return $ijazahDataTable->render('pages.kurikulum.dokumensiswa.ijazah', [
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

    public function updateKelulusan(Request $request)
    {
        $validated = $request->validate([
            'nis' => 'required|string',
            'tahun_ajaran' => 'required|string',
            'status_kelulusan' => 'nullable|string|in:LULUS,LULUS BERSYARAT',
            'no_ijazah' => 'nullable|string|max:100',
        ]);

        $dataToUpdate = [];

        if ($request->filled('status_kelulusan')) {
            $dataToUpdate['status_kelulusan'] = $request->status_kelulusan;
        }

        if ($request->filled('no_ijazah')) {
            $dataToUpdate['no_ijazah'] = $request->no_ijazah;
        }

        KelulusanPesertaDidik::updateOrCreate(
            [
                'nis' => $validated['nis'],
                'tahun_ajaran' => $validated['tahun_ajaran']
            ],
            $dataToUpdate
        );

        return response()->json(['success' => true, 'message' => 'Data kelulusan diperbarui.']);
    }
}
