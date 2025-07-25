<?php

namespace App\DataTables\ManajemenSekolah;

use App\Models\ManajemenSekolah\KompetensiKeahlian;
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

class KompetensiKeahlianDataTable extends DataTable
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
            ->orderColumn('idkk', '-idkk $1') // Mengatur default ordering menggunakan idbk
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
    public function query(): QueryBuilder
    {
        // Sesuaikan query untuk menggunakan kolom primary key yang benar
        return KompetensiKeahlian::query()->select(['idkk', 'id_bk', 'id_pk', 'nama_kk', 'singkatan'])->select([
            'kompetensi_keahlians.*',
            DB::raw('CONCAT(kompetensi_keahlians.id_bk, " - ", bidang_keahlians.nama_bk) as id_bk_nama_bk'),
            DB::raw('CONCAT(kompetensi_keahlians.id_pk, " - ", program_keahlians.nama_pk) as id_pk_nama_pk'),
        ])
            ->join('bidang_keahlians', 'kompetensi_keahlians.id_bk', '=', 'bidang_keahlians.idbk')
            ->join('program_keahlians', 'kompetensi_keahlians.id_pk', '=', 'program_keahlians.idpk');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('kompetensikeahlian-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            //->responsive(true) // Mengaktifkan responsif
            ->scrollX(true) // Mengaktifkan scroll horizontal
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
            Column::make('idkk')->title('ID Kompetensi')->addClass('text-center'),
            Column::make('id_bk_nama_bk')->title('ID & Nama Bidang'),
            Column::make('id_pk_nama_pk')->title('ID & Nama Program'),
            Column::make('nama_kk')->title('Nama Kompetensi Keahlian'),
            Column::make('singkatan')->title('Singkatan KK')->addClass('text-center'),
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
        return 'KompetensiKeahlian_' . date('YmdHis');
    }
}
