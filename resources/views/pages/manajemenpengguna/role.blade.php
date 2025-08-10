@extends('layouts.master')
@section('title')
    @lang('translation.role')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.manajemen-pengguna')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-2 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header d-flex align-items-center">
            <x-heading-title>@yield('title')</x-heading-title>
            <div class="flex-shrink-0">
                <x-btn-tambah dinamisBtn="true" can="create manajemenpengguna/roles" route="manajemenpengguna.roles.create"
                    icon="ri-user-add-fill" />
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
        const datatable = 'role-table';

        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
