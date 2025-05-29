<table style='margin: 0 auto;width:100%;border-collapse:collapse;' class="judul-kartu">
    <tr>
        <td style='font-size:14px;text-align:center;'>
            <img class="card-img-top img-fluid mb-0" src="{{ URL::asset('images/kossurat.jpg') }}" width="350"
                alt="Card image cap">
        </td>
    </tr>
    <tr>
        <td style='font-size:14px;text-align:center;'>
            <strong>KARTU PESERTA</strong><br>
            <strong>{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</strong><br>
            <strong>TAHUN AJARAN
                {{ $identitasUjian?->tahun_ajaran ?? '-' }}</strong>
        </td>
    </tr>
</table>
<br>
<div style="width: 85%;font-size: 12px;margin-left:60px;margin-bottom: 10px;">
    <div style="display: flex; margin-bottom: 2px;">
        <div style="width: 80px;">No. Peserta</div>
        <div style="width: 10px;">:</div>
        <div>{{ $peserta->nomor_peserta }}</div>
    </div>
    <div style="display: flex; margin-bottom: 2px;">
        <div style="width: 80px;">NIS/NISN</div>
        <div style="width: 10px;">:</div>
        <div>{{ $peserta->nis }} / {{ $peserta->nisn }}</div>
    </div>
    <div style="display: flex; margin-bottom: 2px;">
        <div style="width: 80px;">Nama</div>
        <div style="width: 10px;">:</div>
        <div>{{ $peserta->nama_lengkap }}</div>
    </div>
    <div style="display: flex; margin-bottom: 2px;">
        <div style="width: 80px;">Kelas</div>
        <div style="width: 10px;">:</div>
        <div>{{ $peserta->rombel }}</div>
    </div>
    <div style="display: flex;">
        <div style="width: 80px;">Ruangan</div>
        <div style="width: 10px;">:</div>
        <div>{{ $peserta->nomor_ruang }}</div>
    </div>
</div>
<div style="display: flex; width: 100%; font-size: 12px; margin-bottom: 0;">
    <!-- Kolom kiri -->
    <div style="width: 20px;">&nbsp;</div>
    <div style="width: 100px; display: flex; align-items: flex-start; justify-content: center;">
        <div
            style="border: 1px solid #848282; border-radius: 4px; padding: 6px 4px; margin-top:30px;font-style: italic;">
            <strong>Kartu ini harap dibawa saat ujian</strong>
        </div>
    </div>
    <div style="width: 85px;">&nbsp;</div>

    <!-- Kolom kanan -->
    <div style="flex: 1; position: relative;">
        Kadipaten,
        {{ \Carbon\Carbon::parse($identitasUjian?->titimangsa_ujian)->translatedFormat('d F Y') ?? '-' }}<br>
        Kepala Sekolah,
        <!-- Tanda tangan -->
        <div style="position: relative; margin-top: 5px;">
            <img src="{{ URL::asset('images/damudin.png') }}" alt="Tanda tangan" height="80" width="180"
                style="position: absolute; bottom: 5px; left: -80px;">
            <img src="{{ URL::asset('images/stempel.png') }}" alt="Stempel" height="80" width="80"
                style="position: absolute; bottom: 5px; left: -40px;">
            <p style="height:20px;">&nbsp;</p>
            <strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>
            NIP. 19740302 199803 1 002
        </div>
    </div>
</div>
