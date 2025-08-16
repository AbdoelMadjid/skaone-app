<?php

namespace App\Http\Controllers\ManajemenSekolah;

use App\DataTables\ManajemenSekolah\KetuaProgramStudiDataTable;
use App\Models\ManajemenSekolah\KetuaProgramStudi;
use App\Http\Controllers\Controller;
use App\Http\Requests\ManajemenSekolah\KetuaProgramStudiRequest;
use App\Models\AppSupport\Referensi;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;

class KetuaProgramStudiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KetuaProgramStudiDataTable $ketuaProgramStudi)
    {
        return $ketuaProgramStudi->render('pages.manajemensekolah.jabatan.ketua-program-studi');
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

        $jabatanKaprog = Referensi::where('jenis', 'Jabatan')->pluck('data', 'data')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk');

        // Prepare concatenated names for select options
        $namaKaprodi = PersonilSekolah::where('jenispersonil', 'Guru')->where('aktif', 'Aktif')
            ->get()
            ->mapWithKeys(function ($personil) {
                $fullName = trim(
                    $personil->gelardepan . ' ' .
                        $personil->namalengkap . ' ' .
                        $personil->gelarbelakang
                );
                return [$fullName => $personil->namalengkap];
            });

        $personilOption = PersonilSekolah::where('jenispersonil', 'Guru')->where('aktif', 'Aktif')->orderBy('namalengkap')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        return view('pages.manajemensekolah.jabatan.ketua-program-studi-form', [
            'data' => new KetuaProgramStudi(),
            'jabatanKaprog' => $jabatanKaprog,
            'personilOption' => $personilOption,
            'namaKaprodi' => $namaKaprodi,
            'tampilTahun' => $tampilTahun,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'action' => route('manajemensekolah.timmanajemen.ketua-program-studi.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KetuaProgramStudiRequest $request)
    {
        $ketuaProgramStudi = new KetuaProgramStudi($request->validated());
        $ketuaProgramStudi->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(KetuaProgramStudi $ketuaProgramStudi)
    {
        $tampilTahun = [];
        $currentYear = (int) date('Y'); // Mendapatkan tahun saat ini

        for ($i = 2013; $i <= $currentYear; $i++) {
            $tampilTahun[$i] = (string) $i;
        }

        $jabatanKaprog = Referensi::where('jenis', 'Jabatan')->pluck('data', 'data')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk');

        // Prepare concatenated names for select options
        $namaKaprodi = PersonilSekolah::where('jenispersonil', 'Guru')
            ->get()
            ->mapWithKeys(function ($personil) {
                $fullName = trim(
                    $personil->gelardepan . ' ' .
                        $personil->namalengkap . ' ' .
                        $personil->gelarbelakang
                );
                return [$fullName => $personil->namalengkap];
            });

        $personilOption = PersonilSekolah::where('jenispersonil', 'Guru')->where('aktif', 'Aktif')->orderBy('namalengkap')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        return view('pages.manajemensekolah.jabatan.ketua-program-studi-form', [
            'data' => $ketuaProgramStudi,
            'jabatanKaprog' => $jabatanKaprog,
            'personilOption' => $personilOption,
            'namaKaprodi' => $namaKaprodi,
            'tampilTahun' => $tampilTahun,
            'kompetensiKeahlian' => $kompetensiKeahlian,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KetuaProgramStudi $ketuaProgramStudi)
    {
        $tampilTahun = [];
        $currentYear = (int) date('Y'); // Mendapatkan tahun saat ini

        for ($i = 2013; $i <= $currentYear; $i++) {
            $tampilTahun[$i] = (string) $i;
        }

        $jabatanKaprog = Referensi::where('jenis', 'Jabatan')->pluck('data', 'data')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk');

        // Prepare concatenated names for select options
        $namaKaprodi = PersonilSekolah::where('jenispersonil', 'Guru')
            ->get()
            ->mapWithKeys(function ($personil) {
                $fullName = trim(
                    $personil->gelardepan . ' ' .
                        $personil->namalengkap . ' ' .
                        $personil->gelarbelakang
                );
                return [$fullName => $personil->namalengkap];
            });

        $personilOption = PersonilSekolah::where('jenispersonil', 'Guru')->where('aktif', 'Aktif')->orderBy('namalengkap')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        return view('pages.manajemensekolah.jabatan.ketua-program-studi-form', [
            'data' => $ketuaProgramStudi,
            'jabatanKaprog' => $jabatanKaprog,
            'personilOption' => $personilOption,
            'namaKaprodi' => $namaKaprodi,
            'tampilTahun' => $tampilTahun,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'action' => route('manajemensekolah.timmanajemen.ketua-program-studi.update', $ketuaProgramStudi->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KetuaProgramStudiRequest $request, KetuaProgramStudi $ketuaProgramStudi)
    {
        $ketuaProgramStudi->fill($request->validated());
        $ketuaProgramStudi->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KetuaProgramStudi $ketuaProgramStudi)
    {
        $ketuaProgramStudi->delete();

        return responseSuccessDelete();
    }
}
