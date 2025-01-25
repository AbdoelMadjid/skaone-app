@extends('layouts.skaonewelcome.welcome-master')
@section('title')
    Program
@endsection
@section('css')
    <link rel="stylesheet" href="{{ URL::asset('build/assets/vendor/chosen/chosen.css') }}">
@endsection
@section('content')
    <!-- Programs Filters -->
    <div class="g-bg-img-hero" style="background-image: url(assets/include/svg/svg-bg1.svg);">
        <div class="container g-pt-100 g-pb-70">
            <!-- Heading -->
            <div class="g-max-width-645 text-center mx-auto g-mb-60">
                <span class="d-block g-font-weight-500 text-uppercase mb-4">Full list of Programs</span>
                <h2 class="h1 mb-0">Browse all of Unify’s Courses and Course Sections</h2>
            </div>
            <!-- Heading -->

            <!-- Programs Filter -->
            <div class="row justify-content-center align-items-center g-mb-30">
                <div class="col-sm-6 col-md-3">
                    <!-- Checkbox -->
                    <ul
                        class="list-inline w-100 u-shadow-v32 g-bg-white text-center g-rounded-30 g-px-10 g-py-13 mr-4 mb-0">
                        <li class="list-inline-item g-mx-10">
                            <label class="form-check-inline u-check g-pl-30 ml-0 g-mr-15 mb-0">
                                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroup1_1" type="radio"
                                    checked="">
                                <div class="u-check-icon-font g-absolute-centered--y g-left-0">
                                    <i class="fa" data-check-icon="" data-uncheck-icon=""></i>
                                </div>
                                A-Z
                            </label>
                        </li>
                        <li class="list-inline-item g-mx-10">
                            <label class="form-check-inline u-check g-pl-30 ml-0 mb-0">
                                <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radGroup1_1" type="radio">
                                <div class="u-check-icon-font g-absolute-centered--y g-left-0">
                                    <i class="fa" data-check-icon="" data-uncheck-icon=""></i>
                                </div>
                                Z-A
                            </label>
                        </li>
                    </ul>
                    <!-- End Checkbox -->
                </div>

                <div class="col-sm-6 col-md-2">
                    <!-- Campus -->
                    <select
                        class="js-custom-select w-100 u-select-v1 u-shadow-v32 g-brd-none g-color-main g-color-primary--hover g-bg-white text-left g-rounded-30 g-pl-25 g-py-12"
                        data-placeholder="Campus" data-open-icon="fa fa-angle-down" data-close-icon="fa fa-angle-up">
                        <option></option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="OR">Orlando</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="TO">Toronto</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="VA">Vancouver</option>
                    </select>
                    <!-- End Campus -->
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-md-3 g-mb-30">
                    <!-- Intake -->
                    <select
                        class="js-custom-select w-100 u-select-v1 u-shadow-v32 g-brd-none g-color-main g-color-primary--hover g-bg-white text-left g-rounded-30 g-pl-25 g-py-12"
                        data-placeholder="Intake" data-open-icon="fa fa-angle-down" data-close-icon="fa fa-angle-up">
                        <option></option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="SP">Spring 2018</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="FA">Fall 2018</option>
                    </select>
                    <!-- End Intake -->
                </div>

                <div class="col-sm-6 col-md-3 g-mb-30">
                    <!-- Attendance Type -->
                    <select
                        class="js-custom-select w-100 u-select-v1 u-shadow-v32 g-brd-none g-color-main g-color-primary--hover g-bg-white text-left g-rounded-30 g-pl-25 g-py-12"
                        data-placeholder="Attendance Type" data-open-icon="fa fa-angle-down"
                        data-close-icon="fa fa-angle-up">
                        <option></option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="FT">Full-Time</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="PT">Part-Time</option>
                    </select>
                    <!-- End Attendance Type -->
                </div>

                <div class="col-sm-6 col-md-3 g-mb-30">
                    <!-- Level of Study -->
                    <select
                        class="js-custom-select w-100 u-select-v1 u-shadow-v32 g-brd-none g-color-main g-color-primary--hover g-bg-white text-left g-rounded-30 g-pl-25 g-py-12"
                        data-placeholder="Level of Study" data-open-icon="fa fa-angle-down"
                        data-close-icon="fa fa-angle-up">
                        <option></option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="UG">Undergraduate</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="GR">Graduate</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="PHD">PHD</option>
                    </select>
                    <!-- End Level of Study -->
                </div>

                <div class="col-sm-6 col-md-3 g-mb-30">
                    <!-- Area of Study -->
                    <select
                        class="js-custom-select w-100 u-select-v1 u-shadow-v32 g-brd-none g-color-main g-color-primary--hover g-bg-white text-left g-rounded-30 g-pl-25 g-py-12"
                        data-placeholder="Area of Study" data-open-icon="fa fa-angle-down" data-close-icon="fa fa-angle-up">
                        <option></option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="PHD-P">Doctor of Philosophy (PhD)</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MAHSR">Master of Applied Health Services Research</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MA">Master of Arts</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MASRS">Master of Arts in Sport and Recreation Studies</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MA/PHD">Master of Arts/Doctor of Philosophy</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MBA">Master of Business Administration (Fredericton)</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MBASJ">Master of Business Administration (Saint John)</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MCS">Master of Computer Science</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MCSC">Master of Computer Science by Coursework</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MED">Master of Education</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="ME">Master of Engineering</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MEM">Master of Environmental Management</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MFE">Master of Forest Engineering</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MF">Master of Forestry</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MIDST">Master of Interdisciplinary Studies</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MN">Master of Nursing</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MQIM">Master of Quantitative Investment Management.</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MSC">Master of Science</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MSE">Master of Science in Engineering</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MSESS">Master of Science in Exercise and Sport Science</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MSFE">Master of Science in Forest Engineering</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="MSF">Master of Science in Forestry</option>
                        <option class="g-brd-secondary-light-v2 g-color-main g-color-white--active g-bg-primary--active"
                            value="D-MCG">Postgraduate Diploma in Mapping, Charting and Geodesy</option>
                    </select>
                    <!-- End Area of Study -->
                </div>
            </div>
            <!-- End Programs Filter -->
        </div>
    </div>
    <!-- End Programs Filters -->

    <!-- Programs -->
    <div class="container g-pt-70">
        <div class="row">
            <div class="col-lg-9 g-mb-70">
                <div class="mb-5">
                    <h2>Program List and Descriptions</h2>
                    <p>Explore your program details, including entry points, entrance requirements and application
                        deadlines. In addition to academic unit requirements, you must also meet the general admission
                        requirements for the Faculty of Graduate Studies to be admitted into graduate studies at Unify. See
                        the Graduate Calendar for more information about our academic programs.</p>
                </div>

                <div class="g-px-15 mb-5">
                    <!-- Heading -->
                    <div class="row g-bg-main g-color-white g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <div class="d-flex align-items-center">
                                <h2 class="h5 mb-0"><a class="u-link-v5 g-color-white-opacity-0_8 g-color-white--hover"
                                        href="#">
                                        <i class="g-font-size-20 material-icons">swap_vert</i>
                                        Program
                                    </a></h2>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center">
                                <h3 class="h5 mb-0"><a class="u-link-v5 g-color-white-opacity-0_8 g-color-white--hover"
                                        href="#">
                                        <i class="g-font-size-20 material-icons">swap_vert</i>
                                        Department
                                    </a></h3>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="d-flex align-items-center">
                                <h3 class="h5 mb-0"><a class="u-link-v5 g-color-white-opacity-0_8 g-color-white--hover"
                                        href="#">
                                        <i class="g-font-size-20 material-icons">swap_vert</i>
                                        Type
                                    </a></h3>
                            </div>
                        </div>
                    </div>
                    <!-- End Heading -->

                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Anthropology</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Anthropology</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Anthropology</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Anthropology</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Phd</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Biochemistry and Microbiology</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Biochemistry and Microbiology</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Biochemistry and Microbiology</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Biochemistry and Microbiology</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Phd</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Biology</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Biology</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Biology</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Biology</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Phd</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Business Administration</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">School of Business</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Business Administration and Laws</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">School of Business</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Global Business</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">School of Business</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Business Administration</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">School of Business</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Phd</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Chemistry</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Chemistry</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Chemistry</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Chemistry</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Phd</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Child and Youth Care</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">School of Child and Youth Care</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Child and Youth Care</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">School of Child and Youth Care</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Phd</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Computer Science</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Computer Science</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Cultural, Social and Political Thought Program</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of History</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Cultural, Social and Political Thought Program</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Sociology</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Cultural, Social and Political Thought Program</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Sociology</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Phd</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Curriculum &amp; Instruction MA/MEd</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Curriculum and Instruction</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Curriculum &amp; Instruction</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">School of Earth and Ocean Sciences</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Phd</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Earth and Ocean Sciences</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">School of Earth and Ocean Sciences</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Earth and Ocean Sciences</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Economics</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Phd</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Economics</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Economics</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Economics</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Electrical and Computer Engineering</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Phd</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Electrical and Computer Engineering</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Electrical and Computer Engineering</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Electrical and Computer Engineering</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of English</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Phd</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>English</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of English</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>English</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">School of Business</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Phd</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Entrepreneurship</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">School of Business</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Certificate</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Entrepreneurship</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">School of Environmental Studies</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Diploma</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Environmental Studies</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">School of Environmental Studies</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Environmental Studies</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Exercise Science, Physical and Health Education</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Phd</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Exercise Science, Physical and Health Education</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Exercise Science, Physical and Health Education</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Kinesiology</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Exercise Science, Physical and Health Education</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Kinesiology</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of French</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Phd</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>French</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Geography</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Geography</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Geography</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Geography</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of Hispanic and Italian Studies</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Phd</span>
                        </div>
                    </div>
                    <div class="row g-brd-around g-brd-top-none g-brd-secondary-light-v2 g-font-size-16 g-py-15">
                        <div class="col-sm-4">
                            <span>Hispanic and Italian Studies</span>
                        </div>
                        <div class="col-sm-6">
                            <a href="#">Department of History</a>
                        </div>
                        <div class="col-sm-2">
                            <span>Ms</span>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <nav aria-label="Page Navigation">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <a class="active u-pagination-v1__item g-width-30 g-height-30 g-brd-secondary-light-v2 g-brd-primary--active g-color-white g-bg-primary--active g-font-size-12 rounded g-pa-5"
                                href="#!">1</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="u-pagination-v1__item g-width-30 g-height-30 g-color-text-light-v1 g-color-primary--hover g-font-size-12 rounded g-pa-5"
                                href="#!">2</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="u-pagination-v1__item g-width-30 g-height-30 g-color-text-light-v1 g-color-primary--hover g-font-size-12 rounded g-pa-5"
                                href="#!">3</a>
                        </li>
                        <li class="list-inline-item">
                            <a class="u-pagination-v1__item g-width-30 g-height-30 g-brd-secondary-light-v2 g-brd-primary--hover g-color-text-light-v1 g-color-primary--hover g-font-size-12 rounded g-pa-5 g-ml-15"
                                href="#!" aria-label="Next">
                                <span aria-hidden="true">
                                    <i class="fa fa-angle-right"></i>
                                </span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                        <li class="list-inline-item float-right">
                            <span class="u-pagination-v1__item-info g-color-gray-dark-v4 g-font-size-12 g-pa-5">Page 1 of
                                3</span>
                        </li>
                    </ul>
                </nav>
                <!-- End Pagination -->
            </div>

            <div class="col-lg-3 g-mb-70">
                <h3 class="h4">Related Links</h3>

                <div id="stickyblock-start">
                    <div class="js-sticky-block g-sticky-block--lg pt-4" data-responsive="true"
                        data-start-point="#stickyblock-start" data-end-point="#stickyblock-end">
                        <!-- Sidebar Links -->
                        <ul class="list-unstyled g-mb-50">
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

                        <!-- Twitter Feed -->
                        <h3 class="h4 mb-4">Twitter Feeds</h3>
                        <ul class="list-unstyled mb-0">
                            <li class="g-brd-bottom g-brd-secondary-light-v2 g-pb-20">
                                <h4 class="h6">RT <a class="g-font-weight-600" href="#">@UofA_Arts:</a> DON'T
                                    MISS</h4>
                                <p class="g-color-text-light-v1 g-font-size-13 mb-0">Political Science's “What Comes Next?
                                    The Political Afterlives of the <a class="g-font-weight-500" href="#">#TRC</a>,
                                    WED/OCT 4/4:30-6 pm… <a class="g-font-weight-500"
                                        href="#">twitter.com/i/web/status/9…</a></p>
                            </li>
                            <li class="g-pt-20">
                                <h4 class="h6">RT <a class="g-font-weight-500" href="#">@UofA_Arts:</a> DON'T
                                    MISS</h4>
                                <p class="g-color-text-light-v1 g-font-size-13 mb-0">Political Science's “What Comes Next?
                                    The Political Afterlives of the <a class="g-font-weight-500" href="#">#TRC</a>,
                                    WED/OCT 4/4:30-6 pm…</p>
                            </li>
                        </ul>
                        <!-- End Twitter Feed -->
                    </div>
                </div>
            </div>
        </div>
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
