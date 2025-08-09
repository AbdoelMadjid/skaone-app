<?php

namespace App\Http\Controllers\Pkl\AdministratorPkl;

use App\Http\Controllers\Controller;
use App\DataTables\Pkl\AdministratorPkl\PesertaPrakerinDataTable;
use App\Models\Pkl\AdministratorPkl\PesertaPrakerin;
use App\Http\Requests\Pkl\AdministratorPkl\PesertaPrakerinRequest;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PesertaPrakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PesertaPrakerinDataTable $pesertaPrakerinDataTable)
    {
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        return $pesertaPrakerinDataTable->render('pages.pkl.administratorpkl.peserta-prakerin', [
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'tahunAjaran' => $tahunAjaran,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();

        $pesertaDidikOptions = PesertaDidikRombel::join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->where('peserta_didik_rombels.rombel_tingkat', '12')
            ->get(['peserta_didik_rombels.nis', 'peserta_didiks.nama_lengkap', 'peserta_didik_rombels.rombel_nama'])
            ->mapWithKeys(function ($item) {
                return [
                    $item->nis => $item->nis . ' - ' . $item->nama_lengkap . ' (' . $item->rombel_nama . ')'
                ];
            })
            ->toArray();

        return view('pages.pkl.administratorpkl.peserta-prakerin-form', [
            'data' => new PesertaPrakerin(),
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'tahunAjaran' => $tahunAjaran,
            'pesertaDidikOptions' => $pesertaDidikOptions,
            'action' => route('administratorpkl.peserta-prakerin.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PesertaPrakerinRequest $request)
    {
        $pesertaPrakerin = new PesertaPrakerin($request->validated());
        $pesertaPrakerin->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PesertaPrakerin $pesertaPrakerin)
    {
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();

        $pesertaDidikOptions = PesertaDidikRombel::join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->where('peserta_didik_rombels.rombel_tingkat', '12')
            ->get(['peserta_didik_rombels.nis', 'peserta_didiks.nama_lengkap', 'peserta_didik_rombels.rombel_nama'])
            ->mapWithKeys(function ($item) {
                return [
                    $item->nis => $item->nis . ' - ' . $item->nama_lengkap . ' (' . $item->rombel_nama . ')'
                ];
            })
            ->toArray();

        return view('pages.pkl.administratorpkl.peserta-prakerin-form', [
            'data' => $pesertaPrakerin,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'tahunAjaran' => $tahunAjaran,
            'pesertaDidikOptions' => $pesertaDidikOptions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesertaPrakerin $pesertaPrakerin)
    {
        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlian = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();

        $pesertaDidikOptions = PesertaDidikRombel::join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->where('peserta_didik_rombels.rombel_tingkat', '12')
            ->get(['peserta_didik_rombels.nis', 'peserta_didiks.nama_lengkap', 'peserta_didik_rombels.rombel_nama'])
            ->mapWithKeys(function ($item) {
                return [
                    $item->nis => $item->nis . ' - ' . $item->nama_lengkap . ' (' . $item->rombel_nama . ')'
                ];
            })
            ->toArray();

        return view('pages.pkl.administratorpkl.peserta-prakerin-form', [
            'data' => $pesertaPrakerin,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'tahunAjaran' => $tahunAjaran,
            'pesertaDidikOptions' => $pesertaDidikOptions,
            'action' => route('administratorpkl.peserta-prakerin.update', $pesertaPrakerin->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PesertaPrakerinRequest $request, PesertaPrakerin $pesertaPrakerin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PesertaPrakerin $pesertaPrakerin)
    {
        //
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
            DB::table('peserta_prakerins')->insert([
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
