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
            @lang('translation.pesertapkl')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title')</h5>
                    <div>
                    </div>
                </div>
                <div class="card-body p-1">
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
