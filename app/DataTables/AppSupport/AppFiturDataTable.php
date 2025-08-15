<?php

namespace App\DataTables\AppSupport;

use App\Models\AppSupport\AppFitur;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AppFiturDataTable extends DataTable
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
            ->editColumn('nama_fitur', function ($row) {
                // Format `nama_fitur` according to your needs, e.g., ucfirst for proper capitalization
                return ucwords(str_replace('-', ' ', $row->nama_fitur));
            })
            ->addColumn('aktif', function ($row) {
                $checked = $row->aktif === 'Aktif' ? 'checked' : '';
                return "
                <div class='d-flex justify-content-center align-items-center'>
                    <div class='form-check form-switch form-switch-lg' dir='ltr'>
                        <input
                            type='checkbox'
                            class='form-check-input'
                            id='aktifSwitch-{$row->id}'
                            $checked
                            onchange='saveAktif(this, {$row->id})'>
                        <label class='form-check-label' id='aktifLabel-{$row->id}' for='aktifSwitch-{$row->id}'>
                            {$row->aktif}
                        </label>
                    </div>
                </div>";
            })
            ->addColumn('action', function ($row) {
                $actions = $this->basicActions($row);
                unset($actions['Detail']);
                unset($actions['Delete']);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['aktif', 'nama_fitur', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(AppFitur $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('nama_fitur', 'asc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('appfitur-table')
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
                'scrollY' => "calc(100vh - 349px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center align-middle')->width(50),
            Column::make('nama_fitur')->addClass('align-middle'),
            Column::make('aktif')->title('Aktif/Non Aktif')->addClass('text-center align-middle'),
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
        return 'AppFitur_' . date('YmdHis');
    }
}
