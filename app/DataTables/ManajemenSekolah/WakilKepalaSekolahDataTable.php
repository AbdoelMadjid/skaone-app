<?php

namespace App\DataTables\ManajemenSekolah;

use App\Models\ManajemenSekolah\WakilKepalaSekolah;
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

class WakilKepalaSekolahDataTable extends DataTable
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
            ->addColumn('namapersonil', function ($row) {
                $personilSekolah = DB::table('personil_sekolahs')
                    ->where('id_personil', $row->id_personil)
                    ->select('gelardepan', 'namalengkap', 'gelarbelakang') // Ambil semua field yang diperlukan
                    ->first();

                if ($personilSekolah) {
                    return $personilSekolah->gelardepan . ' ' . $personilSekolah->namalengkap . ', ' . $personilSekolah->gelarbelakang;
                }

                return $row->id_personil . '<em>Data tidak ditemukan</em>';
            })
            ->addColumn('action', function ($row) {
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(WakilKepalaSekolah $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('wakilkepalasekolah-table')
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
            Column::make('jabatan')->width(275),
            Column::make('namapersonil')->title('Nama Lengkap'),
            Column::make('mulai_tahun')->title('Mulai Tahun')->addClass('text-center')->width(100),
            Column::make('akhir_tahun')->title('Selesai Tahun / AKtif')->addClass('text-center')->width(200),
            Column::make('motto')->title('Motto'),
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
        return 'WakilKepalaSekolah_' . date('YmdHis');
    }
}
