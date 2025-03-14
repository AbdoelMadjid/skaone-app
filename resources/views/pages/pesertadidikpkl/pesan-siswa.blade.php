@extends('layouts.master')
@section('title')
    @lang('translation.pesan-siswa')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.pesertadidikpkl')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @yield('title')</h5>
                    <div>
                        @can('create pesertadidikpkl/pesan-prakerin')
                            <a class="btn btn-soft-primary action"
                                href="{{ route('pesertadidikpkl.pesan-prakerin.create') }}">Kirim
                                Pesan</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
        </div>
        <!--end col-->
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
        const datatable = 'pesanpesertaprakerin-table';

        $(document).on('click', '.baca-pesan', function(e) {
            e.preventDefault();

            const messageId = $(this).data('id');
            const messageContent = $(this).data('message');

            // Tampilkan pesan dalam modal atau elemen lain
            //alert('Isi Pesan: ' + messageContent);

            Swal.fire({
                html: '<div class="mt-3">' +
                    '<div class="mt-4 pt-2 fs-15">' +
                    '<h4>Isi Pesan :</h4>' +
                    '<p class="text-muted mx-4 mb-0">' + messageContent + '</p>' +
                    '</div>' +
                    '</div>',
                showCancelButton: true,
                showConfirmButton: false,
                cancelButtonClass: 'btn btn-primary w-xs mb-1',
                cancelButtonText: 'Back',
                buttonsStyling: true,
                showCloseButton: true
            });

            // Kirim permintaan AJAX untuk memperbarui status
            $.ajax({
                url: '/pesertadidikpkl/update-read-status', // Endpoint untuk memperbarui status
                type: 'POST',
                data: {
                    id: messageId,
                    _token: '{{ csrf_token() }}' // Pastikan CSRF token dikirim
                },
                success: function(response) {
                    showToast('success', response.message);
                    // Perbarui tampilan status pesan menjadi "Sudah dibaca"
                    $('#pesanpesertaprakerin-table').DataTable().ajax.reload(null,
                        false); // Tidak reset paging
                },
                error: function() {
                    showToast('error', 'Terjadi kesalahan saat memperbarui status pesan.');
                }
            });
        });

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
