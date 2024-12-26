@extends('layouts.master')
@section('title')
    @lang('translation.peserta-didik-rombel')
@endsection
@section('css')
    {{-- multiselect --}}
    <link href="{{ URL::asset('build/libs/multi.js/multi.min.css') }}" rel="stylesheet">
    {{-- <link href="{{ URL::asset('build/libs/@tarekraafat/autocomplete.js/css/autoComplete.css') }}" rel="stylesheet"> --}}
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
                <div class="card-header border-bottom-dashed">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h5 class="card-title mb-0">@lang('translation.tables') @lang('translation.peserta-didik-rombel')</h5>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex flex-wrap align-items-start gap-2">
                                <button type="button" class="btn btn-soft-primary" data-bs-toggle="modal"
                                    data-bs-target="#generateAkun" id="generateAkunBtn" title="generateAkun">Generate
                                    Akun Siswa</button>
                                <a href="{{ route('manajemensekolah.peserta-didik.index') }}"
                                    class="btn btn-soft-primary">Peserta
                                    Didik</a>
                                @can('create kurikulum/datakbm/peserta-didik-rombel')
                                    <a class="btn btn-soft-primary add-btn action"
                                        href="{{ route('kurikulum.datakbm.peserta-didik-rombel.create') }}"><i
                                            class="ri-add-line align-bottom me-1"></i> Peserta Didik Rombel</a>
                                @endcan
                                {{-- <a href="{{ route('ps_exportExcel') }}" class="btn btn-primary"><i
                                        class="ri-file-upload-line align-bottom me-1"></i> Unduh</a>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal"
                                    data-bs-target="#importModal"><i class="ri-file-download-line align-bottom me-1"></i>
                                    Unggah</button> --}}
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
                                        placeholder="Search Nama Lengkap Siswa ....">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                            <!--end col-->

                            <div class="col-lg-auto">
                                <div>
                                    <select class="form-control" data-plugin="choices" data-choices
                                        data-choices-search-false name="choices-single-default" id="idThnAjaran">
                                        <option value="all" selected>Pilih Tahun Ajaran</option>
                                        @foreach ($tahunAjaranOptions as $thnajar)
                                            <option value="{{ $thnajar }}">{{ $thnajar }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-auto">
                                <div>
                                    <select class="form-control" data-plugin="choices" data-choices
                                        data-choices-search-false name="choices-single-default" id="idKodeKK">
                                        <option value="all" selected>Pilih Kompetensi Keahlian</option>
                                        @foreach ($kompetensiKeahlianOptions as $id => $kode_kk)
                                            <option value="{{ $id }}">{{ $kode_kk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-auto">
                                <div>
                                    <select class="form-control" data-plugin="choices" data-choices
                                        data-choices-search-false name="choices-single-default" id="idTingkat">
                                        <option value="all" selected>Pilih Tingkat</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-lg-auto">
                                <div>
                                    <select class="form-control" data-plugin="choices" data-choices
                                        data-choices-search-false name="choices-single-default" id="idRombel" disabled>
                                        <option value="all" selected>Pilih Rombel</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    @include('pages.kurikulum.datakbm.peserta-didik-rombel-generateakun')
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script> --}}
    <script src="{{ URL::asset('build/libs/multi.js/multi.min.js') }}"></script>
    {{--     <script src="{{ URL::asset('build/libs/@tarekraafat/autocomplete.js/autoComplete.min.js') }}"></script> --}}
    {{-- <script src="{{ URL::asset('build/js/pages/form-advanced.init.js') }}"></script> --}}
    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'pesertadidikrombel-table';

        function handleFilterAndReload(tableId) {
            var table = $('#' + tableId).DataTable();

            // Trigger saat mengetik di input pencarian
            $('.search').on('keyup change', function() {
                var searchValue = $(this).val(); // Ambil nilai dari input pencarian
                table.search(searchValue).draw(); // Lakukan pencarian dan gambar ulang tabel
            });

            $('#idThnAjaran, #idKodeKK, #idTingkat, #idRombel').on('change', function() {
                table.ajax.reload(null, false); // Reload tabel saat dropdown berubah
            });

            // Override data yang dikirim ke server
            table.on('preXhr.dt', function(e, settings, data) {
                data.thajarSiswa = $('#idThnAjaran').val(); // Ambil nilai dari dropdown idKK
                data.kodeKKSiswa = $('#idKodeKK').val(); // Ambil nilai dari dropdown idJenkel
                data.tingkatSiswa = $('#idTingkat').val(); // Ambil nilai dari dropdown idJenkel
                data.rombelSiswa = $('#idRombel').val(); // Ambil nilai dari dropdown idJenkel
            });
        }

        // Function untuk mengecek apakah dropdown rombel harus di-disable atau tidak
        function checkDisableRombel() {
            var tahunAjaran = $('#idThnAjaran').val();
            var kodeKK = $('#idKodeKK').val();
            var tingKat = $('#idTingkat').val();

            // Jika salah satu dari Tahun Ajaran atau Kompetensi Keahlian belum dipilih
            if (tahunAjaran === 'all' || kodeKK === 'all' || tingKat === 'all') {
                // Disable dropdown Rombel
                $('#idRombel').attr('disabled', true);
                $('#idRombel').empty().append('<option value="all" selected>Rombel</option>'); // Kosongkan pilihan Rombel
            } else {
                // Jika sudah dipilih keduanya, enable dropdown Rombel dan muat datanya
                $('#idRombel').attr('disabled', false);
                loadRombelData(tahunAjaran, kodeKK, tingKat); // Panggil AJAX untuk load data
            }
        }

        // Function untuk load data rombel sesuai pilihan Tahun Ajaran dan Kompetensi Keahlian
        function loadRombelData(tahunAjaran, kodeKK, tingKat) {
            $.ajax({
                url: "{{ route('kurikulum.datakbm.getRombel') }}", // Route untuk request data rombel
                type: "GET",
                data: {
                    tahun_ajaran: tahunAjaran,
                    kode_kk: kodeKK,
                    tingkat: tingKat
                },
                success: function(data) {
                    console.log('Response dari server:', data); // Cek apakah response data sudah benar

                    var rombelSelect = $('#idRombel');
                    rombelSelect.empty(); // Kosongkan pilihan sebelumnya

                    rombelSelect.append(
                        '<option value="all" selected>Pilih Rombel</option>'); // Tambahkan default option

                    if (Object.keys(data).length > 0) {
                        $.each(data, function(key, value) {
                            rombelSelect.append('<option value="' + key + '">' + value + '</option>');
                        });
                    } else {
                        rombelSelect.append('<option value="none">Tidak ada rombel tersedia</option>');
                    }

                    $('#idRombel').trigger('change');
                },
                error: function(xhr) {
                    console.error('Error pada AJAX:', xhr.responseText); // Handle error
                }
            });
        }
        // Inisialisasi DataTable
        $(document).ready(function() {

            // Event listener ketika dropdown Tahun Ajaran atau Kompetensi Keahlian berubah
            $('#idThnAjaran, #idKodeKK, #idTingkat').on('change', function() {
                checkDisableRombel(); // Panggil fungsi untuk mengecek apakah Rombel harus di-disable
            });

            // Cek status Rombel saat halaman pertama kali dimuat
            checkDisableRombel();

            $('#tahunajaran, #kode_kk, #tingkat').on('change', function() {
                // Clear table whenever any of the dropdowns change
                $('#selected_datasiswa_tbody').empty();
                $('#selected_rombel_ids').val(''); // Clear selected rombel ids when filters change

                var tahunajaran = $('#tahunajaran').val();
                var kode_kk = $('#kode_kk').val();
                var tingkat = $('#tingkat').val();

                if (tahunajaran && kode_kk && tingkat) {
                    $.ajax({
                        url: "{{ route('kurikulum.datakbm.get-rombels') }}",
                        type: "GET",
                        data: {
                            tahunajaran: tahunajaran,
                            kode_kk: kode_kk,
                            tingkat: tingkat
                        },
                        success: function(data) {
                            $('#checkbox-kode-rombel').empty();
                            $('#checkbox-rombel').empty();
                            $('#jmlsiswa-rombel').empty();

                            $.each(data, function(index, item) {
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
                                $('#jmlsiswa-rombel').append(
                                    `${item.rombel}: ${item.jumlah_siswa}<br>`);
                            });

                            // Update hidden input for selected rombel IDs whenever a checkbox changes
                            $('.kode_rombel_checkbox').on('change', function() {
                                updateSelectedRombelIds(); // Update hidden input
                                var rombel = $(this).val();
                                if ($(this).is(':checked')) {
                                    $('#rombel_' + rombel).prop('checked', true);
                                    fetchSelectedSiswaData([rombel]);
                                } else {
                                    $('#rombel_' + rombel).prop('checked', false);
                                    $('#selected_datasiswa_tbody tr[data-rombel="' +
                                            rombel + '"]')
                                        .remove();
                                }
                            });

                            $('#check_all').on('change', function() {
                                var isChecked = $(this).is(':checked');
                                $('.kode_rombel_checkbox').each(function() {
                                    $(this).prop('checked', isChecked);
                                    var rombel = $(this).val();
                                    $('#rombel_' + rombel).prop('checked',
                                        isChecked);
                                    if (isChecked) {
                                        fetchSelectedSiswaData([rombel]);
                                    } else {
                                        $('#selected_datasiswa_tbody').empty();
                                    }
                                });
                                updateSelectedRombelIds
                                    (); // Update hidden input for all selected rombels
                            });
                        }
                    });
                } else {
                    // Clear the rombel checkboxes and table if dropdown values are incomplete
                    $('#checkbox-kode-rombel').empty();
                    $('#checkbox-rombel').empty();
                    $('#jmlsiswa-rombel').empty();
                    $('#selected_datasiswa_tbody').empty();
                    $('#selected_rombel_ids').val(''); // Clear selected rombel ids if dropdowns are empty
                }
            });

            // Function to update the hidden input with selected rombel IDs
            function updateSelectedRombelIds() {
                var selectedRombels = [];
                $('.kode_rombel_checkbox:checked').each(function() {
                    selectedRombels.push($(this).val());
                });
                $('#selected_rombel_ids').val(selectedRombels.join(
                    ',')); // Join selected rombel IDs as comma-separated values
            }

            function fetchSelectedSiswaData(rombels) {
                $.ajax({
                    url: "{{ route('kurikulum.datakbm.get-student-data') }}", // Define this route in your controller
                    type: "POST",
                    data: {
                        rombels: rombels,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        $.each(data, function(index, item) {
                            $('#selected_datasiswa_tbody').append(`
                    <tr data-rombel="${item.kode_rombel}">
                         <td>${index + 1}</td>
                        <td>${item.rombel}</td>
                        <td>${item.nis}</td>
                        <td>${item.nama_siswa}</td>
                        <td>${item.foto}</td>
                        <td>${item.email}</td>
                    </tr>
                `);
                        });
                    }
                });
            }


            $('#' + datatable).DataTable();

            handleFilterAndReload(datatable);
            handleDataTableEvents(datatable);
            handleAction(datatable)
            handleDelete(datatable)
        });
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
