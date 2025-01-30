@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Program
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/chosen/chosen.css') }}">
@endsection
@section('content')
    <!-- Promo Block -->
    <div class="g-bg-img-hero g-pos-rel" style="background-image: url({{ URL::asset('build/assets/img/bg/bg-img1.png') }});">
        <div class="container g-pt-100">
            <div class="row justify-content-lg-between">
                <div class="col-lg-4 g-pt-50--lg">
                    <div class="mb-5">
                        <h1 class="g-font-size-45 mb-4">Program Keahlian</h1>
                        <p>Explore all the program.</p>
                    </div>

                    <a class="js-go-to btn u-shadow-v33 g-hidden-md-down g-color-white g-bg-primary g-bg-main--hover g-rounded-30 g-px-35 g-py-10"
                        href="#!" data-target="#content">Explore Now</a>
                </div>

                <div class="col-lg-8 align-self-end">
                    <div class="u-shadow-v40 g-brd-around g-brd-7 g-brd-secondary rounded">
                        <img class="img-fluid rounded" src="{{ URL::asset('images/sakola/kkti.jpg') }}"
                            alt="Image Description">
                    </div>
                </div>
            </div>
        </div>

        <!-- SVG Bottom Background Shape -->
        <svg class="g-pos-abs g-bottom-0" version="1.1" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1921 183.5"
            enable-background="new 0 0 1921 183.5" xml:space="preserve">
            <path fill="#FFFFFF" d="M0,183.5v-142c0,0,507,171,1171,58c0,0,497-93,750,84H0z" />
            <path opacity="0.2" fill="#FFFFFF" d="M0,183V0c0,0,507,220.4,1171,74.7c0,0,497-119.9,750,108.3H0z" />
        </svg>
        <!-- End SVG Bottom Background Shape -->
    </div>
    <!-- End Promo Block -->

    <!-- Programs -->
    <!-- About Current Students -->
    <div id="content" class="container g-py-70">
        <!-- Lightbox Single Image -->
        <div class="row">
            <div class="col-md-3">
                <ul class="list-unstyled">
                    <li class="mb-1">
                        <a class="d-block u-link-v5 g-color-text g-color-white--hover g-bg-secondary g-bg-main--hover g-font-size-default rounded g-pl-30--hover g-px-20 g-py-7"
                            href="#">
                            <i class="g-font-size-13 g-pos-rel g-top-2 mr-2 material-icons">arrow_forward</i>
                            Akuntansi
                        </a>
                    </li>
                </ul>
                <img class="img-fluid" src="{{ URL::asset('images/logojurusan/logo-mp.png') }}" alt="Image Description">
            </div>

            <div class="col-md-9">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="g-pl-15--lg">
                            <div class="u-shadow-v1-5 g-line-height-2 g-pa-40 g-mb-30" role="alert">
                                <div class="row">
                                    <div class="col-lg-7 g-mb-50 g-mb-0--lg">
                                        <header class="u-heading-v2-3--bottom g-brd-primary g-mb-20">
                                            <h2 class="h3 u-heading-v2__title text-uppercase g-font-weight-300 mb-0">
                                                Akuntansi</h2>
                                        </header>

                                        <p class="lead g-mb-30">At vero eos et accusamus et iusto odio dignissimos ducimus
                                            qui
                                            blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas
                                            moles</p>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <ul class="list-unstyled g-color-gray-dark-v4 g-mb-30 g-mb-0--sm">
                                                    <li class="d-flex g-mb-10">
                                                        <i class="icon-check g-color-primary g-mt-5 g-mr-10"></i>
                                                        Based on Botostrap 4
                                                    </li>
                                                    <li class="d-flex g-mb-10">
                                                        <i class="icon-check g-color-primary g-mt-5 g-mr-10"></i>
                                                        Responsive Bootstrap Template
                                                    </li>
                                                    <li class="d-flex g-mb-10">
                                                        <i class="icon-check g-color-primary g-mt-5 g-mr-10"></i>
                                                        Semantic HTML5/CSS3 Codes
                                                    </li>
                                                    <li class="d-flex g-mb-10">
                                                        <i class="icon-check g-color-primary g-mt-5 g-mr-10"></i>
                                                        Great SASS Architecture
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-6">
                                                <ul class="list-unstyled g-color-gray-dark-v4">
                                                    <li class="d-flex g-mb-10">
                                                        <i class="icon-check g-color-primary g-mt-5 g-mr-10"></i>
                                                        Over 2000+ UI Components
                                                    </li>
                                                    <li class="d-flex g-mb-10">
                                                        <i class="icon-check g-color-primary g-mt-5 g-mr-10"></i>
                                                        Beautiful Eye Catching Demos
                                                    </li>
                                                    <li class="d-flex g-mb-10">
                                                        <i class="icon-check g-color-primary g-mt-5 g-mr-10"></i>
                                                        Over 30+ Thematic Examples
                                                    </li>
                                                    <li class="d-flex g-mb-10">
                                                        <i class="icon-check g-color-primary g-mt-5 g-mr-10"></i>
                                                        Comes with Premium Plugins
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-5 align-self-end">
                                        <img class="img-fluid" src="../../assets/img-temp/600x330/img1.png"
                                            alt="Image Description">
                                    </div>
                                </div>
                            </div>
                            <h2>Current Students</h2>
                            <p>As a student, it's all about having the right information at the right time. You need to know
                                how to
                                get information when you need it—whether it’s tips on how to study, important dates or
                                access to
                                your student records. And it's not all about the classroom—making time for other activities
                                on
                                campus, such as fitness and clubs, is just as important.</p>
                            <p>If you can't find the information you need, we're here to help! Ask us questions like:</p>

                            <ul class="mb-4">
                                <li><a class="u-link-v5 g-color-main--hover" href="#">When is the exam timetable
                                        posted?</a>
                                </li>
                                <li><a class="u-link-v5 g-color-main--hover" href="#">How long will it take for my
                                        student
                                        loan application to be assessed?</a></li>
                            </ul>

                            <!-- Search -->
                            <form class="input-group u-shadow-v19 g-brd-primary--focus g-rounded-30">
                                <input class="form-control g-brd-secondary-light-v2 g-rounded-left-30 g-px-30 g-py-12"
                                    type="text" placeholder="Search all current students services websites">
                                <button
                                    class="btn input-group-addon d-flex align-items-center u-shadow-v33 g-brd-none g-color-white g-bg-primary g-bg-main--hover g-rounded-right-30 g-transition-0_2 g-px-30"
                                    type="button">
                                    Ask Unify
                                </button>
                            </form>
                            <!-- End Search -->

                            <hr class="g-brd-secondary-light-v2 my-5">

                            <div class="row">
                                <div class="col-md-6 g-mb-30">
                                    <h3 class="h4 mb-3">Show all System Logins</h3>

                                    <div class="g-overflow-hidden">
                                        <a class="u-block-hover g-text-underline--none--hover" href="#">
                                            <img class="img-fluid u-block-hover__main--zoom-v1"
                                                src="{{ URL::asset('build/assets/include/svg/svg-system-login1.svg') }}"
                                                align="Image Description">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-md-6 g-mb-30">
                                    <h3 class="h4 mb-3">System Logins</h3>

                                    <!-- Links -->
                                    <ul class="list-unstyled">
                                        <li class="py-1">
                                            <a class="d-flex align-items-center u-link-v5 g-color-main--hover g-font-size-15"
                                                href="#">
                                                Email <i class="g-font-size-13 ml-auto material-icons">arrow_forward</i>
                                            </a>
                                        </li>
                                        <li class="py-1">
                                            <a class="d-flex align-items-center u-link-v5 g-color-main--hover g-font-size-15"
                                                href="#">
                                                Blackboard <i
                                                    class="g-font-size-13 ml-auto material-icons">arrow_forward</i>
                                            </a>
                                        </li>
                                        <li class="py-1">
                                            <a class="d-flex align-items-center u-link-v5 g-color-main--hover g-font-size-15"
                                                href="#">
                                                Canvas <i class="g-font-size-13 ml-auto material-icons">arrow_forward</i>
                                            </a>
                                        </li>
                                        <li class="py-1">
                                            <a class="d-flex align-items-center u-link-v5 g-color-main--hover g-font-size-15"
                                                href="#">
                                                MyUni <i class="g-font-size-13 ml-auto material-icons">arrow_forward</i>
                                            </a>
                                        </li>
                                        <li class="py-1">
                                            <a class="d-flex align-items-center u-link-v5 g-color-main--hover g-font-size-15"
                                                href="#">
                                                Semester 2 exam timetables <i
                                                    class="g-font-size-13 ml-auto material-icons">arrow_forward</i>
                                            </a>
                                        </li>
                                        <li class="py-1">
                                            <a class="d-flex align-items-center u-link-v5 g-color-main--hover g-font-size-15"
                                                href="#">
                                                Graduation <i
                                                    class="g-font-size-13 ml-auto material-icons">arrow_forward</i>
                                            </a>
                                        </li>
                                    </ul>
                                    <!-- End Links -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Lightbox Single Image -->

        <hr class="g-brd-gray-light-v4 g-my-60">

    </div>
    <!-- End Programs -->

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

            // initialization of sticky blocks
            setTimeout(function() {
                $.HSCore.components.HSStickyBlock.init('.js-sticky-block');
            }, 300);

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
        });
    </script>
@endsection
