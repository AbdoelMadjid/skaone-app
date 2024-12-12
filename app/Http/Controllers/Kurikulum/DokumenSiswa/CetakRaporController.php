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
use Illuminate\Support\Facades\Log;

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

        // Pastikan data  siswa ditemukan
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


        // BARCOOOOOOOOOOOOOOOOOOOOOOOOOOOOD
        $barcode = new DNS1D();
        $barcode->setStorPath(public_path('barcode/'));

        // URL yang ingin dijadikan barcode
        $url = "https://smkn1kadipaten.sch.id";

        // Generate barcode dalam format PNG
        $barcodeImage = $barcode->getBarcodePNG($url, 'C128', 1, 33);

        // Generate QR Code
        $qrcode = new DNS2D();
        $qrcodeImage = $qrcode->getBarcodePNG("https://smkn1kadipaten.sch.id/kurikulum/dokumentsiswa/cetak-rapor", 'QRCODE', 5, 5);



        //nilai-raport eung
        $dataNilai = DB::select("
           SELECT
                kbm_per_rombels.id_personil,
                personil_sekolahs.gelardepan,
                personil_sekolahs.namalengkap,
                personil_sekolahs.gelarbelakang,
                kbm_per_rombels.kode_rombel,
                kbm_per_rombels.rombel,
                kbm_per_rombels.tingkat,
                kbm_per_rombels.kel_mapel,
                mata_pelajarans.mata_pelajaran,
                mata_pelajarans.kelompok,
                mata_pelajarans.kode,
                peserta_didik_rombels.nis,
                peserta_didiks.nama_lengkap,
                nilai_formatif.tp_isi_1,
                nilai_formatif.tp_isi_2,
                nilai_formatif.tp_isi_3,
                nilai_formatif.tp_isi_4,
                nilai_formatif.tp_isi_5,
                nilai_formatif.tp_isi_6,
                nilai_formatif.tp_isi_7,
                nilai_formatif.tp_isi_8,
                nilai_formatif.tp_isi_9,
                nilai_formatif.tp_nilai_1,
                nilai_formatif.tp_nilai_2,
                nilai_formatif.tp_nilai_3,
                nilai_formatif.tp_nilai_4,
                nilai_formatif.tp_nilai_5,
                nilai_formatif.tp_nilai_6,
                nilai_formatif.tp_nilai_7,
                nilai_formatif.tp_nilai_8,
                nilai_formatif.tp_nilai_9,
                nilai_formatif.rerata_formatif,
                nilai_sumatif.sts,
                nilai_sumatif.sas,
                nilai_sumatif.kel_mapel AS kel_mapel_sumatif,
                nilai_sumatif.rerata_sumatif,
                ((COALESCE(nilai_formatif.rerata_formatif, 0) + COALESCE(nilai_sumatif.rerata_sumatif, 0)) / 2) AS nilai_na
            FROM kbm_per_rombels
                INNER JOIN peserta_didik_rombels ON kbm_per_rombels.kode_rombel = peserta_didik_rombels.rombel_kode
                INNER JOIN peserta_didiks ON peserta_didik_rombels.nis = peserta_didiks.nis
                INNER JOIN personil_sekolahs ON kbm_per_rombels.id_personil=personil_sekolahs.id_personil
                INNER JOIN mata_pelajarans ON kbm_per_rombels.kel_mapel=mata_pelajarans.kel_mapel
            LEFT JOIN nilai_formatif ON peserta_didik_rombels.nis = nilai_formatif.nis AND kbm_per_rombels.kel_mapel=nilai_formatif.kel_mapel
                AND nilai_formatif.nis = '1202215552'
                AND nilai_formatif.kode_rombel = '202441112-12RPL1'
                AND nilai_formatif.tingkat= '12'
                AND nilai_formatif.tahunajaran ='2024-2025'
                AND nilai_formatif.ganjilgenap='Ganjil'
            LEFT JOIN nilai_sumatif ON peserta_didik_rombels.nis = nilai_sumatif.nis AND kbm_per_rombels.kel_mapel=nilai_sumatif.kel_mapel
                AND nilai_sumatif.nis = '1202215552'
                AND nilai_sumatif.kode_rombel = '202441112-12RPL1'
                AND nilai_formatif.tingkat= '12'
                AND nilai_formatif.tahunajaran ='2024-2025'
                AND nilai_formatif.ganjilgenap='Ganjil'
            WHERE
                peserta_didik_rombels.nis = '1202215552'
                AND kbm_per_rombels.kode_rombel = '202441112-12RPL1'
                AND kbm_per_rombels.tahunajaran = '2024-2025'
                AND kbm_per_rombels.tingkat='12'
                AND kbm_per_rombels.ganjilgenap ='Ganjil'
            ORDER BY kbm_per_rombels.kel_mapel
        ");

        /* // Misal, mengambil elemen pertama dari $dataNilai
        $nilai = $dataNilai[0];

        // Ambil jumlah TP dari tabel tujuan_pembelajarans
        $jumlahTP = DB::table('tujuan_pembelajarans')
            ->where('kode_rombel', $nilai->kode_rombel)
            ->where('kel_mapel', $nilai->kel_mapel)
            ->where('id_personil', $nilai->id_personil)
            ->count(); */



        $dataNilai = collect($dataNilai)->map(function ($nilai) {
            $jumlahTP = DB::table('tujuan_pembelajarans')
                ->where('kode_rombel', $nilai->kode_rombel)
                ->where('kel_mapel', $nilai->kel_mapel)
                ->where('id_personil', $nilai->id_personil)
                ->count();

            // Log jumlah TP untuk debugging
            Log::info('Jumlah TP untuk ' . $nilai->kel_mapel . ': ' . $jumlahTP);

            // Tambahkan jumlah TP ke objek nilai
            $nilai->jumlahTP = $jumlahTP;

            // Ambil hanya nilai TP sesuai jumlah TP
            $tp_nilai = array_slice([
                $nilai->tp_nilai_1,
                $nilai->tp_nilai_2,
                $nilai->tp_nilai_3,
                $nilai->tp_nilai_4,
                $nilai->tp_nilai_5,
                $nilai->tp_nilai_6,
                $nilai->tp_nilai_7,
                $nilai->tp_nilai_8,
                $nilai->tp_nilai_9
            ], 0, $jumlahTP);

            // Ambil hanya deskripsi TP sesuai jumlah TP
            $tp_isi = array_slice([
                $nilai->tp_isi_1,
                $nilai->tp_isi_2,
                $nilai->tp_isi_3,
                $nilai->tp_isi_4,
                $nilai->tp_isi_5,
                $nilai->tp_isi_6,
                $nilai->tp_isi_7,
                $nilai->tp_isi_8,
                $nilai->tp_isi_9
            ], 0, $jumlahTP);

            // Pastikan $tp_nilai tidak kosong
            if (!empty($tp_nilai)) {
                // Nilai tertinggi dan terendah
                $nilaiTertinggi = max($tp_nilai);
                $nilaiTerendah = min($tp_nilai);

                // TP ke berapa
                $tpTertinggi = [];
                $tpTerendah = [];

                foreach ($tp_nilai as $index => $nilai_tp) {
                    if ($nilai_tp == $nilaiTertinggi) {
                        $tpTertinggi[] = $index + 1;
                    }
                    if ($nilai_tp == $nilaiTerendah) {
                        $tpTerendah[] = $index + 1;
                    }
                }

                // Deskripsi berdasarkan TP tertinggi dan terendah
                $deskripsiTertinggi = [];
                $deskripsiTerendah = [];

                foreach ($tpTertinggi as $tp) {
                    $deskripsiTertinggi[] = "Menunjukkan kemampuan dalam " . ($tp_isi[$tp - 1] ?? '(deskripsi tidak tersedia)');
                }

                foreach ($tpTerendah as $tp) {
                    $deskripsiTerendah[] = "Masih perlu bimbingan dalam " . ($tp_isi[$tp - 1] ?? '(deskripsi tidak tersedia)');
                }

                $nilai->deskripsi = implode('<br>', $deskripsiTertinggi) . '<br>' . implode('<br>', $deskripsiTerendah);
            } else {
                $nilai->deskripsi = "Tidak ada nilai TP.";
            }

            return $nilai;
        });



        return view('pages.kurikulum.dokumensiswa.cetak-rapor', [
            'school' => $school,
            'barcodeImage' => $barcodeImage,
            'qrcodeImage' => $qrcodeImage,
            'dataSiswa' => $dataSiswa,
            'siswaOrtu' => $siswaOrtu,
            'kepsekCover' => $kepsekCover,
            'dataNilai' => $dataNilai,
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
