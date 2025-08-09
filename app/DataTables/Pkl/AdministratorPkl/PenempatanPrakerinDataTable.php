<?php

namespace App\DataTables\Pkl\AdministratorPkl;

use App\Models\Pkl\AdministratorPkl\PenempatanPrakerin;
use App\Models\Pkl\AdministratorPkl\Perusahaan;
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

class PenempatanPrakerinDataTable extends DataTable
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
            ->addColumn('nis_siswa', function ($row) {
                // Mengambil semua nis dan nama_lengkap siswa yang sesuai dengan id_dudi
                $penempatans = PenempatanPrakerin::where('id_dudi', $row->id)
                    ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
                    ->join('peserta_didik_rombels', 'penempatan_prakerins.nis', '=', 'peserta_didik_rombels.nis')
                    ->get(['penempatan_prakerins.nis', 'peserta_didiks.nama_lengkap', 'peserta_didik_rombels.rombel_nama', 'penempatan_prakerins.id', 'penempatan_prakerins.kode_kk']);

                // Membuat format HTML <ul><li> untuk setiap nis dan nama_lengkap siswa
                if ($penempatans->isEmpty()) {
                    return 'Siswa belum ada yang ditempatkan';
                }

                $nisList = '<ol>';
                foreach ($penempatans as $penempatan) {
                    $deleteButton = '';
                    $user = User::find(Auth::user()->id);
                    // Menampilkan tombol delete hanya untuk role master
                    if ($user->hasAnyRole(['master', 'kaproditkj', 'kaprodirpl', 'kaprodibd', 'kaprodimp', 'kaprodiak'])) {
                        $deleteButton = "<button class='btn btn-soft-danger btn-sm delete-siswa'
                        data-id='{$penempatan->id}'
                        onclick='confirmDelete({$penempatan->id})'><i
                                        class='ri-delete-bin-2-line'></i></button>";
                    }

                    $badgetype = match ($penempatan->kode_kk) {
                        '421' => 'warning',
                        '411' => 'danger',
                        '811' => 'info',
                        '821' => 'success',
                        '833' => 'secondary',
                        default => 'primary'
                    };

                    $nisList .= "<li>
                        {$penempatan->nis} - {$penempatan->nama_lengkap} - <span class='badge bg-$badgetype'>{$penempatan->rombel_nama}</span>
                        $deleteButton
                    </li>";
                }
                $nisList .= '</ol>';

                return $nisList;
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['nis_siswa', 'select_siswa', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Perusahaan $model): QueryBuilder
    {
        return $model->newQuery()->select('id', 'nama');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('penempatanprakerin-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1, 2)
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
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('nama')->title('Nama Perusahaan'),
            Column::make('nis_siswa')->title('NIS/SISWA')->width('50%'),
            /* Column::make('select_siswa')->title('Pilih Siswa')->width(250), */
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
        return 'PenempatanPrakerin_' . date('YmdHis');
    }
}
