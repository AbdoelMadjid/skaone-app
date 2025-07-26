<?php

namespace App\DataTables\ManajemenSekolah;

use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\ManajemenSekolah\WaliKelas;
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

class WaliKelasDataTable extends DataTable
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
            ->filterColumn('nama_walikelas', function ($query, $keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('personil_sekolahs.namalengkap', 'like', "%{$keyword}%")
                        ->orWhere('wali_kelas.wali_kelas', 'like', "%{$keyword}%");
                });
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
    public function query(): QueryBuilder
    {
        // Ambil tahun ajaran dan semester aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();

        // Sesuaikan query untuk menggunakan kolom primary key yang benar
        return WaliKelas::query()->select([
            'wali_kelas.*',
            DB::raw('CONCAT(wali_kelas.wali_kelas, " - ", personil_sekolahs.namalengkap) as nama_walikelas'),
            // Pastikan tabel 'bidang_keahlians' terkait dengan model 'ProgramKeahlian'
        ])
            ->join('personil_sekolahs', 'wali_kelas.wali_kelas', '=', 'personil_sekolahs.id_personil')
            ->where('wali_kelas.tahunajaran', $tahunAjaranAktif->tahunajaran);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('walikelas-table')
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
                'scrollY' => "calc(100vh - 341px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('tahunajaran')->title('Tahun Ajaran')->addClass('text-center'),
            Column::make('rombel')->addClass('text-center'),
            Column::make('kode_rombel')->addClass('text-center'),
            Column::make('nama_walikelas')->title('Wali Kelas'),
            /*  Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'), */
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'WaliKelas_' . date('YmdHis');
    }
}
