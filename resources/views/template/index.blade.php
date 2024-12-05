@extends('layouts.master')
@section('title')
    @lang('translation.homepage')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-n4 mx-n4">
                <div class="bg-warning-subtle">
                    <div class="card-body pb-0 px-4">
                        <div class="row mb-3">
                            <div class="col-md">
                                <div class="row align-items-center g-3">
                                    <div class="col-md-auto">
                                        <div class="avatar-md">
                                            <div class="avatar-title bg-white rounded-circle">
                                                <img src="{{ URL::asset('build/images/brands/slack.png') }}" alt=""
                                                    class="avatar-xs">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div>
                                            <h4 class="fw-bold">{!! renderGreeting() !!}, Anna!</h4>
                                            <div class="hstack gap-3 flex-wrap">
                                                <div><span class="fw-medium">{!! renderDate() !!}</span></div>
                                                <div class="vr"></div>
                                                <div><span class="fw-medium"
                                                        id="titlehomepage">{!! renderTime('titlehomepage') !!}</span></div>
                                                <div class="vr"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="hstack gap-1 flex-wrap">
                                    <button type="button" class="btn py-0 fs-16 favourite-btn active">
                                        <i class="ri-star-fill"></i>
                                    </button>
                                    <button type="button" class="btn py-0 fs-16 text-body">
                                        <i class="ri-share-line"></i>
                                    </button>
                                    <button type="button" class="btn py-0 fs-16 text-body">
                                        <i class="ri-flag-line"></i>
                                    </button>
                                </div>
                            </div>
                        </div>


                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div>
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#all" role="tab"
                                aria-selected="false">
                                <i class="ri-search-2-line text-muted align-bottom me-1"></i> All Results
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" id="images-tab" href="#images" role="tab"
                                aria-selected="true">
                                <i class="ri-image-fill text-muted align-bottom me-1"></i> Images
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#news" role="tab" aria-selected="false">
                                <i class="ri-list-unordered text-muted align-bottom me-1"></i> News
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#video" role="tab" aria-selected="false">
                                <i class="ri-video-line text-muted align-bottom me-1"></i> Videos
                            </a>
                        </li>
                        <li class="nav-item ms-auto">
                            <div class="dropdown">
                                <a class="nav-link fw-medium text-reset mb-n1" href="#" role="button"
                                    id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-settings-4-line align-middle me-1"></i> Settings
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <li><a class="dropdown-item" href="#">Search Settings</a></li>
                                    <li><a class="dropdown-item" href="#">Advanced Search</a></li>
                                    <li><a class="dropdown-item" href="#">Search History</a></li>
                                    <li><a class="dropdown-item" href="#">Search Help</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a class="dropdown-item" href="#">Dark Mode:Off</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="all" role="tabpanel">
                            <div class="pb-3">
                                <h5 class="mb-1"><a href="javascript:void(0);">Velzon - Responsive Bootstrap 5 Admin
                                        Dashboard</a></h5>
                                <p class="text-success mb-2">https://themesbrand.com/velzon/index</p>
                                <p class="text-muted mb-2">Velzon admin is super flexible, powerful, clean, modern &
                                    responsive admin template based on <span class="fw-semibold">bootstrap 5</span> stable
                                    with unlimited possibilities. You can simply change to any layout or mode by changing a
                                    couple of lines of code. You can start small and large projects or update design in your
                                    existing project using Velzon it is very quick and easy as it is beautiful, adroit, and
                                    delivers the ultimate user experience.</p>
                                <ul class="list-inline d-flex align-items-center g-3 text-muted fs-14 mb-0">
                                    <li class="list-inline-item me-3"><i class="ri-thumb-up-line align-middle me-1"></i>10
                                    </li>
                                    <li class="list-inline-item me-3"><i
                                            class="ri-question-answer-line align-middle me-1"></i>8</li>
                                    <li class="list-inline-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-user-line"></i>
                                            </div>
                                            <div class="flex-grow-1 fs-13 ms-1">
                                                <span class="fw-medium">Themesbrand</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="border border-dashed"></div>

                            <div class="py-3">
                                <h5 class="fs-13 mb-3 text-muted fst-italic">Showing results Images</h5>
                                <div class="row">
                                    <div class="col-xl-4 col-lg-10">
                                        <div class="row g-2">
                                            <div class="col-md-3 col-sm-6">
                                                <div>
                                                    <a href="{{ URL::asset('build/images/small/img-1.jpg') }}"
                                                        class="image-popup d-block">
                                                        <img src="{{ URL::asset('build/images/small/img-1.jpg') }}"
                                                            alt="" class="img-fluid d-block rounded" />
                                                    </a>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-md-3 col-sm-6">
                                                <div>
                                                    <a href="{{ URL::asset('build/images/small/img-3.jpg') }}"
                                                        class="image-popup d-block">
                                                        <img src="{{ URL::asset('build/images/small/img-3.jpg') }}"
                                                            alt="" class="img-fluid d-block rounded" />
                                                    </a>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-md-3 col-sm-6">
                                                <div>
                                                    <a href="{{ URL::asset('build/images/small/img-4.jpg') }}"
                                                        class="image-popup d-block">
                                                        <img src="{{ URL::asset('build/images/small/img-4.jpg') }}"
                                                            alt="" class="img-fluid d-block rounded" />
                                                    </a>
                                                </div>
                                            </div><!--end col-->
                                            <div class="col-md-3 col-sm-6">
                                                <div class="search-more-results rounded">
                                                    <a href="javascript:void(0);" onclick="myFunction()" class="d-block">
                                                        <img src="{{ URL::asset('build/images/small/img-5.jpg') }}"
                                                            alt="" class="img-fluid d-block rounded" />

                                                        <div class="bg-overlay"></div>
                                                        <div class="nav-icon">
                                                            <i class="ri-image-fill align-middle me-1"></i> 99+
                                                        </div>
                                                    </a>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div>

                            <div class="border border-dashed"></div>

                            <div class="py-3">
                                <h5 class="mb-1"><a href="javascript:void(0);">Skote - Admin & Dashboard Template by
                                        Themesbrand</a></h5>
                                <p class="text-success mb-2">https://themesbrand.com/skote/</p>
                                <p class="text-muted mb-2">Skote is an admin dashboard template that is a beautifully
                                    crafted, clean & minimal designed admin template with Dark, Light Layouts with RTL
                                    options. You can build any type of web application like Saas based interface, eCommerce,
                                    Crypto, CRM, CMS, Project management apps, Admin Panels, etc.</p>
                                <ul class="list-inline d-flex align-items-center g-3 text-muted fs-14 mb-0">
                                    <li class="list-inline-item me-3"><i
                                            class="ri-thumb-up-line align-middle me-1"></i>485</li>
                                    <li class="list-inline-item me-3"><i
                                            class="ri-question-answer-line align-middle me-1"></i>167</li>
                                    <li class="list-inline-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-user-line"></i>
                                            </div>
                                            <div class="flex-grow-1 fs-13 ms-1">
                                                <span class="fw-medium">Themesbrand</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="border border-dashed"></div>

                            <div class="py-3">
                                <h5 class="mb-1"><a href="javascript:void(0);">Minia - React Js Admin & Dashboard
                                        Template</a></h5>
                                <p class="text-success mb-2">https://themesbrand.com/minia/react/</p>
                                <p class="text-muted mb-2">Minia react is a simple and beautiful admin template built with
                                    Bootstrap ^5.1.3. It has <span class="fw-semibold">5+ different layouts and 3
                                        modes</span> ( Dark, Light & RTL ) which are managed by SCSS only. You can simply
                                    change to any layouts or mode by changing a couple of lines code.</p>
                                <ul class="list-inline d-flex align-items-center g-3 text-muted fs-14 mb-0">
                                    <li class="list-inline-item me-3"><i class="ri-thumb-up-line align-middle me-1"></i>69
                                    </li>
                                    <li class="list-inline-item me-3"><i
                                            class="ri-question-answer-line align-middle me-1"></i>43</li>
                                    <li class="list-inline-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-user-line"></i>
                                            </div>
                                            <div class="flex-grow-1 fs-13 ms-1">
                                                <span class="fw-medium">Themesbrand</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div class="border border-dashed"></div>

                            <div class="py-3">
                                <h5 class="mb-1"><a href="javascript:void(0);">Doson - Angular Admin & Dashboard
                                        Template by Themesbrand</a></h5>
                                <p class="text-success mb-2">https://themesbrand.com/dason/angular/</p>
                                <p class="text-muted mb-2">Dason is a simple and beautiful admin template built with
                                    Bootstrap ^5.1.3. It has 5+ different layouts and 3 modes ( Dark, Light & RTL ) which
                                    are managed by SCSS only. You can simply change to any layouts or mode by changing a
                                    couple of lines code.</p>
                                <ul class="list-inline d-flex align-items-center g-3 text-muted fs-14 mb-0">
                                    <li class="list-inline-item me-3"><i
                                            class="ri-thumb-up-line align-middle me-1"></i>102</li>
                                    <li class="list-inline-item me-3"><i
                                            class="ri-question-answer-line align-middle me-1"></i>36</li>
                                    <li class="list-inline-item">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <i class="ri-user-line"></i>
                                            </div>
                                            <div class="flex-grow-1 fs-13 ms-1">
                                                <span class="fw-medium">Themesbrand</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <div>
                                <ul class="pagination pagination-separated justify-content-center mb-0">
                                    <li class="page-item disabled">
                                        <a href="javascript:void(0);" class="page-link"><i
                                                class="mdi mdi-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active">
                                        <a href="javascript:void(0);" class="page-link">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link">5</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link"><i
                                                class="mdi mdi-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-pane" id="images" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="swiper images-menu mb-3">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="d-flex align-items-center border border-dashed rounded p-2">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/small/img-12.jpg') }}"
                                                            alt="" width="65" class="rounded" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-2">
                                                        <a href="javascript:void(0);"
                                                            class="stretched-link fw-medium">Bootstrap</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="d-flex align-items-center border border-dashed rounded p-2">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/small/img-11.jpg') }}"
                                                            alt="" width="65" class="rounded" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-2">
                                                        <a href="javascript:void(0);"
                                                            class="stretched-link fw-medium">Website</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="d-flex align-items-center border border-dashed rounded p-2">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/small/img-10.jpg') }}"
                                                            alt="" width="65" class="rounded" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-2">
                                                        <a href="javascript:void(0);"
                                                            class="stretched-link fw-medium">Responsive</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="d-flex align-items-center border border-dashed rounded p-2">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/small/img-9.jpg') }}"
                                                            alt="" width="65" class="rounded" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-2">
                                                        <a href="javascript:void(0);"
                                                            class="stretched-link fw-medium">Design</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="d-flex align-items-center border border-dashed rounded p-2">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/small/img-8.jpg') }}"
                                                            alt="" width="65" class="rounded" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-2">
                                                        <a href="javascript:void(0);"
                                                            class="stretched-link fw-medium">eCommerce</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="d-flex align-items-center border border-dashed rounded p-2">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/small/img-7.jpg') }}"
                                                            alt="" width="65" class="rounded" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-2">
                                                        <a href="javascript:void(0);"
                                                            class="stretched-link fw-medium">Templates</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="d-flex align-items-center border border-dashed rounded p-2">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/small/img-6.jpg') }}"
                                                            alt="" width="65" class="rounded" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-2">
                                                        <a href="javascript:void(0);"
                                                            class="stretched-link fw-medium">Admin Panal</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="d-flex align-items-center border border-dashed rounded p-2">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/small/img-5.jpg') }}"
                                                            alt="" width="65" class="rounded" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-2">
                                                        <a href="javascript:void(0);"
                                                            class="stretched-link fw-medium">Simple</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="swiper-slide">
                                                <div class="d-flex align-items-center border border-dashed rounded p-2">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ URL::asset('build/images/small/img-3.jpg') }}"
                                                            alt="" width="65" class="rounded" />
                                                    </div>
                                                    <div class="flex-grow-1 ms-2">
                                                        <a href="javascript:void(0);"
                                                            class="stretched-link fw-medium">Dark</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="gallery-light">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="gallery-box card">
                                            <div class="gallery-container">
                                                <a class="image-popup"
                                                    href="{{ URL::asset('build/images/small/img-1.jpg') }}"
                                                    title="">
                                                    <img class="gallery-img img-fluid mx-auto"
                                                        src="{{ URL::asset('build/images/small/img-1.jpg') }}"
                                                        alt="" />
                                                    <div class="gallery-overlay">
                                                        <h5 class="overlay-caption">Glasses and laptop from above</h5>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="box-content">
                                                <div class="d-flex align-items-center mt-2">
                                                    <div class="flex-grow-1 text-muted">by <a href=""
                                                            class="text-body text-truncate">Ron Mackie</a></div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex gap-3">
                                                            <button type="button"
                                                                class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                                <i
                                                                    class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
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
                                    </div><!--end col-->
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="gallery-box card">
                                            <div class="gallery-container">
                                                <a class="image-popup"
                                                    href="{{ URL::asset('build/images/small/img-2.jpg') }}"
                                                    title="">
                                                    <img class="gallery-img img-fluid mx-auto"
                                                        src="{{ URL::asset('build/images/small/img-2.jpg') }}"
                                                        alt="" />
                                                    <div class="gallery-overlay">
                                                        <h5 class="overlay-caption">Working at a coffee shop</h5>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="box-content">
                                                <div class="d-flex align-items-center mt-2">
                                                    <div class="flex-grow-1 text-muted">by <a href=""
                                                            class="text-body text-truncate">Nancy Martino</a></div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex gap-3">
                                                            <button type="button"
                                                                class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                                <i
                                                                    class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
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
                                    </div><!--end col-->
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="gallery-box card">
                                            <div class="gallery-container">
                                                <a class="image-popup"
                                                    href="{{ URL::asset('build/images/small/img-3.jpg') }}"
                                                    title="">
                                                    <img class="gallery-img img-fluid mx-auto"
                                                        src="{{ URL::asset('build/images/small/img-3.jpg') }}"
                                                        alt="" />
                                                    <div class="gallery-overlay">
                                                        <h5 class="overlay-caption">Photo was taken in Beach</h5>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="box-content">
                                                <div class="d-flex align-items-center mt-2">
                                                    <div class="flex-grow-1 text-muted">by <a href=""
                                                            class="text-body text-truncate">Elwood Arter</a></div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex gap-3">
                                                            <button type="button"
                                                                class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                                <i
                                                                    class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
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
                                    </div><!--end col-->
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="gallery-box card">
                                            <div class="gallery-container">
                                                <a class="image-popup"
                                                    href="{{ URL::asset('build/images/small/img-4.jpg') }}"
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
                                                <div class="d-flex align-items-center mt-2">
                                                    <div class="flex-grow-1 text-muted">by <a href=""
                                                            class="text-body text-truncate">Jason McQuaid</a></div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex gap-3">
                                                            <button type="button"
                                                                class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                                <i
                                                                    class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
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
                                    </div><!--end col-->
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="gallery-box card">
                                            <div class="gallery-container">
                                                <a class="image-popup"
                                                    href="{{ URL::asset('build/images/small/img-5.jpg') }}"
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
                                                <div class="d-flex align-items-center mt-2">
                                                    <div class="flex-grow-1 text-muted">by <a href=""
                                                            class="text-body text-truncate">Henry Baird</a></div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex gap-3">
                                                            <button type="button"
                                                                class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                                <i
                                                                    class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
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
                                    </div><!--end col-->
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="gallery-box card">
                                            <div class="gallery-container">
                                                <a class="image-popup"
                                                    href="{{ URL::asset('build/images/small/img-6.jpg') }}"
                                                    title="">
                                                    <img class="gallery-img img-fluid mx-auto"
                                                        src="{{ URL::asset('build/images/small/img-6.jpg') }}"
                                                        alt="" />
                                                    <div class="gallery-overlay">
                                                        <h5 class="overlay-caption">Project discussion with team</h5>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="box-content">
                                                <div class="d-flex align-items-center mt-2">
                                                    <div class="flex-grow-1 text-muted">by <a href=""
                                                            class="text-body text-truncate">Erica Kernan</a></div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex gap-3">
                                                            <button type="button"
                                                                class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                                <i
                                                                    class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
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
                                    </div><!--end col-->
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="gallery-box card">
                                            <div class="gallery-container">
                                                <a class="image-popup"
                                                    href="{{ URL::asset('build/images/small/img-7.jpg') }}"
                                                    title="">
                                                    <img class="gallery-img img-fluid mx-auto"
                                                        src="{{ URL::asset('build/images/small/img-7.jpg') }}"
                                                        alt="" />
                                                    <div class="gallery-overlay">
                                                        <h5 class="overlay-caption">Sunrise above a beach</h5>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="box-content">
                                                <div class="d-flex align-items-center mt-2">
                                                    <div class="flex-grow-1 text-muted">by <a href=""
                                                            class="text-body text-truncate">James Ballard</a></div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex gap-3">
                                                            <button type="button"
                                                                class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                                <i
                                                                    class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
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
                                    </div><!--end col-->
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="gallery-box card">
                                            <div class="gallery-container">
                                                <a class="image-popup"
                                                    href="{{ URL::asset('build/images/small/img-8.jpg') }}"
                                                    title="">
                                                    <img class="gallery-img img-fluid mx-auto"
                                                        src="{{ URL::asset('build/images/small/img-8.jpg') }}"
                                                        alt="" />
                                                    <div class="gallery-overlay">
                                                        <h5 class="overlay-caption">Glasses and laptop from above</h5>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="box-content">
                                                <div class="d-flex align-items-center mt-2">
                                                    <div class="flex-grow-1 text-muted">by <a href=""
                                                            class="text-body text-truncate">Ruby Griffin</a></div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex gap-3">
                                                            <button type="button"
                                                                class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                                <i
                                                                    class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
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
                                    </div><!--end col-->
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="gallery-box card">
                                            <div class="gallery-container">
                                                <a class="image-popup"
                                                    href="{{ URL::asset('build/images/small/img-9.jpg') }}"
                                                    title="">
                                                    <img class="gallery-img img-fluid mx-auto"
                                                        src="{{ URL::asset('build/images/small/img-9.jpg') }}"
                                                        alt="" />
                                                    <div class="gallery-overlay">
                                                        <h5 class="overlay-caption">Dramatic clouds at the Golden Gate
                                                            Bridge</h5>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="box-content">
                                                <div class="d-flex align-items-center mt-2">
                                                    <div class="flex-grow-1 text-muted">by <a href=""
                                                            class="text-body text-truncate">Ron Mackie</a></div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex gap-3">
                                                            <button type="button"
                                                                class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                                <i
                                                                    class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
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
                                    </div><!--end col-->
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="gallery-box card">
                                            <div class="gallery-container">
                                                <a class="image-popup"
                                                    href="{{ URL::asset('build/images/small/img-10.jpg') }}"
                                                    title="">
                                                    <img class="gallery-img img-fluid mx-auto"
                                                        src="{{ URL::asset('build/images/small/img-10.jpg') }}"
                                                        alt="" />
                                                    <div class="gallery-overlay">
                                                        <h5 class="overlay-caption">Fun day at the Hill Station</h5>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="box-content">
                                                <div class="d-flex align-items-center mt-2">
                                                    <div class="flex-grow-1 text-muted">by <a href=""
                                                            class="text-body text-truncate">Henry Baird</a></div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex gap-3">
                                                            <button type="button"
                                                                class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                                <i
                                                                    class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
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
                                    </div><!--end col-->
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="gallery-box card">
                                            <div class="gallery-container">
                                                <a class="image-popup"
                                                    href="{{ URL::asset('build/images/small/img-11.jpg') }}"
                                                    title="">
                                                    <img class="gallery-img img-fluid mx-auto"
                                                        src="{{ URL::asset('build/images/small/img-11.jpg') }}"
                                                        alt="" />
                                                    <div class="gallery-overlay">
                                                        <h5 class="overlay-caption">Cycling in the countryside</h5>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="box-content">
                                                <div class="d-flex align-items-center mt-2">
                                                    <div class="flex-grow-1 text-muted">by <a href=""
                                                            class="text-body text-truncate">Nancy Martino</a></div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex gap-3">
                                                            <button type="button"
                                                                class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                                <i
                                                                    class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
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
                                    </div><!--end col-->
                                    <div class="col-xl-3 col-lg-4 col-sm-6">
                                        <div class="gallery-box card">
                                            <div class="gallery-container">
                                                <a class="image-popup"
                                                    href="{{ URL::asset('build/images/small/img-12.jpg') }}"
                                                    title="">
                                                    <img class="gallery-img img-fluid mx-auto"
                                                        src="{{ URL::asset('build/images/small/img-12.jpg') }}"
                                                        alt="" />
                                                    <div class="gallery-overlay">
                                                        <h5 class="overlay-caption">A mix of friends and strangers heading
                                                            off to find an adventure.</h5>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="box-content">
                                                <div class="d-flex align-items-center mt-2">
                                                    <div class="flex-grow-1 text-muted">by <a href=""
                                                            class="text-body text-truncate">Erica Kernan</a></div>
                                                    <div class="flex-shrink-0">
                                                        <div class="d-flex gap-3">
                                                            <button type="button"
                                                                class="btn btn-sm fs-12 btn-link text-body text-decoration-none px-0">
                                                                <i
                                                                    class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
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
                                    </div><!--end col-->
                                </div><!--end row-->
                                <div class="mt-4">
                                    <ul class="pagination pagination-separated justify-content-center mb-0">
                                        <li class="page-item disabled">
                                            <a href="javascript:void(0);" class="page-link"><i
                                                    class="mdi mdi-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active">
                                            <a href="javascript:void(0);" class="page-link">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="javascript:void(0);" class="page-link">2</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="javascript:void(0);" class="page-link">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="javascript:void(0);" class="page-link">4</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="javascript:void(0);" class="page-link">5</a>
                                        </li>
                                        <li class="page-item">
                                            <a href="javascript:void(0);" class="page-link"><i
                                                    class="mdi mdi-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end tab-pane-->
                        <div class="tab-pane" id="news" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-sm-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ URL::asset('build/images/small/img-1.jpg') }}"
                                                        alt="" width="115" class="rounded-1" />
                                                </div>
                                                <div class="flex-grow-1 ms-sm-4 mt-3 mt-sm-0">
                                                    <ul class="list-inline mb-2">
                                                        <li class="list-inline-item"><span
                                                                class="badge bg-success-subtle text-success fs-11">Business</span>
                                                        </li>
                                                    </ul>
                                                    <h5><a href="javascript:void(0);">A mix of friends and strangers
                                                            heading off to find an adventure</a></h5>
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item"><i
                                                                class="ri-user-3-fill text-success align-middle me-1"></i>
                                                            James Ballard</li>
                                                        <li class="list-inline-item"><i
                                                                class="ri-calendar-2-fill text-success align-middle me-1"></i>
                                                            23 Nov, 2021</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end card-->
                                </div><!--end col-->

                                <div class="col-lg-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-sm-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ URL::asset('build/images/small/img-2.jpg') }}"
                                                        alt="" width="115" class="rounded-1" />
                                                </div>
                                                <div class="flex-grow-1 ms-sm-4 mt-3 mt-sm-0">
                                                    <ul class="list-inline mb-2">
                                                        <li class="list-inline-item"><span
                                                                class="badge bg-warning-subtle text-warning fs-11">Development</span>
                                                        </li>
                                                    </ul>
                                                    <h5><a href="javascript:void(0);">How to get creative in your work
                                                            ?</a></h5>
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item"><i
                                                                class="ri-user-3-fill text-success align-middle me-1"></i>
                                                            Ruby Griffin</li>
                                                        <li class="list-inline-item"><i
                                                                class="ri-calendar-2-fill text-success align-middle me-1"></i>
                                                            23 Nov, 2021</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end card-->
                                </div><!--end col-->

                                <div class="col-lg-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-sm-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ URL::asset('build/images/small/img-3.jpg') }}"
                                                        alt="" width="115" class="rounded-1" />
                                                </div>
                                                <div class="flex-grow-1 ms-sm-4 mt-3 mt-sm-0">
                                                    <ul class="list-inline mb-2">
                                                        <li class="list-inline-item"><span
                                                                class="badge bg-info-subtle text-info fs-11">Fashion</span>
                                                        </li>
                                                    </ul>
                                                    <h5><a href="javascript:void(0);">How to become a best sale marketer in
                                                            a year!</a></h5>
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item"><i
                                                                class="ri-user-3-fill text-success align-middle me-1"></i>
                                                            Elwood Arter</li>
                                                        <li class="list-inline-item"><i
                                                                class="ri-calendar-2-fill text-success align-middle me-1"></i>
                                                            23 Nov, 2021</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end card-->
                                </div><!--end col-->

                                <div class="col-lg-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-sm-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ URL::asset('build/images/small/img-4.jpg') }}"
                                                        alt="" width="115" class="rounded-1" />
                                                </div>
                                                <div class="flex-grow-1 ms-sm-4 mt-3 mt-sm-0">
                                                    <ul class="list-inline mb-2">
                                                        <li class="list-inline-item"><span
                                                                class="badge bg-primary-subtle text-primary fs-11">Product</span>
                                                        </li>
                                                    </ul>
                                                    <h5><a href="javascript:void(0);">Manage white space in responsive
                                                            layouts ?</a></h5>
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item"><i
                                                                class="ri-user-3-fill text-success align-middle me-1"></i>
                                                            Nancy Martino</li>
                                                        <li class="list-inline-item"><i
                                                                class="ri-calendar-2-fill text-success align-middle me-1"></i>
                                                            23 Nov, 2021</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end card-->
                                </div><!--end col-->

                                <div class="col-lg-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-sm-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ URL::asset('build/images/small/img-5.jpg') }}"
                                                        alt="" width="115" class="rounded-1" />
                                                </div>
                                                <div class="flex-grow-1 ms-sm-4 mt-3 mt-sm-0">
                                                    <ul class="list-inline mb-2">
                                                        <li class="list-inline-item"><span
                                                                class="badge bg-success-subtle text-success fs-11">Business</span>
                                                        </li>
                                                    </ul>
                                                    <h5><a href="javascript:void(0);">Stack designer Olivia Murphy offers
                                                            freelancing advice</a></h5>
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item"><i
                                                                class="ri-user-3-fill text-success align-middle me-1"></i>
                                                            Erica Kernan</li>
                                                        <li class="list-inline-item"><i
                                                                class="ri-calendar-2-fill text-success align-middle me-1"></i>
                                                            11 Nov, 2021</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end card-->
                                </div><!--end col-->

                                <div class="col-lg-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-sm-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ URL::asset('build/images/small/img-6.jpg') }}"
                                                        alt="" width="115" class="rounded-1" />
                                                </div>
                                                <div class="flex-grow-1 ms-sm-4 mt-3 mt-sm-0">
                                                    <ul class="list-inline mb-2">
                                                        <li class="list-inline-item"><span
                                                                class="badge bg-danger-subtle text-danger fs-11">Design</span>
                                                        </li>
                                                    </ul>
                                                    <h5><a href="javascript:void(0);">A day in the of a professional
                                                            fashion designer</a></h5>
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item"><i
                                                                class="ri-user-3-fill text-success align-middle me-1"></i>
                                                            Jason McQuaid</li>
                                                        <li class="list-inline-item"><i
                                                                class="ri-calendar-2-fill text-success align-middle me-1"></i>
                                                            14 Nov, 2021</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end card-->
                                </div><!--end col-->

                                <div class="col-lg-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-sm-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ URL::asset('build/images/small/img-7.jpg') }}"
                                                        alt="" width="115" class="rounded-1" />
                                                </div>
                                                <div class="flex-grow-1 ms-sm-4 mt-3 mt-sm-0">
                                                    <ul class="list-inline mb-2">
                                                        <li class="list-inline-item"><span
                                                                class="badge bg-danger-subtle text-danger fs-11">Design</span>
                                                        </li>
                                                    </ul>
                                                    <h5><a href="javascript:void(0);">Design your apps in your own way</a>
                                                    </h5>
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item"><i
                                                                class="ri-user-3-fill text-success align-middle me-1"></i>
                                                            Henry Baird</li>
                                                        <li class="list-inline-item"><i
                                                                class="ri-calendar-2-fill text-success align-middle me-1"></i>
                                                            19 Nov, 2021</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end card-->
                                </div><!--end col-->

                                <div class="col-lg-6">
                                    <div class="card border">
                                        <div class="card-body">
                                            <div class="d-sm-flex">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ URL::asset('build/images/small/img-8.jpg') }}"
                                                        alt="" width="115" class="rounded-1" />
                                                </div>
                                                <div class="flex-grow-1 ms-sm-4 mt-3 mt-sm-0">
                                                    <ul class="list-inline mb-2">
                                                        <li class="list-inline-item"><span
                                                                class="badge bg-warning-subtle text-warning fs-11">Development</span>
                                                        </li>
                                                    </ul>
                                                    <h5><a href="javascript:void(0);">How apps is changing the IT world</a>
                                                    </h5>
                                                    <ul class="list-inline mb-0">
                                                        <li class="list-inline-item"><i
                                                                class="ri-user-3-fill text-success align-middle me-1"></i>
                                                            Elwood Arter</li>
                                                        <li class="list-inline-item"><i
                                                                class="ri-calendar-2-fill text-success align-middle me-1"></i>
                                                            10 Aug, 2021</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div><!--end card-->
                                </div><!--end col-->
                            </div><!--end row-->

                            <div class="mt-4">
                                <ul class="pagination pagination-separated justify-content-center mb-0">
                                    <li class="page-item disabled">
                                        <a href="javascript:void(0);" class="page-link"><i
                                                class="mdi mdi-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active">
                                        <a href="javascript:void(0);" class="page-link">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link">4</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link">5</a>
                                    </li>
                                    <li class="page-item">
                                        <a href="javascript:void(0);" class="page-link"><i
                                                class="mdi mdi-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div><!--end tab-pane-->
                        <div class="tab-pane" id="video" role="tabpanel">
                            <div class="row">
                                <div class="col-lg-12 video-list">
                                    <div class="list-element">
                                        <h5 class="mb-1"><a href="javascript:void(0);">Admin dashboard templates -
                                                Material Design for Velzon</a></h5>
                                        <p class="text-success">https://themesbrand.com/velzon/index</p>
                                        <div class="d-flex flex-column flex-sm-row">
                                            <div class="flex-shrink-0">
                                                <iframe src="https://www.youtube.com/embed/GfSZtaoc5bw"
                                                    title="YouTube video" allowfullscreen class="rounded"></iframe>
                                            </div>
                                            <div class="flex-grow-1 ms-sm-3 mt-2 mt-sm-0">
                                                <p class="text-muted mb-0">Velzon admin is super flexible, powerful, clean,
                                                    modern & responsive admin template based on <b>bootstrap 5</b> stable
                                                    with unlimited possibilities. You can simply change to any layout or
                                                    mode by changing a couple of lines of code. You can start small and
                                                    large projects or update design in your existing project using Velzon it
                                                    is very quick and easy as it is beautiful, adroit, and delivers the
                                                    ultimate user experience.</p>
                                                <div class="border border-dashed mb-1 mt-3"></div>
                                                <ul
                                                    class="list-inline d-flex align-items-center g-3 text-muted fs-14 mb-0">
                                                    <li class="list-inline-item me-3"><i
                                                            class="ri-thumb-up-line align-middle me-1"></i>335</li>
                                                    <li class="list-inline-item me-3"><i
                                                            class="ri-question-answer-line align-middle me-1"></i>102</li>
                                                    <li class="list-inline-item">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <i class="ri-user-line"></i>
                                                            </div>
                                                            <div class="flex-grow-1 fs-13 ms-1">
                                                                <span class="fw-medium">Themesbrand</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!--end list-element-->

                                    <div class="list-element mt-4">
                                        <h5 class="mb-1"><a href="javascript:void(0);">Create Responsive Admin Dashboard
                                                using Html CSS</a></h5>
                                        <p class="text-success">https://themesbrand.com/velzon/index</p>
                                        <div class="d-flex flex-column flex-sm-row">
                                            <div class="flex-shrink-0">
                                                <iframe src="https://www.youtube.com/embed/Z-fV2lGKnnU"
                                                    title="YouTube video" allowfullscreen class="rounded"></iframe>
                                            </div>
                                            <div class="flex-grow-1 ms-sm-3 mt-2 mt-sm-0">
                                                <p class="text-muted mb-0">Velzon admin is super flexible, powerful, clean,
                                                    modern & responsive admin template based on <b>bootstrap 5</b> stable
                                                    with unlimited possibilities. You can simply change to any layout or
                                                    mode by changing a couple of lines of code. You can start small and
                                                    large projects or update design in your existing project using Velzon it
                                                    is very quick and easy as it is beautiful, adroit, and delivers the
                                                    ultimate user experience.</p>
                                                <div class="border border-dashed mb-1 mt-3"></div>
                                                <ul
                                                    class="list-inline d-flex align-items-center g-3 text-muted fs-14 mb-0">
                                                    <li class="list-inline-item me-3"><i
                                                            class="ri-thumb-up-line align-middle me-1"></i>485</li>
                                                    <li class="list-inline-item me-3"><i
                                                            class="ri-question-answer-line align-middle me-1"></i>167</li>
                                                    <li class="list-inline-item">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <i class="ri-user-line"></i>
                                                            </div>
                                                            <div class="flex-grow-1 fs-13 ms-1">
                                                                <span class="fw-medium">Themesbrand</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!--end list-element-->

                                    <div class="list-element mt-4">
                                        <h5 class="mb-1"><a href="javascript:void(0);">Velzon - The Most Popular
                                                Bootstrap 5 HTML, Angular & React Js Admin</a></h5>
                                        <p class="text-success">https://themesbrand.com/velzon/index</p>
                                        <div class="d-flex flex-column flex-sm-row">
                                            <div class="flex-shrink-0">
                                                <iframe src="https://www.youtube.com/embed/2RZQN_ko0iU"
                                                    title="YouTube video" allowfullscreen class="rounded"></iframe>
                                            </div>
                                            <div class="flex-grow-1 ms-sm-3 mt-2 mt-sm-0">
                                                <p class="text-muted mb-0">Velzon admin is super flexible, powerful, clean,
                                                    modern & responsive admin template based on <b>bootstrap 5</b> stable
                                                    with unlimited possibilities. You can simply change to any layout or
                                                    mode by changing a couple of lines of code. You can start small and
                                                    large projects or update design in your existing project using Velzon it
                                                    is very quick and easy as it is beautiful, adroit, and delivers the
                                                    ultimate user experience.</p>
                                                <div class="border border-dashed mb-1 mt-3"></div>
                                                <ul
                                                    class="list-inline d-flex align-items-center g-3 text-muted fs-14 mb-0">
                                                    <li class="list-inline-item me-3"><i
                                                            class="ri-thumb-up-line align-middle me-1"></i>122</li>
                                                    <li class="list-inline-item me-3"><i
                                                            class="ri-question-answer-line align-middle me-1"></i>51</li>
                                                    <li class="list-inline-item">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <i class="ri-user-line"></i>
                                                            </div>
                                                            <div class="flex-grow-1 fs-13 ms-1">
                                                                <span class="fw-medium">Themesbrand</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!--end list-element-->

                                    <div class="list-element mt-4">
                                        <h5 class="mb-1"><a href="javascript:void(0);">Velzon Admin Dashboard (website
                                                analytics) with Bootstrap 5</a></h5>
                                        <p class="text-success">https://themesbrand.com/velzon/index</p>
                                        <div class="d-flex flex-column flex-sm-row">
                                            <div class="flex-shrink-0">
                                                <iframe src="https://www.youtube.com/embed/Z-fV2lGKnnU"
                                                    title="YouTube video" allowfullscreen class="rounded"></iframe>
                                            </div>
                                            <div class="flex-grow-1 ms-sm-3 mt-2 mt-sm-0">
                                                <p class="text-muted mb-0">Velzon admin is super flexible, powerful, clean,
                                                    modern & responsive admin template based on <b>bootstrap 5</b> stable
                                                    with unlimited possibilities. You can simply change to any layout or
                                                    mode by changing a couple of lines of code. You can start small and
                                                    large projects or update design in your existing project using Velzon it
                                                    is very quick and easy as it is beautiful, adroit, and delivers the
                                                    ultimate user experience.</p>
                                                <div class="border border-dashed mb-1 mt-3"></div>
                                                <ul
                                                    class="list-inline d-flex align-items-center g-3 text-muted fs-14 mb-0">
                                                    <li class="list-inline-item me-3"><i
                                                            class="ri-thumb-up-line align-middle me-1"></i>485</li>
                                                    <li class="list-inline-item me-3"><i
                                                            class="ri-question-answer-line align-middle me-1"></i>69</li>
                                                    <li class="list-inline-item">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <i class="ri-user-line"></i>
                                                            </div>
                                                            <div class="flex-grow-1 fs-13 ms-1">
                                                                <span class="fw-medium">Themesbrand</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!--end list-element-->

                                    <div class="list-element mt-4">
                                        <h5 class="mb-1"><a href="javascript:void(0);">Dashboard Admin Basics -
                                                YouTube</a></h5>
                                        <p class="text-success">https://themesbrand.com/velzon/index</p>
                                        <div class="d-flex flex-column flex-sm-row">
                                            <div class="flex-shrink-0">
                                                <iframe src="https://www.youtube.com/embed/1y_kfWUCFDQ"
                                                    title="YouTube video" allowfullscreen class="rounded"></iframe>
                                            </div>
                                            <div class="flex-grow-1 ms-sm-3 mt-2 mt-sm-0">
                                                <p class="text-muted mb-0">Velzon admin is super flexible, powerful, clean,
                                                    modern & responsive admin template based on <b>bootstrap 5</b> stable
                                                    with unlimited possibilities. You can simply change to any layout or
                                                    mode by changing a couple of lines of code. You can start small and
                                                    large projects or update design in your existing project using Velzon it
                                                    is very quick and easy as it is beautiful, adroit, and delivers the
                                                    ultimate user experience.</p>
                                                <div class="border border-dashed mb-1 mt-3"></div>
                                                <ul
                                                    class="list-inline d-flex align-items-center g-3 text-muted fs-14 mb-0">
                                                    <li class="list-inline-item me-3"><i
                                                            class="ri-thumb-up-line align-middle me-1"></i>58</li>
                                                    <li class="list-inline-item me-3"><i
                                                            class="ri-question-answer-line align-middle me-1"></i>24</li>
                                                    <li class="list-inline-item">
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-shrink-0">
                                                                <i class="ri-user-line"></i>
                                                            </div>
                                                            <div class="flex-grow-1 fs-13 ms-1">
                                                                <span class="fw-medium">Themesbrand</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div><!--end list-element-->

                                </div><!--end col-->
                                <div class="text-center">
                                    <button id="loadmore" class="btn btn-link text-success mt-2"><i
                                            class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load more
                                    </button>
                                </div>
                            </div><!--end row-->
                        </div><!--end tab-pane-->
                    </div><!--end tab-content-->

                </div><!--end card-body-->
            </div><!--end card -->
        </div><!--end card -->
    </div><!--end row-->
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
