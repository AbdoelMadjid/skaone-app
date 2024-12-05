@extends('layouts.master-without-nav')
@section('title')
    @lang('translation.maintenance')
@endsection
@section('body')

    <body>
    @endsection
    @section('content')
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
                            <div class="text-center mt-sm-5 pt-4">
                                <div class="mb-5 text-white-50">
                                    <h1 class="display-5 coming-soon-text">Site is Under Maintenance</h1>
                                    <p class="fs-14">Please check back in sometime</p>
                                    <div class="mt-4 pt-2">
                                        <a href="/dashboard" class="btn btn-success"><i class="mdi mdi-home me-1"></i> Back
                                            to Home</a>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-5">
                                    <div class="col-xl-4 col-lg-8">
                                        <div>
                                            <img src="{{ URL::asset('build/images/maintenance.png') }}" alt=""
                                                class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->

                </div>
                <!-- end container -->
            </div>
            <!-- end auth page content -->

            <!-- footer -->
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                                Themesbrand</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end Footer -->

        </div>
        <!-- end auth-page-wrapper -->
    @endsection
    @section('script')
        <script src="{{ URL::asset('build/libs/particles.js/particles.js') }}"></script>
        <script src="{{ URL::asset('build/js/pages/particles.app.js') }}"></script>
    @endsection
