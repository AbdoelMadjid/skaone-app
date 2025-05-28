@extends('layouts.master')
@section('title')
    @lang('translation.pelaksanaan-ujian')
@endsection
@section('css')
    {{-- --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.perangkat-ujian')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-sm-10">
                            <div class="text-center mt-lg-2 pt-3">
                                <h1 class="display-6 fw-semibold mb-3 lh-base">
                                    Pelaksanaan Ujian <br>
                                    <span class="text-success">
                                        {{ $identitasUjian?->nama_ujian ?? '-' }}
                                    </span>
                                </h1>
                                <p class="lead text-muted lh-base">
                                    Tanggal Pelaksanaan Ujian :
                                    {{ \Carbon\Carbon::parse($identitasUjian?->tgl_ujian_awal)->translatedFormat('l, d F Y') ?? '-' }}
                                    s.d.
                                    {{ \Carbon\Carbon::parse($identitasUjian?->tgl_ujian_akhir)->translatedFormat('l, d F Y') ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#DaftarHadirPeserta" role="tab"
                                aria-selected="true">
                                <i class="ri-home-4-line text-muted align-bottom me-1"></i> Peserta Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#DaftarHadirPanitia" role="tab"
                                aria-selected="false">
                                <i class="mdi mdi-account-circle text-muted align-bottom me-1"></i> Panitia Ujian
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="DaftarHadirPeserta" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanpelaksanaan.daftar-hadir-peserta')
                        </div>
                        <div class="tab-pane" id="DaftarHadirPanitia" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanpelaksanaan.daftar-hadir-panitia')
                        </div>
                    </div><!--end tab-content-->
                </div><!--end card-body-->
            </div><!--end card -->
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
@endsection
@section('script-bottom')
    <script>
        function loadPeserta() {
            let nomorRuang = $('#ruangan').val();
            let posisiDuduk = $('#posisi_duduk').val();

            if (nomorRuang !== "" && posisiDuduk !== "") {
                $.ajax({
                    url: '{{ route('kurikulum.perangkatujian.peserta-by-ruang') }}',
                    type: 'GET',
                    data: {
                        nomor_ruang: nomorRuang,
                        posisi_duduk: posisiDuduk
                    },
                    success: function(response) {
                        $('#tabel-peserta').html(response);
                    },
                    error: function() {
                        $('#tabel-peserta').html(
                            '<div class="alert alert-danger">Gagal memuat data peserta.</div>');
                    }
                });
            } else {
                $('#tabel-peserta').html('');
            }
        }

        $('#ruangan, #posisi_duduk').change(loadPeserta);
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const printButton = document.getElementById('btn-print-daftar-peserta');
            if (!printButton) {
                console.error("Tombol print tidak ditemukan");
                return;
            }

            printButton.addEventListener('click', function() {
                const content = document.getElementById('tabel-peserta');
                if (!content) {
                    console.error("Elemen tabel tidak ditemukan");
                    return;
                }

                const win = window.open('', '_blank');
                win.document.write(`
            <html>
            <head>
                <title>Daftar Pengawas</title>
                <style>
                    body { font-family: Arial, sans-serif; font-size: 12px; }
                    table { width: 100%; border-collapse: collapse; }
                    table, th, td { border: 1px solid black; }
                    th, td { padding: 5px; text-align: center; }
                    h4 { margin: 5px 0; text-align: center; }
                </style>
            </head>
            <body>
                ${content.innerHTML}
            </body>
            </html>
        `);
                win.document.close();
                win.focus();
                win.print();
                win.close();
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
