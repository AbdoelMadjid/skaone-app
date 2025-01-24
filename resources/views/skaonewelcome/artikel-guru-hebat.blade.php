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

    <!-- Course Sections -->
    <div id="sub-navigation" class="g-pos-rel">
        <div class="js-sticky-block container u-secondary-navigation u-shadow-v19 g-bg-white g-line-height-1_3 g-py-20 g-pos-abs g-top-0 g-left-0 g-right-0"
            data-start-point="#sub-navigation" data-end-point="999999" data-type="responsive">
            <ul id="js-scroll-nav" class="nav flex-column flex-sm-row justify-content-sm-center text-center text-uppercase">
                <li class="nav-item g-brd-right--sm g-brd-gray-light-v4 g-color-primary--active">
                    <a href="#carouseDetails" class="nav-link g-font-weight-500 g-font-size-default g-px-20">Course
                        Details</a>
                </li>
                <li class="nav-item g-brd-right--sm g-brd-gray-light-v4 g-color-primary--active">
                    <a href="#careerPaths" class="nav-link g-font-weight-500 g-font-size-default g-px-20">Career Paths</a>
                </li>
                <li class="nav-item g-brd-right--sm g-brd-gray-light-v4 g-color-primary--active">
                    <a href="#yourFee" class="nav-link g-font-weight-500 g-font-size-default g-px-20">Your Fee</a>
                </li>
                <li class="nav-item g-brd-right--sm g-brd-gray-light-v4 g-color-primary--active">
                    <a href="#similarCourses" class="nav-link g-font-weight-500 g-font-size-default g-px-20">Similar
                        Courses</a>
                </li>
                <li class="nav-item g-color-primary--active">
                    <a href="#entryFeesAndApply" class="nav-link g-font-weight-500 g-font-size-default g-px-20">Entry Fees
                        &amp; How to Apply</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- End Course Sections -->

    <!-- Course Details -->
    <div class="g-bg-secondary-gradient-v2">
        <div class="container g-pt-150 g-pb-170">
            <div class="g-max-width-960 mx-auto">
                <!-- Course Details -->
                <div id="carouseDetails" class="row g-pb-80">
                    <div class="col-lg-1 g-mb-20 g-mb-0--lg">
                        <span class="u-icon-v1 u-icon-size--xl g-color-main g-bg-secondary g-font-size-30 rounded-circle">
                            <i class="icon-education-092 u-line-icon-pro"></i>
                        </span>
                    </div>

                    <div class="col-lg-11">
                        <div class="g-pl-15--lg">
                            <h3>Course Details</h3>
                            <p>Faculty/University School: Faculty of Engineering and Information Technologies</p>

                            <div class="row">
                                <ul class="col-md-4 g-color-text-light-v1 g-font-size-15 g-pl-30 mb-0">
                                    <li class="py-1">Credit points required: 240</li>
                                    <li class="py-1">USyd code: BPACMCOM1000</li>
                                    <li class="py-1">Study mode: On-campus day</li>
                                </ul>

                                <ul class="col-md-4 g-color-text-light-v1 g-font-size-15 g-pl-30 mb-0">
                                    <li class="py-1">Location: Camperdown campus</li>
                                    <li class="py-1">Course abbreviation: N/A</li>
                                    <li class="py-1">UAC code: 513505</li>
                                </ul>

                                <ul class="col-md-4 g-color-text-light-v1 g-font-size-15 g-pl-30 mb-0">
                                    <li class="py-1">Study type: UGCW</li>
                                    <li class="py-1"><a class="g-color-primary" href="#">Graduate Attributes</a>
                                    </li>
                                </ul>
                            </div>

                            <ul class="g-color-text-light-v1 g-font-size-15 g-pl-15 mb-0">
                                <li class="py-1">Duration full time: 5 years full time for Domestic and International
                                    students</li>
                                <li class="py-1">Duration part time: Part time study available for eligible applicants
                                    (excluding international student visa holders)</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Course Details -->

                <hr class="g-brd-secondary-light-v2 my-0">

                <!-- Career Paths -->
                <div id="careerPaths" class="row g-py-80">
                    <div class="col-lg-1 g-mb-20 g-mb-0--lg">
                        <span class="u-icon-v1 u-icon-size--xl g-color-main g-bg-secondary g-font-size-30 rounded-circle">
                            <i class="icon-education-194 u-line-icon-pro"></i>
                        </span>
                    </div>

                    <div class="col-lg-11">
                        <div class="g-pl-15--lg">
                            <h3>Career Paths</h3>
                            <p>Government departments at all levels recruit outstanding graduates. Employers value the
                                maturity, interpersonal skills, written and oral communication and teamwork skills of Sydney
                                graduates.</p>
                            <p>Our advanced computing and commerce graduates can be found in a broad range of careers and
                                roles including:</p>

                            <div class="row">
                                <ul class="col-md-4 g-color-text-light-v1 g-font-size-15 g-pl-30 mb-0">
                                    <li class="py-1">Accounting and finance</li>
                                    <li class="py-1">Business systems analyst</li>
                                    <li class="py-1">Data analyst</li>
                                    <li class="py-1">Computer programmer</li>
                                    <li class="py-1">Systems administrator</li>
                                    <li class="py-1">Economist</li>
                                    <li class="py-1">Financial specialist</li>
                                    <li class="py-1">Information services management</li>
                                </ul>

                                <ul class="col-md-4 g-color-text-light-v1 g-font-size-15 g-pl-30 mb-0">
                                    <li class="py-1">Consulting</li>
                                    <li class="py-1">Project manager</li>
                                    <li class="py-1">Software engineer</li>
                                    <li class="py-1">Web development and management</li>
                                    <li class="py-1">Research and development</li>
                                    <li class="py-1">Information and communication technology</li>
                                    <li class="py-1">Software architecture</li>
                                </ul>

                                <ul class="col-md-4 g-color-text-light-v1 g-font-size-15 g-pl-30 mb-0">
                                    <li class="py-1">Start-ups</li>
                                    <li class="py-1">Industrial relations advisers</li>
                                    <li class="py-1">Human resources</li>
                                    <li class="py-1">Market research</li>
                                    <li class="py-1">Commercial risk analyst</li>
                                    <li class="py-1">Policy development</li>
                                    <li class="py-1">Business operations managers</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Career Paths -->

                <hr class="g-brd-secondary-light-v2 my-0">

                <!-- Your Fee -->
                <div id="yourFee" class="row g-py-80">
                    <div class="col-lg-1 g-mb-20 g-mb-0--lg">
                        <span class="u-icon-v1 u-icon-size--xl g-color-main g-bg-secondary g-font-size-30 rounded-circle">
                            <i class="icon-finance-210 u-line-icon-pro"></i>
                        </span>
                    </div>

                    <div class="col-lg-11">
                        <div class="g-pl-15--lg">
                            <h3>Your Fee</h3>
                            <p><span class="g-font-weight-500">Student Contribution Amount (SCA) for year 1: $10,951</span>
                                (indicative only)</p>
                            <p>For Commonwealth Supported students commencing this course, the indicative SCA for Year 1 of
                                full-time study of 48 credit points (1.0 EFTSL).</p>
                            <p>The SCA that you will pay depends on the calendar year in which you undertake your study in
                                the course, and the specific units of study in which you enrol.</p>
                            <p class="g-font-weight-500">This amount is subject to annual increase each year of your study
                                (subject to a maximum amount determined by the Australian Government), effective at the
                                start of each calendar year. Please read carefully the 'Important Fee Information' section
                                set out below.</p>
                        </div>
                    </div>
                </div>
                <!-- End Your Fee -->

                <hr class="g-brd-secondary-light-v2 my-0">

                <!-- Similar Courses -->
                <div id="similarCourses" class="row g-py-80">
                    <div class="col-lg-1 g-mb-20 g-mb-0--lg">
                        <span class="u-icon-v1 u-icon-size--xl g-color-main g-bg-secondary g-font-size-30 rounded-circle">
                            <i class="icon-education-056 u-line-icon-pro"></i>
                        </span>
                    </div>

                    <div class="col-lg-11">
                        <div class="g-pl-15--lg">
                            <div class="mb-4">
                                <h3>Similar Courses</h3>
                                <p>Business, Engineering and Information Technology</p>
                            </div>

                            <div class="card-group d-block d-md-flex g-mx-minus-15">
                                <div class="card g-brd-none g-mx-15 g-mb-30">
                                    <a class="card-body d-block u-link-v5 u-shadow-v32 g-color-main g-color-primary--hover g-bg-white g-pa-30"
                                        href="#">Graduate Certificate in Logistics and Supply Chain Management</a>
                                </div>

                                <div class="card g-brd-none g-mx-15 g-mb-30">
                                    <a class="card-body d-block u-link-v5 u-shadow-v32 g-color-main g-color-primary--hover g-bg-white g-pa-30"
                                        href="#">Master of Business Administration (Leadership and Enterprise)</a>
                                </div>

                                <div class="card g-brd-none g-mx-15 g-mb-30">
                                    <a class="card-body d-block u-link-v5 u-shadow-v32 g-color-main g-color-primary--hover g-bg-white g-pa-30"
                                        href="#">Graduate Diploma in Human Resource Management and Industrial
                                        Relations</a>
                                </div>
                            </div>

                            <a class="btn u-shadow-v33 g-color-white g-bg-primary g-bg-main--hover g-font-size-16 text-left g-rounded-30 g-px-30 g-py-10"
                                href="#">
                                Apply Now
                                <i class="g-font-size-15 g-pos-rel g-top-3 ml-auto material-icons">arrow_forward</i>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- End Similar Courses -->

                <hr class="g-brd-secondary-light-v2 my-0">
            </div>

            <!-- Icon Blocks -->
            <div id="entryFeesAndApply" class="row g-pt-80">
                <div class="col-lg-6 g-mb-30">
                    <!-- Media -->
                    <div class="media u-block-hover u-shadow-v34 g-bg-white rounded g-overflow-hidden g-px-40 g-py-50">
                        <div class="d-flex g-mr-30">
                            <span
                                class="u-icon-v1 u-icon-size--xl g-color-main g-color-primary--hover g-bg-secondary rounded-circle">
                                <i class="g-font-size-45 material-icons">info</i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3 class="h4 g-color-main g-color-primary--hover g-font-primary">How to apply <i
                                    class="g-font-size-16 mr-2 material-icons">arrow_forward</i></h3>
                            <p class="mb-0">Refer to the <a href="#">UAC website</a> Scholarship deadlines apply -
                                visit the <a href="#">scholarships webpage</a> for details.</p>
                        </div>
                    </div>
                    <!-- End Media -->
                </div>

                <div class="col-lg-6 g-mb-30">
                    <!-- Media -->
                    <div class="media u-block-hover u-shadow-v34 g-bg-white rounded g-overflow-hidden g-px-40 g-py-50">
                        <div class="d-flex g-mr-30">
                            <span
                                class="u-icon-v1 u-icon-size--xl g-color-main g-color-primary--hover g-bg-secondary rounded-circle">
                                <i class="g-font-size-45 material-icons">file_download</i>
                            </span>
                        </div>
                        <div class="media-body">
                            <h3 class="h4 g-color-main g-color-primary--hover g-font-primary">Download guide <i
                                    class="g-font-size-16 mr-2 material-icons">arrow_forward</i></h3>
                            <p class="mb-0">2018 Engineering and Information Technologies Undergraduate Guide (15MB/PDF)
                            </p>
                        </div>
                    </div>
                    <!-- End Media -->
                </div>
            </div>
            <!-- End Icon Blocks -->
        </div>
    </div>
    <!-- End Course Details -->

    <!-- Entry Fees & How to Apply -->
    <div class="container g-mt-minus-120">
        <div class="row align-items-lg-center no-gutters">
            <div class="col-lg-7 g-mb-50 g-mb-20--lg">
                <!-- Entry Fees & How to Apply -->
                <div class="u-shadow-v36">
                    <div class="g-bg-main">
                        <header class="g-brd-bottom g-brd-white-opacity-0_1 text-center g-pa-30">
                            <h3 class="h4 g-color-white g-font-primary g-font-weight-400 mb-0">Entry Fees and How to Apply
                            </h3>
                        </header>

                        <div class="g-pa-40">
                            <p class="g-color-white-opacity-0_6 text-center g-mb-40">Depends on your qualification,
                                citizenship status</p>

                            <!-- Select Inputs -->
                            <div class="row">
                                <div class="col-6 g-mb-30">
                                    <!-- Start In -->
                                    <label class="g-color-white-opacity-0_5 g-font-size-15 mb-3">I would like to start
                                        study in</label>
                                    <select
                                        class="js-custom-select w-100 u-select-v2 g-brd-white-opacity-0_1 g-color-white-opacity-0_7 g-color-primary--hover g-bg-transparent text-left rounded g-pl-20 g-pr-40 g-py-10"
                                        data-placeholder="2018" data-open-icon="fa fa-angle-down"
                                        data-close-icon="fa fa-angle-up">
                                        <option
                                            class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                            value="">2018 Spring</option>
                                        <option
                                            class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                            value="2018">2018 Fall</option>
                                        <option
                                            class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                            value="2019">2019 Spring</option>
                                        <option
                                            class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                            value="2019">2019 Fall</option>
                                    </select>
                                    <!-- End Start In -->
                                </div>

                                <div class="col-6 g-mb-30">
                                    <!-- I am -->
                                    <label class="g-color-white-opacity-0_5 g-font-size-15 mb-3">I am</label>
                                    <select
                                        class="js-custom-select w-100 u-select-v2 g-brd-white-opacity-0_1 g-color-white-opacity-0_7 g-color-primary--hover g-bg-transparent text-left rounded g-pl-20 g-pr-40 g-py-10"
                                        data-placeholder="a Canadian citizen" data-open-icon="fa fa-angle-down"
                                        data-close-icon="fa fa-angle-up">
                                        <option
                                            class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                            value="">a Canadian citizen (including dual citizens)</option>
                                        <option
                                            class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                            value="international">an International student</option>
                                    </select>
                                    <!-- End I am -->
                                </div>
                            </div>

                            <h3 class="g-color-white-opacity-0_5 g-font-primary g-font-weight-400 g-font-size-15 mb-3">My
                                qualification is from</h3>

                            <div class="row g-mb-10">
                                <div class="col-6 g-mb-30">
                                    <!-- Qualification -->
                                    <select
                                        class="js-custom-select w-100 u-select-v2 g-brd-white-opacity-0_1 g-color-white-opacity-0_7 g-color-primary--hover g-bg-transparent text-left rounded g-pl-20 g-pr-40 g-py-10"
                                        data-placeholder="Canada" data-open-icon="fa fa-angle-down"
                                        data-close-icon="fa fa-angle-up">
                                        <option
                                            class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                            value="">Canada</option>
                                        <option
                                            class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                            value="australia">Australia</option>
                                        <option
                                            class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                            value="usa">USA</option>
                                        <option
                                            class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                            value="china">China</option>
                                        <option
                                            class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                            value="europe">Europe</option>
                                        <option
                                            class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                            value="japan">Japan</option>
                                        <option
                                            class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                            value="others">Other part of the world</option>
                                    </select>
                                    <!-- End Qualification -->
                                </div>

                                <div class="col-6 g-mb-30">
                                    <!-- I am -->
                                    <select
                                        class="js-custom-select w-100 u-select-v2 g-brd-white-opacity-0_1 g-color-white-opacity-0_7 g-color-primary--hover g-bg-transparent text-left rounded g-pl-20 g-pr-40 g-py-10"
                                        data-placeholder="Domestic ATAR" data-open-icon="fa fa-angle-down"
                                        data-close-icon="fa fa-angle-up">
                                        <option
                                            class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                            value="">Domestic ATAR</option>
                                        <option
                                            class="g-brd-secondary-light-v2 g-color-text-light-v1 g-color-white--active g-bg-primary--active"
                                            value="domestic_ib_diploma_score">Domestic IB Diploma score</option>
                                    </select>
                                    <!-- End I am -->
                                </div>
                            </div>
                            <!-- End Select Inputs -->

                            <p class="g-color-white-opacity-0_6 text-center mb-0">The details on this page based on your
                                selections are a guide only, and are subject to change.</p>
                        </div>
                    </div>

                    <footer>
                        <a class="btn btn-block g-color-blue g-color-white--hover g-bg-main-light-v1 g-font-size-16 text-center rounded-0 g-pa-20"
                            href="#">
                            Contact Us for More Information
                            <i class="g-font-size-15 g-pos-rel g-top-4 ml-2 material-icons">arrow_forward</i>
                        </a>
                    </footer>
                </div>
                <!-- End Entry Fees & How to Apply -->
            </div>

            <div class="col-lg-5 g-mb-50 g-mb-20--lg">
                <!-- Facts & Figures -->
                <div class="u-shadow-v36">
                    <header class="g-brd-bottom g-brd-secondary-light-v2 g-bg-white text-center g-pa-30">
                        <h3 class="h4 g-font-primary g-font-weight-400 mb-0">Facts and Figures</h3>
                    </header>

                    <div class="g-bg-white g-px-50 g-py-30">
                        <div class="text-center g-mb-30">
                            <span class="g-color-primary g-font-size-50 g-line-height-0-7">75.4<span
                                    class="g-color-main g-font-weight-700 g-font-size-30">%</span></span>
                            <p class="g-color-text-light-v1">acceptance rate per semester</p>
                        </div>

                        <!-- Facts & Figures List -->
                        <ul class="list-unstyled g-font-size-16 mb-0">
                            <li class="media g-py-10">
                                <div class="d-flex mr-3">
                                    <span
                                        class="u-icon-v3 u-icon-size--xs g-color-primary g-bg-primary-opacity-0_1 rounded-circle">
                                        <i class="g-font-size-default material-icons">trending_up</i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    Designed for tomorrow's computing careers
                                </div>
                            </li>

                            <li class="media g-py-10">
                                <div class="d-flex mr-3">
                                    <span
                                        class="u-icon-v3 u-icon-size--xs g-color-primary g-bg-primary-opacity-0_1 rounded-circle">
                                        <i class="g-font-size-default material-icons">arrow_downward</i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    Combine your passions
                                </div>
                            </li>

                            <li class="media g-py-10">
                                <div class="d-flex mr-3">
                                    <span
                                        class="u-icon-v3 u-icon-size--xs g-color-primary g-bg-primary-opacity-0_1 rounded-circle">
                                        <i class="g-font-size-default material-icons">laptop_chromebook</i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    Latest technology innovation
                                </div>
                            </li>
                        </ul>
                        <!-- End Facts & Figures List -->
                    </div>

                    <footer>
                        <a class="btn btn-block g-color-main g-color-primary--hover g-bg-secondary g-font-size-16 text-center rounded-0 g-pa-20"
                            href="#">
                            Start your Application
                            <i class="g-font-size-15 g-pos-rel g-top-4 ml-2 material-icons">arrow_forward</i>
                        </a>
                    </footer>
                </div>
                <!-- End Facts & Figures -->
            </div>
        </div>
    </div>
    <!-- End Entry Fees & How to Apply -->

    <!-- Call to Action -->
    <div class="g-pos-rel">
        <div class="container text-center g-pt-100 g-pb-50">
            <!-- Heading -->
            <div class="g-max-width-645 mx-auto g-mb-40">
                <h2 class="h1 mb-3">Join Unify University</h2>
                <p>Our strategy is simple: to create a place where the best researchers and most promising students can
                    achieve their full potential.</p>
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
