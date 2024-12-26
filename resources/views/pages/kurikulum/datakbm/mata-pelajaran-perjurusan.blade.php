@extends('layouts.master')
@section('title')
    @lang('translation.mata-pelajaran')
@endsection
@section('css')
    {{--     <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}"
        rel="stylesheet" /> --}}
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
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">@lang('translation.tables') @lang('translation.mata-pelajaran')</h5>
                    <div>
                        <button type="button" class="btn btn-soft-primary" data-bs-toggle="modal"
                            data-bs-target="#distribusiMapel" id="distribusiMapelBtn" title="Distribusikan Mapel yang dipilih"
                            disabled>Distribusi
                            Mapel</button>
                        <a class="btn btn-soft-primary"
                            href="{{ route('kurikulum.datakbm.mata-pelajaran.index') }}">Kembali</a>
                    </div>
                </div>
                <div class="card-body border-bottom-dashed border-bottom">
                    <form>
                        <div class="row g-3">
                            <div class="col-xl-8">
                                <div class="search-box">
                                    <input type="text" class="form-control search"
                                        placeholder="Search Nama Mata Pelajaran ....">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-xl-4">
                                <div class="row g-3">
                                    <div class="col-sm-8">
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
                                    <div class="col-sm-4">
                                        <div>
                                            <select class="form-control" data-plugin="choices" data-choices
                                                data-choices-search-false name="semesterSelect" id="semesterSelect">
                                                <option value="all" selected>All Semesters</option>
                                                <option value="1">Semester 1</option>
                                                <option value="2">Semester 2</option>
                                                <option value="3">Semester 3</option>
                                                <option value="4">Semester 4</option>
                                                <option value="5">Semester 5</option>
                                                <option value="6">Semester 6</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                            </div>
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
    @include('pages.kurikulum.datakbm.mata-pelajaran-perjurusan-distribusi')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script> --}}

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'matapelajaranperjurusan-table';

        function handleCheckbokMapel(tableId) {
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
                $('#distribusiMapelBtn').prop('disabled', false); // Enable "Buatkan Akun" button
            } else {
                $('#remove-actions').hide(); // Hide "remove actions" if no checkboxes are checked
                $('#distribusiMapelBtn').prop('disabled', true); // Disable "Buatkan Akun" button
            }
        }

        function handleFilterAndReload(tableId) {
            var table = $('#' + tableId).DataTable();

            // Trigger saat mengetik di input pencarian
            $('.search').on('keyup change', function() {
                var searchValue = $(this).val(); // Ambil nilai dari input pencarian
                table.search(searchValue).draw(); // Lakukan pencarian dan gambar ulang tabel
            });

            // Trigger saat dropdown Kompetensi Keahlian berubah
            $('#idKK').on('change', function() {
                table.ajax.reload(null, false); // Reload tabel saat dropdown berubah
            });

            // Trigger saat dropdown Semester berubah
            $('#semesterSelect').on('change', function() {
                table.ajax.reload(null, false); // Reload tabel saat dropdown berubah
            });

            // Override data yang dikirim ke server
            table.on('preXhr.dt', function(e, settings, data) {
                data.kodeKK = $('#idKK').val(); // Ambil nilai dari dropdown idKK
                data.semester = $('#semesterSelect').val(); // Ambil nilai dari dropdown semester
            });
        }

        // Inisialisasi DataTable
        $(document).ready(function() {

            $('#distribusiMapelBtn').on('click', function() {
                let selectedIds = [];
                let selectedRows = ''; // Variable untuk menyimpan baris tabel

                // Loop untuk mengumpulkan id
                $('.chk-child:checked').each(function() {
                    let kel_mapel = $(this).data('kel_mapel');
                    let kode_mapel = $(this).data('kode_mapel');
                    let mata_pelajaran = $(this).data('mata_pelajaran');

                    selectedIds.push($(this).val());

                    // Buat baris baru untuk setiap siswa
                    selectedRows += `
                        <tr>
                            <td>${kel_mapel}</td>
                            <td>${kode_mapel}</td>
                            <td>${mata_pelajaran}</td>
                        </tr>
                    `;
                });

                // Set nilai hidden input di modal form dengan id siswa yang dipilih
                $('#selected_mapel_ids').val(selectedIds.join(','));

                // Tampilkan baris-baris siswa yang dipilih dalam tabel
                $('#selected_mapel_tbody').html(selectedRows);

                // Tampilkan modal distribusi siswa
                $('#distribusiMapel').modal('show');
            });


            $('#tahunajaran, #kode_kk, #tingkat').on('change', function() {
                var tahunajaran = $('#tahunajaran').val();
                var kode_kk = $('#kode_kk').val();
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
                            // Kosongkan kontainer checkbox
                            $('#checkbox-kode-rombel').empty();
                            $('#checkbox-rombel').empty();

                            $.each(data, function(index, item) {
                                // Tambahkan checkbox untuk kode rombel
                                $('#checkbox-kode-rombel').append(`
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input kode_rombel_checkbox"
                                            type="checkbox"
                                            name="kode_rombel[]"
                                            value="${item.kode_rombel}"
                                            id="kode_rombel_${item.kode_rombel}">
                                        <label class="form-check-label" for="kode_rombel_${item.kode_rombel}">
                                            ${item.kode_rombel}
                                        </label>
                                    </div><br>
                                `);

                                // Tambahkan checkbox untuk nama rombel
                                $('#checkbox-rombel').append(`
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input rombel_checkbox"
                                            type="checkbox"
                                            name="rombel[]"
                                            value="${item.rombel}"
                                            id="rombel_${item.kode_rombel}">
                                        <label class="form-check-label" for="rombel_${item.kode_rombel}">
                                            ${item.rombel}
                                        </label>
                                    </div><br>
                                `);
                            });

                            // Handle kode_rombel checkbox click
                            $('.kode_rombel_checkbox').on('change', function() {
                                var rombel = $(this).val();
                                if ($(this).is(':checked')) {
                                    $('#rombel_' + rombel).prop('checked',
                                        true); // Cek otomatis nama rombel
                                } else {
                                    $('#rombel_' + rombel).prop('checked',
                                        false); // Uncek nama rombel
                                }
                            });

                            // Handle check all checkbox
                            $('#check_all').on('change', function() {
                                var isChecked = $(this).is(':checked');
                                $('.kode_rombel_checkbox').each(function() {
                                    $(this).prop('checked',
                                        isChecked); // Check all kode rombel
                                    var rombel = $(this).val();
                                    $('#rombel_' + rombel).prop('checked',
                                        isChecked); // Check all nama rombel
                                });
                            });
                        }
                    });
                } else {
                    $('#checkbox-kode-rombel').empty();
                    $('#checkbox-rombel').empty();
                }
            });


            $('#' + datatable).DataTable(); // Pastikan DataTable diinisialisasi

            handleCheckbokMapel(datatable); // Handle checkbox selections
            handleDataTableEvents(datatable);
            handleFilterAndReload(datatable); // Panggil fungsi setelah DataTable diinisialisasi
            handleAction(datatable);
            handleDelete(datatable);
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
