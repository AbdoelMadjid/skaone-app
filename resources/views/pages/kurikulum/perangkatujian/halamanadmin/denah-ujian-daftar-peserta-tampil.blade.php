@foreach ($rows as $row)
    <tr>
        <td style='text-align: center;'>{{ $row['no'] }}</td>
        <td style='text-align: center;'>{{ $row['kiri']->nomor_peserta ?? '' }}</td>
        <td style='padding:10px;'>{{ $row['kiri']->nama_lengkap ?? '' }}</td>
        <td style='text-align: center;'>{{ $row['kiri']->rombel ?? '' }}</td>
        <td style='text-align: center;'>{{ $row['kanan']->nomor_peserta ?? '' }}</td>
        <td style='padding:10px;'>{{ $row['kanan']->nama_lengkap ?? '' }}</td>
        <td style='text-align: center;'>{{ $row['kanan']->rombel ?? '' }}</td>
    </tr>
@endforeach
