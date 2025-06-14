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
            @forelse ($absensi as $i => $item)
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $item->pesertaDidik->nama_lengkap ?? '-' }}</td>
                    <td class="text-center">{{ $item->sakit ?? 0 }}</td>
                    <td class="text-center">{{ $item->izin ?? 0 }}</td>
                    <td class="text-center">{{ $item->alpa ?? 0 }}</td>
                    <td class="text-center">{{ $item->sakit + $item->izin + $item->alpa }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Data absensi tidak tersedia.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
