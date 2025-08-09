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
                // Ambil data `element` dari tabel `capaian_pembelajarans` berdasarkan `kode_cp`
                $idenPerusahaan = '<strong>' . $row->perusahaan_nama . '</strong><br> Alamat : ' .  $row->perusahaan_alamat;

                return $identitas_pesertaPrakerin . '<br><br> Tempat Prakerin <br>' . $idenPerusahaan;
            })
            ->addColumn('absensi', function ($row) {
                $absensiBulanan = DB::table('absensi_siswa_pkls')
                    ->select(
                        DB::raw('YEAR(tanggal) as tahun'),
                        DB::raw('MONTH(tanggal) as bulan'),
                        DB::raw("SUM(CASE WHEN status = 'HADIR' THEN 1 ELSE 0 END) as jumlah_hadir"),
                        DB::raw("SUM(CASE WHEN status = 'SAKIT' THEN 1 ELSE 0 END) as jumlah_sakit"),
                        DB::raw("SUM(CASE WHEN status = 'IZIN' THEN 1 ELSE 0 END) as jumlah_izin"),
                        DB::raw("SUM(CASE WHEN status = 'ALFA' THEN 1 ELSE 0 END) as jumlah_alfa")
                    )
                    ->where('nis', $row->nis) // Filter berdasarkan NIS siswa
                    ->groupBy(DB::raw('YEAR(tanggal), MONTH(tanggal)'))
                    ->orderBy(DB::raw('YEAR(tanggal)'))
                    ->orderBy(DB::raw('MONTH(tanggal)'))
                    ->get();

                // Mulai tabel HTML
                $absensiBulan = '<table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Bulan</th>
                            <th>Hadir</th>
                            <th>Sakit</th>
                            <th>Izin</th>
                            <th>Alfa</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>';

                // Iterasi data untuk setiap bulan
                foreach ($absensiBulanan as $index => $absensi) {
                    $bulanNama = \Carbon\Carbon::create($absensi->tahun, $absensi->bulan)->locale('id')->translatedFormat('F Y');
                    $totalAbsensi = $absensi->jumlah_sakit + $absensi->jumlah_izin + $absensi->jumlah_alfa;

                    $absensiBulan .= '<tr>
                        <td align="center">' . ($index + 1) . '</td>
                        <td>' . $bulanNama . '</td>
                        <td align="center">' . $absensi->jumlah_hadir . '</td>
                        <td align="center">' . $absensi->jumlah_sakit . '</td>
                        <td align="center">' . $absensi->jumlah_izin . '</td>
                        <td align="center">' . $absensi->jumlah_alfa . '</td>
                        <td align="center">' . $totalAbsensi . '</td>
                    </tr>';
                }

                // Akhiri tabel HTML
                $absensiBulan .= '</tbody></table>';

                // Kembalikan tabel HTML sebagai hasil kolom
                return $absensiBulan;
            })
            ->addColumn('rekap_jurnal', function ($row) {
                $rekapJurnal = DB::table('jurnal_pkls')
                    ->select(
                        DB::raw('YEAR(tanggal_kirim) as tahun'),
                        DB::raw('MONTH(tanggal_kirim) as bulan'),
                        DB::raw('COUNT(CASE WHEN validasi = "sudah" THEN 1 END) as sudah'),
                        DB::raw('COUNT(CASE WHEN validasi = "belum" THEN 1 END) as belum'),
                        DB::raw('COUNT(CASE WHEN validasi = "tolak" THEN 1 END) as tolak') // Menambahkan kolom tolak
                    )
                    ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
                    ->where('penempatan_prakerins.nis', $row->nis)
                    ->groupBy(DB::raw('YEAR(tanggal_kirim), MONTH(tanggal_kirim)'))
                    ->orderBy(DB::raw('YEAR(tanggal_kirim)'))
                    ->orderBy(DB::raw('MONTH(tanggal_kirim)'))
                    ->get();

                // Mulai HTML untuk tabel
                $tampilJurnalPerBulan = '';
                $no = 1;  // Inisialisasi nomor urut

                foreach ($rekapJurnal as $jurnal) {
                    $bulanTahun = \Carbon\Carbon::create($jurnal->tahun, $jurnal->bulan)->locale('id')->translatedFormat('F Y');
                    $totalJurnal = $jurnal->sudah + $jurnal->belum;

                    $tampilJurnalPerBulan .= '
                    <tr>
                        <td align="center">' . ($no++) . '</td>
                        <td>' . \Carbon\Carbon::create()->month($jurnal->bulan)->locale('id')->monthName . ' ' . $jurnal->tahun . '</td>
                        <td align="center">' . $jurnal->sudah . '</td>
                        <td align="center">' . $jurnal->belum . '</td>
                        <td align="center">' . $jurnal->tolak . '</td>
                        <td align="center">' . ($jurnal->sudah + $jurnal->belum) . '</td>
                    </tr>';
                }

                // Akhiri tabel dan kembalikan
                $tampilJurnalPerBulan = '
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Bulan</th>
                            <th>Sudah</th>
                            <th>Belum</th>
                            <th>Tolak</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        ' . $tampilJurnalPerBulan . '
                    </tbody>
                </table>';

                // Jika tidak ada data jurnal, tampilkan pesan
                return $tampilJurnalPerBulan ?: '<p class="text-muted">Tidak ada data jurnal</p>';
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
                'rekap_jurnal',
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
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(25),
            Column::make('identitas_peserta')->title('Identitas Peserta')->width(200),
            Column::make('absensi')->title('Absensi')->width(250),
            Column::make('rekap_jurnal')->title('Jurnal')->width(150),
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
