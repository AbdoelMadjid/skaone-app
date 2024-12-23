@extends('layouts.master')
@section('title')
    @lang('translation.pembimbing-prakerin')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/multi.js/multi.min.css') }}" rel="stylesheet">
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.administrator')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @yield('title')</h5>
                    <div>
                        {{--  @can('create administratorpkl/pembimbing-prakerin')
                            <a class="btn btn-primary action"
                                href="{{ route('administratorpkl.pembimbing-prakerin.create') }}">Add</a>
                        @endcan --}}

                        <a class="btn btn-primary action"
                            href="{{ route('administratorpkl.pembimbing-prakerin.create') }}">Tambah Guru PKL</a>
                    </div>
                </div>
                <div class="card-body">
                    {{-- <h1>Daftar Pembimbing dan Siswa</h1>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pembimbing</th>
                                <th>Daftar Siswa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($groupedData as $id_personil => $rows)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $rows->first()->guru }}</td>
                                    <td>
                                        <ul>
                                            @foreach ($rows as $row)
                                                <li>{{ $row->siswa }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> --}}
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
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/multi.js/multi.min.js') }}"></script>
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'pembimbingprakerin-table';

        handleDataTableEvents(datatable);
        handleAction(datatable, function(res) {
            select2Init();
        })
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
