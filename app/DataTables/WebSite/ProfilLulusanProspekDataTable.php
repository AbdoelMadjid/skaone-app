<?php

namespace App\DataTables\WebSite;

use App\Models\WebSite\ProfilLulusanProspek;
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

class ProfilLulusanProspekDataTable extends DataTable
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
            ->addColumn('nama_kk', function ($row) {
                $konsentrasiKeahlian = DB::table('kompetensi_keahlians')
                    ->where('idkk', $row->id_kk)
                    ->select('nama_kk') // Ambil semua field yang diperlukan
                    ->first();

                if ($konsentrasiKeahlian) {
                    return '(' . $row->id_kk . ') ' . $konsentrasiKeahlian->nama_kk;
                }

                return $row->id_kk . '<em>Data tidak ditemukan</em>';
            })
            ->addColumn('action', function ($row) {
                $actions = $this->basicActions($row);
                unset($actions['Detail']);
                return view('action', compact('actions'));
            })
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ProfilLulusanProspek $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('id_kk', 'asc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('profillulusanprospek-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => false,
                'pageLength' => 100,
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
            Column::make('nama_kk')->title('Konsentrasi Keahlian')->width(200),
            Column::make('tipe'),
            Column::make('deskripsi'),
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
        return 'ProfilLulusanProspek_' . date('YmdHis');
    }
}
