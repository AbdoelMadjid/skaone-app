@extends('layouts.master')
@section('title')
    @lang('translation.lists')
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
            @lang('translation.job-lists')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h6 class="card-title mb-0 flex-grow-1">Search Jobs</h6>
                        <div class="flex-shrink-0">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#CreateJobModal"><i
                                    class="ri-add-line align-bottom me-1"></i> Create New Job</button>
                        </div>
                    </div>

                    <div class="row mt-3 gy-3">
                        <div class="col-xxl-10 col-md-6">
                            <div class="search-box">
                                <input type="text" class="form-control search bg-light border-light" id="searchJob"
                                    autocomplete="off" placeholder="Search for jobs or companies...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <div class="col-xxl-2 col-md-6">
                            <div class="input-light">
                                <select class="form-control" data-choices data-choices-search-false
                                    name="choices-single-default" id="idStatus">
                                    <option value="All">All Selected</option>
                                    <option value="Newest" selected>Newest</option>
                                    <option value="Popular">Popular</option>
                                    <option value="Oldest">Oldest</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xl-12 d-none" id="found-job-alert">
                            <div class="alert alert-success mb-0 text-center" role="alert">
                                <strong id="total-result">253</strong> jobs found
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xxl-9">
            <div id="job-list"></div>

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

        </div>
        <!--end col-->
        <div class="col-xxl-3">
            <div class="card job-list-view-card overflow-hidden" id="job-overview">
                <img src="{{ URL::asset('build/images/small/img-10.jpg') }}" alt="" id="cover-img"
                    class="img-fluid background object-fit-cover">
                <div class="card-body">
                    <div class="avatar-md mt-n5">
                        <div class="avatar-title bg-light rounded-circle">
                            <img src="{{ URL::asset('build/images/companies/img-7.png') }}" alt=""
                                class="avatar-xs view-companylogo">
                        </div>
                    </div>
                    <div class="mt-3">
                        <h5 class="view-title">Product Designer</h5>
                        <div class="hstack gap-3 mb-3">
                            <span class="text-muted"><i class="ri-building-line me-1 align-bottom"></i> <span
                                    class="view-companyname">Themesbrand</span></span>
                            <span class="text-muted"><i class="ri-map-pin-2-line me-1 align-bottom"></i> <span
                                    class="view-location">United Kingdom</span></span>
                        </div>
                        <p class="text-muted view-desc">A UI/UX designer's job is to create user-friendly interfaces that
                            enable users to understand how to use complex technical products. If you're passionate about the
                            latest technology trends and devices, you'll find great fulfillment in being involved in the
                            design process for the next hot gadget.</p>
                        <div class="py-3 border border-dashed border-start-0 border-end-0 mt-4">
                            <div class="row">
                                <div class="col-lg-4 col-sm-6">
                                    <div>
                                        <p class="mb-2 text-uppercase fw-medium fs-12 text-muted">Job Type</p>
                                        <h5 class="fs-14 mb-0 view-type">Full Time</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div>
                                        <p class="mb-2 text-uppercase fw-medium fs-12 text-muted">Post Date</p>
                                        <h5 class="fs-14 mb-0 view-postdate">15 Sep, 2022</h5>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6">
                                    <div>
                                        <p class="mb-2 text-uppercase fw-medium fs-12 text-muted">Experience</p>
                                        <h5 class="fs-14 mb-0 view-experience">0 - 5 Year</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4">
                        <h5 class="mb-3">Application Summary</h5>

                        <div>
                            <div id="simple_dount_chart"
                                data-colors='["--vz-info", "--vz-primary", "--vz-danger", "--vz-danger", "--vz-info"]'
                                class="apex-charts" dir="ltr"></div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <button type="button" class="btn btn-success w-100">Apply Now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="CreateJobModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <form id="createjob-form" autocomplete="off" class="needs-validation" novalidate>
                    <div class="modal-body">
                        <input type="hidden" id="id-field" />
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <div class="px-1 pt-1">
                                    <div
                                        class="modal-team-cover position-relative mb-0 mt-n4 mx-n4 rounded-top overflow-hidden">
                                        <img src="{{ URL::asset('build/images/small/img-9.jpg') }}" alt=""
                                            id="modal-cover-img" class="img-fluid">

                                        <div class="d-flex position-absolute start-0 end-0 top-0 p-3">
                                            <div class="flex-grow-1">
                                                <h5 class="modal-title text-white" id="exampleModalLabel">Create New Job
                                                </h5>
                                            </div>
                                            <div class="flex-shrink-0">
                                                <div class="d-flex gap-3 align-items-center">
                                                    <div>
                                                        <label for="cover-image-input" class="mb-0"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            title="Select Cover Image">
                                                            <div class="avatar-xs">
                                                                <div
                                                                    class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                    <i class="ri-image-fill"></i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <input class="form-control d-none" value=""
                                                            id="cover-image-input" type="file"
                                                            accept="image/png, image/gif, image/jpeg">
                                                    </div>
                                                    <button type="button" class="btn-close btn-close-white"
                                                        id="close-jobListModal" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center mb-4 mt-n5 pt-2">
                                    <div class="position-relative d-inline-block">
                                        <div class="position-absolute bottom-0 end-0">
                                            <label for="companylogo-image-input" class="mb-0" data-bs-toggle="tooltip"
                                                data-bs-placement="right" title="Select Image">
                                                <div class="avatar-xs cursor-pointer">
                                                    <div class="avatar-title bg-light border rounded-circle text-muted">
                                                        <i class="ri-image-fill"></i>
                                                    </div>
                                                </div>
                                            </label>
                                            <input class="form-control d-none" value=""
                                                id="companylogo-image-input" type="file"
                                                accept="image/png, image/gif, image/jpeg">
                                        </div>
                                        <div class="avatar-lg p-1">
                                            <div class="avatar-title bg-light rounded-circle">
                                                <img src="{{ URL::asset('build/images/users/multi-user.jpg') }}"
                                                    id="companylogo-img"
                                                    class="avatar-md rounded-circle object-fit-cover" />
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="fs-13 mt-3">Company Logo</h5>
                                </div>
                                <div>
                                    <label for="jobtitle-field" class="form-label">Job Title</label>
                                    <input type="text" id="jobtitle-field" class="form-control"
                                        placeholder="Enter job title" required />
                                    <div class="invalid-feedback">Please enter a job title.</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="companyname-field" class="form-label">Company Name</label>
                                    <input type="text" id="companyname-field" class="form-control"
                                        placeholder="Enter company name" required />
                                    <div class="invalid-feedback">Please enter a company name.</div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div>
                                    <label for="job_type-field" class="form-label">Job Type</label>
                                    <select class="form-select" id="job_type-field" required>
                                        <option value="Full Time">Full Time</option>
                                        <option value="Part Time">Part Time</option>
                                        <option value="Freelance">Freelance</option>
                                        <option value="Internship">Internship</option>
                                    </select>
                                    <div class="invalid-feedback">Please select a job type.</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <label for="experience-field" class="form-label">Experience</label>
                                    <input type="text" id="experience-field" class="form-control"
                                        placeholder="Enter experience" required />
                                    <div class="invalid-feedback">Please enter a job experience.</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <label for="location-field" class="form-label">Location</label>
                                    <input type="text" id="location-field" class="form-control"
                                        placeholder="Enter location" required />
                                    <div class="invalid-feedback">Please enter a location.</div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div>
                                    <label for="Salary-field" class="form-label">Salary</label>
                                    <input type="number" id="Salary-field" class="form-control"
                                        placeholder="Enter salary" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label for="website-field" class="form-label">Tags</label>
                                    <input class="form-control" id="taginput-choices" data-choices
                                        data-choices-text-unique-true type="text" value="Design, Remote" />
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div>
                                    <label for="description-field" class="form-label">Description</label>
                                    <textarea class="form-control" id="description-field" rows="3" placeholder="Enter description" required></textarea>
                                    <div class="invalid-feedback">Please enter a description.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" id="add-btn">Add Job</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end add modal-->
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ URL::asset('build/js/pages/job-list.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
