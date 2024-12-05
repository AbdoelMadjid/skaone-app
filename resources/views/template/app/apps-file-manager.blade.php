@extends('layouts.master')
@section('title')
    @lang('translation.file-manager')
@endsection
@section('content')
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
            <div class="p-3 d-flex flex-column h-100">
                <div class="mb-3">
                    <h5 class="mb-0 fw-semibold">My Drive</h5>
                </div>
                <div class="search-box">
                    <input type="text" class="form-control bg-light border-light" placeholder="Search here...">
                    <i class="ri-search-2-line search-icon"></i>
                </div>
                <div class="mt-3 mx-n4 px-4 file-menu-sidebar-scroll" data-simplebar>
                    <ul class="list-unstyled file-manager-menu">
                        <li>
                            <a data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                aria-controls="collapseExample">
                                <i class="ri-folder-2-line align-bottom me-2"></i> <span class="file-list-link">My
                                    Drive</span>
                            </a>
                            <div class="collapse show" id="collapseExample">
                                <ul class="sub-menu list-unstyled">
                                    <li>
                                        <a href="#!">Assets</a>
                                    </li>
                                    <li>
                                        <a href="#!">Marketing</a>
                                    </li>
                                    <li>
                                        <a href="#!">Personal</a>
                                    </li>
                                    <li>
                                        <a href="#!">Projects</a>
                                    </li>
                                    <li>
                                        <a href="#!">Templates</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#!"><i class="ri-file-list-2-line align-bottom me-2"></i> <span
                                    class="file-list-link">Documents</span></a>
                        </li>
                        <li>
                            <a href="#!"><i class="ri-image-2-line align-bottom me-2"></i> <span
                                    class="file-list-link">Media</span></a>
                        <li>
                            <a href="#!"><i class="ri-history-line align-bottom me-2"></i> <span
                                    class="file-list-link">Recent</span></a>
                        </li>
                        <li>
                            <a href="#!"><i class="ri-star-line align-bottom me-2"></i> <span
                                    class="file-list-link">Important</span></a>
                        </li>
                        </li>
                        <li>
                            <a href="#!"><i class="ri-delete-bin-line align-bottom me-2"></i> <span
                                    class="file-list-link">Deleted</span></a>
                        </li>
                    </ul>
                </div>


                <div class="mt-auto">
                    <h6 class="fs-11 text-muted text-uppercase mb-3">Storage Status</h6>
                    <div class="d-flex align-items-center">
                        <div class="flex-shrink-0">
                            <i class="ri-database-2-line fs-17"></i>
                        </div>
                        <div class="flex-grow-1 ms-3 overflow-hidden">
                            <div class="progress mb-2 progress-sm">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                    aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span class="text-muted fs-12 d-block text-truncate"><b>47.52</b>GB used of <b>119</b>GB</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="file-manager-content w-100 p-3 py-0">
            <div class="mx-n3 pt-4 px-4 file-manager-content-scroll" data-simplebar>
                <div id="folder-list" class="mb-2">
                    <div class="row justify-content-beetwen g-2 mb-3">

                        <div class="col">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2 d-block d-lg-none">
                                    <button type="button" class="btn btn-soft-success btn-icon btn-sm fs-16 file-menu-btn">
                                        <i class="ri-menu-2-fill align-bottom"></i>
                                    </button>
                                </div>
                                <div class="flex-grow-1">
                                    <h5 class="fs-16 mb-0">Folders</h5>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-auto">
                            <div class="d-flex gap-2 align-items-start">
                                <select class="form-control" data-choices data-choices-search-false
                                    name="choices-single-default" id="file-type">
                                    <option value="">File Type</option>
                                    <option value="All" selected>All</option>
                                    <option value="Video">Video</option>
                                    <option value="Images">Images</option>
                                    <option value="Music">Music</option>
                                    <option value="Documents">Documents</option>
                                </select>

                                <button class="btn btn-success w-sm create-folder-modal flex-shrink-0"
                                    data-bs-toggle="modal" data-bs-target="#createFolderModal"><i
                                        class="ri-add-line align-bottom me-1"></i> Create Folders</button>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                    <div class="row" id="folderlist-data">
                        <div class="col-xxl-3 col-6 folder-card">
                            <div class="card bg-light shadow-none" id="folder-1">
                                <div class="card-body">
                                    <div class="d-flex mb-1">
                                        <div class="form-check form-check-danger mb-3 fs-15 flex-grow-1">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="folderlistCheckbox_1" checked>
                                            <label class="form-check-label" for="folderlistCheckbox_1"></label>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-ghost-primary btn-icon btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-2-fill fs-16 align-bottom"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item view-item-btn"
                                                        href="javascript:void(0);">Open</a></li>
                                                <li><a class="dropdown-item edit-folder-list" href="#createFolderModal"
                                                        data-bs-toggle="modal" role="button">Rename</a></li>
                                                <li><a class="dropdown-item" href="#removeFolderModal"
                                                        data-bs-toggle="modal" role="button">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <div class="mb-2">
                                            <i class="ri-folder-2-fill align-bottom text-warning display-5"></i>
                                        </div>
                                        <h6 class="fs-15 folder-name">Projects</h6>
                                    </div>
                                    <div class="hstack mt-4 text-muted">
                                        <span class="me-auto"><b>349</b> Files</span>
                                        <span><b>4.10</b>GB</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-6 folder-card">
                            <div class="card bg-light shadow-none" id="folder-2">
                                <div class="card-body">
                                    <div class="d-flex mb-1">
                                        <div class="form-check form-check-danger mb-3 fs-15 flex-grow-1">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="folderlistCheckbox_2">
                                            <label class="form-check-label" for="folderlistCheckbox_2"></label>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-ghost-primary btn-icon btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-2-fill fs-16 align-bottom"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item view-item-btn"
                                                        href="javascript:void(0);">Open</a></li>
                                                <li><a class="dropdown-item edit-folder-list" href="#createFolderModal"
                                                        data-bs-toggle="modal" role="button">Rename</a></li>
                                                <li><a class="dropdown-item" href="#removeFolderModal"
                                                        data-bs-toggle="modal" role="button">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <div class="mb-2">
                                            <i class="ri-folder-2-fill align-bottom text-warning display-5"></i>
                                        </div>
                                        <h6 class="fs-15 folder-name">Documents</h6>
                                    </div>
                                    <div class="hstack mt-4 text-muted">
                                        <span class="me-auto"><b>2348</b> Files</span>
                                        <span><b>27.01</b>GB</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-6 folder-card">
                            <div class="card bg-light shadow-none" id="folder-3">
                                <div class="card-body">
                                    <div class="d-flex mb-1">
                                        <div class="form-check form-check-danger mb-3 fs-15 flex-grow-1">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="folderlistCheckbox_3">
                                            <label class="form-check-label" for="folderlistCheckbox_3"></label>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-ghost-primary btn-icon btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-2-fill fs-16 align-bottom"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item view-item-btn"
                                                        href="javascript:void(0);">Open</a></li>
                                                <li><a class="dropdown-item edit-folder-list" href="#createFolderModal"
                                                        data-bs-toggle="modal" role="button">Rename</a></li>
                                                <li><a class="dropdown-item" href="#removeFolderModal"
                                                        data-bs-toggle="modal" role="button">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <div class="mb-2">
                                            <i class="ri-folder-2-fill align-bottom text-warning display-5"></i>
                                        </div>
                                        <h6 class="fs-15 folder-name">Media</h6>
                                    </div>
                                    <div class="hstack mt-4 text-muted">
                                        <span class="me-auto"><b>12480</b> Files</span>
                                        <span><b>20.87</b>GB</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                        <div class="col-xxl-3 col-6 folder-card">
                            <div class="card bg-light shadow-none" id="folder-4">
                                <div class="card-body">
                                    <div class="d-flex mb-1">
                                        <div class="form-check form-check-danger mb-3 fs-15 flex-grow-1">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="folderlistCheckbox_4" checked>
                                            <label class="form-check-label" for="folderlistCheckbox_4"></label>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn btn-ghost-primary btn-icon btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-2-fill fs-16 align-bottom"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item view-item-btn"
                                                        href="javascript:void(0);">Open</a></li>
                                                <li><a class="dropdown-item edit-folder-list" href="#createFolderModal"
                                                        data-bs-toggle="modal" role="button">Rename</a></li>
                                                <li><a class="dropdown-item" href="#removeFolderModal"
                                                        data-bs-toggle="modal" role="button">Delete</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="mb-2">
                                            <i class="ri-folder-2-fill align-bottom text-warning display-5"></i>
                                        </div>
                                        <h6 class="fs-15 folder-name">Velzon v1.7.0</h6>
                                    </div>
                                    <div class="hstack mt-4 text-muted">
                                        <span class="me-auto"><b>180</b> Files</span>
                                        <span><b>478.65</b>MB</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <div>
                    <div class="d-flex align-items-center mb-3">
                        <h5 class="flex-grow-1 fs-16 mb-0" id="filetype-title">Recent File</h5>
                        <div class="flex-shrink-0">
                            <button class="btn btn-success createFile-modal" data-bs-toggle="modal"
                                data-bs-target="#createFileModal"><i class="ri-add-line align-bottom me-1"></i> Create
                                File</button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table align-middle table-nowrap mb-0">
                            <thead class="table-active">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">File Item</th>
                                    <th scope="col">File Size</th>
                                    <th scope="col">Recent Date</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="file-list"></tbody>
                        </table>
                    </div>
                    <!-- <a href="javascript:prevPage()" id="btn_prev">Prev</a> -->
                    <ul id="pagination" class="pagination pagination-lg"></ul>
                    <!-- <a href="javascript:nextPage()" id="btn_next">Next</a> -->
                    <div class="align-items-center mt-2 row g-3 text-center text-sm-start">
                        <div class="col-sm">
                            <div class="text-muted">Showing<span class="fw-semibold">4</span> of <span
                                    class="fw-semibold">125</span> Results
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <ul
                                class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0">
                                <li class="page-item disabled">
                                    <a href="#" class="page-link">←</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">1</a>
                                </li>
                                <li class="page-item active">
                                    <a href="#" class="page-link">2</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">3</a>
                                </li>
                                <li class="page-item">
                                    <a href="#" class="page-link">→</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="file-manager-detail-content p-3 py-0">
            <div class="mx-n3 pt-3 px-3 file-detail-content-scroll" data-simplebar>
                <div id="folder-overview">
                    <div class="d-flex align-items-center pb-3 border-bottom border-bottom-dashed">
                        <h5 class="flex-grow-1 fw-semibold mb-0">Overview</h5>
                        <div>
                            <button type="button" class="btn btn-soft-danger btn-icon btn-sm fs-16 close-btn-overview">
                                <i class="ri-close-fill align-bottom"></i>
                            </button>
                        </div>
                    </div>
                    <div id="simple_dount_chart"
                        data-colors='["--vz-info", "--vz-danger", "--vz-primary", "--vz-success"]'
                        class="apex-charts mt-3" dir="ltr"></div>
                    <div class="mt-4">
                        <ul class="list-unstyled vstack gap-4">
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs">
                                            <div class="avatar-title rounded bg-secondary-subtle text-secondary">
                                                <i class="ri-file-text-line fs-17"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-1 fs-15">Documents</h5>
                                        <p class="mb-0 fs-12 text-muted">2348 files</p>
                                    </div>
                                    <b>27.01 GB</b>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs">
                                            <div class="avatar-title rounded bg-success-subtle text-success">
                                                <i class="ri-gallery-line fs-17"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-1 fs-15">Media</h5>
                                        <p class="mb-0 fs-12 text-muted">12480 files</p>
                                    </div>
                                    <b>20.87 GB</b>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs">
                                            <div class="avatar-title rounded bg-warning-subtle text-warning">
                                                <i class="ri-folder-2-line fs-17"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-1 fs-15">Projects</h5>
                                        <p class="mb-0 fs-12 text-muted">349 files</p>
                                    </div>
                                    <b>4.10 GB</b>
                                </div>
                            </li>
                            <li>
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xs">
                                            <div class="avatar-title rounded bg-primary-subtle text-primary">
                                                <i class="ri-error-warning-line fs-17"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="mb-1 fs-15">Others</h5>
                                        <p class="mb-0 fs-12 text-muted">9873 files</p>
                                    </div>
                                    <b>33.54 GB</b>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="pb-3 mt-auto">
                        <div class="alert alert-danger d-flex align-items-center mb-0">
                            <div class="flex-shrink-0">
                                <i class="ri-cloud-line text-danger align-bottom display-5"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="text-danger fs-14">Upgrade to Pro</h5>
                                <p class="text-muted mb-2">Get more space for your...</p>
                                <button class="btn btn-sm btn-danger"><i class="ri-upload-cloud-line align-bottom"></i>
                                    Upgrade Now</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="file-overview" class="h-100">
                    <div class="d-flex h-100 flex-column">
                        <div class="d-flex align-items-center pb-3 border-bottom border-bottom-dashed mb-3 gap-2">
                            <h5 class="flex-grow-1 fw-semibold mb-0">File Preview</h5>
                            <div>
                                <button type="button" class="btn btn-ghost-primary btn-icon btn-sm fs-16 favourite-btn">
                                    <i class="ri-star-fill align-bottom"></i>
                                </button>
                                <button type="button"
                                    class="btn btn-soft-danger btn-icon btn-sm fs-16 close-btn-overview">
                                    <i class="ri-close-fill align-bottom"></i>
                                </button>
                            </div>
                        </div>

                        <div class="pb-3 border-bottom border-bottom-dashed mb-3">
                            <div class="file-details-box bg-light p-3 text-center rounded-3 border border-light mb-3">
                                <div class="display-4 file-icon">
                                    <i class="ri-file-text-fill text-secondary"></i>
                                </div>
                            </div>
                            <button type="button" class="btn btn-icon btn-sm btn-ghost-success float-end fs-16"><i
                                    class="ri-share-forward-line"></i></button>
                            <h5 class="fs-16 mb-1 file-name">html.docx</h5>
                            <p class="text-muted mb-0 fs-12"><span class="file-size">0.3 KB</span>, <span
                                    class="create-date">19 Apr, 2022</span></p>
                        </div>
                        <div>
                            <h5 class="fs-12 text-uppercase text-muted mb-3">File Description :</h5>

                            <div class="table-responsive">
                                <table class="table table-borderless table-nowrap table-sm">
                                    <tbody>
                                        <tr>
                                            <th scope="row" style="width: 35%;">File Name :</th>
                                            <td class="file-name">html.docx</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">File Type :</th>
                                            <td class="file-type">Documents</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Size :</th>
                                            <td class="file-size">0.3 KB</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Created :</th>
                                            <td class="create-date">19 Apr, 2022</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Path :</th>
                                            <td class="file-path">
                                                <div class="user-select-all text-truncate">*:\projects\src\assets\images
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div>
                                <h5 class="fs-12 text-uppercase text-muted mb-3">Share Information:</h5>
                                <div class="table-responsive">
                                    <table class="table table-borderless table-nowrap table-sm">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="width: 35%;">Share Name :</th>
                                                <td class="share-name">\\*\Projects</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Share Path :</th>
                                                <td class="share-path">velzon:\Documents\</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="mt-auto border-top border-top-dashed py-3">
                            <div class="hstack gap-2">
                                <button type="button" class="btn btn-soft-primary w-100"><i
                                        class="ri-download-2-line align-bottom me-1"></i> Download</button>
                                <button type="button" class="btn btn-soft-danger w-100 remove-file-overview"
                                    data-remove-id="" data-bs-toggle="modal" data-bs-target="#removeFileItemModal"><i
                                        class="ri-close-fill align-bottom me-1"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- START CREATE FOLDER MODAL -->
    <div class="modal fade zoomIn" id="createFolderModal" tabindex="-1" aria-labelledby="createFolderModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-success-subtle">
                    <h5 class="modal-title" id="createFolderModalLabel">Create Folder</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="addFolderBtn-close"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off" class="needs-validation createfolder-form" id="createfolder-form"
                        novalidate>
                        <div class="mb-4">
                            <label for="foldername-input" class="form-label">Folder Name</label>
                            <input type="text" class="form-control" id="foldername-input" required
                                placeholder="Enter folder name">
                            <div class="invalid-feedback">Please enter a folder name.</div>
                            <input type="hidden" class="form-control" id="folderid-input" value=""
                                placeholder="Enter folder name">
                        </div>
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i
                                    class="ri-close-line align-bottom"></i> Close</button>
                            <button type="submit" class="btn btn-primary" id="addNewFolder">Add Folder</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END CREATE FOLDER MODAL -->

    <!-- START CREATE FILE MODAL -->
    <div class="modal fade zoomIn" id="createFileModal" tabindex="-1" aria-labelledby="createFileModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-success-subtle">
                    <h5 class="modal-title" id="createFileModalLabel">Create File</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" id="addFileBtn-close"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form autocomplete="off" class="needs-validation createfile-form" id="createfile-form" novalidate>
                        <div class="mb-4">
                            <label for="filename-input" class="form-label">File Name</label>
                            <input type="text" class="form-control" id="filename-input" value="" required
                                placeholder="Enter file name" />
                            <div class="invalid-feedback">Please enter a file name.</div>
                            <input type="hidden" class="form-control" id="fileid-input" value=""
                                placeholder="Enter file name">
                        </div>
                        <div class="hstack gap-2 justify-content-end">
                            <button type="button" class="btn btn-ghost-success" data-bs-dismiss="modal"><i
                                    class="ri-close-line align-bottom"></i> Close</button>
                            <button type="submit" class="btn btn-primary" id="addNewFile">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END CREATE FILE MODAL -->

    <!-- removeFileItemModal -->
    <div id="removeFileItemModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-removefilemodal"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you sure you want to remove this item ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger" id="remove-fileitem">Yes, Delete It!</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- removeFileItemModal -->
    <div id="removeFolderModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="close-removeFoldermodal"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                            colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you sure you want to remove this folder ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger" id="remove-folderList">Yes, Delete
                            It!</button>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@endsection
@section('script')
    <!-- apexcharts -->
    <script src="{{ URL::asset('build/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/file-manager.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
