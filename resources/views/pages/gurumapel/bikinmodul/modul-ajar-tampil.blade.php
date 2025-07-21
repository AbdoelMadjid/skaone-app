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
            <td style='font-size:16px;text-align:center;'>
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
            <td style="width:200px;">ID MODUL AJAR</td>
            <td><span id="preview-IdModul"></span></td>
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
            <td>&nbsp;</td>
            <td style="width:40%">
                Mengetahui<br>
                Kepala Sekolah
                <br>
                <br>
                <br>
                <br>
            <td>
            <td style="width:60%">
                <div id="tanggalHariIni"></div>
                Guru Mata Pelajaran
                <br>
                <br>
                <br>
                <br>
            <td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>
                <div id="namaKepsek" style="font-weight: bold;"></div>
                <div id="nipKepsek"></div>
            <td>
            <td>
                <div id="namaGuruMapel" style="font-weight: bold;"></div>
                <div id="nipGuruMapel"></div>
            <td>
        </tr>
    </table>
    <br>
    <br>
    <table class="cetak-modulajar no-border">
        <tr>
            <td style="font-weight: bold;">D. LAMPIRAN</td>
        </tr>
        <tr>
            <td>
                <span style="font-weight: bold; padding-top:10px;">Lampiran</span>
                <ul id="preview-lampiran" style="margin-left:-15px;">
                    <!-- akan diisi <li> secara dinamis -->
                </ul>
            </td>
        </tr>
        <tr>
            <td style="font-weight: bold;">
                <span style="font-weight: bold; padding-top:10px;">Glosarium</span>
                <ul id="preview-glosarium" style="margin-left:-15px;">
                    Judul <br>
                    Deskripsi
                </ul>
            </td>
        </tr>
        <tr>
            <td>
                <span style="font-weight: bold; padding-top:10px;">Daftar Pustaka</span>
                {{-- <div id="preview-daftarpustaka"></div> --}}
                <ul id="preview-daftarpustaka" style="margin-left:-15px;">
                    <!-- akan diisi <li> secara dinamis -->
                </ul>
            </td>
        </tr>
    </table>
</div>
