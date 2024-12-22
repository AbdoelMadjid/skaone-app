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
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
            <div class="p-4 d-flex flex-column h-100">
                <div class="card-body text-center">
                    <div class="position-relative d-inline-block" id="foto-siswa-container">
                        <img id="foto-siswa" src="/build/images/users/avatar-10.jpg" alt=""
                            class="avatar-lg rounded-circle img-thumbnail">
                        <span class="contact-active position-absolute rounded-circle bg-success">
                            <span class="visually-hidden"></span>
                        </span>
                    </div>
                    <h5 class="mt-4 mb-1" id='nama-siswa'> </h5>
                    <p class="text-muted" id='nis-siswa'> </p>
                </div>
                <div class="mb-3 mt-4">
                    Pilih Peserta Didik {{ $waliKelas->rombel }}
                </div>

                <div class="px-4 mx-n4" data-simplebar style="height: calc(110vh - 568px);">
                    <div class="vstack gap-3 to-do-menu list-unstyled">
                        @foreach ($siswaData as $index => $siswa)
                            <div class="row align-items-center g-3">
                                <div class="col-auto">
                                    <div class="avatar-sm p-1 py-2 h-auto bg-info-subtle rounded-3 pilih-siswa">
                                        <div class="text-center">
                                            <h5 class="mb-0">{{ $index + 1 }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="text-muted mt-0 mb-1 fs-13">{{ $siswa->nis }}
                                    </h5>
                                    <a href="#" class="text-reset fs-14 mb-0 detail-link"
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
        <!--end side content-->
        <div class="file-manager-content w-100 p-4 pb-0">
            <div class="row mb-4">
                <div class="col-auto order-1 d-block d-lg-none">
                    <button type="button" class="btn btn-soft-success btn-icon btn-sm fs-16 file-menu-btn">
                        <i class="ri-menu-2-fill align-bottom"></i>
                    </button>
                </div>
                <div class="col-sm order-3 order-sm-2 mt-3 mt-sm-0">
                    <span class="fw-semibold mb-0">Rombel : {{ $waliKelas->rombel }} [{{ $waliKelas->kode_rombel }}]<br>
                        Wali Kelas : {{ $personil->gelardepan }} {{ $personil->namalengkap }}
                        {{ $personil->gelarbelakang }}</span>
                </div>

                <div class="col-auto order-2 order-sm-3 ms-auto">
                    <div class="hstack gap-2">
                        <ul class="nav nav-pills card-header-pills" role="tablist">
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
            <div class="tab-content">
                <div class="tab-pane active" id="nilai" role="tabpanel">
                    <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#cover" role="tab">
                                Cover
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#identsekolah" role="tab">
                                Identitas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#nilairapor" role="tab">
                                Nilai Rapor
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#activitas" role="tab">
                                Aktivitas Siswa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#lampiran1" role="tab">
                                Lampiran
                            </a>
                        </li>
                    </ul>
                    <div class="px-4 mx-n4" data-simplebar style="height: calc(110vh - 356px);">
                        <div class="table-responsive" id="siswa-detail">
                            <div class="alert alert-primary alert-dismissible alert-label-icon rounded-label fade show"
                                role="alert">
                                <i class="ri-user-smile-line label-icon"></i><strong>Mohon di perhatikan !!</strong> -
                                Silakan pilih peserta didik dulu
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="pengajar" role="tabpanel">
                    <div class="px-4 mx-n4" data-simplebar style="height: calc(110vh - 326px);">
                        <div class="table-responsive">
                            @include('pages.walikelas.rapor-peserta-didik-pengajar')
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="ranking" role="tabpanel">
                    <div class="col-lg-12">
                        <div class="gap-2 hstack justify-content-end mb-4">
                            <a href="{{ route('walikelas.downloadrankingsiswa') }}"
                                class="btn btn-soft-info btn-sm">Download
                                Ranking</a>
                        </div>
                    </div>
                    <div class="px-4 mx-n4" data-simplebar style="height: calc(100vh - 336px);">
                        <div class="table-responsive">
                            @include('pages.walikelas.rapor-peserta-didik-ranking')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dragula/dragula.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dom-autoscroller/dom-autoscroller.min.js') }}"></script>
    <script>
        $(document).on('click', '.detail-link', function(e) {
            e.preventDefault(); // Mencegah reload halaman
            var nis = $(this).data('nis');

            // Ubah background elemen yang dipilih
            $('.pilih-siswa').removeClass('bg-danger-subtle').addClass('bg-info-subtle'); // Reset semua
            $(this).closest('.row').find('.pilih-siswa').removeClass('bg-info-subtle').addClass(
                'bg-danger-subtle'); // Highlight yang dipilih

            // AJAX request
            $.ajax({
                url: "/walikelas/rapor-peserta-didik/detail-peserta-didik/" + nis,
                method: "GET",
                success: function(response) {
                    // Perbarui nama dan NIS di halaman
                    $('#nama-siswa').text(response.nama_lengkap);
                    $('#nis-siswa').text(response.nis);

                    // Perbarui foto siswa
                    if (response.foto) {
                        $('#foto-siswa').attr('src', '/images/peserta_didik/' + response.foto);
                    } else {
                        $('#foto-siswa').attr('src',
                            '/build/images/users/avatar-10.jpg'); // Default jika foto tidak ada
                    }
                },
                error: function(xhr) {
                    $('#nama-siswa').text("Siswa tidak ditemukan.");
                    $('#nis-siswa').text("");
                    $('#foto-siswa').attr('src',
                        '/build/images/users/avatar-10.jpg'); // Kembali ke default
                }
            });

            // AJAX request
            $.ajax({
                url: "/walikelas/rapor-peserta-didik/" + nis,
                method: "GET",
                success: function(response) {
                    $('#siswa-detail').html(response); // Render detail siswa
                    // Kembali ke tab default (Cover)
                    var defaultTab = new bootstrap.Tab(document.querySelector(
                        '.nav-link[href="#cover"]'));
                    defaultTab.show();
                },
                error: function(xhr) {
                    $('#siswa-detail').html(
                        '<p>Data siswa tidak ditemukan.</p>'); // Tampilkan pesan error
                }
            });
        });
    </script>
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
