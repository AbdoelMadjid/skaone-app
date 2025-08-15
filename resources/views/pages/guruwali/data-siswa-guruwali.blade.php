@extends('layouts.master')
@section('title')
    @lang('translation.data-siswa-guruwali')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/multi.js/multi.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.guru-wali')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        @if (auth()->check() &&
                auth()->user()->hasAnyRole(['guruwali']))
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <x-heading-title>@yield('title')</x-heading-title>
                </div>
            </div>
            <div class="card-body p-1">
                ini halaman guru wali
            </div>
        @else
            <div class="card-header">
                <div class="d-flex align-items-center">
                    <x-heading-title>@yield('title')</x-heading-title>
                    <div class="flex-shrink-0">
                        <x-btn-tambah dinamisBtn="true" can="create guruwali/data-siswa-guruwali"
                            route="guruwali.data-siswa-guruwali.create" />
                    </div>
                </div>
            </div>
            <div class="card-body p-1">
                {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
            </div>
    </div>
    @endif
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/multi.js/multi.min.js') }}"></script>
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'datasiswaguruwali-table';

        $('#datasiswaguruwali-table').on('draw.dt', function() {
            var api = $('#datasiswaguruwali-table').DataTable();
            var lastGuru = null;
            var no = 1;

            api.rows({
                page: 'current'
            }).every(function() {
                var $row = $(this.node());
                var cellNo = $row.find('td').eq(0); // No
                var cellTahun = $row.find('td').eq(1); // Tahunajaran
                var cellGuru = $row.find('td').eq(2); // Nama Guru

                if (lastGuru === cellGuru.text()) {
                    cellNo.text('');
                    cellTahun.text('');
                    cellGuru.text('');
                } else {
                    cellNo.text(no++);
                    lastGuru = cellGuru.text();
                }
            });
        });


        handleDataTableEvents(datatable);
        handleAction(datatable, function(res) {
            select2Init();
        })
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
