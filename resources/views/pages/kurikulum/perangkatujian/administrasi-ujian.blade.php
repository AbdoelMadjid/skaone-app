@extends('layouts.master')
@section('title')
    @lang('translation.administrasi-ujian')
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
                                    Administrasi Ujian <br>
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

                    <div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasExample"
                        aria-labelledby="offcanvasExampleLabel">
                        <div class="offcanvas-body">
                            <button type="button" class="btn-close text-reset float-end" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                            <div class="d-flex flex-column h-100 justify-content-center align-items-center">
                                <div class="search-voice">
                                    <i class="ri-mic-fill align-middle"></i>
                                    <span class="voice-wave"></span>
                                    <span class="voice-wave"></span>
                                    <span class="voice-wave"></span>
                                </div>
                                <h4>Talk to me, what can I do for you?</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#about" role="tab"
                                aria-selected="false">
                                <i class="ri-question-line text-muted align-bottom me-1"></i> Ruang Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" id="images-tab" href="#team" role="tab"
                                aria-selected="true">
                                <i class="mdi mdi-account-circle text-muted align-bottom me-1"></i> Peserta Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#faqs" role="tab" aria-selected="false">
                                <i class="ri-list-unordered text-muted align-bottom me-1"></i> Jadwal Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#develop" role="tab" aria-selected="false">
                                <i class="ri-video-line text-muted align-bottom me-1"></i> Pengawas Ujian
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
                                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.ruang-ujian.index') }}"
                                            class="dropdown-item">Ruang Ujian</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item">Peserta
                                            Ujian</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item">Jadwal
                                            Ujian</a>
                                    </li>
                                    <li>
                                        <a href="#" class="dropdown-item">Pengawas
                                            Ujian</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="about" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.ruang-ujian')
                        </div>
                        <div class="tab-pane" id="team" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.peserta-ujian')
                        </div><!--end tab-pane-->
                        <div class="tab-pane" id="faqs" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.jadwal-ujian')
                        </div><!--end tab-pane-->
                        <div class="tab-pane" id="develop" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.pengawas-ujian')
                        </div><!--end tab-pane-->
                    </div><!--end tab-content-->
                </div><!--end card-body-->
            </div><!--end card -->
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    {{-- --}}
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
