@extends('layouts.master')
@section('title')
    @lang('translation.transactions')
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
        <div class="col-xxl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <lord-icon src="https://cdn.lordicon.com/fhtaantg.json" trigger="loop"
                                colors="primary:#405189,secondary:#0ab39c" style="width:55px;height:55px">
                            </lord-icon>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" class="badge bg-warning-subtle text-warning badge-border">BTC</a>
                            <a href="javascript:void(0);" class="badge bg-info-subtle text-info badge-border">ETH</a>
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary badge-border">USD</a>
                            <a href="javascript:void(0);" class="badge bg-danger-subtle text-danger badge-border">EUR</a>
                        </div>
                    </div>
                    <h3 class="mb-2">$<span class="counter-value" data-target="74858">0</span><small
                            class="text-muted fs-13">.68k</small></h3>
                    <h6 class="text-muted mb-0">Available Balance (USD)</h6>
                </div>
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-xxl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <lord-icon src="https://cdn.lordicon.com/qhviklyi.json" trigger="loop"
                                colors="primary:#405189,secondary:#0ab39c" style="width:55px;height:55px"></lord-icon>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" class="badge bg-warning-subtle text-warning badge-border">BTC</a>
                            <a href="javascript:void(0);" class="badge bg-info-subtle text-info badge-border">ETH</a>
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary badge-border">USD</a>
                            <a href="javascript:void(0);" class="badge bg-danger-subtle text-danger badge-border">EUR</a>
                        </div>
                    </div>
                    <h3 class="mb-2">$<span class="counter-value" data-target="74361">0</span><small
                            class="text-muted fs-13">.34k</small></h3>
                    <h6 class="text-muted mb-0">Send (Previous Month)</h6>
                </div>
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-xxl-3 col-md-6">
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex mb-3">
                        <div class="flex-grow-1">
                            <lord-icon src="https://cdn.lordicon.com/yeallgsa.json" trigger="loop"
                                colors="primary:#405189,secondary:#0ab39c" style="width:55px;height:55px">
                            </lord-icon>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="javascript:void(0);" class="badge bg-warning-subtle text-warning badge-border">BTC</a>
                            <a href="javascript:void(0);" class="badge bg-info-subtle text-info badge-border">ETH</a>
                            <a href="javascript:void(0);" class="badge bg-primary-subtle text-primary badge-border">USD</a>
                            <a href="javascript:void(0);" class="badge bg-danger-subtle text-danger badge-border">EUR</a>
                        </div>
                    </div>
                    <h3 class="mb-2">$<span class="counter-value" data-target="97685">0</span><small
                            class="text-muted fs-13">.22k</small></h3>
                    <h6 class="text-muted mb-0">Receive (Previous Month)</h6>
                </div>
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-xxl-3 col-md-6">
            <div class="swiper default-swiper rounded">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="card card-animate overflow-hidden">
                            <div class="card-body bg-warning-subtle">
                                <div class="d-flex mb-3">
                                    <div class="flex-grow-1">
                                        <lord-icon src="https://cdn.lordicon.com/vaeagfzc.json" trigger="loop"
                                            colors="primary:#405189,secondary:#0ab39c" style="width:55px;height:55px">
                                        </lord-icon>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="javascript:void(0);" class="fw-medium">Bitcoin (BTC)</a>
                                    </div>
                                </div>
                                <h3 class="mb-2">$245<small class="text-muted fs-13">.65k</small></h3>
                                <h6 class="text-muted mb-0">Send - Receive (Previous Month)</h6>
                            </div>
                        </div><!--end card-->
                    </div>
                    <div class="swiper-slide">
                        <div class="card card-animate overflow-hidden">
                            <div class="card-body bg-warning-subtle">
                                <div class="d-flex mb-3">
                                    <div class="flex-grow-1">
                                        <lord-icon src="https://cdn.lordicon.com/vaeagfzc.json" trigger="loop"
                                            colors="primary:#405189,secondary:#0ab39c" style="width:55px;height:55px">
                                        </lord-icon>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="javascript:void(0);" class="fw-medium">Ethereum (ETH)</a>
                                    </div>
                                </div>
                                <h3 class="mb-2">$24<small class="text-muted fs-13">.74k</small></h3>
                                <h6 class="text-muted mb-0">Send - Receive (Previous Month)</h6>
                            </div>
                        </div><!--end card-->
                    </div>
                    <div class="swiper-slide">
                        <div class="card card-animate overflow-hidden">
                            <div class="card-body bg-warning-subtle">
                                <div class="d-flex mb-3">
                                    <div class="flex-grow-1">
                                        <lord-icon src="https://cdn.lordicon.com/vaeagfzc.json" trigger="loop"
                                            colors="primary:#405189,secondary:#0ab39c" style="width:55px;height:55px">
                                        </lord-icon>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <a href="javascript:void(0);" class="fw-medium">Monero (XMR)</a>
                                    </div>
                                </div>
                                <h3 class="mb-2">$124<small class="text-muted fs-13">.36k</small></h3>
                                <h6 class="text-muted mb-0">Send - Receive (Previous Month)</h6>
                            </div>
                        </div><!--end card-->
                    </div>
                </div>
            </div><!--end swiper-->
        </div><!--end col-->
    </div><!--end row-->

    <div class="row align-items-center mb-4 g-3">
        <div class="col-sm-3">
            <div class="d-flex align-items-center gap-2">
                <span class="text-muted flex-shrink-0">Sort by: </span>
                <select class="form-control mb-0" data-choices data-choices-search-false name="choices-single-default"
                    id="choices-single-default">
                    <option value="All" selected>All</option>
                    <option value="USD">USD</option>
                    <option value="ETH">ETH</option>
                    <option value="BTC">BTC</option>
                    <option value="EUR">EUR</option>
                    <option value="JPY">JPY</option>
                </select>
            </div>
        </div><!--end col-->
        <div class="col-sm-auto ms-auto">
            <div class="d-flex gap-2">
                <a href="javascript:void(0);" class="btn btn-info">Deposite</a>
                <a href="javascript:void(0);" class="btn btn-danger">Withdraw</a>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="card" id="contactList">
        <div class="card-header">
            <div class="row align-items-center g-3">
                <div class="col-md-3">
                    <h5 class="card-title mb-0">All Transactions</h5>
                </div><!--end col-->
                <div class="col-md-auto ms-auto">
                    <div class="d-flex gap-2">
                        <div class="search-box">
                            <input type="text" class="form-control search" placeholder="Search for transactions...">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                        <button class="btn btn-success"><i class="ri-equalizer-line align-bottom me-1"></i>
                            Filters</button>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end card-header-->
        <div class="card-body">
            <div class="table-responsive table-card">
                <table class="table align-middle table-nowrap" id="customerTable">
                    <thead class="table-light text-muted">
                        <tr>
                            <th class="sort" data-sort="name" scope="col" style="width: 60px;"></th>
                            <th class="sort" data-sort="date" scope="col">Timestamp</th>
                            <th class="sort" data-sort="currency_name" scope="col">Currency</th>
                            <th class="sort" data-sort="form_name" scope="col">Form</th>
                            <th class="sort" data-sort="to_name" scope="col">To</th>
                            <th class="sort" data-sort="details" scope="col">Details</th>
                            <th class="sort" data-sort="transaction_id" scope="col">Transaction ID</th>
                            <th class="sort" data-sort="type" scope="col">Type</th>
                            <th class="sort" data-sort="amount" scope="col">Amount</th>
                            <th class="sort" data-sort="status" scope="col">Status</th>
                        </tr><!--end tr-->
                    </thead>
                    <tbody class="list form-check-all">
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ001</a></td>
                            <td>
                                <div class="avatar-xs">
                                    <div class="avatar-title bg-danger-subtle text-danger rounded-circle fs-16">
                                        <i class="ri-arrow-right-up-fill"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="date">24 Dec, 2021 <small class="text-muted">08:58AM</small></td>
                            <td class="currency_name">
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/btc.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    BTC
                                </div>
                            </td>
                            <td class="form_name">Wallet</td>
                            <td class="to_name">Thomas Taylor</td>
                            <td class="details">Membership Fees</td>
                            <td class="transaction_id">16b1d9234b61e8778d9e3588f20</td>
                            <td class="type">Withdraw</td>
                            <td>
                                <h6 class="text-danger mb-1 amount">-142.35 BTC</h6>
                                <p class="text-muted mb-0">$697.88k</p>
                            </td>
                            <td class="status">
                                <span class="badge bg-warning-subtle text-warning fs-11"><i
                                        class="ri-time-line align-bottom"></i> Processing</span>
                            </td>
                        </tr><!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ002</a></td>
                            <td>
                                <div class="avatar-xs">
                                    <div class="avatar-title bg-success-subtle text-success rounded-circle fs-16">
                                        <i class="ri-arrow-left-down-fill"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="date">16 Dec, 2021 <small class="text-muted">10:32PM</small></td>
                            <td class="currency_name">
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/eth.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    ETH
                                </div>
                            </td>
                            <td class="form_name">Tonya Noble</td>
                            <td class="to_name">Wallet</td>
                            <td class="details">Spring Telephone Network</td>
                            <td class="transaction_id">0a4b5e0e15d70ce79809eabbe</td>
                            <td class="type">Deposit</td>
                            <td>
                                <h6 class="text-success mb-1 amount">+342.35 ETH</h6>
                                <p class="text-muted mb-0">$14565.35</p>
                            </td>
                            <td class="status">
                                <span class="badge bg-success-subtle text-success fs-11"><i
                                        class="ri-checkbox-circle-line align-bottom"></i> Success</span>
                            </td>
                        </tr><!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ003</a></td>
                            <td>
                                <div class="avatar-xs">
                                    <div class="avatar-title bg-success-subtle text-success rounded-circle fs-16">
                                        <i class="ri-arrow-left-down-fill"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="date">04 Jan, 2022 <small class="text-muted">02:24AM</small></td>
                            <td class="currency_name">
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/eur.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    EUR
                                </div>
                            </td>
                            <td class="form_name">Nancy Martino</td>
                            <td class="to_name">Wallet</td>
                            <td class="details">Funding Purse with Payment Check</td>
                            <td class="transaction_id">cca3da2b7711985361825f615e9</td>
                            <td class="type">Deposit</td>
                            <td>
                                <h6 class="text-success mb-1 amount">+174.23 EUR</h6>
                                <p class="text-muted mb-0">$354.14</p>
                            </td>
                            <td class="status">
                                <span class="badge bg-danger-subtle text-danger fs-11"><i
                                        class="ri-close-circle-line align-bottom"></i> Failed</span>
                            </td>
                        </tr><!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ004</a></td>
                            <td>
                                <div class="avatar-xs">
                                    <div class="avatar-title bg-danger-subtle text-danger rounded-circle fs-16">
                                        <i class="ri-arrow-right-up-fill"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="date">28 Oct, 2021 <small class="text-muted">11:42AM</small></td>
                            <td class="currency_name">
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/gbp.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    GBP
                                </div>
                            </td>
                            <td class="form_name">Wallet</td>
                            <td class="to_name">Michael Morris</td>
                            <td class="details">British Pound Sterling Block</td>
                            <td class="transaction_id">062e0e0123f2b1e9862f659c28</td>
                            <td class="type">Withdraw</td>
                            <td>
                                <h6 class="text-danger mb-1 amount">-365.00 GBP</h6>
                                <p class="text-muted mb-0">$7532.21</p>
                            </td>
                            <td class="status">
                                <span class="badge bg-success-subtle text-success fs-11"><i
                                        class="ri-checkbox-circle-line align-bottom"></i> Success</span>
                            </td>
                        </tr><!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ005</a></td>
                            <td>
                                <div class="avatar-xs">
                                    <div class="avatar-title bg-success-subtle text-success rounded-circle fs-16">
                                        <i class="ri-arrow-left-down-fill"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="date">14 Nov, 2021 <small class="text-muted">12:38PM</small></td>
                            <td class="currency_name">
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/jpy.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    JPY
                                </div>
                            </td>
                            <td class="form_name">Alexis Clarke</td>
                            <td class="to_name">Wallet</td>
                            <td class="details">Platinum Business</td>
                            <td class="transaction_id">1deffa9713917ee0af26bbb5f272</td>
                            <td class="type">Deposit</td>
                            <td>
                                <h6 class="text-success mb-1 amount">+341.74 JPY</h6>
                                <p class="text-muted mb-0">$748.10</p>
                            </td>
                            <td class="status">
                                <span class="badge bg-warning-subtle text-warning fs-11"><i
                                        class="ri-time-line align-bottom"></i> Processing</span>
                            </td>
                        </tr><!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ006</a></td>
                            <td>
                                <div class="avatar-xs">
                                    <div class="avatar-title bg-danger-subtle text-danger rounded-circle fs-16">
                                        <i class="ri-arrow-right-up-fill"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="date">02 Jan, 2022 <small class="text-muted">08:58AM</small></td>
                            <td class="currency_name">
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/xrp.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    XRP
                                </div>
                            </td>
                            <td class="form_name">Wallet</td>
                            <td class="to_name">Kevin Dawson</td>
                            <td class="details">Business Advantage Fundaments - Banking</td>
                            <td class="transaction_id">186aa96d8014061d994f025ac4</td>
                            <td class="type">Withdraw</td>
                            <td>
                                <h6 class="text-danger mb-1 amount">-240.74 XRP</h6>
                                <p class="text-muted mb-0">$3254.20</p>
                            </td>
                            <td class="status">
                                <span class="badge bg-danger-subtle text-danger fs-11"><i
                                        class="ri-close-circle-line align-bottom"></i> Failed</span>
                            </td>
                        </tr><!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ007</a></td>
                            <td>
                                <div class="avatar-xs">
                                    <div class="avatar-title bg-success-subtle text-success rounded-circle fs-16">
                                        <i class="ri-arrow-left-down-fill"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="date">17 Oct, 2021 <small class="text-muted">07:08PM</small></td>
                            <td class="currency_name">
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/ltc.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    LTC
                                </div>
                            </td>
                            <td class="form_name">Tonya Noble</td>
                            <td class="to_name">Wallet</td>
                            <td class="details">Litecoin Sale</td>
                            <td class="transaction_id">c94b5581418c41c2c74448a5ec</td>
                            <td class="type">Deposit</td>
                            <td>
                                <h6 class="text-success mb-1 amount">+298.72 LTC</h6>
                                <p class="text-muted mb-0">$149.32</p>
                            </td>
                            <td class="status">
                                <span class="badge bg-success-subtle text-success fs-11"><i
                                        class="ri-checkbox-circle-line align-bottom"></i> Success</span>
                            </td>
                        </tr><!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ008</a></td>
                            <td>
                                <div class="avatar-xs">
                                    <div class="avatar-title bg-danger-subtle text-danger rounded-circle fs-16">
                                        <i class="ri-arrow-right-up-fill"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="date">27 Dec, 2021 <small class="text-muted">01:24PM</small></td>
                            <td class="currency_name">
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/xmr.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    XMR
                                </div>
                            </td>
                            <td class="form_name">Wallet</td>
                            <td class="to_name">Mary Cousar</td>
                            <td class="details">Monero Purchase</td>
                            <td class="transaction_id">9a592451d1b0e0e5af6d4908f7</td>
                            <td class="type">Withdraw</td>
                            <td>
                                <h6 class="text-danger amount mb-1">-365.13 XMR</h6>
                                <p class="text-muted mb-0">$754.91</p>
                            </td>
                            <td class="status">
                                <span class="badge bg-danger-subtle text-danger fs-11"><i
                                        class="ri-close-circle-line align-bottom"></i> Failed</span>
                            </td>
                        </tr><!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ009</a></td>
                            <td>
                                <div class="avatar-xs">
                                    <div class="avatar-title bg-success-subtle text-success rounded-circle fs-16">
                                        <i class="ri-arrow-left-down-fill"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="date">23 Dec, 2021 <small class="text-muted">01:47AM</small></td>
                            <td class="currency_name">
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/xpm.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    XPM
                                </div>
                            </td>
                            <td class="form_name">Glen Matney</td>
                            <td class="to_name">Wallet</td>
                            <td class="details">British Pound Sterling Block</td>
                            <td class="transaction_id">c1bf44fd100fff59a5c64c28dfe0</td>
                            <td class="type">Deposit</td>
                            <td>
                                <h6 class="text-success mb-1 amount">+174.09 XPM</h6>
                                <p class="text-muted mb-0">$657.28</p>
                            </td>
                            <td class="status">
                                <span class="badge bg-warning-subtle text-warning fs-11"><i
                                        class="ri-time-line align-bottom"></i> Processing</span>
                            </td>
                        </tr><!--end tr-->
                        <tr>
                            <td class="id" style="display:none;"><a href="javascript:void(0);"
                                    class="fw-medium link-primary">#VZ010</a></td>
                            <td>
                                <div class="avatar-xs">
                                    <div class="avatar-title bg-success-subtle text-success rounded-circle fs-16">
                                        <i class="ri-arrow-left-down-fill"></i>
                                    </div>
                                </div>
                            </td>
                            <td class="date">15 Dec, 2021 <small class="text-muted">08:58AM</small></td>
                            <td class="currency_name">
                                <div class="d-flex align-items-center">
                                    <img src="{{ URL::asset('build/images/svg/crypto-icons/ppt.svg') }}" alt=""
                                        class="avatar-xxs me-2">
                                    PPT
                                </div>
                            </td>
                            <td class="form_name">Timothy Smith</td>
                            <td class="to_name">Wallet</td>
                            <td class="details">British Pound Sterling Block</td>
                            <td class="transaction_id">v98p141d5f4j145614sdsa78gh48t98</td>
                            <td class="type">Withdraw</td>
                            <td>
                                <h6 class="text-danger amount mb-1">-142.35 PPT</h6>
                                <p class="text-muted mb-0">$398.35</p>
                            </td>
                            <td class="status">
                                <span class="badge bg-success-subtle text-success fs-11"><i
                                        class="ri-checkbox-circle-line align-bottom"></i> Success</span>
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
                        <p class="text-muted mb-0">We've searched more than 150+ transactions We did not find any
                            transactions for you search.</p>
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
        </div><!--end card-body-->
    </div><!--end card-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/crypto-transactions.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
