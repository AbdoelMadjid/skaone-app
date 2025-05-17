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
                <td>{{ $prakerin->gelardepan }} {{ $prakerin->namalengkap }}
                    {{ $prakerin->gelarbelakang }}</td>
                <td>{{ number_format($prakerin->rata_rata_prakerin, 2) }} </td>
                <td>
                    <button type="button" class="btn btn-sm btn-primary btn-show-sertifikat"
                        data-nama="{{ $prakerin->nama_lengkap }}" data-nis="{{ $prakerin->nis }}"
                        data-perusahaan="{{ $prakerin->nama_perusahaan }}"
                        data-nilaiprakerin="{{ $prakerin->rata_rata_prakerin }}"
                        data-jabatanpembimbing="{{ $prakerin->jabatan_pembimbing }}"
                        data-namapembimbing="{{ $prakerin->nama_pembimbing }}"
                        data-programkeahlian="{{ $prakerin->nama_pk }}" data-konsentrasi="{{ $prakerin->nama_kk }}">
                        Lihat Sertifikat
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

<!-- Modal Sertifikat Global -->
<div class="modal fade" id="globalSertifikatModal" tabindex="-1" aria-labelledby="globalSertifikatModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="globalSertifikatModalLabel">Sertifikat Prakerin</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body">
                <div id='cetak-sertifikat-pkl' style='@page {size: A4;}'>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                    <div class='table-responsive'>
                        <table style='margin: 0 auto;width:80%;border-collapse:collapse;'>
                            <tr>
                                <td colspan='3'> Diberikan kepada:</td>
                            </tr>
                            <tr>
                                <td colspan='3'>&nbsp;</td>
                            </tr>
                            <tr>
                                <td width='75'>&nbsp;</td>
                                <td>
                                    <table>
                                        <tr>
                                            <td width='170'>Nama</td>
                                            <td width='10'>:</td>
                                            <td><strong><span id="modalNama"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Nomor Induk Siswa</td>
                                            <td>:</td>
                                            <td><span id="modalNis"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Program Keahlian</td>
                                            <td>:</td>
                                            <td><span id="modalProgramKeahlian"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Konsentrasi Keahlian</td>
                                            <td>:</td>
                                            <td><span id="modalKonsentrasiKeahlian"></span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td width='40'>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan='3'>&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan='3'>Dalam Kegiatan Praktek Kerja Lapangan (PKL) di: <br>
                                    <span id="modalPerusahaan"></span>
                                    <br>
                                    dari tanggal 01 Nopember 2024 - 30 April 2025 tahun pelajaran 2024-2025
                                    dengan nilai
                                    Capaian Kompetensi <span id="modalNilaiPrakerin"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan='3'>Demikian sertifikat ini diberikan untuk di pergunakan sebagaimana
                                    mestinya.
                                </td>
                            </tr>
                        </table>
                        <p style='margin-bottom:-2px;margin-top:-2px'>&nbsp;</p>
                        <table width='70%' style='margin: 0 auto;width:100%;border-collapse:collapse;'>
                            <tr>
                                <td width='200'></td>
                                <td>
                                    <table>
                                        <tr>
                                            <td>&nbsp;</td>
                                        </tr>
                                        <tr>
                                            <td>Pembimbing Perusahaan</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <p>&nbsp;</p>
                                                <p>&nbsp;</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><span id="modalNamaPembimbing"></span></td>
                                        </tr>
                                        <tr>
                                            <td><span id="modalJabatanPembimbing"></span></td>
                                        </tr>
                                    </table>
                                </td>
                                <td></td>
                                <td></td>
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
                                    <div><img src='{{ URL::asset('images/stempel.png') }}' border='0'
                                            height='180' width='184'
                                            style=' position: absolute; padding: 0px 2px 15px -650px; margin-left: -135px;margin-top:-50px;'>
                                    </div> --}}
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
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" id="btnCetakSertifikat">Cetak</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
