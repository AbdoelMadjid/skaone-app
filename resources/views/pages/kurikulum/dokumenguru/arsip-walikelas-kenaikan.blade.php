<h5>Kenaikan Kelas - Tahun Ajaran {{ $dataPilWalas->tahunajaran }}</h5>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Status Kenaikan</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($kenaikanKelas as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->pesertaDidik->nis ?? '-' }}</td>
                <td>{{ $item->pesertaDidik->nama_lengkap ?? '-' }}</td>
                <td>{{ $item->status ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Data Kenaikan tidak tersedia.</td>
            </tr>
        @endforelse
    </tbody>
</table>
