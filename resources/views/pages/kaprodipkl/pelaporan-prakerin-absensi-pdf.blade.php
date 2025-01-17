<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Laporan Prakerin</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
            }

            table {
                width: 100%;
                border-collapse: collapse;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }

            th,
            td {
                padding: 5px;
                text-align: left;
            }

            th {
                background-color: #f2f2f2;
                text-align: center;
            }

            .vertical-center {
                /* Membuat teks vertikal */
                text-align: center;
                /* Memusatkan teks secara horizontal */
                vertical-align: middle;
                /* Memusatkan konten secara vertikal */
                justify-content: center;
                /* Memusatkan konten secara horizontal */
            }
        </style>
    </head>

    <body>
        <h2>Laporan Prakerin</h2>

        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Identitas Siswa</th>
                    <th>Hadir</th>
                    <th>Sakit</th>
                    <th>Izin</th>
                    <th>Alfa</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPrakerin as $index => $prakerin)
                    <tr>
                        <td class="vertical-center">{{ $loop->iteration }}</td>
                        <td width="200">
                            {{ $prakerin->nis }}<br>{{ $prakerin->nama_lengkap }}<br>{{ $prakerin->rombel }}</td>
                        <td class="vertical-center">{{ $prakerin->jumlah_hadir }}</td>
                        <td class="vertical-center">{{ $prakerin->jumlah_sakit }}</td>
                        <td class="vertical-center">{{ $prakerin->jumlah_izin }}</td>
                        <td class="vertical-center">{{ $prakerin->jumlah_alfa }}</td>
                        <td class="vertical-center">{{ $prakerin->jumlah_total }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
