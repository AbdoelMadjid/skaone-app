<img src="{{ URL::asset('images/kossurat.jpg') }}" alt="" class="img-fluid w-100" style="height: auto;">
<h4 style="text-align: center;margin-top:20px"> MODUL AJAR </h4>
<h5 class="text-center" id="modulFase">FASE</h5>
<h5 class="text-center mt-3" id="modulTopik"></h5>
<hr>
<h5>A. INFORMASI UMUM</h5>
<table class="table" id="modulInformasiUmum">
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
<H5 class="font-bold mt-4">B. KERANGKA DAN TUJUAN PEMBELAJARAN</H5>
<table class="w-full border-collapse border border-black text-xs mt-1">
    <tbody>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Elemen</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <ol id="preview-elemen" style="margin-left:-20px;">
                    <!-- akan diisi <li> secara dinamis -->
                </ol>
            </td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Capaian Pembelajaran Elemen</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <ol id="preview-capaianpembelajaran" style="margin-left:-20px;">
                    <!-- akan diisi <li> secara dinamis -->
                </ol>
            </td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Tujuan Pembelajaran (TP)</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <ol id="preview-tujuanpembelajaran" style="margin-left:-20px;">
                    <!-- akan diisi <li> secara dinamis -->
                </ol>
            </td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Kriteria Ketercapaian (KKTP)</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <div id="preview-kkpt-wrapper">
                    <!-- akan diisi secara dinamis -->
                </div>
            </td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Kompetensi Awal</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <div id="preview-kompetensiawal">
                    <!-- akan diisi secara dinamis -->
                </div>
            </td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Target Peserta Didik</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <div id="preview-targetpesertadidik">
                    <!-- akan diisi secara dinamis -->
                </div>
            </td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Profil Lulusan</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <div id="preview-profilkelulusan"></div>
            </td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Kerangka Pembelajaran</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <div id="preview-kerangka">
                    <!-- Isi akan ditambahkan di sini -->
                </div>
            </td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Alokasi Waktu</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <div id="preview-alokasiwaktu">
                    <!-- akan diisi secara dinamis -->
                </div>
            </td>
        </tr>
    </tbody>
</table>

<H5 class="font-bold mt-4">C. KOMPONEN INTI</H5>
<table class="w-full border-collapse border border-black text-xs mb-2">
    <tbody>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top font-bold">Pemahaman Bermakna</td>
            <td class="border border-black p-1 align-top">
                <div id="preview-pemahamanbermakna">
                    <!-- akan diisi secara dinamis -->
                </div>
            </td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top font-bold">Pertanyaan Pemantik</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <ol id="preview-pertanyaanpemantik" style="margin-left:-20px;">
                    <!-- akan diisi <li> secara dinamis -->
                </ol>
            </td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top font-bold">Kegiatan Pembelajaran</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <div id="preview-kegiatanpembelajaran"></div>
            </td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top font-bold">Asesmen</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <div id="assesment"></div>
            </td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top font-bold">Refleksi Pendidik &amp; Peserta Didik</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <div id="refleksi-preview"></div>
            </td>
        </tr>
    </tbody>
</table>

<table class="mt-4">
    <tr>
        <td style="width:50px""></td>
        <td>
            Mengetahui<br>
            Kepala Sekolah
            <br>
            <br>
            <br>
            <br>
        <td>
        <td style="width:250px""></td>
        <td>
            Majalengka, <br>
            Guru Mata Pelajaran
            <br>
            <br>
            <br>
            <br>
        <td>
    </tr>
    <tr>
        <td style="width:50px""></td>
        <td>
            <div id="namaKepsek"></div>
            <div id="nipKepsek"></div>
        <td>
        <td style="width:250px""></td>
        <td>
            <div id="namaGuruMapel"></div>
            <div id="nipGuruMapel"></div>
        <td>
    </tr>
</table>
<br>
<br>
<h5 class="mt-4 font-bold">D. LAMPIRAN</h5>
<div class="mt-2">
    <p class="font-bold">Lampiran</p>
    <div class="pl-4">
        <p>- Lampiran 1: Asesmen Awal</p>
        <p>- Lampiran 2: Materi Ajar.".</p>
        <p>- Lampiran 3: Lembar Kerja Peserta Didik (LKPD).</p>
        <p>- Lampiran 4: Rubrik Penilaian Proyek "Kartu Nama Professional".</p>
    </div>
</div>
<div class="mt-4">
    <p class="font-bold">Glosarium</p>
    <p class="whitespace-pre-wrap pl-4">- </p>
</div>
<div class="mt-4">
    <p class="font-bold">Daftar Pustaka</p>
    <p class="whitespace-pre-wrap pl-4">- </p>
</div>
