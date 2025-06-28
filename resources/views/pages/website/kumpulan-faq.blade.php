@extends('layouts.master')
@section('title')
    @lang('translation.faqs')
@endsection
@section('css')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.web-site-app')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @lang('translation.faqs')</h5>
                    <div>
                        @can('create websiteapp/kumpulan-faqs')
                            <a class="mb-3 btn btn-primary action" href="{{ route('websiteapp.kumpulan-faqs.create') }}">Add</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card border">
                <div class="card-body">
                    <div class="row justify-content-evenly mb-4">
                        @foreach ($faqs as $kategori => $faqsByCategory)
                            <!-- Loop through categories -->
                            <div class="col-lg-4">
                                <div class="mt-3">
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-shrink-0 me-1">
                                            <i class="ri-question-line fs-24 align-middle text-success me-1"></i>
                                        </div>
                                        <div class="flex-grow-1">
                                            <h5 class="fs-16 mb-0 fw-semibold">{{ $kategori }}</h5>
                                            <!-- Display the category -->
                                        </div>
                                    </div>

                                    <div class="accordion accordion-border-box" id="genques-accordion-{{ $loop->index }}">
                                        @foreach ($faqsByCategory as $key => $faq)
                                            <!-- Loop through FAQs under this category -->
                                            <div class="accordion-item">
                                                <h2 class="accordion-header"
                                                    id="genques-heading{{ $loop->parent->index }}-{{ $key }}">
                                                    <button class="accordion-button {{ $key == 0 ? '' : 'collapsed' }}"
                                                        type="button" data-bs-toggle="collapse"
                                                        data-bs-target="#genques-collapse{{ $loop->parent->index }}-{{ $key }}"
                                                        aria-expanded="{{ $key == 0 ? 'true' : 'false' }}"
                                                        aria-controls="genques-collapse{{ $loop->parent->index }}-{{ $key }}">
                                                        {{ $faq->pertanyaan }} ? <!-- Display the question -->
                                                    </button>
                                                </h2>
                                                <div id="genques-collapse{{ $loop->parent->index }}-{{ $key }}"
                                                    class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                                                    aria-labelledby="genques-heading{{ $loop->parent->index }}-{{ $key }}"
                                                    data-bs-parent="#genques-accordion-{{ $loop->index }}">
                                                    <div class="accordion-body">
                                                        {{ $faq->jawaban }} <!-- Display the answer -->
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div><!--end card-->
        </div><!--end col-->
    </div><!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'kumpulanfaq-table';

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
