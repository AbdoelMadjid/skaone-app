<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Username Rombel {{ $waliKelas->rombel }}</title>
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
    <h1 class="text-center">Data Username Rombel {{ $waliKelas->rombel }}</h1>
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

    <div class="note">
        <strong>Catatan:</strong><br>
        Password Default: **siswaSKAONE30**
    </div>

    <table width="100%" style="margin-top: 20px;" class="no-border">
        <tr>
            <td width="50%" valign="top" class="no-border">
                <!-- Kosongkan area jika tidak diperlukan -->
            </td>
            <td width="50%" valign="top" class="no-border">
                Kadipaten, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}<br>
                <strong>Wali Kelas,</strong>
                <br><br><br><br><br>
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
</body>

</html>
