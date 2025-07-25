@extends('layouts.master')
@section('title')
    @lang('translation.question')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.web-site-app')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0 me-2">
                    <x-btn-tambah can="create websiteapp/question" route="websiteapp.question.create" label="Tambah Pertanyaan"
                        icon="ri-add-line" />
                </div>
                <div class="flex-shrink-0 me-2">
                    <a class="btn btn-light btn-label waves-effect waves-light btn-sm"
                        href="{{ route('websiteapp.polling.index') }}"> <i
                            class="ri-speed-mini-fill label-icon align-middle fs-16 me-2"></i> Polling</a>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'question-table';

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
