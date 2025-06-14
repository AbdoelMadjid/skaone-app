@extends('layouts.master')
@section('title')
    @lang('translation.arsip-wali-kelas')
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
            @lang('translation.dokumen-guru')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row justify-content-center mb-4">
                        <div class="col-lg-12">
                            <h5 class="fs-16 fw-semibold text-center mb-0">ARSIP WALI KELAS</h5>
                        </div>
                        <div class="col-lg-12 mt-4 mb-4">
                            <form>
                                <div class="row justify-content-center g-3">
                                    <div class="col-lg-auto">
                                        <div>
                                            <select class="form-control" data-plugin="choices" data-choices
                                                data-choices-search-false name="choices-single-default" id="idThnAjaran">
                                                <option value="all" selected>Pilih Tahun Ajaran</option>
                                                @foreach ($tahunAjaranOption as $thnajar)
                                                    <option value="{{ $thnajar }}">{{ $thnajar }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-auto">
                                        <div>
                                            <select class="form-control" data-plugin="choices" data-choices
                                                data-choices-search-false name="choices-single-default" id="idSemester">
                                                <option value="all" selected>Pilih Semester</option>
                                                <option value="Ganjil">Ganjil</option>
                                                <option value="Genap">Genap</option>
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
                                    <!--end col-->
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
                                                data-choices-search-false name="choices-single-default" id="idRombel"
                                                disabled>
                                                <option value="all" selected>Pilih Rombel</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div><!--end row-->
                        <div class="border border-dashed mb-4"></div>
                        <div id="nama-wali-kelas" class="mb-0"></div>
                    </div>
                </div>
                <div>
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#dataKelas" role="tab"
                                aria-selected="false">
                                <i class="las la-address-card text-muted align-bottom me-1 fs-4"></i> Data Kelas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" id="images-tab" href="#abSensi" role="tab"
                                aria-selected="true">
                                <i class="las la-calendar-check text-muted align-bottom me-1 fs-4"></i> Absensi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#ekstraKurikuler" role="tab"
                                aria-selected="false">
                                <i class="las la-table-tennis text-muted align-bottom me-1 fs-4"></i> Ekstrakurikuler
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#prestasiSiswa" role="tab"
                                aria-selected="false">
                                <i class="las la-trophy text-muted align-bottom me-1 fs-4"></i> Prestasi Siswa
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#catatanWaliKelas" role="tab"
                                aria-selected="false">
                                <i class="las la-file-alt text-muted align-bottom me-1 fs-4"></i> Catatan Wali Kelas
                            </a>
                        </li>
                        <li class="nav-item ms-auto">
                            <div class="dropdown">
                                <a class="nav-link fw-medium text-reset mb-n1" href="#" role="button"
                                    id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-settings-4-line align-middle me-1"></i> Settings
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <li><a class="dropdown-item" href="#">Search Settings</a></li>
                                    <li><a class="dropdown-item" href="#">Advanced Search</a></li>
                                    <li><a class="dropdown-item" href="#">Search History</a></li>
                                    <li><a class="dropdown-item" href="#">Search Help</a></li>
                                    <div class="dropdown-divider"></div>
                                    <li><a class="dropdown-item" href="#">Dark Mode:Off</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-2">
                    <div class="tab-content text-muted">
                        <div class="tab-pane active" id="dataKelas" role="tabpanel">
                            <div class="pb-3">
                                Data Kelas
                            </div>
                        </div>
                        <div class="tab-pane" id="abSensi" role="tabpanel">
                            <div class="pb-3">
                                Absensi
                            </div>
                        </div>
                        <div class="tab-pane" id="ekstraKurikuler" role="tabpanel">
                            <div class="pb-3">
                                Ekstrakurikuler
                            </div>
                        </div>
                        <div class="tab-pane" id="prestasiSiswa" role="tabpanel">
                            <div class="pb-3">
                                Prestasi Siswa
                            </div>
                        </div>
                        <div class="tab-pane" id="catatanWaliKelas" role="tabpanel">
                            <div class="pb-3">
                                Catatan wali Kelas
                            </div>
                        </div>
                    </div><!--end tab-content-->

                </div><!--end card-body-->
            </div><!--end card -->
        </div><!--end card -->
    </div><!--end row-->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        // Reload tabel setiap dropdown filter berubah
        $(".form-control").on("change", function() {
            simpanPilihanKeDatabase();
        });

        function simpanPilihanKeDatabase() {
            const tahunajaran = $('#idThnAjaran').val();
            const ganjilgenap = $('#idSemester').val();
            const kode_kk = $('#idKodeKK').val();
            const tingkat = $('#idTingkat').val();
            const kode_rombel = $('#idRombel').val();


            if (!tahunajaran || !ganjilgenap || !kode_kk || !tingkat || !kode_rombel) {
                // Minimal validasi sebelum kirim
                return;
            }

            $.ajax({
                url: '/kurikulum/dokumenguru/simpan-pilihan-walas', // Buat route untuk ini
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    tahunajaran: tahunajaran,
                    ganjilgenap: ganjilgenap,
                    kode_kk: kode_kk,
                    tingkat: tingkat,
                    kode_rombel: kode_rombel,
                },
                success: function(response) {
                    console.log('Pilihan berhasil disimpan atau diperbarui.');
                },
                error: function(xhr) {
                    console.error('Gagal menyimpan data:', xhr.responseText);
                }
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
                $('#idRombel').empty().append(
                    '<option value="all" selected>Pilih Rombel</option>'); // Kosongkan pilihan Rombel
            } else {
                // Jika sudah dipilih keduanya, enable dropdown Rombel dan muat datanya
                $('#idRombel').attr('disabled', false);
                loadRombelData(tahunAjaran, semesterA, kodeKK, tingKat); // Panggil AJAX untuk load data
            }
        }

        // Function untuk load data rombel sesuai pilihan Tahun Ajaran dan Kompetensi Keahlian
        function loadRombelData(tahunAjaran, semesterA, kodeKK, tingKat) {
            $.ajax({
                url: "{{ route('kurikulum.dokumenguru.getRombelWalas') }}", // Route untuk request data rombel
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

        function loadDataTabContent(tahunAjaran, semesterA, kodeKK, tingKat, kodeRombel) {
            $.ajax({
                url: "{{ route('kurikulum.dokumenguru.getTabContent') }}", // rute baru gabungan
                type: "GET",
                data: {
                    tahun_ajaran: tahunAjaran,
                    semester: semesterA,
                    kode_kk: kodeKK,
                    tingkat: tingKat,
                    kode_rombel: kodeRombel
                },
                success: function(response) {
                    $('#dataKelas').html(response.data_kelas); // isi tab Data Kelas
                    $('#abSensi').html(response.absensi); // isi tab Absensi
                    $('#ekstraKurikuler').html(response.eskul); // isi tab Absensi
                    $('#catatanWaliKelas').html(response.catatanWalas); // isi tab Absensi
                    $('#nama-wali-kelas').html(response.nama_wali);
                    $('#prestasiSiswa').html(response.prestasiSiswa);
                },
                error: function(xhr) {
                    console.error(xhr.responseText);
                    $('#dataKelas').html('<div class="text-danger">Gagal memuat data kelas.</div>');
                    $('#abSensi').html('<div class="text-danger">Gagal memuat data absensi.</div>');
                    $('#ekstraKurikuler').html(
                        '<div class="text-danger">Gagal memuat data ekstrakurikuler.</div>');
                    $('#catatanWaliKelas').html(
                        '<div class="text-danger">Gagal memuat data catatan wali kelas.</div>');
                    $('#catatanWaliKelas').html('<div class="text-danger">Gagal memuat nama wali kelas.</div>');
                    $('#prestasiSiswa').html('<div class="text-danger">Gagal memuat nama wali kelas.</div>');
                }
            });
        }

        $(document).ready(function() {

            // Event listener ketika dropdown Tahun Ajaran atau Kompetensi Keahlian berubah
            $('#idThnAjaran, #idSemester, #idKodeKK, #idTingkat').on('change', function() {
                checkDisableRombel(); // Panggil fungsi untuk mengecek apakah Rombel harus di-disable
            });

            // Cek status Rombel saat halaman pertama kali dimuat
            checkDisableRombel();

            $('#idRombel').on('change', function() {
                var tahunAjaran = $('#idThnAjaran').val();
                var semesterA = $('#idSemester').val();
                var kodeKK = $('#idKodeKK').val();
                var tingKat = $('#idTingkat').val();
                var kodeRombel = $(this).val();

                if (kodeRombel !== 'all') {
                    loadDataTabContent(tahunAjaran, semesterA, kodeKK, tingKat, kodeRombel);
                } else {
                    $('#dataKelas').html('<div class="pb-3">Data Kelas</div>');
                    $('#abSensi').html('<div class="pb-3">Absensi</div>');
                    $('#ekstrakurikuler').html('<div class="pb-3">Ekstrakulikuler</div>');
                    $('#prestasiSiswa').html('<div class="pb-3">Prestasi Siswa</div>');
                    $('#nama-wali-kelas').html('');
                }
            });

            $.ajax({
                url: '/kurikulum/dokumenguru/get-pilihan-walikelas',
                method: 'GET',
                success: function(data) {
                    if (data) {
                        // Isi nilai dropdown
                        $("#idThnAjaran").val(data.tahunajaran).trigger("change");
                        $("#idSemester").val(data.ganjilgenap).trigger("change");
                        $("#idKodeKK").val(data.kode_kk).trigger("change");
                        $("#idTingkat").val(data.tingkat).trigger("change");

                        // Tunggu 500ms agar select2 selesai inisialisasi, lalu set guru/rombel
                        setTimeout(function() {
                            $("#idRombel").val(data.kode_rombel).trigger("change").prop(
                                "disabled", false);
                        }, 500);
                    }
                },
                error: function(xhr) {
                    console.error('Gagal mengambil data pilihan user:', xhr.responseText);
                }
            });
        });
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
