<div class="card">
    <div class="card-body border-bottom-dashed border-bottom">
        <div class="row g-3">
            <div class="col-lg">
                <h3><i class="ri-key-line text-muted align-bottom me-1"></i> Token Soal Ujian</h3>
                <p>Pilih tanggal dan jamke untuk proses cetak token soal ujian.</p>
            </div>
            <!--end col-->
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <select id="selectTanggalToken" class="form-control">
                        <option value="">-- Pilih Tanggal --</option>
                        @foreach ($tanggalList as $tgl)
                            @php
                                $tanggalFormat = \Carbon\Carbon::parse($tgl)->translatedFormat('l, d F Y');
                            @endphp
                            <option value="{{ $tgl }}">{{ $tanggalFormat }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <select id="selectJamKeToken" class="form-control">
                        <option value="">-- Pilih Jam Ke --</option>
                        @foreach ($jamKeList as $jk)
                            <option value="{{ $jk }}">{{ $jk }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-soft-primary" id="btn-print-token-soal-ujian">
                        Cetak
                    </button>
                </div>
            </div>
        </div>
        <!--end row-->
    </div>
</div>


<div id="token-soal-ujian-container" class=row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
    <p class="text-muted">Silakan pilih tanggal dan sesi/jam ke terlebih dahulu untuk menampilkan token soal ujian.</p>

</div>
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
    document.addEventListener('DOMContentLoaded', function() {
        const printButton = document.getElementById('btn-print-token-soal-ujian');
        const selectTanggal = document.getElementById('selectTanggalToken'); // Ganti ID sesuai HTML
        const selectJamKe = document.getElementById('selectJamKeToken'); // Ganti ID sesuai HTML

        if (!printButton) {
            console.error("Tombol print tidak ditemukan");
            return;
        }

        printButton.addEventListener('click', function() {

            if (!selectTanggal || !selectTanggal.value) {
                showToast('error', "Silakan pilih tanggal terlebih dahulu sebelum mencetak.");
                return;
            }
            if (!selectJamKe || !selectJamKe.value) {
                showToast('error', "Silakan pilih jam ke terlebih dahulu sebelum mencetak.");
                return;
            }

            const content = document.getElementById('token-soal-ujian-container');
            if (!content) {
                console.error("Elemen tabel tidak ditemukan");
                return;
            }

            const win = window.open('', '_blank');
            win.document.write(`
                <html>
                <head>
                    <title>Token Ujian</title>
                    <style>
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
                    </style>
                </head>
                <body>
                    ${content.innerHTML}
                </body>
                </html>
            `);
            win.document.close();
            win.focus();
            win.print();
            win.close();
        });
    });
</script>
