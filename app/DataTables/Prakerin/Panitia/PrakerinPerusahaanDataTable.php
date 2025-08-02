<?php

namespace App\DataTables\Prakerin\Panitia;

use App\Models\Prakerin\Panitia\PrakerinPerusahaan;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PrakerinPerusahaanDataTable extends DataTable
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
            ->addColumn('jabatan_pimpinan', function ($row) {
                return $row->nama_pimpinan . '<br>' . $row->jabatan_pimpinan . '<br>' . $row->id_pimpinan . ' ' . $row->no_ident_pimpinan;
            })
            ->addColumn('jabatan_pembimbing', function ($row) {
                return $row->nama_pembimbing . '<br>' . $row->jabatan_pembimbing . '<br>' . $row->id_pembimbing . ' ' . $row->no_ident_pembimbing;
            })
            ->filterColumn('perusahaan', function ($query, $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('nama', 'like', "%{$keyword}%")
                        ->orWhere('alamat', 'like', "%{$keyword}%");
                });
            })
            ->addColumn('perusahaan', function ($row) {
                return $row->nama . "<br><span class='text-info'>" . $row->alamat . '</span>';
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'jabatan_pimpinan', 'jabatan_pembimbing', 'perusahaan']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PrakerinPerusahaan $model): QueryBuilder
    {
        return $model->newQuery('id', 'asc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('prakerinperusahaan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[1, 'asc']],
                'lengthChange' => false,
                'searching' => true,
                'pageLength' => 50,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 398px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('perusahaan')->title('Perusahaan')->width(350),
            Column::make('jabatan_pimpinan')->title('Jabatan Pimpinan'),
            Column::make('jabatan_pembimbing')->title('Jabatan Pembimbing'),
            Column::make('status')->title('Status'),
            // Kolom untuk aksi
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
        return 'PrakerinPerusahaan_' . date('YmdHis');
    }
}
