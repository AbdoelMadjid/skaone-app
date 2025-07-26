<?php

namespace App\DataTables\GuruMapel;

use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\Sumatif;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SumatifDataTable extends DataTable
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
            ->addColumn('cek_sudahbelum', function ($row) {
                $dataExists = DB::table('nilai_sumatif')
                    ->where('tahunajaran', $row->tahunajaran)
                    ->where('tingkat', $row->tingkat)
                    ->where('ganjilgenap', $row->ganjilgenap)
                    ->where('semester', $row->semester)
                    ->where('kode_rombel', $row->kode_rombel)
                    ->where('kel_mapel', $row->kel_mapel)
                    ->where('id_personil', $row->id_personil)
                    ->exists();
                if (!$dataExists) {
                    return '<i class="bx bx-message-square-x fs-3 text-danger"></i>';
                } else {
                    return '<i class="bx bx-message-square-check fs-3 text-info"></i>';
                }
            })
            ->addColumn('jml_siswa', function ($row) {
                $jumlahSiswa = DB::table('peserta_didik_rombels')
                    ->where('rombel_kode', $row->kode_rombel)
                    ->count();

                return $jumlahSiswa;
            })
            ->addColumn('thn_ajaran_semester', function ($row) {

                return $row->tahunajaran . ' / ' . $row->semester;
            })
            ->addColumn('jumlah_cp', function ($row) {
                // Menghitung jumlah siswa berdasarkan rombel_kode dari tabel peserta_didik_rombels
                $JumlahCP = DB::table('capaian_pembelajarans')
                    ->where('inisial_mp', $row->kel_mapel)
                    ->where('tingkat', $row->tingkat)
                    /* ->where('tahunajaran', $row->tahunajaran)
                    ->where('ganjilgenap', $row->ganjilgenap) */
                    ->count();

                $JumlahMA = DB::table('cp_terpilihs')
                    ->where('kode_rombel', $row->kode_rombel)
                    ->where('kel_mapel', $row->kel_mapel)
                    ->where('tahunajaran', $row->tahunajaran)
                    ->where('ganjilgenap', $row->ganjilgenap)
                    ->count();

                $jumlahTP = DB::table('tujuan_pembelajarans')
                    ->where('kode_rombel', $row->kode_rombel)
                    ->where('kel_mapel', $row->kel_mapel)
                    ->where('tahunajaran', $row->tahunajaran)
                    ->where('ganjilgenap', $row->ganjilgenap)
                    ->count();

                return $JumlahCP . ' / ' . $JumlahMA . ' / ' . $jumlahTP;
            })
            ->addColumn('action', function ($row) {
                $jumlahTP = DB::table('tujuan_pembelajarans')
                    ->where('kode_rombel', $row->kode_rombel)
                    ->where('kel_mapel', $row->kel_mapel)
                    ->where('tahunajaran', $row->tahunajaran)
                    ->where('ganjilgenap', $row->ganjilgenap)
                    ->count();

                $dataExists = DB::table('nilai_sumatif')
                    ->where('tahunajaran', $row->tahunajaran)
                    ->where('tingkat', $row->tingkat)
                    ->where('ganjilgenap', $row->ganjilgenap)
                    ->where('semester', $row->semester)
                    ->where('kode_rombel', $row->kode_rombel)
                    ->where('kel_mapel', $row->kel_mapel)
                    ->where('id_personil', $row->id_personil)
                    ->exists();

                if ($jumlahTP > 0) {
                    if (!$dataExists) {
                        $tombol = '
                        <div class="btn-group dropstart">
                            <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"
                                class="btn btn-soft-primary btn-icon fs-14"><i class="ri-more-2-fill"></i></button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <li><a class="dropdown-item" href="' . route('gurumapel.penilaian.sumatif.createNilai', [
                            'kode_rombel' => $row->kode_rombel,
                            'kel_mapel' => $row->kel_mapel,
                            'id_personil' => $row->id_personil,
                            'tahunajaran' => $row->tahunajaran,
                            'ganjilgenap' => $row->ganjilgenap,
                        ]) . '"><i class="bx bx-edit-alt"></i> Create</a></li>
                        <li><a href="' . route('gurumapel.penilaian.exportsumatif', ['kode_rombel' => $row->kode_rombel, 'kel_mapel' => $row->kel_mapel, 'id_personil' => $row->id_personil, 'tahunajaran' => $row->tahunajaran, 'ganjilgenap' => $row->ganjilgenap]) . '""
                                        class="dropdown-item btn btn-soft-primary" tittle="Download Format Nilai Sumatif">
                                        <i class="bx bx-download"></i> Download</a>
                        </li>
                                <li>
                                <button class="dropdown-item btn btn-soft-success" data-bs-toggle="modal"
                                        data-bs-target="#modalUploadSumatif"
                                        data-kode-rombel="' . $row->kode_rombel . '"
                                        data-rombel="' . $row->rombel . '"
                                        data-kel-mapel="' . $row->kel_mapel . '"
                                        data-nama-mapel="' . $row->mata_pelajaran . '"
                                        data-id-personil="' . $row->id_personil . '"
                                        data-gelar-depan="' . $row->gelardepan . '"
                                        data-nama-lengkap="' . $row->namalengkap . '"
                                        data-gelar-belakang="' . $row->gelarbelakang . '"
                                                tittle="Upload Nilai Sumatif">
                                        <i class="bx bx-upload"></i> Upload</button>
                                </li>
                            </ul>
                        </div>';
                    } else {
                        $tombol = '
                        <div class="btn-group dropstart">
                            <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"
                                class="btn btn-soft-primary btn-icon fs-14"><i class="ri-more-2-fill"></i></button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <li><a class="dropdown-item" href="' . route('gurumapel.penilaian.sumatif.editNilai', [
                            'kode_rombel' => $row->kode_rombel,
                            'kel_mapel' => $row->kel_mapel,
                            'id_personil' => $row->id_personil,
                            'tahunajaran' => $row->tahunajaran,
                            'ganjilgenap' => $row->ganjilgenap,
                        ]) . '">Edit</a></li>
                            </ul>
                        </div>';
                    }
                } else {
                    $tombol = '
                        <div class="btn-group dropstart">
                            <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"
                                class="btn btn-soft-primary btn-icon fs-14"><i class="ri-more-2-fill"></i></button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <li><span class="dropdown-item">Anda pingin ngisi nilai? <br>Isi TP dulu bro !!!</span></li>
                            </ul>
                        </div>';
                }

                return $tombol;
            })
            ->addIndexColumn()
            ->rawColumns(['jml_siswa', 'jumlah_cp', 'cek_sudahbelum', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(KbmPerRombel $model): QueryBuilder
    {
        /**
         * @var user $user
         */
        $user = Auth::user();
        $personal_id = $user->personal_id;

        $query = $model->newQuery();

        /* // Cek apakah user memiliki role 'gmapel'
        if ($user->hasRole('gmapel')) {
            // Ambil data berdasarkan id_personil yang sesuai dengan personal_id user yang sedang login
            $query->where('id_personil', $personal_id);
        } */

        // Ambil tahun ajaran dan semester aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = null;

        if ($tahunAjaranAktif) {
            $semesterAktif = Semester::where('status', 'Aktif')
                ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
                ->first();
        }

        // Join dengan tabel PersonilSekolah
        $query->join('personil_sekolahs', 'personil_sekolahs.id_personil', '=', 'kbm_per_rombels.id_personil')
            ->select(
                'kbm_per_rombels.*', // Semua kolom dari tabel kbm_per_rombels
                'personil_sekolahs.gelardepan', // Kolom tambahan dari tabel personil_sekolahs
                'personil_sekolahs.namalengkap', // Kolom tambahan (jika ada) dari tabel personil_sekolahs
                'personil_sekolahs.gelarbelakang',
            )
            ->where('kbm_per_rombels.id_personil', $personal_id)
            ->where('kbm_per_rombels.tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('kbm_per_rombels.ganjilgenap', $semesterAktif->semester);

        return $query; // Mengembalikan query yang tidak akan mengembalikan data
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('sumatif-table')
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
            Column::make('thn_ajaran_semester')->title('Thn Ajaran / Semester')->addClass('text-center'),
            Column::make('rombel')->title('Rombel')->addClass('text-center'),
            Column::make('mata_pelajaran')->title('Nama Mapel'),
            Column::make('jml_siswa')->title('Jumlah Siswa')->addClass('text-center'),
            Column::make('jumlah_cp')->title('CP /  CP Terpilih / TP')->addClass('text-center'),
            Column::make('kkm')->title('KKM')->addClass('text-center'),
            Column::make('cek_sudahbelum')->title('Status Input')->addClass('text-center'),
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
        return 'Sumatif_' . date('YmdHis');
    }
}
