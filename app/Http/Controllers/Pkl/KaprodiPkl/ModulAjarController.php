<?php

namespace App\Http\Controllers\Pkl\KaprodiPkl;

use App\Http\Controllers\Controller;
use App\DataTables\Pkl\KaprodiPkl\ModulAjarDataTable;
use App\Http\Requests\Pkl\KaprodiPkl\ModulAjarRequest;
use App\Models\Pkl\KaprodiPkl\ModulAjar;
use App\Models\Kurikulum\DataKBM\CapaianPembelajaran;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ModulAjarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ModulAjarDataTable $modulAjarDataTable)
    {
        return $modulAjarDataTable->render('pages.pkl.kaprodipkl.modul-ajar');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch the active year for the dropdown
        $activeTahunAjaran = TahunAjaran::where('status', 'Aktif')->first();

        // Set the active tahun ajaran options
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        // Create a new PenempatanPrakerin instance
        $data = new ModulAjar();
        $data->tahunajaran = $activeTahunAjaran ? $activeTahunAjaran->tahunajaran : null; // Set default to active year

        // Kompetensi Keahlian options without changes
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();

        $elemenCPOptions = CapaianPembelajaran::where('nama_matapelajaran', 'Praktek Kerja Industri')
            ->pluck('element', 'kode_cp')
            ->toArray();

        $nomorOptions = [];
        for ($i = 1; $i <= 10; $i++) {
            $nomorOptions[$i] = (string) $i; // Key and value both are the same, e.g., '1' => '1'
        }

        return view('pages.pkl.kaprodipkl.modul-ajar-form', [
            'data' => $data,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'nomorOptions' => $nomorOptions,
            'elemenCPOptions' => $elemenCPOptions,
            'action' => route('kaprodipkl.modul-ajar.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ModulAjarRequest $request)
    {
        $modulAjar = new ModulAjar($request->validated());
        $modulAjar->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(ModulAjar $modulAjar)
    {
        // Fetch the active year for the dropdown
        $activeTahunAjaran = TahunAjaran::where('status', 'Aktif')->first();

        // Set the active tahun ajaran options
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        // Create a new PenempatanPrakerin instance
        $data = new ModulAjar();
        $data->tahunajaran = $activeTahunAjaran ? $activeTahunAjaran->tahunajaran : null; // Set default to active year

        // Kompetensi Keahlian options without changes
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();

        $elemenCPOptions = CapaianPembelajaran::where('nama_matapelajaran', 'Praktek Kerja Industri')
            ->pluck('element', 'kode_cp')
            ->toArray();

        $nomorOptions = [];
        for ($i = 1; $i <= 10; $i++) {
            $nomorOptions[$i] = (string) $i; // Key and value both are the same, e.g., '1' => '1'
        }

        return view('pages.pkl.kaprodipkl.modul-ajar-form', [
            'data' => $modulAjar,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'nomorOptions' => $nomorOptions,
            'elemenCPOptions' => $elemenCPOptions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ModulAjar $modulAjar)
    {
        // Fetch the active year for the dropdown
        $activeTahunAjaran = TahunAjaran::where('status', 'Aktif')->first();

        // Set the active tahun ajaran options
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        // Create a new PenempatanPrakerin instance
        $data = new ModulAjar();
        $data->tahunajaran = $activeTahunAjaran ? $activeTahunAjaran->tahunajaran : null; // Set default to active year

        // Kompetensi Keahlian options without changes
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();

        $elemenCPOptions = CapaianPembelajaran::where('nama_matapelajaran', 'Praktek Kerja Industri')
            ->pluck('element', 'kode_cp')
            ->toArray();

        $nomorOptions = [];
        for ($i = 1; $i <= 10; $i++) {
            $nomorOptions[$i] = (string) $i; // Key and value both are the same, e.g., '1' => '1'
        }

        return view('pages.pkl.kaprodipkl.modul-ajar-form', [
            'data' => $modulAjar,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'nomorOptions' => $nomorOptions,
            'elemenCPOptions' => $elemenCPOptions,
            'action' => route('kaprodipkl.modul-ajar.update', $modulAjar->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ModulAjarRequest $request, ModulAjar $modulAjar)
    {
        $modulAjar->fill($request->validated());
        $modulAjar->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ModulAjar $modulAjar)
    {
        $modulAjar->delete();

        return responseSuccessDelete();
    }
}
