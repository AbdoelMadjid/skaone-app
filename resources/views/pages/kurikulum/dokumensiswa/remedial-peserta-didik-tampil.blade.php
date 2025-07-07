<table class="table table-bordered align-middle">
    <thead class="table-light position-sticky top-0" style="z-index: 1;">
        <tr>
            <th rowspan="2" class="text-center align-middle">No</th>
            <th rowspan="2" class="text-center align-middle">Tahun Ajaran</th>
            <th rowspan="2" class="text-center align-middle">Kode KK</th>
            <th rowspan="2" class="text-center align-middle">NIS</th>
            <th rowspan="2" class="text-center align-middle">Nama Lengkap</th>
            <th colspan="3" class="text-center">Tingkat</th>
            <th rowspan="2" class="text-center align-middle">Cek Nilai</th>
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
                        <td width="150">
                            {{ $tingkatMap[$tingkat]->tahun_ajaran }}<br>
                            {{ $tingkatMap[$tingkat]->rombel_kode }}<br>
                            {{ $tingkatMap[$tingkat]->rombel_nama }}
                        </td>
                    @else
                        <td width="150">-</td>
                    @endif
                @endforeach
                <td class="text-center align-middle">
                    <button onclick="topFunction()" class="btn btn-sm btn-soft-primary cek-nilai"
                        data-nis="{{ $nis ?? '' }}" data-thnajaran10="{{ $tingkatMap[10]->tahun_ajaran ?? '' }}"
                        data-thnajaran11="{{ $tingkatMap[11]->tahun_ajaran ?? '' }}"
                        data-thnajaran12="{{ $tingkatMap[12]->tahun_ajaran ?? '' }}"
                        data-kodekk="{{ $siswa->kode_kk ?? '' }}"
                        data-rombel10="{{ $tingkatMap[10]->rombel_kode ?? '' }}"
                        data-rombel11="{{ $tingkatMap[11]->rombel_kode ?? '' }}"
                        data-rombel12="{{ $tingkatMap[12]->rombel_kode ?? '' }}">
                        <i class="ri-newspaper-line"></i>
                    </button>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
