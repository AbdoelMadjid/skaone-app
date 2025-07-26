@extends('layouts.master')
@section('title')
    @lang('translation.peserta-prakerin')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}"
        rel="stylesheet" />
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
                    <x-btn-group-dropdown>
                        @if (auth()->check() &&
                                auth()->user()->hasAnyRole(['master', 'panitiapkl']))
                            <x-btn-action label="Distribusi Peserta" icon="ri-route-fill" data-bs-toggle="modal"
                                data-bs-target="#distribusiPeserta" id="distribusiPesertaBtn"
                                title="Distribusikan Peserta Prakerin" />
                        @endif
                        <x-btn-tambah can="create panitiaprakerin/peserta" route="panitiaprakerin.peserta.create"
                            label="Tambah" icon="ri-add-line" />
                    </x-btn-group-dropdown>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    @include('pages.prakerin.panitia.peserta-distribusi')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'prakerinpeserta-table';

        handleDataTableEvents(datatable);
        handleAction(datatable, function(res) {
            select2Init();
        })
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
