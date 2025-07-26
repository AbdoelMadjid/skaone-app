<?php

namespace App\DataTables\Kurikulum\DokumenGuru;

use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\Kurikulum\DokumenGuru\PilihArsipGuru;
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

class ArsipNgajarDataTable extends DataTable
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
                $dataExistsFormatif = DB::table('nilai_formatif')
                    ->where('tahunajaran', $row->tahunajaran)
                    ->where('tingkat', $row->tingkat)
                    ->where('ganjilgenap', $row->ganjilgenap)
                    ->where('semester', $row->semester)
                    ->where('kode_rombel', $row->kode_rombel)
                    ->where('kel_mapel', $row->kel_mapel)
                    ->where('id_personil', $row->id_personil)
                    ->exists();
                if (!$dataExistsFormatif) {
                    $CekFormatif = '<i class="bx bx-message-square-x fs-3 text-danger"></i>';
                } else {
                    $CekFormatif = '<i class="bx bx-message-square-check fs-3 text-info"></i>';
                }
                $dataExistsSumatif = DB::table('nilai_sumatif')
                    ->where('tahunajaran', $row->tahunajaran)
                    ->where('tingkat', $row->tingkat)
                    ->where('ganjilgenap', $row->ganjilgenap)
                    ->where('semester', $row->semester)
                    ->where('kode_rombel', $row->kode_rombel)
                    ->where('kel_mapel', $row->kel_mapel)
                    ->where('id_personil', $row->id_personil)
                    ->exists();
                if (!$dataExistsSumatif) {
                    $CekSumatif = '<i class="bx bx-message-square-x fs-3 text-danger"></i>';
                } else {
                    $CekSumatif = '<i class="bx bx-message-square-check fs-3 text-info"></i>';
                }

                return 'Nilai Formatif = ' . $CekFormatif . '<br>Nilai Sumatif = ' . $CekSumatif;
            })
            ->addColumn('namaguru', function ($row) {
                $personilSekolah = DB::table('personil_sekolahs')
                    ->where('id_personil', $row->id_personil)
                    ->select('gelardepan', 'namalengkap', 'gelarbelakang') // Ambil semua field yang diperlukan
                    ->first();

                if ($personilSekolah) {
                    return $personilSekolah->gelardepan . ' ' . $personilSekolah->namalengkap . ', ' . $personilSekolah->gelarbelakang;
                }

                return $row->id_personil . '<em>Data tidak ditemukan</em>';
            })
            ->addColumn('actionformatif', function ($row) {
                $jumlahTP = DB::table('tujuan_pembelajarans')
                    ->where('kode_rombel', $row->kode_rombel)
                    ->where('kel_mapel', $row->kel_mapel)
                    ->where('tahunajaran', $row->tahunajaran)
                    ->where('ganjilgenap', $row->ganjilgenap)
                    ->count();

                $dataExists = DB::table('nilai_formatif')
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
                                <li><a class="dropdown-item" href="' . route('kurikulum.dokumenguru.arsip-gurumapel.formatif.createNilai', [
                            'kode_rombel' => $row->kode_rombel,
                            'kel_mapel' => $row->kel_mapel,
                            'id_personil' => $row->id_personil,
                            'tahunajaran' => $row->tahunajaran,
                            'ganjilgenap' => $row->ganjilgenap,
                        ]) . '"><i class="bx bx-edit-alt"></i> Create</a></li>
                        <li><a href="' . route('kurikulum.dokumenguru.exportformatif', ['kode_rombel' => $row->kode_rombel, 'kel_mapel' => $row->kel_mapel, 'id_personil' => $row->id_personil, 'tahunajaran' => $row->tahunajaran, 'ganjilgenap' => $row->ganjilgenap]) . '"
                                        class="dropdown-item btn btn-soft-primary" tittle="Download Format Nilai Formatif"><i class="bx bx-download"></i> Download</a></li>
                                        <li>
                                        <button class="dropdown-item btn btn-soft-success"
                                                data-bs-toggle="modal"
                                                data-bs-target="#modalUploadFormatif"
                                                data-kode-rombel="' . $row->kode_rombel . '"
                                                data-rombel="' . $row->rombel . '"
                                                data-kel-mapel="' . $row->kel_mapel . '"
                                                data-nama-mapel="' . $row->mata_pelajaran . '"
                                                data-id-personil="' . $row->id_personil . '"
                                                data-gelar-depan="' . $row->gelardepan . '"
                                                data-nama-lengkap="' . $row->namalengkap . '"
                                                data-gelar-belakang="' . $row->gelarbelakang . '"
                                                title="Upload Nilai Formatif">
                                            <i class="bx bx-upload"></i> Upload
                                        </button>
                                        </li>
                            </ul>
                        </div>';
                    } else {
                        $tombol = '
                        <div class="btn-group dropstart">
                            <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"
                                class="btn btn-soft-primary btn-icon fs-14"><i class="ri-more-2-fill"></i></button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                <li><a class="dropdown-item" href="' . route('kurikulum.dokumenguru.arsip-gurumapel.formatif.editNilai', [
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
            ->addColumn('actionsumatif', function ($row) {
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
                                <li><a class="dropdown-item" href="' . route('kurikulum.dokumenguru.arsip-gurumapel.sumatif.createNilai', [
                            'kode_rombel' => $row->kode_rombel,
                            'kel_mapel' => $row->kel_mapel,
                            'id_personil' => $row->id_personil,
                            'tahunajaran' => $row->tahunajaran,
                            'ganjilgenap' => $row->ganjilgenap,
                        ]) . '"><i class="bx bx-edit-alt"></i> Create</a></li>
                        <li><a href="' . route('kurikulum.dokumenguru.exportsumatif', ['kode_rombel' => $row->kode_rombel, 'kel_mapel' => $row->kel_mapel, 'id_personil' => $row->id_personil, 'tahunajaran' => $row->tahunajaran, 'ganjilgenap' => $row->ganjilgenap]) . '""
                                        class="dropdown-item btn btn-soft-primary" tittle="Download Format Nilai Sumatif">
                                        <i class="bx bx-download"></i> Download</a></li>
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
                                <li><a class="dropdown-item" href="' . route('kurikulum.dokumenguru.arsip-gurumapel.sumatif.editNilai', [
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
            ->rawColumns(['namaguru', 'cek_sudahbelum', 'actionformatif', 'actionsumatif']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(KbmPerRombel $model): QueryBuilder
    {
        $user = Auth::user();
        $personal_id = $user->personal_id;

        $dataPilGuru = PilihArsipGuru::where('id_personil', $personal_id)->first();

        $query = $model->newQuery();

        // Filter jika valid
        $query->where('tahunajaran', $dataPilGuru->tahunajaran)
            ->where('ganjilgenap', $dataPilGuru->ganjilgenap)
            ->where('id_personil', $dataPilGuru->id_guru)
        ;

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('arsipngajar-table')
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
                'scrollY' => "calc(100vh - 386px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('tahunajaran')->title('Tahun Ajaran'),
            Column::make('ganjilgenap')->title('Semester'),
            Column::make('rombel')->title('Rombel')->addClass('text-center')->width(75),
            Column::make('mata_pelajaran')->title('Nama Mapel'),
            Column::make('namaguru')->title('Guru Mapel'),
            Column::make('cek_sudahbelum')->title('Cek Formatif')->width(150),
            Column::computed('actionformatif')
                ->exportable(false)
                ->printable(false)
                ->title('Formatif')
                ->width(60)
                ->addClass('text-center'),
            Column::computed('actionsumatif')
                ->exportable(false)
                ->printable(false)
                ->title('Sumatif')
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'ArsipNgajar_' . date('YmdHis');
    }
}
