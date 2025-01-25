@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Event
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/jquery-ui/themes/base/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/chosen/chosen.css') }}">
@endsection
@section('content')
    <!-- Promo Block -->
    <div class="g-bg-img-hero g-bg-cover g-bg-black-opacity-0_3--after"
        style="background-image: url({{ URL::asset('build/assets/img-temp/1920x1080/img4.jpg') }});">
        <div class="container g-pos-rel g-z-index-1 g-pt-80 g-pb-150">
            <div class="row justify-content-lg-between align-items-md-center">
                <div class="col-md-6 col-lg-5 g-mb-30">
                    <h1 class="g-color-white g-font-size-40--md mb-4">The Impact of Augmented, Mixed and Virtual Reality
                        Beyond Gaming</h1>
                    <p class="g-color-white-opacity-0_9 g-font-size-20--md">22nd - 23rd May 2018, Kingston Hall, Orlando</p>
                </div>

                <div class="col-md-6 col-lg-4 g-mb-30">
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
                </div>
            </div>
        </div>
    </div>
    <!-- End Promo Block -->

    <!-- Find a Course -->
    <div class="g-bg-img-hero g-bg-pos-top-center g-pos-rel g-z-index-1 g-mt-minus-150"
        style="background-image: url({{ URL::asset('build/assets/include/svg/svg-bg4.svg') }});">
        <div class="container g-pt-150 g-pb-30">
            <!-- Heading -->
            <div class="g-max-width-645 text-center mx-auto g-mb-60">
                <h2 class="h1 mb-0">Search the Best Experiences</h2>
                <span class="d-block g-font-size-18 mb-0">Discover 100+ of our events</span>
            </div>
            <!-- End Heading -->

            <form class="row">
                <div class="col-xl-8 g-mb-30">
                    <div class="g-mb-50">
                        <label class="g-font-weight-500 g-font-size-15 g-pl-30">Search by</label>
                        <input
                            class="form-control u-shadow-v19 g-brd-none g-bg-white g-font-size-16 g-rounded-30 g-px-30 g-py-13 g-mb-30"
                            type="text" placeholder="eg. How to fund your research on Ontario?">
                    </div>

                    <div class="row">
                        <div class="col-sm-6 g-mb-50">
                            <!-- Area of Interest -->
                            <label class="g-font-weight-500 g-font-size-15 g-pl-30">Area of Interest</label>
                            <select
                                class="js-custom-select w-100 u-select-v2 u-shadow-v19 g-brd-none g-color-text-light-v1 g-color-primary--hover g-bg-white text-left g-rounded-30 g-pl-30 g-py-12"
                                data-placeholder="Area of Interest" data-open-icon="fa fa-angle-down"
                                data-close-icon="fa fa-angle-up">
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="">All</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="architecture_creative_arts">Architecture, visual and creative arts</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="arts_social_sciences">Arts and social sciences</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="business_law">Business and law</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="engineering_it">Engineering and IT</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="indigenous">Indigenous</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="medicine_health">Medicine and health</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="natural_sciences">Natural sciences</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="sport">Sport</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="university_general_interest">University and general interest</option>
                            </select>
                            <!-- End Area of Interest -->
                        </div>

                        <div class="col-sm-6 g-mb-50">
                            <!-- Type -->
                            <label class="g-font-weight-500 g-font-size-15 g-pl-30">Type</label>
                            <select
                                class="js-custom-select w-100 u-select-v2 u-shadow-v19 g-brd-none g-color-text-light-v1 g-color-primary--hover g-bg-white text-left g-rounded-30 g-pl-30 g-py-12"
                                data-placeholder="Type" data-open-icon="fa fa-angle-down" data-close-icon="fa fa-angle-up">
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="">All</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="awards_ceremonies">Awards and ceremonies</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="conferences_workshops">Conferences and workshops</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="exhibition_performing_arts">Exhibition and performing arts</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="forums">Lectures, Talks and Forums</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="social_networking">Social and networking</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="special_events">Special events</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="sport">Sport</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="tours">Tours</option>
                            </select>
                            <!-- End Type -->
                        </div>

                        <div class="col-sm-6 g-mb-50">
                            <!-- For -->
                            <label class="g-font-weight-500 g-font-size-15 g-pl-30">For</label>
                            <select
                                class="js-custom-select w-100 u-select-v2 u-shadow-v19 g-brd-none g-color-text-light-v1 g-color-primary--hover g-bg-white text-left g-rounded-30 g-pl-30 g-py-12"
                                data-placeholder="For" data-open-icon="fa fa-angle-down"
                                data-close-icon="fa fa-angle-up">
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="">All</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="alumni_and_friends">Alumni and friends</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="current_students">Current students</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="future_students">Future students</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="public">Public</option>
                                <option
                                    class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                    value="staff">Staff</option>
                            </select>
                            <!-- End For -->
                        </div>

                        <div class="col-sm-6 g-mt-30 g-mb-30">
                            <div class="d-flex">
                                <button
                                    class="btn btn-block u-shadow-v32 g-brd-main g-brd-2 g-color-main g-color-white--hover g-bg-transparent g-bg-main--hover g-font-size-16 g-rounded-30 g-py-10 mr-2 g-mt-0"
                                    type="button">Reset</button>
                                <button
                                    class="btn btn-block u-shadow-v32 g-brd-none g-color-white g-bg-main g-bg-primary--hover g-font-size-16 g-rounded-30 g-py-10 ml-2 g-mt-0"
                                    type="button">Search</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 g-mb-30">
                    <!-- Datepicker -->
                    <label class="g-font-weight-500 g-font-size-15">Select single date</label>
                    <div id="datepickerInline" class="u-datepicker-v1 u-shadow-v32 g-brd-none rounded"></div>
                    <!-- End Datepicker -->
                </div>
            </form>
        </div>
    </div>
    <!-- End Find a Course -->

    <!-- Key Events -->
    <div class="container g-pt-50 g-pb-70">
        <h2 class="g-mb-40">Key Events</h2>

        <div class="row">
            <div class="col-sm-6 col-lg-3 g-mb-30">
                <!-- Event Block -->
                <article class="u-block-hover u-shadow-v38">
                    <div class="g-min-height-300 g-bg-img-hero g-bg-cover g-bg-white-gradient-opacity-v1--after g-pos-rel"
                        style="background-image: url({{ URL::asset('build/assets/img-temp/400x500/img11.jpg') }});">
                        <div class="g-pos-abs g-bottom-0 g-left-0 g-right-0 g-z-index-1 g-pa-20">
                            <div class="d-flex justify-content-between">
                                <div class="mt-auto mb-2">
                                    <span class="d-block g-color-white g-line-height-1_4">9:00 am</span>
                                    <span class="d-block g-color-white g-line-height-1_4">12:00 pm</span>
                                </div>
                                <div class="text-center">
                                    <span
                                        class="g-color-white g-font-weight-500 g-font-size-40 g-line-height-0_7">24</span>
                                    <span class="g-color-white g-line-height-0_7">Nov</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="g-pa-25">
                        <h3 class="g-color-primary--hover g-font-size-18 mb-0">Core Research Facilities, Annual Symposium
                        </h3>
                    </div>

                    <a class="u-link-v2 g-z-index-2" href="#"></a>
                </article>
                <!-- End Event Block -->
            </div>

            <div class="col-sm-6 col-lg-3 g-mb-30">
                <!-- Event Block -->
                <article class="u-block-hover u-shadow-v38">
                    <div class="g-min-height-300 g-bg-img-hero g-bg-cover g-bg-white-gradient-opacity-v1--after g-pos-rel"
                        style="background-image: url({{ URL::asset('build/assets/img-temp/400x500/img12.jpg') }});">
                        <div class="g-pos-abs g-bottom-0 g-left-0 g-right-0 g-z-index-1 g-pa-20">
                            <div class="d-flex justify-content-between">
                                <div class="mt-auto mb-2">
                                    <span class="d-block g-color-white g-line-height-1_4">12:15 pm</span>
                                    <span class="d-block g-color-white g-line-height-1_4">12:45 pm</span>
                                </div>
                                <div class="text-center">
                                    <span
                                        class="g-color-white g-font-weight-500 g-font-size-40 g-line-height-0_7">07</span>
                                    <span class="g-color-white g-line-height-0_7">Dec</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="g-pa-25">
                        <h3 class="g-color-primary--hover g-font-size-18 mb-0">Ontario Ideas - Digital Rights: what are
                            they, and why do we need them?</h3>
                    </div>

                    <a class="u-link-v2 g-z-index-2" href="#"></a>
                </article>
                <!-- End Event Block -->
            </div>

            <div class="col-sm-6 col-lg-3 g-mb-30">
                <!-- Event Block -->
                <article class="u-block-hover u-shadow-v38">
                    <div class="g-min-height-300 g-bg-img-hero g-bg-cover g-bg-white-gradient-opacity-v1--after g-pos-rel"
                        style="background-image: url({{ URL::asset('build/assets/img-temp/400x500/img13.jpg') }});">
                        <div class="g-pos-abs g-bottom-0 g-left-0 g-right-0 g-z-index-1 g-pa-20">
                            <div class="d-flex justify-content-between">
                                <div class="mt-auto mb-2">
                                    <span class="d-block g-color-white g-line-height-1_4">03:00 pm</span>
                                    <span class="d-block g-color-white g-line-height-1_4">05:00 pm</span>
                                </div>
                                <div class="text-center">
                                    <span
                                        class="g-color-white g-font-weight-500 g-font-size-40 g-line-height-0_7">19</span>
                                    <span class="g-color-white g-line-height-0_7">Jan</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="g-pa-25">
                        <h3 class="g-color-primary--hover g-font-size-18 mb-0">USEAC Masterclass</h3>
                    </div>

                    <a class="u-link-v2 g-z-index-2" href="#"></a>
                </article>
                <!-- End Event Block -->
            </div>

            <div class="col-sm-6 col-lg-3 g-mb-30">
                <!-- Event Block -->
                <article class="u-block-hover u-shadow-v38">
                    <div class="g-min-height-300 g-bg-img-hero g-bg-cover g-bg-white-gradient-opacity-v1--after g-pos-rel"
                        style="background-image: url({{ URL::asset('build/assets/img-temp/400x500/img14.jpg') }});">
                        <div class="g-pos-abs g-bottom-0 g-left-0 g-right-0 g-z-index-1 g-pa-20">
                            <div class="d-flex justify-content-between">
                                <div class="mt-auto mb-2">
                                    <span class="d-block g-color-white g-line-height-1_4">11:30 am</span>
                                    <span class="d-block g-color-white g-line-height-1_4">1:00 pm</span>
                                </div>
                                <div class="text-center">
                                    <span
                                        class="g-color-white g-font-weight-500 g-font-size-40 g-line-height-0_7">20</span>
                                    <span class="g-color-white g-line-height-0_7">Jan</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="g-pa-25">
                        <h3 class="g-color-primary--hover g-font-size-18 mb-0">2017 Unify College of the Arts Undergraduate
                            Degree Show</h3>
                    </div>

                    <a class="u-link-v2 g-z-index-2" href="#"></a>
                </article>
                <!-- End Event Block -->
            </div>
        </div>
    </div>
    <!-- End Key Events -->

    <!-- Promo Event -->
    <div class="container g-brd-y g-brd-secondary-light-v2 g-pt-50 g-pb-60">
        <div class="row justify-content-lg-center align-items-md-center">
            <div class="col-md-6 col-lg-5 g-mb-30 g-mb-0--md">
                <h2 class="mb-3"><a class="h2 u-link-v5 g-color-main g-color-primary--hover" href="#">7th
                        Australia-China Symposium in Education and Technology</a></h2>
                <p>Following the previous main symposiums of FOCSA (The Federation of Chinese Scholars in Australia), the
                    7th Australia-China Symposium in Education.</p>
            </div>

            <div class="col-md-6 col-lg-5 offset-lg-1">
                <img class="img-fluid u-shadow-v39 g-brd-around g-brd-10 g-brd-white rounded"
                    src="{{ URL::asset('build/assets/img-temp/600x350/img17.jpg') }}" alt="Image Description">
            </div>
        </div>
    </div>
    <!-- End Promo Event -->

    <!-- University Events -->
    <div class="container g-pt-100">
        <div class="row">
            <div class="col-lg-6 g-mb-30">
                <!-- Event Listing -->
                <article class="u-shadow-v39">
                    <div class="row">
                        <div class="col-4">
                            <div class="g-min-height-170 g-bg-img-hero"
                                style="background-image: url({{ URL::asset('build/assets/img-temp/200x200/img5.jpg') }});">
                            </div>
                        </div>

                        <div class="col-8 g-min-height-170 g-flex-centered">
                            <div class="media align-items-center g-py-40">
                                <div class="d-flex col-8">
                                    <h3 class="g-line-height-1 mb-0"><a
                                            class="u-link-v5 g-color-main g-color-primary--hover g-font-size-18"
                                            href="#">Camino de Santiago: treading the ancient path to the end of the
                                            earth</a></h3>
                                </div>
                                <div class="media-body col-4">
                                    <span
                                        class="g-color-primary g-font-weight-500 g-font-size-40 g-line-height-0_7">13</span>
                                    <span class="g-line-height-0_7">Nov</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- End Event Listing -->
            </div>

            <div class="col-lg-6 g-mb-30">
                <!-- Event Listing -->
                <article class="u-shadow-v39">
                    <div class="row">
                        <div class="col-4">
                            <div class="g-min-height-170 g-bg-img-hero"
                                style="background-image: url({{ URL::asset('build/assets/img-temp/200x200/img6.jpg') }});">
                            </div>
                        </div>

                        <div class="col-8 g-min-height-170 g-flex-centered">
                            <div class="media align-items-center g-py-40">
                                <div class="d-flex col-8">
                                    <h3 class="g-line-height-1 mb-0"><a
                                            class="u-link-v5 g-color-main g-color-primary--hover g-font-size-18"
                                            href="#">Kopernik X Navicula: Music and Technology for Change</a></h3>
                                </div>
                                <div class="media-body col-4">
                                    <span
                                        class="g-color-primary g-font-weight-500 g-font-size-40 g-line-height-0_7">05</span>
                                    <span class="g-line-height-0_7">Dec</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- End Event Listing -->
            </div>

            <div class="w-100"></div>

            <div class="col-lg-6 g-mb-30">
                <!-- Event Listing -->
                <article class="u-shadow-v39">
                    <div class="row">
                        <div class="col-4">
                            <div class="g-min-height-170 g-bg-img-hero"
                                style="background-image: url({{ URL::asset('build/assets/img-temp/200x200/img10.jpg') }});">
                            </div>
                        </div>

                        <div class="col-8 g-min-height-170 g-flex-centered">
                            <div class="media align-items-center g-py-40">
                                <div class="d-flex col-8">
                                    <h3 class="g-line-height-1 mb-0"><a
                                            class="u-link-v5 g-color-main g-color-primary--hover g-font-size-18"
                                            href="#">From Euclid to the Computer: tracing a line through
                                            mathematics</a></h3>
                                </div>
                                <div class="media-body col-4">
                                    <span
                                        class="g-color-primary g-font-weight-500 g-font-size-40 g-line-height-0_7">09</span>
                                    <span class="g-line-height-0_7">Dec</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- End Event Listing -->
            </div>

            <div class="col-lg-6 g-mb-30">
                <!-- Event Listing -->
                <article class="u-shadow-v39">
                    <div class="row">
                        <div class="col-4">
                            <div class="g-min-height-170 g-bg-img-hero"
                                style="background-image: url({{ URL::asset('build/assets/img-temp/200x200/img9.jpg') }});">
                            </div>
                        </div>

                        <div class="col-8 g-min-height-170 g-flex-centered">
                            <div class="media align-items-center g-py-40">
                                <div class="d-flex col-8">
                                    <h3 class="g-line-height-1 mb-0"><a
                                            class="u-link-v5 g-color-main g-color-primary--hover g-font-size-18"
                                            href="#">Satellite Remote Sensing Summer School - SRSSS</a></h3>
                                </div>
                                <div class="media-body col-4">
                                    <span
                                        class="g-color-primary g-font-weight-500 g-font-size-40 g-line-height-0_7">17</span>
                                    <span class="g-line-height-0_7">Jan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- End Event Listing -->
            </div>

            <div class="w-100"></div>

            <div class="col-lg-6 g-mb-30">
                <!-- Event Listing -->
                <article class="u-shadow-v39">
                    <div class="row">
                        <div class="col-4">
                            <div class="g-min-height-170 g-bg-img-hero"
                                style="background-image: url({{ URL::asset('build/assets/img-temp/200x200/img7.jpg') }});">
                            </div>
                        </div>

                        <div class="col-8 g-min-height-170 g-flex-centered">
                            <div class="media align-items-center g-py-40">
                                <div class="d-flex col-8">
                                    <h3 class="g-line-height-1 mb-0"><a
                                            class="u-link-v5 g-color-main g-color-primary--hover g-font-size-18"
                                            href="#">Outside the Square: why so sad?</a></h3>
                                </div>
                                <div class="media-body col-4">
                                    <span
                                        class="g-color-primary g-font-weight-500 g-font-size-40 g-line-height-0_7">30</span>
                                    <span class="g-line-height-0_7">Jan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- End Event Listing -->
            </div>

            <div class="col-lg-6 g-mb-30">
                <!-- Event Listing -->
                <article class="u-shadow-v39">
                    <div class="row">
                        <div class="col-4">
                            <div class="g-min-height-170 g-bg-img-hero"
                                style="background-image: url({{ URL::asset('build/assets/img-temp/200x200/img8.jpg') }});">
                            </div>
                        </div>

                        <div class="col-8 g-min-height-170 g-flex-centered">
                            <div class="media align-items-center g-py-40">
                                <div class="d-flex col-8">
                                    <h3 class="g-line-height-1 mb-0"><a
                                            class="u-link-v5 g-color-main g-color-primary--hover g-font-size-18"
                                            href="#">Sydney Ideas - Luther and Dreams</a></h3>
                                </div>
                                <div class="media-body col-4">
                                    <span
                                        class="g-color-primary g-font-weight-500 g-font-size-40 g-line-height-0_7">24</span>
                                    <span class="g-line-height-0_7">Feb</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <!-- End Event Listing -->
            </div>
        </div>
    </div>
    <!-- End University Events -->

    <!-- Call to Action -->
    @include('skaonewelcome.call-to-acction')
    <!-- End Call to Action -->
@endsection
@section('script')
    <!-- JS Implementing Plugins -->
    <script src="{{ URL::asset('build/assets/vendor/hs-megamenu/src/hs.megamenu.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <script src="{{ URL::asset('build/assets/vendor/chosen/chosen.jquery.js') }}"></script>

    <!-- JS Unify -->
    <script src="{{ URL::asset('build/assets/js/hs.core.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.header.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.dropdown.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.datepicker.js') }}"></script>
    <script src="{{ URL::asset('build/assets/js/components/hs.select.js') }}"></script>
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

            // initialization of forms
            $.HSCore.components.HSDatepicker.init('#datepickerInline');

            // initialization of custom select
            $.HSCore.components.HSSelect.init('.js-custom-select');

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
        });
    </script>
@endsection
