<div class="text-center mt-lg-2 pt-3">
    <h1 class="fs-24 fw-semibold mb-1 lh-base">
        JADWAL PEMBELAJARAN PERMINGGU <br>
        <span class="text-danger">{{ $namaRombel }}</span>
    </h1>
    <p class="lead lh-base">TAHUN AJARAN {{ $tahunAjaran ?? '-' }} SEMESTER
        {{ strtoupper($semester ?? '-') }}</p>

    <h5>Wali Kelas: {{ $namaWaliKelas }}</h5>
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
                    <td><strong class='fs-24'>{{ $jam }}</strong><br><small>{{ $waktu }}</small>
                    </td>
                    <td colspan="{{ count($hariList) }}"><strong class="fs-24">Istirahat Pertama</strong></td>
                </tr>
            @elseif ($jam == 10)
                <tr class="table-info">
                    <td><strong class='fs-24'>{{ $jam }}</strong><br><small>{{ $waktu }}</small>
                    </td>
                    <td colspan="{{ count($hariList) }}"><strong class="fs-24">Istirahat, Sholat,
                            Makan</strong></td>
                </tr>
            @else
                <tr>
                    <td style="width:150px;">
                        <strong class='fs-24'>{{ $jam }}</strong><br><small>{{ $waktu }}</small>
                    </td>
                    @foreach ($hariList as $hari)
                        @php
                            $cell = $grid[$jam][$hari] ?? null;
                            $bgColor = $cell ? warnaDariId($cell['id']) : '';
                            $textColor = $cell ? kontrasTeks($bgColor) : '#000';
                            $isUpacara = $jam == 1 && $hari == 'Senin';
                            $isKegiatanInsidentil = $jam == 1 && $hari == 'Jumat';
                        @endphp

                        <td class="cell-jadwal {{ $isUpacara || $isKegiatanInsidentil ? 'no-click' : '' }}"
                            data-jam="{{ $jam }}" data-hari="{{ $hari }}"
                            data-mapel="{{ $cell['mapel'] ?? '' }}" data-guru="{{ $cell['guru'] ?? '' }}"
                            data-id="{{ $cell['id'] ?? '' }}"
                            style="width:250px;
                                   background-color: {{ $isUpacara || $isKegiatanInsidentil ? 'rgb(95,42,42)' : $bgColor }};
                                   color: {{ $isUpacara || $isKegiatanInsidentil ? 'white' : $textColor }};
                                   cursor:pointer;">
                            @if ($isUpacara)
                                <strong class="fs-12 fw-semibold">UPACARA BENDERA</strong>
                            @elseif ($isKegiatanInsidentil)
                                <strong class="fs-12 fw-semibold">KEGIATAN INSIDENTIL</strong>
                            @elseif ($cell)
                                <div class="fs-12 fw-semibold">{{ $cell['mapel'] }}</div>
                                <div class="fs-10">{{ $cell['guru'] }}</div>
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
