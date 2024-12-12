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
                                        <td style='padding: 2px 0px;'><strong>{!! strtoupper($dataSiswa->nama_lengkap) !!}</strong></td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 2px 0px;'>NIS / NISN</td>
                                        <td style='padding: 2px 0px;'>:</td>
                                        <td style='padding: 2px 0px;'>{!! $dataSiswa->nis !!}/{!! $dataSiswa->nisn !!}
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
                                        <td style='padding: 2px 0px;'></td>
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
                            <td align='center'>
                                <p><strong>LAPORAN HASIL BELAJAR</p></strong>
                            </td>
                        </tr>
                        <tr>
                            <td align='center'>
                                <table class='cetak-rapor'>
                                    <thead>
                                        <tr>
                                            <th style='text-align:center;padding:4px 8px;'><strong>No.</th>
                                            <th style='text-align:center;padding:4px 8px;' width='250'>Mata Pelajaran
                                            </th>
                                            <th style='text-align:center;padding:4px 8px;'>Nilai Akhir</th>
                                            <th style='text-align:center;padding:4px 8px;'>Capaian Kompetensi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan='10' style='padding:4px 8px;font-size:12px;'>
                                                <strong>A. Kelompok Mata Pelajaran Umum</strong>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td style='text-align:center;padding:4px 8px;font-size:12px;'
                                                align='center'>1.</td>
                                            <td style='padding:4px 8px;font-size:12px;'>Nama Mata Pelajaran<br>Nama
                                                Pengajar</td>
                                            <td></td>
                                            <td style='padding:4px 8px;font-size:12px;'>Dari jumlah tujuan pembelajaran
                                                sebanyak
                                                $JmlTPA, ketercapaian pembelajaran dalam kategori $QNPADeskA karena
                                                mendapatkan
                                                angka
                                                maksimal sebesar $NMaxTPA Dari jumlah tujuan pembelajaran sebanyak
                                                $JmlTPA, ketercapaian pembelajaran dalam kategori $QNPADeskA karena
                                                mendapatkan
                                                angka
                                                maksimal sebesar $NMaxTPA </td>
                                        </tr>
                                        <tr>
                                            <td style='text-align:center;padding:4px 8px;font-size:12px;'
                                                align='center'>2.</td>
                                            <td style='padding:4px 8px;font-size:12px;'>Nama Mata Pelajaran<br>Nama
                                                Pengajar</td>
                                            <td></td>
                                            <td style='padding:4px 8px;font-size:12px;'>Dari jumlah tujuan pembelajaran
                                                sebanyak
                                                $JmlTPA, ketercapaian pembelajaran dalam kategori $QNPADeskA karena
                                                mendapatkan
                                                angka
                                                maksimal sebesar $NMaxTPA Dari jumlah tujuan pembelajaran sebanyak
                                                $JmlTPA, ketercapaian pembelajaran dalam kategori $QNPADeskA karena
                                                mendapatkan
                                                angka
                                                maksimal sebesar $NMaxTPA Dari jumlah tujuan pembelajaran sebanyak
                                                $JmlTPA, ketercapaian pembelajaran dalam kategori $QNPADeskA karena
                                                mendapatkan
                                                angka
                                                maksimal sebesar $NMaxTPA </td>
                                        </tr>
                                        <tr>
                                            <td style='text-align:center;padding:4px 8px;font-size:12px;'
                                                align='center'>3.</td>
                                            <td style='padding:4px 8px;font-size:12px;'>Nama Mata Pelajaran<br>Nama
                                                Pengajar</td>
                                            <td></td>
                                            <td style='padding:4px 8px;font-size:12px;'>Dari jumlah tujuan pembelajaran
                                                sebanyak
                                                $JmlTPA, ketercapaian pembelajaran dalam kategori $QNPADeskA karena
                                                mendapatkan
                                                angka
                                                maksimal sebesar $NMaxTPA </td>
                                        </tr>
                                        <tr>
                                            <td style='text-align:center;padding:4px 8px;font-size:12px;'
                                                align='center'>4.</td>
                                            <td style='padding:4px 8px;font-size:12px;'>Nama Mata Pelajaran<br>Nama
                                                Pengajar</td>
                                            <td></td>
                                            <td style='padding:4px 8px;font-size:12px;'>Dari jumlah tujuan pembelajaran
                                                sebanyak
                                                $JmlTPA, ketercapaian pembelajaran dalam kategori $QNPADeskA karena
                                                mendapatkan
                                                angka
                                                maksimal sebesar $NMaxTPA </td>
                                        </tr>
                                        <tr>
                                            <td colspan='10' style='padding:4px 8px;font-size:14px;'>
                                                <strong>B. Kelompok Mata Pelajaran Kejuruan</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='text-align:center;padding:4px 8px;font-size:12px;'
                                                align='center'>1.</td>
                                            <td style='padding:4px 8px;font-size:12px;'>Nama Mata Pelajaran<br>Nama
                                                Pengajar</td>
                                            <td></td>
                                            <td style='padding:4px 8px;font-size:12px;'>Dari jumlah tujuan pembelajaran
                                                sebanyak
                                                $JmlTPB, ketercapaian pembelajaran dalam kategori $QNPADeskB karena
                                                mendapatkan
                                                angka
                                                maksimal sebesar $NMaxTPB </td>
                                        </tr>
                                        <tr>
                                            <td style='text-align:center;padding:4px 8px;font-size:12px;'
                                                align='center'>1.</td>
                                            <td style='padding:4px 8px;font-size:12px;'>Nama Mata Pelajaran<br>Nama
                                                Pengajar</td>
                                            <td></td>
                                            <td style='padding:4px 8px;font-size:12px;'>Dari jumlah tujuan pembelajaran
                                                sebanyak
                                                $JmlTPB, ketercapaian pembelajaran dalam kategori $QNPADeskB karena
                                                mendapatkan
                                                angka
                                                maksimal sebesar $NMaxTPB </td>
                                        </tr>
                                        <tr>
                                            <td style='text-align:center;padding:4px 8px;font-size:12px;'
                                                align='center'>1.</td>
                                            <td style='padding:4px 8px;font-size:12px;'>Nama Mata Pelajaran<br>Nama
                                                Pengajar</td>
                                            <td></td>
                                            <td style='padding:4px 8px;font-size:12px;'>Dari jumlah tujuan pembelajaran
                                                sebanyak
                                                $JmlTPB, ketercapaian pembelajaran dalam kategori $QNPADeskB karena
                                                mendapatkan
                                                angka
                                                maksimal sebesar $NMaxTPB </td>
                                        </tr>
                                        <tr>
                                            <td style='text-align:center;padding:4px 8px;font-size:12px;'
                                                align='center'>1.</td>
                                            <td style='padding:4px 8px;font-size:12px;'>Nama Mata Pelajaran<br>Nama
                                                Pengajar</td>
                                            <td></td>
                                            <td style='padding:4px 8px;font-size:12px;'>Dari jumlah tujuan pembelajaran
                                                sebanyak
                                                $JmlTPB, ketercapaian pembelajaran dalam kategori $QNPADeskB karena
                                                mendapatkan
                                                angka
                                                maksimal sebesar $NMaxTPB </td>
                                        </tr>
                                        <tr>
                                            <td style='text-align:center;padding:4px 8px;font-size:12px;'
                                                align='center'>1.</td>
                                            <td style='padding:4px 8px;font-size:12px;'>Nama Mata Pelajaran<br>Nama
                                                Pengajar</td>
                                            <td></td>
                                            <td style='padding:4px 8px;font-size:12px;'>Dari jumlah tujuan pembelajaran
                                                sebanyak
                                                $JmlTPB </td>
                                        </tr>
                                        <tr>
                                            <td style='text-align:center;padding:4px 8px;font-size:12px;'
                                                align='center'>1.</td>
                                            <td style='padding:4px 8px;font-size:12px;'>Nama Mata Pelajaran<br>Nama
                                                Pengajar</td>
                                            <td></td>
                                            <td style='padding:4px 8px;font-size:12px;'>Dari jumlah tujuan pembelajaran
                                                sebanyak
                                                $JmlTPB, ketercapaian pembelajaran dalam kategori $QNPADeskB karena
                                                mendapatkan
                                                angka
                                                maksimal sebesar $NMaxTPB </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <!-- <tr><td height='100%'>&nbsp;</td></tr> -->
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
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
                                    <td style='padding: 2px 0px;'><strong>{!! strtoupper($dataSiswa->nama_lengkap) !!}</strong></td>
                                </tr>
                                <tr>
                                    <td style='padding: 2px 0px;'>NIS / NISN</td>
                                    <td style='padding: 2px 0px;'>:</td>
                                    <td style='padding: 2px 0px;'>{!! $dataSiswa->nis !!}/{!! $dataSiswa->nisn !!}</td>
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
                                    <td style='padding: 2px 0px;'></td>
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
                <table align='center' width='90%'>
                    <tr>
                        <td>
                            <strong>Praktik Kerja Lapangan</strong>
                            <table class='cetak-rapor'>
                                <tr>
                                    <th width='7%' style='text-align:center;padding:4px 8px;'>
                                        <strong>No.
                                    </th>
                                    <th style='text-align:center;padding:4px 8px;'>Mitra DU/DI</th>
                                    <th style='text-align:center;padding:4px 8px;'>Lokasi</th>
                                    <th style='text-align:center;padding:4px 8px;'>Lamanya (Bulan)</th>
                                    <th width='25%' style='text-align:center;padding:4px 8px;'>
                                        Keterangan</strong>
                                    </th>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;' valign='top' align='center'>1.</td>
                                    <td style='padding:4px 8px;' valign='top'></td>
                                    <td style='padding:4px 8px;' valign='top'></td>
                                    <td style='padding:4px 8px;' valign='top'></td>
                                    <td style='padding:4px 8px;'></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
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
                                <tr>
                                    <td style='padding:4px 8px;' valign='top' align='center'>1.</td>
                                    <td style='padding:4px 8px;' valign='top'></td>
                                    <td style='padding:4px 8px;' valign='top'></td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;' valign='top' align='center'>2.</td>
                                    <td style='padding:4px 8px;' valign='top'></td>
                                    <td style='padding:4px 8px;' valign='top'></td>
                                </tr>
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
                                <tr>
                                    <td style='padding:4px 8px;' valign='top' align='center'>1.</td>
                                    <td style='padding:4px 8px;' valign='top'></td>
                                    <td style='padding:4px 8px;' valign='top'></td>
                                </tr>
                                <tr>
                                    <td style='padding:4px 8px;' valign='top' align='center'>2.</td>
                                    <td style='padding:4px 8px;' valign='top'></td>
                                    <td style='padding:4px 8px;' valign='top'></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <p></p>
                <table align='center' width='90%'>
                    <tr>
                        <td>
                            <strong>Ketidakhadiran</strong>
                            <table class="cetak-rapor">
                                <tr>
                                    <td style='text-align:center;padding:4px 8px;'>1.</td>
                                    <td style='padding:4px 8px;'>Sakit</td>
                                    <td style='text-align:center;padding:4px 8px;'>{$absensakit}</td>
                                </tr>
                                <tr>
                                    <td style='text-align:center;padding:4px 8px;'>2.</td>
                                    <td style='padding:4px 8px;'>Izin</td>
                                    <td style='text-align:center;padding:4px 8px;'>{$absenizin}</td>
                                </tr>
                                <tr>
                                    <td style='text-align:center;padding:4px 8px;'>3.</td>
                                    <td style='padding:4px 8px;'>Alfa</td>
                                    <td style='text-align:center;padding:4px 8px;'>{$absenalfa}</td>
                                </tr>
                                <tr>
                                    <td style='text-align:center;padding:4px 8px;' colspan='2' align='center'>
                                        <strong>Jumlah</strong>
                                    </td>
                                    <td style='text-align:center;padding:4px 8px;'>
                                        <strong>{$jmlabseni}</strong>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>&nbsp;</td>
                        <td>
                            <strong>Catatan Wali Kelas</strong>
                            <table
                                style='width:100%;margin: 0 auto;padding: 5px 10px;border-collapse:collapse;border: 1px solid #000;'>
                                <tr>
                                    <td height='100' valign='top' style='padding: 5px 10px;'>
                                        <p>{$Hcatwk['catatan']}</p>
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
                                    <td height='40' valign='top' style='padding: 5px 10px;'>
                                        <p>&nbsp;</p>
                                    </td>
                                </tr>
                            </table><br>
                            {$SemesterGenap}
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
                                                    Kadipaten, ....... <br>
                                                    Wali Kelas,
                                                    <p>&nbsp;</p>
                                                    <p>&nbsp;</p>
                                                    <strong>Nama Wali Kelas</strong><br>
                                                    NIP Wali kelas
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
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
                                                    <strong>Nama Kepsek</strong><br>
                                                    NIP. 1976 ...
                                                    <p>&nbsp;</p>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </table>

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
