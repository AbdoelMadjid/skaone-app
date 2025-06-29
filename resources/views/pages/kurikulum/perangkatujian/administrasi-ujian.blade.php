@extends('layouts.master')
@section('title')
    @lang('translation.administrasi-ujian')
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="{{ URL::asset('build/libs/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('build/libs/select2-bootstrap-5-theme/select2-bootstrap-5-theme.min.css') }}"
        rel="stylesheet" />
    <style>
        @media print {
            .cetak-kartu tr {
                page-break-inside: avoid;
                /* Hindari potongan di tengah baris */
            }

            .page-break {
                page-break-before: always;
                /* Paksa halaman baru */
            }
        }
    </style>
@endsection
@section('content')
    @component('layouts.breadcrumb')
        @slot('li_1')
            @lang('translation.kurikulum')
        @endslot
        @slot('li_2')
            @lang('translation.perangkat-ujian')
        @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card d-lg-flex gap-1 mx-n3 mt-n3 p-1 mb-2">
                <div class="card-header border-0">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-sm-10">
                            <div class="text-center mt-lg-2 pt-3">
                                <h1 class="display-6 fw-semibold mb-3 lh-base">
                                    Administrasi Ujian <br>
                                    <span class="text-success">
                                        {{ $identitasUjian?->nama_ujian ?? '-' }}
                                    </span>
                                </h1>
                                <p class="lead text-muted lh-base">
                                    Tanggal Pelaksanaan Ujian :
                                    {{ \Carbon\Carbon::parse($identitasUjian?->tgl_ujian_awal)->translatedFormat('l, d F Y') ?? '-' }}
                                    s.d.
                                    {{ \Carbon\Carbon::parse($identitasUjian?->tgl_ujian_akhir)->translatedFormat('l, d F Y') ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#RuangUjian" role="tab"
                                aria-selected="true">
                                <i class="ri-home-4-line text-muted align-bottom me-1"></i> Ruang Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#PesertaUjian" role="tab"
                                aria-selected="false">
                                <i class="mdi mdi-account-circle text-muted align-bottom me-1"></i> Peserta Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#JadwalUjian" role="tab"
                                aria-selected="false">
                                <i class="ri-list-unordered text-muted align-bottom me-1"></i> Jadwal Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#PengawasUjian" role="tab"
                                aria-selected="false">
                                <i class="ri-file-user-line text-muted align-bottom me-1"></i> Pengawas Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#KartuUjian" role="tab"
                                aria-selected="false">
                                <i class="ri-contacts-book-2-line text-muted align-bottom me-1"></i> Kartu Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#DenahUjian" role="tab"
                                aria-selected="false">
                                <i class="ri-checkbox-multiple-blank-line text-muted align-bottom me-1"></i> Denah Tempat
                                Duduk
                            </a>
                        </li>
                        <li class="nav-item ms-auto">
                            <div class="dropdown">
                                <a class="nav-link fw-medium text-reset mb-n1" href="#" role="button"
                                    id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="ri-settings-4-line align-middle me-1"></i> Settings
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                    <li>
                                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.ruang-ujian.index') }}"
                                            class="dropdown-item">Ruang Ujian</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.peserta-ujian.index') }}"
                                            class="dropdown-item">Peserta
                                            Ujian</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.jadwal-ujian.index') }}"
                                            class="dropdown-item">Jadwal
                                            Ujian</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('kurikulum.perangkatujian.administrasi-ujian.pengawas-ujian.index') }}"
                                            class="dropdown-item">Pengawas
                                            Ujian</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane active" id="RuangUjian" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanadmin.ruang-ujian')
                        </div>
                        <div class="tab-pane" id="PesertaUjian" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanadmin.peserta-ujian')
                        </div>
                        <div class="tab-pane" id="JadwalUjian" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanadmin.jadwal-ujian')
                        </div>
                        <div class="tab-pane" id="PengawasUjian" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanadmin.pengawas-ujian')
                        </div>
                        <div class="tab-pane" id="KartuUjian" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanadmin.kartu-ujian')
                        </div>
                        <div class="tab-pane" id="DenahUjian" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanadmin.denah-ujian')
                        </div>
                    </div><!--end tab-content-->
                </div><!--end card-body-->
            </div><!--end card -->
        </div>
        <!--end col-->
    </div>
@endsection
@section('script')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="{{ URL::asset('build/libs/select2/js/select2.min.js') }}"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>

    <script src="{{ URL::asset('build/js/ngeprint.js') }}"></script>
@endsection
@section('script-bottom')
    {{-- Start Datatable --}}
    <script>
        $('#ruangUjianTable').DataTable({
            responsive: true,
            pageLength: 25,
            autoWidth: false,
            columnDefs: [{
                    width: "20px",
                    targets: 0
                },
                {
                    width: "150px",
                    targets: 1
                },
                {
                    width: "60px",
                    targets: 2
                },
                {
                    width: "300px",
                    targets: 3
                },
            ]
        });
        $('#pesertaUjianTable').DataTable({
            responsive: true,
            pageLength: 36,
            autoWidth: false,
            columnDefs: [{
                    width: "20px",
                    targets: 0
                },
                {
                    width: "150px",
                    targets: 1
                },
                {
                    width: "300px",
                    targets: 2
                },
                {
                    width: "60px",
                    targets: 3
                },
            ]
        });
    </script>
    {{-- End Datatable --}}

    {{-- start denah tempat duduk --}}
    <script>
        let currentRuang = null;

        function formatNomorRuang(nomor) {
            return nomor.toString().padStart(2, '0');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const layoutSelector = document.getElementById('layoutSelector');
            const selectRuang = document.getElementById('ruangan');

            // Ganti ruangan dari select dropdown
            selectRuang.addEventListener('change', function() {
                currentRuang = this.value;

                if (currentRuang) {
                    const ruangFormatted = formatNomorRuang(currentRuang);
                    document.querySelectorAll('#text-ruang').forEach(el => {
                        el.textContent = ruangFormatted;
                    });

                    loadDenah();
                } else {
                    document.getElementById('denah-container').innerHTML = '';
                    document.querySelectorAll('#text-ruang').forEach(el => el.textContent = '');
                }
            });

            // Ganti layout (4x5 atau 5x4)
            layoutSelector.addEventListener('change', function() {
                if (currentRuang) loadDenah();
            });
        });

        // Fungsi untuk memuat denah tempat duduk
        function loadDenah() {
            const layout = document.getElementById('layoutSelector').value;

            fetch(`/kurikulum/perangkatujian/denahdata?nomor_ruang=${currentRuang}&layout=${layout}`)
                .then(res => res.json())
                .then(response => {
                    const {
                        layout,
                        mejaList
                    } = response;
                    const layoutType = layout === '4x5' ? generateLayout4x5 : generateLayout5x4;
                    document.getElementById('denah-container').innerHTML = layoutType(mejaList);
                });
        }

        function generateLayout4x5(data) {
            const urutan = [
                [1, 2, 3, 4],
                [8, 7, 6, 5],
                [9, 10, 11, 12],
                [16, 15, 14, 13],
                [17, 18, 19, 20]
            ];
            return renderLayoutByNumber(urutan, data);
        }

        function generateLayout5x4(data) {
            const urutan = [
                [1, 2, 3, 4, 5],
                [10, 9, 8, 7, 6],
                [11, 12, 13, 14, 15],
                [20, 19, 18, 17, 16]
            ];
            return renderLayoutByNumber(urutan, data);
        }

        function renderLayoutByNumber(layoutArray, mejaList) {
            let html = '';
            layoutArray.forEach(baris => {
                html += `<div class="d-flex justify-content-center mb-2">`;
                baris.forEach(nomor => {
                    const index = nomor - 1;
                    const meja = mejaList[index] || {};
                    const kiri = meja.kiri;
                    const kanan = meja.kanan;

                    html += `
                    <div style="border:1px solid #333; width:300px; height:75px; margin:2px; background:#fefefe;">
                        <table style="width:100%; height:100%; font-size:11px; text-align:center; border-collapse:collapse;">
                            <tr>
                                <td style="border-right:1px solid #ccc;padding-top:12px;" width="50%" valign="top">
                                    ${kiri ? '<div style="font-size:10px;">' + kiri.nomor_peserta  + '<br>' + kiri.nis + '<br>' + kiri.nama_lengkap + '</div>' : '&nbsp;'}
                                </td>
                                <td style="border-left:1px solid #ccc;padding-top:12px;" width="50%" valign="top">
                                    ${kanan ? '<div style="font-size:10px;">' + kanan.nomor_peserta + '<br>' + kanan.nis + '<br>' + kanan.nama_lengkap + '</div>' : '&nbsp;'}
                                </td>
                            </tr>
                        </table>
                    </div>`;
                });
                html += `</div>`;
            });
            return html;
        }
    </script>

    <script>
        setupPrintHandler({
            printButtonId: 'btn-print-denah-ujian',
            tableContentId: 'tabel-denah-ujian',
            title: 'Denah Tempat Duduk Ujian',
            requiredFields: [{
                id: 'ruangan',
                message: 'Silakan pilih ruangan terlebih dahulu sebelum mencetak denah tempat duduk ujian.'
            }],
            customStyle: `
                @page { size: A4; margin: 10mm; }
                body { font-family: 'Times New Roman', serif; font-size: 12px; }
                table { border-collapse: collapse; width: 100%; }
                td { padding: 4px; }
                h4 { margin: 5px 0; text-align: center; }
                .meja { border:1px solid #333; width:300px; height:165px; margin:4px; background:#fefefe; }
                .denah-wrapper { display: flex; justify-content: center; flex-wrap: wrap; }
                .d-flex { display: flex; justify-content: center; margin-bottom: 10px; }
            `
        });
    </script>
    {{-- end denah tempat duduk --}}

    {{-- start pesertaujian per ruang --}}
    <script>
        $('#ruangan').change(function() {
            let nomorRuang = $(this).val();
            console.log('Selected:', nomorRuang);

            if (nomorRuang !== "") {
                // Format nomor ruang ke dua digit
                let ruangFormatted = nomorRuang.padStart(2, '0');
                $('#text-ruang-peserta').text(ruangFormatted); // Update teks RUANG

                $.ajax({
                    url: '{{ url('/kurikulum/perangkatujian/daftar-siswa-ruangan') }}/' + nomorRuang,
                    type: 'GET',
                    success: function(response) {
                        $('#daftar-siswa-ujian').html(response);
                    },
                    error: function(xhr) {
                        console.error(xhr.responseText);
                        $('#daftar-siswa-ujian').html('<tr><td colspan="7">Gagal load data.</td></tr>');
                    }
                });
            } else {
                $('#daftar-siswa-ujian').html('');
                $('#text-ruang-peserta').text('');
            }
        });
    </script>

    <script>
        setupPrintHandler({
            printButtonId: 'btn-print-daftar-peserta-ruangan',
            tableContentId: 'cetak-daftar-peserta-ujian',
            title: 'Daftar Peserta Ujian',
            requiredFields: [{
                id: 'ruangan',
                message: 'Silakan pilih ruangan terlebih dahulu sebelum mencetak peserta ujian tiap ruangan.'
            }],
            customStyle: `
                body { font-family: 'Times New Roman', serif; font-size: 11px; }
                table { width: 100%; border-collapse: collapse; }
                table, th, td { border: 1px solid black; }
                th { padding: 4px; text-align: center; }
                h4 { margin: 5px 0; text-align: center; }
            `
        });
    </script>
    {{-- end pesertaujian per ruang --}}

    {{-- start tempelan meja --}}
    <script>
        $('#ruangan').on('change', function() {
            let ruang = $(this).val();

            if (ruang !== "") {
                $.ajax({
                    url: '{{ route('kurikulum.perangkatujian.get-tempelan-ruang') }}',
                    method: 'GET',
                    data: {
                        nomor_ruang: ruang
                    },
                    success: function(response) {
                        tampilkanPeserta(response.kiri, '#tempel-meja-kiri');
                        tampilkanPeserta(response.kanan, '#tempel-meja-kanan');
                    },
                    error: function() {
                        alert("Gagal mengambil data peserta.");
                    }
                });
            } else {
                $('#tempel-meja-kiri').html('');
                $('#tempel-meja-kanan').html('');
            }
        });

        function tampilkanPeserta(pesertaList, targetDiv) {
            let html =
                "<table style='margin: 0 auto; width: 100%; border-collapse: collapse; font: 12px Arial, sans-serif;'>";

            let kolom = 3;
            let i = 0;

            pesertaList.forEach((peserta, index) => {
                if (i % kolom === 0) {
                    html += "<tr>";
                }

                html += `
        <td style="width:33%; padding:10px;">
            <div style="
                border: 2px solid #444;
                border-radius: 10px;
                padding: 15px;
                text-align: center;
                background: #f9f9f9;
                box-shadow: 2px 2px 4px rgba(0,0,0,0.1);
                min-height: 100px;
            ">
                <div style="font-weight: bold; font-size: 16px; margin-bottom: 5px;">${peserta.nomor_peserta}</div>
                <div style="font-size: 14px; font-weight: 600;">${peserta.peserta_didik.nama_lengkap}</div>
                <div style="font-size: 12px; color: #555;">NIS: ${peserta.nis}</div>
            </div>
        </td>`;

                i++;

                if (i % kolom === 0) {
                    html += "</tr>";
                }
            });

            // Tambah kolom kosong jika kurang dari 3
            let sisa = i % kolom;
            if (sisa !== 0) {
                for (let j = 0; j < kolom - sisa; j++) {
                    html += "<td style='width:33%;'></td>";
                }
                html += "</tr>";
            }

            html += "</table>";
            $(targetDiv).html(html);
        }
    </script>

    <script>
        setupPrintHandler({
            printButtonId: 'btn-cetak-tempelan-meja',
            tableContentId: 'cetak-tempelan-meja',
            title: 'Cetak Tempelan Meja Ujian',
            requiredFields: [{
                id: 'ruangan',
                message: 'Silakan pilih ruangan terlebih dahulu sebelum mencetak tempelan meja ujian.'
            }],
            customStyle: `
                body { font-family: 'Times New Roman', serif; font-size: 12px; }
                table { width: 100%; border-collapse: collapse; }
                table, th, td { border: 1px solid black; }
                th, td { padding: 5px; text-align: center; }
                h4 { margin: 5px 0; text-align: center; }
            `
        });
    </script>
    {{-- end tempelan meja --}}

    {{-- start kartu ujian --}}
    <script>
        $(document).ready(function() {
            $('#rombel').on('change', function() {
                const kelas = $(this).val();
                const container = $('#kartu-container');
                container.html('<p>Memuat data...</p>');

                if (kelas !== "") {
                    $.ajax({
                        url: "{{ route('kurikulum.perangkatujian.getkartupeserta') }}",
                        method: "GET",
                        data: {
                            kelas: kelas
                        },
                        success: function(response) {
                            container.html(response.html);
                        },
                        error: function(xhr) {
                            container.html('<p class="text-danger">Gagal memuat data.</p>');
                            console.error(xhr);
                        }
                    });
                } else {
                    container.html('');
                }
            });
        });
    </script>

    <script>
        setupPrintHandler({
            printButtonId: 'btn-print-cetak-kartu-ujian',
            tableContentId: 'cetak-kartu-ujian',
            title: 'Kartu Ujian Peserta',
            requiredFields: [{
                id: 'rombel',
                message: 'Silakan pilih rombongan belajar terlebih dahulu sebelum mencetak kartu ujian.'
            }],
            customStyle: `
                @page {
                    size: A4;
                    margin: 5mm;
                }
                html, body {
                    width: 210mm;
                    height: 297mm;
                    margin: 0;
                    padding: 0;
                    font-family: 'Times New Roman', serif;
                    font-size: 12px;
                }
                .kartu-wrapper {
                    page-break-inside: avoid;
                }
                table {
                    border-collapse: collapse;
                    width: 100%;
                }
                td {
                    padding: 4px;
                    vertical-align: top;
                }
                .cetak-kartu {
                    margin: 0 auto;
                    width: 100%;
                    border-collapse: collapse;
                    font: 12px Times New Roman;
                    table-layout: fixed;
                }
            `
        });
    </script>
    {{-- end kartu ujian --}}

    {{-- start jadwal ujian --}}
    <script>
        document.getElementById('tingkat').addEventListener('change', function() {
            const tingkat = this.value;
            const url = "{{ url('kurikulum/perangkatujian/load-jadwal-tingkat') }}";

            if (!tingkat) {
                document.getElementById('tabel-jadwal-ujian').innerHTML = '';
                return;
            }

            fetch(`${url}?tingkat=${tingkat}`)
                .then(res => res.text())
                .then(html => {
                    document.getElementById('tabel-jadwal-ujian').innerHTML = html;
                })
                .catch(err => {
                    console.error('Gagal memuat data:', err);
                    document.getElementById('tabel-jadwal-ujian').innerHTML =
                        '<div class="alert alert-danger">Gagal memuat data.</div>';
                });
        });
    </script>
    {{-- end jadwal ujian --}}

    {{-- jadwal pengawas --}}
    <script>
        setupPrintHandler({
            printButtonId: 'btn-print-jadwal-mengawas',
            tableContentId: 'tabel-jadwal-mengawas',
            title: 'Jadwal Pengawas Ujian',
            beforeContent: () => `
                <img class="card-img-top img-fluid mb-0" src="{{ URL::asset('images/kossurat.jpg') }}"
                alt="Card image cap"><br><br>
            `,
            customStyle: `
                body { font-family: 'Times New Roman', serif; font-size: 11px; }
                table { width: 100%; border-collapse: collapse; }
                table, th, td { border: 1px solid black; }
                th { padding: 5px; text-align: center; }
                h4 { margin: 5px 0; text-align: center; }
            `
        });
    </script>

    <script>
        setupPrintHandler({
            printButtonId: 'btn-print-daftar-pengawas',
            tableContentId: 'tabel-daftar-pengawas',
            title: 'Daftar Pengawas Ujian',
            beforeContent: () => `
                <img class="card-img-top img-fluid mb-0" src="{{ URL::asset('images/kossurat.jpg') }}"
                alt="Card image cap"><br><br>
            `,
            customStyle: `
                body { font-family: 'Times New Roman', serif; font-size: 12px; }
                table { width: 100%; border-collapse: collapse; }
                table, th, td { border: 1px solid black; }
                th, td { padding: 5px; text-align: center; }
                h4 { margin: 5px 0; text-align: center; }
            `
        });
    </script>

    {{-- cetak Jadwa Ujian --}}
    <script>
        setupPrintHandler({
            printButtonId: 'btn-cetak-jadwal',
            tableContentId: 'tabel-jadwal-ujian',
            title: 'Kartu Ujian Peserta',
            requiredFields: [{
                id: 'tingkat',
                message: 'Silakan pilih tingkat terlebih dahulu dan pastikan jadwal sudah ditampilkan.'
            }],
            customStyle: `
                body { font-family: 'Times New Roman', serif; font-size: 12px; }
                table { width: 100%; border-collapse: collapse; }
                table, th, td { border: 1px solid black; }
                th { padding: 4px; text-align: center; }
                h4 { margin: 5px 0; text-align: center; }
            `
        });
    </script>

    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
