<?php

namespace App\Http\Controllers\Pkl\AdministratorPkl;

use App\Http\Controllers\Controller;
use App\DataTables\Pkl\AdministratorPkl\PenempatanPrakerinDataTable;
use App\Models\Pkl\AdministratorPkl\PenempatanPrakerin;
use App\Http\Requests\Pkl\AdministratorPkl\PenempatanPrakerinRequest;
use App\Models\Pkl\AdministratorPkl\Perusahaan;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PesertaDidik;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PenempatanPrakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PenempatanPrakerinDataTable $penempatanPrakerinDataTable)
    {
        return $penempatanPrakerinDataTable->render('pages.pkl.administratorpkl.penempatan-prakerin');
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
        $data = new PenempatanPrakerin();
        $data->tahunajaran = $activeTahunAjaran ? $activeTahunAjaran->tahunajaran : null; // Set default to active year

        // Kompetensi Keahlian options without changes
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $selectedKompetensiKeahlianId = null;

        if (auth()->check()) {
            $user = User::find(Auth::user()->id);

            // Set selected kompetensi keahlian based on user role
            if ($user->hasAnyRole(['kaprodiak'])) {
                $selectedKompetensiKeahlianId = '833';
            } elseif ($user->hasAnyRole(['kaprodibd'])) {
                $selectedKompetensiKeahlianId = '811';
            } elseif ($user->hasAnyRole(['kaprodimp'])) {
                $selectedKompetensiKeahlianId = '821';
            } elseif ($user->hasAnyRole(['kaprodirpl'])) {
                $selectedKompetensiKeahlianId = '411';
            } elseif ($user->hasAnyRole(['kaproditkj'])) {
                $selectedKompetensiKeahlianId = '421';
            }
        }

        // Set the selected kode_kk in the data object if applicable
        $data->kode_kk = $selectedKompetensiKeahlianId;

        // Fetch Peserta Didik options excluding those already placed
        $existingNis = DB::table('penempatan_prakerins')->pluck('nis')->toArray();

        $query = DB::table('peserta_prakerins')
            ->join('peserta_didiks', 'peserta_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'peserta_prakerins.nis', '=', 'peserta_didik_rombels.nis')
            ->select('peserta_prakerins.nis', 'peserta_didiks.nama_lengkap', 'peserta_didik_rombels.rombel_nama')
            ->whereNotIn('peserta_prakerins.nis', $existingNis); // Exclude placed students

        if ($selectedKompetensiKeahlianId) {
            $query->where('peserta_prakerins.kode_kk', $selectedKompetensiKeahlianId);
        }

        $pesertaDidikOptions = $query->get()
            ->mapWithKeys(function ($item) {
                return [
                    $item->nis => $item->nis . ' - ' . $item->nama_lengkap . ' (' . $item->rombel_nama . ')'
                ];
            })
            ->toArray();

        $perusahaanOptions = Perusahaan::pluck('nama', 'id')->toArray();

        return view('pages.pkl.administratorpkl.penempatan-prakerin-form', [
            'data' => $data,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'pesertaDidikOptions' => $pesertaDidikOptions,
            'perusahaanOptions' => $perusahaanOptions,
            'action' => route('administratorpkl.penempatan-prakerin.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PenempatanPrakerinRequest $request)
    {
        $penempatanPrakerin = new PenempatanPrakerin($request->validated());
        $penempatanPrakerin->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PenempatanPrakerin $penempatanPrakerin) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenempatanPrakerin $penempatanPrakerin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PenempatanPrakerinRequest $request, PenempatanPrakerin $penempatanPrakerin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenempatanPrakerin $penempatanPrakerin)
    {
        $penempatanPrakerin->delete();

        return responseSuccessDelete();
    }
}
