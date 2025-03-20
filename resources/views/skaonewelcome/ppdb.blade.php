@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    PPDB
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    {{--  --}}

    <!-- Promo Block -->
    <section class="clearfix">
        <div class="js-bg-video" data-hs-bgv-type="youtube" data-hs-bgv-id="FxiskmF16gU" data-hs-bgv-loop="1">
            <div class="g-bg-cover g-bg-black-opacity-0_6--after g-pos-rel g-z-index-1">
                <div class="container text-center g-pos-rel g-z-index-1 g-pt-100 g-pb-80">
                    <!-- Promo Block Info -->
                    <div class="g-mb-40">
                        <h1 class="g-color-white g-font-size-60--lg">Become a SMKN 1 Kadipaten Student</h1>
                        <p class="g-color-white-opacity-0_8 g-font-size-22">Search from more than 5 diverse programs. Find
                            your fit at SMKN 1 Kadipaten.</p>
                    </div>
                    <!-- End Promo Block Info -->


                    <!-- Form Group -->
                    <form class="g-max-width-645 mx-auto">
                        <a class="btn btn-block g-color-white g-color-main--hover g-bg-primary g-bg-white--hover g-rounded-30 g-py-13"
                            href="/skaone/program">Program Keahlian</a>
                    </form>
                    <!-- End Form Group -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Promo Block -->
    <!-- Find a Course -->
    <div id="content" class="u-shadow-v34 g-bg-main g-pos-rel g-z-index-1 g-pt-40 g-pb-10">
        <div class="container g-mb-60">
            <nav class="text-center " aria-label="Page Navigation">
                <ul class="list-inline">
                    <li class="list-inline-item float-sm-left">
                        <h1 class="h2 g-color-white mb-0">Anda minat ?</h1>
                    </li>
                    <li class="list-inline-item hidden-down">
                        {{--  --}}
                    </li>
                    <li class="list-inline-item float-sm-right">
                        <div class="">
                            <a href="{{ url('/dashboard') }}"
                                class="btn u-shadow-v32 g-brd-none g-color-white g-color-primary--hover g-bg-primary g-bg-white--hover g-font-size-16 g-rounded-30 g-transition-0_2 g-px-35 g-py-13">Isi
                                Form</a>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <!-- End Find a Course -->
    <!-- Promo Block -->
    <div class="g-bg-img-hero" style="background-image: url({{ URL::asset('build/assets/include/svg/svg-bg1.svg') }});">
        <div class="container g-py-100 g-py-150--lg">
            <div class="row align-items-lg-center">
                <div class="col-lg-6 g-mb-70 g-mb-150--sm g-mb-50--lg">
                    <div class="g-pr-15--lg">
                        <!-- Promo Block Info -->
                        <div class="mb-5">
                            <h1 class="g-font-size-45 mb-3">Extracurricular activities</h1>
                            <p>Apart from intracurricular activities, our students are provided with a variety of
                                extracurricular activities that can be freely chosen by students according to their talents
                                and interests.
                            </p>
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
                                src="{{ URL::asset('images/sakola/i-min.jpg') }}" alt="Image Description">
                        </div>

                        <div
                            class="u-shadow-v36 g-max-width-300--sm g-pos-abs--sm g-top-minus-70 g-left-130 g-z-index-1 g-mb-20 g-mb-0--sm">
                            <img class="img-fluid g-brd-around g-brd-4 g-brd-white rounded"
                                src="{{ URL::asset('images/sakola/g-min.jpg') }}" alt="Image Description">
                        </div>

                        <div class="u-shadow-v36 g-max-width-300--sm g-pos-abs--sm g-top-65 g-right-0">
                            <img class="img-fluid g-brd-around g-brd-4 g-brd-white rounded"
                                src="{{ URL::asset('images/sakola/h-min.jpg') }}" alt="Image Description">
                        </div>
                        <!-- End Promo Block Images -->

                        <!-- SVG Square #1 -->
                        <svg class="g-hidden-xs-down g-width-25 g-height-45 g-pos-abs g-bottom-minus-40 g-left-0 g-z-index-2"
                            version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" viewBox="0 0 45.9 52.9" enable-background="new 0 0 45.9 52.9"
                            xml:space="preserve">
                            <polygon fill="#7cd1d8" stroke="#FFFFFF" stroke-width="0.4" stroke-miterlimit="10"
                                points="45.8,39.5 23.1,52.8 0.2,39.7 0.1,13.4 22.9,0.1 45.7,13.2 " />
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
                                points="14.8,47.3 0.1,25.5 11.8,1.9 38,0.1 52.7,22 41,45.6 " />
                            <polyline fill="#FFFFFF" stroke="#7cd1d8" stroke-width="0.25" stroke-miterlimit="10"
                                points="37.9,0.1 26.5,23.8 0.2,25.5 " />
                            <line fill="#FFFFFF" stroke="#7cd1d8" stroke-width="0.25" stroke-miterlimit="10" x1="41"
                                y1="45.4" x2="26.4" y2="23.7" />
                        </svg>
                        <!-- End SVG Square #3 -->

                        <!-- SVG Square #4 -->
                        <svg class="g-hidden-xs-down g-width-50 g-height-20 g-pos-abs g-top-minus-120 g-right-100"
                            version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                            x="0px" y="0px" viewBox="0 0 73.5 20" enable-background="new 0 0 73.5 20"
                            xml:space="preserve">
                            <g>
                                <path fill="none" stroke="#9a69cb" stroke-width="3" stroke-miterlimit="10"
                                    d="M0,1c9.2,0,9.2,18,18.4,18c9.2,0,9.2-18,18.4-18 c9.2,0,9.2,18,18.4,18S64.3,1,73.5,1" />
                            </g>
                        </svg>
                        <!-- End SVG Square #4 -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Promo Block -->

    <!-- Call to Action -->
    @include('skaonewelcome.call-to-acction')
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

            // initialization of custom select
            $.HSCore.components.HSSelect.init('.js-custom-select');

            // initialization of sticky blocks
            setTimeout(function() {
                $.HSCore.components.HSStickyBlock.init('.js-sticky-block');
            }, 300);

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
        });
    </script>
@endsection
