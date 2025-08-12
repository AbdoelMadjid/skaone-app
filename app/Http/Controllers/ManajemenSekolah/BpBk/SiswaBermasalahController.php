<?php

namespace App\Http\Controllers\ManajemenSekolah\BpBk;

use App\DataTables\ManajemenSekolah\BpBk\SiswaBermasalahDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenSekolah\BpBk\BpBkSiswaBermasalahRequest;
use App\Models\AppSupport\Referensi;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\BpBk\BpBkSiswaBermasalah;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;

class SiswaBermasalahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SiswaBermasalahDataTable $siswaBermasalahDataTable)
    {
        return $siswaBermasalahDataTable->render('pages.manajemensekolah.bpbk.konseling-siswa-bermasalah');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $jenisKasus = Referensi::where('jenis', 'KasusSiswaBPBK')->pluck('data', 'data')->toArray();

        return view('pages.manajemensekolah.bpbk.konseling-siswa-bermasalah-form', [
            'data' => new BpBkSiswaBermasalah(),
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'jenisKasus' => $jenisKasus,
            'action' => route('bpbk.konseling.siswa-bermasalah.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BpBkSiswaBermasalahRequest $request)
    {
        $bpBkSiswaBermasalah = new BpBkSiswaBermasalah($request->validated());
        $bpBkSiswaBermasalah->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(BpBkSiswaBermasalah $siswa_bermasalah)
    {
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $jenisKasus = Referensi::where('jenis', 'KasusSiswaBPBK')->pluck('data', 'data')->toArray();

        return view('pages.manajemensekolah.bpbk.konseling-siswa-bermasalah-form', [
            'data' => $siswa_bermasalah,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'jenisKasus' => $jenisKasus,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BpBkSiswaBermasalah $siswa_bermasalah)
    {
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $jenisKasus = Referensi::where('jenis', 'KasusSiswaBPBK')->pluck('data', 'data')->toArray();

        return view('pages.manajemensekolah.bpbk.konseling-siswa-bermasalah-form', [
            'data' => $siswa_bermasalah,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'jenisKasus' => $jenisKasus,
            'action' => route('bpbk.konseling.siswa-bermasalah.update', $siswa_bermasalah->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BpBkSiswaBermasalahRequest $request, BpBkSiswaBermasalah $siswa_bermasalah)
    {
        $siswa_bermasalah->fill($request->validated());
        $siswa_bermasalah->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BpBkSiswaBermasalah $siswa_bermasalah)
    {
        $siswa_bermasalah->delete();

        return responseSuccessDelete();
    }

    public function getRombelByNis(Request $request)
    {
        $rombel = PesertaDidikRombel::where('nis', $request->nis)
            ->where('tahun_ajaran', $request->tahunajaran)
            ->value('rombel_nama');

        return response()->json([
            'rombel' => $rombel
        ]);
    }

    public function getPesertaDidikByTahun(Request $request)
    {
        $tahunajaran = $request->tahunajaran;

        $siswa = PesertaDidikRombel::with('pesertaDidik')
            ->where('tahun_ajaran', $tahunajaran)
            ->get()
            ->map(function ($item) {
                return [
                    'nis' => $item->nis,
                    'nama_lengkap' => $item->pesertaDidik->nama_lengkap ?? '-'
                ];
            });

        return response()->json($siswa);
    }
}
