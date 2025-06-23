@foreach ($ranking as $tingkat => $list)
    <div class="card">
        <div class="card-header border-bottom-dashed">
            <h5 class="card-title mb-0">Ranking Tingkat {{ $tingkat }}</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">Ranking</th>
                        <th class="text-center">NIS</th>
                        <th>Nama Lengkap</th>
                        <th>Kode KK</th>
                        <th>Rombel</th>
                        <th class="text-center">Nilai Rata-rata</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $i => $siswa)
                        <tr>
                            <td class="text-center">{{ $i + 1 }}</td>
                            <td class="text-center">{{ $siswa->nis }}</td>
                            <td>{{ $siswa->nama_lengkap }}</td>
                            <td class="text-center">{{ $kodeKKList[$siswa->kode_kk] ?? $siswa->kode_kk }}</td>
                            <td>{{ $siswa->rombel_nama }}</td>
                            <td class="text-center">{{ $siswa->nilai_rata2 }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endforeach
