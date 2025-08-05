@extends('layouts.master')
@section('title')
    @lang('translation.perusahaan')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.panitia')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    <x-btn-group-dropdown size="sm">
                        @if (auth()->check() &&
                                auth()->user()->hasAnyRole(['master', 'panitiapkl']))
                            <x-btn-action label="Upload" icon="ri-upload-fill" data-bs-toggle="modal"
                                data-bs-target="#importModal" />
                        @endif
                        <x-btn-tambah can="create panitiaprakerin/perusahaan" route="panitiaprakerin.perusahaan.create"
                            label="Tambah" icon="ri-add-line" />
                    </x-btn-group-dropdown>
                </div>
            </div>
        </div>
        <div class="card-body p-2">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    @include('pages.prakerin.panitia.perusahaan-import')
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'prakerinperusahaan-table';

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
