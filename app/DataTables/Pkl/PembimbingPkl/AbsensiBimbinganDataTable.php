<?php

namespace App\DataTables\Pkl\PembimbingPkl;

use App\Models\Pkl\AdministratorPkl\PembimbingPrakerin;
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

class AbsensiBimbinganDataTable extends DataTable
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
            ->addColumn('identitas_peserta', function ($row) {
                // Ambil data `element` dari tabel `capaian_pembelajarans` berdasarkan `kode_cp`
                $identitas_pesertaPrakerin = '<strong>' . $row->nama_lengkap . '</strong>
                <br> NIS : ' .  $row->nis . '<br> Kelas : ' .  $row->rombel_nama . '<br><br><strong>Tempat Prakerin :</strong><br><span class="text-info">' . $row->nama_perusahaan . '</span>';

                return $identitas_pesertaPrakerin;
            })
            ->addColumn('absensi', function ($row) {
                $absensiBulan = '
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-info align-middle me-2"></i>
                            <strong>HADIR:</strong>
                        </p>
                        <div>
                            <span
                                class="text-info fw-medium fs-12">' . $row->hadir . '
                                Hari</span>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-primary align-middle me-2"></i>
                            <strong>IZIN:</strong>
                        </p>
                        <div>
                            <span
                                class="text-primary fw-medium fs-12">' . $row->izin . '
                                Hari</span>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                            <strong>SAKIT:</strong>
                        </p>
                        <div>
                            <span
                                class="text-success fw-medium fs-12">' . $row->sakit . '
                                Hari</span>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-danger align-middle me-2"></i>
                            <strong>ALFA:</strong>
                        </p>
                        <div>
                            <span
                                class="text-danger fw-medium fs-12">' . $row->alfa . '
                                Hari</span>
                        </div>
                    </div>
                    <br>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-secondary align-middle me-2"></i>
                            <strong>ABSENSI:</strong>
                        </p>
                        <div>
                            <span
                                class="text-secondary fw-medium fs-12">' . ($row->sakit + $row->izin + $row->alfa) . '
                                Hari</span>
                        </div>
                    </div>
                    ';

                return $absensiBulan;
            })
            // Menambahkan kolom untuk rekapitulasi per bulan
            ->addColumn('rekap_desember', function ($row) {
                $absensi_bulanan = DB::table('absensi_siswa_pkls')
                    ->select(
                        DB::raw("SUM(CASE WHEN status = 'HADIR' THEN 1 ELSE 0 END) as jumlah_hadir"),
                        DB::raw("SUM(CASE WHEN status = 'SAKIT' THEN 1 ELSE 0 END) as jumlah_sakit"),
                        DB::raw("SUM(CASE WHEN status = 'IZIN' THEN 1 ELSE 0 END) as jumlah_izin"),
                        DB::raw("SUM(CASE WHEN status = 'ALFA' THEN 1 ELSE 0 END) as jumlah_alfa")
                    )
                    ->where('nis', $row->nis)
                    ->whereMonth('tanggal', 12) // Bulan Desember
                    ->whereYear('tanggal', 2024) // Tahun 2024
                    ->first();

                $absensiBulan = '
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-info align-middle me-2"></i>
                            <strong>HADIR:</strong>
                        </p>
                        <div>
                            <span
                                class="text-info fw-medium fs-12">' . $absensi_bulanan->jumlah_hadir . '
                                Hari</span>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-primary align-middle me-2"></i>
                            <strong>IZIN:</strong>
                        </p>
                        <div>
                            <span
                                class="text-primary fw-medium fs-12">' . $absensi_bulanan->jumlah_izin . '
                                Hari</span>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                            <strong>SAKIT:</strong>
                        </p>
                        <div>
                            <span
                                class="text-success fw-medium fs-12">' . $absensi_bulanan->jumlah_sakit . '
                                Hari</span>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-danger align-middle me-2"></i>
                            <strong>ALFA:</strong>
                        </p>
                        <div>
                            <span
                                class="text-danger fw-medium fs-12">' . $absensi_bulanan->jumlah_alfa . '
                                Hari</span>
                        </div>
                    </div>
                    <br>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-secondary align-middle me-2"></i>
                            <strong>ABSENSI:</strong>
                        </p>
                        <div>
                            <span
                                class="text-secondary fw-medium fs-12">' . ($absensi_bulanan->jumlah_izin + $absensi_bulanan->jumlah_sakit + $absensi_bulanan->jumlah_alfa) . '
                                Hari</span>
                        </div>
                    </div>
                    ';

                return $absensiBulan;
            })
            ->addColumn('rekap_januari', function ($row) {
                $absensi_bulanan = DB::table('absensi_siswa_pkls')
                    ->select(
                        DB::raw("SUM(CASE WHEN status = 'HADIR' THEN 1 ELSE 0 END) as jumlah_hadir"),
                        DB::raw("SUM(CASE WHEN status = 'SAKIT' THEN 1 ELSE 0 END) as jumlah_sakit"),
                        DB::raw("SUM(CASE WHEN status = 'IZIN' THEN 1 ELSE 0 END) as jumlah_izin"),
                        DB::raw("SUM(CASE WHEN status = 'ALFA' THEN 1 ELSE 0 END) as jumlah_alfa")
                    )
                    ->where('nis', $row->nis)
                    ->whereMonth('tanggal', 1) // Bulan Januari
                    ->whereYear('tanggal', 2025) // Tahun 2025
                    ->first();

                $absensiBulan = '
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-info align-middle me-2"></i>
                            <strong>HADIR:</strong>
                        </p>
                        <div>
                            <span
                                class="text-info fw-medium fs-12">' . $absensi_bulanan->jumlah_hadir . '
                                Hari</span>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-primary align-middle me-2"></i>
                            <strong>IZIN:</strong>
                        </p>
                        <div>
                            <span
                                class="text-primary fw-medium fs-12">' . $absensi_bulanan->jumlah_izin . '
                                Hari</span>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                            <strong>SAKIT:</strong>
                        </p>
                        <div>
                            <span
                                class="text-success fw-medium fs-12">' . $absensi_bulanan->jumlah_sakit . '
                                Hari</span>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-danger align-middle me-2"></i>
                            <strong>ALFA:</strong>
                        </p>
                        <div>
                            <span
                                class="text-danger fw-medium fs-12">' . $absensi_bulanan->jumlah_alfa . '
                                Hari</span>
                        </div>
                    </div>
                    <br>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-secondary align-middle me-2"></i>
                            <strong>ABSENSI:</strong>
                        </p>
                        <div>
                            <span
                                class="text-secondary fw-medium fs-12">' . ($absensi_bulanan->jumlah_izin + $absensi_bulanan->jumlah_sakit + $absensi_bulanan->jumlah_alfa) . '
                                Hari</span>
                        </div>
                    </div>
                    ';

                return $absensiBulan;
            })
            ->addColumn('rekap_februari', function ($row) {
                $absensi_bulanan = DB::table('absensi_siswa_pkls')
                    ->select(
                        DB::raw("SUM(CASE WHEN status = 'HADIR' THEN 1 ELSE 0 END) as jumlah_hadir"),
                        DB::raw("SUM(CASE WHEN status = 'SAKIT' THEN 1 ELSE 0 END) as jumlah_sakit"),
                        DB::raw("SUM(CASE WHEN status = 'IZIN' THEN 1 ELSE 0 END) as jumlah_izin"),
                        DB::raw("SUM(CASE WHEN status = 'ALFA' THEN 1 ELSE 0 END) as jumlah_alfa")
                    )
                    ->where('nis', $row->nis)
                    ->whereMonth('tanggal', 2) // Bulan Februari
                    ->whereYear('tanggal', 2025) // Tahun 2025
                    ->first();

                $absensiBulan = '
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-info align-middle me-2"></i>
                            <strong>HADIR:</strong>
                        </p>
                        <div>
                            <span
                                class="text-info fw-medium fs-12">' . $absensi_bulanan->jumlah_hadir . '
                                Hari</span>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-primary align-middle me-2"></i>
                            <strong>IZIN:</strong>
                        </p>
                        <div>
                            <span
                                class="text-primary fw-medium fs-12">' . $absensi_bulanan->jumlah_izin . '
                                Hari</span>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                            <strong>SAKIT:</strong>
                        </p>
                        <div>
                            <span
                                class="text-success fw-medium fs-12">' . $absensi_bulanan->jumlah_sakit . '
                                Hari</span>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-danger align-middle me-2"></i>
                            <strong>ALFA:</strong>
                        </p>
                        <div>
                            <span
                                class="text-danger fw-medium fs-12">' . $absensi_bulanan->jumlah_alfa . '
                                Hari</span>
                        </div>
                    </div>
                    <br>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-secondary align-middle me-2"></i>
                            <strong>ABSENSI:</strong>
                        </p>
                        <div>
                            <span
                                class="text-secondary fw-medium fs-12">' . ($absensi_bulanan->jumlah_izin + $absensi_bulanan->jumlah_sakit + $absensi_bulanan->jumlah_alfa) . '
                                Hari</span>
                        </div>
                    </div>
                    ';

                return $absensiBulan;
            })
            ->addColumn('rekap_maret', function ($row) {
                $absensi_bulanan = DB::table('absensi_siswa_pkls')
                    ->select(
                        DB::raw("SUM(CASE WHEN status = 'HADIR' THEN 1 ELSE 0 END) as jumlah_hadir"),
                        DB::raw("SUM(CASE WHEN status = 'SAKIT' THEN 1 ELSE 0 END) as jumlah_sakit"),
                        DB::raw("SUM(CASE WHEN status = 'IZIN' THEN 1 ELSE 0 END) as jumlah_izin"),
                        DB::raw("SUM(CASE WHEN status = 'ALFA' THEN 1 ELSE 0 END) as jumlah_alfa")
                    )
                    ->where('nis', $row->nis)
                    ->whereMonth('tanggal', 3) // Bulan Maret
                    ->whereYear('tanggal', 2025) // Tahun 2025
                    ->first();

                $absensiBulan = '
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-info align-middle me-2"></i>
                            <strong>HADIR:</strong>
                        </p>
                        <div>
                            <span
                                class="text-info fw-medium fs-12">' . $absensi_bulanan->jumlah_hadir . '
                                Hari</span>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-primary align-middle me-2"></i>
                            <strong>IZIN:</strong>
                        </p>
                        <div>
                            <span
                                class="text-primary fw-medium fs-12">' . $absensi_bulanan->jumlah_izin . '
                                Hari</span>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                            <strong>SAKIT:</strong>
                        </p>
                        <div>
                            <span
                                class="text-success fw-medium fs-12">' . $absensi_bulanan->jumlah_sakit . '
                                Hari</span>
                        </div>
                    </div>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-danger align-middle me-2"></i>
                            <strong>ALFA:</strong>
                        </p>
                        <div>
                            <span
                                class="text-danger fw-medium fs-12">' . $absensi_bulanan->jumlah_alfa . '
                                Hari</span>
                        </div>
                    </div>
                    <br>
                    <div
                        class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-secondary align-middle me-2"></i>
                            <strong>ABSENSI:</strong>
                        </p>
                        <div>
                            <span
                                class="text-secondary fw-medium fs-12">' . ($absensi_bulanan->jumlah_izin + $absensi_bulanan->jumlah_sakit + $absensi_bulanan->jumlah_alfa) . '
                                Hari</span>
                        </div>
                    </div>
                    ';

                return $absensiBulan;
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns([
                'identitas_peserta',
                'absensi',
                'rekap_desember',
                'rekap_januari',
                'rekap_februari',
                'rekap_maret',
                'action'
            ]);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PembimbingPrakerin $model): QueryBuilder
    {
        // Ambil id_personil dari user yang sedang login
        $idPersonil = auth()->user()->personal_id;

        return $model
            ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')
            ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'penempatan_prakerins.nis', '=', 'peserta_didik_rombels.nis')
            ->leftJoin('absensi_siswa_pkls', 'penempatan_prakerins.nis', '=', 'absensi_siswa_pkls.nis')
            ->select(
                'pembimbing_prakerins.id_personil',
                'pembimbing_prakerins.id_penempatan',
                'personil_sekolahs.namalengkap',
                'penempatan_prakerins.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didik_rombels.rombel_nama',
                'penempatan_prakerins.id_dudi',
                'perusahaans.nama as nama_perusahaan',
                DB::raw('SUM(CASE WHEN absensi_siswa_pkls.status = "HADIR" THEN 1 ELSE 0 END) as hadir'),
                DB::raw('SUM(CASE WHEN absensi_siswa_pkls.status = "SAKIT" THEN 1 ELSE 0 END) as sakit'),
                DB::raw('SUM(CASE WHEN absensi_siswa_pkls.status = "IZIN" THEN 1 ELSE 0 END) as izin'),
                DB::raw('SUM(CASE WHEN absensi_siswa_pkls.status = "ALFA" THEN 1 ELSE 0 END) as alfa')
            )
            ->where('pembimbing_prakerins.id_personil', $idPersonil)
            ->groupBy(
                'pembimbing_prakerins.id_personil',
                'pembimbing_prakerins.id_penempatan',
                'personil_sekolahs.namalengkap',
                'penempatan_prakerins.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didik_rombels.rombel_nama',
                'penempatan_prakerins.id_dudi',
                'penempatan_prakerins.id_dudi',
                'perusahaans.nama'
            )
            ->orderBy('peserta_didik_rombels.rombel_nama')
            ->orderBy('penempatan_prakerins.nis');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('absensibimbingan-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => true,
                'pageLength' => 25,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 422px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('identitas_peserta')->title('Identitas Peserta')->width(400),
            Column::make('rekap_desember')->title('Desember')->width(150),
            Column::make('rekap_januari')->title('Januari')->width(150),
            Column::make('rekap_februari')->title('Februari')->width(150),
            Column::make('rekap_maret')->title('Maret')->width(150),
            Column::make('absensi')->title('Total Absensi')->width(150),
            /* Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'), */
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'AbsensiBimbingan_' . date('YmdHis');
    }
}
