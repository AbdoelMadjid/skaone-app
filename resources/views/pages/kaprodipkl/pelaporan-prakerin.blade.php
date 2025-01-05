@extends('layouts.master')
@section('title')
    @lang('translation.pelaporan')
@endsection
@section('css')
    {{--  --}}
    <link href="{{ URL::asset('build/libs/nouislider/nouislider.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('build/libs/gridjs/theme/mermaid.min.css') }}">
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
                                <table class="table table-bordered table-centered">
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
                                            @foreach ($perusahaanList as $index => $perusahaan)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $perusahaan->nama_perusahaan }}</td>
                                                    <td>{{ $perusahaan->alamat_perusahaan }}</td>
                                                    <td class='text-center'>
                                                        {{ $perusahaanCounts[$perusahaan->id_perusahaan] ?? 0 }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                                <td class="text-center">
                                                    <strong>
                                                        {{ $perusahaanCounts->values()->sum() }}
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tbody>
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
                                            @foreach ($pembimbingList as $index => $pembimbing)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $pembimbing->nip }}</td>
                                                    <td>
                                                        {{ $pembimbing->gelardepan }} {{ $pembimbing->namalengkap }}
                                                        {{ $pembimbing->gelarbelakang }}
                                                    </td>
                                                    <td class='text-center'>
                                                        {{ $pembimbingCounts[$pembimbing->id_personil] ?? 0 }}</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3" class="text-end"><strong>Total:</strong></td>
                                                <td class="text-center">
                                                    <strong>
                                                        {{ $pembimbingCounts->values()->sum() }}
                                                    </strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @else
                                    <p>Data pembimbing tidak tersedia.</p>
                                @endif
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane" id="absensiPeserta" role="tabpanel">
                                <table class="table table-bordered table-centered">
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
                                            <tr>
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
                                                <td class='text-center'>{{ $prakerin->jumlah_hadir }}</td>
                                                <td class='text-center'>{{ $prakerin->jumlah_sakit }}</td>
                                                <td class='text-center'>{{ $prakerin->jumlah_izin }}</td>
                                                <td class='text-center'>{{ $prakerin->jumlah_alfa }}</td>
                                                <td class='text-center'>{{ $prakerin->jumlah_total }}</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5" class="text-end"><strong>Total:</strong></td>
                                            <td class='text-center'>
                                                <strong>{{ $dataPrakerin->sum('jumlah_hadir') }}</strong>
                                            </td>
                                            <td class='text-center'>
                                                <strong>{{ $dataPrakerin->sum('jumlah_sakit') }}</strong>
                                            </td>
                                            <td class='text-center'>
                                                <strong>{{ $dataPrakerin->sum('jumlah_izin') }}</strong>
                                            </td>
                                            <td class='text-center'>
                                                <strong>{{ $dataPrakerin->sum('jumlah_alfa') }}</strong>
                                            </td>
                                            <td class='text-center'>
                                                <strong>{{ $dataPrakerin->sum('jumlah_total') }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane" id="jurnalPeserta" role="tabpanel">
                                <table class="table table-bordered table-centered">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th width="250">Identitas Siswa</th>
                                            <th>Perusahaan / Pembimbing</th>
                                            <th>Sudah</th>
                                            <th>Belum</th>
                                            <th>Tolak</th>
                                            <th>Total</th>
                                            <th width="300">Element</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataPrakerin as $index => $prakerin)
                                            <tr>
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
                                                <td class='text-center'>{{ $prakerin->jumlah_sudah }}</td>
                                                <td class='text-center'>{{ $prakerin->jumlah_belum }}</td>
                                                <td class='text-center'>{{ $prakerin->jumlah_tolak }}</td>
                                                <td class="text-center">
                                                    {{ $prakerin->jumlah_sudah + $prakerin->jumlah_belum + $prakerin->jumlah_tolak }}
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
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="5" class="text-end"><strong>Total:</strong></td>
                                            <td class='text-center'>
                                                <strong>{{ $dataPrakerin->sum('jumlah_sudah') }}</strong>
                                            </td>
                                            <td class='text-center'>
                                                <strong>{{ $dataPrakerin->sum('jumlah_belum') }}</strong>
                                            </td>
                                            <td class='text-center'>
                                                <strong>{{ $dataPrakerin->sum('jumlah_tolak') }}</strong>
                                            </td>
                                            <td class="text-center">
                                                <strong>{{ $dataPrakerin->sum('jumlah_sudah') + $dataPrakerin->sum('jumlah_belum') + $dataPrakerin->sum('jumlah_tolak') }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
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
    <script src="{{ URL::asset('build/libs/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/gridjs/gridjs.umd.js') }}"></script>
    <script src="https://unpkg.com/gridjs/plugins/selection/dist/selection.umd.js"></script>


    <script src="{{ URL::asset('build/js/pages/ecommerce-product-list.init.js') }}"></script>
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
