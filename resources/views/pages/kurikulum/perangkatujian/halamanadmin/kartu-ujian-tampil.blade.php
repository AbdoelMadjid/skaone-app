<div id="cetak-kartu-ujian">
    @php
        $ganjil = $pesertaUjians
            ->filter(function ($item, $key) {
                return $key % 2 == 0;
            })
            ->values(); // Reset index jadi 0,1,2,...

        $genap = $pesertaUjians
            ->filter(function ($item, $key) {
                return $key % 2 == 1;
            })
            ->values(); // Reset index juga

        $max = max($ganjil->count(), $genap->count());
    @endphp

    @for ($i = 0; $i < $max; $i++)
        <table class="cetak-kartu" align="center"
            style='margin: 0 auto;width:100%;border-collapse:collapse;margin-bottom:5px;font:12px Times New Roman; table-layout:fixed;'>
            <tr>
                <td style="width:50%;vertical-align: top; border: 1px solid #000;">
                    @if (isset($ganjil[$i]))
                        @include('pages.kurikulum.perangkatujian.halamanadmin.kartu-ujian-tampil-isi', [
                            'peserta' => $ganjil[$i],
                            'identitasUjian' => $identitasUjian,
                        ])
                    @endif
                    <br>
                </td>
                <td></td>
                <td style="width:50%;vertical-align: top; border: 1px solid #000;">
                    @if (isset($genap[$i]))
                        @include('pages.kurikulum.perangkatujian.halamanadmin.kartu-ujian-tampil-isi', [
                            'peserta' => $genap[$i],
                            'identitasUjian' => $identitasUjian,
                        ])
                    @endif
                    <br>
                </td>
            </tr>
        </table>
        {{-- <div style="page-break-after: always;"></div>
            <div style="page-break-inside: avoid;"></div>
            <div style="page-break-before: always;"></div> --}}

        {{-- @if ($i == $max - 1)
            <div style="page-break-after: always;"></div>
            <div style="page-break-inside: avoid;"></div>
            <div style="page-break-before: always;"></div>
        @endif
        @if ($i == $max - 1 && $ganjil->count() > $genap->count())
            <div style="page-break-after: always;"></div>
            <div style="page-break-inside: avoid;"></div>
            <div style="page-break-before: always;"></div>
        @endif
        @if ($i == $max - 1 && $genap->count() > $ganjil->count())
            <div style="page-break-after: always;"></div>
            <div style="page-break-inside: avoid;"></div>
            <div style="page-break-before: always;"></div>
        @endif` --}}
    @endfor
</div>
