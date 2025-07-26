<?php

namespace App\DataTables\WaliKelas;

use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\WaliKelas\AbsensiSiswa;
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

class AbsensiSiswaDataTable extends DataTable
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
            ->addColumn('izin', function ($row) {
                // Input untuk izin
                return '<input type="text" class="form-control form-control-sm absen-input" data-type="izin" data-id="' . $row->id . '" value="' . $row->izin . '" />';
            })
            ->addColumn('sakit', function ($row) {
                // Input untuk sakit
                return '<input type="text" class="form-control form-control-sm absen-input" data-type="sakit" data-id="' . $row->id . '" value="' . $row->sakit . '" />';
            })
            ->addColumn('alfa', function ($row) {
                // Input untuk alfa
                return '<input type="text" class="form-control form-control-sm absen-input" data-type="alfa" data-id="' . $row->id . '" value="' . $row->alfa . '" />';
            })
            ->addColumn('jmlhabsen', function ($row) {
                // Menjumlahkan izin, sakit, dan alfa
                return '<span class="jmlhabsen-value">' . ($row->izin + $row->sakit + $row->alfa) . '</span>';
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['izin', 'sakit', 'alfa', 'jmlhabsen', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(AbsensiSiswa $model): QueryBuilder
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil tahun ajaran yang aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = null;

        if ($tahunAjaranAktif) {
            $semesterAktif = Semester::where('status', 'Aktif')
                ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
                ->first();
        }

        // Ambil wali kelas berdasarkan personal_id dari user yang login
        $rombonganBelajar = DB::table('rombongan_belajars')
            ->where('wali_kelas', $user->personal_id)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->first();

        // Jika wali kelas ditemukan, lanjutkan query
        if ($rombonganBelajar) {
            // Query absensi berdasarkan kode rombel dari wali kelas
            $query = $model->newQuery()
                ->select(['id', 'nis'])
                ->select([
                    'absensi_siswas.*',
                    DB::raw('peserta_didiks.nama_lengkap as nama_lengkap'),
                ])
                ->join('peserta_didiks', 'absensi_siswas.nis', '=', 'peserta_didiks.nis')
                ->where('absensi_siswas.kode_rombel', $rombonganBelajar->kode_rombel) // Filter berdasarkan kode rombel
                ->where('absensi_siswas.tahunajaran', $rombonganBelajar->tahunajaran) // Filter berdasarkan kode rombel
                ->where('absensi_siswas.ganjilgenap', $semesterAktif->semester) // Filter berdasarkan kode rombel
                ->orderBy('nis', 'asc'); // Default order by NIS

            // Logika pengurutan berdasarkan request
            if (request()->has('order')) {
                $orderColumn = request('columns')[request('order')[0]['column']]['data'];
                $orderDir = request('order')[0]['dir'];
                $query->orderBy($orderColumn, $orderDir);
            } else {
                // Default ordering by NIS if no order request
                $query->orderBy('nis', 'asc');
            }

            return $query;
        } else {
            // Jika wali kelas tidak ditemukan, return query kosong atau handle sesuai kebutuhan
            return $model->newQuery()->whereRaw('1 = 0'); // Return query kosong
        }
    }


    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('absensisiswa-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
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
                'scrollY' => "calc(100vh - 348px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center align-middle')->width(50),
            Column::make('nis')->title('NIS')->addClass('text-center align-middle'),
            Column::make('nama_lengkap')->title('Nama Lengkap')->addClass('align-middle'),
            Column::make('sakit')->title('Sakit')->width(50),
            Column::make('izin')->title('Izin')->width(50),
            Column::make('alfa')->title('Alfa')->width(50),
            Column::make('jmlhabsen')->title('Jumlah Absen')->addClass('text-center align-middle')->width(150),
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
        return 'AbsensiSiswa_' . date('YmdHis');
    }
}
