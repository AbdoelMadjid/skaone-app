@extends('layouts.master')
@section('title')
    @lang('translation.personil-sekolah')
@endsection
@section('css')
    {{--  --}}
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.manajemen-sekolah')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    <x-btn-group-dropdown>
                        <x-btn-action label="Buat Akun Personil" icon="ri-admin-fill" data-bs-toggle="modal"
                            data-bs-target="#simpanakunPersonil" id="simpanakunPersonilBtn" title="Buat Akun Terpilih"
                            :disabled="true" />
                        <div class="dropdown-divider"></div>
                        <x-btn-tambah can="create manajemensekolah/personil-sekolah"
                            route="manajemensekolah.personil-sekolah.create" icon="ri-user-add-fill" />
                        <x-btn-action href="{{ route('ps_exportExcel') }}" label="Download" icon="ri-download-2-fill" />
                        <x-btn-action label="Upload" icon="ri-upload-2-fill" data-bs-toggle="modal"
                            data-bs-target="#importModal" />
                    </x-btn-group-dropdown>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="row g-3">
                <div class="col-lg">
                </div>
                <div class="col-lg-auto">
                    <div class="search-box">
                        <input type="text" class="form-control form-control-sm search" placeholder="Nama Lengkap....">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <select class="form-select form-select-sm" id="idJenis">
                        <option value="all" selected>Pilih Jenis Personil</option>
                        @foreach ($jenisPersonilOptions as $jenis)
                            <option value="{{ $jenis }}">{{ $jenis }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-auto me-3">
                    <select class="form-select form-select-sm" id="idStatus">
                        <option value="all" selected>Pilih Status</option>
                        @foreach ($statusOptions as $status)
                            <option value="{{ $status }}">{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    @include('pages.manajemensekolah.personil.personil-sekolah-import')
    @include('pages.manajemensekolah.personil.personil-sekolah-buat-akun')
@endsection
@section('script')
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
