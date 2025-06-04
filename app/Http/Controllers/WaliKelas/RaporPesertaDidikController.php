<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\ManajemenSekolah\IdentitasSekolah;
use App\Models\ManajemenSekolah\KepalaSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\WaliKelas\Ekstrakurikuler;
use App\Models\WaliKelas\PrestasiSiswa;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
use Illuminate\Support\Facades\DB;

class RaporPesertaDidikController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil tahun ajaran yang aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')
            ->with(['semesters' => function ($query) {
                $query->where('status', 'Aktif');
            }])
            ->first();

        // Pastikan tahun ajaran aktif ada sebelum melanjutkan
        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Ambil wali kelas berdasarkan personal_id dari user yang sedang login dan tahun ajaran aktif
        $waliKelas = DB::table('rombongan_belajars')
            ->where('wali_kelas', $user->personal_id)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->first();

        // Jika wali kelas ditemukan, ambil data personil dan hitung semester angka
        $personil = null;
        $semesterAngka = null;

        if ($waliKelas) {
            // Ambil data personil
            $personil = DB::table('personil_sekolahs')
                ->where('id_personil', $waliKelas->wali_kelas)
                ->first();

            // Menentukan angka semester berdasarkan semester aktif dan tingkat
            $semesterAktif = $tahunAjaranAktif->semesters->first()->semester ?? null;

            if ($semesterAktif) {
                if ($semesterAktif === 'Ganjil') {
                    if ($waliKelas->tingkat == 10) {
                        $semesterAngka = 1;
                    } elseif ($waliKelas->tingkat == 11) {
                        $semesterAngka = 3;
                    } elseif ($waliKelas->tingkat == 12) {
                        $semesterAngka = 5;
                    }
                } elseif ($semesterAktif === 'Genap') {
                    if ($waliKelas->tingkat == 10) {
                        $semesterAngka = 2;
                    } elseif ($waliKelas->tingkat == 11) {
                        $semesterAngka = 4;
                    } elseif ($waliKelas->tingkat == 12) {
                        $semesterAngka = 6;
                    }
                }
            }
            // Ambil data dari tabel kbm_per_rombels berdasarkan kode_rombel
            $kbmData = DB::table('kbm_per_rombels')
                ->where('kode_rombel', $waliKelas->kode_rombel)
                ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
                ->where('ganjilgenap', $semesterAktif)
                ->get();

            // Ambil data siswa berdasarkan tahun ajaran, kode rombel, dan tingkat
            $siswaData = DB::table('peserta_didik_rombels')
                ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
                ->where('peserta_didik_rombels.tahun_ajaran', $tahunAjaranAktif->tahunajaran)
                ->where('peserta_didik_rombels.rombel_kode', $waliKelas->kode_rombel)
                ->where('peserta_didik_rombels.rombel_tingkat', $waliKelas->tingkat)
                ->select(
                    'peserta_didik_rombels.nis',
                    'peserta_didiks.nama_lengkap',
                    'peserta_didiks.jenis_kelamin',
                    'peserta_didiks.foto',
                    'peserta_didiks.kontak_email'
                )
                ->get();
        } else {
            $kbmData = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
            $siswaData = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
        }

        // Ambil data titi_mangsa jika sudah ada untuk wali kelas dan tahun ajaran aktif
        $titimangsa = DB::table('titi_mangsas')
            ->where('kode_rombel', $waliKelas->kode_rombel ?? '')
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semesterAktif)
            ->first();

        $nilaiRataSiswa = DB::select("
            SELECT
                pd.nis,
                pd.nama_lengkap,
                ROUND(AVG(COALESCE(((COALESCE(nf.rerata_formatif, 0) + COALESCE(ns.rerata_sumatif, 0)) / 2), 0)), 2) AS nil_rata_siswa
            FROM
                peserta_didik_rombels pr
            INNER JOIN
                peserta_didiks pd ON pr.nis = pd.nis
            INNER JOIN
                kbm_per_rombels kr ON pr.rombel_kode = kr.kode_rombel
            LEFT JOIN
                nilai_formatif nf ON pr.nis = nf.nis
                    AND kr.kel_mapel = nf.kel_mapel
                    AND kr.tahunajaran = nf.tahunajaran
                    AND kr.ganjilgenap = nf.ganjilgenap
            LEFT JOIN
                nilai_sumatif ns ON pr.nis = ns.nis
                    AND kr.kel_mapel = ns.kel_mapel
                    AND kr.tahunajaran = ns.tahunajaran
                    AND kr.ganjilgenap = ns.ganjilgenap
            WHERE
                pr.rombel_kode = ?
                AND kr.tahunajaran = ?
                AND kr.ganjilgenap = ?
            GROUP BY
                pd.nis, pd.nama_lengkap
            ORDER BY
                nil_rata_siswa DESC
        ", [
            $waliKelas->kode_rombel,
            $tahunAjaranAktif->tahunajaran,
            $semesterAktif,
        ]);

        return view(
            'pages.walikelas.rapor-peserta-didik',
            compact(
                'tahunAjaranAktif',
                'waliKelas',
                'personil',
                'semesterAngka',
                'titimangsa',
                'kbmData',
                'siswaData',
                'nilaiRataSiswa'
            )
        );
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
    public function show(string $nis)
    {

        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil tahun ajaran yang aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = null;

        if ($tahunAjaranAktif) {
            $semesterAktif = Semester::where('status', 'Aktif')
                ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
                ->first();
        }

        // Ambil wali kelas berdasarkan personal_id dari user yang sedang login dan tahun ajaran aktif
        $waliKelas = DB::table('rombongan_belajars')
            ->select(
                'rombongan_belajars.*',
                'personil_sekolahs.id_personil',
                'personil_sekolahs.nip',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang'
            )
            ->join('personil_sekolahs', 'rombongan_belajars.wali_kelas', '=', 'personil_sekolahs.id_personil')
            ->where('rombongan_belajars.wali_kelas', $user->personal_id)
            ->where('rombongan_belajars.tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->first();


        $kbmData = DB::table('kbm_per_rombels')
            ->where('kode_rombel', $waliKelas->kode_rombel)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semesterAktif->semester)
            ->first();

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
            ->where('peserta_didiks.nis', $nis)
            ->where('peserta_didik_rombels.tahun_ajaran', $waliKelas->tahunajaran)
            ->first();

        $school = IdentitasSekolah::first();

        $kepsekCover = KepalaSekolah::where('tahunajaran', $dataSiswa->thnajaran_masuk)
            ->where('semester', 'Ganjil')
            ->first();

        $kepsekttd = KepalaSekolah::where('tahunajaran', $kbmData->tahunajaran)
            ->where('semester', $kbmData->ganjilgenap)
            ->first();

        $titiMangsa = DB::table('titi_mangsas')
            ->where('tahunajaran', $kbmData->tahunajaran)
            ->where('ganjilgenap', $kbmData->ganjilgenap)
            ->where('kode_rombel', $kbmData->kode_rombel)
            ->first();

        $catatanWaliKelas = DB::table('catatan_wali_kelas')
            ->where('tahunajaran', $kbmData->tahunajaran)
            ->where('ganjilgenap', $kbmData->ganjilgenap)
            ->where('kode_rombel', $kbmData->kode_rombel)
            ->where('nis', $dataSiswa->nis)
            ->first();

        $absensiSiswa = DB::table('absensi_siswas')
            ->where('nis', $dataSiswa->nis)
            ->where('tahunajaran', $kbmData->tahunajaran)
            ->where('ganjilgenap', $kbmData->ganjilgenap)
            ->where('kode_rombel', $kbmData->kode_rombel)
            ->first();

        $prestasiSiswas = PrestasiSiswa::where('kode_rombel', $kbmData->kode_rombel)
            ->where('tahunajaran', $kbmData->tahunajaran)
            ->where('ganjilgenap', $kbmData->ganjilgenap)
            ->where('nis', $dataSiswa->nis)
            ->get();

        // Fetch data based on filters
        $ekstrakurikulers = Ekstrakurikuler::where('kode_rombel', $kbmData->kode_rombel)
            ->where('tahunajaran', $kbmData->tahunajaran)
            ->where('ganjilgenap', $kbmData->ganjilgenap)
            ->where('nis', $dataSiswa->nis)
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
                kbm_per_rombels.ganjilgenap,
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
            $dataSiswa->nis,
            $kbmData->kode_rombel,
            $kbmData->tingkat,
            $kbmData->tahunajaran,
            $kbmData->ganjilgenap,

            $dataSiswa->nis,
            $kbmData->kode_rombel,
            $kbmData->tingkat,
            $kbmData->tahunajaran,
            $kbmData->ganjilgenap,

            $dataSiswa->nis,
            $kbmData->kode_rombel,
            $kbmData->tingkat,
            $kbmData->tahunajaran,
            $kbmData->ganjilgenap,
        ]);

        foreach ($dataNilai as $nilai) {
            $jumlahTP = DB::table('tujuan_pembelajarans')
                ->where('kode_rombel', $nilai->kode_rombel)
                ->where('kel_mapel', $nilai->kel_mapel)
                ->where('id_personil', $nilai->id_personil)
                ->where('tahunajaran', $nilai->tahunajaran)
                ->where('ganjilgenap', $nilai->ganjilgenap)
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
            if (
                empty($tpNilai) ||
                $jumlahTP === 0 ||
                is_null($rerataFormatif)
            ) {
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
                $deskripsi[] = "Menunjukkan kemampuan dalam {$tpIsi[$tp]}<sup>[{$tp}]</sup>";
            }

            foreach ($tpMin as $tp) {
                $deskripsi[] = "Masih perlu bimbingan dalam {$tpIsi[$tp]}<sup>[{$tp}]</sup>";
            }

            // Simpan ke dalam objek data nilai
            $nilai->nilai_tertinggi =
                'NT : ' .
                "{$maxValue} (TP ke-" .
                implode(', TP ke-', $tpMax) .
                ')';
            $nilai->nilai_terendah =
                'NR : ' .
                "{$minValue} (TP ke-" .
                implode(', TP ke-', $tpMin) .
                ')';
            $nilai->deskripsi_nilai = implode(', ', $deskripsi);
        }

        // Jika data siswa ditemukan
        if ($dataSiswa) {
            return view('pages.walikelas.rapor-peserta-didik-detail', compact(
                'dataSiswa',
                'waliKelas',
                'kbmData',
                'school',
                'dataNilai',
                'kepsekttd',
                'kepsekCover',
                'titiMangsa',
                'catatanWaliKelas',
                'absensiSiswa',
                'prestasiSiswas',
                'ekstrakurikulers',
                'activities',
                'barcodeImage',
                'qrcodeImage',
            ))->render(); // Render hanya bagian detail
        }

        // Jika data siswa tidak ditemukan
        return response()->json(['message' => 'Data siswa tidak ditemukan'], 404);
    }

    public function getSiswaDetail($nis)
    {
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
            ->where('peserta_didiks.nis', $nis)
            ->first();

        if ($dataSiswa) {
            return response()->json($dataSiswa);
        } else {
            return response()->json(['message' => 'Data siswa tidak ditemukan.'], 404);
        }
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
