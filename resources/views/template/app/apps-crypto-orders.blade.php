@extends('layouts.master')
@section('title')
    @lang('translation.orders')
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

    <div class="row" id="contactList">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center border-0">
                    <h5 class="card-title mb-0 flex-grow-1">All Orders</h5>
                    <div class="flex-shrink-0">
                        <div class="flax-shrink-0 hstack gap-2">
                            <button class="btn btn-primary">Today's Orders</button>
                            <button class="btn btn-soft-info">Past Orders</button>
                        </div>
                    </div>
                </div>
                <div class="card-body border border-dashed border-end-0 border-start-0">
                    <div class="row g-2">
                        <div class="col-xl-4 col-md-6">
                            <div class="search-box">
                                <input type="text" class="form-control search" placeholder="Search to orders...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xl-3 col-md-6">
                            <div class="input-group">
                                <span class="input-group-text" id="basic-addon1"><i class="ri-calendar-2-line"></i></span>
                                <input type="text" class="form-control" data-provider="flatpickr"
                                    data-date-format="d M, Y" data-range-date="true" placeholder="Select date"
                                    id="range-datepicker" aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xl-2 col-md-4">
                            <select class="form-control" data-choices data-choices-search-false name="idType"
                                id="idType">
                                <option value="all">Select Type</option>
                                <option value="Buy">Buy</option>
                                <option value="Sell">Sell</option>
                            </select>
                        </div>
                        <!--end col-->
                        <div class="col-xl-2 col-md-4">
                            <select class="form-control" data-choices data-choices-search-false name="idStatus"
                                id="idStatus">
                                <option value="all">Select Status</option>
                                <option value="Successful">Successful</option>
                                <option value="Cancelled">Cancelled</option>
                                <option value="Pending">Pending</option>
                            </select>
                        </div>
                        <!--end col-->
                        <div class="col-xl-1 col-md-4">
                            <button class="btn btn-success w-100" onclick="filterData();">Filters</button>
                        </div>
                    </div>
                    <!--end row-->
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light text-muted">
                                <tr>
                                    <th class="sort" data-sort="time" scope="col">Date</th>
                                    <th class="sort" data-sort="currency_name" scope="col">Name</th>
                                    <th class="sort" data-sort="type" scope="col">Type</th>
                                    <th class="sort" data-sort="quantity_value" scope="col">Quantity</th>
                                    <th class="sort" data-sort="or_val" scope="col">Order Value</th>
                                    <th class="sort" data-sort="sort-avg_price" scope="col">Avg Price</th>
                                    <th class="sort" data-sort="sort-price" scope="col">Price</th>
                                    <th class="sort" data-sort="status" scope="col">Status</th>
                                </tr>
                            </thead>
                            <!--end thead-->
                            <tbody class="list form-check-all">
                                <tr>
                                    <td class="order_date time" data-timestamp="1641945600">02 Jan, 2022 <small
                                            class="text-muted">03:45PM</small></td>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ001</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ URL::asset('build/images/svg/crypto-icons/btc.svg') }}"
                                                    alt="" class="avatar-xxs" />
                                            </div>
                                            <a href="javascript:void(0);" class="flex-grow-1 ms-2 currency_name">Bitcoin
                                                (BTC)</a>
                                        </div>
                                    </td>
                                    <td class="type text-success">Buy</td>
                                    <td class="quantity_value">08</td>
                                    <td class="order_value or_val" data-orderval="370683.20">$3,70,683.20</td>
                                    <td class="avg_price sort-avg_price" data-av-price="46154.30">$46,154.30</td>
                                    <td class="price sort-price" data-price="46335.40">$46,335.40</td>
                                    <td class="status"><span
                                            class="badge bg-success-subtle text-success text-uppercase">Successful</span>
                                    </td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="order_date time" data-timestamp="1640563200">27 Dec, 2021 <small
                                            class="text-muted">02:47PM</small></td>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ001</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ URL::asset('build/images/svg/crypto-icons/eth.svg') }}"
                                                    alt="" class="avatar-xxs" />
                                            </div>
                                            <a href="javascript:void(0);" class="flex-grow-1 ms-2 currency_name">Ethereum
                                                (ETH)</a>
                                        </div>
                                    </td>
                                    <td class="type text-danger">Sell</td>
                                    <td class="quantity_value">50</td>
                                    <td class="order_value or_val" data-orderval="187433.00">$1,87,433.00</td>
                                    <td class="avg_price sort-avg_price" data-av-price="3744.48">$3,744.48</td>
                                    <td class="price sort-price" data-price="3748.66">$3,748.66</td>
                                    <td class="status"><span
                                            class="badge bg-danger-subtle text-danger text-uppercase">Cancelled</span></td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="order_date time" data-timestamp="1639872000">19 Dec, 2021 <small
                                            class="text-muted">10:24AM</small></td>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ001</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xmr.svg') }}"
                                                    alt="" class="avatar-xxs" />
                                            </div>
                                            <a href="javascript:void(0);" class="flex-grow-1 ms-2 currency_name">Monero
                                                (XMR)</a>
                                        </div>
                                    </td>
                                    <td class="type text-danger">Sell</td>
                                    <td class="quantity_value">150</td>
                                    <td class="order_value or_val" data-orderval="33982.50">$33,982.50</td>
                                    <td class="avg_price sort-avg_price" data-av-price="227.30">$227.30</td>
                                    <td class="price sort-price" data-price="226.55">$226.55</td>
                                    <td class="status"><span
                                            class="badge bg-success-subtle text-success text-uppercase">Successful</span>
                                    </td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="order_date time" data-timestamp="1639872000">19 Dec, 2021 <small
                                            class="text-muted">11:20AM</small></td>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ001</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mkr.svg') }}"
                                                    alt="" class="avatar-xxs" />
                                            </div>
                                            <a href="javascript:void(0);" class="flex-grow-1 ms-2 currency_name">Maker
                                                (MKR)</a>
                                        </div>
                                    </td>
                                    <td class="type text-success">Buy</td>
                                    <td class="quantity_value">60</td>
                                    <td class="order_value or_val" data-orderval="143445.00">$1,43,445.00</td>
                                    <td class="avg_price sort-avg_price" data-av-price="2470.30">$2,470.30</td>
                                    <td class="price sort-price" data-price="2390.75">$2,390.75</td>
                                    <td class="status"><span
                                            class="badge bg-warning-subtle text-warning text-uppercase">Pending</span></td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="order_date time" data-timestamp="1639180800">11 Dec, 2021 <small
                                            class="text-muted">02:47PM</small></td>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ001</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ URL::asset('build/images/svg/crypto-icons/yfi.svg') }}"
                                                    alt="" class="avatar-xxs" />
                                            </div>
                                            <a href="javascript:void(0);"
                                                class="flex-grow-1 ms-2 currency_name">Yearn.finance (YFI)</a>
                                        </div>
                                    </td>
                                    <td class="type text-success">Buy</td>
                                    <td class="quantity_value">25</td>
                                    <td class="order_value or_val" data-orderval="981906.00">$9,81,906.00</td>
                                    <td class="avg_price sort-avg_price" data-av-price="37632.17">$37,632.17</td>
                                    <td class="price sort-price" data-price="39276.24">$39,276.24</td>
                                    <td class="status"><span
                                            class="badge bg-danger-subtle text-danger text-uppercase">Cancelled</span></td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="order_date time" data-timestamp="1638662400">05 Dec, 2021 <small
                                            class="text-muted">09:20AM</small></td>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ001</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mkr.svg') }}"
                                                    alt="" class="avatar-xxs" />
                                            </div>
                                            <a href="javascript:void(0);" class="flex-grow-1 ms-2 currency_name">Maker
                                                (MKR)</a>
                                        </div>
                                    </td>
                                    <td class="type text-danger">Sell</td>
                                    <td class="quantity_value">20</td>
                                    <td class="order_value or_val" data-orderval="50243.00">$50,243.00</td>
                                    <td class="avg_price sort-avg_price" data-av-price="2324.65">$2,324.65</td>
                                    <td class="price sort-price" data-price="2512.15">$2,512.15</td>
                                    <td class="status"><span
                                            class="badge bg-success-subtle text-success text-uppercase">Successful</span>
                                    </td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="order_date time" data-timestamp="1638057600">28 Nov, 2021 <small
                                            class="text-muted">11:42AM</small></td>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ001</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ URL::asset('build/images/svg/crypto-icons/ltc.svg') }}"
                                                    alt="" class="avatar-xxs" />
                                            </div>
                                            <a href="javascript:void(0);" class="flex-grow-1 ms-2 currency_name">Litecoin
                                                (LTC)</a>
                                        </div>
                                    </td>
                                    <td class="type text-success">Buy</td>
                                    <td class="quantity_value">200</td>
                                    <td class="order_value or_val" data-orderval="29500.00">$29,500.00</td>
                                    <td class="avg_price sort-avg_price" data-av-price="144.00">$144.00</td>
                                    <td class="price sort-price" data-price="147.50">$147.50</td>
                                    <td class="status"><span
                                            class="badge bg-warning-subtle text-warning text-uppercase">Pending</span></td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="order_date time" data-timestamp="1634601600">19 Nov, 2021 <small
                                            class="text-muted">03:36PM</small></td>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ001</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ URL::asset('build/images/svg/crypto-icons/xmr.svg') }}"
                                                    alt="" class="avatar-xxs" />
                                            </div>
                                            <a href="javascript:void(0);" class="flex-grow-1 ms-2 currency_name">Monero
                                                (XMR)</a>
                                        </div>
                                    </td>
                                    <td class="type text-danger">Sell</td>
                                    <td class="quantity_value">75</td>
                                    <td class="order_value or_val" data-orderval="17874.00">$17,874.00</td>
                                    <td class="avg_price sort-avg_price" data-av-price="221.61">$221.61</td>
                                    <td class="price sort-price" data-price="238.32">$238.32</td>
                                    <td class="status"><span
                                            class="badge bg-success-subtle text-success text-uppercase">Successful</span>
                                    </td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="order_date time" data-timestamp="1632700800">27 Oct, 2021 <small
                                            class="text-muted">03:36PM</small></td>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ001</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ URL::asset('build/images/svg/crypto-icons/dash.svg') }}"
                                                    alt="" class="avatar-xxs" />
                                            </div>
                                            <a href="javascript:void(0);" class="flex-grow-1 ms-2 currency_name">Dash
                                                (DASH)</a>
                                        </div>
                                    </td>
                                    <td class="type text-success">Buy</td>
                                    <td class="quantity_value">45</td>
                                    <td class="order_value or_val" data-orderval="14962.50">$14,962.50</td>
                                    <td class="avg_price sort-avg_price" data-av-price="147.39">$147.39</td>
                                    <td class="price sort-price" data-price="142.5">$142.5</td>
                                    <td class="status"><span
                                            class="badge bg-danger-subtle text-danger text-uppercase">Cancelled</span></td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="order_date time" data-timestamp="1632700800">27 Oct, 2021 <small
                                            class="text-muted">03:36PM</small></td>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ001</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ URL::asset('build/images/svg/crypto-icons/neo.svg') }}"
                                                    alt="" class="avatar-xxs" />
                                            </div>
                                            <a href="javascript:void(0);" class="flex-grow-1 ms-2 currency_name">Neo
                                                (NEO)</a>
                                        </div>
                                    </td>
                                    <td class="type text-danger">Sell</td>
                                    <td class="quantity_value">36</td>
                                    <td class="order_value or_val" data-orderval="77232.24">$77,232.24</td>
                                    <td class="avg_price sort-avg_price" data-av-price="2274.21">$2,274.21</td>
                                    <td class="price sort-price" data-price="2145.34">$2,145.34</td>
                                    <td class="status"><span
                                            class="badge bg-warning-subtle text-warning text-uppercase">Pending</span></td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="order_date time" data-timestamp="1632182400">21 Oct, 2021 <small
                                            class="text-muted">11:45AM</small></td>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ001</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ URL::asset('build/images/svg/crypto-icons/mln.svg') }}"
                                                    alt="" class="avatar-xxs" />
                                            </div>
                                            <a href="javascript:void(0);" class="flex-grow-1 ms-2 currency_name">Enzyme
                                                (MLN)</a>
                                        </div>
                                    </td>
                                    <td class="type text-danger">Sell</td>
                                    <td class="quantity_value">68</td>
                                    <td class="order_value or_val" data-orderval="6296.80">$6,296.80</td>
                                    <td class="avg_price sort-avg_price" data-av-price="94.21">$94.21</td>
                                    <td class="price sort-price" data-price="92.60">$92.60</td>
                                    <td class="status"><span
                                            class="badge bg-success-subtle text-success text-uppercase">Successful</span>
                                    </td>
                                </tr>
                                <!--end tr-->
                                <tr>
                                    <td class="order_date time" data-timestamp="1629763200">24 Sep, 2021 <small
                                            class="text-muted">02:32AM</small></td>
                                    <td class="id" style="display:none;"><a href="javascript:void(0);"
                                            class="fw-medium link-primary">#VZ001</a></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <img src="{{ URL::asset('build/images/svg/crypto-icons/eth.svg') }}"
                                                    alt="" class="avatar-xxs" />
                                            </div>
                                            <a href="javascript:void(0);" class="flex-grow-1 ms-2 currency_name">Ethereum
                                                (ETH)</a>
                                        </div>
                                    </td>
                                    <td class="type text-success">Buy</td>
                                    <td class="quantity_value">72</td>
                                    <td class="order_value or_val" data-orderval="2696602.56">$2,69,602.56</td>
                                    <td class="avg_price sort-avg_price" data-av-price="3744.48">$3,744.48</td>
                                    <td class="price sort-price" data-price="3748.66">$3,748.66</td>
                                    <td class="status"><span
                                            class="badge bg-danger-subtle text-danger text-uppercase">Cancelled</span></td>
                                </tr>
                                <!--end tr-->
                            </tbody>
                        </table>
                        <!--end table-->
                        <div class="noresult" style="display: none">
                            <div class="text-center">
                                <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                    colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px"></lord-icon>
                                <h5 class="mt-2">Sorry! No Result Found</h5>
                                <p class="text-muted mb-0">We've searched more than 150+ orders We did not find any orders
                                    for you search.</p>
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
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/list.js/list.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/list.pagination.js/list.pagination.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/crypto-orders.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
