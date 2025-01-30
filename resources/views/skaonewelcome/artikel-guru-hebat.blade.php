@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Artikel Guru Hebat
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/chosen/chosen.css') }}">
@endsection
@section('content')
    <!-- Promo Content -->
    <div class="g-bg-secondary">
        <!-- Breadcrumbs -->
        <div class="container g-py-50">
            <span class="d-block g-font-size-18">Courses</span>
            <h1 class="g-font-size-40--md">Bachelor of Advanced Computing and Bachelor of Commerce</h1>
        </div>
        <!-- End Breadcrumbs -->

        <!-- Content -->
        <div class="container g-pb-50">
            <div class="row">
                <div class="col-lg-7 g-mb-50">
                    <!-- Youtube Iframe -->
                    <div
                        class="embed-responsive embed-responsive-16by9 u-shadow-v36 g-brd-around g-brd-10 g-brd-white g-rounded-5 g-mb-30">
                        <iframe src="https://www.youtube.com/embed/FxiskmF16gU?rel=0&amp;showinfo=0" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                    <!-- End Youtube Iframe -->

                    <h2 class="h3">Canada's most innovative IT course</h2>
                    <p class="mb-0 pl-4">&#8212; Gain two qualifications in just five years!</p>
                </div>

                <div class="col-lg-5 g-mb-50">
                    <h2 class="g-hidden-md-down g-font-size-18 g-font-primary g-font-weight-400 mb-4">Be part of Innovation
                    </h2>

                    <!-- Disclaimer -->
                    <div class="u-shadow-v32 g-bg-white rounded g-pa-30 g-mb-30">
                        <p class="mb-0">The information on this page applies to future students. Current students should
                            refer to their faculty handbooks for course information.</p>
                    </div>
                    <!-- End Disclaimer -->

                    <!-- Info Banner -->
                    <div class="u-shadow-v36 g-bg-main-light-v2 g-bg-primary--hover rounded g-pos-rel g-pa-30 g-mb-30">
                        <h3 class="h2 g-color-white">Bachelor of Advanced Studies</h3>
                        <p class="g-color-white-opacity-0_9">Supercharge your undergraduate degree</p>
                        <i class="g-color-white material-icons">arrow_forward</i>
                        <a class="u-link-v2" href="#"></a>
                    </div>
                    <!-- End Info Banner -->

                    <!-- Links -->
                    <div class="d-flex">
                        <a class="btn btn-block d-flex u-shadow-v32 g-color-white g-bg-main g-bg-primary--hover g-font-size-16 text-left g-rounded-30 g-px-30 g-py-10 mr-2 g-mt-0"
                            href="#">
                            Apply Now
                            <i class="g-font-size-16 g-pos-rel g-top-5 ml-auto material-icons">arrow_forward</i>
                        </a>

                        <a class="btn btn-block d-flex u-shadow-v32 g-brd-2 g-brd-main g-brd-primary--hover g-color-main g-color-white--hover g-bg-transparent g-bg-primary--hover g-font-size-16 text-left g-rounded-30 g-px-30 g-py-10 ml-2 g-mt-0"
                            href="page-contacts-1.html">
                            Ask a Question
                            <i class="g-font-size-16 g-pos-rel g-top-5 ml-auto material-icons">arrow_forward</i>
                        </a>
                    </div>
                    <!-- End Links -->
                </div>
            </div>
        </div>
        <!-- End Content -->
    </div>
    <!-- End Promo Content -->

    <!-- Call to Action -->
    @include('skaonewelcome.call-to-acction')
    <!-- End Call to Action -->
@endsection
@section('script')
    <!-- JS Implementing Plugins -->
    <script src="{{ URL::asset('build/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/chosen/chosen.jquery.js') }}"></script>

    <!-- JS Unify -->
    <script src="{{ URL::asset('build/assets/js/hs.core.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.header.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.dropdown.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.select.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.scroll-nav.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.sticky-block.js') }}"></script>
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

            // initialization of custom select
            $.HSCore.components.HSSelect.init('.js-custom-select');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
        });

        $(window).on('load', function() {
            // initialization of HSScrollNav
            $.HSCore.components.HSScrollNav.init($('#js-scroll-nav'), {
                duration: 700,
                over: $('.u-secondary-navigation')
            });

            // initialization of sticky blocks
            $.HSCore.components.HSStickyBlock.init('.js-sticky-block');
        });
    </script>
@endsection
