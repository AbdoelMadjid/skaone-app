<?php

namespace App\Http\Controllers\PesertaDidikPkl;

use App\DataTables\PesertaDidikPkl\JurnalSiswaDataTable;
use App\Models\PesertaDidikPkl\JurnalPkl;
use App\Http\Controllers\Controller;
use App\Http\Requests\PesertaDidikPkl\JurnalPklRequest;
use App\Models\KaprodiPkl\ModulAjar;
use App\Models\Kurikulum\DataKBM\CapaianPembelajaran;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;


class JurnalPklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JurnalSiswaDataTable $jurnalSiswaDataTable)
    {
        return $jurnalSiswaDataTable->render('pages.pesertadidikpkl.jurnal-siswa');
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

        return view('pages.pesertadidikpkl.jurnal-siswa-form', [
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
            // Upload dan proses file gambar
            $image = $request->file('gambar');
            $imageName = 'jurnal_' . time() . '.' . $image->extension();

            // Membuat dan menyimpan thumbnail di `public/images/thumbnail`
            $destinationPathThumbnail = base_path('images/thumbnail');
            $img = Image::make($image->path());

            // Tentukan persentase ukuran yang diinginkan (misalnya 50% dari ukuran asli)
            $percentage = 40; // 50% dari ukuran asli

            // Hitung dimensi baru berdasarkan persentase
            $newWidth = $img->width() * ($percentage / 100);
            $newHeight = $img->height() * ($percentage / 100);

            // Resize dengan persentase
            $img->resize($newWidth, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail . '/' . $imageName);

            // Menyimpan nama file ke database
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

        return view('pages.pesertadidikpkl.jurnal-siswa-form', [
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

        return view('pages.pesertadidikpkl.jurnal-siswa-form', [
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
            // Upload dan proses file gambar
            $image = $request->file('gambar');
            $imageName = 'jurnal_' . time() . '.' . $image->extension();

            // Membuat dan menyimpan thumbnail di `public/images/thumbnail`
            $destinationPathThumbnail = base_path('images/thumbnail');
            $img = Image::make($image->path());

            // Tentukan persentase ukuran yang diinginkan (misalnya 50% dari ukuran asli)
            $percentage = 40; // 50% dari ukuran asli

            // Hitung dimensi baru berdasarkan persentase
            $newWidth = $img->width() * ($percentage / 100);
            $newHeight = $img->height() * ($percentage / 100);

            // Resize dengan persentase
            $img->resize($newWidth, $newHeight, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPathThumbnail . '/' . $imageName);

            // Menyimpan nama file ke database
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
