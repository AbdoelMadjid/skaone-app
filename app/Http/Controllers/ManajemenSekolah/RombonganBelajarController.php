<?php

namespace App\Http\Controllers\ManajemenSekolah;

use App\DataTables\ManajemenSekolah\RombonganBelajarDataTable;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenSekolah\RombonganBelajarRequest;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\ManajemenSekolah\WaliKelas;

class RombonganBelajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RombonganBelajarDataTable $rombonganBelajarDataTable)
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
        $tingkatOptions = [];
        return $rombonganBelajarDataTable->render('pages.manajemensekolah.rombongan-belajar', [
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'tahunAjaranAktif' => $tahunAjaranAktif->tahunajaran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pararelOptions = [];
        for ($i = 1; $i <= 7; $i++) {
            $pararelOptions[$i] = (string) $i; // Key and value both are the same, e.g., '1' => '1'
        }

        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $singkatanKK = KompetensiKeahlian::pluck('singkatan', 'singkatan')->toArray();
        // Filter only personil with status 'Guru'
        $waliKelas = PersonilSekolah::where('jenispersonil', 'Guru')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();
        return view('pages.manajemensekolah.rombongan-belajar-form', [
            'data' => new RombonganBelajar(),
            'action' => route('manajemensekolah.rombongan-belajar.store'),
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'singkatanKK' => $singkatanKK,
            'pararelOptions' => $pararelOptions,
            'waliKelas' => $waliKelas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RombonganBelajarRequest $request)
    {
        $rombonganBelajar = new RombonganBelajar($request->validated());
        $rombonganBelajar->save();

        // Retrieve the namalengkap from personil_sekolahs based on wali_kelas
        $waliKelasId = $request->input('wali_kelas');
        $personil = \App\Models\ManajemenSekolah\PersonilSekolah::where('id_personil', $waliKelasId)->first();

        // Save record to wali_kelas
        \App\Models\ManajemenSekolah\WaliKelas::updateOrCreate(
            [
                'tahunajaran' => $request->input('tahunajaran'),
                'rombel' => $request->input('rombel'),
                'kode_rombel' => $request->input('kode_rombel'),
            ],
            [
                'wali_kelas' => $waliKelasId,
                'namalengkap' => $personil ? $personil->namalengkap : null,
            ]
        );

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(RombonganBelajar $rombonganBelajar)
    {
        $pararelOptions = [];
        for ($i = 1; $i <= 7; $i++) {
            $pararelOptions[$i] = (string) $i; // Key and value both are the same, e.g., '1' => '1'
        }
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $singkatanKK = KompetensiKeahlian::pluck('singkatan', 'singkatan')->toArray();
        // Filter only personil with status 'Guru'
        $waliKelas = PersonilSekolah::where('jenispersonil', 'Guru')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();
        return view('pages.manajemensekolah.rombongan-belajar-form', [
            'data' => $rombonganBelajar,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'pararelOptions' => $pararelOptions,
            'singkatanKK' => $singkatanKK,
            'waliKelas' => $waliKelas,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RombonganBelajar $rombonganBelajar)
    {
        $pararelOptions = [];
        for ($i = 1; $i <= 7; $i++) {
            $pararelOptions[$i] = (string) $i; // Key and value both are the same, e.g., '1' => '1'
        }
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $singkatanKK = KompetensiKeahlian::pluck('singkatan', 'singkatan')->toArray();
        // Filter only personil with status 'Guru'
        $waliKelas = PersonilSekolah::where('jenispersonil', 'Guru')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();
        return view('pages.manajemensekolah.rombongan-belajar-form', [
            'data' => $rombonganBelajar,
            'action' => route('manajemensekolah.rombongan-belajar.update', $rombonganBelajar->id),
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'pararelOptions' => $pararelOptions,
            'singkatanKK' => $singkatanKK,
            'waliKelas' => $waliKelas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RombonganBelajarRequest $request, RombonganBelajar $rombonganBelajar)
    {
        $rombonganBelajar->fill($request->validated());
        $rombonganBelajar->save();
        // Update atau simpan data ke tabel wali_kelas
        WaliKelas::updateOrCreate(
            [
                'tahunajaran' => $rombonganBelajar->tahunajaran,
                'rombel' => $rombonganBelajar->rombel,
                'kode_rombel' => $rombonganBelajar->kode_rombel
            ],
            [
                'wali_kelas' => $rombonganBelajar->wali_kelas
            ]
        );
        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RombonganBelajar $rombonganBelajar)
    {
        $rombonganBelajar->delete();

        return responseSuccessDelete();
    }
}
