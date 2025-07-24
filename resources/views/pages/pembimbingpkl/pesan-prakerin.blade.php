@extends('layouts.master')
@section('title')
    @lang('translation.pesan-prakerin')
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
            @lang('translation.pembimbingpkl')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title')</h5>
                    <div>
                        @can('create pembimbingpkl/pesan-prakerin')
                            <a class="btn btn-soft-primary btn-sm action"
                                href="{{ route('pembimbingpkl.pesan-prakerin.create') }}">Kirim
                                Pesan</a>
                        @endcan
                    </div>
                </div>
                <div class="card-body p-1">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'pesanprakerin-table';


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
                url: '/pembimbingpkl/update-read-status', // Endpoint untuk memperbarui status
                type: 'POST',
                data: {
                    id: messageId,
                    _token: '{{ csrf_token() }}' // Pastikan CSRF token dikirim
                },
                success: function(response) {
                    showToast('success', response.message);
                    // Perbarui tampilan status pesan menjadi "Sudah dibaca"
                    $('#pesanprakerin-table').DataTable().ajax.reload(null,
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
