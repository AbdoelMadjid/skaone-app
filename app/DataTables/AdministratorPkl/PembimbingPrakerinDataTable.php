<?php

namespace App\DataTables\AdministratorPkl;

use App\Models\AdministratorPkl\PembimbingPrakerin;
use App\Models\AdministratorPkl\PenempatanPrakerin;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PembimbingPrakerinDataTable extends DataTable
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
            ->addColumn('namalengkap', function ($row) {
                // Ambil data namalengkap dari tabel personil_sekolahs berdasarkan id_personil
                $personil = PersonilSekolah::where('id_personil', $row->id_personil)->first();
                return $personil ? $personil->namalengkap : '-'; // Mengembalikan namalengkap jika ditemukan, atau '-' jika tidak ditemukan
            })
            ->addColumn('peserta_info', function ($row) {
                // Ambil data berdasarkan id_penempatan yang ada di baris
                $penempatanPrakerin = PenempatanPrakerin::join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
                    ->join('peserta_didik_rombels', 'penempatan_prakerins.nis', '=', 'peserta_didik_rombels.nis')
                    ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
                    ->where('penempatan_prakerins.id', $row->id_penempatan)
                    ->select('penempatan_prakerins.nis', 'peserta_didiks.nama_lengkap', 'peserta_didik_rombels.rombel_nama', 'perusahaans.nama')
                    ->first();

                // Jika data ditemukan, kembalikan format yang diinginkan
                if ($penempatanPrakerin) {
                    return $penempatanPrakerin->nis . ' - ' . $penempatanPrakerin->nama_lengkap . ' (' . $penempatanPrakerin->rombel_nama . ') - ' . $penempatanPrakerin->nama;
                }

                return '-'; // Jika tidak ditemukan
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
    public function query(PembimbingPrakerin $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('id_personil', 'asc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pembimbingprakerin-table')
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
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('namalengkap')->title('Pembimbing'),
            Column::make('peserta_info')->title('Penempatan'),
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
        return 'PembimbingPrakerin_' . date('YmdHis');
    }
}
