<div class="card">
    <div class="card-body border-bottom-dashed border-bottom">
        <div class="row g-3">
            <div class="col-lg">
                <h3><i class="ri-home-4-line text-muted align-bottom me-1"></i> Ruang Ujian</h3>
                <p>Seluruh ruangan pada pelaksanaan ujian</p>
            </div>
            <!--end col-->

            <div class="col-lg-auto"></div>
            <div class="col-lg-auto"></div>
        </div>
    </div>
</div>
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
            {{-- <th>Aksi</th> --}}
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
            </tr>
        @empty
            <tr>
                <td colspan="8" class="text-center">Tidak ada data.</td>
            </tr>
        @endforelse
    </tbody>
</table>
