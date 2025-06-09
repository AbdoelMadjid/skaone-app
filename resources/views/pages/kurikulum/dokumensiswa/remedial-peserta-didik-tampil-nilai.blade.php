<div class="d-flex justify-content-sm-end">
    <div class="mb-3">
        <button class="btn btn-secondary" id="kembali-daftar-siswa">
            <i class="ri-arrow-left-line"></i> Kembali ke Daftar Siswa
        </button>
    </div>
</div>

<div>
    <h6 class="mb-1">Data Siswa</h6>
    <div><strong>NIS:</strong> {{ $siswa->nis ?? '-' }}</div>
    <div><strong>Nama Lengkap:</strong> {{ $siswa->nama_lengkap ?? '-' }}</div>
</div>

@foreach ($data as $tingkat => $mapelTingkat)
    <h5 class="mt-3">Tingkat {{ $tingkat }} Tahun Ajaran {{ $tahunAjarans[$tingkat] ?? '-' }}</h5>

    @foreach (['ganjil' => 'Ganjil', 'genap' => 'Genap'] as $key => $label)
        <h6 class="mt-2">Semester {{ $label }}</h6>
        <table class="table table-bordered mb-4">
            <thead>
                <tr>
                    <th>Kode Rombel</th>
                    <th>Rombel</th>
                    <th>Kel. Mapel</th>
                    <th>Kode Mapel</th>
                    <th>Mata Pelajaran</th>
                    <th>KKM</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mapelTingkat[$key] as $mapel)
                    <tr>
                        <td>{{ $mapel->kode_rombel }}</td>
                        <td>{{ $mapel->rombel }}</td>
                        <td>{{ $mapel->kel_mapel }}</td>
                        <td>{{ $mapel->kode_mapel }}</td>
                        <td>{{ $mapel->mata_pelajaran }}</td>
                        <td>{{ $mapel->kkm }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    @endforeach
@endforeach
