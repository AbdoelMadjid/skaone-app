<?php

namespace App\Http\Controllers\PembimbingPkl;

use App\DataTables\PembimbingPkl\ValidasiJurnalDataTable;
use App\Http\Controllers\Controller;
use App\Models\KaprodiPkl\ModulAjar;
use App\Models\Kurikulum\DataKBM\CapaianPembelajaran;
use App\Models\PembimbingPkl\ValidasiJurnal;
use App\Models\PesertaDidikPkl\JurnalPkl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ValidasiJurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ValidasiJurnalDataTable $validasiJurnalDataTable)
    {
        return $validasiJurnalDataTable->render("pages.pembimbingpkl.validasi-jurnal");
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
    public function show(ValidasiJurnal $validasiJurnal)
    {
        $id_personil = auth()->user()->personal_id; // Ambil NIS dari user yang sedang login

        $penempatan = DB::table('penempatan_prakerins')
            ->select(
                'penempatan_prakerins.id',
                'penempatan_prakerins.kode_kk',
                'penempatan_prakerins.tahunajaran',
                'kompetensi_keahlians.nama_kk',
                'peserta_didiks.nama_lengkap',
                'peserta_didik_rombels.rombel_nama',
                'perusahaans.nama as nama_dudi',
                'personil_sekolahs.namalengkap as nama_pembimbing'
            )
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->join('pembimbing_prakerins', 'penempatan_prakerins.id', '=', 'pembimbing_prakerins.id_penempatan')
            ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->join('kompetensi_keahlians', 'penempatan_prakerins.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->where('pembimbing_prakerins.id_personil', $id_personil)
            ->first(); // Mengambil satu data

        $elemenCPOptions = CapaianPembelajaran::where('nama_matapelajaran', 'Praktek Kerja Industri')
            ->pluck('element', 'kode_cp')
            ->toArray();

        // Ambil data isi_tp dari tabel modul_ajars berdasarkan id_tp
        $isiTp = DB::table('modul_ajars')
            ->where('id', $validasiJurnal->id_tp) // id_tp dari tabel jurnal_pkls
            ->value('isi_tp'); // Ambil kolom isi_tp

        return view('pages.pembimbingpkl.validasi-jurnal-form', [
            'data' => $validasiJurnal,
            'penempatan' => $penempatan,
            'elemenCPOptions' => $elemenCPOptions,
            'isi_tp' => $isiTp,
        ]);
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
    public function update(Request $request, $id)
    {
        $validasiJurnal = ValidasiJurnal::findOrFail($id);
        $validasiJurnal->validasi = $request->input('validasi');
        $validasiJurnal->save();

        return response()->json(['message' => 'Validasi berhasil diperbarui']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
