<div class="row g-3">
    <div class="col-lg">

    </div>
    <!--end col-->
    <div class="col-lg-auto">
        <div class="mb-3 d-flex align-items-center gap-2">
            <select name="pilih_layout" id="layoutSelector" class="form-select w-auto">
                <option value="4x5">Layout 4 x 5</option>
                <option value="5x4">Layout 5 x 4</option>
            </select>
        </div>
    </div>
</div>

<div id="tabel-denah-ujian">
    <div id="cetak-denah" style='@page {size: A4;}'>
        <img class="card-img-top img-fluid mb-0" src="{{ URL::asset('images/kossurat.jpg') }}"
            alt="Card image cap"><br><br>
        <div style="text-align:center; font-size: 14px; font-weight: bold;">
            <H4 class="text-center">DENAH TEMPAT DUDUK</H4>
            <H4 class="text-center">{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</H4>
            <H4 class="text-center">TAHUN AJARAN
                {{ $identitasUjian?->tahun_ajaran ?? '-' }}</H4>
        </div>
        <br>
        <H4 style='font-size:24px;text-align:center;'>RUANG : <span id="text-ruang"></span></H4>

        <H4 style='font-size:14px;text-align:center;margin:20px;'>==== Papan Tulis ====</H4>

        <div id="denah-container"></div>
        <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td width="400">&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>Kadipaten,
                    {{ \Carbon\Carbon::parse($identitasUjian?->titimangsa_ujian)->translatedFormat('d F Y') ?? '-' }}
                </td>
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
</div>
