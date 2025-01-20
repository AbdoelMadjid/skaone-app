@extends('layouts.master')
@section('title')
    @lang('translation.about')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('build/libs/glightbox/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
@endsection
@section('content')
    @if (auth()->check() &&
            auth()->user()->hasAnyRole(['master']))
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row justify-content-center">
                            <div class="col-lg-8 col-sm-10">
                                <div class="text-center mt-lg-2 pt-3">
                                    <h1 class="display-6 fw-semibold mb-3 lh-base">A better way to manage student assessment
                                        results with the <span class="text-success">{{ $profileApp->app_nama ?? '' }}
                                        </span>
                                    </h1>
                                    <p class="lead text-muted lh-base">{{ $profileApp->app_nama ?? '' }} is a fully
                                        responsive,
                                        multipurpose and
                                        premium Bootstrap 5 Admin & Dashboard Template built in multiple frameworks.</p>
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
                                    <i class="ri-question-line text-muted align-bottom me-1"></i> About
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" id="images-tab" href="#team" role="tab"
                                    aria-selected="true">
                                    <i class="mdi mdi-account-circle text-muted align-bottom me-1"></i> Team
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#faqs" role="tab"
                                    aria-selected="false">
                                    <i class="ri-list-unordered text-muted align-bottom me-1"></i> FAQs
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#develop" role="tab"
                                    aria-selected="false">
                                    <i class="ri-video-line text-muted align-bottom me-1"></i> Result
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#photoslide" role="tab"
                                    aria-selected="false">
                                    <i class="ri-image-line text-muted align-bottom me-1"></i> Photo Slide
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#galery" role="tab"
                                    aria-selected="false">
                                    <i class="ri-image-line text-muted align-bottom me-1"></i> Galery
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#dailymessages" role="tab"
                                    aria-selected="false">
                                    <i class="ri-image-line text-muted align-bottom me-1"></i> Daily Messages
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#berita" role="tab"
                                    aria-selected="false">
                                    <i class="ri-image-line text-muted align-bottom me-1"></i> Berita
                                </a>
                            </li>
                            @include('abouts.master-akses')
                        </ul>
                    </div>
                    <div class="card-body p-4">
                        <div class="tab-content text-muted">
                            <div class="tab-pane active" id="about" role="tabpanel">
                                @include('abouts.about')
                            </div>
                            <div class="tab-pane" id="team" role="tabpanel">
                                @include('abouts.team')
                            </div><!--end tab-pane-->
                            <div class="tab-pane" id="faqs" role="tabpanel">
                                @include('abouts.faqs')
                            </div><!--end tab-pane-->
                            <div class="tab-pane" id="develop" role="tabpanel">
                                @include('abouts.develop')
                            </div><!--end tab-pane-->
                            <div class="tab-pane" id="photoslide" role="tabpanel">
                                @include('abouts.photoslide')
                            </div><!--end tab-pane-->
                            <div class="tab-pane" id="galery" role="tabpanel">
                                @include('abouts.galery')
                            </div><!--end tab-pane-->
                            <div class="tab-pane" id="dailymessages" role="tabpanel">
                                @include('abouts.daily-massage')
                            </div><!--end tab-pane-->
                            <div class="tab-pane" id="berita" role="tabpanel">
                                @include('abouts.berita')
                            </div><!--end tab-pane-->
                        </div><!--end tab-content-->

                    </div><!--end card-body-->
                </div><!--end card -->
            </div><!--end card -->
        </div><!--end row-->
    @else
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="bg-info-subtle position-relative">
                        <div class="card-body p-5">
                            <div class="text-center mt-sm-1 mb-5 text-black-50">
                                <div>
                                    <a href="/" class="d-inline-block auth-logo">
                                        <img src="{{ URL::asset('build/images/lcks3.png') }}" alt=""
                                            height="100">
                                    </a>
                                </div>
                                <p class="mt-3 fs-15 fw-medium">{{ $profileApp->app_deskripsi ?? '' }}</p>
                            </div>
                        </div>
                        <div class="shape">
                            <svg xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs"
                                width="1440" height="60" preserveAspectRatio="none" viewBox="0 0 1440 60">
                                <g mask="url(&quot;#SvgjsMask1001&quot;)" fill="none">
                                    <path d="M 0,4 C 144,13 432,48 720,49 C 1008,50 1296,17 1440,9L1440 60L0 60z"
                                        style="fill: var(--vz-secondary-bg);"></path>
                                </g>
                                <defs>
                                    <mask id="SvgjsMask1001">
                                        <rect width="1440" height="80" fill="#ffffff"></rect>
                                    </mask>
                                </defs>
                            </svg>
                        </div>
                    </div>
                    <div class="card-body p-6">
                        <div class="row">
                            @foreach ($teamPengembang as $team)
                                <div class="col-lg-3">
                                    <div class="card text-center">
                                        <div class="card-body p-4 bg-info-subtle">
                                            <!-- Display the team member's photo -->
                                            <img src="{{ asset('images/team/' . $team->photo) }}"
                                                alt="{{ $team->namalengkap }}"
                                                class="rounded-circle avatar-xl mx-auto d-block">
                                            <!-- Display the team member's name -->
                                            <h5 class="fs-17 mt-3 mb-2">{{ $team->namalengkap }}</h5>

                                            <!-- Display the team member's position -->
                                            <p class="text-muted fs-13 mb-3">{{ $team->jabatan }}</p>

                                            <!-- Optional: Display a description or location -->
                                            <p class="text-muted mb-4 fs-14">
                                                {{ $team->deskripsi }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        {{-- <div class="text-end hstack gap-2 justify-content-end">
                            <a href="#!" class="btn btn-success">Accept</a>
                            <a href="#!" class="btn btn-outline-danger"><i
                                    class="ri-close-line align-bottom me-1"></i>
                                Decline</a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    @endif
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#galleryTable').DataTable({
                responsive: true,
                pageLength: 10 // Set jumlah baris per halaman
            });
            $('#dailyMessageTable').DataTable({
                responsive: true,
                pageLength: 10
            });
        });
    </script>
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/swiper.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/gallery.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/landing.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
