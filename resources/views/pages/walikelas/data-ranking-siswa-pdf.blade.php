<!DOCTYPE html>
<html lang="id">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Ranking Siswa {{ $waliKelas->rombel }}</title>
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
        <h1 class="text-center">Data Ranking Rombel {{ $waliKelas->rombel }}</h1>
        <table>
            <thead class="table-dark">
                <tr>
                    <th>No.</th>
                    <th>NIS</th>
                    <th>Nama Lengkap</th>
                    <th>Nilai Rata-Rata</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($nilaiRataSiswa as $key => $nilai)
                    <tr>
                        <td class='text-center'>{{ $key + 1 }}.</td>
                        <td class='text-center'>{{ $nilai->nis }}</td>
                        <td>{{ $nilai->nama_lengkap }}</td>
                        <td class='text-center'>{{ $nilai->nil_rata_siswa }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <div class="note">
            <strong>Catatan:</strong><br>
            Ranking jangan jadi patokan sebagai hal yang WAJIB, tapi hanya untuk motivasi siswa.
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
