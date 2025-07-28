<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\DataTables\Kurikulum\DataKBM\JadwalMingguanDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\DataKBM\JadwalMingguanRequest;
use App\Models\Kurikulum\DataKBM\JadwalMingguan;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;

class JadwalMingguanController extends Controller
{
    public function index(JadwalMingguanDataTable $jadwalMingguanDataTable)
    {
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();
        return $jadwalMingguanDataTable->render('pages.kurikulum.datakbm.jadwal-mingguan', [
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
        ]);
    }

    public function create()
    {
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();
        $personilSekolah = PersonilSekolah::pluck('namalengkap', 'id_personil')->toArray();

        return view('pages.kurikulum.datakbm.jadwal-mingguan-form', [
            'data' => new JadwalMingguan(),
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'personilSekolah' => $personilSekolah,
            'action' => route('kurikulum.datakbm.jadwal-mingguan.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JadwalMingguanRequest $request)
    {
        $jadwalMingguan = new JadwalMingguan($request->validated());
        $jadwalMingguan->save();

        return responseSuccess();
    }


    /**
     * Display the specified resource.
     */
    public function show(JadwalMingguan $jadwalMingguan)
    {
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();
        $personilSekolah = PersonilSekolah::pluck('namalengkap', 'id_personil')->toArray();

        return view('pages.kurikulum.datakbm.jadwal-mingguan-form', [
            'data' => $jadwalMingguan,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'personilSekolah' => $personilSekolah,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalMingguan $jadwalMingguan)
    {
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();
        $personilSekolah = PersonilSekolah::pluck('namalengkap', 'id_personil')->toArray();

        return view('pages.kurikulum.datakbm.jadwal-mingguan-form', [
            'data' => $jadwalMingguan,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'personilSekolah' => $personilSekolah,
            'action' => route('kurikulum.datakbm.jadwal-mingguan.update', $jadwalMingguan->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JadwalMingguanRequest $request, JadwalMingguan $jadwalMingguan)
    {
        $jadwalMingguan->fill($request->validated());
        $jadwalMingguan->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalMingguan $jadwalMingguan)
    {
        $jadwalMingguan->delete();

        return responseSuccessDelete();
    }


    public function getRombels(Request $request)
    {
        $tahunajaran = $request->input('tahunajaran');
        $kodeKK = $request->input('kode_kk');
        $tingkat = $request->input('tingkat');

        $rombels = RombonganBelajar::where('tahunajaran', $tahunajaran)
            ->where('id_kk', $kodeKK)
            ->where('tingkat', $tingkat)
            ->pluck('rombel', 'kode_rombel');

        return response()->json($rombels);
    }

    public function getPersonil(Request $request)
    {
        $tahunajaran = $request->tahunajaran;
        $kode_kk = $request->kode_kk;
        $tingkat = $request->tingkat;
        $semester = $request->semester;
        $kode_rombel = $request->kode_rombel;

        // Ambil id_personil unik dari kbm_per_rombels
        $personilIds = KbmPerRombel::where([
            'tahunajaran' => $tahunajaran,
            'kode_kk' => $kode_kk,
            'tingkat' => $tingkat,
            'ganjilgenap' => $semester,
            'kode_rombel' => $kode_rombel,
        ])->pluck('id_personil')->unique();

        // Ambil nama personil berdasarkan id_personil dari PersonilSekolah
        $personils = PersonilSekolah::whereIn('id_personil', $personilIds)
            ->pluck('namalengkap', 'id_personil');

        return response()->json($personils);
    }

    public function getMapelByPersonil(Request $request)
    {
        $mapel = KbmPerRombel::where('tahunajaran', $request->tahunajaran)
            ->where('kode_kk', $request->kode_kk)
            ->where('tingkat', $request->tingkat)
            ->where('ganjilgenap', $request->semester)
            ->where('kode_rombel', $request->kode_rombel)
            ->where('id_personil', $request->id_personil)
            ->select('kode_mapel_rombel', 'mata_pelajaran')
            ->get();

        return response()->json($mapel);
    }
}
