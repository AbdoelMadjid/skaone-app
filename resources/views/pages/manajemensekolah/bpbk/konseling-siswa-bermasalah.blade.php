@extends('layouts.master')
@section('title')
    @lang('translation.konseling-siswa-bermasalah')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.bimbingan-konseling')
        @endslot
        @slot('li_2')
            @lang('translation.konseling')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0 me-2">
                    <x-btn-tambah dinamisBtn="true" can="create bpbk/konseling/siswa-bermasalah"
                        route="bpbk.konseling.siswa-bermasalah.create" />
                </div>
                <div class="flex-shrink-0">
                    <x-btn-kembali href="{{ route('bpbk.konseling.index') }}" />
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
        const datatable = 'siswabermasalah-table';

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>


    <script></script>
@endsection
