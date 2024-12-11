<?php

namespace App\Http\Controllers\Kurikulum\DokumenSiswa;

use App\Http\Controllers\Controller;
use App\Models\ManajemenSekolah\IdentitasSekolah;
use App\Models\ManajemenSekolah\KepalaSekolah;
use App\Models\ManajemenSekolah\PesertaDidikOrtu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;

class CetakRaporController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //sample
        $nis = "1202215552";
        $tahunAjaran = "2024-2025";
        $seMester = "Ganjil";

        // Query untuk mengambil data siswa dan keahlian
        $dataSiswa = DB::table('peserta_didiks')
            ->select(
                'peserta_didiks.*',
                'bidang_keahlians.nama_bk',
                'program_keahlians.nama_pk',
                'kompetensi_keahlians.nama_kk',
                'peserta_didik_rombels.tahun_ajaran',
                'peserta_didik_rombels.rombel_tingkat',
                'peserta_didik_rombels.rombel_kode',
                'peserta_didik_rombels.rombel_nama',
            )
            ->join('kompetensi_keahlians', 'peserta_didiks.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->join('program_keahlians', 'kompetensi_keahlians.id_pk', '=', 'program_keahlians.idpk')
            ->join('bidang_keahlians', 'kompetensi_keahlians.id_bk', '=', 'bidang_keahlians.idbk')
            ->join('peserta_didik_rombels', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->where('peserta_didiks.nis', $nis)
            ->where('peserta_didik_rombels.tahun_ajaran', $tahunAjaran)
            ->first();
        // Pastikan data ditemukan
        if (!$dataSiswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan.');
        }

        // Ambil data Orang Tua
        $siswaOrtu = PesertaDidikOrtu::where('nis', $nis)->first();

        // Pastikan data ditemukan
        if (!$siswaOrtu) {
            return redirect()->back()->with('error', 'Data Orang Tua tidak ditemukan.');
        }

        // Ambil data identitas sekolah
        $school = IdentitasSekolah::first();

        // Pastikan data ditemukan
        if (!$school) {
            return redirect()->back()->with('error', 'Data sekolah tidak ditemukan.');
        }

        // Ambil data identitas sekolah
        $kepsekCover = KepalaSekolah::where('tahunajaran', $dataSiswa->thnajaran_masuk)
            ->where('semester', 'Ganjil')
            ->first();

        // Pastikan data ditemukan
        if (!$kepsekCover) {
            return redirect()->back()->with('error', 'Data sekolah tidak ditemukan.');
        }


        $barcode = new DNS1D();
        $barcode->setStorPath(public_path('barcode/'));

        // URL yang ingin dijadikan barcode
        $url = "https://smkn1kadipaten.sch.id";

        // Generate barcode dalam format PNG
        $barcodeImage = $barcode->getBarcodePNG($url, 'C128', 1, 33);

        // Generate QR Code
        $qrcode = new DNS2D();
        $qrcodeImage = $qrcode->getBarcodePNG("https://smkn1kadipaten.sch.id/kurikulum/dokumentsiswa/cetak-rapor", 'QRCODE', 5, 5);


        return view('pages.kurikulum.dokumensiswa.cetak-rapor', [
            'school' => $school,
            'barcodeImage' => $barcodeImage,
            'qrcodeImage' => $qrcodeImage,
            'dataSiswa' => $dataSiswa,
            'siswaOrtu' => $siswaOrtu,
            'kepsekCover' => $kepsekCover,
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
