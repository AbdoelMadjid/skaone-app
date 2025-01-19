<table id="jurnalTabel" class="display" style="width:100%; table-layout: fixed;">
    <thead>
        <tr>
            <th>No.</th>
            <th>ID Jurnal</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Rombel</th>
            <th>Tempt Prakerin</th>
            <th>Tanggal Kirim</th>
            <th>Validasi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dataJurnal as $index => $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nis }} </td>
                <td>{{ $item->nama_lengkap }}</td>
                <td>{{ $item->rombel_nama }}</td>
                <td>
                    {{ $item->nama }}<br>
                    {{ $item->alamat }}
                </td>
                <td>
                    <input type="date" class="form-control tanggal-kirim" data-id="{{ $item->id }}"
                        value="{{ \Carbon\Carbon::parse($item->tanggal_kirim)->format('Y-m-d') }}"
                        id="tanggal-kirim-{{ $item->id }}">
                </td>
                <td>{{ $item->validasi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
