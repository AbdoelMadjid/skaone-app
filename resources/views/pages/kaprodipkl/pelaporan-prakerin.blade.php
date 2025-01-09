@extends('layouts.master')
@section('title')
    @lang('translation.pelaporan')
@endsection
@section('css')
    {{--  --}}
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}"
        rel="stylesheet" />
    <style>
        .pagination {
            justify-content: center;
            /* Paginasi di tengah */
            margin-top: 15px;
        }

        .page-item.disabled .page-link {
            pointer-events: none;
            opacity: 0.5;
        }

        .page-item.active .page-link {
            background-color: #007bff;
            color: #fff;
            border-color: #007bff;
        }

        .page-link {
            color: #007bff;
            cursor: pointer;
        }
    </style>
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
                                @include('pages.kaprodipkl.pelaporan-prakerin-peserta')
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="daftarPerusahaan" role="tabpanel">
                                @include('pages.kaprodipkl.pelaporan-prakerin-perusahaan')
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="guruPkl" role="tabpanel">
                                @include('pages.kaprodipkl.pelaporan-prakerin-gurupkl')
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane" id="absensiPeserta" role="tabpanel">
                                @include('pages.kaprodipkl.pelaporan-prakerin-absensi')
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane" id="jurnalPeserta" role="tabpanel">
                                @include('pages.kaprodipkl.pelaporan-prakerin-jurnal')
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
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        function initializeDynamicPagination(tableId, rowsPerPage = 10, maxVisiblePages = 3) {
            const table = $(`#${tableId}`);
            const tableBody = table.find("tbody");
            const rows = tableBody.find("tr");
            const totalRows = rows.length;
            const totalPages = Math.ceil(totalRows / rowsPerPage);

            // Tambahkan elemen pagination di bawah tabel
            const paginationId = `${tableId}-pagination`;
            table.after(`<nav><ul id="${paginationId}" class="pagination justify-content-center"></ul></nav>`);
            const pagination = $(`#${paginationId}`);

            // Fungsi untuk menampilkan baris berdasarkan halaman
            function showPage(page) {
                rows.hide(); // Sembunyikan semua baris
                const start = (page - 1) * rowsPerPage;
                const end = start + rowsPerPage;
                rows.slice(start, end).show(); // Tampilkan baris yang sesuai
            }

            // Fungsi untuk membuat kontrol paginasi
            function createPagination(currentPage) {
                pagination.empty(); // Hapus paginasi sebelumnya

                // Tombol "Halaman Awal"
                pagination.append(`
<li class="page-item${currentPage === 1 ? ' disabled' : ''}">
    <a class="page-link" href="#" data-page="1" aria-label="First">
        <i class="mdi mdi-chevron-double-left"></i>
    </a>
</li>
`);

                // Tombol "Previous"
                pagination.append(`
<li class="page-item${currentPage === 1 ? ' disabled' : ''}">
    <a class="page-link" href="#" aria-label="Previous">
        <i class="mdi mdi-chevron-left"></i>
    </a>
</li>
`);

                // Tambahkan nomor halaman
                let startPage = Math.max(currentPage - Math.floor(maxVisiblePages / 2), 1);
                let endPage = Math.min(startPage + maxVisiblePages - 1, totalPages);

                if (endPage - startPage + 1 < maxVisiblePages) {
                    startPage = Math.max(endPage - maxVisiblePages + 1, 1);
                }

                // Tambahkan "..." sebelum halaman jika diperlukan
                if (startPage > 1) {
                    pagination.append(`<li class="page-item"><a class="page-link" href="#" data-page="1">1</a></li>`);
                    if (startPage > 2) {
                        pagination.append(`<li class="page-item disabled"><span class="page-link">...</span></li>`);
                    }
                }

                // Tambahkan nomor halaman
                for (let i = startPage; i <= endPage; i++) {
                    pagination.append(`
    <li class="page-item${i === currentPage ? ' active' : ''}">
        <a class="page-link" href="#" data-page="${i}">${i}</a>
    </li>
`);
                }

                // Tambahkan "..." setelah halaman jika diperlukan
                if (endPage < totalPages) {
                    if (endPage < totalPages - 1) {
                        pagination.append(`<li class="page-item disabled"><span class="page-link">...</span></li>`);
                    }
                    pagination.append(
                        `<li class="page-item"><a class="page-link" href="#" data-page="${totalPages}">${totalPages}</a></li>`
                    );
                }

                // Tombol "Next"
                pagination.append(`
<li class="page-item${currentPage === totalPages ? ' disabled' : ''}">
    <a class="page-link" href="#" aria-label="Next">
        <i class="mdi mdi-chevron-right"></i>
    </a>
</li>
`);

                // Tombol "Halaman Akhir"
                pagination.append(`
<li class="page-item${currentPage === totalPages ? ' disabled' : ''}">
    <a class="page-link" href="#" data-page="${totalPages}" aria-label="Last">
        <i class="mdi mdi-chevron-double-right"></i>
    </a>
</li>
`);
            }

            // Event klik untuk navigasi halaman
            pagination.on("click", ".page-link", function(e) {
                e.preventDefault();
                const pageItem = $(this).closest("li");

                if (pageItem.hasClass("disabled") || pageItem.hasClass("active")) {
                    return;
                }

                let currentPage = pagination.find("li.active a").data("page");
                if ($(this).attr("aria-label") === "Previous") {
                    currentPage -= 1;
                } else if ($(this).attr("aria-label") === "Next") {
                    currentPage += 1;
                } else if ($(this).attr("aria-label") === "First") {
                    currentPage = 1;
                } else if ($(this).attr("aria-label") === "Last") {
                    currentPage = totalPages;
                } else {
                    currentPage = parseInt($(this).data("page"));
                }

                // Perbarui tampilan tabel dan paginasi
                showPage(currentPage);
                createPagination(currentPage);
            });

            // Inisialisasi pertama
            if (totalRows > 0) {
                showPage(1);
                createPagination(1);
            }
        }
        $(document).ready(function() {
            initializeDynamicPagination("pesertaprakerinTable", 25);
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
