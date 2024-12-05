<!DOCTYPE html>
<html>

<head>
    <title>Data Username {{ $waliKelas->rombel }} </title>
    <style>
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
            text-align: left;
            padding: 8px;
        }

        .no-border {
            border: none;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <h1 class="text-center">Data Username {{ $waliKelas->rombel }}</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>NIS</th>
                <th>Nama Lengkap</th>
                <th>Email/User</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($siswaData as $index => $siswa)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $siswa->nis }}</td>
                    <td>{{ $siswa->nama_lengkap }}</td>
                    <td>{{ $siswa->kontak_email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table width="100%" style="margin-top: 20px;" class="no-border">
        <tr>
            <td width="45%" valign="top" class="no-border">
                <strong>Catatan:</strong><br>
                Password Default: **siswaSKAONE30**
            </td>
            <td width="10%" class="no-border">&nbsp;</td>
            <td valign="top" width="45%" class="no-border">
                <table width="100%" class="no-border">
                    <tr>
                        <td class="no-border">
                            Kadipaten, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                            <strong>Wali Kelas,</strong>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <strong>{{ $personil->gelardepan }} {{ $personil->namalengkap }}
                                {{ $personil->gelarbelakang }}</strong><br>
                            @if (!empty($personil->nip))
                                NIP. {{ $personil->nip }}
                            @else
                                NIP. -
                            @endif
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
