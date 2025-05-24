<table id="ruangUjianTable" class="display" style="width:100%; table-layout: fixed;">
    <thead>
        <tr>
            <th>No.</th>
            <th>Kode Ujian</th>
            <th>Nomor Ruang</th>
            <th>Kelas Kiri / Kanan</th>
            <th>Jumlah Siswa Kiri</th>
            <th>Jumlah Siswa Kanan</th>
            <th>Jumlah Total</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($dataRuang as $index => $ruang)
            <tr>
                <td class="text-center">{{ $loop->iteration }}</td>
                <td class="text-center">{{ $ruang->kode_ujian }}</td>
                <td class="text-center">{{ $ruang->nomor_ruang }}</td>
                <td>
                    <table>
                        <tr>
                            <td>Kelas</td>
                            <td>:</td>
                            <td>{{ $ruang->kelas_kiri_nama }} <br> {{ $ruang->kelas_kanan_nama }}</td>
                        </tr>
                        <tr>
                            <td>Kode</td>
                            <td>:</td>
                            <td>{{ $ruang->kode_kelas_kiri }} <br> {{ $ruang->kode_kelas_kanan }}</td>
                        </tr>
                    </table>
                </td>
                <td class="text-center">{{ $ruang->jumlah_siswa_kiri }}</td>
                <td class="text-center">{{ $ruang->jumlah_siswa_kanan }}</td>
                <td class="text-center">{{ $ruang->jumlah_total }}</td>
                <td>
                    <div class="btn-group dropstart">
                        <button type="button" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"
                            class="btn btn-soft-primary btn-icon fs-14"><i class="ri-more-2-fill"></i></button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                            <li><a href="#" class="dropdown-item showDenahTempatDuduk"
                                    data-ruangan="{{ $ruang->nomor_ruang }}" data-bs-toggle="modal"
                                    data-bs-target="#denahTempatDuduk"> Denah Tempat Duduk </a></li>
                            <li><a href="#" class="dropdown-item showDaftarSiswaRuangan"
                                    data-ruangan="{{ $ruang->nomor_ruang }}" data-bs-toggle="modal"
                                    data-bs-target="#daftarSiswaPerRuang"> Daftar Siswa Per Ruang </a></li>
                        </ul>
                    </div>
                    {{--  <a href="{{ route('ruang-ujian.edit', $ruang->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('ruang-ujian.destroy', $ruang->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</button>
                    </form> --}}
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">Tidak ada data.</td>
            </tr>
        @endforelse
    </tbody>
</table>


<!-- Modal Denah -->
<div class="modal fade" id="denahTempatDuduk" tabindex="-1" aria-labelledby="denahLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Denah Tempat Duduk <span id="text-ruang"></span></h5>
                <div class="d-flex align-items-center ms-auto">
                    <select id="layoutSelector" class="form-select me-2">
                        <option value="4x5">Layout 4x5</option>
                        <option value="5x4">Layout 5x4</option>
                    </select>
                    {{-- <button type="button" class="btn btn-primary" id="btn-cetak-denah">Cetak</button> --}}
                </div>
            </div>
            <div class="modal-body">
                <div id="cetak-denah" style='@page {size: A4;}'>
                    <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                        <tr>
                            <td align='center'><img src="{{ URL::asset('images/kossurat.jpg') }}" alt=""
                                    height="154" width="700" border="0"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td style='font-size:18px;text-align:center;'><strong>DENAH TEMPAT DUDUK</strong>
                            </td>
                        </tr>
                        <tr>
                            <td style='font-size:18px;text-align:center;'>
                                <strong>{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td style='font-size:18px;text-align:center;'>
                                <strong>TAHUN AJARAN {{ $identitasUjian?->tahun_ajaran ?? '-' }}</strong>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td style='font-size:24px;text-align:center;'>RUANG : <span id="text-ruang"></span></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td style='font-size:14px;text-align:center;'>PAPAN TULIS</td>
                        </tr>
                    </table>
                    <div id="denah-container"></div>
                    <table style='margin: 0 auto;width:100%;border-collapse:collapse;font:12px Times New Roman;'>
                        <tr>
                            <td width="400">&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>Kadipaten,
                                {{ \Carbon\Carbon::parse($identitasUjian?->titimangsa_ujian)->translatedFormat('d F Y') ?? '-' }}
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>PANITIA <br>{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-soft-secondary" id="btn-cetak-denah">Cetak</button>
                <button type="button" class="btn btn-sm btn-soft-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
