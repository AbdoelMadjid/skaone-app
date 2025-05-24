<table id="pesertaUjianTable" class="display" style="width:100%; table-layout: fixed;">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Ujian</th>
            <th>Identitas Peserta</th>
            <th>Nomor Ruang</th>
            <th>Posisi Kelas</th>
            <th>Posisi Duduk</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($pesertaUjianTable as $index => $peserta)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $peserta->kode_ujian }}</td>
                <td>{{ $peserta->nomor_peserta }}<br>
                    {{ $peserta->nis }}<br>
                    {{ $peserta->nama_lengkap }}<br>
                    {{ $peserta->rombel }}
                </td>
                <td class="text-center">{{ $peserta->nomor_ruang }}</td>
                <td class="text-center">{{ $peserta->kode_posisi_kelas }}</td>
                <td class="text-center">{{ $peserta->posisi_duduk }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="9" class="text-center">Tidak ada data.</td>
            </tr>
        @endforelse
    </tbody>
</table>
