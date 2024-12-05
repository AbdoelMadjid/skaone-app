<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\DataTables\Kurikulum\DataKBM\MataPelajaranPerJurusanDataTable;
use App\Models\Kurikulum\DataKBM\MataPelajaranPerJurusan;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\DataKBM\MataPelajaranPerJurusanRequest;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;

class MataPelajaranPerJurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MataPelajaranPerJurusanDataTable $mataPelajaranPerJurusanDataTable)
    {
        $angkaSemester = [];
        for ($i = 1; $i <= 6; $i++) {
            $angkaSemester[$i] = (string) $i;
        }
        $angkaKKM = [];
        for ($i = 60; $i <= 95; $i++) {
            $angkaKKM[$i] = (string) $i;
        }
        // Ambil data untuk dropdown jenis personil
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        return $mataPelajaranPerJurusanDataTable->render('pages.kurikulum.datakbm.mata-pelajaran-perjurusan', [
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'tahunAjaran' => $tahunAjaran,
            'angkaSemester' => $angkaSemester,
            'angkaKKM' => $angkaKKM,
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
    public function store(MataPelajaranPerJurusanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MataPelajaranPerJurusan $mataPelajaranPerJurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataPelajaranPerJurusan $mataPelajaranPerJurusan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MataPelajaranPerJurusanRequest $request, MataPelajaranPerJurusan $mataPelajaranPerJurusan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataPelajaranPerJurusan $mataPelajaranPerJurusan)
    {
        //
    }

    // Method untuk distribusi siswa yang di ceklist ke rombel
    public function simpandistribusi(Request $request)
    {
        // Validasi input
        $request->validate([
            'selected_mapel_ids' => 'required|string',
            'tahunajaran' => 'required',
            'kode_kk' => 'required',
            'tingkat' => 'required',
            'ganjilgenap' => 'required',
            'semester' => 'required',
            'kode_rombel' => 'required|array', // Change to array
            'rombel' => 'required|array',      // Change to array
            'kkm' => 'required',
            'id_personil' => 'nullable',
        ]);

        // Ambil daftar ID mata pelajaran yang dipilih
        $selectedMapelIds = explode(',', $request->input('selected_mapel_ids'));

        // Data lainnya dari form
        $tahunAjaran = $request->input('tahunajaran');
        $kodeKK = $request->input('kode_kk');
        $tingkat = $request->input('tingkat');
        $ganjilGenap = $request->input('ganjilgenap');
        $seMester = $request->input('semester');
        $kodeRombelArray = $request->input('kode_rombel'); // Get array of selected rombel
        $romBelArray = $request->input('rombel');         // Get array of selected rombel names
        $kKm = $request->input('kkm');
        $idPersonil = $request->input('id_personil') ?? null; // Set to null if empty

        // Loop through each selected rombel
        foreach ($kodeRombelArray as $index => $kodeRombel) {
            // Get the corresponding rombel name from the array
            $romBel = $romBelArray[$index] ?? null; // Ensure this exists

            // Loop and save each mata pelajaran to the kbm_per_rombel table
            foreach ($selectedMapelIds as $mapelId) {
                $mataPelajaran = MataPelajaranPerJurusan::find($mapelId);

                if ($mataPelajaran) {
                    KbmPerRombel::create([
                        'kode_mapel_rombel' => $mataPelajaran->kode_mapel . '-' . $kodeRombel,
                        'tahunajaran' => $tahunAjaran,
                        'kode_kk' => $kodeKK,
                        'tingkat' => $tingkat,
                        'ganjilgenap' => $ganjilGenap,
                        'semester' => $seMester,
                        'kode_rombel' => $kodeRombel,
                        'rombel' => $romBel,
                        'kel_mapel' => $mataPelajaran->kel_mapel,
                        'kode_mapel' => $mataPelajaran->kode_mapel,
                        'mata_pelajaran' => $mataPelajaran->mata_pelajaran,
                        'kkm' => $kKm,
                        'id_personil' => $idPersonil,
                    ]);
                }
            }
        }

        // Redirect atau response sesuai kebutuhan
        return redirect()->route('kurikulum.datakbm.kbm-per-rombel.index')
            ->with('success', 'Mapel berhasil didistribusikan ke per rombel.');
    }
}
