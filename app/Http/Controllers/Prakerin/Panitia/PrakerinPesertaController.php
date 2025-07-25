<?php

namespace App\Http\Controllers\Prakerin\Panitia;

use App\DataTables\Prakerin\Panitia\PrakerinPesertaDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Prakerin\Panitia\PrakerinPesertaRequest;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\Prakerin\Panitia\PrakerinPeserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrakerinPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PrakerinPesertaDataTable $pesertaPrakerinDataTable)
    {
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        return $pesertaPrakerinDataTable->render('pages.prakerin.panitia.peserta', [
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'tahunAjaran' => $tahunAjaran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();

        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();

        $pesertaDidikOptions = PesertaDidikRombel::join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->where('peserta_didik_rombels.rombel_tingkat', '12')
            ->where('peserta_didik_rombels.tahun_ajaran', $tahunAjaranAktif->tahunajaran)
            ->get(['peserta_didik_rombels.nis', 'peserta_didiks.nama_lengkap', 'peserta_didik_rombels.rombel_nama'])
            ->mapWithKeys(function ($item) {
                return [
                    $item->nis => $item->nis . ' - ' . $item->nama_lengkap . ' (' . $item->rombel_nama . ')'
                ];
            })
            ->toArray();

        return view('pages.prakerin.panitia.peserta-form', [
            'data' => new PrakerinPeserta(),
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'tahunAjaran' => $tahunAjaran,
            'pesertaDidikOptions' => $pesertaDidikOptions,
            'action' => route('administratorpkl.peserta-prakerin.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrakerinPesertaRequest $request)
    {
        $pesertaPrakerin = new PrakerinPeserta($request->validated());
        $pesertaPrakerin->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PrakerinPeserta $pesertaPrakerin)
    {
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();

        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();

        $pesertaDidikOptions = PesertaDidikRombel::join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->where('peserta_didik_rombels.rombel_tingkat', '12')
            ->where('peserta_didik_rombels.tahun_ajaran', $tahunAjaranAktif->tahunajaran)
            ->get(['peserta_didik_rombels.nis', 'peserta_didiks.nama_lengkap', 'peserta_didik_rombels.rombel_nama'])
            ->mapWithKeys(function ($item) {
                return [
                    $item->nis => $item->nis . ' - ' . $item->nama_lengkap . ' (' . $item->rombel_nama . ')'
                ];
            })
            ->toArray();

        return view('pages.prakerin.panitia.peserta-form', [
            'data' => $pesertaPrakerin,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'tahunAjaran' => $tahunAjaran,
            'pesertaDidikOptions' => $pesertaDidikOptions,
        ]);
    }

    public function simpanPesertaPrakerin(Request $request)
    {
        // Validasi input form
        $request->validate([
            'tahunajaran' => 'required',
            'kode_kk' => 'required',
            'tingkat' => 'required',
        ]);

        // Ambil data dari `peserta_didik_rombels` berdasarkan input form
        $dataPeserta = DB::table('peserta_didik_rombels')
            ->where('tahun_ajaran', $request->tahunajaran)
            ->where('kode_kk', $request->kode_kk)
            ->where('rombel_tingkat', $request->tingkat)
            ->select('tahun_ajaran', 'kode_kk', 'nis')
            ->get();

        // Masukkan data ke dalam tabel `peserta_prakerins`
        foreach ($dataPeserta as $peserta) {
            DB::table('prakerin_pesertas')->insert([
                'tahunajaran' => $peserta->tahun_ajaran,
                'kode_kk' => $peserta->kode_kk,
                'nis' => $peserta->nis,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Distribusi peserta berhasil.');
    }
}
