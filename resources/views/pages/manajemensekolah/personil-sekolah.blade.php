@extends('layouts.master')
@section('title')
    @lang('translation.personil-sekolah')
@endsection
@section('css')
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.manajemen-sekolah')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-bottom-dashed">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0">@lang('translation.tables') @lang('translation.personil-sekolah')</h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex flex-wrap align-items-start gap-2">
                                <button type="button" class="btn btn-soft-danger" data-bs-toggle="modal"
                                    data-bs-target="#simpanakunPersonil" id="simpanakunPersonilBtn"
                                    title="Buat Akun Terpilih" disabled>Buat Akun Personil</button>
                                <a href="{{ route('ps_exportExcel') }}" class="btn btn-soft-primary"><i
                                        class="ri-file-upload-line align-bottom me-1"></i> Unduh</a>
                                <button type="button" class="btn btn-soft-primary" data-bs-toggle="modal"
                                    data-bs-target="#importModal"><i class="ri-file-download-line align-bottom me-1"></i>
                                    Unggah</button>
                                @can('create manajemensekolah/personil-sekolah')
                                    <a class="btn btn-soft-primary add-btn action"
                                        href="{{ route('manajemensekolah.personil-sekolah.create') }}">Tambah</a>
                                @endcan
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border-bottom-dashed border-bottom">
                    <form>
                        <div class="row g-3">
                            <div class="col-lg">
                                <div class="search-box">
                                    <input type="text" class="form-control search"
                                        placeholder="Search Nama Lengkap Personil ....">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <div class="col-lg-auto">
                                <div>
                                    <select class="form-control" id="idJenis">
                                        <option value="all" selected>Pilih Jenis Personil</option>
                                        @foreach ($jenisPersonilOptions as $jenis)
                                            <option value="{{ $jenis }}">{{ $jenis }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-auto">
                                <div>
                                    <select class="form-control" id="idStatus">
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

                <div class="card-body">
                    {!! $dataTable->table([
                        'class' => 'table table-striped hover',
                        'style' => 'width:100%',
                    ]) !!}
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    @include('pages.manajemensekolah.personil-sekolah-import')
    @include('pages.manajemensekolah.personil-sekolah-buat-akun')
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
