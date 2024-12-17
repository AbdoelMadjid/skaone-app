<?php

namespace App\DataTables\Kurikulum\DokumenGuru;

use App\Models\Kurikulum\DataKBM\KbmPerRombel;
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

class ArsipNgajarDataTable extends DataTable
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
            ->addColumn('cek_sudahbelum', function ($row) {
                $dataExistsFormatif = DB::table('nilai_formatif')
                    ->where('tahunajaran', $row->tahunajaran)
                    ->where('tingkat', $row->tingkat)
                    ->where('ganjilgenap', $row->ganjilgenap)
                    ->where('semester', $row->semester)
                    ->where('kode_rombel', $row->kode_rombel)
                    ->where('kel_mapel', $row->kel_mapel)
                    ->where('id_personil', $row->id_personil)
                    ->exists();
                if (!$dataExistsFormatif) {
                    $CekFormatif = '<i class="bx bx-message-square-x fs-3 text-danger"></i>';
                } else {
                    $CekFormatif = '<i class="bx bx-message-square-check fs-3 text-info"></i>';
                }
                $dataExistsSumatif = DB::table('nilai_sumatif')
                    ->where('tahunajaran', $row->tahunajaran)
                    ->where('tingkat', $row->tingkat)
                    ->where('ganjilgenap', $row->ganjilgenap)
                    ->where('semester', $row->semester)
                    ->where('kode_rombel', $row->kode_rombel)
                    ->where('kel_mapel', $row->kel_mapel)
                    ->where('id_personil', $row->id_personil)
                    ->exists();
                if (!$dataExistsSumatif) {
                    $CekSumatif = '<i class="bx bx-message-square-x fs-3 text-danger"></i>';
                } else {
                    $CekSumatif = '<i class="bx bx-message-square-check fs-3 text-info"></i>';
                }

                return 'Nilai Formatif = ' . $CekFormatif . '<br>Nilai Sumatif = ' . $CekSumatif;
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
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['namaguru', 'cek_sudahbelum', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(KbmPerRombel $model): QueryBuilder
    {
        $query = $model->newQuery();

        // Filter Tahun Ajaran
        if (request()->has('tahunajaran') && request('tahunajaran')) {
            $query->where('tahunajaran', request('tahunajaran'));
        }

        // Filter Semester
        if (request()->has('semester') && request('semester')) {
            $query->where('ganjilgenap', request('semester'));
        }

        // Filter Guru Mapel
        if (request()->has('gurumapel') && request('gurumapel') !== 'All') {
            $query->where('id_personil', request('gurumapel'));
        }

        // Filter Rombel
        if (request()->has('rombel') && request('rombel') !== 'All') {
            $query->where('kode_rombel', request('rombel'));
        }

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('arsipngajar-table')
            ->columns($this->getColumns())
            ->minifiedAjax('', null, [
                'tahunajaran' => 'function() { return $("#tahunajaran").val(); }',
                'semester'    => 'function() { return $("#semester").val(); }',
                'gurumapel'   => 'function() { return $("#gurumapel").val(); }',
                'rombel'      => 'function() { return $("#rombel").val(); }',
            ])
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
                'pageLength' => 50,       // Menampilkan 50 baris per halaman
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('rombel')->title('Rombel')->addClass('text-center'),
            Column::make('mata_pelajaran')->title('Nama Mapel'),
            Column::make('namaguru')->title('Guru Mapel'),
            Column::make('cek_sudahbelum')->title('Cek Formatif'),
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
        return 'ArsipNgajar_' . date('YmdHis');
    }
}
