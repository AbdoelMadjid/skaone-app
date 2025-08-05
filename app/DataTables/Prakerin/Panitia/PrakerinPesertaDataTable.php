<?php

namespace App\DataTables\Prakerin\Panitia;

use App\Models\Prakerin\Panitia\PrakerinPeserta;
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

class PrakerinPesertaDataTable extends DataTable
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

                return $pesertaDidik->nama_lengkap; // Mengambil nama siswa dari hasil join
            })
            ->addColumn('nama_kk', function ($row) {
                $namaKK = DB::table('kompetensi_keahlians')
                    ->where('idkk', $row->kode_kk)
                    ->select('nama_kk') // Ambil semua field yang diperlukan
                    ->first();

                return $namaKK->nama_kk; // Mengambil nama siswa dari hasil join
            })
            ->addColumn('nama_kelas', function ($row) {
                $namaKelas = DB::table('peserta_didik_rombels')
                    ->where('tahun_ajaran', $row->tahunajaran)
                    ->where('nis', $row->nis)
                    ->where('kode_kk', $row->kode_kk)
                    ->select('rombel_nama') // Ambil semua field yang diperlukan
                    ->first();

                return $namaKelas->rombel_nama; // Mengambil nama siswa dari hasil join
            })
            ->filterColumn('nama_siswa', function ($query, $keyword) {
                $query->whereIn('nis', function ($subquery) use ($keyword) {
                    $subquery->select('nis')
                        ->from('peserta_didiks')
                        ->where('nama_lengkap', 'like', "%{$keyword}%");
                });
            })
            ->filterColumn('nama_kk', function ($query, $keyword) {
                $query->whereIn('kode_kk', function ($subquery) use ($keyword) {
                    $subquery->select('idkk')
                        ->from('kompetensi_keahlians')
                        ->where('nama_kk', 'like', "%{$keyword}%");
                });
            })
            ->filterColumn('nama_kelas', function ($query, $keyword) {
                $query->whereIn(DB::raw('(nis, tahunajaran, kode_kk)'), function ($subquery) use ($keyword) {
                    $subquery->select(DB::raw('nis, tahun_ajaran, kode_kk'))
                        ->from('peserta_didik_rombels')
                        ->where('rombel_nama', 'like', "%{$keyword}%");
                });
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                unset($actions['Detail']);
                unset($actions['Edit']);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'nama_siswa', 'nama_kk']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PrakerinPeserta $model): QueryBuilder
    {
        return $model->newQuery()
            ->orderBy('kode_kk')
            ->orderBy('nis');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('prakerinpeserta-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(6, 4, 2)
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => true,
                'pageLength' => 100,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 391px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center align-middle')->width(50),
            Column::make('tahunajaran')->addClass('text-center'),
            Column::make('nis')->addClass('text-center')->title('NIS'),
            Column::make('nama_siswa'),
            Column::make('kode_kk')->title('Kode KK')->addClass('text-center'),
            Column::make('nama_kk')->title('Kompetensi Keahlian'),
            Column::make('nama_kelas')->title('Kelas')->addClass('text-center'),
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
        return 'PrakerinPeserta_' . date('YmdHis');
    }
}
