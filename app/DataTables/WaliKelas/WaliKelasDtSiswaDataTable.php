<?php

namespace App\DataTables\WaliKelas;

use App\Helpers\ImageHelper;
use App\Models\ManajemenSekolah\PesertaDidik;
use App\Traits\DatatableHelper;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class WaliKelasDtSiswaDataTable extends DataTable
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
            ->addColumn('foto', function ($row) {
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
                return $row->tempat_lahir . ', ' . Carbon::parse($row->tanggal_lahir)
                    ->locale('id') // Mengatur bahasa ke Indonesia
                    ->translatedFormat('d F Y');
            })
            ->addColumn('nis_nisn', function ($row) {
                return $row->nis . '/' . $row->nisn;
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                // Hapus tombol 'Delete' dari actions jika kondisi terpenuhi (misalnya, halaman ini)
                unset($actions['Delete']);
                unset($actions['Detail']);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['foto', 'tempat_tanggal_lahir', 'nis_nisn', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(): QueryBuilder
    {
        $user = auth()->user(); // Mendapatkan user yang sedang login
        $waliKelasId = $user->personal_id; // Asumsikan personal_id ada di model User

        $activeTahunAjaran = DB::table('tahun_ajarans')->where('status', 'Aktif')->first();

        if (!$activeTahunAjaran) {
            // Bisa tampilkan pesan bahwa tahun ajaran aktif tidak ditemukan
            abort(404, 'Tahun ajaran aktif tidak ditemukan.');
        }

        $user = auth()->user(); // Mendapatkan user yang sedang login
        $waliKelasId = $user->personal_id; // Asumsikan personal_id ada di model User

        // Query untuk mendapatkan data siswa dari tabel peserta_didiks
        return PesertaDidik::query()
            ->select([
                'peserta_didiks.id as id', // ID siswa dari tabel peserta_didiks
                'peserta_didiks.nis', // NIS siswa
                'peserta_didiks.jenis_kelamin', // NIS siswa
                'peserta_didiks.nisn', // NIS siswa
                'peserta_didiks.tempat_lahir', // NIS siswa
                'peserta_didiks.tanggal_lahir', // NIS siswa
                'peserta_didiks.foto', // NIS siswa
                'peserta_didiks.nama_lengkap as nama_siswa', // Nama siswa
                'wali_kelas.tahunajaran', // Tahun ajaran
                'wali_kelas.rombel', // Rombel
                'wali_kelas.kode_rombel', // Kode rombel
                DB::raw('CONCAT(wali_kelas.wali_kelas, " - ", personil_sekolahs.namalengkap) as nama_walikelas') // Nama wali kelas
            ])
            ->join('peserta_didik_rombels', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis') // Join dengan tabel peserta_didik_rombels
            ->join('wali_kelas', 'peserta_didik_rombels.rombel_kode', '=', 'wali_kelas.kode_rombel') // Join dengan tabel wali_kelas
            ->join('personil_sekolahs', 'wali_kelas.wali_kelas', '=', 'personil_sekolahs.id_personil') // Join untuk mendapatkan nama wali kelas
            ->join('tahun_ajarans', 'wali_kelas.tahunajaran', '=', 'tahun_ajarans.tahunajaran') // Join ke tabel tahun_ajarans
            ->where('wali_kelas.wali_kelas', $waliKelasId) // Filter berdasarkan wali kelas yang login
            ->where('tahun_ajarans.status', 'Aktif'); // Filter berdasarkan tahun ajaran yang aktif
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('walikelasdtsiswa-table')
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
                'scrollY' => "calc(100vh - 341px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('nis_nisn')->title('NIS / NISN')->addClass('text-center'),
            Column::make('nama_siswa')->title('Nama Siswa'), // Kolom Nama Siswa
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
        return 'WaliKelasDtSiswa_' . date('YmdHis');
    }
}
