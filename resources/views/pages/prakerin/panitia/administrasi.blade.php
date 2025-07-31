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
            <div class="px-4 mx-n4 mt-n2 mb-0" data-simplebar style="height: calc(100vh - 280px);">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 col-sm-10">
                                        <div class="text-center mt-lg-2 pt-3">
                                            <h1 class="display-6 fw-semibold mb-3 lh-base">
                                                <span class="text-success">
                                                    {{ $identPrakerin?->nama ?? '-' }}
                                                </span>
                                            </h1>
                                            <p class="lead text-muted lh-base">
                                                Tanggal Pelaksanaan :
                                                {{ \Carbon\Carbon::parse($identPrakerin?->tanggal_mulai)->translatedFormat('l, d F Y') ?? '-' }}
                                                s.d.
                                                {{ \Carbon\Carbon::parse($identPrakerin?->tanggal_selesai)->translatedFormat('l, d F Y') ?? '-' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
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

                                    <li class="nav-item ms-auto">
                                        <div class="dropdown">
                                            <a class="nav-link fw-medium text-reset mb-n1" href="#" role="button"
                                                id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-settings-4-line align-middle me-1"></i> Settings
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
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body p-4">
                                <div class="tab-content">
                                    <div class="tab-pane" id="Sppd" role="tabpanel">
                                        @include('pages.prakerin.panitia.administrasi-sppd')
                                    </div>
                                    <div class="tab-pane" id="SuratPerintah" role="tabpanel">
                                        @include('pages.prakerin.panitia.administrasi-perintah')
                                    </div>
                                    <div class="tab-pane" id="SuratPengantar" role="tabpanel">
                                        @include('pages.prakerin.panitia.administrasi-pengantar')
                                    </div>
                                    <div class="tab-pane" id="Perjanjian" role="tabpanel">
                                        @include('pages.prakerin.panitia.administrasi-mou')
                                    </div>
                                </div><!--end tab-content-->
                            </div><!--end card-body-->
                        </div><!--end card -->
                    </div>
                    <!--end col-->
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
