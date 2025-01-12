<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\DataTables\Kurikulum\DataKBM\KunciDataKBMDataTable;
use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\KunciDataKbm;
use App\Models\Kurikulum\DokumenSiswa\PilihCetakRapor;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\PesertaDidik;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KunciDataKbmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KunciDataKBMDataTable $kunciDataKBMDataTable)
    {
        $user = Auth::user();
        $personal_id = $user->personal_id;

        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();

        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        $semester = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
            ->first();

        if (!$semester) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        $dataPilCR = KunciDataKbm::where('id_personil', $personal_id)->first();

        return $kunciDataKBMDataTable->render('pages.kurikulum.datakbm.kunci-data-kbm', [
            'personal_id' => $personal_id,
            'tahunAjaranAktif' => $tahunAjaranAktif,
            'semester' => $semester,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'dataPilCR' => $dataPilCR,
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

    public function updateKunciData(Request $request)
    {
        $user = Auth::user();

        // Data yang diterima dari permintaan
        $dataToUpdate = $request->only(['tahunajaran', 'ganjilgenap', 'semester', 'kode_kk', 'tingkat', 'kode_rombel']);

        // Perbarui data di tabel `kunci_data_kbm`
        $updated = KunciDataKbm::where('id_personil', $user->personal_id)->update($dataToUpdate);

        if ($updated) {
            return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
        } else {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan untuk diperbarui']);
        }
    }
}
