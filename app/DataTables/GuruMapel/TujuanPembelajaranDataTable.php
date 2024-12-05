<?php

namespace App\DataTables\GuruMapel;

use App\Models\GuruMapel\TujuanPembelajaran;
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

class TujuanPembelajaranDataTable extends DataTable
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
                return '<input class="form-check-input chk-child" type="checkbox"
            name="chk_child" value="' . $row->id . '">';
            })
            ->addColumn('rombel', function ($row) {
                $namaRombel = DB::table('kbm_per_rombels')
                    ->where('kode_rombel', $row->kode_rombel)
                    ->value('rombel');

                return $row->kode_rombel . '<BR>' . $namaRombel; // Menampilkan jumlah siswa di kolom
            })
            ->addColumn('mapel', function ($row) {
                $namaMapel = DB::table('kbm_per_rombels')
                    ->where('kel_mapel', $row->kel_mapel)
                    ->value('mata_pelajaran');

                return $row->kel_mapel . '<BR>' . $namaMapel; // // Menampilkan jumlah siswa di kolom
            })
            ->addColumn('isi_cp', function ($row) {
                $capaianPembelajaran = DB::table('capaian_pembelajarans')
                    ->where('kode_cp', $row->kode_cp)
                    ->select('nomor_urut', 'element', 'isi_cp') // Ambil semua field yang diperlukan
                    ->first();

                if ($capaianPembelajaran) {
                    return $row->kode_cp . '<br>' .
                        '<strong>Nomor Urut:</strong> ' . $capaianPembelajaran->nomor_urut . '<br>' .
                        '<strong>Element:</strong> ' . $capaianPembelajaran->element . '<br>' .
                        '<strong>Isi CP:</strong> ' . $capaianPembelajaran->isi_cp;
                }

                return $row->kode_cp . '<br><em>Data tidak ditemukan</em>';
            })
            ->addColumn('desk', function ($row) {
                return '<strong>Deskripsi tinggi</strong>: ' . $row->tp_desk_tinggi . ' ' . $row->tp_isi .
                    '<br><br><strong>Deskripsi rendah</strong>: ' . $row->tp_desk_rendah . ' ' . $row->tp_isi; // Menampilkan jumlah siswa di kolom
            })
            ->addColumn('action', function ($row) {
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'rombel', 'mapel', 'isi_cp', 'desk', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(TujuanPembelajaran $model): QueryBuilder
    {
        /**
         * @var user $user
         */
        $user = Auth::user();
        $personal_id = $user->personal_id;

        return $model->newQuery()
            ->where('id_personil', $personal_id);

        return $model->newQuery()->orderBy('kode_rombel', 'asc');

        // Jika user tidak memiliki role 'gmapel', kembalikan query kosong atau hentikan
        return $model->newQuery()->whereNull('id'); // Mengembalikan query yang tidak akan mengembalikan data
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('tujuanpembelajaran-table')
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
            ])->parameters([
                'lengthChange' => false, // Menghilangkan dropdown "Show entries"
                'searching' => false,    // Menghilangkan kotak pencarian
                'pageLength' => 100,       // Menampilkan 50 baris per halaman
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('checkbox')
                ->title('<input class="form-check-input" type="checkbox" id="checkAll" value="option">') // Untuk "Select All"
                ->orderable(false)
                ->searchable(false)
                ->width(10)
                ->addClass('text-center'),
            Column::make('rombel')->title('Rombel'),
            Column::make('mapel')->title('Mata Pelajaran'),
            Column::make('isi_cp')->title('Capaian Pembelajaran')->width('35%'),
            Column::make('desk')->title('Tujuan Pembelajaran')->width('35%'),
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
        return 'TujuanPembelajaran_' . date('YmdHis');
    }
}
