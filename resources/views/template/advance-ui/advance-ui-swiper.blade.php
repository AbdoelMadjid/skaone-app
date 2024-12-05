@extends('layouts.master')
@section('title')
    @lang('translation.swiper-slider')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.components')
        @endslot
        @slot('li_2')
            @lang('translation.advance-ui')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Default Swiper</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>default-swiper</code> class to set a default swiper.</p>

                    <!-- Swiper -->
                    <div class="swiper default-swiper rounded">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-1.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-2.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-3.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->

        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Navigation & Pagination Swiper</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>navigation-swiper</code> class to set a swiper with navigation and
                        pagination.</p>

                    <!-- Swiper -->
                    <div class="swiper navigation-swiper rounded">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-4.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-5.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-6.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->

        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Pagination Dynamic Swiper</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>pagination-dynamic-swiper</code> class to set a dynamic swiper with
                        pagination.</p>

                    <!-- Swiper -->
                    <div class="swiper pagination-dynamic-swiper rounded">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-7.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-8.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-9.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                        </div>
                        <div class="swiper-pagination dynamic-pagination"></div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->
        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Pagination Fraction Swiper</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>pagination-fraction-swiper</code> class to set a fraction swiper with
                        pagination.</p>

                    <!-- Swiper -->
                    <div class="swiper pagination-fraction-swiper rounded">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-10.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-11.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-12.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->
        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Pagination Custom Swiper</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>pagination-custom-swiper</code> class to set a swiper with custom
                        pagination.</p>

                    <!-- Swiper -->
                    <div class="swiper pagination-custom-swiper rounded">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-2.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-3.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-4.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                        </div>
                        <div class="swiper-pagination pagination-custom"></div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->
        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Pagination Progress Swiper</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>pagination-progress-swiper</code> class to set a swiper with progress
                        pagination.</p>

                    <!-- Swiper -->
                    <div class="swiper pagination-progress-swiper rounded">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-5.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-6.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-7.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->
        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Scrollbar Swiper</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>pagination-scrollbar-swiper</code> class to set a swiper with scrollbar
                        pagination.</p>

                    <!-- Swiper -->
                    <div class="swiper pagination-scrollbar-swiper rounded">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-8.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-9.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-10.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->

        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Vertical Swiper</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>vertical-swiper</code> class to set a vertical swiper.</p>

                    <!-- Swiper -->
                    <div class="swiper vertical-swiper rounded" style="height: 324px;">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-11.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-12.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-1.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->

        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Mousewheel Control Swiper</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>mousewheel-control-swiper</code> class to set a swiper with mousewheel
                        scroll.</p>

                    <!-- Swiper -->
                    <div class="swiper mousewheel-control-swiper rounded" style="height: 324px;">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-3.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-4.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-5.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->

        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Effect Fade Swiper</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>effect-fade-swiper</code> class to set a swiper with fade effect.</p>

                    <!-- Swiper -->
                    <div class="swiper effect-fade-swiper rounded">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-6.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-7.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-8.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->
        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Effect Creative Swiper</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>effect-creative-swiper</code> class to set a swiper with creative
                        custom effect.</p>

                    <!-- Swiper -->
                    <div class="swiper effect-creative-swiper rounded">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-9.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-10.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-11.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->
        <div class="col-xl-4 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Effect Flip Swiper</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>effect-flip-swiper</code> class to set a swiper with flip effect.</p>

                    <!-- Swiper -->
                    <div class="swiper effect-flip-swiper rounded">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-12.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-1.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-2.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Effect Coverflow Swiper</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>effect-coverflow-swiper</code> class to set a swiper with coverflow
                        effect.</p>

                    <!-- Swiper -->
                    <div class="swiper effect-coverflow-swiper rounded pb-5">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-4.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-5.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-6.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-7.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-8.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                            <div class="swiper-slide">
                                <img src="{{ URL::asset('build/images/small/img-9.jpg') }}" alt=""
                                    class="img-fluid" />
                            </div>
                        </div>
                        <div class="swiper-pagination swiper-pagination-dark"></div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Responsive Breakpoints Swiper</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <p class="text-muted">Use <code>responsive-swiper</code> class to set a responsive swiper.</p>

                    <!-- Swiper -->
                    <div class="swiper responsive-swiper rounded gallery-light pb-4">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="{{ URL::asset('build/images/small/img-1.jpg') }}"
                                            title="">
                                            <img class="gallery-img img-fluid mx-auto"
                                                src="{{ URL::asset('build/images/small/img-1.jpg') }}" alt="" />
                                            <div class="gallery-overlay">
                                                <h5 class="overlay-caption">Glasses and laptop from above</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="box-content">
                                        <div class="d-flex align-items-center mt-1">
                                            <div class="flex-grow-1 text-muted">by <a href=""
                                                    class="text-body text-truncate">Ron Mackie</a></div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-3">
                                                    <button type="button"
                                                        class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                        <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i> 2.2K
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                        <i
                                                            class="ri-question-answer-fill text-muted align-bottom me-1"></i>
                                                        1.3K
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="{{ URL::asset('build/images/small/img-2.jpg') }}"
                                            title="">
                                            <img class="gallery-img img-fluid mx-auto"
                                                src="{{ URL::asset('build/images/small/img-2.jpg') }}" alt="" />
                                            <div class="gallery-overlay">
                                                <h5 class="overlay-caption">Working at a coffee shop</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="box-content">
                                        <div class="d-flex align-items-center mt-1">
                                            <div class="flex-grow-1 text-muted">by <a href=""
                                                    class="text-body text-truncate">Nancy Martino</a></div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-3">
                                                    <button type="button"
                                                        class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                        <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i> 3.2K
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                        <i
                                                            class="ri-question-answer-fill text-muted align-bottom me-1"></i>
                                                        1.1K
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-box card mb-0">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="{{ URL::asset('build/images/small/img-10.jpg') }}"
                                            title="">
                                            <img class="gallery-img img-fluid mx-auto"
                                                src="{{ URL::asset('build/images/small/img-10.jpg') }}" alt="">
                                            <div class="gallery-overlay">
                                                <h5 class="overlay-caption">Fun day at the Hill Station</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="box-content">
                                        <div class="d-flex align-items-center mt-1">
                                            <div class="flex-grow-1 text-muted">by <a href=""
                                                    class="text-body text-truncate">Henry Baird</a></div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-3">
                                                    <button type="button"
                                                        class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                        <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i> 632
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                        <i
                                                            class="ri-question-answer-fill text-muted align-bottom me-1"></i>
                                                        95
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="{{ URL::asset('build/images/small/img-4.jpg') }}"
                                            title="">
                                            <img class="gallery-img img-fluid mx-auto"
                                                src="{{ URL::asset('build/images/small/img-4.jpg') }}" alt="" />
                                            <div class="gallery-overlay">
                                                <h5 class="overlay-caption">Drawing a sketch</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="box-content">
                                        <div class="d-flex align-items-center mt-1">
                                            <div class="flex-grow-1 text-muted">by <a href=""
                                                    class="text-body text-truncate">Jason McQuaid</a></div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-3">
                                                    <button type="button"
                                                        class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                        <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i> 825
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                        <i
                                                            class="ri-question-answer-fill text-muted align-bottom me-1"></i>
                                                        101
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="{{ URL::asset('build/images/small/img-6.jpg') }}"
                                            title="">
                                            <img class="gallery-img img-fluid mx-auto"
                                                src="{{ URL::asset('build/images/small/img-6.jpg') }}" alt="" />
                                            <div class="gallery-overlay">
                                                <h5 class="overlay-caption">Project discussion with team</h5>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="box-content">
                                        <div class="d-flex align-items-center mt-1">
                                            <div class="flex-grow-1 text-muted">by <a href=""
                                                    class="text-body text-truncate">Erica Kernan</a></div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-3">
                                                    <button type="button"
                                                        class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                        <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i> 3.4K
                                                    </button>
                                                    <button type="button"
                                                        class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                        <i
                                                            class="ri-question-answer-fill text-muted align-bottom me-1"></i>
                                                        1.3k
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-pagination swiper-pagination-dark"></div>
                    </div>
                </div><!-- end card-body -->
            </div><!-- end card -->
        </div><!--end col-->
    </div><!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/swiper.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
