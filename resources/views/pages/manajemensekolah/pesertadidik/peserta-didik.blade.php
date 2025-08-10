@extends('layouts.master')
@section('title')
    @lang('translation.peserta-didik')
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
                    <x-btn-group-dropdown padding="p-3">
                        <x-btn-action label="Distribusi Rombel" icon="ri-account-pin-box-fill" data-bs-toggle="modal"
                            data-bs-target="#distribusiSiswa" id="distribusiSiswaBtn" title="Distribusikan siswa yang dipilih"
                            :disabled="true" />
                        <x-btn-action href="{{ route('kurikulum.datakbm.peserta-didik-rombel.index') }}"
                            label="Siswa Per Rombel" icon="ri-parent-fill" />
                        <div class="dropdown-divider"></div>
                        <x-btn-tambah can="create manajemensekolah/peserta-didik"
                            route="manajemensekolah.peserta-didik.create" icon="ri-user-add-fill" />
                        <x-btn-action href="{{ route('pdexportExcel') }}" label="Download" icon="ri-download-2-fill" />
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
                        <input type="text" class="form-control form-control-sm search" placeholder="Nama Lengkap ....">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <select class="form-select form-select-sm" data-plugin="choices" data-choices data-choices-search-false
                        name="choices-single-default" id="idKK">
                        <option value="all" selected>Pilih Kompetensi Keahlian</option>
                        @foreach ($kompetensiKeahlian as $id => $kk)
                            <option value="{{ $id }}">{{ $kk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-auto">
                    <select class="form-select form-select-sm" data-plugin="choices" data-choices data-choices-search-false
                        name="choices-single-default" id="idJenkel">
                        <option value="all" selected>Pilih Jenis Kelamin</option>
                        @foreach ($jenkelOptions as $jenkel)
                            <option value="{{ $jenkel }}">{{ $jenkel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-auto me-3">
                    <select class="form-select form-select-sm" data-plugin="choices" data-choices data-choices-search-false
                        name="choices-single-default" id="idStatus">
                        <option value="all" selected>Pilih Status</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Lulus">Lulus</option>
                        <option value="Keluar">Keluar</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    @include('pages.manajemensekolah.pesertadidik.peserta-didik-import')
    @include('pages.manajemensekolah.pesertadidik.peserta-didik-distribusi')
@endsection
@section('script')
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
            $('#idKK, #idJenkel, #idStatus').on('change', function() {
                table.ajax.reload(null, false); // Reload tabel saat dropdown berubah
            });

            // Override data yang dikirim ke server
            table.on('preXhr.dt', function(e, settings, data) {
                data.kkSiswa = $('#idKK').val(); // Ambil nilai dari dropdown idKK
                data.JenkelSiswa = $('#idJenkel').val(); // Ambil nilai dari dropdown idJenkel
                data.statusSiswa = $('#idStatus').val(); // Ambil nilai dari dropdown idJenkel
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
                let selectedRows = '';

                const kompetensiKeahlians = {
                    @foreach ($kompetensiKeahlian as $idkk => $nama_kk)
                        "{{ $idkk }}": "{{ $nama_kk }}",
                    @endforeach
                };

                $('.chk-child:checked').each(function() {
                    let id = $(this).val();
                    let nis = $(this).data('nis');
                    let name = $(this).data('name');
                    let kode_kk = $(this).data('kode_kk');
                    let nama_kk = kompetensiKeahlians[kode_kk];

                    selectedIds.push(id);

                    selectedRows += `
                        <tr data-id="${id}">
                            <td>${nis}</td>
                            <td>${name}</td>
                            <td>${kode_kk}</td>
                            <td>${nama_kk}</td>
                            <td class="text-center">
                                <input type="checkbox" class="chk-modal" data-id="${id}" checked>
                            </td>
                        </tr>
                    `;
                });

                $('#selected_siswa_ids').val(selectedIds.join(','));
                $('#selected_siswa_tbody').html(selectedRows);
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
