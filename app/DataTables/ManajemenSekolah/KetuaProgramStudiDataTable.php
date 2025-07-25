<?php

namespace App\DataTables\ManajemenSekolah;

use App\Models\ManajemenSekolah\KetuaProgramStudi;
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

class KetuaProgramStudiDataTable extends DataTable
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
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(): QueryBuilder
    {
        return KetuaProgramStudi::query()->select([
            'ketua_program_studis.*',
            DB::raw('CONCAT(ketua_program_studis.id_kk, " - ", kompetensi_keahlians.nama_kk) as id_kk_nama_kk'),
            // Pastikan tabel 'kompetensi_keahlians' terkait dengan model 'ProgramKeahlian'
        ])
            ->join('kompetensi_keahlians', 'ketua_program_studis.id_kk', '=', 'kompetensi_keahlians.idkk');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('ketuaprogramstudi-table')
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
            Column::make('jabatan'),
            Column::make('id_kk_nama_kk')->title('Kompetensi Keahlian'),
            Column::make('namalengkap')->title('Nama Lengkap'),
            Column::make('mulai_tahun')->title('Mulai Tahun')->addClass('text-center'),
            Column::make('akhir_tahun')->title('Selesai Tahun / AKtif')->addClass('text-center'),
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
        return 'KetuaProgramStudi_' . date('YmdHis');
    }
}
