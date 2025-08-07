<?php

namespace App\DataTables\Kurikulum\DataKBM;

use App\Models\Kurikulum\DataKBM\JadwalMingguan;
use App\Models\ManajemenSekolah\Semester;
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
            ->addColumn('checkbox', function ($row) {
                return '<input class="form-check-input chk-child" type="checkbox" name="chk_child" value="' . $row->id . '">';
            })
            ->addColumn('namaguru', function ($row) {
                $personilSekolah = DB::table('personil_sekolahs')
                    ->where('id_personil', $row->id_personil)
                    ->select('gelardepan', 'namalengkap', 'gelarbelakang') // Ambil semua field yang diperlukan
                    ->first();

                if ($personilSekolah) {
                    return $personilSekolah->gelardepan . ' ' . $personilSekolah->namalengkap . ', ' . $personilSekolah->gelarbelakang;
                }

                return $row->id_personil . '<em>Data tidak ditemukan</em>';
            })
            ->addColumn('nama_kelas', function ($row) {
                $rombonganBelajar = DB::table('rombongan_belajars')
                    ->where('kode_rombel', $row->kode_rombel)
                    ->select('rombel') // Ambil semua field yang diperlukan
                    ->first();

                if ($rombonganBelajar) {
                    return $rombonganBelajar->rombel;
                }

                return $row->kode_rombel . '<em>Data tidak ditemukan</em>';
            })
            ->addColumn('matapelajaran', function ($row) {
                $mataPelajaran = DB::table('kbm_per_rombels')
                    ->where('kode_mapel_rombel', $row->mata_pelajaran)
                    ->select('mata_pelajaran') // Ambil semua field yang diperlukan
                    ->first();

                if ($mataPelajaran) {
                    return $mataPelajaran->mata_pelajaran;
                }

                return $row->mata_pelajaran . '<em>Data tidak ditemukan</em>';
            })
            ->addColumn('nama_kk', function ($row) {
                $konsentrasiKeahlian = DB::table('kompetensi_keahlians')
                    ->where('idkk', $row->kode_kk)
                    ->select('singkatan') // Ambil semua field yang diperlukan
                    ->first();

                if ($konsentrasiKeahlian) {
                    return '(' . $row->kode_kk . ') ' . $konsentrasiKeahlian->singkatan;
                }

                return $row->kode_kk . '<em>Data tidak ditemukan</em>';
            })
            ->addColumn('hari', function ($row) {
                if ($row->hari == "Senin") {
                    $haribadge = "<span class='badge bg-primary'>" . $row->hari . "</span>";
                } elseif ($row->hari == "Selasa") {
                    $haribadge = "<span class='badge bg-secondary'>" . $row->hari . "</span>";
                } elseif ($row->hari == "Rabu") {
                    $haribadge = "<span class='badge bg-success'>" . $row->hari . "</span>";
                } elseif ($row->hari == "Kamis") {
                    $haribadge = "<span class='badge bg-info'>" . $row->hari . "</span>";
                } elseif ($row->hari == "Jumat") {
                    $haribadge = "<span class='badge bg-warning'>" . $row->hari . "</span>";
                }
                return $haribadge;
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                unset($actions['Edit']);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'hari', 'namaguru', 'nama_kelas', 'matapelajaran', 'nama_kk', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(JadwalMingguan $model): QueryBuilder
    {
        $query = $model->newQuery();
        if (request()->has('thAjar') && request('thAjar') != 'all') {
            $query->where('tahunajaran', request('thAjar'));
        }
        if (request()->has('seMester') && request('seMester') != 'all') {
            $query->where('semester', request('seMester'));
        }

        if (request()->has('tingKat') && request('tingKat') != 'all') {
            $query->where('tingkat', request('tingKat'));
        }

        if (request()->has('kodeKK') && request('kodeKK') != 'all') {
            $query->where('kode_kk', request('kodeKK'));
        }

        if (request()->has('romBel') && request('romBel') != 'all') {
            $query->where('kode_rombel', request('romBel'));
        }

        if (request()->has('hariNgajar') && request('hariNgajar') != 'all') {
            $query->where('hari', request('hariNgajar'));
        }
        if (request()->has('perSonil') && request('perSonil') != 'all') {
            $query->where('id_personil', request('perSonil'));
        }
        $query->orderBy('kode_rombel', 'asc');
        $query->orderBy('hari', 'asc');
        $query->orderBy('jam_ke', 'asc');
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
                    d.thAjar = $("#idThnAjaran").val();
                    d.seMester = $("#idSemester").val();
                    d.kodeKK = $("#idKodeKK").val();
                    d.tingKat = $("#idTingkat").val();
                    d.romBel = $("#idRombel").val();
                    d.hariNgajar = $("#idHari").val();
                    d.perSonil = $("#idPersonil").val();
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
                'scrollY' => "calc(100vh - 389px)",
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
            Column::make('semester')->addClass('text-center'),
            Column::make('nama_kelas')->title('Rombel')->addClass('text-center'),
            Column::make('namaguru')->title('Nama Guru Mapel'),
            Column::make('matapelajaran')->title('Mata Pelajaran'),
            Column::make('hari')->title('Hari')->addClass('text-center'),
            Column::make('jam_ke')->title('Jam Ke')->addClass('text-center'),
            Column::computed('checkbox')
                ->title('<input class="form-check-input" type="checkbox" id="checkAll" value="option">') // Untuk "Select All"
                ->orderable(false)
                ->searchable(false)
                ->width(10)
                ->addClass('text-center align-middle'),
            /* Column::computed('action')
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
        return 'JadwalMingguan_' . date('YmdHis');
    }
}
