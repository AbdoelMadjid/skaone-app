@extends('layouts.master')
@section('title')
    @lang('translation.data-kelas')
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/gridjs/dist/theme/mermaid.min.css" rel="stylesheet" />
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
        }

        .no-border {
            border: none;
        }

        .text-center {
            text-align: center;
        }

        /* Ganti warna border hanya untuk tabel tertentu */
        #grid-container-akunsiswa .gridjs-table {
            border-color: #ddd !important;
        }

        #grid-container-akunsiswa .gridjs-th,
        #grid-container-akunsiswa .gridjs-td {
            border-color: #ddd !important;
        }

        #grid-container-akunsiswa .gridjs-search {
            float: right;
            /* Memindahkan form pencarian ke kiri */
            margin-left: 20px;
            /* Jarak antara pencarian dan elemen lainnya */
        }

        #grid-container-akunsiswa .gridjs-container {
            clear: both;
            /* Pastikan elemen setelah pencarian tidak tumpang tindih */
        }

        #loading-spinner {
            text-align: center;
            padding: 20px;
            font-size: 12px;
        }

        #grid-container-akunsiswa {
            display: none;
            /* Sembunyikan kontainer grid saat loading */
        }
    </style>
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.walikelas')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-5">
            <div class="card ribbon-box border shadow-none mb-lg-4">
                <div class="card-body">
                    <div class="ribbon ribbon-primary round-shape mt-2">Identitas Wali Kelas</div>
                    <h5 class="fs-14 text-end"></h5>
                    <div class="ribbon-content mt-5">
                        {{-- Menampilkan tahun ajaran dan semester aktif --}}
                        @if ($tahunAjaranAktif)
                            <h5 class="text-info">Tahun Ajaran: {{ $tahunAjaranAktif->tahunajaran }}</h5>
                            @if ($tahunAjaranAktif->semesters->isNotEmpty())
                                Semester Aktif: {{ $tahunAjaranAktif->semesters->first()->semester }}
                                ({{ $semesterAngka ?? 'Tidak dapat dihitung' }})
                            @else
                                Tidak ada semester aktif.
                            @endif
                        @else
                            <p>Tidak ada tahun ajaran aktif.</p>
                        @endif

                        {{-- Menampilkan wali kelas dan personil terkait dalam tabel --}}
                        @if ($waliKelas && $personil)
                            <h5 class="mt-4 text-info">Wali Kelas Data:</h5>
                            <table class="no-border">
                                <tbody class="no-border">
                                    <tr>
                                        <td><strong>Personal ID:</strong></td>
                                        <td>{{ $waliKelas->wali_kelas }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Nama Lengkap:</strong></td>
                                        <td>
                                            {{ $personil->gelardepan }} {{ $personil->namalengkap }}
                                            {{ $personil->gelarbelakang }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>NIP:</strong></td>
                                        <td>
                                            @if (!empty($personil->nip))
                                                {{ $personil->nip }}
                                            @else
                                                -
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>Kode Rombel:</strong></td>
                                        <td>{{ $waliKelas->kode_rombel }}</td>
                                    </tr>
                                    <tr>
                                        <td><strong>Rombongan Belajar:</strong></td>
                                        <td>{{ $waliKelas->rombel }}</td>
                                    </tr>
                                    {{--                                     <tr>
                                    <td><strong>Tingkat:</strong></td>
                                    <td>{{ $waliKelas->tingkat }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Semester:</strong></td>
                                    <td>{{ $semesterAngka ?? 'Tidak dapat dihitung' }}</td>
                                </tr> --}}
                                </tbody>
                            </table>
                        @else
                            <p>Tidak ada data wali kelas yang terkait untuk tahun ajaran aktif ini.</p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="card ribbon-box border shadow-none mb-lg-4">
                <div class="card-body">
                    <div class="ribbon ribbon-primary round-shape mt-2">
                        @if ($titimangsa)
                            Update
                        @else
                            Tambah
                        @endif TitiMangsa
                    </div>
                    <h5 class="fs-14 text-end"></h5>
                    <div class="ribbon-content mt-5">
                        <form action="{{ route('walikelas.data-kelas.simpantitimangsa') }}" method="post">
                            @csrf
                            <div class="card-body">
                                <input type="hidden" name="kode_rombel" id="kode_rombel"
                                    value="{{ $waliKelas->kode_rombel }}">
                                <input type="hidden" name="tahunajaran" id="tahunajaran"
                                    value="{{ $tahunAjaranAktif->tahunajaran }}">
                                <input type="hidden" name="ganjilgenap" id="ganjilgenap"
                                    value="{{ $tahunAjaranAktif->semesters->first()->semester }}">
                                <input type="hidden" name="semester" id="semester" value="{{ $semesterAngka }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        <x-form.input name="alamat"
                                            value="{{ old('alamat', isset($titimangsa) ? $titimangsa->alamat : '') }}"
                                            label="Alamat" />
                                    </div>
                                    <div class="col-md-6">
                                        <x-form.input type="date" name="titimangsa"
                                            value="{{ old('titimangsa', isset($titimangsa) ? $titimangsa->titimangsa : '') }}"
                                            label="Titimangsa" />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="gap-2 hstack justify-content-end">
                                    <button type="submit" class="btn btn-soft-primary btn-label"><i
                                            class="ri-save-2-fill label-icon align-middle fs-16 me-2"></i>
                                        @if ($titimangsa)
                                            Update
                                        @else
                                            Simpan
                                        @endif
                                    </button>
                                </div>
                            </div><!-- end card body -->
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-7 col-md-7">
            <!-- Rounded Ribbon -->
            <div class="card ribbon-box border shadow-none mb-lg-4">
                <div class="card-body">
                    <div class="ribbon ribbon-primary round-shape mt-2">Data Siswa {{ $waliKelas->rombel }}</div>
                    <h5 class="text-end">
                        <x-btn-action href="{{ route('walikelas.downloadpdfdatasiswa') }}" label="Download PDF"
                            icon="ri-download-2-fill" />
                    </h5>
                    <div class="ribbon-content mt-3">
                        <div class="text-center"><!-- Vertical alignment (align-items-center) -->
                            <div id="loading-spinner" class="spinner-grow text-primary" role="status">
                                <span class="sr-only">Loading...</span>

                            </div>
                        </div>
                        <div id="loading-spinner-2" class="text-center"><br>Sedang memuat data...</div>
                        <div id="grid-container-akunsiswa" class="table-card gridjs-border-none"></div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card ribbon-box border shadow-none mb-lg-4">
                <div class="card-body">
                    <div class="ribbon ribbon-primary round-shape mt-2">Rekap Hari Efektif - Tahun Ajaran
                        {{ $tahunAjaran->tahunajaran }}</div>
                    <h5 class="fs-14 text-end"></h5>
                    <div class="ribbon-content mt-5">
                        {{-- <form method="GET" class="mb-3 d-flex align-items-center gap-2">
                            <label for="persen" class="mb-0">Kehadiran Ideal:</label>
                            <select name="persen" id="persen" onchange="this.form.submit()" class="form-select w-auto">
                                @foreach ([80, 85, 90] as $val)
                                    <option value="{{ $val }}" {{ $val == $persenKehadiran ? 'selected' : '' }}>
                                        {{ $val }}%</option>
                                @endforeach
                            </select>
                        </form> --}}
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card ribbon-box border shadow-none mb-lg-4">
                                    <div class="card-body">
                                        <div class="ribbon ribbon-primary round-shape mt-2">Semester Ganjil</div>
                                        <h5 class="fs-14 text-end"></h5>
                                        <div class="ribbon-content mt-5">
                                            {{-- Tabel Semester Ganjil --}}
                                            <div class="table-responsive mb-4">
                                                <table class="table table-bordered text-center table-striped align-middle">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Bulan</th>
                                                            <th>Hari Efektif</th>
                                                            <th>Kehadiran Ideal ({{ $persenKehadiran }}%)</th>
                                                            <th>Toleransi Alfa ({{ 100 - $persenKehadiran }}%)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($rekapGanjil['data'] as $item)
                                                            <tr>
                                                                <td>
                                                                    {{ \Carbon\Carbon::create()->month($item['bulan'])->translatedFormat('F') }}
                                                                </td>
                                                                <td class="text-center">{{ $item['jumlah'] }}</td>
                                                                <td class="text-center">{{ $item['kehadiran_ideal'] }}</td>
                                                                <td class="text-center">{{ $item['toleransi_alfa'] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot class="table-secondary fw-bold">
                                                        <tr>
                                                            <td>Total</td>
                                                            <td class="text-center">{{ $rekapGanjil['total']['jumlah'] }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $rekapGanjil['total']['kehadiran_ideal'] }}</td>
                                                            <td class="text-center">
                                                                {{ $rekapGanjil['total']['toleransi_alfa'] }}</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card ribbon-box border shadow-none mb-lg-4">
                                    <div class="card-body">
                                        <div class="ribbon ribbon-primary round-shape mt-2">Semester Genap</div>
                                        <h5 class="fs-14 text-end"></h5>
                                        <div class="ribbon-content mt-5">
                                            {{-- Tabel Semester Genap --}}
                                            <div class="table-responsive">
                                                <table class="table table-bordered text-center table-striped align-middle">
                                                    <thead class="table-light">
                                                        <tr>
                                                            <th>Bulan</th>
                                                            <th>Hari Efektif</th>
                                                            <th>Kehadiran Ideal ({{ $persenKehadiran }}%)</th>
                                                            <th>Toleransi Alfa ({{ 100 - $persenKehadiran }}%)</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($rekapGenap['data'] as $item)
                                                            <tr>
                                                                <td>{{ \Carbon\Carbon::create()->month($item['bulan'])->translatedFormat('F') }}
                                                                </td>
                                                                <td class="text-center">{{ $item['jumlah'] }}</td>
                                                                <td class="text-center">{{ $item['kehadiran_ideal'] }}
                                                                </td>
                                                                <td class="text-center">{{ $item['toleransi_alfa'] }}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                    <tfoot class="table-secondary fw-bold">
                                                        <tr>
                                                            <td>Total</td>
                                                            <td class="text-center">{{ $rekapGenap['total']['jumlah'] }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $rekapGenap['total']['kehadiran_ideal'] }}</td>
                                                            <td class="text-center">
                                                                {{ $rekapGenap['total']['toleransi_alfa'] }}</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/grid-helper.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gridjs/dist/gridjs.umd.js"></script>
    <script>
        // Data siswa dari Laravel
        const siswaData = @json($siswaData);

        // Tambahkan nomor urut secara dinamis ke data siswa
        const siswaDataWithIndex = siswaData.map((siswa, index) => [
            index + 1, // Nomor urut
            siswa.nis, // NIS
            siswa.nama_lengkap, // Nama Lengkap
            siswa.kontak_email // Email/User
        ]);

        // Panggil fungsi dari file eksternal
        initGrid(
            ["No", "NIS", "Nama Lengkap", "Email/User"],
            siswaDataWithIndex,
            "grid-container-akunsiswa",
            10
        );

        // Render Grid.js
        grid.render(document.getElementById("grid-container-akunsiswa"));

        // Sembunyikan spinner setelah Grid.js selesai dimuat
        grid.on('ready', () => {
            document.getElementById('loading-spinner').style.display = 'none';
        });
    </script>
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
