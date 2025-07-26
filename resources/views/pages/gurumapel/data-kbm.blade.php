@extends('layouts.master')
@section('title')
    @lang('translation.data-kbm')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.gurumapel')
        @endslot
        @slot('li_2')
            @lang('translation.administrasi-guru')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3">
                    DATA KBM <br>
                    <H6 class="text-danger fs-14">{{ $fullName }} <span class="text-info">({{ $personal_id }})</span>
                    </H6>
                </div>
                <!--end col-->
                <div class="col-md-auto ms-auto">
                    <div class="d-flex hastck gap-2 flex-wrap">
                        <a class="btn btn-soft-info btn-sm"
                            href="{{ route('gurumapel.adminguru.data-kbm-detail.index') }}">Tabel
                            KBM</a>
                        {{-- <div class="dropdown">
                            <button class="btn btn-soft-info btn-icon fs-14" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-settings-4-line"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item"
                                        href="{{ route('gurumapel.adminguru.data-kbm-detail.index') }}">Tabel
                                        KBM</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Add to exceptions</a></li>
                                <li><a class="dropdown-item" href="#">Switch to common form view</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Reset form view to default</a>
                                </li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
    </div>
    <!--end card-->
    <div class="row row-cols-xxl-3 row-cols-lg-3 row-cols-md-2 row-cols-1">

        <!-- TINGKA 10 ------------------------------------->

        <div class="col">
            <div class="card">
                <a class="card-body bg-danger-subtle" data-bs-toggle="collapse" href="#leadrombel10" role="button"
                    aria-expanded="false" aria-controls="leadrombel10">
                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">TINGKAT 10</h5>
                    <p class="text-muted mb-0">Jumlah Kelas <span class="fw-medium">{{ $jmlRombel10 }} Rombel</span>
                    </p>
                </a>
            </div>
            <!--end card-->
            <div class="collapse show" id="leadrombel10">
                @if ($rombel10->isEmpty())
                    <div class="card mb-1">
                        <div class="card-body">
                            <p><strong>Tidak Mengajar di Tingkat 10</strong></p>
                        </div>
                    </div>
                @else
                    @foreach ($rombel10 as $data)
                        <div class="card mb-1">
                            <div class="card-body">
                                <a class="d-flex align-items-center" data-bs-toggle="collapse"
                                    href="#leadrombel10{{ $loop->iteration }}" role="button" aria-expanded="false"
                                    aria-controls="leadrombel10{{ $loop->iteration }}">
                                    <div class="flex-shrink-0 avatar-sm">
                                        <span
                                            class="mini-stat-icon avatar-title rounded-circle text-danger bg-danger-subtle fs-4">
                                            {{ $loop->iteration }}
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="fs-14 mb-1">{{ $data->mata_pelajaran }}</h6>
                                        <p class="badge bg-danger-subtle text-danger mb-0 fs-6">{{ $data->rombel }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="collapse border-top border-top-dashed" id="leadrombel10{{ $loop->iteration }}">
                                <div class="card-body">
                                    <ul class="list-unstyled vstack gap-2 mb-0">
                                        <li>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-xxs text-muted">
                                                    <i class="ri-user-line"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fs-13 mb-0">JUMLAH SISWA</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h6 class="mb-0">{{ $data->jumlahSiswa }}
                                                        ({{ terbilang($data->jumlahSiswa) }})
                                                        ORANG</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-xxs text-muted">
                                                    <i class="ri-mac-line"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fs-13 mb-0">JUMLAH CP</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h6 class="mb-0">{{ $data->jumlahCP }}
                                                        ({{ terbilang($data->jumlahCP) }})
                                                        CP</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-xxs text-muted">
                                                    <i class="ri-bar-chart-grouped-line"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fs-13 mb-0">KKM</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h6 class="mb-0">
                                                        {{ $data->kkm }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer hstack gap-2">
                                    <button class="btn btn-warning btn-sm w-100" data-bs-toggle="modal"
                                        data-bs-target="#modalCapaianPembelajaran">
                                        <i class="ri-list-line align-bottom me-1" data-inisial_mp="{{ $data->kel_mapel }}"
                                            data-tingkat="{{ $data->tingkat }}"></i> Capaian Pembelajaran <br>
                                        {{ $data->mata_pelajaran }}
                                    </button>
                                    <button class="btn btn-info btn-sm w-100"><i
                                            class="ri-question-answer-line align-bottom me-1"></i>Materi Ajar <br>
                                        {{ $data->mata_pelajaran }}</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!--end card-->
            </div>
        </div>
        <!--end col-->


        <!-- TINGKA 11 ------------------------------------->
        <div class="col">
            <div class="card">
                <a class="card-body bg-success-subtle" data-bs-toggle="collapse" href="#leadrombel11" role="button"
                    aria-expanded="false" aria-controls="leadrombel11">
                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">TINGKAT 11</h5>
                    <p class="text-muted mb-0">Jumlah Kelas <span class="fw-medium">{{ $jmlRombel11 }} Rombel</span>
                    </p>
                </a>
            </div>
            <!--end card-->
            <div class="collapse show" id="leadrombel11">
                @if ($rombel11->isEmpty())
                    <div class="card mb-1">
                        <div class="card-body">
                            <p><strong>Tidak Mengajar di Tingkat 11</strong></p>
                        </div>
                    </div>
                @else
                    @foreach ($rombel11 as $data)
                        <div class="card mb-1">
                            <div class="card-body">
                                <a class="d-flex align-items-center" data-bs-toggle="collapse"
                                    href="#leadrombel11{{ $loop->iteration }}" role="button" aria-expanded="false"
                                    aria-controls="leadrombel11{{ $loop->iteration }}">
                                    <div class="flex-shrink-0 avatar-sm">
                                        <span
                                            class="mini-stat-icon avatar-title rounded-circle text-success bg-success-subtle fs-4">
                                            {{ $loop->iteration }}
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="fs-14 mb-1">{{ $data->mata_pelajaran }}</h6>
                                        <p class="badge bg-success-subtle text-success mb-0 fs-6">{{ $data->rombel }}
                                        </p>
                                    </div>
                                </a>
                            </div>
                            <div class="collapse border-top border-top-dashed" id="leadrombel11{{ $loop->iteration }}">
                                <div class="card-body">
                                    <ul class="list-unstyled vstack gap-2 mb-0">
                                        <li>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-xxs text-muted">
                                                    <i class="ri-user-line"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fs-13 mb-0">JUMLAH SISWA</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h6 class="mb-0">{{ $data->jumlahSiswa }}
                                                        ({{ terbilang($data->jumlahSiswa) }})
                                                        ORANG</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-xxs text-muted">
                                                    <i class="ri-mac-line"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fs-13 mb-0">JUMLAH CP</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h6 class="mb-0">
                                                        {{ $data->jumlahCP }}
                                                        ({{ terbilang($data->jumlahCP) }})
                                                        CP</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-xxs text-muted">
                                                    <i class="ri-bar-chart-grouped-line"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fs-13 mb-0">KKM</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h6 class="mb-0">
                                                        {{ $data->kkm }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer hstack gap-2">
                                    <button class="btn btn-warning btn-sm w-100" data-bs-toggle="modal"
                                        data-bs-target="#modalCapaianPembelajaran">
                                        <i class="ri-list-line align-bottom me-1"
                                            data-inisial_mp="{{ $data->kel_mapel }}"
                                            data-tingkat="{{ $data->tingkat }}"></i> Capaian Pembelajaran <br>
                                        {{ $data->mata_pelajaran }}
                                    </button>
                                    <button class="btn btn-info btn-sm w-100"><i
                                            class="ri-question-answer-line align-bottom me-1"></i>Materi Ajar <br>
                                        {{ $data->mata_pelajaran }}</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!--end card-->
            </div>
        </div>
        <!--end col-->


        <!-- TINGKA 12 ------------------------------------->
        <div class="col">
            <div class="card">
                <a class="card-body bg-info-subtle" data-bs-toggle="collapse" href="#leadrombel12" role="button"
                    aria-expanded="false" aria-controls="needsIdentified">
                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">TINGKAT 12</h5>
                    <p class="text-muted mb-0">Jumlah Kelas <span class="fw-medium">{{ $jmlRombel12 }} Rombel</span>
                    </p>
                </a>
            </div>
            <!--end card-->
            <div class="collapse show" id="leadrombel12">
                @if ($rombel12->isEmpty())
                    <div class="card mb-1">
                        <div class="card-body">
                            <p><strong>Tidak Mengajar di Tingkat 12</strong></p>
                        </div>
                    </div>
                @else
                    @foreach ($rombel12 as $data)
                        <div class="card mb-1">
                            <div class="card-body">
                                <a class="d-flex align-items-center" data-bs-toggle="collapse"
                                    href="#leadrombel12{{ $loop->iteration }}" role="button" aria-expanded="false"
                                    aria-controls="leadrombel12{{ $loop->iteration }}">
                                    <div class="flex-shrink-0 avatar-sm">
                                        <span
                                            class="mini-stat-icon avatar-title rounded-circle text-info bg-info-subtle fs-4">
                                            {{ $loop->iteration }}
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="fs-14 mb-1">{{ $data->mata_pelajaran }}</h6>
                                        <p class="badge bg-info-subtle text-info mb-0 fs-6">{{ $data->rombel }}</p>
                                    </div>
                                </a>
                            </div>
                            <div class="collapse border-top border-top-dashed" id="leadrombel12{{ $loop->iteration }}">
                                <div class="card-body">
                                    <ul class="list-unstyled vstack gap-2 mb-0">
                                        <li>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-xxs text-muted">
                                                    <i class="ri-user-line"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fs-13 mb-0">JUMLAH SISWA</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h6 class="mb-0">{{ $data->jumlahSiswa }}
                                                        ({{ terbilang($data->jumlahSiswa) }})
                                                        ORANG</h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-xxs text-muted">
                                                    <i class="ri-mac-line"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fs-13 mb-0">JUMLAH CP</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h6 class="mb-0">
                                                        {{ $data->jumlahCP }}
                                                        ({{ terbilang($data->jumlahCP) }})
                                                        CP
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 avatar-xxs text-muted">
                                                    <i class="ri-bar-chart-grouped-line"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <p class="fs-13 mb-0">KKM</p>
                                                </div>
                                                <div class="flex-shrink-0">
                                                    <h6 class="mb-0">
                                                        {{ $data->kkm }}
                                                    </h6>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-footer hstack gap-2">
                                    <button class="btn btn-warning btn-sm w-100" data-bs-toggle="modal"
                                        data-bs-target="#modalCapaianPembelajaran">
                                        <i class="ri-list-line align-bottom me-1"
                                            data-inisial_mp="{{ $data->kel_mapel }}"
                                            data-tingkat="{{ $data->tingkat }}"></i> Capaian Pembelajaran <br>
                                        {{ $data->mata_pelajaran }}
                                    </button>
                                    <button class="btn btn-info btn-sm w-100"><i
                                            class="ri-question-answer-line align-bottom me-1"></i>Materi Ajar <br>
                                        {{ $data->mata_pelajaran }}</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                <!--end card-->
            </div>
        </div>
        <!--end col-->
    </div>
    @include('pages.gurumapel.data-kbm-cp')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/cleave.js/cleave.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/crm-deals.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
