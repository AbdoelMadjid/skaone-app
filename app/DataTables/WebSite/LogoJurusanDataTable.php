<?php

namespace App\DataTables\WebSite;

use App\Models\WebSite\LogoJurusan;
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

class LogoJurusanDataTable extends DataTable
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
            ->addColumn('nama_kk', function ($row) {
                $konsentrasiKeahlian = DB::table('kompetensi_keahlians')
                    ->where('idkk', $row->kode_kk)
                    ->select('nama_kk') // Ambil semua field yang diperlukan
                    ->first();

                if ($konsentrasiKeahlian) {
                    return '(' . $row->kode_kk . ') ' . $konsentrasiKeahlian->nama_kk;
                }

                return $row->kode_kk . '<em>Data tidak ditemukan</em>';
            })
            ->addColumn('logo', function ($row) {

                // Tentukan path foto dari database
                $imagePath = base_path('images/jurusan_logo/' . $row->logo);
                $logoPath = '';

                // Cek apakah file foto ada di folder 'images/personil'
                if ($row->logo && file_exists($imagePath)) {
                    $logoPath = asset('images/jurusan_logo/' . $row->logo);
                } else {
                    // Jika file tidak ditemukan, gunakan foto default berdasarkan jenis kelamin
                    $logoPath = asset('build/images/bg-auth.jpg');
                }

                // Mengembalikan tag img dengan path image
                return '<img src="' . $logoPath . '" alt="Logo Jurusan" width="100" />';
            })
            ->addColumn('action', function ($row) {
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['logo', 'nama_kk', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(LogoJurusan $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('logojurusan-table')
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
                'scrollY' => "calc(100vh - 351px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('nama_kk')->title('Konsentrasi Keahlian'),
            Column::make('logo')->addClass('text-center'),
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
        return 'LogoJurusan_' . date('YmdHis');
    }
}
