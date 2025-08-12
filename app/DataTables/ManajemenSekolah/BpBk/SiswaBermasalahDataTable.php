<?php

namespace App\DataTables\ManajemenSekolah\BpBk;

use App\Models\ManajemenSekolah\BpBk\BpBkSiswaBermasalah;
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

class SiswaBermasalahDataTable extends DataTable
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
            ->addColumn('nama_siswa', function ($row) {
                $pesertaDidik = DB::table('peserta_didiks')
                    ->where('nis', $row->nis)
                    ->select('nama_lengkap') // Ambil semua field yang diperlukan
                    ->first();

                return $row->nis . "<br><span class='text-info'>" . $pesertaDidik->nama_lengkap . "</span>"; // Mengambil nama siswa dari hasil join
            })
            ->addColumn('tanggal', function ($row) {
                return \Carbon\Carbon::parse($row->tanggal)->format('d-m-Y');
            })
            ->addColumn('thnajaran_semester', function ($row) {
                return $row->tahunajaran . "<br>" . $row->semester;
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'nama_siswa', 'thnajaran_semester']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(BpBkSiswaBermasalah $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('tanggal', 'desc');;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('siswabermasalah-table')
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
            Column::make('thnajaran_semester')->title('Tahun Ajaran')->addClass('text-center'),
            Column::make('tanggal')->addClass('text-center'),
            Column::make('nama_siswa'),
            Column::make('rombel')->addClass('text-center'),
            Column::make('jenis_kasus'),
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
        return 'SiswaBermasalah_' . date('YmdHis');
    }
}
