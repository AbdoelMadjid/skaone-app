@extends('layouts.master')
@section('title')
    @lang('translation.referensi')
@endsection
@section('css')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.app-support')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @lang('translation.referensi')</h5>
            <div>
                @can('create appsupport/referensi')
                    <a class="btn btn-soft-primary btn-sm action" href="{{ route('appsupport.referensi.create') }}">Tambah
                        Refernsi</a>
                @endcan
            </div>
        </div>
        <div class="card-body p-1">
            {{-- <div class="px-4 mx-n4 mt-n3 mb-0"> --}}
            <div id="datatable-wrapper" style="height: calc(100vh - 268px);">
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
        const datatable = 'referensi-table';

        handleDataTableEvents(datatable);

        function toggleJenisInput() {
            var select = document.getElementById('jenis_select');
            var input = document.getElementById('jenis_input');
            if (select.value === 'new') {
                input.style.display = 'block';
            } else {
                input.style.display = 'none';
            }
        }

        handleAction(datatable, function() {
            toggleJenisInput();
        });

        handleDelete(datatable);
        ScrollDinamicDataTable(datatable, scrollOffsetOverride = 86); // Initialize dynamic scrolling for DataTable
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
