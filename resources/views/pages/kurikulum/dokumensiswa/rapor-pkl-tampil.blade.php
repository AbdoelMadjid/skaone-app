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
<div id='cetak-nilai-pkl' style='@page {size: A4;}'>
    <div>
        <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td style='font-size:14px;text-align:center;'><strong>LEMBAR PENILAIAN PRAKTIK KERJA LAPANGAN</strong>
                </td>
            </tr>
            <tr>
                <td style='font-size:12px;text-align:center;'><strong>TAHUN PELAJARAN 2024-2025</strong>
                </td>
            </tr>
        </table>
        <p style='margin-bottom:-2px;margin-top:-8px'>&nbsp;</p>
        <table style='margin: 0 auto;width:90%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td width='200'>Nama Siswa Lengkap</td>
                <td>: <strong>{{ $data->nama_lengkap }}</strong></td>
            </tr>
            <tr>
                <td>NIS / NISN</td>
                <td>: {{ $data->nis }} / {{ $data->nisn }} </td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>: {{ $data->rombel }}</td>
            </tr>
            <tr>
                <td>Program Keahlian</td>
                <td>: {{ $data->nama_kk }}</td>
            </tr>
            <tr>
                <td>Konsentrasi Keahlian</td>
                <td>: {{ $data->nama_pk }}</td>
            </tr>
            <tr>
                <td>Tempat PKL</td>
                <td>: {{ $data->nama_perusahaan }}</td>
            </tr>
            <tr>
                <td>Tanggal PKL</td>
                <td>: 01 Nopember 2024 - 30 April 2025</td>
            </tr>
            <tr>
                <td>Nama Pimpinan/Instruktur DU/DI</td>
                <td>: {{ optional($data)->nama_pembimbing ?? '-' }}</td>
            </tr>
            <tr>
                <td>Nama Pembimbing/Guru PKL</td>
                <td>: {{ $data->gelardepan }} {{ ucwords(strtolower($data->namalengkap)) }}
                    {{ $data->gelarbelakang }}</td>
            </tr>
        </table>
        <p style='margin-bottom:-2px;margin-top:-2px'>&nbsp;</p>
        @php
            function getPredikat($nilai)
            {
                if ($nilai >= 90) {
                    return 'sangat baik';
                } elseif ($nilai >= 80) {
                    return 'baik';
                } elseif ($nilai >= 70) {
                    return 'cukup baik';
                } elseif ($nilai >= 60) {
                    return 'kurang baik';
                } else {
                    return 'sangat kurang baik';
                }
            }

            $predikat1 = getPredikat((($nilaiPrakerin?->absen ?? 0) + ($nilaiPrakerin?->cp1 ?? 0)) / 2);
            $predikat2 = getPredikat($nilaiPrakerin?->cp2);
            $predikat3 = getPredikat($nilaiPrakerin?->cp3);
            $predikat4 = getPredikat($nilaiPrakerin?->cp4);
        @endphp
        <table class="cetak-rapor" style='margin: 0 auto;width:90%;border-collapse:collapse;font:12px Times New Roman;'>
            <thead>
                <tr>
                    <th style="padding:4px 8px;">No.</th>
                    <th>Tujuan Pembelajaran</th>
                    <th width="50" style="padding:4px 8px;">Skor</th>
                    <th>Deskripsi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="text-align: center;" width='25'>1.</td>
                    <td style="padding-left:8px;padding-right:8px;" width="250">Menerapkan Soft Skill yang di
                        butuhkan dalam dunia
                        kerja (tempat PKL)
                    </td>
                    <td style="text-align: center;">
                        {{ number_format((($nilaiPrakerin?->absen ?? 0) + ($nilaiPrakerin?->cp1 ?? 0)) / 2, 2) }}
                    </td>
                    <td style="padding-left:8px;padding-right:8px;">Sudah {{ $predikat1 }} dalam menerapkan etika
                        berkomunikasi secara lisan dan tulisan, integritas, etos
                        kerja, bekerja secara mandiri dan/atau secara tim,
                        kepedulian sosial dan lingkungan, serta ketaatan terhadap
                        norma, K3LH, dan POS yang berlaku di dunia kerja terkait
                        dengan {{ $data->nama_kk }}.</td>
                </tr>
                <tr>
                    <td style="text-align: center;" width='25'>2.</td>
                    <td style="padding-left:8px;padding-right:8px;">Menerapkan norma, POS dan K3LH yang ada pada dunia
                        kerja (tempat PKL)
                    </td>
                    <td style="text-align: center;">
                        {{ $nilaiPrakerin?->cp2 !== null ? number_format($nilaiPrakerin->cp2, 2) : '-' }}</td>
                    <td style="padding-left:8px;padding-right:8px;">Sudah {{ $predikat2 }} dalam menerapkan
                        kompetensi teknis
                        pada pekerjaan sesuai POS yang berlaku di dunia kerja
                        terkait dengan bidang {{ $data->nama_kk }}.</td>
                </tr>
                <tr>
                    <td style="text-align: center;" width='25'>3.</td>
                    <td style="padding-left:8px;padding-right:8px;">Menerapkan kompetensi teknis yang sudah dipelajari
                        di sekolah dan/atau
                        baru dipelajari pada dunia kerja (tempat PKL)</td>
                    <td style="text-align: center;">
                        {{ $nilaiPrakerin?->cp3 !== null ? number_format($nilaiPrakerin->cp3, 2) : '-' }}</td>
                    <td style="padding-left:8px;padding-right:8px;">Sudah {{ $predikat3 }} dalam menerapkan
                        kompetensi teknis
                        baru atau kompetensi teknis yang belum tuntas dipelajari
                        terkait dengan bidang {{ $data->nama_kk }}.</td>
                </tr>
                <tr>
                    <td style="text-align: center;" width='25'>4.</td>
                    <td style="padding-left:8px;padding-right:8px;">Memahami alur bisnis dunia kerja tempat PKL dan
                        wawasan wirausaha</td>
                    <td style="text-align: center;">
                        {{ $nilaiPrakerin?->cp4 !== null ? number_format($nilaiPrakerin->cp4, 2) : '-' }}</td>
                    <td style="padding-left:8px;padding-right:8px;">Sudah {{ $predikat4 }} dalam melakukan analisis
                        usaha secara
                        mandiri yang memiliki relevansi dengan {{ $data->nama_kk }}.</td>
                </tr>
            </tbody>
        </table>
        <p style='margin-bottom:-2px;margin-top:-2px'>&nbsp;</p>
        <table style='margin: 0 auto;width:90%;border-collapse:collapse;font:12px Times New Roman;'>

            <tr>
                <td class="no-border" valign="top">
                    <table class="cetak-rapor"
                        style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                        <tr class="no-border">
                            <td colspan="2">Absensi</td>
                        </tr>
                        <tr>
                            <th>Kehadiran</th>
                            <th>Jumlah</th>
                        </tr>
                        <tr>
                            <td style="padding-left : 8px;">Sakit</td>
                            <td style="text-align: center;">{{ $kehadiran['SAKIT'] ?? 0 }}</td>
                        </tr>
                        <tr>
                            <td style="padding-left : 8px;">Izin</td>
                            <td style="text-align: center;">{{ $kehadiran['IZIN'] ?? 0 }}</td>
                        </tr>
                        <tr>
                            <td style="padding-left : 8px;">Tanpa Keterangan</td>
                            <td style="text-align: center;">{{ $kehadiran['TANPA KETERANGAN'] ?? 0 }}</td>
                        </tr>
                    </table>
                </td>
                <td width="5%"></td>
                <td width="70%" valign="top">
                    <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                        <tr class="no-border">
                            <td>Catatan :</td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding-top : 8px;">Siswa sudah dapat mengikuti alur kerja
                                dan tuntutan kerja industri, cepat dalam
                                menyelesaikan tugas-tugas yang diberikan, bisa menyesuaikan diri dengan lingkungan
                                kerja.</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <div class="ttd-container">
            <table class="ttd-wrapper">
                <tr>
                    <td class="ttd-section" style='margin: 0 auto;font:12px Times New Roman;'>
                        <table style="line-height: 1.2;">
                            <tr>
                                <td style="padding: 1px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding: 1px;">Guru Pembimbing PKL</td>
                            </tr>
                            <tr class="ttd-spacing">
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>{{ $data->gelardepan }} {{ ucwords(strtolower($data->namalengkap)) }}
                                        {{ $data->gelarbelakang }}</strong><br>
                                    NIP. {{ $data->nip }}
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td class="ttd-section">
                        <table style="line-height: 1.2;">
                            <tr>
                                <td style="padding: 1px;">Kabupaten Majalengka, 05 Mei 2025</td>
                            </tr>
                            <tr>
                                <td style="padding: 1px;">Pimpinan/Instruktur Industri</td>
                            </tr>
                            <tr class="ttd-spacing">
                                <td></td>
                            </tr>
                            @php
                                if ($data->nip_pembimbing) {
                                    $nomor_pembimbing = 'NIP. ' . $data->nip_pembimbing;
                                } elseif ($data->nidn_pembimbing) {
                                    $nomor_pembimbing = 'NIDN. ' . $data->nidn_pembimbing;
                                } else {
                                    $nomor_pembimbing = '';
                                }
                            @endphp
                            <tr>
                                <td>
                                    <strong>{{ $data->nama_pembimbing }}</strong>
                                    <br>{{ $nomor_pembimbing }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr>
                    <td colspan="2" style="height: 30px;"></td>
                </tr>

                <tr>
                    <td class="ttd-section relative-wrapper">
                        <table style="line-height: 1.2;">
                            <tr>
                                <td style="padding: 1px;">Mengesahkan:</td>
                            </tr>
                            <tr>
                                <td style="padding: 1px;">Kepala SMKN 1 Kadipaten</td>
                            </tr>
                            <tr class="ttd-spacing">
                                <td></td>
                            </tr>
                            <tr>
                                <td><strong>H. Damudin, S.Pd., M.Pd.</strong><br>NIP. 19740302 199803 1 002</td>
                            </tr>
                        </table>
                        <img src='{{ URL::asset('images/damudin.png') }}' class="ttd-img-kepsek" />
                        {{-- <img src='{{ URL::asset('images/stempel.png') }}' class="ttd-img-stempel" /> --}}
                    </td>
                    <td class="ttd-section">
                        <table style="line-height: 1.2;">
                            <tr>
                                <td style="padding: 1px;">Mengetahui:</td>
                            </tr>
                            <tr>
                                <td style="padding: 1px;">Wali Kelas</td>
                            </tr>
                            <tr class="ttd-spacing">
                                <td></td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>{{ $data->wali_gelardepan }}
                                        {{ ucwords(strtolower($data->wali_namalengkap)) }}
                                        {{ $data->wali_gelarbelakang }}</strong><br>
                                    NIP. {{ $data->wali_nip }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>
