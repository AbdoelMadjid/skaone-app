<?php

namespace App\DataTables\Kurikulum\PerangkatUjian;

use App\Models\Kurikulum\PerangkatUjian\PesertaUjian;
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

class PesertaUjianDataTable extends DataTable
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
            ->addColumn('nama_siswa', function ($row) {
                $pesertaDidik = DB::table('peserta_didiks')
                    ->where('nis', $row->nis)
                    ->select('nama_lengkap') // Ambil semua field yang diperlukan
                    ->first();

                return $pesertaDidik->nama_lengkap; // Mengambil nama siswa dari hasil join
            })
            ->addColumn('nama_kelas', function ($row) {
                $namaKelas = DB::table('rombongan_belajars')
                    ->where('kode_rombel', $row->kelas)
                    ->select('rombel') // Ambil semua field yang diperlukan
                    ->first();

                return $namaKelas->rombel; // Mengambil nama siswa dari hasil join
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'nama_siswa', 'nama_kelas']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PesertaUjian $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pesertaujian-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => false,
                'pageLength' => 25,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 352px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('kode_ujian')->title('Kode Ujian'),
            Column::make('nis')->title('NIS'),
            Column::make('nama_siswa')->title('Nama Siswa'),
            Column::make('nama_kelas')->title('Kelas'),
            Column::make('nomor_peserta')->title('Nomor Peserta')->addClass('text-center'),
            Column::make('nomor_ruang')->title('Nomor Ruang')->addClass('text-center'),
            Column::make('posisi_duduk')->title('Posisi Duduk'),
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
        return 'PesertaUjian_' . date('YmdHis');
    }
}
