@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Welcome
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    <!-- Carousel Slider -->
    <div class="js-carousel u-carousel-v5" data-infinite="true" data-autoplay="true" data-speed="8000"
        data-pagi-classes="u-carousel-indicators-v34 g-absolute-centered--y g-left-auto g-right-30 g-right-100--md"
        data-calc-target="#js-header">

        <!-- Carousel Slides -->
        <div class="js-slide h-100 g-flex-centered g-bg-img-hero g-bg-cover g-bg-black-opacity-0_3--after"
            style="background-image: url(build/assets/img-temp/1920x1080/img1.jpg);">
            <div class="container">
                <div class="g-max-width-600 g-pos-rel g-z-index-1">
                    <a class="d-block g-text-underline--none--hover" href="#">
                        <span class="d-block g-color-white g-font-size-20--md mb-2">
                            Making an Impact : <span
                                class="g-brd-bottom--dashed g-brd-2 g-brd-primary g-color-primary g-font-weight-700 g-pb-2">Careers
                                Day</span>
                        </span>
                        <span
                            class="d-block g-color-white g-font-secondary g-font-size-25 g-font-size-45--md g-line-height-1_4">
                            Explore career options October 12 at the Unify Arena.
                        </span>
                    </a>
                </div>

                <!-- Go to Button -->
                <a class="js-go-to d-flex align-items-center g-color-white g-pos-abs g-bottom-0 g-z-index-1 g-text-underline--none--hover g-pb-60"
                    href="#!" data-target="#content">
                    <span class="d-block u-go-to-v4 mr-3"></span>
                    <span class="g-brd-bottom--dashed g-brd-white-opacity-0_5 mr-1">scroll down</span> to find
                    out more
                </a>
                <!-- End Go to Button -->
            </div>
        </div>
        <!-- End Carousel Slides -->

        <!-- Carousel Slides -->
        <div class="js-slide h-100 g-flex-centered g-bg-img-hero g-bg-cover g-bg-black-opacity-0_2--after"
            style="background-image: url(build/assets/img-temp/1920x1080/img2.jpg);">
            <div class="container">
                <div class="g-max-width-600 g-pos-rel g-z-index-1">
                    <a class="d-block g-text-underline--none--hover" href="#">
                        <span class="d-block g-color-white g-font-size-20--md mb-2">
                            Discover Unify's Faculty of <span
                                class="g-brd-bottom--dashed g-brd-2 g-brd-primary g-color-primary g-font-weight-700 g-pb-2">Chemistry</span>
                        </span>
                        <span
                            class="d-block g-color-white g-font-secondary g-font-size-25 g-font-size-45--md g-line-height-1_4">
                            Student work, Success stories, Faculty profiles, 360&#176; tours &amp; more
                        </span>
                    </a>
                </div>

                <!-- Go to Button -->
                <a class="js-go-to d-flex align-items-center g-color-white g-pos-abs g-bottom-0 g-z-index-1 g-text-underline--none--hover g-pb-60"
                    href="#!" data-target="#content">
                    <span class="d-block u-go-to-v4 mr-3"></span>
                    <span class="g-brd-bottom--dashed g-brd-white-opacity-0_5 mr-1">scroll down</span> to find
                    out more
                </a>
                <!-- End Go to Button -->
            </div>
        </div>
        <!-- End Carousel Slides -->

        <!-- Carousel Slides -->
        <div class="js-slide h-100 g-flex-centered g-bg-img-hero g-bg-pos-top-center g-bg-cover g-bg-black-opacity-0_3--after"
            style="background-image: url(build/assets/img-temp/1920x1080/img3.jpg);">
            <div class="container">
                <div class="g-max-width-600 g-pos-rel g-z-index-1">
                    <a class="d-block g-text-underline--none--hover" href="#">
                        <span class="d-block g-color-white g-font-size-20--md mb-2">
                            Fall <span
                                class="g-brd-bottom--dashed g-brd-2 g-brd-primary g-color-primary g-font-weight-700 g-pb-2">Webinar
                                Series</span>
                        </span>
                        <span
                            class="d-block g-color-white g-font-secondary g-font-size-25 g-font-size-45--md g-line-height-1_4">
                            See our full schedule and register now
                        </span>
                    </a>
                </div>

                <!-- Go to Button -->
                <a class="js-go-to d-flex align-items-center g-color-white g-pos-abs g-bottom-0 g-z-index-1 g-text-underline--none--hover g-pb-60"
                    href="#!" data-target="#content">
                    <span class="d-block u-go-to-v4 mr-3"></span>
                    <span class="g-brd-bottom--dashed g-brd-white-opacity-0_5 mr-1">scroll down</span> to find
                    out more
                </a>
                <!-- End Go to Button -->
            </div>
        </div>
        <!-- End Carousel Slides -->
    </div>
    <!-- End Carousel Slider -->

    <!-- Find a Course -->
    <div id="content" class="u-shadow-v34 g-bg-main g-pos-rel g-z-index-1 g-pt-40 g-pb-10">
        <div class="container">
            <form class="row align-items-md-center">
                <div class="col-md-4 g-mb-30">
                    <h1 class="h2 g-color-white mb-0">Find a course</h1>
                </div>

                <div class="col-md-6 g-mb-30">
                    <input
                        class="form-control u-shadow-v19 g-brd-none g-bg-white g-font-size-16 g-rounded-30 g-px-25 g-py-13"
                        type="text" placeholder="Search for courses">
                </div>

                <div class="col-md-2 g-mb-30">
                    <button
                        class="btn u-shadow-v32 input-group-addon d-flex align-items-center g-brd-none g-color-white g-color-primary--hover g-bg-primary g-bg-white--hover g-font-size-16 g-rounded-30 g-transition-0_2 g-px-30 g-py-13"
                        type="button">
                        Search
                        <i class="ml-3 fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Find a Course -->

    <!-- Learn First Steps -->
    <div class="container g-pt-100 g-pb-50">
        <!-- Heading -->
        <div class="g-max-width-645 text-center mx-auto">
            <h2 class="h1 mb-3">Learn Your First Steps</h2>
            <p>Our strategy is simple: to create a place where the best researchers and most promising students
                can achieve their full potential.</p>
        </div>
        <!-- End Heading -->

        <hr class="g-brd-secondary-light-v1 g-my-50">

        <div class="row">
            <div class="col-lg-5 order-lg-2 g-mb-50">
                <!-- List of Links -->
                <ul class="list-unstyled g-pl-15--lg mb-0">
                    <!-- Links -->
                    <li>
                        <div
                            class="media u-block-hover g-color-main g-text-underline--none--hover g-transition-0_5 g-px-10 g-py-15">
                            <div class="d-flex mr-4">
                                <span
                                    class="u-icon-v3 u-icon-size--lg u-shadow-v35 g-color-blue g-color-white--hover g-bg-secondary-dark-v1 g-bg-main--hover g-font-size-20 rounded-circle">
                                    <i class="icon-finance-067 u-line-icon-pro"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h3 class="h5 g-color-blue g-color-main--hover g-font-primary mb-1">Future
                                    Students</h3>
                                <p class="g-font-size-16 mb-0">Unify's unique personality rests on the bedrock
                                    values of academic excellence.</p>
                            </div>
                            <a class="u-link-v2" href="page-future-students-1.html"></a>
                        </div>
                    </li>
                    <!-- End Links -->

                    <!-- Links -->
                    <li>
                        <div
                            class="media u-block-hover g-color-main g-text-underline--none--hover g-transition-0_5 g-px-10 g-py-15">
                            <div class="d-flex mr-4">
                                <span
                                    class="u-icon-v3 u-icon-size--lg u-shadow-v35 g-color-purple g-color-white--hover g-bg-secondary-dark-v1 g-bg-main--hover g-font-size-20 rounded-circle">
                                    <i class="icon-education-103 u-line-icon-pro"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h3 class="h5 g-color-purple g-color-main--hover g-font-primary mb-1">Academic
                                    Programs</h3>
                                <p class="g-font-size-16 mb-0">An Unify education fosters personal growth and a
                                    commitment to the world beyond oneself.</p>
                            </div>
                            <a class="u-link-v2" href="page-programs-1.html"></a>
                        </div>
                    </li>
                    <!-- End Links -->

                    <!-- Links -->
                    <li>
                        <div
                            class="media u-block-hover g-color-main g-text-underline--none--hover g-transition-0_5 g-px-10 g-py-15">
                            <div class="d-flex mr-4">
                                <span
                                    class="u-icon-v3 u-icon-size--lg u-shadow-v35 g-color-teal g-color-white--hover g-bg-secondary-dark-v1 g-bg-main--hover g-font-size-20 rounded-circle">
                                    <i class="icon-education-124 u-line-icon-pro"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h3 class="h5 g-color-teal g-color-main--hover g-font-primary mb-1">Key Dates
                                </h3>
                                <p class="g-font-size-16 mb-0">There is no better way to understand Unify
                                    University than by spending time on campus.</p>
                            </div>
                            <a class="u-link-v2" href="page-events-1.html"></a>
                        </div>
                    </li>
                    <!-- End Links -->

                    <!-- Links -->
                    <li>
                        <div
                            class="media u-block-hover g-color-main g-text-underline--none--hover g-transition-0_5 g-px-10 g-py-15">
                            <div class="d-flex mr-4">
                                <span
                                    class="u-icon-v3 u-icon-size--lg u-shadow-v35 g-color-brown g-color-white--hover g-bg-secondary-dark-v1 g-bg-main--hover g-font-size-20 rounded-circle">
                                    <i class="icon-education-127 u-line-icon-pro"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h3 class="h5 g-color-brown g-color-main--hover g-font-primary mb-1">Campus
                                    Tours</h3>
                                <p class="g-font-size-16 mb-0">Take a tour, learn about admission and financial
                                    aid, speak with current students.</p>
                            </div>
                            <a class="u-link-v2" href="page-campus-life-1.html"></a>
                        </div>
                    </li>
                    <!-- End Links -->
                </ul>
                <!-- End List of Links -->
            </div>

            <div class="col-lg-7 order-lg-1 g-pt-10 g-mb-60">
                <!-- Youtube Iframe -->
                <div
                    class="embed-responsive embed-responsive-16by9 u-shadow-v36 g-brd-around g-brd-7 g-brd-white g-rounded-5 mb-4">
                    <iframe src="https://www.youtube.com/embed/FxiskmF16gU?rel=0&amp;showinfo=0" frameborder="0"
                        allowfullscreen></iframe>
                </div>
                <!-- End Youtube Iframe -->

                <h4 class="h3 mb-0">Explore our University in minutes</h4>
                <a class="g-pl-30" href="#">&#8212; Learn the benefits</a>
            </div>
        </div>
    </div>
    <!-- End Learn First Steps -->

    <!-- Researches -->
    <div class="g-bg-main g-pos-rel">
        <div class="container g-pos-rel g-z-index-1 g-pt-100 g-pb-120">
            <!-- Heading -->
            <div class="g-max-width-645 text-center mx-auto g-mb-60">
                <h2 class="h1 text-center g-color-white">Research with Unify University</h2>
            </div>
            <!-- End Heading -->

            <div class="row align-items-lg-center">
                <div class="col-lg-7 order-lg-2 g-mb-50">
                    <div class="g-pos-rel g-pl-15--lg">
                        <img class="img-fluid w-100 u-shadow-v19 g-brd-around g-brd-7 g-brd-secondary rounded"
                            src="{{ URL::asset('build/assets/img-temp/600x400/img1.jpg') }}" alt="Image Description">

                        <!-- Video Button -->
                        <div class="g-absolute-centered--y g-left-0 g-right-0 text-center mx-auto">
                            <a class="js-fancybox d-inline-block u-block-hover g-bg-white g-rounded-50 g-text-underline--none--hover g-transition-0_3 g-px-20 g-py-10"
                                href="javascript:;" data-src="//vimeo.com/167434033" data-speed="350">
                                <span class="d-flex align-items-center">
                                    <span
                                        class="u-icon-v3 g-width-30 g-height-30 g-color-white g-bg-primary g-bg-main--hover rounded-circle mr-3">
                                        <i class="g-font-size-13 g-ml-2 hs-icon hs-icon-play"></i>
                                    </span>
                                    <span class="g-color-primary g-color-main--hover">Play video</span>
                                </span>
                            </a>
                        </div>
                        <!-- End Video Button -->
                    </div>
                </div>

                <div class="col-lg-5 order-lg-1 g-mb-50">
                    <!-- Researches - Info -->
                    <div class="mb-5">
                        <h2 class="h3 g-color-white mb-4">Early-career researchers excel in NHMRC fellowships
                        </h2>
                        <p class="g-color-white-opacity-0_7">Prime Minister Malcolm Turnbull and NHMRC CEO
                            Professor Anne Kelso announced this week that Unify had received eight Career
                            Development Fellowships, 14 Early Career Fellowships, five Practitioner Fellowships,
                            seven Research Fellowships and three Centres of Research Excellence.</p>
                    </div>

                    <div class="media g-max-width-300">
                        <div class="d-flex mr-3">
                            <div class="g-width-40 g-height-40">
                                <img class="img-fluid g-brd-around g-brd-2 g-brd-white rounded-circle"
                                    src="{{ URL::asset('build/assets/img-temp/100x100/img1.jpg') }}"
                                    alt="Image Description">
                            </div>
                        </div>
                        <div class="media-body">
                            <span class="d-block g-color-white g-font-secondary g-font-size-16 mb-2">" The
                                University has an impressive track record in NHMRC funding "</span>
                            <h5 class="h6 g-color-primary g-font-primary g-font-weight-700">- Professor
                                Jonathan</h5>
                        </div>
                    </div>
                    <!-- End Researches - Info -->
                </div>
            </div>
        </div>

        <!-- SVG Background Shape -->
        <svg class="g-pos-abs g-bottom-0 g-left-0" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 323"
            enable-background="new 0 0 1920 323" xml:space="preserve">
            <polygon fill="#2c3856" points="0,323 1920,323 1920,0 " />
            <polygon fill="#293451" points="-0.5,322.5 -0.5,131.5 658.3,212.3 " />
        </svg>
        <!-- End SVG Background Shape -->
    </div>
    <!-- End Researches -->

    <!-- Research Statistics -->
    <div class="container g-mt-minus-70 g-pb-100">
        <div class="row">
            <div class="col-sm-6 col-lg-3 g-mb-30 g-mb-20--lg">
                <!-- Research Block -->
                <div class="g-pa-10">
                    <div class="g-width-220 g-height-220 u-shadow-v37 rounded-circle g-pos-rel mx-auto">
                        <!-- Research - SVG Shape -->
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" viewBox="0 0 187 187" enable-background="new 0 0 187 187"
                            xml:space="preserve">
                            <g id="_x31_">
                                <circle fill="#ffffff" cx="93.5" cy="93.5" r="93.5" />
                                <circle fill="#ffffff" stroke="#f0f2f8" stroke-width="7" stroke-miterlimit="10"
                                    cx="93.5" cy="93.5" r="81" />
                                <path fill="none" stroke="#49c1aa" stroke-width="7" stroke-linecap="round"
                                    stroke-miterlimit="10" d="M93.5,12.5
                          c44.7,0,81,36.3,81,81c0,21.3-8.2,40.6-21.6,55.1" />
                            </g>
                        </svg>
                        <!-- End Research - SVG Shape -->

                        <!-- Research - Info -->
                        <div class="text-center g-absolute-centered--y g-left-0 g-right-0 g-px-35">
                            <h4 class="h2 g-font-primary">Top 25</h4>
                            <span class="d-block">One of the world's top research universities</span>
                        </div>
                        <!-- Research - Info -->
                    </div>
                </div>
                <!-- End Research Block -->
            </div>

            <div class="col-sm-6 col-lg-3 g-mb-30 g-mb-20--lg">
                <!-- Research Block -->
                <div class="g-pa-10">
                    <div class="g-width-220 g-height-220 u-shadow-v37 rounded-circle g-pos-rel mx-auto">
                        <!-- Research - SVG Shape -->
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" viewBox="0 0 187 187" enable-background="new 0 0 187 187"
                            xml:space="preserve">
                            <circle fill="#ffffff" cx="93.5" cy="93.5" r="93.5" />
                            <circle fill="#ffffff" stroke="#f0f2f8" stroke-width="7" stroke-miterlimit="10"
                                cx="93.5" cy="93.5" r="81" />
                            <path fill="none" stroke="#a27fcc" stroke-width="7" stroke-linecap="round"
                                stroke-miterlimit="10" d="M93.5,12.5
                        c43,0,78.2,33.6,80.8,75.9" />
                        </svg>
                        <!-- End Research - SVG Shape -->

                        <!-- Research - Info -->
                        <div class="text-center g-absolute-centered--y g-left-0 g-right-0 g-px-35">
                            <h4 class="h2 g-font-primary">100%</h4>
                            <span class="d-block">of our research is ranked at world standard or above</span>
                        </div>
                        <!-- Research - Info -->
                    </div>
                </div>
                <!-- End Research Block -->
            </div>

            <div class="col-sm-6 col-lg-3 g-mb-30 g-mb-20--lg">
                <!-- Research Block -->
                <div class="g-pa-10">
                    <div class="g-width-220 g-height-220 u-shadow-v37 rounded-circle g-pos-rel mx-auto">
                        <!-- Research - SVG Shape -->
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" viewBox="0 0 187 187" enable-background="new 0 0 187 187"
                            xml:space="preserve">
                            <circle fill="#ffffff" cx="93.5" cy="93.5" r="93.5" />
                            <circle fill="#ffffff" stroke="#f0f2f8" stroke-width="7" stroke-miterlimit="10"
                                cx="93.5" cy="93.5" r="81" />
                            <path fill="none" stroke="#61a9d1" stroke-width="7" stroke-linecap="round"
                                stroke-miterlimit="10" d="M93.5,12.5
                        c26.7,0,50.4,12.9,65.2,32.9" />
                        </svg>
                        <!-- End Research - SVG Shape -->

                        <!-- Research - Info -->
                        <div class="text-center g-absolute-centered--y g-left-0 g-right-0 g-px-35">
                            <h4 class="h2 g-font-primary">70+</h4>
                            <span class="d-block">research centres</span>
                        </div>
                        <!-- Research - Info -->
                    </div>
                </div>
                <!-- End Research Block -->
            </div>

            <div class="col-sm-6 col-lg-3 g-mb-30 g-mb-20--lg">
                <!-- Research Block -->
                <div class="g-pa-10">
                    <div class="g-width-220 g-height-220 u-shadow-v37 rounded-circle g-pos-rel mx-auto">
                        <!-- Research - SVG Shape -->
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" viewBox="0 0 187 187" enable-background="new 0 0 187 187"
                            xml:space="preserve">
                            <circle fill="#ffffff" cx="93.5" cy="93.5" r="93.5" />
                            <circle fill="#ffffff" stroke="#f0f2f8" stroke-width="7" stroke-miterlimit="10"
                                cx="93.5" cy="93.5" r="81" />
                            <path fill="#ffffff" stroke="#d16680" stroke-width="7" stroke-linecap="round"
                                stroke-miterlimit="10" d="M93.5,12.5
                        c44.7,0,81,36.3,81,81s-36.3,81-81,81c-26.3,0-49.7-12.6-64.5-32" />
                        </svg>
                        <!-- End Research - SVG Shape -->

                        <!-- Research - Info -->
                        <div class="text-center g-absolute-centered--y g-left-0 g-right-0 g-px-35">
                            <h4 class="h2 g-font-primary">Tripling</h4>
                            <span class="d-block">our investment in research</span>
                        </div>
                        <!-- Research - Info -->
                    </div>
                </div>
                <!-- End Research Block -->
            </div>
        </div>

        <!-- SVG Shape (Large Desktop) -->
        <div class="g-max-width-870 mx-auto">
            <svg class="g-hidden-md-down" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 758.2 172.3"
                enable-background="new 0 0 758.2 172.3" xml:space="preserve">
                <g id="Main_Circle">
                    <path fill="#f0f2f8" d="M324.4,118.7c0-29.5,24.7-53.6,54.8-53.6h0c30.2,0,54.8,24.1,54.8,53.6v0c0,29.5-24.7,53.6-54.8,53.6h0
                    C349,172.3,324.4,148.2,324.4,118.7L324.4,118.7" />

                    <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="323.9412" y1="164.2837"
                        x2="383.4379" y2="129.9333"
                        gradientTransform="matrix(0.9061 0.1165 0.1165 0.8555 21.5988 -26.7912)">
                        <stop offset="0" style="stop-color:#f0f2f8;stop-opacity:0" />
                        <stop offset="0.5224" style="stop-color:#dbdfe8;stop-opacity:0.4179" />
                        <stop offset="1" style="stop-color:#ccd1dd;stop-opacity:0.8" />
                    </linearGradient>
                    <polygon fill="url(#SVGID_3_)" fill-opacity="0.36"
                        points="361.5,168.8 329.2,144.2 356.9,111.8 389.2,136.3  " />
                    <text transform="matrix(1.0223 0 0 1 358.4563 134.7857)" fill="#ffffff" font-family="'FontAwesome'"
                        font-size="43.6866px"></text>
                </g>
                <g id="Right">
                    <path fill="none" stroke="#f0f2f8" stroke-width="8" stroke-linecap="round"
                        stroke-miterlimit="10" d="M449.4,119.3h42.9
                    c8.3,0,15.1-6,15.1-13.3V5.3" />
                    <path fill="none" stroke="#f0f2f8" stroke-width="8" stroke-linecap="round"
                        stroke-miterlimit="10" d="M461.4,119.3h281
                    c6.6,0,12-6.4,12-14.1V4.3" />
                </g>
                <g id="Left">
                    <path fill="none" stroke="#f0f2f8" stroke-width="8" stroke-linecap="round"
                        stroke-miterlimit="10" d="M309.4,119.3h-42.9
                    c-8.3,0-15.1-6-15.1-13.3V5.3" />
                    <path fill="none" stroke="#f0f2f8" stroke-width="8" stroke-linecap="round"
                        stroke-miterlimit="10" d="M297.4,119.3h-281
                    c-6.6,0-12-6.4-12-14.1V4.3" />
                </g>
            </svg>
        </div>
        <!-- End SVG Shape (Large Desktop) -->

        <!-- SVG Shape (Small Devices) -->
        <div class="g-max-width-400 mx-auto">
            <svg class="g-hidden-lg-up" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 407 172.3"
                enable-background="new 0 0 407 172.3" xml:space="preserve">
                <path fill="none" stroke="#f0f2f8" stroke-width="8" stroke-linecap="round" stroke-miterlimit="10" d="M134,118.1l-113.1,0
                    c-9.1,0-16.8-7-16.9-15.8c0-0.1,0-0.1,0-0.2V4" />
                <path fill="#f0f2f8" d="M148.4,118.7c0-29.5,24.7-53.6,54.8-53.6h0c30.2,0,54.8,24.1,54.8,53.6v0c0,29.5-24.7,53.6-54.8,53.6h0
                    C173,172.3,148.4,148.2,148.4,118.7L148.4,118.7" />
                <linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="147.9412" y1="164.2837"
                    x2="207.4379" y2="129.9333" gradientTransform="matrix(0.9061 0.1165 0.1165 0.8555 5.0741 -6.294)">
                    <stop offset="0" style="stop-color:#f0f2f8;stop-opacity:0" />
                    <stop offset="0.5224" style="stop-color:#dbdfe8;stop-opacity:0.4179" />
                    <stop offset="1" style="stop-color:#ccd1dd;stop-opacity:0.8" />
                </linearGradient>
                <polygon fill="url(#SVGID_4_)" fill-opacity="0.36"
                    points="185.5,168.8 153.2,144.2 180.9,111.8 213.2,136.3 " />
                <text transform="matrix(1.0223 0 0 1 182.4563 134.7857)" fill="#ffffff" font-family="'FontAwesome'"
                    font-size="43.6866px"></text>
                <path fill="none" stroke="#f0f2f8" stroke-width="8" stroke-linecap="round" stroke-miterlimit="10" d="M403,4.9l0,99.3
                    c0,8-8,14.7-18,14.8c-0.1,0-0.1,0-0.2,0H273" />
            </svg>
        </div>
        <!-- End SVG Shape (Small Devices) -->

        <div class="g-max-width-300 text-center mx-auto">
            <p class="g-color-secondary-light-v1 mb-0">Our award winning and the world changing hall of facts
                and figures.</p>
        </div>
    </div>
    <!-- End Research Statistics -->

    <!-- Testimonials -->
    <div class="g-bg-main-light-v2">
        <div class="container g-pt-70 g-pb-20">
            <div class="js-carousel" data-pagi-classes="u-carousel-indicators-v35--white g-pos-rel text-center">
                <!-- Testimonials -->
                <div class="js-slide">
                    <div class="row justify-content-lg-center g-mb-20">
                        <div class="col-md-3 col-lg-2 g-mb-20">
                            <img class="img-fluid u-shadow-v36 rounded-circle mx-auto"
                                src="{{ URL::asset('build/assets/img-temp/200x200/img3.jpg') }}" alt="Image Description">
                        </div>

                        <div class="col-md-9 col-lg-8 g-mb-20">
                            <!-- Testimonials - Content -->
                            <div class="media mb-3">
                                <div class="d-flex mr-3">
                                    <span
                                        class="g-color-white-opacity-0_8 g-font-secondary g-font-size-40 g-opacity-0_3 g-pos-rel g-top-minus-10">&#8220;</span>
                                </div>
                                <div class="media-body">
                                    <blockquote
                                        class="g-brd-left-none g-color-white g-font-style-italic g-font-size-20 g-pl-0">
                                        The program offers both a strong theoretical and practical component
                                        providing the solid foundation needed for student teachers to venture
                                        out into the realm of teaching.
                                        <span
                                            class="align-self-end g-color-white-opacity-0_8 g-font-secondary g-font-size-40 g-opacity-0_3 g-line-height-0 align-bottom g-pos-rel g-top-minus-10">&#8221;</span>
                                    </blockquote>
                                </div>
                            </div>

                            <div class="g-pl-30">
                                <h3 class="h4 g-color-white-opacity-0_9 mb-0">Karolina Wellyan</h3>
                                <span class="d-block g-font-size-18 g-color-white-opacity-0_5 g-pl-20">&#8212;
                                    Bachelor Student</span>
                            </div>
                            <!-- End Testimonials - Content -->
                        </div>
                    </div>
                </div>
                <!-- End Testimonials -->

                <!-- Testimonials -->
                <div class="js-slide">
                    <div class="row justify-content-lg-center g-mb-20">
                        <div class="col-md-3 col-lg-2 g-mb-20">
                            <img class="img-fluid u-shadow-v36 rounded-circle mx-auto"
                                src="{{ URL::asset('build/assets/img-temp/200x200/img1.jpg') }}" alt="Image Description">
                        </div>

                        <div class="col-md-9 col-lg-8 g-mb-20">
                            <!-- Testimonials - Content -->
                            <div class="media mb-3">
                                <div class="d-flex mr-3">
                                    <span
                                        class="g-color-white-opacity-0_8 g-font-secondary g-font-size-40 g-opacity-0_3 g-pos-rel g-top-minus-10">&#8220;</span>
                                </div>
                                <div class="media-body">
                                    <blockquote
                                        class="g-brd-left-none g-color-white g-font-style-italic g-font-size-20 g-pl-0">
                                        Unify's TESL program was a personally enriching and professionally
                                        beneficial experience that opened the door to a rewarding second career
                                        in ESL.
                                        <span
                                            class="align-self-end g-color-white-opacity-0_8 g-font-secondary g-font-size-40 g-opacity-0_3 g-line-height-0 align-bottom g-pos-rel g-top-minus-10">&#8221;</span>
                                    </blockquote>
                                </div>
                            </div>

                            <div class="g-pl-30">
                                <h3 class="h4 g-color-white-opacity-0_9 mb-0">Alex Watson</h3>
                                <span class="d-block g-font-size-18 g-color-white-opacity-0_5 g-pl-20">&#8212;
                                    2015 Grad</span>
                            </div>
                            <!-- End Testimonials - Content -->
                        </div>
                    </div>
                </div>
                <!-- End Testimonials -->

                <!-- Testimonials -->
                <div class="js-slide">
                    <div class="row justify-content-lg-center g-mb-20">
                        <div class="col-md-3 col-lg-2 g-mb-20">
                            <img class="img-fluid u-shadow-v36 rounded-circle mx-auto"
                                src="{{ URL::asset('build/assets/img-temp/200x200/img2.jpg') }}" alt="Image Description">
                        </div>

                        <div class="col-md-9 col-lg-8 g-mb-20">
                            <!-- Testimonials - Content -->
                            <div class="media mb-3">
                                <div class="d-flex mr-3">
                                    <span
                                        class="g-color-white-opacity-0_8 g-font-secondary g-font-size-40 g-opacity-0_3 g-pos-rel g-top-minus-10">&#8220;</span>
                                </div>
                                <div class="media-body">
                                    <blockquote
                                        class="g-brd-left-none g-color-white g-font-style-italic g-font-size-20 g-pl-0">
                                        I would highly recommend the Unify TESL program – it gave me the
                                        training, tools and network to get ESL teaching opportunities in
                                        Toronto. Unify's program provided a good balance of both the practical
                                        and theoretical knowledge.
                                        <span
                                            class="align-self-end g-color-white-opacity-0_8 g-font-secondary g-font-size-40 g-opacity-0_3 g-line-height-0 align-bottom g-pos-rel g-top-minus-10">&#8221;</span>
                                    </blockquote>
                                </div>
                            </div>

                            <div class="g-pl-30">
                                <h3 class="h4 g-color-white-opacity-0_9 mb-0">Maria Olsson</h3>
                                <span class="d-block g-font-size-18 g-color-white-opacity-0_5 g-pl-20">&#8212;
                                    2017 Grad</span>
                            </div>
                            <!-- End Testimonials - Content -->
                        </div>
                    </div>
                </div>
                <!-- End Testimonials -->

                <!-- Testimonials -->
                <div class="js-slide">
                    <div class="row justify-content-lg-center g-mb-20">
                        <div class="col-md-3 col-lg-2 g-mb-20">
                            <img class="img-fluid u-shadow-v36 rounded-circle mx-auto"
                                src="{{ URL::asset('build/assets/img-temp/200x200/img4.jpg') }}" alt="Image Description">
                        </div>

                        <div class="col-md-9 col-lg-8 g-mb-20">
                            <!-- Testimonials - Content -->
                            <div class="media mb-3">
                                <div class="d-flex mr-3">
                                    <span
                                        class="g-color-white-opacity-0_8 g-font-secondary g-font-size-40 g-opacity-0_3 g-pos-rel g-top-minus-10">&#8220;</span>
                                </div>
                                <div class="media-body">
                                    <blockquote
                                        class="g-brd-left-none g-color-white g-font-style-italic g-font-size-20 g-pl-0">
                                        The TESL training at Unify includes an extremely useful practicum
                                        portion where students get the chance to hone their skills at the front
                                        of the class and receive feedback from mentors.
                                        <span
                                            class="align-self-end g-color-white-opacity-0_8 g-font-secondary g-font-size-40 g-opacity-0_3 g-line-height-0 align-bottom g-pos-rel g-top-minus-10">&#8221;</span>
                                    </blockquote>
                                </div>
                            </div>

                            <div class="g-pl-30">
                                <h3 class="h4 g-color-white-opacity-0_9 mb-0">Brown Draxler</h3>
                                <span class="d-block g-font-size-18 g-color-white-opacity-0_5 g-pl-20">&#8212;
                                    Jeff Brown, M.A., Ph.D.</span>
                            </div>
                            <!-- End Testimonials - Content -->
                        </div>
                    </div>
                </div>
                <!-- End Testimonials -->
            </div>
        </div>
    </div>
    <!-- End Testimonials -->

    <!-- Events -->
    <div class="g-bg-secondary">
        <div class="container g-py-100">
            <!-- Heading -->
            <div class="g-max-width-645 text-center g-mb-60 mx-auto">
                <h2 class="h1 mb-3">More Ways to Know the World with Unify Events</h2>
                <p>Grow your business, go global, and boost conversions in other countries by localizing your
                    education experience.</p>
            </div>
            <!-- End Heading -->

            <!-- More Events List -->
            <ul class="list-unstyled g-mb-60">
                <!-- Events Item -->
                <li
                    class="u-block-hover u-shadow-v37--hover g-bg-secondary-dark-v1 g-bg-white--hover rounded g-px-50 g-py-30 mb-4">
                    <div class="row align-items-lg-center">
                        <div class="col-md-3 col-lg-2 g-mb-30 g-mb-0--lg">
                            <div class="d-flex align-items-center mb-3">
                                <span
                                    class="g-color-primary g-font-weight-500 g-font-size-50 g-line-height-1 mr-3">12</span>
                                <div class="g-color-text-light-v1 text-center g-line-height-1_4">
                                    <span class="d-block">Nov.</span>
                                    <span class="d-block">2017</span>
                                </div>
                            </div>
                            <span class="d-block g-color-text-light-v1">6.00pm - 7.15pm</span>
                        </div>
                        <div class="col-md-9 col-lg-8 g-mb-30 g-mb-0--lg">
                            <h3 class="h5 g-font-primary g-font-weight-500 mb-1">Health Sciences New Faculty
                                Breakfast &amp; Resource Showcase</h3>
                            <p>Professor Allan Pack, University of Pennsylvania</p>
                            <a class="d-inline-block u-link-v5 g-color-text-light-v1 g-color-primary--hover"
                                href="#">
                                <i class="align-middle g-color-primary mr-2 icon-real-estate-027 u-line-icon-pro"></i>
                                Unify Perkins Lecture Hall
                            </a>
                        </div>
                        <div class="col-lg-2">
                            <a class="btn btn-block g-brd-2 g-brd-main-opacity-0_1 g-brd-primary--hover g-color-primary g-color-white--hover g-bg-primary--hover g-rounded-30 g-py-10"
                                href="#">Register now</a>
                        </div>
                    </div>
                    <a class="u-link-v2" href="#"></a>
                </li>
                <!-- End Events Item -->

                <!-- Events Item -->
                <li
                    class="u-block-hover u-shadow-v37--hover g-bg-secondary-dark-v2 g-bg-white--hover rounded g-px-50 g-pa-30 mb-4">
                    <div class="row align-items-lg-center">
                        <div class="col-md-3 col-lg-2 g-mb-30 g-mb-0--lg">
                            <div class="d-flex align-items-center mb-3">
                                <span
                                    class="g-color-primary g-font-weight-500 g-font-size-50 g-line-height-1 mr-3">05</span>
                                <div class="g-color-text-light-v1 text-center g-line-height-1_4">
                                    <span class="d-block">Dec.</span>
                                    <span class="d-block">2017</span>
                                </div>
                            </div>
                            <span class="d-block g-color-text-light-v1">6.00pm - 7.15pm</span>
                        </div>
                        <div class="col-md-9 col-lg-8 g-mb-30 g-mb-0--lg">
                            <h3 class="h5 g-font-primary g-font-weight-500 mb-1">Build Your Weekly Schedule
                                Drop-in Event</h3>
                            <p>Toward a just and sustainable food system</p>
                            <a class="d-inline-block u-link-v5 g-color-text-light-v1 g-color-primary--hover"
                                href="#">
                                <i class="align-middle g-color-primary mr-2 icon-real-estate-027 u-line-icon-pro"></i>
                                Unify Business School
                            </a>
                        </div>
                        <div class="col-lg-2">
                            <a class="btn btn-block g-brd-2 g-brd-main-opacity-0_1 g-brd-primary--hover g-color-primary g-color-white--hover g-bg-primary--hover g-rounded-30 g-py-10"
                                href="#">Register now</a>
                        </div>
                    </div>
                    <a class="u-link-v2" href="#"></a>
                </li>
                <!-- End Events Item -->

                <!-- Events Item -->
                <li
                    class="u-block-hover u-shadow-v37--hover g-bg-secondary-dark-v1 g-bg-white--hover rounded g-px-50 g-pa-30 mb-4">
                    <div class="row align-items-lg-center">
                        <div class="col-md-3 col-lg-2 g-mb-30 g-mb-0--lg">
                            <div class="d-flex align-items-center mb-3">
                                <span
                                    class="g-color-primary g-font-weight-500 g-font-size-50 g-line-height-1 mr-3">23</span>
                                <div class="g-color-text-light-v1 text-center g-line-height-1_4">
                                    <span class="d-block">Dec.</span>
                                    <span class="d-block">2017</span>
                                </div>
                            </div>
                            <span class="d-block g-color-text-light-v1">6.00pm - 7.15pm</span>
                        </div>
                        <div class="col-md-9 col-lg-8 g-mb-30 g-mb-0--lg">
                            <h3 class="h5 g-font-primary g-font-weight-500 mb-1">Soulful Singing</h3>
                            <p>Professor Allan Pack, University of Pennsylvania</p>
                            <a class="d-inline-block u-link-v5 g-color-text-light-v1 g-color-primary--hover"
                                href="#">
                                <i class="align-middle g-color-primary mr-2 icon-real-estate-027 u-line-icon-pro"></i>
                                Unify Perkins Lecture Hall
                            </a>
                        </div>
                        <div class="col-lg-2">
                            <a class="btn btn-block g-brd-2 g-brd-main-opacity-0_1 g-brd-primary--hover g-color-primary g-color-white--hover g-bg-primary--hover g-rounded-30 g-py-10"
                                href="#">Register now</a>
                        </div>
                    </div>
                    <a class="u-link-v2" href="#"></a>
                </li>
                <!-- End Events Item -->
            </ul>
            <!-- End More Events List -->

            <div class="text-center">
                <a class="btn u-shadow-v33 g-color-white g-color-white--hover g-bg-primary g-bg-main--hover g-rounded-30 g-px-25 g-py-10"
                    href="page-events-1.html">View all Events</a>
            </div>
        </div>
    </div>
    <!-- End Events -->

    <!-- News -->
    <div class="container g-pt-100">
        <div class="g-px-30--lg">
            <!-- Heading -->
            <div class="g-max-width-645 text-center mx-auto g-mb-30">
                <h2 class="h1 mb-3">Latest News &amp; Opinions</h2>
                <p>Our duty towards you is to share our experience we're reaching in our work path with you.</p>
            </div>
            <!-- End Heading -->

            <!-- News Carousel -->
            <div class="js-carousel u-carousel-v5 g-mx-minus-15" data-slides-show="3" data-slides-scroll="1"
                data-arrows-classes="u-icon-v3 u-icon-size--sm g-absolute-centered--y g-color-primary g-color-white--hover g-bg-primary-opacity-0_1 g-bg-primary--hover rounded-circle g-pa-11"
                data-arrow-left-classes="fa fa-angle-left g-left-0 g-ml-minus-50--lg"
                data-arrow-right-classes="fa fa-angle-right g-right-0 g-mr-minus-50--lg"
                data-pagi-classes="u-carousel-indicators-v35 g-pos-rel text-center g-mt-30"
                data-responsive='[{
                    "breakpoint": 992,
                    "settings": {
                    "slidesToShow": 2
                    }
                    }, {
                    "breakpoint": 768,
                    "settings": {
                    "slidesToShow": 1
                    }
                    }, {
                    "breakpoint": 554,
                    "settings": {
                    "slidesToShow": 1
                    }
                    }]'>
                <!-- News -->
                <div class="js-slide u-shadow-v38 g-bg-size-cover g-bg-pos-center rounded g-mx-15 g-my-30"
                    style="background-image: url(build/assets/img-temp/400x500/img1.jpg);">
                    <article class="align-self-end text-center g-pos-rel g-z-index-1 g-pa-40 mx-auto">
                        <h3 class="g-color-white">Unify University announces a new student award in honour of
                            Fashion</h3>
                        <div class="mt-4">
                            <span class="d-block g-color-white g-font-size-16 mb-2">Neyton Burchie</span>
                            <div class="d-inline-block g-width-40 g-height-40">
                                <img class="img-fluid g-brd-around g-brd-2 g-brd-primary-opacity-0_1 rounded-circle"
                                    src="{{ URL::asset('build/assets/img-temp/100x100/img3.jpg') }} alt="Image
                                    Description">
                            </div>
                        </div>
                        <a class="u-link-v2" href="page-blog-single-item-1.html"></a>
                    </article>
                </div>
                <!-- End News -->

                <!-- News -->
                <div class="js-slide g-flex-centered u-shadow-v38 rounded g-mx-15 g-my-30">
                    <article class="g-pa-40">
                        <blockquote class="g-brd-left-none g-color-main-dark-v3 g-font-size-18 g-pl-0 mb-5">"
                            Unify welcomes the downtown to uptown in advance of the IT Technology. At the
                            welcome ceremony, Lenton announced a new award in the IT Technology in support of
                            increased access to postsecondary education. "</blockquote>
                        <div class="text-center mb-3">
                            <span class="d-block g-color-text-light-v1 g-font-size-16 mb-2">Keith
                                Margaret</span>
                            <div class="d-inline-block g-width-40 g-height-40">
                                <img class="img-fluid g-brd-around g-brd-2 g-brd-primary-opacity-0_1 rounded-circle"
                                    src="{{ URL::asset('build/assets/img-temp/100x100/img2.jpg') }}"
                                    alt="Image Description">
                            </div>
                        </div>
                        <a class="btn btn-block g-color-primary g-color-white--hover g-bg-primary-opacity-0_1 g-bg-primary--hover g-rounded-20 g-py-10"
                            href="page-blog-single-item-1.html">Read more</a>
                    </article>
                </div>
                <!-- End News -->

                <!-- News -->
                <div class="js-slide u-shadow-v38 g-bg-size-cover g-bg-pos-center rounded g-mx-15 g-my-30"
                    style="background-image: url(build/assets/img-temp/400x500/img3.jpg);">
                    <article class="align-self-end text-center g-pos-rel g-z-index-1 g-pa-40 mx-auto">
                        <h3 class="g-color-white">The Fashion Gallery of Unify welcomes downtown to the future
                            of Ontario.</h3>
                        <div class="mt-4">
                            <span class="d-block g-color-white g-font-size-16 mb-2">Tina Krueger</span>
                            <div class="d-inline-block g-width-40 g-height-40">
                                <img class="img-fluid g-brd-around g-brd-2 g-brd-primary-opacity-0_1 rounded-circle"
                                    src="{{ URL::asset('build/assets/img-temp/100x100/img5.jpg') }}"
                                    alt="Image Description">
                            </div>
                        </div>
                        <a class="u-link-v2" href="page-blog-single-item-1.html"></a>
                    </article>
                </div>
                <!-- End News -->

                <!-- News -->
                <div class="js-slide g-flex-centered u-shadow-v38 rounded g-mx-15 g-my-30">
                    <article class="g-pa-40">
                        <blockquote class="g-brd-left-none g-color-main-dark-v3 g-font-size-18 g-pl-0 mb-5">"
                            Augustana Long Range Development Plan Open House - Sept. 28. The University of Unify
                            will be holding a public open house that will provide an update on the amendment of
                            land use plans for the Augustana Campus. "</blockquote>
                        <div class="text-center mb-3">
                            <span class="d-block g-color-text-light-v1 g-font-size-16 mb-2">Neyton
                                Burchie</span>
                            <div class="d-inline-block g-width-40 g-height-40">
                                <img class="img-fluid g-brd-around g-brd-2 g-brd-primary-opacity-0_1 rounded-circle"
                                    src="{{ URL::asset('build/assets/img-temp/100x100/img3.jpg') }}"
                                    alt="Image Description">
                            </div>
                        </div>
                        <a class="btn btn-block g-color-primary g-color-white--hover g-bg-primary-opacity-0_1 g-bg-primary--hover g-rounded-20 g-py-10"
                            href="page-blog-single-item-1.html">Read more</a>
                    </article>
                </div>
                <!-- End News -->

                <!-- News -->
                <div class="js-slide u-shadow-v38 g-bg-size-cover g-bg-pos-center rounded g-mx-15 g-my-30"
                    style="background-image: url(build/assets/img-temp/400x500/img2.jpg);">
                    <article class="align-self-end text-center g-pos-rel g-z-index-1 g-pa-40 mx-auto">
                        <h3 class="g-color-white">University of Unify joins new network to drive defence
                            research</h3>
                        <div class="mt-4">
                            <span class="d-block g-color-white g-font-size-16 mb-2">Liza Nelson</span>
                            <div class="d-inline-block g-width-40 g-height-40">
                                <img class="img-fluid g-brd-around g-brd-2 g-brd-primary-opacity-0_1 rounded-circle"
                                    src="{{ URL::asset('build/assets/img-temp/100x100/img4.jpg') }}"
                                    alt="Image Description">
                            </div>
                        </div>
                        <a class="u-link-v2" href="page-blog-single-item-1.html"></a>
                    </article>
                </div>
                <!-- End News -->
            </div>
            <!-- End News Carousel -->
        </div>
    </div>
    <!-- End News -->

    <!-- Call to Action -->
    <div class="g-pos-rel">
        <div class="container text-center g-pt-100 g-pb-50">
            <!-- Heading -->
            <div class="g-max-width-645 mx-auto g-mb-40">
                <h2 class="h1 mb-3">Join Unify University</h2>
                <p>Our strategy is simple: to create a place where the best researchers and most promising
                    students can achieve their full potential.</p>
            </div>
            <!-- End Heading -->

            <a class="btn u-shadow-v33 g-color-white g-bg-primary g-bg-main--hover g-rounded-30 g-px-35 g-py-13"
                href="page-apply-1.html">Apply Now</a>

            <!-- SVG Shape -->
            <svg class="d-inline-block g-width-35" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 37 1"
                enable-background="new 0 0 37 1" xml:space="preserve">
                <linearGradient id="SVGID_5_" gradientUnits="userSpaceOnUse" x1="0" y1="0.5"
                    x2="37" y2="0.5">
                    <stop offset="0" style="stop-color:#f5f6fa" />
                    <stop offset="1" style="stop-color:#b5b8cb" />
                </linearGradient>
                <line fill="none" stroke="url(#SVGID_5_)" stroke-miterlimit="10" x1="37" y1="0.5"
                    x2="0" y2="0.5" />
            </svg>
            <!-- End SVG Shape -->

            <span class="align-middle g-color-primary mx-1">or</span>

            <!-- SVG Shape -->
            <svg class="d-inline-block g-width-35" version="1.1" xmlns="http://www.w3.org/2000/svg"
                xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 37 1"
                enable-background="new 0 0 37 1" xml:space="preserve">
                <linearGradient id="SVGID_6_" gradientUnits="userSpaceOnUse" x1="-10" y1="-1.5"
                    x2="27" y2="-1.5" gradientTransform="matrix(-1 0 0 -1 27 -1)">
                    <stop offset="0" style="stop-color:#f5f6fa" />
                    <stop offset="1" style="stop-color:#b5b8cb" />
                </linearGradient>
                <line fill="none" stroke="url(#SVGID_6_)" stroke-miterlimit="10" x1="0" y1="0.5"
                    x2="37" y2="0.5" />
            </svg>
            <!-- End SVG Shape -->

            <a class="btn u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-main--hover g-rounded-30 g-px-35 g-py-13"
                href="page-contacts-1.html">Contact Us</a>
        </div>

        <!-- SVG Background Shape -->
        <svg class="g-pos-abs g-bottom-0 g-left-0 g-z-index-minus-1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1920 323"
            enable-background="new 0 0 1920 323" xml:space="preserve">
            <polygon fill="#f0f2f8" points="0,323 1920,323 1920,0 " />
            <polygon fill="#f5f6fa" points="-0.5,322.5 -0.5,131.5 658.3,212.3 " />
        </svg>
        <!-- End SVG Background Shape -->
    </div>
    <!-- End Call to Action -->
@endsection
@section('script')
    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#js-header'));
            $.HSCore.helpers.HSHamburgers.init('.hamburger');

            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                pageContainer: $('.container'),
                breakpoint: 991
            });

            // initialization of HSDropdown component
            $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
                afterOpen: function() {
                    $(this).find('input[type="search"]').focus();
                }
            });

            // initialization of carousel
            $.HSCore.components.HSCarousel.init('[class*="js-carousel"]');

            // initialization of header's height equal offset
            $.HSCore.helpers.HSHeightCalc.init();

            // initialization of popups
            $.HSCore.components.HSPopup.init('.js-fancybox');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
        });
    </script>
@endsection
