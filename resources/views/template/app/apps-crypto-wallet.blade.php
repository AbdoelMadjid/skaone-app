@extends('layouts.master')
@section('title')
    @lang('translation.my-wallet')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />
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
    <div class="row">
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">My Portfolio Statistics</h5>
                        </div>
                        <div class="toolbar d-flex align-items-start justify-content-center flex-wrap gap-2">
                            <button type="button" class="btn btn-soft-primary timeline-btn btn-sm" id="one_month">
                                1M
                            </button>
                            <button type="button" class="btn btn-soft-primary timeline-btn btn-sm" id="six_months">
                                6M
                            </button>
                            <button type="button" class="btn btn-soft-primary timeline-btn btn-sm" id="one_year">
                                1Y
                            </button>
                            <button type="button" class="btn btn-soft-primary timeline-btn btn-sm active" id="all">
                                ALL
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <div id="area_chart_datetime" data-colors='["--vz-info"]' class="apex-charts" dir="ltr"></div>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center mb-3">
                <div class="flex-grow-1">
                    <h5 class="mb-0">Watchlist</h5>
                </div>
                <div class="flexshrink-0">
                    <button class="btn btn-success btn-sm"><i class="ri-star-line align-bottom"></i> Add Watchlist</button>
                </div>
            </div>

            <div class="swiper cryptoSlider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end">
                                    <div class="dropdown">
                                        <a class="text-reset" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <span class="text-muted fs-18"><i class="mdi mdi-dots-horizontal"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">View Details</a>
                                            <a class="dropdown-item" href="#">Remove Watchlist</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/btc.svg') }}"
                                        class="bg-light rounded-circle p-1 avatar-xs img-fluid" alt="">
                                    <h6 class="ms-2 mb-0 fs-14">Bitcoin</h6>
                                </div>
                                <div class="row align-items-end g-0">
                                    <div class="col-6">
                                        <h5 class="mb-1 mt-4">$46,335.40</h5>
                                        <p class="text-success fs-13 fw-medium mb-0">+0.63%<span
                                                class="text-muted ms-2 fs-10">(BTC)</span></p>
                                    </div><!-- end col -->
                                    <div class="col-6">
                                        <div class="apex-charts crypto-widget"
                                            data-colors='["--vz-success" , "--vz-transparent"]'
                                            id="bitcoin_sparkline_charts" dir="ltr"></div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end -->

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end">
                                    <div class="dropdown">
                                        <a class="text-reset" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <span class="text-muted fs-18"><i class="mdi mdi-dots-horizontal"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">View Details</a>
                                            <a class="dropdown-item" href="#">Remove Watchlist</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/ltc.svg') }}"
                                        class="bg-light rounded-circle p-1 avatar-xs img-fluid" alt="">
                                    <h6 class="ms-2 mb-0 fs-14">Litecoin</h6>
                                </div>
                                <div class="row align-items-end g-0">
                                    <div class="col-6">
                                        <h5 class="mb-1 mt-4">$65.64</h5>
                                        <p class="text-danger fs-13 fw-medium mb-0">-3.42%<span
                                                class="text-muted ms-2 fs-10">(LTC)</span></p>
                                    </div><!-- end col -->
                                    <div class="col-6">
                                        <div class="apex-charts crypto-widget"
                                            data-colors='["--vz-danger", "--vz-transparent"]' id="litecoin_sparkline_charts"
                                            dir="ltr"></div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end -->

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end">
                                    <div class="dropdown">
                                        <a class="text-reset" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted fs-18"><i class="mdi mdi-dots-horizontal"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">View Details</a>
                                            <a class="dropdown-item" href="#">Remove Watchlist</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/eth.svg') }}"
                                        class="bg-light rounded-circle p-1 avatar-xs img-fluid" alt="">
                                    <h6 class="ms-2 mb-0 fs-14">Ethereum</h6>
                                </div>
                                <div class="row align-items-end g-0">
                                    <div class="col-6">
                                        <h5 class="mb-1 mt-4">$3,748.66</h5>
                                        <p class="text-danger fs-13 fw-medium mb-0">+0.42%<span
                                                class="text-muted ms-2 fs-10">(ETH)</span></p>
                                    </div><!-- end col -->
                                    <div class="col-6">
                                        <div class="apex-charts crypto-widget"
                                            data-colors='["--vz-danger", "--vz-transparent"]'
                                            id="eathereum_sparkline_charts" dir="ltr"></div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end -->

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end">
                                    <div class="dropdown">
                                        <a class="text-reset" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted fs-18"><i class="mdi mdi-dots-horizontal"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">View Details</a>
                                            <a class="dropdown-item" href="#">Remove Watchlist</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/xmr.svg') }}"
                                        class="bg-light rounded-circle p-1 avatar-xs img-fluid" alt="">
                                    <h6 class="ms-2 mb-0 fs-14">Monero</h6>
                                </div>
                                <div class="row align-items-end g-0">
                                    <div class="col-6">
                                        <h5 class="mb-1 mt-4">$226.55</h5>
                                        <p class="text-danger fs-13 fw-medium mb-0">-1.92%<span
                                                class="text-muted ms-2 fs-10">(XMR)</span></p>
                                    </div><!-- end col -->
                                    <div class="col-6">
                                        <div class="apex-charts crypto-widget"
                                            data-colors='["--vz-danger", "--vz-transparent"]'
                                            id="binance_sparkline_charts" dir="ltr"></div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end -->

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end">
                                    <div class="dropdown">
                                        <a class="text-reset" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted fs-18"><i class="mdi mdi-dots-horizontal"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">View Details</a>
                                            <a class="dropdown-item" href="#">Remove Watchlist</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/dash.svg') }}"
                                        class="bg-light rounded-circle p-1 avatar-xs img-fluid" alt="">
                                    <h6 class="ms-2 mb-0 fs-14">Dash</h6>
                                </div>
                                <div class="row align-items-end g-0">
                                    <div class="col-6">
                                        <h5 class="mb-1 mt-4">$142.5</h5>
                                        <p class="text-success fs-13 fw-medium mb-0">+16.38%<span
                                                class="text-muted ms-2 fs-10">(DASH)</span></p>
                                    </div><!-- end col -->
                                    <div class="col-6">
                                        <div class="apex-charts crypto-widget"
                                            data-colors='["--vz-success", "--vz-transparent"]' id="dash_sparkline_charts"
                                            dir="ltr"></div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end -->

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end">
                                    <div class="dropdown">
                                        <a class="text-reset" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted fs-18"><i class="mdi mdi-dots-horizontal"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">View Details</a>
                                            <a class="dropdown-item" href="#">Remove Watchlist</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/mkr.svg') }}"
                                        class="bg-light rounded-circle p-1 avatar-xs img-fluid" alt="">
                                    <h6 class="ms-2 mb-0 fs-14">Maker</h6>
                                </div>
                                <div class="row align-items-end g-0">
                                    <div class="col-6">
                                        <h5 class="mb-1 mt-4">$2,390.75</h5>
                                        <p class="text-success fs-13 fw-medium mb-0">+0.36%<span
                                                class="text-muted ms-2 fs-10">(MKR)</span></p>
                                    </div><!-- end col -->
                                    <div class="col-6">
                                        <div class="apex-charts crypto-widget"
                                            data-colors='["--vz-success", "--vz-transparent"]'
                                            id="tether_sparkline_charts" dir="ltr"></div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end -->

                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-body">
                                <div class="float-end">
                                    <div class="dropdown">
                                        <a class="text-reset" href="#" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="text-muted fs-18"><i class="mdi mdi-dots-horizontal"></i></span>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">View Details</a>
                                            <a class="dropdown-item" href="#">Remove Watchlist</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/neo.svg') }}"
                                        class="bg-light rounded-circle p-1 avatar-xs img-fluid" alt="">
                                    <h6 class="ms-2 mb-0 fs-14">Neo</h6>
                                </div>
                                <div class="row align-items-end g-0">
                                    <div class="col-6">
                                        <h5 class="mb-1 mt-4">$2,145.65</h5>
                                        <p class="text-success fs-13 fw-medium mb-0">32.07%<span
                                                class="text-muted ms-2 fs-10">(NEO)</span></p>
                                    </div><!-- end col -->
                                    <div class="col-6">
                                        <div class="apex-charts crypto-widget"
                                            data-colors='["--vz-success", "--vz-transparent"]' id="neo_sparkline_charts"
                                            dir="ltr"></div>
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end -->
                </div><!-- end swiper wrapper -->
            </div><!-- end swiper -->

            <div class="card" id="marketList">
                <div class="card-header border-bottom-dashed d-flex align-items-center">
                    <h4 class="card-title mb-0 flex-grow-1">Market Status</h4>
                    <div class="flex-shrink-0">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary btn-sm">Today</button>
                            <button type="button" class="btn btn-outline-primary btn-sm">Overall</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="sort" data-sort="currency_name" scope="col">Name</th>
                                    <th class="sort" data-sort="quantity_value" scope="col">Quantity</th>
                                    <th class="sort" data-sort="avg_price" scope="col">Avg. Price</th>
                                    <th class="sort" data-sort="current_value" scope="col">Current Value</th>
                                    <th class="sort" data-sort="returns" scope="col">Returns</th>
                                    <th class="sort" data-sort="returns_per" scope="col">Returns %</th>
                                </tr>
                            </thead><!--end thead-->
                            <tbody class="list form-check-all">
                                <tr>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ001</a></td>
                                    <td>
                                        <div class="d-flex align-items-center fw-medium">
                                            <img src="{{ URL::asset('build/images/svg/crypto-icons/btc.svg') }}"
                                                alt="" class="avatar-xxs me-2" />
                                            <a href="javascript:void(0)" class="currency_name">Bitcoin (BTC)</a>
                                        </div>
                                    </td>
                                    <td class="quantity_value">08</td>
                                    <td class="avg_price">$46,154.30</td>
                                    <td class="current_value">$46,335.40</td>
                                    <td class="returns">$3,70,683.2</td>
                                    <td class="returns_per">
                                        <h6 class="text-success fs-13 mb-0"><i
                                                class="mdi mdi-trending-up align-middle me-1"></i>0.63%</h6>
                                    </td>
                                </tr><!--end tr-->
                                <tr>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ002</a></td>
                                    <td>
                                        <div class="d-flex align-items-center fw-medium">
                                            <img src="{{ URL::asset('build/images/svg/crypto-icons/eth.svg') }}"
                                                alt="" class="avatar-xxs me-2" />
                                            <a href="javascript:void(0)" class="currency_name">Ethereum (ETH)</a>
                                        </div>
                                    </td>
                                    <td class="quantity_value">50</td>
                                    <td class="avg_price">$3,744.48</td>
                                    <td class="current_value">$3,748.66</td>
                                    <td class="returns">$1,87,433</td>
                                    <td class="returns_per">
                                        <h6 class="text-danger fs-13 mb-0"><i
                                                class="mdi mdi-trending-down align-middle me-1"></i>3.42%</h6>
                                    </td>
                                </tr><!--end tr-->
                                <tr>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ003</a></td>
                                    <td>
                                        <div class="d-flex align-items-center fw-medium">
                                            <img src="{{ URL::asset('build/images/svg/crypto-icons/xrp.svg') }}"
                                                alt="" class="avatar-xxs me-2" />
                                            <a href="javascript:void(0)" class="currency_name">Ripple (XRP)</a>
                                        </div>
                                    </td>
                                    <td class="quantity_value">300</td>
                                    <td class="avg_price">$1.05</td>
                                    <td class="current_value">$2.20</td>
                                    <td class="returns">$660</td>
                                    <td class="returns_per">
                                        <h6 class="text-success fs-13 mb-0"><i
                                                class="mdi mdi-trending-up align-middle me-1"></i>1.20%</h6>
                                    </td>
                                </tr><!--end tr-->
                                <tr>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ004</a></td>
                                    <td>
                                        <div class="d-flex align-items-center fw-medium">
                                            <img src="{{ URL::asset('build/images/svg/crypto-icons/xmr.svg') }}"
                                                alt="" class="avatar-xxs me-2" />
                                            <a href="javascript:void(0)" class="currency_name">Monero (XMR)</a>
                                        </div>
                                    </td>
                                    <td class="quantity_value">150</td>
                                    <td class="avg_price">$227.30</td>
                                    <td class="current_value">$226.55</td>
                                    <td class="returns">$33,982.5</td>
                                    <td class="returns_per">
                                        <h6 class="text-danger fs-13 mb-0"><i
                                                class="mdi mdi-trending-down align-middle me-1"></i>1.92%</h6>
                                    </td>
                                </tr><!--end tr-->
                                <tr>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ005</a></td>
                                    <td>
                                        <div class="d-flex align-items-center fw-medium">
                                            <img src="{{ URL::asset('build/images/svg/crypto-icons/ltc.svg') }}"
                                                alt="" class="avatar-xxs me-2" />
                                            <a href="javascript:void(0)" class="currency_name">Litecoin (LTC)</a>
                                        </div>
                                    </td>
                                    <td class="quantity_value">200</td>
                                    <td class="avg_price">$144.00</td>
                                    <td class="current_value">$147.50</td>
                                    <td class="returns">$29,500</td>
                                    <td class="returns_per">
                                        <h6 class="text-danger fs-13 mb-0"><i
                                                class="mdi mdi-trending-down align-middle me-1"></i>0.87%</h6>
                                    </td>
                                </tr><!--end tr-->
                                <tr>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ008</a></td>
                                    <td>
                                        <div class="d-flex align-items-center fw-medium">
                                            <img src="{{ URL::asset('build/images/svg/crypto-icons/aave.svg') }}"
                                                alt="" class="avatar-xxs me-2" />
                                            <a href="javascript:void(0)" class="currency_name">Aave (AAVE)</a>
                                        </div>
                                    </td>
                                    <td class="quantity_value">180</td>
                                    <td class="avg_price">$250.70</td>
                                    <td class="current_value">$254.30</td>
                                    <td class="returns">$45,774</td>
                                    <td class="returns_per">
                                        <h6 class="text-success fs-13 mb-0"><i
                                                class="mdi mdi-trending-up align-middle me-1"></i>3.96%</h6>
                                    </td>
                                </tr><!--end tr-->
                                <tr>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ006</a></td>
                                    <td>
                                        <div class="d-flex align-items-center fw-medium">
                                            <img src="{{ URL::asset('build/images/svg/crypto-icons/mkr.svg') }}"
                                                alt="" class="avatar-xxs me-2" />
                                            <a href="javascript:void(0)" class="currency_name">Maker (MKR)</a>
                                        </div>
                                    </td>
                                    <td class="quantity_value">60</td>
                                    <td class="avg_price">$2,470.30</td>
                                    <td class="current_value">$2,390.75</td>
                                    <td class="returns">$1,43,445</td>
                                    <td class="returns_per">
                                        <h6 class="text-success fs-13 mb-0"><i
                                                class="mdi mdi-trending-up align-middle me-1"></i>0.36%</h6>
                                    </td>
                                </tr><!--end tr-->
                                <tr>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ007</a></td>
                                    <td>
                                        <div class="d-flex align-items-center fw-medium">
                                            <img src="{{ URL::asset('build/images/svg/crypto-icons/yfi.svg') }}"
                                                alt="" class="avatar-xxs me-2" />
                                            <a href="javascript:void(0)" class="currency_name">Yearn.finance (YFI)</a>
                                        </div>
                                    </td>
                                    <td class="quantity_value">25</td>
                                    <td class="avg_price">$37,632.17</td>
                                    <td class="current_value">$39,276.24</td>
                                    <td class="returns">$9,81,906</td>
                                    <td class="returns_per">
                                        <h6 class="text-success fs-13 mb-0"><i
                                                class="mdi mdi-trending-up align-middle me-1"></i>3.96%</h6>
                                    </td>
                                </tr><!--end tr-->
                            </tbody>
                        </table><!--end table-->
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                    colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px">
                                </lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ Currencies We did not find any
                                    Currencies for you search.</p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-3">
                        <div class="pagination-wrap hstack gap-2">
                            <a class="page-item pagination-prev disabled" href="#">
                                Previous
                            </a>
                            <ul class="pagination listjs-pagination mb-0"></ul>
                            <a class="page-item pagination-next" href="#">
                                Next
                            </a>
                        </div>
                    </div>
                </div>
            </div><!--end card-->

        </div><!--end col-->

        <div class="col-xxl-3">
            <div class="card">
                <div class="card-body bg-warning-subtle ody bg-warning-subtle">">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5 class="fs-13 mb-3">My Portfolio</h5>
                            <h2>$61,91,967<small class="text-muted fs-14">.29</small></h2>
                            <p class="text-muted mb-0">$25,10,974 <small class="badge bg-success-subtle text-success"><i
                                        class="ri-arrow-right-up-line fs-13 align-bottom"></i>4.37%</small></p>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="mdi mdi-wallet-outline text-primary h1"></i>
                        </div>
                    </div>
                </div>
            </div><!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5 class="fs-13 mb-3">Today's Profit</h5>
                            <h2>$2,74,365<small class="text-muted fs-14">.84</small></h2>
                            <p class="text-muted mb-0">$9,10,564 <small class="badge bg-success-subtle text-success"><i
                                        class="ri-arrow-right-up-line fs-13 align-bottom"></i>1.25%</small></p>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="ri-hand-coin-line text-primary h1"></i>
                        </div>
                    </div>
                </div>
            </div><!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <h5 class="fs-13 mb-3">Overall Profit</h5>
                            <h2>$32,67,120<small class="text-muted fs-14">.42</small></h2>
                            <p class="text-muted mb-0">$18,22,730 <small class="badge bg-success-subtle text-success"><i
                                        class="ri-arrow-right-up-line fs-13 align-bottom"></i>8.34%</small></p>
                        </div>
                        <div class="flex-shrink-0">
                            <i class="ri-line-chart-line text-primary h1"></i>
                        </div>
                    </div>
                </div>
            </div><!--end card-->
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Recent Transaction</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('build/images/svg/crypto-icons/btc.svg') }}" alt=""
                                class="avatar-xxs" />
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-1">Bitcoin (BTC)</h6>
                            <p class="text-muted mb-0">Today</p>
                        </div>
                        <div>
                            <h6 class="text-danger mb-0">- $422.89</h6>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('build/images/svg/crypto-icons/ltc.svg') }}" alt=""
                                class="avatar-xxs" />
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-1">Litecoin (LTC)</h6>
                            <p class="text-muted mb-0">Yesterday</p>
                        </div>
                        <div>
                            <h6 class="text-success mb-0">+ $784.20</h6>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('build/images/svg/crypto-icons/xmr.svg') }}" alt=""
                                class="avatar-xxs" />
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-1">Monero (XMR)</h6>
                            <p class="text-muted mb-0">01 Jan, 2022</p>
                        </div>
                        <div>
                            <h6 class="text-danger mb-0">- $356.74</h6>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('build/images/svg/crypto-icons/fil.svg') }}" alt=""
                                class="avatar-xxs" />
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-1">Filecoin (FIL)</h6>
                            <p class="text-muted mb-0">30 Dec, 2021</p>
                        </div>
                        <div>
                            <h6 class="text-success mb-0">+ $1,247.00</h6>
                        </div>
                    </div>
                    <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('build/images/svg/crypto-icons/dot.svg') }}" alt=""
                                class="avatar-xxs" />
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-1">Polkadot (DOT)</h6>
                            <p class="text-muted mb-0">27 Dec, 2021</p>
                        </div>
                        <div>
                            <h6 class="text-success btn mb-0">+ $7,365.80</h6>
                        </div>
                    </div>
                    <div>
                        <a href="apps_crypto_transactions" class="btn btn-soft-info w-100">View All Transactions <i
                                class="ri-arrow-right-line align-bottom"></i></a>
                    </div>
                </div>
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>


    <script src="{{ URL::asset('build/js/pages/crypto-wallet.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
