<div id="printable-area-identitas">
    <div id='cetak-sekolah' style='@page {size: A4;}'>
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
                <td style='font-size:18px;text-align:center;'><strong>SEKOLAH MENENGAH KEJURUAN</strong>
                </td>
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
                            <td>{{ $school->nama_sekolah ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td colspan='3'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>NPSN</td>
                            <td>:</td>
                            <td>{{ $school->npsn ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td colspan='3'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td valign='top'>Alamat Sekolah</td>
                            <td valign='top'>:</td>
                            <td valign='top'>{{ $school->alamat_jalan ?? '-' }}
                                @if ($school->alamat_no)
                                    No. {{ $school->alamat_no ?? '-' }}
                                @endif
                                Blok {{ $school->alamat_blok ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan='3'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td valign='top'></td>
                            <td valign='top'></td>
                            <td valign='top'>Kode Pos : {{ $school->alamat_kodepos ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td colspan='3'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Kelurahan</td>
                            <td>:</td>
                            <td>{{ $school->alamat_desa ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td colspan='3'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Kecamatan</td>
                            <td>:</td>
                            <td>{{ $school->alamat_kec ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td colspan='3'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Kota/Kabupaten</td>
                            <td>:</td>
                            <td>{{ $school->alamat_kab ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td colspan='3'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Provinsi</td>
                            <td>:</td>
                            <td>{{ $school->alamat_provinsi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td colspan='3'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Web Site</td>
                            <td>:</td>
                            <td>{{ $school->alamat_website ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td colspan='3'>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ $school->alamat_email ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td colspan='3'>&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    <p class="mt-4">&nbsp;</p>
    <p class="mt-4">&nbsp;</p>
    <p class="mt-4">&nbsp;</p>

    {{-- IDENITTAS SISWA --}}
    <div id='cetak-identsiswa' style='@page {size: A4;} page-break-before: always;'>
        <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:14px Times New Roman;'>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style='font-size:18px;text-align:center;'><strong>KETERANGAN TENTANG DIRI
                        SISWA</strong>
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
                            <td style='padding:4px 8px;'>{!! $dataSiswa->nama_lengkap ?? '-' !!}</td>
                        </tr>
                        <tr>
                            <td style='padding:4px 8px;'>2.</td>
                            <td style='padding:4px 8px;'>Nomor Induk/NISN</td>
                            <td style='padding:4px 8px;'>:</td>
                            <td style='padding:4px 8px;'>
                                {!! $dataSiswa->nis !!}/{!! $dataSiswa->nisn ?? '-' !!}
                            </td>
                        </tr>
                        <tr>
                            <td style='padding:4px 8px;'>3.</td>
                            <td style='padding:4px 8px;'>Tempat, Tanggal Lahir</td>
                            <td style='padding:4px 8px;'>:</td>
                            <td style='padding:4px 8px;'>{!! ucwords(strtolower($dataSiswa->tempat_lahir)) ?? '-' !!},
                                {!! formatTanggalIndonesia($dataSiswa->tanggal_lahir) ?? '-' !!}</td>
                        </tr>
                        <tr>
                            <td style='padding:4px 8px;'>4.</td>
                            <td style='padding:4px 8px;'>Jenis Kelamin</td>
                            <td style='padding:4px 8px;'>:</td>
                            <td style='padding:4px 8px;'>{!! $dataSiswa->jenis_kelamin ?? '-' !!}</td>
                        </tr>
                        <tr>
                            <td style='padding:4px 8px;'>5.</td>
                            <td style='padding:4px 8px;'>Agama</td>
                            <td style='padding:4px 8px;'>:</td>
                            <td style='padding:4px 8px;'>{!! $dataSiswa->agama ?? '-' !!}</td>
                        </tr>
                        <tr>
                            <td style='padding:4px 8px;'>6.</td>
                            <td style='padding:4px 8px;'>Status dalam Keluarga</td>
                            <td style='padding:4px 8px;'>:</td>
                            <td style='padding:4px 8px;'>{!! $dataSiswa->status_dalam_kel ?? '-' !!}</td>
                        </tr>
                        <tr>
                            <td style='padding:4px 8px;'>7.</td>
                            <td style='padding:4px 8px;'>Anak ke</td>
                            <td style='padding:4px 8px;'>:</td>
                            <td style='padding:4px 8px;'>{!! $dataSiswa->anak_ke ?? '-' !!}</td>
                        </tr>
                        <tr>
                            <td valign='top' style='padding:4px 8px;'>8.</td>
                            <td valign='top' style='padding:4px 8px;'>Alamat Siswa</td>
                            <td valign='top' style='padding:4px 8px;'>:</td>
                            <td style='padding:4px 8px;'>

                            </td>
                        </tr>
                        <tr>
                            <td style='padding:4px 8px;'>9.</td>
                            <td style='padding:4px 8px;'>Nomor Telepon Rumah</td>
                            <td style='padding:4px 8px;'>:</td>
                            <td style='padding:4px 8px;'>{!! $dataSiswa->kontak_telepon ?? '-' !!}</td>
                        </tr>
                        <tr>
                            <td style='padding:4px 8px;'>10.</td>
                            <td style='padding:4px 8px;'>Sekolah Asal</td>
                            <td style='padding:4px 8px;'>:</td>
                            <td style='padding:4px 8px;'>{!! $dataSiswa->sekolah_asal ?? '-' !!}</td>
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
                            <td style='padding:4px 8px;'>{!! $dataSiswa->diterima_kelas ?? '-' !!}</td>
                        </tr>
                        <tr>
                            <td style='padding:4px 8px;'></td>
                            <td style='padding:4px 8px;'>Pada Tanggal</td>
                            <td style='padding:4px 8px;'>:</td>
                            <td style='padding:4px 8px;'>{!! formatTanggalIndonesia($dataSiswa->diterima_tanggal) ?? '-' !!}</td>
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
                            <td style='padding:4px 8px;'>{!! ucwords(strtolower($dataSiswa->nm_ayah)) ?? '-' !!}</td>
                        </tr>
                        <tr>
                            <td style='padding:4px 8px;'></td>
                            <td style='padding:4px 8px;'>b. Ibu</td>
                            <td style='padding:4px 8px;'>:</td>
                            <td style='padding:4px 8px;'>{!! ucwords(strtolower($dataSiswa->nm_ibu)) ?? '-' !!}</td>
                        </tr>
                        <tr>
                            <td valign='top' style='padding:4px 8px;'>13.</td>
                            <td valign='top' style='padding:4px 8px;'>Alamat Orang Tua</td>
                            <td valign='top' style='padding:4px 8px;'>:</td>
                            <td style='padding:4px 8px;'>
                                @if ($dataSiswa->ortu_alamat_blok)
                                    Blok {{ $dataSiswa->ortu_alamat_blok ?? '-' }}, <br>
                                @endif
                                @if ($dataSiswa->ortu_alamat_desa)
                                    Desa/Kelurahan {{ $dataSiswa->ortu_alamat_desa ?? '-' }}
                                @endif
                                @if ($dataSiswa->ortu_alamat_kec)
                                    Kecamatan {{ $dataSiswa->ortu_alamat_kec ?? '-' }}<br>
                                @endif
                                @if ($dataSiswa->ortu_alamat_kab)
                                    Kabupaten {{ $dataSiswa->ortu_alamat_kab ?? '-' }}
                                @endif
                                @if ($dataSiswa->ortu_alamat_kodepos)
                                    Kode Pos : {{ $dataSiswa->ortu_alamat_kodepos ?? '-' }}
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td style='padding:4px 8px;'></td>
                            <td style='padding:4px 8px;'>Telepon Orang Tua</td>
                            <td style='padding:4px 8px;'>:</td>
                            <td style='padding:4px 8px;'>{!! $dataSiswa->ortu_kontak_telepon ?? '-' !!}</td>
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
                            <td style='padding:4px 8px;'>{!! $dataSiswa->pekerjaan_ayah ?? '-' !!}</td>
                        </tr>
                        <tr>
                            <td style='padding:4px 8px;'></td>
                            <td style='padding:4px 8px;'>a. Ibu</td>
                            <td style='padding:4px 8px;'>:</td>
                            <td style='padding:4px 8px;'>{!! $dataSiswa->pekerjaan_ibu ?? '-' !!}</td>
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
                                Kadipaten, {!! formatTanggalIndonesia($dataSiswa->diterima_tanggal) ?? '' !!}<br>
                                Kepala Sekolah,
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                                <strong>{!! $kepsekCover->nama ?? '' !!}</strong><br>
                                NIP. {!! $kepsekCover->nip ?? '' !!}
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
    {{-- PETUNJUK --}}
    <div id='cetak-petunjuk' style='@page {size: A4;} page-break-before: always;'>
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
                                        <td align='justify' style='padding:3px 6px;'>Rapor merupakan
                                            ringkasan
                                            hasil
                                            penilaian terhadap seluruh aktivitas pembelajaran yang
                                            dilakukan
                                            siswa
                                            dalam
                                            kurun waktu tertentu;</td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>2.</td>
                                        <td align='justify' style='padding:3px 6px;'>Rapor
                                            dipergunakan
                                            selama
                                            siswa
                                            yang bersangkutan mengikuti seluruh program pembelajaran di
                                            Sekolah
                                            Menengah
                                            Kejuruan tersebut;</td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>3.</td>
                                        <td align='justify' style='padding:3px 6px;'>Identitas Sekolah
                                            diisi
                                            dengan
                                            data yang sesuai dengan keberadaan Sekolah Menengah
                                            Kejuruan;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>4.</td>
                                        <td align='justify' style='padding:3px 6px;'>Keterangan
                                            tentang
                                            diri
                                            Siswa
                                            diisi lengkap;</td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>5.</td>
                                        <td align='justify' style='padding:3px 6px;'>Rapor harus
                                            dilengkapi
                                            dengan
                                            pas
                                            foto berwarna (3 x 4) dan pengisiannya dilakukan oleh Wali
                                            Kelas;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>6.</td>
                                        <td align='justify' style='padding:3px 6px;'>Deskripsi sikap
                                            spiritual
                                            diambil
                                            dari hasil observasi terutama pada mata pelajaran Pendidikan
                                            Agama
                                            dan
                                            Budi
                                            pekerti, dan PPKn;</td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>7.</td>
                                        <td align='justify' style='padding:3px 6px;'>Deskripsi sikap
                                            sosial
                                            diambil
                                            dari hasil observasi pada semua mata pelajaran;</td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>8.</td>
                                        <td align='justify' style='padding:3px 6px;'>Deskripsi pada
                                            kompetensi
                                            sikap
                                            ditulis dengan kalimat positif untuk aspek yang sangat baik
                                            atau
                                            Cukup
                                            baik;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>9.</td>
                                        <td align='justify' style='padding:3px 6px;'>Capaian siswa
                                            dalam
                                            kompetensi
                                            pengetahuan dan kompetensi keterampilan ditulis dalam bentuk
                                            angka,
                                            predikat
                                            dan deskripsi untuk masing-masing mata pelajaran;</td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>10.</td>
                                        <td align='justify' style='padding:3px 6px;'>Predikat ditulis
                                            dalam
                                            bentuk
                                            huruf sesuai kriteria;</td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>11.</td>
                                        <td align='justify' style='padding:3px 6px;'>Kolom KB
                                            (Ketuntasan
                                            Belajar)
                                            merupakan acuan bagi kriteria kenaikan kelas sehingga wali
                                            kelas
                                            wajib
                                            menerangkan konsekuensi ketuntasan belajar tersebut kepada
                                            orang
                                            tua/wali;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>12.</td>
                                        <td align='justify' style='padding:3px 6px;'>Deskripsi pada
                                            kompetensi
                                            pengetahuan dan kompetensi keterampilan ditulis dengan
                                            kalimat
                                            positif
                                            sesuai capaian tertinggi dan terendah yang diperoleh siswa.
                                            Apabila
                                            capaian
                                            kompetensi dasar yang diperoleh dalam muatan pelajaran itu
                                            sama,
                                            kolom
                                            deskripsi ditulis berdasarkan capaian yang diperoleh;</td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>13.</td>
                                        <td align='justify' style='padding:3px 6px;'>Laporan Praktik
                                            Kerja
                                            Lapangan
                                            diisi berdasarkan kegiatan praktik kerja yang diikuti oleh
                                            siswa
                                            di
                                            industri/perusahaan mitra;</td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>14.</td>
                                        <td align='justify' style='padding:3px 6px;'>Laporan
                                            Ekstrakurikuler
                                            diisi
                                            berdasarkan kegiatan ekstrakurikuler yang diikuti oleh
                                            siswa;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>15.</td>
                                        <td align='justify' style='padding:3px 6px;'>Saran-saran wali
                                            kelas
                                            diisi
                                            berdasarkan kegiatan yang perlu mendapatkan perhatian siswa;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>16.</td>
                                        <td align='justify' style='padding:3px 6px;'>Prestasi diisi
                                            dengan
                                            prestasi
                                            yang dicapai oleh siswa dalam bidang akademik dan non
                                            akademik;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>17.</td>
                                        <td align='justify' style='padding:3px 6px;'>Ketidakhadiran
                                            diisi
                                            dengan
                                            data
                                            akumulasi ketidakhadiran siswa karena sakit, izin, atau
                                            tanpa
                                            keterangan
                                            selama satu semester.</td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>18.</td>
                                        <td align='justify' style='padding:3px 6px;'>Tanggapan orang
                                            tua/wali
                                            adalah
                                            tanggapan atas pencapaian hasil belajar siswa;</td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'>19.</td>
                                        <td align='justify' style='padding:3px 6px;'>Keterangan pindah
                                            keluar
                                            sekolah
                                            diisi dengan alasan kepindahan. Sedangkan pindah masuk diisi
                                            dengan
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
                                        <td align='justify' style='padding:3px 6px;'>Sangat Baik (A) :
                                            86
                                            -
                                            100
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'></td>
                                        <td align='justify' style='padding:3px 6px;'>Baik (B) : 71 -
                                            85
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'></td>
                                        <td align='justify' style='padding:3px 6px;'>Cukup (C) : 56 -
                                            70
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign='top' style='padding:3px 6px;'></td>
                                        <td align='justify' style='padding:3px 6px;'>Kurang (D) : 0 -
                                            55
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
