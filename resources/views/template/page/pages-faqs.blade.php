@extends('layouts.master')
@section('title')
    @lang('translation.faqs')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.pages')
        @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card rounded-0 bg-success-subtle mx-n4 mt-n4 border-top">
                <div class="px-4">
                    <div class="row">
                        <div class="col-xxl-5 align-self-center">
                            <div class="py-4">
                                <h4 class="display-6 coming-soon-text">Frequently asked questions</h4>
                                <p class="text-success fs-15 mt-3">If you can not find answer to your question in our FAQ,
                                    you can always contact us or email us. We will answer you shortly!</p>
                                <div class="hstack flex-wrap gap-2">
                                    <button type="button" class="btn btn-primary btn-label rounded-pill"><i
                                            class="ri-mail-line label-icon align-middle rounded-pill fs-16 me-2"></i> Email
                                        Us</button>
                                    <button type="button" class="btn btn-info btn-label rounded-pill"><i
                                            class="ri-twitter-line label-icon align-middle rounded-pill fs-16 me-2"></i>
                                        Send Us Tweet</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-3 ms-auto">
                            <div class="mb-n5 pb-1 faq-img d-none d-xxl-block">
                                <img src="{{ URL::asset('build/images/faq-img.png') }}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->

            <div class="row justify-content-evenly mb-4">
                <div class="col-lg-4">
                    <div class="mt-3">
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0 me-1">
                                <i class="ri-question-line fs-24 align-middle text-success me-1"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fs-16 mb-0 fw-semibold">General Questions</h5>
                            </div>
                        </div>

                        <div class="accordion accordion-border-box" id="genques-accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="genques-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#genques-collapseOne" aria-expanded="true"
                                        aria-controls="genques-collapseOne">
                                        What is Lorem Ipsum ?
                                    </button>
                                </h2>
                                <div id="genques-collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="genques-headingOne" data-bs-parent="#genques-accordion">
                                    <div class="accordion-body">
                                        If several languages coalesce, the grammar of the resulting language is more simple
                                        and regular than that of the individual languages. The new common language will be
                                        more simple and regular than the existing European languages. It will be as simple
                                        their most common words.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="genques-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#genques-collapseTwo" aria-expanded="false"
                                        aria-controls="genques-collapseTwo">
                                        Why do we use it ?
                                    </button>
                                </h2>
                                <div id="genques-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="genques-headingTwo" data-bs-parent="#genques-accordion">
                                    <div class="accordion-body">
                                        The new common language will be more simple and regular than the existing European
                                        languages. It will be as simple as Occidental; in fact, it will be Occidental. To an
                                        English person, it will seem like simplified English, as a skeptical Cambridge
                                        friend of mine told me what Occidental is.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="genques-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#genques-collapseThree" aria-expanded="false"
                                        aria-controls="genques-collapseThree">
                                        Where does it come from ?
                                    </button>
                                </h2>
                                <div id="genques-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="genques-headingThree" data-bs-parent="#genques-accordion">
                                    <div class="accordion-body">
                                        he wise man therefore always holds in these matters to this principle of selection:
                                        he rejects pleasures to secure other greater pleasures, or else he endures pains to
                                        avoid worse pains.But I must explain to you how all this mistaken idea of denouncing
                                        pleasure and praising pain was born and I will give you a complete.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="genques-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#genques-collapseFour" aria-expanded="false"
                                        aria-controls="genques-collapseFour">
                                        Where can I get some ?
                                    </button>
                                </h2>
                                <div id="genques-collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="genques-headingFour" data-bs-parent="#genques-accordion">
                                    <div class="accordion-body">
                                        Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in
                                        faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi
                                        consectetuer lacinia. Nam pretium turpis et arcu arcu tortor, suscipit eget,
                                        imperdiet nec, imperdiet iaculis aliquam ultrices mauris.
                                    </div>
                                </div>
                            </div>
                        </div><!--end accordion-->
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mt-3">
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0 me-1">
                                <i class="ri-user-settings-line fs-24 align-middle text-success me-1"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fs-16 mb-0 fw-semibold">Manage Account</h5>
                            </div>
                        </div>

                        <div class="accordion accordion-border-box" id="manageaccount-accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="manageaccount-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#manageaccount-collapseOne" aria-expanded="false"
                                        aria-controls="manageaccount-collapseOne">
                                        Where can I get some ?
                                    </button>
                                </h2>
                                <div id="manageaccount-collapseOne" class="accordion-collapse collapse"
                                    aria-labelledby="manageaccount-headingOne" data-bs-parent="#manageaccount-accordion">
                                    <div class="accordion-body">
                                        If several languages coalesce, the grammar of the resulting language is more simple
                                        and regular than that of the individual languages. The new common language will be
                                        more simple and regular than the existing European languages. It will be as simple
                                        their most common words.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="manageaccount-headingTwo">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#manageaccount-collapseTwo" aria-expanded="true"
                                        aria-controls="manageaccount-collapseTwo">
                                        Where does it come from ?
                                    </button>
                                </h2>
                                <div id="manageaccount-collapseTwo" class="accordion-collapse collapse show"
                                    aria-labelledby="manageaccount-headingTwo" data-bs-parent="#manageaccount-accordion">
                                    <div class="accordion-body">
                                        The new common language will be more simple and regular than the existing European
                                        languages. It will be as simple as Occidental; in fact, it will be Occidental. To an
                                        English person, it will seem like simplified English, as a skeptical Cambridge
                                        friend of mine told me what Occidental is.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="manageaccount-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#manageaccount-collapseThree" aria-expanded="false"
                                        aria-controls="manageaccount-collapseThree">
                                        Why do we use it ?
                                    </button>
                                </h2>
                                <div id="manageaccount-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="manageaccount-headingThree"
                                    data-bs-parent="#manageaccount-accordion">
                                    <div class="accordion-body">
                                        he wise man therefore always holds in these matters to this principle of selection:
                                        he rejects pleasures to secure other greater pleasures, or else he endures pains to
                                        avoid worse pains.But I must explain to you how all this mistaken idea of denouncing
                                        pleasure and praising pain was born and I will give you a complete.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="manageaccount-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#manageaccount-collapseFour" aria-expanded="false"
                                        aria-controls="manageaccount-collapseFour">
                                        What is Lorem Ipsum ?
                                    </button>
                                </h2>
                                <div id="manageaccount-collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="manageaccount-headingFour" data-bs-parent="#manageaccount-accordion">
                                    <div class="accordion-body">
                                        Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in
                                        faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi
                                        consectetuer lacinia. Nam pretium turpis et arcu arcu tortor, suscipit eget,
                                        imperdiet nec, imperdiet iaculis aliquam ultrices mauris.
                                    </div>
                                </div>
                            </div>
                        </div><!--end accordion-->
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="mt-3">
                        <div class="d-flex align-items-center mb-2">
                            <div class="flex-shrink-0 me-1">
                                <i class="ri-shield-keyhole-line fs-24 align-middle text-success me-1"></i>
                            </div>
                            <div class="flex-grow-1">
                                <h5 class="fs-16 mb-0 fw-semibold">Privacy &amp; Security</h5>
                            </div>
                        </div>

                        <div class="accordion accordion-border-box" id="privacy-accordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="privacy-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#privacy-collapseOne" aria-expanded="true"
                                        aria-controls="privacy-collapseOne">
                                        Why do we use it ?
                                    </button>
                                </h2>
                                <div id="privacy-collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="privacy-headingOne" data-bs-parent="#privacy-accordion">
                                    <div class="accordion-body">
                                        If several languages coalesce, the grammar of the resulting language is more simple
                                        and regular than that of the individual languages. The new common language will be
                                        more simple and regular than the existing European languages. It will be as simple
                                        their most common words.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="privacy-headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#privacy-collapseTwo" aria-expanded="false"
                                        aria-controls="privacy-collapseTwo">
                                        Where can I get some ?
                                    </button>
                                </h2>
                                <div id="privacy-collapseTwo" class="accordion-collapse collapse"
                                    aria-labelledby="privacy-headingTwo" data-bs-parent="#privacy-accordion">
                                    <div class="accordion-body">
                                        The new common language will be more simple and regular than the existing European
                                        languages. It will be as simple as Occidental; in fact, it will be Occidental. To an
                                        English person, it will seem like simplified English, as a skeptical Cambridge
                                        friend of mine told me what Occidental is.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="privacy-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#privacy-collapseThree" aria-expanded="false"
                                        aria-controls="privacy-collapseThree">
                                        What is Lorem Ipsum ?
                                    </button>
                                </h2>
                                <div id="privacy-collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="privacy-headingThree" data-bs-parent="#privacy-accordion">
                                    <div class="accordion-body">
                                        he wise man therefore always holds in these matters to this principle of selection:
                                        he rejects pleasures to secure other greater pleasures, or else he endures pains to
                                        avoid worse pains.But I must explain to you how all this mistaken idea of denouncing
                                        pleasure and praising pain was born and I will give you a complete.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="privacy-headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#privacy-collapseFour" aria-expanded="false"
                                        aria-controls="privacy-collapseFour">
                                        Where does it come from ?
                                    </button>
                                </h2>
                                <div id="privacy-collapseFour" class="accordion-collapse collapse"
                                    aria-labelledby="privacy-headingFour" data-bs-parent="#privacy-accordion">
                                    <div class="accordion-body">
                                        Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in
                                        faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi
                                        consectetuer lacinia. Nam pretium turpis et arcu arcu tortor, suscipit eget,
                                        imperdiet nec, imperdiet iaculis aliquam ultrices mauris.
                                    </div>
                                </div>
                            </div>
                        </div><!--end accordion-->
                    </div>
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
