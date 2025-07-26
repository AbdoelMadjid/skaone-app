<?php

namespace App\DataTables\Kurikulum\PerangkatUjian;

use App\Models\Kurikulum\PerangkatUjian\RuangUjian;
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

class RuangUjianDataTable extends DataTable
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
            ->addColumn('nama_kelas_kiri', function ($row) {
                $namaKelasKiri = DB::table('rombongan_belajars')
                    ->where('kode_rombel', $row->kelas_kiri)
                    ->select('rombel') // Ambil semua field yang diperlukan
                    ->first();

                return $namaKelasKiri ? $namaKelasKiri->rombel : '-'; // Mengambil nama siswa dari hasil join
            })
            ->addColumn('nama_kelas_kanan', function ($row) {
                $namaKelasKanan = DB::table('rombongan_belajars')
                    ->where('kode_rombel', $row->kelas_kanan)
                    ->select('rombel') // Ambil semua field yang diperlukan
                    ->first();

                return $namaKelasKanan ? $namaKelasKanan->rombel : '-'; // Mengambil nama siswa dari hasil join
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(RuangUjian $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('ruangujian-table')
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
            Column::make('nomor_ruang')->title('No. Ruang')->addClass('text-center'),
            Column::make('nama_kelas_kiri')->title('Kelas Kiri')->addClass('text-center'),
            Column::make('nama_kelas_kanan')->title('Kelas Kanan')->addClass('text-center'),
            Column::make('kode_kelas_kiri')->title('Kode Kelas Kiri')->addClass('text-center'),
            Column::make('kode_kelas_kanan')->title('Kode Kelas Kanan')->addClass('text-center'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'RuangUjian_' . date('YmdHis');
    }
}
