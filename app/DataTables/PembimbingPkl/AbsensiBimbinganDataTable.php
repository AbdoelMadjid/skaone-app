<?php

namespace App\DataTables\PembimbingPkl;

use App\Models\AdministratorPkl\PembimbingPrakerin;
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

class AbsensiBimbinganDataTable extends DataTable
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
            ->addColumn('absensi', function ($row) {
                $absensitotal = $row->sakit + $row->izin + $row->alfa;
                return $absensitotal;
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['absensi', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PembimbingPrakerin $model): QueryBuilder
    {
        // Ambil id_personil dari user yang sedang login
        $idPersonil = auth()->user()->personal_id;

        return $model
            ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')
            ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'penempatan_prakerins.nis', '=', 'peserta_didik_rombels.nis')
            ->leftJoin('absensi_siswa_pkls', 'penempatan_prakerins.nis', '=', 'absensi_siswa_pkls.nis')
            ->select(
                'pembimbing_prakerins.id_personil',
                'pembimbing_prakerins.id_penempatan',
                'personil_sekolahs.namalengkap',
                'penempatan_prakerins.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didik_rombels.rombel_nama',
                'penempatan_prakerins.id_dudi',
                'perusahaans.nama as nama_perusahaan',
                DB::raw('SUM(CASE WHEN absensi_siswa_pkls.status = "HADIR" THEN 1 ELSE 0 END) as hadir'),
                DB::raw('SUM(CASE WHEN absensi_siswa_pkls.status = "SAKIT" THEN 1 ELSE 0 END) as sakit'),
                DB::raw('SUM(CASE WHEN absensi_siswa_pkls.status = "IZIN" THEN 1 ELSE 0 END) as izin'),
                DB::raw('SUM(CASE WHEN absensi_siswa_pkls.status = "ALFA" THEN 1 ELSE 0 END) as alfa')
            )
            ->where('pembimbing_prakerins.id_personil', $idPersonil)
            ->groupBy(
                'pembimbing_prakerins.id_personil',
                'pembimbing_prakerins.id_penempatan',
                'personil_sekolahs.namalengkap',
                'penempatan_prakerins.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didik_rombels.rombel_nama',
                'penempatan_prakerins.id_dudi',
                'penempatan_prakerins.id_dudi',
                'perusahaans.nama'
            );
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('absensibimbingan-table')
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
                'pageLength' => 36,       // Menampilkan 50 baris per halaman
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('nis')->title('NIS'),
            Column::make('nama_lengkap')->title('Nama Peserta Didik'),
            Column::make('rombel_nama')->title('Rombel'),
            Column::make('nama_perusahaan')->title('Perusahaan')->width(300),
            Column::make('hadir')->title('Hadir')->addClass('text-center align-middle'),
            Column::make('sakit')->title('Sakit')->addClass('text-center align-middle'),
            Column::make('izin')->title('Izin')->addClass('text-center align-middle'),
            Column::make('alfa')->title('Alfa')->addClass('text-center align-middle'),
            Column::make('absensi')->title('Absensi')->addClass('text-center align-middle'),
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
        return 'AbsensiBimbingan_' . date('YmdHis');
    }
}
