<img class="card-img-top img-fluid mb-0" src="{{ URL::asset('images/kossurat.jpg') }}" alt="Card image cap"><br><br>
<div style="text-align:center; font-size: 18px; font-weight: bold;margin-bottom: 20px;">
    <h4 class="text-center">JADWAL UJIAN TINGKAT {{ $tingkat }}</h4>
    <h4 class="text-center">{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</h4>
    <h4 class="text-center">TAHUN AJARAN {{ $identitasUjian?->tahun_ajaran ?? '-' }}</h4>
</div>
<table class="table table-bordered" style="font-size: 12px;" width="100%">
    <thead>
        <tr>
            <th rowspan="2" class="text-center align-middle">NO</th>
            <th rowspan="2" class="text-center align-middle">HARI / TANGGAL</th>
            <th rowspan="2" class="text-center align-middle">JAM KE-</th>
            <th rowspan="2" class="text-center align-middle">PUKUL</th>
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
                        <td rowspan="{{ $rowspan }}" style="text-align: center">{{ $no++ }}</td>
                        <td rowspan="{{ $rowspan }}" width="100" style="text-align: center">
                            {{ strtoupper($hari) }}<br>{{ $tgl_indo }}</td>
                        @php $printed = true; @endphp
                    @endif
                    <td style="text-align: center">{{ $jamKe }}</td>
                    <td width="100" style="text-align: center">{{ $jadwalPerJam['pukul'] ?? '-' }}</td>
                    @foreach ($kodeKKList as $kk)
                        <td style="padding:5px;">{{ $jadwalPerJam[$kk] ?? '-' }}</td>
                    @endforeach
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>
@include('pages.kurikulum.perangkatujian.halamanadmin.tanda-tangan', ['identitasUjian' => $identitasUjian])
