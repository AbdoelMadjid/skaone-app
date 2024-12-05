@extends('layouts.master')
@section('title')
    @lang('translation.ticket-details')
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-n4 mx-n4 mb-n5">
                <div class="bg-warning-subtle">
                    <div class="card-body pb-4 mb-5">
                        <div class="row">
                            <div class="col-md">
                                <div class="row align-items-center">
                                    <div class="col-md-auto">
                                        <div class="avatar-md mb-md-0 mb-4">
                                            <div class="avatar-title bg-white rounded-circle">
                                                <img src="{{ URL::asset('build/images/companies/img-4.png') }}"
                                                    alt="" class="avatar-sm" />
                                            </div>
                                        </div>
                                    </div><!--end col-->
                                    <div class="col-md">
                                        <h4 class="fw-semibold" id="ticket-title">#VLZ135 - Create an Excellent UI for a
                                            Dashboard</h4>
                                        <div class="hstack gap-3 flex-wrap">
                                            <div class="text-muted"><i class="ri-building-line align-bottom me-1"></i><span
                                                    id="ticket-client">Themesbrand</span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Create Date : <span class="fw-medium "
                                                    id="create-date">20 Dec, 2021</span></div>
                                            <div class="vr"></div>
                                            <div class="text-muted">Due Date : <span class="fw-medium" id="due-date">29
                                                    Dec, 2021</span></div>
                                            <div class="vr"></div>
                                            <div class="badge rounded-pill bg-info fs-12" id="ticket-status">New</div>
                                            <div class="badge rounded-pill bg-danger fs-12" id="ticket-priority">High</div>
                                        </div>
                                    </div><!--end col-->
                                </div><!--end row-->
                            </div><!--end col-->
                            <div class="col-md-auto mt-md-0 mt-4">
                                <div class="hstack gap-1 flex-wrap">
                                    <button type="button" class="btn avatar-xs mt-n1 p-0 favourite-btn active">
                                        <span class="avatar-title bg-transparent fs-15">
                                            <i class="ri-star-fill"></i>
                                        </span>
                                    </button>
                                    <button type="button" class="btn py-0 fs-16 text-body" id="settingDropdown"
                                        data-bs-toggle="dropdown">
                                        <i class="ri-share-line"></i>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="settingDropdown">
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="ri-eye-fill align-bottom me-2 text-muted"></i> View</a></li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="ri-share-forward-fill align-bottom me-2 text-muted"></i> Share
                                                with</a></li>
                                        <li><a class="dropdown-item" href="#"><i
                                                    class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete</a>
                                        </li>
                                    </ul>
                                    <button type="button" class="btn py-0 fs-16 text-body">
                                        <i class="ri-flag-line"></i>
                                    </button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </div><!-- end card body -->
                </div>
            </div><!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->

    <div class="row">
        <div class="col-xxl-9">
            <div class="card">
                <div class="card-body p-4">
                    <h6 class="fw-semibold text-uppercase mb-3">Ticket Description</h6>
                    <p class="text-muted">It would also help to know what the errors are - it could be something simple like
                        a message saying delivery is not available which could be a problem with your shipping templates.
                        Too much or too little spacing, as in the example below, can make things unpleasant for the reader.
                        The goal is to make your text as comfortable to read as possible. On the note of consistency, color
                        consistency is a MUST. If you’re not trying to create crazy contrast in your design, then a great
                        idea would be for you to use a color palette throughout your entire design. It will subconsciously
                        interest viewers and also is very pleasing to look at. <a href="javascript:void(0);"
                            class="link-secondary text-decoration-underline">Example</a></p>
                    <h6 class="fw-semibold text-uppercase mb-3">Create an Excellent UI for a Dashboard</h6>
                    <ul class="text-muted vstack gap-2 mb-4">
                        <li>Pick a Dashboard Type</li>
                        <li>Categorize information when needed</li>
                        <li>Provide Context</li>
                        <li>On using colors</li>
                        <li>On using the right graphs</li>
                    </ul>
                    <div class="mt-4">
                        <h6 class="fw-semibold text-uppercase mb-3">Here is the code you've requested</h6>
                        <div>
                            <pre class="language-markup rounded-2"><code>var app = document.getElementById(&quot;app&quot;);
var run = (model) =&gt; get(model, &quot;users&quot;, () =&gt;
get(model, &quot;posts&quot;,
() =&gt; {
model.users.forEach(user =&gt; model.userIdx[user.id] = user);
app.innerText = '';
model.posts.forEach(post =&gt;
app.appendChild(renderPost(post, model.userIdx[post.userId])));
}));
app.appendChild(Wrapper.generate(&quot;button&quot;, &quot;Load&quot;).click(() =&gt; run({
userIdx: {}
})).element);</code></pre>
                        </div>
                    </div>
                </div><!--end card-body-->
                <div class="card-body p-4">
                    <h5 class="card-title mb-4">Comments</h5>

                    <div data-simplebar style="height: 300px;" class="px-3 mx-n3">
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-8.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fs-13">Joseph Parker <small class="text-muted">20 Dec 2021 - 05:47AM</small>
                                </h5>
                                <p class="text-muted">I am getting message from customers that when they place order always
                                    get error message .</p>
                                <a href="javascript: void(0);" class="badge text-muted bg-light"><i
                                        class="mdi mdi-reply"></i> Reply</a>
                                <div class="d-flex mt-4">
                                    <div class="flex-shrink-0">
                                        <img src="{{ URL::asset('build/images/users/avatar-10.jpg') }}" alt=""
                                            class="avatar-xs rounded-circle" />
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fs-13">Alexis Clarke <small class="text-muted">22 Dec 2021 -
                                                02:32PM</small></h5>
                                        <p class="text-muted">Please be sure to check your Spam mailbox to see if your email
                                            filters have identified the email from Dell as spam.</p>
                                        <a href="javascript: void(0);" class="badge text-muted bg-light"><i
                                                class="mdi mdi-reply"></i> Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-6.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fs-13">Donald Palmer <small class="text-muted">24 Dec 2021 - 05:20PM</small>
                                </h5>
                                <p class="text-muted">If you have further questions, please contact Customer Support from
                                    the “Action Menu” on your <a href="javascript:void(0);"
                                        class="text-decoration-underline">Online Order Support</a>.</p>
                                <a href="javascript: void(0);" class="badge text-muted bg-light"><i
                                        class="mdi mdi-reply"></i> Reply</a>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src="{{ URL::asset('build/images/users/avatar-10.jpg') }}" alt=""
                                    class="avatar-xs rounded-circle" />
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="fs-13">Alexis Clarke <small class="text-muted">26 min ago</small></h5>
                                <p class="text-muted">Your <a href="javascript:void(0)"
                                        class="text-decoration-underline">Online Order Support</a> provides you with the
                                    most current status of your order. To help manage your order refer to the “Action Menu”
                                    to initiate return, contact Customer Support and more.</p>
                                <div class="row g-2 mb-3">
                                    <div class="col-lg-1 col-sm-2 col-6">
                                        <img src="{{ URL::asset('build/images/small/img-4.jpg') }}" alt=""
                                            class="img-fluid rounded">
                                    </div>
                                    <div class="col-lg-1 col-sm-2 col-6">
                                        <img src="{{ URL::asset('build/images/small/img-5.jpg') }}" alt=""
                                            class="img-fluid rounded">
                                    </div>
                                </div>
                                <a href="javascript: void(0);" class="badge text-muted bg-light"><i
                                        class="mdi mdi-reply"></i> Reply</a>
                                <div class="d-flex mt-4">
                                    <div class="flex-shrink-0">
                                        <img src="{{ URL::asset('build/images/users/avatar-6.jpg') }}" alt=""
                                            class="avatar-xs rounded-circle" />
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="fs-13">Donald Palmer <small class="text-muted">8 sec ago</small></h5>
                                        <p class="text-muted">Other shipping methods are available at checkout if you want
                                            your purchase delivered faster.</p>
                                        <a href="javascript: void(0);" class="badge text-muted bg-light"><i
                                                class="mdi mdi-reply"></i> Reply</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="javascript:void(0);" class="mt-3">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <label for="exampleFormControlTextarea1" class="form-label">Leave a Comments</label>
                                <textarea class="form-control bg-light border-light" id="exampleFormControlTextarea1" rows="3"
                                    placeholder="Enter comments"></textarea>
                            </div>
                            <div class="col-lg-12 text-end">
                                <a href="javascript:void(0);" class="btn btn-success">Post Comments</a>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div><!--end card-->
        </div><!--end col-->
        <div class="col-xxl-3">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Ticket Details</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless align-middle mb-0">
                            <tbody>
                                <tr>
                                    <td class="fw-medium">Ticket</td>
                                    <td>#VLZ<span id="t-no">135</span> </td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Client</td>
                                    <td id="t-client">Themesbrand</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Project</td>
                                    <td>Velzon - Admin Dashboard</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Assigned To:</td>
                                    <td>
                                        <div class="avatar-group">
                                            <a href="javascript:void(0);" class="avatar-group-item"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                                                data-bs-original-title="Erica Kernan">
                                                <img src="{{ URL::asset('build/images/users/avatar-4.jpg') }}"
                                                    alt="" class="rounded-circle avatar-xs" />
                                            </a>
                                            <a href="javascript:void(0);" class="avatar-group-item"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                                                data-bs-original-title="Alexis Clarke">
                                                <img src="{{ URL::asset('build/images/users/avatar-10.jpg') }}"
                                                    alt="" class="rounded-circle avatar-xs" />
                                            </a>
                                            <a href="javascript:void(0);" class="avatar-group-item"
                                                data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                                                data-bs-original-title="James Price">
                                                <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}"
                                                    alt="" class="rounded-circle avatar-xs" />
                                            </a>
                                            <a href="javascript: void(0);" class="avatar-group-item"
                                                data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top"
                                                data-bs-original-title="Add Members">
                                                <div class="avatar-xs">
                                                    <div
                                                        class="avatar-title fs-16 rounded-circle bg-light border-dashed border text-primary">
                                                        +
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Status:</td>
                                    <td>
                                        <select class="form-select" id="t-status" data-choices data-choices-search-false
                                            aria-label="Default select example">
                                            <option value>Stauts</option>
                                            <option value="New" selected>New</option>
                                            <option value="Open">Open</option>
                                            <option value="Inprogress">Inprogress</option>
                                            <option value="Closed">Closed</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Priority</td>
                                    <td>
                                        <span class="badge bg-danger" id="t-priority">High</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Create Date</td>
                                    <td id="c-date">20 Dec, 2021</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Due Date</td>
                                    <td id="d-date">29 Dec, 2021</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Last Activity</td>
                                    <td>14 min ago</td>
                                </tr>
                                <tr>
                                    <td class="fw-medium">Labels</td>
                                    <td class="hstack text-wrap gap-1">
                                        <span class="badge bg-primary-subtle text-primary">Admin</span>
                                        <span class="badge bg-primary-subtle text-primary">UI</span>
                                        <span class="badge bg-primary-subtle text-primary">Dashboard</span>
                                        <span class="badge bg-primary-subtle text-primary">Design</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div><!--end card-body-->
            </div><!--end card-->
            <div class="card">
                <div class="card-header">
                    <h6 class="card-title fw-semibold mb-0">Files Attachment</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center border border-dashed p-2 rounded">
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-light rounded">
                                <i class="ri-file-zip-line fs-20 text-primary"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-1"><a href="javascript:void(0);">Velzon-admin.zip</a></h6>
                            <small class="text-muted">3.2 MB</small>
                        </div>
                        <div class="hstack gap-3 fs-16">
                            <a href="javascript:void(0);" class="text-muted"><i class="ri-download-2-line"></i></a>
                            <a href="javascript:void(0);" class="text-muted"><i class="ri-delete-bin-line"></i></a>
                        </div>
                    </div>
                    <div class="d-flex  align-items-center border border-dashed p-2 rounded mt-2">
                        <div class="flex-shrink-0 avatar-sm">
                            <div class="avatar-title bg-light rounded">
                                <i class="ri-file-ppt-2-line fs-20 text-danger"></i>
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <h6 class="mb-1"><a href="javascript:void(0);">Velzon-admin.ppt</a></h6>
                            <small class="text-muted">4.5 MB</small>
                        </div>
                        <div class="hstack gap-3 fs-16">
                            <a href="javascript:void(0);" class="text-muted"><i class="ri-download-2-line"></i></a>
                            <a href="javascript:void(0);" class="text-muted"><i class="ri-delete-bin-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/pages/ticketdetail.init.js') }}"></script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
