<?php

namespace App\DataTables\Pkl\AdministratorPkl;

use App\Models\Pkl\AdministratorPkl\PembimbingPrakerin;
use App\Models\Pkl\AdministratorPkl\PenempatanPrakerin;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\User;
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

class PembimbingPrakerinDataTable extends DataTable
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
            ->addColumn('guru', function ($row) {
                return $row->guru; // Nama pembimbing
            })
            ->addColumn('jumlah_siswa', function ($row) {
                // Hitung jumlah siswa berdasarkan id_personil
                $jumlahSiswa = DB::table('pembimbing_prakerins')
                    ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
                    ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
                    ->where('pembimbing_prakerins.id_personil', $row->id_personil)
                    ->count();

                return $jumlahSiswa; // Mengembalikan jumlah siswa
            })
            ->addColumn('siswa', function ($row) {
                // Ambil data siswa berdasarkan id_personil
                $penempatans = DB::table('pembimbing_prakerins')
                    ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
                    ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
                    ->join('peserta_didik_rombels', 'penempatan_prakerins.nis', '=', 'peserta_didik_rombels.nis')
                    ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
                    ->where('pembimbing_prakerins.id_personil', $row->id_personil)
                    ->get([
                        'penempatan_prakerins.nis',
                        'peserta_didiks.nama_lengkap',
                        'peserta_didik_rombels.rombel_nama',
                        'penempatan_prakerins.kode_kk',
                        'perusahaans.nama',
                        'pembimbing_prakerins.id',
                        'perusahaans.id as idpersh',
                        'penempatan_prakerins.id as idpenemp'
                    ]);

                // Jika tidak ada data siswa, kembalikan teks default
                if ($penempatans->isEmpty()) {
                    return 'Siswa belum ada yang ditempatkan';
                }

                // Bangun daftar siswa dalam format <ul><li>
                $nisList = '<ol>';
                foreach ($penempatans as $penempatan) {
                    $deleteButton = '';
                    $user = User::find(Auth::user()->id);

                    // Tampilkan tombol delete hanya untuk role tertentu
                    if ($user->hasAnyRole(['master', 'kaproditkj', 'kaprodirpl', 'kaprodibd', 'kaprodimp', 'kaprodiak'])) {
                        $deleteButton = "<button class='btn btn-soft-danger btn-sm delete-siswa'
                        data-id='{$penempatan->id}'
                        onclick='confirmDelete({$penempatan->id})'><i
                        class='ri-delete-bin-2-line'></i></button>";
                    }

                    // Tentukan warna badge berdasarkan kode_kk
                    $badgetype = match ($penempatan->kode_kk) {
                        '421' => 'warning',
                        '411' => 'danger',
                        '811' => 'info',
                        '821' => 'success',
                        '833' => 'secondary',
                        default => 'primary',
                    };

                    $nisList .= "<li>
                        [{$penempatan->id}-{$penempatan->idpenemp}] {$penempatan->nis} -
                        <strong><span class='text-$badgetype'>{$penempatan->nama_lengkap}</span></strong> -
                        <span class='badge bg-$badgetype'>{$penempatan->rombel_nama}</span>
                        $deleteButton
                        <br>
                        <i class='text-muted'>({$penempatan->idpersh}) {$penempatan->nama}</i>
                    </li>";
                }
                $nisList .= '</ol>';

                return $nisList;
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->rawColumns(['siswa', 'action'])
            ->addIndexColumn();
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(PembimbingPrakerin $model): QueryBuilder
    {
        return $model->newQuery()
            ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')
            ->select('pembimbing_prakerins.id_personil', 'personil_sekolahs.namalengkap as guru')
            ->distinct() // Pastikan hanya satu entri per guru
            ->orderBy('pembimbing_prakerins.id_personil');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('pembimbingprakerin-table')
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
            Column::make('guru')->title('Pembimbing'),
            Column::make('jumlah_siswa')->title('Jumlah Siswa')->addClass('text-center'),
            Column::make('siswa')->title('Daftar Siswa')
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
        return 'PembimbingPrakerin_' . date('YmdHis');
    }
}
