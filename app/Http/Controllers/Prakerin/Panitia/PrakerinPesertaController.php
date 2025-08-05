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
     * Remove the specified resource from storage.
     */
    public function destroy(PrakerinPeserta $pesertum)
    {
        $pesertum->delete();

        return responseSuccessDelete();
    }

    public function simpanPesertaPrakerin(Request $request)
    {
        // Validasi input
        $request->validate([
            'tahunajaran' => 'required',
            'kode_kk' => 'required',
            'tingkat' => 'required',
            'nis_terpilih' => 'required|array|min:1',
            'nis_terpilih.*' => 'distinct', // pastikan tidak duplikat
        ], [
            'nis_terpilih.required' => 'Minimal 1 siswa harus dipilih untuk distribusi.',
            'nis_terpilih.min' => 'Minimal 1 siswa harus dipilih untuk distribusi.'
        ]);

        // Loop dan simpan hanya siswa yang diceklis
        foreach ($request->nis_terpilih as $nis) {
            DB::table('prakerin_pesertas')->insert([
                'tahunajaran' => $request->tahunajaran,
                'kode_kk' => $request->kode_kk,
                'nis' => $nis,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        return redirect()->back()->with('success', 'Distribusi peserta berhasil.');
    }


    public function getDaftarSiswa(Request $request)
    {
        $request->validate([
            'tahunajaran' => 'required',
            'kode_kk' => 'required',
            'tingkat' => 'required',
        ]);

        // Ambil NIS yang sudah pernah didistribusikan (prakerin_pesertas)
        $siswaSudahTerdaftar = DB::table('prakerin_pesertas')
            ->where('tahunajaran', $request->tahunajaran)
            ->where('kode_kk', $request->kode_kk)
            ->pluck('nis')
            ->toArray();

        $jumlahTerdaftar = count($siswaSudahTerdaftar);

        // Ambil siswa dari peserta_didik_rombels tapi exclude yang sudah masuk prakerin_pesertas
        $siswa = PesertaDidikRombel::with('pesertaDidik')
            ->where('tahun_ajaran', $request->tahunajaran)
            ->where('kode_kk', $request->kode_kk)
            ->where('rombel_tingkat', $request->tingkat)
            ->when($jumlahTerdaftar > 0, function ($query) use ($siswaSudahTerdaftar) {
                $query->whereNotIn('nis', $siswaSudahTerdaftar);
            })
            ->get();

        $html = view('pages.prakerin.panitia.peserta-prakerin-tabel', compact('siswa'))->render();

        return response()->json([
            'html' => $html,
            'terdaftar' => $jumlahTerdaftar,
        ]);
    }
}
