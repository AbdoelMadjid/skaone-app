<style>
    .cetak-rapor {
        border-collapse: collapse;
        /* Menggabungkan garis border */
        width: 100%;
        /* Agar tabel mengambil seluruh lebar */
        text-decoration-color: black;
    }

    .cetak-rapor td {
        border: 1px solid black;
        /* Memberikan garis hitam pada semua th dan td */
        padding: 1px;
        /* Memberikan jarak dalam sel */
        text-align: left;
        /* Mengatur teks rata kiri */
    }

    .cetak-rapor th {
        border: 1px solid black;
        /* Memberikan garis hitam pada semua th dan td */
        background-color: #f2f2f2;
        /* Memberikan warna latar untuk header tabel */
        font-weight: bold;
        /* Mempertegas teks header */
        text-align: center;
        /* Mengatur teks rata kiri */
    }

    @media print {
        .cetak-rapor tr {
            page-break-inside: avoid;
            /* Hindari potongan di tengah baris */
        }

        .page-break {
            page-break-before: always;
            /* Paksa halaman baru */
        }
    }

    .no-border {
        border: 0 !important;
        border-collapse: collapse !important;
    }

    .cetak-rapor .no-border,
    .cetak-rapor .no-border th,
    .cetak-rapor .no-border td {
        border: none !important;
        /* Hapus border secara eksplisit */
    }

    .text-center {
        text-align: center;
    }

    .note {
        font-size: 11px;
        margin-top: 10px;
    }

    .ttd-container {
        margin-left: 10%;
        width: 90%;
        /* Supaya tidak melewati batas kanan */
    }

    .ttd-wrapper {
        width: 100%;
        margin: 20px auto;
        font-family: "Times New Roman", Times, serif;
        font-size: 12px;
        border-collapse: collapse;
    }

    .ttd-section {
        width: 50%;
        vertical-align: top;
        text-align: left;
        /* Rata kiri */
    }

    .ttd-section td {
        padding: 3px;
    }

    .ttd-spacing {
        height: 45px;
    }

    .relative-wrapper {
        position: relative;
    }

    .ttd-img-kepsek {
        position: absolute;
        top: 20px;
        left: -75px;
        height: 80px;
        z-index: 1;
    }

    .ttd-img-stempel {
        position: absolute;
        top: -5px;
        left: -75px;
        height: 120px;
        z-index: 0;
    }

    @media print {
        .ttd-wrapper {
            page-break-inside: avoid;
        }
    }
</style>
<div id='cetak-skkb' style='@page {size: A4;}'>
    <div class='table-responsive'>
        <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td align='center'><img src="{{ URL::asset('images/kossurat.jpg') }}" alt="" height="154"
                        width="700" border="0"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style='font-size:18px;text-align:center;'><strong>SURAT KETERANGAN KELAKUAN BAIK</strong>
                </td>
            </tr>
            <tr>
                <td style='font-size:12px;text-align:center;'><strong>Nomor :
                        570/TU.01.02/SMKN1KDP.CADISDIKWIL.IX</strong>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
        </table>
        <table style='margin: 0 auto;width:80%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td width='50'>&nbsp;</td>
                <td align='justify'>
                    <p style='padding-bottom:-25px;'>
                        Yang bertanda tangan di bawah ini:</p>
                    <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                        <tr>
                            <td width='15'>&nbsp;</td>
                            <td>
                                <table>
                                    <tr>
                                        <td width='170'>Nama</td>
                                        <td width='10'>:</td>
                                        <td><strong>H. Damudin, S.Pd., M.Pd.</strong></td>
                                    </tr>
                                    <tr>
                                        <td>NIP</td>
                                        <td>:</td>
                                        <td>19740302 199803 1 002</td>
                                    </tr>
                                    <tr>
                                        <td>Pangkat/Golongan</td>
                                        <td>:</td>
                                        <td>Pembina Utama Muda, IV/C</td>
                                    </tr>
                                    <tr>
                                        <td>Jabatan</td>
                                        <td>:</td>
                                        <td>Kepala Sekolah</td>
                                    </tr>
                                    <tr>
                                        <td valign='top'>Alamat</td>
                                        <td valign='top'>:</td>
                                        <td>Jalan Siliwangi No. 30 Kadipaten Majalengka</td>
                                    </tr>
                                </table>
                            </td>
                            <td width='40'>&nbsp;</td>
                        </tr>
                    </table>
                    <p style='padding-bottom:-25px;padding-top:20px;'>
                        Menerangkan:</p>
                    <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                        <tr>
                            <td width='15'>&nbsp;</td>
                            <td>
                                <table>
                                    <tr>
                                        <td width='170'>Nama</td>
                                        <td width='10'>:</td>
                                        <td><strong>{!! $dataSiswa->nama_lengkap !!}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Tempat, Tanggal Lahir</td>
                                        <td>:</td>
                                        <td>{!! ucwords(strtolower($dataSiswa->tempat_lahir)) !!},
                                            {!! formatTanggalIndonesia($dataSiswa->tanggal_lahir) !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Kelamin</td>
                                        <td>:</td>
                                        <td>{!! $dataSiswa->jenis_kelamin !!}</strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Induk Siswa</td>
                                        <td>:</td>
                                        <td>{!! $dataSiswa->nis !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Induk Siswa Nasional</td>
                                        <td>:</td>
                                        <td>{!! $dataSiswa->nisn !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Program Keahlian</td>
                                        <td>:</td>
                                        <td>{!! $dataSiswa->nama_pk !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Konsentrasi Keahlian</td>
                                        <td>:</td>
                                        <td>{!! $dataSiswa->nama_kk !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Nama Orang Tua</td>
                                        <td>:</td>
                                        <td>{!! ucwords(strtolower($dataSiswa->nm_ayah)) !!}</td>
                                    </tr>
                                    <tr>
                                        <td valign='top'>Alamat</td>
                                        <td valign='top'>:</td>
                                        <td>
                                            @if ($dataSiswa->alamat_blok)
                                                Blok {{ ucwords(strtolower($dataSiswa->alamat_blok)) }},
                                            @endif
                                            @if ($dataSiswa->alamat_rt)
                                                RT {{ ucwords(strtolower($dataSiswa->alamat_rt)) }} / RW
                                                {{ ucwords(strtolower($dataSiswa->alamat_rw)) }}, <br>
                                            @endif
                                            @if ($dataSiswa->alamat_desa)
                                                Desa/Kelurahan {{ ucwords(strtolower($dataSiswa->alamat_desa)) }}
                                            @endif
                                            @if ($dataSiswa->alamat_kec)
                                                Kecamatan {{ ucwords(strtolower($dataSiswa->alamat_kec)) }}<br>
                                            @endif
                                            @if ($dataSiswa->alamat_kab)
                                                Kabupaten {{ ucwords(strtolower($dataSiswa->alamat_kab)) }}
                                            @endif
                                            @if ($dataSiswa->alamat_kodepos)
                                                Kode Pos : {{ $dataSiswa->alamat_kodepos }}
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td width='40'>&nbsp;</td>
                        </tr>
                    </table>
                </td>
                <td width='40'>&nbsp;</td>
            </tr>
        </table>
        <table style='margin: 0 auto;width:80%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td width='50'>&nbsp;</td>
                <td align='justify'><br><br>
                    Yang bersangkutan selama menjadi siswa di
                    SMKN 1 Kadipaten menurut pengamatan kami, berkelakuan baik dan tidak
                    terlibat dalam penyalahgunaan obat-obat terlarang<br><br>
                    Demikian surat keterangan ini kami buat untuk dipergunakan
                    sebagaimana mestinya.
                </td>
                <td width='40'>&nbsp;</td>
            </tr>
        </table>
        <br><br>

        <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td width='25'>&nbsp;</td>
                <td>
                    <p style='margin-bottom:-2px;margin-top:-2px'>&nbsp;</p>
                    <table width='70%'
                        style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                        <tr>
                            <td width='400'></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td style='padding:4px 8px;'>
                                Majalengka, 05 Mei 2025<br>
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
