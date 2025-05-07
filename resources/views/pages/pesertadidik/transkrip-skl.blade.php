<div id='cetak-keluar' style='@page {size: A4;}'>
    <div class='table-responsive'>
        <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td align='center'><img src="{{ URL::asset('images/kossurat.jpg') }}" alt="" height="164"
                        width="801" border="0"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style='font-size:18px;text-align:center;'><strong>SURAT KETERANGAN LULUS</strong>
                </td>
            </tr>
            <tr>
                <td style='font-size:12px;text-align:center;'><strong>Nomor :
                        571/TU.01.02/SMKN1KDP.CADISDIKWIL.IX</strong>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td align='center' width='50%'>
                    <table align='center' width='70%' style='border-collapse:collapse;font:12px Times New Roman;'>
                        <tr>
                            <td>
                                Kepala SMK Negeri 1 Kadipaten. Kabupaten Majalengka selaku Penyelenggara
                                Kegiatan
                                Penilaian Akhir Jenjang Tahun Pelajaran 2024 - 2025. <br><br>
                                Berdasarkan:
                                <ol style='margin-left:-18px;'>
                                    <li>Ketuntasan dari seluruh program pembelajaran pada Kurikulum
                                        Merdeka;
                                    <li>Kriteria Kelulusan dari Satuan Pendidikan sesuai dengan
                                        peraturan
                                        perundang-undangan
                                        yang berlaku;
                                    <li>Rapat Pleno Dewan Guru SMKN 1 Kadipaten. tentang Kelulusan Siswa
                                        pada Tanggal 02
                                        Mei 2025
                                </ol>
                                Menerangkan bahwa :<br><br>

                                <table width='70%'
                                    style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                                    <tr>
                                        <td width='50' style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'>Nama Siswa Lengkap</td>
                                        <td width='25' style='padding:4px 8px;'>:</td>
                                        <td style='padding:4px 8px;'>{!! $dataSiswa->nama_lengkap !!}</td>
                                    </tr>
                                    <tr>
                                        <td style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'>Tempat, Tanggal Lahir</td>
                                        <td style='padding:4px 8px;'>:</td>
                                        <td style='padding:4px 8px;'>{!! ucwords(strtolower($dataSiswa->tempat_lahir)) !!},
                                            {!! formatTanggalIndonesia($dataSiswa->tanggal_lahir) !!}</td>
                                    </tr>
                                    <tr>
                                        <td style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'>Nomor Induk/NISN</td>
                                        <td style='padding:4px 8px;'>:</td>
                                        <td style='padding:4px 8px;'>{!! $dataSiswa->nis !!}/{!! $dataSiswa->nisn !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'>Nama Orang Tua</td>
                                        <td style='padding:4px 8px;'>:</td>
                                        <td style='padding:4px 8px;'>{!! ucwords(strtolower($dataSiswa->nm_ayah)) !!}</td>
                                    </tr>
                                    <tr>
                                        <td style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'>Program Keahlian</td>
                                        <td style='padding:4px 8px;'>:</td>
                                        <td style='padding:4px 8px;'>{!! $dataSiswa->nama_pk !!}</td>
                                    </tr>
                                    <tr>
                                        <td style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'>Konsentrasi Keahlian</td>
                                        <td style='padding:4px 8px;'>:</td>
                                        <td style='padding:4px 8px;'>{!! $dataSiswa->nama_kk !!}</td>
                                    </tr>
                                    <tr>
                                        <td style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'>Dinyatakan</td>
                                        <td style='padding:4px 8px;'>:</td>
                                        <td style='padding:4px 8px;'><strong>L U L U S</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan='5'>&nbsp;</td>
                                    </tr>
                                </table>

                                <table width='70%'
                                    style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                                    <tr>
                                        <td align='justify'>
                                            dengan nilai sebagai berikut :
                                        </td>
                                        <td width='40'>&nbsp;</td>
                                    </tr>
                                </table>


                                <table class="cetak-rapor" width='70%'
                                    style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                                    <thead>
                                        <tr>
                                            <th rowspan="2">No.</th>
                                            <th rowspan="2">Kode</th>
                                            <th rowspan="2">Mata Pelajaran</th>
                                            <th colspan="6">Semester</th>
                                            <th colspan="2">PSAJ</th>
                                            <th rowspan="2">Nilai Akhir</th>
                                        </tr>
                                        <tr>
                                            @for ($i = 1; $i <= 6; $i++)
                                                <th width="25">{{ $i }}</th>
                                            @endfor
                                            <th width="25">P</th>
                                            <th width="25">T</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="12" style="padding-left:8px;"><strong>A. Kelompok Mata
                                                    Pelajaran Umum Muatan
                                                    Nasional</strong></td>
                                        </tr>
                                        {{-- NILAI MATA PELAJARAN NASIONAL --}}
                                        @php $no = 1; @endphp
                                        @foreach ($dataMPN as $item)
                                            <tr>
                                                <td style="text-align: center;" width='25'>{{ $no++ }}.</td>
                                                <td>{{ $item['kode_mapel'] }}</td>
                                                <td style="padding-left:8px;">
                                                    {{ $item['nama_mapel'] }}</td>
                                                @for ($i = 1; $i <= 6; $i++)
                                                    @php
                                                        $val = $item['nilai'][$i] ?? null;
                                                    @endphp
                                                    <td style="text-align: center;padding:4px 8px;">
                                                        {{ !is_null($val) && $val != 0 ? number_format($val, 0, ',', '.') : '' }}
                                                    </td>
                                                @endfor
                                                <td style="text-align: center;">
                                                    {{ !is_null($item['psaj_praktek']) && $item['psaj_praktek'] != 0 ? number_format($item['psaj_praktek'], 0, ',', '.') : '' }}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{ !is_null($item['psaj_teori']) && $item['psaj_teori'] != 0 ? number_format($item['psaj_teori'], 0, ',', '.') : '' }}
                                                </td>
                                                <td style="text-align: center;">
                                                    @php
                                                        $nilaiSemester = array_filter($item['nilai'], function ($v) {
                                                            return !is_null($v) && $v != 0;
                                                        });

                                                        $jumlahNilai = count($nilaiSemester);
                                                        $totalNilai = array_sum($nilaiSemester);
                                                        $rataRataSemester =
                                                            $jumlahNilai > 0 ? $totalNilai / $jumlahNilai : null;

                                                        $praktek = $item['psaj_praktek'];
                                                        $teori = $item['psaj_teori'];

                                                        if (!is_null($praktek) && !is_null($teori)) {
                                                            $psaj = $praktek * 0.75 + $teori * 0.25;
                                                            $nilaiAkhir = ($psaj + $rataRataSemester) / 2;
                                                        } elseif (!is_null($teori)) {
                                                            $nilaiAkhir = ($teori + $rataRataSemester) / 2;
                                                        } else {
                                                            $nilaiAkhir = $rataRataSemester;
                                                        }
                                                    @endphp
                                                    {{ $nilaiAkhir !== null ? number_format($nilaiAkhir, 2, ',', '.') : '' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="12" style="padding-left:8px;"><strong>B. Kelompok Mata
                                                    Pelajaran Kejuruan</strong></td>
                                        </tr>
                                        {{-- NILAI MATA PELAJARAN KEJURUAN --}}
                                        @php $noK = 1; @endphp
                                        @foreach ($dataK as $item)
                                            <tr>
                                                <td style="text-align: center;" width='25'>{{ $noK++ }}.</td>
                                                <td>{{ $item['kode_mapel'] }}</td>
                                                <td style="padding-left:8px;">
                                                    {{ $item['nama_mapel'] }}</td>
                                                @for ($i = 1; $i <= 6; $i++)
                                                    @php
                                                        $val = $item['nilai'][$i] ?? null;
                                                    @endphp
                                                    <td style="text-align: center;padding:4px 8px;">
                                                        {{ !is_null($val) && $val != 0 ? number_format($val, 0, ',', '.') : '' }}
                                                    </td>
                                                @endfor
                                                <td style="text-align: center;">
                                                    {{ !is_null($item['psaj_praktek']) && $item['psaj_praktek'] != 0 ? number_format($item['psaj_praktek'], 0, ',', '.') : '' }}
                                                </td>
                                                <td style="text-align: center;">
                                                    {{ !is_null($item['psaj_teori']) && $item['psaj_teori'] != 0 ? number_format($item['psaj_teori'], 0, ',', '.') : '' }}
                                                </td>
                                                <td style="text-align: center;">
                                                    @php
                                                        $nilaiSemester = array_filter($item['nilai'], function ($v) {
                                                            return !is_null($v) && $v != 0;
                                                        });

                                                        $jumlahNilai = count($nilaiSemester);
                                                        $totalNilai = array_sum($nilaiSemester);
                                                        $rataRataSemester =
                                                            $jumlahNilai > 0 ? $totalNilai / $jumlahNilai : null;

                                                        $praktek = $item['psaj_praktek'];
                                                        $teori = $item['psaj_teori'];

                                                        if (!is_null($praktek) && !is_null($teori)) {
                                                            $psaj = $praktek * 0.75 + $teori * 0.25;
                                                            $nilaiAkhir = ($psaj + $rataRataSemester) / 2;
                                                        } elseif (!is_null($teori)) {
                                                            $nilaiAkhir = ($teori + $rataRataSemester) / 2;
                                                        } else {
                                                            $nilaiAkhir = $rataRataSemester;
                                                        }
                                                    @endphp
                                                    {{ $nilaiAkhir !== null ? number_format($nilaiAkhir, 2, ',', '.') : '' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- NILAI MATA PELAJARAN KONSENTRASI KEAHLIAN --}}
                                        <tr>
                                            <td style="text-align: center;" width='25'>6.</td>
                                            <td>KK</td>
                                            <td style="padding-left:8px;">Konsentrasi Keahlian</td>
                                            @for ($i = 1; $i <= 6; $i++)
                                                @php
                                                    $nilai = $dataKK->firstWhere('semester', (string) $i)?->rata_kk;
                                                @endphp
                                                <td class="text-center">
                                                    {{ $nilai && $nilai != 0 ? number_format($nilai, 0, ',', '.') : '' }}
                                                </td>
                                            @endfor
                                            @php
                                                $praktek = $nilaiPSAJKK['PSAJ9']->nilai ?? null;
                                                $teori = $nilaiPSAJKK['PSAJ10']->nilai ?? null;
                                            @endphp
                                            <td class="text-center">
                                                {{ $praktek && $praktek != 0 ? number_format($praktek, 0, ',', '.') : '' }}
                                            </td>
                                            <td class="text-center">
                                                {{ $teori && $teori != 0 ? number_format($teori, 0, ',', '.') : '' }}
                                            </td>
                                            <td></td>
                                        </tr>
                                        {{-- NILAI MATA PELAJARAN KEWIRAUSAHAAN --}}
                                        @php $noKWU = 6 + 1; @endphp
                                        @foreach ($dataKWU as $item)
                                            <tr>
                                                <td style="text-align: center;" width='25'>{{ $noKWU++ }}.
                                                </td>
                                                <td>{{ $item['kode_mapel'] }}</td>
                                                <td style="padding-left:8px;">
                                                    {{ $item['nama_mapel'] }}</td>
                                                @for ($i = 1; $i <= 6; $i++)
                                                    @php
                                                        $val = $item['nilai'][$i] ?? null;
                                                    @endphp
                                                    <td style="text-align: center;padding:4px 8px;">
                                                        {{ !is_null($val) && $val != 0 ? number_format($val, 0, ',', '.') : '' }}
                                                    </td>
                                                @endfor
                                                <td></td>
                                                <td></td>
                                                <td style="text-align: center;">
                                                    @php
                                                        $nilaiSemester = array_filter($item['nilai'], function ($v) {
                                                            return !is_null($v) && $v != 0;
                                                        });

                                                        $jumlahNilai = count($nilaiSemester);
                                                        $totalNilai = array_sum($nilaiSemester);
                                                        $nilaiAkhir =
                                                            $jumlahNilai > 0 ? $totalNilai / $jumlahNilai : null;
                                                    @endphp
                                                    {{ $nilaiAkhir !== null ? number_format($nilaiAkhir, 2, ',', '.') : '' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- NILAI MATA PELAJARAN PKL --}}
                                        @php $noPKL = $noKWU; @endphp
                                        @foreach ($dataPKL as $item)
                                            <tr>
                                                <td style="text-align: center;" width='25'>{{ $noPKL++ }}.
                                                </td>
                                                <td>{{ $item['kode_mapel'] }}</td>
                                                <td style="padding-left:8px;">
                                                    {{ $item['nama_mapel'] }}</td>
                                                @for ($i = 1; $i <= 6; $i++)
                                                    @php
                                                        $val = $item['nilai'][$i] ?? null;
                                                    @endphp
                                                    <td style="text-align: center;padding:4px 8px;">
                                                        {{ !is_null($val) && $val != 0 ? number_format($val, 0, ',', '.') : '' }}
                                                    </td>
                                                @endfor
                                                <td></td>
                                                <td></td>
                                                <td style="text-align: center;">
                                                    @php
                                                        $nilaiSemester = array_filter($item['nilai'], function ($v) {
                                                            return !is_null($v) && $v != 0;
                                                        });

                                                        $jumlahNilai = count($nilaiSemester);
                                                        $totalNilai = array_sum($nilaiSemester);
                                                        $nilaiAkhir =
                                                            $jumlahNilai > 0 ? $totalNilai / $jumlahNilai : null;
                                                    @endphp
                                                    {{ $nilaiAkhir !== null ? number_format($nilaiAkhir, 2, ',', '.') : '' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td style="text-align: center;" width='25'>9.</td>
                                            <td>MP</td>
                                            <td style="padding-left:8px;">Mata Pelajaran Pilihan</td>
                                            @for ($i = 1; $i <= 9; $i++)
                                                <td></td>
                                            @endfor
                                        </tr>
                                        {{-- NILAI MATA PELAJARAN PILIHAN --}}
                                        @foreach ($dataMP as $item)
                                            <tr>
                                                <td style="text-align: center;" width='25'></td>
                                                <td>{{ $item['kode_mapel'] }}</td>
                                                <td style="padding-left:8px;">
                                                    {{ $item['nama_mapel'] }}</td>
                                                @for ($i = 1; $i <= 6; $i++)
                                                    @php
                                                        $val = $item['nilai'][$i] ?? null;
                                                    @endphp
                                                    <td style="text-align: center;padding:4px 8px;">
                                                        {{ !is_null($val) && $val != 0 ? number_format($val, 0, ',', '.') : '' }}
                                                    </td>
                                                @endfor
                                                <td></td>
                                                <td></td>
                                                <td style="text-align: center;">
                                                    @php
                                                        $nilaiSemester = array_filter($item['nilai'], function ($v) {
                                                            return !is_null($v) && $v != 0;
                                                        });

                                                        $jumlahNilai = count($nilaiSemester);
                                                        $totalNilai = array_sum($nilaiSemester);
                                                        $nilaiAkhir =
                                                            $jumlahNilai > 0 ? $totalNilai / $jumlahNilai : null;
                                                    @endphp
                                                    {{ $nilaiAkhir !== null ? number_format($nilaiAkhir, 2, ',', '.') : '' }}
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="3"><strong>Rata-rata semua nilai per semester</strong></td>
                                            @for ($i = 1; $i <= 6; $i++)
                                                <td style="text-align: center;">
                                                    {{ $rataPerSemester[$i] ?? '-' }}
                                                </td>
                                            @endfor
                                            <td style="text-align: center;">{{ $rataPsajPraktek }}</td>
                                            <td style="text-align: center;">{{ $rataPsajTeori }}</td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br><br>
                                <table width='70%'
                                    style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                                    <tr>
                                        <td width='250' style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'>
                                            Kadipaten, 05 Mei 2025<br>
                                            Kepala Sekolah,
                                            <p>&nbsp;</p>
                                            <p>&nbsp;</p>
                                            <strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>
                                            NIP. 19740302 199803 1 002
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
