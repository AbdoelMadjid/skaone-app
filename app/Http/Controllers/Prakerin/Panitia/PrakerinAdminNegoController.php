<?php

namespace App\Http\Controllers\Prakerin\Panitia;

use App\DataTables\Prakerin\Panitia\PrakerinAdminNegoDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Prakerin\Panitia\PrakerinAdminNegoRequest;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\Prakerin\Panitia\PrakerinAdminNego;
use App\Models\Prakerin\Panitia\PrakerinNegosiator;
use App\Models\Prakerin\Panitia\PrakerinPerusahaan;
use Illuminate\Http\Request;

class PrakerinAdminNegoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PrakerinAdminNegoDataTable $prakerinAdminNegoDataTable)
    {
        return $prakerinAdminNegoDataTable->render('pages.prakerin.panitia.administrasi-admin-nego');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        $perusahaanOptions = PrakerinPerusahaan::where('status', 'Aktif')
            ->orderBy('nama')
            ->pluck('nama', 'id')
            ->toArray();

        $personilList = PersonilSekolah::all()
            ->mapWithKeys(function ($personil) {
                $namaLengkap = trim(
                    ($personil->gelardepan ? $personil->gelardepan . ' ' : '') .
                        $personil->namalengkap .
                        ($personil->gelarbelakang ? ', ' . $personil->gelarbelakang : '')
                );
                return [$personil->id_personil => $namaLengkap];
            });

        $negosiatorOptions = PrakerinNegosiator::all()
            ->mapWithKeys(function ($nego) use ($personilList) {
                $nama = $personilList[$nego->id_personil] ?? '-';
                return [$nego->id_nego => $nama];
            })
            ->toArray();

        return view('pages.prakerin.panitia.administrasi-admin-nego-form', [
            'data' => new PrakerinAdminNego(),
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'perusahaanOptions' => $perusahaanOptions,
            'negosiatorOptions' => $negosiatorOptions,
            'action' => route('panitiaprakerin.administrasi.admin-nego.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrakerinAdminNegoRequest $request)
    {
        $adminNego = new PrakerinAdminNego($request->validated());
        $adminNego->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PrakerinAdminNego $adminNego)
    {
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        $perusahaanOptions = PrakerinPerusahaan::where('status', 'Aktif')
            ->orderBy('nama')
            ->pluck('nama', 'id')
            ->toArray();

        $personilList = PersonilSekolah::all()
            ->mapWithKeys(function ($personil) {
                $namaLengkap = trim(
                    ($personil->gelardepan ? $personil->gelardepan . ' ' : '') .
                        $personil->namalengkap .
                        ($personil->gelarbelakang ? ', ' . $personil->gelarbelakang : '')
                );
                return [$personil->id_personil => $namaLengkap];
            });

        $negosiatorOptions = PrakerinNegosiator::all()
            ->mapWithKeys(function ($nego) use ($personilList) {
                $nama = $personilList[$nego->id_personil] ?? '-';
                return [$nego->id_nego => $nama];
            })
            ->toArray();

        return view('pages.prakerin.panitia.administrasi-admin-nego-form', [
            'data' => $adminNego,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'perusahaanOptions' => $perusahaanOptions,
            'negosiatorOptions' => $negosiatorOptions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrakerinAdminNego $adminNego)
    {
        $tahunAjaranOptions  = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        $perusahaanOptions = PrakerinPerusahaan::where('status', 'Aktif')
            ->orderBy('nama')
            ->pluck('nama', 'id')
            ->toArray();

        $personilList = PersonilSekolah::all()
            ->mapWithKeys(function ($personil) {
                $namaLengkap = trim(
                    ($personil->gelardepan ? $personil->gelardepan . ' ' : '') .
                        $personil->namalengkap .
                        ($personil->gelarbelakang ? ', ' . $personil->gelarbelakang : '')
                );
                return [$personil->id_personil => $namaLengkap];
            });

        $negosiatorOptions = PrakerinNegosiator::all()
            ->mapWithKeys(function ($nego) use ($personilList) {
                $nama = $personilList[$nego->id_personil] ?? '-';
                return [$nego->id_nego => $nama];
            })
            ->toArray();

        return view('pages.prakerin.panitia.administrasi-admin-nego-form', [
            'data' => $adminNego,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'perusahaanOptions' => $perusahaanOptions,
            'negosiatorOptions' => $negosiatorOptions,
            'action' => route('panitiaprakerin.administrasi.admin-nego.update', $adminNego->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrakerinAdminNegoRequest $request, PrakerinAdminNego $adminNego)
    {
        $adminNego->fill($request->validated());
        $adminNego->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrakerinAdminNego $adminNego)
    {
        $adminNego->delete();

        return responseSuccessDelete();
    }
}
