@extends('layouts.master')
@section('title')
    @lang('translation.remedial-peserta-didik')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
        <div class="file-manager-sidebar">
            <div class="p-4 d-flex flex-column h-100">
                <div class="mb-3">
                    PILIH DATA
                </div>
                <div class="px-4 mx-n4" data-simplebar style="height: calc(110vh - 468px);">
                    <div class="mb-3">
                        <select id="thnajaran_masuk" class="form-select">
                            <option value="">-- Pilih Tahun Ajaran --</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <select id="kode_kk" class="form-select" style="display: none;">
                            <option value="">-- Pilih Konsentrasi Keahlian --</option>
                        </select>
                    </div>

                </div>


                <div class="mt-auto text-center">
                    <img src="{{ URL::asset('build/images/task.png') }}" alt="Task" class="img-fluid" />
                </div>
            </div>
        </div>
        <!--end side content-->
        <div class="file-manager-content w-100 p-4 pb-0">
            <div class="row mb-4">
                <div class="col-auto order-1 d-block d-lg-none">
                    <button type="button" class="btn btn-soft-success btn-icon btn-sm fs-16 file-menu-btn">
                        <i class="ri-menu-2-fill align-bottom"></i>
                    </button>
                </div>
                <div class="col-sm order-3 order-sm-2 mt-3 mt-sm-0">
                    <h5 id="info-keterangan" class="fw-semibold mb-0"><span
                            class="badge bg-primary align-bottom ms-2"></span></h5>
                </div>

                <div class="col-auto order-2 order-sm-3 ms-auto">
                    <div class="hstack gap-2">
                        <div id="search-wrapper" style="display: none;">
                            <div class="search-box mb-3">
                                <input type="text" id="search-siswa" class="form-control search"
                                    placeholder="Search Nama Lengkap">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                        <button class="btn btn-sm btn-soft-primary" id="kembali-daftar-siswa" style="display: none;">
                            <i class="ri-arrow-left-line"></i> Kembali ke Daftar Siswa
                        </button>
                        <button type="button" class="btn btn-sm btn-soft-danger" id="btn-nyetak-format-remedial"
                            style="display: none;">
                            <i class="ri-printer-line"></i> Cetak
                        </button>
                        <button class="btn btn-sm btn-soft-primary" id="kembali-pilihan-siswa" style="display: none;">
                            <i class="ri-arrow-left-line"></i> Kembali ke Siswa
                        </button>
                    </div>
                </div>
            </div>
            <div class="px-4 mx-n4" data-simplebar style="height: calc(110vh - 356px);">
                <div id="table-data-siswa">
                    <div class="alert alert-primary alert-dismissible alert-label-icon rounded-label fade show mt-4"
                        role="alert">
                        <i class="ri-user-smile-line label-icon"></i><strong>Mohon di perhatikan !!</strong> -
                        Silakan pilih tahun masuk peserta didik dan konsentrasi keahlian
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dragula/dragula.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/dom-autoscroller/dom-autoscroller.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/ngeprint.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        $(document).ready(function() {

            $(document).on('keyup', '#search-siswa', function() {
                const value = $(this).val().toLowerCase();
                $('#table-data-siswa table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            // Load thnajaran_masuk saat halaman pertama kali dibuka
            $.get('/kurikulum/dokumentsiswa/get-tahun-ajaran', function(data) {
                let options = `<option value="">-- Pilih Tahun Ajaran --</option>`;
                data.forEach(function(tahun) {
                    options += `<option value="${tahun}">${tahun}</option>`;
                });
                $('#thnajaran_masuk').html(options);
            });

            // Saat thnajaran_masuk dipilih
            $('#thnajaran_masuk').on('change', function() {
                const tahun = $(this).val();

                if (tahun) {
                    $.get(`/kurikulum/dokumentsiswa/get-kompetensi-keahlian/${tahun}`, function(data) {
                        let options = `<option value="">-- Pilih Kompetensi Keahlian --</option>`;
                        data.forEach(function(item) {
                            options +=
                                `<option value="${item.kode_kk}">${item.nama_kk}</option>`;
                        });
                        $('#kode_kk').html(options).show();
                    });
                } else {
                    $('#kode_kk').hide().html('');
                }
            });

            $('#kode_kk').on('change', function() {
                const tahun = $('#thnajaran_masuk').val();
                const kode_kk = $(this).val();

                if (tahun && kode_kk) {
                    $.get('/kurikulum/dokumentsiswa/filter-siswa', {
                        thnajaran_masuk: tahun,
                        kode_kk: kode_kk
                    }, function(data) {
                        $('#table-data-siswa').html(
                            data); // asumsi ada <div id="datasiswa"></div> di halaman
                        const selectedText = $('#kode_kk option:selected').text();
                        $('#info-keterangan').html(
                            `${selectedText} <span class="badge bg-primary align-bottom ms-2">${tahun}</span>`
                        );
                        // ✅ Tampilkan search box
                        $('#search-wrapper').show();
                        $('#kembali-daftar-siswa').hide();
                        $('#kembali-pilihan-siswa').hide();
                        $('#btn-nyetak-format-remedial').hide();
                    });
                }
            });

            $(document).on('click', '.cek-nilai', function() {
                const dataSiswa = {
                    nis: $(this).data('nis'),
                    kode_kk: $(this).data('kodekk'),
                    rombel10: $(this).data('rombel10'),
                    rombel11: $(this).data('rombel11'),
                    rombel12: $(this).data('rombel12'),
                    thnajaran10: $(this).data('thnajaran10'),
                    thnajaran11: $(this).data('thnajaran11'),
                    thnajaran12: $(this).data('thnajaran12')
                };

                // Simpan ke global
                window.lastCekNilaiData = dataSiswa;

                $.get('/kurikulum/dokumentsiswa/cek-mata-pelajaran', dataSiswa, function(data) {
                    $('#table-data-siswa').html(data);
                    $('#search-wrapper').hide();
                    $('#kembali-daftar-siswa').show();
                    $('#kembali-pilihan-siswa').hide();
                    $('#btn-nyetak-format-remedial').hide();
                });
            });

            $(document).on('click', '#kembali-daftar-siswa', function() {
                const tahun = $('#thnajaran_masuk').val();
                const kode_kk = $('#kode_kk').val();

                if (tahun && kode_kk) {
                    $.get('/kurikulum/dokumentsiswa/filter-siswa', {
                        thnajaran_masuk: tahun,
                        kode_kk: kode_kk
                    }, function(data) {
                        $('#table-data-siswa').html(data);
                        $('#search-wrapper').show();
                        $('#kembali-daftar-siswa').hide();
                        $('#kembali-pilihan-siswa').hide();
                        $('#btn-nyetak-format-remedial').hide();
                    });
                }
            });

            $(document).on('click', '.cetak-format-remedial', function() {
                const nis = $(this).data('nis');
                const tahunajaran = $(this).data('tahunajaran');
                const tingkat = $(this).data('tingkat');
                const ganjilgenap = $(this).data('ganjilgenap');
                const kode_rombel = $(this).data('kode_rombel');
                const kel_mapel = $(this).data('kel_mapel');
                const kode_mapel = $(this).data('kode_mapel');
                const id_personil = $(this).data('id_personil');

                // Simpan ke variabel global sementara
                window.lastCetakNis = nis;

                $.get('/kurikulum/dokumentsiswa/cetakremedial', {
                    nis: nis,
                    tahunajaran: tahunajaran,
                    tingkat: tingkat,
                    ganjilgenap: ganjilgenap,
                    kode_rombel: kode_rombel,
                    kel_mapel: kel_mapel,
                    kode_mapel: kode_mapel,
                    id_personil: id_personil,
                }, function(data) {
                    $('#table-data-siswa').html(data);
                    $('#search-wrapper').hide();
                    $('#kembali-daftar-siswa').hide();
                    $('#kembali-pilihan-siswa').show();
                    $('#btn-nyetak-format-remedial').show();
                });
            });


            $(document).on('click', '#kembali-pilihan-siswa', function() {
                const dataSiswa = window.lastCekNilaiData;

                if (dataSiswa && dataSiswa.nis && dataSiswa.kode_kk) {
                    $.get('/kurikulum/dokumentsiswa/cek-mata-pelajaran', dataSiswa, function(data) {
                        $('#table-data-siswa').html(data);
                        $('#search-wrapper').hide();
                        $('#kembali-daftar-siswa').show();
                        $('#kembali-pilihan-siswa').hide();
                        $('#btn-nyetak-format-remedial').hide();
                    });
                }
            });

        });
    </script>
    <script>
        setupPrintHandler({
            printButtonId: 'btn-nyetak-format-remedial',
            tableContentId: 'nyetak-format-remedial',
            title: 'Format Remedial',
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
