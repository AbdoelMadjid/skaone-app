@extends('layouts.master')
@section('title')
    @lang('translation.capaian-pembelajaran')
@endsection
@section('css')
    {{-- <link href="{{ URL::asset('build/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.bubble.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('build/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}"
        rel="stylesheet" />
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
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-0">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @lang('translation.capaian-pembelajaran')</h5>
            <div>
                @can('create kurikulum/datakbm/capaian-pembelajaran')
                    <a class="btn btn-soft-primary btn-sm action"
                        href="{{ route('kurikulum.datakbm.capaian-pembelajaran.create') }}">Tambah</a>
                @endcan
            </div>
        </div>
        <div class="card-body p-1">
            <div id="datatable-wrapper" style="height: calc(100vh - 268px);">
                {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
    <script src="{{ URL::asset('build/libs/quill/quill.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/form-editor.init.js') }}"></script> --}}
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'capaianpembelajaran-table';

        handleDataTableEvents(datatable);

        function handleGenerateKodeCp() {
            // Mengambil nilai dari dropdown
            const tingkat = $('select[name="tingkat"]').val();
            const inisial_mp = $('select[name="inisial_mp"]').val();
            const fase = $('select[name="fase"]').val();
            const nomor_urut = $('select[name="nomor_urut"]').val();

            // Menggabungkan nilai
            const kode_cp = `${tingkat}-${inisial_mp}-${fase}-${nomor_urut}`;

            // Mengisi nilai ke input kode_cp
            $('#kode_cp').val(kode_cp);
        }

        function handleSelectChange() {
            // Triggered when any of the dropdowns change
            $('select[name="tingkat"], select[name="inisial_mp"], select[name="fase"], select[name="nomor_urut"]')
                .on('change', function() {
                    handleGenerateKodeCp();
                });
        }

        function handlePageLoad() {
            // Ketika halaman selesai dimuat, jalankan fungsi untuk mengisi rombel dan kode_rombel secara otomatis
            handleGenerateKodeCp();
        }

        handleAction(datatable, function(res) {
            select2Init();
            handleSelectChange();
            handlePageLoad();
        })
        handleDelete(datatable)
        ScrollDinamicDataTable(datatable, scrollOffsetOverride = 86);
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
