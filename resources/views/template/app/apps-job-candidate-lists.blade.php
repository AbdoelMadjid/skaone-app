@extends('layouts.master')
@section('title')
    @lang('translation.list-view')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.apps')
        @endslot
        @slot('li_2')
            @lang('translation.jobs')
        @endslot
        @slot('li_3')
            @lang('translation.candidate-lists')
        @endslot
    @endcomponent
    <div class="row g-4 mb-4">
        <div class="col-sm-auto">
            <div>
                <a href="#!" class="btn btn-success"><i class="ri-add-line align-bottom me-1"></i> Add Candidate</a>
            </div>
        </div>
        <div class="col-sm">
            <div class="d-md-flex justify-content-sm-end gap-2">
                <div class="search-box ms-md-2 flex-shrink-0 mb-3 mb-md-0">
                    <input type="text" class="form-control" id="searchJob" autocomplete="off"
                        placeholder="Search for candidate name or designation...">
                    <i class="ri-search-line search-icon"></i>
                </div>

                <select class="form-control w-md" data-choices data-choices-search-false>
                    <option value="All">All</option>
                    <option value="Today">Today</option>
                    <option value="Yesterday" selected>Yesterday</option>
                    <option value="Last 7 Days">Last 7 Days</option>
                    <option value="Last 30 Days">Last 30 Days</option>
                    <option value="This Month">This Month</option>
                    <option value="Last Year">Last Year</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row gy-2 mb-2" id="candidate-list">
    </div>
    <!-- end row -->

    <div class="row g-0 justify-content-end mb-4" id="pagination-element">
        <!-- end col -->
        <div class="col-sm-6">
            <div
                class="pagination-block pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                <div class="page-item">
                    <a href="javascript:void(0);" class="page-link" id="page-prev">Previous</a>
                </div>
                <span id="page-num" class="pagination"></span>
                <div class="page-item">
                    <a href="javascript:void(0);" class="page-link" id="page-next">Next</a>
                </div>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('script')
    <!-- job-candidate-grid js -->
    <script src="{{ URL::asset('build/js/pages/job-candidate-lists.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
