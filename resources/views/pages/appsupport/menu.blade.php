@extends('layouts.master')
@section('title')
    @lang('translation.menu')
@endsection
@section('css')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.app-support')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-0">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1">@yield('title')</h5>
            <div>
                @can('create appsupport/menu')
                    <a class="btn btn-soft-info btn-icon btn-sm action" href="{{ route('appsupport.menu.create') }}"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Tambah Menu"><i class="ri-add-line fs-16"></i></a>
                @endcan
                @can('sort appsupport/menu')
                    <a class="btn btn-soft-success btn-sm btn-icon sort" href="{{ route('appsupport.menu.sort') }}"
                        data-bs-toggle="tooltip" data-bs-placement="left" title="Sort Menu"><i
                            class="ri-sort-asc fs-16"></i></a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <div id="datatable-wrapper" style="height: calc(100vh - 294px);">
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
        const datatable = 'menu-table';

        function handleMenuChange() {
            $('[name=level_menu]').on('change', function() {
                if (this.value == 'sub_menu') {
                    $('#main_menu_wrapper').removeClass('d-none')
                } else {
                    $('#main_menu_wrapper').addClass('d-none')
                }
            })
        }

        $('.sort').on('click', function(e) {
            e.preventDefault()

            handleAjax(this.href, 'put')
                .onSuccess(function(res) {
                    window.location.reload()
                }, false)
                .execute()
        })

        handleAction(datatable, function() {
            handleMenuChange()
        })
        ScrollDinamicDataTable(datatable); // Initialize dynamic scrolling for DataTable
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
