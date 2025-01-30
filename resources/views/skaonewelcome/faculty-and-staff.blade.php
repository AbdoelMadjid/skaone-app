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
    <!-- Promo Block -->
    <div class="g-bg-img-hero g-bg-cover g-bg-black-opacity-0_3--after"
        style="background-image: url({{ URL::asset('images/sakola/misisekolah5.jpg') }});">
        <div class="container g-pos-rel g-z-index-1 g-pt-80 g-pb-150">
            <div class="row justify-content-lg-between align-items-md-center">
                <div class="col-md-6 col-lg-5 g-mb-170">
                    <h1 class="g-color-white g-font-size-40--md mb-4">Tehacher and Staff</h1>
                    <p class="g-color-white-opacity-0_9 g-font-size-20--md"></p>
                </div>

                {{-- <div class="col-md-6 col-lg-4 g-mb-30">
                    <!-- Contact Form -->
                    <form class="u-shadow-v35 g-bg-white rounded g-px-40 g-py-50">
                        <div class="g-mb-20">
                            <label class="g-font-weight-500 g-font-size-15 g-pl-20">Full name</label>
                            <input
                                class="form-control g-brd-secondary-light-v2 g-bg-secondary g-bg-secondary-dark-v1--focus g-rounded-30 g-px-20 g-py-12"
                                type="text" placeholder="Enter your full name">
                        </div>

                        <div class="g-mb-20">
                            <label class="g-font-weight-500 g-font-size-15 g-pl-20">Email</label>
                            <input
                                class="form-control g-brd-secondary-light-v2 g-bg-secondary g-bg-secondary-dark-v1--focus g-rounded-30 g-px-20 g-py-12"
                                type="email" placeholder="Enter your email">
                        </div>

                        <div class="g-mb-20">
                            <label class="g-font-weight-500 g-font-size-15 g-pl-20">How many seats?</label>
                            <input
                                class="form-control g-brd-secondary-light-v2 g-bg-secondary g-bg-secondary-dark-v1--focus g-rounded-30 g-px-20 g-py-12"
                                type="text" placeholder="1">
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <a class="u-link-v5 g-color-text-light-v1 g-color-primary--hover g-font-size-default"
                                href="#"><i class="align-middle mr-1 icon-real-estate-027 u-line-icon-pro"></i> Get
                                the Location</a>
                            <button type="submit"
                                class="btn u-shadow-v33 g-color-white g-bg-primary g-bg-main--hover g-font-size-default g-rounded-30 g-px-25 g-py-7">Book</button>
                        </div>
                    </form>
                    <!-- End Contact Form -->
                </div> --}}
            </div>
        </div>
    </div>
    <!-- End Promo Block -->

    <!-- Find a Course -->
    <div class="g-bg-img-hero g-bg-pos-top-center g-pos-rel g-z-index-1 g-mt-minus-150"
        style="background-image: url({{ URL::asset('build/assets/include/svg/svg-bg4.svg') }});">
        <div class="container g-pt-150 g-pb-30">
            <!-- Heading -->

        </div>
    </div>
    <!-- End Find a Course -->
    <!-- End Promo Block -->
    <div class="g-bg-img-hero" style="background-image: url({{ URL::asset('build/assets/include/svg/svg-bg1.svg') }});">
        <div class="container g-pt-20 g-pb-30">
            <!-- End Heading -->
            <div class="g-max-width-645 text-center mx-auto g-mb-30">

            </div>
            <div class="row">
                <!-- Sidebar Tabs -->
                <div class="col-md-4">
                    <ul class="nav flex-column u-nav-v1-1 u-nav-primary" role="tablist"
                        data-target="nav-1-1-accordion-primary-ver" data-tabs-mobile-type="accordion"
                        data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-primary g-mb-20">
                        @foreach ($groupsPersonil as $index => $group)
                            <li class="nav-item">
                                <a class="nav-link {{ $index == 0 ? 'active' : '' }}" data-toggle="tab"
                                    href="#tab-{{ strtolower(str_replace(' ', '-', $group->jenis_group)) }}" role="tab">
                                    <i class="g-font-size-13 g-pos-rel g-top-2 mr-2 material-icons">arrow_forward</i>
                                    {{ ucfirst($group->group_name) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- Tab Content -->
                <div class="col-md-8">
                    <div id="nav-1-1-accordion-primary-ver" class="tab-content">
                        @foreach ($groupsPersonil as $index => $group)
                            <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}"
                                id="tab-{{ strtolower(str_replace(' ', '-', $group->jenis_group)) }}" role="tabpanel">

                                <h2>{{ ucfirst($group->group_name) }}</h2>
                                <div class="row">
                                    @foreach ($personilData->where('jenis_group', $group->jenis_group) as $personil)
                                        <div class="col-sm-7 col-lg-4 g-mb-30">
                                            <div
                                                class="u-shadow-v36 g-brd-around g-brd-7 g-brd-white g-brd-primary--hover rounded g-pos-rel g-transition-0_2">
                                                @if ($personil->image)
                                                    <img class="img-fluid"
                                                        src="{{ URL::asset('images/welcome/personil/' . strtolower($personil->jenis_group) . '/' . strtolower($personil->image)) }}"
                                                        alt="Image Description">
                                                @else
                                                    <img class="img-fluid"
                                                        src="{{ URL::asset('images/welcome/personil/img1.jpg') }}"
                                                        alt="Image Description">
                                                @endif
                                            </div>
                                            <p class="text-center">
                                                <span class="g-font-size-12 g-color-gray">
                                                    {{ $personil->gelardepan }}
                                                    {{ ucwords(strtolower($personil->namalengkap)) }}
                                                    {{ $personil->gelarbelakang }}</span>
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- End Tab Content -->
            </div>
        </div>
    </div>


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
    <script src="{{ URL::asset('build/assets/js/components/hs.tabs.js') }}"></script>
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

            // initialization of tabs
            $.HSCore.components.HSTabs.init('[role="tablist"]');

        });

        $(window).on('resize', function() {
            setTimeout(function() {
                $.HSCore.components.HSTabs.init('[role="tablist"]');
            }, 200);
        });
    </script>
@endsection
