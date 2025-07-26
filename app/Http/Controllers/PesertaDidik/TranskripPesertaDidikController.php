<?php

namespace App\Http\Controllers\PesertaDidik;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\PesertaDidik\KelulusanPesertaDidik;
use App\Models\PesertaDidik\TranskripDataSiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TranskripPesertaDidikController extends Controller
{
    public function index()
    {
        $aingPengguna = User::find(Auth::user()->id);

        $nis = $aingPengguna->nis;

        $dataRombel = PesertaDidikRombel::where('nis', $nis)->first();

        $kelulusan = KelulusanPesertaDidik::where('nis', $nis)->first();

        if (!$kelulusan) {
            return redirect()->route('dashboard')->with('error', 'Maaf, Anda belum menyelesaikan proses pembelajaran selama 3 tahun. Tunggu waktunya ya.');
        }

        $datasiswalulus = TranskripDataSiswa::where('nis', $nis)->first();

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
            ->where('peserta_didik_rombels.tahun_ajaran', '2024-2025')
            ->first();

        //niliai MPN
        $dataMPN = DB::select("
            SELECT
                tm.kode_mapel,
                tm.nama_mapel,
                tn.semester,
                tn.tahun_ajaran,
                CASE tm.kode_mapel
                    WHEN 'MPN1' THEN tn.MPN1
                    WHEN 'MPN2' THEN tn.MPN2
                    WHEN 'MPN3' THEN tn.MPN3
                    WHEN 'MPN4' THEN tn.MPN4
                    WHEN 'MPN5' THEN tn.MPN5
                    WHEN 'MPN6' THEN tn.MPN6
                    WHEN 'ML1'  THEN tn.ML1
                    ELSE NULL
                END AS nilai
            FROM
                transkrip_mapel tm
            JOIN
                peserta_didik_rombels pdr
                ON pdr.kode_kk = tm.kode_kk AND pdr.tahun_ajaran = tm.tahun_ajaran
            JOIN
                transkrip_nilai tn
                ON tn.nis = pdr.nis AND tn.tahun_ajaran = tm.tahun_ajaran
            WHERE
                pdr.nis = ?
                AND tm.kode_mapel IN ('MPN1', 'MPN2', 'MPN3', 'MPN4', 'MPN5', 'MPN6', 'ML1')
                AND (tn.PSAJ1 IS NULL OR tn.PSAJ1 = 0)
                AND (tn.PSAJ2 IS NULL OR tn.PSAJ2 = 0)
                AND (tn.PSAJ3 IS NULL OR tn.PSAJ3 = 0)
                AND (tn.PSAJ4 IS NULL OR tn.PSAJ4 = 0)
                AND (tn.PSAJ5 IS NULL OR tn.PSAJ5 = 0)
                AND (tn.PSAJ6 IS NULL OR tn.PSAJ6 = 0)
                AND (tn.PSAJ7 IS NULL OR tn.PSAJ7 = 0)
                AND (tn.PSAJ8 IS NULL OR tn.PSAJ8 = 0)
                AND (tn.PSAJ9 IS NULL OR tn.PSAJ9 = 0)
                AND (tn.PSAJ10 IS NULL OR tn.PSAJ10 = 0)
            ORDER BY tm.no_urut_mapel
        ", [$nis]);


        $dataPSAJMPN = DB::select("
            SELECT
                tm.kode_mapel,
                tm.nama_mapel,
                tn.semester,
                CASE tm.kode_mapel
                    WHEN 'PSAJ1' THEN tn.PSAJ1
                    WHEN 'PSAJ2' THEN tn.PSAJ2
                    WHEN 'PSAJ3' THEN tn.PSAJ3
                    WHEN 'PSAJ4' THEN tn.PSAJ4
                    WHEN 'PSAJ5' THEN tn.PSAJ5
                    ELSE NULL
                END AS nilai
            FROM
                transkrip_mapel tm
            JOIN
                peserta_didik_rombels pdr
                    ON pdr.kode_kk = tm.kode_kk AND pdr.tahun_ajaran = tm.tahun_ajaran
            JOIN
                transkrip_nilai tn
                    ON tn.nis = pdr.nis AND tn.tahun_ajaran = tm.tahun_ajaran
            WHERE
                pdr.nis = ?
                AND tm.kode_mapel IN ('PSAJ1','PSAJ2','PSAJ3','PSAJ4','PSAJ5')
        ", [$nis]);


        $groupedMPN = [];
        foreach ($dataMPN as $item) {
            $kode = $item->kode_mapel;
            if (!isset($groupedMPN[$kode])) {
                $groupedMPN[$kode] = [
                    'kode_mapel' => $item->kode_mapel,
                    'nama_mapel' => $item->nama_mapel,
                    'nilai' => [],
                    'psaj_praktek' => null,
                    'psaj_teori' => null
                ];
            }

            // Simpan nilai semester
            $groupedMPN[$kode]['nilai'][$item->semester] = $item->nilai;
        }

        foreach ($dataPSAJMPN as $item) {
            $kode = $item->kode_mapel;

            // Tentukan akan disisipkan ke mapel MPN mana
            if ($kode === 'PSAJ1' && isset($groupedMPN['MPN1'])) {
                $groupedMPN['MPN1']['psaj_praktek'] = $item->nilai;
            } elseif ($kode === 'PSAJ2' && isset($groupedMPN['MPN1'])) {
                $groupedMPN['MPN1']['psaj_teori'] = $item->nilai;
            } elseif ($kode === 'PSAJ3' && isset($groupedMPN['MPN2'])) {
                $groupedMPN['MPN2']['psaj_teori'] = $item->nilai;
            } elseif ($kode === 'PSAJ4' && isset($groupedMPN['MPN3'])) {
                $groupedMPN['MPN3']['psaj_praktek'] = $item->nilai;
            } elseif ($kode === 'PSAJ5' && isset($groupedMPN['MPN3'])) {
                $groupedMPN['MPN3']['psaj_teori'] = $item->nilai;
            }
        }


        // Format ulang hasilnya ke bentuk [kode_mapel => [semester => nilai]]
        /* $groupedMPN = [];
        foreach ($dataMPN as $item) {
            $kode = $item->kode_mapel;
            if (!isset($groupedMPN[$kode])) {
                $groupedMPN[$kode] = [
                    'kode_mapel' => $item->kode_mapel,
                    'nama_mapel' => $item->nama_mapel,
                    'nilai' => []
                ];
            }
            $groupedMPN[$kode]['nilai'][$item->semester] = $item->nilai;
        } */

        //nilai K
        $dataK = DB::select("
            SELECT
                tm.kode_mapel,
                tm.nama_mapel,
                tn.semester,
                tn.tahun_ajaran,
                CASE tm.kode_mapel
                    WHEN 'K1' THEN tn.K1
                    WHEN 'K2' THEN tn.K2
                    WHEN 'K3' THEN tn.K3
                    WHEN 'K4' THEN tn.K4
                    WHEN 'K5' THEN tn.K5
                    ELSE NULL
                END AS nilai
            FROM
                transkrip_mapel tm
            JOIN
                peserta_didik_rombels pdr
                ON pdr.kode_kk = tm.kode_kk AND pdr.tahun_ajaran = tm.tahun_ajaran
            JOIN
                transkrip_nilai tn
                ON tn.nis = pdr.nis AND tn.tahun_ajaran = tm.tahun_ajaran
            WHERE
                pdr.nis = ?
                AND tm.kode_mapel IN ('K1', 'K2', 'K3', 'K4', 'K5')
                AND (tn.PSAJ1 IS NULL OR tn.PSAJ1 = 0)
                AND (tn.PSAJ2 IS NULL OR tn.PSAJ2 = 0)
                AND (tn.PSAJ3 IS NULL OR tn.PSAJ3 = 0)
                AND (tn.PSAJ4 IS NULL OR tn.PSAJ4 = 0)
                AND (tn.PSAJ5 IS NULL OR tn.PSAJ5 = 0)
                AND (tn.PSAJ6 IS NULL OR tn.PSAJ6 = 0)
                AND (tn.PSAJ7 IS NULL OR tn.PSAJ7 = 0)
                AND (tn.PSAJ8 IS NULL OR tn.PSAJ8 = 0)
                AND (tn.PSAJ9 IS NULL OR tn.PSAJ9 = 0)
                AND (tn.PSAJ10 IS NULL OR tn.PSAJ10 = 0)
            ORDER BY tm.kode_mapel
        ", [$nis]);


        $dataPSAJK = DB::select("
            SELECT
                tm.kode_mapel,
                tm.nama_mapel,
                tn.semester,
                CASE tm.kode_mapel
                    WHEN 'PSAJ6' THEN tn.PSAJ6
                    WHEN 'PSAJ7' THEN tn.PSAJ7
                    WHEN 'PSAJ8' THEN tn.PSAJ8
                    ELSE NULL
                END AS nilai
            FROM
                transkrip_mapel tm
            JOIN
                peserta_didik_rombels pdr
                    ON pdr.kode_kk = tm.kode_kk AND pdr.tahun_ajaran = tm.tahun_ajaran
            JOIN
                transkrip_nilai tn
                    ON tn.nis = pdr.nis AND tn.tahun_ajaran = tm.tahun_ajaran
            WHERE
                pdr.nis = ?
                AND tm.kode_mapel IN ('PSAJ6','PSAJ7','PSAJ8')
        ", [$nis]);

        // Format ulang hasilnya ke bentuk [kode_mapel => [semester => nilai]]
        $groupedK = [];
        foreach ($dataK as $item) {
            $kode = $item->kode_mapel;
            if (!isset($groupedK[$kode])) {
                $groupedK[$kode] = [
                    'kode_mapel' => $item->kode_mapel,
                    'nama_mapel' => $item->nama_mapel,
                    'nilai' => [],
                    'psaj_praktek' => null,
                    'psaj_teori' => null
                ];
            }
            $groupedK[$kode]['nilai'][$item->semester] = $item->nilai;
        }


        foreach ($dataPSAJK as $item) {
            $kode = $item->kode_mapel;

            // Tentukan akan disisipkan ke mapel MPN mana
            if ($kode === 'PSAJ6' && isset($groupedK['K1'])) {
                $groupedK['K1']['psaj_teori'] = $item->nilai;
            } elseif ($kode === 'PSAJ7' && isset($groupedK['K2'])) {
                $groupedK['K2']['psaj_praktek'] = $item->nilai;
            } elseif ($kode === 'PSAJ8' && isset($groupedK['K2'])) {
                $groupedK['K2']['psaj_teori'] = $item->nilai;
            }
        }


        //nilai KK
        $dataKK = DB::table('peserta_didik_rombels as pdr')
            ->join('transkrip_nilai as tn', function ($join) {
                $join->on('tn.nis', '=', 'pdr.nis')
                    ->on('tn.tahun_ajaran', '=', 'pdr.tahun_ajaran');
            })
            ->where('pdr.nis', $nis)
            ->where(function ($q) {
                for ($i = 1; $i <= 10; $i++) {
                    $q->whereNull("tn.PSAJ$i")->orWhere("tn.PSAJ$i", 0);
                }
            })
            ->select(
                'tn.semester',
                'tn.tahun_ajaran',
                DB::raw("
                ROUND(
                    (
                        IF(tn.KK1 != 0, tn.KK1, 0) +
                        IF(tn.KK2 != 0, tn.KK2, 0) +
                        IF(tn.KK3 != 0, tn.KK3, 0) +
                        IF(tn.KK4 != 0, tn.KK4, 0) +
                        IF(tn.KK5 != 0, tn.KK5, 0) +
                        IF(tn.KK6 != 0, tn.KK6, 0) +
                        IF(tn.KK7 != 0, tn.KK7, 0) +
                        IF(tn.KK8 != 0, tn.KK8, 0) +
                        IF(tn.KK9 != 0, tn.KK9, 0) +
                        IF(tn.KK10 != 0, tn.KK10, 0)
                    ) /
                    NULLIF(
                        (
                            IF(tn.KK1 != 0, 1, 0) +
                            IF(tn.KK2 != 0, 1, 0) +
                            IF(tn.KK3 != 0, 1, 0) +
                            IF(tn.KK4 != 0, 1, 0) +
                            IF(tn.KK5 != 0, 1, 0) +
                            IF(tn.KK6 != 0, 1, 0) +
                            IF(tn.KK7 != 0, 1, 0) +
                            IF(tn.KK8 != 0, 1, 0) +
                            IF(tn.KK9 != 0, 1, 0) +
                            IF(tn.KK10 != 0, 1, 0)
                        ), 0
                    )
                ) as rata_kk
            ")
            )
            ->orderBy('tn.semester')
            ->get();

        $dataPSAJKK = DB::select("
            SELECT
                tm.kode_mapel,
                tm.nama_mapel,
                tn.semester,
                CASE tm.kode_mapel
                    WHEN 'PSAJ9' THEN tn.PSAJ9
                    WHEN 'PSAJ10' THEN tn.PSAJ10
                    ELSE NULL
                END AS nilai
            FROM
                transkrip_mapel tm
            JOIN
                peserta_didik_rombels pdr
                    ON pdr.kode_kk = tm.kode_kk AND pdr.tahun_ajaran = tm.tahun_ajaran
            JOIN
                transkrip_nilai tn
                    ON tn.nis = pdr.nis AND tn.tahun_ajaran = tm.tahun_ajaran
            WHERE
                pdr.nis = ?
                AND tm.kode_mapel IN ('PSAJ9','PSAJ10')
        ", [$nis]);

        $nilaiPSAJKK = collect($dataPSAJKK)->keyBy('kode_mapel');

        //nilai KWU
        $dataKWU = DB::select("
            SELECT
                tm.kode_mapel,
                tm.nama_mapel,
                tn.semester,
                tn.tahun_ajaran,
                CASE tm.kode_mapel
                    WHEN 'KWU1' THEN tn.KWU1
                    ELSE NULL
                END AS nilai
            FROM
                transkrip_mapel tm
            JOIN
                peserta_didik_rombels pdr
                ON pdr.kode_kk = tm.kode_kk AND pdr.tahun_ajaran = tm.tahun_ajaran
            JOIN
                transkrip_nilai tn
                ON tn.nis = pdr.nis AND tn.tahun_ajaran = tm.tahun_ajaran
            WHERE
                pdr.nis = ?
                AND tm.kode_mapel IN ('KWU1')
                AND (tn.PSAJ1 IS NULL OR tn.PSAJ1 = 0)
                AND (tn.PSAJ2 IS NULL OR tn.PSAJ2 = 0)
                AND (tn.PSAJ3 IS NULL OR tn.PSAJ3 = 0)
                AND (tn.PSAJ4 IS NULL OR tn.PSAJ4 = 0)
                AND (tn.PSAJ5 IS NULL OR tn.PSAJ5 = 0)
                AND (tn.PSAJ6 IS NULL OR tn.PSAJ6 = 0)
                AND (tn.PSAJ7 IS NULL OR tn.PSAJ7 = 0)
                AND (tn.PSAJ8 IS NULL OR tn.PSAJ8 = 0)
                AND (tn.PSAJ9 IS NULL OR tn.PSAJ9 = 0)
                AND (tn.PSAJ10 IS NULL OR tn.PSAJ10 = 0)
            ORDER BY tm.no_urut_mapel
        ", [$nis]);

        // Format ulang hasilnya ke bentuk [kode_mapel => [semester => nilai]]
        $groupedKWU = [];
        foreach ($dataKWU as $item) {
            $kode = $item->kode_mapel;
            if (!isset($groupedKWU[$kode])) {
                $groupedKWU[$kode] = [
                    'kode_mapel' => $item->kode_mapel,
                    'nama_mapel' => $item->nama_mapel,
                    'nilai' => []
                ];
            }
            $groupedKWU[$kode]['nilai'][$item->semester] = $item->nilai;
        }

        //nilai PKL
        /* $dataPKL = DB::select("
            SELECT
                tm.kode_mapel,
                tm.nama_mapel,
                tn.semester,
                tn.tahun_ajaran,
                CASE tm.kode_mapel
                    WHEN 'PKL1' THEN tn.PKL1
                    ELSE NULL
                END AS nilai
            FROM
                transkrip_mapel tm
            JOIN
                peserta_didik_rombels pdr
                ON pdr.kode_kk = tm.kode_kk AND pdr.tahun_ajaran = tm.tahun_ajaran
            JOIN
                transkrip_nilai tn
                ON tn.nis = pdr.nis AND tn.tahun_ajaran = tm.tahun_ajaran
            WHERE
                pdr.nis = ?
                AND tm.kode_mapel IN ('PKL1')
                AND (tn.PSAJ1 IS NULL OR tn.PSAJ1 = 0)
                AND (tn.PSAJ2 IS NULL OR tn.PSAJ2 = 0)
                AND (tn.PSAJ3 IS NULL OR tn.PSAJ3 = 0)
                AND (tn.PSAJ4 IS NULL OR tn.PSAJ4 = 0)
                AND (tn.PSAJ5 IS NULL OR tn.PSAJ5 = 0)
                AND (tn.PSAJ6 IS NULL OR tn.PSAJ6 = 0)
                AND (tn.PSAJ7 IS NULL OR tn.PSAJ7 = 0)
                AND (tn.PSAJ8 IS NULL OR tn.PSAJ8 = 0)
                AND (tn.PSAJ9 IS NULL OR tn.PSAJ9 = 0)
                AND (tn.PSAJ10 IS NULL OR tn.PSAJ10 = 0)
            ORDER BY tm.no_urut_mapel
        ", [$nis]); */

        $dataPKL = DB::table('nilai_prakerin')
            ->where('nis', $nis)
            ->select(
                DB::raw('ROUND((COALESCE(absen,0) + COALESCE(cp1,0) + COALESCE(cp2,0) + COALESCE(cp3,0) + COALESCE(cp4,0)) / 5, 2) as rata_rata')
            )
            ->first();

        /* // Format ulang hasilnya ke bentuk [kode_mapel => [semester => nilai]]
        $groupedPKL = [];
        foreach ($dataPKL as $item) {
            $kode = $item->kode_mapel;
            if (!isset($groupedPKL[$kode])) {
                $groupedPKL[$kode] = [
                    'kode_mapel' => $item->kode_mapel,
                    'nama_mapel' => $item->nama_mapel,
                    'nilai' => []
                ];
            }
            $groupedPKL[$kode]['nilai'][$item->semester] = $item->nilai;
        } */

        //nilai PSAJ
        $dataMP = DB::select("
            SELECT
                tm.kode_mapel,
                tm.nama_mapel,
                tn.semester,
                tn.tahun_ajaran,
                CASE tm.kode_mapel
                    WHEN 'MP1' THEN tn.MP1
                    WHEN 'MP2' THEN tn.MP2
                    WHEN 'MP3' THEN tn.MP3
                    ELSE NULL
                END AS nilai
            FROM
                transkrip_mapel tm
            JOIN
                peserta_didik_rombels pdr
                ON pdr.kode_kk = tm.kode_kk AND pdr.tahun_ajaran = tm.tahun_ajaran
            JOIN
                transkrip_nilai tn
                ON tn.nis = pdr.nis AND tn.tahun_ajaran = tm.tahun_ajaran
            WHERE
                pdr.nis = ?
                AND tm.kode_mapel IN ('MP1','MP2','MP3')
                AND (tn.PSAJ1 IS NULL OR tn.PSAJ1 = 0)
                AND (tn.PSAJ2 IS NULL OR tn.PSAJ2 = 0)
                AND (tn.PSAJ3 IS NULL OR tn.PSAJ3 = 0)
                AND (tn.PSAJ4 IS NULL OR tn.PSAJ4 = 0)
                AND (tn.PSAJ5 IS NULL OR tn.PSAJ5 = 0)
                AND (tn.PSAJ6 IS NULL OR tn.PSAJ6 = 0)
                AND (tn.PSAJ7 IS NULL OR tn.PSAJ7 = 0)
                AND (tn.PSAJ8 IS NULL OR tn.PSAJ8 = 0)
                AND (tn.PSAJ9 IS NULL OR tn.PSAJ9 = 0)
                AND (tn.PSAJ10 IS NULL OR tn.PSAJ10 = 0)
            ORDER BY tm.no_urut_mapel
        ", [$nis]);

        // Format ulang hasilnya ke bentuk [kode_mapel => [semester => nilai]]
        $groupedMP = [];
        foreach ($dataMP as $item) {
            $kode = $item->kode_mapel;
            if (!isset($groupedMP[$kode])) {
                $groupedMP[$kode] = [
                    'kode_mapel' => $item->kode_mapel,
                    'nama_mapel' => $item->nama_mapel,
                    'nilai' => []
                ];
            }
            $groupedMP[$kode]['nilai'][$item->semester] = $item->nilai;
        }


        $transkrip = DB::table('transkrip_nilai')
            ->where('nis', $nis)
            ->where('semester', '<', 6)
            ->orderBy('semester')
            ->get();

        $rataPerSemester = [];

        foreach ($transkrip as $item) {
            $semester = $item->semester;
            $total = 0;
            $count = 0;

            foreach ((array) $item as $field => $value) {
                // Lewati kolom non-nilai dan PSAJ
                if (in_array($field, ['id', 'tahun_ajaran', 'nis', 'semester', 'created_at', 'updated_at'])) {
                    continue;
                }

                if (str_starts_with($field, 'PSAJ')) {
                    continue;
                }

                if ($value != 0) {
                    $total += $value;
                    $count++;
                }
            }

            if ($count > 0) {
                $rataPerSemester[$semester] = number_format($total / $count, 2, '.', '');
            } else {
                $rataPerSemester[$semester] = null; // atau 0 jika lebih cocok
            }
        }

        $rataAkhirPkl = $dataPKL && $dataPKL->rata_rata !== null ? $dataPKL->rata_rata : 0;

        $nilaiPsaj = DB::table('transkrip_nilai')
            ->where('nis', $nis)
            ->select(
                DB::raw('
            NULLIF(PSAJ1, 0) as PSAJ1,
            NULLIF(PSAJ2, 0) as PSAJ2,
            NULLIF(PSAJ3, 0) as PSAJ3,
            NULLIF(PSAJ4, 0) as PSAJ4,
            NULLIF(PSAJ5, 0) as PSAJ5,
            NULLIF(PSAJ6, 0) as PSAJ6,
            NULLIF(PSAJ7, 0) as PSAJ7,
            NULLIF(PSAJ8, 0) as PSAJ8,
            NULLIF(PSAJ9, 0) as PSAJ9,
            NULLIF(PSAJ10, 0) as PSAJ10
        ')
            )
            ->get();

        $nilaiPraktek = [];
        $nilaiTeori = [];

        foreach ($nilaiPsaj as $row) {
            $praktek = [$row->PSAJ1, $row->PSAJ4, $row->PSAJ7, $row->PSAJ9];
            $teori = [$row->PSAJ2, $row->PSAJ3, $row->PSAJ5, $row->PSAJ6, $row->PSAJ8, $row->PSAJ10];

            $nilaiPraktek = array_merge($nilaiPraktek, array_filter($praktek, fn($n) => $n !== null));
            $nilaiTeori = array_merge($nilaiTeori, array_filter($teori, fn($n) => $n !== null));
        }

        $rataPsajPraktek = count($nilaiPraktek) ? number_format(array_sum($nilaiPraktek) / count($nilaiPraktek), 2, '.', '') : '-';
        $rataPsajTeori = count($nilaiTeori) ? number_format(array_sum($nilaiTeori) / count($nilaiTeori), 2, '.', '') : '-';

        return view('pages.pesertadidik.transkrip-peserta-didik', [
            'dataRombel' => $dataRombel,
            'kelulusan' => $kelulusan,
            'datasiswalulus' => $datasiswalulus,
            'dataSiswa' => $dataSiswa,
            'dataMPN' => $groupedMPN,
            'dataPSAJMPN' => $dataPSAJMPN,
            'dataPSAJK' => $dataPSAJK,
            'dataPSAJKK' => $dataPSAJKK,
            'nilaiPSAJKK' => $nilaiPSAJKK,
            'dataKWU' => $groupedKWU,
            'dataPKL' => $dataPKL,
            'dataMP' => $groupedMP,
            'dataK' => $groupedK,
            'dataKK' => $dataKK,
            'rataPerSemester' => $rataPerSemester,
            'rataPsajPraktek' => $rataPsajPraktek,
            'rataPsajTeori' => $rataPsajTeori,
            'rataAkhirPkl' => $rataAkhirPkl,
        ]);
    }
}
