@extends('layouts.master')
@section('title')
    @lang('translation.menu')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.app-support')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0 me-2">
                    @can('create appsupport/menu')
                        <a class="btn btn-soft-primary btn-icon btn-sm action" href="{{ route('appsupport.menu.create') }}"
                            data-bs-toggle="tooltip" data-bs-placement="left" title="Tambah Menu"><i
                                class="ri-add-line fs-16"></i></a>
                    @endcan
                </div>
                <div class="flex-shrink-0 me-2">
                    @can('sort appsupport/menu')
                        <a class="btn btn-soft-secondary btn-sm btn-icon sort" href="{{ route('appsupport.menu.sort') }}"
                            data-bs-toggle="tooltip" data-bs-placement="left" title="Sort Menu"><i
                                class="ri-sort-asc fs-16"></i></a>
                    @endcan
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
        const datatable = 'menu-table';

        /* function handleMenuChange() {
                    $('[name=level_menu]').on('change', function() {
                        if (this.value == 'sub_menu') {
                            $('#main_menu_wrapper').removeClass('d-none')
                        } else {
                            $('#main_menu_wrapper').addClass('d-none')
                        }
                    })
                }
         */

        function handleMenuChange() {
            $('[name=level_menu]').on('change', function() {
                if (this.value == 'sub_menu') {
                    $('#main_menu_wrapper').removeClass('d-none');
                    $('#sub_menu_wrapper').addClass('d-none');
                    $('#permissions_wrapper').removeClass('d-none');
                } else if (this.value == 'sub_sub_menu') {
                    $('#main_menu_wrapper').addClass('d-none');
                    $('#sub_menu_wrapper').removeClass('d-none');
                    $('#permissions_wrapper').removeClass('d-none');
                } else {
                    $('#main_menu_wrapper').addClass('d-none');
                    $('#sub_menu_wrapper').addClass('d-none');
                    $('#permissions_wrapper').addClass('d-none');
                }
            });
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
