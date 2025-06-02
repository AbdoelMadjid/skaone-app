@extends('layouts.master')
@section('title')
    @lang('translation.pelaksanaan-ujian')
@endsection
@section('css')
    {{-- --}}
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
            <div class="card">
                <div class="card-header border-0">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-sm-10">
                            <div class="text-center mt-lg-2 pt-3">
                                <h1 class="display-6 fw-semibold mb-3 lh-base">
                                    Pelaksanaan Ujian <br>
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
                            <a class="nav-link active" data-bs-toggle="tab" href="#DenahRuangan" role="tab"
                                aria-selected="false">
                                <i class=" ri-community-line text-muted align-bottom me-1"></i> Denah Ruangan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#DaftarHadirPeserta" role="tab"
                                aria-selected="true">
                                <i class="ri-file-user-line text-muted align-bottom me-1"></i> Peserta Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#DaftarHadirPanitia" role="tab"
                                aria-selected="false">
                                <i class="mdi mdi-account-circle text-muted align-bottom me-1"></i> Panitia Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#DaftarHadirPengawas" role="tab"
                                aria-selected="false">
                                <i class="ri-contacts-line text-muted align-bottom me-1"></i> Pengawas Ujian
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#TokenSoalUjian" role="tab"
                                aria-selected="false">
                                <i class="ri-key-line text-muted align-bottom me-1"></i> Token Soal Ujian
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
                                        <a href="{{ route('kurikulum.perangkatujian.pelaksanaan-ujian.panitia-ujian.index') }}"
                                            class="dropdown-item">Panitia Ujian</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('kurikulum.perangkatujian.pelaksanaan-ujian.token-soal-ujian.index') }}"
                                            class="dropdown-item">Token Soal Ujian</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('kurikulum.perangkatujian.pelaksanaan-ujian.denah-ruangan-ujian.index') }}"
                                            class="dropdown-item">Denah Ruangan Ujian</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="card-body p-4">
                    <div class="tab-content">
                        <div class="tab-pane" id="DaftarHadirPeserta" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanpelaksanaan.daftar-hadir-peserta')
                        </div>
                        <div class="tab-pane" id="DaftarHadirPanitia" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanpelaksanaan.daftar-hadir-panitia')
                        </div>
                        <div class="tab-pane" id="DaftarHadirPengawas" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanpelaksanaan.daftar-hadir-pengawas')
                        </div>
                        <div class="tab-pane" id="TokenSoalUjian" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanpelaksanaan.token-soal-ujian')
                        </div>
                        <div class="tab-pane active" id="DenahRuangan" role="tabpanel">
                            @include('pages.kurikulum.perangkatujian.halamanpelaksanaan.denah-ruangan')
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
    <script src="https://cdn.jsdelivr.net/npm/interactjs/dist/interact.min.js"></script>
    <script src="{{ URL::asset('build/js/ngeprint.js') }}"></script>
@endsection
@section('script-bottom')
    {{-- daftar hadir peserta --}}
    <script>
        function loadPeserta() {
            let nomorRuang = $('#ruangan').val();
            let posisiDuduk = $('#posisi_duduk').val();

            if (nomorRuang !== "" && posisiDuduk !== "") {
                $.ajax({
                    url: '{{ route('kurikulum.perangkatujian.peserta-by-ruang') }}',
                    type: 'GET',
                    data: {
                        nomor_ruang: nomorRuang,
                        posisi_duduk: posisiDuduk
                    },
                    success: function(response) {
                        $('#tabel-peserta').html(response);
                    },
                    error: function() {
                        $('#tabel-peserta').html(
                            '<div class="alert alert-danger">Gagal memuat data peserta.</div>');
                    }
                });
            } else {
                $('#tabel-peserta').html('');
            }
        }

        $('#ruangan, #posisi_duduk').change(loadPeserta);
    </script>
    <script>
        setupPrintHandler({
            printButtonId: 'btn-print-daftar-peserta',
            tableContentId: 'tabel-peserta',
            title: 'Daftar Hadir Peserta',
            requiredFields: [{
                    id: 'ruangan',
                    message: 'Silakan pilih ruangan terlebih dahulu sebelum mencetak.'
                },
                {
                    id: 'posisi_duduk',
                    message: 'Silakan pilih posisi duduk terlebih dahulu sebelum mencetak.'
                }
            ],
        });
    </script>

    {{-- dafar hadir panitia --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectTanggal = document.getElementById('selectTanggalPanitia');
            const outputDiv = document.getElementById('hari_tgl_ujian_panitia');

            selectTanggal.addEventListener('change', function() {
                const selectedDate = this.value;
                if (selectedDate) {
                    const tanggalObj = new Date(selectedDate);

                    // Format nama hari dan tanggal (gunakan bahasa Indonesia)
                    const hari = tanggalObj.toLocaleDateString('id-ID', {
                        weekday: 'long'
                    });
                    const tanggalFormat = tanggalObj.toLocaleDateString('id-ID', {
                        day: 'numeric',
                        month: 'long',
                        year: 'numeric'
                    });

                    outputDiv.textContent = `${hari}, ${tanggalFormat}`;
                } else {
                    outputDiv.textContent = '';
                }
            });
        });
    </script>
    <script>
        setupPrintHandler({
            printButtonId: 'btn-print-daftar-panitia',
            tableContentId: 'tabel-daftar-hadir-panitia',
            title: 'Daftar Hadir Panitia',
            requiredFields: [{
                id: 'selectTanggalPanitia',
                message: 'Silakan pilih tanggal terlebih dahulu sebelum mencetak daftar hadir panitia.'
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

    {{-- daftar hadir pengawas --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectTanggal = document.getElementById('selectTanggal');
            const selectJamKe = document.getElementById('selectJamKe');

            function fetchData() {
                const tanggal = selectTanggal.value;
                const jamKe = selectJamKe.value;

                if (tanggal && jamKe) {
                    fetch(
                            `{{ route('kurikulum.perangkatujian.pengawasruangan') }}?tanggal=${tanggal}&jam_ke=${jamKe}`
                        )
                        .then(response => response.json())
                        .then(data => {
                            const tbody = document.querySelector('#tabelPengawas tbody');
                            tbody.innerHTML = '';

                            const hariTglUjian = document.getElementById('hari_tgl_ujian');
                            const sesiJamKe = document.getElementById('sesi_jamke');

                            const tanggalObj = new Date(tanggal);
                            const namaHari = tanggalObj.toLocaleDateString('id-ID', {
                                weekday: 'long'
                            });
                            const formatTanggal = tanggalObj.toLocaleDateString('id-ID', {
                                day: 'numeric',
                                month: 'long',
                                year: 'numeric'
                            });

                            hariTglUjian.textContent = `${namaHari}, ${formatTanggal}`;
                            sesiJamKe.textContent = `${jamKe}`;

                            if (data.length === 0) {
                                tbody.innerHTML = `
                                <tr>
                                    <td colspan="6" class="text-muted text-center">Tidak ada data</td>
                                </tr>
                            `;
                            } else {
                                // Jika jumlah data ganjil, tambahkan satu item kosong untuk dipasangkan
                                if (data.length % 2 === 1) {
                                    data.push({
                                        nomor_ruang: '&nbsp;',
                                        nip: '',
                                        nama_lengkap: '',
                                        kode_pengawas: ''
                                    });
                                }

                                for (let i = 0; i < data.length; i += 2) {
                                    const row1 = data[i];
                                    const row2 = data[i + 1];

                                    const ruang1 = parseInt(row1.nomor_ruang);
                                    const ruang2 = parseInt(row2.nomor_ruang);

                                    let ruangGanjilGabung = '';
                                    let ruangGenapGabung = '';

                                    if (!isNaN(ruang1)) {
                                        if (ruang1 % 2 === 1) ruangGanjilGabung = row1.nomor_ruang;
                                        else ruangGenapGabung = row1.nomor_ruang;
                                    }

                                    if (!isNaN(ruang2)) {
                                        if (ruang2 % 2 === 1) ruangGanjilGabung = row2.nomor_ruang;
                                        else ruangGenapGabung = row2.nomor_ruang;
                                    }

                                    tbody.innerHTML += `
                                    <tr>
                                        <td style="padding:10px;">${row1.nomor_ruang}</td>
                                        <td>${row1.nip}</td>
                                        <td style="text-align:left;">${row1.nama_lengkap}</td>
                                        <td>${row1.kode_pengawas}</td>
                                        <td rowspan="2" width="100" style="text-align:left;" valign="top">${ruangGanjilGabung}</td>
                                        <td rowspan="2" width="100" style="text-align:left;" valign="top">${ruangGenapGabung}</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:10px;">${row2.nomor_ruang}</td>
                                        <td>${row2.nip}</td>
                                        <td style="text-align:left;">${row2.nama_lengkap}</td>
                                        <td>${row2.kode_pengawas}</td>
                                    </tr>
                                `;
                                }
                            }
                        })
                        .catch(error => {
                            console.error('Gagal mengambil data:', error);
                            const tbody = document.querySelector('#tabelPengawas tbody');
                            tbody.innerHTML = `
                            <tr>
                                <td colspan="6" class="text-danger text-center">Terjadi kesalahan saat memuat data</td>
                            </tr>
                        `;
                        });
                }
            }

            selectTanggal.addEventListener('change', fetchData);
            selectJamKe.addEventListener('change', fetchData);
        });
    </script>

    <script>
        setupPrintHandler({
            printButtonId: 'btn-print-daftar-pengawas',
            tableContentId: 'tabel-daftar-hadir-pengawas',
            title: 'Daftar Hadir Pengawas',
            requiredFields: [{
                    id: 'selectTanggal',
                    message: 'Silakan pilih tanggal terlebih dahulu sebelum mencetak.'
                },
                {
                    id: 'selectJamKe',
                    message: 'Silakan pilih jam ke terlebih dahulu sebelum mencetak.'
                }
            ],
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
                table { width: 100%; border-collapse: collapse; margin-left:25px; }
                table, th, td { border: 1px solid black; }
                th, td { padding: 5px; text-align: center; }
                h4 { margin: 5px 0; text-align: center; }
            `
        });
    </script>

    {{-- token soal ujian --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selectTanggal = document.getElementById('selectTanggalToken');
            const selectJamKe = document.getElementById('selectJamKeToken');
            const tokenContainer = document.getElementById('token-soal-ujian-container');

            selectTanggal.addEventListener('change', filterTokens);
            selectJamKe.addEventListener('change', filterTokens);

            function filterTokens() {
                const tanggal = selectTanggal.value;
                const jamKe = selectJamKe.value;

                if (!tanggal || !jamKe) {
                    tokenContainer.innerHTML =
                        '<p class="text-muted">Silakan pilih tanggal dan sesi/jam ke terlebih dahulu.</p>';
                    return;
                }

                fetch(`/kurikulum/perangkatujian/token-soal-ujian?tanggal=${tanggal}&jam_ke=${jamKe}`)
                    .then(response => response.json())
                    .then(data => {
                        tokenContainer.innerHTML = '';

                        if (data.length === 0) {
                            tokenContainer.innerHTML =
                                '<p class="text-warning">Tidak ada token untuk filter tersebut.</p>';
                            return;
                        }

                        let html = `
                            <table style="margin: 0 auto; width: 100%; border-collapse: collapse; font: 12px Arial, sans-serif;">
                        `;

                        const kolom = 2; // Jumlah kolom yang diinginkan
                        let i = 0;

                        data.forEach((token, index) => {
                            if (i % kolom === 0) {
                                html += `<tr>`;
                            }

                            html += `
                            <td style="width:33%; padding:10px;">
                                <div style="
                                    border: 2px solid #444;
                                    border-radius: 10px;
                                    padding: 15px;
                                    background: #f9f9f9;
                                    box-shadow: 2px 2px 4px rgba(0,0,0,0.1);
                                    min-height: 120px;
                                ">
                                    <div style="font-size: 14px; margin-bottom: 5px;text-align: center;">
                                        Token: <br><span style="font-weight: bold; font-size: 18px; text-align: center;">${token.token_soal}</span>
                                    </div>
                                    <hr style="border: 1px solid #444; margin: 10px 0;">
                                    <div style="margin-left:60px;"><strong>Kode Ujian:</strong> ${token.kode_ujian}</div>
                                    <div style="margin-left:60px;"><strong>Tanggal:</strong> ${new Date(token.tanggal_ujian).toLocaleDateString('id-ID', {
                                        weekday: 'long',
                                        day: 'numeric',
                                        month: 'long',
                                        year: 'numeric'
                                    })}</div>
                                    <div style="margin-left:60px;"><strong>Sesi:</strong> ${token.sesi_ujian}</div>
                                    <div style="margin-left:60px;"><strong>Mapel:</strong> ${token.matapelajaran}</div>
                                    <div style="margin-left:60px;"><strong>Kelas:</strong> ${token.kelas}</div>
                                </div>
                            </td>
                        `;

                            i++;
                            if (i % kolom === 0) {
                                // Tutup baris
                                html += `</tr>`;

                                // Tambahkan page break setelah setiap 6 baris (12 item)
                                let barisSaatIni = i / kolom;
                                if (barisSaatIni > 0 && barisSaatIni % 6 === 0) {
                                    html += `<tr class="page-break"></tr>`;
                                }
                            }
                        });


                        // Tambah kolom kosong jika tidak genap
                        let sisa = i % kolom;
                        if (sisa !== 0) {
                            for (let j = 0; j < kolom - sisa; j++) {
                                html += "<td></td>";
                            }
                            html += "</tr>";
                        }

                        html += "</table>";
                        tokenContainer.innerHTML = html;
                    })
                    .catch(error => {
                        console.error('Error fetching tokens:', error);
                        tokenContainer.innerHTML =
                            '<p class="text-danger">Gagal memuat token. Silakan coba lagi.</p>';
                    });
            }

            // Load awal saat halaman dibuka
            filterTokens();
        });
    </script>

    <script>
        setupPrintHandler({
            printButtonId: 'btn-print-token-soal-ujian',
            tableContentId: 'token-soal-ujian-container',
            title: 'Token Soal Ujian',
            requiredFields: [{
                    id: 'selectTanggalToken',
                    message: 'Silakan pilih tanggal terlebih dahulu sebelum mencetak.'
                },
                {
                    id: 'selectJamKeToken',
                    message: 'Silakan pilih jam ke terlebih dahulu sebelum mencetak.'
                }
            ],
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
                table { width: 100%; border-collapse: collapse; }
                table, th, td { border: 1px solid black; }
                h4 { margin: 5px 0; text-align: center; }
                .page-break {
                    page-break-after: always;
                }
            `
        });
    </script>

    {{-- denah ruangan --}}
    <script>
        interact('.penanda').draggable({
            listeners: {
                move(event) {
                    const target = event.target;
                    const x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx;
                    const y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;

                    target.style.transform = `translate(${x}px, ${y}px)`;
                    target.setAttribute('data-x', x);
                    target.setAttribute('data-y', y);
                },
                end(event) {
                    const target = event.target;
                    const id = target.dataset.id;
                    const offsetX = parseFloat(target.getAttribute('data-x')) || 0;
                    const offsetY = parseFloat(target.getAttribute('data-y')) || 0;

                    const left = parseFloat(target.style.left) + offsetX;
                    const top = parseFloat(target.style.top) + offsetY;

                    target.style.left = left + 'px';
                    target.style.top = top + 'px';
                    target.style.transform = '';
                    target.removeAttribute('data-x');
                    target.removeAttribute('data-y');

                    fetch('/kurikulum/perangkatujian/denah-update-position/' + id, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                'content')
                        },
                        body: JSON.stringify({
                            x: left,
                            y: top
                        })
                    }).then(response => {
                        if (!response.ok) {
                            alert("Gagal menyimpan posisi.");
                        } else {
                            // ✅ UPDATE KOORDINAT PADA TABEL
                            const row = document.querySelector(`tr[data-id='${id}']`);
                            if (row) {
                                row.querySelector('.kolom-x').textContent = Math.round(left);
                                row.querySelector('.kolom-y').textContent = Math.round(top);
                            }
                        }
                    });
                }
            }
        });
    </script>
    <script>
        setupPrintHandler({
            printButtonId: 'btn-print-denah-ruangan-ujian',
            tableContentId: 'cetak-denah-ruangan-ujian',
            title: 'Denah Ruangan Ujian',
            customStyle: `
                @media print {
                    @page {
                        size: A4 landscape;
                        margin: 10mm;
                    }
                    body {
                        font-family: Arial, sans-serif;
                        -webkit-print-color-adjust: exact;
                        print-color-adjust: exact;
                    }
                    .denah-container {
                        position: relative;
                        width: 1000px;
                    }

                    .denah-img {
                        width: 100%;
                    }

                    .penanda {
                        position: absolute;
                        padding: 2px 6px;
                        background: rgba(0, 123, 255, 0.8);
                        color: #fff;
                        border-radius: 4px;
                        cursor: move;
                        font-weight: bold;
                        font-size: 12px;
                    }
                }
            `
        });
    </script>
    <script>
        setupPrintHandler({
            printButtonId: 'btn-print-keterangan-denah-ruangan-ujian',
            tableContentId: 'denah-ruangan-list',
            title: 'Keterangan Denah Ruangan Ujian',
            customStyle: `
                @page {
                        size: A4;
                        margin: 5mm;
                    }
                body { font-family: 'Times New Roman', serif; font-size: 12px; }
                table { width: 100%; border-collapse: collapse; }
                table, th, td { border: 1px solid black; }
                th, td { padding: 5px; text-align: center; }
                h4 { margin: 5px 0; text-align: center; }
            `
        });
    </script>
    <script src="{{ URL::asset('build/js/app.js') }}"></script>
@endsection
