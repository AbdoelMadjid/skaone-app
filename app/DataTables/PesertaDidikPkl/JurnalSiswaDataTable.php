<?php

namespace App\DataTables\PesertaDidikPkl;

use App\Models\PesertaDidikPkl\JurnalPkl;
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
                $imagePath = base_path('images/jurnal-pkl/' . $row->gambar);
                $gamabrPath = '';

                // Cek apakah file foto ada di folder 'images/personil'
                if ($row->gambar && file_exists($imagePath)) {
                    $gamabrPath = asset('images/jurnal-pkl/' . $row->gambar);
                } else {
                    // Jika file tidak ditemukan, gunakan foto default berdasarkan jenis kelamin
                    $gamabrPath = $defaultPhotoPath;
                }

                // Mengembalikan tag img dengan path gambar
                return '<img src="' . $gamabrPath . '" alt="Foto" width="250" />';
            })
            ->addColumn('tanggal_kirim', function ($row) {
                return Carbon::parse($row->tanggal_kirim)
                    ->locale('id') // Mengatur bahasa ke Indonesia
                    ->translatedFormat('d F Y');
            })
            ->addColumn('element', function ($row) {
                // Ambil data `element` dari tabel `capaian_pembelajarans` berdasarkan `kode_cp`
                $element = DB::table('capaian_pembelajarans')
                    ->where('kode_cp', $row->element)
                    ->value('element'); // Ambil hanya kolom element

                $isiTp = DB::table('modul_ajars')
                    ->where('id', $row->id_tp)
                    ->value('isi_tp'); // Ambil hanya kolom isi_tp

                return '<strong>ELement:</strong> <br>' . $element . '<br><br><strong>Tujuan Pembelajaran:</strong> <br>' . $isiTp;
            })
            ->addColumn('validasi', function ($row) {
                if ($row->validasi === "Belum") {
                    $badgevalidasi = "<h3><span class='badge bg-danger'>not yet validated</span></h3>";
                } else {
                    // Jika file tidak ditemukan, gunakan foto default berdasarkan jenis kelamin
                    $badgevalidasi = "<h3><span class='badge bg-primary'>has been validated</span></h3>";
                }

                return $badgevalidasi;
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                unset($actions['Delete']);
                unset($actions['Edit']);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['tanggal_kirim', 'element',  'validasi', 'gambar', 'action']);
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
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('tanggal_kirim')->title('Tgl Kirim'),
            Column::make('element')->title('Element & Tujuan Pembelajaran')->width(300),
            Column::make('keterangan')->title('Keterangan'),
            Column::make('gambar')->title('Gambar'),
            Column::make('validasi')->title('Validasi'),
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
        return 'JurnalSiswa_' . date('YmdHis');
    }
}
