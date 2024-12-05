@extends('layouts.master')
@section('title')
    @lang('translation.job-categories')
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
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row justify-content-between gy-3">
                        <div class="col-lg-3">
                            <div class="search-box">
                                <input type="text" class="form-control search" placeholder="Search for job categories...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <div class="col-lg-auto">
                            <div class="d-md-flex text-nowrap gap-2">
                                <button class="btn btn-info add-btn"><i class="ri-add-fill me-1 align-bottom"></i> Add
                                    Categories</button>
                                <button class="btn btn-danger"><i class="ri-filter-2-line me-1 align-bottom"></i>
                                    Filters</button>
                                <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown"
                                    aria-expanded="false" class="btn btn-soft-info"><i class="ri-more-2-fill"></i></button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <li><a class="dropdown-item" href="#">All</a></li>
                                    <li><a class="dropdown-item" href="#">Last Week</a></li>
                                    <li><a class="dropdown-item" href="#">Last Month</a></li>
                                    <li><a class="dropdown-item" href="#">Last Year</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row row-cols-xxl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
        <div class="col">
            <div class="card">
                <div class="card-body text-center py-4">
                    <lord-icon src="https://cdn.lordicon.com/xulniijg.json" trigger="hover" colors="primary:#405189"
                        target="div" style="width:50px;height:50px"></lord-icon>
                    <a href="#!" class="stretched-link">
                        <h5 class="mt-4">Business Development</h5>
                    </a>
                    <p class="text-muted mb-0">102 Position</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center py-4">
                    <lord-icon src="https://cdn.lordicon.com/oclwxpmm.json" trigger="hover" colors="primary:#405189"
                        target="div" style="width:50px;height:50px"></lord-icon>
                    <a href="#!" class="stretched-link">
                        <h5 class="mt-4">Automotive Jobs</h5>
                    </a>
                    <p class="text-muted mb-0">64 Position</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center py-4">
                    <lord-icon src="https://cdn.lordicon.com/dklbhvrt.json" trigger="hover" colors="primary:#405189"
                        target="div" style="width:50px;height:50px"></lord-icon>
                    <a href="#!" class="stretched-link">
                        <h5 class="mt-4">Construction / Facilities</h5>
                    </a>
                    <p class="text-muted mb-0">35 Position</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center py-4">
                    <lord-icon src="https://cdn.lordicon.com/adwosptt.json" trigger="hover" colors="primary:#405189"
                        target="div" style="width:50px;height:50px"></lord-icon>
                    <a href="#!" class="stretched-link">
                        <h5 class="mt-4">Design, Art & Multimedia</h5>
                    </a>
                    <p class="text-muted mb-0">49 Position</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center py-4">
                    <lord-icon src="https://cdn.lordicon.com/kkcllwsu.json" trigger="hover" colors="primary:#405189"
                        target="div" style="width:50px;height:50px"></lord-icon>
                    <a href="#!" class="stretched-link">
                        <h5 class="mt-4">Healthcare</h5>
                    </a>
                    <p class="text-muted mb-0">97 Position</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center py-4">
                    <lord-icon src="https://cdn.lordicon.com/rahcoaeu.json" trigger="hover" colors="primary:#405189"
                        target="div" style="width:50px;height:50px"></lord-icon>
                    <a href="#!" class="stretched-link">
                        <h5 class="mt-4">Sales & Marketing</h5>
                    </a>
                    <p class="text-muted mb-0">312 Position</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center py-4">
                    <lord-icon src="https://cdn.lordicon.com/smauprql.json" trigger="hover" colors="primary:#405189"
                        target="div" style="width:50px;height:50px"></lord-icon>
                    <a href="#!" class="stretched-link">
                        <h5 class="mt-4">Accounting / Finance</h5>
                    </a>
                    <p class="text-muted mb-0">62 Position</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center py-4">
                    <lord-icon src="https://cdn.lordicon.com/itykargr.json" trigger="hover" colors="primary:#405189"
                        target="div" style="width:50px;height:50px"></lord-icon>
                    <a href="#!" class="stretched-link">
                        <h5 class="mt-4">Project Management</h5>
                    </a>
                    <p class="text-muted mb-0">35 Position</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center py-4">
                    <lord-icon src="https://cdn.lordicon.com/cnyeuzxc.json" trigger="hover" colors="primary:#405189"
                        target="div" style="width:50px;height:50px"></lord-icon>
                    <a href="#!" class="stretched-link">
                        <h5 class="mt-4">Costomer Services</h5>
                    </a>
                    <p class="text-muted mb-0">35 Position</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center py-4">
                    <lord-icon src="https://cdn.lordicon.com/sygggnra.json" trigger="hover" colors="primary:#405189"
                        target="div" style="width:50px;height:50px"></lord-icon>
                    <a href="#!" class="stretched-link">
                        <h5 class="mt-4">Content Writer</h5>
                    </a>
                    <p class="text-muted mb-0">746 Position</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center py-4">
                    <lord-icon src="https://cdn.lordicon.com/hfmdczge.json" trigger="hover" colors="primary:#405189"
                        target="div" style="width:50px;height:50px"></lord-icon>
                    <a href="#!" class="stretched-link">
                        <h5 class="mt-4">Government Jobs</h5>
                    </a>
                    <p class="text-muted mb-0">642 Position</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center py-4">
                    <lord-icon src="https://cdn.lordicon.com/xhebrhsj.json" trigger="hover" colors="primary:#405189"
                        target="div" style="width:50px;height:50px"></lord-icon>
                    <a href="#!" class="stretched-link">
                        <h5 class="mt-4">Digital Marketing</h5>
                    </a>
                    <p class="text-muted mb-0">364 Position</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center py-4">
                    <lord-icon src="https://cdn.lordicon.com/ucvsemjq.json" trigger="hover" colors="primary:#405189"
                        target="div" style="width:50px;height:50px"></lord-icon>
                    <a href="#!" class="stretched-link">
                        <h5 class="mt-4">Education & training</h5>
                    </a>
                    <p class="text-muted mb-0">35 Position</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center py-4">
                    <lord-icon src="https://cdn.lordicon.com/pvbjsfif.json" trigger="hover" colors="primary:#405189"
                        target="div" style="width:50px;height:50px"></lord-icon>
                    <a href="#!" class="stretched-link">
                        <h5 class="mt-4">IT & Software</h5>
                    </a>
                    <p class="text-muted mb-0">35 Position</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-body text-center py-4">
                    <lord-icon src="https://cdn.lordicon.com/auvicynv.json" trigger="hover" colors="primary:#405189"
                        target="div" style="width:50px;height:50px"></lord-icon>
                    <a href="#!" class="stretched-link">
                        <h5 class="mt-4">Catering & Tourism</h5>
                    </a>
                    <p class="text-muted mb-0">35 Position</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="text-center mb-3">
                <button class="btn btn-link text-success mt-2" id="loadmore"><i
                        class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load More </button>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
