@extends('layouts.master')
@section('title')
    @lang('translation.ijazah')
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
            @lang('translation.dokumensiswa')
        @endslot
    @endcomponent
    <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
        <div class="card-header">
            <div class="d-flex align-items-center">
                <x-heading-title>@yield('title')</x-heading-title>
            </div>
        </div>
        <div class="card-body p-1">
            <form>
                <div class="row g-3">
                    <div class="col-lg">
                    </div>
                    <div class="col-lg-auto">
                        <div class="search-box">
                            <input type="text" class="form-control form-control-sm search" placeholder="Nama Siswa ....">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" data-plugin="choices" data-choices
                                data-choices-search-false name="choices-single-default" id="idThnAjaran">
                                <option value="all" selected>Pilih Tahun Ajaran</option>
                                @foreach ($tahunAjaranOptions as $thnajar)
                                    <option value="{{ $thnajar }}"
                                        {{ $thnajar == $tahunAjaranAktif ? 'selected' : '' }}>
                                        {{ $thnajar }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" data-plugin="choices" data-choices
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
                            <select class="form-select form-select-sm" data-plugin="choices" data-choices
                                data-choices-search-false name="choices-single-default" id="idTingkat">
                                <option value="all" selected>Pilih Tingkat</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12" selected>12</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-auto">
                        <div>
                            <select class="form-select form-select-sm" data-plugin="choices" data-choices
                                data-choices-search-false name="choices-single-default" id="idRombel" disabled>
                                <option value="all" selected>Pilih Rombel</option>
                            </select>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body p-1">
            {!! $dataTable->table(['class' => 'table table-striped hover', 'style' => 'width:100%']) !!}
        </div>
    </div>
    <div class="modal fade" id="TranskripIjazah" tabindex="-1" aria-labelledby="TranskripIjazahLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Transkip Nilai Ijazah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body" id="TranskripIjazahBody">
                    <div>
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        {{-- menampilkan blade di pages.kurikulum.dokumensiswa.rapor-pkl-tampil --}}

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-soft-secondary" id="btn-cetak-trans-ijazah">Cetak</button>
                    <button type="button" class="btn btn-sm btn-soft-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="SuratKetLulus" tabindex="-1" aria-labelledby="SuratKetLulusLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Transkip Nilai Ijazah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body" id="SuratKetLulusBody">
                    <div>
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        {{-- menampilkan blade di pages.kurikulum.dokumensiswa.rapor-pkl-tampil --}}

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-soft-secondary" id="btn-cetak-skkl">Cetak</button>
                    <button type="button" class="btn btn-sm btn-soft-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="SuratKetBaik" tabindex="-1" aria-labelledby="SuratKetBaikLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Transkip Nilai Ijazah</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body" id="SuratKetBaikBody">
                    <div>
                        <div class="spinner-border text-primary" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        {{-- menampilkan blade di pages.kurikulum.dokumensiswa.rapor-pkl-tampil --}}

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-soft-secondary" id="btn-cetak-skkb">Cetak</button>
                    <button type="button" class="btn btn-sm btn-soft-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/multi.js/multi.min.js') }}"></script>

    {!! $dataTable->scripts() !!}
@endsection
@section('script-bottom')
    <script>
        const datatable = 'ijazah-table';

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

        document.getElementById("btn-cetak-trans-ijazah").addEventListener("click", function() {
            // Ambil konten yang akan dicetak
            var printContents = document.getElementById("cetak-transkrip-ijazah").innerHTML;

            // Tutup modal Bootstrap
            var modalElement = document.getElementById('modal-detail');
            var modalInstance = bootstrap.Modal.getInstance(modalElement);
            if (modalInstance) {
                modalInstance.hide();
            }

            // Cetak di jendela baru
            var printWindow = window.open('', '_blank');
            printWindow.document.write(`
            <html>
            <head>
                <title>Cetak Nilai PKL</title>
                <style>
                    .cetak-rapor {
                        border-collapse: collapse;
                        width: 100%;
                        text-decoration-color: black;
                    }
                    .cetak-rapor td {
                        border: 1px solid black;
                        padding: 1px;
                        text-align: left;
                    }
                    .cetak-rapor th {
                        border: 1px solid black;
                        background-color: #f2f2f2;
                        font-weight: bold;
                        text-align: center;
                    }
                    @media print {
                        .cetak-rapor tr {
                            page-break-inside: avoid;
                        }
                        .page-break {
                            page-break-before: always;
                        }
                    }
                    .no-border {
                        border: 0 !important;
                        border-collapse: collapse !important;
                    }
                    .cetak-rapor .no-border,
                    .cetak-rapor .no-border th,
                    .cetak-rapor .no-border td {
                        border: none !important;
                    }
                    .text-center {
                        text-align: center;
                    }
                    .note {
                        font-size: 11px;
                        margin-top: 10px;
                    }

                    .ttd-container {
                        margin-left: 10%;
                        width: 90%;
                        /* Supaya tidak melewati batas kanan */
                    }

                    .ttd-wrapper {
                        width: 100%;
                        margin: 20px auto;
                        font-family: "Times New Roman", Times, serif;
                        font-size: 12px;
                        border-collapse: collapse;
                    }

                    .ttd-section {
                        width: 50%;
                        vertical-align: top;
                        text-align: left;
                        /* Rata kiri */
                    }

                    .ttd-section td {
                        padding: 3px;
                    }

                    .ttd-title {
                        font-weight: bold;
                    }

                    .ttd-spacing {
                        height: 45px;
                    }

                    .relative-wrapper {
                        position: relative;
                    }

                    .ttd-img-kepsek {
                        position: absolute;
                        top: 35px;
                        left: -90px;
                        height: 90px;
                        z-index: 1;
                    }

                    .ttd-img-stempel {
                        position: absolute;
                        top: 5px;
                        left: -75px;
                        height: 150px;
                        z-index: 0;
                    }

                    @media print {
                        .ttd-wrapper {
                            page-break-inside: avoid;
                        }
                    }
                </style>
            </head>
            <body onload="window.print(); window.close();">
                ${printContents}
            </body>
            </html>
        `);
            printWindow.document.close();
        });

        document.getElementById("btn-cetak-skkl").addEventListener("click", function() {
            // Ambil konten yang akan dicetak
            var printContents = document.getElementById("cetak-skl").innerHTML;

            // Tutup modal Bootstrap
            var modalElement = document.getElementById('modal-detail');
            var modalInstance = bootstrap.Modal.getInstance(modalElement);
            if (modalInstance) {
                modalInstance.hide();
            }

            // Cetak di jendela baru
            var printWindow = window.open('', '_blank');
            printWindow.document.write(`
            <html>
            <head>
                <title>Cetak Nilai PKL</title>
                <style>
                    .cetak-rapor {
                        border-collapse: collapse;
                        width: 100%;
                        text-decoration-color: black;
                    }
                    .cetak-rapor td {
                        border: 1px solid black;
                        padding: 1px;
                        text-align: left;
                    }
                    .cetak-rapor th {
                        border: 1px solid black;
                        background-color: #f2f2f2;
                        font-weight: bold;
                        text-align: center;
                    }
                    @media print {
                        .cetak-rapor tr {
                            page-break-inside: avoid;
                        }
                        .page-break {
                            page-break-before: always;
                        }
                    }
                    .no-border {
                        border: 0 !important;
                        border-collapse: collapse !important;
                    }
                    .cetak-rapor .no-border,
                    .cetak-rapor .no-border th,
                    .cetak-rapor .no-border td {
                        border: none !important;
                    }
                    .text-center {
                        text-align: center;
                    }
                    .note {
                        font-size: 11px;
                        margin-top: 10px;
                    }

                    .ttd-container {
                        margin-left: 10%;
                        width: 90%;
                        /* Supaya tidak melewati batas kanan */
                    }

                    .ttd-wrapper {
                        width: 100%;
                        margin: 20px auto;
                        font-family: "Times New Roman", Times, serif;
                        font-size: 12px;
                        border-collapse: collapse;
                    }

                    .ttd-section {
                        width: 50%;
                        vertical-align: top;
                        text-align: left;
                        /* Rata kiri */
                    }

                    .ttd-section td {
                        padding: 3px;
                    }

                    .ttd-title {
                        font-weight: bold;
                    }

                    .ttd-spacing {
                        height: 45px;
                    }

                    .relative-wrapper {
                        position: relative;
                    }

                    .ttd-img-kepsek {
                        position: absolute;
                        top: 35px;
                        left: -90px;
                        height: 90px;
                        z-index: 1;
                    }

                    .ttd-img-stempel {
                        position: absolute;
                        top: 5px;
                        left: -75px;
                        height: 150px;
                        z-index: 0;
                    }

                    @media print {
                        .ttd-wrapper {
                            page-break-inside: avoid;
                        }
                    }
                </style>
            </head>
            <body onload="window.print(); window.close();">
                ${printContents}
            </body>
            </html>
        `);
            printWindow.document.close();
        });

        document.getElementById("btn-cetak-skkb").addEventListener("click", function() {
            // Ambil konten yang akan dicetak
            var printContents = document.getElementById("cetak-skkb").innerHTML;

            // Tutup modal Bootstrap
            var modalElement = document.getElementById('modal-detail');
            var modalInstance = bootstrap.Modal.getInstance(modalElement);
            if (modalInstance) {
                modalInstance.hide();
            }

            // Cetak di jendela baru
            var printWindow = window.open('', '_blank');
            printWindow.document.write(`
            <html>
            <head>
                <title>Cetak Nilai PKL</title>
                <style>
                    .cetak-rapor {
                        border-collapse: collapse;
                        width: 100%;
                        text-decoration-color: black;
                    }
                    .cetak-rapor td {
                        border: 1px solid black;
                        padding: 1px;
                        text-align: left;
                    }
                    .cetak-rapor th {
                        border: 1px solid black;
                        background-color: #f2f2f2;
                        font-weight: bold;
                        text-align: center;
                    }
                    @media print {
                        .cetak-rapor tr {
                            page-break-inside: avoid;
                        }
                        .page-break {
                            page-break-before: always;
                        }
                    }
                    .no-border {
                        border: 0 !important;
                        border-collapse: collapse !important;
                    }
                    .cetak-rapor .no-border,
                    .cetak-rapor .no-border th,
                    .cetak-rapor .no-border td {
                        border: none !important;
                    }
                    .text-center {
                        text-align: center;
                    }
                    .note {
                        font-size: 11px;
                        margin-top: 10px;
                    }

                    .ttd-container {
                        margin-left: 10%;
                        width: 90%;
                        /* Supaya tidak melewati batas kanan */
                    }

                    .ttd-wrapper {
                        width: 100%;
                        margin: 20px auto;
                        font-family: "Times New Roman", Times, serif;
                        font-size: 12px;
                        border-collapse: collapse;
                    }

                    .ttd-section {
                        width: 50%;
                        vertical-align: top;
                        text-align: left;
                        /* Rata kiri */
                    }

                    .ttd-section td {
                        padding: 3px;
                    }

                    .ttd-title {
                        font-weight: bold;
                    }

                    .ttd-spacing {
                        height: 45px;
                    }

                    .relative-wrapper {
                        position: relative;
                    }

                    .ttd-img-kepsek {
                        position: absolute;
                        top: 35px;
                        left: -90px;
                        height: 90px;
                        z-index: 1;
                    }

                    .ttd-img-stempel {
                        position: absolute;
                        top: 5px;
                        left: -75px;
                        height: 150px;
                        z-index: 0;
                    }

                    @media print {
                        .ttd-wrapper {
                            page-break-inside: avoid;
                        }
                    }
                </style>
            </head>
            <body onload="window.print(); window.close();">
                ${printContents}
            </body>
            </html>
        `);
            printWindow.document.close();
        });

        $(document).on('click', '.showTransIjazah', function() {
            var nis = $(this).data('nis');

            // Tampilkan spinner loading
            $('#TranskripIjazahBody').html(`
                <div class="text-center my-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            `);

            // AJAX panggil route untuk ambil data rapor PKL
            $.ajax({
                url: '/kurikulum/dokumentsiswa/transkripijazah/' + nis,
                type: 'GET',
                success: function(response) {
                    $('#TranskripIjazahBody').html(response);
                },
                error: function() {
                    $('#TranskripIjazahBody').html(
                        '<div class="text-danger text-center my-5">Gagal memuat data.</div>');
                }
            });
        });

        $(document).on('click', '.showSKKL', function() {
            var nis = $(this).data('nis');

            // Tampilkan spinner loading
            $('#SuratKetLulusBody').html(`
                <div class="text-center my-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            `);

            // AJAX panggil route untuk ambil data rapor PKL
            $.ajax({
                url: '/kurikulum/dokumentsiswa/suratketlulus/' + nis,
                type: 'GET',
                success: function(response) {
                    $('#SuratKetLulusBody').html(response);
                },
                error: function() {
                    $('#SuratKetLulusBody').html(
                        '<div class="text-danger text-center my-5">Gagal memuat data.</div>');
                }
            });
        });

        $(document).on('click', '.showSKKB', function() {
            var nis = $(this).data('nis');

            // Tampilkan spinner loading
            $('#SuratKetBaikBody').html(`
                <div class="text-center my-5">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
            `);

            // AJAX panggil route untuk ambil data rapor PKL
            $.ajax({
                url: '/kurikulum/dokumentsiswa/suratketbaik/' + nis,
                type: 'GET',
                success: function(response) {
                    $('#SuratKetBaikBody').html(response);
                },
                error: function() {
                    $('#SuratKetBaikBody').html(
                        '<div class="text-danger text-center my-5">Gagal memuat data.</div>');
                }
            });
        });

        $(document).on('change', '.kelulusan-select', function() {
            const select = $(this);
            const status = select.val();
            const nis = select.data('nis');
            const tahun = select.data('tahun');

            $.ajax({
                url: "{{ route('kurikulum.dokumentsiswa.ijazah.update-kelulusan') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    nis: nis,
                    tahun_ajaran: tahun,
                    status_kelulusan: status
                },
                success: function(res) {
                    showToast('success', 'Status kelulusan diperbarui.');
                },
                error: function() {
                    showToast('error', 'Gagal memperbarui data.');
                }
            });
        });

        // Menyimpan nomor ijazah saat tekan ENTER
        $(document).on('keypress', '.no-ijazah-input', function(e) {
            if (e.which === 13) {
                e.preventDefault(); // cegah form submit kalau ada

                const input = $(this);
                const noIjazah = input.val();
                const nis = input.data('nis');
                const tahun = input.data('tahun');
                const nm_siswa = input.data('nama');

                $.ajax({
                    url: "{{ route('kurikulum.dokumentsiswa.ijazah.update-kelulusan') }}",
                    method: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        nis: nis,
                        tahun_ajaran: tahun,
                        no_ijazah: noIjazah,
                        nm_siswa: nm_siswa
                    },
                    success: function(res) {
                        showToast('success',
                            `No. Ijazah untuk ${nm_siswa} (NIS ${nis}) berhasil disimpan.`);
                    },
                    error: function() {
                        showToast('error',
                            `Gagal menyimpan No. Ijazah untuk ${nm_siswa} (NIS ${nis}).`
                        );
                    }
                });
            }
        });
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
        <input class="form-check-input kode_rombel_checkbox" type="checkbox" name="kode_rombel[]"
            value="${item.kode_rombel}" id="kode_rombel_${item.kode_rombel}">
        <label class="form-check-label" for="kode_rombel_${item.kode_rombel}">
            ${item.kode_rombel}
        </label>
    </div><br>
    `);
                                $('#checkbox-rombel').append(`
    <div class="form-check form-switch form-check-inline">
        <input class="form-check-input rombel_checkbox" type="checkbox" name="rombel[]" value="${item.rombel}"
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
