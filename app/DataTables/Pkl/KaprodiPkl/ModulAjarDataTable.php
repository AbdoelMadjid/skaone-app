<?php

namespace App\DataTables\Pkl\KaprodiPkl;

use App\Models\Pkl\KaprodiPkl\ModulAjar;
use App\Models\Kurikulum\DataKBM\CapaianPembelajaran;
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

class ModulAjarDataTable extends DataTable
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
            ->addColumn('nomor_urut_isi_tp', function ($row) {
                return $row->nomor_tp . ' - ' . $row->isi_tp; // Menggabungkan nomor_urut dan isi_cp
            })
            ->addColumn('element', function ($row) {
                // Fetch the corresponding element based on kode_cp and Praktek Kerja Industri
                $element = CapaianPembelajaran::where('nama_matapelajaran', 'Praktek Kerja Industri')
                    ->where('kode_cp', $row->kode_cp)
                    ->value('element');

                return $element;
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ModulAjar $model): QueryBuilder
    {
        $query = $model->newQuery();

        $query->select('modul_ajars.*');

        // Mapping role ke kode_kk
        $roleKodeKkMap = [
            'kaprodiak' => '833',
            'kaprodibd' => '811',
            'kaprodimp' => '821',
            'kaprodirpl' => '411',
            'kaproditkj' => '421',
        ];

        if (auth()->check()) {
            $user = User::find(Auth::user()->id);
            foreach ($roleKodeKkMap as $role => $kodeKk) {
                // Jika user memiliki role yang sesuai, filter berdasarkan kode_kk
                if ($user->hasRole($role)) {
                    $query->where('modul_ajars.kode_kk', '=', $kodeKk);
                    break; // Hentikan pengecekan setelah menemukan role yang cocok
                }
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
            ->setTableId('modulajar-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1, 4)
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
            Column::make('kode_modulajar')->title('Kode Modul Ajar'),
            Column::make('element')->title('Element'),
            Column::make('nomor_urut_isi_tp')->title('Isi Tujuan Pembelajaran'),
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
        return 'ModulAjar_' . date('YmdHis');
    }
}
