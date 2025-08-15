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
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    <x-btn-tambah dinamisBtn="true" can="create appsupport/referensi" route="appsupport.referensi.create" />
                </div>
            </div>
        </div>
        <div class="card-body p-2">
            <div class="row g-3">
                <div class="col-lg">

                </div>
                <div class="col-lg-auto">
                    <div class="d-flex align-items-center gap-2"> <!-- Tambahan baris ini -->
                        <select id="filter-jenis" class="form-select form-select-sm" style="width: 200px;">
                            <option value="">Semua Jenis</option>
                            @foreach (\App\Models\AppSupport\Referensi::select('jenis')->orderBy('jenis', 'asc')->distinct()->pluck('jenis') as $jenis)
                                <option value="{{ $jenis }}">{{ $jenis }}</option>
                            @endforeach
                        </select>
                        <x-btn-action dinamisBtn="true" id="reset-filter" label="Reset" icon="ri-arrow-go-back-fill" />
                    </div> <!-- Penutup div flex -->
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
