<div class="card">
    <div class="card-body border-bottom-dashed border-bottom">
        <form id="form-pilih-tingkat">
            <div class="row g-3">
                <div class="col-lg">
                    <h3>Daftar Hadir Pengawas</h3>
                    <p>Pilih tanggal dan jamke untuk proses cetak daftar hadir peserta ujian.</p>
                </div>
                <!--end col-->

                <div class="col-lg-auto">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <select id="selectTanggal" class="form-control">
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
                        <select id="selectJamKe" class="form-control">
                            <option value="">-- Pilih Jam Ke --</option>
                            @foreach ($jamKeList as $jk)
                                <option value="{{ $jk }}">{{ $jk }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-auto">
                    <div class="mb-3 d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-soft-primary" id="btn-print-daftar-pengawas">
                            Cetak
                        </button>
                    </div>
                </div>
            </div>
            <!--end row-->
        </form>
    </div>
</div>

<div id="tabel-daftar-hadir-pengawas">
    <img class="card-img-top img-fluid mb-0" src="{{ URL::asset('images/kossurat.jpg') }}" alt="Card image cap"><br><br>
    <div style="text-align:center; font-size: 14px; font-weight: bold;">
        <H4><strong>DAFTAR HADIR DAN NILAI</strong></H4>
        <H4><strong>{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</strong></H4>
        <H4><strong>TAHUN AJARAN
                {{ $identitasUjian?->tahun_ajaran ?? '-' }}</strong></H4>
    </div>
    <div style="width: 100%;font-size: 12px;margin-left:60px;margin-bottom: 10px; margin-top: 20px;">
        <div style="display: flex; margin-bottom: 12px;">
            <div style="width: 150px;">Hari/Tanggal</div>
            <div style="width: 10px;">:</div>
            <div id="hari_tgl_ujian"></div>
        </div>
        <div style="display: flex; margin-bottom: 12px;">
            <div style="width: 150px;">Sesi</div>
            <div style="width: 10px;">:</div>
            <div id="sesi_jamke"></div>
        </div>
    </div>
    <table class="table table-bordered" style="font-size: 12px;" id="tabelPengawas">
        <thead>
            <tr>
                <th>Ruang</th>
                <th>NIP</th>
                <th>Nama Pengawas</th>
                <th>Kode Pengawas</th>
                <th colspan="2">Tanda Tangan</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <P style='font-size: 12px; margin-top: 20px;margin-bottom: 20px;margin-left: 25px;'>
        <strong>Catatan:</strong> Pengawas wajib mengisi daftar hadir ini sebelum dan sesudah pelaksanaan ujian.
    </P>
    <table
        style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;border: none !important;'>
        <tr>
            <td width='25' style='border: none !important;'>&nbsp;</td>
            <td style='border: none !important;'>
                <p style='margin-bottom:-2px;margin-top:-2px'>&nbsp;</p>
                <table
                    style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;border: none !important;'>
                    <tr style='border: none !important;'>
                        <td width='50' style='border: none !important;'></td>
                        <td style='border: none !important;'></td>
                        <td style='border: none !important;'>
                            Mengetahui<br>
                            Kepala Sekolah,
                            <div>
                                <img src='{{ URL::asset('images/damudin.png') }}' border='0' height='110'
                                    style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -160px;margin-top:-15px;'>
                            </div>
                            {{-- <div><img src='{{ URL::asset('images/stempel.png') }}' border='0' height='180'
                                            width='184'
                                            style=' position: absolute; padding: 0px 2px 15px -650px; margin-left: -135px;margin-top:-50px;'>
                                    </div> --}}
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>
                            NIP. 19740302 199803 1 002
                        </td>
                        <td style='border: none !important;' width='200'></td>
                        <td style='padding:4px 8px;border: none !important;'>
                            Majalengka, 05 Mei 2025<br>
                            Ketua Panitia,
                            {{-- <div>
                                <img src='{{ URL::asset('images/almadjid.png') }}' border='0' height='110'
                                    style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -80px;margin-top:-15px;'>
                            </div> --}}

                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <strong>ABDUL MADJID, S.Pd., M.Pd.</strong><br>
                            NIP. 19761128 200012 1 002
                        </td>
                    </tr>
                </table>
            </td>
            <td width='25' style='border: none !important;'>&nbsp;</td>
        </tr>
    </table>
    <br><br><br>
    <h4>DAFTAR HADIR PENGAWAS CADANGAN</h4>
    <table class="table table-bordered" style="font-size: 12px;">
        <thead>
            <tr>
                <th width="50">Ruang</th>
                <th width="150">NIP</th>
                <th>Nama Pengawas</th>
                <th width="25">Kode Pengawas</th>
                <th width="100">Tanda Tangan</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="padding: 25px;">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="padding: 25px;">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="padding: 25px;">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="padding: 25px;">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="padding: 25px;">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style="padding: 25px;">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
        </tbody>
    </table>
</div>

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

                        // ➕ Tambahan: tampilkan info hari & sesi
                        const hariTglUjian = document.getElementById('hari_tgl_ujian');
                        const sesiJamKe = document.getElementById('sesi_jamke');

                        // Konversi tanggal ke format Hari, DD/MM/YYYY
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

                        // ➕ Akhir tambahan
                        if (data.length === 0) {
                            tbody.innerHTML = `
                                <tr>
                                    <td colspan="6" class="text-muted text-center">Tidak ada data</td>
                                </tr>
                            `;
                        } else {
                            data.forEach(row => {
                                const nomorRuang = parseInt(row
                                    .nomor_ruang); // langsung parsing angka

                                // Cek valid angka
                                let ruangGanjil = '';
                                let ruangGenap = '';

                                if (!isNaN(nomorRuang)) {
                                    if (nomorRuang % 2 === 1) {
                                        ruangGanjil = row.nomor_ruang;
                                    } else {
                                        ruangGenap = row.nomor_ruang;
                                    }
                                }

                                tbody.innerHTML += `
                                    <tr>
                                        <td>${row.nomor_ruang}</td>
                                        <td>${row.nip}</td>
                                        <td style="text-align:left;">${row.nama_lengkap}</td>
                                        <td>${row.kode_pengawas}</td>
                                        <td width="100" style="text-align:left;" valign="top">${ruangGanjil}</td>
                                        <td width="100" style="text-align:left;" valign="top">${ruangGenap}</td>
                                    </tr>
                                `;
                            });
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
    document.addEventListener('DOMContentLoaded', function() {
        const printButton = document.getElementById('btn-print-daftar-pengawas');
        if (!printButton) {
            console.error("Tombol print tidak ditemukan");
            return;
        }

        printButton.addEventListener('click', function() {
            const content = document.getElementById('tabel-daftar-hadir-pengawas');
            if (!content) {
                console.error("Elemen tabel tidak ditemukan");
                return;
            }

            const win = window.open('', '_blank');
            win.document.write(`
            <html>
            <head>
                <title>Daftar Pengawas</title>
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
                    table { width: 100%; border-collapse: collapse; margin-left:25px; }
                    table, th, td { border: 1px solid black; }
                    th, td { padding: 5px; text-align: center; }
                    h4 { margin: 5px 0; text-align: center; }
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
