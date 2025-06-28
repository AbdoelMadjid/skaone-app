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
    @if (auth()->check() &&
            auth()->user()->hasAnyRole(['master']))
        <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-0">
            <div class="card-header d-flex align-items-center">
                <h5 class="card-title mb-0 flex-grow-1">@lang('translation.daftar') @yield('title')</h5>
                <div>
                    @can('create appsupport/app-fiturs')
                        <a class="btn btn-soft-info btn-sm action" href="{{ route('appsupport.app-fiturs.create') }}"><i
                                class="ri-add-line align-bottom me-1"></i> Tambah</a>
                    @endcan
                </div>
            </div>
            <div class="card-body">
                <div class="px-4 mx-n4 mt-n3 mb-0" data-simplebar style="height: calc(100vh - 275px);">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="alert alert-warning alert-dismissible alert-additional fade show mb-2" role="alert">
                            <div class="alert-body">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <div class="d-flex">
                                    <div class="flex-shrink-0 me-3">
                                        <i class="ri-alert-line display-6 align-middle"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h5 class="alert-heading">Mohon Maaf !!. <br>Halaman @yield('title')</h5>
                                        <p class="mb-0">TIDAK BISA ANDA AKSES. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="alert-content">
                                <p class="mb-0">Scripting & Design by. Abdul Madjid, S.Pd., M.Pd.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    @endif
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
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
