<div>
    <div class="card">
        <div class="card-header border-bottom-dashed">
            <div class="row g-4 align-items-center">
                <div class="col-sm">
                    <div>
                        <h5 class="card-title mb-0">Leger</h5>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex flex-wrap align-items-start gap-2">

                    </div>
                </div>
            </div>
        </div>
        <div class="card-body border-bottom-dashed border-bottom">
            <div class="table-responsive">
                <table class="table table-bordered table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th class="vertical-center">No.</th>
                            <th class="vertical-center">NIS</th>
                            <th class="vertical-center">Nama Lengkap</th>
                            @foreach ($kelMapelList as $kelMapel)
                                <th class="vertical-text">{{ $kelMapel->kel_mapel }}</th>
                            @endforeach
                            <th class="vertical-text">Nilai Rata-Rata</th>
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
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header border-bottom-dashed">
            <div class="row g-4 align-items-center">
                <div class="col-sm">
                    <div>
                        <h5 class="card-title mb-0">Leger Mata Pelajaran</h5>
                    </div>
                </div>
                <div class="col-sm-auto">
                    <div class="d-flex flex-wrap align-items-start gap-2">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body border-bottom-dashed border-bottom">
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
        </div>
    </div>
</div>
