<?php

namespace App\DataTables\Pkl\AdministratorPkl;

use App\Models\Pkl\AdministratorPkl\PesertaPrakerin;
use App\Models\User;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PesertaPrakerinDataTable extends DataTable
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
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                unset($actions['Delete']);
                unset($actions['Edit']);
                return view('action', compact('actions'));
            })
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PesertaPrakerin $model): QueryBuilder
    {
        $query = $model->newQuery();

        $query->join('peserta_didiks', 'peserta_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('kompetensi_keahlians', 'peserta_prakerins.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->join('peserta_didik_rombels', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->join('penempatan_prakerins', 'peserta_prakerins.nis', '=', 'penempatan_prakerins.nis')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->select(
                'peserta_prakerins.*',
                'kompetensi_keahlians.nama_kk',
                'peserta_didiks.nama_lengkap as nama_siswa',
                'peserta_didik_rombels.rombel_nama',
                'perusahaans.nama as nama_perusahaan'
            );

        /* $query->join('peserta_didiks', 'peserta_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('kompetensi_keahlians', 'peserta_prakerins.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->join('peserta_didik_rombels', 'peserta_prakerins.nis', '=', 'peserta_didik_rombels.nis')
            ->select(
                'peserta_prakerins.*',
                'peserta_didiks.nama_lengkap',
                'kompetensi_keahlians.nama_kk',
                'peserta_didik_rombels.rombel_nama'
            ); // Tambahkan nama_kk */

        if (auth()->check()) {
            $user = User::find(Auth::user()->id);
            if ($user->hasAnyRole(['kaprodiak'])) {
                $query->where('peserta_prakerins.kode_kk', '=', '833');
            } elseif ($user->hasAnyRole(['kaprodibd'])) {
                $query->where('peserta_prakerins.kode_kk', '=', '811');
            } elseif ($user->hasAnyRole(['kaprodimp'])) {
                $query->where('peserta_prakerins.kode_kk', '=', '821');
            } elseif ($user->hasAnyRole(['kaprodirpl'])) {
                $query->where('peserta_prakerins.kode_kk', '=', '411');
            } elseif ($user->hasAnyRole(['kaproditkj'])) {
                $query->where('peserta_prakerins.kode_kk', '=', '421');
            }
        }
        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pesertaprakerin-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(4, 'asc')
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => true,
                'pageLength' => 25,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 422px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center align-middle')->width(50),
            Column::make('nis')->addClass('text-center'),
            Column::make('nama_siswa'),
            Column::make('rombel_nama'),
            Column::make('nama_perusahaan'),
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
        return 'PesertaPrakerin_' . date('YmdHis');
    }
}
