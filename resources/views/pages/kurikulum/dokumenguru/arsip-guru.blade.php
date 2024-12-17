@extends('layouts.master')
@section('title')
    @lang('translation.arsip')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <style>
        .list-rombel-wrapper {
            display: none;
            /* Sembunyikan dropdown sementara */
        }

        .list-gurumapel-wrapper {
            display: none;
            /* Sembunyikan dropdown sementara */
        }

        .loading-message {
            display: block;
            text-align: center;
            font-size: 14px;
            color: #666;
        }
    </style>
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.dokumenguru')
        @endslot
    @endcomponent
    <div class="row">

        <div class="col-xl-9 col-lg-8">
            <div>
                <div class="card">
                    <div class="card-body border border-dashed border-end-0 border-start-0">
                        <form>
                            <div class="row g-3">
                                <div class="col-xxl-4 col-sm-6">
                                    <div class="search-box">
                                        <input type="text" class="form-control search"
                                            placeholder="Search for order ID, customer, order status or something...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-5 col-sm-4">
                                    <div class="filter-choices-input">
                                        <div class="loading-message">Memuat data...</div>
                                        <div class="list-gurumapel-wrapper">
                                            <select class="form-control list-gurumapel" name="gurumapel"
                                                style="width: 100%;" disabled></select>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-xxl-3 col-sm-4">
                                    <div class="filter-choices-input">
                                        <div class="loading-message">Memuat data...</div>
                                        <div class="list-rombel-wrapper">
                                            <select class="form-control list-rombel" name="rombel" style="width: 100%;"
                                                disabled></select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#productnav-all"
                                            role="tab">
                                            All <span
                                                class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">12</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-published"
                                            role="tab">
                                            Published <span
                                                class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">5</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#productnav-draft"
                                            role="tab">
                                            Draft
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

                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="productnav-all" role="tabpanel">

                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="productnav-published" role="tabpanel">
                                <div id="table-product-list-published" class="table-card gridjs-border-none"></div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="productnav-draft" role="tabpanel">
                                <div class="py-4 text-center">
                                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                        colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px">
                                    </lord-icon>
                                    <h5 class="mt-4">Sorry! No Result Found</h5>
                                </div>
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end col -->

        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <h5 class="fs-16">Filters</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="#" class="text-decoration-underline" id="clearall">Clear All</a>
                        </div>
                    </div>

                    <div class="filter-choices-input">
                        <select class="form-select mb-3 filter-selector" aria-label="Default select example">
                            <option value="">Pilih Filter</option>
                            <option value="gurumapel">Guru Mata Pelajaran</option>
                            <option value="rombel">Rombongan Belajar</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi Select2 untuk Guru Mapel
            $(".list-gurumapel").select2({
                placeholder: "Pilih Guru Mapel",
            });

            // Inisialisasi Select2 untuk Rombel
            $(".list-rombel").select2({
                placeholder: "Pilih Rombongan Belajar",
            });

            // Event handler untuk perubahan dropdown filter
            $(".filter-selector").on("change", function() {
                var selectedValue = $(this).val();

                // Reset semua dropdown ke disabled
                $(".list-gurumapel").prop("disabled", true);
                $(".list-rombel").prop("disabled", true);

                // Kembali ke opsi default ("All") untuk dropdown yang dinonaktifkan
                $(".list-gurumapel").val("All").trigger("change");
                $(".list-rombel").val("All").trigger("change");

                // Aktifkan dropdown sesuai pilihan
                if (selectedValue === "gurumapel") {
                    $(".list-gurumapel").prop("disabled", false);
                } else if (selectedValue === "rombel") {
                    $(".list-rombel").prop("disabled", false);
                }
            });

            // Simulasi Memuat Data untuk Guru Mapel
            // Fetch data
            $.ajax({
                url: '/kurikulum/dokumenguru/get-guru', // Endpoint backend
                method: 'GET',
                success: function(data) {
                    // Tambahkan opsi "Pilih Guru Mapel"
                    var options = [{
                            id: 'All',
                            text: 'Pilih Guru Mapel'
                        }, // Opsi pertama dengan value All
                    ];

                    // Tambahkan data guru ke dalam opsi
                    data.forEach(function(guru) {
                        options.push({
                            id: guru.id_personil,
                            text: `${guru.gelardepan ? guru.gelardepan + ' ' : ''}${guru.namalengkap}${guru.gelarbelakang ? ', ' + guru.gelarbelakang : ''}`
                        });
                    });

                    // Masukkan data ke dalam dropdown
                    $(".list-gurumapel").select2({
                        data: options,
                        placeholder: "Pilih Guru",
                    });

                    // Tampilkan dropdown setelah data selesai dimuat
                    $(".loading-message").hide();
                    $(".list-gurumapel-wrapper").fadeIn();
                },
                error: function(error) {
                    console.error('Error fetching data:', error);

                    // Tampilkan pesan error dan sembunyikan dropdown
                    $(".loading-message").text("Gagal memuat data.");
                    $(".list-gurumapel-wrapper").hide();
                }
            });

            // Simulasi Memuat Data untuk Rombel
            $.ajax({
                url: '/kurikulum/dokumenguru/get-rombel',
                method: 'GET',
                beforeSend: function() {
                    // Pastikan dropdown tersembunyi saat data belum siap
                    $(".list-rombel-wrapper").hide();
                    $(".loading-message").show();
                },
                success: function(data) {
                    // Clear existing options
                    $(".list-rombel").empty();

                    // Add default option
                    $(".list-rombel").append(
                        $("<option>", {
                            value: "All",
                            text: "Pilih Rombel"
                        })
                    );

                    // Loop through grouped data
                    $.each(data, function(id_kk, rombels) {
                        const groupLabel = rombels[0]?.nama_kk || 'Unknown';

                        // Create optgroup
                        const optgroup = $("<optgroup>", {
                            label: groupLabel
                        });

                        // Add options to the optgroup
                        rombels.forEach(function(rombel) {
                            optgroup.append(
                                $("<option>", {
                                    value: rombel.kode_rombel,
                                    text: rombel.rombel
                                })
                            );
                        });

                        // Append optgroup to the select
                        $(".list-rombel").append(optgroup);
                    });

                    // Tampilkan dropdown setelah data selesai dimuat
                    $(".loading-message").hide();
                    $(".list-rombel-wrapper").fadeIn();
                },
                error: function(error) {
                    console.error('Error fetching data:', error);
                    $(".loading-message").text('Gagal memuat data.');
                }
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
