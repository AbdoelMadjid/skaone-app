<?php

namespace App\Http\Controllers\ManajemenSekolah;

use App\DataTables\ManajemenSekolah\WakilKepalaSekolahDataTable;
use App\Models\ManajemenSekolah\WakilKepalaSekolah;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenSekolah\WakilKepalaSekolahRequest;
use App\Models\AppSupport\Referensi;
use App\Models\ManajemenSekolah\PersonilSekolah;

class WakilKepalaSekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(WakilKepalaSekolahDataTable $wakilKepalaSekolahDataTable)
    {
        return $wakilKepalaSekolahDataTable->render('pages.manajemensekolah.jabatan.wakil-kepala-sekolah');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tampilTahun = [];
        $currentYear = (int) date('Y'); // Mendapatkan tahun saat ini

        for ($i = 2013; $i <= $currentYear; $i++) {
            $tampilTahun[$i] = (string) $i;
        }

        $jabatanWakasek = Referensi::where('jenis', 'Jabatan Wakasek')->pluck('data', 'data')->toArray();

        $personilOption = PersonilSekolah::where('jenispersonil', 'Guru')->where('aktif', 'Aktif')->orderBy('namalengkap')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        return view('pages.manajemensekolah.jabatan.wakil-kepala-sekolah-form', [
            'data' => new WakilKepalaSekolah(),
            'jabatanWakasek' => $jabatanWakasek,
            'personilOption' => $personilOption,
            'tampilTahun' => $tampilTahun,
            'action' => route('manajemensekolah.timmanajemen.wakil-kepala-sekolah.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(WakilKepalaSekolahRequest $request)
    {
        $wakilKepalaSekolah = new WakilKepalaSekolah($request->validated());
        $wakilKepalaSekolah->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(WakilKepalaSekolah $wakilKepalaSekolah)
    {
        $tampilTahun = [];
        $currentYear = (int) date('Y'); // Mendapatkan tahun saat ini

        for ($i = 2013; $i <= $currentYear; $i++) {
            $tampilTahun[$i] = (string) $i;
        }

        $jabatanWakasek = Referensi::where('jenis', 'Jabatan Wakasek')->pluck('data', 'data')->toArray();
        /* $namaWakasek = PersonilSekolah::where('jenispersonil', 'Guru')
            ->get()
            ->mapWithKeys(function ($personil) {
                $fullName = trim(
                    $personil->gelardepan . ' ' .
                        $personil->namalengkap . ' ' .
                        $personil->gelarbelakang
                );
                return [$fullName => $personil->namalengkap];
            }); */

        $personilOption = PersonilSekolah::where('jenispersonil', 'Guru')->where('aktif', 'Aktif')->orderBy('namalengkap')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        return view('pages.manajemensekolah.jabatan.wakil-kepala-sekolah-form', [
            'data' => $wakilKepalaSekolah,
            'jabatanWakasek' => $jabatanWakasek,
            'personilOption' => $personilOption,
            /*  'namaWakasek' => $namaWakasek, */
            'tampilTahun' => $tampilTahun,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WakilKepalaSekolah $wakilKepalaSekolah)
    {
        $tampilTahun = [];
        $currentYear = (int) date('Y'); // Mendapatkan tahun saat ini

        for ($i = 2013; $i <= $currentYear; $i++) {
            $tampilTahun[$i] = (string) $i;
        }

        $jabatanWakasek = Referensi::where('jenis', 'Jabatan Wakasek')->pluck('data', 'data')->toArray();

        $personilOption = PersonilSekolah::where('jenispersonil', 'Guru')->where('aktif', 'Aktif')->orderBy('namalengkap')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        return view('pages.manajemensekolah.jabatan.wakil-kepala-sekolah-form', [
            'data' => $wakilKepalaSekolah,
            'jabatanWakasek' => $jabatanWakasek,
            'personilOption' => $personilOption,
            'tampilTahun' => $tampilTahun,
            'action' => route('manajemensekolah.timmanajemen.wakil-kepala-sekolah.update', $wakilKepalaSekolah->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(WakilKepalaSekolahRequest $request, WakilKepalaSekolah $wakilKepalaSekolah)
    {
        $wakilKepalaSekolah->fill($request->validated());
        $wakilKepalaSekolah->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WakilKepalaSekolah $wakilKepalaSekolah)
    {
        $wakilKepalaSekolah->delete();

        return responseSuccessDelete();
    }
}
