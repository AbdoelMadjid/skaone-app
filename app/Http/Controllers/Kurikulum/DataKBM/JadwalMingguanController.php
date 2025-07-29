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

        return $jadwalMingguanDataTable->render('pages.kurikulum.datakbm.jadwal-mingguan', [
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'tahunAjaranAktif' => $tahunAjaranAktif->tahunajaran,
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
        // Ambil data tervalidasi, tapi pisahkan jam_ke karena akan dipecah
        $validated = $request->validated();
        $data = collect($validated)->except('jam_ke')->toArray();

        foreach ($validated['jam_ke'] as $jam) {
            JadwalMingguan::create([
                ...$data,
                'jam_ke' => $jam,
            ]);
        }

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

        $jamKeChecked = JadwalMingguan::where('kode_rombel', $jadwalMingguan->kode_rombel)
            ->where('hari', $jadwalMingguan->hari)
            ->where('mata_pelajaran', $jadwalMingguan->mata_pelajaran)
            ->where('id_personil', $jadwalMingguan->id_personil)
            ->pluck('jam_ke') // ambil semua jam_ke yang relevan
            ->toArray();

        return view('pages.kurikulum.datakbm.jadwal-mingguan-form', [
            'data' => $jadwalMingguan,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'personilSekolah' => $personilSekolah,
            'dataJamKe' => $jamKeChecked,
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

    public function cekJamKe(Request $request)
    {
        $jadwal = JadwalMingguan::where([
            'tahunajaran' => $request->tahunajaran,
            'semester' => $request->semester,
            'kode_kk' => $request->kode_kk,
            'tingkat' => $request->tingkat,
            'kode_rombel' => $request->kode_rombel,
            'hari' => $request->hari
        ])->pluck('jam_ke');

        return response()->json($jadwal);
    }

    public function hapusJamTerpilih(Request $request)
    {
        $ids = $request->ids;
        if (is_array($ids) && !empty($ids)) {
            JadwalMingguan::whereIn('id', $ids)->delete();
            return response()->json(['success' => 'Data berhasil dihapus!']);
        }

        return response()->json(['error' => 'Tidak ada data yang dihapus!'], 400);
    }
}
