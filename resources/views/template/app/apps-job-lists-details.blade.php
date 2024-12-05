@extends('layouts.master')
@section('title')
    Job Overview
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-n4 mx-n4">
                <div class="bg-warning-subtle">
                    <div class="card-body px-4 pb-4">
                        <div class="row mb-3">
                            <div class="col-md">
                                <div class="row align-items-center g-3">
                                    <div class="col-md-auto">
                                        <div class="avatar-md">
                                            <div class="avatar-title bg-white rounded-circle">
                                                <img src="{{ URL::asset('build/images/brands/slack.png') }}" alt=""
                                                    class="avatar-xs">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div>
                                            <h4 class="fw-bold">Product Designer</h4>
                                            <div class="hstack gap-3 flex-wrap">
                                                <div><i class="ri-building-line align-bottom me-1"></i> Themesbrand</div>
                                                <div class="vr"></div>
                                                <div><i class="ri-map-pin-2-line align-bottom me-1"></i> Zuweihir, UAE</div>
                                                <div class="vr"></div>
                                                <div>Post Date : <span class="fw-medium">15 Sep, 2021</span></div>
                                                <div class="vr"></div>
                                                <div class="badge rounded-pill bg-success fs-12">Full Time</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-auto">
                                <div class="hstack gap-1 flex-wrap mt-4 mt-md-0">
                                    <button type="button" class="btn btn-icon btn-sm btn-ghost-warning fs-16">
                                        <i class="ri-star-fill"></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-sm btn-ghost-primary fs-16">
                                        <i class="ri-share-line"></i>
                                    </button>
                                    <button type="button" class="btn btn-icon btn-sm btn-ghost-primary fs-16">
                                        <i class="ri-flag-line"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card body -->
                </div>
            </div>
            <!-- end card -->
        </div>
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row mt-n5">
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-body">
                    <h5 class="mb-3">Job Description</h5>

                    <p class="text-muted mb-2">A Product Designer of a company is responsible for the user experience of a
                        product, which usually includes taking direction on the business goals and objectives from product
                        management. Product Designers are typically associated with the visual or tactile aspects of a
                        product but sometimes they can also play a role in the information architecture and system design of
                        a product.</p>
                    <p class="text-muted mb-4">Product designer is an exceptional career choice. The demand for product
                        designers is increasing with each passing day but there is a huge shortage for a skilful product
                        designer in the market. With hard work and an apt skill set, a product designer can make a handsome
                        amount of money.</p>
                    <div>
                        <h5 class="mb-3">Responsibilities of Product Designer</h5>
                        <p class="text-muted">Provided below are the responsibilities of a Product Designer:</p>
                        <ul class="text-muted vstack gap-2">
                            <li>
                                To visualise and create drawings and design concepts to determine the best product.
                            </li>
                            <li>
                                To present ideas and concepts to relevant team members for brainstorming.
                            </li>
                            <li>
                                To employ design concepts into functional prototypes.
                            </li>
                            <li>
                                To analyse, modify and revise existing designs or products and meet customer expectations.
                            </li>
                            <li>
                                To coordinate with team members and to ensure accurate efficiency in the design phase.
                            </li>
                            <li>Excellent attention to detail</li>
                            <li>Meticulous and diligent</li>
                        </ul>
                    </div>

                    <div>
                        <h5 class="mb-3">Skill & Experience</h5>
                        <ul class="text-muted vstack gap-2">
                            <li>
                                Communication skills
                            <li>
                                Sound visualisation abilities
                            </li>
                            <li>
                                Observation skills
                            </li>
                            <li>
                                Problem-solving abilities
                            </li>
                            <li>
                                Eye for aesthetic design and understanding of customer appeal
                            </li>
                            <li>
                                Artistic & innovative flair
                            </li>
                            <li>
                                Strong knowledge of the industry & market trends
                            </li>
                            <li>
                                Relevant work experience in a particular field is mandatory
                            </li>
                        </ul>
                    </div>

                    <ul class="list-inline mb-0">
                        <li class="list-inline-item">
                            <h5 class="mb-0">Share this job:</h5>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="btn btn-icon btn-soft-info"><i class="ri-facebook-line"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="btn btn-icon btn-soft-success"><i class="ri-whatsapp-line"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="btn btn-icon btn-soft-secondary"><i class="ri-twitter-line"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#!" class="btn btn-icon btn-soft-danger"><i class="ri-mail-line"></i></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="d-flex align-items-center mb-4">
                        <div class="flex-grow-1">
                            <h5 class="mb-0">Related Jobs</h5>
                        </div>
                        <div class="flex-shrink-0">
                            <a href="#!" class="btn btn-ghost-success">View All <i
                                    class="ri-arrow-right-line ms-1 align-bottom"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-icon btn-soft-primary float-end" data-bs-toggle="button"
                                aria-pressed="true"><i class="mdi mdi-cards-heart fs-16"></i></button>
                            <div class="avatar-sm mb-4">
                                <div class="avatar-title bg-secondary-subtle rounded">
                                    <img src="{{ URL::asset('build/images/companies/img-1.png') }}" alt=""
                                        class="avatar-xxs" />
                                </div>
                            </div>
                            <a href="#!">
                                <h5>Web designer</h5>
                            </a>
                            <p class="text-muted">Themesbrand</p>

                            <div class="d-flex gap-4 mb-3">
                                <div>
                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Escondido,California
                                </div>

                                <div>
                                    <i class="ri-time-line text-primary me-1 align-bottom"></i> 3 min ago
                                </div>
                            </div>

                            <p class="text-muted">As a Product Designer, you will work within a Product Delivery Team fused
                                with UX, engineering, product and data talent.</p>

                            <div class="hstack gap-2">
                                <span class="badge bg-success-subtle text-success">Full Time</span>
                                <span class="badge bg-primary-subtle text-primary">Freelance</span>
                                <span class="badge bg-danger-subtle text-danger">Urgent</span>
                            </div>

                            <div class="mt-4 hstack gap-2">
                                <a href="#!" class="btn btn-soft-primary w-100">Apply Job</a>
                                <a href="#!" class="btn btn-soft-success w-100">Overview</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-icon btn-soft-primary float-end"
                                data-bs-toggle="button" aria-pressed="true"><i
                                    class="mdi mdi-cards-heart fs-16"></i></button>
                            <div class="avatar-sm mb-4">
                                <div class="avatar-title bg-info-subtle rounded">
                                    <img src="{{ URL::asset('build/images/companies/img-2.png') }}" alt=""
                                        class="avatar-xxs" />
                                </div>
                            </div>
                            <a href="#!">
                                <h5>Marketing Director</h5>
                            </a>
                            <p class="text-muted">Themesbrand</p>

                            <div class="d-flex gap-4 mb-3">
                                <div>
                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Stordorf, Germany
                                </div>

                                <div>
                                    <i class="ri-time-line text-primary me-1 align-bottom"></i> 30 min ago
                                </div>
                            </div>

                            <p class="text-muted">As a Product Designer, you will work within a Product Delivery Team fused
                                with UX, engineering, product and data talent.</p>

                            <div class="hstack gap-2">
                                <span class="badge bg-warning-subtle text-warning">Part Time</span>
                                <span class="badge bg-primary-subtle text-primary">Freelance</span>
                            </div>

                            <div class="mt-4 hstack gap-2">
                                <a href="#!" class="btn btn-soft-primary w-100">Apply Job</a>
                                <a href="#!" class="btn btn-soft-success w-100">Overview</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-icon btn-soft-primary float-end"
                                data-bs-toggle="button" aria-pressed="true"><i
                                    class="mdi mdi-cards-heart fs-16"></i></button>
                            <div class="avatar-sm mb-4">
                                <div class="avatar-title bg-warning-subtle rounded">
                                    <img src="{{ URL::asset('build/images/companies/img-3.png') }}" alt=""
                                        class="avatar-xxs" />
                                </div>
                            </div>
                            <a href="#!">
                                <h5>Product Sales Specialist</h5>
                            </a>
                            <p class="text-muted">Themesbrand</p>

                            <div class="d-flex gap-4 mb-3">
                                <div>
                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Cullera, Spain
                                </div>

                                <div>
                                    <i class="ri-time-line text-primary me-1 align-bottom"></i> 2 days ago
                                </div>
                            </div>

                            <p class="text-muted">As a Product Designer, you will work within a Product Delivery Team fused
                                with UX, engineering, product and data talent.</p>

                            <div class="hstack gap-2">
                                <span class="badge bg-success-subtle text-success">Full Time</span>
                                <span class="badge bg-info-subtle text-info">Private</span>
                            </div>

                            <div class="mt-4 hstack gap-2">
                                <a href="#!" class="btn btn-soft-primary w-100">Apply Job</a>
                                <a href="#!" class="btn btn-soft-success w-100">Overview</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-icon btn-soft-primary float-end"
                                data-bs-toggle="button" aria-pressed="true"><i
                                    class="mdi mdi-cards-heart fs-16"></i></button>
                            <div class="avatar-sm mb-4">
                                <div class="avatar-title bg-secondary-subtle rounded">
                                    <img src="{{ URL::asset('build/images/companies/img-1.png') }}" alt=""
                                        class="avatar-xxs" />
                                </div>
                            </div>
                            <a href="#!">
                                <h5>Web designer</h5>
                            </a>
                            <p class="text-muted">Themesbrand</p>

                            <div class="d-flex gap-4 mb-3">
                                <div>
                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Escondido,California
                                </div>

                                <div>
                                    <i class="ri-time-line text-primary me-1 align-bottom"></i> 3 min ago
                                </div>
                            </div>

                            <p class="text-muted">As a Product Designer, you will work within a Product Delivery Team fused
                                with UX, engineering, product and data talent.</p>

                            <div class="hstack gap-2">
                                <span class="badge bg-success-subtle text-success">Full Time</span>
                                <span class="badge bg-primary-subtle text-primary">Freelance</span>
                                <span class="badge bg-danger-subtle text-danger">Urgent</span>
                            </div>

                            <div class="mt-4 hstack gap-2">
                                <a href="#!" class="btn btn-soft-primary w-100">Apply Job</a>
                                <a href="#!" class="btn btn-soft-success w-100">Overview</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-icon btn-soft-primary float-end"
                                data-bs-toggle="button" aria-pressed="true"><i
                                    class="mdi mdi-cards-heart fs-16"></i></button>
                            <div class="avatar-sm mb-4">
                                <div class="avatar-title bg-info-subtle rounded">
                                    <img src="{{ URL::asset('build/images/companies/img-2.png') }}" alt=""
                                        class="avatar-xxs" />
                                </div>
                            </div>
                            <a href="#!">
                                <h5>Marketing Director</h5>
                            </a>
                            <p class="text-muted">Themesbrand</p>

                            <div class="d-flex gap-4 mb-3">
                                <div>
                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Stordorf, Germany
                                </div>

                                <div>
                                    <i class="ri-time-line text-primary me-1 align-bottom"></i> 30 min ago
                                </div>
                            </div>

                            <p class="text-muted">As a Product Designer, you will work within a Product Delivery Team fused
                                with UX, engineering, product and data talent.</p>

                            <div class="hstack gap-2">
                                <span class="badge bg-warning-subtle text-warning">Part Time</span>
                                <span class="badge bg-primary-subtle text-primary">Freelance</span>
                            </div>

                            <div class="mt-4 hstack gap-2">
                                <a href="#!" class="btn btn-soft-primary w-100">Apply Job</a>
                                <a href="#!" class="btn btn-soft-success w-100">Overview</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body">
                            <button type="button" class="btn btn-icon btn-soft-primary float-end"
                                data-bs-toggle="button" aria-pressed="true"><i
                                    class="mdi mdi-cards-heart fs-16"></i></button>
                            <div class="avatar-sm mb-4">
                                <div class="avatar-title bg-warning-subtle rounded">
                                    <img src="{{ URL::asset('build/images/companies/img-3.png') }}" alt=""
                                        class="avatar-xxs" />
                                </div>
                            </div>
                            <a href="#!">
                                <h5>Product Sales Specialist</h5>
                            </a>
                            <p class="text-muted">Themesbrand</p>

                            <div class="d-flex gap-4 mb-3">
                                <div>
                                    <i class="ri-map-pin-2-line text-primary me-1 align-bottom"></i> Cullera, Spain
                                </div>

                                <div>
                                    <i class="ri-time-line text-primary me-1 align-bottom"></i> 2 days ago
                                </div>
                            </div>

                            <p class="text-muted">As a Product Designer, you will work within a Product Delivery Team fused
                                with UX, engineering, product and data talent.</p>

                            <div class="hstack gap-2">
                                <span class="badge bg-success-subtle text-success">Full Time</span>
                                <span class="badge bg-info-subtle text-info">Private</span>
                            </div>

                            <div class="mt-4 hstack gap-2">
                                <a href="#!" class="btn btn-soft-primary w-100">Apply Job</a>
                                <a href="#!" class="btn btn-soft-success w-100">Overview</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Job Overview</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td class="fw-medium">Title</td>
                                    <td>Product Designer</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Company Name</td>
                                    <td>Themesbrand</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Location</td>
                                    <td>Zuweihir, UAE</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Time</td>
                                    <td><span class="badge bg-success-subtle text-success">Full Time</span></td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Job Application</td>
                                    <td>54 Application</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Post Date</td>
                                    <td>15 Sep, 2021</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Salary</td>
                                    <td>$35k - $45k</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Experience</td>
                                    <td>5+ Years</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Qualification</td>
                                    <td>Master Degree</td>
                                </tr>
                            </tbody>
                        </table>
                        <!--end table-->
                    </div>
                    <div class="mt-4 pt-2 hstack gap-2">
                        <a href="#!" class="btn btn-primary w-100">Apply Now</a>
                        <a href="#!" class="btn btn-soft-danger btn-icon custom-toggle flex-shrink-0"
                            data-bs-toggle="button">
                            <span class="icon-on"><i class="ri-bookmark-line align-bottom"></i></span>
                            <span class="icon-off"><i class="ri-bookmark-3-fill align-bottom"></i></span>
                        </a>
                    </div>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-body">
                    <div class="avatar-sm mx-auto">
                        <div class="avatar-title bg-warning-subtle rounded">
                            <img src="{{ URL::asset('build/images/companies/img-3.png') }}" alt=""
                                class="avatar-xxs">
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="#!">
                            <h5 class="mt-3">Themesbrand</h5>
                        </a>
                        <p class="text-muted">IT Department</p>
                    </div>

                    <div class="table-responsive">
                        <table class="table mb-0">
                            <tbody>
                                <tr>
                                    <td class="fw-medium">Company Size</td>
                                    <td>50+</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Industry Type</td>
                                    <td>Software</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Founded in</td>
                                    <td>2016</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Phone</td>
                                    <td>+(234) 12345 67890</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Email</td>
                                    <td>themesbrand@gmail.com</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Social media</td>
                                    <td>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a href="#!"><i class="ri-whatsapp-line"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#!"><i class="ri-facebook-line"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#!"><i class="ri-twitter-line"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#!"><i class="ri-youtube-line"></i></a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--end table-->
                    </div>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Job Location</h5>
                </div>
                <div class="card-body">
                    <div class="ratio ratio-4x3">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1861227.8137337372!2d51.654904288504646!3d24.33915646928631!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5e48dfb1ab12bd%3A0x33d32f56c0080aa7!2sUnited%20Arab%20Emirates!5e0!3m2!1sen!2sin!4v1664257145153!5m2!1sen!2sin"
                            height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            <!--end card-->
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Contact Us</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label for="nameInput" class="form-label">Name</label>
                            <input type="text" class="form-control" id="nameInput" placeholder="Enter your name">
                        </div>
                        <div class="mb-3">
                            <label for="emailInput" class="form-label">Email</label>
                            <input type="text" class="form-control" id="emailInput" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="messageInput" class="form-label">Message</label>
                            <textarea class="form-control" id="messageInput" rows="3" placeholder="Message"></textarea>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <!--end card-->
        </div>
    </div>
@endsection
@section('script')
    <!-- App js -->
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
