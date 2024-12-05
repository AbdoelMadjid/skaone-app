@extends('layouts.master')
@section('title')
    @lang('translation.statistics')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.apps')
        @endslot
        @slot('li_2')
            @lang('translation.jobs')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-height-100">
                <div class="d-flex">
                    <div class="flex-grow-1 p-3">
                        <h5 class="mb-3">Application</h5>
                        <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i
                                    class="ri-arrow-up-line align-middle"></i> 16.24 % </span> vs. previous month</p>
                    </div>
                    <div>
                        <div class="apex-charts" data-colors='["--vz-success" , "--vz-transparent"]' dir="ltr"
                            id="results_sparkline_charts3"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-md-6">
            <div class="card card-height-100">
                <div class="d-flex">
                    <div class="flex-grow-1 p-3">
                        <h5 class="mb-3">Interviewed</h5>
                        <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i
                                    class="ri-arrow-up-line align-middle"></i> 34.24 % </span> vs. previous month</p>
                    </div>
                    <div>
                        <div class="apex-charts" data-colors='["--vz-success" , "--vz-transparent"]' dir="ltr"
                            id="results_sparkline_charts4"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-md-6">
            <div class="card card-height-100">
                <div class="d-flex">
                    <div class="flex-grow-1 p-3">
                        <h5 class="mb-3">Hired</h5>
                        <p class="mb-0 text-muted"><span class="badge bg-light text-success mb-0"> <i
                                    class="ri-arrow-up-line align-middle"></i> 6.67 % </span> vs. previous month</p>
                    </div>
                    <div>
                        <div class="apex-charts" data-colors='["--vz-success" , "--vz-transparent"]' dir="ltr"
                            id="results_sparkline_charts"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-md-6">
            <div class="card card-height-100">
                <div class="d-flex">
                    <div class="flex-grow-1 p-3">
                        <h5 class="mb-3">Rejected</h5>
                        <p class="mb-0 text-muted"><span class="badge bg-light text-danger mb-0"> <i
                                    class="ri-arrow-down-line align-middle"></i> 3.24 % </span> vs. previous month</p>
                    </div>
                    <div>
                        <div class="apex-charts" data-colors='["--vz-danger", "--vz-transparent"]' dir="ltr"
                            id="results_sparkline_charts2"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <h5 class="card-title mb-0 flex-grow-1  ">Visitor Graph</h5>
                        <div class="flex-shrink-0">
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span
                                        class="text-muted">Current Week<i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Today</a>
                                    <a class="dropdown-item" href="#">Last Week</a>
                                    <a class="dropdown-item" href="#">Last Month</a>
                                    <a class="dropdown-item" href="#">Current Year</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div id="distributed_treemap"
                        data-colors='["--vz-primary", "--vz-secondary", "--vz-success", "--vz-info","--vz-warning", "--vz-danger"]'
                        class="apex-charts" dir="ltr"></div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-4">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Users by Device</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="text-muted fs-16"><i class="mdi mdi-dots-vertical align-middle"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Last Week</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Current Year</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body">
                    <div id="user_device_pie_charts" data-colors='["--vz-primary", "--vz-warning", "--vz-info"]'
                        class="apex-charts" dir="ltr"></div>

                    <div class="table-responsive mt-3">
                        <table class="table table-borderless table-sm table-centered align-middle table-nowrap mb-0">
                            <tbody class="border-0">
                                <tr>
                                    <td>
                                        <h4 class="text-truncate fs-14 fs-medium mb-0"><i
                                                class="ri-stop-fill align-middle fs-18 text-primary me-2"></i>Desktop Users
                                        </h4>
                                    </td>
                                    <td>
                                        <p class="text-muted mb-0"><i data-feather="users"
                                                class="me-2 icon-sm"></i>78.56k</p>
                                    </td>
                                    <td class="text-end">
                                        <p class="text-success fw-medium fs-12 mb-0"><i
                                                class="ri-arrow-up-s-fill fs-5 align-middle"></i>2.08% </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 class="text-truncate fs-14 fs-medium mb-0"><i
                                                class="ri-stop-fill align-middle fs-18 text-warning me-2"></i>Mobile Users
                                        </h4>
                                    </td>
                                    <td>
                                        <p class="text-muted mb-0"><i data-feather="users"
                                                class="me-2 icon-sm"></i>105.02k</p>
                                    </td>
                                    <td class="text-end">
                                        <p class="text-danger fw-medium fs-12 mb-0"><i
                                                class="ri-arrow-down-s-fill fs-5 align-middle"></i>10.52%
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 class="text-truncate fs-14 fs-medium mb-0"><i
                                                class="ri-stop-fill align-middle fs-18 text-info me-2"></i>Tablet Users
                                        </h4>
                                    </td>
                                    <td>
                                        <p class="text-muted mb-0"><i data-feather="users"
                                                class="me-2 icon-sm"></i>42.89k</p>
                                    </td>
                                    <td class="text-end">
                                        <p class="text-danger fw-medium fs-12 mb-0"><i
                                                class="ri-arrow-down-s-fill fs-5 align-middle"></i>7.36%
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div>
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-xxl-4 col-md-6">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Your Network Summary</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span
                                    class="text-muted">Monthly<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Weekly</a>
                                <a class="dropdown-item" href="#">Monthly</a>
                                <a class="dropdown-item" href="#">Yearly</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body pb-0">
                    <div id="deal-type-charts" data-colors='["--vz-primary", "--vz-info"]' class="apex-charts"
                        dir="ltr"></div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xxl-8 col-md-6">
            <div class="card card-height-100">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Jobs Summary</h4>
                    <div class="flex-shrink-0">
                        <div class="dropdown card-header-dropdown">
                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span
                                    class="text-muted">Current Year<i class="mdi mdi-chevron-down ms-1"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="#">Today</a>
                                <a class="dropdown-item" href="#">Last Week</a>
                                <a class="dropdown-item" href="#">Last Month</a>
                                <a class="dropdown-item" href="#">Current Year</a>
                            </div>
                        </div>
                    </div>
                </div><!-- end card header -->
                <div class="card-body px-0">
                    <div id="revenue-expenses-charts"
                        data-colors='["--vz-success","--vz-primary", "--vz-info", "--vz-danger"]' class="apex-charts"
                        dir="ltr"></div>
                </div>
            </div><!-- end card -->
        </div><!-- end col -->
    </div>
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- job-statistics js -->
    <script src="{{ URL::asset('build/js/pages/job-statistics.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
