<?php

namespace App\Http\Controllers\Pkl\PesertaDidikPkl;

use App\Http\Controllers\Controller;
use App\DataTables\Pkl\PesertaDidikPkl\JurnalSiswaDataTable;
use App\Helpers\ImageHelper;
use App\Models\Pkl\PesertaDidikPkl\JurnalPkl;
use App\Http\Requests\Pkl\PesertaDidikPkl\JurnalPklRequest;
use App\Models\Pkl\KaprodiPkl\ModulAjar;
use App\Models\Kurikulum\DataKBM\CapaianPembelajaran;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class JurnalPklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JurnalSiswaDataTable $jurnalSiswaDataTable)
    {
        $nis = auth()->user()->nis; // Ambil NIS dari user yang sedang login

        $rekapJurnal = DB::table('jurnal_pkls')
            ->select(
                DB::raw('YEAR(tanggal_kirim) as tahun'),
                DB::raw('MONTH(tanggal_kirim) as bulan'),
                DB::raw('COUNT(CASE WHEN validasi = "sudah" THEN 1 END) as sudah'),
                DB::raw('COUNT(CASE WHEN validasi = "belum" THEN 1 END) as belum'),
                DB::raw('COUNT(CASE WHEN validasi = "tolak" THEN 1 END) as tolak')
            )
            ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
            ->where('penempatan_prakerins.nis', $nis)
            ->groupBy(DB::raw('YEAR(tanggal_kirim), MONTH(tanggal_kirim)'))
            ->orderBy(DB::raw('YEAR(tanggal_kirim)'))
            ->orderBy(DB::raw('MONTH(tanggal_kirim)'))
            ->get();

        return $jurnalSiswaDataTable->render('pages.pkl.pesertadidikpkl.jurnal-siswa', compact('rekapJurnal'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nis = auth()->user()->nis; // Ambil NIS dari user yang sedang login

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
            ->where('penempatan_prakerins.nis', $nis)
            ->first(); // Mengambil satu data

        $elemenCPOptions = CapaianPembelajaran::where('nama_matapelajaran', 'Praktek Kerja Industri')
            ->pluck('element', 'kode_cp')
            ->toArray();

        return view('pages.pkl.pesertadidikpkl.jurnal-siswa-form', [
            'data' => new JurnalPkl(),
            'penempatan' => $penempatan,
            'elemenCPOptions' => $elemenCPOptions,
            'action' => route('pesertadidikpkl.jurnal-siswa.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JurnalPklRequest $request)
    {
        $jurnalPkl = new JurnalPkl($request->except(['gambar']));

        if ($request->hasFile('gambar')) {
            $imageFile = $request->file('gambar');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('gambar'),
                directory: 'images/jurnal-2024-2025',
                oldFileName: $jurnalPkl->gambar ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'jurnal_'
            );

            $jurnalPkl->gambar = $imageName;
        }

        $jurnalPkl->save();


        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(JurnalPkl $jurnalPkl)
    {
        $nis = auth()->user()->nis; // Ambil NIS dari user yang sedang login

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
            ->where('penempatan_prakerins.nis', $nis)
            ->first(); // Mengambil satu data


        $elemenCPOptions = CapaianPembelajaran::where('nama_matapelajaran', 'Praktek Kerja Industri')
            ->where('kode_cp', $jurnalPkl->element)
            ->pluck('element', 'kode_cp')
            ->toArray();

        // Get Tujuan Pembelajaran from modul_ajars
        $isiTp = DB::table('modul_ajars')
            ->where('id', $jurnalPkl->id_tp)
            ->value('isi_tp');

        return view('pages.pkl.pesertadidikpkl.jurnal-siswa-form', [
            'data' => $jurnalPkl,
            'penempatan' => $penempatan,
            'elemenCPOptions' => $elemenCPOptions,
            'isi_tp' => $isiTp,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JurnalPkl $jurnalPkl)
    {
        $nis = auth()->user()->nis; // Ambil NIS dari user yang sedang login

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
            ->where('penempatan_prakerins.nis', $nis)
            ->first(); // Mengambil satu data

        $elemenCPOptions = CapaianPembelajaran::where('nama_matapelajaran', 'Praktek Kerja Industri')
            ->pluck('element', 'kode_cp')
            ->toArray();

        return view('pages.pkl.pesertadidikpkl.jurnal-siswa-form', [
            'data' => $jurnalPkl,
            'penempatan' => $penempatan,
            'elemenCPOptions' => $elemenCPOptions,
            'action' => route('pesertadidikpkl.jurnal-siswa.update', $jurnalPkl->id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JurnalPklRequest $request, JurnalPkl $jurnalPkl)
    {
        $jurnalPkl = new JurnalPkl($request->except(['gambar']));

        if ($request->hasFile('gambar')) {
            $imageFile = $request->file('gambar');

            $imageName = ImageHelper::uploadCompressedImage(
                file: $request->file('gambar'),
                directory: 'images/jurnal-2024-2025',
                oldFileName: $jurnalPkl->gambar ?? null,
                maxWidth: 600,
                quality: 75,
                prefix: 'jurnal_'
            );

            $jurnalPkl->gambar = $imageName;
        }

        $jurnalPkl->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JurnalPkl $jurnalPkl)
    {
        //
    }

    public function getTp($kode_cp, $kode_kk)
    {
        $tujuanPembelajaran = DB::table('modul_ajars')
            ->where('kode_cp', $kode_cp)
            ->where('kode_kk', $kode_kk)
            ->select('id', 'isi_tp') // Ambil id sebagai key dan isi_tp sebagai value
            ->get();

        return response()->json($tujuanPembelajaran);
    }
}
