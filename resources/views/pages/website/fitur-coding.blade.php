@extends('layouts.master')
@section('title')
    @lang('translation.fitur-coding')
@endsection
@section('css')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.web-site-app')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-0">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @lang('translation.fitur-coding')</h5>
            <div>
                @can('create websiteapp/fitur-coding')
                    <a class="btn btn-soft-primary btn-sm action" href="{{ route('websiteapp.fitur-coding.create') }}">Tambah</a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <div class="px-4 mx-n4 mt-n2 mb-0" id="datatable-wrapper" style="height: calc(100vh - 285px);">
                {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
            </div>
        </div>
    </div>
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
        const datatable = 'fiturcoding-table';

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
        ScrollDinamicDataTable(datatable, scrollOffsetOverride = 108);
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
