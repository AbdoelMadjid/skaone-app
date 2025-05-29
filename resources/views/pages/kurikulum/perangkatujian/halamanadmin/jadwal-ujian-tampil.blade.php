<img class="card-img-top img-fluid mb-0" src="{{ URL::asset('images/kossurat.jpg') }}" alt="Card image cap"><br><br>
<div style="text-align:center; font-size: 14px; font-weight: bold;">
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
<table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;border: none !important;'>
    <tr>
        <td width='25' style='border: none !important;'>&nbsp;</td>
        <td style='border: none !important;'>
            <p style='margin-bottom:-2px;margin-top:-2px'>&nbsp;</p>
            <table
                style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;border: none !important;'>
                <tr style='border: none !important;'>
                    <td width='50' style='border: none !important;'></td>
                    <td style='border: none !important;'></td>
                    <td style='border: none !important;'>
                        Mengetahui<br>
                        Kepala Sekolah,
                        <div>
                            <img src='{{ URL::asset('images/damudin.png') }}' border='0' height='110'
                                style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -160px;margin-top:-15px;'>
                        </div>
                        {{-- <div><img src='{{ URL::asset('images/stempel.png') }}' border='0' height='180'
                                            width='184'
                                            style=' position: absolute; padding: 0px 2px 15px -650px; margin-left: -135px;margin-top:-50px;'>
                                    </div> --}}
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>
                        NIP. 19740302 199803 1 002
                    </td>
                    <td style='border: none !important;' width='200'></td>
                    <td style='padding:4px 8px;border: none !important;'>
                        Majalengka,
                        {{ \Carbon\Carbon::parse($identitasUjian?->titimangsa_ujian)->translatedFormat('d F Y') ?? '-' }}<br>
                        Ketua Panitia,
                        {{-- <div>
                                <img src='{{ URL::asset('images/almadjid.png') }}' border='0' height='110'
                                    style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -80px;margin-top:-15px;'>
                            </div> --}}

                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <strong>ABDUL MADJID, S.Pd., M.Pd.</strong><br>
                        NIP. 19761128 200012 1 002
                    </td>
                </tr>
            </table>
        </td>
        <td width='25' style='border: none !important;'>&nbsp;</td>
    </tr>
</table>
