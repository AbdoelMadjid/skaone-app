<div id='cetak-skl' style='@page {size: A4;}'>
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
                                    </tr>
                                    <tr>
                                        <td width='40'>&nbsp;</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>

                    <table align='center' class="cetak-rapor"
                        style='margin: 0 auto;width:70%;border-collapse:collapse;font:12px Times New Roman;'>
                        <thead>
                            <tr>
                                <th width="35" style="padding:8px 8px;">No.</th>
                                <th>Mata Pelajaran</th>
                                <th width="60">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td colspan="3" style="padding:4px 8px;"><strong>A. Kelompok Mata
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
                                    <td style="padding:4px 12px;">
                                        {{ $item['nama_mapel'] }}</td>
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
                                <td colspan="3" style="padding:4px 8px;"><strong>B. Kelompok Mata
                                        Pelajaran Kejuruan</strong></td>
                            </tr>
                            {{-- NILAI MATA PELAJARAN KEJURUAN --}}
                            @php $noK = 1; @endphp
                            @foreach ($dataK as $item)
                                <tr>
                                    <td style="text-align: center;" width='25'>{{ $noK++ }}.</td>
                                    <td style="padding:4px 12px;">
                                        {{ $item['nama_mapel'] }}</td>

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
                                <td style="padding:4px 12px;">Konsentrasi Keahlian</td>

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
                                    <td style="text-align: center;" width='25'>{{ $noKWU++ }}.
                                    </td>
                                    <td style="padding:4px 12px;">
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
                            {{-- NILAI MATA PELAJARAN PKL --}}
                            @php $noPKL = $noKWU; @endphp
                            @foreach ($dataPKL as $item)
                                <tr>
                                    <td style="text-align: center;" width='25'>{{ $noPKL++ }}.
                                    </td>
                                    <td style="padding:4px 12px;">
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
                                <td style="text-align: center;" width='25'>9.</td>
                                <td style="padding:4px 12px;">Mata Pelajaran Pilihan</td>
                                <td></td>
                            </tr>
                            {{-- NILAI MATA PELAJARAN PILIHAN --}}
                            @foreach ($dataMP as $item)
                                <tr>
                                    <td style="text-align: center;" width='25'></td>
                                    <td style="padding:4px 12px;">
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
                                <td colspan="2" style="text-align: center;padding:8px 12px;">
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
                    <br><br>
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
        <br><br><br><br><br>
    </div>
</div>
