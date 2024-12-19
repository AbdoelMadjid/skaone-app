<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\ManajemenSekolah\IdentitasSekolah;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
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
                nilai_formatif nf ON pr.nis = nf.nis AND kr.kel_mapel = nf.kel_mapel
            LEFT JOIN
                nilai_sumatif ns ON pr.nis = ns.nis AND kr.kel_mapel = ns.kel_mapel
            WHERE
                pr.rombel_kode = ?
            GROUP BY
                pd.nis, pd.nama_lengkap
            ORDER BY
                nil_rata_siswa DESC
        ", [
            $waliKelas->kode_rombel
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

        $listMapel = DB::table('kbm_per_rombels')
            ->where('kode_rombel', $dataSiswa->rombel_kode)
            ->get();

        // Jika data siswa ditemukan
        if ($dataSiswa) {
            return view('pages.walikelas.rapor-peserta-didik-detail', compact(
                'dataSiswa',
                'waliKelas',
                'kbmData',
                'school',
                'listMapel'
            ))->render(); // Render hanya bagian detail
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
}
