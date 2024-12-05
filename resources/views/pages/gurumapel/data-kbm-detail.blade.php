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
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @lang('translation.data-kbm') - {{ $fullName }}</h5>
                    <div>
                        <a class="btn btn-soft-info" href="{{ route('gurumapel.datangajar.data-kbm.index') }}">Kembali</a>
                    </div>
                </div>
                <div class="card-body">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script> --}}

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'datakbm-table';

        function updateKkm(id, kkmValue) {
            $.ajax({
                url: '/gurumapel/datangajar/data-kbm-detail/update-kkm', // Rute untuk update KKM
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
