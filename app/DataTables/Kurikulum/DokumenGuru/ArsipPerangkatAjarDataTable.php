<?php

namespace App\DataTables\Kurikulum\DokumenGuru;

use App\Models\GuruMapel\PerangkatAjar;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ArsipPerangkatAjarDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
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
            ->addColumn('doc_analis_waktu', fn($row) => $this->getUploadedDoc($row, 'doc_analis_waktu', 'Analisis Waktu'))
            ->addColumn('doc_cp', fn($row) => $this->getUploadedDoc($row, 'doc_cp', 'CP'))
            ->addColumn('doc_tp', fn($row) => $this->getUploadedDoc($row, 'doc_tp', 'ATP'))
            ->addColumn('doc_rpp', fn($row) => $this->getUploadedDoc($row, 'doc_rpp', 'Modul Ajar'))
            ->addColumn('hapus', function ($row) {
                return '<button class="btn btn-sm btn-danger delete-perangkat"
                    data-id_personil="' . $row->id_personil . '"
                    data-tingkat="' . $row->tingkat . '"
                    data-mapel="' . htmlspecialchars($row->mata_pelajaran, ENT_QUOTES) . '"
                    data-tahunajaran="' . $row->tahunajaran . '"
                    data-semester="' . $row->ganjilgenap . '">
                    Hapus
                </button>';
            })
            ->addIndexColumn()
            ->rawColumns(['doc_analis_waktu', 'doc_cp', 'doc_tp', 'doc_rpp', 'hapus']);
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
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
            ->first();

        $data = PerangkatAjar::where([
            'tahunajaran' => $tahunAjaranAktif->tahunajaran,
            'semester' => $semesterAktif->semester,
            'tingkat' => $row->tingkat,
            'mata_pelajaran' => $row->mata_pelajaran,
            'id_personil' => $row->id_personil,
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

        // Jika ada tahun ajaran aktif, filter
        if ($tahunAjaranAktif) {
            $query->where('tahunajaran', $tahunAjaranAktif->tahunajaran);
        }

        // Jika ada semester aktif, filter berdasarkan kolom ganjilgenap
        if ($semesterAktif) {
            $query->where('ganjilgenap', $semesterAktif->semester);
        }

        $query->select('tahunajaran', 'ganjilgenap', 'tingkat', 'mata_pelajaran', 'id_personil')
            ->groupBy('tahunajaran', 'ganjilgenap', 'tingkat', 'mata_pelajaran', 'id_personil');

        $query->orderBy('id_personil', 'asc')
            ->orderBy('tingkat', 'asc');
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
            ->setTableId('arsipperangkatajar-table')
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
                'scrollY' => "calc(100vh - 342px)",
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
            Column::make('namaguru')->title('Guru Pengampu'),
            Column::make('mata_pelajaran')->title('Mata Pelajaran'),
            Column::make('tingkat')->title('Tingkat')->addClass('text-center'),
            Column::make('doc_analis_waktu')->title('Analisis Waktu')->addClass('text-center'),
            Column::make('doc_cp')->title('CP')->addClass('text-center'),
            Column::make('doc_tp')->title('TP')->addClass('text-center'),
            Column::make('doc_rpp')->title('Modul Ajar')->addClass('text-center'),
            Column::make('hapus')->title('Hapus')->addClass('text-center'),
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
        return 'ArsipPerangkatAjar_' . date('YmdHis');
    }
}
