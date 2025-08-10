@extends('layouts.master')
@section('title')
    @lang('translation.jadwal-per-guru')
@endsection
@section('css')
    <style>
        .no-click {
            pointer-events: none;
            cursor: not-allowed;
        }
    </style>
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
                <div class="flex-shrink-0 me-3">
                    <x-btn-group-dropdown size="sm">
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperrombel') }}" label="Rombel"
                            icon="ri-calendar-fill" />
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperhari') }}" label="Harian"
                            icon="ri-calendar-event-fill" />
                    </x-btn-group-dropdown>
                </div>
                <div class="flex-shrink-0">
                    <x-btn-kembali href="{{ route('kurikulum.datakbm.jadwal-mingguan.index') }}" />
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <form method="GET" id="formRombel">
                <div class="row g-3">
                    <div class="col-lg">
                    </div>

                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" name="tahunajaran" id="idThnAjaran">
                                <option value="" disabled {{ request('tahunajaran') ? '' : 'selected' }}>Pilih Tahun
                                    Ajaran</option>
                                @foreach ($tahunAjaranOptions as $thnajar)
                                    <option value="{{ $thnajar }}"
                                        {{ request('tahunajaran', $tahunAjaranAktif) == $thnajar ? 'selected' : '' }}>
                                        {{ $thnajar }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" name="semester" id="idSemester">
                                <option value="" disabled {{ request('semester') ? '' : 'selected' }}>Pilih Semester
                                </option>
                                <option value="Ganjil"
                                    {{ request('semester', $semesterAktif) == 'Ganjil' ? 'selected' : '' }}>Ganjil</option>
                                <option value="Genap"
                                    {{ request('semester', $semesterAktif) == 'Genap' ? 'selected' : '' }}>Genap</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" name="id_personil" id="idPersonil">
                                <option value="" selected>Pilih Guru Mapel</option>
                                @foreach ($guruMapelOptions as $id => $namalengkap)
                                    <option value="{{ $id }}"
                                        {{ request('id_personil') == $id ? 'selected' : '' }}>
                                        {{ $namalengkap }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto me-2">
                        <button type="button" id="btn-tampil-jadwal"
                            class="btn btn-soft-primary btn-sm w-100 mb-4">Tampilkan</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body p-1">
            @include('pages.kurikulum.datakbm.jadwal-mingguan-tabel-guru')
        </div>
    </div>
@endsection
@section('script')
    {{--  --}}
@endsection
@section('script-bottom')
    <script>
        // Inisialisasi DataTable
        $(document).ready(function() {
            $('#btn-tampil-jadwal').on('click', function() {
                // Cek apakah semua select sudah dipilih
                if ($('#idThnAjaran').val() &&
                    $('#idSemester').val() &&
                    $('#idPersonil').val() &&
                    $('#idPersonil').val() !== 'all' &&
                    $('#idPersonil').val() !== 'none') {

                    // Submit form
                    $('#formRombel').submit();
                } else {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Lengkapi Filter',
                        text: 'Silakan lengkapi semua pilihan filter terlebih dahulu!',
                    });
                }
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
