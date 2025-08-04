<?php

namespace App\DataTables\GuruMapel;

use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DataKbmDataTable extends DataTable
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
            ->addColumn('jml_siswa', function ($row) {
                // Menghitung jumlah siswa berdasarkan rombel_kode dari tabel peserta_didik_rombels
                $jumlahSiswa = DB::table('peserta_didik_rombels')
                    ->where('rombel_kode', $row->kode_rombel)
                    ->count();

                return $jumlahSiswa; // Menampilkan jumlah siswa di kolom
            })
            ->addColumn('jumlah_cp', function ($row) {
                // Menghitung jumlah siswa berdasarkan rombel_kode dari tabel peserta_didik_rombels
                $JumlahCP = DB::table('capaian_pembelajarans')
                    ->where('inisial_mp', $row->kel_mapel)
                    ->where('tingkat', $row->tingkat)
                    ->count();

                return $JumlahCP; // Menampilkan jumlah siswa di kolom
            })
            ->addColumn('kkm', function ($row) {
                // Membuat opsi untuk KKM dari 60 sampai 100
                $kkmOptions = '';
                for ($i = 60; $i <= 100; $i++) {
                    $selected = $row->kkm == $i ? 'selected' : '';
                    $kkmOptions .= "<option value='{$i}' {$selected}>{$i}</option>";
                }

                // Menggunakan ID unik untuk setiap select
                $selectId = 'select-kkm-' . $row->id;

                // Membuat select element
                $select = "<select class='form-select form-select-sm update-kkm' id='{$selectId}' data-id='{$row->id}' onchange='updateKkm({$row->id}, this.value)'>";
                $select .= $kkmOptions;
                $select .= '</select>';

                return $select;
            })
            ->addColumn('jumlah_cp_terpilih', function ($row) {
                $JumlahMA = DB::table('cp_terpilihs')
                    ->where('kode_rombel', $row->kode_rombel)
                    ->where('kel_mapel', $row->kel_mapel)
                    ->where('tahunajaran', $row->tahunajaran)
                    ->where('ganjilgenap', $row->ganjilgenap)
                    ->count();
                return $JumlahMA;

                return $namalengkap; // Menampilkan jumlah siswa di kolom
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['jml_siswa', 'kkm', 'jumlah_cp', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(KbmPerRombel $model): QueryBuilder
    {
        /**
         * @var user $user
         */
        $user = Auth::user();
        $personal_id = $user->personal_id;

        // Ambil tahun ajaran dan semester aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = null;

        if ($tahunAjaranAktif) {
            $semesterAktif = Semester::where('status', 'Aktif')
                ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
                ->first();
        }

        // Mulai query
        $query = $model->newQuery();

        // Cek apakah user memiliki role 'gmapel'
        if ($user->hasRole('gmapel')) {
            // Ambil data berdasarkan id_personil yang sesuai dengan personal_id user yang sedang login
            // Filter berdasarkan id_personil (user login)
            $query->where('id_personil', $personal_id);
        }

        // Jika ada tahun ajaran aktif, filter
        if ($tahunAjaranAktif) {
            $query->where('tahunajaran', $tahunAjaranAktif->tahunajaran);
        }

        // Jika ada semester aktif, filter berdasarkan kolom ganjilgenap
        if ($semesterAktif) {
            $query->where('ganjilgenap', $semesterAktif->semester);
        }

        $query->orderBy('tingkat', 'asc')
            ->orderBy('semester', 'asc')
            ->orderBy('kel_mapel', 'asc');

        // Jika user tidak memiliki role 'gmapel', kembalikan query kosong atau hentikan
        //return $model->newQuery()->whereNull('id'); // Mengembalikan query yang tidak akan mengembalikan data
        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('datakbm-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(5, 7, 8)
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => false,
                'pageLength' => 25,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 369px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('kode_mapel_rombel')->title('Kode Mapel Rombel'),
            Column::make('tahunajaran')->title('Thn Ajaran')->addClass('text-center'),
            Column::make('semester')->addClass('text-center'),
            Column::make('rombel')->title('Rombel')->addClass('text-center'),
            Column::make('mata_pelajaran')->title('Nama Mapel'),
            Column::make('jumlah_cp')->title('Jumlah CP')->addClass('text-center'),
            Column::make('jml_siswa')->title('Jumlah Siswa')->addClass('text-center'),
            Column::make('jumlah_cp_terpilih')->title('Jumlah CP Terpilih')->addClass('text-center'),
            Column::make('kkm')->title('KKM')->addClass('text-center'),
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
        return 'DataKbm_' . date('YmdHis');
    }
}
