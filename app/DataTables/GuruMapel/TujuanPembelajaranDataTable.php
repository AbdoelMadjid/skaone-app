<?php

namespace App\DataTables\GuruMapel;

use App\Models\GuruMapel\TujuanPembelajaran;
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
                $deskripsiNilai = '[' . $row->tp_no . '] <strong>Deskripsi tinggi</strong>: ' . $row->tp_desk_tinggi . ' ' . $row->tp_isi .
                    '<br><br>[' . $row->tp_no . '] <strong>Deskripsi rendah</strong>: ' . $row->tp_desk_rendah . ' ' . $row->tp_isi;

                $editData = '
                     <form class="update-tp-form" data-id="' . $row->id . '">
                        ' . csrf_field() . '
                        <textarea class="form-control edit-tp-textarea" name="tp_isi" id="tp_isi_' . $row->id . '" rows="5" style="display: none;">' . $row->tp_isi . '</textarea>
                        <div class="gap-2 hstack justify-content-end mt-3">
                            <button class="btn btn-soft-danger btn-sm edit-tp-button" data-target="#tp_isi_' . $row->id . '" type="button">Edit</button>
                            <button type="submit" class="btn btn-soft-success btn-sm" style="display: none;">Submit</button>
                        </div>
                    </form>';

                return $deskripsiNilai . '<br><br><br>' . $editData;
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

        // Filter berdasarkan id_personil (user login)
        $query->where('id_personil', $personal_id);

        // Jika ada tahun ajaran aktif, filter
        if ($tahunAjaranAktif) {
            $query->where('tahunajaran', $tahunAjaranAktif->tahunajaran);
        }

        // Jika ada semester aktif, filter berdasarkan kolom ganjilgenap
        if ($semesterAktif) {
            $query->where('ganjilgenap', $semesterAktif->semester);
        }

        // Urutkan jika perlu
        $query->orderBy('kode_rombel', 'asc');

        return $query;

        /* return $model->newQuery()
            ->where('id_personil', $personal_id);

        return $model->newQuery()->orderBy('kode_rombel', 'asc');

        // Jika user tidak memiliki role 'gmapel', kembalikan query kosong atau hentikan
        return $model->newQuery()->whereNull('id'); // Mengembalikan query yang tidak akan mengembalikan data */
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
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => false,
                'pageLength' => 25,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 361px)",
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
