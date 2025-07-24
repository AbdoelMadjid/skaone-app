<?php

namespace App\DataTables\ManajemenSekolah;

use App\Models\ManajemenSekolah\IdentitasSekolah;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class IdentitasSekolahDataTable extends DataTable
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
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addColumn('detail', function ($row) {
                // Define the paths
                $imagePath = base_path('images/' . $row->logo_sekolah);
                $logoPath = '';

                // Check if the file exists in the 'images' folder
                if (file_exists($imagePath)) {
                    $logoPath = asset('images/' . $row->logo_sekolah);
                } else {
                    // If the file doesn't exist, fall back to the 'build/images' folder
                    $logoPath = asset('build/images/' . $row->logo_sekolah);
                }

                // Return the image HTML tag
                return '
                <table class="table">
                    <tr>
                        <td><strong>NPSN</strong></td>
                        <td>' . $row->npsn . '</td>
                    </tr>
                    <tr>
                        <td><strong>Nama Sekolah</strong></td>
                        <td>' . $row->nama_sekolah . '</td>
                    </tr>
                    <tr>
                        <td><strong>Status</strong></td>
                        <td>' . $row->status . '</td>
                    </tr>
                    <tr>
                        <td><strong>Alamat</strong></td>
                        <td>
                            <table>
                            <tr>
                            <td width=100>Jalan </td><td>' . $row->alamat_jalan . ' No. ' . $row->alamat_no . '</td>
                            </tr>
                            <tr>
                            <td>Blok </td><td>' . $row->alamat_blok . '</td>
                            </tr>
                            <tr>
                            <td>RT/RW </td><td>' . $row->alamat_rt . ' / ' . $row->alamat_rw . '</td>
                            </tr>
                            <tr>
                            <td>Desa </td><td>' . $row->alamat_desa . '</td>
                            </tr>
                            <tr>
                            <td>Kecamatan </td><td>' . $row->alamat_kec . '</td>
                            </tr>
                            <tr>
                            <td>Kabupaten </td><td>' . $row->alamat_kab . '</td>
                            </tr>
                            <tr>
                            <td>Provinsi </td><td>' . $row->alamat_provinsi . '</td>
                            </tr>
                            <tr>
                            <td>Kode Pos </td><td>' . $row->alamat_kodepos . '</td>
                            </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Kontak</strong></td>
                        <td>
                            <table>
                                <tr>
                                    <td width=100>Telepon </td><td>' . $row->alamat_telepon . '</td>
                                </tr>
                                <tr>
                                    <td>Website </td><td>' . $row->alamat_website . '</td>
                                </tr>
                                <tr>
                                    <td>Email </td><td>' . $row->alamat_email . '</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Logo Sekolah</strong></td>
                        <td><img src="' . $logoPath . '" width="150" alt="Logo Sekolah" /></td>
                    </tr>
                </table>
            ';
            })
            ->rawColumns(['detail', 'logo_sekolah', 'action']) // Membiarkan HTML dirender untuk kolom 'detail' dan 'action'
            ->addIndexColumn(); // Menambahkan nomor urut otomatis
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(IdentitasSekolah $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('identitassekolah-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('rt')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => false,
                'pageLength' => 25,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 302px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('detail')
                ->title('Detail Sekolah')
                ->exportable(false)
                ->printable(false)
                ->width(200)
                ->addClass('text-left'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(30)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'IdentitasSekolah_' . date('YmdHis');
    }
}
