@extends('layouts.master')
@section('title')
    @lang('translation.app-fitur')
@endsection
@section('css')
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
                @can('create appsupport/app-fiturs')
                    <a class="btn btn-soft-info btn-sm action" href="{{ route('appsupport.app-fiturs.create') }}"><i
                            class="ri-add-line align-bottom me-1"></i> Tambah</a>
                @endcan
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
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
