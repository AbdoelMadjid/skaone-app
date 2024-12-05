<?php

namespace App\DataTables\GuruMapel;

use App\Models\Kurikulum\DataKBM\KbmPerRombel;
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

class FormatifDataTable extends DataTable
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
                $jumlahSiswa = DB::table('peserta_didik_rombels')
                    ->where('rombel_kode', $row->kode_rombel)
                    ->count();

                return $jumlahSiswa;
            })
            ->addColumn('thn_ajaran_semester', function ($row) {

                return $row->tahunajaran . ' / ' . $row->semester;
            })
            ->addColumn('jumlah_cp', function ($row) {
                // Menghitung jumlah siswa berdasarkan rombel_kode dari tabel peserta_didik_rombels
                $JumlahCP = DB::table('capaian_pembelajarans')
                    ->where('inisial_mp', $row->kel_mapel)
                    ->where('tingkat', $row->tingkat)
                    ->count();

                $JumlahMA = DB::table('cp_terpilihs')
                    ->where('kode_rombel', $row->kode_rombel)
                    ->where('kel_mapel', $row->kel_mapel)
                    ->count();

                $jumlahTP = DB::table('tujuan_pembelajarans')
                    ->where('kode_rombel', $row->kode_rombel)
                    ->where('kel_mapel', $row->kel_mapel)
                    ->count();

                return $JumlahCP . ' / ' . $JumlahMA . ' / ' . $jumlahTP;
            })
            ->addColumn('action', function ($row) {
                // Menambahkan action "Create" untuk DataTable tertentu
                $actions = $this->basicActions($row);
                if (request()->is('gurumapel/*')) {
                    $actions['Create'] = route('gurumapel.penilaian.formatif.create', [
                        'kode_rombel' => $row->kode_rombel,
                        'kel_mapel' => $row->kel_mapel,
                        'id_personil' => $row->id_personil,
                    ]);
                }
                unset($actions['Delete']);
                unset($actions['Detail']);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['jml_siswa', 'jumlah_cp', 'nilai_formatif', 'formatif', 'action']);
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

        // Cek apakah user memiliki role 'gmapel'
        if ($user->hasRole('gmapel')) {
            // Ambil data berdasarkan id_personil yang sesuai dengan personal_id user yang sedang login
            return $model->newQuery()
                ->where('id_personil', $personal_id);
        }

        return $model->newQuery()->orderBy('tingkat', 'asc')
            ->orderBy('semester', 'asc')
            ->orderBy('kel_mapel', 'asc');

        // Jika user tidak memiliki role 'gmapel', kembalikan query kosong atau hentikan
        return $model->newQuery()->whereNull('id'); // Mengembalikan query yang tidak akan mengembalikan data
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('formatif-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('thn_ajaran_semester')->title('Thn Ajaran / Semester')->addClass('text-center'),
            Column::make('rombel')->title('Rombel')->addClass('text-center'),
            Column::make('mata_pelajaran')->title('Nama Mapel'),
            Column::make('jml_siswa')->title('Jumlah Siswa')->addClass('text-center'),
            Column::make('jumlah_cp')->title('CP /  CP Terpilih / TP')->addClass('text-center'),
            Column::make('kkm')->title('KKM')->addClass('text-center'),
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
        return 'Formatif_' . date('YmdHis');
    }
}
