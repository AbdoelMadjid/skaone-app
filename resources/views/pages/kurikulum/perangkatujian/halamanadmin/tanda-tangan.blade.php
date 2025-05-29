<table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;border: none !important;'>
    <tr>
        <td width='25' style='border: none !important;'>&nbsp;</td>
        <td style='border: none !important;'>
            <p style='margin-bottom:-2px;margin-top:-2px'>&nbsp;</p>
            <table
                style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;border: none !important;'>
                <tr style='border: none !important;'>
                    <td width='50' style='border: none !important;'></td>
                    <td style='border: none !important;'></td>
                    <td style='border: none !important;'>
                        Mengetahui<br>
                        Kepala Sekolah,
                        <div>
                            <img src='{{ URL::asset('images/damudin.png') }}' border='0' height='110'
                                style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -160px;margin-top:-15px;'>
                        </div>
                        {{-- <div><img src='{{ URL::asset('images/stempel.png') }}' border='0' height='180'
                                            width='184'
                                            style=' position: absolute; padding: 0px 2px 15px -650px; margin-left: -135px;margin-top:-50px;'>
                                    </div> --}}
                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>
                        NIP. 19740302 199803 1 002
                    </td>
                    <td style='border: none !important;' width='200'></td>
                    <td style='padding:4px 8px;border: none !important;'>
                        Kadipaten,
                        {{ \Carbon\Carbon::parse($identitasUjian?->titimangsa_ujian)->translatedFormat('d F Y') ?? '-' }}<br>
                        Ketua Panitia,
                        {{-- <div>
                                <img src='{{ URL::asset('images/almadjid.png') }}' border='0' height='110'
                                    style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -80px;margin-top:-15px;'>
                            </div> --}}

                        <p>&nbsp;</p>
                        <p>&nbsp;</p>
                        <strong>ABDUL MADJID, S.Pd., M.Pd.</strong><br>
                        NIP. 19761128 200012 1 002
                    </td>
                </tr>
            </table>
        </td>
        <td width='25' style='border: none !important;'>&nbsp;</td>
    </tr>
</table>
