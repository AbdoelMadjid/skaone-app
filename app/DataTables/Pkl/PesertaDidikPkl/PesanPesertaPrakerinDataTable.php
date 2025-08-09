<?php

namespace App\DataTables\Pkl\PesertaDidikPkl;

use App\Models\Pkl\AdministratorPkl\PembimbingPrakerin;
use App\Models\Pkl\PembimbingPkl\PesanPrakerin;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PesanPesertaPrakerinDataTable extends DataTable
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
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addColumn('pesan_terkirim', function ($row) {
                // Ambil semua pesan terkirim untuk baris ini berdasarkan id_personil dan nis
                $isipesans = PesanPrakerin::where('sender_id', $row->nis)
                    ->get(['message', 'read_status', 'created_at']);

                // Membuat format HTML <ul><li> untuk setiap nis dan nama_lengkap siswa
                if ($isipesans->isEmpty()) {
                    return 'Tidak ada Pesan';
                }

                $pesanTabel = '<table class="table table-sm">';

                foreach ($isipesans as $item) {
                    if ($item->read_status === "BELUM") {
                        $statusbaca = "<i class='ri-check-double-fill text-muted fs-3'></i>";
                    } else {
                        $statusbaca = "<i class='ri-check-double-fill text-info fs-3'></i>";
                    }
                    $pesanTabel .= '<tr>';
                    $pesanTabel .= '<td>' . $item->created_at->translatedFormat('l, d F Y') . '<br><i class="text-info">"' . htmlspecialchars($item->message) . '"</i></td>';
                    $pesanTabel .= '<td>' . $statusbaca . ' </td>';
                    $pesanTabel .= '</tr>';
                }

                $pesanTabel .= '</tbody></table>';

                // Jika tidak ada pesan
                return $pesanTabel;
            })
            ->addColumn('pesan_diterima', function ($row) {
                // Ambil semua pesan terkirim untuk baris ini berdasarkan id_personil dan nis
                $isipesans = PesanPrakerin::where('receiver_id', $row->nis)
                    ->get(['id', 'message', 'read_status', 'created_at']);

                // Membuat format HTML <ul><li> untuk setiap nis dan nama_lengkap siswa
                if ($isipesans->isEmpty()) {
                    return 'Tidak ada Pesan';
                }

                $pesanTabel = '<table class="table table-sm">';

                foreach ($isipesans as $item) {
                    $pesanTabel .= '<tr>';
                    $pesanTabel .= '<td width="125">' . $item->created_at->translatedFormat('l, d F Y') . '<br>';

                    if ($item->read_status === "BELUM") {
                        // Tampilkan link jika pesan belum dibaca
                        $pesanTabel .= '<a href="#" class="baca-pesan" data-id="' . $item->id . '" data-message="' . htmlspecialchars($item->message) . '"><span class="badge bg-info">Baca Pesan</span></a>';
                    } else {
                        // Tampilkan isi pesan jika sudah dibaca
                        $pesanTabel .= '<i class="text-info">"' . htmlspecialchars($item->message) . '"</i>';
                    }

                    $pesanTabel .= '</td>';
                    $pesanTabel .= '</tr>';
                }

                $pesanTabel .= '</tbody></table>';

                // Jika tidak ada pesan
                return $pesanTabel;
            })
            /*             ->addColumn('peserta_prakerin', function ($row) {
                return $row->nis . '<br>' . $row->nama_lengkap . '<br>' . $row->rombel_nama . '<br>' . $row->perusahaan_nama;
            }) */
            ->addIndexColumn()
            ->rawColumns(['peserta_prakerin', 'pesan_terkirim', 'pesan_diterima', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PembimbingPrakerin $model): QueryBuilder
    {
        // Ambil id_personil dari user yang sedang login
        $nis = auth()->user()->nis;

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
            ->where('penempatan_prakerins.nis', $nis);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pesanpesertaprakerin-table')
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
            /* Column::make('peserta_prakerin')->title('Peserta Prakerin'), */
            Column::make('pesan_terkirim')->title('Pesan Terkirim')->orderable(false)->searchable(false)->width('50%'), // Kolom pesan
            Column::make('pesan_diterima')->title('Pesan Diterima')->orderable(false)->searchable(false)->width('50%'), // Kolom pesan

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
        return 'PesanPesertaPrakerin_' . date('YmdHis');
    }
}
