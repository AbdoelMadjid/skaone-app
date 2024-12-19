@extends('layouts.master')
@section('title')
    @lang('translation.rapor-peserta-didik')
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
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.walikelas')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">

            <div class="card">
                <div class="card-header align-items-xl-center d-xl-flex">
                    <p class="text-muted flex-grow-1 mb-xl-0">
                        Rombel : {{ $waliKelas->rombel }} [{{ $waliKelas->kode_rombel }}]<br>
                        Wali Kelas : {{ $personil->gelardepan }} {{ $personil->namalengkap }}
                        {{ $personil->gelarbelakang }}
                    </p>
                    <div class="flex-shrink-0">
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
                </div><!-- end card header -->
                <div class="card-body">
                    <!-- Tab panes -->

                    <div class="tab-content">
                        <div class="tab-pane active" id="nilai" role="tabpanel">
                            @include('pages.walikelas.rapor-peserta-didik-nilai')
                        </div>
                        <div class="tab-pane" id="pengajar" role="tabpanel">
                            @include('pages.walikelas.rapor-peserta-didik-pengajar')
                        </div>
                        {{-- TAB RANKING --}}
                        <div class="tab-pane" id="ranking" role="tabpanel">
                            @include('pages.walikelas.rapor-peserta-didik-ranking')
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
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
                url: "/walikelas/rapor-peserta-didik/" + nis,
                method: "GET",
                success: function(response) {
                    $('#siswa-detail').html(response); // Render detail siswa
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
