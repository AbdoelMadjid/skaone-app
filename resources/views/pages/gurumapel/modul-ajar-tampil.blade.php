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
<p class="font-bold mt-8">B. KERANGKA DAN TUJUAN PEMBELAJARAN</p>
<table class="w-full border-collapse border border-black text-xs mt-1">
    <tbody>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Elemen</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <div>1. Menyimak</div>
            </td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Capaian Pembelajaran Elemen</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <div>1. Peserta didik dapat menemukan informasi umum dan terperinci dari teks lisan sederhana tentang
                    perkenalan diri sendiri dan seseorang serta menceritakan kehidupan sehari-hari dan lingkungan
                    sekitar.</div>
            </td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Tujuan Pembelajaran (TP)</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">1. Menemukan Informasi Umum dari teks
                lisan sederhana tentang perkenalan diri sendiri</td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Kriteria Ketercapaian (KKTP)</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">Untuk TP 1:
                - Memahami informasi umum yang didengar secara utuh meliputi kosakata, tata bahasa dan sosiokultural
                terkait tindak tutur perkenalan diri sendiri dalam bahasa Prancis.
                - Memberikan apresiasi dan tanggapan kepada lawan bicara dengan kosakata, tata bahasa dan sosiokultural
                terkait tindak tutur perkenalan diri sendiri dalam bahasa Prancis.</td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Kompetensi Awal</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">Peserta didik telah memahami
                .................................................</td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Target Peserta Didik</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">Peserta didik reguler dengan tingkat
                pemahaman yang beragam (akan didiferensiasi).</td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Profil Lulusan</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <div><b>Keimanan dan Ketakwaan:</b> </div>
            </td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Kerangka Pembelajaran</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                <div><b>Praktik Pedagogis:</b> Penerapan strategi pembelajaran Berbasis Inkuiri (Inquiry-Based Learning)
                    untuk mendorong murid bertanya, mencari solusi, dan membangun pengetahuan mereka sendiri.</div>
            </td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top">Alokasi Waktu</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">4 JP x @45 menit (180 menit)</td>
        </tr>
    </tbody>
</table>

<p class="font-bold mt-4">C. KOMPONEN INTI</p>
<table class="w-full border-collapse border border-black text-xs mb-2">
    <tbody>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top font-bold">Pemahaman Bermakna</td>
            <td class="border border-black p-1 align-top">"Belajar bahasa Prancis bertujuan untuk memiliki keterampilan
                komunikasi, bukan semata untuk mengetahui "tentang Bahasa Prancis" dan tindak tutur perkenalan merupakan
                langkah awal dari keterampilan dasar berkomunikasi. Dengan posisi Bahasa Prancis sebagai bahasa yang
                digunakan sebagai bahasa resmi di 29 negara, bahasa resmi PBB, dan bahasa resmi Uni Eropa, maka
                penguasaan keterampilan komunikasi dengan Bahasa Prancis akan meningkatkan peluang karir, bisnis, serta
                meningkatkan daya saing global karena membuka kesempatan berkomunikasi dengan lebih banyak orang dan
                terhubung dengan berbagai budaya."</td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top font-bold">Pertanyaan Pemantik</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">1. Kosakata Bahasa Prancis Apakah yang
                sudah pernah kalian dengar dan ketahui
                2. Menurut kalian, negara apa sajakah yang menggunakan Bahas Prancis sebagai Bahasa Resmi Negaranya?
                Totalnya ada berapa negara?
                3. Adakah yang sudah tahu bagaimana menyapa dan memperkenalkan diri dalam bahasa Prancis?</td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top font-bold">Kegiatan Pembelajaran</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">Pertemuan 1
                Pembukaan (10 menit):
                Deskripsikan aktivitas pembukaan.
                Asesmen Awal (15 menit):
                Deskripsi aktivitas asesmen awal.
                Kegiatan Inti (50 menit):
                Deskripsi aktivitas kegiatan inti (untuk pendekatan pembelajaran mendalam gunakan siklus "Memahami",
                "Mengaplikasi", dan "Merefleksi". Jika tujuan pembelajaran direncanakan tuntas dalam satu pertemuan,
                maka siklus harus tercerminkan secara lengkap dalam kegiatan inti. Jika tujuan pembelajaran direncanakan
                tuntas dalam beberapa pertemuan, maka siklus dapat tercerminkan secara lengkap dalam rangkaian berberapa
                pertemuan).
                Penutup (15 menit):
                Deskripsikan aktivitas penutup. Jika ada beberapa pertemuan untuk mencapai tujuan pembelajaran, klik
                tambah pertemuan.</td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top font-bold">Asesmen</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                Asesmen Formatif:
                Asesmen Awal: Kuis/peta konsep (lampiran 1).
                Selama Proses: Observasi keaktifan diskusi (lembar observasi), penilaian proposal rencana investigasi
                (rubrik sederhana).

                Asesmen Sumatif:
                Penilaian produk akhir (poster, video, atau presentasi) menggunakan rubrik penilaian proyek (lampiran
                2). Rubrik mencakup kriteria ketercapaian tujuan pembelajaran sesuai capaian dan profil lulusan yang
                diharapkan</td>
        </tr>
        <tr>
            <td class="border border-black p-1 w-1/3 align-top font-bold">Refleksi Pendidik &amp; Peserta Didik</td>
            <td class="border border-black p-1 align-top whitespace-pre-wrap">
                Untuk Pendidik:
                - Apakah kegiatan pembelajaran berhasil menumbuhkan penalaran kritis dan kepedulian siswa?
                - Apakah diferensiasi yang dilakukan efektif menjawab kebutuhan belajar yang beragam?

                Untuk Peserta Didik:
                - Apa pemahaman baru yang paling berkesan bagi saya tentang berkenalan dengan Bahasa Prancis?
                - Apa tantangan terbesar yang saya hadapi saat bekerja dalam kelompok?</td>
        </tr>
    </tbody>
</table>

<div class="mt-24 flex justify-between">
    <div class="w-2/5">
        <p>Mengetahui</p>
        <p>Kepala Sekolah</p>
        <div class="h-16"></div>
        <p class="font-bold"><span class="text-red-500 font-bold"> *</span></p>
        <p>NIP. <span class="text-red-500 font-bold"> *</span></p>
    </div>
    <div class="w-2/5 text-left">
        <p>Bandung, 18 Juli 2025</p>
        <p>Nama Guru,</p>
        <div class="h-16"></div>
        <p class="font-bold"><span class="text-red-500 font-bold"> *</span></p>
        <p>NIP. <span class="text-red-500 font-bold"> *</span></p>
    </div>
</div>

<p class="font-bold mt-8">D. LAMPIRAN</p>
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
