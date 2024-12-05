@extends('layouts.master')
@section('title')
    @lang('translation.sellers')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.apps')
        @endslot
        @slot('li_2')
            @lang('translation.ecommerce')
        @endslot
    @endcomponent
    <div class="card">
        <div class="card-header border-0 rounded">
            <div class="row g-2">
                <div class="col-xl-3">
                    <div class="search-box">
                        <input type="text" class="form-control" autocomplete="off" id="searchResultList"
                            placeholder="Search for sellers & owner name or something..."> <i
                            class="ri-search-line search-icon"></i>
                    </div>
                </div>
                <!--end col-->
                <div class="col-xxl-3 ms-auto">
                    <div>
                        <select class="form-control" id="category-select">
                            <option value="All">Select Categories</option>
                            <option value="All">All</option>
                            <option value="Retailer">Retailer</option>
                            <option value="Health & Medicine">Health & Medicine</option>
                            <option value="Manufacturer">Manufacturer</option>
                            <option value="Food Service">Food Service</option>
                            <option value="Computers & Electronics">Computers & Electronics</option>
                        </select>
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-auto">
                    <div class="hstack gap-2">
                        <button type="button" class="btn btn-danger"><i class="ri-equalizer-fill me-1 align-bottom"></i>
                            Filters</button>
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addSeller"><i
                                class="ri-add-fill me-1 align-bottom"></i> Add Seller</button>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
    </div>

    <div class="row mt-4" id="seller-list"></div>
    <!--end row-->

    <div class="row align-items-center mb-4 text-center text-sm-start" id="pagination-element">
        <div class="col-sm">
            <div class="text-muted">
                Showing 1 to 8 of 12 entries
            </div>
        </div>
        <div class="col-sm-auto  mt-3 mt-sm-0">
            <div
                class="pagination-block pagination pagination-separated justify-content-center justify-content-sm-end mb-sm-0">
                <div class="page-item">
                    <a href="javascript:void(0);" class="page-link" id="page-prev"><i class="mdi mdi-chevron-left"></i></a>
                </div>
                <span id="page-num" class="pagination"></span>
                <div class="page-item">
                    <a href="javascript:void(0);" class="page-link" id="page-next"><i class="mdi mdi-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- pagination-element -->

    <div id="noresult" class="d-none">
        <div class="text-center py-4">
            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                colors="primary:#405189,secondary:#0ab39c" style="width:75px;height:75px"></lord-icon>
            <h5 class="mt-2">Sorry! No Result Found</h5>
            <p class="text-muted mb-0">We've searched more than 150+ sellers We did not find any sellers for you search.</p>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade zoomIn" id="addSeller" tabindex="-1" aria-labelledby="addSellerLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSellerLabel">Add Seller</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-content border-0 mt-3">
                    <ul class="nav nav-tabs nav-tabs-custom nav-success p-2 pb-0 bg-light" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails" role="tab"
                                aria-selected="true">
                                Personal Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#businessDetails" role="tab"
                                aria-selected="false">
                                Business Details
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#bankDetails" role="tab"
                                aria-selected="false">
                                Bank Details
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="modal-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="personalDetails" role="tabpanel">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstnameInput" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="firstnameInput"
                                                placeholder="Enter your firstname">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="lastnameInput" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lastnameInput"
                                                placeholder="Enter your lastname">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="contactnumberInput" class="form-label">Contact Number</label>
                                            <input type="number" class="form-control" id="contactnumberInput"
                                                placeholder="Enter your number">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="phonenumberInput" class="form-label">Phone Number</label>
                                            <input type="number" class="form-control" id="phonenumberInput"
                                                placeholder="Enter your number">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="emailidInput" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="emailidInput"
                                                placeholder="Enter your email">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="birthdayidInput" class="form-label">Date of Birth</label>
                                            <input type="text" id="birthdayidInput" class="form-control"
                                                data-provider="flatpickr" placeholder="Enter your date of birth">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="cityidInput" class="form-label">City</label>
                                            <input type="text" class="form-control" id="cityidInput"
                                                placeholder="Enter your city">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="countryidInput" class="form-label">Country</label>
                                            <input type="text" class="form-control" id="countryidInput"
                                                placeholder="Enter your country">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="zipcodeidInput" class="form-label">Zip Code</label>
                                            <input type="text" class="form-control" id="zipcodeidInput"
                                                placeholder="Enter your zipcode">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="exampleFormControlTextarea1"
                                                class="form-label">Description</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Enter description"></textarea>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button class="btn btn-link link-success text-decoration-none fw-medium"
                                                data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>
                                                Close</button>
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="ri-save-3-line align-bottom me-1"></i> Save</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <div class="tab-pane" id="businessDetails" role="tabpanel">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="companynameInput" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" id="companynameInput"
                                                placeholder="Enter your company name">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="choices-single-default" class="form-label">Company Type</label>
                                            <select class="form-control" data-trigger name="choices-single-default"
                                                id="choices-single-default">
                                                <option value="">Select type</option>
                                                <option value="All" selected>All</option>
                                                <option value="Merchandising">Merchandising</option>
                                                <option value="Manufacturing">Manufacturing</option>
                                                <option value="Partnership">Partnership</option>
                                                <option value="Corporation">Corporation</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="pancardInput" class="form-label">Pan Card Number</label>
                                            <input type="text" class="form-control" id="pancardInput"
                                                placeholder="Enter your pan-card number">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="websiteInput" class="form-label">Website</label>
                                            <input type="url" class="form-control" id="websiteInput"
                                                placeholder="Enter your URL">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="faxInput" class="form-label">Fax</label>
                                            <input type="text" class="form-control" id="faxInput"
                                                placeholder="Enter your fax">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="companyemailInput" class="form-label">Email</label>
                                            <input type="email" class="form-control" id="companyemailInput"
                                                placeholder="Enter your email">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="worknumberInput" class="form-label">Number</label>
                                            <input type="number" class="form-control" id="worknumberInput"
                                                placeholder="Enter your number">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="companylogoInput" class="form-label">Company Logo</label>
                                            <input type="file" class="form-control" id="companylogoInput">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button class="btn btn-link link-success text-decoration-none fw-medium"
                                                data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>
                                                Close</button>
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="ri-save-3-line align-bottom me-1"></i> Save</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                        <div class="tab-pane" id="bankDetails" role="tabpanel">
                            <form action="#">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="banknameInput" class="form-label">Bank Name</label>
                                            <input type="text" class="form-control" id="banknameInput"
                                                placeholder="Enter your bank name">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="branchInput" class="form-label">Branch</label>
                                            <input type="text" class="form-control" id="branchInput"
                                                placeholder="Branch">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="mb-3">
                                            <label for="accountnameInput" class="form-label">Account Holder Name</label>
                                            <input type="text" class="form-control" id="accountnameInput"
                                                placeholder="Enter account holder name">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="accountnumberInput" class="form-label">Account Number</label>
                                            <input type="number" class="form-control" id="accountnumberInput"
                                                placeholder="Enter account number">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="ifscInput" class="form-label">IFSC</label>
                                            <input type="number" class="form-control" id="ifscInput"
                                                placeholder="IFSC">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="hstack gap-2 justify-content-end">
                                            <button class="btn btn-link link-success text-decoration-none fw-medium"
                                                data-bs-dismiss="modal"><i class="ri-close-line me-1 align-middle"></i>
                                                Close</button>
                                            <button type="submit" class="btn btn-primary"><i
                                                    class="ri-save-3-line align-bottom me-1"></i> Save</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end modal-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/sellers.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
