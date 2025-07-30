<?php

namespace App\DataTables\Kurikulum\DataKBM;

use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Traits\DatatableHelper;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class KbmPerRombelDataTable extends DataTable
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
            ->addColumn('semester', function ($row) {
                return $row->ganjilgenap . " <br>Semester " . $row->semester;
            })
            ->addColumn('id_personil', function ($row) {
                // Mengambil semua data guru dari tabel personil_sekolah
                $personils = PersonilSekolah::where('jenispersonil', 'Guru')->get();

                // Membuat array untuk opsi guru
                $options = [];
                foreach ($personils as $personil) {
                    $options[] = [
                        'id' => $personil->id_personil,
                        'text' => $personil->namalengkap,
                        'selected' => $row->id_personil == $personil->id_personil ? true : false
                    ];
                }

                // Menggunakan ID unik untuk setiap select2
                $selectId = 'select2-personil-' . $row->id;

                // Dropdown Select2 dengan data-array
                $select = '<select class="form-control js-example-data-array" id="' . $selectId . '" onchange="updatePersonil(' . $row->id . ', this.value)">';
                $select .= '<option value="">Pilih Guru</option>';  // Placeholder option
                $select .= '</select>';

                // Menginisialisasi Select2 dengan data dari array
                $script = '<script>
                    $(document).ready(function() {
                        var data = ' . json_encode($options) . ';
                        $("#' . $selectId . '").select2({
                            data: data,
                            width: "100%"  // Atur lebar dropdown
                        });
                    });
                </script>';

                return $select . $script; // Kembalikan dropdown dan script sebagai output
            })
            ->addColumn('identitas_rombel', function ($row) {
                return $row->tahunajaran . '<br>' . $row->semester . ' (' . $row->ganjilgenap . ')'; // Menggabungkan nomor_urut dan isi_cp
            })
            ->addColumn('jam_ngajar', function ($row) {
                $currentJam = $row->jumlah_jam ?? null; // Dari hasil join

                $jamNgajarOptions = "<option value='' disabled " . ($currentJam === null ? 'selected' : '') . ">Pilih</option>";

                for ($i = 1; $i <= 15; $i++) {
                    $selected = ($currentJam == $i) ? 'selected' : '';
                    $jamNgajarOptions .= "<option value='{$i}' {$selected}>{$i}</option>";
                }

                $selectId = 'select-jam-' . $row->id;

                $select = "<select class='form-select form-select-sm update-jam' id='{$selectId}' data-id='{$row->id}' onchange='updateJam({$row->id}, this.value)'>";
                $select .= $jamNgajarOptions;
                $select .= '</select>';

                return $select;
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['semester', 'jam_ngajar', 'id_personil', 'action', 'identitas_rombel']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(KbmPerRombel $model): QueryBuilder
    {
        $query = $model->newQuery();

        // Ambil tahun ajaran dan semester aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = null;

        if ($tahunAjaranAktif) {
            $semesterAktif = Semester::where('status', 'Aktif')
                ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
                ->first();
        }

        // Ambil parameter filter dari request
        if (request()->has('search') && !empty(request('search'))) {
            $query->where('mata_pelajaran', 'like', '%' . request('search') . '%');
        }

        // Filter tahun ajaran
        if (request()->has('thAjar') && request('thAjar') != 'all') {
            $query->where('tahunajaran', request('thAjar'));
        } elseif ($tahunAjaranAktif) {
            // Default: pakai tahun ajaran aktif
            $query->where('tahunajaran', $tahunAjaranAktif->tahunajaran);
        }

        // Filter semester
        if (request()->has('seMester') && request('seMester') != 'all') {
            $query->where('ganjilgenap', request('seMester'));
        } elseif ($semesterAktif) {
            // Default: pakai semester aktif
            $query->where('ganjilgenap', $semesterAktif->semester);
        }

        if (request()->has('kodeKK') && request('kodeKK') != 'all') {
            $query->where('kode_kk', request('kodeKK'));
        }

        if (request()->has('tingKat') && request('tingKat') != 'all') {
            $query->where('tingkat', request('tingKat'));
        }

        if (request()->has('romBel') && request('romBel') != 'all') {
            $query->where('kode_rombel', request('romBel'));
        }

        // Tambahkan left join ke jam_mengajars
        $query->leftJoin('jam_mengajars', 'jam_mengajars.kbm_per_rombel_id', '=', 'kbm_per_rombels.id')
            ->addSelect('kbm_per_rombels.*', 'jam_mengajars.jumlah_jam');

        // Default query with ordering
        $query->orderBy('rombel', 'asc')
            ->orderBy('kode_mapel_rombel', 'asc');

        /* $query->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->join('kompetensi_keahlians', 'peserta_didik_rombels.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->select('peserta_didik_rombels.*', 'peserta_didiks.nama_lengkap', 'kompetensi_keahlians.nama_kk'); // Tambahkan nama_kk */

        return $query;
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('kbmperrombel-table')
            ->columns($this->getColumns())
            ->ajax([
                'data' =>
                'function(d) {
                    d.search = $(".search").val();
                    d.thAjar = $("#idThnAjaran").val();
                    d.seMester = $("#idSemester").val();
                    d.kodeKK = $("#idKodeKK").val();
                    d.tingKat = $("#idTingkat").val();
                    d.romBel = $("#idRombel").val();
                }'
            ])
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => false,
                'pageLength' => 100,
                'paging' => true,
                'scrollCollapse' => true,
                'scrollY' => "calc(100vh - 408px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center')->width(25),
            //Column::make('kode_mapel_rombel')->title('Kode Mapel <br>Rombel')->width(100),
            Column::make('identitas_rombel')->title('Thn Ajaran')->addClass('text-center')->width(50),
            Column::make('rombel')->title('Rombel')->addClass('text-center')->width(25),
            Column::make('mata_pelajaran')->title('Nama <br>Mata Pelajaran')->width(180),
            Column::make('kkm')->title('KKM')->addClass('text-center')->width(25),
            Column::make('id_personil')->title('Guru Pengajar')->width(150),
            Column::make('jam_ngajar')->title('Jml Jam')->width(35),
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
        return 'KbmPerRombel_' . date('YmdHis');
    }
}
