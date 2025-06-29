<?php

namespace App\DataTables\Kurikulum\PerangkatUjian;

use App\Models\Kurikulum\PerangkatUjian\IdentitasUjian;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class IdentitasUjianDataTable extends DataTable
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
            ->addColumn('tgl_ujian', function ($row) {
                return 'Tgl Titimangsa Ujian : <strong>' . \Carbon\Carbon::parse($row->titimangsa_ujian)->format('d-m-Y') .
                    '</strong><br>Tgl Awal Ujian : <strong>' . \Carbon\Carbon::parse($row->tgl_ujian_awal)->format('d-m-Y') .
                    '</strong><br>Tgl Akhir Ujian : <strong>' . \Carbon\Carbon::parse($row->tgl_ujian_akhir)->format('d-m-Y') . '</strong>';
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'tgl_ujian']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(IdentitasUjian $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('identitasujian-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->parameters([
                'lengthChange' => false,
                'searching' => false, // Mengaktifkan pencarian
                'searchDelay' => 500, // Delay pencarian untuk mengurangi beban server
                'pageLength' => 25,
                // ⬇️ Tambahan fitur scroll dan fixedHeader
                'scrollY' => '376px',
                'scrollCollapse' => true,
                'paging' => true,
                'fixedHeader' => true,
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('tahun_ajaran')->title('Tahun Ajaran')->width(100),
            Column::make('semester')->title('Semester')->width(50),
            Column::make('nama_ujian')->title('Nama Ujian'),
            Column::make('kode_ujian')->title('Kode Ujian')->width(110),
            Column::make('tgl_ujian')->title('Tanggal Ujian'),
            Column::make('status')->title('Status')->width(50),
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
        return 'IdentitasUjian_' . date('YmdHis');
    }
}
