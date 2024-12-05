@extends('layouts.master')
@section('title')
    @lang('translation.timeline')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.pages')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div>
                <h5>Center Timeline</h5>
                <div class="timeline">
                    <div class="timeline-item left">
                        <i class="icon ri-stack-line"></i>
                        <div class="date">15 Dec 2021</div>
                        <div class="content">
                            <div class="d-flex">
                                <div class="flex-shrink-0">
                                    <img src="{{ URL::asset('build/images/users/avatar-5.jpg') }}" alt=""
                                        class="avatar-sm rounded">
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h5 class="fs-15">@Erica245 <small class="text-muted fs-13 fw-normal">- 10 min
                                            Ago</small></h5>
                                    <p class="text-muted mb-2">Wish someone a sincere ‘good luck in your new job’ with these
                                        sweet messages. Make sure you pick out a good luck new job card to go with the
                                        words, and pop a beautiful bunch of flowers from our gift range in your basket, to
                                        make them feel super special.</p>
                                    <div class="hstack gap-2">
                                        <a class="btn btn-sm btn-light"><span class="me-1">&#128293;</span> 19</a>
                                        <a class="btn btn-sm btn-light"><span class="me-1">&#129321;</span> 22</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item right">
                        <i class="icon ri-vip-diamond-line"></i>
                        <div class="date">22 Oct 2021</div>
                        <div class="content">
                            <h5>Adding a new event with attachments</h5>
                            <p class="text-muted">Too much or too little spacing, as in the example below, can make things
                                unpleasant for the reader.</p>
                            <div class="row g-2">
                                <div class="col-sm-6">
                                    <div class="d-flex border border-dashed p-2 rounded position-relative">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <div class="avatar-title bg-danger-subtle text-danger fs-15 rounded">
                                                <i class="ri-image-2-line"></i>
                                            </div>
                                        </div>
                                        <div class="flex-shrink-0">

                                        </div>
                                        <div class="flex-grow-1 overflow-hidden ms-2">
                                            <h6 class="text-truncate mb-0"><a href="javascript:void(0);"
                                                    class="stretched-link">Business Template - UI/UX design</a></h6>
                                            <small>685 KB</small>
                                        </div>
                                    </div>
                                </div><!--end col-->
                                <div class="col-sm-6">
                                    <div class="d-flex border border-dashed p-2 rounded position-relative">
                                        <div class="flex-shrink-0 avatar-xs">
                                            <div class="avatar-title bg-info-subtle text-info fs-15 rounded">
                                                <i class="ri-file-zip-line"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-2 overflow-hidden">
                                            <h6 class="mb-0 text-truncate"><a href="javascript:void(0);"
                                                    class="stretched-link">Bank Management System - PSD</a></h6>
                                            <small>8.78 MB</small>
                                        </div>
                                    </div>
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div>
                    <div class="timeline-item left">
                        <i class="icon ri-gift-line"></i>
                        <div class="date">10 Jul 2021</div>
                        <div class="content">
                            <h5>Create new project buildng product</h5>
                            <p class="text-muted">Every team project can have a velzon. Use the velzon to share information
                                with your team to understand and contribute to your project.</p>
                            <div class="avatar-group mb-2">
                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-placement="top" title=""
                                    data-bs-original-title="Christi">
                                    <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}" alt=""
                                        class="rounded-circle avatar-xs">
                                </a>
                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-placement="top" title=""
                                    data-bs-original-title="Frank Hook">
                                    <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}" alt=""
                                        class="rounded-circle avatar-xs">
                                </a>
                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-placement="top" title=""
                                    data-bs-original-title=" Ruby">
                                    <div class="avatar-xs">
                                        <div class="avatar-title rounded-circle bg-light text-primary">
                                            R
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript: void(0);" class="avatar-group-item" data-bs-toggle="tooltip"
                                    data-bs-trigger="hover" data-bs-placement="top" title=""
                                    data-bs-original-title="more">
                                    <div class="avatar-xs">
                                        <div class="avatar-title rounded-circle">
                                            2+
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item right">
                        <i class="icon ri-shield-star-line"></i>
                        <div class="date">18 May 2021</div>
                        <div class="content">
                            <h5>Donald Palmer <small class="text-muted fs-13 fw-normal">- Has changed 2 attributes</small>
                            </h5>
                            <p class="text-muted fst-italic mb-2">" This is an awesome admin dashboard template. It is
                                extremely well structured and uses state of the art components (e.g. one of the only
                                templates using boostrap 5.1.3 so far). I integrated it into a Rails 6 project. Needs manual
                                integration work of course but the template structure made it easy. "</p>
                            <div class="hstack gap-2">
                                <a class="btn btn-sm bg-light"><span class="me-1">&#128151;</span> 35</a>
                                <a class="btn btn-sm btn-light"><span class="me-1">&#128077;</span> 10</a>
                                <a class="btn btn-sm btn-light"><span class="me-1">&#128591;</span> 10</a>
                            </div>
                        </div>
                    </div>
                    <div class="timeline-item left">
                        <i class="icon ri-user-smile-line"></i>
                        <div class="date">10 Feb 2021</div>
                        <div class="content">
                            <h5>Velzon admin dashboard templates layout upload</h5>
                            <p class="text-muted">Powerful, clean & modern responsive bootstrap 5 admin template. The
                                maximum file size for uploads in this demo :</p>
                            <div class="row border border-dashed rounded gx-2 p-2">
                                <div class="col-3">
                                    <img src="{{ URL::asset('build/images/small/img-2.jpg') }}" alt=""
                                        class="img-fluid rounded">
                                </div><!--end col-->
                                <div class="col-3">
                                    <img src="{{ URL::asset('build/images/small/img-3.jpg') }}" alt=""
                                        class="img-fluid rounded">
                                </div><!--end col-->
                                <div class="col-3">
                                    <img src="{{ URL::asset('build/images/small/img-4.jpg') }}" alt=""
                                        class="img-fluid rounded">
                                </div><!--end col-->
                                <div class="col-3">
                                    <img src="{{ URL::asset('build/images/small/img-6.jpg') }}" alt=""
                                        class="img-fluid rounded">
                                </div><!--end col-->
                            </div><!--end row-->
                        </div>
                    </div>
                    <div class="timeline-item right">
                        <i class="icon ri-fire-line"></i>
                        <div class="date">01 Jan 2021</div>
                        <div class="content">
                            <h5>New ticket received <span
                                    class="badge bg-success-subtle text-success fs-10 align-middle ms-1">Completed</span>
                            </h5>
                            <p class="text-muted mb-2">
                                It is important for us that we receive email notifications when a ticket is created as our
                                IT staff are mobile and will not always be looking at the dashboard for new tickets.
                            </p>
                            <a href="javascript:void(0);" class="link-primary text-decoration-underline">Read More <i
                                    class="ri-arrow-right-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="row mt-4">
        <div class="col-lg-12">
            <div>
                <h5 class="mb-4">Left Timeline</h5>
                <div class="timeline-2">
                    <div class="timeline-year">
                        <p>12 Dec 2021</p>
                    </div>
                    <div class="timeline-continue">
                        <div class="row timeline-right">
                            <div class="col-12">
                                <p class="timeline-date">
                                    02:35AM to 04:30PM
                                </p>
                            </div>
                            <div class="col-12">
                                <div class="timeline-box">
                                    <div class="timeline-text">
                                        <div class="d-flex">
                                            <img src="{{ URL::asset('build/images/users/avatar-7.jpg') }}" alt=""
                                                class="avatar-sm rounded" />
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="mb-1">Frank hook joined with our company</h5>
                                                <p class="text-muted mb-0">It makes a statement, it’s impressive graphic
                                                    design. Increase or decrease the letter spacing depending on the
                                                    situation and try, try again until it looks right, and each letter has
                                                    the perfect spot of its own. </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row timeline-right">
                            <div class="col-12">
                                <p class="timeline-date">
                                    02:35AM to 04:30PM
                                </p>
                            </div>
                            <div class="col-12">
                                <div class="timeline-box">
                                    <div class="timeline-text">
                                        <h5>Trip planning</h5>
                                        <p class="text-muted">In the trip planner, keep only one or two activities in a day
                                            if the purpose of the trip is to relax and take it easy during the vacation :
                                        </p>
                                        <div class="row border border-dashed rounded gx-2 p-2">
                                            <div class="col-3">
                                                <a href="javascript:void(0);"><img
                                                        src="{{ URL::asset('build/images/small/img-7.jpg') }}"
                                                        alt="" class="img-fluid rounded"></a>
                                            </div><!--end col-->
                                            <div class="col-3">
                                                <a href="javascript:void(0);"><img
                                                        src="{{ URL::asset('build/images/small/img-3.jpg') }}"
                                                        alt="" class="img-fluid rounded"></a>
                                            </div><!--end col-->
                                            <div class="col-3">
                                                <a href="javascript:void(0);"><img
                                                        src="{{ URL::asset('build/images/small/img-10.jpg') }}"
                                                        alt="" class="img-fluid rounded"></a>
                                            </div><!--end col-->
                                            <div class="col-3">
                                                <a href="javascript:void(0);"><img
                                                        src="{{ URL::asset('build/images/small/img-9.jpg') }}"
                                                        alt="" class="img-fluid rounded"></a>
                                            </div><!--end col-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="timeline-year">
                                    <p>08 Dec 2021</p>
                                </div>
                            </div>
                        </div>

                        <div class="row timeline-right">
                            <div class="col-12">
                                <p class="timeline-date">
                                    02:35AM to 04:30PM
                                </p>
                            </div>
                            <div class="col-12">
                                <div class="timeline-box">
                                    <div class="timeline-text">
                                        <h5>Velzon - Project Discussion</h5>
                                        <p class="text-muted mb-0">The purpose of the discussion is to interpret and
                                            describe the significance of your findings in light of what was already known
                                            about the research problem being investigated, and to explain any new
                                            understanding or fresh insights about the problem after you've taken the
                                            findings into consideration.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row timeline-right">
                            <div class="col-12">
                                <p class="timeline-date">
                                    10:24AM to 11:15PM
                                </p>
                            </div>
                            <div class="col-12">
                                <div class="timeline-box">
                                    <div class="timeline-text">
                                        <h5>Client Meeting (Nancy Martino)</h5>
                                        <p class="text-muted mb-0">A client meeting, meaning, direct collaboration and
                                            communication with a customer, is the best way to understand their needs and how
                                            you can help support them.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row timeline-right">
                            <div class="col-12">
                                <p class="timeline-date">
                                    9:20AM to 10:05PM
                                </p>
                            </div>
                            <div class="col-12">
                                <div class="timeline-box">
                                    <div class="timeline-text">
                                        <h5>Designer & Developer Meeting</h5>
                                        <ul class="mb-0 text-muted vstack gap-2">
                                            <li>Last updates</li>
                                            <li>Weekly Planning</li>
                                            <li>Work Distribution</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="timeline-year">
                        <p><span>05 Dec 2021</span></p>
                    </div>
                    <div class="timeline-launch">
                        <div class="timeline-box">
                            <div class="timeline-text">
                                <h5>Our Company Activity</h5>
                                <p class="text-muted text-capitalize mb-0">Wow...!!! What a Journey So Far...!!!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->


    <div class="row mt-4">
        <div class="col-lg-12">
            <div>
                <h5>Horizontal Timeline</h5>
                <div class="horizontal-timeline my-3">
                    <div class="swiper timelineSlider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="card pt-2 border-0 item-box text-center">
                                    <div class="timeline-content p-3 rounded">
                                        <div>
                                            <p class="text-muted fw-medium mb-0">December, 2020</p>
                                            <h6 class="mb-0">Plateform Development</h6>
                                        </div>
                                    </div>
                                    <div class="time"><span class="badge bg-success">10 : 35 PM</span></div>
                                </div>
                            </div><!--end swiper-slide-->
                            <div class="swiper-slide">
                                <div class="card pt-2 border-0 item-box text-center">
                                    <div class="timeline-content p-3 rounded">
                                        <div>
                                            <p class="text-muted mb-1">January, 2021</p>
                                            <h6 class="mb-0">Release Bank & Cards Phase</h6>
                                        </div>
                                    </div>
                                    <div class="time"><span class="badge bg-success">8 : 10 AM</span></div>
                                </div>
                            </div><!--end swiper-slide-->
                            <div class="swiper-slide">
                                <div class="card pt-2 border-0 item-box text-center">
                                    <div class="timeline-content p-3 rounded">
                                        <div>
                                            <p class="text-muted mb-1">March, 2021</p>
                                            <h6 class="mb-0">Beta Launch of Plateform</h6>
                                        </div>
                                    </div>
                                    <div class="time"><span class="badge bg-success">01 : 47 AM</span></div>
                                </div>
                            </div><!--end swiper-slide-->
                            <div class="swiper-slide">
                                <div class="card pt-2 border-0 item-box text-center">
                                    <div class="timeline-content p-3 rounded">
                                        <div>
                                            <p class="text-muted mb-1">April, 2021</p>
                                            <h6 class="mb-0">First Crypto Bank Transfers</h6>
                                        </div>
                                    </div>
                                    <div class="time"><span class="badge bg-success">07 : 53 AM</span></div>
                                </div>
                            </div><!--end swiper-slide-->
                            <div class="swiper-slide">
                                <div class="card pt-2 border-0 item-box text-center">
                                    <div class="timeline-content p-3 rounded">
                                        <div>
                                            <p class="text-muted mb-1">May, 2021</p>
                                            <h6 class="mb-0">Launch Ethbay Services</h6>
                                        </div>
                                    </div>
                                    <div class="time"><span class="badge bg-success">4 : 05 AM</span></div>
                                </div>
                            </div><!--end swiper-slide-->
                            <div class="swiper-slide">
                                <div class="card pt-2 border-0 item-box text-center">
                                    <div class="timeline-content p-3 rounded">
                                        <div>
                                            <p class="text-muted mb-1">June, 2021</p>
                                            <h6 class="mb-0">Fastest Crypto Transaction</h6>
                                        </div>
                                    </div>
                                    <div class="time"><span class="badge bg-success">02 : 40 AM</span></div>
                                </div>
                            </div><!--end swiper-slide-->
                            <div class="swiper-slide">
                                <div class="card pt-2 border-0 item-box text-center">
                                    <div class="timeline-content p-3 rounded">
                                        <div>
                                            <p class="text-muted mb-1">July, 2021</p>
                                            <h6 class="mb-0">Crypto Blockchain Release</h6>
                                        </div>
                                    </div>
                                    <div class="time"><span class="badge bg-success">9 : 27 AM</span></div>
                                </div>
                            </div><!--end swiper-slide-->
                            <div class="swiper-slide">
                                <div class="card pt-2 border-0 item-box text-center">
                                    <div class="timeline-content p-3 rounded">
                                        <div>
                                            <p class="text-muted mb-1">August, 2021</p>
                                            <h6 class="mb-0">Launch Ethereum Classifieds</h6>
                                        </div>
                                    </div>
                                    <div class="time"><span class="badge bg-success">06 : 19 AM</span></div>
                                </div>
                            </div><!--end swiper-slide-->
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                </div><!--end timeline-->
            </div>
        </div><!--end col-->
    </div><!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/timeline.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
