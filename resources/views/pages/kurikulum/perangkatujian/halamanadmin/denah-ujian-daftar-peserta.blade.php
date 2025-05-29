<div id="cetak-daftar-peserta-ujian" style='@page {size: A4;}'>
    <img class="card-img-top img-fluid mb-0" src="{{ URL::asset('images/kossurat.jpg') }}" alt="Card image cap"><br><br>
    <div style="text-align:center; font-size: 14px; font-weight: bold;">
        <H4><strong>DAFTAR PESERTA UJIAN</strong></H4>
        <H4><strong>{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</strong></H4>
        <H4><strong>TAHUN AJARAN
                {{ $identitasUjian?->tahun_ajaran ?? '-' }}</strong></H4>
    </div>
    <br>
    <H4 style='font-size:24px;text-align:center;'>RUANG : <span id="text-ruang-peserta"></span></H4>

    <table cellpadding="2" cellspacing="0" class="table table-bordered" style="font-size: 12px;">
        <thead>
            <tr>
                <th rowspan="2">No.</th>
                <th colspan="3">Tempat Duduk Kiri</th>
                <th colspan="3">Tempat Duduk Kanan</th>
            </tr>
            <tr>
                <th>Nomor Peserta</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Nomor Peserta</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody id="daftar-siswa-ujian">
            <!-- Data akan diisi melalui JavaScript -->
        </tbody>
    </table>

    <table
        style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;border: none !important;'>
        <tr>
            <td width="400" style='border: none !important;'>&nbsp;</td>
            <td style='border: none !important;'>&nbsp;</td>
            <td style='border: none !important;'>&nbsp;</td>
        </tr>
        <tr>
            <td style='border: none !important;'>&nbsp;</td>
            <td style='border: none !important;'>&nbsp;</td>
            <td style='border: none !important;'>Kadipaten,
                {{ \Carbon\Carbon::parse($identitasUjian?->titimangsa_ujian)->translatedFormat('d F Y') ?? '-' }}
            </td>
        </tr>
        <tr>
            <td style='border: none !important;'>&nbsp;</td>
            <td style='border: none !important;'>&nbsp;</td>
            <td style='border: none !important;'>&nbsp;</td>
        </tr>
        <tr>
            <td style='border: none !important;'>&nbsp;</td>
            <td style='border: none !important;'>&nbsp;</td>
            <td style='border: none !important;'>PANITIA
                <br>{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}
            </td>
        </tr>
    </table>
</div>
