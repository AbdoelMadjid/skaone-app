@extends('layouts.master')
@section('title')
    @lang('translation.team')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.pages')
        @endslot
    @endcomponent

    <div class="card">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-sm-4">
                    <div class="search-box">
                        <input type="text" class="form-control" id="searchMemberList"
                            placeholder="Search for name or designation...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
                <!--end col-->
                <div class="col-sm-auto ms-auto">
                    <div class="list-grid-nav hstack gap-1">
                        <button type="button" id="grid-view-button"
                            class="btn btn-soft-info nav-link btn-icon fs-14 active filter-button"><i
                                class="ri-grid-fill"></i></button>
                        <button type="button" id="list-view-button"
                            class="btn btn-soft-info nav-link  btn-icon fs-14 filter-button"><i
                                class="ri-list-unordered"></i></button>
                        <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"
                            class="btn btn-soft-info btn-icon fs-14"><i class="ri-more-2-fill"></i></button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                            <li><a class="dropdown-item" href="#">All</a></li>
                            <li><a class="dropdown-item" href="#">Last Week</a></li>
                            <li><a class="dropdown-item" href="#">Last Month</a></li>
                            <li><a class="dropdown-item" href="#">Last Year</a></li>
                        </ul>
                        <button class="btn btn-success addMembers-modal" data-bs-toggle="modal"
                            data-bs-target="#addmemberModal"><i class="ri-add-fill me-1 align-bottom"></i> Add
                            Members</button>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div>

                <div id="teamlist">
                    <div class="team-list grid-view-filter row" id="team-member-list">
                    </div>
                    <div class="text-center mb-3">
                        <a href="javascript:void(0);" class="text-success"><i
                                class="mdi mdi-loading mdi-spin fs-20 align-middle me-2"></i> Load More </a>
                    </div>
                </div>
                <div class="py-4 mt-4 text-center" id="noresult" style="display: none;">
                    <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                        colors="primary:#405189,secondary:#0ab39c" style="width:72px;height:72px"></lord-icon>
                    <h5 class="mt-4">Sorry! No Result Found</h5>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addmemberModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content border-0">

                            <div class="modal-body">
                                <form autocomplete="off" id="memberlist-form" class="needs-validation" novalidate>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="hidden" id="memberid-input" class="form-control" value="">
                                            <div class="px-1 pt-1">
                                                <div
                                                    class="modal-team-cover position-relative mb-0 mt-n4 mx-n4 rounded-top overflow-hidden">
                                                    <img src="{{ URL::asset('build/images/small/img-9.jpg') }}"
                                                        alt="" id="cover-img" class="img-fluid">

                                                    <div class="d-flex position-absolute start-0 end-0 top-0 p-3">
                                                        <div class="flex-grow-1">
                                                            <h5 class="modal-title text-white" id="createMemberLabel">Add
                                                                New Members</h5>
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
                                                                    id="createMemberBtn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mb-4 mt-n5 pt-2">
                                                <div class="position-relative d-inline-block">
                                                    <div class="position-absolute bottom-0 end-0">
                                                        <label for="member-image-input" class="mb-0"
                                                            data-bs-toggle="tooltip" data-bs-placement="right"
                                                            title="Select Member Image">
                                                            <div class="avatar-xs">
                                                                <div
                                                                    class="avatar-title bg-light border rounded-circle text-muted cursor-pointer">
                                                                    <i class="ri-image-fill"></i>
                                                                </div>
                                                            </div>
                                                        </label>
                                                        <input class="form-control d-none" value=""
                                                            id="member-image-input" type="file"
                                                            accept="image/png, image/gif, image/jpeg">
                                                    </div>
                                                    <div class="avatar-lg">
                                                        <div class="avatar-title bg-light rounded-circle">
                                                            <img src="{{ URL::asset('build/images/users/user-dummy-img.jpg') }}"
                                                                id="member-img" class="avatar-md rounded-circle h-auto" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="teammembersName" class="form-label">Name</label>
                                                <input type="text" class="form-control" id="teammembersName"
                                                    placeholder="Enter name" required>
                                                <div class="invalid-feedback">Please Enter a member name.</div>
                                            </div>

                                            <div class="mb-4">
                                                <label for="designation" class="form-label">Designation</label>
                                                <input type="text" class="form-control" id="designation"
                                                    placeholder="Enter designation" required>
                                                <div class="invalid-feedback">Please Enter a designation.</div>
                                            </div>
                                            <input type="hidden" id="project-input" class="form-control"
                                                value="">
                                            <input type="hidden" id="task-input" class="form-control" value="">

                                            <div class="hstack gap-2 justify-content-end">
                                                <button type="button" class="btn btn-light"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-success" id="addNewMember">Add
                                                    Member</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--end modal-content-->
                    </div>
                    <!--end modal-dialog-->
                </div>
                <!--end modal-->

                <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="member-overview">
                    <!--end offcanvas-header-->
                    <div class="offcanvas-body profile-offcanvas p-0">
                        <div class="team-cover">
                            <img src="{{ URL::asset('build/images/small/img-9.jpg') }}" alt=""
                                class="img-fluid" />
                        </div>
                        <div class="p-3">
                            <div class="team-settings">
                                <div class="row">
                                    <div class="col">
                                        <button type="button"
                                            class="btn btn-light btn-icon rounded-circle btn-sm favourite-btn "> <i
                                                class="ri-star-fill fs-14"></i> </button>
                                    </div>
                                    <div class="col text-end dropdown">
                                        <a href="javascript:void(0);" id="dropdownMenuLink14" data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="ri-more-fill fs-17"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink14">
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ri-star-line me-2 align-middle"></i>Favorites</a></li>
                                            <li><a class="dropdown-item" href="javascript:void(0);"><i
                                                        class="ri-delete-bin-5-line me-2 align-middle"></i>Delete</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <div class="p-3 text-center">
                            <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}" alt=""
                                class="avatar-lg img-thumbnail rounded-circle mx-auto profile-img">
                            <div class="mt-3">
                                <h5 class="fs-15 profile-name">Nancy Martino</h5>
                                <p class="text-muted profile-designation">Team Leader & HR</p>
                            </div>
                            <div class="hstack gap-2 justify-content-center mt-4">
                                <div class="avatar-xs">
                                    <a href="javascript:void(0);"
                                        class="avatar-title bg-secondary-subtle text-secondary rounded fs-16">
                                        <i class="ri-facebook-fill"></i>
                                    </a>
                                </div>
                                <div class="avatar-xs">
                                    <a href="javascript:void(0);"
                                        class="avatar-title bg-success-subtle text-success rounded fs-16">
                                        <i class="ri-slack-fill"></i>
                                    </a>
                                </div>
                                <div class="avatar-xs">
                                    <a href="javascript:void(0);"
                                        class="avatar-title bg-info-subtle text-info rounded fs-16">
                                        <i class="ri-linkedin-fill"></i>
                                    </a>
                                </div>
                                <div class="avatar-xs">
                                    <a href="javascript:void(0);"
                                        class="avatar-title bg-danger-subtle text-danger rounded fs-16">
                                        <i class="ri-dribbble-fill"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0 text-center">
                            <div class="col-6">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1 profile-project">124</h5>
                                    <p class="text-muted mb-0">Projects</p>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-6">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1 profile-task">81</h5>
                                    <p class="text-muted mb-0">Tasks</p>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                        <div class="p-3">
                            <h5 class="fs-15 mb-3">Personal Details</h5>
                            <div class="mb-3">
                                <p class="text-muted text-uppercase fw-semibold fs-12 mb-2">Number</p>
                                <h6>+(256) 2451 8974</h6>
                            </div>
                            <div class="mb-3">
                                <p class="text-muted text-uppercase fw-semibold fs-12 mb-2">Email</p>
                                <h6>nancymartino@email.com</h6>
                            </div>
                            <div>
                                <p class="text-muted text-uppercase fw-semibold fs-12 mb-2">Location</p>
                                <h6 class="mb-0">Carson City - USA</h6>
                            </div>
                        </div>
                        <div class="p-3 border-top">
                            <h5 class="fs-15 mb-4">File Manager</h5>
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0 avatar-xs">
                                    <div class="avatar-title bg-danger-subtle text-danger rounded fs-16">
                                        <i class="ri-image-2-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1"><a href="javascript:void(0);">Images</a></h6>
                                    <p class="text-muted mb-0">4469 Files</p>
                                </div>
                                <div class="text-muted">
                                    12 GB
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0 avatar-xs">
                                    <div class="avatar-title bg-secondary-subtle text-secondary rounded fs-16">
                                        <i class="ri-file-zip-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1"><a href="javascript:void(0);">Documents</a></h6>
                                    <p class="text-muted mb-0">46 Files</p>
                                </div>
                                <div class="text-muted">
                                    3.46 GB
                                </div>
                            </div>
                            <div class="d-flex mb-3">
                                <div class="flex-shrink-0 avatar-xs">
                                    <div class="avatar-title bg-success-subtle text-success rounded fs-16">
                                        <i class="ri-live-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1"><a href="javascript:void(0);">Media</a></h6>
                                    <p class="text-muted mb-0">124 Files</p>
                                </div>
                                <div class="text-muted">
                                    4.3 GB
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-xs">
                                    <div class="avatar-title bg-primary-subtle text-primary rounded fs-16">
                                        <i class="ri-error-warning-line"></i>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1"><a href="javascript:void(0);">Others</a></h6>
                                    <p class="text-muted mb-0">18 Files</p>
                                </div>
                                <div class="text-muted">
                                    846 MB
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end offcanvas-body-->
                    <div class="offcanvas-foorter border p-3 hstack gap-3 text-center position-relative">
                        <button class="btn btn-light w-100"><i class="ri-question-answer-fill align-bottom ms-1"></i> Send
                            Message</button>
                        <a href="/pages_profile_basic" class="btn btn-primary w-100"><i
                                class="ri-user-3-fill align-bottom ms-1"></i> View Profile</a>
                    </div>
                </div>
                <!--end offcanvas-->
            </div>
        </div><!-- end col -->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/pages/team.init.js') }}"></script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
