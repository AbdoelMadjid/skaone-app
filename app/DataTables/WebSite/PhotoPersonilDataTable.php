<?php

namespace App\DataTables\WebSite;

use App\Models\WebSite\PhotoPersonil;
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

class PhotoPersonilDataTable extends DataTable
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
            ->addColumn('photo', function ($row) {

                // Tentukan path foto dari database
                $imagePath = base_path('images/photo-personil/' . $row->photo);
                $photoPath = '';

                // Cek apakah file foto ada di folder 'images/personil'
                if ($row->photo && file_exists($imagePath)) {
                    $photoPath = asset('images/photo-personil/' . $row->photo);
                } else {
                    // Jika file tidak ditemukan, gunakan foto default berdasarkan jenis kelamin
                    $photoPath = asset('images/welcome/personil/img1.jpg');
                }

                // Mengembalikan tag img dengan path image
                return '<img src="' . $photoPath . '" alt="Foto" width="75" />';
            })
            ->addColumn('namapersonil', function ($row) {
                $personilSekolah = DB::table('personil_sekolahs')
                    ->where('id_personil', $row->id_personil)
                    ->select('gelardepan', 'namalengkap', 'gelarbelakang') // Ambil semua field yang diperlukan
                    ->first();

                if ($personilSekolah) {
                    return "[" . $row->no_personil . "] " . $personilSekolah->gelardepan . ' ' . $personilSekolah->namalengkap . ', ' . $personilSekolah->gelarbelakang;
                }

                return $row->id_personil . '<em>Data tidak ditemukan</em>';
            })
            ->addColumn('no_nama_group', function ($row) {
                return $row->no_group . '. ' . $row->nama_group;
            })
            ->addColumn('action', function ($row) {
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['photo', 'namapersonil', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PhotoPersonil $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('photopersonil-table')
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
            Column::make('no_nama_group')->title('No. Urut Group'),
            Column::make('namapersonil')->title('Nama Personil'),
            Column::make('photo')->addClass('text-center'),
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
        return 'PhotoPersonil_' . date('YmdHis');
    }
}
