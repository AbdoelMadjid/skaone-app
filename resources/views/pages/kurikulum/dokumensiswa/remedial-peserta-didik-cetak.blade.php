<div id='nyetak-format-remedial' style='@page {size: A4;}'>
    <div style="font:12px Times New Roman;">
        <h3 style="text-align: center;">FORMAT PERBAIKAN NILAI PESERTA DIDIK</h3>
        <table
            style="width: 100%; margin-bottom: 20px;border-collapse: collapse; border: none !important;font:12px Times New Roman;">
            <tr>
                <td style="width: 20%;border: none !important;text-align:left;">Tahun Pelajaran</td>
                <td style="border: none !important;text-align:left;">: {{ $mapel->tahunajaran }}</td>
            </tr>
            <tr>
                <td style="border: none !important;text-align:left;">Semester</td>
                <td style="border: none !important;text-align:left;">: {{ $mapel->ganjilgenap }}</td>
            </tr>
            <tr>
                <td style="border: none !important;text-align:left;">Kelas</td>
                <td style="border: none !important;text-align:left;">: {{ $mapel->rombel }}</td>
            </tr>
            <tr>
                <td style="border: none !important;text-align:left;">Nama Siswa</td>
                <td style="border: none !important;text-align:left;">: {{ $siswa->nama_lengkap }}</td>
            </tr>
            <tr>
                <td style="border: none !important;text-align:left;">NIS</td>
                <td style="border: none !important;text-align:left;">: {{ $siswa->nis }}</td>
            </tr>
            <tr>
                <td style="border: none !important;text-align:left;">Mata Pelajaran</td>
                <td style="border: none !important;text-align:left;">: {{ $mapel->mata_pelajaran }}</td>
            </tr>
        </table>

    </div>
    <div style="display: flex; justify-content: space-between;">
        <!-- Tabel Nilai Formatif -->
        <table border="1" cellspacing="0" cellpadding="5"
            style="width: 48%; border-collapse: collapse; border: 1px solid #000000;font:12px Times New Roman;">
            <thead>
                <tr>
                    <th style="text-align:center;border: 1px solid #000000;">TP</th>
                    <th style="text-align:center;border: 1px solid #000000;">Nilai</th>
                    <th style="text-align:center;border: 1px solid #000000;">Perbaikan</th>
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= $mapel->jumlah_tp; $i++)
                    @php
                        $nilai = $nilaiFormatif["tp_nilai_{$i}"] ?? null;
                        $isKurang = $nilai !== null && $nilai < $mapel->kkm;
                    @endphp
                    <tr>
                        <td style="text-align:center;border: 1px solid #000000;">{{ $i }}</td>
                        <td style="text-align:center;border: 1px solid #000000;{{ $isKurang ? 'color:red;' : '' }}">
                            {{ $nilai ?? '-' }}
                        </td>
                        <td style="text-align:center;border: 1px solid #000000;"></td>
                    </tr>
                @endfor
                @php
                    $rataFormatif = $mapel->rerata_formatif;
                    $isKurangRata = is_numeric($rataFormatif) && $rataFormatif < $mapel->kkm;
                @endphp
                <tr>
                    <td style="text-align:center;border: 1px solid #000000;"><strong>Rata-Rata</strong></td>
                    <td style="text-align:center;border: 1px solid #000000; {{ $isKurangRata ? 'color:red;' : '' }}">
                        {{ $rataFormatif ?? '-' }}</td>
                    <td style="text-align:center;border: 1px solid #000000;"></td>
                </tr>
            </tbody>
        </table>


        <!-- Tabel Nilai Sumatif -->
        <table border="1" cellspacing="0" cellpadding="5"
            style="width: 48%; border-collapse: collapse; border: 1px solid #000000;font:12px Times New Roman;">
            <thead>
                <tr>
                    <th style="text-align:center;border: 1px solid #000000;">Jenis</th>
                    <th style="text-align:center;border: 1px solid #000000;">Nilai</th>
                    <th style="text-align:center;border: 1px solid #000000;">Perbaikan</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $sts = $nilaiSumatif->sts ?? null;
                    $sas = $nilaiSumatif->sas ?? null;
                @endphp
                <tr>
                    <td style="text-align:center;border: 1px solid #000000;">STS</td>
                    <td
                        style="text-align:center;border: 1px solid #000000; {{ $sts !== null && $sts < $mapel->kkm ? 'color:red;' : '' }}">
                        {{ $sts ?? '-' }}</td>
                    <td style="text-align:center;border: 1px solid #000000;"></td>
                </tr>
                <tr>
                    <td style="text-align:center;border: 1px solid #000000;">SAS</td>
                    <td
                        style="text-align:center;border: 1px solid #000000; {{ $sas !== null && $sas < $mapel->kkm ? 'color:red;' : '' }}">
                        {{ $sas ?? '-' }}</td>
                    <td style="text-align:center;border: 1px solid #000000;"></td>
                </tr>
                @php
                    $rataSumatif = $mapel->rerata_sumatif;
                    $isKurangSumatif = is_numeric($rataSumatif) && $rataSumatif < $mapel->kkm;
                @endphp
                <tr>
                    <td style="text-align:center;border: 1px solid #000000;"><strong>Rata-rata</strong></td>
                    <td
                        style="text-align:center;border: 1px solid #000000;; {{ $isKurangSumatif ? 'color:red;' : '' }}">
                        {{ $rataSumatif ?? '-' }}</td>
                    <td style="text-align:center;border: 1px solid #000000;"></td>
                </tr>
            </tbody>
        </table>
    </div>
    <br><br>
    <table style="width: 40%;border: none !important;font:12px Times New Roman;">
        @php
            $nilaiAkhir = $mapel->nilai_akhir;
            $isKurangAkhir = is_numeric($nilaiAkhir) && $nilaiAkhir < $mapel->kkm;
        @endphp
        <tr>
            <td width="50%" style="border: none !important;text-align:left;"><strong>Nilai Akhir</strong></td>
            <td style="border: none !important;text-align:left; {{ $isKurangAkhir ? 'color:red;' : '' }}">
                : {{ $nilaiAkhir ?? '-' }} ({{ terbilang($nilaiAkhir) }})</td>
        </tr>
    </table>
    <br>
    <br>
    <div style="display: flex; justify-content: space-between;">
        <table style="width: 45%; line-height: 1.2;border: none !important;font:12px Times New Roman;">
            <tr>
                <td style="border: none !important;text-align:left;line-height: 1.2;">
                    <br>
                    Verifikator dan Input
                </td>
            </tr>
            <tr>
                <td style="border: none !important;text-align:left;"><br><br><br><br>
                    __________________________________<br>
                    NIP.
                </td>
            </tr>
        </table>

        <table style="width: 45%; line-height: 1.2;border: none !important;font:12px Times New Roman;">
            <tr>
                <td style="border: none !important;text-align:left;line-height: 1.2;">Kadipaten,
                    {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                    Guru Mata Pelajaran,
                </td>
            </tr>
            <tr>
                <td style="border: none !important;text-align:left;"><br><br><br><br>
                    <strong>{{ $mapel->personil_info }}</strong>
                    <br>NIP. {{ $datapersonil->nip ?? '-' }}
                </td>
            </tr>
        </table>
    </div>
</div>
