@extends('layouts.master')
@section('title')
    @lang('translation.collections')
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
    <div class="row g-4 mb-3 align-items-center">
        <div class="col-sm-auto">
            <div>
                <h5 class="mb-0">Top Collections</h5>
            </div>
        </div>
        <!--end col-->
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end gap-2">
                <div class="search-box ms-2">
                    <input type="text" class="form-control" placeholder="Search...">
                    <i class="ri-search-line search-icon"></i>
                </div>

                <select class="form-control w-md" data-choices data-choices-search-false>
                    <option value="All">All</option>
                    <option value="Today" selected>Today</option>
                    <option value="Yesterday">Yesterday</option>
                    <option value="Last 7 Days">Last 7 Days</option>
                    <option value="Last 30 Days">Last 30 Days</option>
                    <option value="This Month">This Month</option>
                    <option value="Last Year">Last Year</option>
                </select>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row g-1 mb-3">
                        <div class="col-6">
                            <img src="{{ URL::asset('build/images/nft/img-06.jpg') }}" alt=""
                                class="img-fluid rounded">
                            <img src="https://img.themesbrand.com/velzon/images/img-2.gif" alt=""
                                class="img-fluid rounded mt-1">
                        </div>
                        <!--end col-->
                        <div class="col-6">
                            <img src="https://img.themesbrand.com/velzon/images/img-5.gif" alt=""
                                class="img-fluid rounded mb-1">
                            <img src="{{ URL::asset('build/images/nft/img-03.jpg') }}" alt=""
                                class="img-fluid rounded">
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <a href="#!" class="float-end"> View All <i class="ri-arrow-right-line align-bottom"></i></a>
                    <h5 class="mb-0 fs-16"><a href="#!">Artwork <span
                                class="badge bg-success-subtle text-success">206</span></a></h5>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row g-1 mb-3">
                        <div class="col-6">
                            <img src="{{ URL::asset('build/images/nft/img-05.jpg') }}" alt=""
                                class="img-fluid rounded">
                            <img src="https://img.themesbrand.com/velzon/images/img-1.gif" alt=""
                                class="img-fluid rounded mt-1">
                        </div>
                        <!--end col-->
                        <div class="col-6">
                            <img src="https://img.themesbrand.com/velzon/images/img-4.gif" alt=""
                                class="img-fluid rounded mb-1">
                            <img src="{{ URL::asset('build/images/nft/img-04.jpg') }}" alt=""
                                class="img-fluid rounded">
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <a href="#!" class="float-end"> View All <i class="ri-arrow-right-line align-bottom"></i></a>
                    <h5 class="mb-0 fs-16"><a href="#!">Crypto Card <span
                                class="badge bg-success-subtle text-success">743</span></a></h5>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row g-1 mb-3">
                        <div class="col-6">
                            <img src="{{ URL::asset('build/images/nft/img-02.jpg') }}" alt=""
                                class="img-fluid rounded">
                            <img src="https://img.themesbrand.com/velzon/images/img-3.gif" alt=""
                                class="img-fluid rounded mt-1">
                        </div>
                        <!--end col-->
                        <div class="col-6">
                            <img src="https://img.themesbrand.com/velzon/images/img-1.gif" alt=""
                                class="img-fluid rounded mb-1">
                            <img src="{{ URL::asset('build/images/nft/img-01.jpg') }}" alt=""
                                class="img-fluid rounded">
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <a href="#!" class="float-end"> View All <i class="ri-arrow-right-line align-bottom"></i></a>
                    <h5 class="mb-0 fs-16"><a href="#!">Music <span
                                class="badge bg-success-subtle text-success">679</span></a></h5>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row g-1 mb-3">
                        <div class="col-6">
                            <img src="{{ URL::asset('build/images/nft/img-03.jpg') }}" alt=""
                                class="img-fluid rounded">
                            <img src="https://img.themesbrand.com/velzon/images/img-5.gif" alt=""
                                class="img-fluid rounded mt-1">
                        </div>
                        <!--end col-->
                        <div class="col-6">
                            <img src="https://img.themesbrand.com/velzon/images/img-2.gif" alt=""
                                class="img-fluid rounded mb-1">
                            <img src="{{ URL::asset('build/images/nft/img-05.jpg') }}" alt=""
                                class="img-fluid rounded">
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <a href="#!" class="float-end"> View All <i class="ri-arrow-right-line align-bottom"></i></a>
                    <h5 class="mb-0 fs-16"><a href="#!">Games <span
                                class="badge bg-success-subtle text-success">341</span></a></h5>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row g-1 mb-3">
                        <div class="col-6">
                            <img src="{{ URL::asset('build/images/nft/img-02.jpg') }}" alt=""
                                class="img-fluid rounded">
                            <img src="https://img.themesbrand.com/velzon/images/img-3.gif" alt=""
                                class="img-fluid rounded mt-1">
                        </div>
                        <!--end col-->
                        <div class="col-6">
                            <img src="https://img.themesbrand.com/velzon/images/img-1.gif" alt=""
                                class="img-fluid rounded mb-1">
                            <img src="{{ URL::asset('build/images/nft/img-01.jpg') }}" alt=""
                                class="img-fluid rounded">
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <a href="#!" class="float-end"> View All <i class="ri-arrow-right-line align-bottom"></i></a>
                    <h5 class="mb-0 fs-16"><a href="#!">Photography <span
                                class="badge bg-success-subtle text-success">1452</span></a></h5>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row g-1 mb-3">
                        <div class="col-6">
                            <img src="{{ URL::asset('build/images/nft/img-05.jpg') }}" alt=""
                                class="img-fluid rounded">
                            <img src="https://img.themesbrand.com/velzon/images/img-1.gif" alt=""
                                class="img-fluid rounded mt-1">
                        </div>
                        <!--end col-->
                        <div class="col-6">
                            <img src="https://img.themesbrand.com/velzon/images/img-4.gif" alt=""
                                class="img-fluid rounded mb-1">
                            <img src="{{ URL::asset('build/images/nft/img-04.jpg') }}" alt=""
                                class="img-fluid rounded">
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <a href="#!" class="float-end"> View All <i class="ri-arrow-right-line align-bottom"></i></a>
                    <h5 class="mb-0 fs-16"><a href="#!">3d Style <span
                                class="badge bg-success-subtle text-success">4781</span></a></h5>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row g-1 mb-3">
                        <div class="col-6">
                            <img src="{{ URL::asset('build/images/nft/img-06.jpg') }}" alt=""
                                class="img-fluid rounded">
                            <img src="https://img.themesbrand.com/velzon/images/img-2.gif" alt=""
                                class="img-fluid rounded mt-1">
                        </div>
                        <!--end col-->
                        <div class="col-6">
                            <img src="https://img.themesbrand.com/velzon/images/img-5.gif" alt=""
                                class="img-fluid rounded mb-1">
                            <img src="{{ URL::asset('build/images/nft/img-03.jpg') }}" alt=""
                                class="img-fluid rounded">
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <a href="#!" class="float-end"> View All <i class="ri-arrow-right-line align-bottom"></i></a>
                    <h5 class="mb-0 fs-16"><a href="#!">Collectibles <span
                                class="badge bg-success-subtle text-success">3468</span></a></h5>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-md-4 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="row g-1 mb-3">
                        <div class="col-6">
                            <img src="{{ URL::asset('build/images/nft/img-03.jpg') }}" alt=""
                                class="img-fluid rounded">
                            <img src="https://img.themesbrand.com/velzon/images/img-5.gif" alt=""
                                class="img-fluid rounded mt-1">
                        </div>
                        <!--end col-->
                        <div class="col-6">
                            <img src="https://img.themesbrand.com/velzon/images/img-2.gif" alt=""
                                class="img-fluid rounded mb-1">
                            <img src="{{ URL::asset('build/images/nft/img-05.jpg') }}" alt=""
                                class="img-fluid rounded">
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <a href="#!" class="float-end"> View All <i class="ri-arrow-right-line align-bottom"></i></a>
                    <h5 class="mb-0 fs-16"><a href="#!">Videos <span
                                class="badge bg-success-subtle text-success">1674</span></a></h5>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row g-0 text-center text-sm-start align-items-center mb-4">
        <div class="col-sm-6">
            <div>
                <p class="mb-sm-0 text-muted">Showing <span class="fw-semibold">1</span> to <span
                        class="fw-semibold">8</span> of <span class="fw-semibold text-decoration-underline">12</span>
                    entries</p>
            </div>
        </div>
        <!-- end col -->
        <div class="col-sm-6">
            <ul class="pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                <li class="page-item disabled">
                    <a href="#" class="page-link">Previous</a>
                </li>
                <li class="page-item active">
                    <a href="#" class="page-link">1</a>
                </li>
                <li class="page-item ">
                    <a href="#" class="page-link">2</a>
                </li>
                <li class="page-item">
                    <a href="#" class="page-link">3</a>
                </li>
                <li class="page-item">
                    <a href="#" class="page-link">4</a>
                </li>
                <li class="page-item">
                    <a href="#" class="page-link">5</a>
                </li>
                <li class="page-item">
                    <a href="#" class="page-link">Next</a>
                </li>
            </ul>
        </div><!-- end col -->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
