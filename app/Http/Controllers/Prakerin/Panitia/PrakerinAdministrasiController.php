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
            'nomor_surat_pengantar' => optional($adminNego)->nomor_surat_pengantar,
            'nomor_surat_perintah' => optional($adminNego)->nomor_surat_perintah,
            'nomor_surat_mou' => optional($adminNego)->nomor_surat_mou,

            'id_perusahaan' => optional($perusahaan)->id,
            'nama_perusahaan' => optional($perusahaan)->nama,
            'alamatperusahaan' => optional($perusahaan)->alamat,
            'nama_pimpinan' => optional($perusahaan)->nama_pimpinan,
            'jabatan_pimpinan' => optional($perusahaan)->jabatan_pimpinan,
            'id_pimpinan' => optional($perusahaan)->id_pimpinan,
            'nip_nidn' => optional($perusahaan)->no_ident_pimpinan,

            'gol_ruang' => optional($negosiator)->gol_ruang,
            'jabatan' => optional($negosiator)->jabatan,
            'id_nego' => optional($negosiator)->id_nego,

            'nip' => optional($personil)->nip,
            'nama_lengkap' => $personil
                ? trim(($personil->gelardepan ? $personil->gelardepan . ' ' : '') .
                    ($personil->namalengkap ?? '') .
                    ($personil->gelarbelakang ? ', ' . $personil->gelarbelakang : ''))
                : '-',
        ];

        $penempatans = DB::table('prakerin_penempatans')
            ->join('prakerin_pesertas', function ($join) use ($tahunAjaran) {
                $join->on('prakerin_penempatans.nis', '=', 'prakerin_pesertas.nis')
                    ->where('prakerin_pesertas.tahunajaran', '=', $tahunAjaran);
            })
            ->join('peserta_didiks', 'peserta_didiks.nis', '=', 'prakerin_pesertas.nis')
            ->join('peserta_didik_rombels', function ($join) use ($tahunAjaran) {
                $join->on('peserta_didik_rombels.nis', '=', 'prakerin_pesertas.nis')
                    ->where('peserta_didik_rombels.tahun_ajaran', '=', $tahunAjaran);
            })
            ->join('kompetensi_keahlians', 'kompetensi_keahlians.idkk', '=', 'prakerin_penempatans.kode_kk')
            ->where('prakerin_penempatans.id_dudi', $idPerusahaan)
            ->where('prakerin_penempatans.tahunajaran', $tahunAjaran)
            ->select(
                'prakerin_pesertas.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didiks.jenis_kelamin',
                'peserta_didik_rombels.rombel_nama as rombel',
                'kompetensi_keahlians.nama_kk as jurusan'
            )
            ->orderBy('peserta_didik_rombels.rombel_nama')
            ->orderBy('prakerin_pesertas.nis')
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
