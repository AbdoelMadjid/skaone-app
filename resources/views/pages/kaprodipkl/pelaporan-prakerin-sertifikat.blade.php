<table id="sertifikatprakerinTable" class="display" style="width:100%; table-layout: fixed;">
    <thead>
        <tr>
            <th style="width:40px;">No.</th>
            <th style="width:60px;">NIS</th>
            <th>Nama Lengkap</th>
            <th style="width:60px;">Rombel</th>
            <th>Perusahaan</th>
            <th>Pembimbing</th>
            <th>Nilai Prakerin</th>
            <th>Sertifikat</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dataPrakerin as $index => $prakerin)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td>{{ $prakerin->nis }}</td>
                <td>{{ $prakerin->nama_lengkap }}</td>
                <td>{{ $prakerin->rombel }}</td>
                <td>{{ $prakerin->nama_perusahaan }}</td>
                <td>{{ $prakerin->nama_pembimbing }}<br>{{ $prakerin->jabatan_pembimbing }}</td>
                <td class="text-center">{{ number_format($prakerin->rata_rata_prakerin, 2) }} </td>
                <td class="text-center">
                    <button class="btn btn-soft-success btn-sm"
                        onclick="window.location.href='{{ route('kaprodipkl.download.sertifpkl', $prakerin->nis) }}'">
                        <i class="ri-download-line"></i> PDF
                    </button>
                    <button class="btn btn-sm btn-soft-success btn-cetak-sertifikat"
                        data-nama="{{ $prakerin->nama_lengkap }}" data-nis="{{ $prakerin->nis }}"
                        data-perusahaan="{{ $prakerin->nama_perusahaan }}"
                        data-nilaiprakerin="{{ $prakerin->rata_rata_prakerin }}"
                        data-jabatanpembimbing="{{ $prakerin->jabatan_pembimbing }}"
                        data-namapembimbing="{{ $prakerin->nama_pembimbing }}"
                        data-nippembimbing="{{ $prakerin->nip_pembimbing }}"
                        data-nidnpembimbing="{{ $prakerin->nidn_pembimbing }}"
                        data-programkeahlian="{{ $prakerin->nama_pk }}" data-konsentrasi="{{ $prakerin->nama_kk }}">
                        <i class="ri-printer-line"></i> Print
                    </button>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8">Tidak ada data.</td>
            </tr>
        @endforelse
    </tbody>
</table>

<div id='cetak-sertifikat-pkl' style="display: none; position: relative; width: 100%; height: 1000px;">
    <img src="{{ URL::asset('images/sertifikatpkl.jpg') }}"
        style="position: absolute; width: 29.7cm; height: 21cm; z-index: 0; top: 0; left: 0;" />
    <div style="margin-top: 320px;"></div>
    <div style="position: relative; z-index: 1;">
        <table style='margin: 0 auto;width:75%;border-collapse:collapse;'>
            <tr>
                <td colspan='3'>Diberikan kepada:</td>
            </tr>
            <tr style="height: 15px;">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td width='40'>&nbsp;</td>
                <td>
                    <table>
                        <tr>
                            <td width='170'>Nama</td>
                            <td width='10'>:</td>
                            <td><strong><span class="sertifikat-nama"></span></strong></td>
                        </tr>
                        <tr>
                            <td>Nomor Induk Siswa</td>
                            <td>:</td>
                            <td><span class="sertifikat-nis"></span></td>
                        </tr>
                        <tr>
                            <td>Program Keahlian</td>
                            <td>:</td>
                            <td><span class="sertifikat-pk"></span></td>
                        </tr>
                        <tr>
                            <td>Konsentrasi Keahlian</td>
                            <td>:</td>
                            <td><span class="sertifikat-kk"></span></td>
                        </tr>
                    </table>
                </td>
                <td width='40'>&nbsp;</td>
            </tr>
            <tr style="height: 15px;">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan='3'>Dalam Kegiatan Praktek Kerja Lapangan (PKL) di: <br>
                    <strong><span class="sertifikat-perusahaan"></span></strong>
                    <br>
                    dari tanggal 01 Nopember 2024 - 30 April 2025 tahun pelajaran 2024-2025
                    dengan nilai
                    Capaian Kompetensi <span class="sertifikat-nilai"></span>
                </td>
            </tr>
            <tr style="height: 15px;">
                <td colspan="3"></td>
            </tr>
            <tr>
                <td colspan='3'>Demikian sertifikat ini diberikan untuk di pergunakan sebagaimana
                    mestinya.
                </td>
            </tr>
        </table>
        <div style="margin-top: 10px;"></div>
        <table style='margin: 0 auto;width:80%;border-collapse:collapse;'>
            <tr>
                <td width='45'>&nbsp;</td>
                <td>
                    <table>
                        <tr>
                            <td>Pimpinan/Pembimbing DU/DI</td>
                        </tr>
                        <tr>
                            <td><span class="sertifikat-jabatan"></span>,</td>
                        </tr>
                        <tr>
                            <td>
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong><span class="sertifikat-pembimbing"></span></strong></td>
                        </tr>
                        <tr>
                            <td><span class="nomor-pembimbing"></span></td>
                        </tr>
                    </table>
                </td>
                <td width='150'></td>
                <td>
                    <table>
                        <tr>
                            <td>Kabupaten Majalengka, 05 Mei 2025</td>
                        </tr>
                        <tr>
                            <td>Kepala Sekolah,</td>
                        </tr>
                        <tr>
                            <td>
                                {{-- <div>
                                    <img src='{{ URL::asset('images/damudin.png') }}' border='0' height='110'
                                        style=' position: absolute; padding: 0px 2px 15px -200px; margin-left: -120px;margin-top:-15px;'>
                                </div>
                                <div><img src='{{ URL::asset('images/stempel.png') }}' border='0' height='180'
                                        width='184'
                                        style=' position: absolute; padding: 0px 2px 15px -650px; margin-left: -135px;margin-top:-50px;'>
                                </div> --}}
                                <p>&nbsp;</p>
                                <p>&nbsp;</p>
                            </td>
                        </tr>
                        <tr>
                            <td><strong>H. Damudin, S.Pd., M.Pd.</strong></td>
                        </tr>
                        <tr>
                            <td>NIP. 19740302 199803 1 002</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</div>
