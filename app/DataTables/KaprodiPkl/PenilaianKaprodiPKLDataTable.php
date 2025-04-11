<?php

namespace App\DataTables\KaprodiPkl;

use App\Models\AdministratorPkl\PesertaPrakerin;
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
                $total_hari = 78;

                $persentase = ($jumlah_hadir / $total_hari) * 100;
                $persentaseFormatted = number_format($persentase, 2); // 2 angka di belakang koma

                return "{$jumlah_hadir} hari <br>({$persentaseFormatted}%)";
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
                $jurnal_seharusnya = 48;

                $persentase = ($total_jurnal / $jurnal_seharusnya) * 100;
                $persentaseFormatted = number_format($persentase, 2); // 2 angka di belakang koma

                // Beri warna merah jika kurang dari 85%
                $warna = $persentase < 85 ? 'style="color:red;"' : '';

                // Hitung distribusi CP
                $cp1 = round($total_jurnal * 0.15);
                $cp2 = round($total_jurnal * 0.65);
                $cp3 = round($total_jurnal * 0.20);

                return "{$total_jurnal} entri <br>
                <span {$warna}>({$persentaseFormatted}%)</span><br>
                <small>CP1: {$cp1}, CP2: {$cp2}, CP3: {$cp3}</small>";
            })
            ->addColumn('nilai_CP1', function ($row) {

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

                // Hitung distribusi CP
                $cp1 = round($total_jurnal * 0.15);

                // Hitung nilai CP1 berdasarkan range
                if ($cp1 >= 8 && $cp1 <= 20) {
                    $nilai_cp1 = 98;
                } elseif ($cp1 >= 5 && $cp1 <= 7) {
                    $nilai_cp1 = 94;
                } elseif ($cp1 >= 3 && $cp1 <= 4) {
                    $nilai_cp1 = 84;
                } elseif ($cp1 >= 1 && $cp1 <= 2) {
                    $nilai_cp1 = 73;
                } else {
                    $nilai_cp1 = 0; // jika cp1 = 0
                }

                $warna = $nilai_cp1 < 85 ? 'style="color:red;"' : '';


                return "<span {$warna}>{$nilai_cp1}</span>";
            })
            ->addColumn('nilai_CP2', function ($row) {

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
                $cp2 = round($total_jurnal * 0.65);

                // Hitung nilai CP1 berdasarkan range
                if ($cp2 >= 32 && $cp2 <= 60) {
                    $nilai_cp2 = 97;
                } elseif ($cp2 >= 26 && $cp2 <= 31) {
                    $nilai_cp2 = 95;
                } elseif ($cp2 >= 20 && $cp2 <= 25) {
                    $nilai_cp2 = 85;
                } elseif ($cp2 >= 14 && $cp2 <= 19) {
                    $nilai_cp2 = 75;
                } elseif ($cp2 >= 5 && $cp2 <= 13) {
                    $nilai_cp2 = 65;
                } else {
                    $nilai_cp2 = 0; // jika cp2 = 0
                }

                $warna = $nilai_cp2 < 75 ? 'style="color:red;"' : '';


                return "<span {$warna}>{$nilai_cp2}</span>";
            })
            ->addColumn('nilai_CP3', function ($row) {

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
                $cp3 = round($total_jurnal * 0.20);

                // Hitung nilai CP1 berdasarkan range
                if ($cp3 >= 11 && $cp3 <= 35) {
                    $nilai_cp3 = 95;
                } elseif ($cp3 >= 7 && $cp3 <= 10) {
                    $nilai_cp3 = 90;
                } elseif ($cp3 >= 4 && $cp3 <= 6) {
                    $nilai_cp3 = 85;
                } elseif ($cp3 >= 1 && $cp3 <= 3) {
                    $nilai_cp3 = 65;
                } else {
                    $nilai_cp3 = 0; // jika cp3 = 0
                }

                $warna = $nilai_cp3 < 80 ? 'style="color:red;"' : '';


                return "<span {$warna}>{$nilai_cp3}</span>";
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
                'nilai_CP1',
                'nilai_CP2',
                'nilai_CP3',
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
            ->select(
                'peserta_prakerins.*',
                'kompetensi_keahlians.nama_kk',
                'peserta_didiks.nama_lengkap as nama_siswa',
                'peserta_didik_rombels.rombel_nama',
                'perusahaans.nama as nama_perusahaan',
                'perusahaans.alamat as alamat_perusahaan',
            )
            ->orderBy('peserta_didik_rombels.rombel_nama')
            ->orderBy('peserta_didiks.nis');

        /* $query->join('peserta_didiks', 'peserta_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('kompetensi_keahlians', 'peserta_prakerins.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->join('peserta_didik_rombels', 'peserta_prakerins.nis', '=', 'peserta_didik_rombels.nis')
            ->select(
                'peserta_prakerins.*',
                'peserta_didiks.nama_lengkap',
                'kompetensi_keahlians.nama_kk',
                'peserta_didik_rombels.rombel_nama'
            ); // Tambahkan nama_kk */

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
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ])->parameters([
                'lengthChange' => false, // Menghilangkan dropdown "Show entries"
                'searching' => false,    // Menghilangkan kotak pencarian
                'pageLength' => 36,       // Menampilkan 50 baris per halaman
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
            Column::make('nilai_CP1')->title('CP1')->addClass('text-center'),
            Column::make('nilai_CP2')->title('CP2')->addClass('text-center'),
            Column::make('nilai_CP3')->title('CP3')->addClass('text-center'),
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
