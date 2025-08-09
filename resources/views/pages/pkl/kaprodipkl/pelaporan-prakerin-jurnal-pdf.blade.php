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
                    <th width="200">Identitas Siswa</th>
                    <th>Nama Perusahaan</th>
                    <th>Jumlah Jurnal (Sudah)</th>
                    <th>Jumlah Jurnal (Belum)</th>
                    <th>Jumlah Jurnal (Tolak)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPrakerin as $index => $prakerin)
                    <tr>
                        <td class="vertical-center">{{ $loop->iteration }}</td>
                        <td>{{ $prakerin->nis }}<br>{{ $prakerin->nama_lengkap }}<br>{{ $prakerin->rombel }}</td>
                        <td>{{ $prakerin->nama_perusahaan }}</td>
                        <td class="vertical-center">{{ $prakerin->jumlah_sudah }}</td>
                        <td class="vertical-center">{{ $prakerin->jumlah_belum }}</td>
                        <td class="vertical-center">{{ $prakerin->jumlah_tolak }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>

</html>
