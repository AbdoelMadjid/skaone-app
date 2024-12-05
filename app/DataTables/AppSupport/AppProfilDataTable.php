<?php

namespace App\DataTables\AppSupport;

use App\Models\AppSupport\AppProfil;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AppProfilDataTable extends DataTable
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
            ->addColumn('action', function ($row) {
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addColumn('app_icon', function ($row) {
                // Define the paths
                $imagePath = public_path('images/' . $row->app_icon);
                $iconPath = '';

                // Check if the file exists in the 'images' folder
                if (file_exists($imagePath)) {
                    $iconPath = asset('images/' . $row->app_icon);
                } else {
                    // If the file doesn't exist, fall back to the 'build/images' folder
                    $iconPath = asset('build/images/' . $row->app_icon);
                }

                // Return the image HTML tag
                return '<img src="' . $iconPath . '" width="50" height="50" alt="Icon" />';
            })
            ->addColumn('app_logo', function ($row) {
                // Define the paths
                $imagePath = public_path('images/' . $row->app_logo);
                $logoPath = '';

                // Check if the file exists in the 'images' folder
                if (file_exists($imagePath)) {
                    $logoPath = asset('images/' . $row->app_logo);
                } else {
                    // If the file doesn't exist, fall back to the 'build/images' folder
                    $logoPath = asset('build/images/' . $row->app_logo);
                }

                // Return the image HTML tag
                return '<img src="' . $logoPath . '" alt="Logo" />';
            })
            ->addIndexColumn()
            ->rawColumns(['app_icon', 'app_logo', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(AppProfil $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('appprofil-table')
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
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('app_nama'),
            Column::make('app_deskripsi'),
            Column::make('app_tahun')->addClass('text-center'),
            Column::make('app_pengembang'),
            Column::make('app_icon')->addClass('text-center'),
            Column::make('app_logo')->addClass('text-center'),
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
        return 'AppProfil_' . date('YmdHis');
    }
}
