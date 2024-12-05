@extends('layouts.master')
@section('title')
    @lang('translation.monitoring-siswa')
@endsection
@section('css')
    {{-- --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.pesertadidikpkl')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="align-middle">No</th>
                                <th class="align-middle">Tanggal Monitoring</th>
                                <th class="align-middle">Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($monitoringPrakerin->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">Data tidak ditemukan.</td>
                                </tr>
                            @else
                                @foreach ($monitoringPrakerin as $index => $monitoring)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ date('d-m-Y', strtotime($monitoring->tgl_monitoring)) }}</td>
                                        <td>{{ $monitoring->catatan_monitoring }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    {{-- --}}
@endsection
@section('script-bottom')
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
