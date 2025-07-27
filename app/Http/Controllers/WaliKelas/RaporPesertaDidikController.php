<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\IdentitasSekolah;
use App\Models\ManajemenSekolah\KepalaSekolah;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\WaliKelas\Ekstrakurikuler;
use App\Models\WaliKelas\PesertaDidikNaik;
use App\Models\WaliKelas\PrestasiSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        // Cek wali kelas
        if (!$waliKelas) {
            return redirect()->route('dashboard')->with('successWaliKelas', 'Maaf, Anda belum ditetapkan sebagai <b>Wali Kelas</b> pada <b>tahun ajaran aktif</b>. Silakan hubungi operator atau admin sekolah.');
        }

        // Jika wali kelas ditemukan, ambil data personil dan hitung semester angka
        $personil = null;
        $semesterAngka = null;
        $kenaikanExists = false;

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

            // Cek apakah data sudah ada di tabel absensi_siswas
            $kenaikanExists = PesertaDidikNaik::where('tahunajaran', $tahunAjaranAktif->tahunajaran)
                ->where('kode_rombel', $waliKelas->kode_rombel)
                ->exists();
        } else {
            $kbmData = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
            $siswaData = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
            $kenaikanExists = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
        }

        // Ambil data titi_mangsa jika sudah ada untuk wali kelas dan tahun ajaran aktif
        $titimangsa = DB::table('titi_mangsas')
            ->where('kode_rombel', $waliKelas->kode_rombel ?? '')
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semesterAktif)
            ->first();

        if (! $titimangsa) {
            return redirect()
                ->route('walikelas.data-kelas.index')
                ->with('warning', 'Titimangsa harus diisi terlebih dahulu agar bisa membuka menu Rapor Peserta Didik');
        }

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

        $kenaikanSiswa = DB::table('peserta_didik_naiks')
            ->join('peserta_didiks', 'peserta_didik_naiks.nis', '=', 'peserta_didiks.nis')
            ->where('peserta_didik_naiks.tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('peserta_didik_naiks.kode_rombel', $waliKelas->kode_rombel)
            ->select(
                'peserta_didiks.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didik_naiks.status',
                'peserta_didik_naiks.tahunajaran',
                'peserta_didik_naiks.kode_rombel',
            )
            ->get();

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
                'nilaiRataSiswa',
                'kenaikanExists',
                'kenaikanSiswa',
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
    public function tampilRaporSiswa($nis)
    {

        // Ambil user yang sedang login
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

        // Ambil wali kelas berdasarkan personal_id dari user yang sedang login dan tahun ajaran aktif
        $waliKelas = DB::table('rombongan_belajars')
            ->select(
                'rombongan_belajars.tahunajaran',
                'rombongan_belajars.id_kk',
                'rombongan_belajars.tingkat',
                'rombongan_belajars.rombel',
                'rombongan_belajars.kode_rombel',
                'rombongan_belajars.wali_kelas',
                'personil_sekolahs.id_personil',
                'personil_sekolahs.nip',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang'
            )
            ->join('personil_sekolahs', 'rombongan_belajars.wali_kelas', '=', 'personil_sekolahs.id_personil')
            ->where('rombongan_belajars.wali_kelas', $personal_id)
            ->where('rombongan_belajars.tahunajaran', $tahunAjaranAktif->tahunajaran)
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

        $kepsekCover = KepalaSekolah::where('tahunajaran', $dataSiswa->thnajaran_masuk)
            ->where('semester', 'Ganjil')
            ->first();

        $kepsekttd = KepalaSekolah::where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('semester', $semester->semester)
            ->first();

        $angkaSemester = null;

        if ($semester->semester == 'Ganjil') {
            switch ($dataSiswa->rombel_tingkat) {
                case 10:
                    $angkaSemester = 1;
                    break;
                case 11:
                    $angkaSemester = 3;
                    break;
                case 12:
                    $angkaSemester = 5;
                    break;
                default:
                    $angkaSemester = 'Invalid year for Ganjil';
            }
        } elseif ($semester->semester == 'Genap') {
            switch ($dataSiswa->rombel_tingkat) {
                case 10:
                    $angkaSemester = 2;
                    break;
                case 11:
                    $angkaSemester = 4;
                    break;
                case 12:
                    $angkaSemester = 6;
                    break;
                default:
                    $angkaSemester = 'Invalid year for Genap';
            }
        } else {
            $angkaSemester = 'Invalid semester type';
        }

        $titiMangsa = DB::table('titi_mangsas')
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semester->semester)
            ->where('kode_rombel', $waliKelas->kode_rombel)
            ->first();

        $absensiSiswa = DB::table('absensi_siswas')
            ->where('nis', $nis)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semester->semester)
            ->where('kode_rombel', $waliKelas->kode_rombel)
            ->first();

        $catatanWaliKelas = DB::table('catatan_wali_kelas')
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semester->semester)
            ->where('kode_rombel', $waliKelas->kode_rombel)
            ->where('nis', $nis)
            ->first();

        $prestasiSiswas = PrestasiSiswa::where('kode_rombel', $waliKelas->kode_rombel)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semester->semester)
            ->where('nis', $nis)
            ->get();

        // Fetch data based on filters
        $ekstrakurikulers = Ekstrakurikuler::where('kode_rombel', $waliKelas->kode_rombel)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semester->semester)
            ->where('nis', $nis)
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

        $dataNilai = DB::select("
    SELECT
        kbm.id_personil,
        ps.gelardepan,
        ps.namalengkap,
        ps.gelarbelakang,
        kbm.kode_rombel,
        kbm.rombel,
        kbm.tingkat,
        kbm.kel_mapel,
        kbm.semester,
        kbm.ganjilgenap,
        mp.mata_pelajaran,
        mp.kelompok,
        mp.kode,
        pdr.nis,
        pd.nama_lengkap,
        nf.tp_isi_1, nf.tp_isi_2, nf.tp_isi_3, nf.tp_isi_4, nf.tp_isi_5,
        nf.tp_isi_6, nf.tp_isi_7, nf.tp_isi_8, nf.tp_isi_9,
        nf.tp_nilai_1, nf.tp_nilai_2, nf.tp_nilai_3, nf.tp_nilai_4, nf.tp_nilai_5,
        nf.tp_nilai_6, nf.tp_nilai_7, nf.tp_nilai_8, nf.tp_nilai_9,
        nf.rerata_formatif,
        ns.sts,
        ns.sas,
        ns.kel_mapel AS kel_mapel_sumatif,
        ns.rerata_sumatif,
        ((COALESCE(nf.rerata_formatif, 0) + COALESCE(ns.rerata_sumatif, 0)) / 2) AS nilai_na
    FROM kbm_per_rombels kbm
    INNER JOIN peserta_didik_rombels pdr
        ON kbm.kode_rombel = pdr.rombel_kode
    INNER JOIN peserta_didiks pd
        ON pdr.nis = pd.nis
    INNER JOIN personil_sekolahs ps
        ON kbm.id_personil = ps.id_personil
    INNER JOIN mata_pelajarans mp
        ON kbm.kel_mapel = mp.kel_mapel
    LEFT JOIN nilai_formatif nf
        ON pdr.nis = nf.nis
        AND kbm.kel_mapel = nf.kel_mapel
        AND nf.kode_rombel = ?
        AND nf.tingkat = ?
        AND nf.tahunajaran = ?
        AND nf.ganjilgenap = ?
    LEFT JOIN nilai_sumatif ns
        ON pdr.nis = ns.nis
        AND kbm.kel_mapel = ns.kel_mapel
        AND ns.kode_rombel = ?
        AND ns.tingkat = ?
        AND ns.tahunajaran = ?
        AND ns.ganjilgenap = ?
    WHERE
        pdr.nis = ?
        AND kbm.kode_rombel = ?
        AND kbm.tingkat = ?
        AND kbm.tahunajaran = ?
        AND kbm.ganjilgenap = ?
    ORDER BY kbm.kel_mapel
", [
            $waliKelas->kode_rombel,
            $dataSiswa->rombel_tingkat,
            $tahunAjaranAktif->tahunajaran,
            $semester->semester, // untuk nilai_formatif
            $waliKelas->kode_rombel,
            $dataSiswa->rombel_tingkat,
            $tahunAjaranAktif->tahunajaran,
            $semester->semester, // untuk nilai_sumatif
            $nis,
            $waliKelas->kode_rombel,
            $dataSiswa->rombel_tingkat,
            $tahunAjaranAktif->tahunajaran,
            $semester->semester, // filter utama
        ]);
        // Ambil elemen pertama jika hanya satu data yang perlu diakses
        $firstNilai = $dataNilai[0] ?? null;

        foreach ($dataNilai as $nilai) {
            $jumlahTP = DB::table('tujuan_pembelajarans')
                ->where('kode_rombel', $nilai->kode_rombel)
                ->where('kel_mapel', $nilai->kel_mapel)
                ->where('id_personil', $nilai->id_personil)
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
                $deskripsi[] = "Menunjukkan kemampuan dalam {$tpIsi[$tp]}<sup>[{$tp}]</sup>";
            }

            foreach ($tpMin as $tp) {
                $deskripsi[] = "Masih perlu bimbingan dalam {$tpIsi[$tp]}<sup>[{$tp}]</sup>";
            }

            // Simpan ke dalam objek data nilai
            $nilai->nilai_tertinggi = "NT : " . "{$maxValue} (TP ke-" . implode(', TP ke-', $tpMax) . ")";
            $nilai->nilai_terendah = "NR : " . "{$minValue} (TP ke-" . implode(', TP ke-', $tpMin) . ")";
            $nilai->deskripsi_nilai = implode(', ', $deskripsi);
        }


        return view('pages.walikelas.rapor-peserta-didik-rapor',  [
            'waliKelas' => $waliKelas,
            'personal_id' => $personal_id,
            'tahunAjaranAktif' => $tahunAjaranAktif,
            'semester' => $semester,
            'dataSiswa' => $dataSiswa,
            'school' => $school,
            'barcodeImage' => $barcodeImage,
            'qrcodeImage' => $qrcodeImage,
            'kepsekCover' => $kepsekCover,
            'kepsekttd' => $kepsekttd,
            'angkaSemester' => $angkaSemester,

            'titiMangsa' => $titiMangsa,
            /* 'waliKelas' => $waliKelas, */
            'catatanWaliKelas' => $catatanWaliKelas,
            'absensiSiswa' => $absensiSiswa,
            'prestasiSiswas' => $prestasiSiswas,
            'ekstrakurikulers' => $ekstrakurikulers,
            'activities' => $activities,

            'dataNilai' => $dataNilai,
            'firstNilai' => $firstNilai,
        ])->render(); // Render hanya bagian detail
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

    public function generateKenaikan()
    {
        // Ambil tahun ajaran dan semester aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();

        // Ambil data rombongan belajar berdasarkan wali kelas yang login
        $rombonganBelajar = RombonganBelajar::where('wali_kelas', auth()->user()->personal_id)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->first();

        // Ambil data siswa dari peserta_didik_rombels yang sesuai dengan rombongan belajar
        $pesertaDidikRombels = PesertaDidikRombel::where('rombel_kode', $rombonganBelajar->kode_rombel)
            ->where('tahun_ajaran', $tahunAjaranAktif->tahunajaran)
            ->get();

        // Loop melalui setiap peserta didik untuk mengisi tabel absensi_siswas
        foreach ($pesertaDidikRombels as $peserta) {
            // Cek apakah data sudah ada di tabel absensi_siswas
            $kenaikanExists = PesertaDidikNaik::where('nis', $peserta->nis)
                ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
                ->where('kode_rombel', $rombonganBelajar->kode_rombel)
                ->exists();

            // Jika data belum ada, lakukan insert
            if (!$kenaikanExists) {
                PesertaDidikNaik::create([
                    'kode_rombel' => $rombonganBelajar->kode_rombel,
                    'tahunajaran' => $tahunAjaranAktif->tahunajaran,
                    'nis' => $peserta->nis,
                    'status' => "Naik",
                ]);
            }
        }

        return redirect()
            ->route('walikelas.rapor-peserta-didik.index')
            ->with('open_tab', 'kenaikan-kelas')
            ->with('success', 'Data kenaikan berhasil di-generate!');
    }

    public function updateKenaikan(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'status' => 'required|in:Naik,Naik Pindah,Tidak Naik',
            'tahunajaran' => 'required',
            'kode_rombel' => 'required',
        ]);

        PesertaDidikNaik::updateOrCreate(
            [
                'nis' => $request->nis,
                'tahunajaran' => $request->tahunajaran,
                'kode_rombel' => $request->kode_rombel,
            ],
            [
                'status' => $request->status
            ]
        );

        return redirect()
            ->route('walikelas.rapor-peserta-didik.index')
            ->with('open_tab', 'kenaikan-kelas')
            ->with('success', 'Status kenaikan berhasil diupdate!');
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
