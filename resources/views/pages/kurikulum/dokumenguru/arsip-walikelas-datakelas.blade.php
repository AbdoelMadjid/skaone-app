<div class="card p-3">
    <h5>Data Kelas - Semester {{ $semester }}</h5>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->pesertaDidik->nama_lengkap ?? '-' }}</td>
                    <td>{{ $item->pesertaDidik->jenis_kelamin ?? '-' }}</td>
                    <td>{{ $item->pesertaDidik->tanggal_lahir ?? '-' }}</td>
                    <td>{{ $item->pesertaDidik->alamat_desa ?? '-' }}, {{ $item->pesertaDidik->alamat_kec ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data peserta didik.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
