@extends('layouts.master')
@section('title')
    @lang('translation.remedial-peserta-didik')
@endsection
@section('css')
    <link href="{{ URL::asset('build/libs/dragula/dragula.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.dokumensiswa')
        @endslot
    @endcomponent
    <div class="row" #top>
        <div class="col-lg-12">
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                <div class="card-header border-bottom-dashed">
                    <div class="row g-4 align-items-center">
                        <div class="col-sm">
                            <div>
                                <h3 id="info-keterangan" class="card-title mb-0 flex-grow-1 text-primary-emphasis">
                                    @yield('title') <span class="badge bg-primary align-bottom ms-2"></span></h3>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex flex-wrap align-items-start gap-2">
                                <select id="thnajaran_masuk" class="form-select form-select-sm">
                                    <option value="">-- Pilih Tahun Ajaran --</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-auto">
                            <div class="d-flex flex-wrap align-items-start gap-2">
                                <select id="kode_kk" class="form-select form-select-sm" style="display: none;">
                                    <option value="">-- Pilih Konsentrasi Keahlian --</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body border-bottom-dashed border-bottom">
                    <div class="row g-3">
                        <div class="col-lg">
                            {{--  --}}
                        </div>
                        <!--end col-->
                        <div class="col-lg-auto">
                            <div class="mb-3 d-flex align-items-center gap-2">
                                <div id="search-wrapper" style="display: none;">
                                    <div class="search-box mb-3">
                                        <input type="text" id="search-siswa" class="form-control form-select-sm search"
                                            placeholder="Search Nama Lengkap">
                                        <i class="ri-search-line search-icon"></i>
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-soft-primary" id="kembali-daftar-siswa"
                                    style="display: none;">
                                    <i class="ri-arrow-left-line"></i> Kembali ke Daftar Siswa
                                </button>
                                <button type="button" class="btn btn-sm btn-soft-info" id="btn-nyetak-format-remedial"
                                    style="display: none;">
                                    <i class="ri-printer-line"></i> Cetak
                                </button>
                                <button class="btn btn-sm btn-soft-primary" id="kembali-pilihan-siswa"
                                    style="display: none;">
                                    <i class="ri-arrow-left-line"></i> Kembali ke Siswa
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="table-data-siswa">
                        <div class="alert alert-primary alert-dismissible alert-label-icon rounded-label fade show mt-4"
                            role="alert">
                            <i class="ri-user-smile-line label-icon"></i><strong>Mohon di perhatikan !!</strong>
                            -
                            Silakan pilih tahun masuk peserta didik dan konsentrasi keahlian
                        </div>
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

                    $('html, body').animate({
                        scrollTop: 0
                    }, 'slow');

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
