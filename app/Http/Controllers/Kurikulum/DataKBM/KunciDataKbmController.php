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

        // Cek apakah ada tahun ajaran aktif
        $tahunAjaranAktif = TahunAjaran::aktif()->first();

        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Cek apakah ada semester aktif untuk tahun ajaran tersebut
        $semester = $tahunAjaranAktif->semesters()->where('status', 'Aktif')->first();

        if (!$semester) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        // Ambil semua opsi tahun ajaran
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        // Cek apakah ada data pada KunciDataKbm untuk id_personil
        $dataPilCR = KunciDataKbm::where('id_personil', $personal_id)->first();

        // Jika ada data di KunciDataKbm, ambil data dari situ
        if ($dataPilCR) {
            $tahunajaran = $dataPilCR->tahunajaran;
            $ganjilgenap = $dataPilCR->ganjilgenap;
        } else {
            // Jika tidak ada data, ambil data tahun ajaran dan semester aktif
            $tahunajaran = $tahunAjaranAktif->tahunajaran;
            $ganjilgenap = $semester->semester;  // Menggunakan nilai semester dari data semester aktif
        }

        return $kunciDataKBMDataTable->render('pages.kurikulum.datakbm.kunci-data-kbm', [
            'personal_id' => $personal_id,
            'tahunAjaranAktif' => $tahunAjaranAktif,
            'semester' => $semester,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'dataPilCR' => $dataPilCR,
            'tahunajaran' => $tahunajaran,
            'ganjilgenap' => $ganjilgenap,
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
        // Validasi input data
        $request->validate([
            'id_personil' => 'required|exists:users,personal_id', // Pastikan id_personil valid
            'tahunajaran' => 'required',
            'ganjilgenap' => 'required',
        ]);

        // Cek apakah data sudah ada
        $existingData = KunciDataKbm::where('id_personil', $request->id_personil)->first();

        if ($existingData) {
            // Jika sudah ada, kembalikan response error
            return back()->with('error', 'Data sudah ada.');
        }

        // Simpan data baru
        $newData = new KunciDataKbm();
        $newData->id_personil = $request->id_personil;
        $newData->tahunajaran = $request->tahunajaran;
        $newData->ganjilgenap = $request->ganjilgenap;
        $newData->save();

        // Redirect atau kembali dengan pesan sukses
        return redirect()->route('kurikulum.datakbm.kunci-data-kbm.index')->with('success', 'Data berhasil ditambahkan.');
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
