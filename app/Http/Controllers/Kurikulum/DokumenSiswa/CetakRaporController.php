<?php

namespace App\Http\Controllers\Kurikulum\DokumenSiswa;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\Kurikulum\DokumenSiswa\PilihCetakRapor;
use App\Models\ManajemenSekolah\IdentitasSekolah;
use App\Models\ManajemenSekolah\KepalaSekolah;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PesertaDidik;
use App\Models\ManajemenSekolah\PesertaDidikOrtu;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $user = Auth::user();
        $personal_id = $user->personal_id;

        // Retrieve the active academic year
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();

        // Check if an active academic year is found
        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Retrieve the active semester related to the active academic year
        $semester = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
            ->first();

        // Check if an active semester is found
        if (!$semester) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();

        $pesertadidikOptions = PesertaDidik::pluck('nama_lengkap', 'nis')->toArray();

        $dataPilCR = PilihCetakRapor::where('id_personil', $personal_id)->first();

        //sample
        $niss = "1202215552";
        $tahunAjaran = $tahunAjaranAktif->tahunajaran;
        $seMester = $semester->semester;

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
            ->where('peserta_didiks.nis', $niss)
            ->where('peserta_didik_rombels.tahun_ajaran', $tahunAjaran)
            ->first();

        // Pastikan data  siswa ditemukan
        if (!$dataSiswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan.');
        }

        // Ambil data Orang Tua
        $siswaOrtu = PesertaDidikOrtu::where('nis', $niss)->first();

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
                kbm_per_rombels.semester,
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

        // Ambil elemen pertama jika hanya satu data yang perlu diakses
        $firstNilai = $dataNilai[0] ?? null;

        foreach ($dataNilai as $nilai) {
            $jumlahTP = DB::table('tujuan_pembelajarans')
                ->where('kode_rombel', $nilai->kode_rombel)
                ->where('kel_mapel', $nilai->kel_mapel)
                ->where('id_personil', $nilai->id_personil)
                ->count();

            $rerataFormatif = $nilai->rerata_formatif;
            $tpNilai = [];
            $tpIsi = [];

            // Loop untuk mengumpulkan nilai TP dan isi TP
            for ($i = 1; $i <= $jumlahTP; $i++) {
                $tpNilai[$i] = $nilai->{'tp_nilai_' . $i};
                $tpIsi[$i] = $nilai->{'tp_isi_' . $i};
            }

            // Jika tujuan pembelajaran atau nilai formatif kosong, kosongkan data deskripsi
            if (empty($tpNilai) || $jumlahTP === 0 || is_null($rerataFormatif)) {
                $nilai->nilai_tertinggi = null;
                $nilai->nilai_terendah = null;
                $nilai->deskripsi_nilai = null;
                continue;
            }

            // Jika semua TP nilai sama, kosongkan data deskripsi
            if (count(array_unique($tpNilai)) === 1) {
                $nilai->nilai_tertinggi = null;
                $nilai->nilai_terendah = null;
                $nilai->deskripsi_nilai = null;
                continue;
            }

            // Cari nilai tertinggi dan terendah
            $maxValue = max($tpNilai);
            $minValue = min($tpNilai);

            // TP dengan nilai tertinggi dan terendah
            $tpMax = array_keys($tpNilai, $maxValue);
            $tpMin = array_keys($tpNilai, $minValue);

            // Deskripsi nilai berdasarkan nilai TP
            $deskripsi = [];

            /* foreach ($tpMax as $tp) {
                $deskripsi[] = "Menunjukkan kemampuan dalam {$tpIsi[$tp]} (TP ke-{$tp})";
            }

            foreach ($tpMin as $tp) {
                $deskripsi[] = "Masih perlu bimbingan dalam {$tpIsi[$tp]} (TP ke-{$tp})";
            } */

            foreach ($tpMax as $tp) {
                $deskripsi[] = "Menunjukkan kemampuan dalam {$tpIsi[$tp]} (TP ke-{$tp})";
            }

            foreach ($tpMin as $tp) {
                $deskripsi[] = "<br>" . "Masih perlu bimbingan dalam {$tpIsi[$tp]} (TP ke-{$tp})";
            }

            // Simpan ke dalam objek data nilai
            $nilai->nilai_tertinggi = "NT : " . "{$maxValue} (TP ke-" . implode(', TP ke-', $tpMax) . ")";
            $nilai->nilai_terendah = "NR : " . "{$minValue} (TP ke-" . implode(', TP ke-', $tpMin) . ")";
            $nilai->deskripsi_nilai = implode(', ', $deskripsi);
        }

        return view('pages.kurikulum.dokumensiswa.cetak-rapor', [
            'personal_id' => $personal_id,
            'tahunAjaranAktif' => $tahunAjaranAktif,
            'semester' => $semester,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'pesertadidikOptions' => $pesertadidikOptions,
            'school' => $school,
            'barcodeImage' => $barcodeImage,
            'qrcodeImage' => $qrcodeImage,
            'dataSiswa' => $dataSiswa,
            'siswaOrtu' => $siswaOrtu,
            'kepsekCover' => $kepsekCover,
            'dataNilai' => $dataNilai,
            'firstNilai' => $firstNilai,
            'dataPilCR' => $dataPilCR,
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
        $validatedData = $request->validate([
            'id_personil' => 'required|string',
            'tahunajaran' => 'required|string',
            'semester' => 'required|string',
            'kode_kk' => 'required|string',
            'tingkat' => 'required|string',
            'kode_rombel' => 'required|string',
            'kode_peserta_didik' => 'required|string',
        ]);

        PilihCetakRapor::create([
            'id_personil' => $validatedData['id_personil'],
            'tahunajaran' => $validatedData['tahunajaran'],
            'semester' => $validatedData['semester'],
            'kode_kk' => $validatedData['kode_kk'],
            'tingkat' => $validatedData['tingkat'],
            'kode_rombel' => $validatedData['kode_rombel'],
            'nis' => $validatedData['kode_peserta_didik'],
        ]);

        return redirect()->back()->with('toast_success', 'Data berhasil disimpan!');
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

    public function getKodeRombel(Request $request)
    {
        $tahunAjaran = $request->query('tahunajaran');
        $kodeKk = $request->query('kode_kk');
        $tingkat = $request->query('tingkat');

        $rombonganBelajar = RombonganBelajar::where('tahunajaran', $tahunAjaran)
            ->where('id_kk', $kodeKk)
            ->where('tingkat', $tingkat)
            ->get(['rombel', 'kode_rombel']); // Pilih hanya kolom yang diperlukan

        return response()->json($rombonganBelajar);
    }

    public function getPesertaDidikOptions(Request $request)
    {
        $tahunajaran = $request->tahunajaran;
        $kode_kk = $request->kode_kk;
        $tingkat = $request->tingkat;
        $kode_rombel = $request->kode_rombel;

        $pesertadidikOptions = DB::table('peserta_didik_rombels')
            ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->select('peserta_didik_rombels.nis', 'peserta_didiks.nama_lengkap')
            ->where('peserta_didik_rombels.tahun_ajaran', $tahunajaran)
            ->where('peserta_didik_rombels.kode_kk', $kode_kk)
            ->where('peserta_didik_rombels.rombel_tingkat', $tingkat)
            ->where('peserta_didik_rombels.rombel_kode', $kode_rombel)
            ->get();

        return response()->json($pesertadidikOptions);
    }
}
