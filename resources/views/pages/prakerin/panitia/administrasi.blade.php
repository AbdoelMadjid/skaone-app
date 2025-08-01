@extends('layouts.master')
@section('title')
    @lang('translation.administrasi')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.panitia')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">

                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 col-sm-10">
                                    <div class="text-center">
                                        <h1 class="display-8 fw-semibold lh-base">
                                            <span class="text-info">
                                                {{ $identPrakerin?->nama ?? '-' }}
                                            </span>
                                        </h1>
                                        <p class="lead lh-base">
                                            Tanggal Pelaksanaan :
                                            {{ \Carbon\Carbon::parse($identPrakerin?->tanggal_mulai)->translatedFormat('l, d F Y') ?? '-' }}
                                            s.d.
                                            {{ \Carbon\Carbon::parse($identPrakerin?->tanggal_selesai)->translatedFormat('l, d F Y') ?? '-' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-lg-4">
                                <div class="col-sm-2 align-self-start">
                                    {{--  --}}
                                </div>
                                <div class="col-sm-8 align-self-center">
                                    <form method="GET" id="tampilAdminPrakerin">
                                        <input type="hidden" name="tahunajaran"
                                            value="{{ $tahunAjaranAktif->tahunajaran }}">
                                        <select name="id_perusahaan" id="id_perusahaan" class="form-control"
                                            onchange="document.getElementById('tampilAdminPrakerin').submit();">
                                            <option value="">--- Pilih Perusahaan ---</option>
                                            @foreach ($perusahaanOptions as $id => $nama)
                                                <option value="{{ $id }}"
                                                    {{ request('id_perusahaan') == $id ? 'selected' : '' }}>
                                                    {{ $nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>
                                <div class="col-sm-2 align-self-end">
                                    {{--  --}}
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="hstack gap-3">
                                <div class="p-1 px-2">
                                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#Sppd" role="tab"
                                                aria-selected="true">SPPD Nego
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#SuratPerintah" role="tab"
                                                aria-selected="false">Surat Perintah
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#SuratPengantar" role="tab"
                                                aria-selected="false">Surat Pengantar
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-bs-toggle="tab" href="#Perjanjian" role="tab"
                                                aria-selected="false">Perjanjian (MOU)
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="p-1 px-2 ms-auto">
                                    <!-- Forms Content -->
                                    <div class="btn-group">
                                        <a class="nav-link fw-medium text-reset mb-n1" href="#" role="button"
                                            id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-printer-line align-middle me-1"></i> Cetak
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-md p-3" aria-labelledby="dropdownMenuLink1">
                                            <div class="d-grid gap-2">
                                                <button type="button" class="btn btn-soft-primary btn-sm"
                                                    id="btn-cetak-sppd">
                                                    SPPD
                                                </button>
                                                <button type="button" class="btn btn-soft-primary btn-sm"
                                                    id="btn-cetak-surat-perintah">
                                                    Surat Perintah
                                                </button>
                                                <button type="button" class="btn btn-soft-primary btn-sm"
                                                    id="btn-cetak-surat-pengantar">
                                                    Surat Pengantar
                                                </button>
                                                <button type="button" class="btn btn-soft-primary btn-sm"
                                                    id="btn-cetak-mou">
                                                    MOU
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="p-1 px-2">
                                    <div class="dropdown">
                                        <a class="nav-link fw-medium text-reset mb-n1" href="#" role="button"
                                            id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-pencil-fill align-middle me-1"></i> Input Data
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                            <li>
                                                <a href="{{ route('panitiaprakerin.administrasi.identitas-prakerin.index') }}"
                                                    class="dropdown-item">Identitas Prakerin</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('panitiaprakerin.administrasi.negosiator.index') }}"
                                                    class="dropdown-item">Negosiator</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('panitiaprakerin.administrasi.admin-nego.index') }}"
                                                    class="dropdown-item">Admin Negosiasi</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="Sppd" role="tabpanel">
                                    @include('pages.prakerin.panitia.administrasi-sppd')
                                </div>
                                <div class="tab-pane" id="SuratPerintah" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-2 align-self-start">
                                            {{--  --}}
                                        </div>
                                        <div class="col-sm-8 align-self-center">
                                            @include('pages.prakerin.panitia.administrasi-perintah')
                                        </div>
                                        <div class="col-sm-2 align-self-end">
                                            {{--  --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="SuratPengantar" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-2 align-self-start">
                                            {{--  --}}
                                        </div>
                                        <div class="col-sm-8 align-self-center">
                                            @include('pages.prakerin.panitia.administrasi-pengantar')
                                        </div>
                                        <div class="col-sm-2 align-self-end">
                                            {{--  --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="Perjanjian" role="tabpanel">
                                    <div class="row">
                                        <div class="col-sm-2 align-self-start">
                                            {{--  --}}
                                        </div>
                                        <div class="col-sm-8 align-self-center">
                                            @include('pages.prakerin.panitia.administrasi-mou')
                                        </div>
                                        <div class="col-sm-2 align-self-end">
                                            {{--  --}}
                                        </div>
                                    </div>
                                </div>
                            </div><!--end tab-content-->
                        </div><!--end card-body-->
                    </div><!--end card -->
                </div>
                <!--end col-->
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/ngeprint.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        $('#id_perusahaan').select2({
            width: '100%' // atau 'resolve'
        });
    </script>
    <script>
        setupPrintHandler({
            printButtonId: 'btn-cetak-surat-pengantar',
            tableContentId: 'cetak-surat-pengantar',
            title: 'Surat Pengantar',
            /* requiredFields: [{
                id: 'selectTanggalPanitia',
                message: 'Silakan pilih tanggal terlebih dahulu sebelum mencetak daftar hadir panitia.'
            }], */
            customStyle: `
                body { font-family: 'Times New Roman', serif; font-size: 12px; }
                table { width: 100%; border-collapse: collapse; }
                table, th, td { padding: 5px; vertical-align: top; }
                .break-page { page-break-before: always; }
            `
        });
    </script>
    <script>
        setupPrintHandler({
            printButtonId: 'btn-cetak-surat-perintah',
            tableContentId: 'cetak-surat-perintah',
            title: 'Surat Perintah',
            /* requiredFields: [{
                id: 'selectTanggalPanitia',
                message: 'Silakan pilih tanggal terlebih dahulu sebelum mencetak daftar hadir panitia.'
            }], */
            customStyle: `
                body { font-family: 'Times New Roman', serif; font-size: 12px; }
                table { width: 100%; border-collapse: collapse; }
                table, th, td { padding: 5px; vertical-align: top; }
                .break-page { page-break-before: always; }
            `
        });
    </script>
    <script>
        setupPrintHandler({
            printButtonId: 'btn-cetak-mou',
            tableContentId: 'cetak-mou',
            title: 'Surat Perintah',
            /* requiredFields: [{
                id: 'selectTanggalPanitia',
                message: 'Silakan pilih tanggal terlebih dahulu sebelum mencetak daftar hadir panitia.'
            }], */
            customStyle: `
                body { font-family: 'Times New Roman', serif; font-size: 12px; }
                table { width: 100%; border-collapse: collapse; }
                table, th, td { padding: 5px; vertical-align: top; }
            `
        });
    </script>
    <script>
        setupPrintHandler({
            printButtonId: 'btn-cetak-sppd',
            tableContentId: 'cetak-sppd',
            title: 'Surat Perintah',
            /* requiredFields: [{
                id: 'selectTanggalPanitia',
                message: 'Silakan pilih tanggal terlebih dahulu sebelum mencetak daftar hadir panitia.'
            }], */
            customStyle: `
                @page { size: 210mm 330mm landscape; margin: 5mm;}
                table { width: 100%; border-collapse: collapse; font:12px Times New Roman;}
                table th, table td { padding: 2px; vertical-align: top; }
            `
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
