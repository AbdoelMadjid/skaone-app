<h4>Pilih Ruangan & Posisi Kelas</h4>
<div class="row mb-3">
    <div class="col-md-3">
        <label>Nomor Ruang</label>
        <select id="nomorRuang" class="form-control">
            @foreach ($ruangs as $ruang)
                <option value="{{ $ruang }}">{{ $ruang }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3">
        <label>Layout Posisi Kelas</label>
        <select id="layout" class="form-control">
            <option value="4x5">4 Kolom x 5 Baris</option>
            <option value="5x4">5 Kolom x 4 Baris</option>
        </select>
    </div>
    <div class="col-md-3 align-self-end">
        <button class="btn btn-primary" onclick="loadDenah()">Tampilkan Denah</button>
        <button class="btn btn-primary" onclick="cetakDenah()">Cetak</button>
    </div>
</div>

<div id="cetak-denah" style='@page {size: A4;}'>
    <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
        <tr>
            <td align='center'><img src="{{ URL::asset('images/kossurat.jpg') }}" alt="" height="154"
                    width="700" border="0"></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style='font-size:18px;text-align:center;'><strong>DENAH TEMPAT DUDUK</strong>
            </td>
        </tr>
        <tr>
            <td style='font-size:18px;text-align:center;'>
                <strong>{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</strong>
            </td>
        </tr>
        <tr>
            <td style='font-size:18px;text-align:center;'>
                <strong>TAHUN AJARAN {{ $identitasUjian?->tahun_ajaran ?? '-' }}</strong>
            </td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style='font-size:24px;text-align:center;'>RUANG : <span id="text-ruang"></span></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td style='font-size:14px;text-align:center;'>PAPAN TULIS</td>
        </tr>
    </table>

    <div id="denah-container" class="mt-4"></div>

    <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
        <tr>
            <td width="475">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>Kadipaten,
                {{ \Carbon\Carbon::parse($identitasUjian?->titimangsa_ujian)->translatedFormat('d F Y') ?? '-' }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>PANITIA <br>{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</td>
        </tr>
    </table>
</div>
