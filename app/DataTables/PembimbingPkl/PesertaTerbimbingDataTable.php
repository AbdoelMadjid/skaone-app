<?php

namespace App\DataTables\PembimbingPkl;

use App\Models\AdministratorPkl\PembimbingPrakerin;
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

class PesertaTerbimbingDataTable extends DataTable
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
                $identitas_pesertaPrakerin = '<strong>' . $row->nama_lengkap . '</strong><br> Kelas : ' .  $row->rombel_nama;

                return $identitas_pesertaPrakerin;
            })
            ->addColumn('identitas_perusahaan', function ($row) {
                // Ambil data `element` dari tabel `capaian_pembelajarans` berdasarkan `kode_cp`
                $idenPerusahaan = '<strong>' . $row->perusahaan_nama . '</strong><br>
                Alamat : ' .  $row->perusahaan_alamat;

                return $idenPerusahaan;
            })
            ->addColumn('absensi', function ($row) {
                $absensi_total = DB::table('absensi_siswa_pkls')
                    ->select(
                        DB::raw("SUM(CASE WHEN status = 'HADIR' THEN 1 ELSE 0 END) as jumlah_hadir"),
                        DB::raw("SUM(CASE WHEN status = 'SAKIT' THEN 1 ELSE 0 END) as jumlah_sakit"),
                        DB::raw("SUM(CASE WHEN status = 'IZIN' THEN 1 ELSE 0 END) as jumlah_izin"),
                        DB::raw("SUM(CASE WHEN status = 'ALFA' THEN 1 ELSE 0 END) as jumlah_alfa")
                    )
                    ->where('nis', $row->nis)
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
                                class="text-info fw-medium fs-12">' . $absensi_total->jumlah_hadir . '
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
                                class="text-primary fw-medium fs-12">' . $absensi_total->jumlah_izin . '
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
                                class="text-success fw-medium fs-12">' . $absensi_total->jumlah_sakit . '
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
                                class="text-danger fw-medium fs-12">' . $absensi_total->jumlah_alfa . '
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
                                class="text-secondary fw-medium fs-12">' . ($absensi_total->jumlah_izin + $absensi_total->jumlah_sakit + $absensi_total->jumlah_alfa) . '
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
                'identitas_perusahaan',
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
            ->select(
                'penempatan_prakerins.id',
                'penempatan_prakerins.tahunajaran',
                'penempatan_prakerins.kode_kk',
                'kompetensi_keahlians.nama_kk',
                'penempatan_prakerins.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didik_rombels.rombel_nama',
                'penempatan_prakerins.id_dudi',
                'perusahaans.nama as perusahaan_nama',
                'perusahaans.alamat as perusahaan_alamat',
                'pembimbing_prakerins.id_personil',
                'personil_sekolahs.namalengkap as pembimbing_namalengkap'
            )
            ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->join('kompetensi_keahlians', 'penempatan_prakerins.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->where('pembimbing_prakerins.id_personil', $idPersonil);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pesertaterbimbing-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
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
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(25),
            Column::make('identitas_peserta')->title('Identitas Peserta')->width(150),
            Column::make('identitas_perusahaan')->title('Tempat Prakerin')->width(250),
            Column::make('rekap_desember')->title('Desember')->width(150),
            Column::make('rekap_januari')->title('Januari')->width(150),
            Column::make('rekap_februari')->title('Februari')->width(150),
            Column::make('rekap_maret')->title('Maret')->width(150),
            Column::make('absensi')->title('Total')->width(150),
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
        return 'PesertaTerbimbing_' . date('YmdHis');
    }
}
