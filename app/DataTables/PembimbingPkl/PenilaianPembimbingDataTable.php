<?php

namespace App\DataTables\PembimbingPkl;

use App\Models\AdministratorPkl\PembimbingPrakerin;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PenilaianPembimbingDataTable extends DataTable
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

                return "{$jumlah_hadir} hari ({$persentaseFormatted}%)";
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
                    ->groupBy('penempatan_prakerins.nis')
                    ->get()
                    ->keyBy('nis');

                $data = $jumlahJurnal[$row->nis] ?? null;
                $total_jurnal = $data->total_jurnal ?? 0;
                $jurnal_seharusnya = 48;

                $persentase = ($total_jurnal / $jurnal_seharusnya) * 100;
                $persentaseFormatted = number_format($persentase, 2); // 2 angka di belakang koma

                return "{$total_jurnal} entri ({$persentaseFormatted}%)";
            })
            ->addColumn('tempat_pkl', function ($row) {

                $idenPerusahaan = '<strong>' . $row->perusahaan_nama . '</strong><br> Alamat : ' .  $row->perusahaan_alamat;

                return $idenPerusahaan;
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
                'action'
            ]);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PembimbingPrakerin $model): QueryBuilder
    {
        // Ambil id_personil dari user yang sedang login
        $idPersonil = auth()->user()->personal_id;

        return $model
            ->select(
                'penempatan_prakerins.id',
                'penempatan_prakerins.tahunajaran',
                'penempatan_prakerins.kode_kk',
                'kompetensi_keahlians.nama_kk',
                'penempatan_prakerins.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didik_rombels.rombel_nama',
                'penempatan_prakerins.id_dudi',
                'perusahaans.nama as perusahaan_nama',
                'perusahaans.alamat as perusahaan_alamat',
                'pembimbing_prakerins.id_personil',
                'personil_sekolahs.namalengkap as pembimbing_namalengkap'
            )
            ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->join('kompetensi_keahlians', 'penempatan_prakerins.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->where('pembimbing_prakerins.id_personil', $idPersonil)
            ->orderBy('peserta_didik_rombels.rombel_nama')
            ->orderBy('penempatan_prakerins.nis');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('penilaianpembimbing-table')
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
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('nama_lengkap')->title('Nama Peserta Didik'),
            Column::make('rombel_nama')->title('Rombel'),
            Column::make('tempat_pkl')->title('Tempat PKL')->width(300),
            Column::make('absensi')->title('Absensi'),
            Column::make('jurnal')->title('Jurnal'),
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
        return 'PenilaianPembimbing_' . date('YmdHis');
    }
}
