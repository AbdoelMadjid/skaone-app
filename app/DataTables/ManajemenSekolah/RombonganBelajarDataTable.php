<?php

namespace App\DataTables\ManajemenSekolah;

use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RombonganBelajarDataTable extends DataTable
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
            ->addColumn('nama_walikelas', function ($row) {
                return $row->namalengkap; // Mengambil nama siswa dari hasil join
            })
            ->addColumn('nama_kk', function ($row) {
                return $row->nama_kk; // Mengambil nama siswa dari hasil join
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
    public function query(RombonganBelajar $model): QueryBuilder
    {
        $query = $model->newQuery();

        // Ambil tahun ajaran dan semester aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = null;

        if ($tahunAjaranAktif) {
            $semesterAktif = Semester::where('status', 'Aktif')
                ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
                ->first();
        }

        // Ambil parameter filter dari request
        if (request()->has('search') && !empty(request('search'))) {
            $query->where('personil_sekolahs.namalengkap', 'like', '%' . request('search') . '%');
        }

        // Filter tahun ajaran
        if (request()->has('thAjar') && request('thAjar') != 'all') {
            $query->where('tahunajaran', request('thAjar'));
        } elseif ($tahunAjaranAktif) {
            // Default: pakai tahun ajaran aktif
            $query->where('tahunajaran', $tahunAjaranAktif->tahunajaran);
        }

        /*         if (request()->has('thAjar') && request('thAjar') != 'all') {
            $query->where('tahunajaran', request('thAjar'));
        } */

        if (request()->has('kodeKK') && request('kodeKK') != 'all') {
            $query->where('rombongan_belajars.id_kk', request('kodeKK'));
        }

        if (request()->has('levelKls') && request('levelKls') != 'all') {
            $query->where('rombongan_belajars.tingkat', request('levelKls'));
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

        $query->join('personil_sekolahs', 'rombongan_belajars.wali_kelas', '=', 'personil_sekolahs.id_personil')
            ->join('kompetensi_keahlians', 'rombongan_belajars.id_kk', '=', 'kompetensi_keahlians.idkk')
            ->select('rombongan_belajars.*', 'personil_sekolahs.namalengkap', 'kompetensi_keahlians.nama_kk');

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('rombonganbelajar-table')
            ->columns($this->getColumns())
            ->ajax([
                'data' =>
                'function(d) {
                    d.search = $(".search").val();
                    d.thAjar = $("#idThnAjaran").val();
                    d.kodeKK = $("#idKodeKK").val();
                    d.levelKls = $("#idLevel").val();
                }'
            ])
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => false,
                'pageLength' => 50,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 395px)",
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
            Column::make('nama_kk')->title('Kompetensi Keahlian'),
            Column::make('kode_rombel')->addClass('text-center'),
            Column::make('rombel')->addClass('text-center'),
            Column::make('nama_walikelas')->title('Nama Wali Kelas'),
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
        return 'RombonganBelajar_' . date('YmdHis');
    }
}
