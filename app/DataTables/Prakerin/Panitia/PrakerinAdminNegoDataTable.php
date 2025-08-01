<?php

namespace App\DataTables\Prakerin\Panitia;

use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\Prakerin\Panitia\PrakerinAdminNego;
use App\Models\Prakerin\Panitia\PrakerinNegosiator;
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

class PrakerinAdminNegoDataTable extends DataTable
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
            ->filterColumn('perusahaan', function ($query, $keyword) {
                $query->whereIn('id_perusahaan', function ($subquery) use ($keyword) {
                    $subquery->select('id')
                        ->from('perusahaans')
                        ->where('nama', 'like', "%{$keyword}%");
                });
            })
            ->addColumn('perusahaan', function ($row) {
                $namaPerusahaan = DB::table('prakerin_perusahaans')
                    ->where('id', $row->id_perusahaan)
                    ->select('nama') // Ambil semua field yang diperlukan
                    ->first();

                if ($namaPerusahaan) {
                    return $namaPerusahaan->nama;
                }

                return $row->nama . '<em>Data tidak ditemukan</em>';
            })
            ->addColumn('nomor_surat', function ($row) {
                return '<span class="text-info"><strong>Surat Pengantar:</strong></span> ' . $row->nomor_surat_pengantar .
                    '<br><span class="text-info"><strong>Surat Perintah:</strong></span> ' . $row->nomor_surat_perintah .
                    '<br><span class="text-info"><strong>Surat MOU:</strong></span> ' . $row->nomor_surat_mou;
            })
            ->addColumn('id_nego', function ($row) {
                // Ambil semua personil sekali saja
                static $personilList = null;
                if (!$personilList) {
                    $personilList = PersonilSekolah::all()
                        ->mapWithKeys(function ($personil) {
                            $namaLengkap = trim(
                                ($personil->gelardepan ? $personil->gelardepan . ' ' : '') .
                                    $personil->namalengkap .
                                    ($personil->gelarbelakang ? ', ' . $personil->gelarbelakang : '')
                            );
                            return [$personil->id_personil => $namaLengkap];
                        });
                }

                // Cari negosiator berdasarkan $row->id_nego
                $negosiator = PrakerinNegosiator::where('id_nego', $row->id_nego)->first();

                // Ambil nama personil-nya
                return $negosiator
                    ? ($personilList[$negosiator->id_personil] ?? '-')
                    : '-';
            })
            ->addColumn('tanggal', function ($row) {
                return '<span class="text-info"><strong>Titimangsa :</strong></span> <br>' .
                    \Carbon\Carbon::parse($row->titimangsa)->translatedFormat('d F Y') .
                    '<br><span class="text-info"><strong>Negosiasi :</strong></span> <br>' .
                    \Carbon\Carbon::parse($row->tgl_nego)->translatedFormat('l, d F Y');
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['action', 'perusahaan', 'tanggal', 'id_nego', 'nomor_surat']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PrakerinAdminNego $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('prakerinadminnego-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[1, 'asc']],
                'lengthChange' => false,
                'searching' => true,
                'pageLength' => 50,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 414px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('tahunajaran')->title('Tahun <br> Ajaran'),
            Column::make('perusahaan')->title('Nama Perusahaan')->width('15%'),
            Column::make('nomor_surat')->title('No. Surat')->width('20%'),
            Column::make('tanggal')->title('Tanggal')->width('15%'),
            Column::make('id_nego')->title('Nama Negosiator'),
            // Kolom untuk aksi
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
        return 'PrakerinAdminNego_' . date('YmdHis');
    }
}
