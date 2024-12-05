@extends('layouts.master-without-nav')
@section('title')
    @lang('translation.two-step-verification')
@endsection
@section('content')
    <!-- auth-page wrapper -->
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <!-- auth-page content -->
        <div class="auth-page-content overflow-hidden pt-lg-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card overflow-hidden">
                            <div class="row justify-content-center g-0">
                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4 auth-one-bg h-100">
                                        <div class="bg-overlay"></div>
                                        <div class="position-relative h-100 d-flex flex-column">
                                            <div class="mb-4">
                                                <a href="/dashboard" class="d-block">
                                                    <img src="{{ URL::asset('build/images/logo-light.png') }}"
                                                        alt="" height="18">
                                                </a>
                                            </div>
                                            <div class="mt-auto">
                                                <div class="mb-3">
                                                    <i class="ri-double-quotes-l display-4 text-success"></i>
                                                </div>

                                                <div id="qoutescarouselIndicators" class="carousel slide"
                                                    data-bs-ride="carousel">
                                                    <div class="carousel-indicators">
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="0" class="active" aria-current="true"
                                                            aria-label="Slide 1"></button>
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="1" aria-label="Slide 2"></button>
                                                        <button type="button" data-bs-target="#qoutescarouselIndicators"
                                                            data-bs-slide-to="2" aria-label="Slide 3"></button>
                                                    </div>
                                                    <div class="carousel-inner text-center text-white-50 pb-5">
                                                        <div class="carousel-item active">
                                                            <p class="fs-15">" Great! Clean code, clean design, easy for
                                                                customization. Thanks very much! "</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15">" The theme is really great with an amazing
                                                                customer support."</p>
                                                        </div>
                                                        <div class="carousel-item">
                                                            <p class="fs-15">" Great! Clean code, clean design, easy for
                                                                customization. Thanks very much! "</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end carousel -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="p-lg-5 p-4">
                                        <div class="mb-4">
                                            <div class="avatar-lg mx-auto">
                                                <div class="avatar-title bg-light text-primary display-5 rounded-circle">
                                                    <i class="ri-mail-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-muted text-center mx-lg-3">
                                            <h4 class="">Verify Your Email</h4>
                                            <p>Please enter the 4 digit code sent to <span
                                                    class="fw-semibold">example@abc.com</span></p>
                                        </div>

                                        <div class="mt-4">
                                            <form autocomplete="off">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="mb-3">
                                                            <label for="digit1-input" class="visually-hidden">Digit
                                                                1</label>
                                                            <input type="text"
                                                                class="form-control form-control-lg bg-light border-light text-center"
                                                                onkeyup="moveToNext(1,event)" maxLength="1"
                                                                id="digit1-input">
                                                        </div>
                                                    </div><!-- end col -->

                                                    <div class="col-3">
                                                        <div class="mb-3">
                                                            <label for="digit2-input" class="visually-hidden">Digit
                                                                2</label>
                                                            <input type="text"
                                                                class="form-control form-control-lg bg-light border-light text-center"
                                                                onkeyup="moveToNext(2,event)" maxLength="1"
                                                                id="digit2-input">
                                                        </div>
                                                    </div><!-- end col -->

                                                    <div class="col-3">
                                                        <div class="mb-3">
                                                            <label for="digit3-input" class="visually-hidden">Digit
                                                                3</label>
                                                            <input type="text"
                                                                class="form-control form-control-lg bg-light border-light text-center"
                                                                onkeyup="moveToNext(3,event)" maxLength="1"
                                                                id="digit3-input">
                                                        </div>
                                                    </div><!-- end col -->

                                                    <div class="col-3">
                                                        <div class="mb-3">
                                                            <label for="digit4-input" class="visually-hidden">Digit
                                                                4</label>
                                                            <input type="text"
                                                                class="form-control form-control-lg bg-light border-light text-center"
                                                                onkeyup="moveToNext(4,event)" maxLength="1"
                                                                id="digit4-input">
                                                        </div>
                                                    </div><!-- end col -->
                                                </div>

                                                <div class="mt-3">
                                                    <button type="button" class="btn btn-success w-100">Confirm</button>
                                                </div>

                                            </form>

                                        </div>

                                        <div class="mt-5 text-center">
                                            <p class="mb-0">Didn't receive a code ? <a href="/auth_pass_reset_cover"
                                                    class="fw-semibold text-primary text-decoration-underline">Resend</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                            </div>
                            <!-- end row -->
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->

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
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Velzon. Crafted with <i class="mdi mdi-heart text-danger"></i> by
                                Themesbrand
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/pages/two-step-verification.init.js') }}"></script>
@endsection
