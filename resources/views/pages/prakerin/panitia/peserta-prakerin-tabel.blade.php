@php $no = 1; @endphp
@foreach ($siswa as $row)
    <tr>
        <td>{{ $no++ }}</td>
        <td>{{ $row->nis }}</td>
        <td>{{ $row->pesertaDidik->nama_lengkap ?? '-' }}</td>
        <td>{{ $row->pesertaDidik->jenis_kelamin ?? '-' }}</td>
        <td>{{ $row->rombel_nama }}</td>
        <td>
            <input type="checkbox" name="nis_terpilih[]" value="{{ $row->nis }}">
        </td>
    </tr>
@endforeach
