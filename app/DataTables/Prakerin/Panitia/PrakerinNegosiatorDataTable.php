<?php

namespace App\DataTables\Prakerin\Panitia;

use App\Models\Prakerin\Panitia\PrakerinNegosiator;
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

class PrakerinNegosiatorDataTable extends DataTable
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
            ->addColumn('namaguru', function ($row) {
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
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'namaguru']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PrakerinNegosiator $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('prakerinnegosiator-table')
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
            Column::make('tahunajaran')->title('Tahun Ajaran'),
            Column::make('namaguru')->title('Nama Negosiator'),
            Column::make('gol_ruang')->title('Golongan Ruang'),
            Column::make('jabatan')->title('Jabatan'),
            Column::make('id_nego')->title('Identitas Nego'),
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
        return 'PrakerinNegosiator_' . date('YmdHis');
    }
}
