@extends('layouts.master')
@section('title')
    @lang('translation.personil-sekolah')
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.manajemen-sekolah')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title mb-0 flex-grow-1 text-danger-emphasis">@yield('title')</h5>
            <div>
                <button type="button" class="btn btn-soft-danger btn-sm" data-bs-toggle="modal"
                    data-bs-target="#simpanakunPersonil" id="simpanakunPersonilBtn" title="Buat Akun Terpilih" disabled>Buat
                    Akun Personil</button>
                <a href="{{ route('ps_exportExcel') }}" class="btn btn-soft-primary btn-sm"><i
                        class="ri-file-upload-line align-bottom me-1"></i> Unduh</a>
                <button type="button" class="btn btn-soft-primary btn-sm" data-bs-toggle="modal"
                    data-bs-target="#importModal"><i class="ri-file-download-line align-bottom me-1"></i>
                    Unggah</button>
                @can('create manajemensekolah/personil-sekolah')
                    <a class="btn btn-soft-primary btn-sm add-btn action"
                        href="{{ route('manajemensekolah.personil-sekolah.create') }}">Tambah</a>
                @endcan
            </div>
        </div>
        <div class="card-body p-1">
            <form>
                <div class="row g-3">
                    <div class="col-lg">
                        <div class="search-box">
                            <input type="text" class="form-control form-control-sm search"
                                placeholder="Search Nama Lengkap Personil ....">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-control form-control-sm" id="idJenis">
                                <option value="all" selected>Pilih Jenis Personil</option>
                                @foreach ($jenisPersonilOptions as $jenis)
                                    <option value="{{ $jenis }}">{{ $jenis }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-control form-control-sm" id="idStatus">
                                <option value="all" selected>Pilih Status</option>
                                @foreach ($statusOptions as $status)
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->
            </form>
        </div>

        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    @include('pages.manajemensekolah.personil-sekolah-import')
    @include('pages.manajemensekolah.personil-sekolah-buat-akun')
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
        const datatable = 'personilsekolah-table';

        function handleCheckbokPersonil(tableId) {
            var table = $('#' + tableId).DataTable();

            // Handle "Select All" checkbox click
            $('#checkAll').on('click', function() {
                var isChecked = this.checked;

                // Iterate through each checkbox in the current DataTable page
                table.rows({
                    page: 'current'
                }).every(function() {
                    var row = this.node();
                    var checkbox = $(row).find('.chk-child');
                    checkbox.prop('checked', isChecked); // Set checkbox checked state

                    // Add or remove 'table-active' class based on checkbox state
                    if (isChecked) {
                        $(row).addClass('table-active');
                    } else {
                        $(row).removeClass('table-active');
                    }
                });

                toggleRemoveActions(); // Call toggleRemoveActions() to handle button state
            });


            // Handle individual row checkbox click
            $('#' + datatable + ' tbody').on('click', '.chk-child', function() {
                var $row = $(this).closest('tr');
                var isChecked = this.checked;

                // Add or remove 'table-active' class based on checkbox state
                if (isChecked) {
                    $row.addClass('table-active');
                } else {
                    $row.removeClass('table-active');
                }

                // Update the "Select All" checkbox state based on individual checkboxes
                if ($('.chk-child:checked').length !== table.rows({
                        page: 'current'
                    }).count()) {
                    $('#checkAll').prop('checked', false);
                }

                if ($('.chk-child:checked').length === table.rows({
                        page: 'current'
                    }).count()) {
                    $('#checkAll').prop('checked', true);
                }

                toggleRemoveActions(); // Call toggleRemoveActions() to handle button state
            });
        }

        // Function to toggle "remove actions" button visibility based on checkbox selection
        function toggleRemoveActions() {
            var checkedCount = $('.chk-child:checked').length; // Count checked checkboxes

            // Toggle "remove actions" button
            if (checkedCount > 0) {
                $('#remove-actions').show(); // Show "remove actions" if any checkbox is checked
                $('#simpanakunPersonilBtn').prop('disabled', false); // Enable "Buatkan Akun" button
            } else {
                $('#remove-actions').hide(); // Hide "remove actions" if no checkboxes are checked
                $('#simpanakunPersonilBtn').prop('disabled', true); // Disable "Buatkan Akun" button
            }
        }

        /* function handleFilterAndReload(tableId) {
            var table = $('#' + tableId).DataTable();

            // Trigger saat mengetik di input pencarian
            $('.search').on('keyup change', function() {
                var searchValue = $(this).val(); // Ambil nilai dari input pencarian
                table.search(searchValue).draw(); // Lakukan pencarian dan gambar ulang tabel
            });

            // Tambahkan event listener untuk dropdown agar bisa langsung merefresh tabel
            $('#idJenis, #idStatus').on('change', function() {
                table.ajax.reload(null, false); // Reload tabel saat dropdown berubah
            });

            // Override data yang dikirim ke server
            table.on('preXhr.dt', function(e, settings, data) {
                data.jenisPersonil = $('#idJenis').val(); // Ambil nilai dari dropdown idKK
                data.statusPersonil = $('#idStatus').val(); // Ambil nilai dari dropdown idJenkel
            });
        } */

        // Inisialisasi DataTable
        $(document).ready(function() {
            const table = $("#personilsekolah-table").DataTable();

            // Event pencarian dan filter
            $(".search, #idJenis, #idStatus").on("change keyup", function() {
                table.ajax.reload();
            });


            $('#simpanakunPersonilBtn').on('click', function() {
                let selectedIds = [];
                let selectedRows = ''; // Variable untuk menyimpan baris tabel

                // Loop untuk mengumpulkan id siswa, nama, NIS, kode_kk, dan nama_kk mereka yang dicentang
                $('.chk-child:checked').each(function() {
                    let idpersonil = $(this).data('idpersonil');
                    let namalengkap = $(this).data('namalengkap');
                    let jenispersonil = $(this).data('jenispersonil');
                    let email = $(this).data('email');
                    let aktif = $(this).data('aktif');

                    selectedIds.push($(this).val());

                    // Buat baris baru untuk setiap siswa
                    selectedRows += `<tr>
                    <td>${idpersonil}</td>
                    <td>${namalengkap}</td>
                    <td>${jenispersonil}</td>
                    <td>${email}</td>
                    <td>${aktif}</td>
                    </tr>`;
                });

                // Set nilai hidden input di modal form dengan id siswa yang dipilih
                $('#selected_personil_ids').val(selectedIds.join(','));

                // Tampilkan baris-baris siswa yang dipilih dalam tabel
                $('#selected_personil_tbody').html(selectedRows);

                // Tampilkan modal distribusi siswa
                $('#simpanakunPersonil').modal('show');
            });


            $('#' + datatable).DataTable(); // Pastikan DataTable diinisialisasi

            handleCheckbokPersonil(datatable); // Handle checkbox selections
            handleDataTableEvents(datatable);
            handleAction(datatable);
            handleDelete(datatable);
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
