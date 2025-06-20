<div id="printable-area-cover">
    <div id='cetak-cover' style='@page {size: A4;}'>
        <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td><img src="data:image/png;base64,{{ $barcodeImage }}" alt="Barcode"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style='font-size:22px;text-align:center;'><strong>LAPORAN CAPAIAN KOMPETENSI
                        SISWA</strong>
                    </th>
            </tr>
            <tr>
                <td style='font-size:22px;text-align:center;'><strong>SEKOLAH MENENGAH KEJURUAN</strong>
                </td>
            </tr>
            <tr>
                <td style='font-size:22px;text-align:center;'><strong>( SMK )</strong></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style='font-size:16px;'>
                    <table align='center'>
                        <tr>
                            <td>Bidang Keahlian</td>
                            <td width='5%' align='center'>:</td>
                            <td>{{ $dataSiswa->nama_bk }}</td>
                        </tr>
                        <tr>
                            <td>Program Keahlian</td>
                            <td width='5%' align='center'>:</td>
                            <td>{{ $dataSiswa->nama_pk }}</td>
                        </tr>
                        <tr>
                            <td>Kompetensi Keahlian</td>
                            <td width='5%' align='center'>:</td>
                            <td>{{ $dataSiswa->nama_kk }}</td>
                        </tr>
                        <tr>
                            <td>Nama Sekolah</td>
                            <td width='5%' align='center'>:</td>
                            <td>{{ $school->nama_sekolah }}</td>
                        </tr>
                        <tr>
                            <td valign='top'>Alamat Sekolah</td>
                            <td width='5%' align='center' valign='top'>:</td>
                            <td>
                                {{ $school->alamat_jalan }}
                                @if ($school->alamat_no)
                                    No. {{ $school->alamat_no }}
                                @endif
                                Blok {{ $school->alamat_blok }},
                                Desa/Kelurahan {{ $school->alamat_desa }}<br>
                                Kode Pos : {{ $school->alamat_kodepos }}
                                Telp. {{ $school->alamat_telepon }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align=center><img src="{{ URL::asset('build/images/tutwurihandayani.png') }}" alt=""
                        height="250"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style='font-size:16px;text-align:center;'>Nama Siswa</td>
            </tr>
            <tr>
                <td style='font-size:18px;text-align:center;'><strong>{!! $dataSiswa->nama_lengkap ?? '' !!}</strong>
                </td>
            </tr>
            <tr>
                <td style='font-size:16px;text-align:center;'>NIS : {{ $dataSiswa->nis ?? '' }}</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style='font-size:16px;text-align:center;'><strong>KEMENTRIAN PENDIDIKAN DAN
                        KEBUDAYAAN</strong>
                </td>
            </tr>
            <tr>
                <td style='font-size:16px;text-align:center;'><strong>REPUBLIK INDONESIA</strong></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
        </table>
    </div>
</div>
