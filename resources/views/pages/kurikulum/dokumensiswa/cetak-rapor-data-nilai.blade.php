<div id="printable-area-nilai">
    <div id='cetak-hal1' style='@page {size: A4;}'>
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
                                        <td style='padding: 2px 0px;'>
                                            <strong>{!! strtoupper($dataSiswa->nama_lengkap) ?? '' !!}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 2px 0px;'>NIS / NISN</td>
                                        <td style='padding: 2px 0px;'>:</td>
                                        <td style='padding: 2px 0px;'>{!! $dataSiswa->nis ?? '' !!} /
                                            {!! $dataSiswa->nisn ?? '' !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width='125' style='padding: 2px 0px;'>Nama Sekolah</td>
                                        <td width='20' style='padding: 2px 0px;'>:</td>
                                        <td style='padding: 2px 0px;'>{{ $school->nama_sekolah ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 2px 0px;'>Alamat</td>
                                        <td style='padding: 2px 0px;'>:</td>
                                        <td style='padding: 2px 0px;'>{{ $school->alamat_jalan ?? '' }}
                                            @if ($school->alamat_no)
                                                No. {{ $school->alamat_no ?? '' }}
                                            @endif
                                            {{ $school->alamat_kec ?? '' }} {{ $school->alamat_kab ?? '' }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td valign='top'>
                                <table>
                                    <tr>
                                        <td width='125' style='padding: 2px 0px;'>Kompetensi
                                            Keahlian
                                        </td>
                                        <td width='20' style='padding: 2px 0px;'>:</td>
                                        <td style='padding: 2px 0px;'>{{ $dataSiswa->nama_kk ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td width='125' style='padding: 2px 0px;'>Kelas</td>
                                        <td width='20' style='padding: 2px 0px;'>:</td>
                                        <td style='padding: 2px 0px;'>{{ $dataSiswa->rombel_nama ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 2px 0px;'>Semester</td>
                                        <td style='padding: 2px 0px;'>:</td>
                                        <td style='padding: 2px 0px;'>{{ $angkaSemester ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 2px 0px;'>Tahun Ajaran</td>
                                        <td style='padding: 2px 0px;'>:</td>
                                        <td style='padding: 2px 0px;'>{{ $dataSiswa->tahun_ajaran ?? '' }}
                                        </td>
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

                    {{-- nilai rapor --}}
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
                                            <th style='text-align:center;padding:4px 8px;'><strong>No.
                                            </th>
                                            <th style='text-align:center;padding:4px 8px;' width='200'>
                                                Mata
                                                Pelajaran
                                            </th>
                                            <th style='text-align:center;padding:4px 8px;'>Nilai Akhir
                                            </th>
                                            <th style='text-align:center;padding:4px 8px;'>Capaian
                                                Kompetensi
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
                                                            $mataPelajaran = 'Pendidikan Agama Islam dan Budi Pekerti';
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
                                                    <td style='text-align:center;'>
                                                        {{ round(((float) $nilai->rerata_formatif + (float) $nilai->rerata_sumatif) / 2) }}
                                                    </td>
                                                    <td style='padding:4px 8px;font-size:12px;text-align:justify;'>
                                                        {{--  {{ $nilai->nilai_tertinggi ?? '' }}<br>
                                                            {{ $nilai->nilai_terendah ?? '' }}<br> --}}
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
                                                        <strong>{{ $nilai->mata_pelajaran ?? '' }}</strong><br>
                                                        {{ $nilai->gelardepan ?? '' }}
                                                        {{ ucwords(strtolower($nilai->namalengkap)) ?? '' }},
                                                        {{ $nilai->gelarbelakang ?? '' }}
                                                    </td>
                                                    <td style='text-align:center;'>
                                                        {{ round(((float) $nilai->rerata_formatif + (float) $nilai->rerata_sumatif) / 2) }}
                                                    </td>
                                                    <td style='padding:4px 8px;font-size:12px;text-align:justify;'>
                                                        {{-- {{ $nilai->nilai_tertinggi ?? '' }}<br>
                                                            {{ $nilai->nilai_terendah ?? '' }}<br> --}}
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
                                <span style='font:10px Times New Roman;'>{{ $dataSiswa->tahun_ajaran ?? '' }}
                                    / {{ $angkaSemester ?? '' }} - {!! strtoupper($dataSiswa->nama_lengkap) ?? '' !!}
                                    [{!! $dataSiswa->nis ?? '' !!}
                                    {!! $dataSiswa->nisn ?? '' !!}]</span>
                                <br>
                                catatan : angka yang ada di kolom capaian kompetensi merupakan nomor
                                Tujuan
                                Pembelajaran
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
                                        <td style='padding: 2px 0px;'>
                                            <strong>{!! strtoupper($dataSiswa->nama_lengkap) ?? '' !!}</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 2px 0px;'>NIS / NISN</td>
                                        <td style='padding: 2px 0px;'>:</td>
                                        <td style='padding: 2px 0px;'>{!! $dataSiswa->nis ?? '' !!} /
                                            {!! $dataSiswa->nisn ?? '' !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width='125' style='padding: 2px 0px;'>Nama Sekolah</td>
                                        <td width='20' style='padding: 2px 0px;'>:</td>
                                        <td style='padding: 2px 0px;'>{{ $school->nama_sekolah ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 2px 0px;'>Alamat</td>
                                        <td style='padding: 2px 0px;'>:</td>
                                        <td style='padding: 2px 0px;'>{{ $school->alamat_jalan ?? '' }}
                                            @if ($school->alamat_no)
                                                No. {{ $school->alamat_no ?? '' }}
                                            @endif
                                            {{ $school->alamat_kec ?? '' }} {{ $school->alamat_kab ?? '' }}
                                        </td>
                                    </tr>
                                </table>
                            </td>
                            <td valign='top'>
                                <table>
                                    <tr>
                                        <td width='125' style='padding: 2px 0px;'>Kompetensi
                                            Keahlian
                                        </td>
                                        <td width='20' style='padding: 2px 0px;'>:</td>
                                        <td style='padding: 2px 0px;'>{{ $dataSiswa->nama_kk ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td width='125' style='padding: 2px 0px;'>Kelas</td>
                                        <td width='20' style='padding: 2px 0px;'>:</td>
                                        <td style='padding: 2px 0px;'>{{ $dataSiswa->rombel_nama ?? '' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 2px 0px;'>Semester</td>
                                        <td style='padding: 2px 0px;'>:</td>
                                        <td style='padding: 2px 0px;'>{{ $angkaSemester ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <td style='padding: 2px 0px;'>Tahun Ajaran</td>
                                        <td style='padding: 2px 0px;'>:</td>
                                        <td style='padding: 2px 0px;'>{{ $dataSiswa->tahun_ajaran ?? '' }}
                                        </td>
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
                                        <th width='30%' style='text-align:center;padding:4px 8px;'>
                                            Kegiatan
                                            Ekstrakurikuler</th>
                                        <th style='text-align:center;padding:4px 8px;'>Keterangan</strong>
                                        </th>
                                    </tr>
                                    @forelse ($activities as $index => $activity)
                                        <tr>
                                            <td style='padding:4px 8px;' valign='top' class='text-center'>
                                                {{ $index + 1 }}.
                                            </td>
                                            <td style='padding:4px 8px;'>{{ $activity['activity'] ?? '' }}</td>
                                            <td style='padding:4px 8px;'>{{ $activity['description'] ?? '' }}
                                            </td>
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
                                        <th width='30%' style='text-align:center;padding:4px 8px;'>
                                            Jenis
                                            Prestasi</th>
                                        <th style='text-align:center;padding:4px 8px;'>Keterangan</strong>
                                        </th>
                                    </tr>
                                    @forelse ($prestasiSiswas as $index => $prestasi)
                                        <tr>
                                            <td class='text-center'>{{ $index + 1 }}</td>
                                            <td>{{ $prestasi->jenis }}</td>
                                            <td>
                                                <table class="no-border">
                                                    <tr>
                                                        <td>Tingkat</td>
                                                        <td>{{ $prestasi->tingkat ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Juara Ke</td>
                                                        <td>{{ $prestasi->juarake ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Lomba</td>
                                                        <td>{{ $prestasi->namalomba ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tgl Pelaksanaan</td>
                                                        <td>{{ $prestasi->tanggal ?? '' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tempat Pelaksanaan</td>
                                                        <td> {{ $prestasi->tempat ?? '' }}</td>
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
                                        <th width='50%' style='text-align:center;padding:4px 8px;'>
                                            Keterangan
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
                                        <td style='text-align:center;padding:4px 8px;' colspan='2' align='center'>
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
                                                        {!! ucwords(strtolower($titiMangsa->alamat ?? 'titimangsa isi terlebih dahulu')) !!}, {!! formatTanggalIndonesia($titiMangsa->titimangsa ?? '') !!}
                                                        <br>
                                                        Wali Kelas,
                                                        <p>&nbsp;</p>
                                                        <p>&nbsp;</p>
                                                        <strong>
                                                            {!! $waliKelas->gelardepan ?? '' !!}
                                                            {!! strtoupper(strtolower($waliKelas->namalengkap)) ?? '' !!},
                                                            {!! $waliKelas->gelarbelakang ?? '' !!}
                                                        </strong><br>
                                                        NIP. {!! $waliKelas->nip ?? '' !!}
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                    @if ($dataPilCR->semester == 'Genap')
                                        <tr>
                                            <td colspan='3'>
                                                <table width='100%'>
                                                    <tr>
                                                        <td width='35%'>&nbsp;</td>
                                                        <td>
                                                            <p>&nbsp;</p>
                                                            Mengetahui :<br>
                                                            Kepala Sekolah,
                                                            <div>
                                                                <img src='{{ URL::asset('images/damudin.png') }}'
                                                                    border='0' height='100'
                                                                    style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -120px;margin-top:-15px;'>
                                                            </div>
                                                            {{-- <div><img src='{{ URL::asset('images/stempel.png') }}'
                                                                    border='0' height='180' width='184'
                                                                    style=' position: absolute; padding: 0px 2px 15px -650px; margin-left: -135px;margin-top:-50px;'>
                                                            </div> --}}
                                                            <p>&nbsp;</p>
                                                            <p>&nbsp;</p>
                                                            <strong>{!! $kepsekttd->nama ?? '' !!}</strong><br>
                                                            NIP. {!! $kepsekttd->nip ?? '' !!}
                                                            <p>&nbsp;</p>
                                                        </td>
                                                        <td></td>
                                                    </tr>
                                                </table>

                                            </td>
                                        </tr>
                                    @else
                                    @endif
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
