<?php

namespace App\DataTables\WebSite;

use App\Models\WebSite\TeamPengembang;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TeamPengembangDataTable extends DataTable
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
            ->addColumn('photo', function ($row) {
                // Tentukan path default berdasarkan jenis kelamin
                $defaultPhotoPath = $row->jeniskelamin === 'Laki-laki'
                    ? asset('images/cowok.png')
                    : asset('images/cewek.png');

                // Tentukan path photo dari database
                $imagePath = base_path('images/team/' . $row->photo);
                $logoPath = '';

                // Cek apakah file photo ada di folder 'images/personil'
                if ($row->photo && file_exists($imagePath)) {
                    $logoPath = asset('images/team/' . $row->photo);
                } else {
                    // Jika file tidak ditemukan, gunakan photo default berdasarkan jenis kelamin
                    $logoPath = $defaultPhotoPath;
                }

                // Mengembalikan tag img dengan path gambar
                return '<img src="' . $logoPath . '" alt="photo" width="150" />';
            })
            ->addIndexColumn()
            ->rawColumns(['photo']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(TeamPengembang $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('namalengkap', 'asc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('teampengembang-table')
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
            Column::make('namalengkap')->title('Nama Lengkap'),
            Column::make('jeniskelamin')->title('Jenis Kelamin'),
            Column::make('jabatan'),
            Column::make('deskripsi'),
            Column::make('photo'),
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
        return 'TeamPengembang_' . date('YmdHis');
    }
}
