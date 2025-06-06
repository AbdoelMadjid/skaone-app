@extends('layouts.master')
@section('title')
    @lang('translation.peserta-didik')
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
                                <h5 class="card-title mb-0">@lang('translation.tables') @lang('translation.peserta-didik')</h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex flex-wrap align-items-start gap-2">
                                <a class="btn btn-soft-primary add-btn"
                                    href="{{ route('kurikulum.datakbm.peserta-didik-rombel.index') }}"><i
                                        class="ri-user-line align-bottom me-1"></i> Per Rombel</a>
                                <button type="button" class="btn btn-soft-danger" data-bs-toggle="modal"
                                    data-bs-target="#distribusiSiswa" id="distribusiSiswaBtn"
                                    title="Distribusikan siswa yang dipilih" disabled>Distribusi Rombel</button>
                                @can('create manajemensekolah/peserta-didik')
                                    <a class="btn btn-soft-primary add-btn action"
                                        href="{{ route('manajemensekolah.peserta-didik.create') }}">Tambah</a>
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
                                        placeholder="Search Nama Peserta Didik ....">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-auto">
                                <div>
                                    <select class="form-control" data-plugin="choices" data-choices
                                        data-choices-search-false name="choices-single-default" id="idKK">
                                        <option value="all" selected>Pilih Kompetensi Keahlian</option>
                                        @foreach ($kompetensiKeahlian as $id => $kk)
                                            <option value="{{ $id }}">{{ $kk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-auto">
                                <div>
                                    <select class="form-control" data-plugin="choices" data-choices
                                        data-choices-search-false name="choices-single-default" id="idJenkel">
                                        <option value="all" selected>Pilih Jenis Kelamin</option>
                                        @foreach ($jenkelOptions as $jenkel)
                                            <option value="{{ $jenkel }}">{{ $jenkel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-auto">
                                <div>
                                    <a href="{{ route('pdexportExcel') }}" class="btn btn-soft-primary w-100">Unduh</a>
                                    {{-- <button type="button" class="btn btn-primary w-100"
                                                title="Import">Unduh</button> --}}
                                    {{-- <button type="button" class="btn btn-primary w-100" id="filterButton"> <i
                                                    class="ri-equalizer-fill me-2 align-bottom"></i>Filters</button> --}}
                                </div>
                            </div>
                            <div class="col-lg-auto">
                                <div>
                                    <button type="button" class="btn btn-soft-primary  w-100" data-bs-toggle="modal"
                                        data-bs-target="#importModal">Unggah</button>
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->
                    </form>
                </div>
                <div class="card-body">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    @include('pages.manajemensekolah.peserta-didik-import')
    @include('pages.manajemensekolah.peserta-didik-distribusi')
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
        const datatable = 'pesertadidik-table';

        function handleCheckbokSiswa(tableId) {
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
                $('#distribusiSiswaBtn').prop('disabled', false); // Enable "Buatkan Akun" button
            } else {
                $('#remove-actions').hide(); // Hide "remove actions" if no checkboxes are checked
                $('#distribusiSiswaBtn').prop('disabled', true); // Disable "Buatkan Akun" button
            }
        }

        function handleFilterAndReload(tableId) {
            var table = $('#' + tableId).DataTable();

            // Trigger saat mengetik di input pencarian
            $('.search').on('keyup change', function() {
                var searchValue = $(this).val(); // Ambil nilai dari input pencarian
                table.search(searchValue).draw(); // Lakukan pencarian dan gambar ulang tabel
            });

            // Tambahkan event listener untuk dropdown agar bisa langsung merefresh tabel
            $('#idKK, #idJenkel').on('change', function() {
                table.ajax.reload(null, false); // Reload tabel saat dropdown berubah
            });

            // Override data yang dikirim ke server
            table.on('preXhr.dt', function(e, settings, data) {
                data.jenisPersonil = $('#idKK').val(); // Ambil nilai dari dropdown idKK
                data.statusPersonil = $('#idJenkel').val(); // Ambil nilai dari dropdown idJenkel
            });
        }

        // Inisialisasi DataTable
        $(document).ready(function() {
            /* const table = $("#pesertadidik-table").DataTable();

                        // Event pencarian dan filter
                        $(".search, #idKK, #idJenkel").on("change keyup", function() {
                            table.ajax.reload();
                        });
             */

            $('#distribusiSiswaBtn').on('click', function() {
                let selectedIds = [];
                let selectedRows = ''; // Variable untuk menyimpan baris tabel

                // Pemetaan kode_kk ke nama_kk yang sudah diambil dari PHP
                const kompetensiKeahlians = {
                    @foreach ($kompetensiKeahlian as $idkk => $nama_kk)
                        "{{ $idkk }}": "{{ $nama_kk }}",
                    @endforeach
                };

                // Loop untuk mengumpulkan id siswa, nama, NIS, kode_kk, dan nama_kk mereka yang dicentang
                $('.chk-child:checked').each(function() {
                    let nis = $(this).data('nis'); // Ambil NIS dari data attribute
                    let name = $(this).data('name'); // Ambil nama dari data attribute
                    let kode_kk = $(this).data('kode_kk'); // Ambil kode_kk dari data attribute
                    let nama_kk = kompetensiKeahlians[kode_kk]; // Ambil nama_kk berdasarkan kode_kk

                    selectedIds.push($(this).val());

                    // Buat baris baru untuk setiap siswa
                    selectedRows += `
                <tr>
                    <td>${nis}</td>
                    <td>${name}</td>
                    <td>${kode_kk}</td>
                    <td>${nama_kk}</td> <!-- Menambahkan kolom nama_kk -->
                </tr>
            `;
                });

                // Set nilai hidden input di modal form dengan id siswa yang dipilih
                $('#selected_siswa_ids').val(selectedIds.join(','));

                // Tampilkan baris-baris siswa yang dipilih dalam tabel
                $('#selected_siswa_tbody').html(selectedRows);

                // Tampilkan modal distribusi siswa
                $('#distribusiSiswa').modal('show');
            });


            $('#tahunajaran, #aa, #tingkat').on('change', function() {
                var tahunajaran = $('#tahunajaran').val();
                var kode_kk = $('#aa').val();
                var tingkat = $('#tingkat').val();

                if (tahunajaran && kode_kk && tingkat) {
                    $.ajax({
                        url: "{{ route('manajemensekolah.get-rombels') }}",
                        type: "GET",
                        data: {
                            tahunajaran: tahunajaran,
                            kode_kk: kode_kk,
                            tingkat: tingkat
                        },
                        success: function(data) {
                            $('#kode_rombel').empty();
                            $('#kode_rombel').append(
                                '<option value="" selected>Pilih Rombel</option>');
                            $.each(data, function(index, item) {
                                $('#kode_rombel').append('<option value="' + item
                                    .kode_rombel + '">' + item.rombel + '</option>');
                            });

                            // Reset input text for rombel when new data is fetched
                            $('#rombel_input').val('');
                        }
                    });
                } else {
                    $('#kode_rombel').empty();
                    $('#kode_rombel').append('<option value="" selected>Pilih Rombel</option>');
                    $('#rombel_input').val(''); // Reset input text for rombel
                }
            });

            // Ketika rombel dipilih, tampilkan nilai rombel di input text
            $('#kode_rombel').on('change', function() {
                var selectedRombel = $(this).find('option:selected')
                    .text(); // Ambil nama rombel dari text option
                $('#rombel_input').val(selectedRombel); // Set nama rombel ke input text
            });

            $('#' + datatable).DataTable(); // Pastikan DataTable diinisialisasi

            handleCheckbokSiswa(datatable); // Handle checkbox selections
            handleDataTableEvents(datatable);
            handleFilterAndReload(datatable); // Panggil fungsi setelah DataTable diinisialisasi
            handleAction(datatable);
            handleDelete(datatable);
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
