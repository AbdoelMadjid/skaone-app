@extends('layouts.master')
@section('title')
    @lang('translation.gallery')
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/libs/glightbox/css/glightbox.min.css') }}">
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.pages')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-center">
                                <ul class="list-inline categories-filter animation-nav" id="filter">
                                    <li class="list-inline-item"><a class="categories active" data-filter="*">All</a></li>
                                    <li class="list-inline-item"><a class="categories" data-filter=".project">Project</a>
                                    </li>
                                    <li class="list-inline-item"><a class="categories"
                                            data-filter=".designing">Designing</a></li>
                                    <li class="list-inline-item"><a class="categories"
                                            data-filter=".photography">Photography</a></li>
                                    <li class="list-inline-item"><a class="categories"
                                            data-filter=".development">Development</a></li>
                                </ul>
                            </div>

                            <div class="row gallery-wrapper">
                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development"
                                    data-category="designing development">
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
                                                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                                                            2.2K
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
                                <!-- end col -->
                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 photography"
                                    data-category="photography">
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
                                                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                                                            3.2K
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
                                <!-- end col -->
                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project development"
                                    data-category="development">
                                    <div class="gallery-box card">
                                        <div class="gallery-container">
                                            <a class="image-popup" href="{{ URL::asset('build/images/small/img-3.jpg') }}"
                                                title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ URL::asset('build/images/small/img-3.jpg') }}" alt="" />
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">Photo was taken in Beach</h5>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="box-content">
                                            <div class="d-flex align-items-center mt-1">
                                                <div class="flex-grow-1 text-muted">by <a href=""
                                                        class="text-body text-truncate">Elwood Arter</a></div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex gap-3">
                                                        <button type="button"
                                                            class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                                                            2.1K
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                            <i
                                                                class="ri-question-answer-fill text-muted align-bottom me-1"></i>
                                                            1K
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing"
                                    data-category="project designing">
                                    <div class="gallery-box card">
                                        <div class="gallery-container">
                                            <a class="image-popup" href="{{ URL::asset('build/images/small/img-4.jpg') }}"
                                                title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ URL::asset('build/images/small/img-4.jpg') }}"
                                                    alt="" />
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
                                                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                                                            825
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
                                <!-- end col -->
                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing"
                                    data-category="project designing">
                                    <div class="gallery-box card">
                                        <div class="gallery-container">
                                            <a class="image-popup" href="{{ URL::asset('build/images/small/img-5.jpg') }}"
                                                title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ URL::asset('build/images/small/img-5.jpg') }}"
                                                    alt="" />
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">Working from home little spot</h5>
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
                                                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                                                            632
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
                                <!-- end col -->
                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 photography"
                                    data-category="photography">
                                    <div class="gallery-box card">
                                        <div class="gallery-container">
                                            <a class="image-popup"
                                                href="{{ URL::asset('build/images/small/img-6.jpg') }}" title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ URL::asset('build/images/small/img-6.jpg') }}"
                                                    alt="" />
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
                                                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                                                            3.4K
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
                                <!-- end col -->
                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development"
                                    data-category="designing development">
                                    <div class="gallery-box card">
                                        <div class="gallery-container">
                                            <a class="image-popup"
                                                href="{{ URL::asset('build/images/small/img-7.jpg') }}" title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ URL::asset('build/images/small/img-7.jpg') }}"
                                                    alt="" />
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">Sunrise above a beach</h5>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="box-content">
                                            <div class="d-flex align-items-center mt-1">
                                                <div class="flex-grow-1 text-muted">by <a href=""
                                                        class="text-body text-truncate">James Ballard</a></div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex gap-3">
                                                        <button type="button"
                                                            class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                                                            735
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                            <i
                                                                class="ri-question-answer-fill text-muted align-bottom me-1"></i>
                                                            150
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->
                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 photography"
                                    data-category="photography">
                                    <div class="gallery-box card">
                                        <div class="gallery-container">
                                            <a class="image-popup"
                                                href="{{ URL::asset('build/images/small/img-8.jpg') }}" title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ URL::asset('build/images/small/img-8.jpg') }}"
                                                    alt="" />
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">Glasses and laptop from above</h5>
                                                </div>
                                            </a>
                                        </div>

                                        <div class="box-content">
                                            <div class="d-flex align-items-center mt-1">
                                                <div class="flex-grow-1 text-muted">by <a href=""
                                                        class="text-body text-truncate">Ruby Griffin</a></div>
                                                <div class="flex-shrink-0">
                                                    <div class="d-flex gap-3">
                                                        <button type="button"
                                                            class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                                                            1.5k
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                            <i
                                                                class="ri-question-answer-fill text-muted align-bottom me-1"></i>
                                                            250
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing development"
                                    data-category="designing development">
                                    <div class="gallery-box card">
                                        <div class="gallery-container">
                                            <a class="image-popup"
                                                href="{{ URL::asset('build/images/small/img-9.jpg') }}" title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ URL::asset('build/images/small/img-9.jpg') }}"
                                                    alt="" />
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">Dramatic clouds at the Golden Gate Bridge
                                                    </h5>
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
                                                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                                                            2.2K
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
                                <!-- end col -->

                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 project designing"
                                    data-category="project designing">
                                    <div class="gallery-box card">
                                        <div class="gallery-container">
                                            <a class="image-popup"
                                                href="{{ URL::asset('build/images/small/img-10.jpg') }}" title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ URL::asset('build/images/small/img-10.jpg') }}"
                                                    alt="" />
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
                                                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                                                            632
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
                                <!-- end col -->

                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 photography"
                                    data-category="photography">
                                    <div class="gallery-box card">
                                        <div class="gallery-container">
                                            <a class="image-popup"
                                                href="{{ URL::asset('build/images/small/img-11.jpg') }}" title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ URL::asset('build/images/small/img-11.jpg') }}"
                                                    alt="" />
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">Cycling in the countryside</h5>
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
                                                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                                                            3.2K
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
                                <!-- end col -->

                                <div class="element-item col-xxl-3 col-xl-4 col-sm-6 photography"
                                    data-category="photography">
                                    <div class="gallery-box card">
                                        <div class="gallery-container">
                                            <a class="image-popup"
                                                href="{{ URL::asset('build/images/small/img-12.jpg') }}" title="">
                                                <img class="gallery-img img-fluid mx-auto"
                                                    src="{{ URL::asset('build/images/small/img-12.jpg') }}"
                                                    alt="" />
                                                <div class="gallery-overlay">
                                                    <h5 class="overlay-caption">A mix of friends and strangers heading off
                                                        to find an adventure.</h5>
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
                                                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                                                            3.4K
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
                                <!-- end col -->
                            </div>
                            <!-- end row -->

                            <div class="text-center my-2">
                                <a href="javascript:void(0);" class="text-success"><i
                                        class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load More </a>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
                <!-- ene card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/gallery.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
