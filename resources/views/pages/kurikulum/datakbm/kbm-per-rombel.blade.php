@extends('layouts.master')
@section('title')
    @lang('translation.kbm-per-rombel')
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
    <!-- Tambahkan ini di blade template Anda -->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                footer: '<div class="text-info fs-6"><a href="https://github.com/AbdoelMadjid" target="blank">Scripting & Design by. Abdul Madjid, S.Pd., M.Pd.</a></div>'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
                footer: '<div class="text-info fs-6"><a href="https://github.com/AbdoelMadjid" target="blank">Scripting & Design by. Abdul Madjid, S.Pd., M.Pd.</a></div>'
            });
        </script>
    @endif
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
                <div class="flex-shrink-0">
                    <x-btn-action href="{{ route('kurikulum.datakbm.mata-pelajaran-perjurusan.index') }}"
                        label="Mapel Per Jurusan" icon="ri-file-copy-fill" />
                </div>
            </div>
        </div>
        <div class="card-body p-1">
            <div class="row g-3">
                <div class="col-lg">
                </div>
                <div class="col-lg-auto me-1">
                    <div class="search-box">
                        <input type="text" class="form-control form-control-sm search"
                            placeholder="Nama Mata Pelajaran ....">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
                <div class="col-lg-auto me-1">
                    <select class="form-select form-select-sm" data-plugin="choices" data-choices data-choices-search-false
                        name="choices-single-default" id="idThnAjaran">
                        <option value="all" selected>Pilih Tahun Ajaran</option>
                        @foreach ($tahunAjaranOptions as $thnajar)
                            <option value="{{ $thnajar }}">{{ $thnajar }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-auto me-1">
                    <select class="form-select form-select-sm" data-plugin="choices" data-choices data-choices-search-false
                        name="choices-single-default" id="idSemester">
                        <option value="all" selected>Pilih Semester</option>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
                </div>
                <div class="col-lg-auto me-1">
                    <select class="form-select form-select-sm" data-plugin="choices" data-choices data-choices-search-false
                        name="choices-single-default" id="idKodeKK">
                        <option value="all" selected>Pilih Kompetensi Keahlian</option>
                        @foreach ($kompetensiKeahlianOptions as $id => $kode_kk)
                            <option value="{{ $id }}">{{ $kode_kk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-auto me-1">
                    <select class="form-select form-select-sm" data-plugin="choices" data-choices data-choices-search-false
                        name="choices-single-default" id="idTingkat">
                        <option value="all" selected>Pilih Tingkat</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </div>
                <div class="col-lg-auto me-3">
                    <select class="form-control form-control-sm" data-plugin="choices" data-choices
                        data-choices-search-false name="choices-single-default" id="idRombel" disabled>
                        <option value="all" selected>Pilih Rombel</option>
                    </select>
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
        const datatable = 'kbmperrombel-table';

        // PENCARIAN DATA KBM PER ROMBEL
        function handleFilterAndReload(tableId) {
            var table = $('#' + tableId).DataTable();

            // Trigger saat mengetik di input pencarian
            $('.search').on('keyup change', function() {
                var searchValue = $(this).val(); // Ambil nilai dari input pencarian
                table.search(searchValue).draw(); // Lakukan pencarian dan gambar ulang tabel
            });

            $('#idThnAjaran, #idSemester, #idKodeKK, #idTingkat, #idRombel').on('change', function() {
                table.ajax.reload(null, false); // Reload tabel saat dropdown berubah
            });

            // Override data yang dikirim ke server
            table.on('preXhr.dt', function(e, settings, data) {
                data.thajarSiswa = $('#idThnAjaran').val(); // Ambil nilai dari dropdown idKK
                data.smstrSiswa = $('#idSemester').val(); // Ambil nilai dari dropdown idSemester
                data.kodeKKSiswa = $('#idKodeKK').val(); // Ambil nilai dari dropdown idJenkel
                data.tingkatSiswa = $('#idTingkat').val(); // Ambil nilai dari dropdown idTingkat
                data.rombelSiswa = $('#idRombel').val(); // Ambil nilai dari dropdown idRombel
            });
        }

        // Function untuk mengecek apakah dropdown rombel harus di-disable atau tidak
        function checkDisableRombel() {
            var tahunAjaran = $('#idThnAjaran').val();
            var semesterA = $('#idSemester').val();
            var tingKat = $('#idTingkat').val();
            var kodeKK = $('#idKodeKK').val();

            // Jika salah satu dari Tahun Ajaran atau Kompetensi Keahlian belum dipilih
            if (tahunAjaran === 'all' || semesterA === 'all' || kodeKK === 'all' || tingKat === 'all') {
                // Disable dropdown Rombel
                $('#idRombel').attr('disabled', true);
                $('#idRombel').empty().append('<option value="all" selected>Rombel</option>'); // Kosongkan pilihan Rombel
            } else {
                // Jika sudah dipilih keduanya, enable dropdown Rombel dan muat datanya
                $('#idRombel').attr('disabled', false);
                loadRombelData(tahunAjaran, semesterA, kodeKK, tingKat); // Panggil AJAX untuk load data
            }
        }

        // Function untuk load data rombel sesuai pilihan Tahun Ajaran dan Kompetensi Keahlian
        function loadRombelData(tahunAjaran, semesterA, kodeKK, tingKat) {
            $.ajax({
                url: "{{ route('kurikulum.datakbm.getRombel') }}", // Route untuk request data rombel
                type: "GET",
                data: {
                    tahun_ajaran: tahunAjaran,
                    semester: semesterA,
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

        // UPDATE PENGAJAR DI TIAP MATA PELAJARAN
        function updatePersonil(kbmId, personilId) {
            $.ajax({
                url: '/kurikulum/datakbm/update-personil',
                method: 'POST',
                data: {
                    id: kbmId,
                    id_personil: personilId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    showToast('success', 'Data berhasil diperbarui!');
                },
                error: function(xhr) {
                    showToast('error', 'Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        }


        function updateJam(id, jamValue) {
            $.ajax({
                url: '/kurikulum/datakbm/update-jumlah-jam',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    kbm_per_rombel_id: id,
                    jumlah_jam: jamValue
                },
                success: function(response) {
                    if (response.success) {
                        showToast('success', 'Jam mengajar berhasil diperbarui!');
                    } else {
                        showToast('warning', response.message || 'Gagal memperbarui jam!');
                    }
                },
                error: function(xhr) {
                    showToast('error', 'Terjadi kesalahan: ' + xhr.responseText);
                }
            });
        }

        // Inisialisasi DataTable
        $(document).ready(function() {

            // Event listener ketika dropdown Tahun Ajaran atau Kompetensi Keahlian berubah
            $('#idThnAjaran, #idSemester, #idKodeKK, #idTingkat').on('change', function() {
                checkDisableRombel(); // Panggil fungsi untuk mengecek apakah Rombel harus di-disable
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
