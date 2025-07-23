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
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title')</h5>
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
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
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
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
