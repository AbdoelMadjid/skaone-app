<?php

namespace App\DataTables\Pkl\PesertaDidikPkl;

use App\Models\Pkl\PesertaDidikPkl\JurnalPkl;
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

class JurnalSiswaDataTable extends DataTable
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
            ->addColumn('gambar', function ($row) {
                // Tentukan path default berdasarkan jenis kelamin
                $defaultPhotoPath = asset('images/noimagejurnal.jpg');

                // Tentukan path foto dari database
                $imagePath = base_path('images/jurnal-2024-2025/' . $row->gambar);
                $gamabrPath = '';

                // Cek apakah file foto ada di folder 'images/personil'
                if ($row->gambar && file_exists($imagePath)) {
                    $gamabrPath = asset('images/jurnal-2024-2025/' . $row->gambar);
                } else {
                    // Jika file tidak ditemukan, gunakan foto default berdasarkan jenis kelamin
                    $gamabrPath = $defaultPhotoPath;
                }

                // Mengembalikan tag img dengan path gambar
                return '<img src="' . $gamabrPath . '" alt="Foto" width="250" />';
            })
            ->addColumn('jurnal_siswa', function ($row) {

                $tglKirim = Carbon::parse($row->tanggal_kirim)
                    ->locale('id') // Mengatur bahasa ke Indonesia
                    ->translatedFormat('l, d F Y');

                // Ambil data `element` dari tabel `capaian_pembelajarans` berdasarkan `kode_cp`
                $element = DB::table('capaian_pembelajarans')
                    ->where('kode_cp', $row->element)
                    ->value('element'); // Ambil hanya kolom element

                $isiTp = DB::table('modul_ajars')
                    ->where('id', $row->id_tp)
                    ->value('isi_tp'); // Ambil hanya kolom isi_tp

                $IsiKomentar = "";
                if ($row->validasi === "Tolak") {
                    $IsiKomentar = '
                    <br><br><strong>Komentar Guru PKL :</strong> <br><span class="text-info"><strong>' . $row->komentar . '</strong></span><br><br><br>';
                }

                return
                    '<strong>ID Jurnal :</strong> <br>' . $row->id .
                    '<br><br><strong>Tgl Kirim:</strong> <br>' . $tglKirim .
                    '<br><br><strong>ELement:</strong> <br>' . $element .
                    '<br><br><strong>Tujuan Pembelajaran:</strong> <br>' . $isiTp .
                    '<br><br><strong>Keterangan:</strong> <br>' . $row->keterangan .
                    $IsiKomentar;
            })
            ->addColumn('validasi', function ($row) {
                if ($row->validasi === "Belum") {
                    $badgevalidasi = "<h5><span class='badge bg-danger'>Belum di Validasi</span></h5>";
                } else if ($row->validasi === "Sudah") {
                    $badgevalidasi = "<h5><span class='badge bg-primary'>DI TERIMA</span></h5>";
                } else {
                    $badgevalidasi = "<h5><span class='badge badge-gradient-warning'>Di tolak</span></h5><span class=' badge badge-warning fs-10 text-danger'>Silakan cek Komentar Guru PKL</span>";
                }

                return $badgevalidasi;
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                unset($actions['Delete']);
                //unset($actions['Edit']);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['jurnal_siswa',  'validasi', 'gambar', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(JurnalPkl $model): QueryBuilder
    {
        $nis = auth()->user()->nis; // Ambil NIS dari user yang sedang login

        return $model->newQuery()
            ->select('jurnal_pkls.*', 'peserta_didiks.nama_lengkap', 'peserta_didik_rombels.rombel_nama', 'perusahaans.nama')
            ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->join('pembimbing_prakerins', 'penempatan_prakerins.id', '=', 'pembimbing_prakerins.id_penempatan')
            ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->join('kompetensi_keahlians', 'penempatan_prakerins.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->where('penempatan_prakerins.nis', $nis);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('jurnalsiswa-table')
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
            Column::make('jurnal_siswa')->title('Jurnal')->width('60%'),
            Column::make('gambar')->title('Gambar')->addClass('text-center'),
            Column::make('validasi')->title('Validasi')->addClass('text-center'),
            /*  Column::computed('action')
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
        return 'JurnalSiswa_' . date('YmdHis');
    }
}
