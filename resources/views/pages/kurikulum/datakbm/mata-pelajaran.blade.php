@extends('layouts.master')
@section('title')
    @lang('translation.mata-pelajaran')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.data-kbm')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title')</h5>
            <div>
                <a href="{{ route('mapelexportExcel') }}" class="btn btn-soft-primary btn-sm">Download</a>
                <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#importModal">
                    Import
                </button>
                <a class="btn btn-soft-primary btn-sm"
                    href="{{ route('kurikulum.datakbm.mata-pelajaran-perjurusan.index') }}">Mapel
                    Per Jurusan</a>
                @can('create kurikulum/datakbm/mata-pelajaran')
                    <a class="btn btn-soft-primary btn-sm action"
                        href="{{ route('kurikulum.datakbm.mata-pelajaran.create') }}">Tambah</a>
                @endcan

            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    @include('pages.kurikulum.datakbm.mata-pelajaran-import')
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'matapelajaran-table';

        handleDataTableEvents(datatable);
        handleAction(datatable);
        handleDelete(datatable)
        ScrollDinamicDataTable(datatable, scrollOffsetOverride = 86);
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
