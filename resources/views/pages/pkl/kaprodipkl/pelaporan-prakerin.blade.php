@extends('layouts.master')
@section('title')
    @lang('translation.pelaporan')
@endsection
@section('css')
    {{--  --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}"
        rel="stylesheet" />

    <style>
        .invalid-date {
            border-color: red !important;
            background-color: #ffe6e6 !important;
        }
    </style>
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.prakerin')
        @endslot
        @slot('li_2')
            @lang('translation.kaprodipkl')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div>
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <h5>Pelaporan PKL Keprodi</h5>
                                </div>
                            </div>
                            <div class="col-sm">
                                <div class="d-flex justify-content-sm-end">
                                    {{-- <div class="search-box ms-2">
                                        <input type="text" class="form-control" id="searchProductList"
                                            placeholder="Search Products...">
                                        <i class="ri-search-line search-icon"></i>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#pesertaPrakerin"
                                            role="tab">
                                            Peserta Prakerin <span
                                                class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">{{ $totalDataPrakerin }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#daftarPerusahaan"
                                            role="tab">
                                            Daftar Perusahaan <span
                                                class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">{{ $totalPerusahaan }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#guruPkl" role="tab">
                                            Daftar Guru PKL <span
                                                class="badge bg-danger-subtle text-danger align-middle rounded-pill ms-1">{{ $totalPembimbing }}</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#absensiPeserta"
                                            role="tab"> Rekap Absensi
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#jurnalPeserta"
                                            role="tab"> Rekap Jurnal
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#jurnalprakerin"
                                            role="tab"> Jurnal Prakerin
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab"
                                            href="#sertifikatprakerin" role="tab"> Sertifikat Prakerin
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-auto">
                                <div id="selection-element">
                                    <div class="my-n1 d-flex align-items-center text-muted">
                                        Select <div id="select-content" class="text-body fw-semibold px-1"></div> Result
                                        <button type="button" class="btn btn-link link-danger p-0 ms-3"
                                            data-bs-toggle="modal" data-bs-target="#removeItemModal">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">

                        <div class="tab-content">
                            <div class="tab-pane" id="pesertaPrakerin" role="tabpanel">
                                @include('pages.pkl.kaprodipkl.pelaporan-prakerin-peserta')
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="daftarPerusahaan" role="tabpanel">
                                @include('pages.pkl.kaprodipkl.pelaporan-prakerin-perusahaan')
                            </div>
                            <!-- end tab pane -->

                            <div class="tab-pane" id="guruPkl" role="tabpanel">
                                @include('pages.pkl.kaprodipkl.pelaporan-prakerin-gurupkl')
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane" id="absensiPeserta" role="tabpanel">
                                @include('pages.pkl.kaprodipkl.pelaporan-prakerin-absensi')
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane" id="jurnalPeserta" role="tabpanel">
                                @include('pages.pkl.kaprodipkl.pelaporan-prakerin-jurnal')
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane" id="jurnalprakerin" role="tabpanel">
                                @include('pages.pkl.kaprodipkl.pelaporan-prakerin-jurnal-data')
                            </div>
                            <!-- end tab pane -->
                            <div class="tab-pane active" id="sertifikatprakerin" role="tabpanel">
                                @include('pages.pkl.kaprodipkl.pelaporan-prakerin-sertifikat')
                            </div>
                            <!-- end tab pane -->
                        </div>
                        <!-- end tab content -->
                    </div>
                </div>
                <!-- end card -->
            </div>
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->
@endsection
@section('script')
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
@endsection
@section('script-bottom')
    <script>
        $(document).ready(function() {

            // Fungsi konversi nilai angka ke huruf
            function getNilaiHuruf(nilai) {
                if (nilai >= 90) return 'A';
                if (nilai >= 80) return 'B';
                if (nilai >= 70) return 'C';
                if (nilai >= 60) return 'D';
                return 'E';
            }

            $('.btn-cetak-sertifikat').on('click', function() {
                // Ambil data dari tombol
                var nama = $(this).data('nama');
                var nis = $(this).data('nis');
                var perusahaan = $(this).data('perusahaan');
                var nilaiprakerin = $(this).data('nilaiprakerin');
                var jabatan = $(this).data('jabatanpembimbing');
                var pembimbing = $(this).data('namapembimbing');
                var nippembimbing = $(this).data('nippembimbing');
                var nidnpembimbing = $(this).data('nidnpembimbing');
                var pk = $(this).data('programkeahlian');
                var kk = $(this).data('konsentrasi');

                var nilaiHuruf = getNilaiHuruf(parseFloat(nilaiprakerin));

                // Masukkan data ke elemen dalam #cetak-sertifikat-pkl
                $('#cetak-sertifikat-pkl').find('.sertifikat-nama').text(nama);
                $('#cetak-sertifikat-pkl').find('.sertifikat-nis').text(nis);
                $('#cetak-sertifikat-pkl').find('.sertifikat-perusahaan').text(perusahaan);
                $('#cetak-sertifikat-pkl').find('.sertifikat-nilai').text(nilaiprakerin + ' (' +
                    nilaiHuruf + ')');
                $('#cetak-sertifikat-pkl').find('.sertifikat-pk').text(pk);
                $('#cetak-sertifikat-pkl').find('.sertifikat-kk').text(kk);
                $('#cetak-sertifikat-pkl').find('.sertifikat-pembimbing').text(pembimbing);
                $('#cetak-sertifikat-pkl').find('.sertifikat-jabatan').text(jabatan);

                var resultNomor = '';

                if (nippembimbing) {
                    resultNomor = 'NIP. ' + nippembimbing;
                } else if (nidnpembimbing) {
                    resultNomor = 'NIDN ' + nidnpembimbing;
                } else {
                    resultNomor = '';
                }

                $('#cetak-sertifikat-pkl').find('.nomor-pembimbing').text(resultNomor);

                // Setelah data terisi, ambil isi HTML lalu cetak
                const printContent = document.getElementById('cetak-sertifikat-pkl').innerHTML;
                const win = window.open('', '', 'height=800,width=1000');
                win.document.write('<html><head><title>Cetak Sertifikat</title>');
                win.document.write(`
            <style>
                @page {
                    size: A4 landscape;
                    margin: 0;
                }

                body {
                    font-family: "Times New Roman", Times, serif;
                    margin: 0;
                    padding: 0;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                }

                img {
                    -webkit-print-color-adjust: exact;
                    print-color-adjust: exact;
                }
            </style>
        `);
                win.document.write('</head><body>');
                win.document.write(printContent);
                win.document.write('</body></html>');
                win.document.close();
                win.focus();
                win.print();
                win.close();
            });

            // Fungsi untuk memeriksa dan mengubah warna berdasarkan tanggal
            function checkTanggalKirim(input) {
                var tanggalKirim = $(input).val(); // Ambil nilai tanggal
                var tanggal = new Date(tanggalKirim); // Ubah nilai tanggal ke format Date JavaScript

                // Tentukan batas tanggal (1 Desember 2024 dan 31 Maret 2025)
                var batasAwal = new Date('2024-12-01'); // Batas awal (Desember 2024)
                var batasAkhir = new Date('2025-03-31'); // Batas akhir (Maret 2025)

                // Dapatkan tanggal hari ini
                var tanggalHariIni = new Date(); // Tanggal hari ini
                tanggalHariIni.setHours(0, 0, 0, 0); // Set waktu ke 00:00:00 agar hanya tanggal yang diperhitungkan

                // Jika tanggal berada di luar rentang yang ditentukan atau lebih dari tanggal hari ini, beri warna merah
                if (tanggal < batasAwal || tanggal > batasAkhir || tanggal > tanggalHariIni) {
                    $(input).addClass('invalid-date'); // Tambahkan kelas untuk warna merah
                } else {
                    $(input).removeClass('invalid-date'); // Hapus kelas jika valid
                }
            }

            // Panggil fungsi checkTanggalKirim untuk setiap input tanggal saat halaman dimuat
            $('.tanggal-kirim').each(function() {
                checkTanggalKirim(this); // Panggil fungsi untuk memeriksa setiap input tanggal
            });

            // Menambahkan event listener saat tanggal berubah
            $('.tanggal-kirim').on('change', function() {
                checkTanggalKirim(this); // Panggil fungsi setiap kali tanggal berubah
            });

            // Mendengarkan perubahan tanggal pada input
            $('.tanggal-kirim').on('change', function() {
                var tanggalBaru = $(this).val(); // Ambil tanggal yang dipilih
                var idJurnal = $(this).data('id'); // Ambil id jurnal

                // Pastikan tanggal baru valid
                if (tanggalBaru) {
                    // Kirimkan data ke server untuk diperbarui
                    $.ajax({
                        url: '/kaprodipkl/update-tanggal-kirim', // Ganti dengan URL yang sesuai di route Anda
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}', // CSRF token untuk Laravel
                            id_jurnal: idJurnal,
                            tanggal_kirim: tanggalBaru
                        },
                        success: function(response) {
                            if (response.status == 'success') {
                                showToast('success', 'Tanggal berhasil diperbarui!');
                            } else {
                                showToast('error',
                                    'Terjadi kesalahan saat memperbarui tanggal.');
                            }
                        },
                        error: function() {
                            showToast('error', 'Terjadi kesalahan saat memperbarui tanggal.');
                        }
                    });
                }
            });

            // Tabel 1: Peserta Prakerin
            $('#pesertaprakerinTable').DataTable({
                responsive: true,
                pageLength: 25,
                autoWidth: false,
            });

            // Tabel 2: Daftar Perusahaan
            const perusahaanTable = $('#daftarperusahaanTabel').DataTable({
                responsive: true,
                pageLength: 10,
                autoWidth: false,
            });

            // Data peserta per perusahaan
            const pesertaByPerusahaan = @json($pesertaByPerusahaan);

            // Fungsi untuk membuat row child (perusahaan)
            function formatPesertaPerusahaan(perusahaanId) {
                if (!pesertaByPerusahaan[perusahaanId] || pesertaByPerusahaan[perusahaanId].length === 0) {
                    return '<div>Tidak ada data peserta.</div>';
                }

                let tableHtml = `
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Nama Lengkap</th>
                        <th>Rombel</th>
                        <th>Guru PKL</th>
                    </tr>
                </thead>
                <tbody>
        `;

                pesertaByPerusahaan[perusahaanId].forEach((peserta, index) => {
                    tableHtml += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${peserta.nis}</td>
                    <td>${peserta.nama_lengkap}</td>
                    <td>${peserta.rombel}</td>
                    <td>${peserta.nama_pembimbing}</td>
                </tr>
            `;
                });

                tableHtml += `
                </tbody>
            </table>
        `;

                return tableHtml;
            }

            // Event Listener untuk row child (perusahaan)
            $('#daftarperusahaanTabel tbody').on('click', 'a.toggle-peserta', function() {
                const tr = $(this).closest('tr'); // Baris tabel yang diklik
                const row = perusahaanTable.row(tr); // DataTables row object
                const perusahaanId = tr.data('id'); // ID perusahaan dari atribut data-id

                // Periksa apakah row child sudah terbuka
                if (row.child.isShown()) {
                    row.child.hide(); // Sembunyikan nested row
                    tr.removeClass('shown');
                } else {
                    // Sembunyikan semua nested row yang terbuka
                    perusahaanTable.rows('.shown').every(function() {
                        const currentRow = this.node();
                        const currentRowId = $(currentRow).data('id');
                        if (currentRowId !== perusahaanId) {
                            this.child.hide(); // Sembunyikan nested row yang lainnya
                            $(currentRow).removeClass(
                                'shown'); // Hapus kelas 'shown' dari baris lain
                        }
                    });

                    const childContent = formatPesertaPerusahaan(perusahaanId); // Buat konten nested row
                    row.child(childContent).show(); // Tampilkan nested row untuk perusahaan yang dipilih
                    tr.addClass('shown'); // Tambahkan kelas 'shown' ke baris yang dipilih
                }
            });

            // Tabel 3: Pembimbing
            const pembimbingTable = $('#pembimbingTabel').DataTable({
                responsive: true,
                autoWidth: false,
                pageLength: 25,
                columnDefs: [{
                        width: "50px",
                        targets: 0
                    }, // Lebar kolom No.
                    {
                        width: "200px",
                        targets: 1
                    }, // Lebar kolom NIP
                ]
            });

            // Data peserta per pembimbing
            const pesertaByPembimbing = @json($pesertaByPembimbing);

            // Fungsi untuk membuat row child (pembimbing)
            function formatPesertaPembimbing(pembimbingId) {
                if (!pesertaByPembimbing[pembimbingId] || pesertaByPembimbing[pembimbingId].length === 0) {
                    return '<div class="text-center">Tidak ada data peserta.</div>';
                }

                let tableHtml = `
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>NIS</th>
                        <th>Nama Lengkap</th>
                        <th>Rombel</th>
                        <th>Perusahaan</th>
                    </tr>
                </thead>
                <tbody>
        `;

                pesertaByPembimbing[pembimbingId].forEach((peserta, index) => {
                    tableHtml += `
                <tr>
                    <td>${index + 1}</td>
                    <td>${peserta.nis}</td>
                    <td>${peserta.nama_lengkap}</td>
                    <td>${peserta.rombel}</td>
                    <td>${peserta.nama_perusahaan}</td>
                </tr>
            `;
                });

                tableHtml += `
                </tbody>
            </table>
        `;

                return tableHtml;
            }

            // Event Listener untuk row child (pembimbing)
            $('#pembimbingTabel tbody').on('click', 'a.show-peserta', function() {
                const tr = $(this).closest('tr'); // Baris tabel yang diklik
                const row = pembimbingTable.row(tr); // DataTables row object
                const pembimbingId = tr.data('id'); // ID pembimbing dari atribut data-id

                // Periksa apakah row child sudah terbuka
                if (row.child.isShown()) {
                    row.child.hide(); // Sembunyikan nested row
                    tr.removeClass('shown');
                } else {
                    // Sembunyikan semua nested row yang sudah terbuka
                    pembimbingTable.rows('.shown').every(function() {
                        const currentRow = this.node();
                        const currentRowId = $(currentRow).data('id');
                        if (currentRowId !== pembimbingId) {
                            this.child.hide(); // Sembunyikan nested row yang lainnya
                            $(currentRow).removeClass(
                                'shown'); // Hapus kelas 'shown' dari baris lain
                        }
                    });

                    const childContent = formatPesertaPembimbing(pembimbingId); // Buat konten nested row
                    row.child(childContent).show(); // Tampilkan nested row untuk pembimbing yang dipilih
                    tr.addClass('shown'); // Tambahkan kelas 'shown' ke baris yang dipilih
                }
            });

            $('#jurnalTabel').DataTable({
                responsive: true,
                autoWidth: false,
                pageLength: 25,
                columnDefs: [{
                        width: "50px",
                        targets: 0
                    }, // Lebar kolom No.
                    {
                        width: "50px",
                        targets: 1
                    }, // Lebar kolom NIP
                    {
                        width: "60px",
                        targets: 2
                    }, // Lebar kolom NIP
                    {
                        width: "60px",
                        targets: 4
                    }, // Lebar kolom NIP
                    {
                        width: "110px",
                        targets: 6
                    }, // Lebar kolom NIP
                    {
                        width: "60px",
                        targets: 7
                    }, // Lebar kolom NIP
                ]
            });

            // Tabel 1: Peserta Prakerin
            $('#sertifikatprakerinTable').DataTable({
                responsive: true,
                pageLength: 25,
                autoWidth: false,
            });
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
