@extends('layouts.master')
@section('title')
    @lang('translation.capaian-pembelajaran')
@endsection
@section('css')
    {{--  --}}
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
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    <x-btn-tambah can="create kurikulum/datakbm/capaian-pembelajaran"
                        route="kurikulum.datakbm.capaian-pembelajaran.create" label="Tambah" icon="ri-add-line" />
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
@endsection
@section('script')
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
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
