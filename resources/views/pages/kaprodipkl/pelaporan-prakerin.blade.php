@extends('layouts.master')
@section('title')
    @lang('translation.pelaporan')
@endsection
@section('css')
    {{--  --}}
    <link href="{{ URL::asset('build/libs/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.kaprodipkl')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <h5>Pelaporan PKL Keprodi</h5>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    {{-- <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="searchProductList"
                                            placeholder="Search Products...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#pesertaPrakerin"
                                            role="tab">
                                            Peserta Prakerin <span
                                                class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">{{ $totalDataPrakerin }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#daftarPerusahaan"
                                            role="tab">
                                            Daftar Perusahaan <span
                                                class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">{{ $totalPerusahaan }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#guruPkl" role="tab">
                                            Daftar Guru PKL <span
                                                class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">{{ $totalPembimbing }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#absensiPeserta"
                                            role="tab"> Rekap Absensi
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#jurnalPeserta"
                                            role="tab"> Rekap Jurnal
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <div id="selection-element">
                                    <div class="my-n1 d-flex align-items-center text-muted">
                                        Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result
                                        <button type="button" class="btn btn-link link-danger p-0 ms-3"
                                            data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">

                        <div class="tab-content">
                            <div class="tab-pane active" id="pesertaPrakerin" role="tabpanel">
                                <table id="pesertaprakerinTable" class="table table-bordered table-centered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIS</th>
                                            <th>Nama Lengkap</th>
                                            <th>Rombel</th>
                                            <th>Perusahaan</th>
                                            <th>Pembimbing</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($dataPrakerin as $index => $prakerin)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $prakerin->nis }}</td>
                                                <td>{{ $prakerin->nama_lengkap }}</td>
                                                <td>{{ $prakerin->rombel }}</td>
                                                <td>{{ $prakerin->nama_perusahaan }}</td>
                                                <td>{{ $prakerin->gelardepan }} {{ $prakerin->namalengkap }}
                                                    {{ $prakerin->gelarbelakang }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="8">Tidak ada data.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="daftarPerusahaan" role="tabpanel">
                                @if ($perusahaanList->isNotEmpty())
                                    <table class="table table-bordered table-centered">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Alamat</th>
                                                <th>Peserta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($perusahaanList as $perusahaan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="show-peserta-perusahaan"
                                                            data-id="{{ $perusahaan->id_perusahaan }}">
                                                            {{ $perusahaan->nama_perusahaan }}
                                                        </a>
                                                    </td>
                                                    <td>{!! $perusahaan->alamat_perusahaan !!}</td>
                                                    <td class="text-center">
                                                        {{ $perusahaanCounts[$perusahaan->id_perusahaan] ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr id="peserta-{{ $perusahaan->id_perusahaan }}"
                                                    class="peserta-perusahaan-row" style="display: none;">
                                                    <td colspan="4">
                                                        <div class="loading" style="display: none;">Memuat data...</div>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>No.</th>
                                                                    <th>NIS</th>
                                                                    <th>Nama Lengkap</th>
                                                                    <th>Rombel</th>
                                                                    <th>Guru PKL</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($pesertaByPerusahaan[$perusahaan->id_perusahaan] ?? [] as $index => $peserta)
                                                                    <tr>
                                                                        <td>{{ $index + 1 }}</td>
                                                                        <td>{{ $peserta['nis'] }}</td>
                                                                        <td>{{ $peserta['nama_lengkap'] }}</td>
                                                                        <td>{{ $peserta['rombel'] }}</td>
                                                                        <td>{{ $peserta['nama_pembimbing'] }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="bg-light">
                                            <tr>
                                                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                                <td class="text-center">
                                                    <strong>{{ $perusahaanCounts->values()->sum() }}</strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <p>Data perusahaan tidak tersedia.</p>
                                @endif
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="guruPkl" role="tabpanel">
                                @if ($pembimbingList->isNotEmpty())
                                    <table class="table table-bordered table-centered table-nowrap">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>NIP</th>
                                                <th>Nama Lengkap</th>
                                                <th>Peserta</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pembimbingList as $pembimbing)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $pembimbing->nip }}</td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="show-peserta-pembimbing"
                                                            data-id="{{ $pembimbing->id_personil }}">
                                                            {{ $pembimbing->gelardepan }} {{ $pembimbing->namalengkap }}
                                                            {{ $pembimbing->gelarbelakang }}
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        {{ $pembimbingCounts[$pembimbing->id_personil] ?? 0 }}
                                                    </td>
                                                </tr>
                                                <tr id="peserta-{{ $pembimbing->id_personil }}"
                                                    class="peserta-pembimbing-row" style="display: none;">
                                                    <td colspan="4">
                                                        <div class="loading" style="display: none;">Memuat data...</div>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th>No.</th>
                                                                    <th>NIS</th>
                                                                    <th>Nama Lengkap</th>
                                                                    <th>Rombel</th>
                                                                    <th>Perusahaan</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($pesertaByPembimbing[$pembimbing->id_personil] ?? [] as $index => $peserta)
                                                                    <tr>
                                                                        <td>{{ $index + 1 }}</td>
                                                                        <td>{{ $peserta['nis'] }}</td>
                                                                        <td>{{ $peserta['nama_lengkap'] }}</td>
                                                                        <td>{{ $peserta['rombel'] }}</td>
                                                                        <td>{{ $peserta['nama_perusahaan'] }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot class="bg-light">
                                            <tr>
                                                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                                <td class="text-center">
                                                    <strong>{{ $pembimbingCounts->values()->sum() }}</strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                @else
                                    <p>Data pembimbing tidak tersedia.</p>
                                @endif

                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane" id="absensiPeserta" role="tabpanel">
                                <div class="form-group mb-3">
                                    <label for="pembimbingAbsensiSelect">Pilih Pembimbing</label>
                                    <select id="pembimbingAbsensiSelect"
                                        class="form-control select2 form-select form-select-sm">
                                        <option value="">-- Pilih Semua --</option>
                                        <option value="all">Pilih Semua</option>
                                        @foreach ($pembimbingList as $pembimbing)
                                            <option value="{{ $pembimbing->id_personil }}">{{ $pembimbing->gelardepan }}
                                                {{ $pembimbing->namalengkap }} {{ $pembimbing->gelarbelakang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <table id="absensiTable" class="table table-bordered table-centered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIS</th>
                                            <th>Nama Lengkap</th>
                                            <th>Rombel</th>
                                            <th>Nama Perusahaan / Pembimbing</th>
                                            <th>Hadir</th>
                                            <th>Sakit</th>
                                            <th>Izin</th>
                                            <th>Alfa</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataPrakerin as $index => $prakerin)
                                            <tr class="absensi-prakerin-row"
                                                data-pembimbing-id="{{ $prakerin->id_personil }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $prakerin->nis }}</td>
                                                <td>{{ $prakerin->nama_lengkap }}</td>
                                                <td>{{ $prakerin->rombel }}</td>
                                                <td>
                                                    <strong class="text-primary">{{ $prakerin->nama_perusahaan }}</strong>
                                                    <br>
                                                    <strong class="text-info">
                                                        {{ $prakerin->gelardepan }}
                                                        {{ $prakerin->namalengkap }}
                                                        {{ $prakerin->gelarbelakang }}
                                                    </strong>
                                                </td>
                                                <td class="text-center jumlah_hadir">{{ $prakerin->jumlah_hadir }}</td>
                                                <td class="text-center jumlah_sakit">{{ $prakerin->jumlah_sakit }}</td>
                                                <td class="text-center jumlah_izin">{{ $prakerin->jumlah_izin }}</td>
                                                <td class="text-center jumlah_alfa">{{ $prakerin->jumlah_alfa }}</td>
                                                <td class="text-center jumlah_total">{{ $prakerin->jumlah_total }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="bg-light">
                                        <tr>
                                            <td colspan="5" class="text-end"><strong>Total:</strong></td>
                                            <td class="text-center" id="totalHadir">
                                                <strong>{{ $dataPrakerin->sum('jumlah_hadir') }}</strong>
                                            </td>
                                            <td class="text-center" id="totalSakit">
                                                <strong>{{ $dataPrakerin->sum('jumlah_sakit') }}</strong>
                                            </td>
                                            <td class="text-center" id="totalIzin">
                                                <strong>{{ $dataPrakerin->sum('jumlah_izin') }}</strong>
                                            </td>
                                            <td class="text-center" id="totalAlfa">
                                                <strong>{{ $dataPrakerin->sum('jumlah_alfa') }}</strong>
                                            </td>
                                            <td class="text-center" id="totalAll">
                                                <strong>{{ $dataPrakerin->sum('jumlah_hadir') + $dataPrakerin->sum('jumlah_sakit') + $dataPrakerin->sum('jumlah_izin') + $dataPrakerin->sum('jumlah_alfa') }}</strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane" id="jurnalPeserta" role="tabpanel">
                                <div class="form-group mb-3">
                                    <label for="pembimbingJurnalSelect">Pilih Pembimbing</label>
                                    <select id="pembimbingJurnalSelect"
                                        class="form-control select2 form-select form-select-sm">
                                        <option value="">-- Pilih Semua --</option>
                                        <option value="all">Pilih Semua</option>
                                        @foreach ($pembimbingList as $pembimbing)
                                            <option value="{{ $pembimbing->id_personil }}">{{ $pembimbing->gelardepan }}
                                                {{ $pembimbing->namalengkap }} {{ $pembimbing->gelarbelakang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <table class="table table-bordered table-centered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th width="250">Identitas Siswa</th>
                                            <th>Perusahaan / Pembimbing</th>
                                            <th width="300">Element</th>
                                            <th>Sudah</th>
                                            <th>Belum</th>
                                            <th>Tolak</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataPrakerin as $index => $prakerin)
                                            <tr class="jurnal-prakerin-row"
                                                data-pembimbing-id="{{ $prakerin->id_personil }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    {{ $prakerin->nis }}<br>
                                                    <strong class="text-info">{{ $prakerin->nama_lengkap }}</strong><br>
                                                    {{ $prakerin->rombel }}
                                                </td>
                                                <td>
                                                    <strong class="text-primary">{{ $prakerin->nama_perusahaan }}</strong>
                                                    <br>
                                                    <strong class="text-info">
                                                        {{ $prakerin->gelardepan }}
                                                        {{ $prakerin->namalengkap }}
                                                        {{ $prakerin->gelarbelakang }}
                                                    </strong>
                                                </td>
                                                <td>
                                                    @foreach ($prakerin->jurnal_per_elemen as $jurnal)
                                                        <div
                                                            class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                                                            <p class="fw-medium fs-10 mb-0"><i
                                                                    class="ri-checkbox-blank-circle-fill text-primary align-middle me-2"></i>
                                                                <strong>{{ $jurnal['element'] }}</strong>
                                                            </p>
                                                            <div>
                                                                <span
                                                                    class="text-primary fw-medium fs-12">{{ $jurnal['total_jurnal_cp'] }}</span>
                                                            </div>
                                                        </div><!-- end -->
                                                    @endforeach
                                                </td>
                                                <td class="text-center jumlah_sudah">{{ $prakerin->jumlah_sudah }}</td>
                                                <td class="text-center jumlah_belum">{{ $prakerin->jumlah_belum }}</td>
                                                <td class="text-center jumlah_tolak">{{ $prakerin->jumlah_tolak }}</td>
                                                <td class="text-center total_jumlah">
                                                    {{ $prakerin->jumlah_sudah + $prakerin->jumlah_belum + $prakerin->jumlah_tolak }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot class="bg-light">
                                        <tr>
                                            <td colspan="4" class="text-end"><strong>Total:</strong></td>
                                            <td class='text-center' id="totalSudah">
                                                <strong>{{ $dataPrakerin->sum('jumlah_sudah') }}</strong>
                                            </td>
                                            <td class='text-center' id="totalBelum">
                                                <strong>{{ $dataPrakerin->sum('jumlah_belum') }}</strong>
                                            </td>
                                            <td class='text-center' id="totalTolak">
                                                <strong>{{ $dataPrakerin->sum('jumlah_tolak') }}</strong>
                                            </td>
                                            <td class="text-center" id="allTotal">
                                                <strong>{{ $dataPrakerin->sum('jumlah_sudah') + $dataPrakerin->sum('jumlah_belum') + $dataPrakerin->sum('jumlah_tolak') }}</strong>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- end tab pane -->

                        </div>
                        <!-- end tab content -->

                    </div>

                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
    <script src="https://unpkg.com/gridjs/plugins/selection/dist/selection.umd.js"></script>
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/ecommerce-product-list.init.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const linksPerusahaan = document.querySelectorAll('.show-peserta-perusahaan');

            linksPerusahaan.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const perusahaanId = this.getAttribute('data-id');
                    const row = document.getElementById(`peserta-${perusahaanId}`);

                    // Sembunyikan semua row lainnya yang sedang terbuka
                    const allRows = document.querySelectorAll('.peserta-perusahaan-row');
                    allRows.forEach(r => {
                        if (r !== row) {
                            r.style.display = 'none'; // Menyembunyikan row yang lain
                        }
                    });

                    // Toggle row yang dipilih
                    row.style.display = row.style.display === 'none' ? '' : 'none';
                });
            });
        });


        document.addEventListener('DOMContentLoaded', () => {
            const links = document.querySelectorAll('.show-peserta-pembimbing');

            links.forEach(link => {
                link.addEventListener('click', function(event) {
                    event.preventDefault();
                    const pembimbingId = this.getAttribute('data-id');
                    const row = document.getElementById(`peserta-${pembimbingId}`);
                    // Sembunyikan semua row lainnya yang sedang terbuka
                    const allRows = document.querySelectorAll('.peserta-pembimbing-row');
                    allRows.forEach(r => {
                        if (r !== row) {
                            r.style.display = 'none'; // Menyembunyikan row yang lain
                        }
                    });

                    // Toggle row yang dipilih
                    row.style.display = row.style.display === 'none' ? '' : 'none';
                });
            });
        });

        document.addEventListener('DOMContentLoaded', () => {
            const pembimbingSelect = $('#pembimbingJurnalSelect'); // Gunakan jQuery untuk Select2
            const tableRows = document.querySelectorAll('.jurnal-prakerin-row');
            const totalSudah = document.querySelector('#totalSudah');
            const totalBelum = document.querySelector('#totalBelum');
            const totalTolak = document.querySelector('#totalTolak');
            const allTotal = document.querySelector('#allTotal');

            pembimbingSelect.on('select2:select', function(e) {
                const selectedPembimbingId = e.target.value;
                let sumSudah = 0;
                let sumBelum = 0;
                let sumTolak = 0;
                let sumAll = 0;
                let currentNo = 1; // Mulai nomor urut dari 1

                tableRows.forEach(row => {
                    const rowPembimbingId = row.getAttribute('data-pembimbing-id');

                    if (selectedPembimbingId === "all" || selectedPembimbingId === "" ||
                        rowPembimbingId === selectedPembimbingId) {
                        row.style.display = ''; // Menampilkan row yang sesuai
                        // Perbarui nomor urut
                        row.querySelector('td:first-child').textContent = currentNo++;
                        sumSudah += parseInt(row.querySelector('.jumlah_sudah').textContent) || 0;
                        sumBelum += parseInt(row.querySelector('.jumlah_belum').textContent) || 0;
                        sumTolak += parseInt(row.querySelector('.jumlah_tolak').textContent) || 0;
                        sumAll += parseInt(row.querySelector('.total_jumlah').textContent) || 0;
                    } else {
                        row.style.display = 'none'; // Menyembunyikan row yang tidak sesuai
                    }
                });

                // Update total values
                totalSudah.textContent = sumSudah;
                totalBelum.textContent = sumBelum;
                totalTolak.textContent = sumTolak;
                allTotal.textContent = sumAll;
            });

            // Inisialisasi Select2
            pembimbingSelect.select2({
                placeholder: "-- Pilih Pembimbing --",
                allowClear: true
            });
        });


        document.addEventListener('DOMContentLoaded', () => {
            const pembimbingSelect = $('#pembimbingAbsensiSelect'); // Gunakan jQuery untuk Select2
            const tableRows = document.querySelectorAll('.absensi-prakerin-row');

            // Mengambil elemen total
            const totalHadir = document.querySelector('#totalHadir');
            const totalSakit = document.querySelector('#totalSakit');
            const totalIzin = document.querySelector('#totalIzin');
            const totalAlfa = document.querySelector('#totalAlfa');
            const totalAll = document.querySelector('#totalAll');

            pembimbingSelect.on('select2:select', function(e) {
                const selectedPembimbingId = e.target.value;
                let sumHadir = 0;
                let sumSakit = 0;
                let sumIzin = 0;
                let sumAlfa = 0;
                let sumTotal = 0;
                let currentNo = 1; // Mulai nomor urut dari 1

                tableRows.forEach(row => {
                    const rowPembimbingId = row.getAttribute('data-pembimbing-id');

                    if (selectedPembimbingId === "all" || selectedPembimbingId === "" ||
                        rowPembimbingId === selectedPembimbingId) {
                        row.style.display = ''; // Menampilkan row yang sesuai
                        // Perbarui nomor urut
                        row.querySelector('td:first-child').textContent = currentNo++;
                        sumHadir += parseInt(row.querySelector('.jumlah_hadir').textContent) || 0;
                        sumSakit += parseInt(row.querySelector('.jumlah_sakit').textContent) || 0;
                        sumIzin += parseInt(row.querySelector('.jumlah_izin').textContent) || 0;
                        sumAlfa += parseInt(row.querySelector('.jumlah_alfa').textContent) || 0;
                        sumTotal += parseInt(row.querySelector('.jumlah_total').textContent) || 0;
                    } else {
                        row.style.display = 'none'; // Menyembunyikan row yang tidak sesuai
                    }
                });

                // Update total values
                totalHadir.textContent = sumHadir;
                totalSakit.textContent = sumSakit;
                totalIzin.textContent = sumIzin;
                totalAlfa.textContent = sumAlfa;
                totalAll.textContent = sumTotal;
            });

            // Inisialisasi Select2
            pembimbingSelect.select2({
                placeholder: "-- Pilih Pembimbing --",
                allowClear: true
            });
        });
    </script>
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
