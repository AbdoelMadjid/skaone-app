<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Guru PKL</title>
        <style>
            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }

            table,
            th,
            td {
                border: 1px solid black;
            }

            th,
            td {
                text-align: left;
                padding: 8px;
                font-size: 12px;
            }

            .no-border {
                border: none;
            }

            .text-center {
                text-align: center;
            }

            .note {
                font-size: 11px;
                margin-top: 10px;
            }
        </style>
    </head>

    <body style="margin: 20px;">
        <h3>Daftar Guru PKL dan Peserta Terbimbing</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class='text-center'>No</th>
                    <th class='text-center'>Guru PKL / Pembimbing</th>
                    <th class='text-center'>Daftar Siswa</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($groupedData as $id_personil => $rows)
                    <tr>
                        <td class='text-center'>{{ $no++ }}</td>
                        <td>{{ $rows->first()->guru }}</td>
                        <td>
                            <ol>
                                @foreach ($rows as $row)
                                    <li>
                                        {{ $row->nis }} - <strong>{{ $row->siswa }}</strong> -
                                        {{ $row->rombel_nama }}
                                        <br>
                                        {{ $row->nama_perusahaan }}
                                    </li>
                                @endforeach
                            </ol>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <table width="100%" style="margin-top: 20px;" class="no-border">
            <tr>
                <td width="50%" valign="top" class="no-border">
                    <!-- Kosongkan area jika tidak diperlukan -->
                </td>
                <td width="50%" valign="top" class="no-border">
                    Kadipaten, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                    <strong>Wakil Kepala Sekolah Bid. Kurikulum,</strong>
                    <br><br><br><br><br>
                    <strong>Abdul Madjid, S.Pd., M.Pd.</strong><br>
                    NIP. 19761128 200012 1 002
                </td>
            </tr>
        </table>
    </body>

</html>
