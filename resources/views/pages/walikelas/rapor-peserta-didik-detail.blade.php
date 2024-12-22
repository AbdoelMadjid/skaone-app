<div class="tab-content">
    <div class="tab-pane active" id="cover" role="tabpanel">
        <p class="mt-4">&nbsp;</p>
        <div id='cetak-cover' style='@page {size: A4;}'>
            <div class='table-responsive'>
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
                        <td style='font-size:22px;text-align:center;'><strong>LAPORAN CAPAIAN KOMPETENSI SISWA</strong>
                            </th>
                    </tr>
                    <tr>
                        <td style='font-size:22px;text-align:center;'><strong>SEKOLAH MENENGAH KEJURUAN</strong></td>
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
                        <td align=center><img src="{{ URL::asset('build/images/tutwurihandayani.png') }}"
                                alt="" height="250"></td>
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
                        <td style='font-size:18px;text-align:center;'><strong>{!! $dataSiswa->nama_lengkap !!}</strong></td>
                    </tr>
                    <tr>
                        <td style='font-size:16px;text-align:center;'>NIS : {{ $dataSiswa->nis }}</td>
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
                                KEBUDAYAAN</strong></td>
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
        <p class="mt-4">&nbsp;</p>
        <p class="mt-4">&nbsp;</p>
        <p class="mt-4">&nbsp;</p>
    </div>
    <div class="tab-pane" id="identsekolah" role="tabpanel">
        <p class="mt-4">&nbsp;</p>
        {{-- IDENTITAS SEKOLAH --}}
        <div id='cetak-sekolah' style='@page {size: A4;} page-break-before: always;'>
            <div class='table-responsive'>
                <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:16px Times New Roman;'>
                    <tr>
                        <td class='text-center'>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style='font-size:18px;text-align:center;'><strong>RAPOR SISWA</strong></td>
                    </tr>
                    <tr>
                        <td style='font-size:18px;text-align:center;'><strong>SEKOLAH MENENGAH KEJURUAN</strong></td>
                    </tr>
                    <tr>
                        <td style='font-size:18px;text-align:center;'><strong>( SMK )</strong></td>
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
                        <td align='center' width='50%'>
                            <table align='center'>
                                <tr>
                                    <td width='200'>Nama Sekolah</td>
                                    <td width='25'>:</td>
                                    <td>{{ $school->nama_sekolah }}</td>
                                </tr>
                                <tr>
                                    <td colspan='3'>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>NPSN</td>
                                    <td>:</td>
                                    <td>{{ $school->npsn }}</td>
                                </tr>
                                <tr>
                                    <td colspan='3'>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td valign='top'>Alamat Sekolah</td>
                                    <td valign='top'>:</td>
                                    <td valign='top'>{{ $school->alamat_jalan }}
                                        @if ($school->alamat_no)
                                            No. {{ $school->alamat_no }}
                                        @endif
                                        Blok {{ $school->alamat_blok }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='3'>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td valign='top'></td>
                                    <td valign='top'></td>
                                    <td valign='top'>Kode Pos : {{ $school->alamat_kodepos }}</td>
                                </tr>
                                <tr>
                                    <td colspan='3'>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Kelurahan</td>
                                    <td>:</td>
                                    <td>{{ $school->alamat_desa }}</td>
                                </tr>
                                <tr>
                                    <td colspan='3'>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td>:</td>
                                    <td>{{ $school->alamat_kec }}</td>
                                </tr>
                                <tr>
                                    <td colspan='3'>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Kota/Kabupaten</td>
                                    <td>:</td>
                                    <td>{{ $school->alamat_kab }}</td>
                                </tr>
                                <tr>
                                    <td colspan='3'>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Provinsi</td>
                                    <td>:</td>
                                    <td>{{ $school->alamat_provinsi }}</td>
                                </tr>
                                <tr>
                                    <td colspan='3'>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Web Site</td>
                                    <td>:</td>
                                    <td>{{ $school->alamat_website }}</td>
                                </tr>
                                <tr>
                                    <td colspan='3'>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{ $school->alamat_email }}</td>
                                </tr>
                                <tr>
                                    <td colspan='3'>&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <p class="mt-4">&nbsp;</p>
        <p class="mt-4">&nbsp;</p>
        <p class="mt-4">&nbsp;</p>
        {{-- IDENITTAS SISWA --}}
        <div id='cetak-identsiswa' style='@page {size: A4;} page-break-before: always;'>
            <img style=' position: absolute; padding: 250px 2px 15px -250px; margin-left:180px;margin-top:215px;'
                src='img/logosmktrans.png' border='0' alt=''>
            <div class='table-responsive'>
                <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:14px Times New Roman;'>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style='font-size:18px;text-align:center;'><strong>KETERANGAN TENTANG DIRI SISWA</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align='center' width='50%'>
                            <table width:'500'>
                                <tr>
                                    <td width='35' style='padding:4px 8px;'>1.</td>
                                    <td width='200' style='padding:4px 8px;'>Nama Siswa Lengkap</td>
                                    <td width='25' style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! $dataSiswa->nama_lengkap !!}</td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'>2.</td>
                                    <td style='padding:4px 8px;'>Nomor Induk/NISN</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! $dataSiswa->nis !!}/{!! $dataSiswa->nisn !!}</td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'>3.</td>
                                    <td style='padding:4px 8px;'>Tempat, Tanggal Lahir</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! ucwords(strtolower($dataSiswa->tempat_lahir)) !!},
                                        {!! formatTanggalIndonesia($dataSiswa->tanggal_lahir) !!}</td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'>4.</td>
                                    <td style='padding:4px 8px;'>Jenis Kelamin</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! $dataSiswa->jenis_kelamin !!}</td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'>5.</td>
                                    <td style='padding:4px 8px;'>Agama</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! $dataSiswa->agama !!}</td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'>6.</td>
                                    <td style='padding:4px 8px;'>Status dalam Keluarga</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! $dataSiswa->status_dalam_kel !!}</td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'>7.</td>
                                    <td style='padding:4px 8px;'>Anak ke</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! $dataSiswa->anak_ke !!}</td>
                                </tr>
                                <tr>
                                    <td valign='top' style='padding:4px 8px;'>8.</td>
                                    <td valign='top' style='padding:4px 8px;'>Alamat Siswa</td>
                                    <td valign='top' style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! $dataSiswa->status_dalam_kel !!}</td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'>9.</td>
                                    <td style='padding:4px 8px;'>Nomor Telepon Rumah</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! $dataSiswa->kontak_telepon !!}</td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'>10.</td>
                                    <td style='padding:4px 8px;'>Sekolah Asal</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! $dataSiswa->sekolah_asal !!}</td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'>11.</td>
                                    <td style='padding:4px 8px;'>Diterima di sekolah ini</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'></td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'></td>
                                    <td style='padding:4px 8px;'>Di kelas</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! $dataSiswa->diterima_kelas !!}</td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'></td>
                                    <td style='padding:4px 8px;'>Pada Tanggal</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! formatTanggalIndonesia($dataSiswa->diterima_tanggal) !!}</td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'>12.</td>
                                    <td style='padding:4px 8px;'>Nama Orang Tua</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'></td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'></td>
                                    <td style='padding:4px 8px;'>a. Ayah</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! ucwords(strtolower($dataSiswa->nm_ayah)) !!}</td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'></td>
                                    <td style='padding:4px 8px;'>b. Ibu</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! ucwords(strtolower($dataSiswa->nm_ibu)) !!}</td>
                                </tr>
                                <tr>
                                    <td valign='top' style='padding:4px 8px;'>13.</td>
                                    <td valign='top' style='padding:4px 8px;'>Alamat Orang Tua</td>
                                    <td valign='top' style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>
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
                                <tr>
                                    <td style='padding:4px 8px;'></td>
                                    <td style='padding:4px 8px;'>Telepon Orang Tua</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! $dataSiswa->ortu_kontak_telepon !!}</td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'>14.</td>
                                    <td style='padding:4px 8px;'>Pekerjaan Orang Tua</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'></td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'></td>
                                    <td style='padding:4px 8px;'>a. Ayah</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! $dataSiswa->pekerjaan_ayah !!}</td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'></td>
                                    <td style='padding:4px 8px;'>a. Ibu</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'>{!! $dataSiswa->pekerjaan_ibu !!}</td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'>15.</td>
                                    <td style='padding:4px 8px;'>Nama Wali Siswa</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'></td>
                                </tr>
                                <tr>
                                    <td valign='top' style='padding:4px 8px;'>16.</td>
                                    <td valign='top' style='padding:4px 8px;'>Alamat Wali Siswa</td>
                                    <td valign='top' style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'></td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'>17.</td>
                                    <td style='padding:4px 8px;'>Pekerjaan Wali Siswa</td>
                                    <td style='padding:4px 8px;'>:</td>
                                    <td style='padding:4px 8px;'></td>
                                </tr>
                                <tr>
                                    <td colspan='4'>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;'></td>
                                    <td style='padding:4px 8px;'></td>
                                    <td style='padding:4px 8px;'></td>
                                    <td style='padding:4px 8px;'>
                                        Kadipaten, {!! formatTanggalIndonesia($dataSiswa->diterima_tanggal) !!}<br>
                                        Kepala Sekolah,
                                        <p>&nbsp;</p>
                                        <p>&nbsp;</p>
                                        <strong>{!! $kepsekCover->nama !!}</strong><br>
                                        NIP. {!! $kepsekCover->nip !!}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <p class="mt-4">&nbsp;</p>
        <p class="mt-4">&nbsp;</p>
        <p class="mt-4">&nbsp;</p>
        {{-- PETUNJUK --}}
        <div id='cetak-petunjuk' style='@page {size: A4;} page-break-before: always;'>
            <img style=' position: absolute; padding: 250px 2px 15px -250px; margin-left:180px;margin-top:215px;'
                src='img/logosmktrans.png' border='0' alt=''>
            <div class='table-responsive'>
                <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:14px Times New Roman;'>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style='font-size:18px;text-align:center;'><strong>PETUNJUK PENGISIAN</strong></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align='center' width='50%'>
                            <table align='center' width='80%'>
                                <tr>
                                    <td>
                                        <table>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>1.</td>
                                                <td align='justify' style='padding:3px 6px;'>Rapor merupakan ringkasan
                                                    hasil
                                                    penilaian terhadap seluruh aktivitas pembelajaran yang dilakukan
                                                    siswa dalam
                                                    kurun waktu tertentu;</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>2.</td>
                                                <td align='justify' style='padding:3px 6px;'>Rapor dipergunakan selama
                                                    siswa
                                                    yang bersangkutan mengikuti seluruh program pembelajaran di Sekolah
                                                    Menengah
                                                    Kejuruan tersebut;</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>3.</td>
                                                <td align='justify' style='padding:3px 6px;'>Identitas Sekolah diisi
                                                    dengan
                                                    data yang sesuai dengan keberadaan Sekolah Menengah Kejuruan;</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>4.</td>
                                                <td align='justify' style='padding:3px 6px;'>Keterangan tentang diri
                                                    Siswa
                                                    diisi lengkap;</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>5.</td>
                                                <td align='justify' style='padding:3px 6px;'>Rapor harus dilengkapi
                                                    dengan pas
                                                    foto berwarna (3 x 4) dan pengisiannya dilakukan oleh Wali Kelas;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>6.</td>
                                                <td align='justify' style='padding:3px 6px;'>Deskripsi sikap spiritual
                                                    diambil
                                                    dari hasil observasi terutama pada mata pelajaran Pendidikan Agama
                                                    dan Budi
                                                    pekerti, dan PPKn;</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>7.</td>
                                                <td align='justify' style='padding:3px 6px;'>Deskripsi sikap sosial
                                                    diambil
                                                    dari hasil observasi pada semua mata pelajaran;</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>8.</td>
                                                <td align='justify' style='padding:3px 6px;'>Deskripsi pada kompetensi
                                                    sikap
                                                    ditulis dengan kalimat positif untuk aspek yang sangat baik atau
                                                    Cukup baik;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>9.</td>
                                                <td align='justify' style='padding:3px 6px;'>Capaian siswa dalam
                                                    kompetensi
                                                    pengetahuan dan kompetensi keterampilan ditulis dalam bentuk angka,
                                                    predikat
                                                    dan deskripsi untuk masing-masing mata pelajaran;</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>10.</td>
                                                <td align='justify' style='padding:3px 6px;'>Predikat ditulis dalam
                                                    bentuk
                                                    huruf sesuai kriteria;</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>11.</td>
                                                <td align='justify' style='padding:3px 6px;'>Kolom KB (Ketuntasan
                                                    Belajar)
                                                    merupakan acuan bagi kriteria kenaikan kelas sehingga wali kelas
                                                    wajib
                                                    menerangkan konsekuensi ketuntasan belajar tersebut kepada orang
                                                    tua/wali;
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>12.</td>
                                                <td align='justify' style='padding:3px 6px;'>Deskripsi pada kompetensi
                                                    pengetahuan dan kompetensi keterampilan ditulis dengan kalimat
                                                    positif
                                                    sesuai capaian tertinggi dan terendah yang diperoleh siswa. Apabila
                                                    capaian
                                                    kompetensi dasar yang diperoleh dalam muatan pelajaran itu sama,
                                                    kolom
                                                    deskripsi ditulis berdasarkan capaian yang diperoleh;</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>13.</td>
                                                <td align='justify' style='padding:3px 6px;'>Laporan Praktik Kerja
                                                    Lapangan
                                                    diisi berdasarkan kegiatan praktik kerja yang diikuti oleh siswa di
                                                    industri/perusahaan mitra;</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>14.</td>
                                                <td align='justify' style='padding:3px 6px;'>Laporan Ekstrakurikuler
                                                    diisi
                                                    berdasarkan kegiatan ekstrakurikuler yang diikuti oleh siswa;</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>15.</td>
                                                <td align='justify' style='padding:3px 6px;'>Saran-saran wali kelas
                                                    diisi
                                                    berdasarkan kegiatan yang perlu mendapatkan perhatian siswa;</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>16.</td>
                                                <td align='justify' style='padding:3px 6px;'>Prestasi diisi dengan
                                                    prestasi
                                                    yang dicapai oleh siswa dalam bidang akademik dan non akademik;</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>17.</td>
                                                <td align='justify' style='padding:3px 6px;'>Ketidakhadiran diisi
                                                    dengan data
                                                    akumulasi ketidakhadiran siswa karena sakit, izin, atau tanpa
                                                    keterangan
                                                    selama satu semester.</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>18.</td>
                                                <td align='justify' style='padding:3px 6px;'>Tanggapan orang tua/wali
                                                    adalah
                                                    tanggapan atas pencapaian hasil belajar siswa;</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>19.</td>
                                                <td align='justify' style='padding:3px 6px;'>Keterangan pindah keluar
                                                    sekolah
                                                    diisi dengan alasan kepindahan. Sedangkan pindah masuk diisi dengan
                                                    sekolah
                                                    asal.</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'>21.</td>
                                                <td align='justify' style='padding:3px 6px;'>Predikat capaian
                                                    kompetensi :
                                                </td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'></td>
                                                <td align='justify' style='padding:3px 6px;'>Sangat Baik (A) : 86 -
                                                    100</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'></td>
                                                <td align='justify' style='padding:3px 6px;'>Baik (B) : 71 - 85</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'></td>
                                                <td align='justify' style='padding:3px 6px;'>Cukup (C) : 56 - 70</td>
                                            </tr>
                                            <tr>
                                                <td valign='top' style='padding:3px 6px;'></td>
                                                <td align='justify' style='padding:3px 6px;'>Kurang (D) : 0 - 55</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <p class="mt-4">&nbsp;</p>
        <p class="mt-4">&nbsp;</p>

    </div>
    <div class="tab-pane" id="nilairapor" role="tabpanel">
        <p class="mt-4">&nbsp;</p>
        <div id='cetak-hal1' style='@page {size: A4;}'>
            <div class='table-responsive'>
                <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                    <tr>
                        <td align='center' width='50%'>
                            <table align='center' width='90%'>
                                <tr>
                                    <td colspan='2'>&nbsp;</td>
                                </tr>
                                <tr>
                                    <td valign='top'>
                                        <table>
                                            <tr>
                                                <td style='padding: 2px 0px;'>Nama Siswa</td>
                                                <td style='padding: 2px 0px;'>:</td>
                                                <td style='padding: 2px 0px;'><strong>{!! strtoupper($dataSiswa->nama_lengkap) !!}</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style='padding: 2px 0px;'>NIS / NISN</td>
                                                <td style='padding: 2px 0px;'>:</td>
                                                <td style='padding: 2px 0px;'>{!! $dataSiswa->nis !!} /
                                                    {!! $dataSiswa->nisn !!}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width='125' style='padding: 2px 0px;'>Nama Sekolah</td>
                                                <td width='20' style='padding: 2px 0px;'>:</td>
                                                <td style='padding: 2px 0px;'>{{ $school->nama_sekolah }}</td>
                                            </tr>
                                            <tr>
                                                <td style='padding: 2px 0px;'>Alamat</td>
                                                <td style='padding: 2px 0px;'>:</td>
                                                <td style='padding: 2px 0px;'>{{ $school->alamat_jalan }}
                                                    @if ($school->alamat_no)
                                                        No. {{ $school->alamat_no }}
                                                    @endif
                                                    {{ $school->alamat_kec }} {{ $school->alamat_kab }}
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td valign='top'>
                                        <table>
                                            <tr>
                                                <td width='125' style='padding: 2px 0px;'>Kompetensi Keahlian</td>
                                                <td width='20' style='padding: 2px 0px;'>:</td>
                                                <td style='padding: 2px 0px;'>{{ $dataSiswa->nama_kk }}</td>
                                            </tr>
                                            <tr>
                                                <td width='125' style='padding: 2px 0px;'>Kelas</td>
                                                <td width='20' style='padding: 2px 0px;'>:</td>
                                                <td style='padding: 2px 0px;'>{{ $dataSiswa->rombel_nama }}</td>
                                            </tr>
                                            <tr>
                                                <td style='padding: 2px 0px;'>Semester</td>
                                                <td style='padding: 2px 0px;'>:</td>
                                                <td style='padding: 2px 0px;'>{{ $kbmData->semester }}</td>
                                            </tr>
                                            <tr>
                                                <td style='padding: 2px 0px;'>Tahun Ajaran</td>
                                                <td style='padding: 2px 0px;'>:</td>
                                                <td style='padding: 2px 0px;'>{{ $dataSiswa->tahun_ajaran }}</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan='2'>
                                        <hr>
                                    </td>
                                </tr>
                            </table>
                            <table align='center' width='90%'>
                                <tr>
                                    <td style='font-size:16px;text-align:center;'>
                                        <p><strong>LAPORAN HASIL BELAJAR</p></strong>

                                    </td>
                                </tr>
                                <tr>
                                    <td align='center'>
                                        <table class='cetak-rapor'>
                                            <thead>
                                                <tr>
                                                    <th style='text-align:center;padding:4px 8px;'><strong>No.</th>
                                                    <th style='text-align:center;padding:4px 8px;' width='200'>Mata
                                                        Pelajaran
                                                    </th>
                                                    <th style='text-align:center;padding:4px 8px;'>Nilai Akhir</th>
                                                    <th style='text-align:center;padding:4px 8px;'>Capaian Kompetensi
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td colspan='10' style='padding:4px 8px;font-size:12px;'>
                                                        <strong>A. Kelompok Mata Pelajaran Umum</strong>
                                                    </td>
                                                </tr>
                                                @foreach ($dataNilai as $key => $nilai)
                                                    @if ($nilai->kelompok === 'A')
                                                        @php
                                                            // Cek dan sesuaikan nama mata pelajaran berdasarkan agama siswa
                                                            if (
                                                                $nilai->mata_pelajaran ===
                                                                'Pendidikan Agama Islam dan Budi Pekerti'
                                                            ) {
                                                                if ($dataSiswa->agama === 'Protestan') {
                                                                    $mataPelajaran =
                                                                        'Pendidikan Agama Kristen Protestan dan Budi Pekerti';
                                                                    $guruMapel = 'Pendeta';
                                                                } elseif ($dataSiswa->agama === 'Katolik') {
                                                                    $mataPelajaran =
                                                                        'Pendidikan Agama Kristen Katolik dan Budi Pekerti';
                                                                    $guruMapel = 'Pendeta';
                                                                } else {
                                                                    $mataPelajaran =
                                                                        'Pendidikan Agama Islam dan Budi Pekerti';
                                                                    $guruMapel =
                                                                        $nilai->gelardepan .
                                                                        ucwords(strtolower($nilai->namalengkap)) .
                                                                        ', ' .
                                                                        $nilai->gelarbelakang;
                                                                }
                                                            } else {
                                                                $mataPelajaran = $nilai->mata_pelajaran;
                                                                $guruMapel =
                                                                    $nilai->gelardepan .
                                                                    ucwords(strtolower($nilai->namalengkap)) .
                                                                    ', ' .
                                                                    $nilai->gelarbelakang;
                                                            }
                                                        @endphp
                                                        <tr>
                                                            <td style='text-align:center;padding:4px 8px;font-size:12px;'
                                                                align='center'>{{ $loop->iteration }}</td>
                                                            <td style='padding:4px 8px;font-size:12px;'>
                                                                <strong>{{ $mataPelajaran }}</strong><br>
                                                                {{ $guruMapel }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ round(((float) $nilai->rerata_formatif + (float) $nilai->rerata_sumatif) / 2) }}
                                                            </td>
                                                            <td
                                                                style='padding:4px 8px;font-size:12px;text-align:justify;'>
                                                                {!! $nilai->deskripsi_nilai ?? '' !!}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                                <tr>
                                                    <td colspan='10' style='padding:4px 8px;font-size:14px;'>
                                                        <strong>B. Kelompok Mata Pelajaran Kejuruan</strong>
                                                    </td>
                                                </tr>
                                                @foreach ($dataNilai as $key => $nilai)
                                                    @if (in_array($nilai->kelompok, ['B1', 'B2', 'B3', 'B4', 'B5']))
                                                        <tr>
                                                            <td style='text-align:center;padding:4px 8px;font-size:12px;'
                                                                align='center'>{{ $loop->iteration }}</td>
                                                            <td style='padding:4px 8px;font-size:12px;'>
                                                                <strong>{{ $nilai->mata_pelajaran }}</strong><br>
                                                                {{ $nilai->gelardepan }}
                                                                {{ ucwords(strtolower($nilai->namalengkap)) }},
                                                                {{ $nilai->gelarbelakang }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ round(((float) $nilai->rerata_formatif + (float) $nilai->rerata_sumatif) / 2) }}<br>
                                                            </td>
                                                            <td
                                                                style='padding:4px 8px;font-size:12px;text-align:justify;'>
                                                                {!! $nilai->deskripsi_nilai ?? '' !!}
                                                            </td>
                                                        </tr>
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <span style='font:8px Times New Roman;'>{{ $dataSiswa->tahun_ajaran }}
                                            / {{ $kbmData->semester }} - {!! strtoupper($dataSiswa->nama_lengkap) !!}
                                            [{!! $dataSiswa->nis !!}
                                            {!! $dataSiswa->nisn !!}]</span>
                                        <br>
                                        catatan : angka yang ada di kolom capaian kompetensi merupakan nomor Tujuan
                                        Pembelajaran
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <p class="mt-4">&nbsp;</p>
        <p class="mt-4">&nbsp;</p>
    </div>

    <div class="tab-pane" id="activitas" role="tabpanel">
        <p class="mt-4">&nbsp;</p>
        <div id='cetak-hal2' style='@page {size: A4;} page-break-before: always;'>
            <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                <tr>
                    <td align='center' width='50%'>
                        <table align='center' width='90%'>
                            <tr>
                                <td colspan='2'>&nbsp;</td>
                            </tr>
                            <tr>
                                <td valign='top'>
                                    <table>
                                        <tr>
                                            <td style='padding: 2px 0px;'>Nama Siswa</td>
                                            <td style='padding: 2px 0px;'>:</td>
                                            <td style='padding: 2px 0px;'><strong>{!! strtoupper($dataSiswa->nama_lengkap) !!}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 2px 0px;'>NIS / NISN</td>
                                            <td style='padding: 2px 0px;'>:</td>
                                            <td style='padding: 2px 0px;'>{!! $dataSiswa->nis !!} /
                                                {!! $dataSiswa->nisn !!}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width='125' style='padding: 2px 0px;'>Nama Sekolah</td>
                                            <td width='20' style='padding: 2px 0px;'>:</td>
                                            <td style='padding: 2px 0px;'>{{ $school->nama_sekolah }}</td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 2px 0px;'>Alamat</td>
                                            <td style='padding: 2px 0px;'>:</td>
                                            <td style='padding: 2px 0px;'>{{ $school->alamat_jalan }}
                                                @if ($school->alamat_no)
                                                    No. {{ $school->alamat_no }}
                                                @endif
                                                {{ $school->alamat_kec }} {{ $school->alamat_kab }}
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td valign='top'>
                                    <table>
                                        <tr>
                                            <td width='125' style='padding: 2px 0px;'>Kompetensi Keahlian</td>
                                            <td width='20' style='padding: 2px 0px;'>:</td>
                                            <td style='padding: 2px 0px;'>{{ $dataSiswa->nama_kk }}</td>
                                        </tr>
                                        <tr>
                                            <td width='125' style='padding: 2px 0px;'>Kelas</td>
                                            <td width='20' style='padding: 2px 0px;'>:</td>
                                            <td style='padding: 2px 0px;'>{{ $dataSiswa->rombel_nama }}</td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 2px 0px;'>Semester</td>
                                            <td style='padding: 2px 0px;'>:</td>
                                            <td style='padding: 2px 0px;'>{{ $kbmData->semester }}</td>
                                        </tr>
                                        <tr>
                                            <td style='padding: 2px 0px;'>Tahun Ajaran</td>
                                            <td style='padding: 2px 0px;'>:</td>
                                            <td style='padding: 2px 0px;'>{{ $dataSiswa->tahun_ajaran }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='2'>
                                    <hr>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
            <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                <tr>
                    <td align='center' width='50%'>
                        <p></p>
                        <table align='center' width='90%'>
                            <tr>
                                <td>
                                    <strong>Ekstrakurikuler</strong>
                                    <table class='cetak-rapor'>
                                        <tr>
                                            <th width='7%' style='text-align:center;padding:4px 8px;'>
                                                <strong>No.
                                            </th>
                                            <th width='30%' style='text-align:center;padding:4px 8px;'>Kegiatan
                                                Ekstrakurikuler</th>
                                            <th style='text-align:center;padding:4px 8px;'>Keterangan</strong></th>
                                        </tr>
                                        @forelse ($activities as $index => $activity)
                                            <tr>
                                                <td style='padding:4px 8px;' valign='top' class='text-center'>
                                                    {{ $index + 1 }}.
                                                </td>
                                                <td style='padding:4px 8px;'>{{ $activity['activity'] }}</td>
                                                <td style='padding:4px 8px;'>{{ $activity['description'] }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td style='padding:4px 8px;' class='text-center'>1.</td>
                                                <td style='padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                        @endforelse
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <p></p>
                        <table align='center' width='90%'>
                            <tr>
                                <td>
                                    <strong>Prestasi</strong>
                                    <table class='cetak-rapor'>
                                        <tr>
                                            <th width='7%' style='text-align:center;padding:4px 8px;'>
                                                <strong>No.
                                            </th>
                                            <th width='30%' style='text-align:center;padding:4px 8px;'>Jenis
                                                Prestasi</th>
                                            <th style='text-align:center;padding:4px 8px;'>Keterangan</strong></th>
                                        </tr>
                                        @forelse ($prestasiSiswas as $index => $prestasi)
                                            <tr>
                                                <td class='text-center'>{{ $index + 1 }}</td>
                                                <td>{{ $prestasi->jenis }}</td>
                                                <td>
                                                    <table class="no-border">
                                                        <tr>
                                                            <td>Tingkat</td>
                                                            <td>{{ $prestasi->tingkat }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Juara Ke</td>
                                                            <td>{{ $prestasi->juarake }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nama Lomba</td>
                                                            <td>{{ $prestasi->namalomba }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tgl Pelaksanaan</td>
                                                            <td>{{ $prestasi->tanggal }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Tempat Pelaksanaan</td>
                                                            <td> {{ $prestasi->tempat }}</td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td style='padding:4px 8px;' class='text-center'>1.</td>
                                                <td style='padding:4px 8px;' valign='top'></td>
                                                <td style='padding:4px 8px;' valign='top'></td>
                                            </tr>
                                            <tr>
                                                <td style='padding:4px 8px;' class='text-center'>2.</td>
                                                <td style='padding:4px 8px;' valign='top'></td>
                                                <td style='padding:4px 8px;' valign='top'></td>
                                            </tr>
                                        @endforelse

                                    </table>
                                </td>
                            </tr>
                        </table>
                        <p></p>
                        <table align='center' width='90%'>
                            <tr>
                                <td width='30%'>
                                    @php
                                        $sakit = $absensiSiswa->sakit ?? 0;
                                        $izin = $absensiSiswa->izin ?? 0;
                                        $alfa = $absensiSiswa->alfa ?? 0;
                                        $jmlhabsen = $sakit + $izin + $alfa;
                                    @endphp
                                    <strong>Ketidakhadiran</strong>
                                    <table class="cetak-rapor">
                                        <tr>
                                            <th width='7%' style='text-align:center;padding:4px 8px;'>
                                                <strong>No.
                                            </th>
                                            <th width='50%' style='text-align:center;padding:4px 8px;'>Keterangan
                                            </th>
                                            <th style='text-align:center;padding:4px 8px;'>Jumlah</strong></th>
                                        </tr>
                                        <tr>
                                            <td style='text-align:center;padding:4px 8px;width:10px;'>1.</td>
                                            <td style='padding:4px 8px;'>Sakit</td>
                                            <td style='text-align:center;padding:4px 8px;'>
                                                {{ $sakit }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='text-align:center;padding:4px 8px;'>2.</td>
                                            <td style='padding:4px 8px;'>Izin</td>
                                            <td style='text-align:center;padding:4px 8px;'>
                                                {{ $izin }}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td style='text-align:center;padding:4px 8px;'>3.</td>
                                            <td style='padding:4px 8px;'>Alfa</td>
                                            <td style='text-align:center;padding:4px 8px;'>
                                                {{ $alfa }}
                                            </td>

                                        </tr>
                                        <tr>
                                            <td style='text-align:center;padding:4px 8px;' colspan='2'
                                                align='center'>
                                                <strong>Total</strong>
                                            </td>
                                            <td style='text-align:center;padding:4px 8px;'>
                                                <strong>{{ $jmlhabsen }}</strong>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                                <td>&nbsp;</td>
                                <td valign="top">
                                    <strong>Catatan Wali Kelas</strong>
                                    <table class="cetak-rapor">
                                        <tr>
                                            <td height='100' valign='top' style='padding: 5px 10px;'>
                                                <p> {!! $catatanWaliKelas->catatan ?? '' !!}</p>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <p></p>
                        <table align='center' width='90%'>
                            <tr>
                                <td>
                                    <strong>Tanggapan Orang Tua/Wali Siswa</strong>
                                    <table
                                        style='width:100%;margin: 0 auto;padding: 5px 10px;border-collapse:collapse;border: 1px solid #000;'>
                                        <tr>
                                            <td height='60' valign='top' style='padding: 5px 10px;'>
                                                <p>&nbsp;</p>
                                            </td>
                                        </tr>
                                    </table><br>
                                    <table width='100%'>
                                        <tr>
                                            <td width='45%' valign='top'>
                                                <table width='100%'>
                                                    <tr>
                                                        <td width='5%'>&nbsp;</td>
                                                        <td>Mengetahui :<br>Orang Tua / Wali
                                                            <p>&nbsp;</p>
                                                            <p>&nbsp;</p>
                                                            ___________________________________
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                            <td width='10%'>&nbsp;</td>
                                            <td valign='top' width='55%'>
                                                <table width='100%'>
                                                    <tr>
                                                        <td>
                                                            {!! ucwords(strtolower($titiMangsa->alamat ?? 'titimangsa isi terlebih dahulu')) !!}, {!! formatTanggalIndonesia($titiMangsa->titimangsa ?? '') !!} <br>
                                                            Wali Kelas,
                                                            @php
                                                                if ($waliKelas->id_personil == 'Pgw_0021') {
                                                                    $ttdawlas =
                                                                        '<br><img style="position: relative;z-index: 1;top: 0px;right: -10" src="' .
                                                                        URL::asset('images/ttdwalas/mira.png') .
                                                                        '" width="194" height="98" border="0" alt=""><br>';
                                                                } elseif ($waliKelas->id_personil == 'Pgw_0031') {
                                                                    $ttdawlas =
                                                                        '<br><img style="position: relative;z-index: 1;top: -10px;right: -2" src="' .
                                                                        URL::asset('images/ttdwalas/dedeh.png') .
                                                                        '" width="194" height="98" border="0" alt=""><br>';
                                                                } else {
                                                                    $ttdawlas = '
                                                            <p>&nbsp;</p>
                                                            <p>&nbsp;</p>';
                                                                }
                                                            @endphp

                                                            {!! $ttdawlas !!}

                                                            <strong>
                                                                {!! $waliKelas->gelardepan !!}
                                                                {!! strtoupper(strtolower($waliKelas->namalengkap)) !!},
                                                                {!! $waliKelas->gelarbelakang !!}
                                                            </strong><br>
                                                            NIP. {!! $waliKelas->nip !!}
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        {{-- @if ($dataPilCR->semester == 'Ganjil')
                                @else
                                    <tr>
                                        <td colspan='3'>
                                            <table width='100%'>
                                                <tr>
                                                    <td width='35%'>&nbsp;</td>
                                                    <td>
                                                        <p>&nbsp;</p>
                                                        Mengetahui :<br>
                                                        Kepala Sekolah,
                                                        <br><br><br><br>
                                                        <strong>{!! $kepsekttd->nama !!}</strong><br>
                                                        NIP. {!! $kepsekttd->nip !!}
                                                        <p>&nbsp;</p>
                                                    </td>
                                                    <td></td>
                                                </tr>
                                            </table>

                                        </td>
                                    </tr>
                                @endif --}}
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <p class="mt-4">&nbsp;</p>
        <p class="mt-4">&nbsp;</p>
    </div>

    <div class="tab-pane" id="lampiran1" role="tabpanel">
        <p class="mt-4">&nbsp;</p>
        <div id='cetak-keluar' style='@page {size: A4;}'>
            <div class='table-responsive'>
                <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style='font-size:18px;text-align:center;'><strong>KETERANGAN PINDAH SEKOLAH</strong></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align='center' width='50%'>
                            <table align='center' width='90%'>
                                <tr>
                                    <td>
                                        <p>Nama Siswa : <strong>{!! strtoupper($dataSiswa->nama_lengkap) !!}</strong></p>
                                        <table class='cetak-rapor'>
                                            <tr>
                                                <th colspan='4' style='text-align:center;padding:4px 4px;'>KELUAR
                                                </th>
                                            </tr>
                                            <tr>
                                                <th width='100' style='text-align:center;padding:4px 8px;'>
                                                    <strong>Tanggal
                                                </th>
                                                <th style='text-align:center;padding:4px 8px;'>Kelas yang di tinggal
                                                </th>
                                                <th style='text-align:center;padding:4px 8px;'>Sebab-sebab Keluar atau
                                                    Permintaan (tertulis)</th>
                                                <th width='25%' style='text-align:center;padding:4px 8px;'>Tanda
                                                    Tangan
                                                    Kepala Sekolah, Stempel Sekolah, dan Tanda Tangan Orang
                                                    Tua/Wali</strong>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td style='padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'>
                                                    .............................., ............................<br>
                                                    Kepala Sekolah,
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    .............................................................<br>
                                                    NIP. ....................................................
                                                    <hr>
                                                    Orang Tua / Wali,
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    .............................................................<br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style='padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'>
                                                    .............................., ............................<br>
                                                    Kepala Sekolah,
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    .............................................................<br>
                                                    NIP. ....................................................
                                                    <hr>
                                                    Orang Tua / Wali,
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    .............................................................<br>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style='padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'>
                                                    .............................., ............................<br>
                                                    Kepala Sekolah,
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    .............................................................<br>
                                                    NIP. ....................................................
                                                    <hr>
                                                    Orang Tua / Wali,
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    .............................................................<br>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <p class="mt-4">&nbsp;</p>
        <p class="mt-4">&nbsp;</p>
        <p class="mt-4">&nbsp;</p>
        <div id='cetak-masuk' style='@page {size: A4;} page-break-before: always;'>
            <div class='table-responsive'>
                <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td style='font-size:18px;text-align:center;'><strong>KETERANGAN PINDAH SEKOLAH</strong></td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td align='center' width='50%'>
                            <table align='center' width='90%'>
                                <tr>
                                    <td>
                                        <p>Nama Siswa : <strong>{!! strtoupper($dataSiswa->nama_lengkap) !!}</strong></p>
                                        <table class='cetak-rapor'>
                                            <tr>
                                                <th style='text-align:center;padding:4px 8px;'><strong>NO.</th>
                                                <th colspan='3' style='text-align:center;padding:4px 8px;'>
                                                    MASUK</strong>
                                                </th>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>1.</td>
                                                <td width='25%' style='padding:4px 8px;'>Nama Siswa</td>
                                                <td width='45%' style='padding:4px 8px;'></td>
                                                <td rowspan='7' style='padding:4px 8px;' valign='top'>
                                                    .............................., ............................<br>
                                                    Kepala Sekolah,
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    .............................................................<br>
                                                    NIP. ....................................................
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>2.</td>
                                                <td style='padding:4px 8px;'>Nomor Induk</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>3.</td>
                                                <td style='padding:4px 8px;'>Nama Sekolah</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>4.</td>
                                                <td style='padding:4px 8px;'>Masuk di Sekolah ini</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'>a. Tanggal</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'>b. Di Kelas</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>5.</td>
                                                <td style='padding:4px 8px;'>Tahun Pelajaran</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>1.</td>
                                                <td style='padding:4px 8px;'>Nama Siswa</td>
                                                <td style='padding:4px 8px;'></td>
                                                <td rowspan='7' style='padding:4px 8px;' valign='top'>
                                                    .............................., ............................<br>
                                                    Kepala Sekolah,
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    .............................................................<br>
                                                    NIP. ....................................................
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>2.</td>
                                                <td style='padding:4px 8px;'>Nomor Induk</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>3.</td>
                                                <td style='padding:4px 8px;'>Nama Sekolah</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>4.</td>
                                                <td style='padding:4px 8px;'>Masuk di Sekolah ini</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'>a. Tanggal</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'>b. Di Kelas</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>5.</td>
                                                <td style='padding:4px 8px;'>Tahun Pelajaran</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>1.</td>
                                                <td style='padding:4px 8px;'>Nama Siswa</td>
                                                <td style='padding:4px 8px;'></td>
                                                <td rowspan='7' style='padding:4px 8px;' valign='top'>
                                                    .............................., ............................<br>
                                                    Kepala Sekolah,
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    .............................................................<br>
                                                    NIP. ....................................................
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>2.</td>
                                                <td style='padding:4px 8px;'>Nomor Induk</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>3.</td>
                                                <td style='padding:4px 8px;'>Nama Sekolah</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>4.</td>
                                                <td style='padding:4px 8px;'>Masuk di Sekolah ini</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'>a. Tanggal</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'>b. Di Kelas</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>5.</td>
                                                <td style='padding:4px 8px;'>Tahun Pelajaran</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>1.</td>
                                                <td style='padding:4px 8px;'>Nama Siswa</td>
                                                <td style='padding:4px 8px;'></td>
                                                <td rowspan='7' style='padding:4px 8px;' valign='top'>
                                                    .............................., ............................<br>
                                                    Kepala Sekolah,
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    .............................................................<br>
                                                    NIP. ....................................................
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>2.</td>
                                                <td style='padding:4px 8px;'>Nomor Induk</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>3.</td>
                                                <td style='padding:4px 8px;'>Nama Sekolah</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>4.</td>
                                                <td style='padding:4px 8px;'>Masuk di Sekolah ini</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'>a. Tanggal</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'></td>
                                                <td style='padding:4px 8px;'>b. Di Kelas</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                            <tr>
                                                <td style='text-align:center;padding:4px 8px;'>5.</td>
                                                <td style='padding:4px 8px;'>Tahun Pelajaran</td>
                                                <td style='padding:4px 8px;'></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <p class="mt-4">&nbsp;</p>
        <p class="mt-4">&nbsp;</p>
        <p class="mt-4">&nbsp;</p>
        <div id='cetak-prestasi' style='@page {size: A4;} page-break-before: always;'>
            <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td style='font-size:18px;text-align:center;'><strong>CATATAN PRESTASI YANG PERNAH DI
                            CAPAI</strong></td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align='center' width='50%'>
                        <table align='center' width='90%'>
                            <tr>
                                <td>
                                    <table>
                                        <tr>
                                            <td width='45%'>Nama Siswa</td>
                                            <td width='5%'>=</td>
                                            <td>{!! strtoupper($dataSiswa->nama_lengkap) !!}</td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Induk/NISN</td>
                                            <td>=</td>
                                            <td>{!! $dataSiswa->nis !!} / {!! $dataSiswa->nisn !!}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Sekolah</td>
                                            <td>=</td>
                                            <td>{{ $school->nama_sekolah }}</td>
                                        </tr>
                                    </table>
                                    <p>&nbsp;</p>
                                    <table class='cetak-rapor'>
                                        <tr>
                                            <th width='5%' style='text-align:center;padding:4px 8px;'>NO.</th>
                                            <th width='35%' style='text-align:center;padding:4px 8px;'>PRESTASI
                                                YANG PERNAH
                                                DI CAPAI</th>
                                            <th style='text-align:center;padding:4px 8px;'>KETERANGAN</th>
                                        </tr>
                                        <tr>
                                            <td style='text-align:center;padding:4px 8px;' valign='top'>1.</td>
                                            <td style='padding:4px 8px;' valign='top'>INTRA KURIKULER</td>
                                            <td style='padding:4px 8px;'>
                                                <ol></ol>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='text-align:center;padding:4px 8px;' valign='top'>2.</td>
                                            <td style='padding:4px 8px;' valign='top'>EKSTRA KURIKULER</td>
                                            <td style='padding:4px 8px;'>
                                                <ol></ol>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='text-align:center;' valign='top'>3.</td>
                                            <td style='padding:4px 8px;' valign='top'>CATATAN KHUSUS LAINNYA</td>
                                            <td style='padding:4px 8px;'>
                                                <ol>
                                                    <li>
                                                    <li>
                                                    <li>
                                                    <li>
                                                    <li>
                                                </ol>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <p class="mt-4">&nbsp;</p>
        <p class="mt-4">&nbsp;</p>
        <p class="mt-4">&nbsp;</p>
    </div>
</div>
