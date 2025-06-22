<h5>Catatan Wali Kelas - Semester {{ $dataPilWalas->ganjilgenap }}</h5>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Catatan Walas</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($catatanWalas as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->pesertaDidik->nis ?? '-' }}</td>
                <td>{{ $item->pesertaDidik->nama_lengkap ?? '-' }}</td>
                <td>{{ $item->catatan ?? '-' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Data catatan tidak tersedia.</td>
            </tr>
        @endforelse
    </tbody>
</table>
