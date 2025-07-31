<div id='cetak-surat-pengantar' style='@page {size: A4;}'>
    <div class='table-responsive'>
        <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td align='center'><img src="{{ URL::asset('images/kopsuratbaru.jpg') }}" alt="" height="154"
                        width="700" border="0"></td>
            </tr>
        </table>
        <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td align='justify'>
                    <table style='margin: 0 auto;width:100%;border-collapse:collapse;'>
                        <tr>
                            <td style="width:80%">
                                <table>
                                    <tr>
                                        <td style="width:100px;">Nomor</td>
                                        <td style="width:25px;">:</td>
                                        <td>{{ $infoNegosiasi['nomor_surat'] ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Lampiran</td>
                                        <td>:</td>
                                        <td>1 Lembar</td>
                                    </tr>
                                    <tr>
                                        <td>Perihal</td>
                                        <td>:</td>
                                        <td>Permohonan Izin Praktik Kerja Lapangan (PKL)</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                        <td>&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="width:0%">&nbsp;</td>
                            <td style="width:25%;">
                                <table>
                                    <tr>
                                        <td style="text-align: right">

                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table>
                        <tr>
                            <td style="width:100px;">Kepada Yth. </td>
                            <td style="width:25px;">:</td>
                            <td>
                                Kepala / Pimpinan <br>
                                {{ $infoNegosiasi['nama_perusahaan'] ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td style="width:100px;"></td>
                            <td style="width:25px;"></td>
                            <td>di</td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td style="width:100px;"></td>
                            <td style="width:45px;"></td>
                            <td>{{ $infoNegosiasi['alamatperusahaan'] ?? '-' }}</td>
                        </tr>
                    </table>
                    <br><br>
                    <table>
                        <tr>
                            <td style="width:100px;">&nbsp;</td>
                            <td style="width:25px;">&nbsp;</td>
                            <td style="text-align: justify">
                                Dengan hormat,<br><br>

                                Kami, dari SMK Negeri 1 Kadipaten, mengajukan permohonan izin untuk melaksanakan Praktik
                                Kerja Lapangan (PKL) di perusahaan yang Bapak/Ibu pimpin mulai
                                {{ \Carbon\Carbon::parse($identPrakerin?->tanggal_mulai)->translatedFormat('l, d F Y') ?? '-' }}
                                s.d
                                {{ \Carbon\Carbon::parse($identPrakerin?->tanggal_selesai)->translatedFormat('l, d F Y') ?? '-' }}.
                                Adapun nama-nama siswa yang kami ajukan untuk mengikuti PKL terlampir.
                                <br><br>
                                Tujuan dari Praktik Kerja Lapangan ini adalah untuk memberikan pengalaman kerja nyata
                                kepada siswa kami, sehingga mereka dapat memahami dan mengaplikasikan teori yang telah
                                dipelajari di sekolah dalam lingkungan kerja yang sesungguhnya. Kami berharap dengan
                                adanya PKL ini, siswa kami dapat memperoleh pengetahuan dan keterampilan yang lebih baik
                                sebagai bekal di masa depan.
                                <br><br>
                                Kami sangat berharap Bapak/Ibu dapat memberikan kesempatan kepada siswa kami untuk
                                melaksanakan PKL di tempat Bapak/Ibu. Atas perhatian dan kerja sama yang baik, kami
                                ucapkan terima kasih.
                            </td>
                        </tr>
                    </table>
                </td>
                <td width='20'>&nbsp;</td>
            </tr>
        </table>
        <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td width='25'>&nbsp;</td>
                <td>
                    <p style='margin-bottom:-2px;margin-top:-2px'>&nbsp;</p>
                    <table width='70%' style='margin: 0 auto;width:100%;border-collapse:collapse;'>
                        <tr>
                            <td width='300'></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style='padding:4px 8px;'>
                                Majalengka,
                                {{ \Carbon\Carbon::parse($infoNegosiasi['tgl_nego'])->translatedFormat('l') ?? '-' }}
                                <br>
                                Kepala Sekolah,
                                <div>
                                    <img src='{{ URL::asset('images/damudin.png') }}' border='0' height='110'
                                        style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -120px;margin-top:-15px;'>
                                </div>
                                <div><img src='{{ URL::asset('images/stempel.png') }}' border='0' height='180'
                                        width='184'
                                        style=' position: absolute; padding: 0px 2px 15px -650px; margin-left: -135px;margin-top:-50px;'>
                                </div>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>
                                Pembina Utama Muda<br>
                                NIP. 19740302 199803 1 002
                            </td>
                        </tr>
                    </table>
                </td>
                <td width='25'>&nbsp;</td>
            </tr>
        </table>
    </div>
</div>
