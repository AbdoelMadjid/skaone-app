<?php

namespace App\Http\Controllers\Kurikulum\PerangkatUjian;

use App\DataTables\Kurikulum\PerangkatUjian\PanitiaUjianDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\PerangkatUjian\PanitiaUjianRequest;
use App\Models\AppSupport\Referensi;
use App\Models\Kurikulum\PerangkatUjian\IdentitasUjian;
use App\Models\Kurikulum\PerangkatUjian\PanitiaUjian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use Illuminate\Http\Request;

class PanitiaUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PanitiaUjianDataTable $panitiaUjianDataTable)
    {
        return $panitiaUjianDataTable->render('pages.kurikulum.perangkatujian.pelaksanaanujian.crud-panitia-ujian');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ujianAktif = IdentitasUjian::where('status', 'Aktif')->first();

        $personilOptions = PersonilSekolah::where('aktif', 'Aktif')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        $jabatanPanitia = Referensi::where('jenis', 'Panitia Ujian')->pluck('data', 'data')->toArray();

        return view('pages.kurikulum.perangkatujian.pelaksanaanujian.crud-panitia-ujian-form', [
            'data' => new PanitiaUjian(),
            'action' => route('kurikulum.perangkatujian.pelaksanaan-ujian.panitia-ujian.store'),
            'ujianAktif' => $ujianAktif,
            'personilOptions' => $personilOptions,
            'jabatanPanitia' => $jabatanPanitia,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PanitiaUjianRequest $request)
    {
        $panitiaUjian = new PanitiaUjian($request->validated());
        $panitiaUjian->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PanitiaUjian $panitiaUjian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PanitiaUjian $panitiaUjian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PanitiaUjian $panitiaUjian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PanitiaUjian $panitiaUjian)
    {
        //
    }

    public function getPersonilPanitia(Request $request)
    {
        $id = $request->input('id');

        $personil = PersonilSekolah::where('id_personil', $id)->first();

        if ($personil) {
            return response()->json([
                'nip' => $personil->nip,
                'nama_lengkap' => trim("{$personil->gelardepan} {$personil->namalengkap} {$personil->gelarbelakang}")
            ]);
        }

        return response()->json(['message' => 'Personil tidak ditemukan'], 404);
    }
}
