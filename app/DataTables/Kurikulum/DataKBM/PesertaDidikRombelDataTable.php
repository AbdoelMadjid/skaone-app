<?php

namespace App\DataTables\Kurikulum\DataKBM;

use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\TahunAjaran;
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

class PesertaDidikRombelDataTable extends DataTable
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
                return $row->nama_lengkap; // Mengambil nama siswa dari hasil join
            })
            ->addColumn('nama_kk', function ($row) {
                return $row->nama_kk; // Mengambil nama kompetensi keahlian dari hasil join
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
    public function query(PesertaDidikRombel $model): QueryBuilder
    {
        $query = $model->newQuery();

        // Ambil tahun ajaran aktif (hanya sekali di awal)
        $thAktif = TahunAjaran::aktif()->first()?->tahunajaran;

        // Ambil parameter filter dari request
        if (request()->has('search') && !empty(request('search'))) {
            $query->where('peserta_didiks.nama_lengkap', 'like', '%' . request('search') . '%');
        }

        // Jika request punya thAjar, pakai itu. Kalau tidak, pakai tahun ajaran aktif.
        if (request('thAjar') && request('thAjar') !== 'all') {
            $query->where('tahun_ajaran', request('thAjar'));
        } elseif ($thAktif) {
            $query->where('tahun_ajaran', $thAktif);
        }

        /* if (request()->has('thAjar') && request('thAjar') != 'all') {
            $query->where('tahun_ajaran', request('thAjar'));
        } */

        if (request()->has('tingKat') && request('tingKat') != 'all') {
            $query->where('peserta_didik_rombels.rombel_tingkat', request('tingKat'));
        }

        if (request()->has('kodeKK') && request('kodeKK') != 'all') {
            $query->where('peserta_didik_rombels.kode_kk', request('kodeKK'));
        }

        if (request()->has('romBel') && request('romBel') != 'all') {
            $query->where('rombel_kode', request('romBel'));
        }

        // Handle ordering
        if (request()->has('order')) {
            $orderColumn = request('columns')[request('order')[0]['column']]['data']; // Ambil kolom yang diurutkan
            $orderDir = request('order')[0]['dir']; // Dapatkan arah pengurutan (asc atau desc)

            $query->orderBy($orderColumn, $orderDir);
        } else {
            // Default ordering
            $query->orderBy('id', 'asc');
        }

        $query->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->join('kompetensi_keahlians', 'peserta_didik_rombels.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->select('peserta_didik_rombels.*', 'peserta_didiks.nama_lengkap', 'kompetensi_keahlians.nama_kk'); // Tambahkan nama_kk

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pesertadidikrombel-table')
            ->columns($this->getColumns())
            ->ajax([
                'data' =>
                'function(d) {
                    d.search = $(".search").val();
                    d.thAjar = $("#idThnAjaran").val();
                    d.kodeKK = $("#idKodeKK").val();
                    d.tingKat = $("#idTingkat").val();
                    d.romBel = $("#idRombel").val();
                }'
            ])
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
                'scrollY' => "calc(100vh - 411px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('tahun_ajaran')->title('Tahun <br> Ajaran')->addClass('text-center'),
            Column::make('kode_kk')->title('Kode KK')->addClass('text-center'),
            Column::make('nama_kk')->title('Nama KK'),
            Column::make('rombel_tingkat')->title('Tingkat')->addClass('text-center'),
            Column::make('rombel_kode')->title('Kode Rombel')->addClass('text-center'),
            Column::make('rombel_nama')->title('Nama rombel')->addClass('text-center'),
            Column::make('nis')->title('NIS')->addClass('text-center'),
            Column::make('nama_siswa')->title('Nama Siswa'),
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
        return 'PesertaDidikRombel_' . date('YmdHis');
    }
}
