<?php

namespace App\DataTables\ManajemenSekolah;

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
                // Tentukan path default berdasarkan jenis kelamin
                $defaultPhotoPath = $row->jenis_kelamin === 'Laki-laki'
                    ? asset('images/siswacowok.png')
                    : asset('images/siswacewek.png');

                // Tentukan path foto dari database
                $imagePath = base_path('images/peserta_didik/' . $row->foto);
                $logoPath = '';

                // Cek apakah file foto ada di folder 'images/personil'
                if ($row->foto && file_exists($imagePath)) {
                    $logoPath = asset('images/peserta_didik/' . $row->foto);
                } else {
                    // Jika file tidak ditemukan, gunakan foto default berdasarkan jenis kelamin
                    $logoPath = $defaultPhotoPath;
                }

                /* $AvatarUser = DB::table('users')
                    ->select('avatar')
                    ->where('nis', $row->nis)
                    ->first(); // Mengambil satu baris data

                $avataruserPath = ''; // Inisialisasi

                if ($AvatarUser && $AvatarUser->avatar) {
                    $avatarPath = base_path('images/peserta_didik/' . $AvatarUser->avatar);

                    // Periksa apakah file avatar ada
                    if (file_exists($avatarPath)) {
                        $avataruserPath = asset('images/peserta_didik/' . $AvatarUser->avatar);
                    } else {
                        // Jika file tidak ada, gunakan foto default berdasarkan jenis kelamin
                        $avataruserPath = $defaultPhotoPath;
                    }
                } else {
                    // Jika tidak ada data avatar, gunakan foto default
                    $avataruserPath = $defaultPhotoPath;
                } */

                // Mengembalikan tag img dengan path gambar
                return '<img src="' . $logoPath . '" alt="Foto" width="50" />';
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
        $query = $model->newQuery()
            ->select([
                'peserta_didiks.*',
                DB::raw('CONCAT(peserta_didiks.kode_kk, " - ", kompetensi_keahlians.singkatan) as kode_kk_singkatan_kk'),
            ])
            ->join('kompetensi_keahlians', 'peserta_didiks.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->orderBy('peserta_didiks.nis', 'asc');

        // Filter pencarian nama lengkap
        if (request()->has('search') && request('search')) {
            $query->where('peserta_didiks.nama_lengkap', 'like', '%' . request('search') . '%');
        }

        // Filter kompetensi keahlian
        if (request()->has('kodeKK') && request('kodeKK') !== 'all') {
            $query->where('peserta_didiks.kode_kk', request('kodeKK'));
        }

        // Filter jenis kelamin
        if (request()->has('jenkelSiswa') && request('jenkelSiswa') !== 'all') {
            $query->where('peserta_didiks.jenis_kelamin', request('jenkelSiswa'));
        }

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
                'pageLength' => 36,       // Menampilkan 50 baris per halaman
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
