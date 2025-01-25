@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Alumni
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/dzsparallaxer/dzsparallaxer.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/dzsparallaxer/dzsscroller/scroller.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/dzsparallaxer/advancedscroller/plugin.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/hs-bg-video/hs-bg-video.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/fancybox/jquery.fancybox.css') }}">
@endsection
@section('content')
    <!-- Promo Block -->
    <div class="g-bg-img-hero" style="background-image: url({{ URL::asset('build/assets/include/svg/svg-bg1.svg') }});">
        <div class="container g-py-100 g-py-150--lg">
            <div class="row align-items-lg-center">
                <div class="col-lg-6 g-mb-70 g-mb-150--sm g-mb-50--lg">
                    <div class="g-pr-15--lg">
                        <!-- Promo Block Info -->
                        <div class="mb-5">
                            <h1 class="g-font-size-45 mb-3">Represent Our Graduates</h1>
                            <p>We're proud of our incredible community of more than 320,000 alumni and more than 57,000
                                donors worldwide. Their global impact is immense – from mentoring students to showing their
                                generous support for life-changing research.</p>
                        </div>
                        <a class="btn u-shadow-v33 g-color-white g-bg-primary g-bg-main--hover g-rounded-30 g-px-25 g-py-13 mr-2"
                            href="#">Make a Nomination</a>
                        <a class="js-go-to btn u-shadow-v32 g-color-primary g-color-white--hover g-bg-white g-bg-main--hover g-rounded-30 g-px-25 g-py-13 ml-2"
                            href="#!" data-target="#content">Explore More</a>
                        <!-- End Promo Block Info -->
                    </div>
                </div>

                <div class="col-lg-6 g-mb-50">
                    <div class="g-max-width-550 g-pos-rel g-pl-15--lg mx-auto">
                        <!-- Promo Block Images -->
                        <div class="u-shadow-v36 g-max-width-300--sm g-pos-rel g-z-index-2 g-mb-20 g-mb-0--sm">
                            <img class="img-fluid g-brd-around g-brd-4 g-brd-white rounded"
                                src="{{ URL::asset('build/assets/img-temp/600x350/img1.jpg') }}" alt="Image Description">
                        </div>

                        <div
                            class="u-shadow-v36 g-max-width-300--sm g-pos-abs--sm g-top-minus-70 g-left-130 g-z-index-1 g-mb-20 g-mb-0--sm">
                            <img class="img-fluid g-brd-around g-brd-4 g-brd-white rounded"
                                src="{{ URL::asset('build/assets/img-temp/600x350/img2.jpg') }}" alt="Image Description">
                        </div>

                        <div class="u-shadow-v36 g-max-width-300--sm g-pos-abs--sm g-top-65 g-right-0">
                            <img class="img-fluid g-brd-around g-brd-4 g-brd-white rounded"
                                src="{{ URL::asset('build/assets/img-temp/600x350/img3.jpg') }}" alt="Image Description">
                        </div>
                        <!-- End Promo Block Images -->

                        <!-- SVG Square #1 -->
                        <svg class="g-hidden-xs-down g-width-25 g-height-45 g-pos-abs g-bottom-minus-40 g-left-0 g-z-index-2"
                            version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" viewBox="0 0 45.9 52.9" enable-background="new 0 0 45.9 52.9"
                            xml:space="preserve">
                            <polygon fill="#7cd1d8" stroke="#FFFFFF" stroke-width="0.4" stroke-miterlimit="10"
                                points="45.8,39.5 23.1,52.8 0.2,39.7
                    0.1,13.4 22.9,0.1 45.7,13.2 " />
                            <polyline fill="#7cd1d8" stroke="#FFFFFF" stroke-width="0.4" stroke-miterlimit="10"
                                points="0.1,13.5 23.1,26.4 23.1,52.8 " />
                            <line fill="#7cd1d8" stroke="#FFFFFF" stroke-width="0.4" stroke-miterlimit="10" x1="45.5"
                                y1="13.2" x2="23" y2="26.5" />
                        </svg>
                        <!-- End SVG Square #1 -->

                        <!-- SVG Square #3 -->
                        <svg class="g-hidden-xs-down g-width-60 g-height-80 g-pos-abs g-top-minus-40 g-right-0 g-z-index-2"
                            version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" viewBox="0 0 52.8 47.5" enable-background="new 0 0 52.8 47.5"
                            xml:space="preserve">
                            <polygon fill="#FFFFFF" stroke="#7cd1d8" stroke-width="0.25" stroke-miterlimit="10"
                                points="14.8,47.3 0.1,25.5 11.8,1.9 38,0.1
                    52.7,22 41,45.6 " />
                            <polyline fill="#FFFFFF" stroke="#7cd1d8" stroke-width="0.25" stroke-miterlimit="10"
                                points="37.9,0.1 26.5,23.8 0.2,25.5 " />
                            <line fill="#FFFFFF" stroke="#7cd1d8" stroke-width="0.25" stroke-miterlimit="10" x1="41"
                                y1="45.4" x2="26.4" y2="23.7" />
                        </svg>
                        <!-- End SVG Square #3 -->

                        <!-- SVG Square #4 -->
                        <svg class="g-hidden-xs-down g-width-50 g-height-20 g-pos-abs g-top-minus-120 g-right-100"
                            version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" viewBox="0 0 73.5 20" enable-background="new 0 0 73.5 20" xml:space="preserve">
                            <g>
                                <path fill="none" stroke="#9a69cb" stroke-width="3" stroke-miterlimit="10" d="M0,1c9.2,0,9.2,18,18.4,18c9.2,0,9.2-18,18.4-18
                                                  c9.2,0,9.2,18,18.4,18S64.3,1,73.5,1" />
                            </g>
                        </svg>
                        <!-- End SVG Square #4 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Promo Block -->

    <!-- Benefits & Awards -->
    <div id="content" class="g-pos-rel g-pb-100 g-pb-0--md">
        <div class="container">
            <div class="row">
                <div class="col-md-5 offset-md-7 align-self-md-center g-py-100--md g-mb-50 g-mb-0--md">
                    <div class="g-pl-15--md">
                        <div class="mb-5">
                            <div class="mb-4">
                                <span class="u-icon-v3 u-icon-size--lg g-color-main g-bg-secondary rounded-circle mb-4">
                                    <i class="material-icons">verified_user</i>
                                </span>
                                <h2 class="mb-3">Alumni Benefits and Awards</h2>
                                <p>You may be surprised to discover what alumni benefits are on offer as a Unify graduate,
                                    including an alumni magazine, career resources, library membership, and more.</p>
                            </div>
                            <p>As a University of Unify graduate, you have access to a wide range of resources, mentoring
                                opportunities, events and support to help you continue your passion for learning.</p>
                        </div>
                        <a class="btn u-shadow-v39 g-brd-main g-brd-primary--hover g-color-main g-color-white--hover g-bg-primary--hover g-font-size-default g-rounded-30 g-px-35 g-py-11"
                            href="#">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6 h-100 g-min-height-300 g-bg-size-cover g-bg-pos-center g-pos-abs--md g-top-0 g-left-0"
                data-bg-img-src="{{ URL::asset('build/assets/img-temp/900x700/img1.jpg') }}"></div>
        </div>
    </div>
    <!-- End Benefits & Awards -->

    <!-- Video Block -->
    <section class="clearfix">
        <div class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall g-bg-cover g-bg-black-opacity-0_2--after"
            data-options="{direction: 'fromtop', animation_duration: 25, direction: 'reverse'}">
            <!-- Parallax Background Video -->
            <div class="dzsparallaxer--target" style="width: 100%; height: 200%;" data-forcewidth_ratio="1.77">
                <div class="js-bg-video g-pos-abs w-100 h-100" data-hs-bgv-type="youtube" data-hs-bgv-id="FxiskmF16gU"
                    data-hs-bgv-loop="1"></div>
            </div>
            <!-- End Parallax Background Video -->

            <!-- Fancybox Video -->
            <div class="text-center g-pos-rel g-z-index-1 g-px-50 g-py-170">
                <a class="js-fancybox d-block" href="javascript:;"
                    data-src="//www.youtube.com/watch?v=FxiskmF16gU?autoplay=1" data-speed="350"
                    data-caption="Play Alumni at Unify University">
                    <span
                        class="u-icon-v3 u-icon-size--lg g-color-main g-color-white--hover g-bg-white g-bg-primary--hover g-font-size-20 g-rounded-50x g-cursor-pointer">
                        <i class="g-pos-rel g-left-2 hs-icon hs-icon-play"></i>
                    </span>
                </a>
            </div>
            <!-- End Fancybox Video -->
        </div>
    </section>
    <!-- End Video Block -->

    <!-- Alumni Articles -->
    <div class="g-pos-rel">
        <div class="container">
            <div class="row justify-content-lg-between">
                <div class="col-md-4 col-lg-3 g-pt-100">
                    <h3 class="mb-4">Related Links</h3>

                    <!-- Links List -->
                    <ul class="list-unstyled mb-5">
                        <li class="py-1">
                            <a class="d-block active u-link-v5 u-shadow-v35--active g-color-text-light-v1 g-color-main--hover g-color-primary--active g-bg-white--hover g-bg-white--active g-font-size-15 g-rounded-20 g-px-20 g-py-8"
                                href="#">
                                <i class="align-middle mr-3 icon-hotel-restaurant-088 u-line-icon-pro"></i>
                                Alumni
                            </a>
                        </li>
                        <li class="py-1">
                            <a class="d-block u-link-v5 u-shadow-v35--active g-color-text-light-v1 g-color-main--hover g-color-primary--active g-bg-white--hover g-bg-white--active g-font-size-15 g-rounded-20 g-px-20 g-py-8"
                                href="#">
                                <i class="align-middle mr-3 icon-finance-258 u-line-icon-pro"></i>
                                Alumni benefits &amp; awards
                            </a>
                        </li>
                        <li class="py-1">
                            <a class="d-block u-link-v5 u-shadow-v35--active g-color-text-light-v1 g-color-main--hover g-color-primary--active g-bg-white--hover g-bg-white--active g-font-size-15 g-rounded-20 g-px-20 g-py-8"
                                href="#">
                                <i class="align-middle mr-3 icon-finance-075 u-line-icon-pro"></i>
                                Volunteer
                            </a>
                        </li>
                        <li class="py-1">
                            <a class="d-block u-link-v5 u-shadow-v35--active g-color-text-light-v1 g-color-main--hover g-color-primary--active g-bg-white--hover g-bg-white--active g-font-size-15 g-rounded-20 g-px-20 g-py-8"
                                href="#">
                                <i class="align-middle mr-3 icon-education-143 u-line-icon-pro"></i>
                                Connect
                            </a>
                        </li>
                        <li class="py-1">
                            <a class="d-block u-link-v5 u-shadow-v35--active g-color-text-light-v1 g-color-main--hover g-color-primary--active g-bg-white--hover g-bg-white--active g-font-size-15 g-rounded-20 g-px-20 g-py-8"
                                href="#">
                                <i class="align-middle mr-3 icon-finance-138 u-line-icon-pro"></i>
                                Give now
                            </a>
                        </li>
                    </ul>
                    <!-- End Links List -->

                    <!-- Twitter Feed -->
                    <h3 class="mb-4">Twitter Feeds</h3>
                    <ul class="list-unstyled mb-0">
                        <li class="g-brd-bottom g-brd-secondary-light-v2 g-pb-20">
                            <h4 class="h6">RT <a class="g-font-weight-500" href="#">@UofA_Arts:</a> DON'T MISS
                            </h4>
                            <p class="g-color-text-light-v1 g-font-size-13 mb-0">Political Science's “What Comes Next? The
                                Political Afterlives of the <a class="g-font-weight-500" href="#">#TRC</a>, WED/OCT
                                4/4:30-6 pm… <a class="g-font-weight-500" href="#">twitter.com/i/web/status/9…</a>
                            </p>
                        </li>
                        <li class="g-pt-20">
                            <h4 class="h6">RT <a class="g-font-weight-500" href="#">@UofA_Arts:</a> DON'T MISS
                            </h4>
                            <p class="g-color-text-light-v1 g-font-size-13 mb-0">Political Science's “What Comes Next? The
                                Political Afterlives of the <a class="g-font-weight-500" href="#">#TRC</a>, WED/OCT
                                4/4:30-6 pm…</p>
                        </li>
                    </ul>
                    <!-- End Twitter Feed -->
                </div>

                <div class="col-md-8 g-pt-50 g-pt-100--md g-pb-70">
                    <div class="row">
                        <!-- Alumni Article -->
                        <div class="col-sm-6 g-mb-30">
                            <article>
                                <img class="img-fluid mb-4"
                                    src="{{ URL::asset('build/assets/img-temp/600x350/img4.jpg') }}"
                                    alt="Image Description">
                                <h2 class="h5"><a href="#">Lend a helping hand by volunteering</a></h2>
                                <p class="g-font-size-16">Give back to the University community by getting involved in
                                    volunteering opportunities to support our students, staff and fellow graduates.</p>
                            </article>
                        </div>
                        <!-- End Alumni Article -->

                        <!-- Alumni Article -->
                        <div class="col-sm-6 g-mb-30">
                            <article>
                                <img class="img-fluid mb-4"
                                    src="{{ URL::asset('build/assets/img-temp/600x350/img5.jpg') }}"
                                    alt="Image Description">
                                <h2 class="h5"><a href="#">Give a donation for the greater good</a></h2>
                                <p class="g-font-size-16">Help us pursue limitless possibilities and make countless lives
                                    better. There are numerous ways you can make a donation to the University.</p>
                            </article>
                        </div>
                        <!-- End Alumni Article -->

                        <!-- Alumni Article -->
                        <div class="col-sm-6 g-mb-30">
                            <article>
                                <img class="img-fluid mb-4"
                                    src="{{ URL::asset('build/assets/img-temp/600x350/img6.jpg') }}"
                                    alt="Image Description">
                                <h2 class="h5"><a href="#">We provide many opportunities for our community</a>
                                </h2>
                                <p class="g-font-size-16">Stay connected with your fellow alumni in Australia and around
                                    the world through our network of groups, publications and our social networks.</p>
                            </article>
                        </div>
                        <!-- End Alumni Article -->

                        <!-- Alumni Article -->
                        <div class="col-sm-6 g-mb-30">
                            <article>
                                <img class="img-fluid mb-4"
                                    src="{{ URL::asset('build/assets/img-temp/600x350/img21.jpg') }}"
                                    alt="Image Description">
                                <h2 class="h5"><a href="#">Your charitable gift can become the solution</a></h2>
                                <p class="g-font-size-16">You can support a specific cause or give us the choice of
                                    deciding where your donation will have immediate impact.</p>
                            </article>
                        </div>
                        <!-- End Alumni Article -->
                    </div>
                </div>
            </div>

            <div
                class="col-12 col-md-5 col-lg-4 h-100 g-bg-secondary-gradient-v1 g-pos-abs g-top-0 g-left-0 g-z-index-minus-1">
            </div>
        </div>
    </div>
    <!-- End Alumni Articles -->

    <!-- Call to Action -->
    <div class="g-bg-img-hero" style="background-image: url({{ URL::asset('build/assets/include/svg/svg-bg1.svg') }});">
        <div class="container g-pt-60 g-pb-30">
            <div class="row justify-content-lg-center align-items-md-center">
                <div class="col-md-9 col-lg-7 g-mb-30">
                    <!-- Media -->
                    <div class="media align-items-center g-pr-15--lg">
                        <div class="d-flex mr-5">
                            <span
                                class="u-icon-v3 u-icon-size--lg g-color-primary g-bg-primary-opacity-0_1 rounded-circle">
                                <i class="material-icons">toys</i>
                            </span>
                        </div>

                        <div class="media-body">
                            <h3 class="h2">Different alumni approach?</h3>
                            <p>Do you want to implement microtransactions, have unusually large average order values, or
                                operate with high refund rates? Get in touch to discuss your idea.</p>
                        </div>
                    </div>
                    <!-- End Media -->
                </div>

                <div class="col-5 col-md-3 col-lg-2 mx-auto g-mx-0--lg g-mb-30">
                    <a class="btn btn-block u-shadow-v33 g-color-white g-bg-primary g-bg-main--hover g-rounded-30 g-px-25 g-py-13"
                        href="page-contacts-1.html">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Call to Action -->

    <!-- Secrets to Success -->
    <div class="g-pos-rel g-pb-100 g-pb-0--md">
        <div class="container">
            <div class="row">
                <div class="col-md-5 align-self-md-center g-py-100--md g-mb-50 g-mb-0--md">
                    <div class="g-pl-15--md">
                        <div class="mb-5">
                            <div class="mb-4">
                                <span class="u-icon-v3 u-icon-size--lg g-color-main g-bg-secondary rounded-circle mb-4">
                                    <i class="material-icons">done_all</i>
                                </span>
                                <h2 class="mb-3">3 secrets to success: our Alumni Award winners share their tips</h2>
                                <p>As the University marks its 2017 Alumni Awards, we reflect on the essential qualities
                                    shared by all our award winners.</p>
                            </div>
                            <p>From starting a school in Uganda, to making maths a YouTube sensation. From improving the
                                health of people the world over, to conducting some of the world’s greatest orchestras.</p>
                        </div>
                        <a class="btn u-shadow-v39 g-brd-main g-brd-primary--hover g-color-main g-color-white--hover g-bg-primary--hover g-font-size-default g-rounded-30 g-px-35 g-py-11"
                            href="#">Read More</a>
                    </div>
                </div>
            </div>

            <div class="col-md-5 h-100 g-min-height-300 g-bg-size-cover g-bg-pos-center g-pos-abs--md g-top-0 g-right-0"
                data-bg-img-src="{{ URL::asset('build/assets/img-temp/900x700/img2.jpg') }}"></div>
        </div>
    </div>
    <!-- End Secrets to Success -->

    <!-- Call to Action -->
    @include('skaonewelcome.call-to-acction')
    <!-- End Call to Action -->
@endsection
@section('script')
    <!-- JS Implementing Plugins -->
    <script src="{{ URL::asset('build/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/dzsparallaxer/dzsparallaxer.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/dzsparallaxer/dzsscroller/scroller.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/dzsparallaxer/advancedscroller/plugin.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/hs-bg-video/hs-bg-video.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/hs-bg-video/vendor/player.min.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/fancybox/jquery.fancybox.min.js') }}"></script>

    <!-- JS Unify -->
    <script src="{{ URL::asset('build/assets/js/hs.core.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.header.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.dropdown.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.carousel.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/helpers/hs.bg-video.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.popup.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.go-to.js') }}"></script>

    <!-- JS Customization -->
    <script src="{{ URL::asset('build/assets/js/custom.js') }}"></script>

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

            // initialization of video on background
            $.HSCore.helpers.HSBgVideo.init('.js-bg-video');

            // initialization of popups
            $.HSCore.components.HSPopup.init('.js-fancybox');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
        });
    </script>
@endsection
