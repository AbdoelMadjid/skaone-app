@extends('layouts.master')
@section('title')
    @lang('translation.data-kbm') Detail
@endsection
@section('css')
    {{--  --}}
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
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title') - {{ $fullName }}</x-heading-title>
                <div class="flex-shrink-0">
                    <x-btn-kembali href="{{ route('gurumapel.adminguru.data-kbm.index') }}" />
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
