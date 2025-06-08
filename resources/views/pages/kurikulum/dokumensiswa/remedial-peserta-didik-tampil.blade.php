<table class="table table-bordered">
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">Tahun Ajaran</th>
            <th rowspan="2">Kode KK</th>
            <th rowspan="2">NIS</th>
            <th rowspan="2">Nama Lengkap</th>
            <th colspan="3" class="text-center">Tingkat</th>
        </tr>
        <tr>
            <th>10</th>
            <th>11</th>
            <th>12</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($rombels as $nis => $dataRombel)
            @php
                $siswa = $siswas[$nis] ?? null;
                $tingkatMap = [10 => null, 11 => null, 12 => null];
                foreach ($dataRombel as $r) {
                    $tingkatMap[$r->rombel_tingkat] = $r;
                }
            @endphp
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $siswa->thnajaran_masuk ?? '-' }}</td>
                <td>{{ $siswa->kode_kk ?? '-' }}</td>
                <td>{{ $nis }}</td>
                <td>{{ $siswa->nama_lengkap ?? '-' }}</td>

                @foreach ([10, 11, 12] as $tingkat)
                    @if ($tingkatMap[$tingkat])
                        <td>
                            {{ $tingkatMap[$tingkat]->tahun_ajaran }}<br>
                            {{ $tingkatMap[$tingkat]->rombel_kode }}<br>
                            {{ $tingkatMap[$tingkat]->rombel_nama }}
                        </td>
                    @else
                        <td>-</td>
                    @endif
                @endforeach
            </tr>
        @endforeach

    </tbody>
</table>
