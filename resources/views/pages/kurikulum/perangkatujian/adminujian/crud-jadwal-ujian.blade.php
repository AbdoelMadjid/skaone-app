@extends('layouts.master')
@section('title')
    @lang('translation.ruang-ujian')
@endsection
@section('css')
    {{-- --}}
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Jadwal Ujian</h5>
                    <div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-soft-primary dropdown-toggle" data-bs-toggle="dropdown">
                                Tambah Jadwal
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    @can('create kurikulum/perangkatujian/administrasi-ujian/jadwal-ujian')
                                        <a class="dropdown-item action"
                                            href="{{ route('kurikulum.perangkatujian.administrasi-ujian.jadwal-ujian.create') }}">Tambah
                                            Satuan</a>
                                    @endcan
                                </li>
                                {{-- <li><a href="#" class="dropdown-item" id="btnTambahSatuan">Tambah Satuan</a></li> --}}
                                <li><a href="#" class="dropdown-item" id="btnTambahMassal">Input Massal</a></li>
                            </ul>
                        </div>
                        <a class="btn btn-soft-danger"
                            href="{{ route('kurikulum.perangkatujian.administrasi-ujian.index') }}">Kembali</a>
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
        const datatable = 'jadwalujian-table';

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
