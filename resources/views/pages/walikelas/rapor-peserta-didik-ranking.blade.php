<div class="col-lg-12">
    <div class="gap-2 hstack justify-content-end mb-4">
        <a href="{{ route('walikelas.downloadrankingsiswa') }}" class="btn btn-soft-info btn-sm">Download
            Ranking</a>
    </div>
</div>
<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>No.</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Rata-Rata</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($nilaiRataSiswa as $key => $nilai)
            <tr>
                <td class='text-center'>{{ $key + 1 }}.</td>
                <td class='text-center'>{{ $nilai->nis }}</td>
                <td>{{ $nilai->nama_lengkap }}</td>
                <td class='text-center'>{{ $nilai->nil_rata_siswa }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Tidak ada data</td>
            </tr>
        @endforelse
    </tbody>
</table>
