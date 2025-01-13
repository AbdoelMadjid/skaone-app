<table class="table table-bordered table-striped mt-3">
    <thead class="table-dark">
        <tr>
            <th>No.</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            @foreach ($kelMapelList as $kelMapel)
                <th>{{ $kelMapel->kel_mapel }}</th>
            @endforeach
            <th>Nilai Rata-Rata</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pivotData as $nis => $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $nis }}</td>
                <td>{{ $data['nama_lengkap'] }}</td>
                @foreach ($kelMapelList as $kelMapel)
                    <td>{{ $data[$kelMapel->kel_mapel] ?? '-' }}</td>
                @endforeach
                <td>{{ $data['nil_rata_siswa'] }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="{{ 3 + $kelMapelList->count() }}" class="text-center">
                    Tidak
                    ada data</td>
            </tr>
        @endforelse
    </tbody>
</table>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kelompok Mapel</th>
            <th>Mata Pelajaran</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($listMapel as $index => $kelMapel)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $kelMapel->kel_mapel }}</td>
                <td>{{ $kelMapel->mata_pelajaran }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
