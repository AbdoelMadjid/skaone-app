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
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    <x-btn-group-dropdown size="sm">
                        <x-btn-action href="{{ route('kurikulum.datakbm.mata-pelajaran-perjurusan.index') }}"
                            label="Mapel Jurusan" icon="ri-file-copy-fill" />
                        <div class="dropdown-divider"></div>
                        <x-btn-tambah can="create kurikulum/datakbm/mata-pelajaran"
                            route="kurikulum.datakbm.mata-pelajaran.create" label="Tambah" icon="ri-add-line" />
                        <x-btn-action href="{{ route('mapelexportExcel') }}" label="Download" icon="ri-download-2-fill" />
                        <x-btn-action label="Upload" icon="ri-upload-2-fill" data-bs-toggle="modal"
                            data-bs-target="#importModal" title="generateAkun" />
                    </x-btn-group-dropdown>
                </div>
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
