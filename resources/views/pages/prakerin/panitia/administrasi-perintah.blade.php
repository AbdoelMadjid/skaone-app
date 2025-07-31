<div id='cetak-surat-perintah' style='@page {size: A4;}'>
    <div class='table-responsive'>
        <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td align='center'><img src="{{ URL::asset('images/kopsuratbaru.jpg') }}" alt="" height="154"
                        width="700" border="0"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style='text-align:center;'><strong style='font-size:24px;'>SURAT
                        PERINTAH</strong><br>
                    <strong style='font-size:12px;'>Nomor : {{ $infoNegosiasi['nomor_surat'] ?? '-' }}</strong>
                </td>
            </tr>
        </table>
        <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td>
                    <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                        <tr>
                            <td style="width:80%">
                                <table>
                                    <tr>
                                        <td style="width:100px;">Dasar </td>
                                        <td style="width:25px;">:</td>
                                        <td>Perintah Kepala Sekolah</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                        <tr>
                            <td style="width:80%">
                                <table>
                                    <tr>
                                        <td style="width:100px;">Kepada </td>
                                        <td style="width:25px;">:</td>
                                        <td>
                                            <table>
                                                <tr>
                                                    <td width="170">Nama</td>
                                                    <td width="10">:</td>
                                                    <td>
                                                        <strong>
                                                            {{ $infoNegosiasi['nama_lengkap'] ?? '-' }}
                                                        </strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>NIP</td>
                                                    <td>:</td>
                                                    <td>{{ $infoNegosiasi['nip'] ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Pangkat/Golongan</td>
                                                    <td>:</td>
                                                    <td>{{ $infoNegosiasi['gol_ruang'] ?? '-' }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Kode Negosiator</td>
                                                    <td>:</td>
                                                    <td>{{ $infoNegosiasi['id_nego'] ?? '-' }}</td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table>
                        <tr>
                            <td style="width:100px;">Untuk</td>
                            <td style="width:25px;">:</td>
                            <td style="text-align: justify">
                                Untuk melaksanakan Negosiasi Tempat Praktek Kerja Lapangan (PKL) atau (DU/DI) Tahun
                                Pelajaran 2024/2025, Hari
                                {{ \Carbon\Carbon::parse($infoNegosiasi['tgl_nego'])->translatedFormat('l') ?? '-' }}
                                Tanggal
                                {{ \Carbon\Carbon::parse($infoNegosiasi['tgl_nego'])->translatedFormat('d F Y') ?? '-' }}.
                                Pelaksanaan negosiasi disesuaikan dengan kebutuhan yaitu :<br>
                                <ol style="margin:4px 0 4px -25px;">
                                    <li>Dapat dilakukan hanya satu kali kunjungan atau lebih dari satu kali kunjungan
                                    <li>Negosiasi dinyatakan selesai jika sudah terdapat kejelasan diterima atau tidak
                                        diterimanya permohonan ajuan ijin tempat pelaksanaan PKL atas nama SMKN 1
                                        Kadipaten
                                    <li>Negosiasi diupayakan tidak dilaksanakan pada jam-jam tatap muka reguler (PBM) di
                                        kelas
                                    <li>Dimohon untuk mengisi format isian pelaksanaan negosiasi dan kelengkapan lainnya
                                        serta melaporkannya kepada kelompok kerja (panitia) PKL.
                                </ol>
                                (Daftar nama Siswa Peserta PKL dan nama serta alamat DU/DI yang harus dikunjungi
                                dilampirkan)
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
                                Kadipaten,
                                {{ \Carbon\Carbon::parse($infoNegosiasi['titimangsa'])->translatedFormat('d F Y') ?? '-' }}
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
