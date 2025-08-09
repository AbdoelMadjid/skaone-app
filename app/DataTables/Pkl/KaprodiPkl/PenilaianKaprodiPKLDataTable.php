<?php

namespace App\DataTables\Pkl\KaprodiPkl;

use App\Models\Pkl\AdministratorPkl\PesertaPrakerin;
use App\Models\User;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PenilaianKaprodiPKLDataTable extends DataTable
{
    use DatatableHelper;
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('tempat_pkl', function ($row) {

                $idenPerusahaan = '<strong>' . $row->nama_perusahaan . '</strong><br> Alamat : ' .  $row->alamat_perusahaan . '<br>';

                return $idenPerusahaan;
            })
            ->addColumn('absensi', function ($row) {
                $absensi = DB::table('absensi_siswa_pkls')
                    ->select(
                        'nis',
                        DB::raw("SUM(CASE WHEN status = 'HADIR' THEN 1 ELSE 0 END) as jumlah_hadir"),
                        DB::raw("SUM(CASE WHEN status = 'SAKIT' THEN 1 ELSE 0 END) as jumlah_sakit"),
                        DB::raw("SUM(CASE WHEN status = 'IZIN' THEN 1 ELSE 0 END) as jumlah_izin"),
                        DB::raw("SUM(CASE WHEN status = 'ALFA' THEN 1 ELSE 0 END) as jumlah_alfa")
                    )
                    ->groupBy('nis')
                    ->get()
                    ->keyBy('nis'); // Agar hasil bisa diakses langsung dengan nis sebagai key

                $data = $absensi[$row->nis] ?? null;
                $jumlah_hadir = $data->jumlah_hadir ?? 0;
                //$total_hari = 78;

                //$persentase = ($jumlah_hadir / $total_hari) * 100;
                //$persentaseFormatted = number_format($persentase, 2); // 2 angka di belakang koma

                //return "{$jumlah_hadir} hari <br>({$persentaseFormatted}%)";
                return "{$jumlah_hadir}";
                //return $absensi[$row->nis]->jumlah_hadir ?? 0;
            })
            ->addColumn('jurnal', function ($row) {

                // Query jumlah jurnal berdasarkan NIS
                $jumlahJurnal = DB::table('jurnal_pkls')
                    ->select(
                        'penempatan_prakerins.nis',
                        DB::raw("COUNT(jurnal_pkls.id) as total_jurnal")
                    )
                    ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
                    ->where('jurnal_pkls.validasi', 'Sudah') // Tambahkan filter validasi
                    ->groupBy('penempatan_prakerins.nis')
                    ->get()
                    ->keyBy('nis');

                $data = $jumlahJurnal[$row->nis] ?? null;
                $total_jurnal = $data->total_jurnal ?? 0;
                //$jurnal_seharusnya = 48;

                //$persentase = ($total_jurnal / $jurnal_seharusnya) * 100;
                //$persentaseFormatted = number_format($persentase, 2); // 2 angka di belakang koma

                // Beri warna merah jika kurang dari 85%
                //$warna = $persentase < 85 ? 'style="color:red;"' : '';

                // Hitung distribusi CP
                //$cp1 = round($total_jurnal * 0.20);
                //$cp2 = round($total_jurnal * 0.45);
                //$cp3 = round($total_jurnal * 0.35);

                return "{$total_jurnal} entri";
                /*                 return "{$total_jurnal} entri <br>
                <span {$warna}>({$persentaseFormatted}%)</span><br>
                <small>CP1: {$cp1}, CP2: {$cp2}, CP3: {$cp3}</small>"; */
            })
            /* ->addColumn('nilai_absensi', function ($row) {
                $absensi = DB::table('absensi_siswa_pkls')
                    ->select(
                        'nis',
                        DB::raw("SUM(CASE WHEN status = 'HADIR' THEN 1 ELSE 0 END) as jumlah_hadir"),
                        DB::raw("SUM(CASE WHEN status = 'SAKIT' THEN 1 ELSE 0 END) as jumlah_sakit"),
                        DB::raw("SUM(CASE WHEN status = 'IZIN' THEN 1 ELSE 0 END) as jumlah_izin"),
                        DB::raw("SUM(CASE WHEN status = 'ALFA' THEN 1 ELSE 0 END) as jumlah_alfa")
                    )
                    ->groupBy('nis')
                    ->get()
                    ->keyBy('nis');

                $data = $absensi[$row->nis] ?? null;
                $jumlah_hadir = $data->jumlah_hadir ?? 0;
                $total_hari = 78;

                // Hitung persentase kehadiran
                $persentase = ($jumlah_hadir / $total_hari) * 100;
                $persentaseFormatted = number_format($persentase, 2);

                // Hitung nilai absensi
                $nilai_ideal = 96.5;
                if ($jumlah_hadir == $total_hari) {
                    $nilai_absensi = $nilai_ideal;
                } elseif ($jumlah_hadir > $total_hari) {
                    $tambahan = min($jumlah_hadir - $total_hari, 2); // maksimal 2 hari ekstra
                    $nilai_absensi = $nilai_ideal + ($tambahan * 0.5);
                    $nilai_absensi = min($nilai_absensi, 98.5);
                } else {
                    $kurangan = $total_hari - $jumlah_hadir;
                    $nilai_absensi = $nilai_ideal - ($kurangan * 1.0);
                    $nilai_absensi = max($nilai_absensi, 0); // agar tidak negatif
                }

                $nilai_absensi = number_format($nilai_absensi, 2);

                return "{$nilai_absensi}";
            })
            ->addColumn('nilai_CP1', function ($row) {
                $jumlahJurnalSemua = DB::table('jurnal_pkls')
                    ->select(
                        'penempatan_prakerins.nis',
                        DB::raw("COUNT(jurnal_pkls.id) as total_jurnal")
                    )
                    ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
                    ->where('jurnal_pkls.validasi', 'Sudah')
                    ->groupBy('penempatan_prakerins.nis')
                    ->get()
                    ->keyBy('nis'); // penting agar bisa diakses cepat

                $targetJurnal = 48;
                $target_cp1 = round($targetJurnal * 0.20); // = 7
                $nilaiTarget = 92;
                $nilaiMaksimal = 95;

                // Ambil total jurnal siswa
                $data = $jumlahJurnalSemua[$row->nis] ?? null;
                $total_jurnal = $data->total_jurnal ?? 0;
                $cp1 = round($total_jurnal * 0.20);

                // Penilaian langsung tanpa function
                if ($cp1 == $target_cp1) {
                    $nilai_cp1 = $nilaiTarget;
                } elseif ($cp1 < $target_cp1) {
                    $selisih = $cp1 - $target_cp1;
                    $persen = $selisih / $target_cp1;
                    $nilai_cp1 = round($nilaiTarget + ($nilaiTarget * $persen), 2);
                } else {
                    // Nilai naik proporsional dari 91 ke 100
                    $kelebihan = $cp1 - $target_cp1;
                    $persen = min($kelebihan / $target_cp1, 1); // maksimal 100% lebih
                    $nilai_cp1 = round(93 + (($nilaiMaksimal - 93) * $persen), 2);
                }

                $warna = $nilai_cp1 < 80 ? 'style="color:red;"' : '';
                return "<span {$warna}>{$nilai_cp1}</span>";
            })
            ->addColumn('nilai_CP2', function ($row) {
                $jumlahJurnalSemua = DB::table('jurnal_pkls')
                    ->select(
                        'penempatan_prakerins.nis',
                        DB::raw("COUNT(jurnal_pkls.id) as total_jurnal")
                    )
                    ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
                    ->where('jurnal_pkls.validasi', 'Sudah')
                    ->groupBy('penempatan_prakerins.nis')
                    ->get()
                    ->keyBy('nis'); // penting agar bisa diakses cepat

                $targetJurnal = 48;
                $target_cp2 = round($targetJurnal * 0.45); // = 7
                $nilaiTarget = 95;
                $nilaiMaksimal = 98;

                // Ambil total jurnal siswa
                $data = $jumlahJurnalSemua[$row->nis] ?? null;
                $total_jurnal = $data->total_jurnal ?? 0;
                $cp2 = round($total_jurnal * 0.45);

                // Penilaian langsung tanpa function
                if ($cp2 == $target_cp2) {
                    $nilai_cp2 = $nilaiTarget;
                } elseif ($cp2 < $target_cp2) {
                    $selisih = $cp2 - $target_cp2;
                    $persen = $selisih / $target_cp2;
                    $nilai_cp2 = round($nilaiTarget + ($nilaiTarget * $persen), 2);
                } else {
                    // Nilai naik proporsional dari 91 ke 100
                    $kelebihan = $cp2 - $target_cp2;
                    $persen = min($kelebihan / $target_cp2, 1); // maksimal 100% lebih
                    $nilai_cp2 = round(96 + (($nilaiMaksimal - 96) * $persen), 2);
                }

                $warna = $nilai_cp2 < 80 ? 'style="color:red;"' : '';
                return "<span {$warna}>{$nilai_cp2}</span>";
            })
            ->addColumn('nilai_CP3', function ($row) {
                $jumlahJurnalSemua = DB::table('jurnal_pkls')
                    ->select(
                        'penempatan_prakerins.nis',
                        DB::raw("COUNT(jurnal_pkls.id) as total_jurnal")
                    )
                    ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
                    ->where('jurnal_pkls.validasi', 'Sudah')
                    ->groupBy('penempatan_prakerins.nis')
                    ->get()
                    ->keyBy('nis'); // penting agar bisa diakses cepat

                $targetJurnal = 48;
                $target_cp3 = round($targetJurnal * 0.35); // = 7
                $nilaiTarget = 89;
                $nilaiMaksimal = 93;

                // Ambil total jurnal siswa
                $data = $jumlahJurnalSemua[$row->nis] ?? null;
                $total_jurnal = $data->total_jurnal ?? 0;
                $cp3 = round($total_jurnal * 0.35);

                // Penilaian langsung tanpa function
                if ($cp3 == $target_cp3) {
                    $nilai_cp3 = $nilaiTarget;
                } elseif ($cp3 < $target_cp3) {
                    $selisih = $cp3 - $target_cp3;
                    $persen = $selisih / $target_cp3;
                    $nilai_cp3 = round($nilaiTarget + ($nilaiTarget * $persen), 2);
                } else {
                    // Nilai naik proporsional dari 91 ke 100
                    $kelebihan = $cp3 - $target_cp3;
                    $persen = min($kelebihan / $target_cp3, 1); // maksimal 100% lebih
                    $nilai_cp3 = round(90 + (($nilaiMaksimal - 90) * $persen), 2);
                }

                $warna = $nilai_cp3 < 80 ? 'style="color:red;"' : '';
                return "<span {$warna}>{$nilai_cp3}</span>";
            })
            ->addColumn('rataCP', function ($row) {
                $jumlahJurnalSemua = DB::table('jurnal_pkls')
                    ->select(
                        'penempatan_prakerins.nis',
                        DB::raw("COUNT(jurnal_pkls.id) as total_jurnal")
                    )
                    ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
                    ->where('jurnal_pkls.validasi', 'Sudah')
                    ->groupBy('penempatan_prakerins.nis')
                    ->get()
                    ->keyBy('nis');

                $targetJurnal = 48;

                $target_cp1 = round($targetJurnal * 0.20);
                $target_cp2 = round($targetJurnal * 0.45);
                $target_cp3 = round($targetJurnal * 0.35);

                $nilai_cp1_target = 92;
                $nilai_cp2_target = 95;
                $nilai_cp3_target = 89;

                $nilai_cp1_maks = 95;
                $nilai_cp2_maks = 98;
                $nilai_cp3_maks = 93;

                $data = $jumlahJurnalSemua[$row->nis] ?? null;
                $total_jurnal = $data->total_jurnal ?? 0;

                $cp1 = round($total_jurnal * 0.20);
                $cp2 = round($total_jurnal * 0.45);
                $cp3 = round($total_jurnal * 0.35);

                // CP1
                if ($cp1 == $target_cp1) {
                    $nilai_cp1 = $nilai_cp1_target;
                } elseif ($cp1 < $target_cp1) {
                    $persen = ($cp1 - $target_cp1) / $target_cp1;
                    $nilai_cp1 = round($nilai_cp1_target + ($nilai_cp1_target * $persen), 2);
                } else {
                    $persen = min(($cp1 - $target_cp1) / $target_cp1, 1);
                    $nilai_cp1 = round(93 + (($nilai_cp1_maks - 93) * $persen), 2);
                }

                // CP2
                if ($cp2 == $target_cp2) {
                    $nilai_cp2 = $nilai_cp2_target;
                } elseif ($cp2 < $target_cp2) {
                    $persen = ($cp2 - $target_cp2) / $target_cp2;
                    $nilai_cp2 = round($nilai_cp2_target + ($nilai_cp2_target * $persen), 2);
                } else {
                    $persen = min(($cp2 - $target_cp2) / $target_cp2, 1);
                    $nilai_cp2 = round(96 + (($nilai_cp2_maks - 96) * $persen), 2);
                }

                // CP3
                if ($cp3 == $target_cp3) {
                    $nilai_cp3 = $nilai_cp3_target;
                } elseif ($cp3 < $target_cp3) {
                    $persen = ($cp3 - $target_cp3) / $target_cp3;
                    $nilai_cp3 = round($nilai_cp3_target + ($nilai_cp3_target * $persen), 2);
                } else {
                    $persen = min(($cp3 - $target_cp3) / $target_cp3, 1);
                    $nilai_cp3 = round(90 + (($nilai_cp3_maks - 90) * $persen), 2);
                }

                // Hitung rata-rata
                $rata = round(($nilai_cp1 + $nilai_cp2 + $nilai_cp3) / 3, 2);

                $warna = $rata < 85 ? 'style="color:red;"' : '';
                return "<span {$warna}>{$rata}</span>";
            }) */
            ->addColumn('rataCP', function ($row) {
                // Cegah error jika semua nilai NULL (misalnya siswa belum dinilai)
                $nilai = [
                    $row->absen ?? null,
                    $row->cp1 ?? null,
                    $row->cp2 ?? null,
                    $row->cp3 ?? null,
                    $row->cp4 ?? null,
                ];

                // Filter nilai yang tidak null
                $nilaiTersedia = array_filter($nilai, function ($n) {
                    return $n !== null;
                });

                // Jika tidak ada nilai sama sekali, tampilkan "-"
                if (count($nilaiTersedia) === 0) {
                    return '<span style="color:gray;">-</span>';
                }

                // Hitung rata-rata dari nilai yang tersedia
                $rata = round(array_sum($nilaiTersedia) / count($nilaiTersedia), 2);

                // Warnai jika < 75
                $warna = $rata < 75 ? 'style="color:red;"' : '';
                return "<span {$warna}>{$rata}</span>";
            })
            ->addColumn('generateulang', function ($row) {
                if ($row->id_nilai_prakerin) {
                    return '
            <form action="' . route('kaprodipkl.generate', $row->id_nilai_prakerin) . '" method="POST" class="generate-nilai-form">
                ' . csrf_field() . method_field('PUT') . '
                <button type="submit" class="btn btn-sm btn-warning generate-btn">Generate Ulang</button>
            </form>
        ';
                } else {
                    return '<span class="text-muted">Belum Ada</span>';
                }
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns([
                'absensi',
                'tempat_pkl',
                'jurnal',
                /* 'nilai_CP1',
                'nilai_CP2',
                'nilai_CP3',
                'rataCP',
                'nilai_absensi', */
                'rataCP',
                'generateulang',
                'action'
            ]);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PesertaPrakerin $model): QueryBuilder
    {
        $query = $model->newQuery();

        $query->join('peserta_didiks', 'peserta_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('kompetensi_keahlians', 'peserta_prakerins.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->join('peserta_didik_rombels', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->join('penempatan_prakerins', 'peserta_prakerins.nis', '=', 'penempatan_prakerins.nis')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->leftJoin('nilai_prakerin', 'peserta_prakerins.nis', '=', 'nilai_prakerin.nis') // JOIN ke nilai_prakerin
            ->select(
                'peserta_prakerins.*',
                'kompetensi_keahlians.nama_kk',
                'peserta_didiks.nama_lengkap as nama_siswa',
                'peserta_didik_rombels.rombel_nama',
                'perusahaans.nama as nama_perusahaan',
                'perusahaans.alamat as alamat_perusahaan',
                'nilai_prakerin.id as id_nilai_prakerin', // Tambah ID di sini
                'nilai_prakerin.tahun_ajaran',
                'nilai_prakerin.absen',
                'nilai_prakerin.cp1',
                'nilai_prakerin.cp2',
                'nilai_prakerin.cp3',
                'nilai_prakerin.cp4'
            )
            ->orderBy('peserta_didik_rombels.rombel_nama')
            ->orderBy('peserta_didiks.nis');

        if (auth()->check()) {
            $user = User::find(Auth::user()->id);
            if ($user->hasAnyRole(['kaprodiak'])) {
                $query->where('peserta_prakerins.kode_kk', '=', '833');
            } elseif ($user->hasAnyRole(['kaprodibd'])) {
                $query->where('peserta_prakerins.kode_kk', '=', '811');
            } elseif ($user->hasAnyRole(['kaprodimp'])) {
                $query->where('peserta_prakerins.kode_kk', '=', '821');
            } elseif ($user->hasAnyRole(['kaprodirpl'])) {
                $query->where('peserta_prakerins.kode_kk', '=', '411');
            } elseif ($user->hasAnyRole(['kaproditkj'])) {
                $query->where('peserta_prakerins.kode_kk', '=', '421');
            }
        }

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('penilaiankaprodipkl-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => true,
                'pageLength' => 25,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 422px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center align-middle')->width(50),
            Column::make('nis')->addClass('text-center'),
            Column::make('nama_siswa'),
            Column::make('rombel_nama'),
            Column::make('tempat_pkl')->title('Tempat PKL')->width(200),
            Column::make('absensi')->title('Absensi'),
            Column::make('jurnal')->title('Jurnal'),
            Column::make('absen')->title('Absen')->addClass('text-center'),
            Column::make('cp1')->title('CP1')->addClass('text-center'),
            Column::make('cp2')->title('CP2')->addClass('text-center'),
            Column::make('cp3')->title('CP3')->addClass('text-center'),
            Column::make('cp4')->title('CP4')->addClass('text-center'),
            Column::make('rataCP')->title('Rata-Rata')->addClass('text-center'),
            Column::make('generateulang')->title('Generate')->addClass('text-center'),
            /* Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'), */
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'PenilaianKaprodiPKL_' . date('YmdHis');
    }
}
