<?php

namespace App\Http\Controllers\Pkl\PesertaDidikPkl;

use App\Http\Controllers\Controller;
use App\Models\PembimbingPkl\MonitoringPrakerin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MonitoringSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nis = Auth::user()->nis;

        $monitoringPrakerin = DB::table('monitoring_prakerins')
            ->join('perusahaans', 'monitoring_prakerins.id_perusahaan', '=', 'perusahaans.id')
            ->join('personil_sekolahs', 'monitoring_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')
            ->join('penempatan_prakerins', 'monitoring_prakerins.id_perusahaan', '=', 'penempatan_prakerins.id_dudi')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->select(
                'monitoring_prakerins.*',
                'perusahaans.nama',
                'personil_sekolahs.namalengkap',
                'penempatan_prakerins.nis',
                'peserta_didiks.nama_lengkap as namasiswa',
            )
            ->where('penempatan_prakerins.nis', $nis)
            ->get();

        return view("pages.pkl.pesertadidikpkl.monitoring-siswa", compact('monitoringPrakerin'));
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
