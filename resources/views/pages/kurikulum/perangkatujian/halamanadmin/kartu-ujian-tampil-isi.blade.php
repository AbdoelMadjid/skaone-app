<table style='margin: 0 auto;width:100%;border-collapse:collapse;'>
    <tr>
        <td style='font-size:14px;text-align:center;'>
            <img class="card-img-top img-fluid mb-0" src="{{ URL::asset('images/kossurat.jpg') }}" alt="Card image cap">
        </td>
    </tr>
    <tr>
        <td style='font-size:14px;text-align:center;'><strong>KARTU PESERTA</strong></td>
    </tr>
    <tr>
        <td style='font-size:12px;text-align:center;'>
            <strong>{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</strong>
        </td>
    </tr>
    <tr>
        <td style='font-size:12px;text-align:center;'><strong>TAHUN AJARAN
                {{ $identitasUjian?->tahun_ajaran ?? '-' }}</strong></td>
    </tr>
</table>

<table style='margin: 0 auto;width:85%;border-collapse:collapse; margin-top:10px;'>
    <tr>
        <td style='font-size:12px;' width="80">No. Peserta</td>
        <td style='font-size:12px;'>:</td>
        <td style='font-size:12px;'>{{ $peserta->nomor_peserta }}</td>
    </tr>
    <tr>
        <td style='font-size:12px;'>NIS/NISN</td>
        <td style='font-size:12px;'>:</td>
        <td style='font-size:12px;'>{{ $peserta->nis }} / {{ $peserta->nisn }}</td>
    </tr>
    <tr>
        <td style='font-size:12px;'>Nama</td>
        <td style='font-size:12px;'>:</td>
        <td style='font-size:12px;'>{{ $peserta->nama_lengkap }}</td>
    </tr>
    <tr>
        <td style='font-size:12px;'>Kelas</td>
        <td style='font-size:12px;'>:</td>
        <td style='font-size:12px;'>{{ $peserta->rombel }}</td>
    </tr>
    <tr>
        <td style='font-size:12px;'>Ruangan</td>
        <td style='font-size:12px;'>:</td>
        <td style='font-size:12px;'>{{ $peserta->nomor_ruang }}</td>
    </tr>
</table>

<table style='margin: 0 auto;width:100%;border-collapse:collapse;font-size:12px;'>
    <tr>
        <td width="10">&nbsp;</td>
        <td width="65" style="padding: 4px;"">
            Kartu ini harap di bawa saat ujian</td>
        <td width='75'>&nbsp;</td>
        <td style='padding:4px 8px;width:50%;'>
            Majalengka,
            {{ \Carbon\Carbon::parse($identitasUjian?->titimangsa_ujian)->translatedFormat('d F Y') ?? '-' }}<br>
            Kepala Sekolah,
            <div>
                <img src='{{ URL::asset('images/damudin.png') }}' border='0' height='80' width="180"
                    style=' position: absolute; margin-left: -70px;margin-top:-15px;'>
            </div>
            <div>
                <img src='{{ URL::asset('images/stempel.png') }}' border='0' height='80' width='80'
                    style=' position: absolute; margin-left: -55px;margin-top:-20px;'>
            </div>
            <p>&nbsp;</p>
            <strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>
            NIP. 19740302 199803 1 002
        </td>
    </tr>
</table>
