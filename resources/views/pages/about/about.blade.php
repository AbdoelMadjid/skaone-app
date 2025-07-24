@extends('layouts.master')
@section('title')
    @lang('translation.about')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ URL::asset('build/libs/glightbox/css/glightbox.min.css') }}">
@endsection
@section('content')
    @if (auth()->check() &&
            auth()->user()->hasAnyRole(['guru']))
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="bg-info-subtle position-relative">
                        <div class="card-body p-5">
                            <div class="text-center mt-sm-1 mb-5 text-black-50">
                                <div>
                                    <a href="/" class="d-inline-block auth-logo">
                                        <img src="{{ URL::asset('build/images/lcks3.png') }}" alt="" height="100">
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
                            @include('pages.about.team-pengembang-view')
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        @php
            $isPollingActive = App\Helpers\Fitures::isFiturAktif('polling');
        @endphp

        @if ($isPollingActive)
            @include('pages.about.polling-view')
        @endif
    @else
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="bg-info-subtle position-relative">
                        <div class="card-body p-5">
                            <div class="text-center mt-sm-1 mb-5 text-black-50">
                                <div>
                                    <a href="/" class="d-inline-block auth-logo">
                                        <img src="{{ URL::asset('build/images/lcks3.png') }}" alt="" height="100">
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
                            @include('pages.about.team-pengembang-view')
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    @endif
@endsection
@section('script')
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
