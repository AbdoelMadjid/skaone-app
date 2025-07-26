<?php

namespace App\DataTables\ManajemenSekolah;

use App\Helpers\ImageHelper;
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

class PersonilSekolahDataTable extends DataTable
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
            ->addColumn('checkbox', function ($row) {
                return '<input class="form-check-input chk-child" type="checkbox"
                        name="chk_child"
                        value="' . $row->id . '"
                        data-idpersonil="' . $row->id_personil . '"
                        data-namalengkap="' . $row->namalengkap . '"
                        data-jenispersonil="' . $row->jenispersonil . '"
                        data-email="' . $row->kontak_email . '"
                        data-aktif="' . $row->aktif . '">';
            })
            ->addColumn('namalengkap', function ($row) {
                return $row->gelardepan . " " . $row->namalengkap . " " . $row->gelarbelakang;
            })
            ->addColumn('tempat_tanggal_lahir', function ($row) {
                return $row->tempatlahir . ', ' . \Carbon\Carbon::parse($row->tanggallahir)->format('d-m-Y');
            })
            ->addColumn('photo', function ($row) {
                return ImageHelper::getAvatarImageTag(
                    filename: $row->photo,
                    gender: $row->jeniskelamin,
                    folder: 'personil',
                    defaultMaleImage: 'gurulaki.png',
                    defaultFemaleImage: 'gurucewek.png',
                    width: 150,
                    class: 'rounded-circle avatar-sm'
                );
            })
            ->addColumn('login_count', function ($row) {
                // Pastikan kolom login_count tersedia dalam query
                if ($row->login_count == 0) {
                    $loginnya = "<span class='badge bg-danger fs-12'>BELUM LOGIN</span>";
                } else {
                    $loginnya = $row->login_count;
                }

                return $loginnya;
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'login_count', 'photo', 'namalengkap', 'tempat_tanggal_lahir', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PersonilSekolah $model): QueryBuilder
    {
        $query = $model->newQuery()
            ->select('personil_sekolahs.*', 'users.login_count')
            ->leftJoin('users', 'personil_sekolahs.id_personil', '=', 'users.personal_id')

            // 1. Yang ada NIP dulu
            ->orderByRaw("CASE WHEN personil_sekolahs.nip IS NULL OR personil_sekolahs.nip = '' THEN 1 ELSE 0 END ASC")

            // 2. Kepala Sekolah dulu
            ->orderByRaw("FIELD(personil_sekolahs.jenispersonil, 'Kepala Sekolah') DESC")

            // 3. Lalu berdasarkan jenis personil (abjad)
            ->orderBy('personil_sekolahs.jenispersonil', 'asc')

            // 4. Terakhir berdasarkan NIP
            ->orderBy('personil_sekolahs.nip', 'asc');

        // Filter pencarian nama lengkap
        if (request()->has('search') && request('search')) {
            $query->where('personil_sekolahs.namalengkap', 'like', '%' . request('search') . '%');
        }

        // Filter jenis personil
        if (request()->has('jenisPersonil') && request('jenisPersonil') != 'all') {
            $query->where('personil_sekolahs.jenispersonil', request('jenisPersonil'));
        }

        // Filter status personil
        if (request()->has('statusPersonil') && request('statusPersonil') != 'all') {
            $query->where('personil_sekolahs.aktif', request('statusPersonil'));
        }

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('personilsekolah-table')
            ->columns($this->getColumns())
            ->ajax([
                'data' => 'function(d) {
                    d.search = $(".search").val();
                    d.jenisPersonil = $("#idJenis").val();
                    d.statusPersonil = $("#idStatus").val();
                }',
            ])
            //->dom('Bfrtip')
            /* ->orderBy(1) */
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => false,
                'pageLength' => 50,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 409px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('checkbox')
                ->title('<input class="form-check-input" type="checkbox" id="checkAll" value="option">')
                ->orderable(false)
                ->searchable(false)
                ->width(10)
                ->addClass('text-center align-middle'),
            Column::make('nip')->title('N I P')->width(150),
            Column::make('namalengkap')->title('Nama Lengkap'),
            Column::make('jeniskelamin')->title('Jenis Kelamin')->addClass('text-center'),
            Column::computed('tempat_tanggal_lahir')->title('Tempat / <br> Tanggal Lahir'),
            Column::make('jenispersonil')->title('Jenis Personil')->addClass('text-center'),
            Column::make('login_count')->title('Jumlah Login')->addClass('text-center'),
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
        return 'PersonilSekolah_' . date('YmdHis');
    }
}
