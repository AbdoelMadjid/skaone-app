@extends('layouts.master')
@section('title')
    @lang('translation.rombongan-belajar')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.manajemen-sekolah')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title')</h5>
                <div class="flex-shrink-0 me-2">
                    <div class="search-box">
                        <input type="text" class="form-control form-control-sm search"
                            placeholder="Search Nama Lengkap Personil ....">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
                <div class="flex-shrink-0 me-2">
                    <select class="form-control form-control-sm" data-plugin="choices" data-choices
                        data-choices-search-false name="choices-single-default" id="idThnAjaran">
                        <option value="all" selected>Pilih Tahun Ajaran</option>
                        @foreach ($tahunAjaranOptions as $thnajar)
                            <option value="{{ $thnajar }}">{{ $thnajar }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-shrink-0 me-2">
                    <select class="form-control form-control-sm" data-plugin="choices" data-choices
                        data-choices-search-false name="choices-single-default" id="idKodeKK">
                        <option value="all" selected>Pilih Kompetensi Keahlian</option>
                        @foreach ($kompetensiKeahlianOptions as $id => $kode_kk)
                            <option value="{{ $id }}">{{ $kode_kk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex-shrink-0 me-2">
                    <select class="form-control form-control-sm" data-plugin="choices" data-choices
                        data-choices-search-false name="choices-single-default" id="idLevel">
                        <option value="all" selected>Pilih Tingkat</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class="vr me-2"></div>
                <div class="flex-shrink-0">
                    @can('create manajemensekolah/rombongan-belajar')
                        <a class="btn btn-soft-primary btn-sm add-btn action"
                            href="{{ route('manajemensekolah.rombongan-belajar.create') }}">Tambah</a>
                    @endcan
                </div>
                {{-- <div class="flex-shrink-0 me-1">
                    <button type="button" class="btn btn-soft-danger btn-sm" data-bs-toggle="modal"
                        data-bs-target="#simpanakunPersonil" id="simpanakunPersonilBtn" title="Buat Akun Terpilih"
                        disabled>Buat
                        Akun Personil</button>
                </div>
                <div class="flex-shrink-0 me-1">
                    <a href="{{ route('ps_exportExcel') }}" class="btn btn-soft-primary btn-sm"><i
                            class="ri-file-upload-line align-bottom me-1"></i> Unduh</a>
                </div>
                <div class="flex-shrink-0 me-1">
                    <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal"
                        data-bs-target="#importModal"><i class="ri-file-download-line align-bottom me-1"></i>
                        Unggah</button>
                </div>
                <div class="flex-shrink-0 me-1">
                    @can('create manajemensekolah/personil-sekolah')
                        <a class="btn btn-soft-primary btn-sm add-btn action"
                            href="{{ route('manajemensekolah.personil-sekolah.create') }}">Tambah</a>
                    @endcan
                </div> --}}
            </div>
        </div>
        <div class="card-body p-0">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'rombonganbelajar-table';

        // Fungsi untuk menangani event DataTable
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

            handleDataTableEvents(datatable);
            handleAction(datatable)
            handleDelete(datatable)
            handleFilterAndReload(datatable);
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
