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
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-0">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title')</h5>
            <div>
                @can('create appsupport/app-fiturs')
                    <a class="btn btn-soft-info btn-sm action" href="{{ route('appsupport.app-fiturs.create') }}"><i
                            class="ri-add-line align-bottom me-1"></i> Tambah</a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <div id="datatable-wrapper" style="height: calc(100vh - 294px);">
                {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
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
        ScrollDinamicDataTable(datatable, scrollOffsetOverride = 108); // Initialize dynamic scrolling for DataTable
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
