@extends('layouts.master')
@section('title')
    @lang('translation.referensi')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.app-support')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title')</h5>
            <div>
                <div class="row g-3">
                    <div class="col-lg">

                    </div>
                    <div class="col-lg-auto">
                        <select id="filter-jenis" class="form-select form-select-sm" style="width: 200px;">
                            <option value="">Semua Jenis</option>
                            @foreach (\App\Models\AppSupport\Referensi::select('jenis')->distinct()->pluck('jenis') as $jenis)
                                <option value="{{ $jenis }}">{{ $jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-auto">
                        <button id="reset-filter" class="btn btn-soft-secondary btn-sm">Reset</button>
                    </div>
                    <div class="col-lg-auto">
                        @can('create appsupport/referensi')
                            <a class="btn btn-soft-primary btn-sm action" href="{{ route('appsupport.referensi.create') }}">
                                Tambah Referensi
                            </a>
                        @endcan
                    </div>
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
        const datatable = 'referensi-table';

        $(document).ready(function() {
            const table = window.LaravelDataTables["referensi-table"];

            $('#filter-jenis').on('change', function() {
                let jenis = $(this).val();
                table.ajax.url("{{ route('appsupport.referensi.index') }}?jenis=" + jenis).load();
            });

            $('#reset-filter').on('click', function() {
                $('#filter-jenis').val('');
                table.ajax.url("{{ route('appsupport.referensi.index') }}").load();
            });
        });
        handleDataTableEvents(datatable);

        function toggleJenisInput() {
            var select = document.getElementById('jenis_select');
            var input = document.getElementById('jenis_input');
            if (select.value === 'new') {
                input.style.display = 'block';
            } else {
                input.style.display = 'none';
            }
        }

        handleAction(datatable, function() {
            toggleJenisInput();
        });

        handleDelete(datatable);
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
