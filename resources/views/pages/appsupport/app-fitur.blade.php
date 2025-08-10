@extends('layouts.master')
@section('title')
    @lang('translation.app-fitur')
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
                    <x-btn-tambah dinamisBtn="true" can="create appsupport/app-fiturs" route="appsupport.app-fiturs.create" />
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
        const datatable = 'appfitur-table';

        function saveAktif(checkbox, id) {
            const aktifValue = checkbox.checked ? 'Aktif' : 'Non Aktif';

            fetch(`/appsupport/app-fiturs/${id}/simpan-status`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        aktif: aktifValue,
                    }),
                })
                .then(response => {
                    if (response.ok) {
                        // Perbarui label status di UI
                        const label = document.getElementById(`aktifLabel-${id}`);
                        label.textContent = aktifValue;
                        showToast('success', 'Status berhasil diperbarui.');
                        // Tambahkan ini untuk reload halaman
                        setTimeout(() => {
                            location.reload();
                        }, 1500); // kasih delay dikit biar toast sempat tampil
                    } else {
                        throw new Error('Gagal memperbarui status.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    // Tampilkan pesan error
                    showToast('error', 'Terjadi kesalahan, coba lagi.');
                    // Kembalikan status checkbox jika gagal
                    checkbox.checked = !checkbox.checked;
                });
        }

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
