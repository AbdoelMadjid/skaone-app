<h5>Prestasi Siswa - Semester {{ $dataPilWalas->ganjilgenap }}</h5>
<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Prestasi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($prestasiGrouped as $nis => $prestasis)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $prestasis->first()->pesertaDidik->nis ?? '-' }}</td>
                <td>{{ $prestasis->first()->pesertaDidik->nama_lengkap ?? '-' }}</td>
                <td>
                    <ul class="mb-0">
                        @foreach ($prestasis as $p)
                            <li>
                                {{ $p->jenis ?? '-' }},
                                {{ $p->tingkat ?? '-' }},
                                Juara {{ $p->juarake ?? '-' }},
                                "{{ $p->namalomba ?? '-' }}",
                                {{ $p->tanggal ? \Carbon\Carbon::parse($p->tanggal)->format('d M Y') : '-' }},
                                di {{ $p->tempat ?? '-' }}
                            </li>
                        @endforeach
                    </ul>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Data prestasi tidak tersedia.</td>
            </tr>
        @endforelse
    </tbody>
</table>
