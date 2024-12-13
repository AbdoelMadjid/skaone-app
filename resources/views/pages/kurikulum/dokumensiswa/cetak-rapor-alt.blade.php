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
            <div class="card">
                <div class="card-body checkout-tab">


                    <div class="step-arrow-nav mt-n3 mx-n3 mb-3">

                        <ul class="nav nav-pills nav-justified custom-nav" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-15 p-3" id="pills-bill-info-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-bill-info" type="button" role="tab"
                                    aria-controls="pills-bill-info" aria-selected="true"><i
                                        class=" ri-account-pin-box-line fs-16 p-2 bg-primary-subtle text-primary rounded-circle align-middle me-2"></i>
                                    Identitas</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-15 p-3" id="pills-bill-address-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-bill-address" type="button" role="tab"
                                    aria-controls="pills-bill-address" aria-selected="false"><i
                                        class="ri-article-line fs-16 p-2 bg-primary-subtle text-primary rounded-circle align-middle me-2"></i>
                                    Nilai</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-15 p-3" id="pills-payment-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-payment" type="button" role="tab"
                                    aria-controls="pills-payment" aria-selected="false"><i
                                        class="ri-bank-card-line fs-16 p-2 bg-primary-subtle text-primary rounded-circle align-middle me-2"></i>
                                    Lampiran</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link fs-15 p-3 active" id="pills-finish-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-finish" type="button" role="tab"
                                    aria-controls="pills-finish" aria-selected="false"><i
                                        class="ri-printer-line fs-16 p-2 bg-primary-subtle text-primary rounded-circle align-middle me-2"></i>Cetak
                                </button>
                            </li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div class="tab-pane fade" id="pills-bill-info" role="tabpanel"
                            aria-labelledby="pills-bill-info-tab">
                            <div>
                                <h5 class="mb-1">Halaman Depan</h5>
                                <p class="text-muted mb-4">Cover, Idenitas Sekolah, Identitas Peserta Didik,
                                    Petunjuk Rapor</p>
                            </div>

                            <div>
                                <div id="printable-area-depan">
                                    @include('pages.kurikulum.dokumensiswa.cetak-rapor-identitas')
                                </div>
                            </div>
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane fade" id="pills-bill-address" role="tabpanel"
                            aria-labelledby="pills-bill-address-tab">
                            <div>
                                <h5 class="mb-1">Isi Raport</h5>
                                <p class="text-muted mb-4">Laporan Hasil Belajar, Praktik Kerja Lapangan,
                                    Ekstrakurikuler, Prestasi, Ketidakhadiran</p>
                            </div>

                            <div id="printable-area-nilai">
                                @include('pages.kurikulum.dokumensiswa.cetak-rapor-nilai')
                            </div>
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane fade" id="pills-payment" role="tabpanel" aria-labelledby="pills-payment-tab">
                            <div>
                                <h5 class="mb-1">Lampiran-Lampiran</h5>
                                <p class="text-muted mb-4">Keterangan Pindah Sekolah, Prestasi yang pernah di capai.
                                </p>
                            </div>

                            <div id="printable-area-lampiran">
                                @include('pages.kurikulum.dokumensiswa.cetak-rapor-lampiran')
                            </div>
                        </div>
                        <!-- end tab pane -->

                        <div class="tab-pane fade show active" id="pills-finish" role="tabpanel"
                            aria-labelledby="pills-finish-tab">

                            <div class="row">
                                <div class="col-md-8">
                                    <!-- Rounded Ribbon -->
                                    <div class="card ribbon-box border shadow-none mb-lg-0">
                                        <div class="card-body">
                                            <div class="ribbon ribbon-success round-shape">Pilih Data Cetak</div>
                                            <h5 class="fs-14 text-end">{{ $personal_id }}</h5>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card ribbon-box border shadow-none mb-lg-0">
                                        <div class="card-body">
                                            <div class="ribbon ribbon-success round-shape">Proses Cetak</div>
                                            <h5 class="fs-14 text-end">{{ $tahunAjaranAktif->tahunajaran }}
                                                {{ $semester->semester }}</h5>
                                            <div class="ribbon-content mt-4 text-muted">
                                                <div class="d-grid gap-2">
                                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                                        data-bs-target="#pilihCetak" id="pilihCetakBtn"
                                                        title="Distribusikan siswa yang dipilih">Pilih Data</button>
                                                    <button class="btn btn-soft-info mt-3"
                                                        onclick="printContent('printable-area-depan')">Cetak
                                                        Halaman Depan</button>
                                                    <button class="btn btn-soft-info mt-3"
                                                        onclick="printContent('printable-area-nilai')">Cetak
                                                        Halaman Nilai</button>
                                                    <button class="btn btn-soft-info mt-3"
                                                        onclick="printContent('printable-area-lampiran')">Cetak
                                                        Halaman Lampiran</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end tab pane -->
                    </div>
                    <!-- end tab content -->
                </div>
                <!-- end card body -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
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
    <script>
        $(document).ready(function() {
            $('#tahunajaran, #kode_kk, #tingkat').on('change', function() {
                var tahunajaran = $('#tahunajaran').val();
                var kode_kk = $('#kode_kk').val();
                var tingkat = $('#tingkat').val();

                if (tahunajaran && kode_kk && tingkat) {
                    $.ajax({
                        url: "{{ route('kurikulum.dokumentsiswa.getrombeloptions') }}",
                        type: "GET",
                        data: {
                            tahunajaran: tahunajaran,
                            kode_kk: kode_kk,
                            tingkat: tingkat
                        },
                        success: function(data) {
                            $('#kode_rombel').empty();
                            $('#kode_rombel').append(
                                '<option value="" selected>Pilih Rombel</option>');
                            $.each(data, function(index, item) {
                                $('#kode_rombel').append('<option value="' + item
                                    .kode_rombel + '">' + item.rombel + '</option>');
                            });
                        }
                    });
                } else {
                    $('#kode_rombel').empty();
                    $('#kode_rombel').append('<option value="" selected>Pilih Rombel</option>');
                }
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
