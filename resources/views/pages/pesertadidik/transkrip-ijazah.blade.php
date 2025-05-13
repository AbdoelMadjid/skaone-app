<div id='cetak-nilai-ijazah' style='@page {size: A4;}'>
    <div class='table-responsive'>
        <table style='margin: -20px 0 0 0;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td align='center'><img src="{{ URL::asset('images/kossurat.jpg') }}" alt="" height="154"
                        width="700" border="0"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td style='font-size:18px;text-align:center;'><strong>TRANSKRIP NILAI</strong>
                </td>
            </tr>
            <tr>
                <td style='font-size:12px;text-align:center;'><strong>Nomor :
                        569/PK.02.01.05/SMKN1KDP.CADISDIKWIL.IX</strong>
                </td>
            </tr>
        </table>
        <p style='margin-bottom:-2px;margin-top:-8px'>&nbsp;</p>
        <table style='margin: 0 auto;width:75%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td width="100"></td>
                <td width="175">Satuan Pendidikan</td>
                <td>: <strong>SMKN 1 KADIPATEN</strong></td>
            </tr>
            <tr>
                <td></td>
                <td>Nomor Pokok Sekolah Nasional</td>
                <td>: 20213871</td>
            </tr>
            <tr>
                <td></td>
                <td>Nama Siswa Lengkap</td>
                <td>: {!! $dataSiswa->nama_lengkap !!}</td>
            </tr>
            <tr>
                <td></td>
                <td>Tempat, Tanggal Lahir</td>
                <td>: {!! ucwords(strtolower($dataSiswa->tempat_lahir)) !!},
                    {!! formatTanggalIndonesia($dataSiswa->tanggal_lahir) !!}</td>
            </tr>
            <tr>
                <td></td>
                <td>Nomor Induk Siswa Nasional</td>
                <td>: {!! $datasiswalulus->nisn !!}</td>
            </tr>
            <tr>
                <td></td>
                <td>Nomor Ijazah</td>
                <td>: </td>
            </tr>
            <tr>
                <td></td>
                <td>Tanggal Lulus</td>
                <td>: 05 Mei 2025</td>
            </tr>
            <tr>
                <td></td>
                <td>Program Keahlian</td>
                <td>: {!! $dataSiswa->nama_pk !!}</td>
            </tr>
            <tr>
                <td></td>
                <td>Konsentrasi Keahlian</td>
                <td>: {!! $dataSiswa->nama_kk !!}</td>
            </tr>
        </table>
        <p style='margin-bottom:-2px;margin-top:-4px'>&nbsp;</p>
        <table class="cetak-rapor" style='margin: 0 auto;width:70%;border-collapse:collapse;font:12px Times New Roman;'>
            <thead>
                <tr>
                    <th width="35" style="padding:4px 4px;">No.</th>
                    <th>Mata Pelajaran</th>
                    <th width="60">Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" style='padding-left:8px;'><strong>
                            A. Kelompok Mata
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
                        <td style='padding-left:8px;'>{{ $item['nama_mapel'] }}</td>
                        @for ($i = 1; $i <= 6; $i++)
                            @php
                                $val = $item['nilai'][$i] ?? null;
                            @endphp
                        @endfor

                        <td style="text-align: center;">
                            @php
                                $nilaiSemester = array_filter($item['nilai'], function ($v) {
                                    return !is_null($v) && $v != 0;
                                });

                                $jumlahNilai = count($nilaiSemester);
                                $totalNilai = array_sum($nilaiSemester);
                                $rataRataSemester = $jumlahNilai > 0 ? $totalNilai / $jumlahNilai : null;

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
                    <td colspan="3" style='padding-left:8px;'><strong>B. Kelompok Mata
                            Pelajaran Kejuruan</strong></td>
                </tr>
                {{-- NILAI MATA PELAJARAN KEJURUAN --}}
                @php $noK = 1; @endphp
                @foreach ($dataK as $item)
                    <tr>
                        <td style="text-align: center;" width='25'>{{ $noK++ }}.</td>
                        <td style='padding-left:8px;'>{{ $item['nama_mapel'] }}</td>
                        <td style="text-align: center;">
                            @php
                                $nilaiSemester = array_filter($item['nilai'], function ($v) {
                                    return !is_null($v) && $v != 0;
                                });

                                $jumlahNilai = count($nilaiSemester);
                                $totalNilai = array_sum($nilaiSemester);
                                $rataRataSemester = $jumlahNilai > 0 ? $totalNilai / $jumlahNilai : null;

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
                    <td style='padding-left:8px;'>Konsentrasi Keahlian</td>
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
                                $jumlahSemester > 0 ? array_sum($nilaiSemesterKK) / $jumlahSemester : null;

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
                        <td style="text-align: center;" width='25'>{{ $noKWU++ }}.</td>
                        <td style='padding-left:8px;'>{{ $item['nama_mapel'] }}</td>
                        <td style="text-align: center;">
                            @php
                                $nilaiSemester = array_filter($item['nilai'], function ($v) {
                                    return !is_null($v) && $v != 0;
                                });

                                $jumlahNilai = count($nilaiSemester);
                                $totalNilai = array_sum($nilaiSemester);
                                $nilaiAkhir = $jumlahNilai > 0 ? $totalNilai / $jumlahNilai : null;

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
                {{-- @php $noPKL = $noKWU; @endphp
                @foreach ($dataPKL as $item)
                    <tr>
                        <td style="text-align: center;" width='25'>{{ $noPKL++ }}.</td>
                        <td style='padding-left:8px;'>{{ $item['nama_mapel'] }}</td>
                        <td style="text-align: center;">
                            @php
                                $nilaiSemester = array_filter($item['nilai'], function ($v) {
                                    return !is_null($v) && $v != 0;
                                });

                                $jumlahNilai = count($nilaiSemester);
                                $totalNilai = array_sum($nilaiSemester);
                                $nilaiAkhir = $jumlahNilai > 0 ? $totalNilai / $jumlahNilai : null;

                                if ($nilaiAkhir !== null) {
                                    $daftarNilaiAkhir[] = $nilaiAkhir;
                                }
                            @endphp
                            <span
                                class="{{ $nilaiAkhir < 75 ? 'text-danger fw-bold' : '' }}">{{ $nilaiAkhir !== null ? number_format($nilaiAkhir, 2, ',', '.') : '' }}</span>
                        </td>
                    </tr>
                @endforeach --}}
                @php $noPKL = $noKWU; @endphp
                <tr>
                    <td style="text-align: center;" width='25'>{{ $noPKL++ }}.</td>
                    <td style="padding-left:8px;padding:4px 8px;">Praktik Kerja Lapangan</td>


                    {{-- Kolom semester 6: tampilkan rata-rata --}}
                    @php
                        $nilaiAkhir = $dataPKL->rata_rata ?? 0;
                        $daftarNilaiAkhir[] = $nilaiAkhir;
                    @endphp

                    {{-- Kolom nilai akhir total --}}
                    <td style="text-align: center;">
                        <span class="{{ $nilaiAkhir < 75 ? 'text-danger fw-bold' : '' }}">
                            {{ $nilaiAkhir !== null ? number_format($nilaiAkhir, 2, ',', '.') : '' }}
                        </span>
                    </td>
                </tr>
                <tr>
                    <td style="text-align: center;" width='25'>9.</td>
                    <td style='padding-left:8px;'>Mata Pelajaran Pilihan</td>
                    <td></td>
                </tr>
                {{-- NILAI MATA PELAJARAN PILIHAN --}}
                @foreach ($dataMP as $item)
                    <tr>
                        <td style="text-align: center;" width='25'></td>
                        <td style='padding-left:8px;'>
                            {{ $item['nama_mapel'] }}</td>
                        <td style="text-align: center;">
                            @php
                                $nilaiSemester = array_filter($item['nilai'], function ($v) {
                                    return !is_null($v) && $v != 0;
                                });

                                $jumlahNilai = count($nilaiSemester);
                                $totalNilai = array_sum($nilaiSemester);
                                $nilaiAkhir = $jumlahNilai > 0 ? $totalNilai / $jumlahNilai : null;

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
                    <td colspan="2" style="text-align: center;">
                        <strong>Rata-rata</strong>
                    </td>
                    <td style="text-align: center;">
                        @php
                            $rataRataSemua = count($daftarNilaiAkhir)
                                ? array_sum($daftarNilaiAkhir) / count($daftarNilaiAkhir)
                                : null;
                        @endphp
                        <strong>{{ $rataRataSemua !== null ? number_format($rataRataSemua, 2, ',', '.') : '-' }}</strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <p style='margin-bottom:-2px;margin-top:-2px'>&nbsp;</p>
        <table width='70%' style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td width='400'></td>
                <td></td>
                <td></td>
                <td></td>
                <td>
                    Kabupaten Majalengka, 05 Mei 2025<br>
                    Kepala Sekolah,
                    <p style='margin-bottom:22px;margin-top:12px'>&nbsp;</p>
                    <strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>
                    NIP. 19740302 199803 1 002
                </td>
            </tr>
        </table>
    </div>
</div>
