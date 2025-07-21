{{-- <style>
    #cetak-modul-ajar table {
        width: 100%;
        border-collapse: collapse;
        font-size: 12px;
    }

    #cetak-modul-ajar th,
    #cetak-modul-ajar td {
        border: 1px solid #333;
        /* sedikit lebih soft */
        padding: 6px 10px;
        /* seimbang dan tidak terlalu besar */
        vertical-align: top;
        line-height: 1.4;
    }

    #cetak-modul-ajar table ol {
        padding-left: 20px;
        margin: 0;
    }

    #cetak-modul-ajar h5,
    #cetak-modul-ajar h6 {
        margin-top: 20px;
        font-weight: bold;
        font-family: 'Times New Roman', Times, serif;
    }

    /* Untuk menyelaraskan margin dalam <td> yang berisi <div> */
    #cetak-modul-ajar td>div {
        margin: 0;
        padding: 0;
    }

    /* Tambahan untuk tata letak penandatangan */
    #cetak-modul-ajar table td {
        font-family: 'Times New Roman', Times, serif;
    }


    @media print {
        #cetak-modul-ajar tr {
            page-break-inside: avoid;
            /* Hindari potongan di tengah baris */
        }

        .page-break {
            page-break-before: always;
            /* Paksa halaman baru */
        }

        body,
        html {
            margin: 0 !important;
            padding: 0 !important;
        }

        #cetak-modul-ajar {
            margin: 0 !important;
            padding: 0 !important;
        }

        @page {
            margin: 0;
            /* Hapus margin default saat print */
        }
    }

    /* Menonaktifkan border khusus untuk tabel tanda tangan */
    .tabel-tanpa-border td,
    .tabel-tanpa-border th {
        border: none !important;
        padding: 6px 8px;
    }

    .tabel-tanpa-border {
        border-collapse: collapse;
    }
</style> --}}
<div id="cetak-modul-ajar" style='@page {size: A4;}'>
    <table class="cetak-modulajar no-border">
        <tr>
            <td align='center'><img src="{{ URL::asset('images/kossurat.jpg') }}" alt="" class="img-fluid w-100"
                    style="height: auto;"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style='font-size:18px;text-align:center;'>
                <strong>MODUL AJAR</strong><BR>
                <div class="text-center" id="modulFase">FASE</div>

            </td>
        </tr>
        <tr>
            <td style='font-size:12px;text-align:center;'>
                <strong>
                    <div class="text-center mt-3" id="modulTopik"></div>
                </strong>
            </td>
        </tr>
    </table>
    <br>

    <table class="table" id="modulInformasiUmum">
        <tr>
            <td colspan="2">A. INFORMASI UMUM</td>
        </tr>
        <tr>
            <td style="width:200px;">Nama Sekolah</td>
            <td>{{ $identitasSekolah->nama_sekolah }}</td>
        </tr>
        <tr>
            <td>Tahun Ajaran / Semester </td>
            <td>{{ $tahunAjaranAktif->tahunajaran }} / {{ $semesterAktif->semester }}</td>
        </tr>
        <tr>
            <td>Bidang Keahlian</td>
            <td><span id="previewBidang"></span></td>
        </tr>
        <tr>
            <td>Program Keahlian</td>
            <td><span id="previewProgram"></span></td>
        </tr>
        <tr>
            <td>Konsentrasi Keahlian</td>
            <td><span id="previewKonsentrasi"></span></td>
        </tr>
        <tr>
            <td>Kelas</td>
            <td><span id="previewKelas"></span></td>
        </tr>
        <tr>
            <td>Penyusun</td>
            <td>{{ $fullName }}</td>
        </tr>
    </table>
    <br>
    <table class="table" class="mt-4">
        <tr>
            <td colspan="2">
                B. KERANGKA DAN TUJUAN PEMBELAJARAN
            </td>
        </tr>
        <tr>
            <td style="width:200px;">Elemen</td>
            <td>
                <ol id="preview-elemen" style="margin-left:-20px;">
                    <!-- akan diisi <li> secara dinamis -->
                </ol>
            </td>
        </tr>
        <tr>
            <td>Capaian Pembelajaran Elemen</td>
            <td>
                <ol id="preview-capaianpembelajaran" style="margin-left:-20px;">
                    <!-- akan diisi <li> secara dinamis -->
                </ol>
            </td>
        </tr>
        <tr>
            <td>Tujuan Pembelajaran (TP)</td>
            <td>
                <ol id="preview-tujuanpembelajaran" style="margin-left:-20px;">
                    <!-- akan diisi <li> secara dinamis -->
                </ol>
            </td>
        </tr>
        <tr>
            <td>Kriteria Ketercapaian (KKTP)</td>
            <td>
                <div id="preview-kkpt-wrapper">
                    <!-- akan diisi secara dinamis -->
                </div>
            </td>
        </tr>
        <tr>
            <td>Kompetensi Awal</td>
            <td>
                <div id="preview-kompetensiawal">
                    <!-- akan diisi secara dinamis -->
                </div>
            </td>
        </tr>
        <tr>
            <td>Target Peserta Didik</td>
            <td>
                <div id="preview-targetpesertadidik">
                    <!-- akan diisi secara dinamis -->
                </div>
            </td>
        </tr>
        <tr>
            <td>Profil Lulusan</td>
            <td>
                <div id="preview-profilkelulusan"></div>
            </td>
        </tr>
        <tr>
            <td>Kerangka Pembelajaran</td>
            <td>
                <div id="preview-kerangka">
                    <!-- Isi akan ditambahkan di sini -->
                </div>
            </td>
        </tr>
        <tr>
            <td>Alokasi Waktu</td>
            <td>
                <div id="preview-alokasiwaktu">
                    <!-- akan diisi secara dinamis -->
                </div>
            </td>
        </tr>
    </table>
    <br>
    <table class="table">
        <tr>
            <td colspan="2">
                C. KOMPONEN INTI
            </td>
        </tr>
        <tr>
            <td style="width:200px;">Pemahaman Bermakna</td>
            <td>
                <div id="preview-pemahamanbermakna">
                    <!-- akan diisi secara dinamis -->
                </div>
            </td>
        </tr>
        <tr>
            <td>Pertanyaan Pemantik</td>
            <td>
                <ol id="preview-pertanyaanpemantik" style="margin-left:-20px;">
                    <!-- akan diisi <li> secara dinamis -->
                </ol>
            </td>
        </tr>
        <tr>
            <td>Kegiatan Pembelajaran</td>
            <td>
                <div id="preview-kegiatanpembelajaran"></div>
            </td>
        </tr>
        <tr>
            <td>Asesmen</td>
            <td>
                <div id="assesment"></div>
            </td>
        </tr>
        <tr>
            <td>Refleksi Pendidik &amp; Peserta Didik</td>
            <td>
                <div id="refleksi-preview"></div>
            </td>
        </tr>
    </table>
    <br><br>
    <table class="cetak-modulajar no-border">
        <tr>
            <td></td>
            <td style="width:40%">
                Mengetahui<br>
                Kepala Sekolah
                <br>
                <br>
                <br>
                <br>
            <td>
            <td style="width:60%">
                Majalengka, <br>
                Guru Mata Pelajaran
                <br>
                <br>
                <br>
                <br>
            <td>
        </tr>
        <tr>
            <td></td>
            <td>
                <div id="namaKepsek"></div>
                <div id="nipKepsek"></div>
            <td>
            <td>
                <div id="namaGuruMapel"></div>
                <div id="nipGuruMapel"></div>
            <td>
        </tr>
    </table>
    <br>
    <br>
    <h5 class="mt-4">D. LAMPIRAN</h5>
    <table <div class="mt-0">
        <h6>Lampiran</h6>
        <ul id="preview-lampiran" style="margin-left:-15px;">
            <!-- akan diisi <li> secara dinamis -->
        </ul>
</div>
<div class="mt-4">
    <h6>Glosarium</h6>
    <div id="preview-glosarium"></div>
</div>
<div class="mt-4">
    <h6>Daftar Pustaka</h6>
    <div id="preview-daftarpustaka">- </div>
</div>
</div>
