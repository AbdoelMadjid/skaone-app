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
                    <x-btn-group-dropdown size="sm">
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperrombel') }}" label="Rombel"
                            icon="ri-calendar-fill" />
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperguru') }}" label="Guru"
                            icon="ri-calendar-2-fill" />
                        <x-btn-action href="{{ route('kurikulum.datakbm.tampiljadwalperhari') }}" label="Harian"
                            icon="ri-calendar-event-fill" />
                    </x-btn-group-dropdown>
                </div>
                <div class="flex-shrink-0">
                    <button id="deleteSelected" class="btn btn-soft-danger btn-sm" style="display: none;"><i
                            class="ri-delete-bin-2-fill"></i></button>
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <form>
                <div class="row g-3">
                    <div class="col-lg">
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" name="tahunajaran" id="idThnAjaran">
                                <option value="all" selected>Pilih Tahun Ajaran</option>
                                @foreach ($tahunAjaranOptions as $thnajar)
                                    <option value="{{ $thnajar }}"
                                        {{ $thnajar == $tahunAjaranAktif ? 'selected' : '' }}>{{ $thnajar }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" name="semester" id="idSemester">
                                <option value="all" disabled {{ request('semester') ? '' : 'selected' }}>Pilih Semester
                                </option>
                                <option value="Ganjil"
                                    {{ request('semester', $semesterAktif) == 'Ganjil' ? 'selected' : '' }}>
                                    Ganjil</option>
                                <option value="Genap"
                                    {{ request('semester', $semesterAktif) == 'Genap' ? 'selected' : '' }}>Genap
                                </option>
                                {{-- <option value="all" selected>Pilih Semester</option>
                                <option value="Ganjil">Ganjil</option>
                                <option value="Genap">Genap</option> --}}
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" name="kodekk" id="idKodeKK">
                                <option value="all" selected>Pilih Kompetensi Keahlian</option>
                                @foreach ($kompetensiKeahlianOptions as $id => $kode_kk)
                                    <option value="{{ $id }}">{{ $kode_kk }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" name="tingkat" id="idTingkat">
                                <option value="all" selected>Pilih Tingkat</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto me-3">
                        <div>
                            <select class="form-select form-select-sm" name="rombel" id="idRombel" disabled>
                                <option value="all" selected>Pilih Rombel</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" name="hari" id="idHari">
                                <option value="all" selected>Pilih Hari</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-lg-auto me-3">
                        <div>
                            <select class="form-select form-select-sm" name="id_personil" id="idPersonil" disabled>
                                <option value="all" selected>Pilih Guru</option>
                            </select>
                        </div>
                    </div> --}}
                </div>
            </form>
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

        function handleFilterAndReload(tableId) {
            var table = $('#' + tableId).DataTable();

            $('#idThnAjaran, #idSemester, #idKodeKK, #idTingkat, #idRombel, #idHari, #idPersonil').on('change', function() {
                table.ajax.reload(null, false); // Reload tabel saat dropdown berubah
            });

            // Override data yang dikirim ke server
            table.on('preXhr.dt', function(e, settings, data) {
                data.thajarSiswa = $('#idThnAjaran').val();
                data.semesterSiswa = $('#idSemester').val();
                data.kodeKKSiswa = $('#idKodeKK').val();
                data.tingkatSiswa = $('#idTingkat').val();
                data.rombelSiswa = $('#idRombel').val();
                data.hariSiswa = $('#idHari').val();
                data.personilSiswa = $('#idPersonil').val();
            });
        }

        // Function untuk mengecek apakah dropdown rombel harus di-disable atau tidak
        function checkDisableRombel() {
            var tahunAjaran = $('#idThnAjaran').val();
            var semester = $('#idSemester').val();
            var kodeKK = $('#idKodeKK').val();
            var tingKat = $('#idTingkat').val();

            // Jika salah satu dari Tahun Ajaran atau Kompetensi Keahlian belum dipilih
            if (tahunAjaran === 'all' || semester === 'all' || kodeKK === 'all' || tingKat === 'all') {
                // Disable dropdown Rombel
                $('#idRombel').attr('disabled', true);
                $('#idRombel').empty().append('<option value="all" selected>Rombel</option>'); // Kosongkan pilihan Rombel
            } else {
                // Jika sudah dipilih keduanya, enable dropdown Rombel dan muat datanya
                $('#idRombel').attr('disabled', false);
                loadRombelData(tahunAjaran, semester, kodeKK, tingKat); // Panggil AJAX untuk load data
            }
        }

        // Function untuk load data rombel sesuai pilihan Tahun Ajaran dan Kompetensi Keahlian
        function loadRombelData(tahunAjaran, semester, kodeKK, tingKat) {
            $.ajax({
                url: "{{ route('kurikulum.datakbm.getRombel') }}", // Route untuk request data rombel
                type: "GET",
                data: {
                    tahun_ajaran: tahunAjaran,
                    semester: semester,
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

        /* function loadPersonil() {
            const tahunajaran = $('#idThnAjaran').val();
            const kode_kk = $('#idKodeKK').val();
            const tingkat = $('#idTingkat').val();
            const semester = $('#idSemester').val();
            const kode_rombel = $('#idRombel').val();

            if (tahunajaran && kode_kk && tingkat && semester && kode_rombel) {
                $.ajax({
                    url: '/kurikulum/datakbm/get-personil-jadwal',
                    method: 'GET',
                    data: {
                        tahunajaran,
                        kode_kk,
                        tingkat,
                        semester,
                        kode_rombel
                    },
                    success: function(data) {
                        let $personil = $('#idPersonil');
                        $personil.prop('disabled', false).empty().append(
                            '<option value="">Pilih Personil</option>');
                        $.each(data, function(id, nama) {
                            $personil.append(`<option value="${id}">${nama}</option>`);
                        });
                    }
                });
            } else {
                $('#idPersonil').prop('disabled', true).empty().append('<option value="">Pilih Personil</option>');
            }
        } */

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

            /* $('#idThnAjaran, #idKodeKK, #idTingkat, #idSemester, #idRombel').on('change', function() {
                loadPersonil();
            }); */

            // Event listener ketika filter selain rombel berubah
            $('#idThnAjaran, #idKodeKK, #idTingkat, #idSemester').on('change', function() {
                checkDisableRombel();
            });


            // Cek status Rombel saat halaman pertama kali dimuat
            checkDisableRombel();

            $('#' + datatable).DataTable();

            handleFilterAndReload(datatable);
            handleDataTableEvents(datatable);
            handleAction(datatable)
            handleDelete(datatable)
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
