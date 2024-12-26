@extends('layouts.master')
@section('title')
    @lang('translation.mata-pelajaran')
@endsection
@section('css')
    {{--     <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}"
        rel="stylesheet" /> --}}
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @lang('translation.mata-pelajaran')</h5>
                    <div>
                        <a href="{{ route('mapelexportExcel') }}" class="btn btn-soft-primary">Download</a>
                        <button type="button" class="btn btn-soft-primary" data-bs-toggle="modal"
                            data-bs-target="#importModal">
                            Import
                        </button>
                        <a class="btn btn-soft-primary"
                            href="{{ route('kurikulum.datakbm.mata-pelajaran-perjurusan.index') }}">Mapel
                            Per Jurusan</a>
                        @can('create kurikulum/datakbm/mata-pelajaran')
                            <a class="btn btn-soft-primary action"
                                href="{{ route('kurikulum.datakbm.mata-pelajaran.create') }}">Tambah</a>
                        @endcan

                    </div>
                </div>
                <div class="card-body">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    @include('pages.kurikulum.datakbm.mata-pelajaran-import')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script> --}}

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'matapelajaran-table';

        handleDataTableEvents(datatable);
        handleAction(datatable);
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
