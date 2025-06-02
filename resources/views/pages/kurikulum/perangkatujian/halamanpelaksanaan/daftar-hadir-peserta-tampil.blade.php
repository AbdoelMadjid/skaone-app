<img class="card-img-top img-fluid mb-0" src="{{ URL::asset('images/kossurat.jpg') }}" alt="Card image cap"><br><br>
<div style="text-align:center; font-size: 14px; font-weight: bold;">
    <H4><strong>DAFTAR HADIR DAN NILAI</strong></H4>
    <H4><strong>{{ strtoupper($ujianAktif?->nama_ujian ?? '-') }}</strong></H4>
    <H4><strong>TAHUN AJARAN
            {{ $ujianAktif?->tahun_ajaran ?? '-' }}</strong></H4>
</div>
<div style="width: 100%;font-size: 12px;margin-bottom: 10px; margin-top: 50px;">
    <div style="display: flex; margin-bottom: 12px;">
        <div style="width: 150px;">Mata Pelajaran</div>
        <div style="width: 10px;">:</div>
        <div>....................................................................</div>
    </div>
    <div style="display: flex; margin-bottom: 12px;">
        <div style="width: 150px;">KKTP</div>
        <div style="width: 10px;">:</div>
        <div>....................................................................</div>
    </div>
    <div style="display: flex; margin-bottom: 12px;">
        <div style="width: 150px;">Ruangan / Peserta</div>
        <div style="width: 10px;">:</div>
        <div>Ruang : {{ $pesertas->first()->nomor_ruang }} / {{ $pesertas->count() }} orang</div>
    </div>
    <div style="display: flex; margin-bottom: 14px;">
        <div style="width: 150px;">Kelas</div>
        <div style="width: 10px;">:</div>
        <div>{{ $pesertas->first()->rombel ?? '-' }}</div>
    </div>
</div>


<table cellpadding="2" cellspacing="0" class="table table-bordered" style="font-size: 12px;">
    <thead>
        <tr>
            <th colspan="3" class="text-center">Nomor</th>
            <th rowspan="2" class="text-center align-middle">Nama Siswa</th>
            <th rowspan="2" class="text-center align-middle">Kelas</th>
            <th rowspan="2" class="text-center align-middle">Nilai</th>
            <th rowspan="2" colspan="2" class="text-center align-middle">Paraf</th>
        </tr>
        <tr>
            <th class="text-center">Urut</th>
            <th class="text-center">Peserta</th>
            <th class="text-center">Induk</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pesertas->values() as $index => $peserta)
            @php
                $urut = $index + 1;
                $isOdd = $urut % 2 === 1;
            @endphp
            <tr>
                <td class="text-center">{{ $urut }}</td>
                <td class="text-center">{{ $peserta->nomor_peserta }}</td>
                <td>{{ $peserta->nis }}</td>
                <td style="text-align: left;padding-left:12px;">{{ $peserta->nama_lengkap }}</td>
                <td>{{ $peserta->rombel }}</td>
                <td width="75"></td> {{-- Kolom Nilai --}}
                @if ($isOdd)
                    <td rowspan="2" width="75" style="text-align: left;" valign="top">{{ $urut }}</td>
                    <td rowspan="2" width="75" style="text-align: left;" valign="top">{{ $urut + 1 }}</td>
                @endif
            </tr>
        @endforeach
        {{-- Tambahkan baris kosong jika jumlah peserta ganjil --}}
        @if ($pesertas->count() % 2 === 1)
            <tr>
                <td class="text-center">{{ $pesertas->count() + 1 }}</td>
                <td class="text-center"></td>
                <td></td>
                <td style="text-align: left;padding-left:12px;"></td>
                <td></td>
                <td width="75"></td> {{-- Kolom Nilai --}}
            </tr>
        @endif
    </tbody>
</table>
<table style="width: 100%; margin-top: 20px; font-size: 12px; border-collapse: collapse;border: none;">
    <tr>
        <!-- Kolom Kiri -->
        <td style="width: 40%; vertical-align: top; padding-right: 10px;text-align: justify;border: none;">
            <p style="font-weight: bold;">Catatan :</p>
            <ul style="margin: 0; padding-left: 18px;">
                <li>Nilai Puluhan (0 - 100)</li>
                <li>Daftar dibuat rangkap 2 (dua), satu eksemplar disetor ke bagian kurikulum</li>
            </ul>
        </td>
        <td style="width: 20%; vertical-align: top; padding-left: 10px;text-align: justify;border: none;">&nbsp;</td>
        <!-- Kolom Kanan -->
        <td style="width: 50%; vertical-align: top; padding-left: 10px;text-align: justify;border: none;">
            <p style="font-weight: bold;">Guru Mata Pelajaran</p>
            <br><br><br><br>
            <p>___________________________________</p>
            <p style="margin-top: -5px">NIP. </p>
        </td>
    </tr>
</table>
