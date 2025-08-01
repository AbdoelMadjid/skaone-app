<?php

namespace App\Http\Controllers\Prakerin\Panitia;

use App\Http\Controllers\Controller;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\Prakerin\Kaprog\PrakerinPenempatan;
use App\Models\Prakerin\Panitia\PrakerinAdminNego;
use App\Models\Prakerin\Panitia\PrakerinIdentitas;
use App\Models\Prakerin\Panitia\PrakerinNegosiator;
use App\Models\Prakerin\Panitia\PrakerinPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrakerinAdministrasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil tahun ajaran yang aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')
            ->with(['semesters' => function ($query) {
                $query->where('status', 'Aktif');
            }])
            ->first();

        // Pastikan tahun ajaran aktif ada sebelum melanjutkan
        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        $identPrakerin = PrakerinIdentitas::where('status', 'Aktif')->first(); // Ambil 1 data aktif
        $perusahaanOptions = PrakerinPerusahaan::where('status', 'Aktif')
            ->orderBy('nama')
            ->pluck('nama', 'id')
            ->toArray();

        $tahunAjaran = $request->get('tahunajaran');
        $idPerusahaan = $request->get('id_perusahaan');

        $adminNego = null;
        $negosiator = null;
        $personil = null;
        $perusahaan = null;

        $adminNego = PrakerinAdminNego::where('tahunajaran', $tahunAjaran)
            ->where('id_perusahaan', $idPerusahaan)
            ->first();

        if ($adminNego) {
            $negosiator = PrakerinNegosiator::where('id_nego', $adminNego->id_nego)
                ->where('tahunajaran', $adminNego->tahunajaran)
                ->first();
        }

        if ($negosiator) {
            $personil = DB::table('personil_sekolahs')
                ->where('id_personil', $negosiator->id_personil)
                ->select('gelardepan', 'namalengkap', 'gelarbelakang', 'nip')
                ->first();
        }

        $perusahaan = PrakerinPerusahaan::find($idPerusahaan);

        // Sekarang aman
        $infoNegosiasi = [
            'tgl_nego' => optional($adminNego)->tgl_nego,
            'titimangsa' => optional($adminNego)->titimangsa,
            'nomor_surat' => optional($adminNego)->nomor_surat,

            'id_perusahaan' => optional($perusahaan)->id,
            'nama_perusahaan' => optional($perusahaan)->nama,
            'alamatperusahaan' => optional($perusahaan)->alamat,
            'nama_pimpinan' => optional($perusahaan)->nama_pimpinan,
            'jabatan_pimpinan' => optional($perusahaan)->jabatan_pimpinan,

            'gol_ruang' => optional($negosiator)->gol_ruang,
            'id_nego' => optional($negosiator)->id_nego,

            'nip' => optional($personil)->nip,
            'nama_lengkap' => $personil
                ? trim(($personil->gelardepan ? $personil->gelardepan . ' ' : '') .
                    ($personil->namalengkap ?? '') .
                    ($personil->gelarbelakang ? ', ' . $personil->gelarbelakang : ''))
                : '-',
        ];

        $penempatans = DB::table('penempatan_prakerins as pp')
            ->join('peserta_didiks as pd', 'pp.nis', '=', 'pd.nis')
            ->join('peserta_didik_rombels as pdr', function ($join) {
                $join->on('pp.nis', '=', 'pdr.nis')
                    ->on('pp.tahunajaran', '=', 'pdr.tahun_ajaran');
            })
            ->where('pp.id_dudi', $idPerusahaan)
            ->select(
                'pp.id_dudi',
                'pp.nis',
                'pd.nama_lengkap',
                'pd.jenis_kelamin',
                'pdr.rombel_nama'
            )
            ->get();

        return view('pages.prakerin.panitia.administrasi', [
            'identPrakerin' => $identPrakerin,
            'perusahaanOptions' => $perusahaanOptions,
            'tahunAjaranAktif' => $tahunAjaranAktif,
            'adminNego' => $adminNego,
            'negosiator' => $negosiator,
            'personil' => $personil,
            'perusahaan' => $perusahaan,
            'penempatans' => $penempatans,
            'infoNegosiasi' => $infoNegosiasi ?? null,
        ]);
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
