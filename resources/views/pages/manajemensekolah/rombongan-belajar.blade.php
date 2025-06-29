@extends('layouts.master')
@section('title')
    @lang('translation.rombongan-belajar')
@endsection
@section('css')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.manajemen-sekolah')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-0">
        <div class="card-header border-bottom-dashed">
            <div class="row g-4 align-items-center">
                <div class="col-sm">
                    <div>
                        <h5 class="card-title mb-0">@lang('translation.tables') @lang('translation.rombongan-belajar')</h5>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex flex-wrap align-items-start gap-2">
                        @can('create manajemensekolah/rombongan-belajar')
                            <a class="btn btn-soft-primary btn-sm add-btn action"
                                href="{{ route('manajemensekolah.rombongan-belajar.create') }}">Tambah</a>
                        @endcan
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body border-bottom-dashed border-bottom">
            <form>
                <div class="row g-3">
                    <div class="col-xl-5">
                        <div class="search-box">
                            <input type="text" class="form-control search"
                                placeholder="Search Nama Lengkap Personil ....">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                    <!--end col-->
                    <div class="col-xl-7">
                        <div class="row g-3">
                            <div class="col-sm-4">
                                <div>
                                    <select class="form-control" data-plugin="choices" data-choices
                                        data-choices-search-false name="choices-single-default" id="idThnAjaran">
                                        <option value="all" selected>Pilih Tahun Ajaran</option>
                                        @foreach ($tahunAjaranOptions as $thnajar)
                                            <option value="{{ $thnajar }}">{{ $thnajar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-sm-5">
                                <div>
                                    <select class="form-control" data-plugin="choices" data-choices
                                        data-choices-search-false name="choices-single-default" id="idKodeKK">
                                        <option value="all" selected>Pilih Kompetensi Keahlian</option>
                                        @foreach ($kompetensiKeahlianOptions as $id => $kode_kk)
                                            <option value="{{ $id }}">{{ $kode_kk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-sm-3">
                                <div>
                                    <select class="form-control" data-plugin="choices" data-choices
                                        data-choices-search-false name="choices-single-default" id="idLevel">
                                        <option value="all" selected>Pilih Tingkat</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </form>
        </div>

        <div class="card-body">
            <div class="px-4 mx-n4 mt-n2 mb-0" data-simplebar style="height: calc(100vh - 358px);">
                {!! $dataTable->table([
                    'class' => 'table table-striped hover',
                    'style' => 'width:100%',
                ]) !!}
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

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'rombonganbelajar-table';

        function handleFilterAndReload(tableId) {
            var table = $('#' + tableId).DataTable();

            // Trigger saat mengetik di input pencarian
            $('.search').on('keyup change', function() {
                var searchValue = $(this).val(); // Ambil nilai dari input pencarian
                table.search(searchValue).draw(); // Lakukan pencarian dan gambar ulang tabel
            });

            $('#idThnAjaran, #idKodeKK, #idLevel').on('change', function() {
                table.ajax.reload(null, false); // Reload tabel saat dropdown berubah
            });

            // Override data yang dikirim ke server
            table.on('preXhr.dt', function(e, settings, data) {
                data.thajarSiswa = $('#idThnAjaran').val(); // Ambil nilai dari dropdown idKK
                data.kodeKKSiswa = $('#idKodeKK').val(); // Ambil nilai dari dropdown idJenkel
                data.tingkatSiswa = $('#idLevel').val(); // Ambil nilai dari dropdown idJenkel
            });
        }

        // Inisialisasi DataTable
        $(document).ready(function() {
            $('#' + datatable).DataTable();

            handleFilterAndReload(datatable);
            handleDataTableEvents(datatable);
            handleAction(datatable)
            handleDelete(datatable)
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
