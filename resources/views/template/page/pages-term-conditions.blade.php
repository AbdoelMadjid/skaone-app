@extends('layouts.master')
@section('title')
    @lang('translation.term-conditions')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.pages')
        @endslot
    @endcomponent

    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card">
                <div class="bg-warning-subtle position-relative">
                    <div class="card-body p-5">
                        <div class="text-center">
                            <h3>@lang('translation.term-conditions')</h3>
                            <p class="mb-0 text-muted">Last update: 16 Sept, 2022</p>
                        </div>
                    </div>
                    <div class="shape">
                        <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                            xmlns:svgjs="http://svgjs.com/svgjs" width="1440" height="60" preserveAspectRatio="none"
                            viewBox="0 0 1440 60">
                            <g mask="url(&quot;#SvgjsMask1001&quot;)" fill="none">
                                <path d="M 0,4 C 144,13 432,48 720,49 C 1008,50 1296,17 1440,9L1440 60L0 60z"
                                    style="fill: var(--vz-secondary-bg);"></path>
                            </g>
                            <defs>
                                <mask id="SvgjsMask1001">
                                    <rect width="1440" height="60" fill="#ffffff"></rect>
                                </mask>
                            </defs>
                        </svg>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div>
                        <h5>Welcome to Velzon!</h5>
                        <p class="text-muted">These terms and conditions outline the rules and regulations for the use of
                            Company Name's Website, located at Website.com.</p>
                        <p class="text-muted">By accessing this website we assume you accept these terms and conditions. Do
                            not continue to use Website Name if you do not agree to take all of the terms and conditions
                            stated on this page.</p>
                        <p class="text-muted">Most interactive websites use cookies to let us retrieve the user's details
                            for each visit. Cookies are used by our website to enable the functionality of certain areas to
                            make it easier for people visiting our website. Some of our affiliate/advertising partners may
                            also use cookies.</p>
                    </div>

                    <div>
                        <h5>License</h5>
                        <p class="text-muted">Unless otherwise stated, Company Name and/or its licensors own the
                            intellectual property rights for all material on Website Name. All intellectual property rights
                            are reserved. You may access this from Website Name for your own personal use subjected to
                            restrictions set in these terms and conditions.</p>
                        <p class="text-muted">You must not:</p>
                        <ul class="text-muted vstack gap-2">
                            <li>
                                Republish material from Website Name
                            </li>
                            <li>
                                Sell, rent or sub-license material from Website Name
                            </li>
                            <li>
                                Reproduce, duplicate or copy material from Website Name
                            </li>
                            <li>
                                Redistribute content from Website Name
                            </li>
                        </ul>
                        <p class="text-muted">This Agreement shall begin on the date hereof.</p>
                        <p class="text-muted">Parts of this website offer an opportunity for users to post and exchange
                            opinions and information in certain areas of the website. Company Name does not filter, edit,
                            publish or review Comments prior to their presence on the website. Comments do not reflect the
                            views and opinions of Company Name,its agents and/or affiliates.</p>
                    </div>

                    <div>
                        <p class="text-muted">Company Name reserves the right to monitor all Comments and to remove any
                            Comments which can be considered inappropriate, offensive or causes breach of these Terms and
                            Conditions.</p>
                        <p class="text-muted">You warrant and represent that:</p>
                        <ul class="text-muted vstack gap-2">
                            <li>
                                You are entitled to post the Comments on our website and have all necessary licenses and
                                consents to do so;
                            </li>
                            <li>
                                The Comments do not invade any intellectual property right, including without limitation
                                copyright, patent or trademark of any third party;
                            </li>
                            <li>
                                The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise
                                unlawful material which is an invasion of privacy
                            </li>
                            <li>
                                The Comments will not be used to solicit or promote business or custom or present commercial
                                activities or unlawful activity.
                            </li>
                        </ul>
                        <p class="text-muted">You hereby grant Company Name a non-exclusive license to use, reproduce, edit
                            and authorize others to use, reproduce and edit any of your Comments in any and all forms,
                            formats or media.</p>
                        <p class="text-muted">Approved organizations may hyperlink to our Website as follows:</p>
                        <ul class="text-muted vstack gap-2">
                            <li>
                                By use of our corporate name; or
                            </li>
                            <li>
                                By use of the uniform resource locator being linked to; or
                            </li>
                            <li>
                                By use of any other description of our Website being linked to that makes sense within the
                                context and format of content on the linking party's site.
                            </li>
                        </ul>
                        <p class="text-muted fw-semibold">No use of Company Name's logo or other artwork will be allowed for
                            linking absent a trademark license agreement.</p>
                    </div>


                    <div class="text-end hstack gap-2 justify-content-end">
                        <a href="#!" class="btn btn-success">Accept</a>
                        <a href="#!" class="btn btn-outline-danger"><i class="ri-close-line align-bottom me-1"></i>
                            Decline</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
