<div class="row">
    <div class="col-md-12">
        <h3>Pengawas Ujian</h3>
        <p>Pengawas ujian untuk setiap ruang dan tanggal ujian.</p>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-6">
        <h4 class="text-center">JADWAL PENGAWAS UJIAN</h4>
        <h4 class="text-center">{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}</h4>
        <h4 class="text-center">TAHUN AJARAN {{ $identitasUjian?->tahun_ajaran ?? '-' }}</h4>
        <table border="1" cellpadding="5" cellspacing="0" class="table table-bordered">
            <thead>
                <tr>
                    <th rowspan="2">No</th>
                    <th rowspan="2">Ruang</th>
                    @foreach ($tanggalUjianOption as $tgl => $label)
                        <th colspan="3">{{ strtoupper($label) }}</th>
                    @endforeach
                </tr>
                <tr>
                    @foreach ($tanggalUjian as $tgl)
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($ruangUjian as $index => $ruang)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">{{ str_pad($ruang->nomor_ruang, 2, '0', STR_PAD_LEFT) }}</td>
                        @foreach ($tanggalUjian as $tgl)
                            @for ($sesi = 1; $sesi <= 3; $sesi++)
                                @php
                                    $key = $ruang->nomor_ruang . '_' . $tgl . '_' . $sesi;
                                    $pengawasNama = $pengawas[$key][0]->kode_pengawas ?? '';
                                @endphp
                                <td class="text-center">{{ $pengawasNama }}</td>
                            @endfor
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <h4>Daftar Pengawas Ujian</h4>
        <p>Berikut adalah daftar pengawas yang ditugaskan untuk ujian ini.</p>
        <table border="1" cellpadding="6" cellspacing="0" width="100%" class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>NIP</th>
                    <th>Nama Lengkap</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftarPengawas as $index => $p)
                    <tr>
                        <td class="text-center">{{ $index + 1 }}</td>
                        <td class="text-center">{{ $p->kode_pengawas }}</td>
                        <td>{{ $p->nip ?? '-' }}</td>
                        <td>{{ $p->nama_lengkap }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Belum ada data pengawas untuk ujian ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
