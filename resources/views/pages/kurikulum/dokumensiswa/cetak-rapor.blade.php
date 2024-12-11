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
    <form id="createproduct-form" autocomplete="off" class="needs-validation" novalidate>
        <div class="row">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body checkout-tab">

                        <form action="#">
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
                                        <button class="nav-link fs-15 p-3 active" id="pills-finish-tab"
                                            data-bs-toggle="pill" data-bs-target="#pills-finish" type="button"
                                            role="tab" aria-controls="pills-finish" aria-selected="false"><i
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

                                <div class="tab-pane fade" id="pills-payment" role="tabpanel"
                                    aria-labelledby="pills-payment-tab">
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
                                    <div class="text-center py-5">

                                        <div class="mb-4">
                                            <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop"
                                                colors="primary:#0ab39c,secondary:#405189"
                                                style="width:120px;height:120px"></lord-icon>
                                        </div>
                                        <h5>Thank you ! Your Order is Completed !</h5>
                                        <p class="text-muted">You will receive an order confirmation email
                                            with
                                            details of your order.</p>

                                        <img src="data:image/png;base64,{{ $qrcodeImage }}" alt="QR Code">
                                        <h3 class="fw-semibold">Order ID: <a href="/apps_ecommerce_order_details"
                                                class="text-decoration-underline">VZ2451</a></h3>
                                        <button class="btn btn-primary mt-3"
                                            onclick="printContent('printable-area-depan')">Cetak Halaman Depan</button>
                                        <button class="btn btn-primary mt-3"
                                            onclick="printContent('printable-area-lampiran')">Cetak Halaman
                                            Lampiran</button>
                                        <button class="btn btn-primary mt-3"
                                            onclick="printContent('printable-area-nilai')">Cetak Halaman
                                            Nilai</button>
                                    </div>
                                </div>
                                <!-- end tab pane -->
                            </div>
                            <!-- end tab content -->
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <!-- end col -->

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Categories</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2"> <a href="#" class="float-end text-decoration-underline">Add
                                New</a>Select product category</p>
                        <select class="form-select" id="choices-category-input" name="choices-category-input"
                            data-choices data-choices-search-false>
                            <option value="Appliances">Appliances</option>
                            <option value="Automotive Accessories">Automotive Accessories</option>
                            <option value="Electronics">Electronics</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Furniture">Furniture</option>
                            <option value="Grocery">Grocery</option>
                            <option value="Kids">Kids</option>
                            <option value="Watches">Watches</option>
                        </select>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Tags</h5>
                    </div>
                    <div class="card-body">
                        <div class="hstack gap-3 align-items-start">
                            <div class="flex-grow-1">
                                <input class="form-control" data-choices data-choices-multiple-remove="true"
                                    placeholder="Enter tags" type="text" value="Cotton" />
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Product Short Description</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted mb-2">Add short description for product</p>
                        <textarea class="form-control" placeholder="Must enter minimum of a 100 characters" rows="3"></textarea>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

            </div>
        </div>
        <!-- end row -->
    </form>
@endsection
@section('script')
    {{-- --}}
@endsection
@section('script-bottom')
    <script>
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
