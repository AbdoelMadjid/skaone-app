<div id="print-remedial">
    <h4>FORMAT PERBAIKAN NILAI PESERTA DIDIK</h4>
    <p>Tahun Pelajaran: {{ $tahunajaran }}</p>
    <p>Semester: {{ $semester }}</p>
    <p>Nama Siswa: {{ $siswa->nama_lengkap }}</p>
    <p>NIS: {{ $siswa->nis }}</p>
    <p>Mata Pelajaran: {{ $mapel->mata_pelajaran }}</p>

    <div style="display: flex; gap: 30px;">
        <table>
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
                        <td>{{ $mapel->nilai_formatif_array[$i] ?? '' }}</td>
                        <td></td>
                    </tr>
                @endfor
                <tr>
                    <td>Rata-rata</td>
                    <td>{!! $mapel->rerata_formatif_label !!}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <table>
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
                    <td>{!! $mapel->nilai_sumatif_sts !!}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>SAS</td>
                    <td>{!! $mapel->nilai_sumatif_sas !!}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Rata-rata</td>
                    <td>{!! $mapel->rerata_sumatif_label !!}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>

    <br><br><br>
    <p>Kadipaten, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}</p>
    <p>Guru mata pelajaran</p>
    <br><br><br>
    <p>______________________________</p>
    <p>{{ $mapel->guru_nama }}</p>
</div>
