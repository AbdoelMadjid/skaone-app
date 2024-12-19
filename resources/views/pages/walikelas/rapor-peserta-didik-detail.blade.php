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
                                        <td style='padding: 2px 0px;'>{!! $dataSiswa->nis !!} / {!! $dataSiswa->nisn !!}
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
                                            <th style='text-align:center;padding:4px 8px;' width='200'>Mata Pelajaran
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
                                            <td>

                                            </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan='10' style='padding:4px 8px;font-size:14px;'>
                                                <strong>B. Kelompok Mata Pelajaran Kejuruan</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
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
                                catatan : angka yang ada di kolom capaian kompetensi merupakan nomor Tujuan Pembelajaran
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
