@foreach ($groupedData as $tingkat => $kkGroups)
    <div class="card">
        <div class="card-header border-bottom-dashed">
            <h5 class="card-title mb-0">Ranking Tingkat {{ $tingkat }}</h5>
        </div>
        <div class="card-body">
            @foreach ($kkGroups as $kodeKK => $rankingList)
                <h4 class="mt-3">{{ $kodeKKList[$kodeKK] ?? $kodeKK }}</h4>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">Ranking</th>
                            <th class="text-center">NIS</th>
                            <th>Nama Lengkap</th>
                            <th>Rombel</th>
                            <th class="text-center">Nilai Rata-rata</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($rankingList as $nilai)
                            <tr>
                                <td class="text-center">{{ $nilai->ranking }}</td>
                                <td class="text-center">{{ $nilai->nis }}</td>
                                <td>{{ $nilai->nama_lengkap }}</td>
                                <td>{{ $nilai->rombel_nama }}</td>
                                <td class="text-center">
                                    {{ $nilai->nil_rata_siswa }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
@endforeach
