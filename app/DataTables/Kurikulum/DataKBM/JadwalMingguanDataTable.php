<?php

namespace App\DataTables\Kurikulum\DataKBM;

use App\Models\Kurikulum\DataKBM\JadwalMingguan;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class JadwalMingguanDataTable extends DataTable
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
    public function query(JadwalMingguan $model): QueryBuilder
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
            $query->where('mata_pelajaran', 'like', '%' . request('search') . '%');
        }

        // Filter tahun ajaran
        if (request()->has('thAjar') && request('thAjar') != 'all') {
            $query->where('tahunajaran', request('thAjar'));
        } elseif ($tahunAjaranAktif) {
            // Default: pakai tahun ajaran aktif
            $query->where('tahunajaran', $tahunAjaranAktif->tahunajaran);
        }

        // Filter semester
        if (request()->has('seMester') && request('seMester') != 'all') {
            $query->where('ganjilgenap', request('seMester'));
        } elseif ($semesterAktif) {
            // Default: pakai semester aktif
            $query->where('ganjilgenap', $semesterAktif->semester);
        }

        if (request()->has('romBel') && request('romBel') != 'all') {
            $query->where('kode_rombel', request('romBel'));
        }

        // Default query with ordering
        $query->orderBy('kode_rombel', 'asc');

        /* $query->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->join('kompetensi_keahlians', 'peserta_didik_rombels.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->select('peserta_didik_rombels.*', 'peserta_didiks.nama_lengkap', 'kompetensi_keahlians.nama_kk'); // Tambahkan nama_kk */

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('jadwalmingguan-table')
            ->columns($this->getColumns())
            ->ajax([
                'data' =>
                'function(d) {
                    d.search = $(".search").val();
                    d.thAjar = $("#idThnAjaran").val();
                    d.seMester = $("#idSemester").val();
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
                'pageLength' => 50,
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
            Column::make('kode_rombel')->title('Kode Rombel')->addClass('text-center'),
            Column::make('tahunajaran')->title('Tahun Ajaran')->addClass('text-center'),
            Column::make('Semester')->addClass('text-center'),
            Column::make('id_personil')->title('id_personil')->addClass('text-center'),
            Column::make('mata_pelajaran')->title('Mata Pelajaran'),
            Column::make('hari')->title('hari')->addClass('text-center'),
            Column::make('jam_ke')->title('jam_ke')->addClass('text-center'),
            Column::make('waktu_mulai')->title('waktu_mulai')->addClass('text-center'),
            Column::make('waktu_selesai')->title('waktu_selesai')->addClass('text-center'),
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
        return 'JadwalMingguan_' . date('YmdHis');
    }
}
