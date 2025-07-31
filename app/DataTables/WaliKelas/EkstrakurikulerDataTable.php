<?php

namespace App\DataTables\WaliKelas;

use App\Models\AppSupport\Referensi;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\WaliKelas\Ekstrakurikuler;
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

class EkstrakurikulerDataTable extends DataTable
{
    use DatatableHelper;
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $eskulWajibOptions = Referensi::where('jenis', 'EskulWajib')->pluck('data', 'data')->toArray();
        $eskulPilihanOptions = Referensi::where('jenis', 'EskulPilihan')->pluck('data', 'data')->toArray();

        return (new EloquentDataTable($query))
            ->addColumn('wajib', function ($row) use ($eskulWajibOptions) {
                // Buat elemen select pertama untuk memilih Eskul Wajib
                $selectEskulHtml = '<select name="wajib_' . $row->id . '" class="form-select form-select-sm wajib-select" data-id="' . $row->id . '">';
                $selectEskulHtml .= '<option value="">-- Pilih Eskul Wajib --</option>';
                foreach ($eskulWajibOptions as $key => $option) {
                    $selected = $row->wajib == $key ? 'selected' : '';
                    $selectEskulHtml .= '<option value="' . $key . '" ' . $selected . '>' . $option . '</option>';
                }
                $selectEskulHtml .= '</select>';

                // Buat elemen select kedua untuk memilih penilaian (Cukup Baik, Baik, Sangat Baik)
                $penilaianOptions = ['Cukup Baik', 'Baik', 'Sangat Baik'];
                $selectPenilaianHtml = '<select name="wajib_n_' . $row->id . '" class="form-select form-select-sm penilaian-select mt-2" data-id="' . $row->id . '">';
                $selectPenilaianHtml .= '<option value="">-- Pilih Penilaian --</option>';
                foreach ($penilaianOptions as $option) {
                    $selected = $row->wajib_n == $option ? 'selected' : '';
                    $selectPenilaianHtml .= '<option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
                }
                $selectPenilaianHtml .= '</select>';

                // Buat elemen div untuk menampilkan wajib_desk
                $wajibDeskHtml = '';
                if (!empty($row->wajib_desk)) {
                    $wajibDeskHtml = '<div class="wajib-desk alert alert-info mt-2" data-id="' . $row->id . '">' . $row->wajib_desk . '</div>';
                } else {
                    $wajibDeskHtml = '<div class="wajib-desk alert alert-danger mt-2" data-id="' . $row->id . '">Silakan pilih Penilaian</div>';
                }

                // Gabungkan kedua elemen select dan div untuk menampilkan desk
                return $selectEskulHtml . ' ' . $selectPenilaianHtml . ' ' . $wajibDeskHtml;
            })
            ->addColumn('pilihan1', function ($row) use ($eskulPilihanOptions) {
                // Buat elemen select pertama untuk memilih Eskul Wajib
                $selectEskulHtml = '<select name="pilihan1_' . $row->id . '" class="form-select form-select-sm pilihan1-select" data-id="' . $row->id . '">';
                $selectEskulHtml .= '<option value="">-- Pilih Eskul Pilihan 1 --</option>';
                foreach ($eskulPilihanOptions as $key => $option) {
                    $selected = $row->pilihan1 == $key ? 'selected' : '';
                    $selectEskulHtml .= '<option value="' . $key . '" ' . $selected . '>' . $option . '</option>';
                }
                $selectEskulHtml .= '</select>';

                // Buat elemen select kedua untuk memilih penilaian (Cukup Baik, Baik, Sangat Baik)
                $penilaianOptions = ['Cukup Baik', 'Baik', 'Sangat Baik'];
                $selectPenilaianHtml = '<select name="pilihan1_n_' . $row->id . '" class="form-select form-select-sm penilaian1-select mt-2" data-id="' . $row->id . '">';
                $selectPenilaianHtml .= '<option value="">-- Pilih Penilaian --</option>';
                foreach ($penilaianOptions as $option) {
                    $selected = $row->pilihan1_n == $option ? 'selected' : '';
                    $selectPenilaianHtml .= '<option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
                }
                $selectPenilaianHtml .= '</select>';

                // Buat elemen div untuk menampilkan wajib_desk
                $pilihan1DeskHtml = '';
                if (!empty($row->pilihan1_desk)) {
                    $pilihan1DeskHtml = '<div class="pilihan1-desk alert alert-info mt-2" data-id="' . $row->id . '">' . $row->pilihan1_desk . '</div>';
                } else {
                    $pilihan1DeskHtml = '<div class="pilihan1-desk alert alert-danger mt-2" data-id="' . $row->id . '">Silakan pilih Penilaian</div>';
                }

                // Gabungkan kedua elemen select dan div untuk menampilkan desk
                return $selectEskulHtml . ' ' . $selectPenilaianHtml . ' ' . $pilihan1DeskHtml;
            })
            ->addColumn('pilihan2', function ($row) use ($eskulPilihanOptions) {
                // Buat elemen select pertama untuk memilih Eskul Wajib
                $selectEskulHtml = '<select name="pilihan2_' . $row->id . '" class="form-select form-select-sm pilihan2-select" data-id="' . $row->id . '">';
                $selectEskulHtml .= '<option value="">-- Pilih Eskul Pilihan 2 --</option>';
                foreach ($eskulPilihanOptions as $key => $option) {
                    $selected = $row->pilihan2 == $key ? 'selected' : '';
                    $selectEskulHtml .= '<option value="' . $key . '" ' . $selected . '>' . $option . '</option>';
                }
                $selectEskulHtml .= '</select>';

                // Buat elemen select kedua untuk memilih penilaian (Cukup Baik, Baik, Sangat Baik)
                $penilaianOptions = ['Cukup Baik', 'Baik', 'Sangat Baik'];
                $selectPenilaianHtml = '<select name="pilihan2_n_' . $row->id . '" class="form-select form-select-sm penilaian2-select mt-2" data-id="' . $row->id . '">';
                $selectPenilaianHtml .= '<option value="">-- Pilih Penilaian --</option>';
                foreach ($penilaianOptions as $option) {
                    $selected = $row->pilihan2_n == $option ? 'selected' : '';
                    $selectPenilaianHtml .= '<option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
                }
                $selectPenilaianHtml .= '</select>';

                // Buat elemen div untuk menampilkan wajib_desk
                $pilihan2DeskHtml = '';
                if (!empty($row->pilihan2_desk)) {
                    $pilihan2DeskHtml = '<div class="pilihan2-desk alert alert-info mt-2" data-id="' . $row->id . '">' . $row->pilihan2_desk . '</div>';
                } else {
                    $pilihan2DeskHtml = '<div class="pilihan2-desk alert alert-danger mt-2" data-id="' . $row->id . '">Silakan pilih Penilaian</div>';
                }

                // Gabungkan kedua elemen select dan div untuk menampilkan desk
                return $selectEskulHtml . ' ' . $selectPenilaianHtml . ' ' . $pilihan2DeskHtml;
            })
            ->addColumn('pilihan3', function ($row) use ($eskulPilihanOptions) {
                // Buat elemen select pertama untuk memilih Eskul Wajib
                $selectEskulHtml = '<select name="pilihan3_' . $row->id . '" class="form-select form-select-sm pilihan3-select" data-id="' . $row->id . '">';
                $selectEskulHtml .= '<option value="">-- Pilih Eskul Pilihan 3 --</option>';
                foreach ($eskulPilihanOptions as $key => $option) {
                    $selected = $row->pilihan3 == $key ? 'selected' : '';
                    $selectEskulHtml .= '<option value="' . $key . '" ' . $selected . '>' . $option . '</option>';
                }
                $selectEskulHtml .= '</select>';

                // Buat elemen select kedua untuk memilih penilaian (Cukup Baik, Baik, Sangat Baik)
                $penilaianOptions = ['Cukup Baik', 'Baik', 'Sangat Baik'];
                $selectPenilaianHtml = '<select name="pilihan3_n_' . $row->id . '" class="form-select form-select-sm penilaian3-select mt-2" data-id="' . $row->id . '">';
                $selectPenilaianHtml .= '<option value="">-- Pilih Penilaian --</option>';
                foreach ($penilaianOptions as $option) {
                    $selected = $row->pilihan3_n == $option ? 'selected' : '';
                    $selectPenilaianHtml .= '<option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
                }
                $selectPenilaianHtml .= '</select>';

                // Buat elemen div untuk menampilkan wajib_desk
                $pilihan3DeskHtml = '';
                if (!empty($row->pilihan3_desk)) {
                    $pilihan3DeskHtml = '<div class="pilihan3-desk alert alert-info mt-2" data-id="' . $row->id . '">' . $row->pilihan3_desk . '</div>';
                } else {
                    $pilihan3DeskHtml = '<div class="pilihan3-desk alert alert-danger mt-2" data-id="' . $row->id . '">Silakan pilih Penilaian</div>';
                }

                // Gabungkan kedua elemen select dan div untuk menampilkan desk
                return $selectEskulHtml . ' ' . $selectPenilaianHtml . ' ' . $pilihan3DeskHtml;
            })
            ->addColumn('pilihan4', function ($row) use ($eskulPilihanOptions) {
                // Buat elemen select pertama untuk memilih Eskul Wajib
                $selectEskulHtml = '<select name="pilihan4_' . $row->id . '" class="form-select form-select-sm pilihan4-select" data-id="' . $row->id . '">';
                $selectEskulHtml .= '<option value="">-- Pilih Eskul Pilihan 4 --</option>';
                foreach ($eskulPilihanOptions as $key => $option) {
                    $selected = $row->pilihan4 == $key ? 'selected' : '';
                    $selectEskulHtml .= '<option value="' . $key . '" ' . $selected . '>' . $option . '</option>';
                }
                $selectEskulHtml .= '</select>';

                // Buat elemen select kedua untuk memilih penilaian (Cukup Baik, Baik, Sangat Baik)
                $penilaianOptions = ['Cukup Baik', 'Baik', 'Sangat Baik'];
                $selectPenilaianHtml = '<select name="pilihan4_n_' . $row->id . '" class="form-select form-select-sm penilaian4-select mt-2" data-id="' . $row->id . '">';
                $selectPenilaianHtml .= '<option value="">-- Pilih Penilaian --</option>';
                foreach ($penilaianOptions as $option) {
                    $selected = $row->pilihan4_n == $option ? 'selected' : '';
                    $selectPenilaianHtml .= '<option value="' . $option . '" ' . $selected . '>' . $option . '</option>';
                }
                $selectPenilaianHtml .= '</select>';

                // Buat elemen div untuk menampilkan wajib_desk
                $pilihan4DeskHtml = '';
                if (!empty($row->pilihan4_desk)) {
                    $pilihan4DeskHtml = '<div class="pilihan4-desk alert alert-info mt-2" data-id="' . $row->id . '">' . $row->pilihan4_desk . '</div>';
                } else {
                    $pilihan4DeskHtml = '<div class="pilihan4-desk alert alert-danger mt-2" data-id="' . $row->id . '">Silakan pilih Penilaian</div>';
                }

                // Gabungkan kedua elemen select dan div untuk menampilkan desk
                return $selectEskulHtml . ' ' . $selectPenilaianHtml . ' ' . $pilihan4DeskHtml;
            })
            ->addColumn('action', function ($row) {
                // Menggunakan basicActions untuk menghasilkan action buttons
                $actions = $this->basicActions($row);
                unset($actions['Delete']);
                unset($actions['Detail']);
                return view('action', compact('actions'));
            })
            ->addIndexColumn()
            ->rawColumns(['wajib', 'pilihan1', 'pilihan2', 'pilihan3',  'pilihan4', 'action']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Ekstrakurikuler $model): QueryBuilder
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil tahun ajaran yang aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = null;

        if ($tahunAjaranAktif) {
            $semesterAktif = Semester::where('status', 'Aktif')
                ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
                ->first();
        }

        // Ambil wali kelas berdasarkan personal_id dari user yang login
        $rombonganBelajar = DB::table('rombongan_belajars')
            ->where('wali_kelas', $user->personal_id)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->first();

        // Jika wali kelas ditemukan, lanjutkan query
        if ($rombonganBelajar) {
            // Query absensi berdasarkan kode rombel dari wali kelas
            $query = $model->newQuery()
                ->select(['id', 'nis'])
                ->select([
                    'ekstrakurikulers.*',
                    DB::raw('peserta_didiks.nama_lengkap as nama_lengkap'),
                ])
                ->join('peserta_didiks', 'ekstrakurikulers.nis', '=', 'peserta_didiks.nis')
                ->where('ekstrakurikulers.kode_rombel', $rombonganBelajar->kode_rombel) // Filter berdasarkan kode rombel
                ->where('ekstrakurikulers.tahunajaran', $rombonganBelajar->tahunajaran) // Filter berdasarkan kode rombel
                ->where('ekstrakurikulers.ganjilgenap', $semesterAktif->semester) // Filter berdasarkan kode rombel
                ->orderBy('nis', 'asc'); // Default order by NIS

            // Logika pengurutan berdasarkan request
            if (request()->has('order')) {
                $orderColumn = request('columns')[request('order')[0]['column']]['data'];
                $orderDir = request('order')[0]['dir'];
                $query->orderBy($orderColumn, $orderDir);
            } else {
                // Default ordering by NIS if no order request
                $query->orderBy('nis', 'asc');
            }

            return $query;
        } else {
            // Jika wali kelas tidak ditemukan, return query kosong atau handle sesuai kebutuhan
            return $model->newQuery()->whereRaw('1 = 0'); // Return query kosong
        }
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('ekstrakurikuler-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->parameters([
                //'order' => [[6, 'asc'], [4, 'asc'], [2, 'asc']],
                'lengthChange' => false,
                'searching' => false,
                'pageLength' => 50,
                'paging' => true,
                'scrollCollapse' => false,
                'scrollY' => "calc(100vh - 348px)",
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('DT_RowIndex')->title('No')->orderable(false)->searchable(false)->addClass('text-center align-middle')->width(50),
            Column::make('nis')->title('NIS')->addClass('text-center align-middle'),
            Column::make('nama_lengkap')->title('Nama Lengkap')->addClass('align-middle')->width(300),
            Column::make('wajib')->title('Eskul Wajib')->width(200),
            Column::make('pilihan1')->title('Eskul Pilihan 1')->width(200),
            Column::make('pilihan2')->title('Eskul Pilihan 2')->width(200),
            Column::make('pilihan3')->title('Eskul Pilihan 3')->width(200),
            Column::make('pilihan4')->title('Eskul Pilihan 4')->width(200),
            /*             Column::computed('action')
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
        return 'Ekstrakurikuler_' . date('YmdHis');
    }
}
