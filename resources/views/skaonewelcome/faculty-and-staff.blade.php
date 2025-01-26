@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Faculty and Staff
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/fancybox/jquery.fancybox.css') }}">
    <link rel="stylesheet"
        href="{{ URL::asset('build/assets/vendor/cubeportfolio-full/cubeportfolio/css/cubeportfolio.min.css') }}">
@endsection
@section('content')
    <!-- Promo Block -->
    <div class="container g-pt-20">
        <div class="u-shadow-v34 g-brd-around g-brd-12 g-brd-white rounded g-pos-rel g-z-index-1">
            <div class="g-min-height-70vh g-flex-centered g-bg-img-hero rounded"
                style="background-image: url({{ URL::asset('build/assets/img-temp/1200x800/img1.jpg') }});">
                <div class="w-100 g-pos-abs g-bottom-0 g-left-0 g-z-index-1">
                    <div class="g-bg-white g-pos-rel g-px-30 g-pt-30 g-pt-0--md g-pb-15">
                        <h1><a class="h1 u-link-v5 g-color-main g-color-primary--hover g-font-size-45--md"
                                href="#">Fall Convocation 2017</a></h1>
                        <p>Hundreds of new Unify graduates and their families are gathering on campus this week to celebrate
                            the end of one journey, and the beginning of another.</p>

                        <!-- SVG Top Background Shape -->
                        <svg class="w-100 g-hidden-sm-down g-pos-abs g-top-minus-80x g-left-0 g-z-index-minus-1"
                            version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" viewBox="0 0 1200 237" enable-background="new 0 0 1200 237"
                            xml:space="preserve">
                            <polygon fill="#F1F6FA" points="0,45.2 0,132.9 443.4,67.5 " />
                            <polygon fill="#FFFFFF" points="0,105 0,237 1200,237 1200,105 1200,0 " />
                        </svg>
                        <!-- End SVG Top Background Shape -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Promo Block -->

    <!-- Faculty Links -->
    <div class="container g-pt-100 g-pb-70">
        <!-- Heading -->
        <div class="g-max-width-645 text-center mx-auto g-mb-60">
            <h2 class="h1 mb-3">Faculty Tools</h2>
            <p>Put it all together, and choose your study opportunity at the University of Unify.</p>
        </div>
        <!-- End Heading -->

        <div class="row justify-content-center">
            <div class="col-4 col-md g-mb-30">
                <!-- Faculty Links -->
                <div class="u-block-hover text-center">
                    <span
                        class="u-icon-v2 g-z-index-minus-1 u-icon-size--lg u-shadow-v35 g-brd-5 g-brd-white g-color-text-light-v1 g-color-white--hover g-bg-secondary g-bg-main--hover rounded-circle mb-2">
                        <i class="icon-finance-067 u-line-icon-pro"></i>
                    </span>
                    <h3 class="h4 g-color-primary--hover">My page</h3>
                    <a class="u-link-v2" href="#"></a>
                </div>
                <!-- End Faculty Links -->
            </div>

            <div class="col-4 col-md g-mb-30">
                <!-- Faculty Links -->
                <div class="u-block-hover text-center">
                    <span
                        class="u-icon-v2 g-z-index-minus-1 u-icon-size--lg u-shadow-v35 g-brd-5 g-brd-white g-color-text-light-v1 g-color-white--hover g-bg-secondary g-bg-main--hover rounded-circle mb-2">
                        <i class="icon-finance-170 u-line-icon-pro"></i>
                    </span>
                    <h3 class="h4 g-color-primary--hover">Email</h3>
                    <a class="u-link-v2" href="#"></a>
                </div>
                <!-- End Faculty Links -->
            </div>

            <div class="col-4 col-md g-mb-30">
                <!-- Faculty Links -->
                <div class="u-block-hover text-center">
                    <span
                        class="u-icon-v2 g-z-index-minus-1 u-icon-size--lg u-shadow-v35 g-brd-5 g-brd-white g-color-text-light-v1 g-color-white--hover g-bg-secondary g-bg-main--hover rounded-circle mb-2">
                        <i class="icon-finance-020 u-line-icon-pro"></i>
                    </span>
                    <h3 class="h4 g-color-primary--hover">Banner</h3>
                    <a class="u-link-v2" href="#"></a>
                </div>
                <!-- End Faculty Links -->
            </div>

            <div class="col-4 col-md g-mb-30">
                <!-- Faculty Links -->
                <div class="u-block-hover text-center">
                    <span
                        class="u-icon-v2 g-z-index-minus-1 u-icon-size--lg u-shadow-v35 g-brd-5 g-brd-white g-color-text-light-v1 g-color-white--hover g-bg-secondary g-bg-main--hover rounded-circle mb-2">
                        <i class="icon-finance-076 u-line-icon-pro"></i>
                    </span>
                    <h3 class="h4 g-color-primary--hover">Course spaces</h3>
                    <a class="u-link-v2" href="#"></a>
                </div>
                <!-- End Faculty Links -->
            </div>

            <div class="col-4 col-md g-mb-30">
                <!-- Faculty Links -->
                <div class="u-block-hover text-center">
                    <span
                        class="u-icon-v2 g-z-index-minus-1 u-icon-size--lg u-shadow-v35 g-brd-5 g-brd-white g-color-text-light-v1 g-color-white--hover g-bg-secondary g-bg-main--hover rounded-circle mb-2">
                        <i class="icon-finance-257 u-line-icon-pro"></i>
                    </span>
                    <h3 class="h4 g-color-primary--hover">FAST</h3>
                    <a class="u-link-v2" href="#"></a>
                </div>
                <!-- End Faculty Links -->
            </div>
        </div>
    </div>
    <!-- End Faculty Links -->

    <!-- Call to Action -->
    <div class="u-shadow-v35 g-bg-img-hero"
        style="background-image: url({{ URL::asset('build/assets/include/svg/svg-bg1.svg') }});">
        <div class="container g-pt-100 g-py-70">
            <div class="row align-items-md-center">
                <div class="col-md-3 g-mb-30">
                    <h2 class="mb-0">Faculty and Staff</h2>
                </div>

                <div class="col-md-6 g-mb-30">
                    <p class="g-font-size-17 mb-0">Leadership through excellence in teaching and research. We offer the
                        widest range of academic programs of any university in Canada.</p>
                </div>

                <div class="col-md-3 g-mb-30">
                    <div class="text-right">
                        <a class="btn u-shadow-v39 g-brd-main g-brd-primary--hover g-color-main g-color-white--hover g-bg-primary--hover g-font-size-default g-rounded-30 g-px-35 g-py-10"
                            href="#">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Call to Action -->

    <!-- Response to Recent Postering Incidents -->
    <div class="container g-py-100">
        <div class="row justify-content-lg-between align-items-center">
            <div class="col-md-6">
                <img class="img-fluid" src="{{ URL::asset('build/assets/img-temp/900x700/img1.jpg') }}"
                    alt="Image Description">
            </div>

            <div class="col-md-5 g-mb-50 g-mb-0--md">
                <div class="mb-5">
                    <h2 class="mb-3">Response to Recent Postering Incidents</h2>
                    <p>Nov. 16, 2017 — Members of the university community may be aware of a number of instances in which
                        posters designed to offend, draw response and divide us have appeared sporadically across our campus
                        in recent weeks. For context, see messages from the President, myself, and the university.</p>
                </div>
                <a class="btn u-shadow-v39 g-brd-main g-brd-primary--hover g-color-main g-color-white--hover g-bg-primary--hover g-font-size-default g-rounded-30 g-px-35 g-py-11"
                    href="#">Learn More</a>
            </div>
        </div>
    </div>
    <!-- End Response to Recent Postering Incidents -->

    <!-- Unify Competency Model -->
    <div class="container g-pb-100">
        <div class="row justify-content-lg-between align-items-center">
            <div class="col-md-6 order-md-2">
                <img class="img-fluid" src="{{ URL::asset('build/assets/img-temp/900x700/img3.jpg') }}"
                    alt="Image Description">
            </div>

            <div class="col-md-5 order-md-1 g-mb-50 g-mb-0--md">
                <div class="mb-5">
                    <h2 class="mb-3">Unify Competency Model</h2>
                    <p>Unify's revised competency model is now ready. Review the model and associated resources that help
                        describe what it means for employees to contribute to Unify’s success.</p>
                </div>
                <a class="btn u-shadow-v39 g-brd-main g-brd-primary--hover g-color-main g-color-white--hover g-bg-primary--hover g-font-size-default g-rounded-30 g-px-35 g-py-11"
                    href="#">Learn More</a>
            </div>
        </div>
    </div>
    <!-- End Unify Competency Model -->

    <div class="container text-center g-pt-100">
        <!-- Cube Portfolio Blocks -->
        <!-- Cube Portfolio Blocks - Filter -->
        <ul id="filterControls" class="d-block list-inline text-center g-mb-50">
            <li class="list-inline-item cbp-filter-item cbp-filter-item-active g-brd-around g-brd-gray-light-v4 g-brd-primary--active g-color-gray-dark-v4 g-color-primary--hover g-color-primary--active g-font-size-12 rounded g-transition-0_3 g-px-20 g-py-7 mb-2"
                role="button" data-filter="*">All
            </li>

            @foreach ($groupsPersonil as $group)
                <li class="list-inline-item cbp-filter-item g-brd-around g-brd-gray-light-v4 g-brd-primary--active g-color-gray-dark-v4 g-color-primary--hover g-color-primary--active g-font-size-12 rounded g-transition-0_3 g-px-20 g-py-7 mb-2"
                    role="button" data-filter=".{{ strtolower($group->jenis_group) }}">
                    {{ ucfirst($group->jenis_group) }}
                </li>
            @endforeach
        </ul>
        <!-- End Cube Portfolio Blocks - Filter -->

        <!-- Cube Portfolio Blocks - Content -->
        <div class="cbp cbp-caption-active cbp-caption-overlayBottomAlong" data-controls="#filterControls"
            data-animation="quicksand" data-x-gap="15" data-y-gap="15"
            data-media-queries="[
             {'width': 1500, 'cols': 4},
             {'width': 1100, 'cols': 4},
             {'width': 800, 'cols': 4},
             {'width': 480, 'cols': 2},
             {'width': 300, 'cols': 1}
           ]">
            <div class="cbp-wrapper-outer">
                <div class="cbp-wrapper">
                    @foreach ($personilData as $personil)
                        <div class="cbp-item {{ strtolower($personil->jenis_group) }}">
                            <div class="cbp-item-wrapper">
                                <div
                                    class="u-block-hover g-brd-around g-brd-gray-light-v4 g-color-black g-color-white--hover g-bg-lightred--hover text-center rounded g-transition-0_3 g-px-30 g-py-50">
                                    <img class="img-fluid u-block-hover__main--zoom-v1 mb-5"
                                        src="{{ URL::asset('images/welcome/personil/' . strtolower($personil->jenis_group) . '/' . $personil->image) }}"
                                        alt="Image Description">
                                    <span
                                        class="g-font-weight-600 g-font-size-12 text-uppercase">{{ ucfirst($personil->jenis_group) }}</span>
                                    <h3 class="h4 g-font-weight-600 mb-0">Personil {{ $personil->id_personil }}</h3>

                                    <a class="u-link-v2" href="#!"></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Cube Portfolio Blocks - Content -->
    </div>

    <!-- Video Blocks -->
    <div class="container text-center g-pt-100">
        <h3 class="h3 g-mb-40">Boost your career to new heights</h3>

        <!-- Video Blocks -->
        <div class="row g-mb-30">
            <div class="col-sm-6 col-lg-3 g-mb-30">
                <!-- Fancybox Video -->
                <div
                    class="u-shadow-v36 g-brd-around g-brd-7 g-brd-white g-brd-primary--hover rounded g-pos-rel g-transition-0_2">
                    <img class="img-fluid" src="{{ URL::asset('build/assets/img-temp/600x350/img10.jpg') }}"
                        alt="Image Description">
                    <a class="js-fancybox g-absolute-centered" href="javascript:;"
                        data-src="//www.youtube.com/watch?v=FxiskmF16gU" data-speed="350" data-caption="Video">
                        <span
                            class="u-icon-v3 u-icon-size--lg g-color-white g-color-primary--hover g-bg-transparent g-font-size-30 rounded-circle g-cursor-pointer">
                            <i class="g-pos-rel g-left-2 fa fa-play"></i>
                        </span>
                    </a>
                </div>
                <!-- End Fancybox Video -->
            </div>
            <div class="col-sm-6 col-lg-3 g-mb-30">
                <!-- Fancybox Video -->
                <div
                    class="u-shadow-v36 g-brd-around g-brd-7 g-brd-white g-brd-primary--hover rounded g-pos-rel g-transition-0_2">
                    <img class="img-fluid" src="{{ URL::asset('build/assets/img-temp/600x350/img11.jpg') }}"
                        alt="Image Description">
                    <a class="js-fancybox g-absolute-centered" href="javascript:;"
                        data-src="//www.youtube.com/watch?v=FxiskmF16gU" data-speed="350" data-caption="Video">
                        <span
                            class="u-icon-v3 u-icon-size--lg g-color-white g-color-primary--hover g-bg-transparent g-font-size-30 rounded-circle g-cursor-pointer">
                            <i class="g-pos-rel g-left-2 fa fa-play"></i>
                        </span>
                    </a>
                </div>
                <!-- End Fancybox Video -->
            </div>
            <div class="col-sm-6 col-lg-3 g-mb-30">
                <!-- Fancybox Video -->
                <div
                    class="u-shadow-v36 g-brd-around g-brd-7 g-brd-white g-brd-primary--hover rounded g-pos-rel g-transition-0_2">
                    <img class="img-fluid" src="{{ URL::asset('build/assets/img-temp/600x350/img9.jpg') }}"
                        alt="Image Description">
                    <a class="js-fancybox g-absolute-centered" href="javascript:;"
                        data-src="//www.youtube.com/watch?v=FxiskmF16gU" data-speed="350" data-caption="Video">
                        <span
                            class="u-icon-v3 u-icon-size--lg g-color-white g-color-primary--hover g-bg-transparent g-font-size-30 rounded-circle g-cursor-pointer">
                            <i class="g-pos-rel g-left-2 fa fa-play"></i>
                        </span>
                    </a>
                </div>
                <!-- End Fancybox Video -->
            </div>
            <div class="col-sm-6 col-lg-3 g-mb-30">
                <!-- Fancybox Video -->
                <div
                    class="u-shadow-v36 g-brd-around g-brd-7 g-brd-white g-brd-primary--hover rounded g-pos-rel g-transition-0_2">
                    <img class="img-fluid" src="{{ URL::asset('build/assets/img-temp/600x350/img8.jpg') }}"
                        alt="Image Description">
                    <a class="js-fancybox g-absolute-centered" href="javascript:;"
                        data-src="//www.youtube.com/watch?v=FxiskmF16gU" data-speed="350" data-caption="Video">
                        <span
                            class="u-icon-v3 u-icon-size--lg g-color-white g-color-primary--hover g-bg-transparent g-font-size-30 rounded-circle g-cursor-pointer">
                            <i class="g-pos-rel g-left-2 fa fa-play"></i>
                        </span>
                    </a>
                </div>
                <!-- End Fancybox Video -->
            </div>
        </div>
        <!-- End Video Blocks -->

        <!-- Info -->
        <div class="row">
            <div class="col-md-4 g-py-15 g-mb-30">
                <div class="g-px-30--lg">
                    <h3 class="h5">Extraordinary environment</h3>
                    <p class="g-color-text-light-v1 mb-0">In an extraordinary environment that inspires you to new ways of
                        thinking.</p>
                </div>
            </div>
            <div class="col-md-4 g-brd-x g-brd-secondary-light-v2 g-py-15 g-mb-30">
                <div class="g-px-30--lg">
                    <h3 class="h5">Dynamic learning opportunities</h3>
                    <p class="g-color-text-light-v1 mb-0">In a landscape full of dynamic learning opportunities.</p>
                </div>
            </div>
            <div class="col-md-4 g-py-15 g-mb-30">
                <div class="g-px-30--lg">
                    <h3 class="h5">Endless opportunities</h3>
                    <p class="g-color-text-light-v1 mb-0">In a community that provides endless opportunities for you to
                        make impact.</p>
                </div>
            </div>
        </div>
        <!-- End Info -->
    </div>
    <!-- End Video Blocks -->

    <!-- Call to Action -->
    @include('skaonewelcome.call-to-acction')
    <!-- End Call to Action -->
@endsection
@section('script')
    <!-- JS Implementing Plugins -->
    <script src="{{ URL::asset('build/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/fancybox/jquery.fancybox.min.js') }}"></script>

    <!-- JS Unify -->
    <script src="{{ URL::asset('build/assets/js/hs.core.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.header.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.dropdown.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.carousel.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.popup.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.go-to.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/cubeportfolio-full/cubeportfolio/js/jquery.cubeportfolio.min.js') }}">
    </script>
    <script src="{{ URL::asset('build/assets/js/components/hs.cubeportfolio.js') }}"></script>
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

            // initialization of popups
            $.HSCore.components.HSPopup.init('.js-fancybox');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');

            $.HSCore.components.HSCubeportfolio.init('.cbp');
        });
    </script>
@endsection
