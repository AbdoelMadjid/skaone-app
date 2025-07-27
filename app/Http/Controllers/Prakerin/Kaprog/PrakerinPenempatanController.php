<?php

namespace App\Http\Controllers\Prakerin\Kaprog;

use App\DataTables\Prakerin\Kaprog\PrakerinPenempatanDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Prakerin\Kaprog\PrakerinPenempatanRequest;
use App\Models\AdministratorPkl\PenempatanPrakerin;
use App\Models\AdministratorPkl\Perusahaan;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\Prakerin\Kaprog\PrakerinPenempatan;
use App\Models\Prakerin\Panitia\PrakerinPerusahaan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrakerinPenempatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PrakerinPenempatanDataTable $penempatanPrakerinDataTable)
    {
        return $penempatanPrakerinDataTable->render('pages.prakerin.kaprog.penempatan');
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
        $data = new PrakerinPenempatan();
        $data->tahunajaran = $activeTahunAjaran ? $activeTahunAjaran->tahunajaran : null; // Set default to active year

        // Kompetensi Keahlian options without changes
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $selectedKompetensiKeahlianId = null;

        if (auth()->check()) {
            $user = User::find(Auth::user()->id);

            // Set selected kompetensi keahlian based on user role
            if ($user->hasAnyRole(['kaprakerinak'])) {
                $selectedKompetensiKeahlianId = '833';
            } elseif ($user->hasAnyRole(['kaprakerinbd'])) {
                $selectedKompetensiKeahlianId = '811';
            } elseif ($user->hasAnyRole(['kaprakerinmp'])) {
                $selectedKompetensiKeahlianId = '821';
            } elseif ($user->hasAnyRole(['kaprakerinrpl'])) {
                $selectedKompetensiKeahlianId = '411';
            } elseif ($user->hasAnyRole(['kaprakerintkj'])) {
                $selectedKompetensiKeahlianId = '421';
            }
        }

        // Set the selected kode_kk in the data object if applicable
        $data->kode_kk = $selectedKompetensiKeahlianId;

        // Fetch Peserta Didik options excluding those already placed
        $existingNis = DB::table('prakerin_penempatans')->pluck('nis')->toArray();

        $query = DB::table('prakerin_pesertas')
            ->join('peserta_didiks', 'prakerin_pesertas.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'prakerin_pesertas.nis', '=', 'peserta_didik_rombels.nis')
            ->select('prakerin_pesertas.nis', 'peserta_didiks.nama_lengkap', 'peserta_didik_rombels.rombel_nama')
            ->where('peserta_didik_rombels.tahun_ajaran', $activeTahunAjaran->tahunajaran)
            ->whereNotIn('prakerin_pesertas.nis', $existingNis); // Exclude placed students

        if ($selectedKompetensiKeahlianId) {
            $query->where('prakerin_pesertas.kode_kk', $selectedKompetensiKeahlianId);
        }

        $pesertaDidikOptions = $query->get()
            ->groupBy('rombel_nama')
            ->map(function ($group) {
                return $group->mapWithKeys(function ($item) {
                    return [
                        $item->nis => $item->nis . ' - ' . $item->nama_lengkap
                    ];
                })->toArray();
            })
            ->toArray();

        $perusahaanOptions = PrakerinPerusahaan::where('status', 'Aktif')
            ->orderBy('nama')
            ->pluck('nama', 'id')
            ->toArray();

        return view('pages.prakerin.kaprog.penempatan-form', [
            'data' => $data,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'pesertaDidikOptions' => $pesertaDidikOptions,
            'perusahaanOptions' => $perusahaanOptions,
            'action' => route('kaprogprakerin.penempatan.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrakerinPenempatanRequest $request)
    {
        $penempatanPrakerin = new PrakerinPenempatan($request->validated());
        $penempatanPrakerin->save();

        return responseSuccess();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrakerinPenempatan $penempatan)
    {
        $penempatan->delete();

        return responseSuccessDelete();
    }
}
