<div id='cetak-nilai-rapor' style='@page {size: A4;}'>
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
                <td style='font-size:18px;text-align:center;'><strong>TRANSKRIP NILAI RAPOR</strong>
                </td>
            </tr>
            <tr>
                <td style='font-size:12px;text-align:center;'><strong>Nomor :
                        572/TU.01.02/SMKN1KDP.CADISDIKWIL.IX</strong>
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
                                <table width='70%'
                                    style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                                    <tr>
                                        <td width='50' style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'>Nama Siswa Lengkap</td>
                                        <td width='25' style='padding:4px 8px;'>:</td>
                                        <td style='padding:4px 8px;'><strong>{!! $dataSiswa->nama_lengkap !!}</strong></td>
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
                                        <td style='padding:4px 8px;'>NIS / NISN</td>
                                        <td style='padding:4px 8px;'>:</td>
                                        <td style='padding:4px 8px;'>{!! $dataSiswa->nis !!} / {!! $dataSiswa->nisn !!}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style='padding:4px 8px;'></td>
                                        <td style='padding:4px 8px;'>Nama Orang Tua</td>
                                        <td style='padding:4px 8px;'>:</td>
                                        <td style='padding:4px 8px;'>{!! ucwords(strtolower($datasiswalulus->orangtua)) !!}</td>
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
                                        <td colspan='5'>&nbsp;</td>
                                    </tr>
                                </table>

                                <table class="cetak-rapor" width='70%'
                                    style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                                    <thead>
                                        <tr>
                                            <th rowspan="2" style="padding:4px 8px;">No.</th>
                                            <th rowspan="2">Mata Pelajaran</th>
                                            <th colspan="6" style="padding:4px 8px;">Semester</th>
                                            <th colspan="2">PSAJ</th>
                                            <th rowspan="2" width="50">NA</th>
                                        </tr>
                                        <tr>
                                            @for ($i = 1; $i <= 6; $i++)
                                                <th width="25" style="padding:4px 8px;">{{ $i }}</th>
                                            @endfor
                                            <th width="25">P</th>
                                            <th width="25">T</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="11" style="padding-left:8px;padding:4px 8px;"><strong>A.
                                                    Kelompok Mata
                                                    Pelajaran Umum Muatan
                                                    Nasional</strong></td>
                                        </tr>
                                        @php
                                            $daftarNilaiAkhir = [];
                                        @endphp
                                        {{-- NILAI MATA PELAJARAN NASIONAL --}}
                                        @php $no = 1; @endphp
                                        @foreach ($dataMPN as $item)
                                            <tr>
                                                <td style="text-align: center;" width='25'>{{ $no++ }}.</td>
                                                <td style="padding-left:8px;">
                                                    {{ $item['nama_mapel'] }}</td>
                                                @for ($i = 1; $i <= 6; $i++)
                                                    @php
                                                        $val = $item['nilai'][$i] ?? null;
                                                    @endphp
                                                    <td style="text-align: center;padding:4px 8px;">
                                                        <span
                                                            class="{{ $val < 75 ? 'text-danger fw-bold' : '' }}">{{ !is_null($val) && $val != 0 ? number_format($val, 0, ',', '.') : '' }}</span>
                                                    </td>
                                                @endfor
                                                <td style="text-align: center;">
                                                    <span
                                                        class="{{ $item['psaj_praktek'] < 75 ? 'text-danger fw-bold' : '' }}">{{ !is_null($item['psaj_praktek']) && $item['psaj_praktek'] != 0 ? number_format($item['psaj_praktek'], 0, ',', '.') : '' }}</span>
                                                </td>
                                                <td style="text-align: center;">
                                                    <span
                                                        class="{{ $item['psaj_teori'] < 75 ? 'text-danger fw-bold' : '' }}">{{ !is_null($item['psaj_teori']) && $item['psaj_teori'] != 0 ? number_format($item['psaj_teori'], 0, ',', '.') : '' }}</span>
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

                                                        if ($nilaiAkhir !== null) {
                                                            $daftarNilaiAkhir[] = $nilaiAkhir;
                                                        }
                                                    @endphp
                                                    <span
                                                        class="{{ $nilaiAkhir < 75 ? 'text-danger fw-bold' : '' }}">{{ $nilaiAkhir !== null ? number_format($nilaiAkhir, 2, ',', '.') : '' }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="11" style="padding-left:8px;padding:4px 8px;"><strong>B.
                                                    Kelompok Mata
                                                    Pelajaran Kejuruan</strong></td>
                                        </tr>
                                        {{-- NILAI MATA PELAJARAN KEJURUAN --}}
                                        @php $noK = 1; @endphp
                                        @foreach ($dataK as $item)
                                            <tr>
                                                <td style="text-align: center;" width='25'>{{ $noK++ }}.
                                                </td>
                                                <td style="padding-left:8px;">
                                                    {{ $item['nama_mapel'] }}</td>
                                                @for ($i = 1; $i <= 6; $i++)
                                                    @php
                                                        $val = $item['nilai'][$i] ?? null;
                                                    @endphp
                                                    <td style="text-align: center;padding:4px 8px;">
                                                        <span
                                                            class="{{ $val < 75 ? 'text-danger fw-bold' : '' }}">{{ !is_null($val) && $val != 0 ? number_format($val, 0, ',', '.') : '' }}</span>
                                                    </td>
                                                @endfor
                                                <td style="text-align: center;">
                                                    <span
                                                        class="{{ $item['psaj_praktek'] < 75 ? 'text-danger fw-bold' : '' }}">{{ !is_null($item['psaj_praktek']) && $item['psaj_praktek'] != 0 ? number_format($item['psaj_praktek'], 0, ',', '.') : '' }}</span>
                                                </td>
                                                <td style="text-align: center;">
                                                    <span
                                                        class="{{ $item['psaj_teori'] < 75 ? 'text-danger fw-bold' : '' }}">{{ !is_null($item['psaj_teori']) && $item['psaj_teori'] != 0 ? number_format($item['psaj_teori'], 0, ',', '.') : '' }}</span>
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

                                                        if ($nilaiAkhir !== null) {
                                                            $daftarNilaiAkhir[] = $nilaiAkhir;
                                                        }
                                                    @endphp
                                                    <span
                                                        class="{{ $nilaiAkhir < 75 ? 'text-danger fw-bold' : '' }}">{{ $nilaiAkhir !== null ? number_format($nilaiAkhir, 2, ',', '.') : '' }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- NILAI MATA PELAJARAN KONSENTRASI KEAHLIAN --}}
                                        <tr>
                                            <td style="text-align: center;" width='25'>6.</td>
                                            <td style="padding-left:8px;padding:4px 8px;">Konsentrasi Keahlian</td>
                                            @for ($i = 1; $i <= 6; $i++)
                                                @php
                                                    $nilai = $dataKK->firstWhere('semester', (string) $i)?->rata_kk;
                                                @endphp
                                                <td class="text-center">
                                                    <span
                                                        class="{{ $nilai < 75 ? 'text-danger fw-bold' : '' }}">{{ $nilai && $nilai != 0 ? number_format($nilai, 0, ',', '.') : '' }}</span>
                                                </td>
                                            @endfor
                                            @php
                                                $praktek = $nilaiPSAJKK['PSAJ9']->nilai ?? null;
                                                $teori = $nilaiPSAJKK['PSAJ10']->nilai ?? null;
                                            @endphp
                                            <td class="text-center">
                                                <span
                                                    class="{{ $praktek < 75 ? 'text-danger fw-bold' : '' }}">{{ $praktek && $praktek != 0 ? number_format($praktek, 0, ',', '.') : '' }}</span>
                                            </td>
                                            <td class="text-center">
                                                <span
                                                    class="{{ $teori < 75 ? 'text-danger fw-bold' : '' }}">{{ $teori && $teori != 0 ? number_format($teori, 0, ',', '.') : '' }}</span>
                                            </td>
                                            <td style="text-align: center;">
                                                @php
                                                    $nilaiSemesterKK = [];

                                                    for ($i = 1; $i <= 6; $i++) {
                                                        $nilai = $dataKK->firstWhere('semester', (string) $i)?->rata_kk;
                                                        if (!is_null($nilai) && $nilai != 0) {
                                                            // Bulatkan ke bilangan bulat (seperti ditampilkan di kolom)
                                                            $nilaiSemesterKK[] = round($nilai);
                                                        }
                                                    }

                                                    $jumlahSemester = count($nilaiSemesterKK);
                                                    $rataRataSemesterKK =
                                                        $jumlahSemester > 0
                                                            ? array_sum($nilaiSemesterKK) / $jumlahSemester
                                                            : null;

                                                    $praktek = $nilaiPSAJKK['PSAJ9']->nilai ?? null;
                                                    $teori = $nilaiPSAJKK['PSAJ10']->nilai ?? null;

                                                    if (!is_null($praktek) && !is_null($teori)) {
                                                        $nilaiPsaj = $praktek * 0.75 + $teori * 0.25;
                                                        $nilaiAkhir = ($rataRataSemesterKK + $nilaiPsaj) / 2;
                                                    } elseif (!is_null($teori)) {
                                                        $nilaiAkhir = ($rataRataSemesterKK + $teori) / 2;
                                                    } else {
                                                        $nilaiAkhir = $rataRataSemesterKK;
                                                    }

                                                    if ($nilaiAkhir !== null) {
                                                        $daftarNilaiAkhir[] = $nilaiAkhir;
                                                    }
                                                @endphp

                                                <span
                                                    class="{{ $nilaiAkhir < 75 ? 'text-danger fw-bold' : '' }}">{{ $nilaiAkhir !== null ? number_format(round($nilaiAkhir, 2), 2, ',', '.') : '' }}</span>
                                            </td>
                                        </tr>
                                        {{-- NILAI MATA PELAJARAN KEWIRAUSAHAAN --}}
                                        @php $noKWU = 6 + 1; @endphp
                                        @foreach ($dataKWU as $item)
                                            <tr>
                                                <td style="text-align: center;" width='25'>{{ $noKWU++ }}.
                                                </td>
                                                <td style="padding-left:8px;padding:4px 8px;">
                                                    {{ $item['nama_mapel'] }}</td>
                                                @for ($i = 1; $i <= 6; $i++)
                                                    @php
                                                        $val = $item['nilai'][$i] ?? null;
                                                    @endphp
                                                    <td style="text-align: center;padding:4px 8px;">
                                                        <span
                                                            class="{{ $val < 75 ? 'text-danger fw-bold' : '' }}">{{ !is_null($val) && $val != 0 ? number_format($val, 0, ',', '.') : '' }}</span>
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

                                                        if ($nilaiAkhir !== null) {
                                                            $daftarNilaiAkhir[] = $nilaiAkhir;
                                                        }
                                                    @endphp
                                                    <span
                                                        class="{{ $nilaiAkhir < 75 ? 'text-danger fw-bold' : '' }}">{{ $nilaiAkhir !== null ? number_format($nilaiAkhir, 2, ',', '.') : '' }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        {{-- NILAI MATA PELAJARAN PKL --}}
                                        @php $noPKL = $noKWU; @endphp
                                        @foreach ($dataPKL as $item)
                                            <tr>
                                                <td style="text-align: center;" width='25'>{{ $noPKL++ }}.
                                                </td>
                                                <td style="padding-left:8px;padding:4px 8px;">
                                                    {{ $item['nama_mapel'] }}</td>
                                                @for ($i = 1; $i <= 6; $i++)
                                                    @php
                                                        $val = $item['nilai'][$i] ?? null;
                                                    @endphp
                                                    <td style="text-align: center;padding:4px 8px;">
                                                        <span
                                                            class="{{ $val < 75 ? 'text-danger fw-bold' : '' }}">{{ !is_null($val) && $val != 0 ? number_format($val, 0, ',', '.') : '' }}</span>
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

                                                        if ($nilaiAkhir !== null) {
                                                            $daftarNilaiAkhir[] = $nilaiAkhir;
                                                        }
                                                    @endphp
                                                    <span
                                                        class="{{ $nilaiAkhir < 75 ? 'text-danger fw-bold' : '' }}">{{ $nilaiAkhir !== null ? number_format($nilaiAkhir, 2, ',', '.') : '' }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td style="text-align: center;" width='25'>9.</td>
                                            <td style="padding-left:8px;padding:4px 8px;">Mata Pelajaran Pilihan</td>
                                            @for ($i = 1; $i <= 9; $i++)
                                                <td></td>
                                            @endfor
                                        </tr>
                                        {{-- NILAI MATA PELAJARAN PILIHAN --}}
                                        @foreach ($dataMP as $item)
                                            <tr>
                                                <td style="text-align: center;" width='25'></td>
                                                <td style="padding-left:8px;">
                                                    {{ $item['nama_mapel'] }}</td>
                                                @for ($i = 1; $i <= 6; $i++)
                                                    @php
                                                        $val = $item['nilai'][$i] ?? null;
                                                    @endphp
                                                    <td style="text-align: center;padding:4px 8px;">
                                                        <span
                                                            class="{{ $val < 75 ? 'text-danger fw-bold' : '' }}">{{ !is_null($val) && $val != 0 ? number_format($val, 0, ',', '.') : '' }}</span>
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

                                                        if ($nilaiAkhir !== null) {
                                                            $daftarNilaiAkhir[] = $nilaiAkhir;
                                                        }
                                                    @endphp
                                                    <span
                                                        class="{{ $nilaiAkhir < 75 ? 'text-danger fw-bold' : '' }}">{{ $nilaiAkhir !== null ? number_format($nilaiAkhir, 2, ',', '.') : '' }}</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td colspan="2" style="text-align: center;padding:4px 12px;">
                                                <strong>Rata-rata</strong>
                                            </td>
                                            @for ($i = 1; $i <= 6; $i++)
                                                <td style="text-align: center;">
                                                    <span
                                                        class="{{ $rataPerSemester[$i] < 75 ? 'text-danger fw-bold' : '' }}">{{ $rataPerSemester[$i] ?? '-' }}</span>
                                                </td>
                                            @endfor
                                            <td style="text-align: center;"><span
                                                    class="{{ $rataPsajPraktek < 75 ? 'text-danger fw-bold' : '' }}">{{ $rataPsajPraktek }}</span>
                                            </td>
                                            <td style="text-align: center;"><span
                                                    class="{{ $rataPsajTeori < 75 ? 'text-danger fw-bold' : '' }}">{{ $rataPsajTeori }}</span>
                                            </td>
                                            <td style="text-align: center;">
                                                @php
                                                    $rataRataSemua = count($daftarNilaiAkhir)
                                                        ? array_sum($daftarNilaiAkhir) / count($daftarNilaiAkhir)
                                                        : null;
                                                @endphp
                                                <span
                                                    class="{{ $nilaiAkhir < 75 ? 'text-danger fw-bold' : '' }}">{{ $rataRataSemua !== null ? number_format($rataRataSemua, 2, ',', '.') : '-' }}</span>
                                            </td>
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
        <br><br><br><br><br><br>
    </div>
</div>
