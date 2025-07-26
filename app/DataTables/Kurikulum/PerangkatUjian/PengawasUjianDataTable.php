<?php

namespace App\DataTables\Kurikulum\PerangkatUjian;

use App\Models\Kurikulum\PerangkatUjian\PengawasUjian;
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

class PengawasUjianDataTable extends DataTable
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
            ->addColumn('tanggal_ujian', function ($row) {
                $date = \Carbon\Carbon::parse($row->tanggal_ujian)->translatedFormat('l, d M Y');

                return $date;
            })
            ->addColumn('nama_pengawas', function ($row) {
                $namaPengawas = DB::table('daftar_pengawas_ujian')
                    ->where('kode_pengawas', $row->kode_pengawas)
                    ->select('nama_lengkap') // Ambil semua field yang diperlukan
                    ->first();

                return $row->kode_pengawas . '. - ' . $namaPengawas->nama_lengkap; // Mengambil nama siswa dari hasil join
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                unset($actions['Edit']);
                unset($actions['Detail']);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'tanggal_ujian', 'nama_pengawas']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PengawasUjian $model): QueryBuilder
    {
        return $model->newQuery()
            ->orderByRaw('CAST(nomor_ruang AS UNSIGNED) ASC')
            ->orderBy('jam_ke')
            ->orderBy('tanggal_ujian');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pengawasujian-table')
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
                'scrollY' => "calc(100vh - 416px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('kode_ujian')->title('Kode Ujian')->addClass('text-center'),
            Column::make('nomor_ruang')->title('Nomor Ruang')->addClass('text-center'),
            Column::make('tanggal_ujian')->title('Tanggal Ujian')->addClass('text-center'),
            Column::make('jam_ke')->title('Jam Ke')->addClass('text-center'),
            Column::make('nama_pengawas')->title('Kode dan Nama Pengawas'),
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
        return 'PengawasUjian_' . date('YmdHis');
    }
}
