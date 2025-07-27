<?php

namespace App\DataTables\Kurikulum\DokumenSiswa;

use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class TranskripNilaiDataTable extends DataTable
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
                $id = $row->nis;
                $nama = $row->nama_lengkap;

                $tombol = '
                <div class="btn-group dropstart">
                    <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"
                        class="btn btn-soft-primary btn-icon fs-14"><i class="ri-more-2-fill"></i></button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                        <li><a href="#" class="dropdown-item showTranskrip" data-nis="' . $id . '" data-bs-toggle="modal" data-bs-target="#TranskripRapor"> ' . $nama . ' </a></li>
                        <li><a href="#" class="dropdown-item showNilai" data-nis="' . $id . '" data-nama="' . $nama . '" data-semester="1" data-bs-toggle="modal" data-bs-target="#nilaiModal">Semester 1</a></li>
                        <li><a href="#" class="dropdown-item showNilai" data-nis="' . $id . '" data-nama="' . $nama . '" data-semester="2" data-bs-toggle="modal" data-bs-target="#nilaiModal">Semester 2</a></li>
                        <li><a href="#" class="dropdown-item showNilai" data-nis="' . $id . '" data-nama="' . $nama . '" data-semester="3" data-bs-toggle="modal" data-bs-target="#nilaiModal">Semester 3</a></li>
                        <li><a href="#" class="dropdown-item showNilai" data-nis="' . $id . '" data-nama="' . $nama . '" data-semester="4" data-bs-toggle="modal" data-bs-target="#nilaiModal">Semester 4</a></li>
                        <li><a href="#" class="dropdown-item showNilai" data-nis="' . $id . '" data-nama="' . $nama . '" data-semester="5" data-bs-toggle="modal" data-bs-target="#nilaiModal">Semester 5</a></li>
                        <li><a href="#" class="dropdown-item showNilai" data-nis="' . $id . '" data-nama="' . $nama . '" data-semester="PSAJ" data-bs-toggle="modal" data-bs-target="#nilaiModal">PSAJ</a></li>
                    </ul>
                </div>';
                return $tombol;
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'nama_siswa', 'nama_kk']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PesertaDidikRombel $model): QueryBuilder
    {
        $query = $model->newQuery();

        // Ambil parameter filter dari request
        if (request()->has('search') && !empty(request('search'))) {
            $query->where('peserta_didiks.nama_lengkap', 'like', '%' . request('search') . '%');
        }

        if (request()->has('thAjar') && request('thAjar') != 'all') {
            $query->where('tahun_ajaran', request('thAjar'));
        }

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
            ->setTableId('transkripnilai-table')
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
                'scrollY' => "calc(100vh - 378px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('tahun_ajaran')->title('Thn Ajaran')->addClass('text-center'),
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
        return 'TranskripNilai_' . date('YmdHis');
    }
}
