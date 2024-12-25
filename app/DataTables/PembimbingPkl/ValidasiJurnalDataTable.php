<?php

namespace App\DataTables\PembimbingPkl;

use App\Models\PembimbingPkl\ValidasiJurnal;
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

class ValidasiJurnalDataTable extends DataTable
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
                return '<img src="' . $gamabrPath . '" alt="Foto" width="200" />';
            })
            ->addColumn('jurnal_siswa', function ($row) {
                $tglkirim = Carbon::parse($row->tanggal_kirim)
                    ->locale('id') // Mengatur bahasa ke Indonesia
                    ->translatedFormat('l, d F Y');
                // Ambil data `element` dari tabel `capaian_pembelajarans` berdasarkan `kode_cp`
                $element = DB::table('capaian_pembelajarans')
                    ->where('kode_cp', $row->element)
                    ->value('element'); // Ambil hanya kolom element

                $isiTp = DB::table('modul_ajars')
                    ->where('id', $row->id_tp)
                    ->value('isi_tp'); // Ambil hanya kolom isi_tp

                return
                    '<strong>Tamggal:</strong> <br>' . $tglkirim .
                    '<br><br><strong>ELement:</strong> <br>' . $element .
                    '<br><br><strong>Tujuan Pembelajaran:</strong> <br>' . $isiTp .
                    '<br><br><strong>Keterangan:</strong> <br>' . $row->keterangan;
            })
            ->addColumn('identitas_peserta', function ($row) {
                // Ambil data `element` dari tabel `capaian_pembelajarans` berdasarkan `kode_cp`
                $identitas_pesertaPrakerin = $row->nama_lengkap . ' [' .  $row->rombel_nama . ']<br>' . $row->nama;

                return $identitas_pesertaPrakerin;
            })
            ->addColumn('validasi', function ($row) {
                if ($row->validasi === "Belum") {
                    $badgevalidasi = "<span class='badge bg-danger'>Belum</span>";
                } else {
                    // Jika file tidak ditemukan, gunakan foto default berdasarkan jenis kelamin
                    $badgevalidasi = "<span class='badge bg-primary'>Sudah</span>";;
                }

                return $badgevalidasi;
            })
            /* ->addColumn('validasi', function ($row) {
                $checked = $row->validasi === 'Sudah' ? 'checked' : '';
                return "
                    <div class='form-check form-switch'>
                        <input
                            type='checkbox'
                            class='form-check-input'
                            id='validasiSwitch-{$row->id}'
                            $checked
                            onchange='saveValidasi(this, {$row->id})'>
                    </div>";
            }) */
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                unset($actions['Edit']);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['jurnal_siswa', 'identitas_peserta', 'validasi', 'gambar', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(ValidasiJurnal $model): QueryBuilder
    {
        $id_personil = auth()->user()->personal_id; // Ambil NIS dari user yang sedang login

        $query = $model->newQuery()
            ->select('jurnal_pkls.*', 'peserta_didiks.nama_lengkap', 'peserta_didik_rombels.rombel_nama', 'perusahaans.nama')
            ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->join('pembimbing_prakerins', 'penempatan_prakerins.id', '=', 'pembimbing_prakerins.id_penempatan')
            ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->join('kompetensi_keahlians', 'penempatan_prakerins.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->where('pembimbing_prakerins.id_personil', $id_personil);

        if (request()->has('idpenempatan') && request('idpenempatan') != 'all') {
            $query->where('jurnal_pkls.id_penempatan', request('idpenempatan'));
        }

        if (request()->has('validasi') && request('validasi') != 'all') {
            $query->where('jurnal_pkls.validasi', request('validasi'));
        }

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('validasijurnal-table')
            ->columns($this->getColumns())
            ->ajax([
                'data' => 'function(d) {
                    d.idpenempatan = $("#idPenempatan").val();
                    d.validasi = $("#idvalidasi").val();
                }',
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
                'pageLength' => 80,       // Menampilkan 50 baris per halaman
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(50),
            Column::make('identitas_peserta')->title('Identitas Peserta Prakerin'),
            Column::make('jurnal_siswa')->title('Jurnal Siswa')->width(300),
            Column::make('gambar')->title('Gambar'),
            Column::make('validasi')->title('Validasi'),
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
        return 'ValidasiJurnal_' . date('YmdHis');
    }
}
