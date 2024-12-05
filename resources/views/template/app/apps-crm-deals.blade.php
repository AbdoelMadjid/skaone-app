@extends('layouts.master')
@section('title')
    @lang('translation.deals')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.apps')
        @endslot
        @slot('li_2')
            @lang('translation.crm')
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-md-3">
                    <div class="search-box">
                        <input type="text" class="form-control search" placeholder="Search for deals...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
                <!--end col-->
                <div class="col-md-auto ms-auto">
                    <div class="d-flex hastck gap-2 flex-wrap">
                        <div class="d-flex align-items-center gap-2">
                            <span class="text-muted">Sort by: </span>
                            <select class="form-control mb-0" data-choices data-choices-search-false
                                id="choices-single-default">
                                <option value="Owner">Owner</option>
                                <option value="Company">Company</option>
                                <option value="Date">Date</option>
                            </select>
                        </div>
                        <button data-bs-toggle="modal" data-bs-target="#adddeals" class="btn btn-success"><i
                                class="ri-add-fill align-bottom me-1"></i> Add
                            Deals</button>
                        <div class="dropdown">
                            <button class="btn btn-soft-info btn-icon fs-14" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ri-settings-4-line"></i>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="#">Copy</a></li>
                                <li><a class="dropdown-item" href="#">Move to pipline</a></li>
                                <li><a class="dropdown-item" href="#">Add to exceptions</a></li>
                                <li><a class="dropdown-item" href="#">Switch to common form view</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Reset form view to default</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
    </div>
    <!--end card-->

    <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
        <div class="col">
            <div class="card">
                <a class="card-body bg-danger-subtle" data-bs-toggle="collapse" href="#leadDiscovered" role="button"
                    aria-expanded="false" aria-controls="leadDiscovered">
                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">Lead Discovered</h5>
                    <p class="text-muted mb-0">$265,200 <span class="fw-medium">4 Deals</span></p>
                </a>
            </div>
            <!--end card-->
            <div class="collapse show" id="leadDiscovered">
                <div class="card mb-1">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#leadDiscovered1"
                            role="button" aria-expanded="false" aria-controls="leadDiscovered1">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-1.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Managing sales team meeting</h6>
                                <p class="text-muted mb-0">$87k - 01 Jan, 2022</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="leadDiscovered1">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small class="badge bg-danger-subtle text-danger">4
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#leadDiscovered2"
                            role="button" aria-expanded="false" aria-controls="leadDiscovered2">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Airbnb React Development</h6>
                                <p class="text-muted mb-0">$20.3k - 24 Dec, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="leadDiscovered2">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small class="badge bg-danger-subtle text-danger">4
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1 ribbon-box ribbon-fill ribbon-sm">
                    <div class="ribbon ribbon-info"><i class="ri-flashlight-fill"></i></div>
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#leadDiscovered3"
                            role="button" aria-expanded="false" aria-controls="leadDiscovered3">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Discovery Capital</h6>
                                <p class="text-muted mb-0">$124.3k - 29 Dec, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed show" id="leadDiscovered3">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small class="badge bg-danger-subtle text-danger">4
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#leadDiscovered4"
                            role="button" aria-expanded="false" aria-controls="leadDiscovered4">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Airbnb React Development</h6>
                                <p class="text-muted mb-0">$33.6k - 24 Dec, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="leadDiscovered4">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small class="badge bg-danger-subtle text-danger">4
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
            </div>
        </div>
        <!--end col-->

        <div class="col">
            <div class="card">
                <a class="card-body bg-success-subtle" data-bs-toggle="collapse" href="#contactInitiated" role="button"
                    aria-expanded="false" aria-controls="contactInitiated">
                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">Contact Initiated</h5>
                    <p class="text-muted mb-0">$108,700 <span class="fw-medium">5 Deals</span></p>
                </a>
            </div>
            <!--end card-->
            <div class="collapse show" id="contactInitiated">
                <div class="card mb-1 ribbon-box ribbon-fill ribbon-sm">
                    <div class="ribbon ribbon-info"><i class="ri-flashlight-fill"></i></div>
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#contactInitiated1"
                            role="button" aria-expanded="false" aria-controls="contactInitiated1">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-5.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Custom Mobile Apps</h6>
                                <p class="text-muted mb-0">$28.7k - 13 Dec, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="contactInitiated1">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small class="badge bg-danger-subtle text-danger">4
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#contactInitiated2"
                            role="button" aria-expanded="false" aria-controls="contactInitiated2">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/brands/github.png') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Investment Deal for Zoetic Fashion</h6>
                                <p class="text-muted mb-0">$32.8k - 10 Oct, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="contactInitiated2">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Zoetic Fashion <small class="badge bg-warning-subtle text-warning">25
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Today at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#contactInitiated3"
                            role="button" aria-expanded="false" aria-controls="contactInitiated3">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-6.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Modern Design</h6>
                                <p class="text-muted mb-0">$23k - 03 Oct, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="contactInitiated3">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Micro Design <small class="badge bg-success-subtle text-success">2
                                    Month</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Today at 11:58AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#contactInitiated4"
                            role="button" aria-expanded="false" aria-controls="contactInitiated4">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-7.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Hotel Logo Design</h6>
                                <p class="text-muted mb-0">$10.9k - 05 Jan, 2022</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="contactInitiated4">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small class="badge bg-danger-subtle text-danger">4
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#contactInitiated5"
                            role="button" aria-expanded="false" aria-controls="contactInitiated5">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/brands/mail_chimp.png') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Managing Sales</h6>
                                <p class="text-muted mb-0">$13.3k - 04 Sep, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="contactInitiated5">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small class="badge bg-danger-subtle text-danger">4
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
            </div>
        </div>
        <!--end col-->

        <div class="col">
            <div class="card">
                <a class="card-body bg-warning-subtle" data-bs-toggle="collapse" href="#needsIdentified" role="button"
                    aria-expanded="false" aria-controls="needsIdentified">
                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">Needs Identified</h5>
                    <p class="text-muted mb-0">$708,200 <span class="fw-medium">7 Deals</span></p>
                </a>
            </div>
            <!--end card-->
            <div class="collapse show" id="needsIdentified">
                <div class="card mb-1">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#needsIdentified1"
                            role="button" aria-expanded="false" aria-controls="needsIdentified1">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-9.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Art Studio Design</h6>
                                <p class="text-muted mb-0">$147.5k - 24 Sep, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="needsIdentified1">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Alexis Clarke <small class="badge bg-danger-subtle text-danger">7
                                    Days</small>
                            </h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Alexis</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#needsIdentified2"
                            role="button" aria-expanded="false" aria-controls="needsIdentified2">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-8.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Billing Page Bug</h6>
                                <p class="text-muted mb-0">$15.8k - 17 Dec, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="needsIdentified2">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Meta4Systems <small class="badge bg-warning-subtle text-warning">35
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Mary</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#needsIdentified3"
                            role="button" aria-expanded="false" aria-controls="needsIdentified3">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/brands/dribbble.png') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Food Selection Platform</h6>
                                <p class="text-muted mb-0">$72.5k - 04 Jan, 2022</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="needsIdentified3">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Syntyce Solutions <small class="badge bg-danger-subtle text-danger">15
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1 ribbon-box ribbon-fill ribbon-sm">
                    <div class="ribbon ribbon-info"><i class="ri-flashlight-fill"></i></div>
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#needsIdentified4"
                            role="button" aria-expanded="false" aria-controls="needsIdentified4">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-1.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Skote React Development</h6>
                                <p class="text-muted mb-0">$89.8 - 21 Nov, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="needsIdentified4">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Themesbrand <small class="badge bg-danger-subtle text-danger">3
                                    Month</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1 ribbon-box ribbon-fill ribbon-sm">
                    <div class="ribbon ribbon-info"><i class="ri-flashlight-fill"></i></div>
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#needsIdentified5"
                            role="button" aria-expanded="false" aria-controls="needsIdentified5">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Velzon - Admin Dashboard</h6>
                                <p class="text-muted mb-0">$126.7k - 30 Dec, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="needsIdentified5">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Themesbrand <small class="badge bg-danger-subtle text-danger">3
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Nancy</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#needsIdentified6"
                            role="button" aria-expanded="false" aria-controls="needsIdentified6">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/companies/img-6.png') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Wood Elements Design</h6>
                                <p class="text-muted mb-0">$120.2k - 24 Nov, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="needsIdentified6">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">iTest Factory <small class="badge bg-warning-subtle text-warning">42
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#needsIdentified7"
                            role="button" aria-expanded="false" aria-controls="needsIdentified7">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-10.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">PayPal SEO audit</h6>
                                <p class="text-muted mb-0">$135.7k - 23 Nov, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="needsIdentified7">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Meta4Systems <small class="badge bg-success-subtle text-success">6
                                    Month</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
            </div>
        </div>
        <!--end col-->

        <div class="col">
            <div class="card">
                <a class="card-body bg-info-subtle" data-bs-toggle="collapse" href="#meetingArranged" role="button"
                    aria-expanded="false" aria-controls="meetingArranged">
                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">Meeting Arranged</h5>
                    <p class="text-muted mb-0">$44,900 <span class="fw-medium">3 Deals</span></p>
                </a>
            </div>
            <!--end card-->
            <div class="collapse show" id="meetingArranged">
                <div class="card mb-1">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#meetingArranged1"
                            role="button" aria-expanded="false" aria-controls="meetingArranged1">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/companies/img-5.png') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">SASS app workflow diagram</h6>
                                <p class="text-muted mb-0">$17.8k - 01 Jan, 2022</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="meetingArranged1">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small class="badge bg-danger-subtle text-danger">10
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#meetingArranged2"
                            role="button" aria-expanded="false" aria-controls="meetingArranged2">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Uber new brand system</h6>
                                <p class="text-muted mb-0">$24.5k - 22 Dec, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="meetingArranged2">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small class="badge bg-danger-subtle text-danger">4
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#meetingArranged3"
                            role="button" aria-expanded="false" aria-controls="meetingArranged3">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/companies/img-8.png') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">TripAdvisor</h6>
                                <p class="text-muted mb-0">$2.6k - 12 Dec, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="meetingArranged3">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small class="badge bg-danger-subtle text-danger">4
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
            </div>
        </div>
        <!--end col-->

        <div class="col">
            <div class="card">
                <a class="card-body bg-secondary-subtle" data-bs-toggle="collapse" href="#offerAccepted" role="button"
                    aria-expanded="false" aria-controls="offerAccepted">
                    <h5 class="card-title text-uppercase fw-semibold mb-1 fs-15">Offer Accepted</h5>
                    <p class="text-muted mb-0">$819,300 <span class="fw-medium">8 Deals</span></p>
                </a>
            </div>
            <!--end card-->
            <div class="collapse show" id="offerAccepted">
                <div class="card mb-1">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#offerAccepted1"
                            role="button" aria-expanded="false" aria-controls="offerAccepted1">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-10.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Coupon Website</h6>
                                <p class="text-muted mb-0">$27.4k - 07 Jan, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="offerAccepted1">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small class="badge bg-danger-subtle text-danger">4
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1 ribbon-box ribbon-fill ribbon-sm">
                    <div class="ribbon ribbon-info"><i class="ri-flashlight-fill"></i></div>
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#offerAccepted2"
                            role="button" aria-expanded="false" aria-controls="offerAccepted2">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/brands/slack.png') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Marketing Automation Demo</h6>
                                <p class="text-muted mb-0">$94.8 - 19 Nov, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="offerAccepted2">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small
                                    class="badge bg-warning-subtle text-warning">47
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#offerAccepted3"
                            role="button" aria-expanded="false" aria-controls="offerAccepted3">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">New Email Design Templates</h6>
                                <p class="text-muted mb-0">$136.9k - 05 Jan, 2022</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="offerAccepted3">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small
                                    class="badge bg-danger-subtle text-danger">4
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#offerAccepted4"
                            role="button" aria-expanded="false" aria-controls="offerAccepted4">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-7.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Create New Components</h6>
                                <p class="text-muted mb-0">$45.9k - 26 Dec, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="offerAccepted4">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small
                                    class="badge bg-success-subtle text-success">4
                                    Month</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1 ribbon-box ribbon-fill ribbon-sm">
                    <div class="ribbon ribbon-info"><i class="ri-flashlight-fill"></i></div>
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#offerAccepted5"
                            role="button" aria-expanded="false" aria-controls="offerAccepted5">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/companies/img-3.png') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">New Test Tickets</h6>
                                <p class="text-muted mb-0">$118k - 01 Jan, 2022</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="offerAccepted5">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small
                                    class="badge bg-danger-subtle text-danger">4
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1 ribbon-box ribbon-fill ribbon-sm">
                    <div class="ribbon ribbon-info"><i class="ri-flashlight-fill"></i></div>
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#offerAccepted6"
                            role="button" aria-expanded="false" aria-controls="offerAccepted6">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-6.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Recover Deleted Folder</h6>
                                <p class="text-muted mb-0">$87.3k - 03 Jan, 2022</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="offerAccepted6">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small
                                    class="badge bg-danger-subtle text-danger">14
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card mb-1">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#offerAccepted7"
                            role="button" aria-expanded="false" aria-controls="offerAccepted7">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/brands/github.png') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Github SEO audit</h6>
                                <p class="text-muted mb-0">$241.2k - 21 Sep, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="offerAccepted7">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small
                                    class="badge bg-danger-subtle text-danger">4
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
                <div class="card">
                    <div class="card-body">
                        <a class="d-flex align-items-center" data-bs-toggle="collapse" href="#offerAccepted8"
                            role="button" aria-expanded="false" aria-controls="offerAccepted8">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="fs-14 mb-1">Urban Modern Design</h6>
                                <p class="text-muted mb-0">$67.8k - 09 Oct, 2021</p>
                            </div>
                        </a>
                    </div>
                    <div class="collapse border-top border-top-dashed" id="offerAccepted8">
                        <div class="card-body">
                            <h6 class="fs-14 mb-1">Nesta Technologies <small
                                    class="badge bg-danger-subtle text-danger">4
                                    Days</small></h6>
                            <p class="text-muted">As a company grows however, you find it's not as easy
                                to shout across</p>
                            <ul class="list-unstyled vstack gap-2 mb-0">
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-question-answer-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Meeting with Thomas</h6>
                                            <small class="text-muted">Yesterday at 9:12AM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-mac-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Product Demo</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="d-flex">
                                        <div class="flex-shrink-0 avatar-xxs text-muted">
                                            <i class="ri-earth-line"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h6 class="mb-0">Marketing Team Meeting</h6>
                                            <small class="text-muted">Monday at 04:41PM</small>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="card-footer hstack gap-2">
                            <button class="btn btn-warning btn-sm w-100"><i class="ri-phone-line align-bottom me-1"></i>
                                Call</button>
                            <button class="btn btn-info btn-sm w-100"><i
                                    class="ri-question-answer-line align-bottom me-1"></i>
                                Message</button>
                        </div>
                    </div>
                </div>
                <!--end card-->
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->


    <!-- Modal -->
    <div class="modal fade" id="adddeals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-light p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Create Deals</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="needs-validation" novalidate id="deals-form" onsubmit="return false">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="deatType" class="form-label">Deals Type</label>
                            <select class="form-select" id="deatType" data-choices
                                aria-label="Default select example" required>
                                <option value="" data-custom-properties="[object Object]">Select deals type
                                </option>
                                <option value="Lead Disovered">Lead Disovered</option>
                                <option value="Contact Initiated">Contact Initiated</option>
                                <option value="Need Identified">Need Identified</option>
                                <option value="Meeting Arranged">Meeting Arranged</option>
                                <option value="Offer Accepted">Offer Accepted</option>
                            </select>
                            <div class="invalid-feedback">
                                Please write an deals owner name.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="dealTitle" class="form-label">Deal Title</label>
                            <input type="text" class="form-control" id="dealTitle" placeholder="Enter title"
                                required>
                            <div class="invalid-feedback">
                                Please write a title.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="dealValue" class="form-label">Value (USD)</label>
                            <input type="number" class="form-control" id="dealValue" step="0.01"
                                placeholder="Enter value" required>
                            <div class="invalid-feedback">
                                Please write a value.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="dealOwner" class="form-label">Deals Owner</label>
                            <input type="text" class="form-control" id="dealOwner" required
                                placeholder="Enter owner name">
                            <div class="invalid-feedback">
                                Please write an deals owner name.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="dueDate" class="form-label">Due Date</label>
                            <input type="text" class="form-control" id="dueDate" data-provider="flatpickr"
                                placeholder="Select date" required>
                            <div class="invalid-feedback">
                                Please select a due date.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="dealEmail" class="form-label">Email</label>
                            <input type="email" class="form-control" id="dealEmail" placeholder="Enter email"
                                required>
                            <div class="invalid-feedback">
                                Please write a email.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="contactNumber" class="form-label">Contact</label>
                            <input type="text" class="form-control" id="contactNumber"
                                placeholder="Enter contact number" required>
                            <div class="invalid-feedback">
                                Please add a contact.
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="contactDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="contactDescription" rows="3" placeholder="Enter description" required></textarea>
                            <div class="invalid-feedback">
                                Please add a description.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" id="close-modal"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><i class="ri-save-line align-bottom me-1"></i>
                            Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end modal-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/cleave.js/cleave.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/crm-deals.init.js') }}"></script>
    <script src="{{ URL::asset('build/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
