<?php

namespace App\DataTables\ManajemenSekolah;

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
                // Tentukan path default berdasarkan jenis kelamin
                $defaultPhotoPath = $row->jeniskelamin === 'Laki-laki'
                    ? asset('images/gurulaki.png')
                    : asset('images/gurucewek.png');

                // Tentukan path foto dari database
                $imagePath = base_path('images/personil/' . $row->photo);
                $logoPath = '';

                // Cek apakah file foto ada di folder 'images/personil'
                if ($row->photo && file_exists($imagePath)) {
                    $logoPath = asset('images/personil/' . $row->photo);
                } else {
                    // Jika file tidak ditemukan, gunakan foto default berdasarkan jenis kelamin
                    $logoPath = $defaultPhotoPath;
                }

                // Mengembalikan tag img dengan path gambar
                return '<img src="' . $logoPath . '" alt="Photo" width="150" class="rounded-circle avatar-lg img-thumbnail user-profile-image" />';
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
        $query = $model->newQuery();

        // Ambil parameter filter dari request
        if (request()->has('search') && !empty(request('search'))) {
            $query->where('namalengkap', 'like', '%' . request('search') . '%');
        }

        if (request()->has('jenisPersonil') && request('jenisPersonil') != 'all') {
            $query->where('jenispersonil', request('jenisPersonil'));
        }

        if (request()->has('statusPersonil') && request('statusPersonil') != 'all') {
            $query->where('aktif', request('statusPersonil'));
        }

        //$query->select('personil_sekolahs.*')->orderBy('id', 'asc');

        $query = PersonilSekolah::select('personil_sekolahs.*', 'users.login_count')
            ->join('users', 'personil_sekolahs.id_personil', '=', 'users.personal_id')->orderBy('id', 'asc');


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
                'data' =>
                'function(d) {
                    d.search = $(".search").val();
                    d.jenisPersonil = $("#idJenis").val();
                    d.statusPersonil = $("#idStatus").val();
                }'
            ])
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
                'pageLength' => 25,       // Menampilkan 50 baris per halaman
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
            Column::computed('tempat_tanggal_lahir')->title('Tempat/Tanggal Lahir'),
            Column::make('jenispersonil')->title('Jenis Personil')->addClass('text-center'),
            Column::make('aktif')->title('Status')->addClass('text-center'),
            Column::make('login_count')->title('Jumla Login')->addClass('text-center'),
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
