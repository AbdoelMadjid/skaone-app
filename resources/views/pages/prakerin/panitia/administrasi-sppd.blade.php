<div id='cetak-sppd' style='@page {size: 210mm 330mm landscape;}'>
    <table cellspacing="0" cellpadding="4" style="border-collapse: collapse; width: 100%;">
        <tr>
            <td style="width: 50%;">
                <table style='margin: 0 auto;width:100%;border-collapse:collapse;'>
                    <tr>
                        <td align='center'><img src="{{ URL::asset('images/kopsuratbaru.jpg') }}" alt=""
                                height="84" width="450" border="0"></td>
                    </tr>
                </table>
                <table style='margin: 0 auto;width:100%;border-collapse:collapse;'>
                    <tr>
                        <td style="text-align: center; vertical-align: top;"></td>
                        <td style="width: 60%;">
                            Lembar Ke: <br>
                            Kode No: <br>
                            Nomor : {{ $infoNegosiasi['nomor_surat_perintah'] ?? '-' }}
                        </td>
                    </tr>
                </table>
                <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:14px;'>
                    <tr>
                        <td colspan="3" style="text-align: center;"><strong>SURAT PERJALANAN DINAS</strong></td>
                    </tr>
                </table>
                <table width="100%" border="1">
                    <tr>
                        <td width="3%">1.</td>
                        <td width="50%">Pengguna Anggaran/Kuasa Pengguna Anggaran</td>
                        <td><strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>NIP. 197403021998031002</td>
                    </tr>
                    <tr>
                        <td>2.</td>
                        <td>Nama/NIP Pegawai yang melaksanakan perjalanan</td>
                        <td>
                            <strong>
                                {{ $infoNegosiasi['nama_lengkap'] ?? '-' }}
                            </strong>
                            <br>
                            NIP. {{ $infoNegosiasi['nip'] ?? '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td>3.</td>
                        <td>
                            a. Pangkat dan Golongan<br>
                            b. Jabatan<br>
                            c. Tingkat Biaya Perjalanan Dinas
                        </td>
                        <td>
                            a. {{ $infoNegosiasi['gol_ruang'] ?? '-' }}<br>
                            b. {{ $infoNegosiasi['jabatan'] ?? '-' }}<br>
                            c. -
                        </td>
                    </tr>
                    <tr>
                        <td>4.</td>
                        <td>Maksud Perjalanan Dinas</td>
                        <td>Negosiasi / Pengasuh PKL<br></td>
                    </tr>
                    <tr>
                        <td>5.</td>
                        <td>Alat angkutan / transportasi yang digunakan</td>
                        <td>Kendaraan Pribadi</td>
                    </tr>
                    <tr>
                        <td>6.</td>
                        <td>
                            a. Tempat Berangkat<br>
                            b. Tempat Tujuan
                        </td>
                        <td>
                            a. SMKN 1 Kadipaten<br>
                            b. Terlampir
                        </td>
                    </tr>
                    <tr>
                        <td>7.</td>
                        <td>
                            a. Lamanya Perjalanan Dinas<br>
                            b. Tanggal Berangkat<br>
                            c. Tanggal Harus Kembali / Tiba di tempat Tujuan
                        </td>
                        <td>
                            a. 1 Hari<br>
                            b. {{ \Carbon\Carbon::parse($infoNegosiasi['tgl_nego'])->translatedFormat('d F Y') ?? '-' }}
                            <br>
                            c. {{ \Carbon\Carbon::parse($infoNegosiasi['tgl_nego'])->translatedFormat('d F Y') ?? '-' }}
                        </td>
                    </tr>
                    <tr>
                        <td>8.</td>
                        <td colspan="2">
                            <table width="100%" border="1" style="border-collapse: collapse; width: 100%;">
                                <tr>
                                    <th>Pengikut: Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Keterangan</th>
                                </tr>
                                <tr>
                                    <td>
                                        1. ............<br>
                                    </td>
                                    <td>
                                        ............<br>
                                    </td>
                                    <td>
                                        ............<br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>9.</td>
                        <td>
                            Pembebanan Anggaran<br>
                            a. Instansi<br>
                            b. Akun<br>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10.</td>
                        <td>Keterangan lain-lain</td>
                        <td></td>
                    </tr>
                </table>
                *) Coret yang tidak perlu
                <table style="border-collapse: collapse; width: 100%;">
                    <tr>
                        <td width="50%"></td>
                        <td>
                            Dikeluarkan di: Kadipaten<br>
                            Tanggal:
                            {{ \Carbon\Carbon::parse($infoNegosiasi['titimangsa'])->translatedFormat('d F Y') ?? '-' }}<br>
                            Pengguna Anggaran/Kuasa Pengguna Anggaran<br>
                            Kepala Sekolah,
                            {{-- <div>
                                <img src='{{ URL::asset('images/damudin.png') }}' border='0' height='110'
                                    style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -120px;margin-top:-15px;'>
                            </div>
                            <div><img src='{{ URL::asset('images/stempel.png') }}' border='0' height='180'
                                    width='184'
                                    style=' position: absolute; padding: 0px 2px 15px -650px; margin-left: -135px;margin-top:-50px;'>
                            </div> --}}
                            <p>&nbsp;</p>
                            <strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>
                            Pembina Utama Muda<br>
                            NIP. 197403021998031002
                        </td>
                    </tr>
                </table>
            </td>
            <td style="width: 50%;vertical-align:top;">
                <table border="1" style="border-collapse: collapse; width: 100%;">
                    <!-- Bagian I -->
                    <tr>
                        <td style="width: 50%;">
                            <table width="100%" style="border-collapse: collapse; width: 100%;">
                                <tr>
                                    <td>I.</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 50%;">
                            <table width="100%" style="border-collapse: collapse; width: 100%;">
                                <tr>
                                    <td width="100">Berangkat dari (Tempat kedudukan)</td>
                                    <td>:</td>
                                    <td>Kadipaten</td>
                                </tr>
                                <tr>
                                    <td>Ke</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Pada Tanggal</td>
                                    <td>:</td>
                                    <td>{{ \Carbon\Carbon::parse($infoNegosiasi['tgl_nego'])->translatedFormat('d F Y') ?? '-' }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">
                            <table width="100%" style="border-collapse: collapse; width: 100%;">
                                <tr>
                                    <td width="20">II.</td>
                                    <td width="100">Tiba di</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Pada Tanggal</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kepala</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </td>
                        <td style="width: 50%;">
                            <table width="100%" style="border-collapse: collapse; width: 100%;">
                                <tr>
                                    <td width="100">Berangkat dari</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Ke</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Pada Tanggal</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">
                            <table width="100%" style="border-collapse: collapse; width: 100%;">
                                <tr>
                                    <td width="20">III.</td>
                                    <td width="100">Tiba di</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Pada Tanggal</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kepala</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </td>
                        <td style="width: 50%;">
                            <table width="100%" style="border-collapse: collapse; width: 100%;">
                                <tr>
                                    <td width="100">Berangkat dari</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Ke</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Pada Tanggal</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;">
                            <table width="100%" style="border-collapse: collapse; width: 100%;">
                                <tr>
                                    <td width="20">IV.</td>
                                    <td width="100">Tiba di</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Pada Tanggal</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Kepala</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                            </table>
                            <p>&nbsp;</p>
                            <p>&nbsp;</p>
                        </td>
                        <td style="width: 50%;">
                            <table width="100%" style="border-collapse: collapse; width: 100%;">
                                <tr>
                                    <td width="100">Berangkat dari</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Ke</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Pada Tanggal</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <table width="100%" style="border-collapse: collapse; width: 100%;">
                                <tr>
                                    <td width="20">V.</td>
                                    <td width="100">Tiba kembali di</td>
                                    <td width="10">:</td>
                                    <td>Kadipaten</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>Pada Tanggal</td>
                                    <td>:</td>
                                    <td>{{ \Carbon\Carbon::parse($infoNegosiasi['tgl_nego'])->translatedFormat('d F Y') ?? '-' }}
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td colspan="3">Telah diperiksa dengan keterangan bahwa perjalanan tersebut atas
                                        perintahnya dan semata-mata untuk kepentingan jabatan dalam waktu yang
                                        sesingkat-singkatnya.</td>
                                </tr>
                            </table>

                            <table style="border-collapse: collapse; width: 100%;">
                                <tr>
                                    <td width="50%"></td>
                                    <td>
                                        Pengguna Anggaran/Kuasa Pengguna Anggaran<br>
                                        Kepala Sekolah,
                                        {{-- <div>
                                            <img src='{{ URL::asset('images/damudin.png') }}' border='0'
                                                height='110'
                                                style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -120px;margin-top:-25px;'>
                                        </div>
                                        <div><img src='{{ URL::asset('images/stempel.png') }}' border='0'
                                                height='180' width='184'
                                                style=' position: absolute; padding: 0px 2px 15px -650px; margin-left: -135px;margin-top:-60px;'>
                                        </div> --}}
                                        <p>&nbsp;</p>
                                        <strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>
                                        Pembina Utama Muda<br>
                                        NIP. 197403021998031002
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="border-collapse: collapse; width: 100%;">
                            VI. PERHATIAN<br>
                            PA/KPA yang menerbitkan SPD, pegawai yang melakukan perjalanan dinas, para pejabat yang
                            mengesahkan tanggal berangkat/tiba, serta bendahara pengeluaran bertanggung jawab
                            berdasarkan peraturan-peraturan Keuangan Negara menderita rugi akibat kesalahan, kelalaian
                            dan kealpaannya.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</div>
