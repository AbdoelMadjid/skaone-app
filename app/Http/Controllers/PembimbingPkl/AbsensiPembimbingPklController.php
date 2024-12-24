<?php

namespace App\Http\Controllers\PembimbingPkl;

use App\DataTables\PembimbingPkl\AbsensiBimbinganDataTable;
use App\Models\PembimbingPkl\AbsensiPembimbingPkl;
use App\Http\Controllers\Controller;
use App\Http\Requests\PembimbingPkl\AbsensiPembimbingPklRequest;
use App\Models\PesertaDidikPkl\AbsensiSiswaPkl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AbsensiPembimbingPklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AbsensiBimbinganDataTable $absensiBimbinganDataTable)
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

        // Query terpisah untuk absensi siswa
        $absensi = DB::table('absensi_siswa_pkls')
            ->select(
                'nis',
                DB::raw("SUM(CASE WHEN status = 'HADIR' THEN 1 ELSE 0 END) as jumlah_hadir"),
                DB::raw("SUM(CASE WHEN status = 'SAKIT' THEN 1 ELSE 0 END) as jumlah_sakit"),
                DB::raw("SUM(CASE WHEN status = 'IZIN' THEN 1 ELSE 0 END) as jumlah_izin"),
                DB::raw("SUM(CASE WHEN status = 'ALFA' THEN 1 ELSE 0 END) as jumlah_alfa")
            )
            ->groupBy('nis')
            ->get()
            ->keyBy('nis'); // Agar hasil bisa diakses langsung dengan nis sebagai key

        // Gabungkan absensi ke data utama
        $data = $data->map(function ($siswa) use ($absensi) {
            $nis = $siswa->nis;

            $siswa->jumlah_hadir = $absensi[$nis]->jumlah_hadir ?? 0;
            $siswa->jumlah_sakit = $absensi[$nis]->jumlah_sakit ?? 0;
            $siswa->jumlah_izin = $absensi[$nis]->jumlah_izin ?? 0;
            $siswa->jumlah_alfa = $absensi[$nis]->jumlah_alfa ?? 0;
            $siswa->jumlah_total = $siswa->jumlah_sakit + $siswa->jumlah_izin + $siswa->jumlah_alfa;

            return $siswa;
        });

        // Query jumlah jurnal berdasarkan NIS
        $jumlahJurnal = DB::table('jurnal_pkls')
            ->select(
                'penempatan_prakerins.nis',
                DB::raw("COUNT(jurnal_pkls.id) as total_jurnal")
            )
            ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
            ->groupBy('penempatan_prakerins.nis')
            ->get()
            ->keyBy('nis');

        // Query elemen dari modul_ajars dan capaian_pembelajarans
        $elements = DB::table('modul_ajars')
            ->join('capaian_pembelajarans', 'modul_ajars.kode_cp', '=', 'capaian_pembelajarans.kode_cp')
            ->select(
                'modul_ajars.kode_cp',
                'capaian_pembelajarans.element',
                DB::raw("GROUP_CONCAT(modul_ajars.isi_tp) as isi_tp")
            )
            ->groupBy('modul_ajars.kode_cp', 'capaian_pembelajarans.element')
            ->get();

        // Query untuk jurnal dan elemen
        $journals = DB::table('jurnal_pkls')
            ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
            ->select(
                'penempatan_prakerins.nis',
                'jurnal_pkls.element',
                DB::raw("COUNT(jurnal_pkls.id) as total_jurnal_cp")
            )
            ->groupBy('penempatan_prakerins.nis', 'jurnal_pkls.element')
            ->get();


        // Gabungkan data absensi dan jurnal
        $data = $data->map(function ($siswa) use ($jumlahJurnal, $elements, $journals) {
            $nis = $siswa->nis;

            // Jumlah jurnal total
            $siswa->total_jurnal = $jumlahJurnal[$nis]->total_jurnal ?? 0;

            // Gabungkan elemen dengan jurnal
            $siswa->jurnal_per_elemen = $elements->map(function ($element) use ($journals, $nis) {
                $kode_cp = $element->kode_cp;

                // Ambil jumlah jurnal dari hasil query jurnal
                $jurnal = $journals->where('nis', $nis)->where('element', $kode_cp)->first();

                return [
                    'element' => $element->element,
                    'isi_tp' => $element->isi_tp,
                    'total_jurnal_cp' => $jurnal->total_jurnal_cp ?? 0 // Default 0 jika tidak ada jurnal
                ];
            });

            return $siswa;
        });

        return $absensiBimbinganDataTable->render("pages.pembimbingpkl.absensi-bimbingan", compact('data'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_personil = Auth::user()->personal_id;
        // Query untuk mendapatkan data siswa terbimbing
        // Query untuk mendapatkan data siswa terbimbing
        $siswaterbimbingOptions = DB::table('pembimbing_prakerins')
            ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'penempatan_prakerins.nis', '=', 'peserta_didik_rombels.nis')
            ->select(
                'penempatan_prakerins.nis as id', // ID siswa sebagai value
                DB::raw("CONCAT(peserta_didik_rombels.rombel_nama, ' - ', peserta_didiks.nis, ' - ', peserta_didiks.nama_lengkap) as name") // Gabungkan NIS dan nama lengkap
            )
            ->where('pembimbing_prakerins.id_personil', $id_personil)
            ->get()
            ->pluck('name', 'id') // Pluck untuk membuat key-value array
            ->toArray();

        return view('pages.pembimbingpkl.absensi-bimbingan-form', [
            'data' => new AbsensiSiswaPkl(),
            'siswaterbimbingOptions' => $siswaterbimbingOptions,
            'action' => route('pembimbingpkl.absensi-bimbingan.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AbsensiPembimbingPklRequest $request)
    {
        $absensiPembimbingPkl = new AbsensiSiswaPkl($request->validated());
        $absensiPembimbingPkl->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(AbsensiPembimbingPkl $absensiPembimbingPkl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbsensiPembimbingPkl $absensiPembimbingPkl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AbsensiPembimbingPklRequest $request, AbsensiPembimbingPkl $absensiPembimbingPkl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbsensiPembimbingPkl $absensiPembimbingPkl)
    {
        //
    }

    // Fungsi untuk menyimpan absensi
    public function simpanAbsensi(Request $request)
    {
        // Validasi data yang diterima
        // Validasi data yang diterima
        $validated = $request->validate([
            'nis' => 'required|string',
            'tanggal' => 'required|date',
            'status' => 'required|in:HADIR,SAKIT,IZIN,ALFA',
        ]);

        // Simpan data menggunakan create()
        AbsensiSiswaPkl::create([
            'nis' => $validated['nis'],
            'tanggal' => $validated['tanggal'],
            'status' => $validated['status'],
        ]);

        // Setelah berhasil disimpan, kembalikan respons sukses
        return redirect()->back()->with('success', 'Absensi berhasil disimpan');
    }
}
