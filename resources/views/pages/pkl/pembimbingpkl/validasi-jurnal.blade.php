@extends('layouts.master')
@section('title')
    @lang('translation.validasi-jurnal')
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
                        {{--  @can('create pesertadidikpkl/jurnal-siswa')
                            <a class="btn btn-primary action" href="{{ route('pesertadidikpkl.jurnal-siswa.create') }}">Buat
                                Jurnal Siswa</a>
                        @endcan --}}
                        <form>
                            <div class="row g-3">
                                <div class="col-lg-auto ms-auto">
                                    <div>
                                        <select class="form-control form-control-sm" id="idPenempatan">
                                            <option value="all" selected>Pilih Peserta Terbimbing</option>
                                            @foreach ($optionsArray as $id => $nama)
                                                <option value="{{ $id }}">{{ $nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-auto">
                                    <div>
                                        <select class="form-control form-control-sm" id="idvalidasi">
                                            <option value="all" selected>Status Validasi</option>
                                            <option value="Sudah">Sudah</option>
                                            <option value="Belum">Belum</option>
                                            <option value="Tolak">Tolak</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </form>
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
        const datatable = 'validasijurnal-table';

        $(document).ready(function() {
            const table = $("#validasijurnal-table").DataTable();

            // Event pencarian dan filter
            $("#idPenempatan, #idvalidasi").on("change keyup", function() {
                table.ajax.reload();
            });

            $(document).on('click', '.edit-tp-button', function() {
                var targetTextarea = $(this).data('target'); // Ambil ID dari atribut data-target
                $(targetTextarea).show(); // Tampilkan textarea

                // Ubah tombol menjadi submit
                $(this).hide(); // Sembunyikan tombol Edit
                $(this).closest('form').find('button[type="submit"]').show(); // Tampilkan tombol Submit
            });

            $(document).on('submit', '.update-tp-form', function(e) {
                e.preventDefault(); // Cegah reload halaman

                var form = $(this);
                var id = form.data('id'); // Ambil ID dari atribut data-id
                var url = `/pembimbingpkl/validasi-jurnal/tambahkomentar/${id}`; // URL sesuai route
                var data = form.serialize(); // Serialisasi data form

                $.ajax({
                    url: url,
                    type: 'POST', // Gunakan POST meskipun method disimulasikan sebagai PUT
                    data: data,
                    success: function(response) {
                        // Tampilkan notifikasi sukses (opsional)
                        showToast('success', 'Komentar sukses di tambahkan!');

                        $('#validasijurnal-table').DataTable().ajax.reload(null, false);

                        // Sembunyikan textarea dan kembalikan tombol Edit
                        form.find('.edit-tp-textarea').hide();
                        form.find('.submit-tp-button').hide();
                        form.find('.edit-tp-button').show();
                    },
                    error: function(xhr) {
                        // Tampilkan pesan error
                        showToast('error', 'Terjadi kesalahan: ' + xhr.responseText);
                    }
                });
            });

            $(document).on('change', '.validasi-checkbox', function() {
                const checkbox = $(this);
                const id = checkbox.data('id');
                const validasiValue = checkbox.is(':checked') ? 'Sudah' : 'Belum';

                // Kirim data ke server menggunakan fetch atau jQuery AJAX
                $.ajax({
                    url: `/pembimbingpkl/updateValidasi/${id}`,
                    type: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    contentType: 'application/json',
                    data: JSON.stringify({
                        validasi: validasiValue
                    }),
                    success: function(response) {
                        // Perbarui badge
                        const badge = checkbox.closest('td').find('span.badge');
                        badge.removeClass('bg-danger bg-primary')
                            .addClass(validasiValue === 'Sudah' ? 'bg-primary' : 'bg-danger')
                            .text(validasiValue);

                        $('#validasijurnal-table').DataTable().ajax.reload(null, false);

                        // Tampilkan pesan sukses
                        showToast('success', 'Validasi berhasil diperbarui.');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);

                        // Tampilkan pesan error
                        showToast('error', 'Terjadi kesalahan, coba lagi.');

                        // Kembalikan status checkbox jika gagal
                        checkbox.prop('checked', !checkbox.is(':checked'));
                    }
                });
            });

            $(document).on('change', '.validasi-tolak-checkbox', function() {
                const checkbox = $(this);
                const id = checkbox.data('id');
                const validasiValue = checkbox.is(':checked') ? 'Tolak' : 'Belum';

                // Kirim data ke server menggunakan fetch atau jQuery AJAX
                $.ajax({
                    url: `/pembimbingpkl/updateValidasiTolak/${id}`,
                    type: 'PUT',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    contentType: 'application/json',
                    data: JSON.stringify({
                        validasi: validasiValue
                    }),
                    success: function(response) {
                        // Perbarui badge
                        const badge = checkbox.closest('td').find('span.badge');
                        badge.removeClass('bg-danger bg-warning')
                            .addClass(validasiValue === 'Tolak' ? 'bg-warning' : 'bg-danger')
                            .text(validasiValue);

                        $('#validasijurnal-table').DataTable().ajax.reload(null, false);

                        // Tampilkan pesan sukses
                        showToast('success', 'Validasi berhasil diperbarui.');
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);

                        // Tampilkan pesan error
                        showToast('error', 'Terjadi kesalahan, coba lagi.');

                        // Kembalikan status checkbox jika gagal
                        checkbox.prop('checked', !checkbox.is(':checked'));
                    }
                });
            });

            $('#' + datatable).DataTable(); // Pastikan DataTable diinisialisasi

            handleDataTableEvents(datatable);
            handleAction(datatable);
            handleDelete(datatable);
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
