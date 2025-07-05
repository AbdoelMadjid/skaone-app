<div class="card">
    <div class="card-body border-bottom-dashed border-bottom">
        <div class="row g-3">
            <div class="col-lg">
                <h3><i class="ri-file-user-line text-muted align-bottom me-1"></i> Pengawas Ujian</h3>
                <p>Pengawas ujian untuk setiap ruang dan tanggal ujian.</p>
            </div>
            <!--end col-->

            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm" id="btn-print-jadwal-mengawas">
                        Cetak Jadwal Pengawas
                    </button>
                </div>
            </div>
            <div class="col-lg-auto">
                <div class="mb-3 d-flex align-items-center gap-2">
                    <button type="button" class="btn btn-soft-primary btn-sm" id="btn-print-daftar-pengawas">
                        Cetak Daftar Pengawas
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        <div class="nav flex-column nav-pills text-center" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link mb-2 active" id="v-pills-home-tab" data-bs-toggle="pill"
                                href="#v-pills-home" role="tab" aria-controls="v-pills-home"
                                aria-selected="true">Jadwal Mengawas</a>
                            <a class="nav-link mb-2" id="v-pills-profile-tab" data-bs-toggle="pill"
                                href="#v-pills-profile" role="tab" aria-controls="v-pills-profile"
                                aria-selected="false">Daftar Pengawas</a>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-10">
                        <div class="tab-content mt-4 mt-md-0" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                                aria-labelledby="v-pills-home-tab">
                                <div id="tabel-jadwal-mengawas">
                                    <div
                                        style="text-align:center; font-size: 18px; font-weight: bold;margin-bottom: 20px;">
                                        <h4 class="text-center">JADWAL PENGAWAS UJIAN</h4>
                                        <h4 class="text-center">{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}
                                        </h4>
                                        <h4 class="text-center">TAHUN AJARAN {{ $identitasUjian?->tahun_ajaran ?? '-' }}
                                        </h4>
                                    </div>
                                    <table cellpadding="2" cellspacing="0" class="table table-bordered"
                                        style="font-size: 11px;">
                                        <thead>
                                            <tr style='background-color: #797878;'>
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
                                                    <td style='text-align:center;'>{{ $index + 1 }}</td>
                                                    <td style='text-align:center;'>
                                                        {{ str_pad($ruang->nomor_ruang, 2, '0', STR_PAD_LEFT) }}
                                                    </td>
                                                    @foreach ($tanggalUjian as $tgl)
                                                        @for ($sesi = 1; $sesi <= 3; $sesi++)
                                                            @php
                                                                $key = $ruang->nomor_ruang . '_' . $tgl . '_' . $sesi;
                                                                $pengawasNama = $pengawas[$key][0]->kode_pengawas ?? '';
                                                            @endphp
                                                            <td style='text-align:center;'>{{ $pengawasNama }}</td>
                                                        @endfor
                                                    @endforeach
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="2" style='text-align:center;'>Cadangan</td>
                                                @foreach ($tanggalUjian as $tgl)
                                                    <td colspan="3" style='text-align:center;'>
                                                        @php
                                                            $cadangan = collect($pengawas)
                                                                ->filter(
                                                                    fn($value, $key) => str_contains(
                                                                        $key,
                                                                        'CAD_' . $tgl,
                                                                    ),
                                                                )
                                                                ->flatten();

                                                            $kodePengawasList = $cadangan
                                                                ->pluck('kode_pengawas')
                                                                ->unique()
                                                                ->implode(', ');
                                                        @endphp
                                                        {{ $kodePengawasList ?: '-' }}
                                                    </td>
                                                @endforeach
                                            </tr>
                                        </tbody>
                                    </table>
                                    @include('pages.kurikulum.perangkatujian.halamanadmin.tanda-tangan', [
                                        'identitasUjian' => $identitasUjian,
                                    ])
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                aria-labelledby="v-pills-profile-tab">
                                <div id="tabel-daftar-pengawas">
                                    <div
                                        style="text-align:center; font-size: 18px; font-weight: bold;margin-bottom: 20px;">
                                        <h4 class="text-center">DAFTAR PENGAWAS UJIAN</h4>
                                        <h4 class="text-center">{{ strtoupper($identitasUjian?->nama_ujian ?? '-') }}
                                        </h4>
                                        <h4 class="text-center">TAHUN AJARAN
                                            {{ $identitasUjian?->tahun_ajaran ?? '-' }}
                                        </h4>
                                    </div>
                                    <table cellpadding="2" cellspacing="0" width="100%" class="table table-bordered"
                                        style="font-size: 12px;">
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
                                                    <td style='text-align:left;padding-left:8px;'>
                                                        {{ $p->nama_lengkap }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4">Belum ada data pengawas untuk ujian ini.</td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    @include('pages.kurikulum.perangkatujian.halamanadmin.tanda-tangan', [
                                        'identitasUjian' => $identitasUjian,
                                    ])
                                </div>
                            </div>
                        </div>
                    </div><!--  end col -->
                </div><!--end row-->
            </div><!-- end card-body -->
        </div><!-- end card -->
    </div>
</div>
