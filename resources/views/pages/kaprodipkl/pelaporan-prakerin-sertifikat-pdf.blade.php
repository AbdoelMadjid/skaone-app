<style>
    @page {
        size: A4 landscape;
        margin: 0;
    }

    body {
        font-family: "Times New Roman", Times, serif;
        margin: 0;
        padding: 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    img {
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }
</style>
<div id='cetak-sertifikat-pkl' style="position: relative; width: 100%; height: 1000px;">
    <img src="{{ public_path('sertifikatpkl.jpg') }}"
        style="position: absolute; width: 29.7cm; height: 21cm; z-index: 0; top: 0; left: 0;" />
    <div style="margin-top: 330px;"></div>
    <div style="position: relative; z-index: 1;">
        <table style='margin: 0 auto;width:75%;border-collapse:collapse;'>
            <tr>
                <td colspan='3'>Diberikan kepada:</td>
            </tr>
            <tr style="height: 15px;">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td width='40'>&nbsp;</td>
                <td>
                    <table>
                        <tr>
                            <td width='170'>Nama</td>
                            <td width='10'>:</td>
                            <td><strong>{{ $prakerin->nama_lengkap }}</strong></td>
                        </tr>
                        <tr>
                            <td>Nomor Induk Siswa</td>
                            <td>:</td>
                            <td>{{ $prakerin->nis }}</td>
                        </tr>
                        <tr>
                            <td>Program Keahlian</td>
                            <td>:</td>
                            <td>{{ $prakerin->nama_pk }}</td>
                        </tr>
                        <tr>
                            <td>Konsentrasi Keahlian</td>
                            <td>:</td>
                            <td>{{ $prakerin->nama_kk }}</td>
                        </tr>
                    </table>
                </td>
                <td width='40'>&nbsp;</td>
            </tr>
            <tr style="height: 15px;">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan='3'>Dalam Kegiatan Praktek Kerja Lapangan (PKL) di: <br>
                    <strong><span>{{ $prakerin->nama_perusahaan }}</span></strong>
                    <br>
                    dari tanggal 01 Nopember 2024 - 30 April 2025 tahun pelajaran 2024-2025
                    dengan nilai
                    Capaian Kompetensi <span>{{ $prakerin->rata_rata_prakerin }}</span>
                </td>
            </tr>
            <tr style="height: 15px;">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan='3'>Demikian sertifikat ini diberikan untuk di pergunakan sebagaimana
                    mestinya.
                </td>
            </tr>
        </table>
        <table style='margin: 0 auto;width:80%;border-collapse:collapse;'>
            <tr>
                <td width='45'>&nbsp;</td>
                <td>
                    <table>
                        <tr>
                            <td>Pimpinan/Pembimbing DU/DI</td>
                        </tr>
                        <tr>
                            <td><span>{{ $prakerin->jabatan_pembimbing }}</span>,</td>
                        </tr>
                        <tr>
                            <td>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong><span>{{ $prakerin->nama_pembimbing }}</span></strong></td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                    </table>
                </td>
                <td width='150'></td>
                <td>
                    <table>
                        <tr>
                            <td>Kabupaten Majalengka, 05 Mei 2025</td>
                        </tr>
                        <tr>
                            <td>Kepala Sekolah,</td>
                        </tr>
                        <tr>
                            <td>
                                {{-- <div>
                                    <img src='{{ public_path('damudin.png') }}' border='0' height='110'
                                        style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -120px;margin-top:-15px;'>
                                </div>
                                <div><img src='{{ public_path('stempel.png') }}' border='0' height='180'
                                        width='184'
                                        style=' position: absolute; padding: 0px 2px 15px -650px; margin-left: -135px;margin-top:-50px;'>
                                </div> --}}
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>H. Damudin, S.Pd., M.Pd.</strong></td>
                        </tr>
                        <tr>
                            <td>NIP. 19740302 199803 1 002</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
