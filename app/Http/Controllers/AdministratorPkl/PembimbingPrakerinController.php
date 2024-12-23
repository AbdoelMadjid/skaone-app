<?php

namespace App\Http\Controllers\AdministratorPkl;

use App\DataTables\AdministratorPkl\PembimbingPrakerinDataTable;
use App\Models\AdministratorPkl\PembimbingPrakerin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdministratorPkl\PembimbingPrakerinRequest;
use App\Models\AdministratorPkl\PenempatanPrakerin;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PembimbingPrakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PembimbingPrakerinDataTable $pembimbingPrakerinDataTable)
    {
        return $pembimbingPrakerinDataTable->render('pages.administratorpkl.pembimbing-prakerin');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $existingPembimbingPrakerinIds = PembimbingPrakerin::pluck('id_penempatan')->toArray();


        $pesertaPrakerinOptions = PenempatanPrakerin::join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'penempatan_prakerins.nis', '=', 'peserta_didik_rombels.nis')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->whereNotIn('penempatan_prakerins.id', $existingPembimbingPrakerinIds) // Menyaring data yang sudah ada
            ->get(['penempatan_prakerins.id', 'penempatan_prakerins.nis', 'peserta_didiks.nama_lengkap', 'peserta_didik_rombels.rombel_nama', 'perusahaans.nama'])
            ->sortBy('nama') // Mengurutkan berdasarkan nama perusahaan
            ->mapWithKeys(function ($item) {
                return [
                    $item->id => $item->nis . ' - ' . $item->nama_lengkap . ' (' . $item->rombel_nama . ') - ' . $item->nama
                ];
            })
            ->toArray();


        $personilOption = PersonilSekolah::where('jenispersonil', 'Guru')
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        return view('pages.administratorpkl.pembimbing-prakerin-form', [
            'data' => new PembimbingPrakerin(),
            'pesertaPrakerinOptions' => $pesertaPrakerinOptions,
            'personilOption' => $personilOption,
            'action' => route('administratorpkl.pembimbing-prakerin.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PembimbingPrakerinRequest $request)
    {
        // Ambil data yang telah tervalidasi
        $validatedData = $request->validated();

        // Cek apakah ada penempatan yang dipilih
        if (isset($validatedData['id_penempatan']) && is_array($validatedData['id_penempatan'])) {
            foreach ($validatedData['id_penempatan'] as $idPenempatan) {
                // Simpan data PembimbingPrakerin untuk setiap penempatan
                $pembimbingPrakerin = new PembimbingPrakerin([
                    'id_personil' => $validatedData['id_personil'],
                    'id_penempatan' => $idPenempatan,
                ]);
                $pembimbingPrakerin->save();
            }
        }

        // Ambil id_personil dari request
        $idPersonil = $validatedData['id_personil'];

        // Cari User berdasarkan id_personil
        $user = User::where('personal_id', $idPersonil)->first();

        if ($user) {
            // Cek apakah User sudah memiliki role 'pembpkl'
            if (!$user->hasRole('pembpkl')) {
                // Jika belum, tambahkan role 'Pembimbing'
                $user->assignRole('pembpkl');
            }
        }

        // Mengembalikan response sukses
        return responseSuccess();
    }


    /**
     * Display the specified resource.
     */
    public function show(PembimbingPrakerin $pembimbingPrakerin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PembimbingPrakerin $pembimbingPrakerin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PembimbingPrakerinRequest $request, PembimbingPrakerin $pembimbingPrakerin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PembimbingPrakerin $pembimbingPrakerin)
    {
        $pembimbingPrakerin->delete();

        return responseSuccessDelete();
    }
}
