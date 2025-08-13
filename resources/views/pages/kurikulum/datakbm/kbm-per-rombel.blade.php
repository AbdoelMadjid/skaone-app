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
                            <option value="{{ $thnajar }}" {{ $thnajar == $tahunAjaranAktif ? 'selected' : '' }}>
                                {{ $thnajar }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-auto me-1">
                    <select class="form-select form-select-sm" data-plugin="choices" data-choices data-choices-search-false
                        name="choices-single-default" id="idSemester">
                        <option value="all" disabled {{ request('semester') ? '' : 'selected' }}>Pilih Semester
                        </option>
                        <option value="Ganjil" {{ request('semester', $semesterAktif) == 'Ganjil' ? 'selected' : '' }}>
                            Ganjil</option>
                        <option value="Genap" {{ request('semester', $semesterAktif) == 'Genap' ? 'selected' : '' }}>Genap
                        </option>
                        {{-- <option value="all" selected>Pilih Semester</option>
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option> --}}
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
        // ID tabel DataTable yang digunakan
        const datatable = 'kbmperrombel-table';

        /**
         * Fungsi untuk handle pencarian & reload DataTable
         * @param {string} tableId - ID dari tabel yang akan digunakan
         */
        function handleFilterAndReload(tableId) {
            var table = $('#' + tableId).DataTable();

            // Event untuk pencarian via input .search
            $('.search').on('keyup change', function() {
                var searchValue = $(this).val(); // Ambil nilai input pencarian
                table.search(searchValue).draw(); // Pencarian langsung di DataTable
            });

            // Event saat salah satu dropdown filter berubah
            $('#idThnAjaran, #idSemester, #idKodeKK, #idTingkat, #idRombel').on('change', function() {
                table.ajax.reload(null, false); // Reload DataTable tanpa reset pagination
            });

            // Menambahkan parameter filter tambahan sebelum request AJAX DataTable
            table.on('preXhr.dt', function(e, settings, data) {
                data.thajarSiswa = $('#idThnAjaran').val();
                data.smstrSiswa = $('#idSemester').val();
                data.kodeKKSiswa = $('#idKodeKK').val();
                data.tingkatSiswa = $('#idTingkat').val();
                data.rombelSiswa = $('#idRombel').val();
            });
        }

        /**
         * Mengecek apakah dropdown Rombel harus di-disable
         * Rombel hanya aktif jika semua filter utama sudah dipilih
         */
        function checkDisableRombel() {
            var tahunAjaran = $('#idThnAjaran').val();
            var semesterA = $('#idSemester').val();
            var tingKat = $('#idTingkat').val();
            var kodeKK = $('#idKodeKK').val();

            // Jika salah satu filter belum dipilih
            if (tahunAjaran === 'all' || semesterA === 'all' || kodeKK === 'all' || tingKat === 'all') {
                $('#idRombel').attr('disabled', true);
                $('#idRombel').empty().append('<option value="all" selected>Rombel</option>');
            } else {
                // Semua filter sudah dipilih → enable & load data Rombel
                $('#idRombel').attr('disabled', false);
                loadRombelData(tahunAjaran, semesterA, kodeKK, tingKat);
            }
        }

        /**
         * Memuat data rombel dari server berdasarkan filter
         * @param {string} tahunAjaran
         * @param {string} semesterA
         * @param {string} kodeKK
         * @param {string} tingKat
         */
        function loadRombelData(tahunAjaran, semesterA, kodeKK, tingKat) {
            $.ajax({
                url: "{{ route('kurikulum.datakbm.getRombel') }}", // Endpoint untuk ambil rombel
                type: "GET",
                data: {
                    tahun_ajaran: tahunAjaran,
                    semester: semesterA,
                    kode_kk: kodeKK,
                    tingkat: tingKat
                },
                success: function(data) {
                    console.log('Response dari server:', data); // Debug respon server

                    var rombelSelect = $('#idRombel');
                    rombelSelect.empty(); // Bersihkan pilihan sebelumnya

                    // Default option
                    rombelSelect.append('<option value="all" selected>Pilih Rombel</option>');

                    // Tambahkan rombel jika ada data
                    if (Object.keys(data).length > 0) {
                        $.each(data, function(key, value) {
                            rombelSelect.append('<option value="' + key + '">' + value + '</option>');
                        });
                    } else {
                        rombelSelect.append('<option value="none">Tidak ada rombel tersedia</option>');
                    }

                    // Trigger event change agar DataTable reload
                    $('#idRombel').trigger('change');
                },
                error: function(xhr) {
                    console.error('Error pada AJAX:', xhr.responseText);
                }
            });
        }

        /**
         * Update guru pengajar di suatu mata pelajaran
         * @param {number} kbmId - ID KBM
         * @param {number} personilId - ID Guru (Personil)
         */
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

        /**
         * Update jumlah jam mengajar pada KBM
         * @param {number} id - ID KBM per Rombel
         * @param {number} jamValue - Jumlah jam baru
         */
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

        // Saat dokumen siap
        $(document).ready(function() {
            // Cek status rombel setiap kali filter utama berubah
            $('#idThnAjaran, #idSemester, #idKodeKK, #idTingkat').on('change', function() {
                checkDisableRombel();
            });

            // Cek awal saat halaman dimuat
            checkDisableRombel();

            // Inisialisasi DataTable
            $('#' + datatable).DataTable();

            // Inisialisasi fungsi-fungsi tambahan DataTable
            handleFilterAndReload(datatable);
            handleDataTableEvents(datatable);
            handleAction(datatable);
            handleDelete(datatable);
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
