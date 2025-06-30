@extends('layouts.master')
@section('title')
    @lang('translation.versi-kurikulum')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.perangkat-kurikulum')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-0">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @lang('translation.versi-kurikulum')</h5>
            <div>
                @can('create kurikulum/perangkatkurikulum/versi-kurikulum')
                    <a class="btn btn-soft-primary btn-sm action"
                        href="{{ route('kurikulum.perangkatkurikulum.versi-kurikulum.create') }}">Tambah</a>
                @endcan
            </div>
        </div>
        <div class="card-body p-1">
            <div class="card-body p-1">
                <div id="datatable-wrapper" style="height: calc(100vh - 276px);">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
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
        const datatable = 'versikurikulum-table';

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
        ScrollDinamicDataTable(datatable, scrollOffsetOverride = 82);
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
