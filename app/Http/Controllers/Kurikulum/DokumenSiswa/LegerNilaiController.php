<?php

namespace App\Http\Controllers\Kurikulum\DokumenSiswa;

use App\Exports\PivotDataExport;
use App\Http\Controllers\Controller;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\MilihData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;



class LegerNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            $user = User::find(Auth::user()->id);
            $personal_id = $user->personal_id;

            // Cek apakah ada tahun ajaran aktif
            $tahunAjaranAktif = TahunAjaran::aktif()->first();
            if (!$tahunAjaranAktif) {
                return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
            }

            // Cek apakah ada semester aktif untuk tahun ajaran tersebut
            $semester = $tahunAjaranAktif->semesters()->where('status', 'Aktif')->first();
            if (!$semester) {
                return redirect()->back()->with('error', 'Tidak ada semester aktif.');
            }

            // Ambil semua opsi tahun ajaran
            $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

            $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
            $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();

            // Cek apakah ada data pada KunciDataKbm untuk id_personil
            $pilihData = MilihData::where('id_personil', $personal_id)->first();

            // Ambil data tahun ajaran dan semester berdasarkan data di KunciDataKbm atau fallback ke aktif
            $tahunajaran = $pilihData->tahunajaran ?? $tahunAjaranAktif->tahunajaran;
            $ganjilgenap = $pilihData->semester ?? $semester->semester;

            // Ambil kode_rombel dari $pilihData
            $kodeRombel = $pilihData ? $pilihData->kode_rombel : null;
            $tingkat = $pilihData ? $pilihData->tingkat : null;
            $kodeKK = $pilihData ? $pilihData->kode_kk : null;

            // Dapatkan semua kel_mapel
            $kelMapelList = DB::table('kbm_per_rombels')
                ->select('kel_mapel')
                ->distinct()
                ->where('kode_rombel', $kodeRombel)
                ->where('tahunajaran', $tahunajaran)
                ->where('ganjilgenap', $ganjilgenap)
                ->orderBy('kel_mapel')
                ->get();

            // Dapatkan nilai rata-rata per kel_mapel untuk setiap siswa
            $nilaiRataSiswa = DB::select("
                SELECT
                    pd.nis,
                    pd.nama_lengkap,
                    kr.kel_mapel,
                    ROUND((COALESCE(nf.rerata_formatif, 0) + COALESCE(ns.rerata_sumatif, 0)) / 2) AS nilai_kel_mapel
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
                    AND pr.tahun_ajaran = ?
                    AND kr.tahunajaran = ?
                    AND kr.ganjilgenap = ?
                    AND nf.tahunajaran = ?
                    AND nf.ganjilgenap = ?
                    AND ns.tahunajaran = ?
                    AND ns.ganjilgenap = ?
                ORDER BY
                    pd.nis, kr.kel_mapel
            ", [
                $kodeRombel,
                $tahunajaran,
                $tahunajaran,
                $ganjilgenap,
                $tahunajaran,
                $ganjilgenap,
                $tahunajaran,
                $ganjilgenap,
            ]);

            // Pivoting data programatis di PHP
            $pivotData = [];
            foreach ($nilaiRataSiswa as $nilai) {
                $pivotData[$nilai->nis]['nama_lengkap'] = $nilai->nama_lengkap;
                $pivotData[$nilai->nis][$nilai->kel_mapel] = $nilai->nilai_kel_mapel;
            }

            // Hitung rata-rata siswa
            foreach ($pivotData as $nis => &$data) {
                $sum = array_sum(array_slice($data, 1)); // Mulai dari elemen kedua (kel_mapel) ke atas
                $count = count($data) - 1; // Kurangi nama_lengkap
                $data['nil_rata_siswa'] = round($sum / $count, 2);
            }


            // Dapatkan semua kel_mapel
            $listMapel = DB::table('kbm_per_rombels')
                ->where('kode_rombel', $kodeRombel)
                ->where('tahunajaran', $tahunajaran)
                ->where('ganjilgenap', $ganjilgenap)
                ->orderBy('kel_mapel')
                ->get();

            /* //ranking
            $rankingPerTingkat = DB::select("
                SELECT * FROM (
                    SELECT
                        kr.tingkat,
                        pd.nis,
                        pd.nama_lengkap,
                        pd.kode_kk,
                        pr.rombel_nama,
                        pr.tahun_ajaran,
                        kr.ganjilgenap,
                        ROUND(AVG(COALESCE(((COALESCE(nf.rerata_formatif, 0) + COALESCE(ns.rerata_sumatif, 0)) / 2), 0)), 2) AS nil_rata_siswa,
                        ROW_NUMBER() OVER (PARTITION BY kr.tingkat ORDER BY
                            ROUND(AVG(COALESCE(((COALESCE(nf.rerata_formatif, 0) + COALESCE(ns.rerata_sumatif, 0)) / 2), 0)), 2) DESC
                        ) AS ranking
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
                        kr.tahunajaran = ?
                        AND kr.ganjilgenap = ?
                        AND kr.tingkat IN (10, 11, 12)
                    GROUP BY
                        kr.tingkat, pd.nis, pd.nama_lengkap, pd.kode_kk, pr.rombel_nama, pr.tahun_ajaran, kr.ganjilgenap
                ) AS ranked
                WHERE ranked.ranking <= 12
                ORDER BY ranked.tingkat, ranked.ranking;
            ", [
                $tahunajaran,
                $ganjilgenap,
            ]);

            $groupedRanking = collect($rankingPerTingkat)->groupBy('tingkat');


            $rankingPerTingkatPerKK = DB::select("
                SELECT * FROM (
                    SELECT
                        kr.tingkat,
                        pd.nis,
                        pd.nama_lengkap,
                        pd.kode_kk,
                        pr.rombel_nama,
                        pr.tahun_ajaran,
                        kr.ganjilgenap,
                        ROUND(AVG(COALESCE(((COALESCE(nf.rerata_formatif, 0) + COALESCE(ns.rerata_sumatif, 0)) / 2), 0)), 2) AS nil_rata_siswa,
                        ROW_NUMBER() OVER (
                            PARTITION BY kr.tingkat, pd.kode_kk
                            ORDER BY ROUND(AVG(COALESCE(((COALESCE(nf.rerata_formatif, 0) + COALESCE(ns.rerata_sumatif, 0)) / 2), 0)), 2) DESC
                        ) AS ranking
                    FROM
                        peserta_didik_rombels pr
                    INNER JOIN peserta_didiks pd ON pr.nis = pd.nis
                    INNER JOIN kbm_per_rombels kr ON pr.rombel_kode = kr.kode_rombel
                    LEFT JOIN nilai_formatif nf ON pr.nis = nf.nis
                        AND kr.kel_mapel = nf.kel_mapel
                        AND kr.tahunajaran = nf.tahunajaran
                        AND kr.ganjilgenap = nf.ganjilgenap
                    LEFT JOIN nilai_sumatif ns ON pr.nis = ns.nis
                        AND kr.kel_mapel = ns.kel_mapel
                        AND kr.tahunajaran = ns.tahunajaran
                        AND kr.ganjilgenap = ns.ganjilgenap
                    WHERE
                        kr.tahunajaran = ?
                        AND kr.ganjilgenap = ?
                    GROUP BY
                        kr.tingkat, pd.nis, pd.nama_lengkap, pd.kode_kk, pr.rombel_nama, pr.tahun_ajaran, kr.ganjilgenap
                ) AS ranked
                WHERE ranked.ranking <= 12
                ORDER BY ranked.tingkat, ranked.kode_kk, ranked.ranking
            ", [
                $tahunajaran,
                $ganjilgenap,
            ]);

            $groupedData = collect($rankingPerTingkatPerKK)->groupBy('tingkat')->map(function ($items) {
                return $items->groupBy('kode_kk');
            });

            $kodeKKList = [
                '411' => 'Rekayasa Perangkat Lunak',
                '421' => 'Teknik Komputer dan Jaringan',
                '811' => 'Bisnis Digital',
                '821' => 'Manajemen Perkantoran',
                '833' => 'Akuntansi',
            ]; */

            return view("pages.kurikulum.dokumensiswa.leger-nilai", [
                'user' => $user,
                'personal_id' => $personal_id,
                'tahunAjaranAktif' => $tahunAjaranAktif,
                'semester' => $semester,
                'tahunAjaranOptions' => $tahunAjaranOptions,
                'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
                'rombonganBelajar' => $rombonganBelajar,
                'pilihData' => $pilihData,
                'tahunajaran' => $tahunajaran,
                'ganjilgenap' => $ganjilgenap,
                'tingkat' => $tingkat,
                'kodeKK' => $kodeKK,
                'pivotData' => $pivotData,
                'kelMapelList' => $kelMapelList,
                'listMapel' => $listMapel,
                /* 'rankingPerTingkat' => $rankingPerTingkat,
                'rankingPerTingkatPerKK' => $rankingPerTingkatPerKK,
                'groupedData' => $groupedData,
                'kodeKKList' => $kodeKKList,
                'groupedRanking' => $groupedRanking, */
            ]);
        }

        // Jika user tidak login, redirect ke halaman login
        return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
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
        // Validasi input data
        $request->validate([
            'id_personil' => 'required|exists:users,personal_id', // Pastikan id_personil valid
            'tahunajaran' => 'required',
            'semester' => 'required',
            'kode_kk' => 'nullable',  // Jika ada nilai, bisa disertakan
            'tingkat' => 'nullable',  // Jika ada nilai, bisa disertakan
            'kode_rombel' => 'nullable',  // Jika ada nilai, bisa disertakan
        ]);

        // Cek apakah data sudah ada
        $existingData = MilihData::where('id_personil', $request->id_personil)->first();

        if ($existingData) {
            // Jika sudah ada, update data
            $existingData->tahunajaran = $request->tahunajaran;
            $existingData->semester = $request->semester;
            $existingData->kode_kk = $request->kode_kk;
            $existingData->tingkat = $request->tingkat;
            $existingData->kode_rombel = $request->kode_rombel;
            $existingData->save();

            /// Redirect atau kembali dengan pesan sukses
            return redirect()->route('kurikulum.dokumentsiswa.leger-nilai.index')->with('success', 'Data berhasil diupdate.');
        } else {
            // Jika belum ada, simpan data baru
            $newData = new MilihData();
            $newData->id_personil = $request->id_personil;
            $newData->tahunajaran = $request->tahunajaran;
            $newData->semester = $request->semester;
            $newData->kode_kk = $request->kode_kk;
            $newData->tingkat = $request->tingkat;
            $newData->kode_rombel = $request->kode_rombel;
            $newData->id_siswa = "";
            $newData->id_guru = "";
            $newData->save();

            // Redirect atau kembali dengan pesan sukses
            return redirect()->route('kurikulum.dokumentsiswa.leger-nilai.index')->with('success', 'Data berhasil ditambahkan.');
        }
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

    public function getKodeRombelLeger(Request $request)
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


    public function exportPivotData(Request $request)
    {
        if (auth()->check()) {
            $user = User::find(Auth::user()->id);
            $personal_id = $user->personal_id;

            // Cek apakah ada tahun ajaran aktif
            $tahunAjaranAktif = TahunAjaran::aktif()->first();
            if (!$tahunAjaranAktif) {
                return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
            }

            // Cek apakah ada semester aktif untuk tahun ajaran tersebut
            $semester = $tahunAjaranAktif->semesters()->where('status', 'Aktif')->first();
            if (!$semester) {
                return redirect()->back()->with('error', 'Tidak ada semester aktif.');
            }

            // Cek apakah ada data pada KunciDataKbm untuk id_personil
            $pilihData = MilihData::where('id_personil', $personal_id)->first();

            // Ambil data tahun ajaran dan semester berdasarkan data di KunciDataKbm atau fallback ke aktif
            $tahunajaran = $pilihData->tahunajaran ?? $tahunAjaranAktif->tahunajaran;
            $ganjilgenap = $pilihData->semester ?? $semester->semester;

            $kodeRombel = $request->input('kode_rombel');

            if (!$kodeRombel) {
                return redirect()->back()->with('error', 'Kode Rombel tidak ditemukan.');
            }

            // Data untuk Sheet 1
            $nilaiRataSiswa = DB::select("
        SELECT
            pd.nis,
            pd.nama_lengkap,
            kr.kel_mapel,
            ROUND((COALESCE(nf.rerata_formatif, 0) + COALESCE(ns.rerata_sumatif, 0)) / 2) AS nilai_kel_mapel
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
            AND pr.tahun_ajaran = ?
            AND kr.tahunajaran = ?
            AND kr.ganjilgenap = ?
            AND nf.tahunajaran = ?
            AND nf.ganjilgenap = ?
            AND ns.tahunajaran = ?
            AND ns.ganjilgenap = ?
        ORDER BY
            pd.nis, kr.kel_mapel
        ", [
                $kodeRombel,
                $tahunajaran,
                $tahunajaran,
                $ganjilgenap,
                $tahunajaran,
                $ganjilgenap,
                $tahunajaran,
                $ganjilgenap,
            ]);

            $pivotData = [];
            foreach ($nilaiRataSiswa as $nilai) {
                $pivotData[$nilai->nis]['nama_lengkap'] = $nilai->nama_lengkap;
                $pivotData[$nilai->nis][$nilai->kel_mapel] = $nilai->nilai_kel_mapel;
            }

            foreach ($pivotData as $nis => &$data) {
                $sum = array_sum(array_slice($data, 1));
                $count = count($data) - 1;
                $data['nil_rata_siswa'] = round($sum / $count, 2);
            }

            // Data untuk Sheet 2
            $listMapel = DB::table('kbm_per_rombels')
                ->where('kode_rombel', $kodeRombel)
                ->where('tahunajaran', $tahunajaran)
                ->where('ganjilgenap', $ganjilgenap)
                ->orderBy('kel_mapel')
                ->get()
                ->toArray();

            // Ekspor file Excel
            return Excel::download(new PivotDataExport($pivotData, $listMapel), 'Leger Siswa Rombel ' . $kodeRombel . '.xlsx');
        }
    }
}
