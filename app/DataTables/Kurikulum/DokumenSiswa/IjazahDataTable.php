<?php

namespace App\DataTables\Kurikulum\DokumenSiswa;

use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
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

class IjazahDataTable extends DataTable
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
                return "(" . $row->kode_kk . ") " . $row->nama_kk; // Mengambil nama kompetensi keahlian dari hasil join
            })
            ->addColumn('kelas', function ($row) {
                return $row->rombel_kode . "<br>" . $row->rombel_nama; // Mengambil nama kompetensi keahlian dari hasil join
            })
            ->addColumn('kelulusan', function ($row) {
                $kelulusan = DB::table('kelulusan')
                    ->where('nis', $row->nis)
                    ->where('tahun_ajaran', $row->tahun_ajaran)
                    ->first();

                $status = $kelulusan->status_kelulusan ?? '';
                $nis = $row->nis;
                $tahunAjaran = $row->tahun_ajaran;

                $options = [
                    '' => '-- Pilih --',
                    'LULUS' => 'LULUS',
                    'LULUS BERSYARAT' => 'LULUS BERSYARAT',
                ];

                $select = "<select class='form-control form-control-sm kelulusan-select' data-nis='{$nis}' data-tahun='{$tahunAjaran}'>";
                foreach ($options as $value => $label) {
                    $selected = $status === $value ? 'selected' : '';
                    $select .= "<option value='{$value}' {$selected}>{$label}</option>";
                }
                $select .= "</select>";

                return $select;
            })
            ->addColumn('no_ijazah', function ($row) {
                $kelulusan = DB::table('kelulusan')
                    ->where('nis', $row->nis)
                    ->where('tahun_ajaran', $row->tahun_ajaran)
                    ->first();

                $noIjazah = $kelulusan->no_ijazah ?? '';
                $nis = $row->nis;
                $tahunAjaran = $row->tahun_ajaran;
                $nmSiswa = $row->nama_lengkap;

                return "<input type='text' class='form-control form-control-sm no-ijazah-input'
                        value='{$noIjazah}'
                        data-nis='{$nis}'
                        data-tahun='{$tahunAjaran}'
                        data-nama='{$nmSiswa}'
                        placeholder='Isi No. Ijazah'>";
            })
            /* ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            }) */
            ->addColumn('action', function ($row) {
                $id = $row->nis;

                $tombol = '
                <div class="btn-group dropstart">
                    <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"
                        class="btn btn-soft-primary btn-icon fs-14"><i class="ri-more-2-fill"></i></button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                        <li><a href="#" class="dropdown-item showTransIjazah" data-nis="' . $id . '" data-bs-toggle="modal" data-bs-target="#TranskripIjazah"> Transkrip Nilai Ijazah </a></li>
                        <li><a href="#" class="dropdown-item showSKKL" data-nis="' . $id . '" data-bs-toggle="modal" data-bs-target="#SuratKetLulus"> Surat Keterangan Lulus </a></li>
                        <li><a href="#" class="dropdown-item showSKKB" data-nis="' . $id . '" data-bs-toggle="modal" data-bs-target="#SuratKetBaik"> Surat Keterangan Kelakuan Baik </a></li>
                    </ul>
                </div>';
                return $tombol;
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'nama_siswa', 'nama_kk', 'kelulusan', 'no_ijazah', 'kelas']);
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
            ->select('peserta_didik_rombels.*', 'peserta_didiks.nama_lengkap', 'kompetensi_keahlians.nama_kk')
            ->orderBy('peserta_didiks.nama_lengkap'); // Tambahkan nama_kk


        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('ijazah-table')
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
            Column::make('nama_kk')->title('Nama KK'),
            Column::make('rombel_tingkat')->title('Tingkat')->addClass('text-center'),
            Column::make('kelas')->title('Rombel')->addClass('text-center'),
            Column::make('nis')->title('NIS')->addClass('text-center'),
            Column::make('nama_siswa')->title('Nama Siswa'),
            Column::make('kelulusan')->title('Status Kelulusan'),
            Column::make('no_ijazah')->title('Nomor Ijazah'),
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
        return 'Ijazah_' . date('YmdHis');
    }
}
