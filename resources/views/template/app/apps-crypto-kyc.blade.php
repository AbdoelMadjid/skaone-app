@extends('layouts.master')
@section('title')
    @lang('translation.kyc-application')
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


    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <h4 class="mt-4 fw-semibold">KYC Verification</h4>
                                <p class="text-muted mt-3">When you get your KYC verification process
                                    done, you have given the crypto exchange in this case, information.
                                </p>
                                <div class="mt-4">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal">
                                        Click here for Verification
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-5 mb-2">
                            <div class="col-sm-7 col-8">
                                <img src="{{ URL::asset('build/images/verification-img.png') }}" alt=""
                                    class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header p-3">
                    <h5 class="modal-title text-uppercase" id="exampleModalLabel">Verify your Account
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" class="checkout-tab">
                    <div class="modal-body p-0">
                        <div class="step-arrow-nav">
                            <ul class="nav nav-pills nav-justified custom-nav" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link p-3 active" id="pills-bill-info-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-bill-info" type="button" role="tab"
                                        aria-controls="pills-bill-info" aria-selected="true">Personal Info</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link p-3" id="pills-bill-address-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-bill-address" type="button" role="tab"
                                        aria-controls="pills-bill-address" aria-selected="false">Bank Details</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link p-3" id="pills-payment-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-payment" type="button" role="tab"
                                        aria-controls="pills-payment" aria-selected="false">Document Verification</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link p-3" id="pills-finish-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-finish" type="button" role="tab"
                                        aria-controls="pills-finish" aria-selected="false">Verified</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!--end modal-body-->
                    <div class="modal-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="pills-bill-info" role="tabpanel"
                                aria-labelledby="pills-bill-info-tab">
                                <div class="row g-3">
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="firstName" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="firstName"
                                                placeholder="Enter your firstname">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="lastName" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lastName"
                                                placeholder="Enter your lastname">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="phoneNumber" class="form-label">Phone</label>
                                            <input type="text" class="form-control" id="phoneNumber"
                                                placeholder="Enter your phone number">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="dateofBirth" class="form-label">Date of
                                                Birth</label>
                                            <input type="text" class="form-control" id="dateofBirth"
                                                data-provider="flatpickr" placeholder="Enter your date of birth">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="emailID" class="form-label">Email ID</label>
                                            <input type="email" class="form-control" id="emailID"
                                                placeholder="Enter your email">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="password"
                                                placeholder="Enter your password">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-4">
                                        <div>
                                            <label for="confirmPassword" class="form-label">Confirm
                                                Password</label>
                                            <input type="password" class="form-control" id="confirmPassword"
                                                placeholder="Enter your confirm password">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="vatNo" class="form-label">VAT/TIN No.</label>
                                            <input type="text" class="form-control" id="vatNo"
                                                placeholder="Enter your VAT/TIN no">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div>
                                            <label for="serviceTax" class="form-label">Service Tax
                                                No.</label>
                                            <input type="text" class="form-control" id="serviceTax"
                                                placeholder="Enter your service tax no">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div>
                                            <label for="country-select" class="form-label">Country</label>
                                            <select class="form-control" data-choices name="country-select"
                                                id="country-select">
                                                <option value="">Select country</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="France">France</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Syria">Syria</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="United States of America">United States
                                                    of America</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-12">
                                        <div class="d-flex align-items-start gap-3 mt-3">
                                            <button type="button" class="btn btn-primary btn-label right ms-auto nexttab"
                                                data-nexttab="pills-bill-address-tab"><i
                                                    class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>
                                                Next Step</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="pills-bill-address" role="tabpanel"
                                aria-labelledby="pills-bill-address-tab">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="banknameInput" class="form-label">Bank
                                                Name</label>
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
                                            <label for="accountnameInput" class="form-label">Account
                                                Holder Name</label>
                                            <input type="text" class="form-control" id="accountnameInput"
                                                placeholder="Enter account holder name">
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="accountnumberInput" class="form-label">Account
                                                Number</label>
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
                                        <div class="hstack align-items-start gap-3 mt-4">
                                            <button type="button" class="btn btn-light btn-label previestab"
                                                data-previous="pills-bill-info-tab"><i
                                                    class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Back
                                                to Personal Info</button>
                                            <button type="button" class="btn btn-primary btn-label right ms-auto nexttab"
                                                data-nexttab="pills-payment-tab"><i
                                                    class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"></i>Next
                                                Step</button>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="pills-payment" role="tabpanel"
                                aria-labelledby="pills-payment-tab">
                                <h5 class="mb-3">Choose Document Type</h5>

                                <div class="d-flex gap-2">
                                    <div>
                                        <input type="radio" class="btn-check" id="passport" checked
                                            name="choose-document">
                                        <label class="btn btn-outline-info" for="passport">Passport</label>
                                    </div>
                                    <div>
                                        <input type="radio" class="btn-check" id="aadhar-card" name="choose-document">
                                        <label class="btn btn-outline-info" for="aadhar-card">Aadhar
                                            Card</label>
                                    </div>
                                    <div>
                                        <input type="radio" class="btn-check" id="pan-card" name="choose-document">
                                        <label class="btn btn-outline-info" for="pan-card">Pan
                                            Card</label>
                                    </div>
                                    <div>
                                        <input type="radio" class="btn-check" id="other" name="choose-document">
                                        <label class="btn btn-outline-info" for="other">Other</label>
                                    </div>
                                </div>

                                <div class="dropzone d-flex align-items-center">
                                    <div class="fallback">
                                        <input name="file" type="file" multiple="multiple">
                                    </div>
                                    <div class="dz-message needsclick text-center">
                                        <div class="mb-3">
                                            <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                        </div>

                                        <h4>Drop files here or click to upload.</h4>
                                    </div>
                                </div>

                                <ul class="list-unstyled mb-0" id="dropzone-preview">
                                    <li class="mt-2" id="dropzone-preview-list">
                                        <div class="border rounded">
                                            <div class="d-flex p-2">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar-sm bg-light rounded">
                                                        <img src="#" alt="" data-dz-thumbnail
                                                            class="img-fluid rounded d-block" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <div class="pt-1">
                                                        <h5 class="fs-14 mb-1" data-dz-name>&nbsp;</h5>
                                                        <p class="fs-13 text-muted mb-0" data-dz-size>
                                                        </p>
                                                        <strong class="error text-danger" data-dz-errormessage></strong>
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0 ms-3">
                                                    <button data-dz-remove class="btn btn-sm btn-danger">Delete</button>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                <!-- end dropzon-preview -->
                                <div class="d-flex align-items-start gap-3 mt-4">
                                    <button type="button" class="btn btn-light btn-label previestab"
                                        data-previous="pills-bill-address-tab"><i
                                            class="ri-arrow-left-line label-icon align-middle fs-16 me-2"></i>Back
                                        to Bank Details</button>
                                    <button type="button" class="btn btn-primary btn-label right ms-auto nexttab"
                                        data-nexttab="pills-finish-tab"><i
                                            class="ri-save-line label-icon align-middle fs-16 ms-2"></i>Submit</button>
                                </div>
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane fade" id="pills-finish" role="tabpanel"
                                aria-labelledby="pills-finish-tab">
                                <div class="row text-center justify-content-center py-4">
                                    <div class="col-lg-11">
                                        <div class="mb-4">
                                            <lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop"
                                                colors="primary:#0ab39c,secondary:#405189"
                                                style="width:120px;height:120px"></lord-icon>
                                        </div>
                                        <h5>Verification Completed</h5>
                                        <p class="text-muted mb-4">To stay verified, don't remove the
                                            meta tag form your site's home page. To avoid losing
                                            verification, you may want to add multiple methods form the
                                            <span class="fw-medium">Crypto > KYC Application.</span>
                                        </p>

                                        <div class="hstack justify-content-center gap-2">
                                            <button type="button" class="btn btn-ghost-success"
                                                data-bs-dismiss="modal">Done <i
                                                    class="ri-thumb-up-fill align-bottom me-1"></i></button>
                                            <button type="button" class="btn btn-primary"><i
                                                    class="ri-home-4-line align-bottom ms-1"></i> Back
                                                to Home</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->
                    </div>
                    <!--end modal-body-->
                </form>
            </div>
        </div>
    </div>
    <!--end modal-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/dropzone/dropzone-min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/crypto-kyc.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
