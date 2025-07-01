@extends('layouts.master')
@section('title')
    @lang('translation.arsip-wali-kelas')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.dokumen-guru')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header border-bottom-dashed border-bottom">
            <div class="row align-items-center gy-3">
                <div class="col-sm">
                    <div>
                        <div class="row" id="info-wali-siswa">
                            @include('pages.kurikulum.dokumenguru.arsip-walikelas-info')
                        </div>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <button type="button" id="btn-ranking-pertk" class="btn btn-soft-primary btn-sm">Ranking
                        pertingkat</button>
                </div>
                <div class="col-sm-auto">
                    <button type="button" id="btn-ranking-pertkkk" class="btn btn-soft-primary btn-sm">Ranking
                        pertingkat per kk</button>
                </div>
                <div class="col-sm-auto">
                    @if ($personal_id == 'Pgw_0016')
                        <form method="GET" action="{{ route('kurikulum.dokumenguru.generaterankingsiswa') }}">
                            <button class="btn btn-success btn-sm">Generate Ranking Manual</button>
                        </form>
                    @endif
                </div>
                <div class="col-sm-auto">
                    <button onclick="printRanking()" class="btn btn-primary btn-sm">Cetak Ranking</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-xl-9">
                    <div class="mb-3">
                        <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#dataKelas" role="tab"
                                    aria-selected="false">
                                    <i class="las la-address-card text-muted align-bottom me-1 fs-4"></i> Siswa
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" id="images-tab" href="#abSensi" role="tab"
                                    aria-selected="true">
                                    <i class="las la-calendar-check text-muted align-bottom me-1 fs-4"></i> Absensi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#ekstraKurikuler" role="tab"
                                    aria-selected="false">
                                    <i class="las la-table-tennis text-muted align-bottom me-1 fs-4"></i>
                                    Eskul
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#prestasiSiswa" role="tab"
                                    aria-selected="false">
                                    <i class="las la-trophy text-muted align-bottom me-1 fs-4"></i> Prestasi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#catatanWaliKelas" role="tab"
                                    aria-selected="false">
                                    <i class="las la-file-alt text-muted align-bottom me-1 fs-4"></i> Catatan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kenaikan" role="tab"
                                    aria-selected="false">
                                    <i class="las la-upload text-muted align-bottom me-1 fs-4"></i> Kenaikan
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#ranking" role="tab"
                                    aria-selected="false">
                                    <i class="las la-list text-muted align-bottom me-1 fs-4"></i> Ranking
                                </a>
                            </li>
                            {{-- <li class="nav-item ms-auto">
                                <div class="dropdown">
                                    <a class="nav-link fw-medium text-reset mb-n1" href="#" role="button"
                                        id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ri-settings-4-line align-middle me-1"></i> Settings
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <li><a class="dropdown-item" href="#">Search Settings</a></li>
                                        <li><a class="dropdown-item" href="#">Advanced Search</a></li>
                                        <li><a class="dropdown-item" href="#">Search History</a></li>
                                        <li><a class="dropdown-item" href="#">Search Help</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a class="dropdown-item" href="#">Dark Mode:Off</a></li>
                                    </ul>
                                </div>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 376px);">
                        <div id="walikelas-detail">
                            <div class="alert alert-primary alert-dismissible alert-label-icon rounded-label fade show mt-4"
                                role="alert">
                                <i class="ri-user-smile-line label-icon"></i><strong>Mohon di perhatikan
                                    !!</strong> -
                                Silakan klik tombol konfirmasi untuk menampilkan data.
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                    {{-- <div id="tampil-ranking" class="mt-4"></div> --}}
                </div>
                <!-- end col -->

                <div class="col-xl-3">
                    <div class="sticky-side-div">
                        <div class="card">
                            <div class="card-header border-bottom-dashed">
                                <h5 class="card-title mb-0">Pilih Rombongan Belajar</h5>
                            </div>
                            <div class="card-body pt-2">
                                @include('pages.kurikulum.dokumenguru.arsip-walikelas-form')
                                <!-- end table-responsive -->

                                @if ($personal_id == 'Pgw_0016')
                                    <button type="button" class="btn btn-soft-primary btn-sm w-100 mt-3"
                                        data-bs-toggle="modal" data-bs-target="#tambahPilihArsipWaliKelas"><i
                                            class="ri-file-download-line align-bottom me-1"></i>
                                        Tambah</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- end stickey -->
                </div>
            </div>
        </div>
    </div>
    @include('pages.kurikulum.dokumenguru.arsip-walikelas-tambah-form')
    <div class="modal fade" id="modal-ranking-pertk" tabindex="-1" aria-labelledby="rankingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rankingModalLabel">Ranking per Tingkat</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body" id="tampil-ranking">
                    {{-- Konten ranking akan dimuat di sini --}}
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-ranking-pertk-kk" tabindex="-1" aria-labelledby="rankingKKModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rankingKKModalLabel">Ranking per Tingkat per Kompetensi Keahlian</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body" id="tampil-ranking-kk">
                    {{-- Konten akan dimuat di sini --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        @if (session('toast_success'))
            showToast('success', '{{ session('toast_success') }}');
        @endif
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
