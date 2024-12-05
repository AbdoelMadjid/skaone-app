@extends('layouts.master')
@section('title')
    @lang('translation.modul-ajar')
@endsection
@section('css')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.kaprodipkl')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @yield('title')</h5>
                    <div>
                        @can('create kaprodipkl/modul-ajar')
                            <a class="btn btn-primary action" href="{{ route('kaprodipkl.modul-ajar.create') }}">Add</a>
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
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'modulajar-table';

        handleDataTableEvents(datatable);

        function handleGenerateKodeCp() {
            // Mengambil nilai dari dropdown
            const kodekk = $('select[name="kode_kk"]').val();
            const kodecp = $('select[name="kode_cp"]').val();
            const nomortp = $('select[name="nomor_tp"]').val();

            // Menggabungkan nilai
            const kodemodulajar = `${kodekk}-${kodecp}-${nomortp}`;

            // Mengisi nilai ke input kode_cp
            $('#kode_modulajar').val(kodemodulajar);
        }

        function handleSelectChange() {
            // Triggered when any of the dropdowns change
            $('select[name="kode_kk"], select[name="kode_cp"], select[name="nomor_tp"]')
                .on('change', function() {
                    handleGenerateKodeCp();
                });
        }

        function handlePageLoad() {
            // Ketika halaman selesai dimuat, jalankan fungsi untuk mengisi rombel dan kode_rombel secara otomatis
            handleGenerateKodeCp();
        }

        handleAction(datatable, function(res) {
            handleSelectChange();
            handlePageLoad();
        })

        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
