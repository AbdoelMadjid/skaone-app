<style>
    .cetak-rapor {
        border-collapse: collapse;
        /* Menggabungkan garis border */
        width: 100%;
        /* Agar tabel mengambil seluruh lebar */
        text-decoration-color: black
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
                    <td style="text-align: center;">{{ ($nilaiPrakerin?->absen + $nilaiPrakerin?->cp1) / 2 ?? '-' }}
                    </td>
                    <td style="padding-left:8px;padding-right:8px;">Sudah sangat baik dalam menerapkan etika
                        berkomunikasi secara lisan dan tulisan, integritas, etos
                        kerja, bekerja secara mandiri dan/atau secara tim,
                        kepedulian sosial dan lingkungan, serta ketaatan terhadap
                        norma, K3LH, dan POS yang berlaku di dunia kerja terkait
                        dengan {{ $data->nama_pk }}.</td>
                </tr>
                <tr>
                    <td style="text-align: center;" width='25'>2.</td>
                    <td style="padding-left:8px;padding-right:8px;">Menerapkan norma, POS dan K3LH yang ada pada dunia
                        kerja (tempat PKL)
                    </td>
                    <td style="text-align: center;">{{ $nilaiPrakerin?->cp2 ?? '-' }}</td>
                    <td style="padding-left:8px;padding-right:8px;">Sudah sangat baik dalam menerapkan kompetensi teknis
                        pada pekerjaan sesuai POS yang berlaku di dunia kerja
                        terkait dengan bidang {{ $data->nama_pk }}.</td>
                </tr>
                <tr>
                    <td style="text-align: center;" width='25'>3.</td>
                    <td style="padding-left:8px;padding-right:8px;">Menerapkan kompetensi teknis yang sudah dipelajari
                        di sekolah dan/atau
                        baru dipelajari pada dunia kerja (tempat PKL)</td>
                    <td style="text-align: center;">{{ $nilaiPrakerin?->cp3 ?? '-' }}</td>
                    <td style="padding-left:8px;padding-right:8px;">Sudah sangat baik dalam menerapkan kompetensi teknis
                        baru atau kompetensi teknis yang belum tuntas dipelajari
                        terkait dengan bidang {{ $data->nama_pk }}.</td>
                </tr>
                <tr>
                    <td style="text-align: center;" width='25'>4.</td>
                    <td style="padding-left:8px;padding-right:8px;">Memahami alur bisnis dunia kerja tempat PKL dan
                        wawasan wirausaha</td>
                    <td style="text-align: center;">{{ $nilaiPrakerin?->cp4 ?? '-' }}</td>
                    <td style="padding-left:8px;padding-right:8px;">Sudah baik dalam melakukan analisis usaha secara
                        mandiri yang memiliki relevansi dengan {{ $data->nama_pk }}.</td>
                </tr>
            </tbody>
        </table>
        <p style='margin-bottom:-2px;margin-top:-2px'>&nbsp;</p>
        <table style='margin: 0 auto;width:90%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr class="no-border">
                <td colspan="2">Catatan :</td>
            </tr>
            <tr class="cetak-rapor">
                <td colspan="2" style="padding : 8px 8px;">Siswa sudah dapat mengikuti alur kerja
                    dan tuntutan kerja industri, cepat dalam
                    menyelesaikan tugas-tugas yang diberikan, bisa menyesuaikan diri dengan lingkungan kerja.</td>
            </tr>
            <tr class="no-border" height='20'>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td class="no-border">
                    <table class="cetak-rapor"
                        style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
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
                <td width="75%">&nbsp;</td>
            </tr>
        </table>

        <p style='margin-bottom:-2px;margin-top:-2px'>&nbsp;</p>
        <table style='margin: 0 auto;width:90%;border-collapse:collapse;font:12px Times New Roman;'>
            <tr>
                <td width='45'>&nbsp;</td>
                <td>
                    <table style='margin: 0 auto;border-collapse:collapse;'>
                        <tr>
                            <td>Mengetahui :</td>
                        </tr>
                        <tr>
                            <td>Guru Pembimbing PKL,</td>
                        </tr>
                        <tr>
                            <td>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong> {{ $data->gelardepan }} {{ ucwords(strtolower($data->namalengkap)) }}
                                    {{ $data->gelarbelakang }}</strong><br>
                                NIP. {{ $data->nip }}
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                        </tr>
                    </table>
                </td>
                <td width='150'></td>
                <td>
                    <table style='margin: 0 auto;border-collapse:collapse;'>
                        <tr>
                            <td>Kabupaten Majalengka, 05 Mei 2025</td>
                        </tr>
                        <tr>
                            <td>Pimpinan/Instruktur Industri</td>
                        </tr>
                        <tr>
                            <td>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>{{ $data->nama_pembimbing }}</strong></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="no-border" height='20'>
                <td colspan="2">&nbsp;</td>
            </tr>
            <tr>
                <td width='45'>&nbsp;</td>
                <td>
                    <table style='margin: 0 auto;border-collapse:collapse;'>
                        <tr>
                            <td>Mengesahkan :</td>
                        </tr>
                        <tr>
                            <td>Kepala SMKN 1 Kadipaten</td>
                        </tr>
                        <tr>
                            <td>
                                <div>
                                    <img src='{{ URL::asset('images/damudin.png') }}' border='0' height='110'
                                        style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -120px;margin-top:-15px;'>
                                </div>
                                <div><img src='{{ URL::asset('images/stempel.png') }}' border='0' height='180'
                                        width='184'
                                        style=' position: absolute; padding: 0px 2px 15px -450px; margin-left: -80px;margin-top:-50px;'>
                                </div>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>H. DAMUDIN, S.Pd., M.Pd.</strong></td>
                        </tr>
                        <tr>
                            <td>NIP. 19740302 199803 1 002</td>
                        </tr>
                    </table>

                </td>
                <td width='150'></td>
                <td>
                    <table style='margin: 0 auto;border-collapse:collapse;'>
                        <tr>
                            <td>Mengetahui :</td>
                        </tr>
                        <tr>
                            <td>Wali Kelas</td>
                        </tr>
                        <tr>
                            <td>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>{{ $data->wali_gelardepan }}
                                    {{ ucwords(strtolower($data->wali_namalengkap)) }}
                                    {{ $data->wali_gelarbelakang }}</strong></td>
                        </tr>
                        <tr>
                            <td>NIP. {{ $data->wali_nip }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
