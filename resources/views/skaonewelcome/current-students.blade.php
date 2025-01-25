@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Current Student
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.css') }}">
@endsection
@section('content')
    <!-- Promo Block -->
    <div class="g-bg-img-hero g-pos-rel" style="background-image: url({{ URL::asset('build/assets/img/bg/bg-img1.png') }});">
        <div class="container g-pt-100">
            <div class="row justify-content-lg-between">
                <div class="col-lg-4 g-pt-50--lg">
                    <div class="mb-5">
                        <h1 class="g-font-size-45 mb-4">Welcome Back!</h1>
                        <p>Explore all the September events and back-to-school resources to welcome you to campus.</p>
                    </div>

                    <a class="js-go-to btn u-shadow-v33 g-hidden-md-down g-color-white g-bg-primary g-bg-main--hover g-rounded-30 g-px-35 g-py-10"
                        href="#!" data-target="#content">Explore Now</a>
                </div>

                <div class="col-lg-8 align-self-end">
                    <div class="u-shadow-v40 g-brd-around g-brd-7 g-brd-secondary rounded">
                        <img class="img-fluid rounded" src="{{ URL::asset('build/assets/img-temp/900x600/img1.jpg') }}"
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

    <!-- About Current Students -->
    <div id="content" class="container g-py-70">
        <div class="row">
            <div class="col-lg-9 order-lg-2">
                <div class="g-pl-15--lg">
                    <h2>Current Students</h2>
                    <p>As a student, it's all about having the right information at the right time. You need to know how to
                        get information when you need it—whether it’s tips on how to study, important dates or access to
                        your student records. And it's not all about the classroom—making time for other activities on
                        campus, such as fitness and clubs, is just as important.</p>
                    <p>If you can't find the information you need, we're here to help! Ask us questions like:</p>

                    <ul class="mb-4">
                        <li><a class="u-link-v5 g-color-main--hover" href="#">When is the exam timetable posted?</a>
                        </li>
                        <li><a class="u-link-v5 g-color-main--hover" href="#">How long will it take for my student
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
                                        Blackboard <i class="g-font-size-13 ml-auto material-icons">arrow_forward</i>
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
                                        Graduation <i class="g-font-size-13 ml-auto material-icons">arrow_forward</i>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Links -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 order-lg-1">
                <!-- Sidebar Links -->
                <ul class="list-unstyled">
                    <li class="mb-1">
                        <a class="d-block u-link-v5 g-color-text g-color-white--hover g-bg-secondary g-bg-main--hover g-font-size-default rounded g-pl-30--hover g-px-20 g-py-7"
                            href="#">
                            <i class="g-font-size-13 g-pos-rel g-top-2 mr-2 material-icons">arrow_forward</i>
                            Academic Calendar
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="d-block u-link-v5 g-color-text g-color-white--hover g-bg-secondary g-bg-main--hover g-font-size-default rounded g-pl-30--hover g-px-20 g-py-7"
                            href="#">
                            <i class="g-font-size-13 g-pos-rel g-top-2 mr-2 material-icons">arrow_forward</i>
                            Academic Support
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="d-block u-link-v5 g-color-text g-color-white--hover g-bg-secondary g-bg-main--hover g-font-size-default rounded g-pl-30--hover g-px-20 g-py-7"
                            href="#">
                            <i class="g-font-size-13 g-pos-rel g-top-2 mr-2 material-icons">arrow_forward</i>
                            Athletics &amp; Recreation
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="d-block u-link-v5 g-color-text g-color-white--hover g-bg-secondary g-bg-main--hover g-font-size-default rounded g-pl-30--hover g-px-20 g-py-7"
                            href="#">
                            <i class="g-font-size-13 g-pos-rel g-top-2 mr-2 material-icons">arrow_forward</i>
                            Career &amp; Leadership
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="d-block u-link-v5 g-color-text g-color-white--hover g-bg-secondary g-bg-main--hover g-font-size-default rounded g-pl-30--hover g-px-20 g-py-7"
                            href="#">
                            <i class="g-font-size-13 g-pos-rel g-top-2 mr-2 material-icons">arrow_forward</i>
                            Communities on Campus
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="d-block u-link-v5 g-color-text g-color-white--hover g-bg-secondary g-bg-main--hover g-font-size-default rounded g-pl-30--hover g-px-20 g-py-7"
                            href="#">
                            <i class="g-font-size-13 g-pos-rel g-top-2 mr-2 material-icons">arrow_forward</i>
                            Getting Involved
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="d-block u-link-v5 g-color-text g-color-white--hover g-bg-secondary g-bg-main--hover g-font-size-default rounded g-pl-30--hover g-px-20 g-py-7"
                            href="#">
                            <i class="g-font-size-13 g-pos-rel g-top-2 mr-2 material-icons">arrow_forward</i>
                            Health &amp; Wellness
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="d-block u-link-v5 g-color-text g-color-white--hover g-bg-secondary g-bg-main--hover g-font-size-default rounded g-pl-30--hover g-px-20 g-py-7"
                            href="#">
                            <i class="g-font-size-13 g-pos-rel g-top-2 mr-2 material-icons">arrow_forward</i>
                            International Centre
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="d-block u-link-v5 g-color-text g-color-white--hover g-bg-secondary g-bg-main--hover g-font-size-default rounded g-pl-30--hover g-px-20 g-py-7"
                            href="#">
                            <i class="g-font-size-13 g-pos-rel g-top-2 mr-2 material-icons">arrow_forward</i>
                            Residence &amp; Housing
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="d-block u-link-v5 g-color-text g-color-white--hover g-bg-secondary g-bg-main--hover g-font-size-default rounded g-pl-30--hover g-px-20 g-py-7"
                            href="#">
                            <i class="g-font-size-13 g-pos-rel g-top-2 mr-2 material-icons">arrow_forward</i>
                            Safety &amp; Respect
                        </a>
                    </li>
                    <li class="mb-1">
                        <a class="d-block u-link-v5 g-color-text g-color-white--hover g-bg-secondary g-bg-main--hover g-font-size-default rounded g-pl-30--hover g-px-20 g-py-7"
                            href="#">
                            <i class="g-font-size-13 g-pos-rel g-top-2 mr-2 material-icons">arrow_forward</i>
                            Timetable
                        </a>
                    </li>
                </ul>
                <!-- End Sidebar Links -->
            </div>
        </div>
    </div>
    <!-- End About Current Students -->

    <!-- More Links -->
    <div class="g-bg-img-hero" style="background-image: url({{ URL::asset('build/assets/include/svg/svg-bg1.svg') }});">
        <div class="container g-py-100">
            <!-- Heading -->
            <div class="g-max-width-645 text-center mx-auto g-mb-60">
                <h2 class="h1">Service for Current Students</h2>
            </div>
            <!-- End Heading -->

            <div class="card-group d-block d-md-flex g-mx-minus-4">
                <div class="card g-brd-none g-mx-4 g-mb-8">
                    <!-- Links -->
                    <div class="card-body u-shadow-v38 g-bg-white rounded g-pa-40">
                        <span class="u-icon-v3 u-shadow-v31 g-color-main g-bg-secondary-dark-v2 rounded-circle mb-4">
                            <i class="icon-finance-245 u-line-icon-pro"></i>
                        </span>
                        <h3 class="h4">Money</h3>
                        <p class="g-color-text-light-v1">University fees and costs, and financial support such as
                            scholarships, bursaries and research funding.</p>
                        <a class="u-link-v5 g-color-main--hover g-font-size-default" href="#">Learn More<i
                                class="g-font-size-13 ml-2 material-icons">arrow_forward</i></a>
                    </div>
                    <!-- End Links -->
                </div>

                <div class="card g-brd-none g-mx-4 g-mb-8">
                    <!-- Links -->
                    <div class="card-body u-shadow-v38 g-bg-white rounded g-pa-40">
                        <span class="u-icon-v3 u-shadow-v31 g-color-main g-bg-secondary-dark-v2 rounded-circle mb-4">
                            <i class="icon-education-039 u-line-icon-pro"></i>
                        </span>
                        <h3 class="h4">Your Studies</h3>
                        <p class="g-color-text-light-v1">Enrolment and course planning, timetables, exams and assessments,
                            honours and higher degree by research.</p>
                        <a class="u-link-v5 g-color-main--hover g-font-size-default" href="#">Learn More<i
                                class="g-font-size-13 ml-2 material-icons">arrow_forward</i></a>
                    </div>
                    <!-- End Links -->
                </div>

                <div class="card g-brd-none g-mx-4 g-mb-8">
                    <!-- Links -->
                    <div class="card-body u-shadow-v38 g-bg-white rounded g-pa-40">
                        <span class="u-icon-v3 u-shadow-v31 g-color-main g-bg-secondary-dark-v2 rounded-circle mb-4">
                            <i class="icon-education-055 u-line-icon-pro"></i>
                        </span>
                        <h3 class="h4">New Students</h3>
                        <p class="g-color-text-light-v1">Essential information and resources to help get you started at
                            Sydney.</p>
                        <a class="u-link-v5 g-color-main--hover g-font-size-default" href="#">Learn More<i
                                class="g-font-size-13 ml-2 material-icons">arrow_forward</i></a>
                    </div>
                    <!-- End Links -->
                </div>
            </div>

            <div class="card-group d-block d-md-flex g-mx-minus-4">
                <div class="card g-brd-none g-mx-4 g-mb-8">
                    <!-- Links -->
                    <div class="card-body u-shadow-v38 g-bg-white rounded g-pa-40">
                        <span class="u-icon-v3 u-shadow-v31 g-color-main g-bg-secondary-dark-v2 rounded-circle mb-4">
                            <i class="icon-communication-058 u-line-icon-pro"></i>
                        </span>
                        <h3 class="h4">Support</h3>
                        <p class="g-color-text-light-v1">Health, wellbeing and support services, mentoring, and clubs and
                            societies.</p>
                        <a class="u-link-v5 g-color-main--hover g-font-size-default" href="#">Learn More<i
                                class="g-font-size-13 ml-2 material-icons">arrow_forward</i></a>
                    </div>
                    <!-- End Links -->
                </div>

                <div class="card g-brd-none g-mx-4 g-mb-8">
                    <!-- Links -->
                    <div class="card-body u-shadow-v38 g-bg-white rounded g-pa-40">
                        <span class="u-icon-v3 u-shadow-v31 g-color-main g-bg-secondary-dark-v2 rounded-circle mb-4">
                            <i class="icon-education-103 u-line-icon-pro-v3"></i>
                        </span>
                        <h3 class="h4">Student IT and Online Learning</h3>
                        <p class="g-color-text-light-v1">Log in to University systems, find computers and access wi-fi, get
                            the most out of online learning (LMS), help.</p>
                        <a class="u-link-v5 g-color-main--hover g-font-size-default" href="#">Learn More<i
                                class="g-font-size-13 ml-2 material-icons">arrow_forward</i></a>
                    </div>
                    <!-- End Links -->
                </div>

                <div class="card g-brd-none g-mx-4 g-mb-8">
                    <!-- Links -->
                    <div class="card-body u-shadow-v38 g-bg-white rounded g-pa-40">
                        <span class="u-icon-v3 u-shadow-v31 g-color-main g-bg-secondary-dark-v2 rounded-circle mb-4">
                            <i class="icon-communication-040 u-line-icon-pro"></i>
                        </span>
                        <h3 class="h4">Administration</h3>
                        <p class="g-color-text-light-v1">Update your personal details, obtain an academic transcript, check
                            key dates, learn about graduation, make a complaint or raise a concern.</p>
                        <a class="u-link-v5 g-color-main--hover g-font-size-default" href="#">Learn More<i
                                class="g-font-size-13 ml-2 material-icons">arrow_forward</i></a>
                    </div>
                    <!-- End Links -->
                </div>
            </div>
        </div>
    </div>
    <!-- End More Links -->

    <!-- Admission Heading -->
    <div class="container">
        <!-- Heading -->
        <div class="g-max-width-645 text-center mx-auto g-mb-60">
            <h2 class="h1 mb-3">Notices</h2>
            <p>Get the latest notices and newsworthy updates on the latest Unify announcements.</p>
        </div>
        <!-- End Heading -->
    </div>
    <!-- End Admission Heading -->

    <!-- Notice -->
    <div class="g-bg-secondary">
        <div class="container-fluid g-px-8 g-pt-8">
            <!-- Notice Carousel -->
            <div class="js-carousel u-carousel-v5 g-mx-minus-4" data-slides-show="4" data-slides-scroll="1"
                data-arrows-classes="u-icon-v3 u-icon-size--sm g-absolute-centered--x g-bottom-minus-70 g-color-main g-color-white--hover g-bg-secondary g-bg-primary--hover rounded g-pa-11"
                data-arrow-left-classes="fa fa-angle-left g-ml-minus-25"
                data-arrow-right-classes="fa fa-angle-right g-ml-25"
                data-responsive='[{
                 "breakpoint": 992,
                 "settings": {
                   "slidesToShow": 3
                 }
               }, {
                 "breakpoint": 768,
                 "settings": {
                   "slidesToShow": 2
                 }
               }, {
                 "breakpoint": 554,
                 "settings": {
                   "slidesToShow": 1
                 }
               }]'>

                <!-- Notice - Article -->
                <div class="js-slide g-mx-4 g-mb-8">
                    <div class="u-info-v11-1 g-bg-white text-center rounded g-px-40 g-py-50">
                        <div class="g-width-150 g-height-150 mx-auto mb-4">
                            <img class="img-fluid u-info-v11-1-img rounded-circle"
                                src="{{ URL::asset('build/assets/img-temp/150x150/img1.jpg') }}" alt="Image Description">
                        </div>
                        <div class="mb-5">
                            <h3 class="mb-3">Semester 2 Student Services and Amenities Fee (SSAF)</h3>
                            <p>Your Semester 2 SSAF statement is now available. Log in to Unify Student to access your
                                statement...</p>
                        </div>
                        <a class="btn g-brd-secondary-light-v2 g-brd-primary--hover g-color-text-light-v1 g-color-white--hover g-bg-primary--hover g-font-size-15 g-rounded-30 g-px-25 g-py-10"
                            href="#">Read Now</a>
                    </div>
                </div>
                <!-- End Notice - Article -->

                <!-- Notice - Article -->
                <div class="js-slide g-mx-4 g-mb-8">
                    <div class="u-info-v11-1 g-bg-white text-center rounded g-px-40 g-py-50">
                        <div class="g-width-150 g-height-150 mx-auto mb-4">
                            <img class="img-fluid u-info-v11-1-img rounded-circle"
                                src="{{ URL::asset('build/assets/img-temp/150x150/img5.jpg') }}" alt="Image Description">
                        </div>
                        <div class="mb-5">
                            <h3 class="mb-3">New undergraduate curriculum</h3>
                            <p>The University's reimagined Sydney Undergraduate Experience will launch in 2018. If you're a
                                current first-year student, you may be eligibl...</p>
                        </div>
                        <a class="btn g-brd-secondary-light-v2 g-brd-primary--hover g-color-text-light-v1 g-color-white--hover g-bg-primary--hover g-font-size-15 g-rounded-30 g-px-25 g-py-10"
                            href="#">Read Now</a>
                    </div>
                </div>
                <!-- End Notice - Article -->

                <!-- Notice - Article -->
                <div class="js-slide g-mx-4 g-mb-8">
                    <div class="u-info-v11-1 g-bg-white text-center rounded g-px-40 g-py-50">
                        <div class="g-width-150 g-height-150 mx-auto mb-4">
                            <img class="img-fluid u-info-v11-1-img rounded-circle"
                                src="{{ URL::asset('build/assets/img-temp/150x150/img3.jpg') }}" alt="Image Description">
                        </div>
                        <div class="mb-5">
                            <h3 class="mb-3">Unify Uni Alert is now live</h3>
                            <p>A new emergency alert system is now live across our campuses allowing us to send you vital
                                safety information directly to your mobile in the e...</p>
                        </div>
                        <a class="btn g-brd-secondary-light-v2 g-brd-primary--hover g-color-text-light-v1 g-color-white--hover g-bg-primary--hover g-font-size-15 g-rounded-30 g-px-25 g-py-10"
                            href="#">Read Now</a>
                    </div>
                </div>
                <!-- End Notice - Article -->

                <!-- Notice - Article -->
                <div class="js-slide g-mx-4 g-mb-8">
                    <div class="u-info-v11-1 g-bg-white text-center rounded g-px-40 g-py-50">
                        <div class="g-width-150 g-height-150 mx-auto mb-4">
                            <img class="img-fluid u-info-v11-1-img rounded-circle"
                                src="{{ URL::asset('build/assets/img-temp/150x150/img4.jpg') }}" alt="Image Description">
                        </div>
                        <div class="mb-5">
                            <h3 class="mb-3">Semester 2 exam timetables</h3>
                            <p>Your Semester 2 exam timetable is now available.</p>
                            <p>Seat numbers are no longer displayed on the timetable. Your seat number will...</p>
                        </div>
                        <a class="btn g-brd-secondary-light-v2 g-brd-primary--hover g-color-text-light-v1 g-color-white--hover g-bg-primary--hover g-font-size-15 g-rounded-30 g-px-25 g-py-10"
                            href="#">Read Now</a>
                    </div>
                </div>
                <!-- End Notice - Article -->

                <!-- Notice - Article -->
                <div class="js-slide g-mx-4 g-mb-8">
                    <div class="u-info-v11-1 g-bg-white text-center rounded g-px-40 g-py-50">
                        <div class="g-width-150 g-height-150 mx-auto mb-4">
                            <img class="img-fluid u-info-v11-1-img rounded-circle"
                                src="{{ URL::asset('build/assets/img-temp/150x150/img2.jpg') }}" alt="Image Description">
                        </div>
                        <div class="mb-5">
                            <h3 class="mb-3">University Health Service</h3>
                            <p>The University Health Service medical centre on Level 3, Wentworth Building, will close for
                                renovations from Saturday 2 December...</p>
                        </div>
                        <a class="btn g-brd-secondary-light-v2 g-brd-primary--hover g-color-text-light-v1 g-color-white--hover g-bg-primary--hover g-font-size-15 g-rounded-30 g-px-25 g-py-10"
                            href="#">Read Now</a>
                    </div>
                </div>
                <!-- End Notice - Article -->
            </div>
            <!-- End Notice Carousel -->
        </div>
    </div>
    <!-- End Notice -->

    <!-- Call to Action -->
    @include('skaonewelcome.call-to-acction')
    <!-- End Call to Action -->
@endsection
@section('script')
    <!-- JS Implementing Plugins -->
    <script src="{{ URL::asset('build/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/slick-carousel/slick/slick.js') }}"></script>

    <!-- JS Unify -->
    <script src="{{ URL::asset('build/assets/js/hs.core.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.header.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.dropdown.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.carousel.js') }}"></script>
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

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
        });
    </script>
@endsection
