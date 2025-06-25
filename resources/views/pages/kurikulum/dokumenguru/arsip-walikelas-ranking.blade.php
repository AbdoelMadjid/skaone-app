<div id="cetak-ranking-walikelas">
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
                    <td style='text-align:center'>{{ $key + 1 }}.</td>
                    <td style='text-align:center'>{{ $nilai->nis }}</td>
                    <td style='padding-left:12px'>{{ $nilai->nama_lengkap }}</td>
                    <td style='text-align:center'>{{ $nilai->nil_rata_siswa }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
