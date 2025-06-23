@foreach ($ranking as $tingkat => $kodeKKs)
    @foreach ($kodeKKs as $kodeKK => $list)
        <div class="card">
            <div class="card-header border-bottom-dashed">
                <h5 class="card-title mb-0">
                    Ranking Tingkat {{ $tingkat }} - {{ $kodeKKList[$kodeKK] ?? $kodeKK }}
                </h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">NIS</th>
                            <th>Nama Lengkap</th>
                            <th>Rombel</th>
                            <th class="text-center">Nilai Rata-rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $index => $siswa)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">{{ $siswa->nis }}</td>
                                <td>{{ $siswa->nama_lengkap }}</td>
                                <td>{{ $siswa->rombel_nama }}</td>
                                <td class="text-center">{{ $siswa->nilai_rata2 }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
@endforeach
