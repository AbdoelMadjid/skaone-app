@extends('layouts.master')
@section('title')
    @lang('translation.cetak-rapor')
@endsection
@section('css')
    <style>
        .cetak-rapor {
            border-collapse: collapse;
            /* Menggabungkan garis border */
            width: 100%;
            /* Agar tabel mengambil seluruh lebar */
        }

        .cetak-rapor th,
        .cetak-rapor td {
            border: 1px solid black;
            /* Memberikan garis hitam pada semua th dan td */
            padding: 8px;
            /* Memberikan jarak dalam sel */
            text-align: left;
            /* Mengatur teks rata kiri */
        }

        .cetak-rapor th {
            background-color: #f2f2f2;
            /* Memberikan warna latar untuk header tabel */
            font-weight: bold;
            /* Mempertegas teks header */
        }

        @media print {
            .cetak-rapor tr {
                page-break-inside: avoid;
                /* Hindari potongan di tengah baris */
            }

            .page-break {
                page-break-before: always;
                /* Paksa halaman baru */
            }
        }

        .no-border {
            border: none;
        }

        .text-center {
            text-align: center;
        }

        .note {
            font-size: 11px;
            margin-top: 10px;
        }
    </style>
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.dokumensiswa')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="orderList">
                <div class="card-header border-0">
                    <div class="row align-items-center gy-3">
                        <div class="col-sm">
                            <h5 class="card-title mb-0">Cetak Rapor</h5>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex gap-1 flex-wrap">
                                @if ($dataPilCR)
                                @else
                                    @can('create kurikulum/dokumentsiswa/cetak-rapor')
                                        <a class="btn btn-primary action"
                                            href="{{ route('kurikulum.dokumentsiswa.cetak-rapor.create') }}">Tambah</a>
                                    @endcan
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="nav nav-pills flex-column nav-pills-tab custom-verti-nav-pills text-center"
                                role="tablist" aria-orientation="vertical">
                                <a class="nav-link active show" id="custom-v-pills-data-cetak-tab" data-bs-toggle="pill"
                                    href="#custom-v-pills-data-cetak" role="tab"
                                    aria-controls="custom-v-pills-data-cetak" aria-selected="true">
                                    <i class="ri-printer-line d-block fs-20 mb-1"></i>Data Cetak</a>
                                <a class="nav-link" id="custom-v-pills-depan-tab" data-bs-toggle="pill"
                                    href="#custom-v-pills-depan" role="tab" aria-controls="custom-v-pills-depan"
                                    aria-selected="true">
                                    <i class="ri-account-pin-box-line d-block fs-20 mb-1"></i>Halaman Depan</a>
                                <a class="nav-link" id="custom-v-pills-nilai-tab" data-bs-toggle="pill"
                                    href="#custom-v-pills-nilai" role="tab" aria-controls="custom-v-pills-nilai"
                                    aria-selected="false">
                                    <i class="ri-article-line d-block fs-20 mb-1"></i>Daftar Nilai</a>
                                <a class="nav-link" id="custom-v-pills-lampiran-tab" data-bs-toggle="pill"
                                    href="#custom-v-pills-lampiran" role="tab" aria-controls="custom-v-pills-lampiran"
                                    aria-selected="false">
                                    <i class="ri-bank-card-line d-block fs-20 mb-1"></i>Lampiran</a>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-lg-9">
                            <div class="tab-content mt-3 mt-lg-0">
                                <div class="tab-pane fade active show" id="custom-v-pills-data-cetak" role="tabpanel"
                                    aria-labelledby="custom-v-pills-data-cetak-tab">
                                    <div class="row">
                                        <div class="col-md-9">
                                            <!-- Rounded Ribbon -->
                                            <div class="card ribbon-box border shadow-none mb-lg-0">
                                                <div class="card-body">
                                                    <div class="ribbon ribbon-primary round-shape">Pilih data Cetak</div>
                                                    <h5 class="fs-14 text-end"></h5>
                                                    <div class="ribbon-content mt-5">

                                                        @include('pages.kurikulum.dokumensiswa.cetak-rapor-form')

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <!-- Right Ribbon -->
                                            <div class="card ribbon-box border shadow-none right mb-lg-0">
                                                <div class="card-body">
                                                    <div class="ribbon ribbon-info round-shape">Cetak</div>
                                                    <h5 class="fs-14 text-start">{{ $personal_id }}</h5>
                                                    <div class="ribbon-content mt-4 text-muted">
                                                        <div class="d-grid gap-2">
                                                            <button class="btn btn-soft-info mt-2"
                                                                onclick="printContent('printable-area-depan')">
                                                                Halaman Depan</button>
                                                            <button class="btn btn-soft-info mt-2"
                                                                onclick="printContent('printable-area-nilai')">
                                                                Halaman Nilai</button>
                                                            <button class="btn btn-soft-info mt-2"
                                                                onclick="printContent('printable-area-lampiran')">
                                                                Halaman Lampiran</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div><!--end tab-pane-->
                                <div class="tab-pane fade" id="custom-v-pills-depan" role="tabpanel"
                                    aria-labelledby="custom-v-pills-depan-tab">
                                    <div data-simplebar data-simplebar-auto-hide="false" style="max-height: 380px;"
                                        class="px-4">
                                        <div id="printable-area-depan">
                                            @include('pages.kurikulum.dokumensiswa.cetak-rapor-identitas')
                                        </div>
                                    </div>
                                </div><!--end tab-pane-->
                                <div class="tab-pane fade" id="custom-v-pills-nilai" role="tabpanel"
                                    aria-labelledby="custom-v-pills-nilai-tab">
                                    <div data-simplebar data-simplebar-auto-hide="false" style="max-height: 380px;"
                                        class="px-4">
                                        <div id="printable-area-nilai">
                                            @include('pages.kurikulum.dokumensiswa.cetak-rapor-nilai')
                                        </div>
                                    </div>
                                </div><!--end tab-pane-->
                                <div class="tab-pane fade" id="custom-v-pills-lampiran" role="tabpanel"
                                    aria-labelledby="custom-v-pills-lampiran-tab">
                                    <div data-simplebar data-simplebar-auto-hide="false" style="max-height: 380px;"
                                        class="px-4">
                                        <div id="printable-area-lampiran">
                                            @include('pages.kurikulum.dokumensiswa.cetak-rapor-lampiran')
                                        </div>
                                    </div>
                                </div><!--end tab-pane-->
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->
                </div>
            </div>
        </div>

    </div>
    <!--end col-->
    </div>
    @include('pages.kurikulum.dokumensiswa.cetak-rapor-input')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        @if (session('toast_success'))
            showToast('success', '{{ session('toast_success') }}');
        @endif
        function printContent(elId) {
            var content = document.getElementById(elId).innerHTML;
            var originalContent = document.body.innerHTML;

            // Ganti konten halaman dengan elemen yang dipilih
            document.body.innerHTML = content;

            // Cetak halaman
            window.print();

            // Kembalikan konten asli setelah mencetak
            document.body.innerHTML = originalContent;
            window.location.reload(); // Refresh halaman untuk memuat ulang skrip
        }
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
