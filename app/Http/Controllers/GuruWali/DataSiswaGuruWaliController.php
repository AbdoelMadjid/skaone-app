<?php

namespace App\Http\Controllers\GuruWali;

use App\DataTables\ManajemenSekolah\GuruWaliSiswaDataTable;
use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\ManajemenSekolah\GuruWaliSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataSiswaGuruWaliController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(GuruWaliSiswaDataTable $guruWaliSiswaDataTable)
    {
        $personilId = Auth::user()->personal_id;

        $siswaWali = GuruWaliSiswa::query()
            ->select(
                'guru_wali_siswas.*',
                'peserta_didiks.nama_lengkap',
                'peserta_didiks.jenis_kelamin',
                'peserta_didiks.foto',
                'peserta_didik_rombels.rombel_nama'
            )
            ->join('peserta_didiks', 'peserta_didiks.nis', '=', 'guru_wali_siswas.nis')
            ->leftJoin('peserta_didik_rombels', function ($join) {
                $join->on('peserta_didik_rombels.nis', '=', 'guru_wali_siswas.nis')
                    ->on('peserta_didik_rombels.tahun_ajaran', '=', 'guru_wali_siswas.tahunajaran');
            })
            ->where('guru_wali_siswas.id_personil', $personilId)
            ->get()
            ->map(function ($row) {
                $row->avatar = ImageHelper::getAvatarImageTag(
                    filename: $row->foto,
                    gender: $row->jenis_kelamin,
                    folder: 'peserta_didik',
                    defaultMaleImage: 'siswacowok.png',
                    defaultFemaleImage: 'siswacewek.png',
                    width: 50,
                    class: 'rounded avatar-sm'
                );
                return $row;
            });

        return $guruWaliSiswaDataTable->render('pages.guruwali.data-siswa-guruwali', compact('siswaWali'));
        //return view('pages.guruwali.data-siswa-guruwali', compact('siswaWali'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
