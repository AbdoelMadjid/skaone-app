<style>
    .cetak-rapor {
        border-collapse: collapse;
        /* Menggabungkan garis border */
        width: 100%;
        /* Agar tabel mengambil seluruh lebar */
        text-decoration-color: black;
    }

    .cetak-rapor td {
        border: 1px solid black;
        /* Memberikan garis hitam pada semua th dan td */
        padding: 1px;
        /* Memberikan jarak dalam sel */
        text-align: left;
        /* Mengatur teks rata kiri */
    }

    .cetak-rapor th {
        border: 1px solid black;
        /* Memberikan garis hitam pada semua th dan td */
        background-color: #f2f2f2;
        /* Memberikan warna latar untuk header tabel */
        font-weight: bold;
        /* Mempertegas teks header */
        text-align: center;
        /* Mengatur teks rata kiri */
    }

    @media print {
        .cetak-rapor tr {
            page-break-inside: avoid;
            /* Hindari potongan di tengah baris */
        }

        .page-break {
            page-break-before: always;
            /* Paksa halaman baru */
        }
    }

    .no-border {
        border: 0 !important;
        border-collapse: collapse !important;
    }

    .cetak-rapor .no-border,
    .cetak-rapor .no-border th,
    .cetak-rapor .no-border td {
        border: none !important;
        /* Hapus border secara eksplisit */
    }

    .text-center {
        text-align: center;
    }

    .note {
        font-size: 11px;
        margin-top: 10px;
    }

    .ttd-container {
        margin-left: 10%;
        width: 90%;
        /* Supaya tidak melewati batas kanan */
    }

    .ttd-wrapper {
        width: 100%;
        margin: 20px auto;
        font-family: "Times New Roman", Times, serif;
        font-size: 12px;
        border-collapse: collapse;
    }

    .ttd-section {
        width: 50%;
        vertical-align: top;
        text-align: left;
        /* Rata kiri */
    }

    .ttd-section td {
        padding: 3px;
    }

    .ttd-spacing {
        height: 45px;
    }

    .relative-wrapper {
        position: relative;
    }

    .ttd-img-kepsek {
        position: absolute;
        top: 20px;
        left: -75px;
        height: 80px;
        z-index: 1;
    }

    .ttd-img-stempel {
        position: absolute;
        top: -5px;
        left: -75px;
        height: 120px;
        z-index: 0;
    }

    @media print {
        .ttd-wrapper {
            page-break-inside: avoid;
        }
    }
</style>
<div id='cetak-skl' style='@page {size: A4;}'>
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
                <td style='font-size:18px;text-align:center;'><strong>SURAT KETERANGAN LULUS</strong>
                </td>
            </tr>
            <tr>
                <td style='font-size:12px;text-align:center;'><strong>Nomor :
                        571/TU.01.02/SMKN1KDP.CADISDIKWIL.IX</strong>
                </td>
            </tr>
        </table>
        <p style='margin-bottom:-2px;margin-top:-8px'>&nbsp;</p>
        <table align='center' style='width:80%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td>
                    Kepala SMK Negeri 1 Kadipaten. Kabupaten Majalengka selaku Penyelenggara
                    Kegiatan
                    Penilaian Akhir Jenjang Tahun Pelajaran 2024 - 2025. <br>
                    <p style='margin-bottom:8px;margin-top:8px'>Berdasarkan :</p>
                    <ol style='margin-left:-18px;'>
                        <li>Ketuntasan dari seluruh program pembelajaran pada Kurikulum
                            Merdeka;
                        <li>Kriteria Kelulusan dari Satuan Pendidikan sesuai dengan
                            peraturan
                            perundang-undangan
                            yang berlaku;
                        <li style='padding-bottom:-10px;'>Rapat Pleno Dewan Guru SMKN 1
                            Kadipaten. tentang Kelulusan Siswa
                            pada Tanggal 02
                            Mei 2025
                    </ol>
                    <p style='margin-bottom:8px;margin-top:-8px'>Menerangkan bahwa :</p>
                    <table width='70%'
                        style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                        <tr>
                            <td width='20'></td>
                            <td width='150'>Nama Siswa Lengkap</td>
                            <td>: <strong>{!! $dataSiswa->nama_lengkap !!}</strong></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Tempat, Tanggal Lahir</td>
                            <td>: {!! ucwords(strtolower($dataSiswa->tempat_lahir)) !!},
                                {!! formatTanggalIndonesia($dataSiswa->tanggal_lahir) !!}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>NIS / NISN</td>
                            <td>: {!! $dataSiswa->nis !!} /
                                {!! $dataSiswa->nisn !!}
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>Nama Orang Tua</td>
                            <td>: {!! ucwords(strtolower($dataSiswa->nm_ayah)) !!}</td>
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
                        <tr>
                            <td></td>
                            <td>Dinyatakan</td>
                            <td>: <strong>L U L U S</strong></td>
                        </tr>
                    </table>
                    <p style='margin-bottom:8px;margin-top:8px'>dengan nilai sebagai berikut :</p>
                </td>
            </tr>
        </table>
        <table align='center' class="cetak-rapor"
            style='margin: 0 auto;width:80%;border-collapse:collapse;font:12px Times New Roman;'>
            <thead>
                <tr>
                    <th width="35" style="padding:4px 4px;">No.</th>
                    <th>Mata Pelajaran</th>
                    <th width="60">Nilai</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="3" style="padding-left:8px;"><strong>
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
                        <td style="padding-left:8px;">{{ $item['nama_mapel'] }}</td>
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
                    <td colspan="3" style="padding-left:8px;"><strong>B. Kelompok Mata
                            Pelajaran Kejuruan</strong></td>
                </tr>
                {{-- NILAI MATA PELAJARAN KEJURUAN --}}
                @php $noK = 1; @endphp
                @foreach ($dataK as $item)
                    <tr>
                        <td style="text-align: center;" width='25'>{{ $noK++ }}.</td>
                        <td style="padding-left:8px;">{{ $item['nama_mapel'] }}</td>
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
                    <td style="padding-left:8px;">Konsentrasi Keahlian</td>
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
                        <td style="padding-left:8px;">{{ $item['nama_mapel'] }}</td>
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
                        <td style="padding-left:8px;">{{ $item['nama_mapel'] }}</td>
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
                    <td style="padding-left:8px;">Praktik Kerja Lapangan</td>


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
                    <td style="padding-left:8px;">Mata Pelajaran Pilihan</td>
                    <td></td>
                </tr>
                {{-- NILAI MATA PELAJARAN PILIHAN --}}
                @foreach ($dataMP as $item)
                    <tr>
                        <td style="text-align: center;" width='25'></td>
                        <td style="padding-left:8px;">{{ $item['nama_mapel'] }}</td>
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
                    <div>
                        <img src='{{ URL::asset('images/damudin.png') }}' border='0' height='110'
                            style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -120px;margin-top:-15px;'>
                    </div>
                    <div><img src='{{ URL::asset('images/stempel.png') }}' border='0' height='180' width='184'
                            style=' position: absolute; padding: 0px 2px 15px -650px; margin-left: -135px;margin-top:-50px;'>
                    </div>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <strong>H. DAMUDIN, S.Pd., M.Pd.</strong><br>
                    NIP. 19740302 199803 1 002
                </td>
            </tr>
        </table>
    </div>
</div>
