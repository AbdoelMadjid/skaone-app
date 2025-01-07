<div class="card card-height-100">
    <div class="card-header">
        TOTAL REKAPITULASI ABSENSI PESERTA
    </div>
    <div class="card-body">
        <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
            <p class="fw-medium mb-0"><i class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                <strong>HADIR:</strong>
            </p>
            <div>
                <span class="text-success fw-medium fs-12">{{ $siswa->jumlah_hadir }}
                    Hari</span>
            </div>
        </div><!-- end -->
        <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
            <p class="fw-medium mb-0"><i class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                <strong>SAKIT:</strong>
            </p>
            <div>
                <span class="text-success fw-medium fs-12">{{ $siswa->jumlah_sakit }}
                    Hari</span>
            </div>
        </div><!-- end -->
        <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
            <p class="fw-medium mb-0"><i class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                <strong>IZIN:</strong>
            </p>
            <div>
                <span class="text-success fw-medium fs-12">{{ $siswa->jumlah_izin }}
                    Hari</span>
            </div>
        </div><!-- end -->
        <div class="d-flex justify-content-between border-bottom border-bottom-dashed py-1">
            <p class="fw-medium mb-0"><i class="ri-checkbox-blank-circle-fill text-success align-middle me-2"></i>
                <strong>ALFA:</strong>
            </p>
            <div>
                <span class="text-success fw-medium fs-12">{{ $siswa->jumlah_alfa }}
                    Hari</span>
            </div>
        </div><!-- end -->
    </div>
</div>
