<div id="tabel-daftar-hadir" class="mb-3">
    <div style="text-align:center; font-size: 14px; font-weight: bold;">
        <h4><strong>DAFTAR HADIR BELAJAR PESERTA DIDIK</strong></h4>
        <h4><strong>SEMESTER {{ strtoupper($semester->semester) }}</strong></h4>
        <h4><strong>TAHUN AJARAN {{ $filters['tahun_ajaran'] ?? '-' }}</strong></h4>
    </div>
    <div style="display: flex; justify-content: space-between; font-size: 12px; margin-bottom: 10px; margin-top: 20px;">
        <!-- Kolom Kiri -->
        <div style="width: 48%;">
            <div style="display: flex; margin-bottom: 6px;">
                <div style="width: 150px;">Satuan Pendidikan</div>
                <div style="width: 10px;">:</div>
                <div>SMK Negeri 1 Kadipaten</div>
            </div>
            <div style="display: flex; margin-bottom: 6px;">
                <div style="width: 150px;">Konsentrasi Keahlian</div>
                <div style="width: 10px;">:</div>
                <div>{{ $kompetensiKeahlianOptions[$filters['kode_kk']] ?? '-' }}</div>
            </div>
            <div style="display: flex; margin-bottom: 6px;">
                <div style="width: 150px;">Alamat</div>
                <div style="width: 10px;">:</div>
                <div>Jalan Siliwangi No. 30 Kadipaten - Majalengka</div>
            </div>
        </div>

        <!-- Kolom Kanan -->
        <div style="width: 48%;">
            <div style="display: flex; margin-bottom: 6px;">
                <div style="width: 150px;">Mata Pelajaran</div>
                <div style="width: 10px;">:</div>
                <div></div>
            </div>
            <div style="display: flex; margin-bottom: 6px;">
                <div style="width: 150px;">Durasi</div>
                <div style="width: 10px;">:</div>
                <div></div>
            </div>
            <div style="display: flex; margin-bottom: 6px;">
                <div style="width: 150px;">Kelas</div>
                <div style="width: 10px;">:</div>
                <div>{{ $rombonganBelajarOptions[$filters['rombel_kode']] ?? '-' }}</div>
            </div>
        </div>
    </div>

    <table cellpadding="2" cellspacing="0" class="table table-bordered" style="font-size: 11px;">
        <thead>
            <tr class="text-center" style="background-color: #e0e0e0;">
                <th rowspan="2">No.</th>
                <th rowspan="2">Induk</th>
                <th rowspan="2">Nama Siswa</th>
                <th rowspan="2">L/P</th>
                <th colspan="25">Tanggal Tatap Muka</th>
                <th colspan="4">Prosentase Kehadiran</th>
                <th rowspan="2">Ket.</th>
            </tr>
            <tr class="text-center" style="background-color: #e0e0e0;">
                @for ($i = 1; $i <= 25; $i++)
                    <th style="width:15px;">&nbsp;</th>
                @endfor
                <th>S</th>
                <th>I</th>
                <th>A</th>
                <th>Jml</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($pesertaDidikRombels as $index => $siswa)
                <tr>
                    <td class="text-center" style="height: 22px;">{{ $index + 1 }}</td>
                    <td class="text-center" style="height: 22px;">{{ $siswa->nis }}</td>
                    <td style="height: 22px;padding-left:10px;">
                        {{ \Illuminate\Support\Str::title($siswa->pesertaDidik->nama_lengkap ?? '-') }}</td>
                    <td class="text-center" style="height: 22px;">
                        {{ $siswa->pesertaDidik->jenis_kelamin == 'Laki-laki' ? 'L' : 'P' }}
                    </td>
                    @for ($j = 1; $j <= 25; $j++)
                        <td style="height: 22px;"></td>
                    @endfor
                    <td style="height: 22px;"></td>
                    <td style="height: 22px;"></td>
                    <td style="height: 22px;"></td>
                    <td style="height: 22px;"></td>
                    <td style="height: 22px;"></td>
                </tr>
            @endforeach
            <tr style="background-color: #e0e0e0;">
                <td colspan="4" class="text-center" style="height: 22px;">JUMLAH</td>
                @for ($j = 1; $j <= 25; $j++)
                    <td style="height: 22px;"></td>
                @endfor
                <td style="height: 22px;"></td>
                <td style="height: 22px;"></td>
                <td style="height: 22px;"></td>
                <td style="height: 22px;"></td>
                <td style="height: 22px;"></td>
            </tr>
        </tbody>
    </table>
    <div style="display: flex; justify-content: space-between; margin: 40px 60px 0 60px; font-size: 12px;">
        <!-- Kolom kiri -->
        <div style="text-align: left;">
            <p style="margin-bottom: 60px;">
                Mengetahui<br>
                Kepala Sekolah,
            </p>
            <strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>
            Pembina Utama Muda<br>
            NIP: 19740302 199803 1 002
        </div>

        <!-- Kolom kanan -->
        <div style="text-align: left;">
            <p style="margin-bottom: 60px;">
                Kadipaten, ......................................<br>
                Guru/Instruktur Mata Pelajaran,
            </p>
            <div style="border-bottom: 1px dotted black; width: 220px; margin-bottom: 2px;"></div>
            NIP:
        </div>
    </div>
</div>
