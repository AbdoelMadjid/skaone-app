<table id="pesertaprakerinTable" class="display" style="width:100%; table-layout: fixed;">
    <thead>
        <tr>
            <th style="width:40px;">No.</th>
            <th style="width:60px;">NIS</th>
            <th>Nama Lengkap</th>
            <th style="width:60px;">Rombel</th>
            <th>Perusahaan</th>
            <th>Pembimbing</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dataPrakerin as $index => $prakerin)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
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
