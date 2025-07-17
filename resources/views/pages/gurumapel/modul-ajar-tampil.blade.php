<h4 class='text-center'> MODUL AJAR </h4>
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
