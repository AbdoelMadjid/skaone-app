<h5>Ekstrakurikuler - Semester {{ $dataPilWalas->ganjilgenap }}</h5>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th rowspan="2">No</th>
            <th rowspan="2">NIS</th>
            <th rowspan="2">Nama Lengkap</th>
            <th rowspan="2">Eskul Wajib</th>
            <th colspan="4">Pilihan</th>
        </tr>
        <tr>
            <th>1</th>
            <th>2</th>
            <th>3</th>
            <th>4</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($eskul as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->pesertaDidik->nis ?? '-' }}</td>
                <td>{{ $item->pesertaDidik->nama_lengkap ?? '-' }}</td>
                <td><strong>{{ $item->wajib ?? '-' }}</strong><br>{{ $item->wajib_desk ?? '-' }}</td>
                <td><strong>{{ $item->pilihan1 ?? '-' }}</strong><br>{{ $item->pilihan1_desk ?? '-' }}</td>
                <td><strong>{{ $item->pilihan2 ?? '-' }}</strong><br>{{ $item->pilihan2_desk ?? '-' }}</td>
                <td><strong>{{ $item->pilihan3 ?? '-' }}</strong><br>{{ $item->pilihan3_desk ?? '-' }}</td>
                <td><strong>{{ $item->pilihan4 ?? '-' }}</strong><br>{{ $item->pilihan4_desk ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">Data ekstrakurikuler tidak tersedia.</td>
            </tr>
        @endforelse
    </tbody>
</table>
