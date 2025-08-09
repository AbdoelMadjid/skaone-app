<?php

namespace App\Http\Controllers\Pkl\PembimbingPkl;

use App\Http\Controllers\Controller;
use App\DataTables\Pkl\PembimbingPkl\ValidasiJurnalDataTable;
use App\Models\Pkl\KaprodiPkl\ModulAjar;
use App\Models\Kurikulum\DataKBM\CapaianPembelajaran;
use App\Models\Pkl\PembimbingPkl\ValidasiJurnal;
use App\Models\Pkl\PesertaDidikPkl\JurnalPkl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\AssignOp\Concat;

class ValidasiJurnalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ValidasiJurnalDataTable $validasiJurnalDataTable)
    {
        $personal_id = Auth::user()->personal_id;

        $data = DB::table('pembimbing_prakerins')
            ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')
            ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', function ($join) {
                $join->on('penempatan_prakerins.tahunajaran', '=', 'peserta_didik_rombels.tahun_ajaran')
                    ->on('penempatan_prakerins.nis', '=', 'peserta_didik_rombels.nis');
            })
            ->select(
                'pembimbing_prakerins.id_personil',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang',
                'personil_sekolahs.kontak_hp',
                'personil_sekolahs.photo',
                'pembimbing_prakerins.id_penempatan',
                'penempatan_prakerins.id_dudi',
                'perusahaans.nama',
                'perusahaans.alamat',
                'penempatan_prakerins.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didiks.foto',
                'peserta_didik_rombels.rombel_nama'
            )
            ->where('pembimbing_prakerins.id_personil', $personal_id)
            ->get();

        // Membentuk array dengan nama peserta_didiks.nama_lengkap sebagai label,
        // dan pembimbing_prakerins.id_penempatan sebagai value
        $optionsArray = $data->mapWithKeys(function ($item) {
            return [
                $item->id_penempatan => $item->nama_lengkap
            ];
        })->toArray();

        return $validasiJurnalDataTable->render("pages.pkl.pembimbingpkl.validasi-jurnal", compact('optionsArray'));
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

        // Get related penempatan_prakerins data using the id_penempatan from ValidasiJurnal
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
            ->where('penempatan_prakerins.id', $validasiJurnal->id_penempatan) // Match the id_penempatan from ValidasiJurnal
            ->first();

        // Get Capaian Pembelajaran (elemenCPOptions)
        $elemenCPOptions = CapaianPembelajaran::where('nama_matapelajaran', 'Praktek Kerja Industri')
            ->pluck('element', 'kode_cp')
            ->toArray();

        // Get Tujuan Pembelajaran from modul_ajars
        $isiTp = DB::table('modul_ajars')
            ->where('id', $validasiJurnal->id_tp)
            ->value('isi_tp');

        return view('pages.pkl.pembimbingpkl.validasi-jurnal-form', [
            'data' => $validasiJurnal,
            'penempatan' => $penempatan,  // Pass penempatan data to the view
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
    public function destroy(ValidasiJurnal $validasiJurnal)
    {
        $validasiJurnal->delete();
        return responseSuccessDelete();
    }

    public function tambahKomentar(Request $request, $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'komentar' => 'required|string|max:255',
        ]);

        // Cari record tujuan pembelajaran berdasarkan ID
        $validasiJurnal = ValidasiJurnal::find($id);

        if ($validasiJurnal) {
            // Update kolom tp_isi di tabel tujuan_pembelajarans
            $validasiJurnal->komentar = $validatedData['komentar'];
            $validasiJurnal->save();

            return response()->json(['message' => 'Komentar sukses di tambahkan!']);
        }

        return response()->json(['message' => 'Data tidak ditemukan!'], 404);
    }

    public function validasiJurnal(Request $request, $id)
    {
        $validasiJurnal = ValidasiJurnal::findOrFail($id);
        $validasiJurnal->validasi = $request->input('validasi');
        $validasiJurnal->save();

        return response()->json(['message' => 'Validasi berhasil diperbarui']);
    }

    public function validasiJurnalTolak(Request $request, $id)
    {
        $validasiJurnal = ValidasiJurnal::findOrFail($id);
        $validasiJurnal->validasi = $request->input('validasi');
        $validasiJurnal->save();

        return response()->json(['message' => 'Validasi berhasil diperbarui']);
    }
}
