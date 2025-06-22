<h5>Data Kelas - Semester {{ $dataPilWalas->ganjilgenap }}</h5>
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
        @forelse ($dataKelas as $i => $item)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $item->nis }}</td>
                <td>{{ $item->nama_lengkap ?? '-' }}</td>
                <td>{{ $item->jenis_kelamin ?? '-' }}</td>
                <td>
                    {{ $item->tempat_lahir ? ucwords(strtolower($item->tempat_lahir)) : '-' }},
                    {{ $item->tanggal_lahir ? formatTanggalIndonesia($item->tanggal_lahir) : '-' }}
                </td>
                <td>{{ $item->nm_ayah ? ucwords(strtolower($item->nm_ayah)) : '-' }}</td>
                <td>{{ $item->nm_ibu ? ucwords(strtolower($item->nm_ibu)) : '-' }}</td>
                <td>
                    Desa/Kel. {{ $item->alamat_desa ? ucwords(strtolower($item->alamat_desa)) : '-' }}<br>
                    Kec. {{ $item->alamat_kec ? ucwords(strtolower($item->alamat_kec)) : '-' }}<br>
                    Kab. {{ $item->alamat_kab ? ucwords(strtolower($item->alamat_kab)) : '-' }}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">Tidak ada data peserta didik.</td>
            </tr>
        @endforelse
    </tbody>
</table>
