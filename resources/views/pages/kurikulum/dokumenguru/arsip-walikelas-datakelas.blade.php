<div class="card p-3">
    <h5>Data Kelas - Semester {{ $semester }}</h5>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Jenis Kelamin</th>
                <th>Tanggal Lahir</th>
                <th>Nama Ayah</th>
                <th>Nama Ibu</th>
                <th>Alamat</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($data as $i => $item)
                @php
                    $siswa = $item->pesertaDidik;
                    $ortu = $siswa->ortu ?? null;
                @endphp
                <tr>
                    <td>{{ $i + 1 }}</td>
                    <td>{{ $item->nis }}</td>
                    <td>{{ $siswa->nama_lengkap ?? '-' }}</td>
                    <td>{{ $siswa->jenis_kelamin ?? '-' }}</td>
                    <td>
                        {{ $siswa->tempat_lahir ? ucwords(strtolower($siswa->tempat_lahir)) : '-' }},
                        {{ $siswa->tanggal_lahir ? formatTanggalIndonesia($siswa->tanggal_lahir) : '-' }}
                    </td>
                    <td>{{ $ortu?->nm_ayah ? ucwords(strtolower($ortu?->nm_ayah)) : '-' }}</td>
                    <td>{{ $ortu?->nm_ibu ? ucwords(strtolower($ortu?->nm_ibu)) : '-' }}</td>
                    <td>
                        {{ $siswa->alamat_desa ? ucwords(strtolower($siswa->alamat_desa)) : '-' }},
                        {{ $siswa->alamat_kec ? ucwords(strtolower($siswa->alamat_kec)) : '-' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Tidak ada data peserta didik.</td>
                </tr>
            @endforelse

        </tbody>
    </table>
</div>
