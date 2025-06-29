@extends('layouts.master')
@section('title')
    @lang('translation.transkrip-peserta-didik')
@endsection
@section('css')
    <style>
        .cetak-rapor {
            border-collapse: collapse;
            /* Menggabungkan garis border */
            width: 100%;
            /* Agar tabel mengambil seluruh lebar */
            text-decoration-color: black
        }

        .cetak-rapor td {
            border: 1px solid black;
            /* Memberikan garis hitam pada semua th dan td */
            padding: 1px;
            /* Memberikan jarak dalam sel */
            text-align: left;
            /* Mengatur teks rata kiri */
        }

        .cetak-rapor th {
            border: 1px solid black;
            /* Memberikan garis hitam pada semua th dan td */
            background-color: #f2f2f2;
            /* Memberikan warna latar untuk header tabel */
            font-weight: bold;
            /* Mempertegas teks header */
            text-align: center;
            /* Mengatur teks rata kiri */
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
            @lang('translation.pesertadidik')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill"
                                    href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                    aria-selected="true">Surat Keterangan Lulus</a>
                                <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill"
                                    href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                    aria-selected="false">Transkrip Nilai Ijazah</a>
                                <a class="nav-link mb-2" id="v-pills-messages-tab" data-bs-toggle="pill"
                                    href="#v-pills-messages" role="tab" aria-controls="v-pills-messages"
                                    aria-selected="false">Transkrip Nilai Rapor</a>
                                <a class="nav-link" id="v-pills-settings-tab" data-bs-toggle="pill" href="#v-pills-settings"
                                    role="tab" aria-controls="v-pills-settings" aria-selected="false">Surat Keterangan
                                    Kelakuan Baik</a>
                            </div>
                        </div><!-- end col -->
                        <div class="col-md-9">
                            <div class="tab-content mt-4 mt-md-0" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                    aria-labelledby="v-pills-home-tab">
                                    <button class="btn btn-soft-info btn-sm" onclick="printContent('cetak-skl')"><i
                                            class="ri-printer-line"></i> Print</button>
                                    <button class="btn btn-soft-success btn-sm"
                                        onclick="window.location.href='{{ route('pesertadidik.download.skl') }}'">
                                        <i class="ri-download-line"></i> Download PDF
                                    </button>
                                    @include('pages.pesertadidik.transkrip-skl')
                                </div>
                                <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                    aria-labelledby="v-pills-profile-tab">
                                    <button class="btn btn-soft-info btn-sm" onclick="printContent('cetak-nilai-ijazah')"><i
                                            class="ri-printer-line"></i> Print</button>
                                    @include('pages.pesertadidik.transkrip-ijazah')
                                </div>
                                <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                                    aria-labelledby="v-pills-messages-tab">
                                    <button class="btn btn-soft-info btn-sm" onclick="printContent('cetak-nilai-rapor')"><i
                                            class="ri-printer-line"></i> Print</button>
                                    @include('pages.pesertadidik.transkrip-rapor')
                                </div>
                                <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                                    aria-labelledby="v-pills-settings-tab">
                                    <button class="btn btn-soft-info btn-sm" onclick="printContent('cetak-skkb')"><i
                                            class="ri-printer-line"></i> Print</button>
                                    <button class="btn btn-soft-success btn-sm"
                                        onclick="window.location.href='{{ route('pesertadidik.download.skkb') }}'">
                                        <i class="ri-download-line"></i> Download PDF
                                    </button>
                                    @include('pages.pesertadidik.transkrip-skkb')
                                </div>
                            </div>
                        </div><!--  end col -->
                    </div><!--end row-->
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dragula/dragula.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dom-autoscroller/dom-autoscroller.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/todo.init.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        /*         @if (session('toast_success'))
            showToast('success', '{{ session('toast_success') }}');
        @endif
        */        function printContent(elId) {
        var content = document.getElementById(elId).innerHTML;
        var originalContent = document.body.innerHTML;

        // Ganti konten halaman dengan elemen yang dipilih
        document.body.innerHTML = content;

        // Cetak halaman
        window.print();

        // Kembalikan konten asli setelah mencetak
        document.body.innerHTML = originalContent;
        //window.location.reload(); // Refresh halaman untuk memuat ulang skrip
        }
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
