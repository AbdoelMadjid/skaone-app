@extends('layouts.master')
@section('title')
    @lang('translation.ico-list')
@endsection
@section('css')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.apps')
        @endslot
        @slot('li_2')
            @lang('translation.crypto')
        @endslot
    @endcomponent

    <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-sm-2 row-cols-1">
        <div class="col">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="flex-grow-1">
                        <h4>4751</h4>
                        <h6 class="text-muted fs-13 mb-0">ICOs Published</h6>
                    </div>
                    <div class="flex-shrink-0 avatar-sm">
                        <div class="avatar-title bg-warning-subtle text-warning fs-22 rounded">
                            <i class="ri-upload-2-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <div class="col">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="flex-grow-1">
                        <h4>3423</h4>
                        <h6 class="text-muted fs-13 mb-0">Active ICOs</h6>
                    </div>
                    <div class="flex-shrink-0 avatar-sm">
                        <div class="avatar-title bg-success-subtle text-success fs-22 rounded">
                            <i class="ri-remote-control-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <div class="col">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="flex-grow-1">
                        <h4>354</h4>
                        <h6 class="text-muted fs-13 mb-0">ICOs Trading</h6>
                    </div>
                    <div class="flex-shrink-0 avatar-sm">
                        <div class="avatar-title bg-info-subtle text-info fs-22 rounded">
                            <i class="ri-flashlight-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <div class="col">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="flex-grow-1">
                        <h4>2762</h4>
                        <h6 class="text-muted fs-13 mb-0">Funded ICOs</h6>
                    </div>
                    <div class="flex-shrink-0 avatar-sm">
                        <div class="avatar-title bg-danger-subtle text-danger fs-22 rounded">
                            <i class="ri-hand-coin-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
        <div class="col">
            <div class="card">
                <div class="card-body d-flex">
                    <div class="flex-grow-1">
                        <h4>1585</h4>
                        <h6 class="text-muted fs-13 mb-0">Upcoming ICO</h6>
                    </div>
                    <div class="flex-shrink-0 avatar-sm">
                        <div class="avatar-title bg-primary-subtle text-primary fs-22 rounded">
                            <i class="ri-donut-chart-line"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="card">
        <div class="card-body">
            <div class="row g-3">
                <div class="col-xxl-4 col-lg-6">
                    <div class="search-box">
                        <input type="text" class="form-control" placeholder="Search to ICOs...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div><!--end col-->
                <div class="col-xxl-3 col-lg-6">
                    <input type="text" class="form-control" data-provider="flatpickr" data-date-format="d M, Y"
                        data-range-date="true" placeholder="Select date">
                </div>
                <div class="col-xxl-2 col-lg-4">
                    <select class="form-control" data-choices data-choices-search-false name="choices-single-default2"
                        id="choices-single-default2">
                        <option value="Active">Active</option>
                        <option value="Ended">Ended</option>
                        <option value="Upcoming">Upcoming</option>
                    </select>
                </div><!--end col-->
                <div class="col-xxl-2 col-lg-4">
                    <select class="form-control" data-choices data-choices-search-false name="choices-single-default"
                        id="choices-single-default">
                        <option value="">Select Rating</option>
                        <option value="1">1 star</option>
                        <option value="2">2 star</option>
                        <option value="3">3 star</option>
                        <option value="4">4 star</option>
                        <option value="5">5 star</option>
                    </select>
                </div><!--end col-->
                <div class="col-xxl-1 col-lg-4">
                    <button class="btn btn-primary w-100"><i class="ri-equalizer-line align-bottom me-1"></i>
                        Filters</button>
                </div>
            </div><!--end row-->
        </div>
    </div>

    <div class="row">
        <div class="col-xxl-3 col-md-6">
            <div class="card overflow-hidden">
                <div class="card-body bg-success-subtle">
                    <h5 class="fs-17 text-center mb-0">Active ICOs</h5>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-light rounded">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/btc.svg') }}" alt=""
                                    class="avatar-xxs" />
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-15 mb-1">Data Wallet</h5>
                            <p class="text-muted mb-2">Blockchain Services</p>
                        </div>
                        <div>
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Visit Website <i
                                    class="ri-arrow-right-up-line align-bottom"></i></a>
                        </div>
                    </div>
                    <h6 class="text-muted mb-0">$15,00,000 / $13,75,954 <span
                            class="badge bg-success-subtle text-success">89.97%</span></h6>
                </div>
                <div class="card-body border-top border-top-dashed">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">4.8 <i class="ri-star-fill align-bottom text-warning"></i></h6>
                        </div>
                        <h6 class="flex-shrink-0 text-danger mb-0"><i class="ri-time-line align-bottom"></i> 05 Days</h6>
                    </div>
                </div>
            </div><!--end card-->
            <div class="card mb-2">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-light rounded">
                                <img src="{{ URL::asset('build/images/companies/img-6.png') }}" alt=""
                                    class="avatar-xxs" />
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-15 mb-1">GreatRiver Technology</h5>
                            <p class="text-muted mb-2">Information Technology</p>
                        </div>
                        <div>
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Visit Website <i
                                    class="ri-arrow-right-up-line align-bottom"></i></a>
                        </div>
                    </div>
                    <h6 class="text-muted mb-1">$39,00,000 / $31,57,654 <span
                            class="badge bg-success-subtle text-success">84.57%</span></h6>
                </div>
                <div class="card-body border-top border-top-dashed">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">4.4 <i class="ri-star-fill align-bottom text-warning"></i></h6>
                        </div>
                        <h6 class="flex-shrink-0 text-danger mb-0"><i class="ri-time-line align-bottom"></i> 15 Days</h6>
                    </div>
                </div>
            </div><!--end card-->
            <div class="card mb-2">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-light rounded">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/vtc.svg') }}" alt=""
                                    class="avatar-xxs" />
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-15 mb-1">Manta Network Finance</h5>
                            <p class="text-muted mb-2">Finance Services</p>
                        </div>
                        <div>
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Visit Website <i
                                    class="ri-arrow-right-up-line align-bottom"></i></a>
                        </div>
                    </div>
                    <h6 class="text-muted mb-0">$42,50,000 / $30,84,214 <span
                            class="badge bg-success-subtle text-success">70.24%</span></h6>
                </div>
                <div class="card-body border-top border-top-dashed">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">2.7 <i class="ri-star-fill align-bottom text-warning"></i></h6>
                        </div>
                        <h6 class="flex-shrink-0 text-warning mb-0"><i class="ri-time-line align-bottom"></i> 25 Jan, 2022
                        </h6>
                    </div>
                </div>
            </div><!--end card-->
            <div class="card mb-2">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-light rounded">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xsg.svg') }}" alt=""
                                    class="avatar-xxs" />
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-15 mb-1">Goldfinch Network</h5>
                            <p class="text-muted mb-2">Blockchain Services</p>
                        </div>
                        <div>
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Visit Website <i
                                    class="ri-arrow-right-up-line align-bottom"></i></a>
                        </div>
                    </div>
                    <h6 class="text-muted mb-0">$28,00,000 / $8,74,986 <span
                            class="badge bg-success-subtle text-success">24.57%</span></h6>
                </div>
                <div class="card-body border-top border-top-dashed">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">3.2 <i class="ri-star-fill align-bottom text-warning"></i></h6>
                        </div>
                        <h6 class="flex-shrink-0 text-warning mb-0"><i class="ri-time-line align-bottom"></i> 04 Feb, 2022
                        </h6>
                    </div>
                </div>
            </div><!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-light rounded">
                                <img src="{{ URL::asset('build/images/companies/img-8.png') }}" alt=""
                                    class="avatar-xxs" />
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-15 mb-1">Galaxy War</h5>
                            <p class="text-muted mb-2">Gaming</p>
                        </div>
                        <div>
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Visit Website <i
                                    class="ri-arrow-right-up-line align-bottom"></i></a>
                        </div>
                    </div>
                    <h6 class="text-muted mb-0">$40,00,000 / $24,12,741 <span
                            class="badge bg-success-subtle text-success">62.04%</span></h6>
                </div>
                <div class="card-body border-top border-top-dashed">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">3.9 <i class="ri-star-fill align-bottom text-warning"></i></h6>
                        </div>
                        <h6 class="flex-shrink-0 text-warning mb-0"><i class="ri-time-line align-bottom"></i> 05 March,
                            2022</h6>
                    </div>
                </div>
            </div><!--end card-->
        </div><!--end col-->

        <div class="col-xxl-3 col-md-6">
            <div class="card overflow-hidden">
                <div class="card-body bg-danger-subtle">
                    <h5 class="fs-17 text-center mb-0">Ended ICOs</h5>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-light rounded">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bela.svg') }}" alt=""
                                    class="avatar-xxs" />
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-15 mb-1">Social Chain</h5>
                            <p class="text-muted mb-2">Blockchain Services</p>
                        </div>
                        <div>
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Visit Website <i
                                    class="ri-arrow-right-up-line align-bottom"></i></a>
                        </div>
                    </div>
                    <h6 class="text-muted mb-0">$14,00,000 / $13,20,471 <span
                            class="badge bg-success-subtle text-success">97.62%</span></h6>
                </div>
                <div class="card-body border-top border-top-dashed">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">2.8 <i class="ri-star-fill align-bottom text-warning"></i></h6>
                        </div>
                        <h6 class="flex-shrink-0 text-muted mb-0"><i class="ri-time-line align-bottom"></i> 02 Jan, 2022
                        </h6>
                    </div>
                </div>
            </div><!--end card-->
            <div class="card mb-2">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-light rounded">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/arn.svg') }}" alt=""
                                    class="avatar-xxs" />
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-15 mb-1">Angels Crypto</h5>
                            <p class="text-muted mb-2">Blockchain Services</p>
                        </div>
                        <div>
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Visit Website <i
                                    class="ri-arrow-right-up-line align-bottom"></i></a>
                        </div>
                    </div>
                    <h6 class="text-muted mb-0">$75,00,000 / $59,10,412 <span
                            class="badge bg-success-subtle text-success">89.13%</span></h6>
                </div>
                <div class="card-body border-top border-top-dashed">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">2.1 <i class="ri-star-fill align-bottom text-warning"></i></h6>
                        </div>
                        <h6 class="flex-shrink-0 text-muted mb-0"><i class="ri-time-line align-bottom"></i> 23 Dec, 2021
                        </h6>
                    </div>
                </div>
            </div><!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-light rounded">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/cs.svg') }}" alt=""
                                    class="avatar-xxs" />
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-15 mb-1">Codex Exchange</h5>
                            <p class="text-muted mb-2">Exchange</p>
                        </div>
                        <div>
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Visit Website <i
                                    class="ri-arrow-right-up-line align-bottom"></i></a>
                        </div>
                    </div>
                    <h6 class="text-muted mb-0">$32,00,000 / $28,65,732 <span
                            class="badge bg-success-subtle text-success">78.43%</span></h6>
                </div>
                <div class="card-body border-top border-top-dashed">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">3.0 <i class="ri-star-fill align-bottom text-warning"></i></h6>
                        </div>
                        <h6 class="flex-shrink-0 text-muted mb-0"><i class="ri-time-line align-bottom"></i> 04 Oct, 2021
                        </h6>
                    </div>
                </div>
            </div><!--end card-->
        </div><!--end col-->

        <div class="col-xxl-3 col-md-6">
            <div class="card overflow-hidden">
                <div class="card-body bg-primary-subtle">
                    <h5 class="fs-17 text-center mb-0">Upcoming ICOs</h5>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-light rounded">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/add.svg') }}" alt=""
                                    class="avatar-xxs" />
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-15 mb-1">World Doin</h5>
                            <p class="text-muted mb-2">Blockchain Services</p>
                        </div>
                        <div>
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Visit Website <i
                                    class="ri-arrow-right-up-line align-bottom"></i></a>
                        </div>
                    </div>
                    <h6 class="text-muted mb-0">$64,00,000</h6>
                </div>
                <div class="card-body border-top border-top-dashed">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">4.7 <i class="ri-star-fill align-bottom text-warning"></i></h6>
                        </div>
                        <h6 class="flex-shrink-0 text-primary mb-0"><i class="ri-time-line align-bottom"></i> 15 Jan, 2022
                        </h6>
                    </div>
                </div>
            </div><!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-light rounded">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/atm.svg') }}" alt=""
                                    class="avatar-xxs" />
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-15 mb-1">Bridge Plus</h5>
                            <p class="text-muted mb-2">Platform</p>
                        </div>
                        <div>
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Visit Website <i
                                    class="ri-arrow-right-up-line align-bottom"></i></a>
                        </div>
                    </div>
                    <h6 class="text-muted mb-0">$45,80,000</h6>
                </div>
                <div class="card-body border-top border-top-dashed">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">3.5 <i class="ri-star-fill align-bottom text-warning"></i></h6>
                        </div>
                        <h6 class="flex-shrink-0 text-muted mb-0">-</h6>
                    </div>
                </div>
            </div><!--end card-->

        </div><!--end col-->

        <div class="col-xxl-3 col-md-6">
            <div class="card overflow-hidden">
                <div class="card-body bg-info-subtle">
                    <h5 class="fs-17 text-center mb-0">Trading ICOs</h5>
                </div>
            </div>
            <div class="card mb-2 ribbon-box ribbon-fill right">
                <div class="ribbon ribbon-info shadow-none"><i class="ri-flashlight-fill me-1"></i> 1</div>
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-light rounded">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bcbc.svg') }}" alt=""
                                    class="avatar-xxs" />
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-15 mb-1">PowerCoin</h5>
                            <p class="text-muted mb-2">Blockchain Services</p>
                        </div>
                        <div class="me-4">
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Visit Website <i
                                    class="ri-arrow-right-up-line align-bottom"></i></a>
                        </div>
                    </div>
                    <h6 class="text-muted mb-0">$1,50,00,000 / $1,11,65,368 <span
                            class="badge bg-success-subtle text-success">86.61%</span></h6>
                </div>
                <div class="card-body border-top border-top-dashed">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">4.9 <i class="ri-star-fill align-bottom text-warning"></i></h6>
                        </div>
                        <h6 class="flex-shrink-0 text-warning mb-0"><i class="ri-time-line align-bottom"></i> 16 Feb, 2022
                        </h6>
                    </div>
                </div>
            </div><!--end card-->
            <div class="card mb-2 ribbon-box ribbon-fill right">
                <div class="ribbon ribbon-info shadow-none"><i class="ri-flashlight-fill me-1"></i> 2</div>
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-light rounded">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/bix.svg') }}" alt=""
                                    class="avatar-xxs" />
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-15 mb-1">Cyber Wonder</h5>
                            <p class="text-muted mb-2">Platform</p>
                        </div>
                        <div class="me-4">
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Visit Website <i
                                    class="ri-arrow-right-up-line align-bottom"></i></a>
                        </div>
                    </div>
                    <h6 class="text-muted mb-0">$80,00,000 / $36,40,352 <span
                            class="badge bg-success-subtle text-success">48.08%</span></h6>
                </div>
                <div class="card-body border-top border-top-dashed">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">4.7 <i class="ri-star-fill align-bottom text-warning"></i></h6>
                        </div>
                        <h6 class="flex-shrink-0 text-warning mb-0"><i class="ri-time-line align-bottom"></i> 23 Jan, 2022
                        </h6>
                    </div>
                </div>
            </div><!--end card-->
            <div class="card mb-2 ribbon-box ribbon-fill right">
                <div class="ribbon ribbon-info shadow-none"><i class="ri-flashlight-fill me-1"></i> 3</div>
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-light rounded">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/rise.svg') }}" alt=""
                                    class="avatar-xxs" />
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-15 mb-1">RootCoin</h5>
                            <p class="text-muted mb-2">Blockchain Services</p>
                        </div>
                        <div class="me-4">
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Visit Website <i
                                    class="ri-arrow-right-up-line align-bottom"></i></a>
                        </div>
                    </div>
                    <h6 class="text-muted mb-0">$95,00,000 / $78,95,041 <span
                            class="badge bg-success-subtle text-success">76.05%</span></h6>
                </div>
                <div class="card-body border-top border-top-dashed">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">3.2 <i class="ri-star-fill align-bottom text-warning"></i></h6>
                        </div>
                        <h6 class="flex-shrink-0 text-warning mb-0"><i class="ri-time-line align-bottom"></i> 30 Dec, 2021
                        </h6>
                    </div>
                </div>
            </div><!--end card-->
            <div class="card ribbon-box ribbon-fill right">
                <div class="ribbon ribbon-info shadow-none"><i class="ri-flashlight-fill me-1"></i> 4</div>
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-light rounded">
                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ark.svg') }}" alt=""
                                    class="avatar-xxs" />
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h5 class="fs-15 mb-1">Arcana Finance</h5>
                            <p class="text-muted mb-2">Finance Services</p>
                        </div>
                        <div class="me-4">
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary">Visit Website <i
                                    class="ri-arrow-right-up-line align-bottom"></i></a>
                        </div>
                    </div>
                    <h6 class="text-muted mb-0">$68,00,000 / $45,85,367 <span
                            class="badge bg-success-subtle text-success">71.16%</span></h6>
                </div>
                <div class="card-body border-top border-top-dashed">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h6 class="mb-0">3.2 <i class="ri-star-fill align-bottom text-warning"></i></h6>
                        </div>
                        <h6 class="flex-shrink-0 text-warning mb-0"><i class="ri-time-line align-bottom"></i> 02 Dec, 2021
                        </h6>
                    </div>
                </div>
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
