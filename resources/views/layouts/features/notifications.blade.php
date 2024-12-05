<div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
    <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
        id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
        aria-expanded="false">
        <i class='bx bx-bell fs-22'></i>
        <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">3<span
                class="visually-hidden">unread messages</span></span>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
        aria-labelledby="page-header-notifications-dropdown">

        <div class="dropdown-head bg-primary bg-pattern rounded-top">
            <div class="p-3">
                <div class="row align-items-center">
                    <div class="col">
                        <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                    </div>
                    <div class="col-auto dropdown-tabs">
                        <span class="badge bg-light-subtle text-body fs-13"> 4 New</span>
                    </div>
                </div>
            </div>

            <div class="px-2 pt-2">
                <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true"
                    id="notificationItemsTab" role="tablist">
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab" role="tab"
                            aria-selected="true">
                            All (4)
                        </a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-bs-toggle="tab" href="#messages-tab" role="tab"
                            aria-selected="false">
                            Messages
                        </a>
                    </li>
                    <li class="nav-item waves-effect waves-light">
                        <a class="nav-link" data-bs-toggle="tab" href="#alerts-tab" role="tab"
                            aria-selected="false">
                            Alerts
                        </a>
                    </li>
                </ul>
            </div>

        </div>

        <div class="tab-content position-relative" id="notificationItemsTabContent">
            <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                <div data-simplebar style="max-height: 300px;" class="pe-2">
                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                        <div class="d-flex">
                            <div class="avatar-xs me-3 flex-shrink-0">
                                <span class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                    <i class="bx bx-badge-check"></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <a href="#!" class="stretched-link">
                                    <h6 class="mt-0 mb-2 lh-base">Your <b>Elite</b> author Graphic
                                        Optimization <span class="text-secondary">reward</span> is
                                        ready!
                                    </h6>
                                </a>
                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                    <span><i class="mdi mdi-clock-outline"></i> Just 30 sec ago</span>
                                </p>
                            </div>
                            <div class="px-2 fs-15">
                                <div class="form-check notification-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="all-notification-check01">
                                    <label class="form-check-label" for="all-notification-check01"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                        <div class="d-flex">
                            <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}"
                                class="me-3 rounded-circle avatar-xs flex-shrink-0" alt="user-pic">
                            <div class="flex-grow-1">
                                <a href="#!" class="stretched-link">
                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela Bernier</h6>
                                </a>
                                <div class="fs-13 text-muted">
                                    <p class="mb-1">Answered to your comment on the cash flow
                                        forecast's
                                        graph 🔔.</p>
                                </div>
                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                    <span><i class="mdi mdi-clock-outline"></i> 48 min ago</span>
                                </p>
                            </div>
                            <div class="px-2 fs-15">
                                <div class="form-check notification-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="all-notification-check02">
                                    <label class="form-check-label" for="all-notification-check02"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                        <div class="d-flex">
                            <div class="avatar-xs me-3 flex-shrink-0">
                                <span class="avatar-title bg-danger-subtle text-danger rounded-circle fs-16">
                                    <i class='bx bx-message-square-dots'></i>
                                </span>
                            </div>
                            <div class="flex-grow-1">
                                <a href="#!" class="stretched-link">
                                    <h6 class="mt-0 mb-2 fs-13 lh-base">You have received <b
                                            class="text-success">20</b> new messages in the
                                        conversation
                                    </h6>
                                </a>
                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                    <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                </p>
                            </div>
                            <div class="px-2 fs-15">
                                <div class="form-check notification-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="all-notification-check03">
                                    <label class="form-check-label" for="all-notification-check03"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-reset notification-item d-block dropdown-item position-relative">
                        <div class="d-flex">
                            <img src="{{ URL::asset('build/images/users/avatar-8.jpg') }}"
                                class="me-3 rounded-circle avatar-xs flex-shrink-0" alt="user-pic">
                            <div class="flex-grow-1">
                                <a href="#!" class="stretched-link">
                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen Gibson</h6>
                                </a>
                                <div class="fs-13 text-muted">
                                    <p class="mb-1">We talked about a project on linkedin.</p>
                                </div>
                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                    <span><i class="mdi mdi-clock-outline"></i> 4 hrs ago</span>
                                </p>
                            </div>
                            <div class="px-2 fs-15">
                                <div class="form-check notification-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="all-notification-check04">
                                    <label class="form-check-label" for="all-notification-check04"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-3 text-center view-all">
                        <button type="button" class="btn btn-soft-success waves-effect waves-light">View
                            All Notifications <i class="ri-arrow-right-line align-middle"></i></button>
                    </div>
                </div>

            </div>

            <div class="tab-pane fade py-2 ps-2" id="messages-tab" role="tabpanel" aria-labelledby="messages-tab">
                <div data-simplebar style="max-height: 300px;" class="pe-2">
                    <div class="text-reset notification-item d-block dropdown-item">
                        <div class="d-flex">
                            <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}"
                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                            <div class="flex-grow-1">
                                <a href="#!" class="stretched-link">
                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">James Lemire</h6>
                                </a>
                                <div class="fs-13 text-muted">
                                    <p class="mb-1">We talked about a project on linkedin.</p>
                                </div>
                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                    <span><i class="mdi mdi-clock-outline"></i> 30 min ago</span>
                                </p>
                            </div>
                            <div class="px-2 fs-15">
                                <div class="form-check notification-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="messages-notification-check01">
                                    <label class="form-check-label" for="messages-notification-check01"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-reset notification-item d-block dropdown-item">
                        <div class="d-flex">
                            <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}"
                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                            <div class="flex-grow-1">
                                <a href="#!" class="stretched-link">
                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela Bernier</h6>
                                </a>
                                <div class="fs-13 text-muted">
                                    <p class="mb-1">Answered to your comment on the cash flow
                                        forecast's
                                        graph 🔔.</p>
                                </div>
                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                    <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                </p>
                            </div>
                            <div class="px-2 fs-15">
                                <div class="form-check notification-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="messages-notification-check02">
                                    <label class="form-check-label" for="messages-notification-check02"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-reset notification-item d-block dropdown-item">
                        <div class="d-flex">
                            <img src="{{ URL::asset('build/images/users/avatar-6.jpg') }}"
                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                            <div class="flex-grow-1">
                                <a href="#!" class="stretched-link">
                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">Kenneth Brown</h6>
                                </a>
                                <div class="fs-13 text-muted">
                                    <p class="mb-1">Mentionned you in his comment on 📃 invoice
                                        #12501.
                                    </p>
                                </div>
                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                    <span><i class="mdi mdi-clock-outline"></i> 10 hrs ago</span>
                                </p>
                            </div>
                            <div class="px-2 fs-15">
                                <div class="form-check notification-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="messages-notification-check03">
                                    <label class="form-check-label" for="messages-notification-check03"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-reset notification-item d-block dropdown-item">
                        <div class="d-flex">
                            <img src="{{ URL::asset('build/images/users/avatar-8.jpg') }}"
                                class="me-3 rounded-circle avatar-xs" alt="user-pic">
                            <div class="flex-grow-1">
                                <a href="#!" class="stretched-link">
                                    <h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen Gibson</h6>
                                </a>
                                <div class="fs-13 text-muted">
                                    <p class="mb-1">We talked about a project on linkedin.</p>
                                </div>
                                <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                    <span><i class="mdi mdi-clock-outline"></i> 3 days ago</span>
                                </p>
                            </div>
                            <div class="px-2 fs-15">
                                <div class="form-check notification-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                        id="messages-notification-check04">
                                    <label class="form-check-label" for="messages-notification-check04"></label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="my-3 text-center view-all">
                        <button type="button" class="btn btn-soft-success waves-effect waves-light">View
                            All Messages <i class="ri-arrow-right-line align-middle"></i></button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade p-4" id="alerts-tab" role="tabpanel" aria-labelledby="alerts-tab"></div>

            <div class="notification-actions" id="notification-actions">
                <div class="d-flex text-muted justify-content-center">
                    Select <div id="select-content" class="text-body fw-semibold px-1">0</div> Result
                    <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal"
                        data-bs-target="#removeNotificationModal">Remove</button>
                </div>
            </div>
        </div>
    </div>
</div>
