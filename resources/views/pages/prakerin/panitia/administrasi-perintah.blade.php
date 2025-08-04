<div id='cetak-surat-perintah' style='@page {size: A4;}'>
    <div class='table-responsive'>
        <table style='margin: 0 auto;width:100%;border-collapse:collapse;'>
            <tr>
                <td align='center'><img src="{{ URL::asset('images/kopsuratbaru.jpg') }}" alt="" height="154"
                        width="700" border="0"></td>
            </tr>
        </table>
        <br>
        <table style='margin: 0 auto;width:100%;border-collapse:collapse;'>
            <tr>
                <td style='text-align:center;'><strong style='font-size:24px;'>SURAT
                        PERINTAH</strong><br>
                    <strong>Nomor :
                        {{ $infoNegosiasi['nomor_surat_perintah'] ?? '-' }}</strong>
                </td>
            </tr>
        </table>
        <br><br>
        <table style='margin: 0 auto;width:90%;border-collapse:collapse;'>
            <tr>
                <td style="width:80px;">Dasar </td>
                <td style="width:5px;">:</td>
                <td>Perintah Kepala Sekolah</td>
            </tr>
        </table>
        <table style='margin: 0 auto;width:90%;border-collapse:collapse;'>
            <tr>
                <td style="width:80px;">Kepada </td>
                <td style="width:5px;">:</td>
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
        <br>
        <table style='margin: 0 auto;width:90%;border-collapse:collapse;'>
            <tr>
                <td style="width:80px;">Untuk</td>
                <td style="width:5px;">:</td>
                <td style="text-align: justify">
                    Untuk melaksanakan Negosiasi Tempat Praktek Kerja Lapangan (PKL) atau (DU/DI) Tahun
                    Pelajaran {{ $tahunAjaranAktif->tahunajaran }}, Hari
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
        <br><br>
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
                    <p>&nbsp;</p>
                    <strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>
                    Pembina Utama Muda<br>
                    NIP. 19740302 199803 1 002
                </td>
            </tr>
        </table>
        <div class="break-page"></div>
        <br><br><br>
        <table style='margin: 0 auto;width:100%;border-collapse:collapse;'>
            <tr>
                <td style='text-align:center;'>
                    <strong style='font-size:24px;'>LAPORAN PERJALANAN DINAS</strong>
                </td>
            </tr>
        </table>
        <br><br>
        <table style='margin: 0 auto;width:93%;border-collapse:collapse;'>
            <tr>
                <td style="width:170px">NAMA</td>
                <td style="width:5px">:</td>
                <td>{{ $infoNegosiasi['nama_lengkap'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>NIP</td>
                <td>:</td>
                <td>{{ $infoNegosiasi['nip'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>JABATAN</td>
                <td>:</td>
                <td>{{ $infoNegosiasi['jabatan'] ?? '-' }}</td>
            </tr>
            <tr>
                <td>KEGIATAN</td>
                <td>:</td>
                <td>Pengajuan Praktik Kerja Lapangan (PKL)</td>
            </tr>
            <tr>
                <td>LAPORAN KEGIATAN</td>
                <td>:</td>
                <td>.........................................................................................................................
                </td>
            </tr>
            @for ($i = 0; $i < 12; $i++)
                <tr>
                    <td></td>
                    <td></td>
                    <td style="padding-top: 20px;">
                        .........................................................................................................................
                    </td>
                </tr>
            @endfor
        </table>
        <br><br>
        <table width='70%' style='margin: 0 auto;width:100%;border-collapse:collapse;'>
            <tr>
                <td width='300'></td>
                <td></td>
                <td></td>
                <td></td>
                <td style='padding:4px 8px;'>
                    ......................., .......................................20......
                    <br>
                    Yang Melakukan Perjalanan Dinas,
                    <p>&nbsp;</p>
                    <strong>{{ $infoNegosiasi['nama_lengkap'] ?? '-' }}</strong><br>
                    NIP. {{ $infoNegosiasi['nip'] ?? '-' }}
                </td>
            </tr>
        </table>
    </div>
</div>
