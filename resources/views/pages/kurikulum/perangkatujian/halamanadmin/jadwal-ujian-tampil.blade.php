<h4 class="text-center">JADWAL UJIAN TINGKAT {{ $tingkat }}</h4>
<h4 class="text-center">{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</h4>
<h4 class="text-center">TAHUN AJARAN {{ $identitasUjian?->tahun_ajaran ?? '-' }}</h4>
<table class="table table-bordered">
    <thead>
        <tr>
            <th rowspan="2">NO</th>
            <th rowspan="2">HARI / TANGGAL</th>
            <th rowspan="2">JAM KE-</th>
            <th rowspan="2">PUKUL</th>
            <th colspan="{{ count($kodeKKList) }}">KELAS {{ $tingkat }}</th>
        </tr>
        <tr>
            @foreach ($kodeKKList as $kk)
                <th>{{ $singkatanKK[$kk] ?? $kk }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @php $no = 1; @endphp
        @foreach ($jadwalByTanggal as $tanggal => $jamList)
            @php
                $hari = \Carbon\Carbon::parse($tanggal)->translatedFormat('l');
                $tgl_indo = \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y');
                $rowspan = count($jamList);
                $printed = false;
            @endphp
            @foreach ($jamList as $jamKe => $jadwalPerJam)
                <tr>
                    @if (!$printed)
                        <td rowspan="{{ $rowspan }}" class="text-center">{{ $no++ }}</td>
                        <td rowspan="{{ $rowspan }}" width="100" class="text-center">
                            {{ strtoupper($hari) }}<br>{{ $tgl_indo }}</td>
                        @php $printed = true; @endphp
                    @endif
                    <td class="text-center">{{ $jamKe }}</td>
                    <td width="100">{{ $jadwalPerJam['pukul'] ?? '-' }}</td>
                    @foreach ($kodeKKList as $kk)
                        <td>{{ $jadwalPerJam[$kk] ?? '-' }}</td>
                    @endforeach
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
