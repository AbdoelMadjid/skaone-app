<div id="print-remedial">
    <div style="font-family: Arial; font-size: 14px;">
        <h3 style="text-align: center;">FORMAT PERBAIKAN NILAI PESERTA DIDIK</h3>

        <table style="width: 100%; margin-bottom: 20px;">
            <tr>
                <td style="width: 20%;">Tahun Pelajaran</td>
                <td>: {{ $mapel->tahunajaran }}</td>
            </tr>
            <tr>
                <td>Semester</td>
                <td>: {{ $mapel->ganjilgenap }}</td>
            </tr>
            <tr>
                <td>Nama Siswa</td>
                <td>: {{ $siswa->nama_lengkap }}</td>
            </tr>
            <tr>
                <td>NIS</td>
                <td>: {{ $siswa->nis }}</td>
            </tr>
            <tr>
                <td>Mata Pelajaran</td>
                <td>: {{ $mapel->mata_pelajaran }}</td>
            </tr>
        </table>

        <div style="display: flex; justify-content: space-between;">
            <!-- Tabel Nilai Formatif -->
            <table border="1" cellspacing="0" cellpadding="5" style="width: 48%;">
                <thead>
                    <tr>
                        <th>TP</th>
                        <th>Nilai</th>
                        <th>Perbaikan</th>
                    </tr>
                </thead>
                <tbody>
                    @for ($i = 1; $i <= $mapel->jumlah_tp; $i++)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>
                                {{ $nilaiFormatif["tp_nilai_{$i}"] ?? '-' }}
                            </td>
                            <td></td>
                        </tr>
                    @endfor
                    <tr>
                        <td colspan="1"><strong>Rata-Rata</strong></td>
                        <td>{{ $mapel->rerata_formatif ?? '-' }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <!-- Tabel Nilai Sumatif -->
            <table border="1" cellspacing="0" cellpadding="5" style="width: 48%;">
                <thead>
                    <tr>
                        <th>Jenis</th>
                        <th>Nilai</th>
                        <th>Perbaikan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>STS</td>
                        <td>{{ $nilaiSumatif->sts ?? '-' }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>SAS</td>
                        <td>{{ $nilaiSumatif->sas ?? '-' }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td><strong>Rata-rata</strong></td>
                        <td>{{ $mapel->rerata_sumatif ?? '-' }}</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Nilai Akhir -->
        <br><br>
        <table style="width: 30%;">
            <tr>
                <td><strong>Nilai Akhir</strong></td>
                <td>: {{ $mapel->nilai_akhir ?? '-' }}</td>
            </tr>
        </table>

        <!-- TTD -->
        <div style="margin-top: 40px; width: 100%; display: flex; justify-content: space-between;">
            <div>
                <p>Validator dan Input</p>
                <br><br>
                <p>____________________</p>
            </div>
            <div style="text-align: right;">
                <p>Kadipaten, hari ini</p>
                <p>Guru mata Pelajaran</p>
                <br><br>
                <p>____________________</p>
                <p>namamapel</p>
                <p>NIP. -</p>
            </div>
        </div>
    </div>
</div>
