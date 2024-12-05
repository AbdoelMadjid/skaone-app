@extends('layouts.master')
@section('title')
    @lang('translation.live-auction')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.apps')
        @endslot
        @slot('li_2')
            @lang('translation.nft-marketplace')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-header border-0">
                    <div class="d-lg-flex align-items-center">
                        <div class="flex-grow-1">
                            <h5 class="card-title mb-0">Live Auction</h5>
                        </div>
                        <div class="flex-shrink-0 mt-4 mt-lg-0">
                            <ul class="nav nav-pills filter-btns" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-medium active" type="button" data-filter="all">All
                                        Items</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-medium" type="button" data-filter="upto-15">Up to
                                        15%</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-medium" type="button" data-filter="upto-30">Up to
                                        30%</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link fw-medium" type="button" data-filter="upto-40">Up to
                                        40%</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xxl-3 col-lg-4 col-md-6 product-item upto-15">
                    <div class="card explore-box card-animate">
                        <div class="position-relative rounded overflow-hidden">
                            <img src="{{ URL::asset('build/images/nft/img-01.jpg') }}" alt=""
                                class="card-img-top explore-img">
                            <div class="discount-time">
                                <h5 id="auction-time-1" class="mb-0 text-white"></h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="fw-medium mb-0 float-end"><i class="mdi mdi-heart text-danger align-middle"></i>
                                19.29k </p>
                            <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 97.8 ETH </h5>
                            <h6 class="fs-16 mb-3"><a href="/apps_nft_item_details">Abstract Face Painting</a></h6>
                            <div>
                                <span class="text-muted float-end">Available: 436</span>
                                <span class="text-muted">Sold: 4187</span>
                                <div class="progress progress-sm mt-2">
                                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                                        style="width: 67%;" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-3 col-lg-4 col-md-6 product-item upto-30">
                    <div class="card explore-box card-animate">
                        <div class="position-relative rounded overflow-hidden">
                            <img src="https://img.themesbrand.com/velzon/images/img-1.gif" alt=""
                                class="card-img-top explore-img">
                            <div class="discount-time">
                                <h5 id="auction-time-2" class="mb-0 text-white"></h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="fw-medium mb-0 float-end"><i class="mdi mdi-heart text-danger align-middle"></i> 8.42k
                            </p>
                            <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 245.23ETH </h5>
                            <h6 class="fs-16 mb-3"><a href="/apps_nft_item_details">Patterns Arts & Culture</a></h6>
                            <div>
                                <span class="text-muted float-end">Available: 8974</span>
                                <span class="text-muted">Sold: 13</span>
                                <div class="progress progress-sm mt-2">
                                    <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                        style="width: 10%;" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-3 col-lg-4 col-md-6 product-item upto-40">
                    <div class="card explore-box card-animate">
                        <div class="position-relative rounded overflow-hidden">
                            <img src="{{ URL::asset('build/images/nft/img-03.jpg') }}" alt=""
                                class="card-img-top explore-img">
                            <div class="discount-time">
                                <h5 id="auction-time-3" class="mb-0 text-white"></h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="fw-medium mb-0 float-end"><i class="mdi mdi-heart text-danger align-middle"></i>
                                19.29k </p>
                            <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 67.36 ETH </h5>
                            <h6 class="fs-16 mb-3"><a href="/apps_nft_item_details">Creative Filtered Portrait</a></h6>
                            <div>
                                <span class="text-muted float-end">Available: 3620</span>
                                <span class="text-muted">Sold: 345</span>
                                <div class="progress progress-sm mt-2">
                                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                                        style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-3 col-lg-4 col-md-6 product-item upto-15">
                    <div class="card explore-box card-animate">
                        <div class="position-relative rounded overflow-hidden">
                            <img src="{{ URL::asset('build/images/nft/img-04.jpg') }}" alt=""
                                class="card-img-top explore-img">
                            <div class="discount-time">
                                <h5 id="auction-time-4" class="mb-0 text-white"></h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="fw-medium mb-0 float-end"><i class="mdi mdi-heart text-danger align-middle"></i>
                                34.12k </p>
                            <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 34.81 ETH </h5>
                            <h6 class="fs-16 mb-3"><a href="/apps_nft_item_details">Smillevers Crypto</a></h6>
                            <div>
                                <span class="text-muted float-end">Available: 3521</span>
                                <span class="text-muted">Sold: 1457</span>
                                <div class="progress progress-sm mt-2">
                                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                                        style="width: 67%;" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-3 col-lg-4 col-md-6 product-item upto-40">
                    <div class="card explore-box card-animate">
                        <div class="position-relative rounded overflow-hidden">
                            <img src="https://img.themesbrand.com/velzon/images/img-5.gif" alt=""
                                class="card-img-top explore-img">
                            <div class="discount-time">
                                <h5 id="auction-time-5" class="mb-0 text-white"></h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="fw-medium mb-0 float-end"><i class="mdi mdi-heart text-danger align-middle"></i>
                                47.12k </p>
                            <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 245.23ETH </h5>
                            <h6 class="fs-16 mb-3"><a href="/apps_nft_item_details">Long-tailed Macaque</a></h6>
                            <div>
                                <span class="text-muted float-end">Available: 30</span>
                                <span class="text-muted">Sold: 1369</span>
                                <div class="progress progress-sm mt-2">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                        style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-3 col-lg-4 col-md-6 product-item upto-15">
                    <div class="card explore-box card-animate">
                        <div class="position-relative rounded overflow-hidden">
                            <img src="{{ URL::asset('build/images/nft/img-02.jpg') }}" alt=""
                                class="card-img-top explore-img">
                            <div class="discount-time">
                                <h5 id="auction-time-6" class="mb-0 text-white"></h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="fw-medium mb-0 float-end"><i class="mdi mdi-heart text-danger align-middle"></i>
                                23.63k </p>
                            <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 394.7 ETH </h5>
                            <h6 class="fs-16 mb-3"><a href="/apps_nft_item_details">The Chirstoper</a></h6>
                            <div>
                                <span class="text-muted float-end">Available: 1474</span>
                                <span class="text-muted">Sold: 7451</span>
                                <div class="progress progress-sm mt-2">
                                    <div class="progress-bar progress-bar-striped bg-warning" role="progressbar"
                                        style="width: 83%;" aria-valuenow="83" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-3 col-lg-4 col-md-6 product-item upto-30">
                    <div class="card explore-box card-animate">
                        <div class="position-relative rounded overflow-hidden">
                            <img src="{{ URL::asset('build/images/nft/img-06.jpg') }}" alt=""
                                class="card-img-top explore-img">
                            <div class="discount-time">
                                <h5 id="auction-time-7" class="mb-0 text-white"></h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="fw-medium mb-0 float-end"><i class="mdi mdi-heart text-danger align-middle"></i>
                                36.42k </p>
                            <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 745.14 ETH </h5>
                            <h6 class="fs-16 mb-3"><a href="/apps_nft_item_details">Robotic Body Art</a></h6>
                            <div>
                                <span class="text-muted float-end">Available: 4563</span>
                                <span class="text-muted">Sold: 1024</span>
                                <div class="progress progress-sm mt-2">
                                    <div class="progress-bar progress-bar-striped bg-primary" role="progressbar"
                                        style="width: 24%;" aria-valuenow="24" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-3 col-lg-4 col-md-6 product-item upto-15">
                    <div class="card explore-box card-animate">
                        <div class="position-relative rounded overflow-hidden">
                            <img src="https://img.themesbrand.com/velzon/images/img-4.gif" alt=""
                                class="card-img-top explore-img">
                            <div class="discount-time">
                                <h5 id="auction-time-8" class="mb-0 text-white"></h5>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="fw-medium mb-0 float-end"><i class="mdi mdi-heart text-danger align-middle"></i>
                                94.1k </p>
                            <h5 class="text-success"><i class="mdi mdi-ethereum"></i> 245.23ETH </h5>
                            <h6 class="fs-16 mb-3"><a href="/apps_nft_item_details">Evolved Reality</a></h6>
                            <div>
                                <span class="text-muted float-end">Available: 26</span>
                                <span class="text-muted">Sold: 9974</span>
                                <div class="progress progress-sm mt-2">
                                    <div class="progress-bar progress-bar-striped bg-danger" role="progressbar"
                                        style="width: 97%;" aria-valuenow="97" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center mb-3">
                        <button class="btn btn-link text-success mt-2"><i
                                class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load more </button>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xxl-3">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h6 class="card-title mb-0 flex-grow-1">Top Drop</h6>
                    <a class="text-muted" href="#">
                        See All <i class="ri-arrow-right-line align-bottom"></i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless align-middle">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('build/images/nft/img-03.jpg') }}" alt=""
                                                class="avatar-sm object-fit-cover rounded-circle">
                                            <div class="ms-2">
                                                <a href="/apps_nft_item_details">
                                                    <h6 class="fs-15 mb-1">Creative filtered portrait</h6>
                                                </a>
                                                <p class="mb-0 text-muted">Sold at 34.81 ETH</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><small>Just Now</small></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://img.themesbrand.com/velzon/images/img-4.gif" alt=""
                                                class="avatar-sm object-fit-cover rounded-circle">
                                            <div class="ms-2">
                                                <a href="/apps_nft_item_details">
                                                    <h6 class="fs-15 mb-1">Patterns arts & culture</h6>
                                                </a>
                                                <p class="mb-0 text-muted">Sold at 147.83 ETH</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><small>3 sec ago</small></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="https://img.themesbrand.com/velzon/images/img-3.gif" alt=""
                                                class="avatar-sm object-fit-cover rounded-circle">
                                            <div class="ms-2">
                                                <a href="/apps_nft_item_details">
                                                    <h6 class="fs-15 mb-1">Evolved Reality</h6>
                                                </a>
                                                <p class="mb-0 text-muted">Sold at 34.81 ETH</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><small>2 min ago</small></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('build/images/nft/img-04.jpg') }}" alt=""
                                                class="avatar-sm object-fit-cover rounded-circle">
                                            <div class="ms-2">
                                                <a href="/apps_nft_item_details">
                                                    <h6 class="fs-15 mb-1">Smillevers Crypto</h6>
                                                </a>
                                                <p class="mb-0 text-muted">Sold at 47.9 ETH</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><small>26 min ago</small></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('build/images/nft/img-05.jpg') }}" alt=""
                                                class="avatar-sm object-fit-cover rounded-circle">
                                            <div class="ms-2">
                                                <a href="/apps_nft_item_details">
                                                    <h6 class="fs-15 mb-1">Robotic Body Art</h6>
                                                </a>
                                                <p class="mb-0 text-muted">Sold at 134.32 ETH</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><small>1 hrs ago</small></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('build/images/nft/img-02.jpg') }}" alt=""
                                                class="avatar-sm object-fit-cover rounded-circle">
                                            <div class="ms-2">
                                                <a href="/apps_nft_item_details">
                                                    <h6 class="fs-15 mb-1">Trendy fashion portraits</h6>
                                                </a>
                                                <p class="mb-0 text-muted">Sold at 643.19 ETH</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><small>3 hrs ago</small></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h6 class="card-title mb-0 flex-grow-1">Top Creator</h6>
                    <a class="text-muted" href="/apps_nft_item_details">
                        See All <i class="ri-arrow-right-line align-bottom"></i>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless align-middle">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('build/images/users/avatar-1.jpg') }}" alt=""
                                                class="avatar-sm object-fit-cover rounded-circle">
                                            <div class="ms-2">
                                                <a href="#!">
                                                    <h6 class="fs-15 mb-1">Herbert Stokes</h6>
                                                </a>
                                                <p class="mb-0 text-muted">23 Products</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><button class="btn btn-success btn-sm">Follow</button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}" alt=""
                                                class="avatar-sm object-fit-cover rounded-circle">
                                            <div class="ms-2">
                                                <a href="#!">
                                                    <h6 class="fs-15 mb-1">Thomas Taylor</h6>
                                                </a>
                                                <p class="mb-0 text-muted">123 Products</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><button class="btn btn-soft-success btn-sm">Unfllow</button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('build/images/users/avatar-5.jpg') }}" alt=""
                                                class="avatar-sm object-fit-cover rounded-circle">
                                            <div class="ms-2">
                                                <a href="#!">
                                                    <h6 class="fs-15 mb-1">Henry Baird</h6>
                                                </a>
                                                <p class="mb-0 text-muted">46 Products</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><button class="btn btn-success btn-sm">Follow</button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('build/images/users/avatar-10.jp') }}g"
                                                alt="" class="avatar-sm object-fit-cover rounded-circle">
                                            <div class="ms-2">
                                                <a href="#!">
                                                    <h6 class="fs-15 mb-1">Nancy Martino</h6>
                                                </a>
                                                <p class="mb-0 text-muted">845 Products</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><button class="btn btn-success btn-sm">Follow</button></td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ URL::asset('build/images/users/avatar-8.jpg') }}" alt=""
                                                class="avatar-sm object-fit-cover rounded-circle">
                                            <div class="ms-2">
                                                <a href="#!">
                                                    <h6 class="fs-15 mb-1">James Price</h6>
                                                </a>
                                                <p class="mb-0 text-muted">318 Products</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td><button class="btn btn-soft-success btn-sm">Unfllow</button></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/pages/apps-nft-auction.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
