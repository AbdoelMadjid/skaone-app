<h5>Wali Kelas:</h5>
{{ $pesertaDidik->first()?->gelardepan }} {{ $pesertaDidik->first()?->nama_wali }}
{{ $pesertaDidik->first()?->gelarbelakang }} <br>
NIP : ({{ $pesertaDidik->first()?->nip ?? '-' }})

<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pesertaDidik as $index => $siswa)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama_lengkap }}</td>
                <td>{{ $siswa->jenis_kelamin }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
