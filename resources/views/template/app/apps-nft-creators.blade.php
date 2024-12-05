@extends('layouts.master')
@section('title')
    @lang('translation.creators')
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

    <!--end col-->
    <div class="row g-4 mb-3">
        <div class="col-sm-auto">
            <div>
                <a href="/apps_projects_create" class="btn btn-success"><i class="ri-add-line align-bottom me-1"></i> Add
                    New</a>
            </div>
        </div>
        <div class="col-sm">
            <div class="d-flex justify-content-sm-end gap-2">
                <div class="search-box ms-2">
                    <input type="text" class="form-control" placeholder="Search...">
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
        <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('build/images/nft/img-01.jpg') }}" alt=""
                                class="avatar-sm object-fit-cover rounded">
                        </div>
                        <div class="ms-3 flex-grow-1">
                            <a href="/pages_profile_basic">
                                <h5 class="mb-1">Timothy Smith</h5>
                            </a>
                            <p class="text-muted mb-0"><i class="mdi mdi-ethereum text-primary fs-14"></i> 4,754 ETH</p>
                        </div>
                        <div>
                            <div class="dropdown float-end">
                                <button class="btn btn-ghost-primary btn-icon dropdown" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-fill align-middle fs-16"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item view-item-btn" href="javascript:void(0);">Share</a></li>
                                    <li><a class="dropdown-item edit-item-btn" href="#!"
                                            data-bs-toggle="modal">Report</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('build/images/users/avatar-5.jpg') }}" alt=""
                                class="avatar-sm object-fit-cover rounded">
                        </div>
                        <div class="ms-3 flex-grow-1">
                            <a href="/pages_profile_basic">
                                <h5 class="mb-1">Alexis Clarke</h5>
                            </a>
                            <p class="text-muted mb-0"><i class="mdi mdi-ethereum text-primary fs-14"></i> 81,369 ETH</p>
                        </div>
                        <div>
                            <div class="dropdown float-end">
                                <button class="btn btn-ghost-primary btn-icon dropdown" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-fill align-middle fs-16"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item view-item-btn" href="javascript:void(0);">Share</a></li>
                                    <li><a class="dropdown-item edit-item-btn" href="#!"
                                            data-bs-toggle="modal">Report</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('build/images/nft/img-06.jpg') }}" alt=""
                                class="avatar-sm object-fit-cover rounded">
                        </div>
                        <div class="ms-3 flex-grow-1">
                            <a href="/pages_profile_basic">
                                <h5 class="mb-1">Glen Matney</h5>
                            </a>
                            <p class="text-muted mb-0"><i class="mdi mdi-ethereum text-primary fs-14"></i> 13,156 ETH</p>
                        </div>
                        <div>
                            <div class="dropdown float-end">
                                <button class="btn btn-ghost-primary btn-icon dropdown" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-fill align-middle fs-16"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item view-item-btn" href="javascript:void(0);">Share</a></li>
                                    <li><a class="dropdown-item edit-item-btn" href="#!"
                                            data-bs-toggle="modal">Report</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="https://img.themesbrand.com/velzon/images/img-5.gif" alt=""
                                class="avatar-sm object-fit-cover rounded">
                        </div>
                        <div class="ms-3 flex-grow-1">
                            <a href="/pages_profile_basic">
                                <h5 class="mb-1">Herbert Stokes</h5>
                            </a>
                            <p class="text-muted mb-0"><i class="mdi mdi-ethereum text-primary fs-14"></i> 34,754 ETH</p>
                        </div>
                        <div>
                            <div class="dropdown float-end">
                                <button class="btn btn-ghost-primary btn-icon dropdown" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-fill align-middle fs-16"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item view-item-btn" href="javascript:void(0);">Share</a></li>
                                    <li><a class="dropdown-item edit-item-btn" href="#!"
                                            data-bs-toggle="modal">Report</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('build/images/users/avatar-8.jpg') }}" alt=""
                                class="avatar-sm object-fit-cover rounded">
                        </div>
                        <div class="ms-3 flex-grow-1">
                            <a href="/pages_profile_basic">
                                <h5 class="mb-1">Michael Morris</h5>
                            </a>
                            <p class="text-muted mb-0"><i class="mdi mdi-ethereum text-primary fs-14"></i> 13,841 ETH</p>
                        </div>
                        <div>
                            <div class="dropdown float-end">
                                <button class="btn btn-ghost-primary btn-icon dropdown" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-fill align-middle fs-16"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item view-item-btn" href="javascript:void(0);">Share</a></li>
                                    <li><a class="dropdown-item edit-item-btn" href="#!"
                                            data-bs-toggle="modal">Report</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('build/images/nft/img-04.jpg') }}" alt=""
                                class="avatar-sm object-fit-cover rounded">
                        </div>
                        <div class="ms-3 flex-grow-1">
                            <a href="/pages_profile_basic">
                                <h5 class="mb-1">Nancy Martino</h5>
                            </a>
                            <p class="text-muted mb-0"><i class="mdi mdi-ethereum text-primary fs-14"></i> 26,834 ETH</p>
                        </div>
                        <div>
                            <div class="dropdown float-end">
                                <button class="btn btn-ghost-primary btn-icon dropdown" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-fill align-middle fs-16"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item view-item-btn" href="javascript:void(0);">Share</a></li>
                                    <li><a class="dropdown-item edit-item-btn" href="#!"
                                            data-bs-toggle="modal">Report</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('build/images/nft/img-05.jpg') }}" alt=""
                                class="avatar-sm object-fit-cover rounded">
                        </div>
                        <div class="ms-3 flex-grow-1">
                            <a href="/pages_profile_basic">
                                <h5 class="mb-1">Mary Cousar</h5>
                            </a>
                            <p class="text-muted mb-0"><i class="mdi mdi-ethereum text-primary fs-14"></i> 18,034 ETH</p>
                        </div>
                        <div>
                            <div class="dropdown float-end">
                                <button class="btn btn-ghost-primary btn-icon dropdown" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-fill align-middle fs-16"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item view-item-btn" href="javascript:void(0);">Share</a></li>
                                    <li><a class="dropdown-item edit-item-btn" href="#!"
                                            data-bs-toggle="modal">Report</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0">
                            <img src="{{ URL::asset('build/images/nft/img-02.jpg') }}" alt=""
                                class="avatar-sm object-fit-cover rounded">
                        </div>
                        <div class="ms-3 flex-grow-1">
                            <a href="/pages_profile_basic">
                                <h5 class="mb-1">James Morris</h5>
                            </a>
                            <p class="text-muted mb-0"><i class="mdi mdi-ethereum text-primary fs-14"></i> 63,710 ETH</p>
                        </div>
                        <div>
                            <div class="dropdown float-end">
                                <button class="btn btn-ghost-primary btn-icon dropdown" type="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-more-fill align-middle fs-16"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li><a class="dropdown-item view-item-btn" href="javascript:void(0);">Share</a></li>
                                    <li><a class="dropdown-item edit-item-btn" href="#!"
                                            data-bs-toggle="modal">Report</a></li>
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

    <div class="row">
        <div class="col-lg-12">
            <h5 class="card-title mb-4 fw-semibold fs-16">Creators Grid Lists</h5>
        </div>
    </div>

    <div class="row row-cols-xl-5 row-cols-lg-3 row-cols-md-2 row-cols-1">
        <div class="col">
            <div class="card">
                <img src="{{ URL::asset('build/images/nft/img-03.jpg') }}" alt=""
                    class="object-fit-cover card-img-top" height="120">
                <div class="card-body text-center">
                    <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}" alt=""
                        class="avatar-md rounded-circle object-fit-cover mt-n5 img-thumbnail border-light border-5 border-white mx-auto d-block">
                    <a href="/pages_profile_basic">
                        <h5 class="mt-2 mb-1">Michael Morris</h5>
                    </a>
                    <p class="text-muted mb-2">9784 Products</p>
                    <p class="text-muted">You can make an NFT of a digital painting, a text, a piece of music, a video.</p>
                    <button class="btn btn-soft-success w-100">Unfollow</button>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="card">
                <img src="https://img.themesbrand.com/velzon/images/img-3.gif" alt=""
                    class="object-fit-cover card-img-top" height="120">
                <div class="card-body text-center">
                    <img src="{{ URL::asset('build/images/users/avatar-6.jpg') }}" alt=""
                        class="avatar-md rounded-circle object-fit-cover mt-n5 img-thumbnail border-light border-5 border-white mx-auto d-block">
                    <a href="/pages_profile_basic">
                        <h5 class="mt-2 mb-1">Charles Kubik</h5>
                    </a>
                    <p class="text-muted mb-2">4678 Products</p>
                    <p class="text-muted">You can make an NFT of a digital painting, a text, a piece of music, a video.</p>
                    <button class="btn btn-success w-100">Follow</button>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="card">
                <img src="{{ URL::asset('build/images/nft/img-05.jpg') }}" alt=""
                    class="object-fit-cover card-img-top" height="120">
                <div class="card-body text-center">
                    <img src="{{ URL::asset('build/images/nft/img-06.jpg') }}" alt=""
                        class="avatar-md rounded-circle object-fit-cover mt-n5 img-thumbnail border-light border-5 border-white mx-auto d-block">
                    <a href="/pages_profile_basic">
                        <h5 class="mt-2 mb-1">Alexis Clarke</h5>
                    </a>
                    <p class="text-muted mb-2">861 Products</p>
                    <p class="text-muted">You can make an NFT of a digital painting, a text, a piece of music, a video.</p>
                    <button class="btn btn-soft-success w-100">Unfollow</button>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="card">
                <img src="{{ URL::asset('build/images/nft/img-06.jpg') }}" alt=""
                    class="object-fit-cover card-img-top" height="120">
                <div class="card-body text-center">
                    <img src="https://img.themesbrand.com/velzon/images/img-1.gif" alt=""
                        class="avatar-md rounded-circle object-fit-cover mt-n5 img-thumbnail border-light border-5 border-white mx-auto d-block">
                    <a href="/pages_profile_basic">
                        <h5 class="mt-2 mb-1">James Morris</h5>
                    </a>
                    <p class="text-muted mb-2">30174 Products</p>
                    <p class="text-muted">You can make an NFT of a digital painting, a text, a piece of music, a video.</p>
                    <button class="btn btn-soft-success w-100">Unfollow</button>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="card">
                <img src="https://img.themesbrand.com/velzon/images/img-3.gif" alt=""
                    class="object-fit-cover card-img-top" height="120">
                <div class="card-body text-center">
                    <img src="{{ URL::asset('build/images/users/avatar-8.jpg') }}" alt=""
                        class="avatar-md rounded-circle object-fit-cover mt-n5 img-thumbnail border-light border-5 border-white mx-auto d-block">
                    <a href="/pages_profile_basic">
                        <h5 class="mt-2 mb-1">Herbert Stokes</h5>
                    </a>
                    <p class="text-muted mb-2">6487 Products</p>
                    <p class="text-muted">You can make an NFT of a digital painting, a text, a piece of music, a video.</p>
                    <button class="btn btn-success w-100">Follow</button>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="card">
                <img src="{{ URL::asset('build/images/nft/img-03.jpg') }}" alt=""
                    class="object-fit-cover card-img-top" height="120">
                <div class="card-body text-center">
                    <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}" alt=""
                        class="avatar-md rounded-circle object-fit-cover mt-n5 img-thumbnail border-light border-5 border-white mx-auto d-block">
                    <a href="/pages_profile_basic">
                        <h5 class="mt-2 mb-1">Michael Morris</h5>
                    </a>
                    <p class="text-muted mb-2">10137/ Products</p>
                    <p class="text-muted">You can make an NFT of a digital painting, a text, a piece of music, a video.</p>
                    <button class="btn btn-soft-success w-100">Unfollow</button>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="card">
                <img src="https://img.themesbrand.com/velzon/images/img-2.gif" alt=""
                    class="object-fit-cover card-img-top" height="120">
                <div class="card-body text-center">
                    <img src="{{ URL::asset('build/images/users/avatar-6.jpg') }}" alt=""
                        class="avatar-md rounded-circle object-fit-cover mt-n5 img-thumbnail border-light border-5 border-white mx-auto d-block">
                    <a href="/pages_profile_basic">
                        <h5 class="mt-2 mb-1">Tonya Noble</h5>
                    </a>
                    <p class="text-muted mb-2">364 Products</p>
                    <p class="text-muted">You can make an NFT of a digital painting, a text, a piece of music, a video.</p>
                    <button class="btn btn-success w-100">Follow</button>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="card">
                <img src="{{ URL::asset('build/images/nft/img-05.jpg') }}" alt=""
                    class="object-fit-cover card-img-top" height="120">
                <div class="card-body text-center">
                    <img src="{{ URL::asset('build/images/nft/img-06.jpg') }}" alt=""
                        class="avatar-md rounded-circle object-fit-cover mt-n5 img-thumbnail border-light border-5 border-white mx-auto d-block">
                    <a href="/pages_profile_basic">
                        <h5 class="mt-2 mb-1">Nancy Martino</h5>
                    </a>
                    <p class="text-muted mb-2">9513 Products</p>
                    <p class="text-muted">You can make an NFT of a digital painting, a text, a piece of music, a video.</p>
                    <button class="btn btn-soft-success w-100">Unfollow</button>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="card">
                <img src="{{ URL::asset('build/images/nft/img-01.jpg') }}" alt=""
                    class="object-fit-cover card-img-top" height="120">
                <div class="card-body text-center">
                    <img src="https://img.themesbrand.com/velzon/images/img-1.gif" alt=""
                        class="avatar-md rounded-circle object-fit-cover mt-n5 img-thumbnail border-light border-5 border-white mx-auto d-block">
                    <a href="/pages_profile_basic">
                        <h5 class="mt-2 mb-1">Kevin Dawson</h5>
                    </a>
                    <p class="text-muted mb-2">6374 Products</p>
                    <p class="text-muted">You can make an NFT of a digital painting, a text, a piece of music, a video.</p>
                    <button class="btn btn-success w-100">Follow</button>
                </div>
            </div>
        </div>
        <!--end col-->
        <div class="col">
            <div class="card">
                <img src="https://img.themesbrand.com/velzon/images/img-4.gif" alt=""
                    class="object-fit-cover card-img-top" height="120">
                <div class="card-body text-center">
                    <img src="{{ URL::asset('build/images/users/avatar-10.jpg') }}" alt=""
                        class="avatar-md rounded-circle object-fit-cover mt-n5 img-thumbnail border-light border-5 border-white mx-auto d-block">
                    <a href="/pages_profile_basic">
                        <h5 class="mt-2 mb-1">Glen Matney</h5>
                    </a>
                    <p class="text-muted mb-2">7809 Products</p>
                    <p class="text-muted">You can make an NFT of a digital painting, a text, a piece of music, a video.</p>
                    <button class="btn btn-soft-success w-100">Unfollow</button>
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
                        class="fw-semibold">10</span> of <span class="fw-semibold text-decoration-underline">12</span>
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
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
