<?php

namespace App\DataTables\Kurikulum\PerangkatUjian;

use App\Models\Kurikulum\PerangkatUjian\JadwalUjian;
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

class JadwalUjianDataTable extends DataTable
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
            ->addColumn('tgl', function ($row) {
                $date = \Carbon\Carbon::parse($row->tanggal)->translatedFormat('l, d M Y');

                return $date;
            })
            ->addColumn('namakk', function ($row) {
                $namaKK = DB::table('kompetensi_keahlians')
                    ->where('idkk', $row->kode_kk)
                    ->value('nama_kk');

                return $namaKK . ' (' . $row->kode_kk . ')';
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['namakk', 'tgl', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(JadwalUjian $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('jadwalujian-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->parameters([
                'lengthChange' => false,
                'searching' => false, // Mengaktifkan pencarian
                'searchDelay' => 500, // Delay pencarian untuk mengurangi beban server
                'pageLength' => 100,
                // ⬇️ Tambahan fitur scroll dan fixedHeader
                'scrollY' => '376px',
                'scrollCollapse' => true,
                'paging' => true,
                'fixedHeader' => true,
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('namakk')->title('Konsentrasi Keahlian'),
            Column::make('tingkat')->title('Tingkat')->addClass('text-center'),
            Column::make('tgl')->title('Tanggal'),
            Column::make('jam_ke')->title('Jam Ke')->addClass('text-center'),
            Column::make('jam_ujian')->title('Waktu Ujian'),
            Column::make('mata_pelajaran')->title('Mata Pelajaran'),
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
        return 'JadwalUjian_' . date('YmdHis');
    }
}
