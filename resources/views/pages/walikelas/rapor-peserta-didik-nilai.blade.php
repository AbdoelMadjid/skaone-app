<div class="row">
    <!-- Detail Siswa -->
    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <div class="card-body" id="siswa-detail">
                <p>Klik nama siswa untuk melihat detail.</p>
            </div>
        </div>
    </div>
    <!-- Daftar Siswa -->
    <div class="col-xl-3 col-lg-4">
        <div class="card">
            <div class="card-header align-items-center d-flex border-bottom-dashed">
                <h4 class="card-title mb-0 flex-grow-1">Daftar Siswa</h4>
                <div class="flex-shrink-0">{{ $waliKelas->rombel }}</div>
            </div>
            <div class="card-body">
                <div data-simplebar style="height: 235px;" class="mx-n3 px-3">
                    <div class="vstack gap-3">
                        @foreach ($siswaData as $index => $siswa)
                            <div class="row align-items-center g-3">
                                <div class="col-auto">
                                    <div class="avatar-sm p-1 py-2 h-auto bg-info-subtle rounded-3 pilih-siswa">
                                        <div class="text-center">
                                            <h5 class="mb-0">{{ $index + 1 }}</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <h5 class="text-muted mt-0 mb-1 fs-13">{{ $siswa->nis }}
                                    </h5>
                                    <a href="#" class="text-reset fs-14 mb-0 detail-link"
                                        data-nis="{{ $siswa->nis }}">
                                        {{ $siswa->nama_lengkap }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
