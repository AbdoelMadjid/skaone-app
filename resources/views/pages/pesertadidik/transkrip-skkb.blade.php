<div id='cetak-nilai-ijazah' style='@page {size: A4;}'>
    <div class='table-responsive'>
        <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td align='center'><img src="{{ URL::asset('images/kossurat.jpg') }}" alt="" height="174"
                        width="811" border="0"></td>
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
            <tr>
                <td align='center' width='50%'>
                    <table align='center' width='70%' style='border-collapse:collapse;font:12px Times New Roman;'>
                        <tr>
                            <td width='50'>&nbsp;</td>
                            <td align='justify'>
                                <p style='padding-bottom:-25px;'>
                                    Yang bertanda tangan di bawah ini:</p>
                                <table
                                    style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                                    <tr>
                                        <td width='55'>&nbsp;</td>
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
                                <table
                                    style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                                    <tr>
                                        <td width='55'>&nbsp;</td>
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
                                                    <td>{!! ucwords(strtolower($datasiswalulus->orangtua)) !!}</td>
                                                </tr>
                                                <tr>
                                                    <td valign='top'>Alamat</td>
                                                    <td valign='top'>:</td>
                                                    <td>
                                                        @if ($dataSiswa->ortu_alamat_blok)
                                                            Blok {{ $dataSiswa->ortu_alamat_blok }}, <br>
                                                        @endif
                                                        @if ($dataSiswa->ortu_alamat_desa)
                                                            Desa/Kelurahan {{ $dataSiswa->ortu_alamat_desa }}
                                                        @endif
                                                        @if ($dataSiswa->ortu_alamat_kec)
                                                            Kecamatan {{ $dataSiswa->ortu_alamat_kec }}<br>
                                                        @endif
                                                        @if ($dataSiswa->ortu_alamat_kab)
                                                            Kabupaten {{ $dataSiswa->ortu_alamat_kab }}
                                                        @endif
                                                        @if ($dataSiswa->ortu_alamat_kodepos)
                                                            Kode Pos : {{ $dataSiswa->ortu_alamat_kodepos }}
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
                    <table align='center' width='70%' style='border-collapse:collapse;font:12px Times New Roman;'>
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

                                <table width='70%'
                                    style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                                    <tr>
                                        <td width='450' style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'>
                                            Kadipaten, 05 Mei 2025<br>
                                            Kepala Sekolah,
                                            <div>
                                                <img src='{{ URL::asset('images/damudin.png') }}' border='0'
                                                    height='110'
                                                    style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -120px;margin-top:-15px;'>
                                            </div>
                                            <div><img src='{{ URL::asset('images/stempel.png') }}' border='0'
                                                    height='180' width='184'
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
                </td>
            </tr>
        </table>
        <br><br><br><br><br><br>
    </div>
</div>
