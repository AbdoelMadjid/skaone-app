@extends('layouts.master')
@section('title')
    @lang('translation.faqs')
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.web-site-app')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title')</h5>
            <div>
                @can('create websiteapp/kumpulan-faqs')
                    <a class="btn btn-soft-primary btn-sm action" href="{{ route('websiteapp.kumpulan-faqs.create') }}">Tambah
                        Faqs</a>
                @endcan
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    <br>
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-3 mb-2">
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
                                        <button class="accordion-button {{ $key == 0 ? '' : 'collapsed' }}" type="button"
                                            data-bs-toggle="collapse"
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
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    {{-- DataTables Buttons --}}
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>


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
