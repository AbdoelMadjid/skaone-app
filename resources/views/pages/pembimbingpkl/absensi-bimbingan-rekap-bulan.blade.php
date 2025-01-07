<div class="card">
    <div class="card-header">
        REKAPITULASI ABSENSI PESERTA PERBULAN
    </div>
    <div class="card-body">
        <!-- Nav tabs -->
        @php
            $months = [
                '12-2024' => 'Desember',
                '01-2025' => 'Januari',
                '02-2025' => 'Februari',
                '03-2025' => 'Maret',
            ];
        @endphp
        <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" id="tabs-{{ $siswa->nis }}"
            role="tablist">
            @foreach ($months as $monthKey => $monthName)
                <li class="nav-item" role="presentation">
                    <button class="nav-link {{ $loop->first ? 'active' : '' }}"
                        id="tab-{{ $monthKey }}-{{ $siswa->nis }}" data-bs-toggle="tab"
                        data-bs-target="#content-{{ $monthKey }}-{{ $siswa->nis }}" type="button" role="tab"
                        aria-controls="content-{{ $monthKey }}-{{ $siswa->nis }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                        {{ $monthName }}
                    </button>
                </li>
            @endforeach
        </ul>

        <!-- Tab panes -->
        <div class="tab-content" id="content-{{ $siswa->nis }}">
            @foreach ($months as $monthKey => $monthName)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                    id="content-{{ $monthKey }}-{{ $siswa->nis }}" role="tabpanel"
                    aria-labelledby="tab-{{ $monthKey }}-{{ $siswa->nis }}">
                    @php
                        // Filter data absensi untuk bulan tertentu
                        $absensi_bulanan = DB::table('absensi_siswa_pkls')
                            ->select(
                                DB::raw("SUM(CASE WHEN status = 'HADIR' THEN 1 ELSE 0 END) as jumlah_hadir"),
                                DB::raw("SUM(CASE WHEN status = 'SAKIT' THEN 1 ELSE 0 END) as jumlah_sakit"),
                                DB::raw("SUM(CASE WHEN status = 'IZIN' THEN 1 ELSE 0 END) as jumlah_izin"),
                                DB::raw("SUM(CASE WHEN status = 'ALFA' THEN 1 ELSE 0 END) as jumlah_alfa"),
                            )
                            ->where('nis', $siswa->nis)
                            ->whereMonth('tanggal', substr($monthKey, 0, 2))
                            ->whereYear('tanggal', substr($monthKey, 3, 4))
                            ->first();
                    @endphp

                    <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i><strong>HADIR:</strong>
                        </p>
                        <div><span class="text-success fw-medium fs-12">{{ $absensi_bulanan->jumlah_hadir ?? 0 }}
                                Hari</span></div>
                    </div>
                    <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i><strong>SAKIT:</strong>
                        </p>
                        <div><span class="text-success fw-medium fs-12">{{ $absensi_bulanan->jumlah_sakit ?? 0 }}
                                Hari</span></div>
                    </div>
                    <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i><strong>IZIN:</strong>
                        </p>
                        <div><span class="text-success fw-medium fs-12">{{ $absensi_bulanan->jumlah_izin ?? 0 }}
                                Hari</span></div>
                    </div>
                    <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
                        <p class="fw-medium mb-0"><i
                                class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i><strong>ALFA:</strong>
                        </p>
                        <div><span class="text-success fw-medium fs-12">{{ $absensi_bulanan->jumlah_alfa ?? 0 }}
                                Hari</span></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div><!-- end card-body -->
</div><!-- end card -->
