<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\DataTables\Kurikulum\DataKBM\JadwalMingguanDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\DataKBM\JadwalMingguanRequest;
use App\Models\Kurikulum\DataKBM\JadwalMingguan;
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
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();
        $personilSekolah = PersonilSekolah::pluck('namalengkap', 'id_personil')->toArray();

        return view('pages.kurikulum.datakbm.jadwal-mingguan-form', [
            'data' => new JadwalMingguan(),
            'tahunAjaranOptions' => $tahunAjaranOptions,
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
        $kbmPerRombel = new JadwalMingguan($request->validated());
        $kbmPerRombel->save();

        return responseSuccess();
    }
}
