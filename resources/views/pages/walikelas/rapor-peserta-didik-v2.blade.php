@extends('layouts.master')
@section('title')
    @lang('translation.rapor-peserta-didik')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
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
            border: 0 !important;
            border-collapse: collapse !important;
        }

        .cetak-rapor .no-border,
        .cetak-rapor .no-border th,
        .cetak-rapor .no-border td {
            border: none !important;
            /* Hapus border secara eksplisit */
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row mb-4">
                        <div class="col-auto order-1 d-block d-lg-none">
                            <button type="button" class="btn btn-soft-primary btn-icon btn-sm fs-16 file-menu-btn">
                                <i class="ri-menu-2-fill align-bottom"></i>
                            </button>
                        </div>
                        <div class="col-sm order-3 order-sm-2 mt-3 mt-sm-0">
                            <span class="fw-semibold mb-0">Rombel : {{ $waliKelas->rombel }}
                                [{{ $waliKelas->kode_rombel }}]<br>
                                Wali Kelas : {{ $personil->gelardepan }} {{ $personil->namalengkap }}
                                {{ $personil->gelarbelakang }}</span>
                        </div>

                        <div class="col-auto order-2 order-sm-3 ms-auto">
                            <div class="hstack gap-2">
                                <ul class="nav nav-pills card-header-pills nav-primary bg-light" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#nilai" role="tab">
                                            Rapor
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#pengajar" role="tab">
                                            Data Pengajar
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-bs-toggle="tab" href="#ranking" role="tab">
                                            Ranking Kelas
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="border border-dashed"></div>
                </div>
                <div>
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#rapor" role="tab"
                                aria-selected="false">
                                <i class="ri-archive-line text-muted align-bottom me-1"></i> Rapor Peserta Didik
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" id="images-tab" href="#guru" role="tab"
                                aria-selected="true">
                                <i class="ri-user-add-line text-muted align-bottom me-1"></i> Data Pengajar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#ranking" role="tab" aria-selected="false">
                                <i class="ri-list-unordered text-muted align-bottom me-1"></i> Rangkin Kelas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#statistik" role="tab" aria-selected="false">
                                <i class="ri-bar-chart-box-line text-muted align-bottom me-1"></i> Statistik
                            </a>
                        </li>
                        <li class="nav-item ms-auto">
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
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="rapor" role="tabpanel">
                            <div class="row">
                                <div class="col-xxl-12">
                                    <div class="row g-0">
                                        <div class="col-lg-9">
                                            <ul class="nav nav-tabs nav-tabs-custom nav-info mb-3" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab" href="#cover"
                                                        role="tab">
                                                        Cover
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#identsekolah"
                                                        role="tab">
                                                        Identitas
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#nilairapor"
                                                        role="tab">
                                                        Nilai Rapor
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab" href="#lampiran1"
                                                        role="tab">
                                                        Lampiran
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="px-4 mx-n4" data-simplebar style="height: calc(110vh - 486px);">
                                                <div class="table-responsive p-4" id="siswa-detail">
                                                    <div class="alert alert-primary alert-dismissible alert-label-icon rounded-label fade show"
                                                        role="alert">
                                                        <i class="ri-user-smile-line label-icon"></i><strong>Mohon di
                                                            perhatikan !!</strong>
                                                        -
                                                        Silakan pilih peserta didik dulu
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 border-start">
                                            <div class="card-header p-2 align-items-center">
                                                <h6 class="mt-2"><i class="ri-printer-line text-danger"></i> Pilih
                                                    Peserta Didik</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="px-4 mx-n4" data-simplebar
                                                    style="height: calc(110vh - 568px);">
                                                    <div class="vstack gap-3 to-do-menu list-unstyled">
                                                        @foreach ($siswaData as $index => $siswa)
                                                            <div class="row align-items-center g-3">
                                                                <div class="col-auto">
                                                                    <div
                                                                        class="avatar-sm p-1 py-2 h-auto bg-info-subtle rounded-3 pilih-siswa">
                                                                        <div class="text-center">
                                                                            <h5 class="mb-0">{{ $index + 1 }}</h5>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col">
                                                                    <h5 class="text-muted mt-0 mb-1 fs-13">
                                                                        {{ $siswa->nis }}
                                                                    </h5>
                                                                    <a href="{{ route('walikelas.raporsiswa', $siswa->nis) }}"
                                                                        class="text-reset fs-14 mb-0 link-detail-siswa"
                                                                        data-nis="{{ $siswa->nis }}">
                                                                        {{ $siswa->nama_lengkap }}
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="guru" role="tabpanel">
                            <div class="px-4 mx-n4" data-simplebar style="height: calc(110vh - 486px);">
                                <div class="table-responsive">
                                    @include('pages.walikelas.rapor-peserta-didik-pengajar')
                                </div>
                            </div>
                        </div><!--end tab-pane-->
                        <div class="tab-pane" id="ranking" role="tabpanel">
                            <div class="px-4 mx-n4" data-simplebar style="height: calc(110vh - 486px);">
                                <div class="col-lg-12">
                                    <div class="gap-2 hstack justify-content-end mb-4">
                                        <a href="{{ route('walikelas.downloadrankingsiswa') }}"
                                            class="btn btn-soft-primary btn-sm">Download
                                            Ranking</a>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    @include('pages.walikelas.rapor-peserta-didik-ranking')
                                </div>
                            </div>
                        </div><!--end tab-pane-->
                        <div class="tab-pane" id="statistik" role="tabpanel">

                        </div><!--end tab-pane-->
                    </div><!--end tab-content-->

                </div><!--end card-body-->
            </div><!--end card -->
        </div><!--end card -->
    </div><!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dragula/dragula.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dom-autoscroller/dom-autoscroller.min.js') }}"></script>
    <script>
        var isShowMenu = false;
        var emailMenuSidebar = document.getElementsByClassName('file-manager-sidebar');
        Array.from(document.querySelectorAll(".file-menu-btn")).forEach(function(item) {
            item.addEventListener("click", function() {
                Array.from(emailMenuSidebar).forEach(function(elm) {
                    elm.classList.add("menubar-show");
                    isShowMenu = true;
                });
            });
        });

        window.addEventListener('click', function(e) {
            if (document.querySelector(".file-manager-sidebar").classList.contains('menubar-show')) {
                if (!isShowMenu) {
                    document.querySelector(".file-manager-sidebar").classList.remove("menubar-show");
                }
                isShowMenu = false;
            }
        });
    </script>
    <script>
        $(document).on('click', '.link-detail-siswa', function(e) {
            e.preventDefault();

            var url = $(this).attr('href');

            // Ubah background elemen yang dipilih
            $('.pilih-siswa').removeClass('bg-info').addClass('bg-info-subtle'); // Reset semua
            $(this).closest('.row').find('.pilih-siswa').removeClass('bg-info-subtle').addClass(
                'bg-info'); // Highlight yang dipilih

            // Spinner saat loading
            $('#siswa-detail').html(`
            <div class="d-flex justify-content-center align-items-center" style="height: 150px;">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        `);

            // AJAX fetch
            $.ajax({
                url: url,
                type: 'GET',
                success: function(response) {
                    $('#siswa-detail').html(response);
                },
                error: function(xhr) {
                    $('#siswa-detail').html(`
                    <div class="alert alert-danger">
                        Terjadi kesalahan saat mengambil data siswa.
                    </div>
                `);
                }
            });
        });
    </script>
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
