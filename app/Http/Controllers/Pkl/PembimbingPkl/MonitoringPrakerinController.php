<?php

namespace App\Http\Controllers\Pkl\PembimbingPkl;

use App\Http\Controllers\Controller;
use App\DataTables\Pkl\PembimbingPkl\MonitoringPrakerinDataTable;
use App\Models\Pkl\PembimbingPkl\MonitoringPrakerin;
use App\Http\Requests\Pkl\PembimbingPkl\MonitoringPrakerinRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MonitoringPrakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MonitoringPrakerinDataTable $monitoringPrakerinDataTable)
    {
        return $monitoringPrakerinDataTable->render("pages.pkl.pembimbingpkl.monitoring-prakerin");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_personil = Auth::user()->personal_id;
        // Query untuk mendapatkan data siswa terbimbing
        // Query untuk mendapatkan data siswa terbimbing
        $listPerusahaan = DB::table('pembimbing_prakerins')
            ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->select(
                'penempatan_prakerins.id_dudi as id',
                'perusahaans.nama as nama_perusahaan'
            )
            ->where('pembimbing_prakerins.id_personil', $id_personil)
            ->groupBy('penempatan_prakerins.id_dudi', 'perusahaans.nama')
            ->get()
            ->pluck('nama_perusahaan', 'id')
            ->toArray();

        return view('pages.pkl.pembimbingpkl.monitoring-prakerin-form', [
            'data' => new MonitoringPrakerin(),
            'listPerusahaan' => $listPerusahaan,
            'action' => route('pembimbingpkl.monitoring-prakerin.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MonitoringPrakerinRequest $request)
    {
        $monitoringPrakerin = new MonitoringPrakerin($request->validated());
        $monitoringPrakerin->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(MonitoringPrakerin $monitoringPrakerin)
    {
        $id_personil = Auth::user()->personal_id;
        // Query untuk mendapatkan data siswa terbimbing
        // Query untuk mendapatkan data siswa terbimbing
        $listPerusahaan = DB::table('pembimbing_prakerins')
            ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->select(
                'penempatan_prakerins.id_dudi as id',
                'perusahaans.nama as nama_perusahaan'
            )
            ->where('pembimbing_prakerins.id_personil', $id_personil)
            ->groupBy('penempatan_prakerins.id_dudi', 'perusahaans.nama')
            ->get()
            ->pluck('nama_perusahaan', 'id')
            ->toArray();

        return view('pages.pkl.pembimbingpkl.monitoring-prakerin-form', [
            'data' => $monitoringPrakerin,
            'listPerusahaan' => $listPerusahaan,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MonitoringPrakerin $monitoringPrakerin)
    {
        $id_personil = Auth::user()->personal_id;
        // Query untuk mendapatkan data siswa terbimbing
        // Query untuk mendapatkan data siswa terbimbing
        $listPerusahaan = DB::table('pembimbing_prakerins')
            ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->select(
                'penempatan_prakerins.id_dudi as id',
                'perusahaans.nama as nama_perusahaan'
            )
            ->where('pembimbing_prakerins.id_personil', $id_personil)
            ->groupBy('penempatan_prakerins.id_dudi', 'perusahaans.nama')
            ->get()
            ->pluck('nama_perusahaan', 'id')
            ->toArray();

        return view('pages.pkl.pembimbingpkl.monitoring-prakerin-form', [
            'data' => $monitoringPrakerin,
            'listPerusahaan' => $listPerusahaan,
            'action' => route('pembimbingpkl.monitoring-prakerin.update', $monitoringPrakerin->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MonitoringPrakerinRequest $request, MonitoringPrakerin $monitoringPrakerin)
    {
        $monitoringPrakerin->fill($request->validated());
        $monitoringPrakerin->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MonitoringPrakerin $monitoringPrakerin)
    {
        $monitoringPrakerin->delete();

        return responseSuccessDelete();
    }
}
