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
                <div class="flex-shrink-0 me-2">
                    <div class="btn-group">
                        <button type="button" class="btn btn-light btn-sm dropdown-toggle" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">Action
                        </button>
                        <div class="dropdown-menu dropdown-menu-sm p-3">
                            <div class="d-grid gap-2">
                                <x-btn-tambah can="create kurikulum/datakbm/mata-pelajaran"
                                    route="kurikulum.datakbm.mata-pelajaran.create" label="Tambah" icon="ri-add-line" />

                                <x-btn-action href="{{ route('kurikulum.datakbm.mata-pelajaran-perjurusan.index') }}"
                                    label="Mapel Per Jurusan" icon="ri-book-line" />

                                <x-btn-action href="{{ route('mapelexportExcel') }}" label="Download"
                                    icon="ri-download-line" />

                                <x-btn-action label="Upload" icon="ri-upload-line" data-bs-toggle="modal"
                                    data-bs-target="#importModal" title="generateAkun" />
                            </div>
                        </div>
                    </div>
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
