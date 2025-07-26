<?php

namespace App\DataTables\Kurikulum\DataKBM;

use App\Models\Kurikulum\DataKBM\CapaianPembelajaran;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class CapaianPembelajaranDataTable extends DataTable
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
            ->filter(function ($query) {
                // Ambil kata kunci dari request
                if (request()->has('search') && !empty(request('search')['value'])) {
                    $search = request('search')['value'];
                    // Batasi pencarian hanya pada kolom nama_matapelajaran dan nomor_urut_isi_cp
                    $query->where('nama_matapelajaran', 'like', "%{$search}%")
                        ->orWhere('nomor_urut', 'like', "%{$search}%")
                        ->orWhere('isi_cp', 'like', "%{$search}%");
                }
            })
            ->addColumn('nomor_urut_isi_cp', function ($row) {
                return $row->nomor_urut . ' - ' . $row->isi_cp; // Menggabungkan nomor_urut dan isi_cp
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
    public function query(CapaianPembelajaran $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('id', 'asc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('capaianpembelajaran-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => false,
                'pageLength' => 50,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 351px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('kode_cp')->title('Kode CP')->width(150)->searchable(false)->addClass('text-center')->width(200),
            Column::make('nama_matapelajaran')->title('Nama Mata Pelajaran')->searchable(true)->width(200),
            Column::make('element')->title('Elemen')->searchable(true)->width(250),
            Column::make('inisial_mp')->title('Inisial MP')->searchable(true)->width(150)->addClass('text-center'),
            Column::make('nomor_urut_isi_cp')->title('Capaian Pembelajaran')->searchable(true),
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
        return 'CapaianPembelajaran_' . date('YmdHis');
    }
}
