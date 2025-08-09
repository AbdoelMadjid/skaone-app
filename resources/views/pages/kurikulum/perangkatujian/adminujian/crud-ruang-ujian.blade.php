@extends('layouts.master')
@section('title')
    @lang('translation.ruang-ujian')
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
            @lang('translation.perangkat-ujian')
        @endslot
        @slot('li_3')
            @lang('translation.administrasi-ujian')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0 me-2">
                    <x-btn-tambah can="create kurikulum/perangkatujian/administrasi-ujian/ruang-ujian"
                        route="kurikulum.perangkatujian.administrasi-ujian.ruang-ujian.create" icon="ri-add-line" />
                </div>
                <div class="flex-shrink-0">
                    <x-btn-group-dropdown>
                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.ruang-ujian.index') }}"
                            class="dropdown-item">Ruang Ujian</a>
                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.peserta-ujian.index') }}"
                            class="dropdown-item">Peserta
                            Ujian</a>
                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.jadwal-ujian.index') }}"
                            class="dropdown-item">Jadwal
                            Ujian</a>
                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.pengawas-ujian.index') }}"
                            class="dropdown-item">Pengawas
                            Ujian</a>
                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.index') }}"
                            class="dropdown-item">Kembali</a>
                    </x-btn-group-dropdown>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'ruangujian-table';

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
