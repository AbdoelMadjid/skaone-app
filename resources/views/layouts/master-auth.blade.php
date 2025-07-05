<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-topbar="light" data-sidebar-image="none">

    <head>
        <meta charset="utf-8" />
        <title>@yield('title') | {{ $profileApp->app_nama ?? '' }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="{{ $profileApp->app_deskripsi ?? '' }}" name="description" />
        <meta content="{{ $profileApp->app_pengembang ?? '' }}" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon"
            href="{{ $profileApp->app_icon ? URL::asset('build/images/' . $profileApp->app_icon) : URL::asset('build/images/icon-blue.png') }}">
        @include('layouts.head-css')
    </head>

    @yield('body')

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-1 mb-4 text-white-50">
                            <div>
                                <a href="/" class="d-inline-block auth-logo">
                                    <img src="{{ URL::asset('images/sakola/logo-footer.png') }}" alt=""
                                        height="60">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium">{{ $profileApp->app_deskripsi ?? '' }}</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    @yield('title-content')
                                </div>
                                <div class="p-2 mt-4">
                                    @yield('form-content')
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            @yield('footer-content')
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        @include('layouts.footer', ['layout' => 'auth'])
        <!-- end Footer -->
    </div>

    @include('layouts.vendor-scripts')
    </body>

</html>
