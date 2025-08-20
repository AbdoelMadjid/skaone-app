<?php

namespace App\DataTables\ManajemenSekolah;

use App\Helpers\ImageHelper;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\GuruWaliSiswa;
use App\Models\ManajemenSekolah\PesertaDidik;
use App\Models\User;
use App\Traits\DatatableHelper;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class GuruWaliSiswaDataTable extends DataTable
{
    use DatatableHelper;
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder<GuruWaliSiswa> $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('namaguru', function ($row) {
                return trim($row->gelardepan . ' ' . $row->namalengkap . ', ' . $row->gelarbelakang, ' ,');
            })
            ->addColumn('pesertadidik', function ($row) {
                $pesertaDidik = DB::table('peserta_didiks')
                    ->where('nis', $row->nis)
                    ->select('nama_lengkap', 'jenis_kelamin') // Ambil semua field yang diperlukan
                    ->first();

                if ($pesertaDidik->jenis_kelamin == "Perempuan") {
                    $jenis_kelaminbadge = "<i class='ri-women-line text-danger'></i>";
                } elseif ($pesertaDidik->jenis_kelamin == "Laki-laki") {
                    $jenis_kelaminbadge = "<i class='ri-men-line text-info'></i>";
                }

                if ($pesertaDidik) {
                    return "[" . $row->nis . "] " . $pesertaDidik->nama_lengkap . " " . $jenis_kelaminbadge;
                }

                return $row->nis . '<em>Data tidak ditemukan</em>';
            })
            ->addColumn('tingkat_10', function ($row) {
                $data = PesertaDidikRombel::where('nis', $row->nis)
                    ->where('rombel_tingkat', 10)
                    ->first();

                if ($data) {
                    return $data->tahun_ajaran . "<br><span class='badge bg-info'>" . $data->rombel_nama . "</span>";
                }

                return '-';
            })
            ->addColumn('tingkat_11', function ($row) {
                $data = PesertaDidikRombel::where('nis', $row->nis)
                    ->where('rombel_tingkat', 11)
                    ->first();

                if ($data) {
                    return $data->tahun_ajaran . "<br><span class='badge bg-warning'>" . $data->rombel_nama . "</span>";
                }

                return '-';
            })
            ->addColumn('tingkat_12', function ($row) {
                $data = PesertaDidikRombel::where('nis', $row->nis)
                    ->where('rombel_tingkat', 12)
                    ->first();

                if ($data) {
                    return $data->tahun_ajaran . "<br><span class='badge bg-danger'>" . $data->rombel_nama . "</span>";
                }

                return '-';
            })
            ->addColumn('foto', function ($row) {
                $data = PesertaDidik::where('nis', $row->nis)
                    ->first();
                // Menggunakan ImageHelper untuk mendapatkan tag gambar avatar
                // Pastikan kolom 'foto' ada dalam query
                return ImageHelper::getAvatarImageTag(
                    filename: $data->foto,
                    gender: $data->jenis_kelamin,
                    folder: 'peserta_didik',
                    defaultMaleImage: 'siswacowok.png',
                    defaultFemaleImage: 'siswacewek.png',
                    width: 50,
                    class: 'rounded avatar-sm'
                );
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                unset($actions['Detail']);
                unset($actions['Edit']);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['tingkat_10', 'tingkat_11', 'tingkat_12', 'pesertadidik', 'foto', 'action']);
    }

    /**
     * Get the query source of dataTable.
     *
     * @return QueryBuilder<GuruWaliSiswa>
     */
    public function query(GuruWaliSiswa $model): QueryBuilder
    {
        $query = $model->newQuery()
            ->join('personil_sekolahs', 'personil_sekolahs.id_personil', '=', 'guru_wali_siswas.id_personil')
            ->select(
                'guru_wali_siswas.*',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.gelarbelakang'
            )
            ->orderBy('personil_sekolahs.namalengkap', 'asc');

        // filter berdasarkan personal_id jika akses route guru wali
        if (request()->is('guruwali/data-siswa-guruwali*')) {
            $query->where('guru_wali_siswas.id_personil', Auth::user()->personal_id);
        }

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('guruwalisiswa-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => false,
                'pageLength' => 15,
                'paging' => false,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 341px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        $columns = [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('tahunajaran')->addClass('text-center'),
            Column::make('namaguru')->title('Nama Guru'),
            Column::make('pesertadidik')->title('Nama Siswa'),
            Column::make('tingkat_10'),
            Column::make('tingkat_11'),
            Column::make('tingkat_12'),
            Column::make('status')->title('Status'),
            Column::make('foto')->title('Photo'),
        ];

        $user = User::find(Auth::user()->id);

        // Tambahkan kolom action HANYA jika route bukan guruwali/data-siswa-guruwali
        if ($user && $user->hasRole('master') && !request()->is('guruwali/data-siswa-guruwali*')) {
            $columns[] = Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center');
        }

        return $columns;
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'GuruWaliSiswa_' . date('YmdHis');
    }
}
