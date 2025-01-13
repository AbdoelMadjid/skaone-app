<?php

namespace App\DataTables\Kurikulum\DataKBM;

use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\Kurikulum\DataKBM\KunciDataKbm;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\User;
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

class KunciDataKBMDataTable extends DataTable
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
            ->addColumn('pilih_data', function ($row) {
                // Ambil user yang sedang login
                $user = Auth::user();
                $personal_id = $user->personal_id;

                // Ambil data yang sesuai dari tabel kunci_data_kbm berdasarkan id_personil
                $dataPilCR = KunciDataKbm::where('id_personil', $personal_id)->first();

                // Tentukan apakah checkbox perlu ditandai "checked"
                $checkedTerpilih = (
                    $dataPilCR &&
                    $row->tahunajaran === $dataPilCR->tahunajaran &&
                    $row->ganjilgenap === $dataPilCR->ganjilgenap &&
                    $row->semester === $dataPilCR->semester &&
                    $row->kode_kk === $dataPilCR->kode_kk &&
                    $row->tingkat === $dataPilCR->tingkat &&
                    $row->kode_rombel === $dataPilCR->kode_rombel
                ) ? "checked" : "";

                // HTML untuk checkbox
                $ceckTerpilih = "
                    <div class='form-check form-switch form-switch-lg d-inline-flex align-items-center justify-content-center ms-4' dir='ltr'>
                        <input type='checkbox' class='form-check-input text-center terpilih-checkbox'
                            data-tahunajaran='{$row->tahunajaran}'
                            data-ganjilgenap='{$row->ganjilgenap}'
                            data-semester='{$row->semester}'
                            data-kode_kk='{$row->kode_kk}'
                            data-tingkat='{$row->tingkat}'
                            data-kode_rombel='{$row->kode_rombel}'
                            {$checkedTerpilih}>
                    </div>";

                return $ceckTerpilih;
            })
            ->addColumn('namarombel', function ($row) {
                if ($row->tingkat === '10') {
                    $tombolROmbel = '
                    <div class="d-grid gap-2" >
                        <button class="btn btn-success btn-sm" type="button">' . $row->rombel . '</button>
                    </div>';
                } else if ($row->tingkat === '11') {
                    $tombolROmbel = '
                    <div class="d-grid gap-2" >
                        <button class="btn btn-info btn-sm" type="button">' . $row->rombel . '</button>
                    </div>';
                } else {
                    $tombolROmbel = '
                    <div class="d-grid gap-2" >
                        <button class="btn btn-danger btn-sm" type="button">' . $row->rombel . '</button>
                    </div>';
                }
                return $tombolROmbel;
            })
            ->addColumn('download_leger', function ($row) {
                if ($row->tingkat === '10') {
                    $tombolROmbel = 'success';
                } else if ($row->tingkat === '11') {
                    $tombolROmbel = 'info';
                } else {
                    $tombolROmbel = 'danger';
                }

                $url = url('/kurikulum/datakbm/export-to-excel-leger?kode_rombel=' . $row->kode_rombel);
                return '<a href="' . $url . '" class="btn btn-soft-' . $tombolROmbel . ' btn-sm">Ekspor ke Excel</a>';
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['pilih_data', 'namarombel', 'download_leger', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(KbmPerRombel $model): QueryBuilder
    {

        $user = Auth::user();
        $personal_id = $user->personal_id;

        $query = $model->newQuery();

        $query->selectRaw('
        kbm_per_rombels.tahunajaran,
        kbm_per_rombels.kode_kk,
        kompetensi_keahlians.nama_kk,
        kbm_per_rombels.tingkat,
        kbm_per_rombels.ganjilgenap,
        kbm_per_rombels.semester,
        kbm_per_rombels.kode_rombel,
        kbm_per_rombels.rombel,
        wali_kelas.wali_kelas,
        personil_sekolahs.namalengkap')
            ->join('kompetensi_keahlians', 'kbm_per_rombels.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->join('wali_kelas', 'kbm_per_rombels.kode_rombel', '=', 'wali_kelas.kode_rombel')
            ->join('personil_sekolahs', 'wali_kelas.wali_kelas', '=', 'personil_sekolahs.id_personil')
            ->join('kunci_data_kbm', function ($join) {
                $join->on('kbm_per_rombels.tahunajaran', '=', 'kunci_data_kbm.tahunajaran')
                    ->on('kbm_per_rombels.ganjilgenap', '=', 'kunci_data_kbm.ganjilgenap');
            })
            ->where('kunci_data_kbm.id_personil', $personal_id) // Gunakan nilai langsung untuk debug
            ->groupBy([
                'kbm_per_rombels.tahunajaran',
                'kbm_per_rombels.kode_kk',
                'kompetensi_keahlians.nama_kk',
                'kbm_per_rombels.tingkat',
                'kbm_per_rombels.ganjilgenap',
                'kbm_per_rombels.semester',
                'kbm_per_rombels.kode_rombel',
                'kbm_per_rombels.rombel',
                'wali_kelas.wali_kelas',
                'personil_sekolahs.namalengkap',
            ])
            ->orderBy('kbm_per_rombels.tahunajaran', 'asc')
            ->orderBy('kbm_per_rombels.tingkat', 'asc')
            ->orderBy('kbm_per_rombels.kode_kk', 'asc')
            ->orderBy('kbm_per_rombels.kode_rombel', 'asc')
            ->get();


        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('kuncidatakbm-table')
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
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('tahunajaran')->title('Tahun Ajaran')->addClass('text-center'),
            Column::make('namarombel')->addClass('text-center'),
            Column::make('namalengkap')->title('Nama Wali Kelas'),
            Column::make('download_leger')->title('Leger')->addClass('text-center'),
            Column::make('pilih_data')->title('Pilih Data')->addClass('text-center'),
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
        return 'KunciDataKBM_' . date('YmdHis');
    }
}
