<?php

namespace App\DataTables\ManajemenSekolah;

use App\Helpers\ImageHelper;
use App\Models\ManajemenSekolah\PesertaDidik;
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

class PesertaDidikDataTable extends DataTable
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
                            data-nis="' . $row->nis . '"
                            data-name="' . $row->nama_lengkap . '"
                            data-kode_kk="' . $row->kode_kk . '">';
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addColumn('foto', function ($row) {
                // Menggunakan ImageHelper untuk mendapatkan tag gambar avatar
                // Pastikan kolom 'foto' ada dalam query
                return ImageHelper::getAvatarImageTag(
                    filename: $row->foto,
                    gender: $row->jenis_kelamin,
                    folder: 'peserta_didik',
                    defaultMaleImage: 'siswacowok.png',
                    defaultFemaleImage: 'siswacewek.png',
                    width: 50,
                    class: 'rounded avatar-sm'
                );
            })
            ->addColumn('tempat_tanggal_lahir', function ($row) {
                return $row->tempat_lahir . ', ' . \Carbon\Carbon::parse($row->tanggal_lahir)->format('d-m-Y');
            })
            ->addColumn('nis_nisn', function ($row) {
                return $row->nis . '/' . $row->nisn;
            })
            ->addIndexColumn()
            ->rawColumns(['checkbox', 'foto', 'tempat_tanggal_lahir', 'nis_nisn', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PesertaDidik $model): QueryBuilder
    {
        $query = $model->newQuery();

        if (request()->has('search') && !empty(request('search'))) {
            $query->where('nama_lengkap', 'like', '%' . request('search') . '%');
        }

        if (request()->has('kodeKK') && request('kodeKK') != 'all') {
            $query->where('kode_kk', request('kodeKK'));
        }

        if (request()->has('jenkelSiswa') && request('jenkelSiswa') != 'all') {
            $query->where('jenis_kelamin', request('jenkelSiswa'));
        }

        $query->select('peserta_didiks.*')->orderBy('nis', 'asc');

        $query->select(['id', 'kode_kk'])->select([
            'peserta_didiks.*',
            DB::raw('CONCAT(peserta_didiks.kode_kk, " - ", kompetensi_keahlians.singkatan) as kode_kk_singkatan_kk'),
            // Pastikan tabel 'kompetensi_keahlians' terkait dengan model 'ProgramKeahlian'
        ])
            ->join('kompetensi_keahlians', 'peserta_didiks.kode_kk', '=', 'kompetensi_keahlians.idkk');

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pesertadidik-table')
            ->columns($this->getColumns())
            ->ajax([
                'data' =>
                'function(d) {
                    d.search = $(".search").val();
                    d.kodeKK = $("#idKK").val();
                    d.jenkelSiswa = $("#idJenkel").val();
                }'
            ])
            //->dom('Bfrtip')
            ->orderBy(1)
            ->parameters([
                'lengthChange' => false,
                'searching' => false, // Mengaktifkan pencarian
                'searchDelay' => 500, // Delay pencarian untuk mengurangi beban server
                'pageLength' => 36,
                // ⬇️ Tambahan fitur scroll dan fixedHeader
                'scrollY' => '285px',
                'scrollCollapse' => true,
                'paging' => true,
                'fixedHeader' => true,
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::computed('checkbox')
                ->title('<input class="form-check-input" type="checkbox" id="checkAll" value="option">') // Untuk "Select All"
                ->orderable(false)
                ->searchable(false)
                ->width(10)
                ->addClass('text-center align-middle'),
            Column::computed('kode_kk_singkatan_kk')->title('KK')->addClass('text-center'),
            Column::computed('nis_nisn')->title('NISN / NISN'),
            Column::make('nama_lengkap'),
            Column::computed('tempat_tanggal_lahir')->title('Tempat/Tanggal Lahir'),
            Column::make('jenis_kelamin'),
            Column::make('foto')->addClass('text-center'),
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
        return 'PesertaDidik_' . date('YmdHis');
    }
}
