<?php

namespace App\Http\Controllers\ManajemenSekolah;

use App\DataTables\ManajemenSekolah\JabatanLainDataTable;
use App\Models\ManajemenSekolah\JabatanLain;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenSekolah\JabatanLainRequest;
use App\Models\AppSupport\Referensi;
use App\Models\ManajemenSekolah\PersonilSekolah;

class JabatanLainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JabatanLainDataTable $jabatanLainDataTable)
    {
        return $jabatanLainDataTable->render('pages.manajemensekolah.jabatan.jabatan-lain');
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

        $jenisJabatan = Referensi::where('jenis', 'Jabatan')->pluck('data', 'data')->toArray();

        // Prepare concatenated names for select options
        $namaPejabat = PersonilSekolah::where('jenispersonil', 'Guru')
            ->get()
            ->mapWithKeys(function ($personil) {
                $fullName = trim(
                    $personil->gelardepan . ' ' .
                        $personil->namalengkap . ' ' .
                        $personil->gelarbelakang
                );
                return [$fullName => $personil->namalengkap];
            });

        return view('pages.manajemensekolah.jabatan.jabatan-lain-form', [
            'data' => new JabatanLain(),
            'jenisJabatan' => $jenisJabatan,
            'namaPejabat' => $namaPejabat,
            'tampilTahun' => $tampilTahun,
            'action' => route('manajemensekolah.timmanajemen.jabatan-lain.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JabatanLainRequest $request)
    {
        $jabatanLain = new JabatanLain($request->validated());
        $jabatanLain->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(JabatanLain $jabatanLain)
    {
        $tampilTahun = [];
        $currentYear = (int) date('Y'); // Mendapatkan tahun saat ini

        for ($i = 2013; $i <= $currentYear; $i++) {
            $tampilTahun[$i] = (string) $i;
        }

        $jenisJabatan = Referensi::where('jenis', 'Jabatan')->pluck('data', 'data')->toArray();

        // Prepare concatenated names for select options
        $namaPejabat = PersonilSekolah::where('jenispersonil', 'Guru')
            ->get()
            ->mapWithKeys(function ($personil) {
                $fullName = trim(
                    $personil->gelardepan . ' ' .
                        $personil->namalengkap . ' ' .
                        $personil->gelarbelakang
                );
                return [$fullName => $personil->namalengkap];
            });

        return view('pages.manajemensekolah.jabatan.jabatan-lain-form', [
            'data' => $jabatanLain,
            'jenisJabatan' => $jenisJabatan,
            'namaPejabat' => $namaPejabat,
            'tampilTahun' => $tampilTahun,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JabatanLain $jabatanLain)
    {
        $tampilTahun = [];
        $currentYear = (int) date('Y'); // Mendapatkan tahun saat ini

        for ($i = 2013; $i <= $currentYear; $i++) {
            $tampilTahun[$i] = (string) $i;
        }

        $jenisJabatan = Referensi::where('jenis', 'Jabatan')->pluck('data', 'data')->toArray();

        // Prepare concatenated names for select options
        $namaPejabat = PersonilSekolah::where('jenispersonil', 'Guru')
            ->get()
            ->mapWithKeys(function ($personil) {
                $fullName = trim(
                    $personil->gelardepan . ' ' .
                        $personil->namalengkap . ' ' .
                        $personil->gelarbelakang
                );
                return [$fullName => $personil->namalengkap];
            });

        return view('pages.manajemensekolah.jabatan.jabatan-lain-form', [
            'data' => $jabatanLain,
            'jenisJabatan' => $jenisJabatan,
            'namaPejabat' => $namaPejabat,
            'tampilTahun' => $tampilTahun,
            'action' => route('manajemensekolah.timmanajemen.jabatan-lain.update', $jabatanLain->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JabatanLainRequest $request, JabatanLain $jabatanLain)
    {
        $jabatanLain->fill($request->validated());
        $jabatanLain->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JabatanLain $jabatanLain)
    {
        $jabatanLain->delete();

        return responseSuccessDelete();
    }
}
