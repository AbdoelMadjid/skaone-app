<?php

namespace App\DataTables\GuruMapel;

use App\Models\GuruMapel\PerangkatAjar;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
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

class PerangkatAjarDataTable extends DataTable
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
            /*  ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            }) */
            ->addColumn('doc_analis_waktu', fn($row) => $this->getUploadedDoc($row, 'doc_analis_waktu', 'Analisis Waktu'))
            ->addColumn('doc_cp', fn($row) => $this->getUploadedDoc($row, 'doc_cp', 'CP'))
            ->addColumn('doc_tp', fn($row) => $this->getUploadedDoc($row, 'doc_tp', 'ATP'))
            ->addColumn('doc_rpp', fn($row) => $this->getUploadedDoc($row, 'doc_rpp', 'Modul Ajar'))
            ->addColumn('upload', function ($row) {
                $tingkat = $row->tingkat;
                $mapel = $row->mata_pelajaran;
                $button = '<button type="button" class="btn btn-sm btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#uploadModal"
                    data-tingkat="' . $tingkat . '"
                    data-mapel="' . htmlspecialchars($mapel, ENT_QUOTES) . '">
                    Upload
                </button>';
                return $button;
            })
            ->addIndexColumn()
            ->rawColumns(['doc_analis_waktu', 'doc_cp', 'doc_tp', 'doc_rpp', 'upload']);
    }

    protected function renderPdfButton($fileName, $label)
    {
        if (!$fileName) return '-';

        $prefix = strtolower(substr($fileName, 0, 2));

        $type = match ($prefix) {
            'aw' => 'aw',
            'cp' => 'cp',
            'tp' => 'tp',
            'mo', 'rp' => 'modul-ajar',
            default => 'lainnya',
        };

        $url = route('gurumapel.adminguru.perangkat-ajar.preview', [
            'type' => $type,
            'filename' => $fileName,
        ]);

        return '<button type="button" class="btn btn-sm btn-info" onclick="lihatPDF(\'' . $url . '\')">Lihat ' . $label . '</button>';
    }



    protected function getUploadedDoc($row, $field, $label)
    {
        $user = Auth::user();
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
            ->first();

        $data = PerangkatAjar::where([
            'id_personil' => $user->personal_id,
            'tahunajaran' => $tahunAjaranAktif->tahunajaran,
            'semester' => $semesterAktif->semester,
            'tingkat' => $row->tingkat,
            'mata_pelajaran' => $row->mata_pelajaran,
        ])->first();

        if ($data && $data->$field) {
            return $this->renderPdfButton($data->$field, $label);
        }

        return '-';
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

        $query->where('id_personil', $personal_id);
        // Jika ada tahun ajaran aktif, filter
        if ($tahunAjaranAktif) {
            $query->where('tahunajaran', $tahunAjaranAktif->tahunajaran);
        }

        // Jika ada semester aktif, filter berdasarkan kolom ganjilgenap
        if ($semesterAktif) {
            $query->where('ganjilgenap', $semesterAktif->semester);
        }

        $query->select('tahunajaran', 'ganjilgenap', 'tingkat', 'mata_pelajaran')
            ->groupBy('tahunajaran', 'ganjilgenap', 'tingkat', 'mata_pelajaran');

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
            ->setTableId('perangkatajar-table')
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
                'scrollY' => "calc(100vh - 341px)",
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
            Column::make('ganjilgenap')->title('Semester')->addClass('text-center'),
            Column::make('tingkat')->title('Tingkat')->addClass('text-center'),
            Column::make('mata_pelajaran')->title('Mata Pelajaran'),
            Column::make('doc_analis_waktu')->title('Analisis Waktu')->addClass('text-center'),
            Column::make('doc_cp')->title('CP')->addClass('text-center'),
            Column::make('doc_tp')->title('TP')->addClass('text-center'),
            Column::make('doc_rpp')->title('Modul Ajar')->addClass('text-center'),
            Column::make('upload')->title('Upload')->addClass('text-center'),
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
        return 'PerangkatAjar_' . date('YmdHis');
    }
}
