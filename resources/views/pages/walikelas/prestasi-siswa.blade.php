@extends('layouts.master')
@section('title')
    @lang('translation.prestasi-siswa')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.walikelas')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <x-heading-title>Nilai @yield('title')
                            <span class="d-none d-lg-inline"> - </span>
                            <br class="d-inline d-lg-none">
                            {{ $waliKelas->rombel }}
                        </x-heading-title>
                        <div class="flex-shrink-0 me-2">
                            <x-btn-tambah can="create walikelas/prestasi-siswa" route="walikelas.prestasi-siswa.create"
                                label="Tambah" icon="ri-add-line" />
                        </div>
                    </div>
                </div>
                <div class="card-body p-1">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'prestasisiswa-table';

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
