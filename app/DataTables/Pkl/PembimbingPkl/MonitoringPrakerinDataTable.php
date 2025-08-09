<?php

namespace App\DataTables\Pkl\PembimbingPkl;

use App\Models\Pkl\AdministratorPkl\PembimbingPrakerin;
use App\Models\Pkl\AdministratorPkl\PenempatanPrakerin;
use App\Models\Pkl\AdministratorPkl\Perusahaan;
use App\Models\Pkl\PembimbingPkl\MonitoringPrakerin;
use App\Traits\DatatableHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MonitoringPrakerinDataTable extends DataTable
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
            ->addColumn('tgl_monitoring', function ($row) {
                return Carbon::parse($row->tgl_monitoring)
                    ->locale('id') // Mengatur bahasa ke Indonesia
                    ->translatedFormat('d F Y');
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
    public function query(MonitoringPrakerin $model): QueryBuilder
    {

        $query = $model->newQuery();
        // Ambil id_personil dari user yang sedang login
        $idPersonil = auth()->user()->personal_id;

        $query->select(
            'monitoring_prakerins.*',
            'perusahaans.nama as perusahaan_nama',
            'personil_sekolahs.namalengkap as pembimbing_namalengkap'
        )
            ->join('perusahaans', 'monitoring_prakerins.id_perusahaan', '=', 'perusahaans.id')
            ->join('personil_sekolahs', 'monitoring_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')
            ->where('monitoring_prakerins.id_personil', $idPersonil);

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('monitoringprakerin-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => true,
                'pageLength' => 25,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 422px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('perusahaan_nama')->title('Perusahaan'),
            Column::make('tgl_monitoring')->title('Tgl Monitoring'),
            Column::make('catatan_monitoring')->title('Catatan'),
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
        return 'MonitoringPrakerin_' . date('YmdHis');
    }
}
