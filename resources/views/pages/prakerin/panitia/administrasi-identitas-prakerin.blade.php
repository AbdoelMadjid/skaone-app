@extends('layouts.master')
@section('title')
    @lang('translation.administrasi-identitas-prakerin')
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
                    <x-btn-tambah can="create panitiaprakerin/administrasi/identitas-prakerin"
                        route="panitiaprakerin.administrasi.identitas-prakerin.create" label="Tambah" icon="ri-add-line" />
                    <x-btn-kembali href="{{ route('panitiaprakerin.administrasi.index') }}" />
                </div>
            </div>
        </div>
        <div class="card-body p-2">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'prakerinidentitas-table';

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
