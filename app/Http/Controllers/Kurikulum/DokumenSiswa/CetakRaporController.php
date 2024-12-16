<?php

namespace App\Http\Controllers\Kurikulum\DokumenSiswa;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\Kurikulum\DokumenSiswa\PilihCetakRapor;
use App\Models\ManajemenSekolah\IdentitasSekolah;
use App\Models\ManajemenSekolah\KepalaSekolah;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\PesertaDidik;
use App\Models\ManajemenSekolah\PesertaDidikOrtu;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\WaliKelas\Ekstrakurikuler;
use App\Models\WaliKelas\PrestasiSiswa;
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

        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();

        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        $semester = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
            ->first();

        if (!$semester) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();
        $personilSekolah = PersonilSekolah::pluck('namalengkap', 'id_personil')->toArray();
        $pesertadidikOptions = PesertaDidik::select('nis', 'nama_lengkap')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->nis => $item->nis . ' - ' . $item->nama_lengkap];
            })
            ->toArray();
        $dataPilCR = PilihCetakRapor::where('id_personil', $personal_id)->first();

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
                'peserta_didik_ortus.status',
                'peserta_didik_ortus.nm_ayah',
                'peserta_didik_ortus.nm_ibu',
                'peserta_didik_ortus.pekerjaan_ayah',
                'peserta_didik_ortus.pekerjaan_ibu',
                'peserta_didik_ortus.ortu_alamat_blok',
                'peserta_didik_ortus.ortu_alamat_norumah',
                'peserta_didik_ortus.ortu_alamat_rt',
                'peserta_didik_ortus.ortu_alamat_rw',
                'peserta_didik_ortus.ortu_alamat_desa',
                'peserta_didik_ortus.ortu_alamat_kec',
                'peserta_didik_ortus.ortu_alamat_kab',
                'peserta_didik_ortus.ortu_alamat_kodepos',
                'peserta_didik_ortus.ortu_kontak_telepon',
                'peserta_didik_ortus.ortu_kontak_email',
            )
            ->join('kompetensi_keahlians', 'peserta_didiks.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->join('program_keahlians', 'kompetensi_keahlians.id_pk', '=', 'program_keahlians.idpk')
            ->join('bidang_keahlians', 'kompetensi_keahlians.id_bk', '=', 'bidang_keahlians.idbk')
            ->join('peserta_didik_rombels', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->leftJoin('peserta_didik_ortus', 'peserta_didiks.nis', '=', 'peserta_didik_ortus.nis')
            ->where('peserta_didiks.nis', $dataPilCR->nis)
            ->where('peserta_didik_rombels.tahun_ajaran', $dataPilCR->tahunajaran)
            ->first();

        if (!$dataSiswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan.');
        }

        $school = IdentitasSekolah::first();

        $kepsekCover = KepalaSekolah::where('tahunajaran', $dataSiswa->thnajaran_masuk)
            ->where('semester', 'Ganjil')
            ->first();

        /* if (!$kepsekCover) {
            return redirect()->back()->with('error', 'Data sekolah tidak ditemukan.');
        } */

        $kepsekttd = KepalaSekolah::where('tahunajaran', $dataPilCR->tahunajaran)
            ->where('semester', $dataPilCR->semester)
            ->first();

        $waliKelas = DB::table('wali_kelas')
            ->select(
                'wali_kelas.*',
                'personil_sekolahs.nip',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang'
            )
            ->join('personil_sekolahs', 'wali_kelas.wali_kelas', '=', 'personil_sekolahs.id_personil')
            ->where('wali_kelas.tahunajaran', $dataPilCR->tahunajaran)
            ->where('wali_kelas.kode_rombel', $dataPilCR->kode_rombel)
            ->first();

        $titiMangsa = DB::table('titi_mangsas')
            ->where('tahunajaran', $dataPilCR->tahunajaran)
            ->where('ganjilgenap', $dataPilCR->semester)
            ->where('kode_rombel', $dataPilCR->kode_rombel)
            ->first();

        $catatanWaliKelas = DB::table('catatan_wali_kelas')
            ->where('tahunajaran', $dataPilCR->tahunajaran)
            ->where('ganjilgenap', $dataPilCR->semester)
            ->where('kode_rombel', $dataPilCR->kode_rombel)
            ->where('nis', $dataPilCR->nis)
            ->first();

        $absensiSiswa = DB::table('absensi_siswas')
            ->where('nis', $dataPilCR->nis)
            ->where('tahunajaran', $dataPilCR->tahunajaran)
            ->where('ganjilgenap', $dataPilCR->semester)
            ->where('kode_rombel', $dataPilCR->kode_rombel)
            ->first();

        $prestasiSiswas = PrestasiSiswa::where('kode_rombel', $dataPilCR->kode_rombel)
            ->where('tahunajaran', $dataPilCR->tahunajaran)
            ->where('ganjilgenap', $dataPilCR->semester)
            ->where('nis', $dataPilCR->nis)
            ->get();

        // Fetch data based on filters
        $ekstrakurikulers = Ekstrakurikuler::where('kode_rombel', $dataPilCR->kode_rombel)
            ->where('tahunajaran', $dataPilCR->tahunajaran)
            ->where('ganjilgenap', $dataPilCR->semester)
            ->where('nis', $dataPilCR->nis)
            ->get();

        // Prepare data for view
        $activities = [];

        foreach ($ekstrakurikulers as $ekstra) {
            if (!empty($ekstra->wajib)) {
                $activities[] = [
                    'activity' => $ekstra->wajib,
                    'description' => $ekstra->wajib_desk,
                ];
            }

            if (!empty($ekstra->pilihan1)) {
                $activities[] = [
                    'activity' => $ekstra->pilihan1,
                    'description' => $ekstra->pilihan1_desk,
                ];
            }

            if (!empty($ekstra->pilihan2)) {
                $activities[] = [
                    'activity' => $ekstra->pilihan2,
                    'description' => $ekstra->pilihan2_desk,
                ];
            }

            if (!empty($ekstra->pilihan3)) {
                $activities[] = [
                    'activity' => $ekstra->pilihan3,
                    'description' => $ekstra->pilihan3_desk,
                ];
            }

            if (!empty($ekstra->pilihan4)) {
                $activities[] = [
                    'activity' => $ekstra->pilihan4,
                    'description' => $ekstra->pilihan4_desk,
                ];
            }
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
                AND nilai_formatif.nis = ?
                AND nilai_formatif.kode_rombel = ?
                AND nilai_formatif.tingkat = ?
                AND nilai_formatif.tahunajaran = ?
                AND nilai_formatif.ganjilgenap = ?
            LEFT JOIN nilai_sumatif ON peserta_didik_rombels.nis = nilai_sumatif.nis AND kbm_per_rombels.kel_mapel=nilai_sumatif.kel_mapel
                AND nilai_sumatif.nis = ?
                AND nilai_sumatif.kode_rombel = ?
                AND nilai_formatif.tingkat = ?
                AND nilai_formatif.tahunajaran = ?
                AND nilai_formatif.ganjilgenap = ?
            WHERE
                peserta_didik_rombels.nis = ?
                AND kbm_per_rombels.kode_rombel = ?
                AND kbm_per_rombels.tingkat = ?
                AND kbm_per_rombels.tahunajaran = ?
                AND kbm_per_rombels.ganjilgenap = ?
            ORDER BY kbm_per_rombels.kel_mapel
        ", [
            $dataPilCR->nis,
            $dataPilCR->kode_rombel,
            $dataPilCR->tingkat,
            $dataPilCR->tahunajaran,
            $dataPilCR->semester,
            $dataPilCR->nis,
            $dataPilCR->kode_rombel,
            $dataPilCR->tingkat,
            $dataPilCR->tahunajaran,
            $dataPilCR->semester,
            $dataPilCR->nis,
            $dataPilCR->kode_rombel,
            $dataPilCR->tingkat,
            $dataPilCR->tahunajaran,
            $dataPilCR->semester,
        ]);

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
                $deskripsi[] = "Masih perlu bimbingan dalam {$tpIsi[$tp]} (TP ke-{$tp})";
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
            //'siswaOrtu' => $siswaOrtu,
            'kepsekCover' => $kepsekCover,
            'dataNilai' => $dataNilai,
            'firstNilai' => $firstNilai,
            'dataPilCR' => $dataPilCR,
            'kepsekttd' => $kepsekttd,
            'waliKelas' => $waliKelas,
            'titiMangsa' => $titiMangsa,
            'absensiSiswa' => $absensiSiswa,
            'activities' => $activities,
            'catatanWaliKelas' => $catatanWaliKelas,
            'prestasiSiswas' => $prestasiSiswas,
            'personilSekolah' => $personilSekolah,
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
            ->get(['rombel', 'kode_rombel']);

        return response()->json($rombonganBelajar);
    }

    public function getPesertaDidik(Request $request)
    {
        $tahunajaran = $request->query('tahunajaran');
        $kode_kk = $request->query('kode_kk');
        $tingkat = $request->query('tingkat');
        $kode_rombel = $request->query('kode_rombel');

        $pesertadidikOptions = DB::table('peserta_didik_rombels')
            ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->select('peserta_didik_rombels.nis', 'peserta_didiks.nama_lengkap')
            ->where('peserta_didik_rombels.tahun_ajaran', $tahunajaran)
            ->where('peserta_didik_rombels.kode_kk', $kode_kk)
            ->where('peserta_didik_rombels.rombel_tingkat', $tingkat)
            ->where('peserta_didik_rombels.rombel_kode', $kode_rombel)
            ->get(['nama_lengkap', 'nis']);

        return response()->json($pesertadidikOptions);
    }

    public function simpanPilihCetakRapor(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'id_personil' => 'required|string',
            'tahunajaran' => 'required|string',
            'semester' => 'required|string',
            'kode_kk' => 'required|string',
            'tingkat' => 'required|string',
            'kode_rombel' => 'required|string',
            'nis' => 'required|string',
        ]);

        // Cek apakah data sudah ada di tabel titi_mangsas
        $pilihcetak = DB::table('pilih_cetak_rapors')
            ->where('id_personil', $request->id_personil)
            ->first();

        // Jika data sudah ada, lakukan update
        if ($pilihcetak) {
            DB::table('pilih_cetak_rapors')
                ->where('id_personil', $pilihcetak->id_personil)
                ->update([
                    'tahunajaran' => $validatedData['tahunajaran'],
                    'semester' => $validatedData['semester'],
                    'kode_kk' => $validatedData['kode_kk'],
                    'tingkat' => $validatedData['tingkat'],
                    'kode_rombel' => $validatedData['kode_rombel'],
                    'nis' => $validatedData['nis'],
                    'updated_at' => now(),
                ]);
            return redirect()->back()->with('toast_success', 'Data berhasil diperbarui.');
        }

        // Jika belum ada, lakukan insert
        DB::table('pilih_cetak_rapors')->insert([
            'id_personil' => $validatedData['id_personil'],
            'tahunajaran' => $validatedData['tahunajaran'],
            'semester' => $validatedData['semester'],
            'kode_kk' => $validatedData['kode_kk'],
            'tingkat' => $validatedData['tingkat'],
            'kode_rombel' => $validatedData['kode_rombel'],
            'nis' => $validatedData['nis'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('toast_success', 'Data berhasil disimpan.');
    }
}
