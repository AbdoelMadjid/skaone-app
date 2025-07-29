@extends('layouts.master')
@section('title')
    @lang('translation.jadwal-mingguan')
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
            @lang('translation.data-kbm')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-0">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalmingguan') }}" label="Tampil & Tambah Jadwal"
                        icon="ri-calendar-fill" />
                    {{-- <x-btn-tambah can="create kurikulum/datakbm/jadwal-mingguan"
                        route="kurikulum.datakbm.jadwal-mingguan.create" label="Tambah" icon="ri-add-line" /> --}}
                    <button id="deleteSelected" class="btn btn-soft-danger btn-sm" style="display: none;"><i
                            class="ri-delete-bin-2-fill"></i></button>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped', 'style' => 'width:100%']) !!}
        </div>
    </div>
@endsection
@section('script')
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'jadwalmingguan-table';

        $(document).ready(function() {
            var table = $('#jadwalmingguan-table').DataTable();
            // Select/Deselect all checkboxes
            $('#checkAll').on('click', function() {
                $('.chk-child').prop('checked', this.checked);
                toggleDeleteButton();
            });

            // Check/uncheck individual checkboxes and toggle delete button
            $(document).on('click', '.chk-child', function() {
                if ($('.chk-child:checked').length === $('.chk-child').length) {
                    $('#checkAll').prop('checked', true);
                } else {
                    $('#checkAll').prop('checked', false);
                }
                toggleDeleteButton();
            });

            // Toggle delete button based on selection
            function toggleDeleteButton() {
                if ($('.chk-child:checked').length > 0) {
                    $('#deleteSelected').show();
                } else {
                    $('#deleteSelected').hide();
                }
            }

            // Handle delete button click
            $('#deleteSelected').on('click', function() {
                var selectedIds = [];
                $('.chk-child:checked').each(function() {
                    selectedIds.push($(this).val());
                });

                if (selectedIds.length > 0) {
                    Swal.fire({
                        title: 'Apa Anda yakin?',
                        text: "Anda tidak akan dapat mengembalikan ini!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "{{ route('kurikulum.datakbm.hapusjamterpilih') }}", // Sesuaikan route
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    ids: selectedIds
                                },
                                success: function(response) {
                                    console.log('AJAX Success:', response);
                                    showToast('success',
                                        'Jam jadwal berhasil dihapus!');
                                    table.ajax.reload(null, false); // Reload DataTables

                                    // Reset semua checkbox dan hide tombol delete
                                    $('.chk-child').prop('checked', false);
                                    $('#checkAll').prop('checked', false);
                                    toggleDeleteButton
                                        (); // Update tampilan tombol delete
                                },
                                error: function(xhr) {
                                    console.error('AJAX Error:', xhr.responseText);
                                    showToast('error',
                                        'Terjadi kesalahan saat menghapus data!');
                                }
                            });
                        }
                    });
                }
            });
        });
        //handleDataTableEvents(datatable);
        handleAction(datatable)
        handleDelete(datatable)
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
