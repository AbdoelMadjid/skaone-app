@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Welcome
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/hs-bg-video/hs-bg-video.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/fancybox/jquery.fancybox.css') }}">
@endsection
@section('content')
    <!-- Promo Block -->
    <section class="clearfix">
        <div class="js-bg-video" data-hs-bgv-type="youtube" data-hs-bgv-id="FxiskmF16gU" data-hs-bgv-loop="1">
            <div class="g-bg-cover g-bg-black-opacity-0_6--after g-pos-rel g-z-index-1">
                <div class="container text-center g-pos-rel g-z-index-1 g-pt-100 g-pb-80">
                    <!-- Promo Block Info -->
                    <div class="g-mb-40">
                        <h1 class="g-color-white g-font-size-60--lg">Become a Unify Student</h1>
                        <p class="g-color-white-opacity-0_8 g-font-size-22">Search from more than 500 diverse programs. Find
                            your fit at Unify.</p>
                    </div>
                    <!-- End Promo Block Info -->

                    <!-- Form Group -->
                    <form class="g-max-width-645 mx-auto">
                        <input class="form-control g-brd-none g-font-size-16 g-rounded-30 g-px-30 g-py-14 g-mb-20"
                            type="text" placeholder="Search programs by major">

                        <div class="row g-mx-minus-10">
                            <div class="col-sm-6 g-px-10 g-mb-20">
                                <button
                                    class="btn btn-block g-color-white g-color-main--hover g-bg-main g-bg-white--hover g-rounded-30 g-py-13"
                                    type="submit">
                                    Search Undergraduate Programs
                                </button>
                            </div>
                            <div class="col-sm-6 g-px-10 g-mb-20">
                                <button
                                    class="btn btn-block g-color-white g-color-main--hover g-bg-primary g-bg-white--hover g-rounded-30 g-py-13"
                                    type="submit">
                                    Search Graduate Programs
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- End Form Group -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Promo Block -->

    <!-- Studies -->
    <div class="container g-pt-100 g-pb-50">
        <!-- Heading -->
        <div class="g-max-width-645 text-center mx-auto g-mb-60">
            <h2 class="h1 mb-3">Your Unify Edge</h2>
            <p>Put it all together, and choose your study opportunity at the University of Unify.</p>
        </div>
        <!-- End Heading -->

        <div class="row">
            <!-- Studies -->
            <article class="col-md-4 g-mb-30">
                <div class="g-mb-30">
                    <img class="img-fluid" src="{{ URL::asset('build/assets/img-temp/600x350/img3.jpg') }}"
                        alt="Image Description">
                </div>

                <div class="g-mb-35">
                    <h3 class="mb-3">Undergraduate Studies</h3>
                    <p class="g-font-size-15">With <a class="g-font-weight-500" href="page-programs-1.html">over 80
                            programs</a> and a thriving community, Unify provides a <a class="g-font-weight-500"
                            href="page-programs-1.html">fantastic learning environment</a> for students coming straight from
                        high school or transferring from other post-secondary instititions.</p>
                </div>
                <a class="btn u-shadow-v39 g-color-white g-color-white--hover g-bg-main g-bg-primary--hover g-font-size-default g-rounded-30 g-px-35 g-py-8"
                    href="page-apply-1.html">Start Your Application</a>
            </article>
            <!-- End Studies -->

            <!-- Studies -->
            <article class="col-md-4 g-mb-30">
                <div class="g-mb-30">
                    <img class="img-fluid" src="{{ URL::asset('build/assets/img-temp/600x350/img1.jpg') }}"
                        alt="Image Description">
                </div>

                <div class="g-mb-35">
                    <h3 class="mb-3">Graduate Studies</h3>
                    <p class="g-font-size-15">Unify's Faculty of Graduate Studies is home to over 3500 students studying in
                        <a class="g-font-weight-500" href="page-programs-1.html">over 160 graduate programs</a>, with a
                        reputation for quality and innovation that's respected around the globe.
                    </p>
                </div>
                <a class="btn u-shadow-v39 g-color-white g-color-white--hover g-bg-main g-bg-primary--hover g-font-size-default g-rounded-30 g-px-35 g-py-8"
                    href="page-apply-1.html">Start Your Application</a>
            </article>
            <!-- End Studies -->

            <!-- Studies -->
            <article class="col-md-4 g-mb-30">
                <div class="g-mb-30">
                    <img class="img-fluid" src="{{ URL::asset('build/assets/img-temp/600x350/img2.jpg') }}"
                        alt="Image Description">
                </div>

                <div class="g-mb-35">
                    <h3 class="mb-3">Continuing Studies</h3>
                    <p class="g-font-size-15">Take the next step on your journey with <a class="g-font-weight-500"
                            href="#">continuing studies</a> and professional-development programs at Unify. Learn
                        skills that will benefit your current job, or head down an entirely new career path.</p>
                </div>
                <a class="btn u-shadow-v39 g-color-white g-color-white--hover g-bg-main g-bg-primary--hover g-font-size-default g-rounded-30 g-px-35 g-py-8"
                    href="page-apply-1.html">Start Your Application</a>
            </article>
            <!-- End Studies -->
        </div>
    </div>
    <!-- End Studies -->

    <!-- Hero Content -->
    <div class="container-fluid g-pos-rel g-pa-30">
        <div class="row justify-content-end align-items-center">
            <div class="col-sm-6 g-mb-30 g-mb-0--sm">
                <!-- Carousel - Info -->
                <div id="carouselCus1" class="js-carousel g-bg-secondary g-pos-rel" data-infinite="true"
                    data-nav-for="#carouselCus2" data-in-effect="slideInUp" data-out-effect="slideInDown"
                    data-pagi-classes="u-carousel-indicators-v35--main g-absolute-centered--x g-bottom-20">
                    <div class="js-slide d-flex g-min-height-70vh g-flex-centered g-pa-70">
                        <div class="text-center">
                            <div class="mb-5">
                                <h2 class="h1 mb-3">Fuel your success with dynamic learning</h2>
                                <p>Don't just learn: get real-world experience as you learn. It gives you an edge by
                                    accelerating your personal and academic growth, and prepares you for career success.</p>
                            </div>
                            <a class="btn g-brd-2 g-brd-main-opacity-0_1 g-brd-primary--hover g-color-main g-color-white--hover g-bg-primary--hover g-font-size-15 g-rounded-30 g-px-25 g-py-8"
                                href="#">Learn More</a>
                        </div>
                    </div>

                    <div class="js-slide d-flex g-min-height-70vh g-flex-centered g-pa-70">
                        <div class="text-center">
                            <div class="mb-5">
                                <h2 class="h1 mb-3">Make a vital impact your way</h2>
                                <p>Being at Unify means belonging to a community of minds committed to tackling real-world
                                    issues. What will your vital impact be?</p>
                            </div>
                            <a class="btn g-brd-2 g-brd-main-opacity-0_1 g-brd-primary--hover g-color-main g-color-white--hover g-bg-primary--hover g-font-size-15 g-rounded-30 g-px-25 g-py-8"
                                href="#">Learn More</a>
                        </div>
                    </div>

                    <div class="js-slide d-flex g-min-height-70vh g-flex-centered g-pa-70">
                        <div class="text-center">
                            <div class="mb-5">
                                <h2 class="h1 mb-3">Learn by doing</h2>
                                <p>The world is interconnected and ever-evolving. Learning should be too. That's why our
                                    undergraduate students are immersed in hands-on learning opportunities.</p>
                            </div>
                            <a class="btn g-brd-2 g-brd-main-opacity-0_1 g-brd-primary--hover g-color-main g-color-white--hover g-bg-primary--hover g-font-size-15 g-rounded-30 g-px-25 g-py-8"
                                href="#">Learn More</a>
                        </div>
                    </div>
                </div>
                <!-- End Carousel - Info -->
            </div>

            <div class="col-sm-6">
                <!-- Carousel - Image -->
                <div id="carouselCus2" class="js-carousel g-pos-rel" data-infinite="true" data-nav-for="#carouselCus1"
                    data-arrows-classes="u-arrow-v1 g-absolute-centered--y g-width-40 g-height-40 g-color-white g-color-primary--hover g-font-size-40"
                    data-arrow-left-classes="fa fa-angle-left g-left-40"
                    data-arrow-right-classes="fa fa-angle-right g-right-40">
                    <div class="js-slide g-min-height-70vh g-bg-size-cover g-bg-pos-top-center"
                        data-bg-img-src="{{ URL::asset('build/assets/img-temp/900x700/img3.jpg') }}"></div>
                    <div class="js-slide g-min-height-70vh g-bg-size-cover g-bg-pos-top-center"
                        data-bg-img-src="{{ URL::asset('build/assets/img-temp/900x700/img4.jpg') }}"></div>
                    <div class="js-slide g-min-height-70vh g-bg-size-cover g-bg-pos-top-center"
                        data-bg-img-src="{{ URL::asset('build/assets/img-temp/900x700/img5.jpg') }}"></div>
                </div>
                <!-- End Carousel - Image -->
            </div>
        </div>
    </div>
    <!-- End Hero Content -->

    <!-- Video Blocks -->
    <div class="container text-center g-py-70">
        <h3 class="h3 g-mb-40">Boost your career to new heights</h3>

        <!-- Video Blocks -->
        <div class="row g-mb-30">
            <div class="col-sm-6 col-lg-3 g-mb-30">
                <!-- Fancybox Video -->
                <div
                    class="u-shadow-v36 g-brd-around g-brd-4 g-brd-white g-brd-primary--hover rounded g-pos-rel g-transition-0_2">
                    <img class="img-fluid" src="{{ URL::asset('build/assets/img-temp/600x350/img10.jpg') }}"
                        alt="Image Description">
                    <a class="js-fancybox g-absolute-centered" href="javascript:;"
                        data-src="//www.youtube.com/watch?v=FxiskmF16gU" data-speed="350" data-caption="Video">
                        <span
                            class="u-icon-v3 u-icon-size--lg g-color-white g-color-primary--hover g-bg-transparent g-font-size-30 g-rounded-50x g-cursor-pointer">
                            <i class="g-pos-rel g-left-2 fa fa-play"></i>
                        </span>
                    </a>
                </div>
                <!-- End Fancybox Video -->
            </div>
            <div class="col-sm-6 col-lg-3 g-mb-30">
                <!-- Fancybox Video -->
                <div
                    class="u-shadow-v36 g-brd-around g-brd-4 g-brd-white g-brd-primary--hover rounded g-pos-rel g-transition-0_2">
                    <img class="img-fluid" src="{{ URL::asset('build/assets/img-temp/600x350/img11.jpg') }}"
                        alt="Image Description">
                    <a class="js-fancybox g-absolute-centered" href="javascript:;"
                        data-src="//www.youtube.com/watch?v=FxiskmF16gU" data-speed="350" data-caption="Video">
                        <span
                            class="u-icon-v3 u-icon-size--lg g-color-white g-color-primary--hover g-bg-transparent g-font-size-30 g-rounded-50x g-cursor-pointer">
                            <i class="g-pos-rel g-left-2 fa fa-play"></i>
                        </span>
                    </a>
                </div>
                <!-- End Fancybox Video -->
            </div>
            <div class="col-sm-6 col-lg-3 g-mb-30">
                <!-- Fancybox Video -->
                <div
                    class="u-shadow-v36 g-brd-around g-brd-4 g-brd-white g-brd-primary--hover rounded g-pos-rel g-transition-0_2">
                    <img class="img-fluid" src="{{ URL::asset('build/assets/img-temp/600x350/img9.jpg') }}"
                        alt="Image Description">
                    <a class="js-fancybox g-absolute-centered" href="javascript:;"
                        data-src="//www.youtube.com/watch?v=FxiskmF16gU" data-speed="350" data-caption="Video">
                        <span
                            class="u-icon-v3 u-icon-size--lg g-color-white g-color-primary--hover g-bg-transparent g-font-size-30 g-rounded-50x g-cursor-pointer">
                            <i class="g-pos-rel g-left-2 fa fa-play"></i>
                        </span>
                    </a>
                </div>
                <!-- End Fancybox Video -->
            </div>
            <div class="col-sm-6 col-lg-3 g-mb-30">
                <!-- Fancybox Video -->
                <div
                    class="u-shadow-v36 g-brd-around g-brd-4 g-brd-white g-brd-primary--hover rounded g-pos-rel g-transition-0_2">
                    <img class="img-fluid" src="{{ URL::asset('build/assets/img-temp/600x350/img8.jpg') }}"
                        alt="Image Description">
                    <a class="js-fancybox g-absolute-centered" href="javascript:;"
                        data-src="//www.youtube.com/watch?v=FxiskmF16gU" data-speed="350" data-caption="Video">
                        <span
                            class="u-icon-v3 u-icon-size--lg g-color-white g-color-primary--hover g-bg-transparent g-font-size-30 g-rounded-50x g-cursor-pointer">
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
                            <h3 class="h2">Take a virtual tour of Unify University</h3>
                            <p>Do you want to implement microtransactions, have unusually large average order values, or
                                operate with high refund rates? Get in touch to discuss your idea.</p>
                        </div>
                    </div>
                    <!-- End Media -->
                </div>

                <div class="col-5 col-md-3 col-lg-2 mx-auto g-mx-0--lg g-mb-30">
                    <button
                        class="btn btn-block u-shadow-v33 g-color-white g-bg-primary g-bg-main--hover g-rounded-30 g-px-25 g-py-13"
                        type="button">Start Now</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Call to Action -->

    <!-- Testimonials -->
    <div class="container g-pos-rel g-pt-100">
        <div class="row justify-content-end align-items-center">
            <div class="col-sm-6 order-sm-2 g-mb-30">
                <!-- Testimonials - Carousel -->
                <div id="carouselCus3" class="js-carousel" data-infinite="true" data-autoplay="true" data-speed="10000"
                    data-nav-for="#carouselCus4" data-in-effect="slideInRight" data-out-effect="slideInRight">
                    <div class="js-slide g-pl-50--lg">
                        <!-- Testimonials - Content -->
                        <div class="media mb-3">
                            <div class="d-flex mr-3">
                                <span
                                    class="g-font-secondary g-font-size-40 g-opacity-0_3 g-pos-rel g-top-minus-10">&#8220;</span>
                            </div>
                            <div class="media-body">
                                <blockquote class="g-brd-left-none g-font-style-italic g-font-size-20 g-pl-0">The program
                                    offers both a strong theoretical and practical component providing the solid foundation
                                    needed for student teachers to venture out into the realm of teaching.
                                    <span
                                        class="align-self-end g-font-secondary g-font-size-40 g-opacity-0_3 g-line-height-0 align-bottom g-pos-rel g-top-minus-10">&#8221;</span>
                                </blockquote>
                            </div>
                        </div>

                        <div class="g-pl-30">
                            <h3 class="h4 mb-0">Karolina Wellyan</h3>
                            <span class="d-block g-font-size-18 g-pl-20">&#8212; Bachelor Student</span>
                        </div>
                        <!-- End Testimonials - Content -->
                    </div>

                    <div class="js-slide g-pl-50--lg">
                        <!-- Testimonials - Content -->
                        <div class="media mb-3">
                            <div class="d-flex mr-3">
                                <span
                                    class="g-font-secondary g-font-size-40 g-opacity-0_3 g-pos-rel g-top-minus-10">&#8220;</span>
                            </div>
                            <div class="media-body">
                                <blockquote class="g-brd-left-none g-font-style-italic g-font-size-20 g-pl-0">Unify's TESL
                                    program was a personally enriching and professionally beneficial experience that opened
                                    the door to a rewarding second career in ESL.
                                    <span
                                        class="align-self-end g-font-secondary g-font-size-40 g-opacity-0_3 g-line-height-0 align-bottom g-pos-rel g-top-minus-10">&#8221;</span>
                                </blockquote>
                            </div>
                        </div>

                        <div class="g-pl-30">
                            <h3 class="h4 mb-0">Alex Watson</h3>
                            <span class="d-block g-font-size-18 g-pl-20">&#8212; 2015 Grad</span>
                        </div>
                        <!-- End Testimonials - Content -->
                    </div>

                    <div class="js-slide g-pl-50--lg">
                        <!-- Testimonials - Content -->
                        <div class="media mb-3">
                            <div class="d-flex mr-3">
                                <span
                                    class="g-font-secondary g-font-size-40 g-opacity-0_3 g-pos-rel g-top-minus-10">&#8220;</span>
                            </div>
                            <div class="media-body">
                                <blockquote class="g-brd-left-none g-font-style-italic g-font-size-20 g-pl-0">I would
                                    highly recommend the Unify TESL program – it gave me the training, tools and network to
                                    get ESL teaching opportunities in Toronto. Unify's program provided a good balance of
                                    both the practical and theoretical knowledge.
                                    <span
                                        class="align-self-end g-font-secondary g-font-size-40 g-opacity-0_3 g-line-height-0 align-bottom g-pos-rel g-top-minus-10">&#8221;</span>
                                </blockquote>
                            </div>
                        </div>

                        <div class="g-pl-30">
                            <h3 class="h4 mb-0">Maria Olsson</h3>
                            <span class="d-block g-font-size-18 g-pl-20">&#8212; 2017 Grad</span>
                        </div>
                        <!-- End Testimonials - Content -->
                    </div>
                </div>
                <!-- End Testimonials - Carousel -->
            </div>

            <div class="col-sm-6 order-sm-1 g-pos-stc g-mb-30">
                <!-- Carousel - Image -->
                <div id="carouselCus4" class="js-carousel g-pos-stc" data-infinite="true" data-nav-for="#carouselCus3"
                    data-arrows-classes="u-icon-v3 u-icon-size--sm g-absolute-centered--y g-color-primary g-color-white--hover g-bg-primary-opacity-0_1 g-bg-primary--hover rounded-circle g-pa-11"
                    data-arrow-left-classes="fa fa-angle-left g-left-0"
                    data-arrow-right-classes="fa fa-angle-right g-right-0">
                    <div class="js-slide g-min-height-50vh g-bg-size-cover g-bg-pos-top-center"
                        data-bg-img-src="{{ URL::asset('build/assets/img-temp/600x350/img12.jpg') }}"></div>
                    <div class="js-slide g-min-height-50vh g-bg-size-cover g-bg-pos-top-center"
                        data-bg-img-src="{{ URL::asset('build/assets/img-temp/600x350/img14.jpg') }}"></div>
                    <div class="js-slide g-min-height-50vh g-bg-size-cover g-bg-pos-top-center"
                        data-bg-img-src="{{ URL::asset('build/assets/img-temp/600x350/img15.jpg') }}"></div>
                </div>
                <!-- End Carousel - Image -->
            </div>
        </div>
    </div>
    <!-- End Testimonials -->

    <!-- Call to Action -->
    @include('skaonewelcome.call-to-acction')
    <!-- End Call to Action -->
@endsection
@section('script')
    <!-- JS Implementing Plugins -->
    <script src="{{ URL::asset('build/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.js') }}"></script>
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
