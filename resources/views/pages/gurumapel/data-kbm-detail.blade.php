@extends('layouts.master')
@section('title')
    @lang('translation.data-kbm') Detail
@endsection
@section('css')
    {{--     <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}"
        rel="stylesheet" /> --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.gurumapel')
        @endslot
        @slot('li_2')
            @lang('translation.data-ngajar')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title') - {{ $fullName }}</h5>
                    <div>
                        <a class="btn btn-soft-info btn-sm"
                            href="{{ route('gurumapel.adminguru.data-kbm.index') }}">Kembali</a>
                    </div>
                </div>
                <div class="card-body p-1">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    {{-- DataTables JS --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    {{-- DataTables Buttons --}}
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

    {{-- <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script> --}}

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'datakbm-table';

        function updateKkm(id, kkmValue) {
            $.ajax({
                url: '/gurumapel/adminguru/data-kbm-detail/update-kkm', // Rute untuk update KKM
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // Sertakan CSRF token
                    id: id,
                    kkm: kkmValue
                },
                success: function(response) {
                    if (response.success) {
                        showToast('success', 'KKM berhasil diperbarui!');
                    } else {
                        showToast('warning', 'Gagal memperbarui KKM!');
                    }
                },
                error: function(xhr) {
                    /* alert('Terjadi kesalahan'); */
                    showToast('error', 'Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        }

        // Inisialisasi DataTable
        $(document).ready(function() {
            handleDataTableEvents(datatable);
            handleAction(datatable);
            handleDelete(datatable);
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
