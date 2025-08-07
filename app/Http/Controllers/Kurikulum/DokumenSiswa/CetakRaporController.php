<?php

namespace App\Http\Controllers\Kurikulum\DokumenSiswa;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\Kurikulum\DokumenSiswa\CeklistCetakRapor;
use App\Models\Kurikulum\DokumenSiswa\PilihCetakRapor;
use App\Models\ManajemenSekolah\IdentitasSekolah;
use App\Models\ManajemenSekolah\KepalaSekolah;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\PesertaDidik;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\User;
use App\Models\WaliKelas\Ekstrakurikuler;
use App\Models\WaliKelas\PrestasiSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;

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

        // Ambil semua user yang punya role 'master'
        $usersWithMasterRole = User::role(['admin', 'tatausaha'])->get();

        // Ambil semua id_personil dari user tersebut
        $idPersonilList = $usersWithMasterRole->pluck('personal_id')->filter()->unique();

        // Ambil data PersonilSekolah berdasarkan id_personil
        $personilSekolah = PersonilSekolah::whereIn('id_personil', $idPersonilList)
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        $pesertadidikOptions = PesertaDidik::select('nis', 'nama_lengkap')
            ->get()
            ->mapWithKeys(function ($item) {
                return [$item->nis => $item->nis . ' - ' . $item->nama_lengkap];
            })
            ->toArray();

        $dataPilCR = PilihCetakRapor::where('id_personil', $personal_id)->first();

        // CEK apakah dataPilWalas ADA
        if (!$dataPilCR) {
            return redirect()->route('dashboard')->with('errorAmbilData', '<p class="text-danger mx-4 mb-0">Anda belum memiliki akses ke menu ini.</p> <p class="fs-6">Silakan hubungi Developer Aplikasi ini. </p> <p class="fs-1"><i class="lab las la-grin"></i> <i class="lab las la-grin"></i> <i class="lab las la-grin"></i></p>');
        }

        $siswaData = DB::table('peserta_didik_rombels')
            ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->where('peserta_didik_rombels.tahun_ajaran', $dataPilCR->tahunajaran)
            ->where('peserta_didik_rombels.rombel_kode', $dataPilCR->kode_rombel)
            ->where('peserta_didik_rombels.rombel_tingkat', $dataPilCR->tingkat)
            ->where('peserta_didik_rombels.nis', $dataPilCR->nis)
            ->select(
                'peserta_didik_rombels.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didiks.jenis_kelamin',
                'peserta_didiks.foto',
                'peserta_didiks.kontak_email'
            )
            ->first();

        $waliKelas = DB::table('wali_kelas')
            ->select(
                'wali_kelas.*',
                'personil_sekolahs.id_personil',
                'personil_sekolahs.nip',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang',
                'personil_sekolahs.photo'
            )
            ->join('personil_sekolahs', 'wali_kelas.wali_kelas', '=', 'personil_sekolahs.id_personil')
            ->where('wali_kelas.tahunajaran', $dataPilCR->tahunajaran)
            ->where('wali_kelas.kode_rombel', $dataPilCR->kode_rombel)
            ->first();


        //option untuk memilih ceklist cetak rapor
        // ambil kelasnya dari rombongan belajar
        $optionCeklistRombel = DB::table('rombongan_belajars')
            ->select(
                'rombongan_belajars.rombel',
                'rombongan_belajars.kode_rombel',
                'rombongan_belajars.tingkat',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang'
            )
            ->leftJoin('wali_kelas', function ($join) use ($dataPilCR) {
                $join->on('rombongan_belajars.kode_rombel', '=', 'wali_kelas.kode_rombel')
                    ->where('wali_kelas.tahunajaran', '=', $dataPilCR->tahunajaran);
            })
            ->leftJoin('personil_sekolahs', 'wali_kelas.wali_kelas', '=', 'personil_sekolahs.id_personil')
            ->where('rombongan_belajars.tahunajaran', $dataPilCR->tahunajaran)
            ->orderBy('rombongan_belajars.tingkat')
            ->orderBy('rombongan_belajars.rombel')
            ->get();

        $dataKelasCeklist = $optionCeklistRombel->mapWithKeys(function ($item) {
            return [$item->kode_rombel => $item->rombel . ' - ' . $item->kode_rombel];
        })->toArray();

        $dataKelasCeklistGrouped = $optionCeklistRombel->groupBy('tingkat');

        // Ambil checklist yang SUDAH tersimpan
        $ceklistTersimpan = CeklistCetakRapor::where('tahunajaran', $dataPilCR->tahunajaran)
            ->where('ganjilgenap', $dataPilCR->semester)
            ->where('status', 'Sudah')
            ->pluck('kode_rombel')
            ->toArray();


        return view('pages.kurikulum.dokumensiswa.cetak-rapor', [
            'siswaData' => $siswaData,
            'personal_id' => $personal_id,
            'tahunAjaranAktif' => $tahunAjaranAktif,
            'semester' => $semester,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'pesertadidikOptions' => $pesertadidikOptions,
            'waliKelas' => $waliKelas,
            'personilSekolah' => $personilSekolah,
            'dataPilCR' => $dataPilCR,
            'nis' => $dataPilCR->nis,
            'dataKelasCeklist' => $dataKelasCeklist,
            'ceklistTersimpan' => $ceklistTersimpan,
            'dataKelasCeklistGrouped' => $dataKelasCeklistGrouped,
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
            'nis' => 'required|string',
        ]);

        PilihCetakRapor::create([
            'id_personil' => $validatedData['id_personil'],
            'tahunajaran' => $validatedData['tahunajaran'],
            'semester' => $validatedData['semester'],
            'kode_kk' => $validatedData['kode_kk'],
            'tingkat' => $validatedData['tingkat'],
            'kode_rombel' => $validatedData['kode_rombel'],
            'nis' => $validatedData['nis'],
        ]);

        return redirect()->back()->with('toast_success', 'Data berhasil disimpan!');
    }
    /**
     * Display the specified resource.
     */
    public function tampilRapor($nis)
    {

        $user = Auth::user();
        $personal_id = $user->personal_id;

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
                'peserta_didik_ortus.status_ortu',
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
            ->where('peserta_didik_rombels.tahun_ajaran', $dataPilCR->tahunajaran)
            ->where('peserta_didik_rombels.rombel_tingkat', $dataPilCR->tingkat)
            ->where('peserta_didik_rombels.rombel_kode', $dataPilCR->kode_rombel)
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

        $kepsekttd = KepalaSekolah::where('tahunajaran', $dataPilCR->tahunajaran)
            ->where('semester', $dataPilCR->semester)
            ->first();

        $angkaSemester = null;

        if ($dataPilCR->semester == 'Ganjil') {
            switch ($dataPilCR->tingkat) {
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
        } elseif ($dataPilCR->semester == 'Genap') {
            switch ($dataPilCR->tingkat) {
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
            ->where('tahunajaran', $dataPilCR->tahunajaran)
            ->where('ganjilgenap', $dataPilCR->semester)
            ->where('kode_rombel', $dataPilCR->kode_rombel)
            ->first();

        $waliKelas = DB::table('wali_kelas')
            ->select(
                'wali_kelas.*',
                'personil_sekolahs.id_personil',
                'personil_sekolahs.nip',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang'
            )
            ->join('personil_sekolahs', 'wali_kelas.wali_kelas', '=', 'personil_sekolahs.id_personil')
            ->where('wali_kelas.tahunajaran', $dataPilCR->tahunajaran)
            ->where('wali_kelas.kode_rombel', $dataPilCR->kode_rombel)
            ->first();

        $absensiSiswa = DB::table('absensi_siswas')
            ->where('nis', $dataSiswa->nis)
            ->where('tahunajaran', $dataPilCR->tahunajaran)
            ->where('ganjilgenap', $dataPilCR->semester)
            ->where('kode_rombel', $dataPilCR->kode_rombel)
            ->first();

        $catatanWaliKelas = DB::table('catatan_wali_kelas')
            ->where('tahunajaran', $dataPilCR->tahunajaran)
            ->where('ganjilgenap', $dataPilCR->semester)
            ->where('kode_rombel', $dataPilCR->kode_rombel)
            ->where('nis', $dataSiswa->nis)
            ->first();

        $prestasiSiswas = PrestasiSiswa::where('kode_rombel', $dataPilCR->kode_rombel)
            ->where('tahunajaran', $dataPilCR->tahunajaran)
            ->where('ganjilgenap', $dataPilCR->semester)
            ->where('nis', $dataSiswa->nis)
            ->get();

        // Fetch data based on filters
        $ekstrakurikulers = Ekstrakurikuler::where('kode_rombel', $dataPilCR->kode_rombel)
            ->where('tahunajaran', $dataPilCR->tahunajaran)
            ->where('ganjilgenap', $dataPilCR->semester)
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
            $dataPilCR->kode_rombel,
            $dataPilCR->tingkat,
            $dataPilCR->tahunajaran,
            $dataPilCR->semester, // untuk nilai_formatif
            $dataPilCR->kode_rombel,
            $dataPilCR->tingkat,
            $dataPilCR->tahunajaran,
            $dataPilCR->semester, // untuk nilai_sumatif
            $dataSiswa->nis,
            $dataPilCR->kode_rombel,
            $dataPilCR->tingkat,
            $dataPilCR->tahunajaran,
            $dataPilCR->semester, // filter utama
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

        // Jika data siswa ditemukan
        if ($dataPilCR) {
            return view('pages.kurikulum.dokumensiswa.cetak-rapor-data',  [
                'dataPilCR' => $dataPilCR,
                'personal_id' => $personal_id,
                'dataSiswa' => $dataSiswa,
                'school' => $school,
                'barcodeImage' => $barcodeImage,
                'qrcodeImage' => $qrcodeImage,
                'kepsekCover' => $kepsekCover,
                'kepsekttd' => $kepsekttd,
                'angkaSemester' => $angkaSemester,

                'titiMangsa' => $titiMangsa,
                'waliKelas' => $waliKelas,
                'catatanWaliKelas' => $catatanWaliKelas,
                'absensiSiswa' => $absensiSiswa,
                'prestasiSiswas' => $prestasiSiswas,
                'ekstrakurikulers' => $ekstrakurikulers,
                'activities' => $activities,

                'dataNilai' => $dataNilai,
                'firstNilai' => $firstNilai,
            ])->render(); // Render hanya bagian detail
        }

        // Jika data siswa tidak ditemukan
        return response()->json(['message' => 'Data siswa tidak ditemukan'], 404);
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
        $validatedData = $request->validate([
            'id_personil' => 'required|string',
            'tahunajaran' => 'required|string',
            'semester' => 'required|string',
            'kode_kk' => 'required|string',
            'tingkat' => 'required|string',
            'kode_rombel' => 'required|string',
            'nis' => 'required|string',
        ]);

        PilihCetakRapor::updateOrCreate(
            ['id_personil' => $validatedData['id_personil']],
            $validatedData
        );

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function infoWaliSiswa()
    {
        $user = Auth::user();
        $personal_id = $user->personal_id;

        $dataPilCR = PilihCetakRapor::where('id_personil', $personal_id)->first();

        $siswaData = DB::table('peserta_didik_rombels')
            ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->where('peserta_didik_rombels.tahun_ajaran', $dataPilCR->tahunajaran)
            ->where('peserta_didik_rombels.rombel_kode', $dataPilCR->kode_rombel)
            ->where('peserta_didik_rombels.rombel_tingkat', $dataPilCR->tingkat)
            ->where('peserta_didik_rombels.nis', $dataPilCR->nis)
            ->select(
                'peserta_didik_rombels.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didiks.jenis_kelamin',
                'peserta_didiks.foto',
                'peserta_didiks.kontak_email'
            )
            ->first();

        $waliKelas = DB::table('wali_kelas')
            ->select(
                'wali_kelas.*',
                'personil_sekolahs.id_personil',
                'personil_sekolahs.nip',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang',
                'personil_sekolahs.photo'
            )
            ->join('personil_sekolahs', 'wali_kelas.wali_kelas', '=', 'personil_sekolahs.id_personil')
            ->where('wali_kelas.tahunajaran', $dataPilCR->tahunajaran)
            ->where('wali_kelas.kode_rombel', $dataPilCR->kode_rombel)
            ->first();

        return view('pages.kurikulum.dokumensiswa.cetak-rapor-info', compact('siswaData', 'waliKelas'));
    }

    public function ceklisCetakRapor(Request $request)
    {
        $request->validate([
            'kode_rombel' => 'required|string',
            'status' => 'required|in:Sudah,Belum',
        ]);

        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        if (!$tahunAjaranAktif) {
            return response()->json(['message' => 'Tidak ada tahun ajaran aktif.'], 400);
        }

        $semester = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
            ->first();

        if (!$semester) {
            return response()->json(['message' => 'Tidak ada semester aktif.'], 400);
        }

        CeklistCetakRapor::updateOrCreate(
            [
                'tahunajaran' => $tahunAjaranAktif->tahunajaran, // asumsi field ini teks
                'ganjilgenap' => $semester->semester,
                'kode_rombel' => $request->kode_rombel,
            ],
            [
                'status' => $request->status,
            ]
        );

        return response()->json(['message' => 'Checklist berhasil disimpan']);
    }

    public function getCeklistTerupdate()
    {
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semester = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
            ->first();

        $ceklistTersimpan = CeklistCetakRapor::where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semester->semester)
            ->where('status', 'Sudah')
            ->pluck('kode_rombel');

        return response()->json($ceklistTersimpan);
    }

    public function dataCeklist()
    {
        $personal_id = Auth::user()->personal_id;
        $dataPilCR = PilihCetakRapor::where('id_personil', $personal_id)->first();

        // Pastikan dataPilCR valid
        if (!$dataPilCR) {
            return response('<div class="alert alert-warning">Data belum dipilih.</div>');
        }

        $optionCeklistRombel = DB::table('rombongan_belajars')
            ->select(
                'rombongan_belajars.rombel',
                'rombongan_belajars.kode_rombel',
                'rombongan_belajars.tingkat',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang'
            )
            ->leftJoin('wali_kelas', function ($join) use ($dataPilCR) {
                $join->on('rombongan_belajars.kode_rombel', '=', 'wali_kelas.kode_rombel')
                    ->where('wali_kelas.tahunajaran', '=', $dataPilCR->tahunajaran);
            })
            ->leftJoin('personil_sekolahs', 'wali_kelas.wali_kelas', '=', 'personil_sekolahs.id_personil')
            ->where('rombongan_belajars.tahunajaran', $dataPilCR->tahunajaran)
            ->orderBy('rombongan_belajars.tingkat')
            ->orderBy('rombongan_belajars.rombel')
            ->get();

        $dataKelasCeklist = $optionCeklistRombel->mapWithKeys(function ($item) {
            return [$item->kode_rombel => $item->rombel . ' - ' . $item->kode_rombel];
        })->toArray();

        $dataKelasCeklistGrouped = $optionCeklistRombel->groupBy('tingkat');

        // Ambil checklist yang SUDAH tersimpan
        $ceklistTersimpan = CeklistCetakRapor::where('tahunajaran', $dataPilCR->tahunajaran)
            ->where('ganjilgenap', $dataPilCR->semester)
            ->where('status', 'Sudah')
            ->pluck('kode_rombel')
            ->toArray();


        return view('pages.kurikulum.dokumensiswa.cetak-rapor-ceklist', compact('dataPilCR', 'dataKelasCeklist', 'ceklistTersimpan', 'dataKelasCeklistGrouped'));
    }
}
