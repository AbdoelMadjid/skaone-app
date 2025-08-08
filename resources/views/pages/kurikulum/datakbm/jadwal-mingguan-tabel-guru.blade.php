<div class="text-center mt-lg-2 pt-3">
    <h1 class="fs-24 fw-semibold mb-1 lh-base">
        JADWAL MINGGUAN GURU <br>
        <span class="text-success">{{ $namaGuru }}</span>
    </h1>
    <p class="lead lh-base">
        TAHUN AJARAN {{ $tahunAjaran ?? '-' }} - SEMESTER {{ strtoupper($semester ?? '-') }}
    </p>
</div>

<table class="table table-bordered table-sm text-center align-middle">
    <thead class="table-light">
        <tr>
            <th>Jam ke</th>
            @foreach ($hariList as $hari)
                <th>{{ $hari }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($jamList as $jam => $waktu)
            @if ($jam == 6)
                <tr class="table-info">
                    <td><strong class='fs-24'>{{ $jam }}</strong><br><small>{{ $waktu }}</small></td>
                    <td colspan="{{ count($hariList) }}"><strong class="fs-24">Istirahat Pertama</strong></td>
                </tr>
            @elseif ($jam == 10)
                <tr class="table-info">
                    <td><strong class='fs-24'>{{ $jam }}</strong><br><small>{{ $waktu }}</small></td>
                    <td colspan="{{ count($hariList) }}"><strong class="fs-24">Istirahat, Sholat, Makan</strong></td>
                </tr>
            @else
                <tr>
                    <td style="width:100px;">
                        <strong class='fs-24'>{{ $jam }}</strong><br><small>{{ $waktu }}</small>
                    </td>
                    @foreach ($hariList as $hari)
                        @php
                            $cell = $grid[$jam][$hari] ?? null;
                            $isUpacara = $jam == 1 && $hari == 'Senin';
                            $isKegiatanInsidentil = $jam == 1 && $hari == 'Jumat';
                            $bgColor = $cell ? warnaDariId($cell['rombel'] ?? '-') : '';
                            $textColor = $cell ? kontrasTeks($bgColor) : '#000';
                        @endphp

                        <td class="cell-jadwal {{ $isUpacara || $isKegiatanInsidentil ? 'no-click' : '' }}"
                            data-jam="{{ $jam }}" data-hari="{{ $hari }}"
                            style="width:250px;
                                background-color: {{ $isUpacara || $isKegiatanInsidentil ? 'rgb(95,42,42)' : $bgColor }};
                                color: {{ $isUpacara || $isKegiatanInsidentil ? 'white' : $textColor }};
                                cursor:pointer;">
                            @if ($isUpacara)
                                <strong class="fs-12 fw-semibold">UPACARA BENDERA</strong>
                            @elseif ($isKegiatanInsidentil)
                                <strong class="fs-12 fw-semibold">KEGIATAN INSIDENTIL</strong>
                            @elseif ($cell)
                                <div class="fs-24 fw-semibold">{{ $cell['rombel'] }}</div>
                                <div class="fs-11">{{ $cell['mapel'] }}</div>
                            @else
                                <span class="text-muted">-</span>
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endif
        @endforeach
    </tbody>
</table>
