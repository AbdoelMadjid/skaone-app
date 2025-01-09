<table id="pesertaprakerinTable" class="table table-bordered table-centered">
    <thead>
        <tr>
            <th>No.</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Rombel</th>
            <th>Perusahaan</th>
            <th>Pembimbing</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dataPrakerin as $index => $prakerin)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $prakerin->nis }}</td>
                <td>{{ $prakerin->nama_lengkap }}</td>
                <td>{{ $prakerin->rombel }}</td>
                <td>{{ $prakerin->nama_perusahaan }}</td>
                <td>{{ $prakerin->gelardepan }} {{ $prakerin->namalengkap }}
                    {{ $prakerin->gelarbelakang }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="8">Tidak ada data.</td>
            </tr>
        @endforelse
    </tbody>
</table>
