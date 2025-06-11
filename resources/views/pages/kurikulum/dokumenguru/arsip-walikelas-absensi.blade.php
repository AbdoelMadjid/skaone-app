<div class="card p-3">
    <h5>Rekap Absensi Siswa - Semester {{ $semester }}</h5>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Sakit</th>
                <th>Izin</th>
                <th>Alpa</th>
                <th>Jumlah Absen</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->pesertaDidik->nama_lengkap ?? '-' }}</td>
                    <td style="text-align:center;">{{ $item->sakit }}</td>
                    <td style="text-align:center;">{{ $item->izin }}</td>
                    <td style="text-align:center;">{{ $item->alfa }}</td>
                    <td style="text-align:center;">{{ $item->jmlhabsen }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Data absensi tidak tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
