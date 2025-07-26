@extends('layouts.master')
@section('title')
    @lang('translation.perangkat-ajar')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.dokumen-guru')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    <!-- Modal Preview PDF -->
    <div class="modal fade" id="pdfModal" tabindex="-1" aria-labelledby="pdfModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="max-width:90%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Preview Dokumen</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body" style="height: 80vh;">
                    <iframe id="pdfFrame" src="" width="100%" height="100%" style="border: none;"></iframe>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Upload -->
    @include('pages.gurumapel.perangkat-ajar-form')
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        function lihatPDF(url) {
            const frame = document.getElementById('pdfFrame');
            frame.src = url;

            const modal = new bootstrap.Modal(document.getElementById('pdfModal'));
            modal.show();
        }
    </script>
    <script>
        // Saat tombol Upload diklik
        $('#uploadModal').on('show.bs.modal', function(event) {
            const button = event.relatedTarget;
            const tingkat = button.getAttribute('data-tingkat');
            const mapel = button.getAttribute('data-mapel');

            // Set nilai input di modal
            document.getElementById('tingkatInput').value = tingkat;
            document.getElementById('mapelInput').value = mapel;

            // Set action form secara dinamis
            const actionUrl = "{{ route('gurumapel.adminguru.perangkat-ajar.upload') }}";
            document.getElementById('uploadForm').action = actionUrl;
        });

        $(document).on('click', '.delete-perangkat', function() {
            const id_personil = $(this).data('id_personil');
            const tingkat = $(this).data('tingkat');
            const mapel = $(this).data('mapel');
            const tahunajaran = $(this).data('tahunajaran');
            const semester = $(this).data('semester');

            Swal.fire({
                title: 'Hapus Arsip?',
                text: 'Seluruh dokumen perangkat ajar ini akan dihapus.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('kurikulum.dokumenguru.deleteArsipPerangkatAjar') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id_personil: id_personil,
                            tingkat: tingkat,
                            mata_pelajaran: mapel,
                            tahunajaran: tahunajaran,
                            semester: semester
                        },
                        success: function(response) {
                            showToast('success', response.message);
                            $('#arsipperangkatajar-table').DataTable().ajax
                                .reload(); // Ganti sesuai ID tabel
                        },
                        error: function() {
                            showToast('error', 'Data tidak ditemukan atau gagal dihapus.');
                        }
                    });
                }
            });
        });
    </script>
    <script>
        const datatable = 'arsipperangkatajar-table';

        handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
